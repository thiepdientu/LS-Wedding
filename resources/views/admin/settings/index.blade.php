@extends('layouts.admin')

@section('title', 'Cài đặt hệ thống - WeddingSaaS')

@section('content')
<div class="px-6 py-8 max-w-7xl w-full mx-auto space-y-6">

    <!-- Top Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">
                <span>Quản trị</span>
                <span>/</span>
                <span class="text-indigo-600">Cài đặt hệ thống</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight flex items-center gap-2.5">
                <span>Cài đặt hệ thống</span>
                <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-600 border border-slate-200">
                    Phiên bản 2.4
                </span>
            </h1>
            <p class="text-sm text-slate-500 mt-1">Cấu hình thông số thương hiệu, quy chuẩn thiệp cưới và kiểm tra tiện ích vận hành.</p>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" form="settings-form"
                    class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-xl shadow-xs hover:shadow transition-all duration-150 active:scale-98 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>Lưu tất cả cài đặt</span>
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-800">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    @endif

    @if($errors->any())
        <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-sm space-y-1">
            <div class="flex items-center gap-2 font-semibold">
                <svg class="w-5 h-5 text-rose-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Có lỗi xảy ra, vui lòng kiểm tra lại:</span>
            </div>
            <ul class="list-disc list-inside text-xs pl-5 space-y-0.5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Tab Navigation -->
    <div class="border-b border-slate-200/80">
        <nav class="flex gap-2 sm:gap-4 -mb-px" aria-label="Tabs">
            <!-- Tab 1 Button -->
            <button type="button" 
                    onclick="switchTab('general')"
                    id="tab-btn-general"
                    class="tab-btn flex items-center gap-2 py-3 px-4 text-sm font-semibold border-b-2 border-indigo-600 text-indigo-600 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                <span>Thông tin chung & Hỗ trợ</span>
            </button>

            <!-- Tab 2 Button -->
            <button type="button" 
                    onclick="switchTab('wedding')"
                    id="tab-btn-wedding"
                    class="tab-btn flex items-center gap-2 py-3 px-4 text-sm font-medium border-b-2 border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
                <span>Quy chuẩn Thiệp cưới</span>
            </button>

            <!-- Tab 3 Button -->
            <button type="button" 
                    onclick="switchTab('system')"
                    id="tab-btn-system"
                    class="tab-btn flex items-center gap-2 py-3 px-4 text-sm font-medium border-b-2 border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span>Tiện ích & Cloud S3</span>
            </button>
        </nav>
    </div>

    <!-- Form Cài Đặt (Cho Tab 1 & Tab 2) -->
    <form id="settings-form" action="{{ route('admin.settings.update') }}" method="POST">
        @csrf

        <!-- TAB 1: THÔNG TIN CHUNG & HỖ TRỢ -->
        <div id="tab-content-general" class="tab-pane space-y-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- Thẻ 1: Thông tin thương hiệu -->
                <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-5">
                    <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-bold text-slate-900">Thương hiệu & Tên miền</h2>
                            <p class="text-xs text-slate-400 mt-0.5">Thông tin định danh hiển thị trên thanh tiêu đề và link thiệp.</p>
                        </div>
                        <span class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                        </span>
                    </div>

                    <!-- site_name -->
                    <div class="space-y-1.5">
                        <label for="site_name" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">
                            Tên hệ thống / Thương hiệu <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="site_name" id="site_name" 
                               value="{{ old('site_name', $settings['site_name'] ?? 'WeddingSaaS') }}"
                               placeholder="vd: WeddingSaaS, LS Wedding"
                               required
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-colors">
                        <p class="text-[11px] text-slate-400">Hiển thị trên tiêu đề tab trình duyệt và thanh điều hướng Admin.</p>
                    </div>

                    <!-- site_slogan -->
                    <div class="space-y-1.5">
                        <label for="site_slogan" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">
                            Slogan nền tảng
                        </label>
                        <input type="text" name="site_slogan" id="site_slogan" 
                               value="{{ old('site_slogan', $settings['site_slogan'] ?? '') }}"
                               placeholder="vd: Nền tảng tạo thiệp cưới trực tuyến chuyên nghiệp"
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-colors">
                    </div>

                    <!-- default_domain -->
                    <div class="space-y-1.5">
                        <label for="default_domain" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">
                            Tên miền thiệp mặc định <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm">https://</span>
                            <input type="text" name="default_domain" id="default_domain" 
                                   value="{{ old('default_domain', $settings['default_domain'] ?? 'wed.vn') }}"
                                   placeholder="wed.vn"
                                   required
                                   class="w-full pl-20 pr-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-colors">
                        </div>
                        <p class="text-[11px] text-slate-400">Tiền tố hiển thị liên kết chia sẻ của thiệp (vd: https://wed.vn/duy-linh-2026).</p>
                    </div>
                </div>

                <!-- Thẻ 2: Thông tin Hỗ trợ khách hàng -->
                <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-5">
                    <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-bold text-slate-900">Liên hệ & Kênh CSKH</h2>
                            <p class="text-xs text-slate-400 mt-0.5">Thông tin liên lạc giúp cô dâu chú rể kết nối hỗ trợ kỹ thuật.</p>
                        </div>
                        <span class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </span>
                    </div>

                    <!-- hotline -->
                    <div class="space-y-1.5">
                        <label for="hotline" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">
                            Hotline hỗ trợ
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </span>
                            <input type="text" name="hotline" id="hotline" 
                                   value="{{ old('hotline', $settings['hotline'] ?? '') }}"
                                   placeholder="vd: 0988 888 888"
                                   class="w-full pl-10 pr-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-colors">
                        </div>
                    </div>

                    <!-- zalo_url -->
                    <div class="space-y-1.5">
                        <label for="zalo_url" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">
                            Link Zalo CSKH
                        </label>
                        <input type="text" name="zalo_url" id="zalo_url" 
                               value="{{ old('zalo_url', $settings['zalo_url'] ?? '') }}"
                               placeholder="vd: https://zalo.me/0988888888"
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-colors">
                        <p class="text-[11px] text-slate-400">Đường dẫn mở cửa sổ chat Zalo trực tiếp.</p>
                    </div>

                    <!-- facebook_url -->
                    <div class="space-y-1.5">
                        <label for="facebook_url" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">
                            Fanpage Facebook
                        </label>
                        <input type="text" name="facebook_url" id="facebook_url" 
                               value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}"
                               placeholder="vd: https://facebook.com/lswedding"
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-colors">
                    </div>
                </div>

            </div>
        </div>

        <!-- TAB 2: QUY CHUẨN THIỆP CƯỚI -->
        <div id="tab-content-wedding" class="tab-pane hidden space-y-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- Thẻ 1: Thời hạn & Dung lượng -->
                <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-5">
                    <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-bold text-slate-900">Thời hạn & Dung lượng lưu trữ</h2>
                            <p class="text-xs text-slate-400 mt-0.5">Kiểm soát tài nguyên bộ nhớ và chu kỳ hoạt động của thiệp.</p>
                        </div>
                        <span class="w-8 h-8 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </span>
                    </div>

                    <!-- default_card_validity_months -->
                    <div class="space-y-1.5">
                        <label for="default_card_validity_months" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">
                            Thời hạn hiển thị mặc định (Số tháng) <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" min="1" max="120" name="default_card_validity_months" id="default_card_validity_months" 
                                   value="{{ old('default_card_validity_months', $settings['default_card_validity_months'] ?? '12') }}"
                                   required
                                   class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-colors">
                            <span class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 text-sm">tháng</span>
                        </div>
                        <p class="text-[11px] text-slate-400">Số tháng thiệp được phép hoạt động kể từ ngày tổ chức lễ thành hôn.</p>
                    </div>

                    <!-- max_album_photos -->
                    <div class="space-y-1.5">
                        <label for="max_album_photos" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">
                            Số ảnh tối đa trong Album cưới <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative">
                            <input type="number" min="1" max="200" name="max_album_photos" id="max_album_photos" 
                                   value="{{ old('max_album_photos', $settings['max_album_photos'] ?? '30') }}"
                                   required
                                   class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium text-slate-900 focus:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-600 transition-colors">
                            <span class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 text-sm">ảnh / thiệp</span>
                        </div>
                        <p class="text-[11px] text-slate-400">Giới hạn số ảnh cô dâu chú rể có thể tải lên album để tối ưu tốc độ tải trang.</p>
                    </div>
                </div>

                <!-- Thẻ 2: Tính năng mặc định khi tạo mới -->
                <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-5">
                    <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-bold text-slate-900">Tính năng mặc định khi tạo mới</h2>
                            <p class="text-xs text-slate-400 mt-0.5">Cấu hình sẵn trạng thái bật/tắt các phân hệ khi khởi tạo một thiệp cưới.</p>
                        </div>
                        <span class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </span>
                    </div>

                    <!-- enable_guestbook_default -->
                    <div class="flex items-start justify-between gap-4 p-3.5 rounded-xl bg-slate-50 border border-slate-200/70">
                        <div>
                            <label for="enable_guestbook_default" class="text-sm font-semibold text-slate-800 cursor-pointer">
                                Cho phép gửi lời chúc (Guestbook)
                            </label>
                            <p class="text-xs text-slate-500 mt-0.5">Khách mời có thể gửi lời chúc mừng trực tiếp trên giao diện thiệp.</p>
                        </div>
                        <div class="flex items-center h-6">
                            <input type="checkbox" name="enable_guestbook_default" id="enable_guestbook_default" value="1"
                                   {{ old('enable_guestbook_default', $settings['enable_guestbook_default'] ?? '1') == '1' ? 'checked' : '' }}
                                   class="w-5 h-5 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500 cursor-pointer">
                        </div>
                    </div>

                    <!-- enable_banking_qr_default -->
                    <div class="flex items-start justify-between gap-4 p-3.5 rounded-xl bg-slate-50 border border-slate-200/70">
                        <div>
                            <label for="enable_banking_qr_default" class="text-sm font-semibold text-slate-800 cursor-pointer">
                                Bật Hộp mừng cưới (QR Ngân hàng)
                            </label>
                            <p class="text-xs text-slate-500 mt-0.5">Hiển thị mã QR tài khoản ngân hàng nhà trai & nhà gái để khách gửi quà mừng.</p>
                        </div>
                        <div class="flex items-center h-6">
                            <input type="checkbox" name="enable_banking_qr_default" id="enable_banking_qr_default" value="1"
                                   {{ old('enable_banking_qr_default', $settings['enable_banking_qr_default'] ?? '1') == '1' ? 'checked' : '' }}
                                   class="w-5 h-5 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500 cursor-pointer">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>

    <!-- TAB 3: TIỆN ÍCH HỆ THỐNG & CLOUD S3 -->
    <div id="tab-content-system" class="tab-pane hidden space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- Thẻ 1: AWS S3 Cloud Storage -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs flex flex-col justify-between space-y-5">
                <div class="space-y-4">
                    <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-bold text-slate-900">Lưu trữ Đám mây AWS S3</h2>
                            <p class="text-xs text-slate-400 mt-0.5">Dịch vụ lưu trữ toàn bộ ảnh đại diện, ảnh tiệc và media của thiệp cưới.</p>
                        </div>
                        <span class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 00-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
                        </span>
                    </div>

                    <div class="space-y-2.5 bg-slate-50 p-4 rounded-xl border border-slate-200/60 text-xs">
                        <div class="flex items-center justify-between">
                            <span class="text-slate-500 font-medium">S3 Bucket Name:</span>
                            <span class="font-mono font-semibold text-slate-800">{{ $s3Config['bucket'] }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-500 font-medium">S3 Region:</span>
                            <span class="font-mono font-semibold text-slate-800">{{ $s3Config['region'] }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-500 font-medium">Trạng thái cấu hình .env:</span>
                            @if($s3Config['configured'])
                                <span class="inline-flex items-center gap-1 font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Đã thiết lập
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 font-semibold text-rose-600 bg-rose-50 px-2 py-0.5 rounded-full border border-rose-200">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Chưa cấu hình
                                </span>
                            @endif
                        </div>
                    </div>

                    <div id="s3-test-result" class="hidden p-3.5 rounded-xl text-xs font-medium border transition-all"></div>
                </div>

                <div class="pt-2">
                    <button type="button" id="btn-test-s3" onclick="testS3Connection()"
                            class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-slate-900 hover:bg-slate-800 text-white font-medium text-sm rounded-xl shadow-xs transition-colors cursor-pointer">
                        <svg id="s3-spinner" class="w-4 h-4 hidden animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                        <svg id="s3-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Kiểm tra kết nối AWS S3</span>
                    </button>
                </div>
            </div>

            <!-- Thẻ 2: Quản lý Bộ nhớ đệm (Cache) -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs flex flex-col justify-between space-y-5">
                <div class="space-y-4">
                    <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                        <div>
                            <h2 class="text-base font-bold text-slate-900">Quản lý Bộ nhớ đệm (Cache)</h2>
                            <p class="text-xs text-slate-400 mt-0.5">Xóa cache ứng dụng khi vừa cập nhật template hoặc thay đổi cấu hình.</p>
                        </div>
                        <span class="w-8 h-8 rounded-lg bg-rose-50 text-rose-600 flex items-center justify-center">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </span>
                    </div>

                    <p class="text-xs text-slate-500 leading-relaxed">
                        Thực hiện đồng thời các tác vụ làm mới:
                        <br>• <strong>View Cache:</strong> Làm mới mã HTML giao diện Blade đã biên dịch.
                        <br>• <strong>Route & Config Cache:</strong> Cập nhật tức thì các đường dẫn và cấu hình hệ thống.
                        <br>• <strong>Settings Cache:</strong> Xóa bộ nhớ đệm cấu hình lưu tạm.
                    </p>

                    <div id="cache-clear-result" class="hidden p-3.5 rounded-xl text-xs font-medium border transition-all"></div>
                </div>

                <div class="pt-2">
                    <button type="button" id="btn-clear-cache" onclick="clearSystemCache()"
                            class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 font-medium text-sm rounded-xl shadow-xs transition-colors cursor-pointer">
                        <svg id="cache-spinner" class="w-4 h-4 hidden animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                        <svg id="cache-icon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        <span>Dọn dẹp toàn bộ Cache</span>
                    </button>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    // Tab switching logic
    function switchTab(tabName) {
        document.querySelectorAll('.tab-pane').forEach(el => el.classList.add('hidden'));
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('border-indigo-600', 'text-indigo-600');
            btn.classList.add('border-transparent', 'text-slate-500');
        });

        const targetPane = document.getElementById(`tab-content-${tabName}`);
        const targetBtn = document.getElementById(`tab-btn-${tabName}`);

        if (targetPane) targetPane.classList.remove('hidden');
        if (targetBtn) {
            targetBtn.classList.remove('border-transparent', 'text-slate-500');
            targetBtn.classList.add('border-indigo-600', 'text-indigo-600');
        }
    }

    // AJAX Test S3 Connection
    async function testS3Connection() {
        const btn = document.getElementById('btn-test-s3');
        const spinner = document.getElementById('s3-spinner');
        const icon = document.getElementById('s3-icon');
        const resultBox = document.getElementById('s3-test-result');

        btn.disabled = true;
        spinner.classList.remove('hidden');
        icon.classList.add('hidden');
        resultBox.classList.add('hidden');

        try {
            const response = await fetch("{{ route('admin.settings.test-s3') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            resultBox.classList.remove('hidden', 'bg-emerald-50', 'text-emerald-800', 'border-emerald-200', 'bg-rose-50', 'text-rose-800', 'border-rose-200');

            if (response.ok && data.success) {
                resultBox.classList.add('bg-emerald-50', 'text-emerald-800', 'border-emerald-200');
                resultBox.innerHTML = `<strong>Thành công:</strong> ${data.message}`;
                if (typeof window.showToast === 'function') window.showToast(data.message, 'success');
            } else {
                resultBox.classList.add('bg-rose-50', 'text-rose-800', 'border-rose-200');
                resultBox.innerHTML = `<strong>Thất bại:</strong> ${data.message || 'Không thể kết nối tới S3'}`;
                if (typeof window.showToast === 'function') window.showToast(data.message || 'Lỗi S3', 'error');
            }
        } catch (err) {
            resultBox.classList.remove('hidden');
            resultBox.classList.add('bg-rose-50', 'text-rose-800', 'border-rose-200');
            resultBox.innerHTML = `<strong>Lỗi kết nối:</strong> Không thể gửi yêu cầu kiểm tra tới máy chủ.`;
            if (typeof window.showToast === 'function') window.showToast('Lỗi gửi yêu cầu', 'error');
        } finally {
            btn.disabled = false;
            spinner.classList.add('hidden');
            icon.classList.remove('hidden');
        }
    }

    // AJAX Clear Cache
    async function clearSystemCache() {
        const btn = document.getElementById('btn-clear-cache');
        const spinner = document.getElementById('cache-spinner');
        const icon = document.getElementById('cache-icon');
        const resultBox = document.getElementById('cache-clear-result');

        btn.disabled = true;
        spinner.classList.remove('hidden');
        icon.classList.add('hidden');
        resultBox.classList.add('hidden');

        try {
            const response = await fetch("{{ route('admin.settings.clear-cache') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            resultBox.classList.remove('hidden', 'bg-emerald-50', 'text-emerald-800', 'border-emerald-200', 'bg-rose-50', 'text-rose-800', 'border-rose-200');

            if (response.ok && data.success) {
                resultBox.classList.add('bg-emerald-50', 'text-emerald-800', 'border-emerald-200');
                resultBox.innerHTML = `<strong>Thành công:</strong> ${data.message}`;
                if (typeof window.showToast === 'function') window.showToast(data.message, 'success');
            } else {
                resultBox.classList.add('bg-rose-50', 'text-rose-800', 'border-rose-200');
                resultBox.innerHTML = `<strong>Thất bại:</strong> ${data.message || 'Không thể dọn dẹp cache'}`;
                if (typeof window.showToast === 'function') window.showToast(data.message || 'Lỗi xóa cache', 'error');
            }
        } catch (err) {
            resultBox.classList.remove('hidden');
            resultBox.classList.add('bg-rose-50', 'text-rose-800', 'border-rose-200');
            resultBox.innerHTML = `<strong>Lỗi kết nối:</strong> Không thể gửi yêu cầu xóa cache.`;
            if (typeof window.showToast === 'function') window.showToast('Lỗi gửi yêu cầu', 'error');
        } finally {
            btn.disabled = false;
            spinner.classList.add('hidden');
            icon.classList.remove('hidden');
        }
    }
</script>
@endpush
