<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $weddingCard->couple_name }} - Thiệp Cưới Online</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Vietnamese + Korean Serif & Script -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,400;1,600&family=Gowun+Batang:wght@400;700&family=Noto+Serif+KR:wght@400;600;700&family=Pattaya&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        imperial: {
                            950: '#071829',
                            900: '#0b253c',
                            800: '#12395b',
                            700: '#1a4d78',
                            600: '#246496',
                            500: '#397fb5',
                            200: '#bfd9ed',
                            100: '#e2eff8',
                            50: '#f3f8fc',
                        },
                        gold: {
                            100: '#fdf8e6',
                            200: '#f7e29c',
                            300: '#ebd074',
                            400: '#d4af37',
                            500: '#b88928',
                            600: '#8f6618',
                        },
                        ivory: {
                            50: '#fdfcf9',
                            100: '#fcfaf5',
                            200: '#f5efe2',
                            300: '#e8dec8',
                        }
                    },
                    fontFamily: {
                        pattaya: ['"Pattaya"', 'cursive'],
                        serif: ['"Cormorant Garamond"', '"Gowun Batang"', 'Georgia', 'serif'],
                        kr: ['"Gowun Batang"', '"Noto Serif KR"', 'serif'],
                        sans: ['"Plus Jakarta Sans"', '"Gowun Batang"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --royal-950: #071829;
            --royal-900: #0b253c;
            --royal-800: #12395b;
            --royal-700: #1a4d78;
            --gold-light: #f7e29c;
            --gold-main: #d4af37;
            --gold-dark: #9e731c;
            --ivory-bg: #fcfaf5;
        }

        body {
            background-color: #061524;
            color: var(--royal-900);
            font-family: 'Plus Jakarta Sans', 'Gowun Batang', sans-serif;
            overflow-x: hidden;
            -webkit-tap-highlight-color: transparent;
        }

        /* Imperial Silk & Oriental Brocade Background */
        .royal-blue-brocade {
            background: radial-gradient(circle at 50% 18%, #1d527f 0%, #0f3150 52%, #07192b 100%);
        }

        .ivory-silk-paper {
            background-color: var(--ivory-bg);
            background-image:
                radial-gradient(circle at 15% 15%, rgba(212, 175, 55, 0.08) 0%, transparent 45%),
                radial-gradient(circle at 85% 80%, rgba(18, 57, 91, 0.06) 0%, transparent 50%);
        }

        /* Metallic Gold Text Gradient */
        .text-gold-metallic {
            background: linear-gradient(135deg, #fff6d6 0%, #ebd074 35%, #d4af37 65%, #fff2b2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Double Imperial Gold Frame */
        .imperial-gold-frame {
            border: 1.5px solid rgba(212, 175, 55, 0.65);
            box-shadow: inset 0 0 0 5px transparent, inset 0 0 0 6px rgba(212, 175, 55, 0.28);
        }

        .imperial-card-frame {
            border: 1.5px solid rgba(212, 175, 55, 0.55);
            box-shadow: 0 16px 40px rgba(7, 24, 41, 0.14), inset 0 0 0 4px #fcfaf5, inset 0 0 0 5px rgba(18, 57, 91, 0.18);
        }

        /* =========================================================
         * 12 FLOATING 囍 (SONG HỶ) CHARACTERS LAYER (EXACT DEMO DOM)
         * ========================================================= */
        .floating-hy-layer {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 35;
            overflow: hidden;
            transition: opacity 0.4s ease;
        }
        .floating-hy-layer.effects-off {
            opacity: 0;
        }
        .floating-hy-item {
            position: absolute;
            top: -10%;
            color: rgba(212, 175, 55, 0.42);
            text-shadow: 0 2px 8px rgba(7, 24, 41, 0.35);
            font-family: serif;
            user-select: none;
            animation: fallSongHy linear infinite;
        }
        @keyframes fallSongHy {
            0% {
                transform: translate3d(0, -8vh, 0) rotate(0deg) scale(0.9);
                opacity: 0;
            }
            12% {
                opacity: 0.75;
            }
            50% {
                transform: translate3d(18px, 50vh, 0) rotate(15deg) scale(1.05);
            }
            88% {
                opacity: 0.65;
            }
            100% {
                transform: translate3d(-14px, 108vh, 0) rotate(-15deg) scale(0.92);
                opacity: 0;
            }
        }

        /* =========================================================
         * TWIN DRAGONS, CLOUDS & WAVES KEYFRAME ANIMATIONS
         * ========================================================= */
        @keyframes dragonHoverLeft {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-7px) rotate(1.8deg); }
        }
        @keyframes dragonHoverRight {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-7px) rotate(-1.8deg); }
        }
        @keyframes emblemPulseGlow {
            0%, 100% {
                transform: scale(1);
                filter: drop-shadow(0 0 12px rgba(247, 226, 156, 0.45));
            }
            50% {
                transform: scale(1.06);
                filter: drop-shadow(0 0 22px rgba(247, 226, 156, 0.8));
            }
        }
        @keyframes cloudDriftHorizontal {
            0%, 100% { transform: translateX(0px); }
            50% { transform: translateX(12px); }
        }
        @keyframes cloudDriftReverse {
            0%, 100% { transform: translateX(0px); }
            50% { transform: translateX(-12px); }
        }
        @keyframes waveSway {
            0%, 100% { transform: translateY(0px) scaleX(1); }
            50% { transform: translateY(3px) scaleX(1.02); }
        }

        .anim-dragon-left {
            animation: dragonHoverLeft 5.2s ease-in-out infinite;
        }
        .anim-dragon-right {
            animation: dragonHoverRight 5.2s ease-in-out infinite;
        }
        .anim-emblem-glow {
            animation: emblemPulseGlow 4s ease-in-out infinite;
        }
        .anim-cloud-right {
            animation: cloudDriftHorizontal 6.5s ease-in-out infinite;
        }
        .anim-cloud-left {
            animation: cloudDriftReverse 7s ease-in-out infinite;
        }
        .anim-wave-bottom {
            animation: waveSway 5.5s ease-in-out infinite;
        }

        /* =========================================================
         * 3D SPLIT-GATE COVER SCREEN (MÀN HÌNH MỞ THIỆP SONG LONG)
         * ========================================================= */
        #invitation-gate {
            position: fixed;
            inset: 0;
            z-index: 100;
            perspective: 1600px;
            transition: visibility 1.25s ease, opacity 1.15s ease;
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
            width: 50.2%;
            background: radial-gradient(circle at center, #16446b 0%, #0b253c 70%, #061524 100%);
            transition: transform 1.3s cubic-bezier(0.68, 0, 0.15, 1);
            z-index: 10;
            overflow: hidden;
        }
        .gate-door-left {
            left: 0;
            border-right: 1.5px solid rgba(212, 175, 55, 0.55);
            transform-origin: left center;
        }
        .gate-door-right {
            right: 0;
            border-left: 1.5px solid rgba(212, 175, 55, 0.55);
            transform-origin: right center;
        }
        #invitation-gate.gate-opened .gate-door-left {
            transform: translateX(-103%) rotateY(-14deg);
        }
        #invitation-gate.gate-opened .gate-door-right {
            transform: translateX(103%) rotateY(14deg);
        }
        .gate-center-stage {
            transition: transform 0.85s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.65s ease;
        }
        #invitation-gate.gate-opened .gate-center-stage {
            transform: scale(1.08) translateY(-12px);
            opacity: 0;
        }

        /* Exact ChungĐôi Ornamental Divider: <div><div></div><span>❦</span><div></div></div> */
        .ornament-divider-gold {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            width: 100%;
            max-width: 250px;
            margin: 0 auto;
        }
        .ornament-divider-gold div {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, #f7e29c, transparent);
        }
        .ornament-divider-gold span {
            color: #f7e29c;
            font-size: 1.25rem;
            line-height: 1;
        }

        .ornament-divider-blue {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 14px;
            width: 100%;
            max-width: 240px;
            margin: 0 auto;
        }
        .ornament-divider-blue div {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, #12395b, transparent);
        }
        .ornament-divider-blue span {
            color: #d4af37;
            font-size: 1.25rem;
            line-height: 1;
        }

        /* Imperial Gold Open Button ("Mở thiệp / 열기") */
        .btn-imperial-gold {
            background: linear-gradient(135deg, #f7e29c 0%, #d4af37 50%, #b38728 100%);
            color: #071829;
            box-shadow: 0 10px 28px rgba(212, 175, 55, 0.45), inset 0 1px 2px rgba(255, 255, 255, 0.8);
            position: relative;
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .btn-imperial-gold:hover {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 14px 34px rgba(212, 175, 55, 0.65);
        }
        .btn-imperial-gold::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 45%;
            height: 200%;
            background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.65) 50%, rgba(255,255,255,0) 100%);
            transform: rotate(25deg);
            animation: shimmerGold 3.2s infinite;
        }
        @keyframes shimmerGold {
            0% { left: -60%; }
            45%, 100% { left: 140%; }
        }

        .btn-imperial-blue {
            background: linear-gradient(135deg, #1a4d78 0%, #12395b 55%, #0b253c 100%);
            color: #f7e29c;
            border: 1px solid rgba(212, 175, 55, 0.55);
            box-shadow: 0 8px 22px rgba(11, 37, 60, 0.3);
            transition: all 0.3s ease;
        }
        .btn-imperial-blue:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(11, 37, 60, 0.45);
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

        /* Heartbeat Pulse for Wedding Day 18 on Calendar */
        @keyframes pulseHeartDay {
            0%, 100% { transform: scale(1); }
            35% { transform: scale(1.15); }
            65% { transform: scale(0.95); }
        }
        .animate-pulse-day {
            animation: pulseHeartDay 1.9s infinite ease-in-out;
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

        /* Bilingual Visibility Modes */
        body.lang-mode-vi [lang="ko"] {
            display: none !important;
        }
        body.lang-mode-ko [lang="vi"] {
            display: none !important;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #0b253c;
        }
        ::-webkit-scrollbar-thumb {
            background: #d4af37;
            border-radius: 3px;
        }
    </style>
</head>
<body class="min-h-screen selection:bg-gold-400 selection:text-imperial-950">
    @php
        $cal = $weddingCard->calendar_matrix;
        $dayOfWeekVi = $weddingCard->wedding_date ? $weddingCard->wedding_date->locale('vi')->dayName : 'Thứ Bảy';
        $dayOfWeekKo = [
            'Thứ Hai' => '월요일', 'Thứ Ba' => '화요일', 'Thứ Tư' => '수요일',
            'Thứ Năm' => '목요일', 'Thứ Sáu' => '금요일', 'Thứ Bảy' => '토요일', 'Chủ Nhật' => '일요일'
        ][$dayOfWeekVi] ?? '토요일';
        $wDate = $weddingCard->wedding_date;
        $dayNum = $wDate ? $wDate->format('d') : '18';
        $monthNum = $wDate ? $wDate->format('m') : '04';
        $yearNum = $wDate ? $wDate->format('Y') : '2026';
        $timeStr = !empty($weddingCard->wedding_time) ? trim($weddingCard->wedding_time) : '18:00';
        $timeStrShort = preg_match('/^\d{1,2}:\d{2}/', $timeStr, $m) ? $m[0] : '18:00';

        $timelineEvents = is_array($weddingCard->timeline) ? $weddingCard->timeline : (is_string($weddingCard->timeline) ? json_decode($weddingCard->timeline, true) : null);
        if (empty($timelineEvents)) {
            $timelineEvents = [
                ['time' => '17:30', 'title' => 'Đón khách & Chụp ảnh', 'desc' => '하객 맞이 및 포토타임'],
                ['time' => '18:00', 'title' => 'Khai tiệc', 'desc' => '예식 시작'],
                ['time' => '18:30', 'title' => 'Rót rượu, cắt bánh', 'desc' => '샴페인 및 케이크 커팅'],
                ['time' => '19:00', 'title' => 'Phục vụ món chính', 'desc' => '피로연 만찬'],
                ['time' => '21:00', 'title' => 'Kết thúc tiệc', 'desc' => '폐식 및 환송'],
            ];
        }

        $dressCodes = is_array($weddingCard->dress_code) ? $weddingCard->dress_code : (is_string($weddingCard->dress_code) ? json_decode($weddingCard->dress_code, true) : null);
        if (empty($dressCodes)) {
            $dressCodes = [
                ['color' => '#12395b', 'label' => 'Xanh Lam'],
                ['color' => '#d4af37', 'label' => 'Vàng Kim'],
                ['color' => '#fcfaf5', 'label' => 'Kem Ngà'],
                ['color' => '#8c1518', 'label' => 'Đỏ Hỷ'],
            ];
        }

        $albumData = !empty($weddingCard->album) ? (is_string($weddingCard->album) ? json_decode($weddingCard->album, true) : $weddingCard->album) : [];
        $albumPhotosJson = json_encode(!empty($albumData) && is_array($albumData) ? array_values(array_map(function($img) {
            return str_starts_with($img, 'http') ? $img : asset('storage/' . $img);
        }, $albumData)) : []);

        $leadEmpty = ($cal['start_day_of_week'] == 0) ? 6 : ($cal['start_day_of_week'] - 1);
        $groomStk = $weddingCard->groom_bank_account ?: ($weddingCard->groom_bank_number ?: '0000000000');
        $brideStk = $weddingCard->bride_bank_account ?: ($weddingCard->bride_bank_number ?: '6665558888');
        $groomBankName = $weddingCard->groom_bank_name ?: 'Vietcombank';
        $brideBankName = $weddingCard->bride_bank_name ?: 'BIDV';
        $groomOwner = $weddingCard->groom_bank_owner ?: $weddingCard->groom_name;
        $brideOwner = $weddingCard->bride_bank_owner ?: $weddingCard->bride_name;

        $groomQrUrl = $weddingCard->groom_qr_url;
        $brideQrUrl = $weddingCard->bride_qr_url;
    @endphp

    <!-- Golden Shimmer Sparkles Canvas -->
    <canvas id="gold-sparkles-canvas" class="fixed inset-0 pointer-events-none z-20"></canvas>

    <!-- 12 Floating 囍 (Song Hỷ) Characters Layer (Exact ChungĐôi DOM structure: <div>囍</div> x 12) -->
    <div class="floating-hy-layer" id="floating-hy-container" aria-hidden="true"></div>

    <!-- ================================================================= -->
    <!-- 1. 3D SPLIT-GATE COVER SCREEN (MÀN HÌNH MỞ THIỆP SONG LONG XANH)  -->
    <!-- ================================================================= -->
    <div id="invitation-gate" class="flex items-center justify-center p-3 sm:p-5">
        <!-- Left & Right Royal Blue Curtain Doors -->
        <div class="gate-door-left">
            <div class="h-full w-full opacity-15 flex items-center justify-end pr-4 select-none">
                <img src="https://chungdoi.com/images/themes/songlong-red/dragon_left.webp" alt="" class="w-48 h-auto object-contain" onerror="this.style.display='none'">
            </div>
        </div>
        <div class="gate-door-right">
            <div class="h-full w-full opacity-15 flex items-center justify-start pl-4 select-none">
                <img src="https://chungdoi.com/images/themes/songlong-red/dragon_right.webp" alt="" class="w-48 h-auto object-contain" onerror="this.style.display='none'">
            </div>
        </div>

        <!-- Center Cover Card (Exact ChungĐôi Song Long Xanh DOM & Assets) -->
        <div class="gate-center-stage relative z-20 w-full max-w-[440px] royal-blue-brocade rounded-[28px] pt-7 pb-10 px-5 sm:px-8 text-center imperial-gold-frame shadow-[0_25px_80px_rgba(0,0,0,0.85)] overflow-hidden">

            <!-- Top Twin Dragons & Central 囍 Emblem (Exact Demo Artwork Structure) -->
            <div class="relative h-44 sm:h-48 w-full flex items-center justify-center mb-2 select-none pointer-events-none">
                <!-- Left Dragon (dragon_left.webp) -->
                <img 
                    src="https://chungdoi.com/images/themes/songlong-red/dragon_left.webp" 
                    alt="dragon-left" 
                    class="anim-dragon-left absolute -left-3 sm:left-0 top-1 w-36 sm:w-40 h-auto object-contain drop-shadow-[0_6px_14px_rgba(0,0,0,0.5)]"
                    onerror="this.style.display='none'"
                >
                <!-- Right Dragon (dragon_right.webp) -->
                <img 
                    src="https://chungdoi.com/images/themes/songlong-red/dragon_right.webp" 
                    alt="dragon-right" 
                    class="anim-dragon-right absolute -right-3 sm:right-0 top-1 w-36 sm:w-40 h-auto object-contain drop-shadow-[0_6px_14px_rgba(0,0,0,0.5)]"
                    onerror="this.style.display='none'"
                >
                <!-- Center Song Hỷ Medallion (chinese_happiness.webp) -->
                <img 
                    src="https://chungdoi.com/images/themes/songlong-red/chinese_happiness.webp" 
                    alt="chinese-happiness" 
                    class="anim-emblem-glow relative z-10 w-24 sm:w-28 h-auto object-contain"
                    onerror="this.outerHTML='<div class=\'w-24 h-24 rounded-full bg-gold-400 text-imperial-950 flex items-center justify-center text-5xl font-serif shadow-xl\'>囍</div>'"
                >
                <!-- Auspicious Drifting Clouds (cloud_small.webp & cloud_big.webp) -->
                <img 
                    src="https://chungdoi.com/images/themes/songlong-red/cloud_small.webp" 
                    alt="cloud-small" 
                    class="anim-cloud-right absolute left-4 bottom-2 w-16 sm:w-20 opacity-90 object-contain"
                    onerror="this.style.display='none'"
                >
                <img 
                    src="https://chungdoi.com/images/themes/songlong-red/cloud_big.webp" 
                    alt="cloud-big" 
                    class="anim-cloud-left absolute right-2 bottom-0 w-20 sm:w-24 opacity-90 object-contain"
                    onerror="this.style.display='none'"
                >
                <img 
                    src="https://chungdoi.com/images/themes/songlong-red/cloud_small.webp" 
                    alt="cloud-small" 
                    class="anim-cloud-left absolute left-10 top-0 w-14 opacity-70 object-contain"
                    onerror="this.style.display='none'"
                >
            </div>

            <!-- Couple Names: <h1><span>{{ $weddingCard->groom_name }}</span><span>&</span><span>{{ $weddingCard->bride_name }}</span></h1> -->
            <h1 class="relative z-10 my-1 flex flex-col items-center justify-center space-y-1">
                <span class="font-pattaya text-4xl sm:text-5xl text-gold-metallic py-0.5 drop-shadow">{{ $weddingCard->groom_name }}</span>
                <span class="font-serif italic text-2xl text-gold-300 my-0.5">&amp;</span>
                <span class="font-pattaya text-4xl sm:text-5xl text-gold-metallic py-0.5 drop-shadow">{{ $weddingCard->bride_name }}</span>
            </h1>

            <!-- Exact Ornamental Divider: <div><div></div><span>❦</span><div></div></div> -->
            <div class="ornament-divider-gold my-4 relative z-10">
                <div></div>
                <span>❦</span>
                <div></div>
            </div>

            <!-- Bilingual Date on Cover: 18 tháng 4, 2026 / 2026년 4월 18일 -->
            <div class="relative z-10 mb-5 space-y-0.5">
                <p class="font-serif text-xl sm:text-2xl text-gold-200 font-semibold tracking-widest" dir="auto" lang="vi">
                    {{ $dayNum }} tháng {{ $monthNum }}, {{ $yearNum }}
                </p>
                <p class="font-kr text-sm sm:text-base text-gold-300/90 tracking-widest" dir="auto" lang="ko">
                    {{ $yearNum }}년 {{ (int)$monthNum }}월 {{ (int)$dayNum }}일
                </p>
            </div>

            <!-- Bilingual Guest Invitation Badge ("Thân Mời / 초대합니다") -->
            <div class="relative z-10 bg-imperial-950/65 border border-gold-400/50 rounded-2xl px-5 py-3 mb-6 max-w-xs mx-auto backdrop-blur-sm">
                <p class="text-xs uppercase tracking-[0.25em] text-gold-200 font-semibold" dir="auto" lang="vi">
                    Thân Mời
                </p>
                <p class="font-kr text-xs tracking-[0.2em] text-gold-300/85 mt-0.5" dir="auto" lang="ko">
                    초대합니다
                </p>
                <p id="cover-guest-name" class="font-serif text-lg sm:text-xl text-ivory-50 font-bold tracking-wide mt-1">
                    Quý Khách &amp; Gia Đình
                </p>
            </div>

            <!-- Bilingual Open Button: <a href="?open=1"><span>Mở thiệp</span><span>열기</span><div></div></a> -->
            <div class="relative z-10 mb-8">
                <a href="?open=1" id="btn-open-card" onclick="openInvitation(event)" rel="nofollow" class="btn-imperial-gold px-10 py-3.5 rounded-full font-bold text-sm tracking-[0.16em] uppercase inline-flex flex-col items-center justify-center cursor-pointer min-w-[190px]">
                    <span dir="auto" lang="vi" class="flex items-center gap-2">
                        <i class="fa-regular fa-envelope-open text-xs"></i>
                        <span>Mở thiệp</span>
                    </span>
                    <span dir="auto" lang="ko" class="font-kr text-xs font-semibold tracking-widest opacity-90 mt-0.5">
                        열기
                    </span>
                    <div></div>
                </a>
            </div>

            <!-- Bottom Oriental Waves Artwork (wave.webp) -->
            <div class="absolute inset-x-0 bottom-0 h-16 pointer-events-none select-none overflow-hidden flex items-end justify-between opacity-85">
                <img 
                    src="https://chungdoi.com/images/themes/songlong-red/wave.webp" 
                    alt="wave-left" 
                    class="anim-wave-bottom w-1/2 h-auto object-cover object-bottom"
                    onerror="this.style.display='none'"
                >
                <img 
                    src="https://chungdoi.com/images/themes/songlong-red/wave.webp" 
                    alt="wave-right" 
                    class="anim-wave-bottom w-1/2 h-auto object-cover object-bottom scale-x-[-1]"
                    onerror="this.style.display='none'"
                >
            </div>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- 2. MAIN WEDDING INVITATION CONTENT (?open=1 STATE)                -->
    <!-- ================================================================= -->
    <main id="main-invitation" class="relative z-10 max-w-[520px] mx-auto shadow-[0_0_95px_rgba(0,0,0,0.85)] ivory-silk-paper border-x border-gold-400/40 overflow-hidden">

        <!-- Sticky Top Bar: Bilingual Mode Switcher & Cover Gate Re-opener -->
        <div class="sticky top-0 z-30 bg-imperial-950/95 backdrop-blur-md border-b border-gold-400/35 px-3.5 py-2.5 flex items-center justify-between text-xs text-gold-200">
            <div class="flex items-center gap-2">
                <span class="text-gold-400 font-serif text-base">囍</span>
                <span class="font-medium">Song Long Xanh <span class="hidden sm:inline text-gold-300/75">• 쌍룡 청색</span></span>
            </div>
            <div class="flex items-center gap-2">
                <!-- Bilingual Mode Toggle -->
                <button onclick="cycleLanguageMode()" id="lang-mode-btn" class="px-2.5 py-1 rounded-full bg-imperial-800 border border-gold-400/50 text-[11px] text-gold-200 hover:bg-imperial-700 transition cursor-pointer">
                    🇻🇳 + 🇰🇷 Song ngữ
                </button>
                <button onclick="openGuestModal()" class="text-gold-300 hover:text-white underline text-[11px] cursor-pointer hidden sm:inline">
                    Đổi tên khách
                </button>
                <button onclick="reopenCoverGate()" class="px-2.5 py-1 rounded-full bg-gold-400/20 border border-gold-400/40 text-[11px] text-gold-200 hover:bg-gold-400/30 transition cursor-pointer">
                    Bìa thiệp
                </button>
            </div>
        </div>

        <!-- ============================================================= -->
        <!-- SECTION 1: ROYAL BLUE HERO BANNER (SONG LONG TRIỀU HỶ)        -->
        <!-- ============================================================= -->
        <section class="relative royal-blue-brocade text-ivory-50 pt-8 pb-16 px-5 text-center overflow-hidden border-b-2 border-gold-400/60">
            
            <!-- Twin Dragons + Central 囍 Medallion + Auspicious Clouds -->
            <div class="relative h-44 sm:h-48 w-full flex items-center justify-center mb-3 select-none pointer-events-none reveal-item">
                <img 
                    src="https://chungdoi.com/images/themes/songlong-red/dragon_left.webp" 
                    alt="dragon-left" 
                    class="anim-dragon-left absolute -left-2 sm:left-2 top-0 w-36 sm:w-44 h-auto object-contain"
                    onerror="this.style.display='none'"
                >
                <img 
                    src="https://chungdoi.com/images/themes/songlong-red/dragon_right.webp" 
                    alt="dragon-right" 
                    class="anim-dragon-right absolute -right-2 sm:right-2 top-0 w-36 sm:w-44 h-auto object-contain"
                    onerror="this.style.display='none'"
                >
                <img 
                    src="https://chungdoi.com/images/themes/songlong-red/chinese_happiness.webp" 
                    alt="囍" 
                    class="anim-emblem-glow relative z-10 w-24 sm:w-28 h-auto object-contain"
                    onerror="this.style.display='none'"
                >
                <img 
                    src="https://chungdoi.com/images/themes/songlong-red/cloud_small.webp" 
                    alt="" 
                    class="anim-cloud-right absolute left-6 bottom-1 w-16 sm:w-20 opacity-90"
                    onerror="this.style.display='none'"
                >
                <img 
                    src="https://chungdoi.com/images/themes/songlong-red/cloud_big.webp" 
                    alt="" 
                    class="anim-cloud-left absolute right-4 bottom-0 w-20 sm:w-24 opacity-90"
                    onerror="this.style.display='none'"
                >
            </div>

            <!-- Bilingual Save The Date & Couple Names -->
            <div class="relative z-10 reveal-item">
                <p class="text-[11px] uppercase tracking-[0.32em] text-gold-300 font-semibold" lang="vi">
                    Lễ Thành Hôn • Save The Date
                </p>
                <p class="font-kr text-xs tracking-[0.25em] text-gold-200/85 mt-0.5" lang="ko">
                    소중한 날에 초대합니다
                </p>

                <h2 class="font-pattaya text-4xl sm:text-5xl text-gold-metallic mt-3 leading-tight">
                    {{ $weddingCard->groom_name }} <span class="font-serif italic text-gold-300 text-3xl mx-1">&amp;</span> {{ $weddingCard->bride_name }}
                </h2>

                <div class="ornament-divider-gold my-4">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>

                <p class="font-serif text-lg sm:text-xl text-gold-200 font-semibold tracking-widest" lang="vi">
                    {{ $dayOfWeekVi }}, {{ $dayNum }} tháng {{ $monthNum }}, {{ $yearNum }}
                </p>
                <p class="font-kr text-sm text-gold-300/90 tracking-widest mt-0.5" lang="ko">
                    {{ $yearNum }}년 {{ (int)$monthNum }}월 {{ (int)$dayNum }}일 {{ $dayOfWeekKo }}
                </p>
            </div>

            <!-- Groom & Bride Portrait Cards ({{ $weddingCard->groom_rank ?: 'Trưởng Nam' }}: {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_rank ?: 'Út Nữ' }}: {{ $weddingCard->bride_name }}) -->
            <div class="relative z-10 grid grid-cols-2 gap-4 sm:gap-5 mt-7 reveal-item">
                <!-- Groom Card -->
                <div class="bg-imperial-900/90 rounded-t-full rounded-b-3xl p-2.5 pb-5 border border-gold-400/55 shadow-2xl group">
                    <div onclick="openLightboxCustom('{{ $weddingCard->groom_avatar ? asset('storage/' . $weddingCard->groom_avatar) : 'https://assets.chungdoi.com/photo-library/design/5b2fafb74f1aa84ca843acded191b5e4629c62f9b73820281864f27167312b06.webp' }}')" class="aspect-[3/4] rounded-t-full rounded-b-2xl overflow-hidden border border-gold-300/40 relative cursor-pointer">
                        <img 
                            src="{{ $weddingCard->groom_avatar ? asset('storage/' . $weddingCard->groom_avatar) : 'https://assets.chungdoi.com/photo-library/design/5b2fafb74f1aa84ca843acded191b5e4629c62f9b73820281864f27167312b06.webp' }}" 
                            alt="Chú Rể {{ $weddingCard->groom_name }}" 
                            class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-700"
                        >
                    </div>
                    <p class="text-[11px] uppercase tracking-[0.2em] text-gold-300 font-semibold mt-3" lang="vi">
                        {{ $weddingCard->groom_rank ?: 'Trưởng Nam' }}
                    </p>
                    <p class="font-kr text-[11px] text-gold-200/80" lang="ko">
                        신랑 (장남)
                    </p>
                    <h3 class="font-pattaya text-2xl sm:text-3xl text-gold-200 mt-1">
                        {{ $weddingCard->groom_name }}
                    </h3>
                </div>

                <!-- Bride Card -->
                <div class="bg-imperial-900/90 rounded-t-full rounded-b-3xl p-2.5 pb-5 border border-gold-400/55 shadow-2xl group">
                    <div onclick="openLightboxCustom('{{ $weddingCard->bride_avatar ? asset('storage/' . $weddingCard->bride_avatar) : 'https://assets.chungdoi.com/photo-library/design/3fcfad216695abf4dbd4198edb2ba4d451546d5e1231aafbc66559e164daad27.webp' }}')" class="aspect-[3/4] rounded-t-full rounded-b-2xl overflow-hidden border border-gold-300/40 relative cursor-pointer">
                        <img 
                            src="{{ $weddingCard->bride_avatar ? asset('storage/' . $weddingCard->bride_avatar) : 'https://assets.chungdoi.com/photo-library/design/3fcfad216695abf4dbd4198edb2ba4d451546d5e1231aafbc66559e164daad27.webp' }}" 
                            alt="Cô Dâu {{ $weddingCard->bride_name }}" 
                            class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-700"
                        >
                    </div>
                    <p class="text-[11px] uppercase tracking-[0.2em] text-gold-300 font-semibold mt-3" lang="vi">
                        {{ $weddingCard->bride_rank ?: 'Út Nữ' }}
                    </p>
                    <p class="font-kr text-[11px] text-gold-200/80" lang="ko">
                        신부 (막내딸)
                    </p>
                    <h3 class="font-pattaya text-2xl sm:text-3xl text-gold-200 mt-1">
                        {{ $weddingCard->bride_name }}
                    </h3>
                </div>
            </div>

            <!-- Bottom Oriental Waves Border -->
            <div class="absolute inset-x-0 bottom-0 h-14 pointer-events-none select-none overflow-hidden flex items-end justify-between opacity-80">
                <img src="https://chungdoi.com/images/themes/songlong-red/wave.webp" alt="" class="anim-wave-bottom w-1/2 h-auto object-cover" onerror="this.style.display='none'">
                <img src="https://chungdoi.com/images/themes/songlong-red/wave.webp" alt="" class="anim-wave-bottom w-1/2 h-auto object-cover scale-x-[-1]" onerror="this.style.display='none'">
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 2: THÔNG TIN LỄ CƯỚI / 혼례 안내 (FAMILY & CEREMONY)  -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8 relative">
            <div class="bg-white rounded-3xl p-6 sm:p-8 imperial-card-frame text-center relative overflow-hidden reveal-item">
                <!-- Top Song Hỷ Badge -->
                <div class="mx-auto w-14 h-14 mb-3">
                    <img src="https://chungdoi.com/images/themes/songlong-red/chinese_happiness.webp" alt="囍" class="w-full h-full object-contain">
                </div>

                <h2 class="font-serif text-2xl sm:text-3xl font-bold uppercase tracking-[0.12em] text-imperial-900" lang="vi">
                    THÔNG TIN LỄ CƯỚI
                </h2>
                <p class="font-kr text-sm font-semibold text-gold-600 tracking-widest mt-0.5" lang="ko">
                    혼례 및 양가 부모님 안내
                </p>

                <div class="ornament-divider-blue my-3">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>

                <!-- Two-Column Bilingual Family Info (Nhà Trai / 신랑측 & Nhà Gái / 신부측) -->
                <div class="grid grid-cols-2 gap-3 text-center border-y border-imperial-200 py-5 my-4 relative">
                    <div class="absolute left-1/2 top-4 bottom-4 w-px bg-imperial-200 -translate-x-1/2"></div>

                    <!-- Nhà Trai -->
                    <div class="pr-2">
                        <span class="inline-block px-2.5 py-0.5 rounded-full bg-imperial-900 text-gold-200 text-[10px] uppercase tracking-wider font-semibold mb-1.5">
                            <span lang="vi">Nhà Trai</span> <span lang="ko">• 신랑측</span>
                        </span>
                        <p class="text-[11px] uppercase tracking-wider text-imperial-600 font-semibold" lang="vi">Nhà Trai</p>
                        <p class="font-serif text-base sm:text-lg font-bold text-imperial-950 leading-snug mt-0.5">
                            {{ $weddingCard->groom_father_name ?: ($weddingCard->groom_father ?: 'Trần Văn Hùng') }}
                        </p>
                        <p class="font-serif text-base sm:text-lg font-bold text-imperial-950 leading-snug">
                            {{ $weddingCard->groom_mother_name ?: ($weddingCard->groom_mother ?: 'Phạm Thị Lan') }}
                        </p>
                        <p class="text-[11px] text-imperial-700/80 mt-2 leading-relaxed">
                            {{ $weddingCard->address_groom ?: ($weddingCard->groom_address ?: 'Đống Đa, Hà Nội') }}
                        </p>
                    </div>

                    <!-- Nhà Gái -->
                    <div class="pl-2">
                        <span class="inline-block px-2.5 py-0.5 rounded-full bg-imperial-900 text-gold-200 text-[10px] uppercase tracking-wider font-semibold mb-1.5">
                            <span lang="vi">Nhà Gái</span> <span lang="ko">• 신부측</span>
                        </span>
                        <p class="text-[11px] uppercase tracking-wider text-imperial-600 font-semibold" lang="vi">Nhà Gái</p>
                        <p class="font-serif text-base sm:text-lg font-bold text-imperial-950 leading-snug mt-0.5">
                            {{ $weddingCard->bride_father_name ?: ($weddingCard->bride_father ?: 'Nguyễn Văn Bình') }}
                        </p>
                        <p class="font-serif text-base sm:text-lg font-bold text-imperial-950 leading-snug">
                            {{ $weddingCard->bride_mother_name ?: ($weddingCard->bride_mother ?: 'Lê Thị Hương') }}
                        </p>
                        <p class="text-[11px] text-imperial-700/80 mt-2 leading-relaxed">
                            {{ $weddingCard->address_bride ?: ($weddingCard->bride_address ?: 'Cầu Giấy, Hà Nội') }}
                        </p>
                    </div>
                </div>

                <!-- Formal Announcement Text -->
                <p class="text-xs sm:text-sm uppercase tracking-[0.15em] text-imperial-800 font-bold leading-relaxed mt-4" lang="vi">
                    TRÂN TRỌNG BÁO TIN LỄ THÀNH HÔN CỦA CON CHÚNG TÔI
                </p>
                <p class="font-kr text-xs text-imperial-700 mt-1 leading-relaxed" lang="ko">
                    저희 두 사람이 사랑과 믿음으로 한 가정을 이루게 되었습니다.<br>귀한 걸음 하시어 축복해 주시면 감사하겠습니다.
                </p>

                <!-- Couple Full Names -->
                <div class="my-6 space-y-1">
                    <h3 class="font-pattaya text-3xl sm:text-4xl text-imperial-900">
                        {{ $weddingCard->groom_name }}
                    </h3>
                    <p class="text-xs uppercase tracking-[0.2em] text-gold-600 font-semibold">
                        <span lang="vi">{{ $weddingCard->groom_rank ?: 'Trưởng Nam' }}</span> <span lang="ko">• 신랑</span>
                    </p>

                    <div class="py-1 font-serif italic text-2xl text-gold-500">&amp;</div>

                    <h3 class="font-pattaya text-3xl sm:text-4xl text-imperial-900">
                        Nguyễn {{ $weddingCard->bride_name }}
                    </h3>
                    <p class="text-xs uppercase tracking-[0.2em] text-gold-600 font-semibold">
                        <span lang="vi">{{ $weddingCard->bride_rank ?: 'Út Nữ' }}</span> <span lang="ko">• 신부</span>
                    </p>
                </div>

                <!-- Ceremony Time Block (Royal Blue Box) -->
                <div class="royal-blue-brocade text-ivory-50 border border-gold-400/60 rounded-2xl p-5 mt-4 shadow-lg">
                    <p class="text-xs uppercase tracking-[0.18em] text-gold-200 font-bold" lang="vi">
                        LỄ THÀNH HÔN ĐƯỢC CỬ HÀNH TẠI TƯ GIA
                    </p>
                    <p class="font-kr text-xs text-gold-300/90 mt-0.5" lang="ko">
                        성혼 예식 일시
                    </p>
                    <p class="font-serif text-3xl sm:text-4xl font-bold text-gold-300 my-1.5">
                        09:00
                    </p>

                    <!-- Date Split Row: THỨ BẢY | 18 | THÁNG 04 -->
                    <div class="flex items-center justify-center gap-3 sm:gap-5 my-2.5 text-white font-serif">
                        <span class="text-xs sm:text-sm uppercase tracking-widest font-semibold border-y border-gold-400/45 py-1 px-2">
                            <span lang="vi">THỨ BẢY</span> <span lang="ko">토요일</span>
                        </span>
                        <span class="text-4xl sm:text-5xl font-bold text-gold-300 leading-none">
                            18
                        </span>
                        <span class="text-xs sm:text-sm uppercase tracking-widest font-semibold border-y border-gold-400/45 py-1 px-2">
                            <span lang="vi">THÁNG 04</span> <span lang="ko">4월</span>
                        </span>
                    </div>

                    <p class="font-serif text-2xl font-bold text-gold-200 tracking-widest">
                        2026
                    </p>
                    <p class="font-serif italic text-xs sm:text-sm text-gold-200/80 mt-1" lang="vi">
                        (Tức ngày 02 tháng 03 năm Bính Ngọ)
                    </p>
                    <p class="font-kr text-xs text-gold-200/80 mt-0.5" lang="ko">
                        2026년 4월 18일 토요일 오전 9시 (음력 3월 2일)
                    </p>
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 3: ALBUM ẢNH / 웨딩 갤러리 (CAROUSEL 1 / 8)           -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8">
            <div class="text-center mb-6 reveal-item">
                <h2 class="font-pattaya text-3xl sm:text-4xl text-imperial-900" lang="vi">Album Ảnh Cưới</h2>
                <p class="font-kr text-sm font-semibold text-gold-600 tracking-widest mt-1" lang="ko">웨딩 갤러리</p>
                <div class="ornament-divider-blue my-2.5">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>
            </div>

            <!-- Interactive Main Slider with 1 / 8 Counter -->
            <div class="reveal-item">
                <div class="relative rounded-3xl overflow-hidden border-2 border-gold-400/60 shadow-2xl bg-imperial-950 aspect-[3/4] group">
                    <img 
                        id="carousel-main-img" 
                        onclick="openLightbox(currentSlideIndex)"
                        src="https://assets.chungdoi.com/photo-library/design/5019eadee002f02ce6f39d9c5bdb7304d4da683b4e109c41e7ed14e63391d9b0.webp" 
                        alt="Album ảnh cưới {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}" 
                        class="w-full h-full object-cover transition-all duration-500 cursor-pointer"
                    >

                    <!-- Slide Counter Badge (Exact "1 / 8" format) -->
                    <div id="carousel-counter" class="absolute top-4 right-4 px-3.5 py-1 rounded-full bg-imperial-950/75 border border-gold-400/50 backdrop-blur-sm text-gold-200 text-xs font-semibold tracking-widest">
                        1 / 8
                    </div>

                    <!-- Fullscreen Trigger Badge -->
                    <button onclick="openLightbox(currentSlideIndex)" title="Phóng to ảnh" class="absolute top-4 left-4 w-9 h-9 rounded-full bg-imperial-950/65 hover:bg-imperial-900 text-gold-200 border border-gold-400/40 flex items-center justify-center transition cursor-pointer">
                        <i class="fa-solid fa-expand text-xs"></i>
                    </button>

                    <!-- Prev / Next Arrows -->
                    <button onclick="stepCarousel(-1)" aria-label="Ảnh trước" class="absolute left-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/85 hover:bg-white text-imperial-900 shadow-lg flex items-center justify-center transition cursor-pointer">
                        <i class="fa-solid fa-chevron-left text-sm"></i>
                    </button>
                    <button onclick="stepCarousel(1)" aria-label="Ảnh tiếp" class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/85 hover:bg-white text-imperial-900 shadow-lg flex items-center justify-center transition cursor-pointer">
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
        <!-- SECTION 4: THÔNG TIN TIỆC CƯỚI & LỊCH THÁNG 4/2026            -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8">
            <div class="bg-white rounded-3xl p-6 sm:p-8 imperial-card-frame text-center relative overflow-hidden reveal-item">
                <!-- Heading -->
                <h2 class="font-serif text-2xl sm:text-3xl font-bold uppercase tracking-[0.12em] text-imperial-900" lang="vi">
                    THÔNG TIN TIỆC CƯỚI
                </h2>
                <p class="font-kr text-sm font-semibold text-gold-600 tracking-widest mt-0.5" lang="ko">
                    피로연 안내 및 오시는 길
                </p>
                <div class="ornament-divider-blue my-3">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>

                <p class="text-xs sm:text-sm text-imperial-700 font-medium mt-2" lang="vi">
                    Tiệc cưới sẽ diễn ra vào lúc:
                </p>
                <p class="font-serif text-4xl sm:text-5xl font-bold text-imperial-900 my-1.5">
                    {{ $timeStrShort }}
                </p>

                <!-- Date Split Row -->
                <div class="flex items-center justify-center gap-3 sm:gap-5 my-3 text-imperial-900 font-serif">
                    <span class="text-xs sm:text-sm uppercase tracking-widest font-semibold border-y border-imperial-300 py-1 px-2">
                        <span lang="vi">{{ mb_strtoupper($dayOfWeekVi) }}</span> <span lang="ko">{{ $dayOfWeekKo }}</span>
                    </span>
                    <span class="text-4xl sm:text-5xl font-bold text-imperial-800 leading-none">
                        {{ $dayNum }}
                    </span>
                    <span class="text-xs sm:text-sm uppercase tracking-widest font-semibold border-y border-imperial-300 py-1 px-2">
                        <span lang="vi">THÁNG {{ $monthNum }}</span> <span lang="ko">{{ (int)$monthNum }}월</span>
                    </span>
                </div>

                <p class="font-serif text-2xl font-bold text-imperial-900 tracking-widest">
                    {{ $yearNum }}
                </p>
                @if(!empty($weddingCard->lunar_date))
                <p class="font-serif italic text-xs sm:text-sm text-imperial-600 mt-1" lang="vi">
                    ({{ $weddingCard->lunar_date }})
                </p>
                @endif
                <p class="font-kr text-xs text-imperial-600 mt-0.5" lang="ko">
                    {{ $yearNum }}년 {{ (int)$monthNum }}월 {{ (int)$dayNum }}일 {{ $dayOfWeekKo }} {{ $timeStrShort }}
                </p>

                <!-- Two Reception Time Badges -->
                <div class="grid grid-cols-2 gap-3 my-5">
                    <div class="bg-imperial-50 border border-imperial-200 rounded-2xl py-2.5 px-3">
                        <span class="text-[11px] uppercase tracking-wider text-imperial-600 block">
                            <span lang="vi">Đón khách</span> <span lang="ko">• 하객 맞이</span>
                        </span>
                        <strong class="font-serif text-xl text-imperial-900">{{ !empty($timelineEvents[0]['time']) ? $timelineEvents[0]['time'] : '17:30' }}</strong>
                    </div>
                    <div class="bg-imperial-50 border border-imperial-200 rounded-2xl py-2.5 px-3">
                        <span class="text-[11px] uppercase tracking-wider text-imperial-600 block">
                            <span lang="vi">Khai tiệc</span> <span lang="ko">• 예식 시작</span>
                        </span>
                        <strong class="font-serif text-xl text-imperial-900">{{ $timeStrShort }}</strong>
                    </div>
                </div>

                <!-- Live Countdown ("Cùng đếm ngược / 카운트다운") -->
                <div class="my-6 pt-5 border-t border-imperial-200">
                    <p id="countdown-title" class="font-pattaya text-2xl text-imperial-900" lang="vi">
                        Cùng đếm ngược
                    </p>
                    <p class="font-kr text-xs text-gold-600 font-semibold mb-3" lang="ko">
                        결혼식까지 남은 시간
                    </p>
                    <div class="grid grid-cols-4 gap-2.5">
                        <div class="royal-blue-brocade text-gold-200 border border-gold-400/50 rounded-2xl py-2.5 px-1 shadow">
                            <span id="cd-days" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-300">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-gold-200/90">
                                <span lang="vi">Ngày</span> <span lang="ko">일</span>
                            </span>
                        </div>
                        <div class="royal-blue-brocade text-gold-200 border border-gold-400/50 rounded-2xl py-2.5 px-1 shadow">
                            <span id="cd-hours" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-300">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-gold-200/90">
                                <span lang="vi">Giờ</span> <span lang="ko">시간</span>
                            </span>
                        </div>
                        <div class="royal-blue-brocade text-gold-200 border border-gold-400/50 rounded-2xl py-2.5 px-1 shadow">
                            <span id="cd-mins" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-300">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-gold-200/90">
                                <span lang="vi">Phút</span> <span lang="ko">분</span>
                            </span>
                        </div>
                        <div class="royal-blue-brocade text-gold-200 border border-gold-400/50 rounded-2xl py-2.5 px-1 shadow">
                            <span id="cd-secs" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-300">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-gold-200/90">
                                <span lang="vi">Giây</span> <span lang="ko">초</span>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Calendar Card -->
                <div class="bg-imperial-50/75 border border-imperial-200 rounded-2xl p-4 sm:p-5 mt-5">
                    <h4 class="font-serif text-xl font-bold text-imperial-900 mb-0.5">
                        <span lang="vi">Tháng {{ $cal['month'] }} / {{ $cal['year'] }}</span>
                    </h4>
                    <p class="font-kr text-xs text-imperial-600 mb-3" lang="ko">{{ $cal['year'] }}년 {{ $cal['month'] }}월</p>

                    <div class="grid grid-cols-7 gap-1 text-xs font-semibold text-imperial-700 border-b border-imperial-200 pb-2 mb-2.5">
                        <div>T2<span lang="ko" class="block text-[9px] font-normal">월</span></div>
                        <div>T3<span lang="ko" class="block text-[9px] font-normal">화</span></div>
                        <div>T4<span lang="ko" class="block text-[9px] font-normal">수</span></div>
                        <div>T5<span lang="ko" class="block text-[9px] font-normal">목</span></div>
                        <div>T6<span lang="ko" class="block text-[9px] font-normal">금</span></div>
                        <div class="text-imperial-900 font-bold">T7<span lang="ko" class="block text-[9px] font-normal">토</span></div>
                        <div class="text-gold-600 font-bold">CN<span lang="ko" class="block text-[9px] font-normal">일</span></div>
                    </div>
                    <div class="grid grid-cols-7 gap-y-2 gap-x-1 text-xs sm:text-sm text-imperial-900 items-center">
                        @for($i = 0; $i < $leadEmpty; $i++)
                            <div></div>
                        @endfor
                        @for($d = 1; $d <= $cal['total_days']; $d++)
                            @php
                                $colIdx = ($leadEmpty + $d - 1) % 7;
                            @endphp
                            @if($d == $cal['active_day'])
                                <div class="relative flex items-center justify-center py-1">
                                    <span class="w-9 h-9 rounded-full bg-imperial-800 text-gold-200 font-bold flex items-center justify-center shadow-md animate-pulse-day border border-gold-400 relative">
                                        {{ $d }}
                                        <i class="fa-solid fa-heart text-[10px] text-gold-400 absolute -top-1 -right-1"></i>
                                    </span>
                                </div>
                            @else
                                <div class="py-1 {{ $colIdx == 6 ? 'text-gold-600 font-bold' : ($colIdx == 5 ? 'text-imperial-900 font-bold' : '') }}">
                                    {{ $d }}
                                </div>
                            @endif
                        @endfor
                        @php
                            $trailing = (7 - (($leadEmpty + $cal['total_days']) % 7)) % 7;
                        @endphp
                        @for($t = 0; $t < $trailing; $t++)
                            <div></div>
                        @endfor
                    </div>
                </div>

                <!-- Google Calendar Link ("Thêm vào lịch / 캘린더에 추가") -->
                <div class="mt-6">
                    <a 
                        href="https://www.google.com/calendar/render?action=TEMPLATE&text={{ urlencode('Đám cưới ' . $weddingCard->groom_name . ' & ' . $weddingCard->bride_name) }}&dates={{ $wDate ? $wDate->format('Ymd') : '20260418' }}T{{ str_replace(':', '', $timeStrShort) }}00/{{ $wDate ? $wDate->format('Ymd') : '20260418' }}T{{ sprintf('%02d', (intval(substr($timeStrShort, 0, 2)) + 3) % 24) }}{{ substr($timeStrShort, 3, 2) }}00&details={{ urlencode('Kính mời quý khách đến chung vui cùng gia đình chúng tôi!') }}&location={{ urlencode(($weddingCard->wedding_location ?: 'Trung Tâm Tiệc Cưới') . ', ' . ($weddingCard->wedding_address ?: 'Hà Nội')) }}&ctz=Asia/Ho_Chi_Minh"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="btn-imperial-blue px-7 py-3 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider inline-flex items-center gap-2"
                    >
                        <i class="fa-regular fa-calendar-check"></i>
                        <span lang="vi">Thêm vào lịch</span>
                        <span lang="ko" class="font-kr text-xs">• 캘린더에 추가</span>
                    </a>
                </div>

                <!-- Venue & Google Maps Directions -->
                <div class="mt-8 pt-6 border-t border-imperial-200 text-center">
                    <p class="text-xs uppercase tracking-[0.2em] text-imperial-600 font-semibold" lang="vi">
                        Tiệc cưới sẽ tổ chức tại
                    </p>
                    <p class="font-kr text-xs text-gold-600 font-semibold mt-0.5" lang="ko">
                        예식장 위치 안내
                    </p>
                    <p class="font-serif text-lg sm:text-xl font-bold text-imperial-900 mt-1.5 px-2 leading-snug">
                        {{ $weddingCard->wedding_location ?: 'Trung Tâm Tiệc Cưới Hoàng Gia' }}{{ $weddingCard->wedding_address ? ', ' . $weddingCard->wedding_address : ', Ngõ 74 P. Nguyễn Thị Định, Nhân Chính, Thanh Xuân, Hà Nội' }}
                    </p>

                    <!-- Embedded Map Preview -->
                    <div class="w-full h-52 rounded-2xl overflow-hidden border border-imperial-200 shadow-inner my-4 bg-imperial-50">
                        <iframe 
                            class="w-full h-full border-0" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps?q={{ urlencode(($weddingCard->wedding_location ?: 'Tiệc Cưới') . ' ' . ($weddingCard->wedding_address ?: 'Hà Nội')) }}&output=embed">
                        </iframe>
                    </div>

                    <a 
                        href="{{ $weddingCard->google_map_url ?: 'https://www.google.com/maps/dir/?api=1&destination=' . urlencode(($weddingCard->wedding_location ?: 'Tiệc Cưới') . ' ' . ($weddingCard->wedding_address ?: 'Hà Nội')) }}" 
                        target="_blank" 
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-7 py-2.5 rounded-full border-2 border-imperial-800 text-imperial-900 hover:bg-imperial-900 hover:text-gold-200 text-xs sm:text-sm font-semibold uppercase tracking-wider transition"
                    >
                        <i class="fa-solid fa-diamond-turn-right"></i>
                        <span lang="vi">Chỉ đường</span>
                        <span lang="ko" class="font-kr text-xs">• 길찾기</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 5: DRESS CODE & LỊCH TRÌNH NGÀY CƯỚI / 식순 안내      -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-6 space-y-6">
            <!-- Dress Code Card -->
            <div class="bg-white rounded-3xl p-6 imperial-card-frame text-center reveal-item">
                <h3 class="font-serif text-2xl font-bold uppercase tracking-[0.15em] text-imperial-900">
                    DRESS CODE
                </h3>
                <p class="text-xs text-imperial-600 mt-1 mb-4">
                    <span lang="vi">Trang phục dự tiệc gợi ý</span>
                    <span lang="ko" class="font-kr"> • 드레스 코드</span>
                </p>

                <div class="flex items-center justify-center gap-5 sm:gap-6 my-2 flex-wrap">
                    @foreach($dressCodes as $dc)
                        <div class="group flex flex-col items-center gap-1.5">
                            <span class="w-11 h-11 rounded-full border-2 border-white shadow-md ring-1 ring-imperial-200 transition transform group-hover:scale-110" style="background-color: {{ is_array($dc) ? ($dc['color'] ?? '#d4af37') : '#d4af37' }}"></span>
                            <span class="text-[11px] text-imperial-800 font-medium">{{ is_array($dc) ? ($dc['label'] ?? '') : $dc }}</span>
                        </div>
                    @endforeach
                </div>
                @if(!empty($weddingCard->dress_code_note))
                <p class="text-xs text-imperial-600 mt-3 italic">{{ $weddingCard->dress_code_note }}</p>
                @endif
            </div>

            <!-- LỊCH TRÌNH NGÀY CƯỚI / 예식 식순 -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 imperial-card-frame reveal-item">
                <div class="text-center mb-6">
                    <h3 class="font-serif text-2xl font-bold uppercase tracking-[0.12em] text-imperial-900" lang="vi">
                        LỊCH TRÌNH NGÀY CƯỚI
                    </h3>
                    <p class="font-kr text-sm font-semibold text-gold-600 tracking-widest mt-0.5" lang="ko">
                        예식 식순 안내
                    </p>
                    <div class="ornament-divider-blue my-2.5">
                        <div></div>
                        <span>❦</span>
                        <div></div>
                    </div>
                </div>

                <div class="relative max-w-xs mx-auto">
                    <div class="absolute left-[88px] top-2 bottom-2 w-0.5 bg-imperial-200"></div>

                    <div class="space-y-5">
                        @php
                            $defaultIcons = ['fa-camera-retro', 'fa-heart', 'fa-champagne-glasses', 'fa-utensils', 'fa-music', 'fa-ring'];
                        @endphp
                        @foreach($timelineEvents as $tIdx => $tl)
                            @php
                                $tTime = is_array($tl) ? ($tl['time'] ?? '') : '';
                                $tTitle = is_array($tl) ? ($tl['title'] ?? '') : '';
                                $tDesc = is_array($tl) ? ($tl['desc'] ?? '') : '';
                                $tIcon = is_array($tl) && !empty($tl['icon']) ? $tl['icon'] : ($defaultIcons[$tIdx % count($defaultIcons)]);
                            @endphp
                            <div class="flex items-center gap-5 relative">
                                <span class="w-16 text-right font-serif text-lg font-bold text-imperial-900 shrink-0">{{ $tTime }}</span>
                                <span class="w-7 h-7 rounded-full bg-imperial-800 text-gold-300 flex items-center justify-center text-xs z-10 shadow shrink-0 border border-gold-400">
                                    <i class="fa-solid {{ $tIcon }} text-[10px]"></i>
                                </span>
                                <div>
                                    <p class="text-xs sm:text-sm font-semibold text-imperial-950" lang="vi">{{ $tTitle }}</p>
                                    @if(!empty($tDesc))
                                    <p class="font-kr text-[11px] text-imperial-600" lang="ko">{{ $tDesc }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 6: SỔ LƯU BÚT / 방명록 (GUESTBOOK WISHES)             -->
        <!-- ============================================================= -->
        <section id="guestbook-section" class="px-4 sm:px-6 py-8">
            <div class="bg-white rounded-3xl p-6 sm:p-7 imperial-card-frame reveal-item">
                <div class="text-center mb-5">
                    <h2 class="font-pattaya text-3xl sm:text-4xl text-imperial-900" lang="vi">Sổ lưu bút</h2>
                    <p class="font-kr text-sm font-semibold text-gold-600 tracking-widest mt-0.5" lang="ko">축하 방명록</p>
                    <div class="ornament-divider-blue my-2.5">
                        <div></div>
                        <span>❦</span>
                        <div></div>
                    </div>
                    <p class="text-xs text-imperial-700 mt-1" lang="vi">
                        Cảm ơn bạn rất nhiều vì đã gửi những lời chúc mừng tốt đẹp nhất đến đám cưới của {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}!
                    </p>
                    <p class="font-kr text-[11px] text-imperial-600 mt-0.5" lang="ko">
                        두 사람의 앞날을 축복해 주시는 따뜻한 마음을 남겨주세요.
                    </p>
                </div>

                <!-- Wish Submission Form -->
                <form id="wish-form" onsubmit="submitWish(event)" class="space-y-3 text-xs sm:text-sm mb-6">
                    <div>
                        <input 
                            type="text" 
                            id="wish-name" 
                            required 
                            placeholder="Nhập họ tên của bạn / 성함을 입력해 주세요 *" 
                            class="w-full px-4 py-2.5 rounded-xl border border-imperial-200 bg-imperial-50/40 focus:outline-none focus:ring-2 focus:ring-imperial-700"
                        >
                    </div>
                    <div>
                        <textarea 
                            id="wish-message" 
                            rows="3" 
                            required 
                            placeholder="Nhập lời chúc của bạn / 축하 메시지를 입력해 주세요 *" 
                            class="w-full px-4 py-2.5 rounded-xl border border-imperial-200 bg-imperial-50/40 focus:outline-none focus:ring-2 focus:ring-imperial-700"
                        ></textarea>
                    </div>
                    <button type="submit" class="btn-imperial-blue w-full py-3 rounded-xl font-semibold uppercase tracking-wider text-xs sm:text-sm cursor-pointer flex items-center justify-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span lang="vi">Gửi lời chúc</span>
                        <span lang="ko" class="font-kr text-xs">• 축하글 남기기</span>
                    </button>
                </form>

                <!-- Live Wishes List -->
                <div id="wishes-container" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                    <!-- Rendered by JS -->
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 7: HỘP QUÀ MỪNG / 축의금 전달 (QR GIFT BOX)            -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-6 text-center">
            <div class="royal-blue-brocade text-ivory-50 rounded-3xl p-6 sm:p-8 imperial-gold-frame shadow-2xl reveal-item relative overflow-hidden">
                <div onclick="toggleGiftModal(true)" class="w-16 h-16 mx-auto rounded-full bg-gold-400/20 border border-gold-300 flex items-center justify-center text-gold-300 text-2xl mb-3 cursor-pointer hover:scale-110 transition">
                    <i class="fa-solid fa-gift"></i>
                </div>
                <h3 class="font-pattaya text-3xl text-gold-metallic" lang="vi">Hộp Quà Mừng</h3>
                <p class="font-kr text-sm font-semibold text-gold-300 mt-0.5" lang="ko">마음 전하실 곳 (축의금)</p>
                <p class="text-xs text-ivory-100/85 max-w-xs mx-auto mt-2 leading-relaxed" lang="vi">
                    Cảm ơn tình cảm quý báu của Quý khách dành cho {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}. Chạm vào bên dưới để mở Hộp Quà Mừng:
                </p>
                <button onclick="toggleGiftModal(true)" class="btn-imperial-gold mt-5 px-7 py-3 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider inline-flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-qrcode"></i>
                    <span lang="vi">Mở Hộp Quà Mừng</span>
                    <span lang="ko" class="font-kr text-xs">• 계좌번호 보기</span>
                </button>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- FOOTER                                                        -->
        <!-- ============================================================= -->
        <footer class="relative royal-blue-brocade text-ivory-50 py-14 px-6 text-center border-t-2 border-gold-400/50 overflow-hidden">
            <img src="https://chungdoi.com/images/themes/songlong-red/chinese_happiness.webp" alt="囍" class="w-14 h-14 object-contain mx-auto mb-3">
            <h2 class="font-pattaya text-3xl sm:text-4xl text-gold-metallic">{{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}</h2>
            <p class="font-serif italic text-sm sm:text-base text-gold-200/90 mt-3 max-w-xs mx-auto leading-relaxed" lang="vi">
                {{ $weddingCard->message_thanks ?: 'Sự hiện diện của quý khách là niềm vinh hạnh của gia đình chúng tôi!' }}
            </p>
            <p class="font-kr text-xs text-gold-300/80 mt-1" lang="ko">
                함께해 주셔서 진심으로 감사드립니다.
            </p>
            <div class="mt-5 pb-6">
                <a href="https://chungdoi.com" target="_blank" rel="noopener noreferrer" class="inline-block text-xs text-gold-300 hover:text-white font-medium tracking-wider">
                    ♡ chungdoi.com
                </a>
            </div>

            <!-- Bottom Oriental Waves -->
            <div class="absolute inset-x-0 bottom-0 h-12 pointer-events-none select-none overflow-hidden flex items-end justify-between opacity-75">
                <img src="https://chungdoi.com/images/themes/songlong-red/wave.webp" alt="" class="w-1/2 h-auto object-cover" onerror="this.style.display='none'">
                <img src="https://chungdoi.com/images/themes/songlong-red/wave.webp" alt="" class="w-1/2 h-auto object-cover scale-x-[-1]" onerror="this.style.display='none'">
            </div>
        </footer>
    </main>

    <!-- ================================================================= -->
    <!-- 3. FLOATING RIGHT & LEFT CONTROLS                                 -->
    <!-- ================================================================= -->

    <!-- Right-Edge Floating Effect Toggle Tab (Water-Drop Sparkle Icon) -->
    <button 
        id="btn-effect-toggle" 
        onclick="toggleFallingEffects()" 
        title="Bật / Tắt hiệu ứng Song Hỷ 囍 rơi" 
        class="fixed right-0 top-[52%] -translate-y-1/2 z-40 bg-white hover:bg-ivory-50 text-[#0088cc] pl-3 pr-2.5 py-2.5 rounded-l-full shadow-[0_4px_18px_rgba(0,0,0,0.22)] border border-r-0 border-gold-400/50 flex items-center justify-center cursor-pointer transition-transform hover:scale-105"
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
                class="-top-1 -right-1 absolute w-5 h-5 rounded-full bg-slate-800 text-white text-[10px] flex items-center justify-center shadow hover:bg-black z-10 cursor-pointer"
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

        <!-- Imperial Royal Blue Music Equalizer Button (II.I) -->
        <button 
            id="btn-music" 
            onclick="toggleMusic()" 
            title="Bật / Tắt nhạc cưới" 
            class="w-12 h-12 rounded-full bg-imperial-900/95 hover:bg-imperial-800 border-2 border-gold-400 text-gold-300 shadow-[0_6px_20px_rgba(0,0,0,0.45)] flex items-center justify-center cursor-pointer transition transform hover:scale-105"
        >
            <div id="music-eq-bars" class="flex items-end justify-center gap-[3px] h-4 w-5">
                <span class="bar-1 w-[3px] h-3.5 bg-gold-300 rounded-full transition-all"></span>
                <span class="bar-2 w-[3px] h-2 bg-gold-300 rounded-full transition-all"></span>
                <span class="bar-3 w-[3px] h-1 bg-gold-300 rounded-full transition-all"></span>
                <span class="bar-4 w-[3px] h-2.5 bg-gold-300 rounded-full transition-all"></span>
            </div>
        </button>
    </div>

    <!-- Bottom-Left Quick Gift Box Button -->
    <div class="fixed bottom-4 left-4 z-40 flex items-center gap-2">
        <button onclick="toggleGiftModal(true)" title="Mở Hộp Quà Mừng (QR)" class="w-11 h-11 rounded-full bg-imperial-900 border-2 border-gold-400 text-gold-300 shadow-lg flex items-center justify-center cursor-pointer hover:scale-105 transition">
            <i class="fa-solid fa-gift text-base"></i>
        </button>
        <span id="music-status-pill" class="hidden sm:inline-block px-3 py-1 rounded-full bg-imperial-950/90 border border-gold-400/50 text-[11px] text-gold-200 font-medium shadow-sm backdrop-blur-sm">
            Nhạc nền: Tắt
        </span>
    </div>

    <!-- ================================================================= -->
    <!-- 4. MODALS (HỘP QUÀ MỪNG QR, LIGHTBOX DIALOG, GUEST NAME)          -->
    <!-- ================================================================= -->

    <!-- Hộp Quà Mừng Modal ({{ $weddingCard->groom_bank_name ?: 'Vietcombank' }} & {{ $weddingCard->bride_bank_name ?: 'BIDV' }} QR) -->
    <div id="gift-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-imperial-950/80 backdrop-blur-sm p-4">
        <div class="bg-ivory-50 text-imperial-950 rounded-3xl max-w-md w-full p-6 border-2 border-gold-400 shadow-2xl relative">
            <button onclick="toggleGiftModal(false)" class="absolute top-3.5 right-3.5 w-8 h-8 rounded-full bg-imperial-100 text-imperial-900 hover:bg-imperial-200 flex items-center justify-center cursor-pointer">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="text-center mb-5">
                <span class="text-2xl text-gold-500 font-serif">囍</span>
                <h3 class="font-pattaya text-3xl text-imperial-900">Hộp Quà Mừng</h3>
                <p class="font-kr text-xs text-gold-600 font-semibold">마음 전하실 곳 (축의금 계좌 안내)</p>
                <p class="text-xs text-imperial-600 mt-1">Quét mã QR hoặc sao chép số tài khoản ngân hàng</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Chú Rể - {{ $weddingCard->groom_name }} -->
                <div class="bg-white rounded-2xl p-3.5 border border-gold-400/60 text-center shadow-sm">
                    <span class="text-[10px] uppercase tracking-wider font-bold px-2.5 py-0.5 rounded-full bg-imperial-900 text-gold-200">
                        Chú Rể • 신랑측
                    </span>
                    <img 
                        src="{{ $groomQrUrl }}" 
                        alt="QR Chú Rể" 
                        class="w-32 h-32 mx-auto my-2.5 rounded-xl border border-imperial-200 p-1 object-contain"
                    >
                    <p class="text-xs font-bold text-imperial-900">{{ $groomBankName }}</p>
                    <p class="text-xs text-imperial-700 font-medium mt-0.5">{{ $groomOwner }}</p>
                    <p class="text-xs font-mono font-semibold text-imperial-950 my-1">STK: {{ $groomStk }}</p>
                    <button onclick="copyText('{{ $groomStk }}', 'Đã sao chép STK Chú Rể ({{ $groomStk }})!')" class="mt-1 w-full py-1.5 rounded-lg bg-imperial-900 hover:bg-imperial-800 text-gold-200 text-[11px] font-medium cursor-pointer">
                        <i class="fa-regular fa-copy mr-1"></i> Sao chép STK
                    </button>
                </div>

                <!-- Cô Dâu - {{ $weddingCard->bride_name }} -->
                <div class="bg-white rounded-2xl p-3.5 border border-gold-400/60 text-center shadow-sm">
                    <span class="text-[10px] uppercase tracking-wider font-bold px-2.5 py-0.5 rounded-full bg-imperial-900 text-gold-200">
                        Cô Dâu • 신부측
                    </span>
                    <img 
                        src="{{ $brideQrUrl }}" 
                        alt="QR Cô Dâu" 
                        class="w-32 h-32 mx-auto my-2.5 rounded-xl border border-imperial-200 p-1 object-contain"
                    >
                    <p class="text-xs font-bold text-imperial-900">Ngân hàng {{ $brideBankName }}</p>
                    <p class="text-xs text-imperial-700 font-medium mt-0.5">{{ $brideOwner }}</p>
                    <p class="text-xs font-mono font-semibold text-imperial-950 my-1">STK: {{ $brideStk }}</p>
                    <button onclick="copyText('{{ $brideStk }}', 'Đã sao chép STK Cô Dâu ({{ $brideStk }})!')" class="mt-1 w-full py-1.5 rounded-lg bg-imperial-900 hover:bg-imperial-800 text-gold-200 text-[11px] font-medium cursor-pointer">
                        <i class="fa-regular fa-copy mr-1"></i> Sao chép STK
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Guest Name Customizer Modal -->
    <div id="guest-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-imperial-950/80 backdrop-blur-sm p-4">
        <div class="bg-ivory-50 text-imperial-950 rounded-3xl max-w-sm w-full p-6 border-2 border-gold-400 shadow-2xl">
            <h4 class="font-serif text-2xl font-bold text-imperial-900">Tùy chỉnh Tên Khách Mời</h4>
            <p class="text-xs text-imperial-600 mt-1 mb-4">Tên khách mời hiển thị ở mục "Thân Mời / 초대합니다" ngoài bìa thiệp.</p>
            <input type="text" id="custom-guest-input" placeholder="VD: Anh Tuấn & Chị Ngọc" class="w-full px-3.5 py-2.5 rounded-xl border border-imperial-300 bg-white text-sm mb-4 focus:outline-none">
            <div class="flex justify-end gap-2">
                <button onclick="closeGuestModal()" class="px-4 py-2 rounded-xl border border-imperial-400 text-imperial-800 text-xs font-medium cursor-pointer">Hủy</button>
                <button onclick="applyGuestName()" class="px-4 py-2 rounded-xl bg-imperial-900 text-gold-200 text-xs font-medium cursor-pointer">Cập nhật</button>
            </div>
        </div>
    </div>

    <!-- Fullscreen Lightbox Dialog -->
    <div id="lightbox-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-4">
        <div id="lightbox-counter" class="absolute top-5 left-5 px-3.5 py-1 rounded-full bg-white/15 text-gold-200 text-xs font-medium tracking-widest">
            1 / 8
        </div>
        <button onclick="closeLightbox()" class="absolute top-4 right-4 w-10 h-10 rounded-full bg-white/15 text-white hover:bg-white/30 flex items-center justify-center cursor-pointer">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>
        <button id="lightbox-prev" onclick="stepLightbox(-1)" class="absolute left-3 sm:left-6 w-10 h-10 rounded-full bg-white/15 text-white hover:bg-white/30 flex items-center justify-center cursor-pointer">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <img id="lightbox-img" src="" alt="Preview" class="max-h-[85vh] max-w-[90vw] rounded-2xl border-2 border-gold-400 object-contain shadow-2xl">
        <button id="lightbox-next" onclick="stepLightbox(1)" class="absolute right-3 sm:right-6 w-10 h-10 rounded-full bg-white/15 text-white hover:bg-white/30 flex items-center justify-center cursor-pointer">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toast-box" class="fixed top-5 left-1/2 -translate-x-1/2 z-[120] pointer-events-none opacity-0 transition-all duration-300 transform -translate-y-3">
        <div class="px-5 py-2.5 rounded-full bg-imperial-950 border border-gold-400 text-gold-200 text-xs sm:text-sm shadow-2xl flex items-center gap-2">
            <span class="text-gold-400 font-serif">囍</span>
            <span id="toast-text">Thông báo</span>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- 5. JAVASCRIPT LOGIC & INTERACTIVE EFFECTS                         -->
    <!-- ================================================================= -->
    <script>
        /* ---------------------------------------------------------------
         * A. 12 FLOATING 囍 (SONG HỶ) CHARACTERS (EXACT DEMO DOM)
         * --------------------------------------------------------------- */
        function initFloatingSongHy() {
            const container = document.getElementById('floating-hy-container');
            const count = 12; // Exact 12 <div>囍</div> elements from ChungĐôi Song Long Xanh
            for (let i = 0; i < count; i++) {
                const div = document.createElement('div');
                div.className = 'floating-hy-item';
                div.textContent = '囍';
                const sizeRem = (1.1 + (i % 4) * 0.45).toFixed(2);
                const leftPct = ((i * 8.3) + 4) % 94;
                const duration = 13 + (i % 5) * 3.2;
                const delay = -(i * 1.9);
                div.style.fontSize = `${sizeRem}rem`;
                div.style.left = `${leftPct}%`;
                div.style.animationDuration = `${duration}s`;
                div.style.animationDelay = `${delay}s`;
                container.appendChild(div);
            }
        }

        /* ---------------------------------------------------------------
         * B. GOLDEN SHIMMER SPARKLES CANVAS
         * --------------------------------------------------------------- */
        let effectsActive = true;

        function toggleFallingEffects() {
            effectsActive = !effectsActive;
            const canvas = document.getElementById('gold-sparkles-canvas');
            const layer = document.getElementById('floating-hy-container');
            const btn = document.getElementById('btn-effect-toggle');
            if (effectsActive) {
                canvas.style.opacity = '1';
                layer.classList.remove('effects-off');
                btn.classList.remove('opacity-50');
                showToast('Đã bật hiệu ứng chữ Hỷ 囍 & kim tuyến rơi ✨');
            } else {
                canvas.style.opacity = '0';
                layer.classList.add('effects-off');
                btn.classList.add('opacity-50');
                showToast('Đã tạm tắt hiệu ứng rơi');
            }
        }

        function dismissChatWidget(e) {
            e.stopPropagation();
            const widget = document.getElementById('floating-chat-widget');
            if (widget) widget.style.display = 'none';
        }

        function initGoldSparklesCanvas() {
            const canvas = document.getElementById('gold-sparkles-canvas');
            const ctx = canvas.getContext('2d');
            let width = canvas.width = window.innerWidth;
            let height = canvas.height = window.innerHeight;

            window.addEventListener('resize', () => {
                width = canvas.width = window.innerWidth;
                height = canvas.height = window.innerHeight;
            });

            const particles = Array.from({ length: 24 }, () => ({
                x: Math.random() * width,
                y: Math.random() * height,
                r: 1.5 + Math.random() * 2.8,
                vy: 0.35 + Math.random() * 0.65,
                vx: -0.2 + Math.random() * 0.4,
                alpha: 0.25 + Math.random() * 0.55
            }));

            function draw() {
                ctx.clearRect(0, 0, width, height);
                for (const p of particles) {
                    p.y += p.vy;
                    p.x += p.vx;
                    if (p.y > height + 10) {
                        p.y = -10;
                        p.x = Math.random() * width;
                    }
                    ctx.fillStyle = `rgba(247, 226, 156, ${p.alpha})`;
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                    ctx.fill();
                }
                requestAnimationFrame(draw);
            }
            draw();
        }

        /* ---------------------------------------------------------------
         * C. BILINGUAL LANGUAGE MODE SWITCHER (VI+KO / VI / KO)
         * --------------------------------------------------------------- */
        let langModeIndex = 0; // 0: Bilingual, 1: Vietnamese Only, 2: Korean Only
        function cycleLanguageMode() {
            langModeIndex = (langModeIndex + 1) % 3;
            const body = document.body;
            const btn = document.getElementById('lang-mode-btn');
            body.classList.remove('lang-mode-vi', 'lang-mode-ko');

            if (langModeIndex === 0) {
                btn.textContent = '🇻🇳 + 🇰🇷 Song ngữ';
                showToast('Chế độ: Song ngữ Việt - Hàn (베트남어 + 한국어)');
            } else if (langModeIndex === 1) {
                body.classList.add('lang-mode-vi');
                btn.textContent = '🇻🇳 Tiếng Việt';
                showToast('Chế độ: Chỉ hiển thị Tiếng Việt');
            } else {
                body.classList.add('lang-mode-ko');
                btn.textContent = '🇰🇷 한국어';
                showToast('모드: 한국어 전용 표시');
            }
        }

        /* ---------------------------------------------------------------
         * D. ALBUM ẢNH CAROUSEL & LIGHTBOX
         * --------------------------------------------------------------- */
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
        const dbPhotos = {!! $albumPhotosJson ?: '[]' !!};
        const albumPhotos = (Array.isArray(dbPhotos) && dbPhotos.length > 0) ? dbPhotos : defaultPhotos;
        let currentSlideIndex = 0;

        function renderThumbnails() {
            const thumbStrip = document.getElementById('carousel-thumbs');
            thumbStrip.innerHTML = albumPhotos.map((url, idx) => `
                <button 
                    type="button"
                    onclick="selectSlide(${idx})" 
                    class="aspect-square rounded-xl overflow-hidden border-2 transition cursor-pointer ${idx === currentSlideIndex ? 'border-gold-500 scale-105 shadow-md' : 'border-transparent opacity-60 hover:opacity-100'}"
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
         * E. SỔ LƯU BÚT / 방명록 (DỮ LIỆU TỪ DATABASE)
         * --------------------------------------------------------------- */
        @php
            $cardWishes29 = $weddingCard->wishes()->approved()->latest()->take(10)->get()->map(function($w) {
                return [
                    'name' => $w->sender_name,
                    'time' => $w->created_at ? $w->created_at->diffForHumans() : 'Vừa xong',
                    'message' => $w->message,
                ];
            });
        @endphp
        const wishesList = @json($cardWishes29);

        function escapeHtml(str) {
            return String(str).replace(/[&<>"']/g, s => ({
                '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
            }[s]));
        }

        function renderWishes() {
            const container = document.getElementById('wishes-container');
            container.innerHTML = wishesList.map(item => `
                <div class="bg-imperial-50/75 rounded-2xl p-3.5 border border-imperial-200 shadow-sm text-left">
                    <div class="flex items-center justify-between gap-2">
                        <span class="font-bold text-imperial-900 text-xs sm:text-sm">${escapeHtml(item.name)}</span>
                        <span class="text-[10px] text-imperial-500">${escapeHtml(item.time)}</span>
                    </div>
                    <p class="text-xs sm:text-sm text-imperial-800 mt-1.5 leading-relaxed">${escapeHtml(item.message)}</p>
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
            const timeStr = `${now.getDate()}/${now.getMonth() + 1}/${now.getFullYear()}`;

            wishesList.unshift({
                name,
                time: timeStr,
                message
            });

            renderWishes();
            document.getElementById('wish-form').reset();
            showToast('Cảm ơn lời chúc của bạn! / 축하해 주셔서 감사합니다! 囍');
        }

        /* ---------------------------------------------------------------
         * F. COUNTDOWN TIMER
         * --------------------------------------------------------------- */
        function initCountdown() {
            const weddingDateStr = '{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format("Y-m-d") : "2026-04-18" }}';
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
         * G. BACKGROUND WEDDING MUSIC & COVER GATE OPENING
         * --------------------------------------------------------------- */
        let audioCtx = null;
        let isMusicPlaying = false;
        let melodyInterval = null;

        const orientalMelody = [
            523.25, 587.33, 659.25, 783.99, 880.00, 1046.50, 880.00, 783.99,
            659.25, 783.99, 659.25, 587.33, 523.25, 587.33, 659.25, 523.25
        ];
        let noteIdx = 0;

        function playSoftNote(freq) {
            if (!audioCtx || !isMusicPlaying) return;
            const now = audioCtx.currentTime;
            const osc = audioCtx.createOscillator();
            const gain = audioCtx.createGain();
            osc.type = 'sine';
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
                playSoftNote(orientalMelody[noteIdx % orientalMelody.length]);
                melodyInterval = setInterval(() => {
                    if (!isMusicPlaying) return;
                    noteIdx = (noteIdx + 1) % orientalMelody.length;
                    playSoftNote(orientalMelody[noteIdx]);
                }, 650);
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
                showToast('Đang phát giai điệu lễ cưới ♪');
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
         * H. MODALS, CLIPBOARD & SCROLL REVEAL
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
         * I. INITIALIZE ON WINDOW LOAD
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

            initFloatingSongHy();
            initGoldSparklesCanvas();
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