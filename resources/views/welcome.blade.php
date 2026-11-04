<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['site_name'] ?? 'LS Wedding' }} - Nền tảng làm thiệp cưới online miễn phí & sang trọng</title>
    <meta name="description" content="Tạo thiệp cưới online sang trọng, dễ dàng chia sẻ qua Zalo, Messenger. Tích hợp mừng cưới QR, album ảnh, bản đồ chỉ đường và xác nhận tham dự.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        cursive: ['"Great Vibes"', 'cursive'],
                    },
                    colors: {
                        brand: {
                            50: '#fdf2f8',
                            100: '#fce7f3',
                            200: '#fbcfe8',
                            500: '#ec4899',
                            600: '#db2777',
                            700: '#be185d',
                            800: '#9d174d',
                        }
                    }
                }
            }
        }
    </script>
    <!-- Swiper 3D Carousel CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .font-cursive { font-family: 'Great Vibes', cursive; }
        .backdrop-glass { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); }
        .hero-gradient { background: radial-gradient(circle at 50% 0%, rgba(244, 114, 182, 0.15) 0%, rgba(243, 232, 255, 0.2) 50%, rgba(255, 255, 255, 1) 100%); }

        /* Swiper 3D Coverflow Tweaks */
        .swiper-3d-templates {
            width: 100%;
            perspective: 1200px;
        }
        .swiper-3d-templates .swiper-slide {
            transition: transform 0.4s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.4s ease;
        }
        .swiper-3d-templates .swiper-slide:not(.swiper-slide-active) {
            opacity: 0.88;
        }
        .swiper-3d-templates .swiper-slide-active {
            opacity: 1;
            z-index: 20;
        }
        .swiper-3d-templates .swiper-pagination-bullet {
            width: 8px;
            height: 8px;
            background: #cbd5e1;
            opacity: 0.8;
            transition: all 0.3s ease;
        }
        .swiper-3d-templates .swiper-pagination-bullet-active {
            width: 28px;
            border-radius: 9999px;
            background: #e11d48;
            opacity: 1;
        }
    </style>
</head>
<body class="font-sans text-slate-800 bg-white antialiased selection:bg-rose-500 selection:text-white pb-16 lg:pb-0">

    <!-- Header / Navbar -->
    <header class="sticky top-0 z-50 backdrop-glass border-b border-slate-200/70 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-2.5 group">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-rose-500 to-indigo-600 flex items-center justify-center text-white shadow-md shadow-rose-200 group-hover:scale-105 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-bold text-xl text-slate-900 tracking-tight leading-tight flex items-center gap-1">
                        <span>{{ $settings['site_name'] ?? 'LS Wedding' }}</span>
                        <span class="text-xs px-2 py-0.5 rounded-full bg-rose-50 text-rose-600 font-semibold border border-rose-100 hidden sm:inline-block">Online</span>
                    </span>
                    <span class="text-[11px] text-slate-400 font-medium">Thiệp Cưới Điện Tử</span>
                </div>
            </a>

            <!-- Navigation Links (Desktop) -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
                <a href="#mau-thiep" class="hover:text-rose-600 transition-colors">Kho Mẫu Thiệp</a>
                <a href="#quy-trinh" class="hover:text-rose-600 transition-colors">Quy Trình</a>
                <a href="#tinh-nang" class="hover:text-rose-600 transition-colors">Tính Năng</a>
                <a href="#danh-gia" class="hover:text-rose-600 transition-colors">Đánh Giá</a>
                <a href="#faq" class="hover:text-rose-600 transition-colors">Hỏi Đáp</a>
            </nav>

            <!-- CTA Buttons -->
            <div class="flex items-center gap-3">
                @if(!empty($settings['hotline']))
                    <a href="tel:{{ preg_replace('/[^0-9]/', '', $settings['hotline']) }}" 
                       class="hidden sm:flex items-center gap-2 text-xs font-bold text-slate-700 px-3 py-2 rounded-xl hover:bg-slate-100 transition-colors">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>{{ $settings['hotline'] }}</span>
                    </a>
                @endif

                <a href="{{ $consultUrl }}" target="_blank"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-rose-500 to-indigo-600 hover:from-rose-600 hover:to-indigo-700 text-white font-semibold text-sm shadow-md shadow-rose-200 hover:shadow-lg transition-all duration-200 active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    <span>Tư Vấn Tạo Thiệp</span>
                </a>
            </div>

        </div>
    </header>

    <!-- SECTION 1: HERO SECTION -->
    <section class="relative hero-gradient pt-12 pb-20 lg:pt-20 lg:pb-28 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                
                <!-- Left Column: Value Prop & CTA -->
                <div class="lg:col-span-7 text-center lg:text-left space-y-6">
                    
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-rose-50 border border-rose-200 text-rose-700 text-xs font-bold tracking-wide">
                        <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
                        <span>Xu Hướng Cưới Công Nghệ 2026</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-[1.15]">
                        Làm thiệp cưới online <br>
                        <span class="bg-gradient-to-r from-rose-500 via-purple-600 to-indigo-600 bg-clip-text text-transparent">miễn phí & sang trọng</span>
                    </h1>

                    <p class="text-base sm:text-lg text-slate-600 max-w-xl mx-auto lg:mx-0 leading-relaxed font-normal">
                        {{ $settings['site_slogan'] ?? 'Mảnh ghép hiện đại của truyền thống mời cưới – Giúp bạn gửi tấm chân tình nhanh hơn, xa hơn, tiện lợi hơn.' }}
                    </p>

                    <!-- Trust Checklist -->
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 text-xs font-semibold text-slate-500">
                        <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Khám phá {{ count($templates) }}+ mẫu thiệp</span>
                        <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Xem demo mẫu tức thì</span>
                        <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg> Hỗ trợ tư vấn 24/7</span>
                    </div>

                    <!-- Dual Action Buttons -->
                    <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="{{ $consultUrl }}" target="_blank" 
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 rounded-full bg-slate-900 hover:bg-slate-800 text-white font-bold text-base shadow-xl shadow-slate-900/10 hover:shadow-slate-900/20 transform hover:-translate-y-0.5 transition-all">
                            <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                            <span>Liên Hệ Tạo Thiệp</span>
                        </a>

                        <a href="#mau-thiep" 
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 rounded-full bg-white hover:bg-slate-50 text-slate-800 border border-slate-200/80 font-bold text-base shadow-xs transition-all">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                            <span>Khám Phá Mẫu Thiệp</span>
                        </a>
                    </div>

                    <!-- Quick Social / Help bar -->
                    @if(!empty($settings['zalo_url']))
                        <div class="pt-2 text-xs text-slate-500 flex items-center justify-center lg:justify-start gap-2">
                            <span>Cần tư vấn chọn mẫu riêng?</span>
                            <a href="{{ $settings['zalo_url'] }}" target="_blank" class="font-bold text-indigo-600 hover:underline flex items-center gap-1">
                                <span>Nhắn Zalo hỗ trợ ngay</span> &rarr;
                            </a>
                        </div>
                    @endif

                </div>

                <!-- Right Column: Interactive 3D Smartphone Mockup -->
                <div class="lg:col-span-5 relative flex justify-center">
                    
                    <!-- Decorative Background Blobs -->
                    <div class="absolute -top-10 -right-10 w-72 h-72 bg-rose-200/40 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="absolute -bottom-10 -left-10 w-72 h-72 bg-indigo-200/40 rounded-full blur-3xl pointer-events-none"></div>

                    <!-- Main Phone Card (Front) -->
                    <div class="relative z-20 w-[280px] sm:w-[310px] bg-slate-900 p-3.5 rounded-[42px] shadow-2xl shadow-rose-950/20 ring-1 ring-slate-800 transform rotate-1 hover:rotate-0 transition-transform duration-300">
                        <!-- Dynamic Island / Speaker notch -->
                        <div class="absolute top-6 left-1/2 -translate-x-1/2 w-24 h-4 bg-slate-900 rounded-full z-30 flex items-center justify-center">
                            <span class="w-2.5 h-2.5 rounded-full bg-slate-800 mr-2"></span>
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-800"></span>
                        </div>

                        <!-- Phone Screen -->
                        <div class="w-full bg-[#fdfbf7] rounded-[34px] overflow-hidden border border-slate-100 flex flex-col items-center text-center p-6 space-y-4">
                            <!-- Header Icon -->
                            <div class="w-12 h-12 rounded-full bg-rose-100/70 text-rose-600 flex items-center justify-center text-xl mt-2 font-cursive">
                                囍
                            </div>

                            <div>
                                <p class="text-[10px] uppercase font-bold tracking-widest text-slate-400">Thiệp Cưới Báo Hỷ</p>
                                <h3 class="font-cursive text-3xl font-normal text-slate-800 mt-1">Duy Linh & Mai Anh</h3>
                                <p class="text-[11px] text-slate-500 font-medium">10:00 • 28 Tháng 10, 2026</p>
                            </div>

                            <!-- Photo Preview Box -->
                            <div class="w-full h-36 rounded-2xl bg-gradient-to-tr from-rose-200 via-purple-100 to-indigo-100 flex items-center justify-center relative overflow-hidden shadow-inner">
                                <span class="text-4xl filter drop-shadow">👰🤵</span>
                                <div class="absolute bottom-2 left-2 right-2 bg-white/90 backdrop-blur-xs py-1 px-2 rounded-lg text-[10px] font-bold text-slate-700 shadow-xs">
                                    Còn 15 ngày nữa đến ngày cưới ❤️
                                </div>
                            </div>

                            <!-- Action Badges -->
                            <div class="w-full grid grid-cols-2 gap-2 text-[11px] font-semibold">
                                <div class="p-2 rounded-xl bg-rose-50 text-rose-700 border border-rose-100 flex items-center justify-center gap-1">
                                    <span>💌</span> <span>Gửi lời chúc</span>
                                </div>
                                <div class="p-2 rounded-xl bg-indigo-50 text-indigo-700 border border-indigo-100 flex items-center justify-center gap-1">
                                    <span>🎁</span> <span>Mừng cưới QR</span>
                                </div>
                            </div>

                            <!-- Confirm RSVP -->
                            <div class="w-full py-2 bg-slate-900 text-white rounded-xl text-xs font-bold shadow-md">
                                Xác Nhận Tham Dự
                            </div>
                        </div>
                    </div>

                    <!-- Floating Feature Pill (Top Right) -->
                    <div class="absolute -top-3 -right-2 z-30 bg-white/95 backdrop-blur-md px-3.5 py-2 rounded-2xl shadow-lg border border-slate-100 flex items-center gap-2 text-xs font-bold text-slate-800 animate-bounce">
                        <span class="text-base">🎁</span>
                        <span>Mừng cưới QR 1 chạm</span>
                    </div>

                    <!-- Floating Feature Pill (Bottom Left) -->
                    <div class="absolute bottom-6 -left-4 z-30 bg-white/95 backdrop-blur-md px-3.5 py-2 rounded-2xl shadow-lg border border-slate-100 flex items-center gap-2 text-xs font-bold text-slate-800">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        <span>Khách RSVP tự động</span>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 2: KHO MẪU THIỆP CƯỚI 3D COVERFLOW SLIDESHOW -->
    <section id="mau-thiep" class="py-20 sm:py-24 bg-gradient-to-b from-slate-50 via-[#f8fafc] to-white border-y border-slate-200/70 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
            
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <div class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-rose-600 bg-rose-50 px-3.5 py-1.5 rounded-full border border-rose-100">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"/></svg>
                    <span>Trải Nghiệm 3D Coverflow</span>
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight">
                    Mẫu thiệp cưới online <span class="font-cursive text-4xl sm:text-5xl md:text-6xl text-rose-500 font-normal">đẹp nhất</span>
                </h2>
                <p class="text-slate-500 text-sm sm:text-base max-w-xl mx-auto">
                    Khám phá {{ count($templates) }}+ mẫu thiệp cưới được thiết kế tinh tế. Vuốt sang hai bên hoặc bấm "Xem mẫu" để trải nghiệm trực tiếp trên điện thoại!
                </p>
            </div>

            <!-- 3D Swiper Coverflow Slider Container -->
            <div class="relative w-full max-w-[1400px] mx-auto px-1 sm:px-4">
                
                <div class="swiper swiper-3d-templates overflow-visible py-8 sm:py-12">
                    <div class="swiper-wrapper">
                        @foreach($templates as $tpl)
                            <div class="swiper-slide w-[280px] sm:w-[315px] md:w-[330px] h-[490px] sm:h-[550px] shrink-0 select-none">
                                
                                <!-- Phone Mockup 3D Card Frame -->
                                <div class="relative w-full h-full rounded-[32px] sm:rounded-[36px] overflow-hidden bg-slate-900 border-[5px] sm:border-[6px] border-white shadow-[0_22px_55px_rgba(0,0,0,0.18)] transition-all duration-300 group flex flex-col justify-between">
                                    
                                    <!-- Full Bleed Photography Background -->
                                    <img src="{{ $tpl['image'] }}" 
                                         alt="{{ $tpl['name'] }}" 
                                         loading="lazy"
                                         class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 pointer-events-none">
                                    
                                    <!-- Romantic Scrim Gradient Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/25 to-black/35 pointer-events-none"></div>

                                    <!-- Top Bar inside Card: Template Code Badge & Category -->
                                    <div class="relative z-10 p-5 flex items-center justify-between">
                                        <span class="inline-flex items-center text-[11px] font-mono font-bold tracking-wider text-white/95 bg-black/40 backdrop-blur-md px-3 py-1 rounded-full border border-white/20 shadow-xs">
                                            #{{ $tpl['code'] }}
                                        </span>
                                        <span class="inline-flex items-center text-[11px] font-bold tracking-wide text-slate-900 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full shadow-xs">
                                            {{ $tpl['badge'] }}
                                        </span>
                                    </div>

                                    <!-- Center Typography / Romantic Visual Art -->
                                    <div class="relative z-10 px-6 my-auto text-center space-y-2 pointer-events-none">
                                        <div class="text-[11px] tracking-[0.3em] uppercase text-white/80 font-bold drop-shadow-sm">
                                            {{ $tpl['date_sample'] ?? '20.03.2027' }}
                                        </div>
                                        <h3 class="{{ $tpl['tagline_style'] ?? 'text-4xl font-extrabold text-white tracking-tight' }} drop-shadow-md">
                                            {{ $tpl['tagline'] ?? $tpl['name'] }}
                                        </h3>
                                        <p class="text-xs text-white/90 font-medium tracking-wide drop-shadow-sm">
                                            {{ $tpl['style'] }}
                                        </p>
                                    </div>

                                    <!-- Bottom Bar: Couple Name & The Signature Pill Button -->
                                    <div class="relative z-10 p-5 pb-6 flex flex-col items-center gap-3 text-center">
                                        <div class="text-[11px] font-bold tracking-[0.2em] text-white/95 uppercase drop-shadow-sm">
                                            {{ $tpl['couple_sample'] ?? 'CHÚ RỂ & CÔ DÂU' }}
                                        </div>
                                        
                                        <!-- White Pill Button from user reference image -->
                                        <a href="{{ $tpl['demo_url'] }}" 
                                           target="_blank" 
                                           class="inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-full bg-white hover:bg-slate-50 text-slate-900 font-bold text-xs shadow-lg backdrop-blur-md border border-white/90 hover:shadow-rose-500/25 transform hover:scale-105 active:scale-95 transition-all">
                                            <span>Xem mẫu</span>
                                            <svg class="w-3.5 h-3.5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                            </svg>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Navigation Circular Arrows -->
                    <button type="button" 
                            class="swiper-btn-prev absolute left-1 sm:left-4 top-1/2 -translate-y-1/2 z-30 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-white/95 hover:bg-white text-slate-800 shadow-xl border border-slate-200/80 flex items-center justify-center transition-all hover:scale-110 active:scale-95 cursor-pointer" 
                            aria-label="Mẫu trước">
                        <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button type="button" 
                            class="swiper-btn-next absolute right-1 sm:right-4 top-1/2 -translate-y-1/2 z-30 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-white/95 hover:bg-white text-slate-800 shadow-xl border border-slate-200/80 flex items-center justify-center transition-all hover:scale-110 active:scale-95 cursor-pointer" 
                            aria-label="Mẫu tiếp theo">
                        <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                    </button>

                    <!-- Pagination Bullets Indicator -->
                    <div class="swiper-pagination !relative !bottom-0 mt-8"></div>
                </div>

            </div>

            <!-- Bottom Interaction Hint & CTA -->
            <div class="text-center pt-2 space-y-4">
                <p class="text-xs font-medium text-slate-400 flex items-center justify-center gap-1.5">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                    <span>Kéo chuột hoặc vuốt tay sang trái / phải để lướt xem các mẫu thiệp khác</span>
                </p>
                <div class="flex items-center justify-center gap-4">
                    <a href="{{ $consultUrl }}" target="_blank"
                       class="inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-full bg-gradient-to-r from-rose-500 to-indigo-600 text-white font-bold text-sm shadow-xl shadow-rose-500/20 hover:brightness-110 hover:shadow-rose-500/30 transform hover:-translate-y-0.5 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        <span>Chọn Mẫu & Nhận Tư Vấn Miễn Phí</span>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- SECTION 3: QUY TRÌNH 3 BƯỚC TẠO THIỆP -->
    <section id="quy-trinh" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <div class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full border border-indigo-100">
                    Đơn Giản & Dễ Dàng
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Tạo thiệp cưới chỉ trong <span class="text-indigo-600">3 bước</span>
                </h2>
                <p class="text-slate-500 text-sm sm:text-base">
                    Không cần rành công nghệ, chỉ cần 5 phút gửi thông tin là bạn đã có ngay tấm thiệp cưới online lung linh.
                </p>
            </div>

            <!-- 3 Steps Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                
                <!-- Step 1 -->
                <div class="bg-slate-50/80 rounded-3xl p-8 border border-slate-200/80 relative space-y-4 hover:border-indigo-300 transition-colors">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-600 text-white font-extrabold text-lg flex items-center justify-center shadow-md shadow-indigo-200">
                        01
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">Chọn mẫu thiệp</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Lựa chọn trong kho {{ count($templates) }}+ mẫu thiệp mang đậm nét văn hóa Việt Nam hoặc phong cách phương Tây tối giản, hiện đại.
                    </p>
                    <div class="text-xs font-bold text-indigo-600 pt-2">
                        Đa dạng phong cách & xem demo tức thì &rarr;
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="bg-slate-50/80 rounded-3xl p-8 border border-slate-200/80 relative space-y-4 hover:border-rose-300 transition-colors">
                    <div class="w-12 h-12 rounded-2xl bg-rose-500 text-white font-extrabold text-lg flex items-center justify-center shadow-md shadow-rose-200">
                        02
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">Gửi thông tin & Ảnh</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Cung cấp tên cô dâu chú rể, ngày giờ tổ chức hôn lễ, địa chỉ rạp cưới, mã QR mừng cưới và album ảnh cưới yêu thích.
                    </p>
                    <div class="text-xs font-bold text-rose-600 pt-2">
                        Đội ngũ thiết kế hỗ trợ lên mẫu chuẩn đẹp &rarr;
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="bg-slate-50/80 rounded-3xl p-8 border border-slate-200/80 relative space-y-4 hover:border-emerald-300 transition-colors">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-600 text-white font-extrabold text-lg flex items-center justify-center shadow-md shadow-emerald-200">
                        03
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">Gửi thiệp & Nhận chúc</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Nhận đường link thiệp riêng biệt để gửi qua Zalo, Facebook hoặc in mã QR lên thiệp giấy truyền thống.
                    </p>
                    <div class="text-xs font-bold text-emerald-600 pt-2">
                        Lan tỏa niềm vui trọn vẹn đến khách mời &rarr;
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- SECTION 4: CÁC TÍNH NĂNG ĐẮT GIÁ -->
    <section id="tinh-nang" class="py-20 bg-slate-50 border-t border-slate-200/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <div class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-rose-600 bg-rose-50 px-3 py-1 rounded-full border border-rose-100">
                    Vượt Trội Hơn Thiệp Giấy
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Tính năng thông minh cho <span class="bg-gradient-to-r from-rose-500 to-indigo-600 bg-clip-text text-transparent">đám cưới hiện đại</span>
                </h2>
                <p class="text-slate-500 text-sm sm:text-base">
                    Tất cả những gì bạn cần để tạo một trải nghiệm mời cưới tinh tế, trang trọng và khó quên.
                </p>
            </div>

            <!-- Features Grid (6 Cards) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Feature 1: Mừng cưới QR -->
                <div class="bg-white rounded-3xl p-7 border border-slate-200/80 shadow-xs hover:shadow-lg transition-all space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl">
                        🎁
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Mừng cưới QR thông minh</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Tích hợp sẵn mã QR tài khoản ngân hàng nhà trai và nhà gái. Khách ở xa hay bận việc vẫn có thể gửi quà mừng kèm lời chúc tiện lợi.
                    </p>
                </div>

                <!-- Feature 2: Cá nhân hóa tên khách -->
                <div class="bg-white rounded-3xl p-7 border border-slate-200/80 shadow-xs hover:shadow-lg transition-all space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-2xl">
                        💌
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Mỗi khách 1 link riêng</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Tên khách mời trang trọng xuất hiện ngay trên phong bì thiệp điện tử khi mở link. Khách dễ dàng xác nhận có đến tham dự hay không.
                    </p>
                </div>

                <!-- Feature 3: Album ảnh cưới -->
                <div class="bg-white rounded-3xl p-7 border border-slate-200/80 shadow-xs hover:shadow-lg transition-all space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center text-2xl">
                        📸
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Album ảnh & Đếm ngược</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Trình chiếu bộ ảnh cưới lung linh chuẩn nét không bị bóp dung lượng, kèm đồng hồ đếm ngược từng ngày giờ đến thời khắc trọng đại.
                    </p>
                </div>

                <!-- Feature 4: Bản đồ Google Maps -->
                <div class="bg-white rounded-3xl p-7 border border-slate-200/80 shadow-xs hover:shadow-lg transition-all space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl">
                        🗺️
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Chỉ đường Google Maps 1 chạm</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Tích hợp bản đồ vị trí rạp cưới nhà trai, nhà gái và nhà hàng. Khách mời bấm mở Google Maps dẫn đường tới tận nơi chuẩn xác.
                    </p>
                </div>

                <!-- Feature 5: Sổ lưu bút -->
                <div class="bg-white rounded-3xl p-7 border border-slate-200/80 shadow-xs hover:shadow-lg transition-all space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-2xl">
                        ✍️
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Sổ lưu bút & Lời chúc</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Khách mời có thể để lại những lời nhắn chúc phúc ấm áp. Cô dâu chú rể có thể đọc lại những kỷ niệm này nhiều năm sau ngày cưới.
                    </p>
                </div>

                <!-- Feature 6: Đổi mẫu tự do -->
                <div class="bg-white rounded-3xl p-7 border border-slate-200/80 shadow-xs hover:shadow-lg transition-all space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl">
                        🔄
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Đổi mẫu không mất dữ liệu</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Thử đổi sang bất kỳ mẫu thiệp nào bạn thích. Toàn bộ thông tin ngày cưới, địa chỉ và ảnh đã nhập đều được giữ nguyên 100%.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- SECTION 5: ĐÁNH GIÁ TỪ KHÁCH HÀNG THỰC TẾ -->
    <section id="danh-gia" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <div class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-rose-600 bg-rose-50 px-3 py-1 rounded-full border border-rose-100">
                    Cảm Nhận Thực Tế
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Được tin tưởng bởi hàng trăm cặp đôi
                </h2>
                <p class="text-slate-500 text-sm sm:text-base">
                    Những lời nhắn chân thành từ các cô dâu chú rể đã đồng hành cùng chúng mình trong ngày trọng đại.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Review 1 -->
                <div class="bg-slate-50 p-7 rounded-3xl border border-slate-200/80 space-y-4">
                    <div class="flex items-center text-amber-400 gap-1 text-sm">
                        ★★★★★
                    </div>
                    <p class="text-sm text-slate-700 leading-relaxed italic">
                        “Thiệp lên điện thoại cực kỳ đẹp và mượt mà. Bạn bè mình ở xa ai cũng khen tiện vì quét mã QR mừng cưới được luôn, đỡ phải chuyển khoản hỏi số tài khoản lỉnh kỉnh.”
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <div class="w-10 h-10 rounded-full bg-rose-200 flex items-center justify-center font-bold text-rose-700 text-sm">
                            NM
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-slate-900">Ngọc Mai & Thế Hùng</h4>
                            <p class="text-xs text-slate-400">Cưới tháng 11/2026 • Hà Nội</p>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="bg-slate-50 p-7 rounded-3xl border border-slate-200/80 space-y-4">
                    <div class="flex items-center text-amber-400 gap-1 text-sm">
                        ★★★★★
                    </div>
                    <p class="text-sm text-slate-700 leading-relaxed italic">
                        “Giao diện rất dễ làm, chỉ mất đúng 10 phút gửi thông tin là có link gửi đi rồi. Mình thích nhất kho mẫu đa dạng, xem demo trực tiếp rất tiện lợi.”
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <div class="w-10 h-10 rounded-full bg-indigo-200 flex items-center justify-center font-bold text-indigo-700 text-sm">
                            GH
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-slate-900">Gia Huy & Phương Anh</h4>
                            <p class="text-xs text-slate-400">Cưới tháng 10/2026 • TP.HCM</p>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="bg-slate-50 p-7 rounded-3xl border border-slate-200/80 space-y-4">
                    <div class="flex items-center text-amber-400 gap-1 text-sm">
                        ★★★★★
                    </div>
                    <p class="text-sm text-slate-700 leading-relaxed italic">
                        “Nhờ có bản đồ Google Maps và đếm ngược mà bạn bè đến đúng giờ, không ai bị lạc đường. Đội ngũ hỗ trợ qua Zalo cũng rất nhiệt tình và chu đáo.”
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <div class="w-10 h-10 rounded-full bg-emerald-200 flex items-center justify-center font-bold text-emerald-700 text-sm">
                            DL
                        </div>
                        <div>
                            <h4 class="font-bold text-sm text-slate-900">Đăng Long & Thùy Trang</h4>
                            <p class="text-xs text-slate-400">Cưới tháng 12/2026 • Đà Nẵng</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- SECTION 6: SUPPORT & CSKH BANNER -->
    @if(!empty($settings['hotline']) || !empty($settings['zalo_url']))
    <section class="py-12 bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
                <div class="space-y-1">
                    <h3 class="text-2xl font-bold text-white tracking-tight">Khi bạn cần, tụi mình luôn có mặt!</h3>
                    <p class="text-slate-400 text-sm">
                        Đội ngũ hỗ trợ kỹ thuật và tư vấn thiết kế luôn sẵn sàng hỗ trợ 24/7.
                    </p>
                </div>
                <div class="flex flex-wrap items-center justify-center gap-3">
                    @if(!empty($settings['zalo_url']))
                        <a href="{{ $settings['zalo_url'] }}" target="_blank"
                           class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-sm shadow-lg transition-all">
                            <span>Chat Zalo Hỗ Trợ</span>
                        </a>
                    @endif
                    @if(!empty($settings['hotline']))
                        <a href="tel:{{ preg_replace('/[^0-9]/', '', $settings['hotline']) }}"
                           class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white/10 hover:bg-white/20 text-white font-bold text-sm border border-white/20 transition-all">
                            <span>Hotline: {{ $settings['hotline'] }}</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- SECTION 7: CÂU HỎI THƯỜNG GẶP (FAQ ACCORDION) -->
    <section id="faq" class="py-20 bg-slate-50 border-t border-slate-200/70">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
            
            <div class="text-center space-y-3">
                <div class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full border border-indigo-100">
                    Giải Đáp Thắc Mắc
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Câu hỏi thường gặp về thiệp cưới online
                </h2>
                <p class="text-slate-500 text-sm sm:text-base">
                    Mọi điều bạn cần biết trước khi khởi tạo một tấm thiệp cưới điện tử.
                </p>
            </div>

            <!-- FAQ List -->
            <div class="space-y-4">
                
                <!-- Q1 -->
                <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-xs">
                    <button type="button" onclick="toggleFaq(1)" class="w-full p-5 text-left font-bold text-base text-slate-900 flex items-center justify-between hover:text-indigo-600 transition-colors">
                        <span>1. Thiệp cưới online là gì và dùng như thế nào?</span>
                        <svg id="faq-icon-1" class="w-5 h-5 text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7 7"/></svg>
                    </button>
                    <div id="faq-answer-1" class="hidden px-5 pb-5 text-sm text-slate-600 border-t border-slate-100 pt-3 leading-relaxed">
                        Thiệp cưới online là một trang web riêng biệt của dâu rể chứa đầy đủ thông tin: ngày giờ, địa điểm, album ảnh, bản đồ chỉ đường và tài khoản mừng cưới. Bạn chỉ cần gửi đường link độc quyền qua Zalo, Messenger hoặc in mã QR lên thiệp giấy là khách mời có thể mở xem trực tiếp trên điện thoại.
                    </div>
                </div>

                <!-- Q2 -->
                <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-xs">
                    <button type="button" onclick="toggleFaq(2)" class="w-full p-5 text-left font-bold text-base text-slate-900 flex items-center justify-between hover:text-indigo-600 transition-colors">
                        <span>2. Tạo thiệp cưới online có mất phí không?</span>
                        <svg id="faq-icon-2" class="w-5 h-5 text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7 7"/></svg>
                    </button>
                    <div id="faq-answer-2" class="hidden px-5 pb-5 text-sm text-slate-600 border-t border-slate-100 pt-3 leading-relaxed">
                        Bạn có thể tự do xem thử demo toàn bộ mẫu thiệp hoàn toàn miễn phí. Thiệp cưới sau khi hoàn thành sẽ lưu trữ trọn đời trong suốt chu kỳ đám cưới để bạn yên tâm chia sẻ với tất cả bạn bè, người thân.
                    </div>
                </div>

                <!-- Q3 -->
                <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-xs">
                    <button type="button" onclick="toggleFaq(3)" class="w-full p-5 text-left font-bold text-base text-slate-900 flex items-center justify-between hover:text-indigo-600 transition-colors">
                        <span>3. Tôi có thể chỉnh sửa thông tin sau khi đã tạo thiệp không?</span>
                        <svg id="faq-icon-3" class="w-5 h-5 text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7 7"/></svg>
                    </button>
                    <div id="faq-answer-3" class="hidden px-5 pb-5 text-sm text-slate-600 border-t border-slate-100 pt-3 leading-relaxed">
                        Hoàn toàn được! Bạn có thể yêu cầu chỉnh sửa ngày giờ, đổi ảnh cưới hoặc đổi mẫu giao diện bất kỳ lúc nào. Đường link thiệp đã gửi cho khách mời sẽ tự động cập nhật ngay lập tức mà không cần gửi lại link mới.
                    </div>
                </div>

                <!-- Q4 -->
                <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-xs">
                    <button type="button" onclick="toggleFaq(4)" class="w-full p-5 text-left font-bold text-base text-slate-900 flex items-center justify-between hover:text-indigo-600 transition-colors">
                        <span>4. Tôi có thể gửi thiệp cho tối đa bao nhiêu khách?</span>
                        <svg id="faq-icon-4" class="w-5 h-5 text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7 7"/></svg>
                    </button>
                    <div id="faq-answer-4" class="hidden px-5 pb-5 text-sm text-slate-600 border-t border-slate-100 pt-3 leading-relaxed">
                        Hệ thống không giới hạn số lượng khách truy cập. Bạn có thể gửi link cho hàng trăm hay hàng nghìn người bạn bè ở xa một cách nhanh chóng mà không lo nghẽn mạng hay quá tải.
                    </div>
                </div>

                <!-- Q5 -->
                <div class="bg-white rounded-2xl border border-slate-200/80 overflow-hidden shadow-xs">
                    <button type="button" onclick="toggleFaq(5)" class="w-full p-5 text-left font-bold text-base text-slate-900 flex items-center justify-between hover:text-indigo-600 transition-colors">
                        <span>5. Khách lớn tuổi có dễ xem thiệp cưới online không?</span>
                        <svg id="faq-icon-5" class="w-5 h-5 text-slate-400 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7 7"/></svg>
                    </button>
                    <div id="faq-answer-5" class="hidden px-5 pb-5 text-sm text-slate-600 border-t border-slate-100 pt-3 leading-relaxed">
                        Giao diện thiệp được tối ưu chữ to, rõ ràng, hình ảnh sắc nét và thao tác cuộn trang tự nhiên. Các bác, cô chú lớn tuổi chỉ cần chạm nhẹ vào link tin nhắn Zalo là có thể xem ngay mà không cần cài đặt bất kỳ ứng dụng nào.
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200/80 py-12 text-slate-500 text-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-gradient-to-tr from-rose-500 to-indigo-600 flex items-center justify-center text-white font-bold text-sm">
                        W
                    </div>
                    <div>
                        <span class="font-bold text-base text-slate-900">{{ $settings['site_name'] ?? 'LS Wedding' }}</span>
                        <p class="text-[11px] text-slate-400">Nền tảng tạo thiệp cưới online chuyên nghiệp</p>
                    </div>
                </div>

                <div class="flex flex-wrap items-center justify-center gap-6 font-semibold text-slate-600">
                    <a href="#mau-thiep" class="hover:text-rose-600">Mẫu Thiệp</a>
                    <a href="#quy-trinh" class="hover:text-rose-600">Quy Trình</a>
                    <a href="#tinh-nang" class="hover:text-rose-600">Tính Năng</a>
                    <a href="#faq" class="hover:text-rose-600">Hỏi Đáp</a>
                    @if(!empty($settings['facebook_url']))
                        <a href="{{ $settings['facebook_url'] }}" target="_blank" class="hover:text-rose-600">Fanpage Facebook</a>
                    @endif
                </div>

            </div>

            <div class="border-t border-slate-100 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left text-slate-400">
                <p>© {{ date('Y') }} {{ $settings['site_name'] ?? 'LS Wedding' }}. All rights reserved.</p>
                <p>Designed with ❤️ for happy couples.</p>
            </div>
        </div>
    </footer>

    <!-- STICKY BOTTOM BAR (MOBILE ONLY) -->
    <div class="lg:hidden fixed bottom-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-t border-slate-200/80 px-4 py-2.5 shadow-2xl flex items-center justify-around gap-2">
        <a href="#mau-thiep" class="flex flex-col items-center gap-1 text-slate-500 hover:text-slate-800 text-[11px] font-bold">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
            <span>Mẫu Thiệp</span>
        </a>

        <a href="{{ $consultUrl }}" target="_blank" class="flex-1 py-2.5 px-4 rounded-full bg-gradient-to-r from-rose-500 to-indigo-600 text-white font-bold text-xs text-center shadow-md shadow-rose-200 flex items-center justify-center gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            <span>Tư Vấn Tạo Thiệp</span>
        </a>

        @if(!empty($settings['zalo_url']))
            <a href="{{ $settings['zalo_url'] }}" target="_blank" class="flex flex-col items-center gap-1 text-slate-500 hover:text-indigo-600 text-[11px] font-bold">
                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                <span>Chat Zalo</span>
            </a>
        @endif
    </div>

    <!-- Swiper 3D Carousel JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Scripts -->
    <script>
        // Khởi tạo Swiper 3D Coverflow cho Kho Mẫu Thiệp
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof Swiper !== 'undefined') {
                const templateSwiper = new Swiper('.swiper-3d-templates', {
                    effect: 'coverflow',
                    grabCursor: true,
                    centeredSlides: true,
                    slidesPerView: 'auto',
                    loop: true,
                    speed: 600,
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },
                    coverflowEffect: {
                        rotate: 32,          // Độ nghiêng 3D chính xác như ảnh mẫu
                        stretch: -25,        // Khoảng cách kéo lồng các slide
                        depth: 220,          // Chiều sâu trục Z
                        modifier: 1,
                        slideShadows: false, // Giữ độ sáng và màu sắc ảnh tự nhiên
                    },
                    navigation: {
                        nextEl: '.swiper-btn-next',
                        prevEl: '.swiper-btn-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },
                    slideToClickedSlide: true, // Click vào slide bên cạnh tự trượt về trung tâm
                });
            }
        });

        // Simple FAQ Accordion Toggle
        function toggleFaq(index) {
            const answer = document.getElementById(`faq-answer-${index}`);
            const icon = document.getElementById(`faq-icon-${index}`);
            if (!answer) return;

            const isHidden = answer.classList.contains('hidden');
            if (isHidden) {
                answer.classList.remove('hidden');
                if (icon) icon.classList.add('rotate-180');
            } else {
                answer.classList.add('hidden');
                if (icon) icon.classList.remove('rotate-180');
            }
        }
    </script>

</body>
</html>
