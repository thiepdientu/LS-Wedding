<?php

namespace App\Http\Controllers;

use App\Models\SystemSetting;
use App\Models\WeddingCard;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Hiển thị trang chủ giới thiệu nền tảng thiệp cưới (Landing Page)
     */
    public function index(): View
    {
        $settings = SystemSetting::getAll();

        // Danh sách toàn bộ mẫu thiệp với metadata phong cách
        $allTemplates = WeddingCard::getTemplateOptions();
        
        $metadata = [
            '1' => ['style' => 'Hiện đại & Tối giản', 'badge' => 'Phổ biến', 'badge_class' => 'bg-indigo-50 text-indigo-700 border-indigo-200', 'color' => '#4f46e5'],
            '1n' => ['style' => 'Hiện đại New 2026', 'badge' => 'Mới', 'badge_class' => 'bg-emerald-50 text-emerald-700 border-emerald-200', 'color' => '#10b981'],
            '2' => ['style' => 'Cổ điển & Hoài niệm', 'badge' => 'Hot', 'badge_class' => 'bg-amber-50 text-amber-700 border-amber-200', 'color' => '#f59e0b'],
            '3' => ['style' => 'Hoa lá tự nhiên (Floral)', 'badge' => 'Đang chuộng', 'badge_class' => 'bg-rose-50 text-rose-700 border-rose-200', 'color' => '#f43f5e'],
            '4' => ['style' => 'Pastel ngọt ngào', 'badge' => 'Thanh lịch', 'badge_class' => 'bg-purple-50 text-purple-700 border-purple-200', 'color' => '#a855f7'],
            '5' => ['style' => 'Hoàng gia Royal', 'badge' => 'VIP', 'badge_class' => 'bg-amber-50 text-amber-700 border-amber-200', 'color' => '#d97706'],
            '6' => ['style' => 'Thiên nhiên tươi mát', 'badge' => 'Tự nhiên', 'badge_class' => 'bg-emerald-50 text-emerald-700 border-emerald-200', 'color' => '#059669'],
            '7' => ['style' => 'Nghệ thuật & Tinh tế', 'badge' => 'Artistic', 'badge_class' => 'bg-sky-50 text-sky-700 border-sky-200', 'color' => '#0284c7'],
            '8' => ['style' => 'Truyền thống Á Đông', 'badge' => 'Song Hỷ', 'badge_class' => 'bg-red-50 text-red-700 border-red-200', 'color' => '#dc2626'],
            '9' => ['style' => 'Tối giản Bắc Âu (Nordic)', 'badge' => 'Minimal', 'badge_class' => 'bg-slate-100 text-slate-700 border-slate-200', 'color' => '#475569'],
            '10' => ['style' => 'Lãng mạn Sweet Pink', 'badge' => 'Ngọt ngào', 'badge_class' => 'bg-pink-50 text-pink-700 border-pink-200', 'color' => '#ec4899'],
            '11' => ['style' => 'Thanh tao & Quý phái', 'badge' => 'Elegance', 'badge_class' => 'bg-violet-50 text-violet-700 border-violet-200', 'color' => '#7c3aed'],
            '12' => ['style' => 'Trẻ trung & Thời thượng', 'badge' => 'Mới', 'badge_class' => 'bg-teal-50 text-teal-700 border-teal-200', 'color' => '#0d9488'],
            '13' => ['style' => 'Quyến rũ Glamour', 'badge' => 'Tỏa sáng', 'badge_class' => 'bg-fuchsia-50 text-fuchsia-700 border-fuchsia-200', 'color' => '#c026d3'],
            '14' => ['style' => 'Bay bổng & Mộng mơ', 'badge' => 'Dreamy', 'badge_class' => 'bg-blue-50 text-blue-700 border-blue-200', 'color' => '#2563eb'],
            '15' => ['style' => 'Nhiệt đới Tropical', 'badge' => 'Rực rỡ', 'badge_class' => 'bg-lime-50 text-lime-700 border-lime-200', 'color' => '#65a30d'],
            '16' => ['style' => 'Nhẹ nhàng & Tinh khiết', 'badge' => 'Subtle', 'badge_class' => 'bg-cyan-50 text-cyan-700 border-cyan-200', 'color' => '#0891b2'],
            '17' => ['style' => 'Cung đình Sang trọng', 'badge' => 'Quý tộc', 'badge_class' => 'bg-yellow-50 text-yellow-700 border-yellow-200', 'color' => '#ca8a04'],
            '18' => ['style' => 'Mộc mạc Rustic', 'badge' => 'Ấm cúng', 'badge_class' => 'bg-stone-50 text-stone-700 border-stone-200', 'color' => '#78716c'],
            '19' => ['style' => 'Quý phái Noble', 'badge' => 'Thời thượng', 'badge_class' => 'bg-indigo-50 text-indigo-700 border-indigo-200', 'color' => '#4338ca'],
            '20' => ['style' => 'Đương đại Contemporary', 'badge' => 'Phá cách', 'badge_class' => 'bg-rose-50 text-rose-700 border-rose-200', 'color' => '#e11d48'],
            '21' => ['style' => 'Đơn giản & Trọng tâm', 'badge' => 'Simple', 'badge_class' => 'bg-slate-50 text-slate-700 border-slate-200', 'color' => '#334155'],
            '22' => ['style' => 'Bì thư 3D Đỏ Đậm', 'badge' => 'Mới', 'badge_class' => 'bg-red-50 text-red-700 border-red-200', 'color' => '#991b1b'],
            '23' => ['style' => 'Bì thư 3D Nâu Đậm', 'badge' => 'Mới', 'badge_class' => 'bg-amber-50 text-amber-800 border-amber-200', 'color' => '#78350f'],
            '24' => ['style' => 'Hoa Mộc Xanh Classic', 'badge' => 'Hot', 'badge_class' => 'bg-emerald-50 text-emerald-700 border-emerald-200', 'color' => '#059669'],
            '25' => ['style' => 'Hoa Mộc Xanh New 3D', 'badge' => 'Mới 2026', 'badge_class' => 'bg-emerald-50 text-emerald-800 border-emerald-200', 'color' => '#047857'],
            '26' => ['style' => 'Minimalism Cửa Đôi Olive', 'badge' => 'Đặc sắc', 'badge_class' => 'bg-lime-50 text-lime-800 border-lime-200', 'color' => '#65a30d'],
            '27' => ['style' => 'Song Hỷ Đỏ Hoàng Gia', 'badge' => 'VIP', 'badge_class' => 'bg-red-50 text-red-700 border-red-200', 'color' => '#b91c1c'],
            '28' => ['style' => 'Song Hỷ Xanh Ngọc', 'badge' => 'Mới 2026', 'badge_class' => 'bg-teal-50 text-teal-800 border-teal-200', 'color' => '#0f766e'],
            '29' => ['style' => 'Song Long Xanh Navy Song Ngữ', 'badge' => 'Quý phái', 'badge_class' => 'bg-blue-50 text-blue-800 border-blue-200', 'color' => '#1e3a8a'],
            '30' => ['style' => 'Tơ Duyên Xanh Sage Thư Tình', 'badge' => 'Mới 2026', 'badge_class' => 'bg-emerald-50 text-emerald-700 border-emerald-200', 'color' => '#065f46'],
            '31' => ['style' => 'Tơ Duyên Hồng Phấn Hoa Sen', 'badge' => 'Ngọt ngào', 'badge_class' => 'bg-pink-50 text-pink-700 border-pink-200', 'color' => '#db2777'],
            '32' => ['style' => 'Cẩm Thạch Vàng Marble', 'badge' => 'VIP', 'badge_class' => 'bg-amber-50 text-amber-700 border-amber-200', 'color' => '#d97706'],
            '33' => ['style' => 'Cẩm Thạch Vàng Bụi Vàng 2027', 'badge' => 'Mới 2027', 'badge_class' => 'bg-yellow-50 text-yellow-800 border-yellow-200', 'color' => '#ca8a04'],
            '34' => ['style' => 'Anh Đào Hồng Sakura', 'badge' => 'Thơ mộng', 'badge_class' => 'bg-rose-50 text-rose-700 border-rose-200', 'color' => '#f43f5e'],
            '35' => ['style' => 'Anh Đào Hồng New Tone.js', 'badge' => 'Mới 2026', 'badge_class' => 'bg-pink-50 text-pink-800 border-pink-200', 'color' => '#e11d48'],
        ];

        $templates = [];
        foreach ($allTemplates as $code => $name) {
            $meta = $metadata[(string) $code] ?? [
                'style' => 'Phong cách Tiêu chuẩn',
                'badge' => 'Mẫu thiệp',
                'badge_class' => 'bg-slate-100 text-slate-700 border-slate-200',
                'color' => '#6366f1',
            ];

            $templates[] = [
                'code' => (string) $code,
                'name' => $name,
                'style' => $meta['style'],
                'badge' => $meta['badge'],
                'badge_class' => $meta['badge_class'],
                'color' => $meta['color'],
                'demo_url' => url('/template/' . $code),
            ];
        }

        $totalCards = WeddingCard::count();

        // Đường dẫn tư vấn chính (Zalo CSKH hoặc Hotline)
        $consultUrl = !empty($settings['zalo_url']) 
            ? $settings['zalo_url'] 
            : (!empty($settings['hotline']) ? 'tel:' . preg_replace('/[^0-9]/', '', $settings['hotline']) : '#');

        return view('welcome', compact('settings', 'templates', 'totalCards', 'consultUrl'));
    }
}
