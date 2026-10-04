<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WeddingCard;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WeddingCardController extends Controller
{
    /**
     * Danh sách thiệp cưới kèm tìm kiếm, lọc và phân trang.
     */
    public function index(Request $request): View
    {
        $query = WeddingCard::query();

        // 1. Tìm kiếm đa tiêu chí: tên, email, sđt, slug/url
        if ($search = trim((string) $request->input('search'))) {
            $query->where(function ($q) use ($search) {
                $q->where('bride_name', 'like', "%{$search}%")
                    ->orWhere('groom_name', 'like', "%{$search}%")
                    ->orWhere('customer_email', 'like', "%{$search}%")
                    ->orWhere('identifyWedding', 'like', "%{$search}%")
                    ->orWhere('bride_phone', 'like', "%{$search}%")
                    ->orWhere('groom_phone', 'like', "%{$search}%");
            });
        }

        // 2. Lọc theo trạng thái
        if ($status = $request->input('status')) {
            if ($status !== 'all') {
                $query->where('status', $status);
            }
        }

        // 3. Lọc theo khoảng ngày (date range: 'dd/mm/yyyy - dd/mm/yyyy' hoặc date_from, date_to)
        if ($dateRange = $request->input('date_range')) {
            $dates = explode(' - ', $dateRange);
            if (count($dates) === 2) {
                try {
                    $startDate = Carbon::createFromFormat('d/m/Y', trim($dates[0]))->startOfDay();
                    $endDate = Carbon::createFromFormat('d/m/Y', trim($dates[1]))->endOfDay();
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                } catch (\Exception $e) {
                    // Bỏ qua nếu định dạng ngày không hợp lệ
                }
            }
        } elseif ($request->filled('date_from') && $request->filled('date_to')) {
            try {
                $startDate = Carbon::parse($request->input('date_from'))->startOfDay();
                $endDate = Carbon::parse($request->input('date_to'))->endOfDay();
                $query->whereBetween('created_at', [$startDate, $endDate]);
            } catch (\Exception $e) {
                // Ignore
            }
        }

        // Sắp xếp ID giảm dần (mới nhất lên đầu)
        $cards = $query->orderByDesc('id')->paginate(10)->withQueryString();

        // Đếm số lượng theo trạng thái để hiển thị thống kê
        $totalCount = WeddingCard::count();
        $activeCount = WeddingCard::where('status', 'active')->count();
        $lockedCount = WeddingCard::where('status', 'locked')->count();
        $draftCount = WeddingCard::where('status', 'draft')->count();

        return view('admin.wedding-cards.index', compact(
            'cards',
            'totalCount',
            'activeCount',
            'lockedCount',
            'draftCount'
        ));
    }

    /**
     * Bật/Tắt nhanh trạng thái hiển thị (Đang hoạt động <-> Đã ẩn)
     */
    public function toggleStatus(Request $request, int|string $id): JsonResponse|RedirectResponse
    {
        $card = WeddingCard::findOrFail($id);

        if ($card->status === 'active') {
            $card->status = 'locked';
            $message = "Đã ẩn (khóa) thiệp #{$card->formatted_id} thành công.";
        } else {
            $card->status = 'active';
            $message = "Đã kích hoạt thiệp #{$card->formatted_id} thành công.";
        }

        $card->save();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'status' => $card->status,
                'status_info' => $card->status_info,
                'message' => $message,
            ]);
        }

        return back()->with('success', $message);
    }

    /**
     * Lấy thông tin khách hàng / khách mời (dành cho modal chi tiết)
     */
    public function getCustomerInfo(int|string $id): JsonResponse
    {
        $card = WeddingCard::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $card->id,
                'formatted_id' => $card->formatted_id,
                'couple_name' => $card->couple_name,
                'customer_email' => $card->customer_email ?: 'Chưa cập nhật',
                'bride_name' => $card->bride_name,
                'bride_phone' => $card->bride_phone ?: 'Chưa cập nhật',
                'groom_name' => $card->groom_name,
                'groom_phone' => $card->groom_phone ?: 'Chưa cập nhật',
                'wedding_date' => $card->wedding_date?->format('d/m/Y') ?: 'Chưa thiết lập',
                'wedding_time' => $card->wedding_time ?: 'Chưa thiết lập',
                'name_place_wedding' => $card->name_place_wedding ?: 'Chưa cập nhật',
                'address_wedding' => $card->address_wedding ?: 'Chưa cập nhật',
                'identifyWedding' => $card->identifyWedding,
                'status' => $card->status_info['label'],
            ]
        ]);
    }

    /**
     * Xóa thiệp cưới khỏi hệ thống
     */
    public function destroy(int|string $id): RedirectResponse
    {
        $card = WeddingCard::findOrFail($id);
        $name = $card->couple_name;
        $formattedId = $card->formatted_id;

        $card->delete();

        return redirect()->route('admin.wedding-cards.index')
            ->with('success', "Đã xóa thiệp {$formattedId} ({$name}) thành công.");
    }
}
