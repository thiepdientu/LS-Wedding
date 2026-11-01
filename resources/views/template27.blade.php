<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $weddingCard->couple_name }} - Thiệp Cưới Online</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Great+Vibes&family=Pattaya&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        crimson: {
                            950: '#3d0608',
                            900: '#5a0b0d',
                            800: '#7a1215',
                            700: '#8c1518',
                            600: '#a81c20',
                        },
                        gold: {
                            100: '#fbf6e6',
                            200: '#f3e5ab',
                            300: '#e6c975',
                            400: '#d4af37',
                            500: '#c59b27',
                            600: '#9e7818',
                        },
                        ivory: {
                            50: '#fdfbf7',
                            100: '#f7f1e5',
                            200: '#ede1c9',
                        }
                    },
                    fontFamily: {
                        script: ['"Great Vibes"', '"Pattaya"', 'cursive'],
                        serif: ['"Cormorant Garamond"', 'Georgia', 'serif'],
                        sans: ['"Be Vietnam Pro"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --bg-red-dark: #5a0b0d;
            --bg-red-main: #7a1215;
            --gold-light: #f3e5ab;
            --gold-main: #d4af37;
            --gold-dark: #9e7818;
            --ivory: #fdfbf7;
        }

        body {
            background-color: var(--bg-red-dark);
            color: var(--ivory);
            font-family: 'Be Vietnam Pro', sans-serif;
            overflow-x: hidden;
        }

        /* Traditional oriental silk subtle pattern overlay */
        .oriental-bg {
            background-color: #6b0e11;
            background-image: 
                radial-gradient(circle at 50% 25%, rgba(212, 175, 55, 0.14) 0%, transparent 60%),
                radial-gradient(circle at 15% 80%, rgba(168, 28, 32, 0.4) 0%, transparent 50%),
                linear-gradient(180deg, #52090b 0%, #7a1215 50%, #4d080a 100%);
        }

        /* Metallic Gold Text Gradient */
        .text-gold-gradient {
            background: linear-gradient(135deg, #fff5d6 0%, #d4af37 45%, #f3e5ab 70%, #b5891c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Gold Metallic Button */
        .btn-gold {
            background: linear-gradient(135deg, #e8c86b 0%, #d4af37 50%, #b5891c 100%);
            color: #4a0709;
            box-shadow: 0 6px 25px rgba(212, 175, 55, 0.4), inset 0 1px 1px rgba(255, 255, 255, 0.7);
            position: relative;
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .btn-gold:hover {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.65), inset 0 1px 2px rgba(255, 255, 255, 0.9);
        }
        .btn-gold::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 45%;
            height: 200%;
            background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.65) 50%, rgba(255,255,255,0) 100%);
            transform: rotate(25deg);
            animation: shimmerSwipe 3.2s infinite;
        }
        @keyframes shimmerSwipe {
            0% { left: -60%; }
            45%, 100% { left: 140%; }
        }

        /* Floating 囍 (Song Hy) Watermarks */
        .floating-hy-container {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 1;
            overflow: hidden;
        }
        .floating-hy {
            position: absolute;
            color: rgba(212, 175, 55, 0.07);
            font-family: serif;
            user-select: none;
            animation: floatHy linear infinite;
        }
        @keyframes floatHy {
            0% {
                transform: translateY(105vh) rotate(0deg) scale(0.9);
                opacity: 0;
            }
            15% {
                opacity: 1;
            }
            85% {
                opacity: 1;
            }
            100% {
                transform: translateY(-18vh) rotate(20deg) scale(1.1);
                opacity: 0;
            }
        }

        /* Cover Gate / Curtain Doors Animation */
        #invitation-gate {
            position: fixed;
            inset: 0;
            z-index: 100;
            perspective: 1500px;
            transition: visibility 1.2s ease, opacity 1.1s ease;
        }
        #invitation-gate.gate-opened {
            pointer-events: none;
            visibility: hidden;
            opacity: 0;
            transition-delay: 0.95s;
        }
        .gate-door-left,
        .gate-door-right {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 50%;
            background: radial-gradient(circle at center, #8c1518 0%, #5a0b0d 100%);
            transition: transform 1.25s cubic-bezier(0.65, 0, 0.15, 1), box-shadow 1.25s ease;
            z-index: 10;
        }
        .gate-door-left {
            left: 0;
            border-right: 1px solid rgba(212, 175, 55, 0.45);
            transform-origin: left center;
        }
        .gate-door-right {
            right: 0;
            border-left: 1px solid rgba(212, 175, 55, 0.45);
            transform-origin: right center;
        }
        #invitation-gate.gate-opened .gate-door-left {
            transform: translateX(-102%) rotateY(-12deg);
        }
        #invitation-gate.gate-opened .gate-door-right {
            transform: translateX(102%) rotateY(12deg);
        }
        .gate-center-card {
            transition: transform 0.85s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.65s ease;
        }
        #invitation-gate.gate-opened .gate-center-card {
            transform: scale(1.12);
            opacity: 0;
        }

        /* Ornamental Divider */
        .ornament-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            width: 100%;
            max-width: 260px;
            margin: 0 auto;
        }
        .ornament-divider div {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, #d4af37, transparent);
        }
        .ornament-divider span {
            color: #f3e5ab;
            font-size: 1.25rem;
            line-height: 1;
        }

        /* Traditional Double Gold Frame */
        .double-gold-frame {
            border: 1.5px solid rgba(212, 175, 55, 0.65);
            box-shadow: inset 0 0 0 5px transparent, inset 0 0 0 6px rgba(212, 175, 55, 0.3);
        }

        /* Scroll Reveal Utility */
        .reveal-item {
            opacity: 0;
            transform: translateY(32px);
            transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-item.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        /* Spinning Music Disc */
        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .spin-disc {
            animation: spinSlow 6s linear infinite;
        }
        .spin-paused {
            animation-play-state: paused;
        }

        /* Heartbeat Pulse for Wedding Day on Calendar */
        @keyframes heartBeat {
            0%, 100% { transform: scale(1); }
            30% { transform: scale(1.16); }
            60% { transform: scale(0.95); }
        }
        .animate-heartbeat {
            animation: heartBeat 1.8s infinite ease-in-out;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #420709;
        }
        ::-webkit-scrollbar-thumb {
            background: #d4af37;
            border-radius: 3px;
        }
    </style>
</head>
<body class="oriental-bg min-h-screen selection:bg-gold-400 selection:text-crimson-950">

    <!-- Falling Gold Sparkles & Red Petals Canvas -->
    <canvas id="petals-canvas" class="fixed inset-0 pointer-events-none z-20"></canvas>

    <!-- 12 Floating 囍 (Song Hỷ) Background Elements (Exact ChungĐôi structure) -->
    <div class="floating-hy-container" id="floating-hy-layer" aria-hidden="true"></div>

    <!-- ================================================================= -->
    <!-- 1. ENVELOPE / COVER GATE SCREEN (MÀN HÌNH MỞ THIỆP SONG HỶ ĐỎ)    -->
    <!-- ================================================================= -->
    <div id="invitation-gate" class="flex items-center justify-center p-4 sm:p-6">
        <!-- Left & Right Curtain Doors -->
        <div class="gate-door-left">
            <div class="h-full w-full opacity-15 flex items-center justify-end pr-4 select-none">
                <span class="text-[11rem] sm:text-[16rem] text-gold-400 font-serif leading-none">囍</span>
            </div>
        </div>
        <div class="gate-door-right">
            <div class="h-full w-full opacity-15 flex items-center justify-start pl-4 select-none">
                <span class="text-[11rem] sm:text-[16rem] text-gold-400 font-serif leading-none">囍</span>
            </div>
        </div>

        <!-- Center Cover Invitation Card -->
        <div class="gate-center-card relative z-20 w-full max-w-md bg-gradient-to-b from-crimson-800 via-crimson-900 to-crimson-950 rounded-2xl p-6 sm:p-9 text-center double-gold-frame shadow-[0_25px_70px_rgba(0,0,0,0.75)]">
            
            <!-- Ornamental Gold Corners (SVG) -->
            <svg class="w-10 h-10 text-gold-300/80 absolute top-2.5 left-2.5 pointer-events-none" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M2 24V2H24M8 2V16H2M2 8H16V2"/>
            </svg>
            <svg class="w-10 h-10 text-gold-300/80 absolute top-2.5 right-2.5 pointer-events-none scale-x-[-1]" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M2 24V2H24M8 2V16H2M2 8H16V2"/>
            </svg>
            <svg class="w-10 h-10 text-gold-300/80 absolute bottom-2.5 left-2.5 pointer-events-none scale-y-[-1]" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M2 24V2H24M8 2V16H2M2 8H16V2"/>
            </svg>
            <svg class="w-10 h-10 text-gold-300/80 absolute bottom-2.5 right-2.5 pointer-events-none scale-[-1]" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M2 24V2H24M8 2V16H2M2 8H16V2"/>
            </svg>

            <!-- Watermark 囍 inside card -->
            <div class=" text-gold-400/10 text-[9rem] font-serif absolute inset-x-0 top-10 pointer-events-none select-none leading-none">
                囍
            </div>

            <!-- Golden Song Hỷ Medallion -->
            <div class="relative mx-auto w-20 h-20 rounded-full bg-gradient-to-br from-gold-200 via-gold-400 to-gold-600 p-0.5 shadow-lg mb-5">
                <div class="w-full h-full rounded-full bg-crimson-900 flex items-center justify-center border border-gold-300/50">
                    <span class="text-4xl text-gold-200 font-serif select-none tracking-tighter">囍</span>
                </div>
            </div>

            <p class="text-xs uppercase tracking-[0.35em] text-gold-200/90 font-medium mb-3">
                Thiệp Mời Thành Hôn
            </p>

            <!-- Couple Names (Exact ChungĐôi Layout) -->
            <div class="my-2 space-y-1 relative z-10">
                <h1 class="font-script text-5xl sm:text-6xl text-gold-gradient py-1 drop-shadow">
                    {{ $weddingCard->groom_name }}
                </h1>
                <div class="text-gold-300 font-serif italic text-xl tracking-widest">&amp;</div>
                <h1 class="font-script text-5xl sm:text-6xl text-gold-gradient py-1 drop-shadow">
                    {{ $weddingCard->bride_name }}
                </h1>
            </div>

            <!-- Ornamental Divider: <div></div><span>❦</span><div></div> -->
            <div class="ornament-divider my-5">
                <div></div>
                <span>❦</span>
                <div></div>
            </div>

            <!-- Date -->
            <p class="font-serif text-xl sm:text-2xl text-gold-200 tracking-widest font-semibold mb-5">
                14 tháng 6, 2026
            </p>

            <!-- Guest Invitation Box ("Thân Mời") -->
            <div class="bg-crimson-950/60 border border-gold-400/40 rounded-xl px-4 py-3 mb-7 max-w-xs mx-auto backdrop-blur-sm">
                <p class="text-xs uppercase tracking-[0.25em] text-gold-300/80 mb-1">Thân Mời</p>
                <p id="cover-guest-name" class="font-serif text-lg sm:text-xl text-ivory-50 font-semibold tracking-wide">
                    Quý Khách &amp; Gia Đình
                </p>
            </div>

            <!-- Open Invitation Button ("Mở thiệp") -->
            <button id="btn-open-card" onclick="openInvitation()" class="btn-gold px-9 py-3.5 rounded-full font-semibold text-base tracking-wider uppercase inline-flex items-center gap-3 cursor-pointer">
                <i class="fa-regular fa-envelope-open text-lg"></i>
                <span>Mở thiệp</span>
            </button>

            <p class="text-[11px] text-gold-200/60 mt-4 italic">
                Chạm để mở thiệp &amp; thưởng thức nhạc nền
            </p>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- 2. MAIN WEDDING INVITATION CONTENT (NỘI DUNG THIỆP CHÍNH)         -->
    <!-- ================================================================= -->
    <main id="main-invitation" class="relative z-10 max-w-[520px] mx-auto shadow-[0_0_90px_rgba(0,0,0,0.85)] bg-crimson-900/90 border-x border-gold-400/25 overflow-hidden">

        <!-- Top Guest Customizer Bar (Helps preview custom guest names) -->
        <div class="bg-crimson-950/90 border-b border-gold-400/25 px-4 py-2.5 flex items-center justify-between text-xs text-gold-200/90">
            <div class="flex items-center gap-2">
                <span class="text-gold-400 font-serif text-base">囍</span>
                <span>Mẫu thiệp: <strong class="text-gold-200">Song Hỷ Đỏ</strong></span>
            </div>
            <button onclick="promptGuestName()" class="underline hover:text-white transition cursor-pointer flex items-center gap-1">
                <i class="fa-solid fa-pen-to-square text-[10px]"></i> Đổi tên khách mời
            </button>
        </div>

        <!-- SECTION A: HERO BANNER -->
        <section class="relative pt-10 pb-14 px-6 text-center overflow-hidden">
            <!-- Top Traditional Cloud/Arch Accent -->
            <div class="text-gold-300/80 text-xs tracking-[0.35em] uppercase mb-2 reveal-item">
                Save The Date
            </div>
            <div class="text-4xl text-gold-400 font-serif mb-5 reveal-item select-none">囍</div>

            <!-- Arch Couple Portrait Frame -->
            <div class="relative mx-auto w-64 sm:w-72 aspect-[3/4] rounded-t-full rounded-b-2xl p-2 bg-gradient-to-b from-gold-300 via-gold-500 to-crimson-900 shadow-2xl reveal-item">
                <div class="w-full h-full rounded-t-full rounded-b-xl overflow-hidden border-2 border-crimson-950 relative group">
                    <img 
                        src="https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=900&q=85" 
                        alt="{{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}" 
                        class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-700"
                        onerror="this.src='https://placehold.co/600x800/7a1215/f3e5ab?text=Gia+Khanh+%26+Quynh+Anh'"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-crimson-950/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-3 inset-x-0 text-center">
                        <span class="px-3 py-1 rounded-full bg-crimson-900/80 border border-gold-400/50 text-[11px] uppercase tracking-widest text-gold-200">
                            Trăm Năm Hạnh Phúc
                        </span>
                    </div>
                </div>
            </div>

            <!-- Couple Names & Date -->
            <div class="mt-8 reveal-item">
                <h2 class="font-script text-5xl sm:text-6xl text-gold-gradient leading-tight">
                    {{ $weddingCard->groom_name }}
                </h2>
                <p class="font-serif italic text-gold-300 text-xl my-1">&amp;</p>
                <h2 class="font-script text-5xl sm:text-6xl text-gold-gradient leading-tight">
                    {{ $weddingCard->bride_name }}
                </h2>

                <div class="ornament-divider my-5">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>

                <p class="text-xs uppercase tracking-[0.25em] text-gold-200/80 mb-2">
                    Chủ Nhật • 14 Tháng 6, 2026
                </p>
                <p class="font-serif text-sm italic text-gold-200/75">
                    (Tức ngày 29 tháng 04 năm Bính Ngọ)
                </p>
            </div>
        </section>

        <!-- SECTION B: THƯ NGỎ & THÔNG TIN HAI BÊN GIA ĐÌNH (CREAM IVORY CARD) -->
        <section class="px-4 sm:px-6 py-6">
            <div class="bg-ivory-50 text-crimson-950 rounded-2xl p-6 sm:p-8 shadow-2xl border-2 border-gold-400 relative overflow-hidden reveal-item">
                <!-- Watermark inside Ivory Card -->
                <div class="absolute -right-6 -bottom-8 text-[9rem] text-crimson-800/5 font-serif select-none pointer-events-none">
                    囍
                </div>

                <!-- Header -->
                <div class="text-center mb-6">
                    <span class="inline-block w-11 h-11 rounded-full bg-crimson-800 text-gold-200 font-serif text-2xl leading-[2.75rem] shadow">
                        囍
                    </span>
                    <p class="text-xs uppercase tracking-[0.25em] text-crimson-700 font-semibold mt-3">
                        Trân Trọng Báo Tin
                    </p>
                </div>

                <!-- Two-Column Family Information (Nhà Trai - Nhà Gái) -->
                <div class="grid grid-cols-2 gap-3 sm:gap-4 text-center border-y border-gold-500/35 py-5 my-4">
                    <div class="pr-2 border-r border-gold-500/35">
                        <p class="text-xs uppercase tracking-wider font-bold text-crimson-800 mb-1.5">
                            Nhà Trai
                        </p>
                        <p class="text-xs sm:text-sm font-medium text-crimson-950">
                            Ông: <strong class="font-semibold">Nguyễn Văn Minh</strong>
                        </p>
                        <p class="text-xs sm:text-sm font-medium text-crimson-950 mt-0.5">
                            Bà: <strong class="font-semibold">Trần Thị Hoa</strong>
                        </p>
                        <p class="text-[11px] text-crimson-700/80 mt-1.5">
                            Quận Ba Đình, TP. Hà Nội
                        </p>
                    </div>
                    <div class="pl-2">
                        <p class="text-xs uppercase tracking-wider font-bold text-crimson-800 mb-1.5">
                            Nhà Gái
                        </p>
                        <p class="text-xs sm:text-sm font-medium text-crimson-950">
                            Ông: <strong class="font-semibold">Lê Quốc Tuấn</strong>
                        </p>
                        <p class="text-xs sm:text-sm font-medium text-crimson-950 mt-0.5">
                            Bà: <strong class="font-semibold">Phạm Thu Thủy</strong>
                        </p>
                        <p class="text-[11px] text-crimson-700/80 mt-1.5">
                            Quận Cầu Giấy, TP. Hà Nội
                        </p>
                    </div>
                </div>

                <!-- Formal Announcement Text -->
                <div class="text-center space-y-3 mt-5">
                    <p class="text-xs sm:text-sm text-crimson-900 leading-relaxed">
                        Trân trọng báo tin <strong class="text-crimson-800">Lễ Thành Hôn</strong> của hai con chúng tôi:
                    </p>

                    <div class="py-2">
                        <p class="text-[11px] uppercase tracking-widest text-gold-600 font-semibold">Chú Rể</p>
                        <h3 class="font-script text-4xl sm:text-5xl text-crimson-800 mt-0.5">{{ $weddingCard->groom_name }}</h3>
                        <span class="inline-block my-1.5 text-gold-600 font-serif text-lg">❦</span>
                        <p class="text-[11px] uppercase tracking-widest text-gold-600 font-semibold">Cô Dâu</p>
                        <h3 class="font-script text-4xl sm:text-5xl text-crimson-800 mt-0.5">{{ $weddingCard->bride_name }}</h3>
                    </div>

                    <!-- Personalized Guest Invitation Callout -->
                    <div class="bg-ivory-100 border border-gold-400/60 rounded-xl p-4 mt-4">
                        <p class="text-xs uppercase tracking-widest text-crimson-700">Trân trọng kính mời</p>
                        <p id="inner-guest-name" class="font-serif text-xl font-bold text-crimson-900 my-1">
                            Quý Khách &amp; Gia Đình
                        </p>
                        <p class="text-xs text-crimson-800/90 leading-relaxed">
                            Đến dự bữa tiệc thân mật chung vui cùng gia đình chúng tôi. Sự hiện diện của Quý khách là niềm vinh hạnh lớn lao của hai gia đình!
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION C: LỊCH & ĐỒNG HỒ ĐẾM NGƯỢC -->
        <section class="px-4 sm:px-6 py-8 text-center">
            @php
                $cal = $weddingCard->calendar_matrix;
                $leadEmpty = ($cal['start_day_of_week'] == 0) ? 6 : ($cal['start_day_of_week'] - 1);
            @endphp
            <div class="reveal-item">
                <p class="text-xs uppercase tracking-[0.3em] text-gold-300 mb-1">Ngày Chung Đôi</p>
                <h3 class="font-serif text-3xl sm:text-4xl text-gold-200 font-semibold">{{ $cal['month_title'] }}</h3>
                <div class="ornament-divider my-3">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>
            </div>

            <!-- Calendar Card -->
            <div class="bg-crimson-950/75 border border-gold-400/40 rounded-2xl p-5 sm:p-6 shadow-xl mt-4 reveal-item">
                <!-- Days of week header -->
                <div class="grid grid-cols-7 gap-1 text-xs font-semibold text-gold-300 border-b border-gold-400/25 pb-2.5 mb-3">
                    <div>T2</div>
                    <div>T3</div>
                    <div>T4</div>
                    <div>T5</div>
                    <div>T6</div>
                    <div>T7</div>
                    <div class="text-red-300">CN</div>
                </div>
                <!-- Calendar Grid -->
                <div class="grid grid-cols-7 gap-y-2.5 gap-x-1 text-xs sm:text-sm text-ivory-100/90 items-center">
                    @for ($i = 0; $i < $leadEmpty; $i++)
                        <div></div>
                    @endfor
                    @for ($d = 1; $d <= $cal['total_days']; $d++)
                        @if ($d == $cal['active_day'])
                            <div class="relative flex items-center justify-center py-1">
                                <span class="w-9 h-9 rounded-full bg-gradient-to-br from-gold-300 to-gold-500 text-crimson-950 font-bold flex items-center justify-center shadow-lg animate-heartbeat relative">
                                    {{ $d }}
                                    <i class="fa-solid fa-heart text-[10px] text-crimson-800 absolute -top-1 -right-1"></i>
                                </span>
                            </div>
                        @else
                            <div class="py-1 {{ ($leadEmpty + $d) % 7 == 0 ? 'text-red-300' : '' }}">{{ $d }}</div>
                        @endif
                    @endfor
                </div>

                <!-- Live Countdown Boxes -->
                <div class="mt-6 pt-5 border-t border-gold-400/25">
                    <p id="countdown-label" class="text-xs uppercase tracking-widest text-gold-300/90 mb-3">
                        Cùng đếm ngược đến khoảnh khắc thiêng liêng
                    </p>
                    <div class="grid grid-cols-4 gap-2.5">
                        <div class="bg-crimson-900/90 border border-gold-400/40 rounded-xl py-2.5 px-1">
                            <span id="cd-days" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-200">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-gold-300/80">Ngày</span>
                        </div>
                        <div class="bg-crimson-900/90 border border-gold-400/40 rounded-xl py-2.5 px-1">
                            <span id="cd-hours" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-200">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-gold-300/80">Giờ</span>
                        </div>
                        <div class="bg-crimson-900/90 border border-gold-400/40 rounded-xl py-2.5 px-1">
                            <span id="cd-mins" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-200">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-gold-300/80">Phút</span>
                        </div>
                        <div class="bg-crimson-900/90 border border-gold-400/40 rounded-xl py-2.5 px-1">
                            <span id="cd-secs" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-200">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-gold-300/80">Giây</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION D: SỰ KIỆN CƯỚI (WEDDING EVENTS & VENUES) -->
        <section class="px-4 sm:px-6 py-8">
            <div class="text-center mb-6 reveal-item">
                <p class="text-xs uppercase tracking-[0.3em] text-gold-300 mb-1">Chương Trình Hôn Lễ</p>
                <h3 class="font-serif text-3xl sm:text-4xl text-gold-200 font-semibold">Sự Kiện Cưới</h3>
                <div class="ornament-divider my-3">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>
            </div>

            <div class="space-y-5">
                <!-- Event 1: Tiệc Cưới Nhà Gái -->
                <div class="bg-ivory-50 text-crimson-950 rounded-2xl p-6 border-2 border-gold-400 shadow-xl reveal-item relative overflow-hidden">
                    <div class="flex items-start justify-between gap-3 border-b border-gold-500/30 pb-3 mb-4">
                        <div>
                            <span class="inline-block px-2.5 py-0.5 rounded-full bg-crimson-800 text-gold-200 text-[10px] uppercase tracking-wider font-semibold mb-1">
                                Nhà Gái
                            </span>
                            <h4 class="font-serif text-2xl font-bold text-crimson-900">Lễ Vu Quy &amp; Tiệc Cưới</h4>
                        </div>
                        <div class="w-11 h-11 rounded-full bg-crimson-100 border border-gold-500 flex items-center justify-center text-crimson-800 font-serif text-xl shrink-0">
                            囍
                        </div>
                    </div>

                    <div class="space-y-2.5 text-xs sm:text-sm text-crimson-900">
                        <div class="flex items-center gap-2.5">
                            <i class="fa-regular fa-clock text-crimson-700 w-4 text-center"></i>
                            <span><strong>{{ $weddingCard->ceremony_time ?: '11:00' }}</strong> — Ngày {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d/m/Y') : '14/06/2026' }} ({{ $weddingCard->wedding_date_lunar ?: '29/04 Âm lịch' }})</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <i class="fa-solid fa-location-dot text-crimson-700 w-4 text-center mt-1"></i>
                            <div>
                                <p class="font-semibold">Tư Gia Nhà Gái</p>
                                <p class="text-xs text-crimson-700/80">{{ $weddingCard->bride_address ?: 'Số 72 Trần Đăng Ninh, Dịch Vọng, Cầu Giấy, Hà Nội' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-2.5 mt-5">
                        <button onclick="openMapModal('Nhà Gái', '{{ addslashes($weddingCard->bride_address ?: '72 Trần Đăng Ninh, Dịch Vọng, Cầu Giấy, Hà Nội') }}')" class="py-2.5 px-3 rounded-xl bg-crimson-800 hover:bg-crimson-700 text-gold-200 text-xs font-medium flex items-center justify-center gap-1.5 transition cursor-pointer">
                            <i class="fa-solid fa-map-location-dot"></i> Xem Bản Đồ
                        </button>
                        <button onclick="downloadICS('Tiệc Cưới Nhà Gái - {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}', '20260614T040000Z', '20260614T063000Z', '{{ addslashes($weddingCard->bride_address ?: '72 Trần Đăng Ninh, Cầu Giấy, Hà Nội') }}')" class="py-2.5 px-3 rounded-xl border border-crimson-800 text-crimson-900 hover:bg-crimson-50 text-xs font-medium flex items-center justify-center gap-1.5 transition cursor-pointer">
                            <i class="fa-regular fa-calendar-plus"></i> Lưu Lịch
                        </button>
                    </div>
                </div>

                <!-- Event 2: Lễ Thành Hôn & Tiệc Cưới Nhà Trai -->
                <div class="bg-ivory-50 text-crimson-950 rounded-2xl p-6 border-2 border-gold-400 shadow-xl reveal-item relative overflow-hidden">
                    <div class="flex items-start justify-between gap-3 border-b border-gold-500/30 pb-3 mb-4">
                        <div>
                            <span class="inline-block px-2.5 py-0.5 rounded-full bg-crimson-800 text-gold-200 text-[10px] uppercase tracking-wider font-semibold mb-1">
                                Nhà Trai
                            </span>
                            <h4 class="font-serif text-2xl font-bold text-crimson-900">{{ $weddingCard->wedding_location ?: 'Lễ Thành Hôn & Tiệc Cưới' }}</h4>
                        </div>
                        <div class="w-11 h-11 rounded-full bg-crimson-100 border border-gold-500 flex items-center justify-center text-crimson-800 font-serif text-xl shrink-0">
                            囍
                        </div>
                    </div>

                    <div class="space-y-2.5 text-xs sm:text-sm text-crimson-900">
                        <div class="flex items-center gap-2.5">
                            <i class="fa-regular fa-clock text-crimson-700 w-4 text-center"></i>
                            <span><strong>{{ $weddingCard->wedding_time ?: '17:30' }}</strong> — Ngày {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d/m/Y') : '14/06/2026' }} (Đón khách: {{ $weddingCard->guest_welcome_time ?: '17:00' }})</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <i class="fa-solid fa-location-dot text-crimson-700 w-4 text-center mt-1"></i>
                            <div>
                                <p class="font-semibold">{{ $weddingCard->wedding_location ?: 'Khách Sạn Lotte Hotel Hanoi' }}</p>
                                <p class="text-xs text-crimson-700/80">{{ $weddingCard->wedding_address ?: 'Số 54 Liễu Giai, Cống Vị, Ba Đình, Hà Nội' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-2.5 mt-5">
                        <button onclick="openMapModal('Nhà Trai - {{ addslashes($weddingCard->wedding_location ?: 'Lotte Hotel Hanoi') }}', '{{ addslashes($weddingCard->wedding_address ?: '54 Liễu Giai, Cống Vị, Ba Đình, Hà Nội') }}')" class="py-2.5 px-3 rounded-xl bg-crimson-800 hover:bg-crimson-700 text-gold-200 text-xs font-medium flex items-center justify-center gap-1.5 transition cursor-pointer">
                            <i class="fa-solid fa-map-location-dot"></i> Xem Bản Đồ
                        </button>
                        <button onclick="downloadICS('Lễ Thành Hôn Nhà Trai - {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}', '20260614T103000Z', '20260614T133000Z', '{{ addslashes(($weddingCard->wedding_location ?: '') . ', ' . ($weddingCard->wedding_address ?: '')) }}')" class="py-2.5 px-3 rounded-xl border border-crimson-800 text-crimson-900 hover:bg-crimson-50 text-xs font-medium flex items-center justify-center gap-1.5 transition cursor-pointer">
                            <i class="fa-regular fa-calendar-plus"></i> Lưu Lịch
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION E: CHUYỆN TÌNH YÊU (LOVE STORY TIMELINE) -->
        <section class="px-4 sm:px-6 py-8">
            <div class="text-center mb-7 reveal-item">
                <p class="text-xs uppercase tracking-[0.3em] text-gold-300 mb-1">Hành Trình Hạnh Phúc</p>
                <h3 class="font-serif text-3xl sm:text-4xl text-gold-200 font-semibold">Chuyện Tình Yêu</h3>
                <div class="ornament-divider my-3">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>
            </div>

            @if (!empty($weddingCard->timeline_list) && count($weddingCard->timeline_list) > 0)
                <div class="relative border-l-2 border-gold-400/50 ml-4 pl-6 space-y-7">
                    @foreach ($weddingCard->timeline_list as $item)
                        <div class="relative reveal-item">
                            <span class="absolute -left-[33px] top-1 w-5 h-5 rounded-full bg-gold-400 text-crimson-950 flex items-center justify-center text-[10px] font-bold shadow">
                                ♥
                            </span>
                            <div class="bg-crimson-950/75 border border-gold-400/35 rounded-xl p-4">
                                <span class="text-[11px] uppercase tracking-widest text-gold-300">{{ $item['time'] ?? '' }}</span>
                                <h4 class="font-serif text-xl text-gold-200 font-semibold mt-0.5">{{ $item['title'] ?? '' }}</h4>
                                @if(!empty($item['description']))
                                    <p class="text-xs text-ivory-100/85 mt-1.5 leading-relaxed">{{ $item['description'] }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="relative border-l-2 border-gold-400/50 ml-4 pl-6 space-y-7">
                    <!-- Milestone 1 -->
                    <div class="relative reveal-item">
                        <span class="absolute -left-[33px] top-1 w-5 h-5 rounded-full bg-gold-400 text-crimson-950 flex items-center justify-center text-[10px] font-bold shadow">
                            ♥
                        </span>
                        <div class="bg-crimson-950/75 border border-gold-400/35 rounded-xl p-4">
                            <span class="text-[11px] uppercase tracking-widest text-gold-300">Tháng 10, 2022</span>
                            <h4 class="font-serif text-xl text-gold-200 font-semibold mt-0.5">Lần Đầu Gặp Gỡ</h4>
                            <p class="text-xs text-ivory-100/85 mt-1.5 leading-relaxed">
                                Giữa tiết trời thu Hà Nội dịu mát, một cuộc gặp tình cờ tại quán cà phê nhỏ phố cổ đã mở ra chương đầu tiên của hai đứa.
                            </p>
                        </div>
                    </div>

                    <!-- Milestone 2 -->
                    <div class="relative reveal-item">
                        <span class="absolute -left-[33px] top-1 w-5 h-5 rounded-full bg-gold-400 text-crimson-950 flex items-center justify-center text-[10px] font-bold shadow">
                            ♥
                        </span>
                        <div class="bg-crimson-950/75 border border-gold-400/35 rounded-xl p-4">
                            <span class="text-[11px] uppercase tracking-widest text-gold-300">Tháng 12, 2024</span>
                            <h4 class="font-serif text-xl text-gold-200 font-semibold mt-0.5">Lời Cầu Hôn Ngọt Ngào</h4>
                            <p class="text-xs text-ivory-100/85 mt-1.5 leading-relaxed">
                                Dưới ánh nến lung linh và giai điệu quen thuộc, lời hẹn ước trăm năm đã được trao gửi cùng cái gật đầu hạnh phúc.
                            </p>
                        </div>
                    </div>

                    <!-- Milestone 3 -->
                    <div class="relative reveal-item">
                        <span class="absolute -left-[33px] top-1 w-5 h-5 rounded-full bg-gold-400 text-crimson-950 flex items-center justify-center text-[10px] font-bold shadow">
                            囍
                        </span>
                        <div class="bg-crimson-950/75 border border-gold-400/35 rounded-xl p-4">
                            <span class="text-[11px] uppercase tracking-widest text-gold-300">{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->locale('vi')->isoFormat('D [Tháng] M, Y') : '14 Tháng 06, 2026' }}</span>
                            <h4 class="font-serif text-xl text-gold-200 font-semibold mt-0.5">Về Chung Một Nhà</h4>
                            <p class="text-xs text-ivory-100/85 mt-1.5 leading-relaxed">
                                Ngày đôi tim hòa chung nhịp đập, cùng nắm tay bước vào lễ đường trong sự chúc phúc của gia đình và những người thân yêu.
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </section>

        <!-- SECTION F: ALBUM HÌNH CƯỚI (PHOTO GALLERY & LIGHTBOX) -->
        <section class="px-4 sm:px-6 py-8">
            <div class="text-center mb-6 reveal-item">
                <p class="text-xs uppercase tracking-[0.3em] text-gold-300 mb-1">Khoảnh Khắc Ngọt Ngào</p>
                <h3 class="font-serif text-3xl sm:text-4xl text-gold-200 font-semibold">Album Hình Cưới</h3>
                <div class="ornament-divider my-3">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3 reveal-item" id="gallery-grid">
                <!-- Gallery images populated and clickable for Lightbox -->
                <div onclick="openLightbox(0)" class="col-span-2 aspect-[16/10] rounded-xl overflow-hidden border border-gold-400/50 cursor-pointer group relative">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=900&q=80" alt="Ảnh cưới 1" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                        <span class="px-3 py-1 rounded-full bg-crimson-900/80 text-gold-200 text-xs"><i class="fa-solid fa-magnifying-glass-plus mr-1"></i> Phóng to</span>
                    </div>
                </div>
                <div onclick="openLightbox(1)" class="aspect-[3/4] rounded-xl overflow-hidden border border-gold-400/50 cursor-pointer group relative">
                    <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=600&q=80" alt="Ảnh cưới 2" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div onclick="openLightbox(2)" class="aspect-[3/4] rounded-xl overflow-hidden border border-gold-400/50 cursor-pointer group relative">
                    <img src="https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=600&q=80" alt="Ảnh cưới 3" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div onclick="openLightbox(3)" class="aspect-[3/4] rounded-xl overflow-hidden border border-gold-400/50 cursor-pointer group relative">
                    <img src="https://images.unsplash.com/photo-1606800052052-a08af7148866?auto=format&fit=crop&w=600&q=80" alt="Ảnh cưới 4" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div onclick="openLightbox(4)" class="aspect-[3/4] rounded-xl overflow-hidden border border-gold-400/50 cursor-pointer group relative">
                    <img src="https://images.unsplash.com/photo-1537633552985-df8429e8048b?auto=format&fit=crop&w=600&q=80" alt="Ảnh cưới 5" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
            </div>
        </section>

        <!-- SECTION G: XÁC NHẬN THAM DỰ (RSVP) & SỔ LƯU BÚT (WISHES WALL) -->
        <section id="rsvp-section" class="px-4 sm:px-6 py-8">
            <div class="bg-ivory-50 text-crimson-950 rounded-2xl p-6 sm:p-7 border-2 border-gold-400 shadow-2xl reveal-item">
                <div class="text-center mb-5">
                    <span class="text-crimson-800 font-serif text-3xl">囍</span>
                    <h3 class="font-serif text-2xl sm:text-3xl font-bold text-crimson-900 mt-1">
                        Xác Nhận Tham Dự &amp; Gửi Lời Chúc
                    </h3>
                    <p class="text-xs text-crimson-700/80 mt-1">
                        Hãy gửi những lời chúc tốt đẹp nhất đến {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }} nhé!
                    </p>
                </div>

                <form id="rsvp-form" onsubmit="submitRSVP(event)" class="space-y-3.5 text-xs sm:text-sm">
                    <div>
                        <label class="block font-semibold text-crimson-900 mb-1">Tên của bạn *</label>
                        <input type="text" id="rsvp-name" required placeholder="Nhập họ và tên của bạn..." class="w-full px-3.5 py-2.5 rounded-xl border border-gold-500/60 bg-white focus:outline-none focus:ring-2 focus:ring-crimson-700">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-crimson-900 mb-1">Khách của</label>
                            <select id="rsvp-side" class="w-full px-3 py-2.5 rounded-xl border border-gold-500/60 bg-white focus:outline-none">
                                <option value="Nhà Trai">Nhà Trai</option>
                                <option value="Nhà Gái">Nhà Gái</option>
                                <option value="Chung hai bên">Chung hai bên</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-semibold text-crimson-900 mb-1">Số người đi cùng</label>
                            <select id="rsvp-guests" class="w-full px-3 py-2.5 rounded-xl border border-gold-500/60 bg-white focus:outline-none">
                                <option value="Đi một mình (1 người)">1 người</option>
                                <option value="Đi cùng người thương (2 người)">2 người</option>
                                <option value="Đi cùng gia đình (3-4 người)">Gia đình</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-crimson-900 mb-1">Bạn sẽ tham dự chứ?</label>
                        <div class="grid grid-cols-2 gap-2.5">
                            <label class="flex items-center gap-2 p-2.5 rounded-xl border border-gold-500/60 bg-white cursor-pointer">
                                <input type="radio" name="attendance" value="Sẽ tham dự" checked class="accent-crimson-800">
                                <span>Chắc chắn tham dự</span>
                            </label>
                            <label class="flex items-center gap-2 p-2.5 rounded-xl border border-gold-500/60 bg-white cursor-pointer">
                                <input type="radio" name="attendance" value="Xin phép vắng mặt" class="accent-crimson-800">
                                <span>Tiếc quá, mình bận</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-crimson-900 mb-1">Lời chúc gửi tới Cô Dâu &amp; Chú Rể *</label>
                        <textarea id="rsvp-wish" rows="3" required placeholder="Chúc hai bạn trăm năm hạnh phúc, sớm sinh quý tử..." class="w-full px-3.5 py-2.5 rounded-xl border border-gold-500/60 bg-white focus:outline-none focus:ring-2 focus:ring-crimson-700"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 rounded-xl bg-crimson-800 hover:bg-crimson-700 text-gold-200 font-semibold uppercase tracking-wider text-xs sm:text-sm shadow-lg transition cursor-pointer flex items-center justify-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i> Gửi Lời Chúc &amp; Xác Nhận
                    </button>
                </form>

                <!-- Sổ Lưu Bút (Live Wishes Feed) -->
                <div class="mt-7 pt-5 border-t border-gold-500/35">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="font-serif text-xl font-bold text-crimson-900">Sổ Lưu Bút</h4>
                        <span id="wish-count-badge" class="text-xs px-2.5 py-0.5 rounded-full bg-crimson-100 text-crimson-800 font-semibold">3 lời chúc</span>
                    </div>
                    <div id="wishes-list" class="space-y-3 max-h-64 overflow-y-auto pr-1">
                        <!-- Populated by JS -->
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION H: HỘP MỪNG CƯỚI (WEDDING GIFT / QR CODE) -->
        <section class="px-4 sm:px-6 py-8 text-center">
            <div class="bg-gradient-to-b from-crimson-800 to-crimson-950 border-2 border-gold-400/60 rounded-2xl p-6 sm:p-8 shadow-2xl reveal-item">
                <div class="w-14 h-14 mx-auto rounded-full bg-gold-400/20 border border-gold-300 flex items-center justify-center text-gold-300 text-2xl mb-3">
                    <i class="fa-solid fa-gift"></i>
                </div>
                <h3 class="font-serif text-3xl text-gold-200 font-semibold">Hộp Mừng Cưới</h3>
                <p class="text-xs text-ivory-100/80 max-w-xs mx-auto mt-2 leading-relaxed">
                    Cảm ơn tình cảm của Quý khách dành cho {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}. Quý khách có thể gửi quà mừng trực tuyến qua mã QR bên dưới:
                </p>
                <button onclick="toggleGiftModal(true)" class="btn-gold mt-5 px-7 py-3 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider inline-flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-qrcode"></i> Mở Hộp Mừng Cưới (QR)
                </button>
            </div>
        </section>

        <!-- FOOTER -->
        <footer class="py-12 px-6 text-center border-t border-gold-400/20 bg-crimson-950/80">
            <div class="text-4xl text-gold-400 font-serif mb-2 select-none">囍</div>
            <h2 class="font-script text-4xl text-gold-gradient">{{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}</h2>
            <p class="text-xs text-gold-200/75 mt-2 italic">
                Thank you for being part of our special day!
            </p>
            <p class="text-[11px] text-gold-300/50 mt-4">
                14 . 06 . 2026 • Song Hỷ Đỏ
            </p>
        </footer>
    </main>

    <!-- ================================================================= -->
    <!-- 3. FLOATING ACTION BUTTONS (MUSIC, RE-OPEN GATE, GIFT QR)         -->
    <!-- ================================================================= -->
    <!-- Bottom Left: Music Player Button -->
    <div class="fixed bottom-4 left-4 z-40 flex items-center gap-2">
        <button id="btn-music" onclick="toggleMusic()" title="Bật / Tắt nhạc cưới" class="w-11 h-11 rounded-full bg-crimson-900/95 border-2 border-gold-400 text-gold-200 shadow-xl flex items-center justify-center cursor-pointer hover:scale-105 transition">
            <i id="music-icon" class="fa-solid fa-compact-disc text-xl spin-disc spin-paused"></i>
        </button>
        <span id="music-status-pill" class="hidden sm:inline-block px-3 py-1 rounded-full bg-crimson-950/90 border border-gold-400/40 text-[11px] text-gold-200 backdrop-blur-sm">
            Nhạc nền: Tắt
        </span>
    </div>

    <!-- Bottom Right: Quick Actions (Re-open Cover Gate & Gift Modal) -->
    <div class="fixed bottom-4 right-4 z-40 flex flex-col gap-2.5">
        <button onclick="reopenCoverGate()" title="Xem lại hiệu ứng Mở Thiệp" class="w-11 h-11 rounded-full bg-crimson-900/95 border-2 border-gold-400 text-gold-200 shadow-xl flex items-center justify-center cursor-pointer hover:scale-105 transition">
            <i class="fa-solid fa-envelope text-sm"></i>
        </button>
        <button onclick="toggleGiftModal(true)" title="Hộp Mừng Cưới" class="w-11 h-11 rounded-full bg-gradient-to-br from-gold-300 to-gold-500 text-crimson-950 shadow-xl flex items-center justify-center cursor-pointer hover:scale-105 transition">
            <i class="fa-solid fa-gift text-base"></i>
        </button>
    </div>

    <!-- ================================================================= -->
    <!-- 4. MODALS (HỘP MỪNG CƯỚI QR, GOOGLE MAPS, LIGHTBOX, TOAST)         -->
    <!-- ================================================================= -->

    <!-- Hộp Mừng Cưới (Bank QR Modal) -->
    <div id="gift-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/75 backdrop-blur-sm p-4">
        <div class="bg-ivory-50 text-crimson-950 rounded-2xl max-w-md w-full p-6 border-2 border-gold-400 shadow-2xl relative animate-[fadeIn_0.25s_ease]">
            <button onclick="toggleGiftModal(false)" class="absolute top-3.5 right-3.5 w-8 h-8 rounded-full bg-crimson-100 text-crimson-900 hover:bg-crimson-200 flex items-center justify-center cursor-pointer">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="text-center mb-5">
                <span class="text-2xl text-crimson-800 font-serif">囍</span>
                <h3 class="font-serif text-2xl font-bold text-crimson-900">Hộp Mừng Cưới</h3>
                <p class="text-xs text-crimson-700/80">Quét mã QR hoặc sao chép số tài khoản ngân hàng</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Groom QR -->
                <div class="bg-white rounded-xl p-3.5 border border-gold-400 text-center shadow-sm">
                    <span class="text-[10px] uppercase tracking-wider font-bold px-2 py-0.5 rounded bg-crimson-800 text-gold-200">Mừng Chú Rể</span>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data={{ $weddingCard->groom_bank_name ?: 'Vietcombank' }}-{{ $weddingCard->groom_bank_account ?: '1029384756' }}-NGUYEN%20GIA%20KHANH" alt="QR Chú Rể" class="w-32 h-32 mx-auto my-2.5 rounded-lg border border-gold-300 p-1">
                    <p class="text-xs font-bold text-crimson-900">{{ $weddingCard->groom_bank_name ?: 'Vietcombank' }}</p>
                    <p class="text-xs text-crimson-800 font-medium">NGUYỄN GIA KHÁNH</p>
                    <p class="text-xs font-mono font-semibold text-crimson-950 my-1">1029 384 756</p>
                    <button onclick="copyText('{{ $weddingCard->groom_bank_account ?: '1029384756' }}', 'Đã sao chép STK Chú Rể!')" class="mt-1 w-full py-1.5 rounded-lg bg-crimson-800 hover:bg-crimson-700 text-gold-200 text-[11px] font-medium cursor-pointer">
                        <i class="fa-regular fa-copy mr-1"></i> Sao chép STK
                    </button>
                </div>

                <!-- Bride QR -->
                <div class="bg-white rounded-xl p-3.5 border border-gold-400 text-center shadow-sm">
                    <span class="text-[10px] uppercase tracking-wider font-bold px-2 py-0.5 rounded bg-crimson-800 text-gold-200">Mừng Cô Dâu</span>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data={{ $weddingCard->bride_bank_name ?: 'Techcombank' }}-{{ $weddingCard->bride_bank_account ?: '1903847561' }}-LE%20QUYNH%20ANH" alt="QR Cô Dâu" class="w-32 h-32 mx-auto my-2.5 rounded-lg border border-gold-300 p-1">
                    <p class="text-xs font-bold text-crimson-900">{{ $weddingCard->bride_bank_name ?: 'Techcombank' }}</p>
                    <p class="text-xs text-crimson-800 font-medium">LÊ QUỲNH ANH</p>
                    <p class="text-xs font-mono font-semibold text-crimson-950 my-1">1903 847 561</p>
                    <button onclick="copyText('{{ $weddingCard->bride_bank_account ?: '1903847561' }}', 'Đã sao chép STK Cô Dâu!')" class="mt-1 w-full py-1.5 rounded-lg bg-crimson-800 hover:bg-crimson-700 text-gold-200 text-[11px] font-medium cursor-pointer">
                        <i class="fa-regular fa-copy mr-1"></i> Sao chép STK
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Modal -->
    <div id="map-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/75 backdrop-blur-sm p-4">
        <div class="bg-ivory-50 text-crimson-950 rounded-2xl max-w-md w-full p-5 border-2 border-gold-400 shadow-2xl relative">
            <button onclick="closeMapModal()" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-crimson-100 text-crimson-900 flex items-center justify-center cursor-pointer">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <h4 id="map-modal-title" class="font-serif text-xl font-bold text-crimson-900 pr-8">Địa điểm tổ chức</h4>
            <p id="map-modal-address" class="text-xs text-crimson-700 mt-1 mb-3"></p>
            <div class="w-full h-60 rounded-xl overflow-hidden border border-gold-400 bg-crimson-100">
                <iframe id="map-iframe" class="w-full h-full border-0" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="mt-4 flex justify-end gap-2">
                <button onclick="copyCurrentAddress()" class="px-4 py-2 rounded-xl bg-crimson-800 text-gold-200 text-xs font-medium cursor-pointer">
                    <i class="fa-regular fa-copy mr-1"></i> Sao chép địa chỉ
                </button>
            </div>
        </div>
    </div>

    <!-- Guest Name Customizer Modal -->
    <div id="guest-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/75 backdrop-blur-sm p-4">
        <div class="bg-ivory-50 text-crimson-950 rounded-2xl max-w-sm w-full p-6 border-2 border-gold-400 shadow-2xl">
            <h4 class="font-serif text-2xl font-bold text-crimson-900">Tùy chỉnh Tên Khách Mời</h4>
            <p class="text-xs text-crimson-700 mt-1 mb-4">Tên khách mời sẽ hiển thị ở bìa thiệp mục "Thân Mời" và trong Thư Ngỏ.</p>
            <input type="text" id="custom-guest-input" placeholder="VD: Anh Minh & Chị Lan" class="w-full px-3.5 py-2.5 rounded-xl border border-gold-500 bg-white text-sm mb-4 focus:outline-none">
            <div class="flex justify-end gap-2">
                <button onclick="closeGuestModal()" class="px-4 py-2 rounded-xl border border-crimson-800 text-crimson-900 text-xs font-medium cursor-pointer">Hủy</button>
                <button onclick="applyGuestName()" class="px-4 py-2 rounded-xl bg-crimson-800 text-gold-200 text-xs font-medium cursor-pointer">Cập nhật</button>
            </div>
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div id="lightbox-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-4">
        <button onclick="closeLightbox()" class="absolute top-4 right-4 w-10 h-10 rounded-full bg-white/15 text-white hover:bg-white/30 flex items-center justify-center cursor-pointer">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>
        <button onclick="stepLightbox(-1)" class="absolute left-3 sm:left-6 w-10 h-10 rounded-full bg-white/15 text-white hover:bg-white/30 flex items-center justify-center cursor-pointer">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <img id="lightbox-img" src="" alt="Preview" class="max-h-[85vh] max-w-[90vw] rounded-xl border-2 border-gold-400 object-contain shadow-2xl">
        <button onclick="stepLightbox(1)" class="absolute right-3 sm:right-6 w-10 h-10 rounded-full bg-white/15 text-white hover:bg-white/30 flex items-center justify-center cursor-pointer">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toast-box" class="fixed top-5 left-1/2 -translate-x-1/2 z-[120] pointer-events-none opacity-0 transition-all duration-300 transform -translate-y-3">
        <div class="px-5 py-2.5 rounded-full bg-crimson-950/95 border border-gold-400 text-gold-200 text-xs sm:text-sm shadow-2xl flex items-center gap-2">
            <span class="text-gold-400 font-serif">囍</span>
            <span id="toast-text">Thông báo</span>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- 5. JAVASCRIPT LOGIC & INTERACTIVE EFFECTS                         -->
    <!-- ================================================================= -->
    <script>
        /* ---------------------------------------------------------------
         * A. 12 FLOATING 囍 (SONG HỶ) WATERMARK ELEMENTS IN BACKGROUND
         * --------------------------------------------------------------- */
        function initFloatingSongHy() {
            const container = document.getElementById('floating-hy-layer');
            const count = 12; // Exact 12 囍 symbols as on ChungĐôi demo
            for (let i = 0; i < count; i++) {
                const span = document.createElement('span');
                span.className = 'floating-hy';
                span.textContent = '囍';
                const sizeRem = (1.6 + (i % 4) * 0.85).toFixed(2);
                const leftPct = ((i * 8.3) + 3) % 94;
                const duration = 16 + (i % 5) * 4;
                const delay = -(i * 2.3);
                span.style.fontSize = `${sizeRem}rem`;
                span.style.left = `${leftPct}%`;
                span.style.animationDuration = `${duration}s`;
                span.style.animationDelay = `${delay}s`;
                container.appendChild(span);
            }
        }

        /* ---------------------------------------------------------------
         * B. FALLING GOLD SPARKLES & RED PETALS CANVAS
         * --------------------------------------------------------------- */
        function initPetalsCanvas() {
            const canvas = document.getElementById('petals-canvas');
            const ctx = canvas.getContext('2d');
            let width = canvas.width = window.innerWidth;
            let height = canvas.height = window.innerHeight;

            window.addEventListener('resize', () => {
                width = canvas.width = window.innerWidth;
                height = canvas.height = window.innerHeight;
            });

            const particles = Array.from({ length: 28 }, () => ({
                x: Math.random() * width,
                y: Math.random() * height,
                r: 2 + Math.random() * 4.5,
                vy: 0.45 + Math.random() * 0.9,
                vx: -0.3 + Math.random() * 0.6,
                angle: Math.random() * Math.PI * 2,
                spin: 0.01 + Math.random() * 0.025,
                isGold: Math.random() > 0.45
            }));

            function draw() {
                ctx.clearRect(0, 0, width, height);
                for (const p of particles) {
                    p.y += p.vy;
                    p.x += p.vx + Math.sin(p.angle) * 0.35;
                    p.angle += p.spin;

                    if (p.y > height + 15) {
                        p.y = -10;
                        p.x = Math.random() * width;
                    }

                    ctx.save();
                    ctx.translate(p.x, p.y);
                    ctx.rotate(p.angle);
                    if (p.isGold) {
                        ctx.fillStyle = 'rgba(243, 229, 171, 0.55)';
                        ctx.beginPath();
                        ctx.arc(0, 0, p.r * 0.55, 0, Math.PI * 2);
                        ctx.fill();
                    } else {
                        // Delicate crimson-rose petal
                        ctx.fillStyle = 'rgba(220, 55, 65, 0.45)';
                        ctx.beginPath();
                        ctx.ellipse(0, 0, p.r * 1.2, p.r * 0.7, 0, 0, Math.PI * 2);
                        ctx.fill();
                    }
                    ctx.restore();
                }
                requestAnimationFrame(draw);
            }
            draw();
        }

        /* ---------------------------------------------------------------
         * C. ENVELOPE / CURTAIN GATE OPENING & WEB AUDIO ROMANTIC MELODY
         * --------------------------------------------------------------- */
        let audioCtx = null;
        let isMusicPlaying = false;
        let melodyTimer = null;

        // Gentle pentatonic/romantic music box chime using Web Audio API
        const romanticNotes = [
            523.25, 659.25, 783.99, 1046.50, 880.00, 783.99, 659.25, 587.33,
            523.25, 587.33, 659.25, 783.99, 880.00, 783.99, 659.25, 523.25
        ];
        let noteIdx = 0;

        function playChimeNote(freq) {
            if (!audioCtx || !isMusicPlaying) return;
            const now = audioCtx.currentTime;
            const osc = audioCtx.createOscillator();
            const gain = audioCtx.createGain();
            osc.type = 'sine';
            osc.frequency.setValueAtTime(freq, now);

            gain.gain.setValueAtTime(0.001, now);
            gain.gain.exponentialRampToValueAtTime(0.055, now + 0.06);
            gain.gain.exponentialRampToValueAtTime(0.0008, now + 1.4);

            osc.connect(gain);
            gain.connect(audioCtx.destination);
            osc.start(now);
            osc.stop(now + 1.45);
        }

        function startBackgroundMusic() {
            try {
                if (!audioCtx) {
                    audioCtx = new (window.AudioContext || window.webkitAudioContext)();
                }
                if (audioCtx.state === 'suspended') {
                    audioCtx.resume();
                }
                isMusicPlaying = true;
                updateMusicUI();

                if (melodyTimer) clearInterval(melodyTimer);
                playChimeNote(romanticNotes[noteIdx % romanticNotes.length]);
                melodyTimer = setInterval(() => {
                    if (!isMusicPlaying) return;
                    noteIdx = (noteIdx + 1) % romanticNotes.length;
                    playChimeNote(romanticNotes[noteIdx]);
                }, 650);
            } catch (e) {
                console.warn('Web Audio API blocked or unsupported', e);
            }
        }

        function stopBackgroundMusic() {
            isMusicPlaying = false;
            if (melodyTimer) clearInterval(melodyTimer);
            updateMusicUI();
        }

        function toggleMusic() {
            if (isMusicPlaying) {
                stopBackgroundMusic();
                showToast('Đã tạm dừng nhạc nền');
            } else {
                startBackgroundMusic();
                showToast('Đang phát giai điệu lễ cưới ♪');
            }
        }

        function updateMusicUI() {
            const icon = document.getElementById('music-icon');
            const pill = document.getElementById('music-status-pill');
            if (isMusicPlaying) {
                icon.classList.remove('spin-paused');
                pill.textContent = 'Nhạc nền: Đang phát ♪';
            } else {
                icon.classList.add('spin-paused');
                pill.textContent = 'Nhạc nền: Tắt';
            }
        }

        function openInvitation() {
            const gate = document.getElementById('invitation-gate');
            gate.classList.add('gate-opened');
            if (!isMusicPlaying) {
                startBackgroundMusic();
            }
            setTimeout(() => {
                triggerScrollReveal();
            }, 400);
        }

        function reopenCoverGate() {
            const gate = document.getElementById('invitation-gate');
            gate.classList.remove('gate-opened');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        /* ---------------------------------------------------------------
         * D. COUNTDOWN TIMER
         * --------------------------------------------------------------- */
        function initCountdown() {
            const weddingDateStr = '{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format("Y-m-d") : "2026-06-14" }}';
            const weddingTimeStr = '{{ !empty($weddingCard->wedding_time) && preg_match("/^\d{1,2}:\d{2}$/", trim($weddingCard->wedding_time)) ? trim($weddingCard->wedding_time) . ":00" : "11:00:00" }}';
            const weddingDate = new Date(`${weddingDateStr}T${weddingTimeStr}+07:00`).getTime();

            function updateTimer() {
                const now = Date.now();
                let diff = weddingDate - now;
                const labelEl = document.getElementById('countdown-label');

                if (diff < 0) {
                    // If current date is past June 14, 2026, count days of marriage bliss
                    diff = Math.abs(diff);
                    if (labelEl) {
                        labelEl.textContent = 'Hạnh phúc viên mãn từ ngày {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '14.06.2026' }}';
                    }
                }

                const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
                const mins = Math.floor((diff / 1000 / 60) % 60);
                const secs = Math.floor((diff / 1000) % 60);

                document.getElementById('cd-days').textContent = String(days).padStart(2, '0');
                document.getElementById('cd-hours').textContent = String(hours).padStart(2, '0');
                document.getElementById('cd-mins').textContent = String(mins).padStart(2, '0');
                document.getElementById('cd-secs').textContent = String(secs).padStart(2, '0');
            }

            updateTimer();
            setInterval(updateTimer, 1000);
        }

        /* ---------------------------------------------------------------
         * E. SCROLL REVEAL ANIMATION
         * --------------------------------------------------------------- */
        function triggerScrollReveal() {
            const items = document.querySelectorAll('.reveal-item');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    }
                });
            }, { threshold: 0.12 });

            items.forEach(el => observer.observe(el));
        }

        /* ---------------------------------------------------------------
         * F. SỔ LƯU BÚT (LIVE GUESTBOOK) & RSVP
         * --------------------------------------------------------------- */
        const wishesData = [
            {
                name: 'Anh Hoàng & Chị Mai',
                side: 'Nhà Trai',
                attendance: 'Sẽ tham dự',
                wish: 'Chúc {{ $weddingCard->groom_name }} và {{ $weddingCard->bride_name }} trăm năm tình viên mãn, bạc đầu nghĩa phu thê! Hẹn gặp hai em ngày 14/6 nhé!',
                time: 'Vừa xong'
            },
            {
                name: 'Thu Hà (Bạn Đại học)',
                side: 'Nhà Gái',
                attendance: 'Sẽ tham dự',
                wish: 'Cô dâu {{ $weddingCard->bride_name }} xinh đẹp nhất hệ mặt trời! Chúc hai bạn mãi hạnh phúc ngọt ngào như thuở ban đầu ♥',
                time: '15 phút trước'
            },
            {
                name: 'Gia đình Bác Hùng',
                side: 'Chung hai bên',
                attendance: 'Sẽ tham dự',
                wish: 'Chúc mừng hạnh phúc hai cháu và hai bên gia đình. Chúc hai cháu sớm có tin vui!',
                time: '1 giờ trước'
            }
        ];

        function renderWishes() {
            const list = document.getElementById('wishes-list');
            const badge = document.getElementById('wish-count-badge');
            badge.textContent = `${wishesData.length} lời chúc`;

            list.innerHTML = wishesData.map(item => `
                <div class="bg-white rounded-xl p-3.5 border border-gold-400/50 shadow-sm">
                    <div class="flex items-center justify-between gap-2">
                        <span class="font-bold text-crimson-900 text-xs sm:text-sm">${escapeHtml(item.name)}</span>
                        <span class="text-[10px] px-2 py-0.5 rounded-full bg-crimson-50 text-crimson-800 border border-gold-400/40">
                            ${escapeHtml(item.side)} • ${escapeHtml(item.attendance)}
                        </span>
                    </div>
                    <p class="text-xs text-crimson-900/90 mt-1.5 leading-relaxed">${escapeHtml(item.wish)}</p>
                    <p class="text-[10px] text-crimson-600/70 mt-1">${escapeHtml(item.time)}</p>
                </div>
            `).join('');
        }

        function escapeHtml(str) {
            return String(str).replace(/[&<>"']/g, s => ({
                '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
            }[s]));
        }

        function submitRSVP(e) {
            e.preventDefault();
            const name = document.getElementById('rsvp-name').value.trim();
            const side = document.getElementById('rsvp-side').value;
            const wish = document.getElementById('rsvp-wish').value.trim();
            const attendanceEl = document.querySelector('input[name="attendance"]:checked');
            const attendance = attendanceEl ? attendanceEl.value : 'Sẽ tham dự';

            if (!name || !wish) return;

            wishesData.unshift({
                name,
                side,
                attendance,
                wish,
                time: 'Vừa gửi xong'
            });

            renderWishes();
            document.getElementById('rsvp-form').reset();
            showToast('Cảm ơn lời chúc & xác nhận của bạn! 囍');
        }

        /* ---------------------------------------------------------------
         * G. MODALS, LIGHTBOX, CLIPBOARD & CALENDAR (.ICS)
         * --------------------------------------------------------------- */
        @php
            $albumData = !empty($weddingCard->album) ? (is_string($weddingCard->album) ? json_decode($weddingCard->album, true) : $weddingCard->album) : [];
            $albumPhotosJson = json_encode(!empty($albumData) && is_array($albumData) ? array_values(array_map(function($img) {
                return str_starts_with($img, 'http') ? $img : asset('storage/' . $img);
            }, $albumData)) : []);
        @endphp
        const defaultGallery = [
            'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=85',
            'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1000&q=85',
            'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=1000&q=85',
            'https://images.unsplash.com/photo-1606800052052-a08af7148866?auto=format&fit=crop&w=1000&q=85',
            'https://images.unsplash.com/photo-1537633552985-df8429e8048b?auto=format&fit=crop&w=1000&q=85'
        ];
        const dbGallery = {!! $albumPhotosJson ?: '[]' !!};
        const galleryUrls = (Array.isArray(dbGallery) && dbGallery.length > 0) ? dbGallery : defaultGallery;
        let currentLightboxIndex = 0;

        function openLightbox(idx) {
            currentLightboxIndex = idx;
            const modal = document.getElementById('lightbox-modal');
            const img = document.getElementById('lightbox-img');
            img.src = galleryUrls[currentLightboxIndex];
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeLightbox() {
            const modal = document.getElementById('lightbox-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function stepLightbox(dir) {
            currentLightboxIndex = (currentLightboxIndex + dir + galleryUrls.length) % galleryUrls.length;
            document.getElementById('lightbox-img').src = galleryUrls[currentLightboxIndex];
        }

        function toggleGiftModal(show) {
            const modal = document.getElementById('gift-modal');
            if (show) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            } else {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        }

        let currentMapAddress = '';
        function openMapModal(title, address) {
            currentMapAddress = address;
            document.getElementById('map-modal-title').textContent = title;
            document.getElementById('map-modal-address').textContent = address;
            document.getElementById('map-iframe').src = `https://www.google.com/maps?q=${encodeURIComponent(address)}&output=embed`;
            const modal = document.getElementById('map-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeMapModal() {
            const modal = document.getElementById('map-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function copyCurrentAddress() {
            copyText(currentMapAddress, 'Đã sao chép địa chỉ tổ chức!');
        }

        function copyText(text, successMsg) {
            const ta = document.createElement('textarea');
            ta.value = text;
            document.body.appendChild(ta);
            ta.select();
            document.execCommand('copy');
            document.body.removeChild(ta);
            showToast(successMsg);
        }

        function downloadICS(title, startUTC, endUTC, location) {
            const icsContent = [
                'BEGIN:VCALENDAR',
                'VERSION:2.0',
                'BEGIN:VEVENT',
                `SUMMARY:${title}`,
                `DTSTART:${startUTC}`,
                `DTEND:${endUTC}`,
                `LOCATION:${location}`,
                'DESCRIPTION:Thiệp mời cưới Song Hỷ Đỏ - {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }} (14/06/2026)',
                'END:VEVENT',
                'END:VCALENDAR'
            ].join('\n');

            const blob = new Blob([icsContent], { type: 'text/calendar;charset=utf-8' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'lich-cuoi-gia-khanh-quynh-anh.ics';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            showToast('Đã tải tệp lịch (.ics) vào thiết bị!');
        }

        function promptGuestName() {
            const modal = document.getElementById('guest-modal');
            const input = document.getElementById('custom-guest-input');
            input.value = document.getElementById('cover-guest-name').textContent.trim();
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeGuestModal() {
            const modal = document.getElementById('guest-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function applyGuestName() {
            const val = document.getElementById('custom-guest-input').value.trim();
            if (val) {
                document.getElementById('cover-guest-name').textContent = val;
                document.getElementById('inner-guest-name').textContent = val;
                showToast(`Đã đổi tên khách mời: ${val}`);
            }
            closeGuestModal();
        }

        function showToast(msg) {
            const box = document.getElementById('toast-box');
            document.getElementById('toast-text').textContent = msg;
            box.classList.remove('opacity-0', '-translate-y-3');
            box.classList.add('opacity-100', 'translate-y-0');
            clearTimeout(window._toastTimer);
            window._toastTimer = setTimeout(() => {
                box.classList.add('opacity-0', '-translate-y-3');
                box.classList.remove('opacity-100', 'translate-y-0');
            }, 2600);
        }

        /* ---------------------------------------------------------------
         * H. INITIALIZE ON WINDOW LOAD
         * --------------------------------------------------------------- */
        window.onload = function () {
            // Check URL param ?khach=... for personalized guest greeting
            const params = new URLSearchParams(window.location.search);
            const guestParam = params.get('khach') || params.get('guest');
            if (guestParam) {
                document.getElementById('cover-guest-name').textContent = guestParam;
                document.getElementById('inner-guest-name').textContent = guestParam;
            }

            initFloatingSongHy();
            initPetalsCanvas();
            initCountdown();
            renderWishes();
            triggerScrollReveal();
        };
    </script>
    <!-- Universal Laravel AJAX Wishes & RSVP Integration -->
    <script>
    (function() {
        const cardId = {{ $weddingCard->id }};
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';
        const wishStoreUrl = "{{ route('wishes.store', $weddingCard->id) }}";
        const wishIndexUrl = "{{ route('wishes.index', $weddingCard->id) }}";

        window.submitLaravelWish = function(senderName, message, attendanceStatus = 'unsure', guestCount = 1) {
            return fetch(wishStoreUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    sender_name: senderName,
                    message: message || 'Chúc mừng hai bạn trăm năm hạnh phúc!',
                    attendance_status: attendanceStatus,
                    guest_count: guestCount
                })
            }).then(r => r.json());
        };

        // Listen for form submissions
        document.addEventListener('submit', function(e) {
            const form = e.target;
            const isWish = form.id === 'wishForm' || form.id === 'wish-form' || form.classList.contains('guestbook-form');
            const isRsvp = form.id === 'rsvp-form' || form.id === 'rsvp' || form.classList.contains('rsvp');

            if (isWish || isRsvp) {
                const nameInput = form.querySelector('#guestNameInput, #wish-name, #wish-author, #r-name, #rsvp-name, input[name="name"], input[name="sender_name"]');
                const msgInput = form.querySelector('#guestWishInput, #wish-message, #r-msg, #rsvp-msg, textarea[name="message"]');
                const attInput = form.querySelector('input[name="att"]:checked, input[name="attendance"]:checked, select[name="attendance"]');
                const countInput = form.querySelector('input[name="guest_count"], select[name="guest_count"]');

                const name = nameInput ? nameInput.value.trim() : '';
                const message = msgInput ? msgInput.value.trim() : '';
                const attendance = attInput ? attInput.value : (isRsvp ? 'attending' : 'unsure');
                const count = countInput ? parseInt(countInput.value) || 1 : 1;

                if (name) {
                    window.submitLaravelWish(name, message, attendance, count).then(res => {
                        console.log('Wish stored in Laravel DB:', res);
                    }).catch(err => console.error('Error saving wish to Laravel:', err));
                }
            }
        }, true);
    })();
    </script>
</body>
</html>