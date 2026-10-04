@extends('layouts.admin')

@section('title', 'Quản lý Danh sách Thiệp - WeddingSaaS')

@section('content')
<div class="px-6 py-8 max-w-7xl w-full mx-auto space-y-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Quản lý Danh sách Thiệp</h1>
            <p class="text-sm text-slate-500 mt-1">Kiểm soát toàn bộ vòng đời của các thiệp cưới trên hệ thống.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('wedding.create') }}" 
               class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-xl shadow-xs hover:shadow transition-all duration-150 active:scale-98">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Thêm thiệp mới</span>
            </a>
        </div>
    </div>

    <!-- Filter & Search Section -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-xs">
        <form method="GET" action="{{ route('admin.wedding-cards.index') }}" id="filter-form" class="flex flex-col lg:flex-row items-stretch lg:items-center gap-3">
            
            <!-- Search Input -->
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" 
                       name="search" 
                       id="search-input"
                       value="{{ request('search') }}" 
                       placeholder="Tìm kiếm tên, email, SĐT, URL..." 
                       class="w-full pl-10 pr-4 py-2 text-sm text-slate-800 placeholder-slate-400 bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition-all">
            </div>

            <div class="flex flex-wrap sm:flex-nowrap items-center gap-3">
                <!-- Status Dropdown -->
                <div class="relative min-w-[160px] w-full sm:w-auto">
                    <select name="status" 
                            id="status-filter"
                            onchange="document.getElementById('filter-form').submit()" 
                            class="w-full appearance-none pl-3.5 pr-9 py-2 text-sm text-slate-700 bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition-all cursor-pointer">
                        <option value="all" {{ request('status', 'all') === 'all' ? 'selected' : '' }}>Tất cả trạng thái ({{ $totalCount }})</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Đang hoạt động ({{ $activeCount }})</option>
                        <option value="locked" {{ request('status') === 'locked' ? 'selected' : '' }}>Đã ẩn / Khóa ({{ $lockedCount }})</option>
                        <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Bản Nháp ({{ $draftCount }})</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <!-- Date Range Picker / Input -->
                <div class="relative min-w-[210px] w-full sm:w-auto">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <input type="text" 
                           name="date_range" 
                           value="{{ request('date_range', '01/10/2026 - 31/10/2026') }}" 
                           placeholder="dd/mm/yyyy - dd/mm/yyyy"
                           class="w-full pl-9 pr-4 py-2 text-sm text-slate-700 bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition-all font-sans">
                </div>

                <!-- Action Filter / Reset -->
                <button type="submit" class="px-4 py-2 bg-slate-900 hover:bg-slate-800 text-white text-sm font-medium rounded-xl transition-colors">
                    Lọc
                </button>
                @if(request()->hasAny(['search', 'status', 'date_range']))
                    <a href="{{ route('admin.wedding-cards.index') }}" class="px-3 py-2 text-sm text-slate-500 hover:text-slate-800 hover:bg-slate-100 rounded-xl transition-colors" title="Đặt lại bộ lọc">
                        Xóa lọc
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Data Table Container -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-100 bg-slate-50/70 text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                        <th scope="col" class="py-3.5 pl-6 pr-3">ID</th>
                        <th scope="col" class="py-3.5 px-4">TÊN CẶP ĐÔI</th>
                        <th scope="col" class="py-3.5 px-4">ĐƯỜNG DẪN (URL)</th>
                        <th scope="col" class="py-3.5 px-4">TEMPLATE</th>
                        <th scope="col" class="py-3.5 px-4">THỜI HẠN</th>
                        <th scope="col" class="py-3.5 px-4 text-center">TRẠNG THÁI</th>
                        <th scope="col" class="py-3.5 pl-4 pr-6 text-right">THAO TÁC</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse ($cards as $card)
                        @php
                            $statusInfo = $card->status_info;
                            $publicSlug = $card->identifyWedding ?: '';
                            $urlDisplay = $publicSlug ? 'wed.vn/' . $publicSlug : 'Chưa thiết lập URL';
                            $actualFullUrl = $publicSlug ? url('/weddingInvite/' . $publicSlug) : '';
                            
                            // Avatar colors/icons
                            $avatarBgs = [
                                'bg-rose-100 text-rose-500',
                                'bg-purple-100 text-purple-600',
                                'bg-slate-100 text-slate-600',
                                'bg-amber-100 text-amber-600',
                                'bg-indigo-100 text-indigo-600'
                            ];
                            $avatarStyle = $avatarBgs[$loop->index % count($avatarBgs)];
                        @endphp
                        <tr class="hover:bg-slate-50/60 transition-colors group">
                            <!-- ID -->
                            <td class="py-4 pl-6 pr-3 font-mono text-xs text-slate-500 whitespace-nowrap">
                                {{ $card->formatted_id }}
                            </td>

                            <!-- Tên cặp đôi -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-full {{ $avatarStyle }} flex items-center justify-center font-semibold text-xs shrink-0 shadow-2xs">
                                        @if($loop->index % 3 == 0)
                                            <!-- Heart Icon -->
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                            </svg>
                                        @elseif($loop->index % 3 == 1)
                                            <!-- Wine/Celebration Icon -->
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                                <path d="M7 2v2h1v3.24L4 12v2h6v6H7v2h10v-2h-3v-6h6v-2l-4-4.76V4h1V2H7zm4 7.24V4h2v5.24l2 2.38V12H9v-.38l2-2.38z"/>
                                            </svg>
                                        @else
                                            <!-- Rings/Rings icon -->
                                            <svg class="w-4 h-4 stroke-current fill-none" stroke-width="2" viewBox="0 0 24 24">
                                                <circle cx="9" cy="12" r="5"></circle>
                                                <circle cx="15" cy="12" r="5"></circle>
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-semibold text-slate-900 group-hover:text-indigo-600 transition-colors">
                                            {{ $card->couple_name }}
                                        </span>
                                        <span class="text-xs text-slate-400">
                                            {{ $card->customer_email ?: ($card->bride_phone ? 'SĐT: ' . $card->bride_phone : 'Chưa có email') }}
                                        </span>
                                    </div>
                                </div>
                            </td>

                            <!-- Đường dẫn (URL) -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                @if($card->status === 'draft' || !$publicSlug)
                                    <span class="text-xs italic text-slate-400">Chưa thiết lập URL</span>
                                @else
                                    <div class="inline-flex items-center gap-1.5">
                                        <a href="{{ $actualFullUrl }}" 
                                           target="_blank" 
                                           class="{{ $card->status === 'locked' ? 'line-through text-slate-400' : 'text-indigo-600 hover:text-indigo-700 hover:underline' }} font-medium text-xs">
                                            {{ $urlDisplay }}
                                        </a>
                                        <button type="button" 
                                                onclick="copyToClipboard('{{ $actualFullUrl }}', '{{ $urlDisplay }}')"
                                                class="p-1 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-md transition-colors" 
                                                title="Sao chép đường dẫn">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                @endif
                            </td>

                            <!-- Template -->
                            <td class="py-4 px-4 text-xs text-slate-600 whitespace-nowrap">
                                {{ $card->template_name }}
                            </td>

                            <!-- Thời hạn -->
                            <td class="py-4 px-4 whitespace-nowrap">
                                <div class="flex flex-col text-xs">
                                    <span class="font-medium text-slate-700">
                                        {{ $card->created_at ? $card->created_at->format('d/m/Y') : ($card->wedding_date ? $card->wedding_date->format('d/m/Y') : '01/10/2026') }}
                                    </span>
                                    <span class="text-slate-400 text-[11px]">
                                        @if($card->expires_at)
                                            Hết: {{ $card->expires_at->format('d/m/Y') }}
                                        @elseif($card->status === 'active')
                                            Hết: {{ $card->created_at ? $card->created_at->addYear()->format('d/m/Y') : '01/10/2027' }}
                                        @else
                                            -
                                        @endif
                                    </span>
                                </div>
                            </td>

                            <!-- Trạng thái -->
                            <td class="py-4 px-4 text-center whitespace-nowrap">
                                <span id="status-badge-{{ $card->id }}" 
                                      class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium {{ $statusInfo['badge_class'] }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $statusInfo['dot_class'] }}"></span>
                                    <span>{{ $statusInfo['label'] }}</span>
                                </span>
                            </td>

                            <!-- Thao tác -->
                            <td class="py-4 pl-4 pr-6 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-2">
                                    <!-- Edit Icon -->
                                    <a href="{{ route('wedding.edit', $card->id) }}" 
                                       class="p-1.5 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors" 
                                       title="Chỉnh sửa thiệp cưới">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                    </a>

                                    <!-- Customer / Guests Icon -->
                                    <button type="button" 
                                            onclick="openCustomerModal('{{ $card->id }}')" 
                                            class="p-1.5 text-slate-400 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition-colors" 
                                            title="Thông tin chủ sở hữu & tiệc cưới">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </button>

                                    <!-- Toggle Status (Eye / Lock) -->
                                    <button type="button" 
                                            onclick="toggleCardStatus('{{ $card->id }}')" 
                                            class="p-1.5 text-slate-400 hover:text-emerald-600 hover:bg-emerald-50 rounded-lg transition-colors" 
                                            title="Bật/Tắt hiển thị (Khóa/Mở)">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>

                                    <!-- Delete Icon -->
                                    <button type="button" 
                                            onclick="confirmDelete('{{ $card->id }}', '{{ $card->couple_name }}', '{{ $card->formatted_id }}')" 
                                            class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors" 
                                            title="Xóa thiệp cưới">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-slate-500">
                                <div class="flex flex-col items-center justify-center max-w-sm mx-auto">
                                    <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 mb-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="font-medium text-slate-700">Không tìm thấy thiệp cưới nào</p>
                                    <p class="text-xs text-slate-400 mt-1">Hãy thử tìm với từ khóa khác hoặc điều chỉnh bộ lọc.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination & Summary Footer -->
        <div class="px-6 py-4 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="text-xs text-slate-500">
                @if($cards->total() > 0)
                    Hiển thị <span class="font-semibold text-slate-700">{{ $cards->firstItem() }}</span> đến 
                    <span class="font-semibold text-slate-700">{{ $cards->lastItem() }}</span> trong số 
                    <span class="font-semibold text-slate-700">{{ $cards->total() }}</span> kết quả
                @else
                    Không có kết quả nào
                @endif
            </div>

            <!-- Custom Clean Pagination matching the screenshot -->
            @if ($cards->hasPages())
                <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center gap-1.5">
                    {{-- Previous Page Link --}}
                    @if ($cards->onFirstPage())
                        <span class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-300 cursor-not-allowed">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </span>
                    @else
                        <a href="{{ $cards->previousPageUrl() }}" class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($cards->getUrlRange(1, $cards->lastPage()) as $page => $url)
                        @if ($page == $cards->currentPage())
                            <span class="w-8 h-8 flex items-center justify-center rounded-lg bg-indigo-50 border border-indigo-600 text-indigo-600 font-semibold text-xs shadow-2xs">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 font-medium text-xs transition-colors">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($cards->hasMorePages())
                        <a href="{{ $cards->nextPageUrl() }}" class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    @else
                        <span class="w-8 h-8 flex items-center justify-center rounded-lg border border-slate-200 text-slate-300 cursor-not-allowed">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </span>
                    @endif
                </nav>
            @endif
        </div>
    </div>
</div>

<!-- Modal Thông tin Khách hàng / Chi tiết thiệp -->
<div id="customer-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-xs hidden">
    <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-xl border border-slate-100 transform transition-all">
        <div class="flex items-center justify-between pb-4 border-b border-slate-100">
            <div>
                <h3 class="font-bold text-lg text-slate-900" id="modal-couple-name">Chi tiết Thiệp Cưới</h3>
                <p class="text-xs text-slate-400 mt-0.5" id="modal-card-id">#TC-xxxx</p>
            </div>
            <button type="button" onclick="closeCustomerModal()" class="p-1.5 text-slate-400 hover:text-slate-600 rounded-lg hover:bg-slate-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <div class="py-4 space-y-3.5 text-sm" id="modal-content">
            <div class="grid grid-cols-2 gap-3 bg-slate-50 p-3.5 rounded-xl border border-slate-100">
                <div>
                    <span class="text-xs text-slate-400 block">Email liên hệ</span>
                    <span class="font-semibold text-slate-800" id="modal-email">-</span>
                </div>
                <div>
                    <span class="text-xs text-slate-400 block">Trạng thái</span>
                    <span class="font-semibold text-slate-800" id="modal-status">-</span>
                </div>
                <div>
                    <span class="text-xs text-slate-400 block">SĐT Cô dâu</span>
                    <span class="font-medium text-slate-700" id="modal-bride-phone">-</span>
                </div>
                <div>
                    <span class="text-xs text-slate-400 block">SĐT Chú rể</span>
                    <span class="font-medium text-slate-700" id="modal-groom-phone">-</span>
                </div>
            </div>

            <div class="space-y-2">
                <div>
                    <span class="text-xs text-slate-400 block">Thời gian & Ngày thành hôn</span>
                    <p class="font-medium text-slate-800" id="modal-wedding-time">-</p>
                </div>
                <div>
                    <span class="text-xs text-slate-400 block">Địa điểm tổ chức</span>
                    <p class="font-medium text-slate-800" id="modal-venue-name">-</p>
                    <p class="text-xs text-slate-500 mt-0.5" id="modal-address">-</p>
                </div>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-2.5">
            <button type="button" onclick="closeCustomerModal()" class="px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100 rounded-xl transition-colors">
                Đóng
            </button>
            <a id="modal-edit-link" href="#" class="px-4 py-2 text-sm font-medium bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl transition-colors">
                Chỉnh sửa thông tin
            </a>
        </div>
    </div>
</div>

<!-- Modal Xác nhận Xóa -->
<div id="delete-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-xs hidden">
    <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-xl border border-slate-100">
        <div class="w-12 h-12 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mx-auto mb-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        </div>
        <h3 class="font-bold text-center text-lg text-slate-900 mb-1">Xác nhận xóa thiệp?</h3>
        <p class="text-xs text-center text-slate-500 mb-6" id="delete-modal-msg">Hành động này không thể hoàn tác.</p>
        
        <form id="delete-form" method="POST" action="">
            @csrf
            @method('DELETE')
            <div class="flex items-center gap-2.5">
                <button type="button" onclick="closeDeleteModal()" class="flex-1 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100 rounded-xl transition-colors">
                    Hủy bỏ
                </button>
                <button type="submit" class="flex-1 py-2 text-sm font-medium bg-rose-600 hover:bg-rose-700 text-white rounded-xl transition-colors">
                    Xác nhận xóa
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Copy URL to Clipboard
    function copyToClipboard(url, label) {
        if (!url) {
            window.showToast('Chưa có liên kết URL khả dụng!', 'error');
            return;
        }
        navigator.clipboard.writeText(url).then(() => {
            window.showToast(`Đã sao chép liên kết ${label} vào bộ nhớ tạm!`, 'success');
        }).catch(err => {
            window.showToast('Không thể sao chép liên kết!', 'error');
        });
    }

    // Toggle Status (AJAX)
    async function toggleCardStatus(cardId) {
        try {
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const response = await fetch(`/admin/wedding-cards/${cardId}/toggle-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json',
                }
            });

            const result = await response.json();
            if (result.success) {
                const badge = document.getElementById(`status-badge-${cardId}`);
                if (badge && result.status_info) {
                    badge.className = `inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium ${result.status_info.badge_class}`;
                    badge.innerHTML = `<span class="w-1.5 h-1.5 rounded-full ${result.status_info.dot_class}"></span><span>${result.status_info.label}</span>`;
                }
                window.showToast(result.message, 'success');
            }
        } catch (e) {
            window.showToast('Có lỗi xảy ra khi đổi trạng thái!', 'error');
        }
    }

    // Open Customer Details Modal
    async function openCustomerModal(cardId) {
        try {
            const response = await fetch(`/admin/wedding-cards/${cardId}/customer-info`);
            const result = await response.json();

            if (result.success) {
                const data = result.data;
                document.getElementById('modal-couple-name').innerText = data.couple_name;
                document.getElementById('modal-card-id').innerText = data.formatted_id;
                document.getElementById('modal-email').innerText = data.customer_email;
                document.getElementById('modal-status').innerText = data.status;
                document.getElementById('modal-bride-phone').innerText = data.bride_phone;
                document.getElementById('modal-groom-phone').innerText = data.groom_phone;
                document.getElementById('modal-wedding-time').innerText = `${data.wedding_time} ngày ${data.wedding_date}`;
                document.getElementById('modal-venue-name').innerText = data.name_place_wedding;
                document.getElementById('modal-address').innerText = data.address_wedding;
                document.getElementById('modal-edit-link').href = `/admin/edit/${data.id}`;

                document.getElementById('customer-modal').classList.remove('hidden');
            }
        } catch (e) {
            window.showToast('Không thể tải thông tin chi tiết!', 'error');
        }
    }

    function closeCustomerModal() {
        document.getElementById('customer-modal').classList.add('hidden');
    }

    // Confirm Delete Modal
    function confirmDelete(id, name, formattedId) {
        const form = document.getElementById('delete-form');
        form.action = `/admin/wedding-cards/${id}`;
        document.getElementById('delete-modal-msg').innerText = `Bạn có chắc muốn xóa thiệp ${formattedId} của cặp đôi ${name}?`;
        document.getElementById('delete-modal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('delete-modal').classList.add('hidden');
    }

    // Close modal on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeCustomerModal();
            closeDeleteModal();
        }
    });
</script>
@endpush
