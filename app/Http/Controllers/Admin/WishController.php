<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WeddingCard;
use App\Models\WeddingWish;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class WishController extends Controller
{
    /**
     * Danh sách lời chúc kèm tìm kiếm, lọc và phân trang.
     */
    public function index(Request $request): View
    {
        $query = WeddingWish::with('weddingCard')->latest();

        // 1. Lọc theo thiệp cưới
        if ($cardId = $request->input('card_id')) {
            if ($cardId !== 'all') {
                $query->where('wedding_card_id', $cardId);
            }
        }

        // 2. Lọc theo trạng thái duyệt
        if ($status = $request->input('status')) {
            if ($status === 'approved') {
                $query->where('is_approved', true);
            } elseif ($status === 'hidden') {
                $query->where('is_approved', false);
            }
        }

        // 3. Lọc theo xác nhận tham dự (RSVP)
        if ($attendance = $request->input('attendance')) {
            if ($attendance !== 'all') {
                $query->where('attendance_status', $attendance);
            }
        }

        // 4. Tìm kiếm từ khóa: Tên người gửi, nội dung lời chúc
        if ($search = trim((string) $request->input('search'))) {
            $query->where(function ($q) use ($search) {
                $q->where('sender_name', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");
            });
        }

        // 5. Lọc theo khoảng ngày gửi
        if ($dateRange = trim((string) $request->input('date_range'))) {
            $dates = $this->parseDateRange($dateRange);
            if ($dates) {
                $query->whereBetween('created_at', [
                    $dates[0]->startOfDay(),
                    $dates[1]->endOfDay(),
                ]);
            }
        }

        // Thống kê nhanh (KPI)
        $stats = [
            'total' => WeddingWish::count(),
            'approved' => WeddingWish::where('is_approved', true)->count(),
            'hidden' => WeddingWish::where('is_approved', false)->count(),
            'attending_guests' => WeddingWish::where('attendance_status', 'attending')->sum('guest_count'),
        ];

        // Danh sách tất cả thiệp để hiển thị dropdown filter
        $cards = WeddingCard::select('id', 'identifyWedding', 'groom_name', 'bride_name')
            ->orderBy('id', 'desc')
            ->get();

        $wishes = $query->paginate(15)->withQueryString();

        return view('admin.wishes.index', compact('wishes', 'cards', 'stats'));
    }

    /**
     * Bật / Tắt duyệt hiển thị lời chúc qua AJAX
     */
    public function toggleApproval(int $id): JsonResponse
    {
        $wish = WeddingWish::findOrFail($id);
        $wish->is_approved = !$wish->is_approved;
        $wish->save();

        return response()->json([
            'success' => true,
            'is_approved' => $wish->is_approved,
            'message' => $wish->is_approved
                ? 'Đã bật hiển thị lời chúc này trên thiệp.'
                : 'Đã ẩn lời chúc này khỏi thiệp cưới.',
        ]);
    }

    /**
     * Xóa lời chúc
     */
    public function destroy(int $id, Request $request): JsonResponse|RedirectResponse
    {
        $wish = WeddingWish::findOrFail($id);
        $wish->delete();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Đã xóa lời chúc thành công.',
            ]);
        }

        return redirect()->route('admin.wishes.index')
            ->with('success', 'Đã xóa lời chúc thành công.');
    }

    /**
     * Xuất danh sách lời chúc ra file CSV (hỗ trợ tiếng Việt UTF-8 BOM)
     */
    public function export(Request $request): StreamedResponse
    {
        $query = WeddingWish::with('weddingCard')->latest();

        if ($cardId = $request->input('card_id')) {
            if ($cardId !== 'all') {
                $query->where('wedding_card_id', $cardId);
            }
        }

        if ($status = $request->input('status')) {
            if ($status === 'approved') {
                $query->where('is_approved', true);
            } elseif ($status === 'hidden') {
                $query->where('is_approved', false);
            }
        }

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
        $filename = 'danh-sach-loi-chuc-' . date('d-m-Y-His') . '.csv';

        return response()->streamDownload(function () use ($wishes) {
            $file = fopen('php://output', 'w');
            // Ghi UTF-8 BOM để Excel hiển thị đúng dấu tiếng Việt
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($file, [
                'ID',
                'Mã Thiệp',
                'Cặp Đôi',
                'Người Gửi',
                'Nội Dung Lời Chúc',
                'Xác Nhận Tham Dự',
                'Số Khách Đi Cùng',
                'Trạng Thái Hiển Thị',
                'Ngày Gửi',
            ]);

            foreach ($wishes as $wish) {
                $card = $wish->weddingCard;
                fputcsv($file, [
                    $wish->id,
                    $card ? $card->formatted_id : '',
                    $card ? $card->couple_name : '',
                    $wish->sender_name,
                    $wish->message,
                    $wish->attendance_label,
                    $wish->guest_count,
                    $wish->is_approved ? 'Hiển thị' : 'Đang ẩn',
                    $wish->formatted_created_at,
                ]);
            }

            fclose($file);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    /**
     * Phân tách chuỗi ngày: '01/01/2026 - 13/10/2026' hoặc '01/01/2026 to 13/10/2026'
     */
    private function parseDateRange(string $range): ?array
    {
        $parts = preg_split('/\s*(-|to)\s*/', $range);
        if (count($parts) === 2) {
            try {
                $start = Carbon::createFromFormat('d/m/Y', trim($parts[0]));
                $end = Carbon::createFromFormat('d/m/Y', trim($parts[1]));
                if ($start && $end) {
                    return [$start, $end];
                }
            } catch (\Exception $e) {
                return null;
            }
        }
        return null;
    }
}
