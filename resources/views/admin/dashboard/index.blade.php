@extends('layouts.admin')

@section('title', 'Tổng quan hệ thống - WeddingSaaS')

@section('content')
<div class="px-6 py-8 max-w-7xl w-full mx-auto space-y-8">

    <!-- Top Header & Quick Actions -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1">
                <span>Quản trị</span>
                <span>/</span>
                <span class="text-indigo-600">Bảng điều khiển</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight flex items-center gap-2.5">
                <span>Tổng quan hệ thống</span>
                <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-100 flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    Trực tuyến
                </span>
            </h1>
            <p class="text-sm text-slate-500 mt-1">
                Hôm nay là {{ now()->translatedFormat('l, d/m/Y') }}. Dưới đây là tình hình hoạt động và các sự kiện cưới nổi bật.
            </p>
        </div>

        <!-- Quick Action Buttons -->
        <div class="flex flex-wrap items-center gap-2.5">
            <a href="{{ route('wedding.create') }}" 
               class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-xl shadow-xs hover:shadow transition-all duration-150 active:scale-98">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Tạo thiệp mới</span>
            </a>

            <a href="{{ route('admin.wedding-cards.index') }}" 
               class="inline-flex items-center justify-center gap-2 px-3.5 py-2.5 bg-white hover:bg-slate-50 text-slate-700 border border-slate-200/90 font-medium text-sm rounded-xl shadow-xs transition-colors">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <span>Quản lý thiệp</span>
            </a>

            <a href="{{ route('admin.templates.index') }}" 
               class="inline-flex items-center justify-center gap-2 px-3.5 py-2.5 bg-white hover:bg-slate-50 text-slate-700 border border-slate-200/90 font-medium text-sm rounded-xl shadow-xs transition-colors">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                </svg>
                <span>Kho mẫu giao diện</span>
            </a>
        </div>
    </div>

    <!-- 4 KPI Metrics Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- KPI 1: Tổng số thiệp -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex items-center justify-between hover:border-slate-300 transition-all">
            <div class="space-y-1">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Tổng số thiệp</p>
                <h3 class="text-3xl font-extrabold text-slate-900 tracking-tight">{{ number_format($totalCards) }}</h3>
                <p class="text-xs text-slate-400 font-medium">Toàn bộ nền tảng</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
        </div>

        <!-- KPI 2: Thiệp đang hoạt động -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex items-center justify-between hover:border-slate-300 transition-all">
            <div class="space-y-1">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Đang hoạt động</p>
                <h3 class="text-3xl font-extrabold text-emerald-600 tracking-tight">{{ number_format($activeCards) }}</h3>
                <p class="text-xs text-emerald-700 font-medium flex items-center gap-1">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    <span>Phát hành công khai</span>
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>

        <!-- KPI 3: Cưới trong 14 ngày tới -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex items-center justify-between hover:border-slate-300 transition-all">
            <div class="space-y-1">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Cưới 14 ngày tới</p>
                <h3 class="text-3xl font-extrabold text-amber-600 tracking-tight">{{ number_format($upcomingCount) }}</h3>
                <p class="text-xs text-amber-700 font-medium flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Cần chú ý hỗ trợ CSKH</span>
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>

        <!-- KPI 4: Tạo mới tháng này -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex items-center justify-between hover:border-slate-300 transition-all">
            <div class="space-y-1">
                <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Tạo mới tháng này</p>
                <h3 class="text-3xl font-extrabold text-indigo-600 tracking-tight">{{ number_format($newCardsThisMonth) }}</h3>
                <p class="text-xs text-indigo-600 font-medium">Tháng {{ now()->format('m/Y') }}</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
            </div>
        </div>

    </div>

    <!-- 2 Main Data Sections -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Cột 1: Đám cưới sắp diễn ra gần nhất -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs flex flex-col justify-between space-y-5">
            <div class="space-y-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div>
                        <h2 class="text-base font-bold text-slate-900 flex items-center gap-2">
                            <span>Đám cưới sắp diễn ra gần nhất</span>
                            <span class="text-xs font-semibold px-2 py-0.5 rounded-full bg-amber-50 text-amber-700 border border-amber-200">
                                Sắp tới
                            </span>
                        </h2>
                        <p class="text-xs text-slate-400 mt-0.5">Các sự kiện thành hôn sắp diễn ra tính từ hôm nay trở đi.</p>
                    </div>
                    <a href="{{ route('admin.wedding-cards.index') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-700 transition-colors">
                        Xem tất cả &rarr;
                    </a>
                </div>

                @if($upcomingWeddings->isEmpty())
                    <div class="py-12 text-center text-slate-400 space-y-2">
                        <svg class="w-10 h-10 mx-auto text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-sm font-medium">Chưa có đám cưới nào sắp tới trong danh sách.</p>
                    </div>
                @else
                    <div class="divide-y divide-slate-100">
                        @foreach($upcomingWeddings as $wedding)
                            @php
                                $diffDays = (int) now()->startOfDay()->diffInDays($wedding->wedding_date, false);
                            @endphp
                            <div class="py-3.5 flex items-center justify-between gap-3 group">
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-sm text-slate-900 group-hover:text-indigo-600 transition-colors truncate">
                                            {{ $wedding->couple_name }}
                                        </span>
                                        <span class="text-[11px] font-mono text-slate-400 shrink-0">
                                            {{ $wedding->formatted_id }}
                                        </span>

                                        <!-- Badge Countdown -->
                                        @if($diffDays === 0)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold bg-rose-50 text-rose-700 border border-rose-200 shrink-0">
                                                Hôm nay
                                            </span>
                                        @elseif($diffDays === 1)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-200 shrink-0">
                                                Ngày mai
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-indigo-50 text-indigo-700 border border-indigo-200 shrink-0">
                                                Còn {{ $diffDays }} ngày
                                            </span>
                                        @endif
                                    </div>

                                    <div class="flex items-center gap-3 text-xs text-slate-500 mt-1">
                                        <span class="flex items-center gap-1 text-slate-700 font-medium">
                                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            {{ $wedding->formatted_wedding_datetime }}
                                        </span>
                                        @if($wedding->name_place_wedding || $wedding->address_wedding)
                                            <span class="truncate text-slate-400 hidden sm:inline" title="{{ $wedding->name_place_wedding ?: $wedding->address_wedding }}">
                                                • {{ $wedding->name_place_wedding ?: $wedding->address_wedding }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex items-center gap-1.5 shrink-0">
                                    <a href="{{ url('/weddingInvite/' . $wedding->identifyWedding) }}" target="_blank"
                                       title="Xem thiệp"
                                       class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('wedding.edit', $wedding->id) }}"
                                       title="Chỉnh sửa thiệp"
                                       class="p-2 text-slate-400 hover:text-slate-800 hover:bg-slate-100 rounded-lg transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- Cột 2: Thiệp vừa khởi tạo gần đây -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs flex flex-col justify-between space-y-5">
            <div class="space-y-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                    <div>
                        <h2 class="text-base font-bold text-slate-900 flex items-center gap-2">
                            <span>Thiệp vừa khởi tạo gần đây</span>
                            <span class="text-xs font-semibold px-2 py-0.5 rounded-full bg-indigo-50 text-indigo-700 border border-indigo-200">
                                Mới nhất
                            </span>
                        </h2>
                        <p class="text-xs text-slate-400 mt-0.5">Các thiệp cưới vừa được thêm vào hệ thống.</p>
                    </div>
                    <a href="{{ route('admin.wedding-cards.index') }}" class="text-xs font-semibold text-indigo-600 hover:text-indigo-700 transition-colors">
                        Xem tất cả &rarr;
                    </a>
                </div>

                @if($recentCards->isEmpty())
                    <div class="py-12 text-center text-slate-400 space-y-2">
                        <svg class="w-10 h-10 mx-auto text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <p class="text-sm font-medium">Chưa có thiệp cưới nào được tạo.</p>
                    </div>
                @else
                    <div class="divide-y divide-slate-100">
                        @foreach($recentCards as $card)
                            <div class="py-3.5 flex items-center justify-between gap-3 group">
                                <div class="min-w-0 flex-1">
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold text-sm text-slate-900 group-hover:text-indigo-600 transition-colors truncate">
                                            {{ $card->couple_name }}
                                        </span>
                                        <span class="text-[11px] font-mono text-slate-400 shrink-0">
                                            {{ $card->formatted_id }}
                                        </span>

                                        <!-- Badge Status -->
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold {{ $card->status_info['badge_class'] }} shrink-0">
                                            <span class="w-1 h-1 rounded-full {{ $card->status_info['dot_class'] }}"></span>
                                            {{ $card->status_info['label'] }}
                                        </span>
                                    </div>

                                    <div class="flex items-center gap-3 text-xs text-slate-500 mt-1">
                                        <span class="text-slate-600 font-medium">
                                            {{ $card->template_name }}
                                        </span>
                                        <span class="text-slate-400">
                                            • Tạo {{ $card->created_at ? $card->created_at->diffForHumans() : 'N/A' }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex items-center gap-1.5 shrink-0">
                                    <a href="{{ url('/weddingInvite/' . $card->identifyWedding) }}" target="_blank"
                                       title="Xem thiệp"
                                       class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                    </a>
                                    <a href="{{ route('wedding.edit', $card->id) }}"
                                       title="Chỉnh sửa thiệp"
                                       class="p-2 text-slate-400 hover:text-slate-800 hover:bg-slate-100 rounded-lg transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

    </div>

</div>
@endsection
