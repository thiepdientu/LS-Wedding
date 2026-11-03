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
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Pattaya&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        boho: {
                            950: '#19281d',
                            900: '#243829',
                            800: '#354f3b',
                            700: '#46664d',
                            600: '#587d60',
                            500: '#729679',
                            400: '#94b39a',
                            300: '#b8cfb9',
                            200: '#d7e5d7',
                            100: '#ebf2eb',
                            50: '#f5f8f5',
                        },
                        cream: {
                            50: '#fdfcf9',
                            100: '#faf8f2',
                            200: '#f3efe4',
                            300: '#e6dfd0',
                        },
                        sand: {
                            300: '#e3cca1',
                            400: '#d2b47e',
                            500: '#c19c5d',
                            600: '#9e7b3e',
                        }
                    },
                    fontFamily: {
                        pattaya: ['"Pattaya"', 'cursive'],
                        serif: ['"Cormorant Garamond"', '"Playfair Display"', 'Georgia', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --boho-dark: #243829;
            --boho-main: #354f3b;
            --boho-sage: #587d60;
            --boho-soft: #94b39a;
            --cream-bg: #faf8f2;
            --sand-gold: #c19c5d;
        }

        body {
            background-color: #e4ece4;
            color: var(--boho-dark);
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        /* Boho Watercolor Paper Texture */
        .boho-paper {
            background-color: var(--cream-bg);
            background-image:
                radial-gradient(circle at 12% 18%, rgba(148, 179, 154, 0.14) 0%, transparent 45%),
                radial-gradient(circle at 88% 75%, rgba(193, 156, 93, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.85) 0%, rgba(243, 239, 228, 0.7) 100%);
        }

        /* Double Boho Botanical Frame */
        .boho-frame {
            border: 1.5px solid rgba(88, 125, 96, 0.35);
            box-shadow: inset 0 0 0 5px transparent, inset 0 0 0 6px rgba(193, 156, 93, 0.35);
        }

        /* Gentle Swaying Animation for flower.webp Corner Accents */
        @keyframes bohoSwayTL {
            0%, 100% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(2.4deg) scale(1.03); }
        }
        @keyframes bohoSwayBR {
            0%, 100% { transform: rotate(180deg) scale(1); }
            50% { transform: rotate(182.4deg) scale(1.03); }
        }
        @keyframes bohoFloatSlow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-5px) rotate(1.5deg); }
        }
        .flower-tl {
            animation: bohoSwayTL 6.8s ease-in-out infinite;
            transform-origin: top left;
        }
        .flower-br {
            animation: bohoSwayBR 7.2s ease-in-out infinite;
            transform-origin: center center;
        }
        .flower-float {
            animation: bohoFloatSlow 5.5s ease-in-out infinite;
        }

        /* 12 Floating Botanical Elements in Ambient Background */
        .floating-boho-layer {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 5;
            overflow: hidden;
        }
        .floating-boho-petal {
            position: absolute;
            color: rgba(88, 125, 96, 0.15);
            user-select: none;
            animation: floatPetalUp linear infinite;
        }
        @keyframes floatPetalUp {
            0% {
                transform: translateY(105vh) rotate(0deg) translateX(0);
                opacity: 0;
            }
            15% { opacity: 1; }
            85% { opacity: 1; }
            100% {
                transform: translateY(-15vh) rotate(40deg) translateX(22px);
                opacity: 0;
            }
        }

        /* 3D Split-Gate Cover Screen (Màn hình Mở Thiệp Hoa Mộc Xanh) */
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
            transition-delay: 0.9s;
        }
        .gate-leaf-left,
        .gate-leaf-right {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 50%;
            background: linear-gradient(155deg, #f5f8f5 0%, #e3ede4 55%, #d3e2d5 100%);
            transition: transform 1.25s cubic-bezier(0.65, 0, 0.15, 1);
            z-index: 10;
        }
        .gate-leaf-left {
            left: 0;
            border-right: 1px solid rgba(88, 125, 96, 0.28);
            transform-origin: left center;
        }
        .gate-leaf-right {
            right: 0;
            border-left: 1px solid rgba(88, 125, 96, 0.28);
            transform-origin: right center;
        }
        #invitation-gate.gate-opened .gate-leaf-left {
            transform: translateX(-103%) rotateY(-12deg);
        }
        #invitation-gate.gate-opened .gate-leaf-right {
            transform: translateX(103%) rotateY(12deg);
        }
        .gate-card-wrapper {
            transition: transform 0.85s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.65s ease;
        }
        #invitation-gate.gate-opened .gate-card-wrapper {
            transform: scale(1.08) translateY(-10px);
            opacity: 0;
        }

        /* Exact ChungĐôi Ornamental Divider: <div><div></div><span>❦</span><div></div></div> */
        .ornament-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            width: 100%;
            max-width: 240px;
            margin: 0 auto;
        }
        .ornament-divider div {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, #587d60, transparent);
        }
        .ornament-divider span {
            color: #46664d;
            font-size: 1.2rem;
            line-height: 1;
        }

        /* Primary Boho Green Button */
        .btn-boho {
            background: linear-gradient(135deg, #587d60 0%, #354f3b 55%, #243829 100%);
            color: #faf8f2;
            box-shadow: 0 10px 25px -5px rgba(53, 79, 59, 0.45), inset 0 1px 1px rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .btn-boho:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 14px 30px -5px rgba(53, 79, 59, 0.6);
        }
        .btn-boho::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 42%;
            height: 200%;
            background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.35) 50%, rgba(255,255,255,0) 100%);
            transform: rotate(25deg);
            animation: shimmerSwipe 3.3s infinite;
        }
        @keyframes shimmerSwipe {
            0% { left: -60%; }
            45%, 100% { left: 140%; }
        }

        /* Scroll Reveal Animation */
        .reveal-item {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-item.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        /* Heartbeat Pulse for Wedding Day 24 on Calendar */
        @keyframes pulseDay24 {
            0%, 100% { transform: scale(1); }
            35% { transform: scale(1.15); }
            65% { transform: scale(0.95); }
        }
        .animate-pulse-day {
            animation: pulseDay24 1.9s infinite ease-in-out;
        }

        /* Equalizer Sound Bars Animation */
        @keyframes eqBar1 { 0%, 100% { height: 14px; } 50% { height: 5px; } }
        @keyframes eqBar2 { 0%, 100% { height: 7px; } 50% { height: 15px; } }
        @keyframes eqBar3 { 0%, 100% { height: 4px; } 50% { height: 11px; } }
        @keyframes eqBar4 { 0%, 100% { height: 12px; } 50% { height: 5px; } }
        .eq-bars-playing .bar-1 { animation: eqBar1 0.8s ease-in-out infinite; }
        .eq-bars-playing .bar-2 { animation: eqBar2 0.7s ease-in-out infinite; }
        .eq-bars-playing .bar-3 { animation: eqBar3 0.9s ease-in-out infinite; }
        .eq-bars-playing .bar-4 { animation: eqBar4 0.75s ease-in-out infinite; }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f5f8f5;
        }
        ::-webkit-scrollbar-thumb {
            background: #729679;
            border-radius: 3px;
        }
    </style>
</head>
<body class="min-h-screen selection:bg-boho-700 selection:text-white">

    <!-- Falling Blossoms & Bokeh Canvas -->
    <canvas id="boho-canvas" class="fixed inset-0 pointer-events-none z-20"></canvas>

    <!-- 12 Floating Botanical Elements (Exact ChungĐôi structure) -->
    <div class="floating-boho-layer" id="floating-boho-container" aria-hidden="true"></div>

    <!-- ================================================================= -->
    <!-- 1. COVER GATE SCREEN (MÀN HÌNH MỞ THIỆP HOA MỘC XANH)             -->
    <!-- ================================================================= -->
    <div id="invitation-gate" class="flex items-center justify-center p-4 sm:p-6">
        <!-- Left & Right Curtain Panels -->
        <div class="gate-leaf-left">
            <div class="h-full w-full opacity-20 flex items-center justify-end pr-4 select-none">
                <img src="https://chungdoi.com/images/themes/boho-floral-green/flower.webp" alt="" class="w-44 h-44 object-contain" onerror="this.style.display='none'">
            </div>
        </div>
        <div class="gate-leaf-right">
            <div class="h-full w-full opacity-20 flex items-center justify-start pl-4 select-none">
                <img src="https://chungdoi.com/images/themes/boho-floral-green/flower.webp" alt="" class="w-44 h-44 object-contain scale-x-[-1]" onerror="this.style.display='none'">
            </div>
        </div>

        <!-- Center Cover Card (Exact ChungĐôi Hoa Mộc Xanh DOM structure) -->
        <div class="gate-card-wrapper relative z-20 w-full max-w-[430px] boho-paper rounded-[28px] p-7 sm:p-10 text-center boho-frame shadow-[0_25px_70px_rgba(36,56,41,0.24)] overflow-hidden">
            
            <!-- Symmetrical Corner Floral Graphics (flower-background) -->
            <img 
                src="https://chungdoi.com/images/themes/boho-floral-green/flower.webp" 
                alt="flower-background" 
                class="flower-tl absolute -top-5 -left-5 w-36 sm:w-44 pointer-events-none select-none opacity-90"
                onerror="this.style.display='none'"
            >
            <img 
                src="https://chungdoi.com/images/themes/boho-floral-green/flower.webp" 
                alt="flower-background" 
                class="flower-br absolute -bottom-5 -right-5 w-36 sm:w-44 pointer-events-none select-none opacity-90"
                onerror="this.style.display='none'"
            >

            <!-- Top Decoration Bar -->
            <div class="relative z-10 flex justify-center mb-3">
                <img 
                    src="https://chungdoi.com/images/themes/boho-floral-green/decoration_bar.webp" 
                    alt="decoration" 
                    class="h-8 sm:h-10 object-contain mx-auto"
                    onerror="this.style.display='none'"
                >
            </div>

            <p class="relative z-10 text-[11px] uppercase tracking-[0.35em] text-boho-600 font-semibold mb-3">
                Save The Date
            </p>

            <!-- Exact Cover Heading: <h1><span>{{ $weddingCard->groom_name }}</span><span>&</span><span>{{ $weddingCard->bride_name }}</span></h1> -->
            <h1 class="relative z-10 my-2 flex flex-col items-center justify-center space-y-1">
                <span class="font-pattaya text-4xl sm:text-5xl text-boho-800 tracking-wide drop-shadow-sm">{{ $weddingCard->groom_name }}</span>
                <span class="font-serif italic text-2xl text-sand-500 my-0.5">&amp;</span>
                <span class="font-pattaya text-4xl sm:text-5xl text-boho-800 tracking-wide drop-shadow-sm">{{ $weddingCard->bride_name }}</span>
            </h1>

            <!-- Exact Ornamental Divider: <div><div></div><span>❦</span><div></div></div> -->
            <div class="ornament-divider my-5 relative z-10">
                <div></div>
                <span>❦</span>
                <div></div>
            </div>

            <!-- Dynamic Date: 24 tháng 5, 2026 -->
            <p class="relative z-10 font-serif text-xl sm:text-2xl text-boho-800 font-semibold tracking-widest mb-5">
                {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->locale('vi')->isoFormat('D [tháng] M, Y') : '24 tháng 5, 2026' }}
            </p>

            <!-- Personalized Guest Invitation Badge ("Thân Mời") -->
            <div class="relative z-10 bg-boho-50/90 border border-boho-300/80 rounded-2xl px-5 py-3.5 mb-7 max-w-xs mx-auto shadow-inner">
                <p class="text-[11px] uppercase tracking-[0.28em] text-boho-600 font-semibold mb-1">
                    Thân Mời
                </p>
                <p id="cover-guest-name" class="font-serif text-lg sm:text-xl text-boho-900 font-bold tracking-wide">
                    Quý Khách &amp; Gia Đình
                </p>
            </div>

            <!-- Open Invitation Button: <a href="?open=1"><span>Mở thiệp</span></a> -->
            <div class="relative z-10">
                <a href="?open=1" id="btn-open-card" onclick="openInvitation(event)" class="btn-boho px-10 py-3.5 rounded-full font-semibold text-sm tracking-[0.18em] uppercase inline-flex items-center gap-3 cursor-pointer">
                    <i class="fa-regular fa-envelope-open text-base text-sand-300"></i>
                    <span>Mở thiệp</span>
                </a>
            </div>

            <p class="relative z-10 text-[11px] text-boho-600/75 mt-4 italic">
                Chạm để mở thiệp &amp; thưởng thức giai điệu tình yêu
            </p>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- 2. MAIN WEDDING INVITATION CONTENT (?open=1 STATE)                -->
    <!-- ================================================================= -->
    <main id="main-invitation" class="relative z-10 max-w-[520px] mx-auto shadow-[0_0_85px_rgba(36,56,41,0.2)] boho-paper border-x border-boho-300/60 overflow-hidden">

        <!-- Sticky Top Bar: Template Info & Guest Name Switcher -->
        {{-- <div class="sticky top-0 z-30 bg-cream-100/90 backdrop-blur-md border-b border-boho-200 px-4 py-2.5 flex items-center justify-between text-xs text-boho-800">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-boho-600"></span>
                <span>Mẫu thiệp: <strong class="font-semibold text-boho-900">Hoa Mộc Xanh</strong></span>
            </div>
            <div class="flex items-center gap-3">
                <button onclick="reopenCoverGate()" class="text-boho-700 hover:text-boho-950 underline font-medium flex items-center gap-1 cursor-pointer">
                    <i class="fa-regular fa-envelope text-[10px]"></i> Bìa thiệp
                </button>
                <button onclick="openGuestModal()" class="text-boho-700 hover:text-boho-950 underline font-medium flex items-center gap-1 cursor-pointer">
                    <i class="fa-solid fa-user-pen text-[10px]"></i> Đổi tên khách
                </button>
            </div>
        </div> --}}

        <!-- ============================================================= -->
        <!-- SECTION 1: HERO COUPLE PORTRAITS (MINH QUÂN & THU HÀ)         -->
        <!-- ============================================================= -->
        <section class="relative pt-10 pb-10 px-5 text-center overflow-hidden">
            <!-- Top Corner Floral Illustrations -->
            <img 
                src="https://chungdoi.com/images/themes/boho-floral-green/flower.webp" 
                alt="" 
                class="flower-tl absolute -top-6 -left-6 w-36 sm:w-44 pointer-events-none select-none opacity-85"
                onerror="this.style.display='none'"
            >
            <img 
                src="https://chungdoi.com/images/themes/boho-floral-green/flower.webp" 
                alt="" 
                class="flower-br absolute -bottom-6 -right-6 w-36 sm:w-44 pointer-events-none select-none opacity-85"
                onerror="this.style.display='none'"
            >

            <!-- Top Header & Decoration Bar -->
            <div class="relative z-10 reveal-item">
                <p class="text-[11px] uppercase tracking-[0.35em] text-boho-600 font-semibold mb-2">
                    Save The Date • {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '24.05.2026' }}
                </p>
                <h2 class="font-pattaya text-4xl sm:text-5xl text-boho-800 leading-tight">
                    {{ $weddingCard->groom_name }} <span class="font-serif italic text-sand-500 text-3xl mx-1">&amp;</span> {{ $weddingCard->bride_name }}
                </h2>
                <img 
                    src="https://chungdoi.com/images/themes/boho-floral-green/decoration_bar.webp" 
                    alt="decoration" 
                    class="h-8 sm:h-9 object-contain mx-auto mt-3 mb-6"
                    onerror="this.style.display='none'"
                >
            </div>

            @php
                $groomAvatarSrc = !empty($weddingCard->groom_avatar)
                    ? (str_starts_with($weddingCard->groom_avatar, 'http') ? $weddingCard->groom_avatar : asset('storage/' . $weddingCard->groom_avatar))
                    : (!empty($weddingCard->groom_image)
                        ? (str_starts_with($weddingCard->groom_image, 'http') ? $weddingCard->groom_image : asset('storage/' . $weddingCard->groom_image))
                        : 'https://assets.chungdoi.com/photo-library/design/5b2fafb74f1aa84ca843acded191b5e4629c62f9b73820281864f27167312b06.webp');

                $brideAvatarSrc = !empty($weddingCard->bride_avatar)
                    ? (str_starts_with($weddingCard->bride_avatar, 'http') ? $weddingCard->bride_avatar : asset('storage/' . $weddingCard->bride_avatar))
                    : (!empty($weddingCard->bride_image)
                        ? (str_starts_with($weddingCard->bride_image, 'http') ? $weddingCard->bride_image : asset('storage/' . $weddingCard->bride_image))
                        : 'https://assets.chungdoi.com/photo-library/design/3fcfad216695abf4dbd4198edb2ba4d451546d5e1231aafbc66559e164daad27.webp');
            @endphp
            <!-- Two Portrait Cards: Groom ({{ $weddingCard->groom_rank ?: 'Trưởng Nam' }} - {{ $weddingCard->groom_name }}) & Bride ({{ $weddingCard->bride_rank ?: 'Út Nữ' }} - {{ $weddingCard->bride_name }}) -->
            <div class="relative z-10 grid grid-cols-2 gap-4 sm:gap-5 mt-2 reveal-item">
                <!-- Groom Card -->
                <div class="bg-white/90 rounded-t-full rounded-b-3xl p-2.5 pb-5 border border-boho-200 shadow-lg group">
                    <div onclick="openLightboxCustom('{{ $groomAvatarSrc }}')" class="aspect-[3/4] rounded-t-full rounded-b-2xl overflow-hidden border border-boho-200 relative cursor-pointer">
                        <img 
                            src="{{ $groomAvatarSrc }}" 
                            alt="{{ $weddingCard->groom_rank ?: 'Trưởng Nam' }} {{ $weddingCard->groom_name }}" 
                            class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-700"
                            onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80'"
                        >
                    </div>
                    <p class="text-[11px] uppercase tracking-[0.2em] text-boho-600 font-semibold mt-3.5">
                        {{ $weddingCard->groom_rank ?: 'Trưởng Nam' }}
                    </p>
                    <h3 class="font-pattaya text-2xl sm:text-3xl text-boho-800 mt-1">
                        {{ $weddingCard->groom_name }}
                    </h3>
                </div>

                <!-- Bride Card -->
                <div class="bg-white/90 rounded-t-full rounded-b-3xl p-2.5 pb-5 border border-boho-200 shadow-lg group">
                    <div onclick="openLightboxCustom('{{ $brideAvatarSrc }}')" class="aspect-[3/4] rounded-t-full rounded-b-2xl overflow-hidden border border-boho-200 relative cursor-pointer">
                        <img 
                            src="{{ $brideAvatarSrc }}" 
                            alt="{{ $weddingCard->bride_rank ?: 'Út Nữ' }} {{ $weddingCard->bride_name }}" 
                            class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-700"
                            onerror="this.src='https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=600&q=80'"
                        >
                    </div>
                    <p class="text-[11px] uppercase tracking-[0.2em] text-boho-600 font-semibold mt-3.5">
                        {{ $weddingCard->bride_rank ?: 'Út Nữ' }}
                    </p>
                    <h3 class="font-pattaya text-2xl sm:text-3xl text-boho-800 mt-1">
                        {{ $weddingCard->bride_name }}
                    </h3>
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 2: THÔNG TIN LỄ CƯỚI (FAMILY & CEREMONY DETAILS)      -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8 relative">
            <div class="bg-white/95 rounded-3xl p-6 sm:p-8 boho-frame shadow-xl text-center relative overflow-hidden reveal-item">
                <!-- Subtle Floral Watermarks inside Card -->
                <img 
                    src="https://chungdoi.com/images/themes/boho-floral-green/flower.webp" 
                    alt="" 
                    class="flower-float absolute -top-8 -right-8 w-32 opacity-30 pointer-events-none select-none rotate-90"
                    onerror="this.style.display='none'"
                >
                <img 
                    src="https://chungdoi.com/images/themes/boho-floral-green/flower.webp" 
                    alt="" 
                    class="flower-float absolute -bottom-8 -left-8 w-32 opacity-30 pointer-events-none select-none -rotate-90"
                    onerror="this.style.display='none'"
                >

                <!-- Section Heading -->
                <h2 class="font-serif text-2xl sm:text-3xl font-bold uppercase tracking-[0.12em] text-boho-800">
                    THÔNG TIN LỄ CƯỚI
                </h2>
                <img 
                    src="https://chungdoi.com/images/themes/boho-floral-green/decoration_bar.webp" 
                    alt="" 
                    class="h-7 object-contain mx-auto my-3"
                    onerror="this.style.display='none'"
                >

                <!-- Two-Column Family Information (Exact Demo Data) -->
                <div class="grid grid-cols-2 gap-3 text-center border-y border-boho-200 py-5 my-4 relative">
                    <div class="absolute left-1/2 top-4 bottom-4 w-px bg-boho-200 -translate-x-1/2"></div>

                    <!-- Nhà Trai -->
                    <div class="pr-2">
                        <p class="text-[11px] uppercase tracking-widest text-boho-600 font-semibold mb-1">
                            Nhà Trai
                        </p>
                        <p class="font-serif text-base sm:text-lg font-bold text-boho-900 leading-snug">
                            {{ $weddingCard->groom_father_name ?: ($weddingCard->groom_father ?: 'Trần Văn Hùng') }}
                        </p>
                        <p class="font-serif text-base sm:text-lg font-bold text-boho-900 leading-snug">
                            {{ $weddingCard->groom_mother_name ?: ($weddingCard->groom_mother ?: 'Hạm Thị Lan') }}
                        </p>
                        <p class="text-[11px] text-boho-600 mt-2 leading-relaxed">
                            {{ $weddingCard->address_groom ?: ($weddingCard->groom_address ?: 'Đống Đa, Hà Nội') }}
                        </p>
                    </div>

                    <!-- Nhà Gái -->
                    <div class="pl-2">
                        <p class="text-[11px] uppercase tracking-widest text-boho-600 font-semibold mb-1">
                            Nhà Gái
                        </p>
                        <p class="font-serif text-base sm:text-lg font-bold text-boho-900 leading-snug">
                            {{ $weddingCard->bride_father_name ?: ($weddingCard->bride_father ?: 'Nguyễn Văn Bình') }}
                        </p>
                        <p class="font-serif text-base sm:text-lg font-bold text-boho-900 leading-snug">
                            {{ $weddingCard->bride_mother_name ?: ($weddingCard->bride_mother ?: 'Phan Thị Hương') }}
                        </p>
                        <p class="text-[11px] text-boho-600 mt-2 leading-relaxed">
                            {{ $weddingCard->address_bride ?: ($weddingCard->bride_address ?: 'Cầu Giấy, Hà Nội') }}
                        </p>
                    </div>
                </div>

                <!-- Formal Announcement Text -->
                <p class="text-xs sm:text-sm uppercase tracking-[0.16em] text-boho-700 font-semibold leading-relaxed mt-5">
                    TRÂN TRỌNG BÁO TIN LỄ THÀNH HÔN CỦA CON CHÚNG TÔI
                </p>

                <!-- Couple Full Names & Roles -->
                <div class="my-6 space-y-1.5">
                    <h3 class="font-pattaya text-3xl sm:text-4xl text-boho-800">
                        {{ $weddingCard->groom_name }}
                    </h3>
                    <p class="text-xs uppercase tracking-[0.25em] text-boho-600 font-medium">
                        {{ $weddingCard->groom_rank ?: 'Trưởng Nam' }}
                    </p>

                    <div class="py-1 font-serif italic text-2xl text-sand-500">&amp;</div>

                    <h3 class="font-pattaya text-3xl sm:text-4xl text-boho-800">
                        {{ $weddingCard->bride_name }}
                    </h3>
                    <p class="text-xs uppercase tracking-[0.25em] text-boho-600 font-medium">
                        {{ $weddingCard->bride_rank ?: 'Út Nữ' }}
                    </p>
                </div>

                <!-- Ceremony Time Block -->
                <div class="bg-boho-50/90 border border-boho-200 rounded-2xl p-5 mt-4">
                    <p class="text-xs uppercase tracking-[0.18em] text-boho-800 font-bold">
                        {{ $weddingCard->event_type ?: 'LỄ THÀNH HÔN ĐƯỢC CỬ HÀNH TẠI TƯ GIA' }}
                    </p>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-boho-600 mt-1.5">
                        VÀO LÚC
                    </p>
                    <p class="font-serif text-3xl sm:text-4xl font-bold text-boho-800 my-1">
                        {{ $weddingCard->ceremony_time ?: ($weddingCard->wedding_time ?: '09:00') }}
                    </p>

                    <!-- Date Split Row -->
                    <div class="flex items-center justify-center gap-3 sm:gap-5 my-2.5 text-boho-900 font-serif">
                        <span class="text-xs sm:text-sm uppercase tracking-widest font-semibold border-y border-boho-300 py-1 px-2">
                            {{ $weddingCard->wedding_date ? mb_strtoupper($weddingCard->wedding_date->locale('vi')->isoFormat('dddd')) : 'CHỦ NHẬT' }}
                        </span>
                        <span class="text-4xl sm:text-5xl font-bold text-boho-800 leading-none">
                            {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d') : '24' }}
                        </span>
                        <span class="text-xs sm:text-sm uppercase tracking-widest font-semibold border-y border-boho-300 py-1 px-2">
                            THÁNG {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('m') : '05' }}
                        </span>
                    </div>

                    <p class="font-serif text-2xl font-bold text-boho-800 tracking-widest">
                        {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('Y') : '2026' }}
                    </p>
                    <p class="font-serif italic text-xs sm:text-sm text-boho-600 mt-1">
                        (Tức ngày {{ $weddingCard->wedding_date_al ?: ($weddingCard->wedding_date_lunar ?: '8 tháng 4 năm Bính Ngọ') }})
                    </p>
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 3: ALBUM ẢNH (INTERACTIVE CAROUSEL 1/8 + LIGHTBOX)    -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8">
            <div class="text-center mb-6 reveal-item">
                <h2 class="font-pattaya text-3xl sm:text-4xl text-boho-800">Album Ảnh</h2>
                <img 
                    src="https://chungdoi.com/images/themes/boho-floral-green/decoration_bar.webp" 
                    alt="" 
                    class="h-7 object-contain mx-auto mt-2"
                    onerror="this.style.display='none'"
                >
            </div>

            @php
                $albumCoverSrc = !empty($weddingCard->cover_image)
                    ? (str_starts_with($weddingCard->cover_image, 'http') ? $weddingCard->cover_image : asset('storage/' . $weddingCard->cover_image))
                    : (!empty($weddingCard->banner_preview)
                        ? (str_starts_with($weddingCard->banner_preview, 'http') ? $weddingCard->banner_preview : asset('storage/' . $weddingCard->banner_preview))
                        : 'https://assets.chungdoi.com/photo-library/design/5019eadee002f02ce6f39d9c5bdb7304d4da683b4e109c41e7ed14e63391d9b0.webp');
            @endphp
            <!-- Interactive Main Slider with 1 / 8 Counter -->
            <div class="reveal-item">
                <div class="relative rounded-3xl overflow-hidden border-2 border-boho-200 shadow-xl bg-boho-950 aspect-[3/4] group">
                    <img 
                        id="carousel-main-img" 
                        onclick="openLightbox(currentSlideIndex)"
                        src="{{ $albumCoverSrc }}" 
                        alt="Album ảnh cưới {{ $weddingCard->couple_name }}" 
                        class="w-full h-full object-cover transition-all duration-500 cursor-pointer"
                    >

                    <!-- Slide Counter Badge (Exact "1 / 8" format) -->
                    <div id="carousel-counter" class="absolute top-4 right-4 px-3.5 py-1 rounded-full bg-black/55 backdrop-blur-sm text-white text-xs font-medium tracking-widest">
                        1 / 8
                    </div>

                    <!-- Fullscreen Trigger Badge -->
                    <button onclick="openLightbox(currentSlideIndex)" title="Phóng to ảnh" class="absolute top-4 left-4 w-9 h-9 rounded-full bg-black/45 hover:bg-black/70 text-white flex items-center justify-center transition cursor-pointer">
                        <i class="fa-solid fa-expand text-xs"></i>
                    </button>

                    <!-- Prev / Next Arrows -->
                    <button onclick="stepCarousel(-1)" aria-label="Ảnh trước" class="absolute left-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/80 hover:bg-white text-boho-900 shadow-lg flex items-center justify-center transition cursor-pointer">
                        <i class="fa-solid fa-chevron-left text-sm"></i>
                    </button>
                    <button onclick="stepCarousel(1)" aria-label="Ảnh tiếp" class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/80 hover:bg-white text-boho-900 shadow-lg flex items-center justify-center transition cursor-pointer">
                        <i class="fa-solid fa-chevron-right text-sm"></i>
                    </button>
                </div>

                <!-- Thumbnail Strip (8 Photos) -->
                <div id="carousel-thumbs" class="grid grid-cols-4 sm:grid-cols-8 gap-2 mt-3">
                    <!-- Populated dynamically by JS -->
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 4: THÔNG TIN TIỆC CƯỚI (NHÀ TRAI & NHÀ GÁI) & LỊCH    -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8">
            <div class="text-center mb-6 reveal-item">
                <h2 class="font-serif text-2xl sm:text-3xl font-bold uppercase tracking-[0.12em] text-boho-800">
                    THÔNG TIN TIỆC CƯỚI
                </h2>
                <img 
                    src="https://chungdoi.com/images/themes/boho-floral-green/decoration_bar.webp" 
                    alt="" 
                    class="h-7 object-contain mx-auto my-3"
                    onerror="this.style.display='none'"
                >
                <p class="text-xs sm:text-sm text-boho-700 font-medium mt-1">
                    Trân trọng kính mời quý khách đến chung vui cùng gia đình chúng tôi
                </p>
            </div>

            @php
                // 1. Dữ liệu Tiệc Cưới Nhà Trai
                $groomPartyDate = $weddingCard->groom_eating_date ?: $weddingCard->wedding_date;
                $groomPartyTime = $weddingCard->time_groom ?: ($weddingCard->wedding_time ?: '11:00');
                $groomPartyDayOfWeek = $groomPartyDate ? mb_strtoupper($groomPartyDate->locale('vi')->isoFormat('dddd')) : 'CHỦ NHẬT';
                $groomPartyDay = $groomPartyDate ? $groomPartyDate->format('d') : '24';
                $groomPartyMonth = $groomPartyDate ? $groomPartyDate->format('m') : '05';
                $groomPartyYear = $groomPartyDate ? $groomPartyDate->format('Y') : '2026';
                $groomPartyLunar = $weddingCard->time_groom_al ?: ($weddingCard->wedding_date_al ?: ($weddingCard->wedding_date_lunar ?: 'ngày 8 tháng 4 năm Bính Ngọ'));
                $groomVenueAddress = $weddingCard->address_groom ?: ($weddingCard->address_wedding ?: 'Tư gia Nhà Trai');
                $groomMapUrl = !empty($weddingCard->groom_map)
                    ? $weddingCard->groom_map
                    : (!empty($weddingCard->address_wedding_map)
                        ? $weddingCard->address_wedding_map
                        : ('https://www.google.com/maps/search/?api=1&query=' . urlencode($groomVenueAddress)));

                // 2. Dữ liệu Tiệc Cưới Nhà Gái
                $bridePartyDate = $weddingCard->bride_eating_date ?: $weddingCard->wedding_date;
                $bridePartyTime = $weddingCard->time_bride ?: ($weddingCard->wedding_time ?: '11:00');
                $bridePartyDayOfWeek = $bridePartyDate ? mb_strtoupper($bridePartyDate->locale('vi')->isoFormat('dddd')) : 'CHỦ NHẬT';
                $bridePartyDay = $bridePartyDate ? $bridePartyDate->format('d') : '24';
                $bridePartyMonth = $bridePartyDate ? $bridePartyDate->format('m') : '05';
                $bridePartyYear = $bridePartyDate ? $bridePartyDate->format('Y') : '2026';
                $bridePartyLunar = $weddingCard->time_bride_al ?: ($weddingCard->wedding_date_al ?: ($weddingCard->wedding_date_lunar ?: 'ngày 8 tháng 4 năm Bính Ngọ'));
                $brideVenueAddress = $weddingCard->address_bride ?: ($weddingCard->address_wedding ?: 'Tư gia Nhà Gái');
                $brideMapUrl = !empty($weddingCard->bride_map)
                    ? $weddingCard->bride_map
                    : (!empty($weddingCard->address_wedding_map)
                        ? $weddingCard->address_wedding_map
                        : ('https://www.google.com/maps/search/?api=1&query=' . urlencode($brideVenueAddress)));
            @endphp

            <!-- 2 Khối Tiệc Cưới Nhà Trai & Nhà Gái -->
            <div class="space-y-6 mb-6">
                <!-- Khối Tiệc Cưới Nhà Trai -->
                <div class="bg-white/95 rounded-3xl p-6 sm:p-8 boho-frame shadow-xl text-center relative overflow-hidden reveal-item">
                    <div class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-boho-100 text-boho-800 border border-boho-200 mb-4">
                        <span>🤵</span>
                        <span>{{ $weddingCard->groom_eating_title ?: 'Tiệc Cưới Nhà Trai' }}</span>
                    </div>

                    <p class="font-serif text-3xl sm:text-4xl font-bold text-boho-800 my-1">
                        {{ $groomPartyTime }}
                    </p>

                    <!-- Date Split Row -->
                    <div class="flex items-center justify-center gap-3 sm:gap-5 my-2.5 text-boho-900 font-serif">
                        <span class="text-xs sm:text-sm uppercase tracking-widest font-semibold border-y border-boho-300 py-1 px-2">
                            {{ $groomPartyDayOfWeek }}
                        </span>
                        <span class="text-4xl sm:text-5xl font-bold text-boho-800 leading-none">
                            {{ $groomPartyDay }}
                        </span>
                        <span class="text-xs sm:text-sm uppercase tracking-widest font-semibold border-y border-boho-300 py-1 px-2">
                            THÁNG {{ $groomPartyMonth }}
                        </span>
                    </div>

                    <p class="font-serif text-2xl font-bold text-boho-800 tracking-widest">
                        {{ $groomPartyYear }}
                    </p>
                    <p class="font-serif italic text-xs sm:text-sm text-boho-600 mt-1">
                        (Tức {{ $groomPartyLunar }})
                    </p>

                    <!-- Venue Box -->
                    <div class="bg-boho-50/70 border border-boho-200 rounded-2xl p-4 my-4 text-center">
                        <p class="text-[10px] uppercase tracking-widest text-boho-600 font-bold mb-1">
                            Địa điểm tổ chức
                        </p>
                        <p class="font-serif text-base sm:text-lg font-bold text-boho-900 leading-snug">
                            {{ $groomVenueAddress }}
                        </p>
                    </div>

                    <!-- Action Buttons: Google Maps + Phone Call -->
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-3 mt-4">
                        <a 
                            href="{{ $groomMapUrl }}" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-full border-2 border-boho-700 text-boho-800 hover:bg-boho-700 hover:text-white text-xs sm:text-sm font-semibold uppercase tracking-wider transition"
                        >
                            <i class="fa-solid fa-diamond-turn-right"></i>
                            <span>Chỉ đường Google Maps</span>
                        </a>
                        @if(!empty($weddingCard->groom_phone))
                            <a 
                                href="tel:{{ $weddingCard->groom_phone }}" 
                                class="w-full sm:w-auto btn-boho px-6 py-2.5 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider inline-flex items-center justify-center gap-2"
                            >
                                <i class="fa-solid fa-phone"></i>
                                <span>Liên hệ Chú Rể: {{ $weddingCard->groom_phone }}</span>
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Khối Tiệc Cưới Nhà Gái -->
                <div class="bg-white/95 rounded-3xl p-6 sm:p-8 boho-frame shadow-xl text-center relative overflow-hidden reveal-item">
                    <div class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-sand-100 text-sand-800 border border-sand-300 mb-4">
                        <span>👰</span>
                        <span>{{ $weddingCard->bride_eating_title ?: 'Tiệc Cưới Nhà Gái' }}</span>
                    </div>

                    <p class="font-serif text-3xl sm:text-4xl font-bold text-boho-800 my-1">
                        {{ $bridePartyTime }}
                    </p>

                    <!-- Date Split Row -->
                    <div class="flex items-center justify-center gap-3 sm:gap-5 my-2.5 text-boho-900 font-serif">
                        <span class="text-xs sm:text-sm uppercase tracking-widest font-semibold border-y border-boho-300 py-1 px-2">
                            {{ $bridePartyDayOfWeek }}
                        </span>
                        <span class="text-4xl sm:text-5xl font-bold text-boho-800 leading-none">
                            {{ $bridePartyDay }}
                        </span>
                        <span class="text-xs sm:text-sm uppercase tracking-widest font-semibold border-y border-boho-300 py-1 px-2">
                            THÁNG {{ $bridePartyMonth }}
                        </span>
                    </div>

                    <p class="font-serif text-2xl font-bold text-boho-800 tracking-widest">
                        {{ $bridePartyYear }}
                    </p>
                    <p class="font-serif italic text-xs sm:text-sm text-boho-600 mt-1">
                        (Tức {{ $bridePartyLunar }})
                    </p>

                    <!-- Venue Box -->
                    <div class="bg-boho-50/70 border border-boho-200 rounded-2xl p-4 my-4 text-center">
                        <p class="text-[10px] uppercase tracking-widest text-boho-600 font-bold mb-1">
                            Địa điểm tổ chức
                        </p>
                        <p class="font-serif text-base sm:text-lg font-bold text-boho-900 leading-snug">
                            {{ $brideVenueAddress }}
                        </p>
                    </div>

                    <!-- Action Buttons: Google Maps + Phone Call -->
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-3 mt-4">
                        <a 
                            href="{{ $brideMapUrl }}" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-full border-2 border-boho-700 text-boho-800 hover:bg-boho-700 hover:text-white text-xs sm:text-sm font-semibold uppercase tracking-wider transition"
                        >
                            <i class="fa-solid fa-diamond-turn-right"></i>
                            <span>Chỉ đường Google Maps</span>
                        </a>
                        @if(!empty($weddingCard->bride_phone))
                            <a 
                                href="tel:{{ $weddingCard->bride_phone }}" 
                                class="w-full sm:w-auto btn-boho px-6 py-2.5 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider inline-flex items-center justify-center gap-2"
                            >
                                <i class="fa-solid fa-phone"></i>
                                <span>Liên hệ Cô Dâu: {{ $weddingCard->bride_phone }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Khối Tiện Ích Chung: Đếm Ngược, Lịch Tháng, Thêm vào Lịch -->
            <div class="bg-white/95 rounded-3xl p-6 sm:p-8 boho-frame shadow-xl text-center relative overflow-hidden reveal-item">
                <!-- Live Countdown ("Cùng đếm ngược") -->
                <div>
                    <p id="countdown-title" class="font-pattaya text-2xl text-boho-800 mb-3">
                        Cùng đếm ngược
                    </p>
                    <div class="grid grid-cols-4 gap-2.5">
                        <div class="bg-boho-50 border border-boho-200 rounded-2xl py-2.5 px-1">
                            <span id="cd-days" class="block font-serif text-2xl sm:text-3xl font-bold text-boho-800">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-boho-600">Ngày</span>
                        </div>
                        <div class="bg-boho-50 border border-boho-200 rounded-2xl py-2.5 px-1">
                            <span id="cd-hours" class="block font-serif text-2xl sm:text-3xl font-bold text-boho-800">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-boho-600">Giờ</span>
                        </div>
                        <div class="bg-boho-50 border border-boho-200 rounded-2xl py-2.5 px-1">
                            <span id="cd-mins" class="block font-serif text-2xl sm:text-3xl font-bold text-boho-800">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-boho-600">Phút</span>
                        </div>
                        <div class="bg-boho-50 border border-boho-200 rounded-2xl py-2.5 px-1">
                            <span id="cd-secs" class="block font-serif text-2xl sm:text-3xl font-bold text-boho-800">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-boho-600">Giây</span>
                        </div>
                    </div>
                </div>

                <!-- Calendar Card -->
                @php
                    $cal = $weddingCard->calendar_matrix;
                    $leadEmpty = ($cal['start_day_of_week'] == 0) ? 6 : ($cal['start_day_of_week'] - 1);
                @endphp
                <div class="bg-boho-50/70 border border-boho-200 rounded-2xl p-4 sm:p-5 mt-6">
                    <h4 class="font-serif text-xl font-bold text-boho-900 mb-3">
                        {{ $cal['month_title'] }}
                    </h4>
                    <div class="grid grid-cols-7 gap-1 text-xs font-semibold text-boho-700 border-b border-boho-200 pb-2 mb-2.5">
                        <div>T2</div>
                        <div>T3</div>
                        <div>T4</div>
                        <div>T5</div>
                        <div>T6</div>
                        <div>T7</div>
                        <div class="text-sand-600 font-bold">CN</div>
                    </div>
                    <div class="grid grid-cols-7 gap-y-2 gap-x-1 text-xs sm:text-sm text-boho-800 items-center">
                        @for ($i = 0; $i < $leadEmpty; $i++)
                            <div></div>
                        @endfor
                        @for ($d = 1; $d <= $cal['total_days']; $d++)
                            @if ($d == $cal['active_day'])
                                <div class="relative flex items-center justify-center py-1">
                                    <span class="w-9 h-9 rounded-full bg-boho-700 text-white font-bold flex items-center justify-center shadow-md animate-pulse-day relative">
                                        {{ $d }}
                                        <i class="fa-solid fa-heart text-[10px] text-sand-300 absolute -top-1 -right-1"></i>
                                    </span>
                                </div>
                            @else
                                <div class="py-1 {{ ($leadEmpty + $d) % 7 == 0 ? 'text-sand-600' : '' }}">{{ $d }}</div>
                            @endif
                        @endfor
                    </div>
                </div>

                <!-- Google Calendar Link -->
                @php
                    $calSummary = urlencode('Đám cưới ' . $weddingCard->couple_name);
                    $calDate = $weddingCard->wedding_date ? $weddingCard->wedding_date->format('Ymd') : '20260524';
                    $calTime = !empty($weddingCard->wedding_time) && preg_match('/^\d{1,2}:\d{2}$/', trim($weddingCard->wedding_time)) ? str_replace(':', '', trim($weddingCard->wedding_time)) . '00' : '110000';
                    $calLocation = urlencode(($weddingCard->wedding_location ?: '') . ', ' . ($weddingCard->wedding_address ?: ''));
                @endphp
                <div class="mt-6">
                    <a 
                        href="https://www.google.com/calendar/render?action=TEMPLATE&text={{ $calSummary }}&dates={{ $calDate }}T{{ $calTime }}/{{ $calDate }}T{{ $calTime }}&details={{ $calSummary }}&location={{ $calLocation }}&ctz=Asia/Ho_Chi_Minh"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="btn-boho px-7 py-3 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider inline-flex items-center gap-2"
                    >
                        <i class="fa-regular fa-calendar-check"></i>
                        <span>Thêm vào lịch</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 5: DRESS CODE & LỊCH TRÌNH NGÀY CƯỚI                  -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-6 space-y-6">
            <!-- Dress Code Card -->
            <div class="bg-white/95 rounded-3xl p-6 border border-boho-200 shadow-lg text-center reveal-item">
                <h3 class="font-serif text-2xl font-bold uppercase tracking-[0.15em] text-boho-800">
                    DRESS CODE
                </h3>
                <p class="text-xs text-boho-600 mt-1 mb-4">
                    {{ $weddingCard->dresscode_note ?: 'Trang phục dự tiệc' }}
                </p>

                <!-- Swatches -->
                <div class="flex items-center justify-center gap-6 my-2 flex-wrap">
                    @if (!empty($weddingCard->dresscode_colors_list) && count($weddingCard->dresscode_colors_list) > 0)
                        @foreach ($weddingCard->dresscode_colors_list as $color)
                            <div class="group flex flex-col items-center gap-1.5">
                                <span class="w-11 h-11 rounded-full border-2 border-white shadow-md ring-1 ring-boho-200 transition transform group-hover:scale-110" style="background-color: {{ $color['hex'] }};"></span>
                                <span class="text-[11px] text-boho-700 font-medium">{{ $color['name'] ?? '' }}</span>
                            </div>
                        @endforeach
                    @else
                        <div class="group flex flex-col items-center gap-1.5">
                            <span class="w-11 h-11 rounded-full bg-[#587d60] border-2 border-white shadow-md ring-1 ring-boho-200 transition transform group-hover:scale-110"></span>
                            <span class="text-[11px] text-boho-700 font-medium">Xanh Boho</span>
                        </div>
                        <div class="group flex flex-col items-center gap-1.5">
                            <span class="w-11 h-11 rounded-full bg-[#f3efe4] border-2 border-white shadow-md ring-1 ring-boho-300 transition transform group-hover:scale-110"></span>
                            <span class="text-[11px] text-boho-700 font-medium">Kem Be</span>
                        </div>
                        <div class="group flex flex-col items-center gap-1.5">
                            <span class="w-11 h-11 rounded-full bg-[#c19c5d] border-2 border-white shadow-md ring-1 ring-boho-200 transition transform group-hover:scale-110"></span>
                            <span class="text-[11px] text-boho-700 font-medium">Vàng Cát</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- LỊCH TRÌNH NGÀY CƯỚI -->
            <div class="bg-white/95 rounded-3xl p-6 sm:p-7 border border-boho-200 shadow-lg reveal-item">
                <div class="text-center mb-6">
                    <h3 class="font-serif text-2xl font-bold uppercase tracking-[0.12em] text-boho-800">
                        LỊCH TRÌNH NGÀY CƯỚI
                    </h3>
                    <img 
                        src="https://chungdoi.com/images/themes/boho-floral-green/decoration_bar.webp" 
                        alt="" 
                        class="h-6 object-contain mx-auto mt-2"
                        onerror="this.style.display='none'"
                    >
                </div>

                <div class="relative max-w-xs mx-auto">
                    <!-- Center vertical line -->
                    <div class="absolute left-[88px] top-2 bottom-2 w-0.5 bg-boho-200"></div>

                    <div class="space-y-5">
                        @if (!empty($weddingCard->timeline_list) && count($weddingCard->timeline_list) > 0)
                            @foreach ($weddingCard->timeline_list as $item)
                                <div class="flex items-center gap-5 relative">
                                    <span class="w-16 text-right font-serif text-lg font-bold text-boho-800 shrink-0">{{ $item['time'] ?? '' }}</span>
                                    <span class="w-7 h-7 rounded-full bg-boho-700 text-white flex items-center justify-center text-xs z-10 shadow shrink-0">
                                        <i class="fa-solid fa-heart text-[10px]"></i>
                                    </span>
                                    <span class="text-xs sm:text-sm font-semibold text-boho-900">{{ $item['title'] ?? ($item['description'] ?? '') }}</span>
                                </div>
                            @endforeach
                        @else
                            <div class="flex items-center gap-5 relative">
                                <span class="w-16 text-right font-serif text-lg font-bold text-boho-800 shrink-0">17:30</span>
                                <span class="w-7 h-7 rounded-full bg-boho-700 text-white flex items-center justify-center text-xs z-10 shadow shrink-0">
                                    <i class="fa-solid fa-camera-retro text-[10px]"></i>
                                </span>
                                <span class="text-xs sm:text-sm font-semibold text-boho-900">Đón khách</span>
                            </div>
                            <div class="flex items-center gap-5 relative">
                                <span class="w-16 text-right font-serif text-lg font-bold text-boho-800 shrink-0">18:30</span>
                                <span class="w-7 h-7 rounded-full bg-boho-700 text-white flex items-center justify-center text-xs z-10 shadow shrink-0">
                                    <i class="fa-solid fa-heart text-[10px]"></i>
                                </span>
                                <span class="text-xs sm:text-sm font-semibold text-boho-900">Khai tiệc</span>
                            </div>
                            <div class="flex items-center gap-5 relative">
                                <span class="w-16 text-right font-serif text-lg font-bold text-boho-800 shrink-0">18:45</span>
                                <span class="w-7 h-7 rounded-full bg-boho-700 text-white flex items-center justify-center text-xs z-10 shadow shrink-0">
                                    <i class="fa-solid fa-champagne-glasses text-[10px]"></i>
                                </span>
                                <span class="text-xs sm:text-sm font-semibold text-boho-900">Rót rượu, cắt bánh</span>
                            </div>
                            <div class="flex items-center gap-5 relative">
                                <span class="w-16 text-right font-serif text-lg font-bold text-boho-800 shrink-0">19:00</span>
                                <span class="w-7 h-7 rounded-full bg-boho-700 text-white flex items-center justify-center text-xs z-10 shadow shrink-0">
                                    <i class="fa-solid fa-utensils text-[10px]"></i>
                                </span>
                                <span class="text-xs sm:text-sm font-semibold text-boho-900">Phục vụ món chính</span>
                            </div>
                            <div class="flex items-center gap-5 relative">
                                <span class="w-16 text-right font-serif text-lg font-bold text-boho-800 shrink-0">21:00</span>
                                <span class="w-7 h-7 rounded-full bg-boho-700 text-white flex items-center justify-center text-xs z-10 shadow shrink-0">
                                    <i class="fa-solid fa-music text-[10px]"></i>
                                </span>
                                <span class="text-xs sm:text-sm font-semibold text-boho-900">Kết thúc tiệc</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 6: SỔ LƯU BÚT (EXACT 6 DEMO WISHES + LIVE FORM)       -->
        <!-- ============================================================= -->
        <section id="guestbook-section" class="px-4 sm:px-6 py-8">
            <div class="bg-white/95 rounded-3xl p-6 sm:p-7 boho-frame shadow-xl reveal-item">
                <div class="text-center mb-5">
                    <h2 class="font-pattaya text-3xl sm:text-4xl text-boho-800">Sổ lưu bút</h2>
                    <img 
                        src="https://chungdoi.com/images/themes/boho-floral-green/decoration_bar.webp" 
                        alt="" 
                        class="h-6 object-contain mx-auto mt-2"
                        onerror="this.style.display='none'"
                    >
                    <p class="text-xs text-boho-600 mt-2">
                        Cảm ơn bạn rất nhiều vì đã gửi những lời chúc mừng tốt đẹp nhất đến đám cưới của chúng tôi!
                    </p>
                </div>

                <!-- Wish Submission Form -->
                <form id="wish-form" onsubmit="submitWish(event)" class="space-y-3 text-xs sm:text-sm mb-6">
                    <div>
                        <input 
                            type="text" 
                            id="wish-name" 
                            required 
                            placeholder="Nhập họ tên của bạn *" 
                            class="w-full px-4 py-2.5 rounded-xl border border-boho-300 bg-boho-50/40 focus:outline-none focus:ring-2 focus:ring-boho-600"
                        >
                    </div>
                    <div>
                        <textarea 
                            id="wish-message" 
                            rows="3" 
                            required 
                            placeholder="Nhập lời chúc của bạn *" 
                            class="w-full px-4 py-2.5 rounded-xl border border-boho-300 bg-boho-50/40 focus:outline-none focus:ring-2 focus:ring-boho-600"
                        ></textarea>
                    </div>
                    <button type="submit" class="btn-boho w-full py-3 rounded-xl font-semibold uppercase tracking-wider text-xs sm:text-sm cursor-pointer flex items-center justify-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span>Gửi lời chúc</span>
                    </button>
                </form>

                <!-- Live Wishes List (Pre-populated with Exact 6 Wishes from Demo) -->
                <div id="wishes-container" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                    <!-- Rendered by JS -->
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 7: HỘP QUÀ MỪNG (WEDDING GIFT BOX & QR MODAL)         -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-6 text-center">
            <div class="bg-gradient-to-br from-boho-800 via-boho-900 to-boho-950 text-cream-50 rounded-3xl p-6 sm:p-8 shadow-xl reveal-item relative overflow-hidden">
                <div onclick="toggleGiftModal(true)" class="w-16 h-16 mx-auto rounded-full bg-white/10 border border-sand-400/60 flex items-center justify-center text-sand-300 text-2xl mb-3 cursor-pointer hover:scale-110 transition">
                    <i class="fa-solid fa-gift"></i>
                </div>
                <h3 class="font-pattaya text-3xl text-white">Hộp Quà Mừng</h3>
                <p class="text-xs text-boho-100/85 max-w-xs mx-auto mt-2 leading-relaxed">
                    Cảm ơn tình cảm quý báu của Quý khách dành cho {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}. Chạm vào bên dưới để mở Hộp Quà Mừng:
                </p>
                <button onclick="toggleGiftModal(true)" class="mt-5 px-7 py-3 rounded-full bg-sand-400 hover:bg-sand-300 text-boho-950 text-xs sm:text-sm font-bold uppercase tracking-wider inline-flex items-center gap-2 transition shadow-lg cursor-pointer">
                    <i class="fa-solid fa-qrcode"></i>
                    <span>Mở Hộp Quà Mừng</span>
                </button>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- FOOTER                                                        -->
        <!-- ============================================================= -->
        <footer class="relative py-12 px-6 text-center border-t border-boho-200 bg-boho-50/75 overflow-hidden">
            <img 
                src="https://chungdoi.com/images/themes/boho-floral-green/flower.webp" 
                alt="" 
                class="flower-br absolute -bottom-6 -right-6 w-32 pointer-events-none opacity-65"
                onerror="this.style.display='none'"
            >

            <img 
                src="https://chungdoi.com/images/themes/boho-floral-green/decoration_bar.webp" 
                alt="" 
                class="h-7 object-contain mx-auto mb-3"
                onerror="this.style.display='none'"
            >
            <h2 class="font-pattaya text-3xl sm:text-4xl text-boho-800">{{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}</h2>
            <p class="font-serif italic text-sm sm:text-base text-boho-700 mt-3 max-w-xs mx-auto leading-relaxed">
                {{ $weddingCard->message_thanks ?: 'Sự hiện diện của quý khách là niềm vinh hạnh của gia đình chúng tôi!' }}
            </p>
            <div class="mt-5">
                <a href="https://chungdoi.com" target="_blank" rel="noopener noreferrer" class="inline-block text-xs text-boho-600 hover:text-boho-900 font-medium tracking-wider">
                    ♡ chungdoi.com
                </a>
            </div>
        </footer>
    </main>

    <!-- ================================================================= -->
    <!-- 3. FLOATING CONTROLS (EFFECTS, WISHES, MUSIC, GIFT QR)            -->
    <!-- ================================================================= -->

    <!-- Right-Edge Floating Effect Toggle Tab (Water-Drop Sparkle Icon) -->
    <button 
        id="btn-effect-toggle" 
        onclick="toggleFallingEffects()" 
        title="Bật / Tắt hiệu ứng hoa lá rơi" 
        class="fixed right-0 top-[52%] -translate-y-1/2 z-40 bg-white hover:bg-cream-50 text-[#0088cc] pl-3 pr-2.5 py-2.5 rounded-l-full shadow-[0_4px_18px_rgba(0,0,0,0.14)] border border-r-0 border-boho-200 flex items-center justify-center cursor-pointer transition-transform hover:scale-105"
    >
        <span class="relative flex items-center justify-center w-6 h-6">
            <i class="fa-solid fa-droplet text-[17px] text-[#0088cc]"></i>
            <i class="fa-solid fa-wand-magic-sparkles text-[9px] text-[#00a8e8] absolute -top-0.5 -right-1"></i>
        </span>
    </button>

    <!-- Bottom-Right Floating Widgets: Quick Wish & Music Equalizer -->
    <div class="fixed bottom-4 right-4 z-40 flex flex-col items-center gap-3">
        <!-- Quick Wish / Messenger Button -->
        <div id="floating-chat-widget" class="relative group">
            <button 
                onclick="dismissChatWidget(event)" 
                title="Ẩn nút"
                class="-top-1 -right-1 absolute w-5 h-5 rounded-full bg-slate-700 text-white text-[10px] flex items-center justify-center shadow hover:bg-slate-900 z-10 cursor-pointer"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
            <a 
                href="#guestbook-section" 
                title="Gửi lời chúc vào Sổ lưu bút"
                class="w-12 h-12 rounded-full bg-[#ff2e63] hover:bg-[#e61e52] text-white shadow-[0_6px_20px_rgba(255,46,99,0.45)] flex items-center justify-center transition transform hover:scale-105"
            >
                <i class="fa-brands fa-facebook-messenger text-2xl"></i>
            </a>
        </div>

        <!-- Boho Green Music Equalizer Button (II.I) -->
        <button 
            id="btn-music" 
            onclick="toggleMusic()" 
            title="Bật / Tắt nhạc cưới" 
            class="w-12 h-12 rounded-full bg-boho-700/95 hover:bg-boho-800 border-2 border-boho-300 text-white shadow-[0_6px_20px_rgba(36,56,41,0.35)] flex items-center justify-center cursor-pointer transition transform hover:scale-105"
        >
            <div id="music-eq-bars" class="flex items-end justify-center gap-[3px] h-4 w-5">
                <span class="bar-1 w-[3px] h-3.5 bg-white rounded-full transition-all"></span>
                <span class="bar-2 w-[3px] h-2 bg-white rounded-full transition-all"></span>
                <span class="bar-3 w-[3px] h-1 bg-white rounded-full transition-all"></span>
                <span class="bar-4 w-[3px] h-2.5 bg-white rounded-full transition-all"></span>
            </div>
        </button>
    </div>

    <!-- Bottom-Left Quick Gift Box Button -->
    <div class="fixed bottom-4 left-4 z-40 flex items-center gap-2">
        <button onclick="toggleGiftModal(true)" title="Mở Hộp Quà Mừng (QR)" class="w-11 h-11 rounded-full bg-boho-700 border-2 border-white text-white shadow-lg flex items-center justify-center cursor-pointer hover:scale-105 transition">
            <i class="fa-solid fa-gift text-base"></i>
        </button>
        <span id="music-status-pill" class="hidden sm:inline-block px-3 py-1 rounded-full bg-white/90 border border-boho-300 text-[11px] text-boho-800 font-medium shadow-sm backdrop-blur-sm">
            Nhạc nền: Tắt
        </span>
    </div>

    <!-- ================================================================= -->
    <!-- 4. MODALS (HỘP QUÀ MỪNG QR, LIGHTBOX DIALOG, GUEST NAME)          -->
    <!-- ================================================================= -->

    <!-- Hộp Quà Mừng Modal (Exact Demo Bank Accounts: {{ $weddingCard->groom_bank_name ?: 'Vietcombank' }} & {{ $weddingCard->bride_bank_name ?: 'BIDV' }}) -->
    <div id="gift-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-boho-950/75 backdrop-blur-sm p-4">
        <div class="bg-cream-50 text-boho-950 rounded-3xl max-w-md w-full p-6 border border-boho-300 shadow-2xl relative">
            <button onclick="toggleGiftModal(false)" class="absolute top-3.5 right-3.5 w-8 h-8 rounded-full bg-boho-100 text-boho-800 hover:bg-boho-200 flex items-center justify-center cursor-pointer">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="text-center mb-5">
                <h3 class="font-pattaya text-3xl text-boho-800">Hộp Quà Mừng</h3>
                <p class="text-xs text-boho-600 mt-1">Quét mã QR hoặc sao chép số tài khoản ngân hàng</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Chú Rể -->
                <div class="bg-white rounded-2xl p-3.5 border border-boho-200 text-center shadow-sm">
                    <span class="text-[10px] uppercase tracking-wider font-bold px-2.5 py-0.5 rounded-full bg-boho-100 text-boho-800">
                        Chú Rể - {{ $weddingCard->groom_name }}
                    </span>
                    <img 
                        src="{{ $weddingCard->groom_qr_url }}" 
                        alt="QR Chú Rể" 
                        class="w-32 h-32 mx-auto my-2.5 rounded-xl border border-boho-200 p-1 object-contain"
                    >
                    <p class="text-xs font-bold text-boho-900">Ngân hàng: {{ $weddingCard->groom_bank_name ?: 'Vietcombank' }}</p>
                    <p class="text-xs text-boho-700 font-medium mt-0.5">Tên TK: {{ $weddingCard->groom_bank_owner ?: $weddingCard->groom_name }}</p>
                    <p class="text-xs font-mono font-semibold text-boho-900 my-1">STK: {{ $weddingCard->groom_bank_account ?: ($weddingCard->groom_bank_number ?: '0000000000') }}</p>
                    <button onclick="copyText('{{ $weddingCard->groom_bank_account ?: $weddingCard->groom_bank_number }}', 'Đã sao chép STK Chú Rể ({{ $weddingCard->groom_bank_account ?: $weddingCard->groom_bank_number }})!')" class="mt-1 w-full py-1.5 rounded-lg bg-boho-800 hover:bg-boho-700 text-white text-[11px] font-medium cursor-pointer">
                        <i class="fa-regular fa-copy mr-1"></i> Sao chép STK
                    </button>
                </div>

                <!-- Cô Dâu -->
                <div class="bg-white rounded-2xl p-3.5 border border-boho-200 text-center shadow-sm">
                    <span class="text-[10px] uppercase tracking-wider font-bold px-2.5 py-0.5 rounded-full bg-boho-100 text-boho-800">
                        Cô Dâu - {{ $weddingCard->bride_name }}
                    </span>
                    <img 
                        src="{{ $weddingCard->bride_qr_url }}" 
                        alt="QR Cô Dâu" 
                        class="w-32 h-32 mx-auto my-2.5 rounded-xl border border-boho-200 p-1 object-contain"
                    >
                    <p class="text-xs font-bold text-boho-900">Ngân hàng: {{ $weddingCard->bride_bank_name ?: 'BIDV' }}</p>
                    <p class="text-xs text-boho-700 font-medium mt-0.5">Tên TK: {{ $weddingCard->bride_bank_owner ?: $weddingCard->bride_name }}</p>
                    <p class="text-xs font-mono font-semibold text-boho-900 my-1">STK: {{ $weddingCard->bride_bank_account ?: ($weddingCard->bride_bank_number ?: '6665558888') }}</p>
                    <button onclick="copyText('{{ $weddingCard->bride_bank_account ?: $weddingCard->bride_bank_number }}', 'Đã sao chép STK Cô Dâu ({{ $weddingCard->bride_bank_account ?: $weddingCard->bride_bank_number }})!')" class="mt-1 w-full py-1.5 rounded-lg bg-boho-800 hover:bg-boho-700 text-white text-[11px] font-medium cursor-pointer">
                        <i class="fa-regular fa-copy mr-1"></i> Sao chép STK
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Guest Name Customizer Modal -->
    <div id="guest-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-boho-950/75 backdrop-blur-sm p-4">
        <div class="bg-cream-50 text-boho-950 rounded-3xl max-w-sm w-full p-6 border border-boho-300 shadow-2xl">
            <h4 class="font-serif text-2xl font-bold text-boho-900">Tùy chỉnh Tên Khách Mời</h4>
            <p class="text-xs text-boho-600 mt-1 mb-4">Tên khách mời hiển thị ở mục "Thân Mời" ngoài bìa thiệp.</p>
            <input type="text" id="custom-guest-input" placeholder="VD: Anh Tuấn & Chị Ngọc" class="w-full px-3.5 py-2.5 rounded-xl border border-boho-300 bg-white text-sm mb-4 focus:outline-none">
            <div class="flex justify-end gap-2">
                <button onclick="closeGuestModal()" class="px-4 py-2 rounded-xl border border-boho-400 text-boho-800 text-xs font-medium cursor-pointer">Hủy</button>
                <button onclick="applyGuestName()" class="px-4 py-2 rounded-xl bg-boho-800 text-white text-xs font-medium cursor-pointer">Cập nhật</button>
            </div>
        </div>
    </div>

    <!-- Fullscreen Lightbox Dialog -->
    <div id="lightbox-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-4">
        <div id="lightbox-counter" class="absolute top-5 left-5 px-3.5 py-1 rounded-full bg-white/15 text-white text-xs font-medium tracking-widest">
            1 / 8
        </div>
        <button onclick="closeLightbox()" class="absolute top-4 right-4 w-10 h-10 rounded-full bg-white/15 text-white hover:bg-white/30 flex items-center justify-center cursor-pointer">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>
        <button id="lightbox-prev" onclick="stepLightbox(-1)" class="absolute left-3 sm:left-6 w-10 h-10 rounded-full bg-white/15 text-white hover:bg-white/30 flex items-center justify-center cursor-pointer">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <img id="lightbox-img" src="" alt="Preview" class="max-h-[85vh] max-w-[90vw] rounded-2xl border-2 border-boho-300 object-contain shadow-2xl">
        <button id="lightbox-next" onclick="stepLightbox(1)" class="absolute right-3 sm:right-6 w-10 h-10 rounded-full bg-white/15 text-white hover:bg-white/30 flex items-center justify-center cursor-pointer">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toast-box" class="fixed top-5 left-1/2 -translate-x-1/2 z-[120] pointer-events-none opacity-0 transition-all duration-300 transform -translate-y-3">
        <div class="px-5 py-2.5 rounded-full bg-boho-900 border border-sand-400 text-white text-xs sm:text-sm shadow-2xl flex items-center gap-2">
            <span class="text-sand-300">❦</span>
            <span id="toast-text">Thông báo</span>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- 5. JAVASCRIPT LOGIC & INTERACTIVE EFFECTS                         -->
    <!-- ================================================================= -->
    <script>
        /* ---------------------------------------------------------------
         * A. 12 FLOATING BOTANICAL ELEMENTS IN BACKGROUND
         * --------------------------------------------------------------- */
        function initFloatingBohoLayer() {
            const container = document.getElementById('floating-boho-container');
            const symbols = ['❦', '✿', '❀', '❁'];
            const count = 12; // Exact 12 floating elements as on ChungĐôi demo
            for (let i = 0; i < count; i++) {
                const div = document.createElement('div');
                div.className = 'floating-boho-petal';
                div.textContent = symbols[i % symbols.length];
                const sizeRem = (1.15 + (i % 4) * 0.5).toFixed(2);
                const leftPct = ((i * 8.3) + 4) % 94;
                const duration = 16 + (i % 5) * 4;
                const delay = -(i * 2.2);
                div.style.fontSize = `${sizeRem}rem`;
                div.style.left = `${leftPct}%`;
                div.style.animationDuration = `${duration}s`;
                div.style.animationDelay = `${delay}s`;
                container.appendChild(div);
            }
        }

        /* ---------------------------------------------------------------
         * B. FALLING BLOSSOMS & BOHO LEAVES CANVAS
         * --------------------------------------------------------------- */
        let effectsActive = true;

        function toggleFallingEffects() {
            effectsActive = !effectsActive;
            const canvas = document.getElementById('boho-canvas');
            const layer = document.getElementById('floating-boho-container');
            const btn = document.getElementById('btn-effect-toggle');
            if (effectsActive) {
                canvas.style.opacity = '1';
                layer.style.opacity = '1';
                btn.classList.remove('opacity-50');
                showToast('Đã bật hiệu ứng hoa lá rơi ✨');
            } else {
                canvas.style.opacity = '0';
                layer.style.opacity = '0';
                btn.classList.add('opacity-50');
                showToast('Đã tạm tắt hiệu ứng rơi');
            }
        }

        function dismissChatWidget(e) {
            e.stopPropagation();
            const widget = document.getElementById('floating-chat-widget');
            if (widget) widget.style.display = 'none';
        }

        function initBohoCanvas() {
            const canvas = document.getElementById('boho-canvas');
            const ctx = canvas.getContext('2d');
            let width = canvas.width = window.innerWidth;
            let height = canvas.height = window.innerHeight;

            window.addEventListener('resize', () => {
                width = canvas.width = window.innerWidth;
                height = canvas.height = window.innerHeight;
            });

            const petals = Array.from({ length: 24 }, () => ({
                x: Math.random() * width,
                y: Math.random() * height,
                r: 3 + Math.random() * 4.5,
                vy: 0.4 + Math.random() * 0.75,
                vx: -0.25 + Math.random() * 0.5,
                angle: Math.random() * Math.PI * 2,
                spin: 0.008 + Math.random() * 0.02,
                isLeaf: Math.random() > 0.4
            }));

            function draw() {
                ctx.clearRect(0, 0, width, height);
                for (const p of petals) {
                    p.y += p.vy;
                    p.x += p.vx + Math.sin(p.angle) * 0.3;
                    p.angle += p.spin;

                    if (p.y > height + 16) {
                        p.y = -12;
                        p.x = Math.random() * width;
                    }

                    ctx.save();
                    ctx.translate(p.x, p.y);
                    ctx.rotate(p.angle);
                    if (p.isLeaf) {
                        ctx.fillStyle = 'rgba(114, 150, 121, 0.32)';
                        ctx.beginPath();
                        ctx.ellipse(0, 0, p.r * 1.35, p.r * 0.72, 0, 0, Math.PI * 2);
                        ctx.fill();
                    } else {
                        ctx.fillStyle = 'rgba(193, 156, 93, 0.34)';
                        ctx.beginPath();
                        ctx.arc(0, 0, p.r * 0.48, 0, Math.PI * 2);
                        ctx.fill();
                    }
                    ctx.restore();
                }
                requestAnimationFrame(draw);
            }
            draw();
        }

        /* ---------------------------------------------------------------
         * C. ALBUM ẢNH CAROUSEL & LIGHTBOX
         * --------------------------------------------------------------- */
        @php
            $albumData = !empty($weddingCard->album) ? (is_string($weddingCard->album) ? json_decode($weddingCard->album, true) : $weddingCard->album) : [];
            $albumPhotosJson = json_encode(!empty($albumData) && is_array($albumData) ? array_values(array_map(function($img) {
                return str_starts_with($img, 'http') ? $img : asset('storage/' . $img);
            }, $albumData)) : []);
        @endphp
        const defaultPhotos = [
            'https://assets.chungdoi.com/photo-library/design/5019eadee002f02ce6f39d9c5bdb7304d4da683b4e109c41e7ed14e63391d9b0.webp',
            'https://assets.chungdoi.com/photo-library/design/1f83fb78c75b96a05661eca4cbc50dd771fc37411920623d6d9729eea1daa7c8.webp',
            'https://assets.chungdoi.com/photo-library/design/a4bacc8760315d26e8660bcd2943d479c968e7e92892d2e367cfab6facb63017.webp',
            'https://assets.chungdoi.com/photo-library/design/655375b2b2c6edb9772053c6a2150a6247ccf7002f69a1b733f682fa05d6309f.webp',
            'https://assets.chungdoi.com/photo-library/design/fb57414f47aa2c9189bc9fa20f34d557dd1a4cd13a908fd30633275ca5abaf6d.webp',
            'https://assets.chungdoi.com/photo-library/design/76763999ecb5db3569cea7991a2ea4fdf32e4a2639daeb28c6f2a9b5fdf6f313.webp',
            'https://assets.chungdoi.com/photo-library/design/da4ca736067f9572362cd90a28e95274e985ffa76cc58e3c36b23219ebf4f6f7.webp',
            'https://assets.chungdoi.com/photo-library/design/107e38d720d04da6442122cbe91d47eda6ebc8c962579a14b345ba3ad6dd49a4.webp'
        ];
        const dbAlbumPhotos = {!! $albumPhotosJson ?: '[]' !!};
        const albumPhotos = (Array.isArray(dbAlbumPhotos) && dbAlbumPhotos.length > 0) ? dbAlbumPhotos : defaultPhotos;
        let currentSlideIndex = 0;

        function renderThumbnails() {
            const thumbStrip = document.getElementById('carousel-thumbs');
            thumbStrip.innerHTML = albumPhotos.map((url, idx) => `
                <button 
                    type="button"
                    onclick="selectSlide(${idx})" 
                    class="aspect-square rounded-xl overflow-hidden border-2 transition cursor-pointer ${idx === currentSlideIndex ? 'border-boho-700 scale-105 shadow-md' : 'border-transparent opacity-65 hover:opacity-100'}"
                >
                    <img src="${url}" alt="Thumb ${idx + 1}" class="w-full h-full object-cover">
                </button>
            `).join('');
        }

        function selectSlide(idx) {
            currentSlideIndex = (idx + albumPhotos.length) % albumPhotos.length;
            const mainImg = document.getElementById('carousel-main-img');
            const counter = document.getElementById('carousel-counter');
            mainImg.src = albumPhotos[currentSlideIndex];
            counter.textContent = `${currentSlideIndex + 1} / ${albumPhotos.length}`;
            renderThumbnails();
        }

        function stepCarousel(dir) {
            selectSlide(currentSlideIndex + dir);
        }

        function openLightbox(idx) {
            currentSlideIndex = idx;
            const modal = document.getElementById('lightbox-modal');
            const img = document.getElementById('lightbox-img');
            const counter = document.getElementById('lightbox-counter');
            document.getElementById('lightbox-prev').style.display = 'flex';
            document.getElementById('lightbox-next').style.display = 'flex';
            counter.style.display = 'block';
            img.src = albumPhotos[currentSlideIndex];
            counter.textContent = `${currentSlideIndex + 1} / ${albumPhotos.length}`;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function openLightboxCustom(url) {
            const modal = document.getElementById('lightbox-modal');
            const img = document.getElementById('lightbox-img');
            document.getElementById('lightbox-prev').style.display = 'none';
            document.getElementById('lightbox-next').style.display = 'none';
            document.getElementById('lightbox-counter').style.display = 'none';
            img.src = url;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeLightbox() {
            const modal = document.getElementById('lightbox-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function stepLightbox(dir) {
            currentSlideIndex = (currentSlideIndex + dir + albumPhotos.length) % albumPhotos.length;
            document.getElementById('lightbox-img').src = albumPhotos[currentSlideIndex];
            document.getElementById('lightbox-counter').textContent = `${currentSlideIndex + 1} / ${albumPhotos.length}`;
            selectSlide(currentSlideIndex);
        }

        /* ---------------------------------------------------------------
         * D. SỔ LƯU BÚT (DỮ LIỆU TỪ DATABASE)
         * --------------------------------------------------------------- */
        @php
            $cardWishes24 = $weddingCard->wishes()->approved()->latest()->take(10)->get()->map(function($w) {
                return [
                    'name' => $w->sender_name,
                    'time' => $w->created_at ? $w->created_at->diffForHumans() : 'Vừa xong',
                    'message' => $w->message,
                ];
            });
        @endphp
        const wishesList = @json($cardWishes24);

        function escapeHtml(str) {
            return String(str).replace(/[&<>"']/g, s => ({
                '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
            }[s]));
        }

        function renderWishes() {
            const container = document.getElementById('wishes-container');
            if (!wishesList || wishesList.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-4 text-xs text-boho-600 italic">
                        Hãy là người đầu tiên gửi lời chúc mừng hạnh phúc đến cô dâu &amp; chú rể!
                    </div>
                `;
                return;
            }
            container.innerHTML = wishesList.map(item => `
                <div class="bg-boho-50/75 rounded-2xl p-3.5 border border-boho-200 shadow-sm">
                    <div class="flex items-center justify-between gap-2">
                        <span class="font-bold text-boho-900 text-xs sm:text-sm">${escapeHtml(item.name)}</span>
                        <span class="text-[10px] text-boho-500">${escapeHtml(item.time)}</span>
                    </div>
                    <p class="text-xs sm:text-sm text-boho-800 mt-1.5 leading-relaxed">${escapeHtml(item.message)}</p>
                </div>
            `).join('');
        }

        function submitWish(e) {
            e.preventDefault();
            const nameInput = document.getElementById('wish-name');
            const msgInput = document.getElementById('wish-message');
            const name = nameInput.value.trim();
            const message = msgInput.value.trim();
            if (!name || !message) return;

            const now = new Date();
            const timeStr = `${now.getHours()}:${String(now.getMinutes()).padStart(2, '0')}:${String(now.getSeconds()).padStart(2, '0')} ${now.getDate()}/${now.getMonth() + 1}/${now.getFullYear()}`;

            wishesList.unshift({
                name,
                time: timeStr,
                message
            });

            renderWishes();
            document.getElementById('wish-form').reset();
            showToast('Cảm ơn bạn đã gửi lời chúc đến {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}! ❦');
        }

        /* ---------------------------------------------------------------
         * E. COUNTDOWN TIMER TO 24 MAY 2026 18:00
         * --------------------------------------------------------------- */
        function initCountdown() {
            const weddingDateStr = '{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format("Y-m-d") : "2026-05-24" }}';
            const weddingTimeStr = '{{ !empty($weddingCard->wedding_time) && preg_match("/^\d{1,2}:\d{2}$/", trim($weddingCard->wedding_time)) ? trim($weddingCard->wedding_time) . ":00" : "18:00:00" }}';
            const targetTime = new Date(`${weddingDateStr}T${weddingTimeStr}+07:00`).getTime();

            function tick() {
                const now = Date.now();
                let diff = targetTime - now;

                if (diff < 0) {
                    diff = Math.abs(diff);
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

            tick();
            setInterval(tick, 1000);
        }

        /* ---------------------------------------------------------------
         * F. BACKGROUND WEDDING MUSIC & COVER GATE OPENING
         * --------------------------------------------------------------- */
        let audioCtx = null;
        let isMusicPlaying = false;
        let melodyInterval = null;

        const bohoMelody = [
            523.25, 659.25, 783.99, 987.77, 880.00, 783.99, 659.25, 587.33,
            523.25, 587.33, 659.25, 783.99, 880.00, 783.99, 659.25, 523.25
        ];
        let noteIdx = 0;

        function playSoftNote(freq) {
            if (!audioCtx || !isMusicPlaying) return;
            const now = audioCtx.currentTime;
            const osc = audioCtx.createOscillator();
            const gain = audioCtx.createGain();
            osc.type = 'triangle';
            osc.frequency.setValueAtTime(freq, now);

            gain.gain.setValueAtTime(0.001, now);
            gain.gain.exponentialRampToValueAtTime(0.05, now + 0.05);
            gain.gain.exponentialRampToValueAtTime(0.0008, now + 1.45);

            osc.connect(gain);
            gain.connect(audioCtx.destination);
            osc.start(now);
            osc.stop(now + 1.5);
        }

        function startMusic() {
            try {
                if (!audioCtx) {
                    audioCtx = new (window.AudioContext || window.webkitAudioContext)();
                }
                if (audioCtx.state === 'suspended') {
                    audioCtx.resume();
                }
                isMusicPlaying = true;
                updateMusicUI();

                if (melodyInterval) clearInterval(melodyInterval);
                playSoftNote(bohoMelody[noteIdx % bohoMelody.length]);
                melodyInterval = setInterval(() => {
                    if (!isMusicPlaying) return;
                    noteIdx = (noteIdx + 1) % bohoMelody.length;
                    playSoftNote(bohoMelody[noteIdx]);
                }, 660);
            } catch (e) {
                console.warn('Web Audio API blocked or unsupported', e);
            }
        }

        function stopMusic() {
            isMusicPlaying = false;
            if (melodyInterval) clearInterval(melodyInterval);
            updateMusicUI();
        }

        function toggleMusic() {
            if (isMusicPlaying) {
                stopMusic();
                showToast('Đã tạm dừng nhạc nền');
            } else {
                startMusic();
                showToast('Đang phát nhạc nền lễ cưới ♪');
            }
        }

        function updateMusicUI() {
            const eq = document.getElementById('music-eq-bars');
            const pill = document.getElementById('music-status-pill');
            if (isMusicPlaying) {
                if (eq) eq.classList.add('eq-bars-playing');
                if (pill) pill.textContent = 'Nhạc nền: Đang phát ♪';
            } else {
                if (eq) eq.classList.remove('eq-bars-playing');
                if (pill) pill.textContent = 'Nhạc nền: Tắt';
            }
        }

        function openInvitation(e) {
            if (e) e.preventDefault();
            const gate = document.getElementById('invitation-gate');
            gate.classList.add('gate-opened');
            if (!isMusicPlaying) {
                startMusic();
            }
            setTimeout(() => {
                triggerScrollReveal();
            }, 350);
        }

        function reopenCoverGate() {
            const gate = document.getElementById('invitation-gate');
            gate.classList.remove('gate-opened');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        /* ---------------------------------------------------------------
         * G. MODALS, CLIPBOARD & SCROLL REVEAL
         * --------------------------------------------------------------- */
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

        function openGuestModal() {
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
                showToast(`Đã cập nhật tên khách mời: ${val}`);
            }
            closeGuestModal();
        }

        function copyText(text, msg) {
            const ta = document.createElement('textarea');
            ta.value = text;
            document.body.appendChild(ta);
            ta.select();
            document.execCommand('copy');
            document.body.removeChild(ta);
            showToast(msg);
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
         * H. INITIALIZE ON WINDOW LOAD
         * --------------------------------------------------------------- */
        window.onload = function () {
            const params = new URLSearchParams(window.location.search);
            const guestParam = params.get('khach') || params.get('guest');
            if (guestParam) {
                document.getElementById('cover-guest-name').textContent = guestParam;
            }

            if (params.get('open') === '1') {
                document.getElementById('invitation-gate').classList.add('gate-opened');
            }

            initFloatingBohoLayer();
            initBohoCanvas();
            renderThumbnails();
            renderWishes();
            initCountdown();
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