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
                $attendanceLabel = match ($wish->attendance_status) {
                    'attending' => 'Sẽ tham dự',
                    'not_attending' => 'Không thể tham dự',
                    default => 'Chúc phúc',
                };
                $timeHuman = $wish->created_at ? $wish->created_at->diffForHumans() : 'Vừa xong';

                return [
                    'id' => $wish->id,
                    // Định dạng cho template cổ điển (01-21)
                    'sender_name' => e($wish->sender_name),
                    'message' => e($wish->message),
                    'attendance_status' => $wish->attendance_status,
                    'guest_count' => $wish->guest_count,
                    'created_at' => $timeHuman,
                    'formatted_time' => $wish->formatted_created_at,
                    // Định dạng tương thích cho template hiện đại (22-35)
                    'name' => e($wish->sender_name),
                    'wish' => e($wish->message),
                    'side' => 'Khách quý',
                    'attendance' => $attendanceLabel,
                    'time' => $timeHuman,
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

        // Linh hoạt nhận diện tên trường giữa các template (sender_name / name, message / wish)
        $senderName = trim((string) ($request->input('sender_name') ?: $request->input('name', '')));
        $message = trim((string) ($request->input('message') ?: $request->input('wish', '')));
        $rawAttendance = trim((string) ($request->input('attendance_status') ?: $request->input('attendance', '')));
        $side = trim((string) $request->input('side', 'Khách quý'));
        $guestCount = (int) $request->input('guest_count', 1);
        if ($guestCount < 1) $guestCount = 1;

        if (empty($senderName)) {
            return response()->json([
                'success' => false,
                'message' => 'Vui lòng nhập họ và tên của bạn.',
            ], 422);
        }

        if (empty($message)) {
            return response()->json([
                'success' => false,
                'message' => 'Vui lòng nhập lời chúc mừng.',
            ], 422);
        }

        if (mb_strlen($senderName) > 100) {
            return response()->json([
                'success' => false,
                'message' => 'Tên không được vượt quá 100 ký tự.',
            ], 422);
        }

        if (mb_strlen($message) > 1000) {
            return response()->json([
                'success' => false,
                'message' => 'Lời chúc không được vượt quá 1000 ký tự.',
            ], 422);
        }

        // Chuẩn hóa trạng thái tham dự
        $attendanceLower = mb_strtolower($rawAttendance);
        if (str_contains($attendanceLower, 'tham dự') || str_contains($attendanceLower, 'attending') || str_contains($attendanceLower, 'có') || $attendanceLower === 'yes') {
            $attendanceStatus = 'attending';
            $attendanceLabel = 'Sẽ tham dự';
        } elseif (str_contains($attendanceLower, 'không') || str_contains($attendanceLower, 'tiếc') || str_contains($attendanceLower, 'bận') || str_contains($attendanceLower, 'not_attending') || $attendanceLower === 'no') {
            $attendanceStatus = 'not_attending';
            $attendanceLabel = 'Không thể tham dự';
        } else {
            $attendanceStatus = 'unsure';
            $attendanceLabel = 'Chúc phúc';
        }

        $wish = WeddingWish::create([
            'wedding_card_id' => $card->id,
            'sender_name' => strip_tags($senderName),
            'message' => strip_tags($message),
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
                // Định dạng cũ
                'sender_name' => e($wish->sender_name),
                'message' => e($wish->message),
                'attendance_status' => $wish->attendance_status,
                'guest_count' => $wish->guest_count,
                'created_at' => 'Vừa xong',
                'formatted_time' => $wish->formatted_created_at,
                // Định dạng mới (Template 22-35)
                'name' => e($wish->sender_name),
                'wish' => e($wish->message),
                'side' => e($side ?: 'Khách quý'),
                'attendance' => $attendanceLabel,
                'time' => 'Vừa gửi xong',
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
