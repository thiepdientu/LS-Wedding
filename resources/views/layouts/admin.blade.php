<!DOCTYPE html>
<html lang="vi" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Quản lý Thiệp Cưới - WeddingSaaS')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'system-ui', '-apple-system', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="h-full text-slate-800 antialiased flex flex-col md:flex-row bg-[#f8fafc]">

    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed top-5 right-5 z-50 flex flex-col gap-2 pointer-events-none"></div>

    <!-- Mobile Header -->
    <div class="md:hidden flex items-center justify-between bg-white border-b border-slate-200 px-4 py-3 sticky top-0 z-30">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center text-white font-bold text-lg shadow-sm">
                W
            </div>
            <span class="font-bold text-lg text-slate-900 tracking-tight">WeddingSaaS</span>
        </div>
        <button id="mobile-menu-btn" type="button" class="p-2 text-slate-500 hover:text-slate-800 hover:bg-slate-100 rounded-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Sidebar Backdrop for Mobile -->
    <div id="sidebar-backdrop" class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs z-30 hidden md:hidden"></div>

    <!-- Sidebar Navigation -->
    <aside id="admin-sidebar" class="fixed md:sticky top-0 left-0 bottom-0 z-40 w-64 bg-white border-r border-slate-200/80 flex flex-col transition-transform duration-200 -translate-x-full md:translate-x-0 h-screen shrink-0">
        <!-- Logo Header -->
        <div class="px-6 py-6 border-b border-slate-100 flex items-center justify-between">
            <a href="{{ route('admin.wedding-cards.index') }}" class="flex items-center gap-2.5 group">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-indigo-600 to-indigo-500 flex items-center justify-center text-white shadow-md shadow-indigo-200 group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-bold text-lg text-slate-900 tracking-tight leading-tight">WeddingSaaS</span>
                    <span class="text-[11px] font-medium text-slate-400">Hệ thống quản trị thiệp</span>
                </div>
            </a>
            <button id="close-sidebar-btn" class="md:hidden text-slate-400 hover:text-slate-600 p-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Menu Links -->
        <nav class="flex-1 px-3.5 py-5 space-y-1.5 overflow-y-auto">
            <!-- Tổng quan (Dashboard) -->
            <a href="#" class="flex items-center gap-3.5 px-3.5 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-50 rounded-xl transition-colors group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span>Tổng quan (Dashboard)</span>
            </a>

            <!-- Quản lý Thiệp (Active) -->
            <a href="{{ route('admin.wedding-cards.index') }}" 
               class="flex items-center gap-3.5 px-3.5 py-2.5 text-sm font-semibold text-indigo-700 bg-indigo-50/80 rounded-xl shadow-xs border border-indigo-100/60 transition-all">
                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <span>Quản lý Thiệp</span>
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-indigo-600"></span>
            </a>

            <!-- Mẫu Giao Diện (Templates) -->
            <a href="#" class="flex items-center gap-3.5 px-3.5 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-50 rounded-xl transition-colors group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                </svg>
                <span>Mẫu Giao Diện (Templates)</span>
            </a>

            <!-- Khách hàng -->
            <a href="#" class="flex items-center gap-3.5 px-3.5 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-50 rounded-xl transition-colors group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <span>Khách hàng</span>
            </a>

            <!-- Cài đặt hệ thống -->
            <a href="#" class="flex items-center gap-3.5 px-3.5 py-2.5 text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-50 rounded-xl transition-colors group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-slate-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span>Cài đặt hệ thống</span>
            </a>
        </nav>

        <!-- Footer / Version -->
        <div class="p-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-400">
            <span>Phiên bản v2.4</span>
            <span class="inline-flex items-center gap-1 text-emerald-600 font-medium">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                Trực tuyến
            </span>
        </div>
    </aside>

    <!-- Main Content Container -->
    <main class="flex-1 min-w-0 flex flex-col min-h-screen">
        @yield('content')
    </main>

    <!-- Global Scripts -->
    <script>
        // Sidebar Toggle for Mobile
        const menuBtn = document.getElementById('mobile-menu-btn');
        const closeSidebarBtn = document.getElementById('close-sidebar-btn');
        const sidebar = document.getElementById('admin-sidebar');
        const backdrop = document.getElementById('sidebar-backdrop');

        if (menuBtn && sidebar && backdrop) {
            menuBtn.addEventListener('click', () => {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
            });
            const closeSidebar = () => {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            };
            if (closeSidebarBtn) closeSidebarBtn.addEventListener('click', closeSidebar);
            backdrop.addEventListener('click', closeSidebar);
        }

        // Global Toast Notification function
        window.showToast = function (message, type = 'success') {
            const container = document.getElementById('toast-container');
            if (!container) return;

            const toast = document.createElement('div');
            toast.className = `pointer-events-auto flex items-center gap-2.5 px-4 py-3 rounded-xl shadow-lg border text-sm font-medium transition-all transform duration-300 translate-y-2 opacity-0 ${
                type === 'success' 
                    ? 'bg-slate-900 text-white border-slate-800' 
                    : type === 'error' 
                    ? 'bg-rose-600 text-white border-rose-700' 
                    : 'bg-white text-slate-800 border-slate-200'
            }`;

            const icon = type === 'success' 
                ? '<svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>'
                : '<svg class="w-4 h-4 text-white shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';

            toast.innerHTML = `${icon}<span>${message}</span>`;
            container.appendChild(toast);

            // Animate in
            requestAnimationFrame(() => {
                toast.classList.remove('translate-y-2', 'opacity-0');
            });

            // Auto dismiss after 3 seconds
            setTimeout(() => {
                toast.classList.add('opacity-0', '-translate-y-1');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        };

        // Flash message from session
        @if(session('success'))
            window.showToast("{{ session('success') }}", 'success');
        @endif
        @if(session('error'))
            window.showToast("{{ session('error') }}", 'error');
        @endif
    </script>

    @stack('scripts')
</body>
</html>
