@extends('layouts.admin')

@section('title', 'Kho Mẫu Giao Diện - WeddingSaaS')

@section('content')
<div class="px-6 py-8 max-w-7xl w-full mx-auto space-y-6">

    <!-- Top Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight flex items-center gap-2.5">
                <span>Kho Mẫu Giao Diện</span>
                <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-indigo-50 text-indigo-700 border border-indigo-100">
                    {{ $totalTemplates }} Mẫu khả dụng
                </span>
            </h1>
            <p class="text-sm text-slate-500 mt-1">Quản lý trạng thái hoạt động (Active / Inactive) và danh mục các mẫu thiệp cưới điện tử.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('wedding.create') }}" 
               class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-xl shadow-xs hover:shadow transition-all duration-150 active:scale-98">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Tạo thiệp mới</span>
            </a>
        </div>
    </div>

    <!-- Stats Quick Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Stat 1: Tổng số template -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Tổng mẫu giao diện</p>
                <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ $totalTemplates }}</h3>
                <p class="text-xs text-slate-400 font-medium mt-1">Đã tích hợp trong code</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
            </div>
        </div>

        <!-- Stat 2: Đang kích hoạt (Active) -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex items-center justify-between cursor-pointer hover:border-emerald-300 transition-colors" onclick="filterByStatus('active')">
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Đang hoạt động</p>
                <h3 class="text-2xl font-bold text-emerald-600 mt-1" id="stat-active-count">{{ $activeCount }}</h3>
                <p class="text-xs text-emerald-600 font-medium mt-1 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>Khả dụng cho tạo mới</span>
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>

        <!-- Stat 3: Tạm ngưng (Inactive) -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex items-center justify-between cursor-pointer hover:border-slate-400 transition-colors" onclick="filterByStatus('inactive')">
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Đang tạm ngưng</p>
                <h3 class="text-2xl font-bold text-slate-600 mt-1" id="stat-inactive-count">{{ $inactiveCount }}</h3>
                <p class="text-xs text-slate-400 font-medium mt-1 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                    <span>Ẩn khỏi tạo thiệp mới</span>
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>

        <!-- Stat 4: Thiệp đang phát hành -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Thiệp đã áp dụng</p>
                <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ $totalCards }}</h3>
                <p class="text-xs text-slate-400 mt-1">Đang chạy trên hệ thống</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Search & Filter Controls -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-xs flex flex-col md:flex-row items-stretch md:items-center justify-between gap-4">
        <!-- Client-side Search -->
        <div class="relative flex-1 w-full md:max-w-md">
            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="text" 
                   id="template-search-input" 
                   onkeyup="filterTemplates()" 
                   placeholder="Tìm tên mẫu thiệp, phong cách, mã số (#1, #24)..." 
                   class="w-full pl-10 pr-4 py-2 text-sm text-slate-800 placeholder-slate-400 bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition-all">
        </div>

        <!-- Filter Controls (Status & Style Tags) -->
        <div class="flex items-center gap-1.5 overflow-x-auto w-full md:w-auto pb-1 md:pb-0 text-xs">
            <!-- Status Filters -->
            <div class="flex items-center p-1 bg-slate-100 rounded-xl">
                <button type="button" onclick="filterByStatus('all')" class="status-filter-btn px-2.5 py-1 rounded-lg font-medium bg-white text-slate-900 shadow-2xs transition-all" data-status="all">
                    Tất cả ({{ $totalTemplates }})
                </button>
                <button type="button" onclick="filterByStatus('active')" class="status-filter-btn px-2.5 py-1 rounded-lg font-medium text-slate-600 hover:text-slate-900 transition-all" data-status="active">
                    Hoạt động (<span id="filter-active-count">{{ $activeCount }}</span>)
                </button>
                <button type="button" onclick="filterByStatus('inactive')" class="status-filter-btn px-2.5 py-1 rounded-lg font-medium text-slate-600 hover:text-slate-900 transition-all" data-status="inactive">
                    Tạm ngưng (<span id="filter-inactive-count">{{ $inactiveCount }}</span>)
                </button>
            </div>

            <!-- Divider -->
            <div class="h-6 w-px bg-slate-200 mx-1 shrink-0"></div>

            <!-- Style Tags -->
            <button type="button" onclick="filterByTag('all')" class="style-tag-btn px-3 py-1.5 rounded-xl font-medium bg-slate-900 text-white transition-colors" data-tag="all">
                Tất cả style
            </button>
            <button type="button" onclick="filterByTag('Hiện đại')" class="style-tag-btn px-3 py-1.5 rounded-xl font-medium text-slate-600 hover:bg-slate-100 transition-colors" data-tag="Hiện đại">
                Hiện đại
            </button>
            <button type="button" onclick="filterByTag('Cổ điển')" class="style-tag-btn px-3 py-1.5 rounded-xl font-medium text-slate-600 hover:bg-slate-100 transition-colors" data-tag="Cổ điển">
                Cổ điển
            </button>
            <button type="button" onclick="filterByTag('Sang trọng')" class="style-tag-btn px-3 py-1.5 rounded-xl font-medium text-slate-600 hover:bg-slate-100 transition-colors" data-tag="Sang trọng">
                Sang trọng
            </button>
            <button type="button" onclick="filterByTag('Mới')" class="style-tag-btn px-3 py-1.5 rounded-xl font-medium text-slate-600 hover:bg-slate-100 transition-colors" data-tag="Mới">
                Mẫu mới
            </button>
        </div>
    </div>

    <!-- Template Cards Grid -->
    <div id="templates-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($templates as $tpl)
            <div class="template-card bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-200 flex flex-col overflow-hidden group {{ !$tpl['is_active'] ? 'ring-1 ring-slate-300/80' : '' }}"
                 id="template-card-{{ $tpl['code'] }}"
                 data-code="{{ $tpl['code'] }}"
                 data-status="{{ $tpl['is_active'] ? 'active' : 'inactive' }}"
                 data-name="{{ mb_strtolower($tpl['name'] . ' ' . $tpl['style'] . ' ' . $tpl['code']) }}"
                 data-style="{{ $tpl['style'] }}"
                 data-badge="{{ $tpl['badge'] }}">
                
                <!-- Card Visual / Thumbnail Mockup -->
                <div class="relative h-48 bg-gradient-to-br {{ $tpl['gradient'] }} p-4 flex flex-col justify-between overflow-hidden">
                    <!-- Background subtle decorative pattern -->
                    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
                    
                    <!-- Top Bar inside Card: Code Badge & Status Badge -->
                    <div class="relative z-10 flex items-center justify-between">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-mono font-bold bg-white/90 backdrop-blur-xs text-slate-800 shadow-2xs">
                            #{{ strtoupper($tpl['code']) }}
                        </span>

                        <div class="flex items-center gap-1.5">
                            <!-- Status Pill (Active / Inactive) -->
                            <span id="status-pill-{{ $tpl['code'] }}" 
                                  class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold shadow-2xs transition-colors {{ $tpl['is_active'] ? 'bg-emerald-500 text-white' : 'bg-slate-700/80 text-white backdrop-blur-xs' }}">
                                {{ $tpl['is_active'] ? 'Hoạt động' : 'Tạm ngưng' }}
                            </span>
                            
                            <!-- Style Badge -->
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-white/90 text-slate-800 shadow-2xs">
                                {{ $tpl['badge'] }}
                            </span>
                        </div>
                    </div>

                    <!-- Center Mockup Graphic -->
                    <div class="relative z-10 flex items-center justify-center my-auto transform group-hover:scale-105 transition-transform duration-300">
                        <div class="w-32 h-20 bg-white/95 backdrop-blur-xs rounded-xl shadow-lg border border-white/40 p-2.5 flex flex-col justify-between text-center">
                            <div class="w-6 h-6 mx-auto rounded-full bg-slate-100 flex items-center justify-center text-slate-500">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            </div>
                            <span class="text-[10px] font-bold text-slate-700 truncate tracking-tight">WEDDING INVITATION</span>
                            <div class="w-12 h-0.5 bg-slate-200 mx-auto rounded-full"></div>
                        </div>
                    </div>

                    <!-- Bottom Accent inside mockup -->
                    <div class="relative z-10 text-[11px] text-white/90 font-medium truncate">
                        {{ $tpl['style'] }}
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-4 flex-1 flex flex-col justify-between space-y-3.5">
                    <div>
                        <h3 class="font-bold text-slate-900 group-hover:text-indigo-600 transition-colors text-sm leading-snug">
                            {{ $tpl['name'] }}
                        </h3>
                        <p class="text-xs text-slate-500 mt-1 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                            <span>{{ $tpl['style'] }}</span>
                        </p>
                    </div>

                    <!-- Active / Inactive Interactive Toggle Switch -->
                    <div class="flex items-center justify-between py-2 px-3 rounded-xl bg-slate-50 border border-slate-100 transition-colors" id="toggle-container-{{ $tpl['code'] }}">
                        <div class="flex items-center gap-2">
                            <span id="status-dot-{{ $tpl['code'] }}" class="w-2 h-2 rounded-full transition-colors {{ $tpl['is_active'] ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                            <span id="status-label-{{ $tpl['code'] }}" class="text-xs font-semibold transition-colors {{ $tpl['is_active'] ? 'text-emerald-700' : 'text-slate-500' }}">
                                {{ $tpl['is_active'] ? 'Đang hoạt động' : 'Tạm ngưng' }}
                            </span>
                        </div>
                        <button type="button" 
                                onclick="toggleTemplate('{{ $tpl['code'] }}', this)" 
                                id="toggle-btn-{{ $tpl['code'] }}"
                                class="relative inline-flex h-5 w-9 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1 {{ $tpl['is_active'] ? 'bg-emerald-500' : 'bg-slate-300' }}"
                                role="switch" 
                                aria-checked="{{ $tpl['is_active'] ? 'true' : 'false' }}"
                                title="Bật / Tắt trạng thái mẫu thiệp">
                            <span class="sr-only">Bật/tắt trạng thái mẫu #{{ $tpl['code'] }}</span>
                            <span aria-hidden="true" 
                                  id="toggle-thumb-{{ $tpl['code'] }}"
                                  class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow-sm ring-0 transition duration-200 ease-in-out {{ $tpl['is_active'] ? 'translate-x-4' : 'translate-x-0' }}"></span>
                        </button>
                    </div>

                    <!-- Usage Statistics Progress -->
                    <div class="space-y-1.5 pt-1 border-t border-slate-100">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-500">Đang sử dụng</span>
                            <span class="font-semibold text-slate-800">
                                {{ $tpl['used_count'] }} thiệp 
                                <span class="text-slate-400 font-normal">({{ $tpl['percentage'] }}%)</span>
                            </span>
                        </div>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                            <div class="bg-indigo-600 h-full rounded-full transition-all duration-500" 
                                 style="width: {{ $tpl['used_count'] > 0 ? max($tpl['percentage'], 6) : 0 }}%"></div>
                        </div>
                    </div>
                </div>

                <!-- Card Action Footer -->
                <div class="px-4 py-3 bg-slate-50/70 border-t border-slate-100 grid grid-cols-2 gap-2">
                    <!-- Live Demo Button -->
                    <a href="{{ $tpl['demo_url'] }}" 
                       target="_blank" 
                       class="inline-flex items-center justify-center gap-1.5 px-3 py-2 text-xs font-medium text-slate-700 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl transition-colors shadow-2xs">
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <span>Xem Demo</span>
                    </a>

                    <!-- Use Template Button -->
                    <div id="create-btn-wrapper-{{ $tpl['code'] }}">
                        @if($tpl['is_active'])
                            <a href="{{ $tpl['create_url'] }}" 
                               class="inline-flex w-full items-center justify-center gap-1.5 px-3 py-2 text-xs font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl transition-colors shadow-2xs active:scale-98">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                                </svg>
                                <span>Tạo thiệp</span>
                            </a>
                        @else
                            <button type="button" 
                                    disabled
                                    title="Mẫu thiệp đang tạm ngưng. Kích hoạt để tạo thiệp mới."
                                    class="inline-flex w-full items-center justify-center gap-1.5 px-3 py-2 text-xs font-semibold text-slate-400 bg-slate-100 border border-slate-200 rounded-xl cursor-not-allowed">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                                </svg>
                                <span>Tạm ngưng</span>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Empty Search State -->
    <div id="no-templates-found" class="bg-white rounded-2xl border border-slate-200/80 p-12 text-center hidden">
        <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 mx-auto mb-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <p class="font-medium text-slate-700">Không tìm thấy mẫu thiệp phù hợp</p>
        <p class="text-xs text-slate-400 mt-1">Hãy thử tìm với từ khóa khác hoặc bỏ chọn bộ lọc trạng thái / phong cách.</p>
        <button type="button" onclick="resetFilters()" class="mt-4 px-4 py-2 text-xs font-medium bg-slate-900 text-white rounded-xl hover:bg-slate-800 transition-colors">
            Xem lại tất cả mẫu
        </button>
    </div>

</div>

@endsection

@push('scripts')
<script>
    let currentFilterTag = 'all';
    let currentStatusFilter = 'all';

    // Client-side instant filter function combining text query, status, and style tag
    function filterTemplates() {
        const query = document.getElementById('template-search-input').value.toLowerCase().trim();
        const cards = document.querySelectorAll('.template-card');
        let visibleCount = 0;

        cards.forEach(card => {
            const name = card.getAttribute('data-name') || '';
            const style = card.getAttribute('data-style') || '';
            const badge = card.getAttribute('data-badge') || '';
            const status = card.getAttribute('data-status') || 'active';

            const matchesQuery = query === '' || name.includes(query);
            const matchesTag = currentFilterTag === 'all' || style.includes(currentFilterTag) || badge.includes(currentFilterTag);
            const matchesStatus = currentStatusFilter === 'all' || status === currentStatusFilter;

            if (matchesQuery && matchesTag && matchesStatus) {
                card.classList.remove('hidden');
                visibleCount++;
            } else {
                card.classList.add('hidden');
            }
        });

        const emptyState = document.getElementById('no-templates-found');
        if (visibleCount === 0) {
            emptyState.classList.remove('hidden');
        } else {
            emptyState.classList.add('hidden');
        }
    }

    // Filter by tag button (style)
    function filterByTag(tag) {
        currentFilterTag = tag;
        document.querySelectorAll('.style-tag-btn').forEach(btn => {
            if (btn.getAttribute('data-tag') === tag) {
                btn.className = 'style-tag-btn px-3 py-1.5 rounded-xl font-medium bg-slate-900 text-white transition-colors';
            } else {
                btn.className = 'style-tag-btn px-3 py-1.5 rounded-xl font-medium text-slate-600 hover:bg-slate-100 transition-colors';
            }
        });
        filterTemplates();
    }

    // Filter by status button (all, active, inactive)
    function filterByStatus(status) {
        currentStatusFilter = status;
        document.querySelectorAll('.status-filter-btn').forEach(btn => {
            if (btn.getAttribute('data-status') === status) {
                btn.className = 'status-filter-btn px-2.5 py-1 rounded-lg font-medium bg-white text-slate-900 shadow-2xs transition-all';
            } else {
                btn.className = 'status-filter-btn px-2.5 py-1 rounded-lg font-medium text-slate-600 hover:text-slate-900 transition-all';
            }
        });
        filterTemplates();
    }

    // Reset filters
    function resetFilters() {
        document.getElementById('template-search-input').value = '';
        filterByTag('all');
        filterByStatus('all');
    }

    // AJAX Toggle Template Status
    function toggleTemplate(code, btnElement) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        if (!csrfToken) {
            alert('Không tìm thấy mã CSRF token. Vui lòng tải lại trang.');
            return;
        }

        btnElement.disabled = true;

        fetch(`/admin/templates/${encodeURIComponent(code)}/toggle-status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
        })
        .then(async response => {
            const data = await response.json();
            if (!response.ok) {
                throw new Error(data.message || 'Có lỗi xảy ra khi cập nhật trạng thái');
            }
            return data;
        })
        .then(data => {
            const isActive = data.is_active;
            const card = document.getElementById(`template-card-${code}`);
            const pill = document.getElementById(`status-pill-${code}`);
            const dot = document.getElementById(`status-dot-${code}`);
            const label = document.getElementById(`status-label-${code}`);
            const thumb = document.getElementById(`toggle-thumb-${code}`);
            const createWrapper = document.getElementById(`create-btn-wrapper-${code}`);

            // Update card attributes
            if (card) {
                card.setAttribute('data-status', isActive ? 'active' : 'inactive');
                if (isActive) {
                    card.classList.remove('ring-1', 'ring-slate-300/80');
                } else {
                    card.classList.add('ring-1', 'ring-slate-300/80');
                }
            }

            // Update toggle button
            btnElement.setAttribute('aria-checked', isActive ? 'true' : 'false');
            if (isActive) {
                btnElement.classList.remove('bg-slate-300');
                btnElement.classList.add('bg-emerald-500');
                thumb.classList.remove('translate-x-0');
                thumb.classList.add('translate-x-4');
            } else {
                btnElement.classList.remove('bg-emerald-500');
                btnElement.classList.add('bg-slate-300');
                thumb.classList.remove('translate-x-4');
                thumb.classList.add('translate-x-0');
            }

            // Update status pill & label
            if (pill) {
                pill.textContent = isActive ? 'Hoạt động' : 'Tạm ngưng';
                if (isActive) {
                    pill.className = 'inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold shadow-2xs transition-colors bg-emerald-500 text-white';
                } else {
                    pill.className = 'inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold shadow-2xs transition-colors bg-slate-700/80 text-white backdrop-blur-xs';
                }
            }

            if (dot) {
                dot.className = `w-2 h-2 rounded-full transition-colors ${isActive ? 'bg-emerald-500' : 'bg-slate-400'}`;
            }

            if (label) {
                label.textContent = isActive ? 'Đang hoạt động' : 'Tạm ngưng';
                label.className = `text-xs font-semibold transition-colors ${isActive ? 'text-emerald-700' : 'text-slate-500'}`;
            }

            // Update Create Button
            if (createWrapper) {
                if (isActive) {
                    createWrapper.innerHTML = `
                        <a href="/admin/create?template=${encodeURIComponent(code)}" 
                           class="inline-flex w-full items-center justify-center gap-1.5 px-3 py-2 text-xs font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl transition-colors shadow-2xs active:scale-98">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span>Tạo thiệp</span>
                        </a>
                    `;
                } else {
                    createWrapper.innerHTML = `
                        <button type="button" 
                                disabled
                                title="Mẫu thiệp đang tạm ngưng. Kích hoạt để tạo thiệp mới."
                                class="inline-flex w-full items-center justify-center gap-1.5 px-3 py-2 text-xs font-semibold text-slate-400 bg-slate-100 border border-slate-200 rounded-xl cursor-not-allowed">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                            </svg>
                            <span>Tạm ngưng</span>
                        </button>
                    `;
                }
            }

            // Update stats counts
            const activeStat = document.getElementById('stat-active-count');
            const inactiveStat = document.getElementById('stat-inactive-count');
            const filterActive = document.getElementById('filter-active-count');
            const filterInactive = document.getElementById('filter-inactive-count');

            if (activeStat && inactiveStat) {
                let currentActive = parseInt(activeStat.textContent) || 0;
                let currentInactive = parseInt(inactiveStat.textContent) || 0;

                if (isActive) {
                    currentActive++;
                    currentInactive = Math.max(0, currentInactive - 1);
                } else {
                    currentActive = Math.max(0, currentActive - 1);
                    currentInactive++;
                }

                activeStat.textContent = currentActive;
                inactiveStat.textContent = currentInactive;
                if (filterActive) filterActive.textContent = currentActive;
                if (filterInactive) filterInactive.textContent = currentInactive;
            }

            // Show Toast notification
            if (typeof window.showToast === 'function') {
                window.showToast(data.message, 'success');
            }

            // If a status filter is currently active, re-filter
            if (currentStatusFilter !== 'all') {
                filterTemplates();
            }
        })
        .catch(error => {
            console.error('Error toggling template status:', error);
            if (typeof window.showToast === 'function') {
                window.showToast(error.message || 'Lỗi khi cập nhật trạng thái', 'error');
            } else {
                alert(error.message || 'Lỗi khi cập nhật trạng thái');
            }
        })
        .finally(() => {
            btnElement.disabled = false;
        });
    }
</script>
@endpush
