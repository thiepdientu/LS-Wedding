<?php

namespace App\Http\Controllers;

use App\Models\WeddingCard;
use App\Models\WeddingWish;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class WeddingWishController extends Controller
{
    /**
     * Lấy danh sách lời chúc đã duyệt của một thiệp cưới
     */
    public function index(string|int $cardId): JsonResponse
    {
        $card = is_numeric($cardId)
            ? WeddingCard::find($cardId)
            : WeddingCard::where('identifyWedding', $cardId)->first();

        if (!$card) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy thông tin thiệp cưới.',
                'data' => [],
            ], 404);
        }

        $wishes = WeddingWish::where('wedding_card_id', $card->id)
            ->approved()
            ->latest()
            ->take(50)
            ->get()
            ->map(function (WeddingWish $wish) {
                return [
                    'id' => $wish->id,
                    'sender_name' => e($wish->sender_name),
                    'message' => e($wish->message),
                    'attendance_status' => $wish->attendance_status,
                    'guest_count' => $wish->guest_count,
                    'created_at' => $wish->created_at ? $wish->created_at->diffForHumans() : '',
                    'formatted_time' => $wish->formatted_created_at,
                ];
            });

        return response()->json([
            'success' => true,
            'data' => $wishes,
            'total' => $wishes->count(),
        ]);
    }

    /**
     * Gửi lời chúc mới cho thiệp cưới
     */
    public function store(Request $request, string|int $cardId): JsonResponse
    {
        $card = is_numeric($cardId)
            ? WeddingCard::find($cardId)
            : WeddingCard::where('identifyWedding', $cardId)->first();

        if (!$card) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy thông tin thiệp cưới.',
            ], 404);
        }

        // Kiểm tra thiệp có bị khóa không
        if ($card->status === 'locked') {
            return response()->json([
                'success' => false,
                'message' => 'Thiệp cưới này hiện đang tạm đóng nhận lời chúc.',
            ], 403);
        }

        $validated = $request->validate([
            'sender_name' => 'required|string|max:100',
            'message' => 'required|string|max:1000',
            'attendance_status' => 'nullable|string|in:attending,not_attending,unsure',
            'guest_count' => 'nullable|integer|min:1|max:10',
        ], [
            'sender_name.required' => 'Vui lòng nhập tên của bạn.',
            'sender_name.max' => 'Tên không được vượt quá 100 ký tự.',
            'message.required' => 'Vui lòng nhập lời chúc.',
            'message.max' => 'Lời chúc không được vượt quá 1000 ký tự.',
        ]);

        $attendanceStatus = $validated['attendance_status'] ?? 'unsure';
        $guestCount = isset($validated['guest_count']) ? (int) $validated['guest_count'] : 1;

        $wish = WeddingWish::create([
            'wedding_card_id' => $card->id,
            'sender_name' => strip_tags(trim($validated['sender_name'])),
            'message' => strip_tags(trim($validated['message'])),
            'attendance_status' => $attendanceStatus,
            'guest_count' => $guestCount,
            'is_approved' => true, // Mặc định hiển thị, admin có thể ẩn nếu cần
            'ip_address' => $request->ip(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Gửi lời chúc thành công! Cảm ơn bạn rất nhiều.',
            'data' => [
                'id' => $wish->id,
                'sender_name' => e($wish->sender_name),
                'message' => e($wish->message),
                'attendance_status' => $wish->attendance_status,
                'guest_count' => $wish->guest_count,
                'created_at' => 'Vừa xong',
                'formatted_time' => $wish->formatted_created_at,
            ],
        ], 201);
    }

    /**
     * Trang xem Lời chúc & Xác nhận tham dự (RSVP) dành riêng cho từng thiệp cưới
     */
    public function cardGuestbook(Request $request, string|int $key): View
    {
        $card = is_numeric($key)
            ? WeddingCard::find($key)
            : WeddingCard::where('identifyWedding', $key)->first();

        if (!$card) {
            abort(404, 'Không tìm thấy thông tin thiệp cưới.');
        }

        $query = WeddingWish::where('wedding_card_id', $card->id)->approved()->latest();

        // Lọc theo trạng thái tham dự
        $attendance = $request->input('attendance', 'all');
        if ($attendance && $attendance !== 'all') {
            $query->where('attendance_status', $attendance);
        }

        // Tìm kiếm tên khách hoặc lời chúc
        if ($search = trim((string) $request->input('search'))) {
            $query->where(function ($q) use ($search) {
                $q->where('sender_name', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        // Thống kê riêng cho thiệp này
        $baseWishes = WeddingWish::where('wedding_card_id', $card->id)->approved();
        $stats = [
            'total' => (clone $baseWishes)->count(),
            'attending_count' => (clone $baseWishes)->where('attendance_status', 'attending')->count(),
            'attending_guests' => (clone $baseWishes)->where('attendance_status', 'attending')->sum('guest_count'),
            'declined_count' => (clone $baseWishes)->where('attendance_status', 'not_attending')->count(),
            'unsure_count' => (clone $baseWishes)->where('attendance_status', 'unsure')->count(),
        ];

        $wishes = $query->paginate(20)->withQueryString();

        return view('guestbook.card_wishes', compact('card', 'wishes', 'stats'));
    }

    /**
     * Xuất danh sách khách mời & lời chúc của riêng thiệp này ra file CSV/Excel
     */
    public function exportCardWishes(Request $request, string|int $key): StreamedResponse
    {
        $card = is_numeric($key)
            ? WeddingCard::find($key)
            : WeddingCard::where('identifyWedding', $key)->first();

        if (!$card) {
            abort(404, 'Không tìm thấy thông tin thiệp cưới.');
        }

        $query = WeddingWish::where('wedding_card_id', $card->id)->approved()->latest();

        if ($attendance = $request->input('attendance')) {
            if ($attendance !== 'all') {
                $query->where('attendance_status', $attendance);
            }
        }

        if ($search = trim((string) $request->input('search'))) {
            $query->where(function ($q) use ($search) {
                $q->where('sender_name', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $wishes = $query->get();
        $slug = $card->identifyWedding ?: ('thiep-' . $card->id);
        $filename = 'danh-sach-khach-rsvp-' . $slug . '-' . date('d-m-Y') . '.csv';

        return response()->streamDownload(function () use ($wishes, $card) {
            $file = fopen('php://output', 'w');
            // Ghi UTF-8 BOM
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($file, [
                'STT',
                'Họ và Tên Khách',
                'Xác Nhận Tham Dự',
                'Số Người Tham Dự',
                'Lời Chúc',
                'Thời Gian Gửi',
            ]);

            $stt = 1;
            foreach ($wishes as $wish) {
                fputcsv($file, [
                    $stt++,
                    $wish->sender_name,
                    match($wish->attendance_status) {
                        'attending' => 'Sẽ tham dự',
                        'not_attending' => 'Không thể tham dự',
                        default => 'Chưa rõ',
                    },
                    $wish->attendance_status === 'attending' ? ($wish->guest_count ?: 1) : 0,
                    $wish->message,
                    $wish->formatted_created_at,
                ]);
            }

            fclose($file);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
