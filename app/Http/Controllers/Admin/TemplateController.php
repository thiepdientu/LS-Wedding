<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WeddingCard;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TemplateController extends Controller
{
    /**
     * Danh sách các mẫu giao diện (Templates) dạng lưới
     */
    public function index(Request $request): View
    {
        $allTemplates = WeddingCard::getTemplateOptions();
        $totalCards = WeddingCard::count();

        // Thống kê số lượng thiệp theo từng template
        $usageCounts = WeddingCard::selectRaw('template, count(*) as total')
            ->groupBy('template')
            ->pluck('total', 'template')
            ->toArray();

        // Metadata bổ sung cho từng template (phong cách, màu sắc, nhãn)
        $metadata = [
            '1' => ['style' => 'Hiện đại & Tối giản', 'badge' => 'Phổ biến', 'badge_class' => 'bg-indigo-50 text-indigo-700 ring-indigo-200', 'gradient' => 'from-indigo-500 to-blue-600'],
            '1n' => ['style' => 'Hiện đại New 2026', 'badge' => 'Mới', 'badge_class' => 'bg-emerald-50 text-emerald-700 ring-emerald-200', 'gradient' => 'from-emerald-500 to-teal-600'],
            '2' => ['style' => 'Cổ điển & Hoài niệm', 'badge' => 'Hot', 'badge_class' => 'bg-amber-50 text-amber-700 ring-amber-200', 'gradient' => 'from-amber-500 to-orange-600'],
            '3' => ['style' => 'Hoa lá thiên nhiên (Floral)', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-rose-50 text-rose-700 ring-rose-200', 'gradient' => 'from-rose-500 to-pink-600'],
            '4' => ['style' => 'Gam màu Pastel ngọt ngào', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-purple-50 text-purple-700 ring-purple-200', 'gradient' => 'from-purple-500 to-indigo-600'],
            '5' => ['style' => 'Hoàng gia & Quý phái', 'badge' => 'VIP', 'badge_class' => 'bg-amber-50 text-amber-700 ring-amber-200', 'gradient' => 'from-yellow-500 to-amber-600'],
            '6' => ['style' => 'Thiên nhiên tươi mát', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-emerald-50 text-emerald-700 ring-emerald-200', 'gradient' => 'from-emerald-600 to-green-700'],
            '7' => ['style' => 'Nghệ thuật & Tinh tế', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-sky-50 text-sky-700 ring-sky-200', 'gradient' => 'from-sky-500 to-cyan-600'],
            '8' => ['style' => 'Đỏ truyền thống Á Đông', 'badge' => 'Truyền thống', 'badge_class' => 'bg-red-50 text-red-700 ring-red-200', 'gradient' => 'from-red-600 to-rose-700'],
            '9' => ['style' => 'Phong cách Bắc Âu (Nordic)', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-slate-100 text-slate-700 ring-slate-200', 'gradient' => 'from-slate-600 to-slate-800'],
            '10' => ['style' => 'Lãng mạn Sweet Pink', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-pink-50 text-pink-700 ring-pink-200', 'gradient' => 'from-pink-500 to-rose-500'],
            '11' => ['style' => 'Thanh tao & Quý phái', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-violet-50 text-violet-700 ring-violet-200', 'gradient' => 'from-violet-500 to-purple-600'],
            '12' => ['style' => 'Hiện đại & Trẻ trung', 'badge' => 'Mới', 'badge_class' => 'bg-teal-50 text-teal-700 ring-teal-200', 'gradient' => 'from-teal-500 to-emerald-600'],
            '13' => ['style' => 'Quyến rũ & Tỏa sáng', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-fuchsia-50 text-fuchsia-700 ring-fuchsia-200', 'gradient' => 'from-fuchsia-500 to-pink-600'],
            '14' => ['style' => 'Bay bổng & Mộng mơ', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-blue-50 text-blue-700 ring-blue-200', 'gradient' => 'from-blue-400 to-indigo-500'],
            '15' => ['style' => 'Nhiệt đới rực rỡ', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-lime-50 text-lime-700 ring-lime-200', 'gradient' => 'from-lime-500 to-green-600'],
            '16' => ['style' => 'Nhẹ nhàng & Tinh khiết', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-cyan-50 text-cyan-700 ring-cyan-200', 'gradient' => 'from-cyan-500 to-blue-500'],
            '17' => ['style' => 'Phong cách Cung đình', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-yellow-50 text-yellow-700 ring-yellow-200', 'gradient' => 'from-amber-600 to-yellow-600'],
            '18' => ['style' => 'Mộc mạc & Ấm cúng', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-stone-50 text-stone-700 ring-stone-200', 'gradient' => 'from-stone-500 to-amber-700'],
            '19' => ['style' => 'Quý tộc & Quyền lực', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-indigo-50 text-indigo-700 ring-indigo-200', 'gradient' => 'from-indigo-600 to-violet-700'],
            '20' => ['style' => 'Thời thượng & Phá cách', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-rose-50 text-rose-700 ring-rose-200', 'gradient' => 'from-rose-500 to-red-600'],
            '21' => ['style' => 'Tối giản & Trọng tâm', 'badge' => 'Đang phát hành', 'badge_class' => 'bg-slate-50 text-slate-700 ring-slate-200', 'gradient' => 'from-slate-500 to-slate-700'],
        ];

        $templates = [];
        $mostUsedTemplate = null;
        $maxUsage = -1;

        foreach ($allTemplates as $code => $name) {
            $count = $usageCounts[(string) $code] ?? 0;
            $percent = $totalCards > 0 ? round(($count / $totalCards) * 100, 1) : 0;
            $meta = $metadata[(string) $code] ?? [
                'style' => 'Phong cách Tiêu chuẩn',
                'badge' => 'Đang phát hành',
                'badge_class' => 'bg-slate-100 text-slate-700 ring-slate-200',
                'gradient' => 'from-indigo-500 to-purple-600'
            ];

            if ($count > $maxUsage) {
                $maxUsage = $count;
                $mostUsedTemplate = $name;
            }

            $templates[] = [
                'code' => (string) $code,
                'name' => $name,
                'style' => $meta['style'],
                'badge' => $meta['badge'],
                'badge_class' => $meta['badge_class'],
                'gradient' => $meta['gradient'],
                'used_count' => $count,
                'percentage' => $percent,
                'demo_url' => url('/template/' . $code),
                'create_url' => route('wedding.create', ['template' => $code]),
            ];
        }

        $totalTemplates = count($allTemplates);

        return view('admin.templates.index', compact(
            'templates',
            'totalTemplates',
            'totalCards',
            'mostUsedTemplate'
        ));
    }
}
