@extends('layouts.admin')

@section('title', (isset($weddingCard) ? 'Chỉnh sửa Thiệp ' . $weddingCard->formatted_id : 'Thêm Thiệp Cưới Mới') . ' - WeddingSaaS')

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-8 max-w-7xl w-full mx-auto space-y-6">

    <!-- Top Breadcrumb & Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-6 border-b border-slate-200">
        <div class="space-y-1">
            <div class="flex items-center gap-2 text-xs font-medium text-slate-500">
                <a href="{{ route('admin.wedding-cards.index') }}" class="hover:text-indigo-600 transition-colors">Quản lý Thiệp</a>
                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-slate-800 font-semibold">
                    {{ isset($weddingCard) ? 'Chỉnh sửa ' . $weddingCard->formatted_id : 'Tạo thiệp mới' }}
                </span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight flex items-center gap-3">
                <span>{{ isset($weddingCard) ? 'Chỉnh sửa: ' . $weddingCard->couple_name : 'Thêm Thiệp Cưới Mới' }}</span>
                @if(isset($weddingCard))
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium {{ $weddingCard->status_info['badge_class'] }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $weddingCard->status_info['dot_class'] }}"></span>
                        {{ $weddingCard->status_info['label'] }}
                    </span>
                @endif
            </h1>
        </div>

        <div class="flex items-center gap-2.5">
            <a href="{{ route('admin.wedding-cards.index') }}" 
               class="px-4 py-2 text-sm font-medium text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 rounded-xl transition-colors shadow-2xs">
                ← Quay lại danh sách
            </a>

            @if(isset($weddingCard) && $weddingCard->identifyWedding)
                <a href="{{ url('/weddingInvite/' . $weddingCard->identifyWedding) }}" 
                   target="_blank" 
                   class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium text-indigo-700 bg-indigo-50 hover:bg-indigo-100 border border-indigo-100 rounded-xl transition-colors">
                    <span>Xem thiệp trực tuyến</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            @endif

            <button type="submit" 
                    form="wedding-card-form"
                    class="inline-flex items-center gap-2 px-5 py-2 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl transition-colors shadow-xs active:scale-98">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                <span>{{ isset($weddingCard) ? 'Lưu thay đổi' : 'Tạo thiệp ngay' }}</span>
            </button>
        </div>
    </div>

    <!-- Error Summary Alerts -->
    @if (isset($errors) && $errors->any())
        <div class="p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-sm space-y-1.5 shadow-2xs">
            <div class="flex items-center gap-2 font-semibold">
                <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Có {{ $errors->count() }} trường dữ liệu cần kiểm tra lại:</span>
            </div>
            <ul class="list-disc pl-8 space-y-0.5 text-xs text-rose-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Main Form Grid -->
    <form id="wedding-card-form" 
          action="{{ isset($weddingCard) ? route('wedding.update', $weddingCard->id) : route('wedding.store') }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        @csrf

        <!-- LEFT COLUMN: Content & Details (8 Cols) -->
        <div class="lg:col-span-8 space-y-8">

            <!-- Card 1: Thông tin Lễ thành hôn (Main Ceremony) -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-5">
                <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                    <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-sm">
                        1
                    </div>
                    <div>
                        <h2 class="font-bold text-slate-900 text-base">Thông tin Lễ Thành Hôn Chính</h2>
                        <p class="text-xs text-slate-500">Thời gian và địa điểm tổ chức tiệc cưới chính thức.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Ngày tổ chức lễ thành hôn <span class="text-rose-500">*</span></label>
                        <input type="date" 
                               name="wedding_date" 
                               value="{{ old('wedding_date', isset($weddingCard) ? ($weddingCard->wedding_date ? $weddingCard->wedding_date->format('Y-m-d') : '') : '') }}" 
                               required 
                               class="w-full px-3.5 py-2 text-sm text-slate-800 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Giờ tổ chức <span class="text-rose-500">*</span></label>
                        <input type="text" 
                               name="wedding_time" 
                               value="{{ old('wedding_time', $weddingCard->wedding_time ?? '11:00') }}" 
                               placeholder="Ví dụ: 11:00 hoặc 17:30" 
                               required 
                               class="w-full px-3.5 py-2 text-sm text-slate-800 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition-all">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Tên nơi tổ chức (Nhà hàng / Trung tâm tiệc) <span class="text-rose-500">*</span></label>
                        <input type="text" 
                               name="name_place_wedding" 
                               value="{{ old('name_place_wedding', $weddingCard->name_place_wedding ?? '') }}" 
                               placeholder="Ví dụ: Trung Tâm Tiệc Cưới Melisa Palace" 
                               class="w-full px-3.5 py-2 text-sm text-slate-800 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Link Bản đồ Google Map</label>
                        <input type="text" 
                               name="address_wedding_map" 
                               value="{{ old('address_wedding_map', $weddingCard->address_wedding_map ?? '') }}" 
                               placeholder="https://maps.app.goo.gl/..." 
                               class="w-full px-3.5 py-2 text-sm text-slate-800 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Địa chỉ chi tiết nơi tổ chức</label>
                    <input type="text" 
                           name="address_wedding" 
                           value="{{ old('address_wedding', $weddingCard->address_wedding ?? '') }}" 
                           placeholder="Ví dụ: Số 85 Thoại Ngọc Hầu, Phường Hòa Thạnh, Quận Tân Phú, TP. HCM" 
                           class="w-full px-3.5 py-2 text-sm text-slate-800 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition-all">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Lời ngỏ / Thông điệp lễ cưới</label>
                    <textarea name="wedding_message" 
                              rows="2" 
                              placeholder="Trân trọng kính mời quý khách đến dự lễ thành hôn của chúng tôi..."
                              class="w-full px-3.5 py-2 text-sm text-slate-800 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition-all">{{ old('wedding_message', $weddingCard->wedding_message ?? '') }}</textarea>
                </div>
            </div>

            <!-- Card 2: Thông tin Cô dâu & Chú rể -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-6">
                <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                    <div class="w-8 h-8 rounded-lg bg-pink-50 text-pink-600 flex items-center justify-center font-bold text-sm">
                        2
                    </div>
                    <div>
                        <h2 class="font-bold text-slate-900 text-base">Thông tin Cô Dâu & Chú Rể</h2>
                        <p class="text-xs text-slate-500">Avatar, số điện thoại, giới thiệu và mã QR mừng cưới của cặp đôi.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Cột Chú Rể -->
                    <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-200/70 space-y-4">
                        <div class="flex items-center gap-2 pb-2 border-b border-slate-200 text-slate-800 font-bold text-sm">
                            <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                            <span>CHÚ RỂ (GROOM)</span>
                        </div>

                        <!-- Avatar Chú Rể -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Ảnh đại diện chú rể</label>
                            <div class="flex items-center gap-3.5">
                                <div class="w-16 h-16 rounded-xl border border-slate-200 bg-white overflow-hidden shrink-0 shadow-2xs relative group">
                                    <img id="preview-avatar-groom" 
                                         src="{{ $weddingCard->groom_avatar ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=80' }}" 
                                         class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 space-y-1.5">
                                    <input type="file" 
                                           name="avatar_groom" 
                                           onchange="previewImage(this, 'preview-avatar-groom')"
                                           class="block w-full text-xs text-slate-500 file:mr-2.5 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition-colors">
                                    <input type="text" 
                                           name="groom_avatar" 
                                           value="{{ old('groom_avatar', $weddingCard->groom_avatar ?? '') }}" 
                                           placeholder="Hoặc dán URL ảnh chú rể..." 
                                           class="w-full px-2.5 py-1 text-xs text-slate-600 bg-white border border-slate-200 rounded-lg">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Họ tên Chú Rể <span class="text-rose-500">*</span></label>
                            <input type="text" 
                                   name="groom_name" 
                                   value="{{ old('groom_name', $weddingCard->groom_name ?? '') }}" 
                                   required 
                                   placeholder="Ví dụ: Hoàng Tuấn" 
                                   class="w-full px-3 py-1.5 text-sm text-slate-800 bg-white border border-slate-200 rounded-xl">
                        </div>

                        <div class="grid grid-cols-2 gap-2.5">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Ngày sinh</label>
                                <input type="date" 
                                       name="groom_birthday" 
                                       value="{{ old('groom_birthday', isset($weddingCard->groom_birthday) && $weddingCard->groom_birthday ? $weddingCard->groom_birthday->format('Y-m-d') : '') }}" 
                                       class="w-full px-2.5 py-1.5 text-xs text-slate-800 bg-white border border-slate-200 rounded-xl">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Số điện thoại</label>
                                <input type="text" 
                                       name="groom_phone" 
                                       value="{{ old('groom_phone', $weddingCard->groom_phone ?? '') }}" 
                                       placeholder="0987..." 
                                       class="w-full px-2.5 py-1.5 text-xs text-slate-800 bg-white border border-slate-200 rounded-xl">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Giới thiệu ngắn Chú Rể</label>
                            <input type="text" 
                                   name="des_groom" 
                                   value="{{ old('des_groom', $weddingCard->des_groom ?? '') }}" 
                                   placeholder="Lời giới thiệu tính cách, sở thích..." 
                                   class="w-full px-3 py-1.5 text-xs text-slate-800 bg-white border border-slate-200 rounded-xl">
                        </div>

                        <!-- Mã QR Mừng cưới Chú rể -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Mã QR mừng cưới Chú Rể</label>
                            <div class="flex items-center gap-2.5">
                                <div class="w-10 h-10 rounded-lg border border-slate-200 bg-white overflow-hidden shrink-0 flex items-center justify-center">
                                    <img id="preview-groom-qr" 
                                         src="{{ $weddingCard->groom_qr ?? '' }}" 
                                         class="w-full h-full object-contain {{ empty($weddingCard->groom_qr) ? 'hidden' : '' }}">
                                    @if(empty($weddingCard->groom_qr))
                                        <span class="text-[10px] text-slate-400">QR</span>
                                    @endif
                                </div>
                                <div class="flex-1 space-y-1">
                                    <input type="file" 
                                           name="groom_qr_image" 
                                           onchange="previewImage(this, 'preview-groom-qr')"
                                           class="block w-full text-[11px] text-slate-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-[11px] file:bg-slate-200">
                                    <input type="text" 
                                           name="groom_qr" 
                                           value="{{ old('groom_qr', $weddingCard->groom_qr ?? '') }}" 
                                           placeholder="URL ảnh QR..." 
                                           class="w-full px-2 py-0.5 text-xs text-slate-600 bg-white border border-slate-200 rounded-md">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Link Bản đồ Google Map Nhà Trai</label>
                            <input type="text" 
                                   name="groom_map" 
                                   value="{{ old('groom_map', $weddingCard->groom_map ?? '') }}" 
                                   placeholder="https://maps.app.goo.gl/..." 
                                   class="w-full px-3 py-1.5 text-xs text-slate-800 bg-white border border-slate-200 rounded-xl">
                        </div>
                    </div>

                    <!-- Cột Cô Dâu -->
                    <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-200/70 space-y-4">
                        <div class="flex items-center gap-2 pb-2 border-b border-slate-200 text-slate-800 font-bold text-sm">
                            <span class="w-2.5 h-2.5 rounded-full bg-pink-500"></span>
                            <span>CÔ DÂU (BRIDE)</span>
                        </div>

                        <!-- Avatar Cô Dâu -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Ảnh đại diện cô dâu</label>
                            <div class="flex items-center gap-3.5">
                                <div class="w-16 h-16 rounded-xl border border-slate-200 bg-white overflow-hidden shrink-0 shadow-2xs relative group">
                                    <img id="preview-avatar-bride" 
                                         src="{{ $weddingCard->bride_avatar ?? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80' }}" 
                                         class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 space-y-1.5">
                                    <input type="file" 
                                           name="avatar_bride" 
                                           onchange="previewImage(this, 'preview-avatar-bride')"
                                           class="block w-full text-xs text-slate-500 file:mr-2.5 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100 transition-colors">
                                    <input type="text" 
                                           name="bride_avatar" 
                                           value="{{ old('bride_avatar', $weddingCard->bride_avatar ?? '') }}" 
                                           placeholder="Hoặc dán URL ảnh cô dâu..." 
                                           class="w-full px-2.5 py-1 text-xs text-slate-600 bg-white border border-slate-200 rounded-lg">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Họ tên Cô Dâu <span class="text-rose-500">*</span></label>
                            <input type="text" 
                                   name="bride_name" 
                                   value="{{ old('bride_name', $weddingCard->bride_name ?? '') }}" 
                                   required 
                                   placeholder="Ví dụ: Mai Lan" 
                                   class="w-full px-3 py-1.5 text-sm text-slate-800 bg-white border border-slate-200 rounded-xl">
                        </div>

                        <div class="grid grid-cols-2 gap-2.5">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Ngày sinh</label>
                                <input type="date" 
                                       name="bride_birthday" 
                                       value="{{ old('bride_birthday', isset($weddingCard->bride_birthday) && $weddingCard->bride_birthday ? $weddingCard->bride_birthday->format('Y-m-d') : '') }}" 
                                       class="w-full px-2.5 py-1.5 text-xs text-slate-800 bg-white border border-slate-200 rounded-xl">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Số điện thoại</label>
                                <input type="text" 
                                       name="bride_phone" 
                                       value="{{ old('bride_phone', $weddingCard->bride_phone ?? '') }}" 
                                       placeholder="0912..." 
                                       class="w-full px-2.5 py-1.5 text-xs text-slate-800 bg-white border border-slate-200 rounded-xl">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Giới thiệu ngắn Cô Dâu</label>
                            <input type="text" 
                                   name="des_bride" 
                                   value="{{ old('des_bride', $weddingCard->des_bride ?? '') }}" 
                                   placeholder="Lời giới thiệu tính cách, sở thích..." 
                                   class="w-full px-3 py-1.5 text-xs text-slate-800 bg-white border border-slate-200 rounded-xl">
                        </div>

                        <!-- Mã QR Mừng cưới Cô dâu -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Mã QR mừng cưới Cô Dâu</label>
                            <div class="flex items-center gap-2.5">
                                <div class="w-10 h-10 rounded-lg border border-slate-200 bg-white overflow-hidden shrink-0 flex items-center justify-center">
                                    <img id="preview-bride-qr" 
                                         src="{{ $weddingCard->bride_qr ?? '' }}" 
                                         class="w-full h-full object-contain {{ empty($weddingCard->bride_qr) ? 'hidden' : '' }}">
                                    @if(empty($weddingCard->bride_qr))
                                        <span class="text-[10px] text-slate-400">QR</span>
                                    @endif
                                </div>
                                <div class="flex-1 space-y-1">
                                    <input type="file" 
                                           name="bride_qr_image" 
                                           onchange="previewImage(this, 'preview-bride-qr')"
                                           class="block w-full text-[11px] text-slate-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-[11px] file:bg-slate-200">
                                    <input type="text" 
                                           name="bride_qr" 
                                           value="{{ old('bride_qr', $weddingCard->bride_qr ?? '') }}" 
                                           placeholder="URL ảnh QR..." 
                                           class="w-full px-2 py-0.5 text-xs text-slate-600 bg-white border border-slate-200 rounded-md">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Link Bản đồ Google Map Nhà Gái</label>
                            <input type="text" 
                                   name="bride_map" 
                                   value="{{ old('bride_map', $weddingCard->bride_map ?? '') }}" 
                                   placeholder="https://maps.app.goo.gl/..." 
                                   class="w-full px-3 py-1.5 text-xs text-slate-800 bg-white border border-slate-200 rounded-xl">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3: Tiệc cỗ Mời Riêng Nhà Trai & Nhà Gái -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-5">
                <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                    <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-sm">
                        3
                    </div>
                    <div>
                        <h2 class="font-bold text-slate-900 text-base">Tiệc Cỗ Mời Riêng Nhà Trai & Nhà Gái</h2>
                        <p class="text-xs text-slate-500">Thiết lập thời gian và địa chỉ bữa cơm thân mật cho từng họ.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nhà Trai -->
                    <div class="p-4 rounded-xl border border-slate-200/80 space-y-3.5">
                        <span class="text-xs font-bold text-indigo-700 uppercase tracking-wider block">Tiệc Nhà Trai</span>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Tiêu đề mời</label>
                            <input type="text" name="groom_eating_title" value="{{ old('groom_eating_title', $weddingCard->groom_eating_title ?? 'Nhà Trai') }}" class="w-full px-3 py-1.5 text-xs bg-white border border-slate-200 rounded-lg">
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Ngày ăn cỗ (Dương)</label>
                                <input type="date" name="groom_eating_date" value="{{ old('groom_eating_date', isset($weddingCard->groom_eating_date) && $weddingCard->groom_eating_date ? $weddingCard->groom_eating_date->format('Y-m-d') : '') }}" class="w-full px-2 py-1 text-xs bg-white border border-slate-200 rounded-lg">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Giờ mời (Dương)</label>
                                <input type="text" name="time_groom" value="{{ old('time_groom', $weddingCard->time_groom ?? '11:00') }}" placeholder="11:00" class="w-full px-2 py-1 text-xs bg-white border border-slate-200 rounded-lg">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Thời gian Âm lịch</label>
                            <input type="text" name="time_groom_al" value="{{ old('time_groom_al', $weddingCard->time_groom_al ?? '') }}" placeholder="Tức ngày 12 tháng 9 năm Bính Ngọ" class="w-full px-3 py-1.5 text-xs bg-white border border-slate-200 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Địa chỉ tư gia Nhà Trai</label>
                            <input type="text" name="address_groom" value="{{ old('address_groom', $weddingCard->address_groom ?? '') }}" placeholder="Địa chỉ nhà trai..." class="w-full px-3 py-1.5 text-xs bg-white border border-slate-200 rounded-lg">
                        </div>
                    </div>

                    <!-- Nhà Gái -->
                    <div class="p-4 rounded-xl border border-slate-200/80 space-y-3.5">
                        <span class="text-xs font-bold text-pink-700 uppercase tracking-wider block">Tiệc Nhà Gái</span>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Tiêu đề mời</label>
                            <input type="text" name="bride_eating_title" value="{{ old('bride_eating_title', $weddingCard->bride_eating_title ?? 'Nhà Gái') }}" class="w-full px-3 py-1.5 text-xs bg-white border border-slate-200 rounded-lg">
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Ngày ăn cỗ (Dương)</label>
                                <input type="date" name="bride_eating_date" value="{{ old('bride_eating_date', isset($weddingCard->bride_eating_date) && $weddingCard->bride_eating_date ? $weddingCard->bride_eating_date->format('Y-m-d') : '') }}" class="w-full px-2 py-1 text-xs bg-white border border-slate-200 rounded-lg">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Giờ mời (Dương)</label>
                                <input type="text" name="time_bride" value="{{ old('time_bride', $weddingCard->time_bride ?? '11:00') }}" placeholder="11:00" class="w-full px-2 py-1 text-xs bg-white border border-slate-200 rounded-lg">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Thời gian Âm lịch</label>
                            <input type="text" name="time_bride_al" value="{{ old('time_bride_al', $weddingCard->time_bride_al ?? '') }}" placeholder="Tức ngày 11 tháng 9 năm Bính Ngọ" class="w-full px-3 py-1.5 text-xs bg-white border border-slate-200 rounded-lg">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Địa chỉ tư gia Nhà Gái</label>
                            <input type="text" name="address_bride" value="{{ old('address_bride', $weddingCard->address_bride ?? '') }}" placeholder="Địa chỉ nhà gái..." class="w-full px-3 py-1.5 text-xs bg-white border border-slate-200 rounded-lg">
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Lời mời chung bữa cơm thân mật</label>
                    <input type="text" 
                           name="message_invite" 
                           value="{{ old('message_invite', $weddingCard->message_invite ?? 'Trân trọng kính mời mọi người đến dự bữa cơm thân mật chung vui cùng gia đình chúng tôi!') }}" 
                           class="w-full px-3.5 py-2 text-sm text-slate-800 bg-white border border-slate-200 rounded-xl">
                </div>
            </div>

            <!-- Card 4: Câu chuyện tình yêu, Lời cảm ơn & Mừng cưới -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-4">
                <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-sm">
                        4
                    </div>
                    <div>
                        <h2 class="font-bold text-slate-900 text-base">Câu Chuyện Tình Yêu & Lời Tri Ân</h2>
                        <p class="text-xs text-slate-500">Kỷ niệm đáng nhớ, lời chúc phúc và thông điệp cảm ơn sau tiệc.</p>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">
                        Câu chuyện tình yêu (Love Story)
                        <span class="text-slate-400 font-normal ml-1">Định dạng mẫu: 1/2/2023: Hẹn Hò, 2/5/2024: Tỏ Tình, 1/1/2026: Kết Hôn</span>
                    </label>
                    <textarea name="love_story" 
                              rows="3" 
                              placeholder="6/9/2023: Hẹn Hò, 6/10/2023: Tỏ Tình, 24/12/2025: Đính Hôn, 29/1/2026: Kết Hôn"
                              class="w-full px-3.5 py-2 text-sm text-slate-800 bg-white border border-slate-200 rounded-xl">{{ old('love_story', $weddingCard->love_story ?? '') }}</textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Nội dung quà mừng (Hộp mừng cưới)</label>
                        <input type="text" 
                               name="message_gift" 
                               value="{{ old('message_gift', $weddingCard->message_gift ?? 'Gửi quà chúc phúc cô dâu chú rể') }}" 
                               class="w-full px-3.5 py-2 text-sm text-slate-800 bg-white border border-slate-200 rounded-xl">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Nội dung cảm ơn (Lời tri ân)</label>
                        <input type="text" 
                               name="message_thanks" 
                               value="{{ old('message_thanks', $weddingCard->message_thanks ?? 'Sự hiện diện của quý khách là niềm vui và vinh hạnh to lớn của gia đình chúng tôi!') }}" 
                               class="w-full px-3.5 py-2 text-sm text-slate-800 bg-white border border-slate-200 rounded-xl">
                    </div>
                </div>
            </div>

            <!-- Card 5: Banner & Bìa Thiệp Cưới -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-6">
                <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                    <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-sm">
                        5
                    </div>
                    <div>
                        <h2 class="font-bold text-slate-900 text-base">Banner & Bìa Thiệp Cưới</h2>
                        <p class="text-xs text-slate-500">Ảnh bìa đầu trang, ảnh xem trước khi gửi link và các ảnh banner chủ đề.</p>
                    </div>
                </div>

                <!-- Row 1: 2 Banner chính khổ lớn (Preview & Banner Top) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- 1. Banner Preview -->
                    <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-200/70 space-y-3">
                        <div class="flex items-center justify-between">
                            <label class="block text-xs font-bold text-slate-800">1. Banner Preview (Ảnh khi gửi link Zalo / MXH)</label>
                            <span class="text-[11px] text-slate-400">Tỉ lệ 16:9</span>
                        </div>
                        <div class="relative rounded-xl overflow-hidden aspect-video bg-slate-100 border border-slate-200 shadow-2xs group">
                            <img id="preview-banner-preview" 
                                 src="{{ $weddingCard->banner_preview ?? 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=600&q=80' }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="space-y-2">
                            <input type="file" 
                                   name="banner_preview_image" 
                                   onchange="previewImage(this, 'preview-banner-preview')"
                                   class="block w-full text-xs text-slate-500 file:mr-2.5 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition-colors cursor-pointer">
                            <input type="text" 
                                   name="banner_preview" 
                                   value="{{ old('banner_preview', $weddingCard->banner_preview ?? '') }}" 
                                   placeholder="Hoặc dán URL ảnh preview..." 
                                   class="w-full px-3 py-1.5 text-xs text-slate-600 bg-white border border-slate-200 rounded-lg">
                        </div>
                    </div>

                    <!-- 2. Banner Top -->
                    <div class="p-4 rounded-xl bg-slate-50/70 border border-slate-200/70 space-y-3">
                        <div class="flex items-center justify-between">
                            <label class="block text-xs font-bold text-slate-800">2. Banner Top (Ảnh bìa đầu thiệp cưới)</label>
                            <span class="text-[11px] text-slate-400">Tỉ lệ 16:9</span>
                        </div>
                        <div class="relative rounded-xl overflow-hidden aspect-video bg-slate-100 border border-slate-200 shadow-2xs group">
                            <img id="preview-banner-top" 
                                 src="{{ $weddingCard->banner_top ?? 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=80' }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="space-y-2">
                            <input type="file" 
                                   name="banner_top_image" 
                                   onchange="previewImage(this, 'preview-banner-top')"
                                   class="block w-full text-xs text-slate-500 file:mr-2.5 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 transition-colors cursor-pointer">
                            <input type="text" 
                                   name="banner_top" 
                                   value="{{ old('banner_top', $weddingCard->banner_top ?? '') }}" 
                                   placeholder="Hoặc dán URL ảnh banner top..." 
                                   class="w-full px-3 py-1.5 text-xs text-slate-600 bg-white border border-slate-200 rounded-lg">
                        </div>
                    </div>
                </div>

                <!-- Row 2: 3 Banner chủ đề (Countdown, Story, Thanks) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-2">
                    <!-- 3. Banner Countdown -->
                    <div class="p-3.5 rounded-xl border border-slate-200/80 space-y-2.5 bg-slate-50/50">
                        <label class="block text-xs font-semibold text-slate-700">3. Banner Countdown (Đếm ngược)</label>
                        <div class="relative rounded-lg overflow-hidden aspect-video bg-slate-100 border border-slate-200 shadow-2xs flex items-center justify-center">
                            <img id="preview-banner-countdown" 
                                 src="{{ $weddingCard->banner_coundown ?? '' }}" 
                                 class="w-full h-full object-cover {{ empty($weddingCard->banner_coundown) ? 'hidden' : '' }}">
                            @if(empty($weddingCard->banner_coundown))
                                <span class="text-xs text-slate-400">Chưa có ảnh</span>
                            @endif
                        </div>
                        <div class="space-y-1.5">
                            <input type="file" 
                                   name="banner_coundown_image" 
                                   onchange="previewImage(this, 'preview-banner-countdown')"
                                   class="block w-full text-[11px] text-slate-500 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:bg-white file:border file:border-slate-200 cursor-pointer">
                            <input type="text" 
                                   name="banner_coundown" 
                                   value="{{ old('banner_coundown', $weddingCard->banner_coundown ?? '') }}" 
                                   placeholder="URL countdown..." 
                                   class="w-full px-2 py-1 text-xs text-slate-600 bg-white border border-slate-200 rounded-md">
                        </div>
                    </div>

                    <!-- 4. Banner Story -->
                    <div class="p-3.5 rounded-xl border border-slate-200/80 space-y-2.5 bg-slate-50/50">
                        <label class="block text-xs font-semibold text-slate-700">4. Banner Câu Chuyện (Story)</label>
                        <div class="relative rounded-lg overflow-hidden aspect-video bg-slate-100 border border-slate-200 shadow-2xs flex items-center justify-center">
                            <img id="preview-banner-story" 
                                 src="{{ $weddingCard->banner_love_story ?? '' }}" 
                                 class="w-full h-full object-cover {{ empty($weddingCard->banner_love_story) ? 'hidden' : '' }}">
                            @if(empty($weddingCard->banner_love_story))
                                <span class="text-xs text-slate-400">Chưa có ảnh</span>
                            @endif
                        </div>
                        <div class="space-y-1.5">
                            <input type="file" 
                                   name="banner_story_image" 
                                   onchange="previewImage(this, 'preview-banner-story')"
                                   class="block w-full text-[11px] text-slate-500 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:bg-white file:border file:border-slate-200 cursor-pointer">
                            <input type="text" 
                                   name="banner_love_story" 
                                   value="{{ old('banner_love_story', $weddingCard->banner_love_story ?? '') }}" 
                                   placeholder="URL story..." 
                                   class="w-full px-2 py-1 text-xs text-slate-600 bg-white border border-slate-200 rounded-md">
                        </div>
                    </div>

                    <!-- 5. Banner Thanks -->
                    <div class="p-3.5 rounded-xl border border-slate-200/80 space-y-2.5 bg-slate-50/50">
                        <label class="block text-xs font-semibold text-slate-700">5. Banner Lời Cảm Ơn (Thanks)</label>
                        <div class="relative rounded-lg overflow-hidden aspect-video bg-slate-100 border border-slate-200 shadow-2xs flex items-center justify-center">
                            <img id="preview-banner-thanks" 
                                 src="{{ $weddingCard->banner_thanks ?? '' }}" 
                                 class="w-full h-full object-cover {{ empty($weddingCard->banner_thanks) ? 'hidden' : '' }}">
                            @if(empty($weddingCard->banner_thanks))
                                <span class="text-xs text-slate-400">Chưa có ảnh</span>
                            @endif
                        </div>
                        <div class="space-y-1.5">
                            <input type="file" 
                                   name="banner_thanks_image" 
                                   onchange="previewImage(this, 'preview-banner-thanks')"
                                   class="block w-full text-[11px] text-slate-500 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-[11px] file:bg-white file:border file:border-slate-200 cursor-pointer">
                            <input type="text" 
                                   name="banner_thanks" 
                                   value="{{ old('banner_thanks', $weddingCard->banner_thanks ?? '') }}" 
                                   placeholder="URL thanks..." 
                                   class="w-full px-2 py-1 text-xs text-slate-600 bg-white border border-slate-200 rounded-md">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 6: Album Ảnh Cưới (Kéo - Thả, Thêm, Sửa, Xóa) -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-4" id="album-manager-card">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 pb-4 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center font-bold text-sm">
                            6
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h2 class="font-bold text-slate-900 text-base">Album Ảnh Cưới</h2>
                                <span id="album-count-badge" class="px-2 py-0.5 rounded-full bg-purple-100 text-purple-700 text-xs font-semibold">
                                    0 ảnh
                                </span>
                            </div>
                            <p class="text-xs text-slate-500">Kéo thả để sắp xếp vị trí hiển thị. Ảnh số #1 sẽ là ảnh bìa album.</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <button type="button" 
                                onclick="document.getElementById('album-add-input').click()"
                                class="inline-flex items-center gap-1.5 px-3.5 py-1.5 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-xs font-semibold shadow-xs transition-colors cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                            <span>Thêm ảnh vào Album</span>
                        </button>
                    </div>
                </div>

                <!-- Hidden inputs container for album manifest and dynamically attached files -->
                <input type="hidden" name="album_manifest" id="album_manifest" value="">
                <div id="album-files-container" class="hidden"></div>
                <input type="file" id="album-add-input" multiple accept="image/*" class="hidden" onchange="handleAlbumFilesAdded(this)">
                <input type="file" id="album-replace-input" accept="image/*" class="hidden" onchange="handleAlbumFileReplaced(this)">

                @php
                    $albumImages = [];
                    if (isset($weddingCard) && $weddingCard->album) {
                        $decoded = json_decode($weddingCard->album, true);
                        if (is_array($decoded)) {
                            $albumImages = $decoded;
                        }
                    }
                @endphp

                <!-- Album Grid (SortableJS drag-and-drop container) -->
                <div id="album-grid" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3.5 min-h-[100px]">
                    @foreach ($albumImages as $idx => $imgUrl)
                        <div class="album-item relative group aspect-square rounded-2xl overflow-hidden border-2 border-slate-200/80 bg-slate-100 shadow-2xs hover:shadow-md transition-all cursor-grab active:cursor-grabbing select-none hover:border-purple-300"
                             data-type="existing"
                             data-url="{{ $imgUrl }}">
                            <img src="{{ $imgUrl }}" class="w-full h-full object-cover pointer-events-none">
                            
                            <!-- Index Badge -->
                            <span class="album-badge absolute top-2 left-2 bg-slate-900/80 backdrop-blur-xs text-white text-[11px] font-bold px-2 py-0.5 rounded-lg shadow-xs pointer-events-none">
                                #{{ $idx + 1 }}
                            </span>

                            <!-- Floating Action Buttons -->
                            <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2 p-2">
                                <button type="button" 
                                        onclick="triggerReplaceItem(this)" 
                                        class="p-2 rounded-xl bg-white/95 hover:bg-white text-slate-700 hover:text-indigo-600 shadow-sm transition-transform active:scale-90 cursor-pointer" 
                                        title="Thay thế bằng ảnh khác">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                </button>
                                <button type="button" 
                                        onclick="deleteAlbumItem(this)" 
                                        class="p-2 rounded-xl bg-white/95 hover:bg-white text-slate-700 hover:text-rose-600 shadow-sm transition-transform active:scale-90 cursor-pointer" 
                                        title="Xóa ảnh khỏi album">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Empty State Alert when 0 photos -->
                <div id="album-empty-state" class="{{ count($albumImages) > 0 ? 'hidden' : '' }} p-8 rounded-2xl border-2 border-dashed border-slate-200 text-center bg-slate-50/50">
                    <div class="w-12 h-12 rounded-full bg-purple-50 text-purple-500 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <p class="font-medium text-slate-700 text-sm">Chưa có ảnh nào trong Album</p>
                    <p class="text-xs text-slate-400 mt-1">Nhấn nút bên dưới để chọn một hoặc nhiều ảnh kỷ niệm từ máy tính.</p>
                    <button type="button" 
                            onclick="document.getElementById('album-add-input').click()"
                            class="mt-3.5 inline-flex items-center gap-1.5 px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-xl text-xs font-semibold shadow-xs transition-colors cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                        <span>Tải ảnh lên Album</span>
                    </button>
                </div>

                <!-- Drag & drop dropzone hint -->
                <div id="album-dropzone" 
                     class="p-4 rounded-xl border border-slate-200/80 bg-slate-50/60 hover:bg-purple-50/30 hover:border-purple-300 transition-colors flex items-center justify-center gap-3 text-slate-500 text-xs cursor-pointer select-none"
                     onclick="document.getElementById('album-add-input').click()">
                    <svg class="w-5 h-5 text-purple-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                    <span>Kéo thả thêm ảnh vào đây hoặc <strong class="text-purple-600 hover:underline">duyệt từ máy tính</strong> (Hỗ trợ JPG, PNG, WEBP)</span>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN: Settings, Status, Templates & Banners (4 Cols - Sticky) -->
        <div class="lg:col-span-4 space-y-6">

            <!-- Card: Cấu hình Xuất bản & Vòng đời -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs space-y-4 sticky top-6">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <span class="font-bold text-slate-900 text-sm">Cấu hình Hệ Thống</span>
                    <button type="submit" 
                            class="px-3.5 py-1.5 text-xs font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-xs transition-colors">
                        Lưu ngay
                    </button>
                </div>

                <!-- Trạng thái -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Trạng thái thiệp</label>
                    <select name="status" class="w-full px-3 py-2 text-sm text-slate-800 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition-all font-medium">
                        <option value="active" {{ old('status', $weddingCard->status ?? 'active') === 'active' ? 'selected' : '' }}>🟢 Đang hoạt động</option>
                        <option value="locked" {{ old('status', $weddingCard->status ?? '') === 'locked' ? 'selected' : '' }}>🔴 Đã ẩn (Khóa)</option>
                        <option value="draft" {{ old('status', $weddingCard->status ?? '') === 'draft' ? 'selected' : '' }}>⚪ Bản Nháp</option>
                    </select>
                </div>

                <!-- Slug / Đường dẫn URL -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">
                        Đường dẫn thiệp (Slug URL) <span class="text-rose-500">*</span>
                    </label>
                    <div class="flex rounded-xl shadow-2xs">
                        <span class="inline-flex items-center px-3 rounded-l-xl border border-r-0 border-slate-200 bg-slate-50 text-slate-500 text-xs font-mono">
                            wed.vn/
                        </span>
                        <input type="text" 
                               name="identifyWedding" 
                               value="{{ old('identifyWedding', $weddingCard->identifyWedding ?? '') }}" 
                               required 
                               placeholder="tuan-mai-2026"
                               class="flex-1 min-w-0 block w-full px-3 py-2 text-sm text-slate-800 bg-white border border-slate-200 rounded-r-xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 font-medium">
                    </div>
                </div>

                <!-- Chọn Mẫu Giao Diện (Template) -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Mẫu giao diện (Template) <span class="text-rose-500">*</span></label>
                    <select name="template" class="w-full px-3 py-2 text-sm text-slate-800 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 transition-all">
                        @php
                            $templateList = [
                                '1' => 'Hiện đại 01 (Minimal)',
                                '1n' => 'Hiện đại 01 New',
                                '2' => 'Cổ điển 02 (Vintage)',
                                '3' => 'Hiện đại 03 (Floral)',
                                '4' => 'Thanh lịch 04 (Pastel)',
                                '5' => 'Sang trọng 05 (Royal)',
                                '6' => 'Tự nhiên 06 (Botanical)',
                                '7' => 'Nghệ thuật 07 (Artistic)',
                                '8' => 'Truyền thống 08 (Heritage)',
                                '9' => 'Tối giản 09 (Nordic)',
                                '10' => 'Lãng mạn 10 (Sweet Pink)',
                                '11' => 'Cổ điển 11 (Elegance)',
                                '12' => 'Hiện đại 12 (Trendy)',
                                '13' => 'Sang trọng 13 (Glamour)',
                                '14' => 'Thơ mộng 14 (Dreamy)',
                                '15' => 'Nhiệt đới 15 (Tropical)',
                                '16' => 'Tinh tế 16 (Subtle)',
                                '17' => 'Hoàng gia 17 (Imperial)',
                                '18' => 'Mộc mạc 18 (Rustic)',
                                '19' => 'Quý phái 19 (Noble)',
                                '20' => 'Đương đại 20 (Contemporary)',
                                '21' => 'Đơn giản 21 (Simple)',
                            ];
                            $currentTemplate = old('template', $weddingCard->template ?? '1');
                        @endphp
                        @foreach ($templateList as $code => $title)
                            <option value="{{ $code }}" {{ $currentTemplate == $code ? 'selected' : '' }}>
                                {{ $code }}. {{ $title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Email Khách hàng -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Email Khách hàng sở hữu</label>
                    <input type="email" 
                           name="customer_email" 
                           value="{{ old('customer_email', $weddingCard->customer_email ?? '') }}" 
                           placeholder="khachhang@email.com" 
                           class="w-full px-3 py-1.5 text-xs text-slate-800 bg-white border border-slate-200 rounded-xl">
                </div>

                <!-- Thời hạn sử dụng -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Ngày hết hạn dịch vụ</label>
                    <input type="date" 
                           name="expires_at" 
                           value="{{ old('expires_at', isset($weddingCard->expires_at) && $weddingCard->expires_at ? $weddingCard->expires_at->format('Y-m-d') : '') }}" 
                           class="w-full px-3 py-1.5 text-xs text-slate-800 bg-white border border-slate-200 rounded-xl">
                </div>

                <!-- Ngày Countdown -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Ngày giờ đếm ngược (Countdown)</label>
                    <input type="text" 
                           name="date_coundown" 
                           value="{{ old('date_coundown', $weddingCard->date_coundown ?? '') }}" 
                           placeholder="YYYY-MM-DD HH:mm:ss"
                           class="w-full px-3 py-1.5 text-xs text-slate-800 bg-white border border-slate-200 rounded-xl font-mono">
                </div>

                <!-- Nút lưu cố định theo màn hình cuộn -->
                <div class="pt-3 border-t border-slate-100">
                    <button type="submit" 
                            class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 rounded-xl shadow-xs transition-colors cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>{{ isset($weddingCard->id) ? 'Lưu thay đổi thiệp' : 'Tạo thiệp cưới' }}</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<!-- SortableJS for Drag-and-Drop Reordering -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>

<script>
    // Live Banner / Avatar Preview Helper
    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById(previewId);
                if (img) {
                    img.src = e.target.result;
                    img.classList.remove('hidden');
                }
            }
            reader.readAsDataURL(input.files[0]);
            window.showToast('Đã chọn ảnh xem trước mới', 'success');
        }
    }

    // ==========================================
    // Interactive Album Manager (Sort, Add, Replace, Delete)
    // ==========================================
    let activeReplaceItem = null;

    document.addEventListener('DOMContentLoaded', () => {
        initAlbumSortable();
        updateAlbumManifest();
        setupAlbumDragAndDropZone();
    });

    // 1. Initialize SortableJS
    function initAlbumSortable() {
        const grid = document.getElementById('album-grid');
        if (!grid || typeof Sortable === 'undefined') return;

        new Sortable(grid, {
            animation: 200,
            ghostClass: 'opacity-30',
            chosenClass: 'ring-2',
            dragClass: 'shadow-2xl',
            handle: '.album-item',
            onEnd: function() {
                updateAlbumManifest();
                window.showToast('Đã cập nhật lại thứ tự ảnh album', 'success');
            }
        });
    }

    // 2. Setup Drag & Drop Zone for files
    function setupAlbumDragAndDropZone() {
        const dropzone = document.getElementById('album-dropzone');
        if (!dropzone) return;

        ['dragenter', 'dragover'].forEach(eventName => {
            dropzone.addEventListener(eventName, (e) => {
                e.preventDefault();
                e.stopPropagation();
                dropzone.classList.add('border-purple-500', 'bg-purple-50/50');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, (e) => {
                e.preventDefault();
                e.stopPropagation();
                dropzone.classList.remove('border-purple-500', 'bg-purple-50/50');
            }, false);
        });

        dropzone.addEventListener('drop', (e) => {
            const dt = e.dataTransfer;
            if (dt && dt.files && dt.files.length > 0) {
                addFilesToAlbum(dt.files);
            }
        }, false);
    }

    // 3. Handle adding files from input
    function handleAlbumFilesAdded(input) {
        if (input.files && input.files.length > 0) {
            addFilesToAlbum(input.files);
            input.value = ''; // Reset input to allow re-selecting same files
        }
    }

    // 4. Add multiple files to album grid
    function addFilesToAlbum(files) {
        const grid = document.getElementById('album-grid');
        const container = document.getElementById('album-files-container');
        if (!grid || !container) return;

        let countAdded = 0;

        Array.from(files).forEach((file) => {
            if (!file.type.startsWith('image/')) return;
            countAdded++;

            const key = 'new_' + Date.now() + '_' + Math.random().toString(36).substring(2, 8);

            // Create hidden input file using DataTransfer
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'file';
            hiddenInput.name = `album_new_files[${key}]`;
            hiddenInput.id = `input-${key}`;

            const dt = new DataTransfer();
            dt.items.add(file);
            hiddenInput.files = dt.files;
            container.appendChild(hiddenInput);

            // Create DOM thumbnail card
            const objectUrl = URL.createObjectURL(file);
            const card = document.createElement('div');
            card.className = 'album-item relative group aspect-square rounded-2xl overflow-hidden border-2 border-purple-200/80 bg-slate-100 shadow-2xs hover:shadow-md transition-all cursor-grab active:cursor-grabbing select-none hover:border-purple-400';
            card.dataset.type = 'new';
            card.dataset.key = key;

            card.innerHTML = `
                <img src="${objectUrl}" class="w-full h-full object-cover pointer-events-none">
                <span class="album-badge absolute top-2 left-2 bg-slate-900/80 backdrop-blur-xs text-white text-[11px] font-bold px-2 py-0.5 rounded-lg shadow-xs pointer-events-none">
                    #
                </span>
                <span class="absolute top-2 right-2 bg-emerald-500/90 text-white text-[10px] font-semibold px-1.5 py-0.5 rounded shadow-xs pointer-events-none">
                    Mới
                </span>
                <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2 p-2">
                    <button type="button" onclick="triggerReplaceItem(this)" class="p-2 rounded-xl bg-white/95 hover:bg-white text-slate-700 hover:text-indigo-600 shadow-sm transition-transform active:scale-90 cursor-pointer" title="Thay thế bằng ảnh khác">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    </button>
                    <button type="button" onclick="deleteAlbumItem(this)" class="p-2 rounded-xl bg-white/95 hover:bg-white text-slate-700 hover:text-rose-600 shadow-sm transition-transform active:scale-90 cursor-pointer" title="Xóa ảnh khỏi album">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </div>
            `;

            grid.appendChild(card);
        });

        updateAlbumManifest();
        if (countAdded > 0) {
            window.showToast(`Đã thêm ${countAdded} ảnh vào album`, 'success');
        }
    }

    // 5. Replace an individual album item
    function triggerReplaceItem(button) {
        activeReplaceItem = button.closest('.album-item');
        const replaceInput = document.getElementById('album-replace-input');
        if (replaceInput) {
            replaceInput.click();
        }
    }

    function handleAlbumFileReplaced(input) {
        if (!input.files || input.files.length === 0 || !activeReplaceItem) return;

        const file = input.files[0];
        const container = document.getElementById('album-files-container');
        const key = 'rep_' + Date.now() + '_' + Math.random().toString(36).substring(2, 8);

        // Remove old file input if item was already newly added
        if (activeReplaceItem.dataset.type === 'new' && activeReplaceItem.dataset.key) {
            const oldInput = document.getElementById(`input-${activeReplaceItem.dataset.key}`);
            if (oldInput) oldInput.remove();
        }

        // Create new hidden input for the replacement file
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'file';
        hiddenInput.name = `album_new_files[${key}]`;
        hiddenInput.id = `input-${key}`;

        const dt = new DataTransfer();
        dt.items.add(file);
        hiddenInput.files = dt.files;
        container.appendChild(hiddenInput);

        // Update card attributes
        activeReplaceItem.dataset.type = 'new';
        activeReplaceItem.dataset.key = key;

        // Update image src
        const img = activeReplaceItem.querySelector('img');
        if (img) img.src = URL.createObjectURL(file);

        // Add 'Đã đổi' badge if not present
        if (!activeReplaceItem.querySelector('.replace-badge')) {
            const badge = document.createElement('span');
            badge.className = 'replace-badge absolute top-2 right-2 bg-amber-500 text-white text-[10px] font-semibold px-1.5 py-0.5 rounded shadow-xs pointer-events-none';
            badge.innerText = 'Đã đổi';
            activeReplaceItem.appendChild(badge);
        }

        input.value = '';
        activeReplaceItem = null;
        updateAlbumManifest();
        window.showToast('Đã thay thế ảnh thành công', 'success');
    }

    // 6. Delete an individual item
    function deleteAlbumItem(button) {
        const item = button.closest('.album-item');
        if (!item) return;

        // If it was a newly added file, remove its hidden file input
        if (item.dataset.type === 'new' && item.dataset.key) {
            const hiddenInput = document.getElementById(`input-${item.dataset.key}`);
            if (hiddenInput) hiddenInput.remove();
        }

        item.style.transform = 'scale(0.8)';
        item.style.opacity = '0';
        setTimeout(() => {
            item.remove();
            updateAlbumManifest();
            window.showToast('Đã xóa 1 ảnh khỏi album', 'success');
        }, 150);
    }

    // 7. Re-index badges and update hidden JSON manifest
    function updateAlbumManifest() {
        const items = document.querySelectorAll('#album-grid .album-item');
        const countBadge = document.getElementById('album-count-badge');
        const emptyState = document.getElementById('album-empty-state');
        const manifest = [];

        items.forEach((item, index) => {
            // Update badge #1, #2...
            const badge = item.querySelector('.album-badge');
            if (badge) {
                badge.innerText = `#${index + 1}` + (index === 0 ? ' (Bìa)' : '');
            }

            if (item.dataset.type === 'existing') {
                manifest.push({
                    type: 'existing',
                    url: item.dataset.url
                });
            } else if (item.dataset.type === 'new') {
                manifest.push({
                    type: 'new',
                    key: item.dataset.key
                });
            }
        });

        // Update count badge
        if (countBadge) {
            countBadge.innerText = `${items.length} ảnh`;
        }

        // Toggle empty state
        if (emptyState) {
            if (items.length === 0) {
                emptyState.classList.remove('hidden');
            } else {
                emptyState.classList.add('hidden');
            }
        }

        // Set manifest input value
        const manifestInput = document.getElementById('album_manifest');
        if (manifestInput) {
            manifestInput.value = JSON.stringify(manifest);
        }
    }
</script>
@endpush