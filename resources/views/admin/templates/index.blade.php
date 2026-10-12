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
            <p class="text-sm text-slate-500 mt-1">Danh mục các giao diện thiệp cưới điện tử tiêu chuẩn trên hệ thống.</p>
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
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <!-- Stat 1: Tổng số template -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Tổng mẫu giao diện</p>
                <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ $totalTemplates }}</h3>
                <p class="text-xs text-emerald-600 font-medium mt-1 flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>100% Sẵn sàng sử dụng</span>
                </p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
            </div>
        </div>

        <!-- Stat 2: Tổng thiệp đang áp dụng -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Thiệp đang phát hành</p>
                <h3 class="text-2xl font-bold text-slate-900 mt-1">{{ $totalCards }}</h3>
                <p class="text-xs text-slate-400 mt-1">Đang hoạt động trên hệ thống</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
            </div>
        </div>

        <!-- Stat 3: Mẫu phổ biến nhất -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex items-center justify-between">
            <div>
                <p class="text-xs font-medium text-slate-500 uppercase tracking-wider">Mẫu được chuộng nhất</p>
                <h3 class="text-base font-bold text-slate-900 mt-1 truncate max-w-[200px]" title="{{ $mostUsedTemplate ?: 'Chưa có' }}">
                    {{ $mostUsedTemplate ?: 'Chưa có' }}
                </h3>
                <p class="text-xs text-amber-600 font-medium mt-1">Chiếm tỷ trọng cao nhất</p>
            </div>
            <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Search & Filter Controls -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-xs flex flex-col sm:flex-row items-center justify-between gap-4">
        <!-- Client-side Search -->
        <div class="relative flex-1 w-full sm:max-w-md">
            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="text" 
                   id="template-search-input" 
                   onkeyup="filterTemplates()" 
                   placeholder="Tìm tên mẫu thiệp, phong cách, mã số..." 
                   class="w-full pl-10 pr-4 py-2 text-sm text-slate-800 placeholder-slate-400 bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition-all">
        </div>

        <!-- Filter Tags -->
        <div class="flex items-center gap-1.5 overflow-x-auto w-full sm:w-auto pb-1 sm:pb-0 text-xs">
            <button type="button" onclick="filterByTag('all')" class="filter-tag-btn px-3 py-1.5 rounded-xl font-medium bg-slate-900 text-white transition-colors" data-tag="all">
                Tất cả ({{ $totalTemplates }})
            </button>
            <button type="button" onclick="filterByTag('Hiện đại')" class="filter-tag-btn px-3 py-1.5 rounded-xl font-medium text-slate-600 hover:bg-slate-100 transition-colors" data-tag="Hiện đại">
                Hiện đại
            </button>
            <button type="button" onclick="filterByTag('Cổ điển')" class="filter-tag-btn px-3 py-1.5 rounded-xl font-medium text-slate-600 hover:bg-slate-100 transition-colors" data-tag="Cổ điển">
                Cổ điển
            </button>
            <button type="button" onclick="filterByTag('Sang trọng')" class="filter-tag-btn px-3 py-1.5 rounded-xl font-medium text-slate-600 hover:bg-slate-100 transition-colors" data-tag="Sang trọng">
                Sang trọng
            </button>
            <button type="button" onclick="filterByTag('Mới')" class="filter-tag-btn px-3 py-1.5 rounded-xl font-medium text-slate-600 hover:bg-slate-100 transition-colors" data-tag="Mới">
                Mẫu mới
            </button>
        </div>
    </div>

    <!-- Template Cards Grid -->
    <div id="templates-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($templates as $tpl)
            <div class="template-card bg-white rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all duration-200 flex flex-col overflow-hidden group"
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
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-white/95 text-slate-800 shadow-2xs">
                            {{ $tpl['badge'] }}
                        </span>
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
                <div class="p-4 flex-1 flex flex-col justify-between space-y-4">
                    <div>
                        <h3 class="font-bold text-slate-900 group-hover:text-indigo-600 transition-colors text-sm leading-snug">
                            {{ $tpl['name'] }}
                        </h3>
                        <p class="text-xs text-slate-500 mt-1 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                            <span>{{ $tpl['style'] }}</span>
                        </p>
                    </div>

                    <!-- Usage Statistics Progress -->
                    <div class="space-y-1.5 pt-2 border-t border-slate-100">
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
                    <a href="{{ $tpl['create_url'] }}" 
                       class="inline-flex items-center justify-center gap-1.5 px-3 py-2 text-xs font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl transition-colors shadow-2xs active:scale-98">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Tạo thiệp</span>
                    </a>
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
        <p class="text-xs text-slate-400 mt-1">Hãy thử tìm với từ khóa khác hoặc xóa bộ lọc phong cách.</p>
        <button type="button" onclick="resetFilters()" class="mt-4 px-4 py-2 text-xs font-medium bg-slate-900 text-white rounded-xl hover:bg-slate-800 transition-colors">
            Xem lại tất cả mẫu
        </button>
    </div>

</div>

@endsection

@push('scripts')
<script>
    let currentFilterTag = 'all';

    // Client-side instant filter function
    function filterTemplates() {
        const query = document.getElementById('template-search-input').value.toLowerCase().trim();
        const cards = document.querySelectorAll('.template-card');
        let visibleCount = 0;

        cards.forEach(card => {
            const name = card.getAttribute('data-name') || '';
            const style = card.getAttribute('data-style') || '';
            const badge = card.getAttribute('data-badge') || '';

            const matchesQuery = query === '' || name.includes(query);
            const matchesTag = currentFilterTag === 'all' || style.includes(currentFilterTag) || badge.includes(currentFilterTag);

            if (matchesQuery && matchesTag) {
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

    // Filter by tag button
    function filterByTag(tag) {
        currentFilterTag = tag;
        document.querySelectorAll('.filter-tag-btn').forEach(btn => {
            if (btn.getAttribute('data-tag') === tag) {
                btn.className = 'filter-tag-btn px-3 py-1.5 rounded-xl font-medium bg-slate-900 text-white transition-colors';
            } else {
                btn.className = 'filter-tag-btn px-3 py-1.5 rounded-xl font-medium text-slate-600 hover:bg-slate-100 transition-colors';
            }
        });
        filterTemplates();
    }

    // Reset filters
    function resetFilters() {
        document.getElementById('template-search-input').value = '';
        filterByTag('all');
    }
</script>
@endpush
