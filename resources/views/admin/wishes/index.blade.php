@extends('layouts.admin')

@section('title', 'Quản lý Lời chúc & Sổ lưu bút - WeddingSaaS')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .flatpickr-calendar {
        border-radius: 1rem !important;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1) !important;
        border: 1px solid rgba(226, 232, 240, 0.9) !important;
        font-family: inherit !important;
        padding: 4px;
    }
    .flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange, 
    .flatpickr-day.selected.inRange, .flatpickr-day.startRange.inRange, .flatpickr-day.endRange.inRange, 
    .flatpickr-day.selected:focus, .flatpickr-day.startRange:focus, .flatpickr-day.endRange:focus, 
    .flatpickr-day.selected:hover, .flatpickr-day.startRange:hover, .flatpickr-day.endRange:hover {
        background: #4f46e5 !important;
        border-color: #4f46e5 !important;
        color: #fff !important;
    }
    .flatpickr-day.inRange {
        background: #eef2ff !important;
        border-color: #eef2ff !important;
        color: #4338ca !important;
        box-shadow: -5px 0 0 #eef2ff, 5px 0 0 #eef2ff !important;
    }
</style>
@endpush

@section('content')
<div class="px-6 py-8 max-w-7xl w-full mx-auto space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight flex items-center gap-2.5">
                <span class="p-2 bg-indigo-50 text-indigo-600 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </span>
                Quản lý Lời chúc & Sổ lưu bút
            </h1>
            <p class="text-sm text-slate-500 mt-1">Theo dõi, kiểm duyệt và quản lý toàn bộ lời chúc của khách mời trên các thiệp cưới.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.wishes.export', request()->query()) }}" 
               class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 font-medium text-sm rounded-xl shadow-xs transition-all duration-150">
                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span>Xuất Excel / CSV</span>
            </a>
        </div>
    </div>

    <!-- KPI Summary Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Tổng lời chúc -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                </svg>
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Tổng Lời Chúc</p>
                <p class="text-2xl font-bold text-slate-900 mt-0.5">{{ number_format($stats['total']) }}</p>
            </div>
        </div>

        <!-- Đang hiển thị -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Đang Hiển Thị</p>
                <p class="text-2xl font-bold text-emerald-600 mt-0.5">{{ number_format($stats['approved']) }}</p>
            </div>
        </div>

        <!-- Đang ẩn -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"></path>
                </svg>
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Đang Bị Ẩn</p>
                <p class="text-2xl font-bold text-rose-600 mt-0.5">{{ number_format($stats['hidden']) }}</p>
            </div>
        </div>

        <!-- Khách xác nhận tham dự -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Khách Sẽ Đến (RSVP)</p>
                <p class="text-2xl font-bold text-purple-600 mt-0.5">{{ number_format($stats['attending_guests']) }} <span class="text-xs font-normal text-slate-500">người</span></p>
            </div>
        </div>
    </div>

    <!-- Filter & Search Section -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-xs">
        <form method="GET" action="{{ route('admin.wishes.index') }}" id="filter-form" class="flex flex-col gap-3">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-3">
                <!-- Search Input -->
                <div class="lg:col-span-4 relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" 
                           name="search" 
                           id="search-input"
                           value="{{ request('search') }}" 
                           placeholder="Tìm tên khách, nội dung lời chúc..." 
                           class="w-full pl-10 pr-4 py-2 text-sm text-slate-800 placeholder-slate-400 bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition-all">
                </div>

                <!-- Card Filter Dropdown -->
                <div class="lg:col-span-3 relative">
                    <select name="card_id" 
                            id="card-filter"
                            onchange="document.getElementById('filter-form').submit()" 
                            class="w-full appearance-none pl-3.5 pr-9 py-2 text-sm text-slate-700 bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition-all cursor-pointer">
                        <option value="all" {{ request('card_id', 'all') === 'all' ? 'selected' : '' }}>Tất cả thiệp cưới</option>
                        @foreach($cards as $c)
                            <option value="{{ $c->id }}" {{ request('card_id') == (string)$c->id ? 'selected' : '' }}>
                                {{ $c->formatted_id }}: {{ $c->couple_name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Status Filter Dropdown -->
                <div class="lg:col-span-2 relative">
                    <select name="status" 
                            id="status-filter"
                            onchange="document.getElementById('filter-form').submit()" 
                            class="w-full appearance-none pl-3.5 pr-9 py-2 text-sm text-slate-700 bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition-all cursor-pointer">
                        <option value="all" {{ request('status', 'all') === 'all' ? 'selected' : '' }}>Tất cả trạng thái</option>
                        <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Đang hiển thị</option>
                        <option value="hidden" {{ request('status') === 'hidden' ? 'selected' : '' }}>Đang ẩn</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Attendance Filter Dropdown -->
                <div class="lg:col-span-3 relative">
                    <select name="attendance" 
                            id="attendance-filter"
                            onchange="document.getElementById('filter-form').submit()" 
                            class="w-full appearance-none pl-3.5 pr-9 py-2 text-sm text-slate-700 bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition-all cursor-pointer">
                        <option value="all" {{ request('attendance', 'all') === 'all' ? 'selected' : '' }}>Tất cả RSVP</option>
                        <option value="attending" {{ request('attendance') === 'attending' ? 'selected' : '' }}>Sẽ tham dự</option>
                        <option value="not_attending" {{ request('attendance') === 'not_attending' ? 'selected' : '' }}>Không tham dự</option>
                        <option value="unsure" {{ request('attendance') === 'unsure' ? 'selected' : '' }}>Chưa rõ / Không ghi</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Row 2: Date Range & Action Buttons -->
            <div class="flex flex-wrap items-center justify-between gap-3 pt-2 border-t border-slate-100">
                <div class="relative min-w-[260px]">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <input type="text" 
                           name="date_range" 
                           id="date-range-picker"
                           value="{{ request('date_range') }}" 
                           placeholder="Lọc theo khoảng ngày gửi..." 
                           class="w-full pl-9 pr-8 py-1.5 text-xs text-slate-700 bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition-all cursor-pointer">
                    @if(request('date_range'))
                        <button type="button" 
                                onclick="document.getElementById('date-range-picker').value=''; document.getElementById('filter-form').submit();"
                                class="absolute inset-y-0 right-0 pr-2.5 flex items-center text-slate-400 hover:text-slate-600">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    @endif
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit" 
                            class="px-4 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-xs rounded-xl shadow-xs transition-colors">
                        Áp dụng lọc
                    </button>
                    @if(request()->hasAny(['search', 'card_id', 'status', 'attendance', 'date_range']))
                        <a href="{{ route('admin.wishes.index') }}" 
                           class="px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-medium text-xs rounded-xl transition-colors">
                            Xóa bộ lọc
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <!-- Wishes Data Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50/75 text-xs uppercase font-semibold text-slate-500 border-b border-slate-200/80 tracking-wider">
                    <tr>
                        <th class="py-3.5 px-4">Người Gửi</th>
                        <th class="py-3.5 px-4 min-w-[280px]">Nội Dung Lời Chúc</th>
                        <th class="py-3.5 px-4">Thiệp Cưới</th>
                        <th class="py-3.5 px-4">Xác Nhận RSVP</th>
                        <th class="py-3.5 px-4 text-center">Trạng Thái</th>
                        <th class="py-3.5 px-4 text-right">Thao Tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200/70">
                    @forelse($wishes as $wish)
                        @php
                            $badge = $wish->attendance_badge;
                            $card = $wish->weddingCard;
                        @endphp
                        <tr class="hover:bg-slate-50/60 transition-colors" id="wish-row-{{ $wish->id }}">
                            <!-- Người gửi -->
                            <td class="py-4 px-4 align-top">
                                <div class="flex items-start gap-3">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500 text-white font-bold flex items-center justify-center text-xs shrink-0 shadow-xs">
                                        {{ mb_substr($wish->sender_name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-900 leading-tight">{{ $wish->sender_name }}</p>
                                        <p class="text-xs text-slate-400 mt-0.5">{{ $wish->formatted_created_at }}</p>
                                        @if($wish->ip_address)
                                            <span class="inline-block text-[10px] text-slate-400 bg-slate-100 px-1.5 py-0.5 rounded mt-1 font-mono">
                                                IP: {{ $wish->ip_address }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <!-- Nội dung -->
                            <td class="py-4 px-4 align-top">
                                <div class="text-slate-800 text-sm leading-relaxed max-w-md">
                                    <p class="line-clamp-3 text-slate-700 italic">"{{ $wish->message }}"</p>
                                    @if(mb_strlen($wish->message) > 120)
                                        <button type="button" 
                                                onclick="showDetailModal('{{ addslashes($wish->sender_name) }}', '{{ addslashes($wish->message) }}', '{{ $wish->formatted_created_at }}', '{{ $card ? addslashes($card->couple_name) : '' }}', '{{ $wish->attendance_label }}')"
                                                class="text-xs font-semibold text-indigo-600 hover:text-indigo-800 mt-1 cursor-pointer">
                                            Xem đầy đủ...
                                        </button>
                                    @endif
                                </div>
                            </td>

                            <!-- Thiệp cưới liên kết -->
                            <td class="py-4 px-4 align-top">
                                @if($card)
                                    <div>
                                        <a href="{{ url('/weddingInvite/' . $card->identifyWedding) }}" 
                                           target="_blank" 
                                           class="font-medium text-indigo-600 hover:text-indigo-800 hover:underline flex items-center gap-1">
                                            <span>{{ $card->couple_name }}</span>
                                            <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                            </svg>
                                        </a>
                                        <p class="text-xs text-slate-400 mt-0.5">{{ $card->formatted_id }} (Mẫu {{ $card->template }})</p>
                                    </div>
                                @else
                                    <span class="text-xs text-slate-400 italic">Thiệp đã bị xóa</span>
                                @endif
                            </td>

                            <!-- Xác nhận RSVP -->
                            <td class="py-4 px-4 align-top">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium {{ $badge['class'] }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $badge['dot'] }}"></span>
                                    {{ $badge['label'] }}
                                </span>
                            </td>

                            <!-- Trạng thái Toggle Switch -->
                            <td class="py-4 px-4 align-top text-center">
                                <div class="inline-flex flex-col items-center gap-1">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" 
                                               class="sr-only peer" 
                                               id="toggle-wish-{{ $wish->id }}"
                                               {{ $wish->is_approved ? 'checked' : '' }}
                                               onchange="toggleWishApproval({{ $wish->id }})">
                                        <div class="w-9 h-5 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-indigo-600"></div>
                                    </label>
                                    <span class="text-[11px] font-medium" id="status-text-{{ $wish->id }}">
                                        {{ $wish->is_approved ? 'Hiển thị' : 'Đã ẩn' }}
                                    </span>
                                </div>
                            </td>

                            <!-- Thao tác -->
                            <td class="py-4 px-4 align-top text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    <!-- Nút xem chi tiết -->
                                    <button type="button" 
                                            onclick="showDetailModal('{{ addslashes($wish->sender_name) }}', '{{ addslashes($wish->message) }}', '{{ $wish->formatted_created_at }}', '{{ $card ? addslashes($card->couple_name) : '' }}', '{{ $wish->attendance_label }}')"
                                            class="p-1.5 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors"
                                            title="Xem chi tiết">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>

                                    <!-- Nút xóa -->
                                    <button type="button" 
                                            onclick="confirmDeleteWish({{ $wish->id }}, '{{ addslashes($wish->sender_name) }}')"
                                            class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors"
                                            title="Xóa lời chúc">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-400">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 mb-3">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                    </div>
                                    <p class="font-medium text-slate-600">Không tìm thấy lời chúc nào</p>
                                    <p class="text-xs text-slate-400 mt-1">Hãy thử thay đổi điều kiện tìm kiếm hoặc chọn thiệp cưới khác.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($wishes->hasPages())
            <div class="px-6 py-4 border-t border-slate-200/80 bg-slate-50/50">
                {{ $wishes->links() }}
            </div>
        @endif
    </div>

</div>

<!-- Modal Xem Chi Tiết Lời Chúc -->
<div id="detail-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/50 backdrop-blur-xs hidden p-4">
    <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-xl border border-slate-200 animate-in fade-in zoom-in-95 duration-150">
        <div class="flex items-center justify-between pb-4 border-b border-slate-100">
            <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                    </svg>
                </span>
                Chi Tiết Lời Chúc
            </h3>
            <button type="button" onclick="closeDetailModal()" class="text-slate-400 hover:text-slate-600 p-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="py-4 space-y-3.5">
            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Người gửi</span>
                <p id="modal-sender" class="text-base font-bold text-slate-900 mt-0.5"></p>
            </div>

            <div class="grid grid-cols-2 gap-3 text-xs bg-slate-50 p-3 rounded-xl border border-slate-100">
                <div>
                    <span class="text-slate-400 font-medium">Thiệp cưới:</span>
                    <p id="modal-card" class="font-semibold text-slate-800 mt-0.5"></p>
                </div>
                <div>
                    <span class="text-slate-400 font-medium">Thời gian gửi:</span>
                    <p id="modal-time" class="font-semibold text-slate-800 mt-0.5"></p>
                </div>
                <div class="col-span-2">
                    <span class="text-slate-400 font-medium">Trạng thái RSVP:</span>
                    <p id="modal-attendance" class="font-semibold text-indigo-700 mt-0.5"></p>
                </div>
            </div>

            <div>
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Nội dung lời chúc</span>
                <div class="mt-1.5 p-4 bg-indigo-50/40 rounded-xl border border-indigo-100/60 text-slate-800 text-sm leading-relaxed max-h-60 overflow-y-auto whitespace-pre-wrap font-sans italic" id="modal-message"></div>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 flex justify-end">
            <button type="button" onclick="closeDetailModal()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-xl transition-colors">
                Đóng
            </button>
        </div>
    </div>
</div>

<!-- Modal Xác Nhận Xóa -->
<div id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/50 backdrop-blur-xs hidden p-4">
    <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-xl border border-slate-200 text-center">
        <div class="w-12 h-12 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
        </div>
        <h3 class="text-lg font-bold text-slate-900">Xác nhận xóa lời chúc?</h3>
        <p class="text-sm text-slate-500 mt-2">
            Bạn có chắc chắn muốn xóa lời chúc từ <strong id="delete-sender-name" class="text-slate-800"></strong>? Hành động này không thể hoàn tác.
        </p>

        <div class="mt-6 flex items-center justify-center gap-3">
            <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm rounded-xl transition-colors">
                Hủy bỏ
            </button>
            <button type="button" id="confirm-delete-btn" onclick="executeDeleteWish()" class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white font-medium text-sm rounded-xl shadow-xs transition-colors">
                Xóa ngay
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/vn.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Khởi tạo Flatpickr lọc theo khoảng ngày
        flatpickr('#date-range-picker', {
            mode: 'range',
            dateFormat: 'd/m/Y',
            locale: 'vn',
            allowInput: true,
            onClose: function (selectedDates, dateStr) {
                if (dateStr) {
                    document.getElementById('filter-form').submit();
                }
            }
        });
    });

    // Toast helper
    function showToast(message, type = 'success') {
        const container = document.getElementById('toast-container');
        if (!container) return;

        const toast = document.createElement('div');
        const bg = type === 'success' ? 'bg-emerald-600 text-white' : 'bg-rose-600 text-white';
        toast.className = `${bg} px-4 py-3 rounded-xl shadow-lg text-sm font-medium flex items-center gap-2 transform transition-all duration-300 translate-y-2 opacity-0 pointer-events-auto`;
        toast.innerHTML = `
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${type === 'success' ? 'M5 13l4 4L19 7' : 'M6 18L18 6M6 6l12 12'}"></path>
            </svg>
            <span>${message}</span>
        `;
        container.appendChild(toast);

        requestAnimationFrame(() => {
            toast.classList.remove('translate-y-2', 'opacity-0');
        });

        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-y-2');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // Toggle Approval status qua AJAX
    function toggleWishApproval(wishId) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const toggleInput = document.getElementById(`toggle-wish-${wishId}`);
        const statusText = document.getElementById(`status-text-${wishId}`);

        fetch(`/admin/wishes/${wishId}/toggle-approval`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (statusText) {
                    statusText.textContent = data.is_approved ? 'Hiển thị' : 'Đã ẩn';
                }
                showToast(data.message, 'success');
            } else {
                toggleInput.checked = !toggleInput.checked;
                showToast(data.message || 'Có lỗi xảy ra', 'error');
            }
        })
        .catch(err => {
            toggleInput.checked = !toggleInput.checked;
            showToast('Lỗi mạng hoặc server không phản hồi', 'error');
        });
    }

    // Modal chi tiết
    function showDetailModal(sender, message, time, card, attendance) {
        document.getElementById('modal-sender').textContent = sender;
        document.getElementById('modal-message').textContent = message;
        document.getElementById('modal-time').textContent = time;
        document.getElementById('modal-card').textContent = card || 'Không xác định';
        document.getElementById('modal-attendance').textContent = attendance || 'Chưa rõ';
        document.getElementById('detail-modal').classList.remove('hidden');
    }

    function closeDetailModal() {
        document.getElementById('detail-modal').classList.add('hidden');
    }

    // Modal Xóa
    let currentDeleteId = null;

    function confirmDeleteWish(wishId, senderName) {
        currentDeleteId = wishId;
        document.getElementById('delete-sender-name').textContent = senderName;
        document.getElementById('delete-modal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        currentDeleteId = null;
        document.getElementById('delete-modal').classList.add('hidden');
    }

    function executeDeleteWish() {
        if (!currentDeleteId) return;

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const deleteBtn = document.getElementById('confirm-delete-btn');
        deleteBtn.disabled = true;
        deleteBtn.innerHTML = 'Đang xóa...';

        fetch(`/admin/wishes/${currentDeleteId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            closeDeleteModal();
            deleteBtn.disabled = false;
            deleteBtn.innerHTML = 'Xóa ngay';

            if (data.success) {
                const row = document.getElementById(`wish-row-${currentDeleteId}`);
                if (row) {
                    row.style.transition = 'all 0.3s ease';
                    row.style.opacity = '0';
                    row.style.transform = 'scale(0.95)';
                    setTimeout(() => row.remove(), 300);
                }
                showToast(data.message, 'success');
            } else {
                showToast(data.message || 'Không thể xóa lời chúc', 'error');
            }
        })
        .catch(err => {
            closeDeleteModal();
            deleteBtn.disabled = false;
            deleteBtn.innerHTML = 'Xóa ngay';
            showToast('Lỗi khi gửi yêu cầu xóa', 'error');
        });
    }
</script>
@endpush
