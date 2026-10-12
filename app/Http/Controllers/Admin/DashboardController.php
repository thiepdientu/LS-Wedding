<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WeddingCard;
use Carbon\Carbon;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Hiển thị bảng điều khiển tổng quan Admin
     */
    public function index(): View
    {
        $today = Carbon::today();
        $in14Days = Carbon::today()->addDays(14)->endOfDay();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // 4 Chỉ số KPI cốt lõi
        $totalCards = WeddingCard::count();
        $activeCards = WeddingCard::where('status', 'active')->count();
        $upcomingCount = WeddingCard::whereNotNull('wedding_date')
            ->whereBetween('wedding_date', [$today, $in14Days])
            ->count();
        $newCardsThisMonth = WeddingCard::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->count();

        // Đám cưới sắp diễn ra gần nhất (từ hôm nay trở đi)
        $upcomingWeddings = WeddingCard::whereNotNull('wedding_date')
            ->where('wedding_date', '>=', $today)
            ->orderBy('wedding_date', 'asc')
            ->orderBy('wedding_time', 'asc')
            ->limit(6)
            ->get();

        // Danh sách thiệp mới tạo gần đây
        $recentCards = WeddingCard::orderByDesc('id')
            ->limit(6)
            ->get();

        return view('admin.dashboard.index', compact(
            'totalCards',
            'activeCards',
            'upcomingCount',
            'newCardsThisMonth',
            'upcomingWeddings',
            'recentCards'
        ));
    }
}
