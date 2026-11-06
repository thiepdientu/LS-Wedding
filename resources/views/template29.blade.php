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

        /* Imperial Gold Open Button ("Mở thiệp") */
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
    <!-- Background Audio -->
    <audio id="weddingAudio" loop preload="auto">
        @if(!empty($weddingCard->music_url))
            <source src="{{ $weddingCard->music_url }}" type="audio/mpeg">
        @endif
        <source src="{{ asset('template01/media/Shane-Filan-Beautiful-In-White-Official-Video.mp3') }}" type="audio/mpeg">
        <source src="https://cdn.pixabay.com/download/audio/2022/05/27/audio_1808fbf07a.mp3?filename=romantic-piano-112191.mp3" type="audio/mpeg">
    </audio>
    @php
        $cal = $weddingCard->calendar_matrix;
        $dayOfWeekVi = $weddingCard->wedding_date ? $weddingCard->wedding_date->locale('vi')->dayName : 'Thứ Bảy';
        $wDate = $weddingCard->wedding_date;
        $dayNum = $wDate ? $wDate->format('d') : '18';
        $monthNum = $wDate ? $wDate->format('m') : '04';
        $yearNum = $wDate ? $wDate->format('Y') : '2026';
        $timeStr = !empty($weddingCard->wedding_time) ? trim($weddingCard->wedding_time) : '18:00';
        $timeStrShort = preg_match('/^\d{1,2}:\d{2}/', $timeStr, $m) ? $m[0] : '18:00';

        $timelineEvents = is_array($weddingCard->timeline) ? $weddingCard->timeline : (is_string($weddingCard->timeline) ? json_decode($weddingCard->timeline, true) : null);
        if (empty($timelineEvents)) {
            $timelineEvents = [
                ['time' => '17:30', 'title' => 'Đón khách & Chụp ảnh', 'desc' => 'Đón tiếp quan khách'],
                ['time' => '18:00', 'title' => 'Khai tiệc', 'desc' => 'Khai tiệc thành hôn'],
                ['time' => '18:30', 'title' => 'Rót rượu, cắt bánh', 'desc' => 'Nghi thức kết duyên'],
                ['time' => '19:00', 'title' => 'Phục vụ món chính', 'desc' => 'Dùng tiệc thân mật'],
                ['time' => '21:00', 'title' => 'Kết thúc tiệc', 'desc' => 'Cảm ơn và tiễn khách'],
            ];
        }

        $dressCodes = !empty($weddingCard->dresscode_colors_list) 
            ? $weddingCard->dresscode_colors_list 
            : (!empty($weddingCard->dresscode_colors) 
                ? (is_array($weddingCard->dresscode_colors) ? $weddingCard->dresscode_colors : (is_string($weddingCard->dresscode_colors) ? json_decode($weddingCard->dresscode_colors, true) : null))
                : null);

        if (empty($dressCodes)) {
            $dressCodes = [
                ['hex' => '#12395b', 'name' => 'Xanh Lam'],
                ['hex' => '#d4af37', 'name' => 'Vàng Kim'],
                ['hex' => '#fcfaf5', 'name' => 'Kem Ngà'],
                ['hex' => '#8c1518', 'name' => 'Đỏ Hỷ'],
            ];
        }

        $albumData = !empty($weddingCard->album) ? (is_string($weddingCard->album) ? json_decode($weddingCard->album, true) : $weddingCard->album) : [];
        $albumList = [];
        if (!empty($albumData) && is_array($albumData)) {
            foreach ($albumData as $item) {
                if (!empty($item)) {
                    $albumList[] = str_starts_with($item, 'http') ? $item : asset('storage/' . $item);
                }
            }
        }
        $albumPhotosJson = json_encode(!empty($albumList) ? array_values($albumList) : []);

        $firstAlbumThumb = !empty($albumList) && isset($albumList[0]) ? $albumList[0] : null;
        $secondAlbumThumb = !empty($albumList) && isset($albumList[1]) ? $albumList[1] : null;

        $groomAvatarSrc = !empty($weddingCard->groom_avatar)
            ? (str_starts_with($weddingCard->groom_avatar, 'http') ? $weddingCard->groom_avatar : asset('storage/' . $weddingCard->groom_avatar))
            : (!empty($weddingCard->groom_image)
                ? (str_starts_with($weddingCard->groom_image, 'http') ? $weddingCard->groom_image : asset('storage/' . $weddingCard->groom_image))
                : ($secondAlbumThumb ?: (!empty($weddingCard->banner_top)
                    ? (str_starts_with($weddingCard->banner_top, 'http') ? $weddingCard->banner_top : asset('storage/' . $weddingCard->banner_top))
                    : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=700&q=85')));

        $brideAvatarSrc = !empty($weddingCard->bride_avatar)
            ? (str_starts_with($weddingCard->bride_avatar, 'http') ? $weddingCard->bride_avatar : asset('storage/' . $weddingCard->bride_avatar))
            : (!empty($weddingCard->bride_image)
                ? (str_starts_with($weddingCard->bride_image, 'http') ? $weddingCard->bride_image : asset('storage/' . $weddingCard->bride_image))
                : ($firstAlbumThumb ?: (!empty($weddingCard->banner_preview)
                    ? (str_starts_with($weddingCard->banner_preview, 'http') ? $weddingCard->banner_preview : asset('storage/' . $weddingCard->banner_preview))
                    : 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=700&q=85')));

        $initialMainAlbumImg = !empty($albumList)
            ? $albumList[0]
            : (!empty($weddingCard->banner_top)
                ? (str_starts_with($weddingCard->banner_top, 'http') ? $weddingCard->banner_top : asset('storage/' . $weddingCard->banner_top))
                : 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=900&q=80');

        $initialTotalAlbumPhotos = count($albumList) > 0 ? count($albumList) : 8;

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

            <!-- Date on Cover: 18 tháng 4, 2026 -->
            <div class="relative z-10 mb-5">
                <p class="font-serif text-xl sm:text-2xl text-gold-200 font-semibold tracking-widest" dir="auto">
                    {{ $dayNum }} tháng {{ $monthNum }}, {{ $yearNum }}
                </p>
            </div>

            <!-- Guest Invitation Badge ("Thân Mời") -->
            <div class="relative z-10 bg-imperial-950/65 border border-gold-400/50 rounded-2xl px-5 py-3 mb-6 max-w-xs mx-auto backdrop-blur-sm">
                <p class="text-xs uppercase tracking-[0.25em] text-gold-200 font-semibold" dir="auto">
                    Thân Mời
                </p>
                <p id="cover-guest-name" class="font-serif text-lg sm:text-xl text-ivory-50 font-bold tracking-wide mt-1">
                    Quý Khách &amp; Gia Đình
                </p>
            </div>

            <!-- Open Button: "Mở thiệp" -->
            <div class="relative z-10 mb-8">
                <a href="?open=1" id="btn-open-card" onclick="openInvitation(event)" rel="nofollow" class="btn-imperial-gold px-10 py-3.5 rounded-full font-bold text-sm tracking-[0.16em] uppercase inline-flex items-center justify-center gap-2.5 cursor-pointer min-w-[190px]">
                    <i class="fa-regular fa-envelope-open text-sm"></i>
                    <span>Mở thiệp</span>
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

        <!-- Sticky Top Bar: Cover Gate Re-opener -->
        {{-- <div class="sticky top-0 z-30 bg-imperial-950/95 backdrop-blur-md border-b border-gold-400/35 px-3.5 py-2.5 flex items-center justify-between text-xs text-gold-200">
            <div class="flex items-center gap-2">
                <span class="text-gold-400 font-serif text-base">囍</span>
                <span class="font-medium">Song Long Xanh</span>
            </div>
            <div class="flex items-center gap-2">
                <button onclick="openGuestModal()" class="text-gold-300 hover:text-white underline text-[11px] cursor-pointer hidden sm:inline">
                    Đổi tên khách
                </button>
                <button onclick="reopenCoverGate()" class="px-2.5 py-1 rounded-full bg-gold-400/20 border border-gold-400/40 text-[11px] text-gold-200 hover:bg-gold-400/30 transition cursor-pointer">
                    Bìa thiệp
                </button>
            </div>
        </div> --}}

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

            <!-- Save The Date & Couple Names -->
            <div class="relative z-10 reveal-item">
                <p class="text-[11px] uppercase tracking-[0.32em] text-gold-300 font-semibold">
                    Lễ Thành Hôn • Save The Date
                </p>

                <h2 class="font-pattaya text-4xl sm:text-5xl text-gold-metallic mt-3 leading-tight">
                    {{ $weddingCard->groom_name }} <span class="font-serif italic text-gold-300 text-3xl mx-1">&amp;</span> {{ $weddingCard->bride_name }}
                </h2>

                <div class="ornament-divider-gold my-4">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>

                <p class="font-serif text-lg sm:text-xl text-gold-200 font-semibold tracking-widest">
                    {{ $dayOfWeekVi }}, {{ $dayNum }} tháng {{ $monthNum }}, {{ $yearNum }}
                </p>
            </div>

            <!-- Groom & Bride Portrait Cards ({{ $weddingCard->groom_rank ?: 'Trưởng Nam' }}: {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_rank ?: 'Út Nữ' }}: {{ $weddingCard->bride_name }}) -->
            <div class="relative z-10 grid grid-cols-2 gap-4 sm:gap-5 mt-7 reveal-item">
                <!-- Groom Card -->
                <div class="bg-imperial-900/90 rounded-t-full rounded-b-3xl p-2.5 pb-5 border border-gold-400/55 shadow-2xl group">
                    <div onclick="openLightboxCustom('{{ $groomAvatarSrc }}')" class="aspect-[3/4] rounded-t-full rounded-b-2xl overflow-hidden border border-gold-300/40 relative cursor-pointer">
                        <img 
                            src="{{ $groomAvatarSrc }}" 
                            alt="Chú Rể {{ $weddingCard->groom_name }}" 
                            class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-700"
                        >
                    </div>
                    <p class="text-[11px] uppercase tracking-[0.2em] text-gold-300 font-semibold mt-3">
                        {{ $weddingCard->groom_rank ?: 'Trưởng Nam' }}
                    </p>
                    <h3 class="font-pattaya text-2xl sm:text-3xl text-gold-200 mt-1">
                        {{ $weddingCard->groom_name }}
                    </h3>
                </div>

                <!-- Bride Card -->
                <div class="bg-imperial-900/90 rounded-t-full rounded-b-3xl p-2.5 pb-5 border border-gold-400/55 shadow-2xl group">
                    <div onclick="openLightboxCustom('{{ $brideAvatarSrc }}')" class="aspect-[3/4] rounded-t-full rounded-b-2xl overflow-hidden border border-gold-300/40 relative cursor-pointer">
                        <img 
                            src="{{ $brideAvatarSrc }}" 
                            alt="Cô Dâu {{ $weddingCard->bride_name }}" 
                            class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-700"
                        >
                    </div>
                    <p class="text-[11px] uppercase tracking-[0.2em] text-gold-300 font-semibold mt-3">
                        {{ $weddingCard->bride_rank ?: 'Út Nữ' }}
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
        <!-- SECTION 2: THÔNG TIN LỄ CƯỚI (FAMILY & CEREMONY)              -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8 relative">
            <div class="bg-white rounded-3xl p-6 sm:p-8 imperial-card-frame text-center relative overflow-hidden reveal-item">
                <!-- Top Song Hỷ Badge -->
                <div class="mx-auto w-14 h-14 mb-3">
                    <img src="https://chungdoi.com/images/themes/songlong-red/chinese_happiness.webp" alt="囍" class="w-full h-full object-contain">
                </div>

                <h2 class="font-serif text-2xl sm:text-3xl font-bold uppercase tracking-[0.12em] text-imperial-900">
                    THÔNG TIN LỄ CƯỚI
                </h2>

                <div class="ornament-divider-blue my-3">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>

                <!-- Two-Column Family Info (Nhà Trai & Nhà Gái) -->
                <div class="grid grid-cols-2 gap-3 text-center border-y border-imperial-200 py-5 my-4 relative">
                    <div class="absolute left-1/2 top-4 bottom-4 w-px bg-imperial-200 -translate-x-1/2"></div>

                    <!-- Nhà Trai -->
                    <div class="pr-2">
                        <span class="inline-block px-2.5 py-0.5 rounded-full bg-imperial-900 text-gold-200 text-[10px] uppercase tracking-wider font-semibold mb-1.5">
                            Nhà Trai
                        </span>
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
                            Nhà Gái
                        </span>
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
                <p class="text-xs sm:text-sm uppercase tracking-[0.15em] text-imperial-800 font-bold leading-relaxed mt-4">
                    TRÂN TRỌNG BÁO TIN LỄ THÀNH HÔN CỦA CON CHÚNG TÔI
                </p>

                <!-- Couple Full Names -->
                <div class="my-6 space-y-1">
                    <h3 class="font-pattaya text-3xl sm:text-4xl text-imperial-900">
                        {{ $weddingCard->groom_name }}
                    </h3>
                    <p class="text-xs uppercase tracking-[0.2em] text-gold-600 font-semibold">
                        {{ $weddingCard->groom_rank ?: 'Trưởng Nam' }}
                    </p>

                    <div class="py-1 font-serif italic text-2xl text-gold-500">&amp;</div>

                    <h3 class="font-pattaya text-3xl sm:text-4xl text-imperial-900">
                        {{ $weddingCard->bride_name }}
                    </h3>
                    <p class="text-xs uppercase tracking-[0.2em] text-gold-600 font-semibold">
                        {{ $weddingCard->bride_rank ?: 'Út Nữ' }}
                    </p>
                </div>

                <!-- Ceremony Time Block (Royal Blue Box) -->
                <div class="royal-blue-brocade text-ivory-50 border border-gold-400/60 rounded-2xl p-5 mt-4 shadow-lg">
                    <p class="text-xs uppercase tracking-[0.18em] text-gold-200 font-bold">
                        LỄ THÀNH HÔN ĐƯỢC CỬ HÀNH TẠI TƯ GIA
                    </p>
                    <p class="font-serif text-3xl sm:text-4xl font-bold text-gold-300 my-1.5">
                        {{ $weddingCard->time_groom ?: ($timeStrShort ?: '09:00') }}
                    </p>

                    <!-- Date Split Row: THỨ BẢY | 18 | THÁNG 04 -->
                    <div class="flex items-center justify-center gap-3 sm:gap-5 my-2.5 text-white font-serif">
                        <span class="text-xs sm:text-sm uppercase tracking-widest font-semibold border-y border-gold-400/45 py-1 px-2">
                            {{ mb_strtoupper($dayOfWeekVi) }}
                        </span>
                        <span class="text-4xl sm:text-5xl font-bold text-gold-300 leading-none">
                            {{ $dayNum }}
                        </span>
                        <span class="text-xs sm:text-sm uppercase tracking-widest font-semibold border-y border-gold-400/45 py-1 px-2">
                            THÁNG {{ $monthNum }}
                        </span>
                    </div>

                    <p class="font-serif text-2xl font-bold text-gold-200 tracking-widest">
                        {{ $yearNum }}
                    </p>
                    @if(!empty($weddingCard->wedding_date_lunar) || !empty($weddingCard->wedding_date_al))
                    <p class="font-serif italic text-xs sm:text-sm text-gold-200/80 mt-1">
                        (Tức ngày {{ $weddingCard->wedding_date_al ?: $weddingCard->wedding_date_lunar }})
                    </p>
                    @endif
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 3: ALBUM ẢNH (CAROUSEL)                               -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8">
            <div class="text-center mb-6 reveal-item">
                <h2 class="font-pattaya text-3xl sm:text-4xl text-imperial-900">Album Ảnh Cưới</h2>
                <div class="ornament-divider-blue my-2.5">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>
            </div>

            <!-- Interactive Main Slider with Counter -->
            <div class="reveal-item">
                <div class="relative rounded-3xl overflow-hidden border-2 border-gold-400/60 shadow-2xl bg-imperial-950 aspect-[3/4] group">
                    <img 
                        id="carousel-main-img" 
                        onclick="openLightbox(currentSlideIndex)"
                        src="{{ $initialMainAlbumImg }}" 
                        alt="Album ảnh cưới {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}" 
                        class="w-full h-full object-cover transition-all duration-500 cursor-pointer"
                        onerror="this.src='https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=900&q=80'"
                    >

                    <!-- Slide Counter Badge (Exact "1 / X" format) -->
                    <div id="carousel-counter" class="absolute top-4 right-4 px-3.5 py-1 rounded-full bg-imperial-950/75 border border-gold-400/50 backdrop-blur-sm text-gold-200 text-xs font-semibold tracking-widest">
                        1 / {{ $initialTotalAlbumPhotos }}
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
                <h2 class="font-serif text-2xl sm:text-3xl font-bold uppercase tracking-[0.12em] text-imperial-900">
                    THÔNG TIN TIỆC CƯỚI
                </h2>
                <div class="ornament-divider-blue my-3">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>

                <!-- Hai Khối Tiệc Cưới: Nhà Trai & Nhà Gái -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 my-6 text-center">
                    <!-- Khối Nhà Trai -->
                    <div class="bg-imperial-50/80 border-2 border-imperial-200/80 rounded-2xl p-5 shadow-sm flex flex-col justify-between">
                        <div>
                            <span class="inline-block px-3 py-1 rounded-full bg-imperial-900 text-gold-200 text-xs uppercase tracking-wider font-semibold mb-2">
                                Tiệc Cưới Nhà Trai
                            </span>
                            <h3 class="font-serif text-xl font-bold text-imperial-950 mt-1">
                                Hôn Trường Nhà Trai
                            </h3>
                            <p class="font-serif text-3xl font-bold text-imperial-800 my-2">
                                {{ $weddingCard->time_groom ?: ($timeStrShort ?: '18:00') }}
                            </p>
                            <p class="text-xs sm:text-sm font-semibold text-imperial-900">
                                {{ $weddingCard->groom_eating_date ? \Carbon\Carbon::parse($weddingCard->groom_eating_date)->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : ($wDate ? $wDate->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : 'Thứ Bảy, ngày 18/04/2026') }}
                            </p>
                            @if(!empty($weddingCard->time_groom_al) || !empty($weddingCard->wedding_date_lunar))
                            <p class="text-xs text-imperial-600 italic mt-0.5">
                                (Tức ngày {{ $weddingCard->time_groom_al ?: $weddingCard->wedding_date_lunar }})
                            </p>
                            @endif
                            <div class="text-xs text-imperial-700 mt-3 pt-3 border-t border-imperial-200">
                                <strong class="text-imperial-900 block mb-1">Địa chỉ:</strong>
                                {{ $weddingCard->address_groom ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Trai') }}
                            </div>
                        </div>

                        <div class="mt-4 pt-3 flex flex-wrap gap-2 justify-center">
                            <a 
                                href="{{ $weddingCard->groom_map ?: ($weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode($weddingCard->address_groom ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Trai')))) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-imperial-900 text-gold-200 hover:bg-imperial-800 text-xs font-semibold uppercase tracking-wider transition shadow-sm"
                            >
                                <i class="fa-solid fa-diamond-turn-right"></i>
                                <span>Chỉ đường</span>
                            </a>
                            @if(!empty($weddingCard->groom_phone))
                            <a 
                                href="tel:{{ $weddingCard->groom_phone }}"
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full border border-imperial-800 text-imperial-900 hover:bg-imperial-900 hover:text-gold-200 text-xs font-semibold uppercase tracking-wider transition"
                            >
                                <i class="fa-solid fa-phone"></i>
                                <span>Chú Rể: {{ $weddingCard->groom_phone }}</span>
                            </a>
                            @endif
                        </div>
                    </div>

                    <!-- Khối Nhà Gái -->
                    <div class="bg-imperial-50/80 border-2 border-imperial-200/80 rounded-2xl p-5 shadow-sm flex flex-col justify-between">
                        <div>
                            <span class="inline-block px-3 py-1 rounded-full bg-imperial-900 text-gold-200 text-xs uppercase tracking-wider font-semibold mb-2">
                                Tiệc Cưới Nhà Gái
                            </span>
                            <h3 class="font-serif text-xl font-bold text-imperial-950 mt-1">
                                Hôn Trường Nhà Gái
                            </h3>
                            <p class="font-serif text-3xl font-bold text-imperial-800 my-2">
                                {{ $weddingCard->time_bride ?: ($timeStrShort ?: '11:00') }}
                            </p>
                            <p class="text-xs sm:text-sm font-semibold text-imperial-900">
                                {{ $weddingCard->bride_eating_date ? \Carbon\Carbon::parse($weddingCard->bride_eating_date)->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : ($wDate ? $wDate->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : 'Thứ Bảy, ngày 18/04/2026') }}
                            </p>
                            @if(!empty($weddingCard->time_bride_al) || !empty($weddingCard->wedding_date_lunar))
                            <p class="text-xs text-imperial-600 italic mt-0.5">
                                (Tức ngày {{ $weddingCard->time_bride_al ?: $weddingCard->wedding_date_lunar }})
                            </p>
                            @endif
                            <div class="text-xs text-imperial-700 mt-3 pt-3 border-t border-imperial-200">
                                <strong class="text-imperial-900 block mb-1">Địa chỉ:</strong>
                                {{ $weddingCard->address_bride ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Gái') }}
                            </div>
                        </div>

                        <div class="mt-4 pt-3 flex flex-wrap gap-2 justify-center">
                            <a 
                                href="{{ $weddingCard->bride_map ?: ($weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode($weddingCard->address_bride ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Gái')))) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full bg-imperial-900 text-gold-200 hover:bg-imperial-800 text-xs font-semibold uppercase tracking-wider transition shadow-sm"
                            >
                                <i class="fa-solid fa-diamond-turn-right"></i>
                                <span>Chỉ đường</span>
                            </a>
                            @if(!empty($weddingCard->bride_phone))
                            <a 
                                href="tel:{{ $weddingCard->bride_phone }}"
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full border border-imperial-800 text-imperial-900 hover:bg-imperial-900 hover:text-gold-200 text-xs font-semibold uppercase tracking-wider transition"
                            >
                                <i class="fa-solid fa-phone"></i>
                                <span>Cô Dâu: {{ $weddingCard->bride_phone }}</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Live Countdown ("Cùng đếm ngược") -->
                <div class="my-6 pt-5 border-t border-imperial-200">
                    <p id="countdown-title" class="font-pattaya text-2xl text-imperial-900">
                        Cùng đếm ngược
                    </p>
                    <div class="grid grid-cols-4 gap-2.5 mt-3">
                        <div class="royal-blue-brocade text-gold-200 border border-gold-400/50 rounded-2xl py-2.5 px-1 shadow">
                            <span id="cd-days" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-300">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-gold-200/90">Ngày</span>
                        </div>
                        <div class="royal-blue-brocade text-gold-200 border border-gold-400/50 rounded-2xl py-2.5 px-1 shadow">
                            <span id="cd-hours" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-300">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-gold-200/90">Giờ</span>
                        </div>
                        <div class="royal-blue-brocade text-gold-200 border border-gold-400/50 rounded-2xl py-2.5 px-1 shadow">
                            <span id="cd-mins" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-300">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-gold-200/90">Phút</span>
                        </div>
                        <div class="royal-blue-brocade text-gold-200 border border-gold-400/50 rounded-2xl py-2.5 px-1 shadow">
                            <span id="cd-secs" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-300">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-gold-200/90">Giây</span>
                        </div>
                    </div>
                </div>

                <!-- Calendar Card -->
                <div class="bg-imperial-50/75 border border-imperial-200 rounded-2xl p-4 sm:p-5 mt-5">
                    <h4 class="font-serif text-xl font-bold text-imperial-900 mb-2">
                        Tháng {{ $cal['month'] }} / {{ $cal['year'] }}
                    </h4>

                    <div class="grid grid-cols-7 gap-1 text-xs font-semibold text-imperial-700 border-b border-imperial-200 pb-2 mb-2.5">
                        <div>T2</div>
                        <div>T3</div>
                        <div>T4</div>
                        <div>T5</div>
                        <div>T6</div>
                        <div class="text-imperial-900 font-bold">T7</div>
                        <div class="text-gold-600 font-bold">CN</div>
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

                <!-- Google Calendar Link ("Thêm vào lịch") -->
                <div class="mt-6">
                    <a 
                        href="https://www.google.com/calendar/render?action=TEMPLATE&text={{ urlencode('Đám cưới ' . $weddingCard->groom_name . ' & ' . $weddingCard->bride_name) }}&dates={{ $wDate ? $wDate->format('Ymd') : '20260418' }}T{{ str_replace(':', '', $timeStrShort) }}00/{{ $wDate ? $wDate->format('Ymd') : '20260418' }}T{{ sprintf('%02d', (intval(substr($timeStrShort, 0, 2)) + 3) % 24) }}{{ substr($timeStrShort, 3, 2) }}00&details={{ urlencode('Kính mời quý khách đến chung vui cùng gia đình chúng tôi!') }}&location={{ urlencode(($weddingCard->wedding_location ?: 'Trung Tâm Tiệc Cưới') . ', ' . ($weddingCard->wedding_address ?: 'Hà Nội')) }}&ctz=Asia/Ho_Chi_Minh"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="btn-imperial-blue px-7 py-3 rounded-full text-xs sm:text-sm font-semibold uppercase tracking-wider inline-flex items-center gap-2"
                    >
                        <i class="fa-regular fa-calendar-check"></i>
                        <span>Thêm vào lịch</span>
                    </a>
                </div>

                @if($weddingCard->wedding_location && $weddingCard->wedding_location !== $weddingCard->address_groom && $weddingCard->wedding_location !== $weddingCard->address_bride)
                <!-- Central Venue & Google Maps Directions -->
                <div class="mt-8 pt-6 border-t border-imperial-200 text-center">
                    <p class="text-xs uppercase tracking-[0.2em] text-imperial-600 font-semibold">
                        Trung tâm tiệc cưới chung
                    </p>
                    <p class="font-serif text-lg sm:text-xl font-bold text-imperial-900 mt-1.5 px-2 leading-snug">
                        {{ $weddingCard->wedding_location }}{{ $weddingCard->wedding_address ? ', ' . $weddingCard->wedding_address : '' }}
                    </p>

                    @if($weddingCard->google_map_url)
                    <div class="mt-4">
                        <a 
                            href="{{ $weddingCard->google_map_url }}" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="inline-flex items-center gap-2 px-7 py-2.5 rounded-full border-2 border-imperial-800 text-imperial-900 hover:bg-imperial-900 hover:text-gold-200 text-xs sm:text-sm font-semibold uppercase tracking-wider transition"
                        >
                            <i class="fa-solid fa-diamond-turn-right"></i>
                            <span>Chỉ đường trung tâm</span>
                        </a>
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 5: DRESS CODE & LỊCH TRÌNH NGÀY CƯỚI                  -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-6 space-y-6">
            <!-- Dress Code Card -->
            <div class="bg-white rounded-3xl p-6 imperial-card-frame text-center reveal-item">
                <h3 class="font-serif text-2xl font-bold uppercase tracking-[0.15em] text-imperial-900">
                    DRESS CODE
                </h3>
                <p class="text-xs text-imperial-600 mt-1 mb-4">
                    Trang phục dự tiệc gợi ý
                </p>

                <div class="flex items-center justify-center gap-5 sm:gap-6 my-2 flex-wrap">
                    @foreach($dressCodes as $dc)
                        @php
                            $hex = is_array($dc) ? ($dc['hex'] ?? ($dc['color'] ?? '#d4af37')) : $dc;
                            $name = is_array($dc) ? ($dc['name'] ?? ($dc['label'] ?? '')) : '';
                        @endphp
                        <div class="group flex flex-col items-center gap-1.5">
                            <span class="w-11 h-11 rounded-full border-2 border-white shadow-md ring-1 ring-imperial-200 transition transform group-hover:scale-110" style="background-color: {{ $hex }}"></span>
                            @if(!empty($name))
                            <span class="text-[11px] text-imperial-800 font-medium">{{ $name }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>
                @php
                    $dressNote = $weddingCard->dresscode_note ?: $weddingCard->dress_code_note;
                @endphp
                @if(!empty($dressNote))
                <p class="text-xs text-imperial-600 mt-3 italic">{{ $dressNote }}</p>
                @endif
            </div>

            <!-- LỊCH TRÌNH NGÀY CƯỚI -->
            <div class="bg-white rounded-3xl p-6 sm:p-7 imperial-card-frame reveal-item">
                <div class="text-center mb-6">
                    <h3 class="font-serif text-2xl font-bold uppercase tracking-[0.12em] text-imperial-900">
                        LỊCH TRÌNH NGÀY CƯỚI
                    </h3>
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
                                    <p class="text-xs sm:text-sm font-semibold text-imperial-950">{{ $tTitle }}</p>
                                    @if(!empty($tDesc))
                                    <p class="text-[11px] text-imperial-600">{{ $tDesc }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 6: SỔ LƯU BÚT (GUESTBOOK WISHES)                       -->
        <!-- ============================================================= -->
        <section id="guestbook-section" class="px-4 sm:px-6 py-8">
            <div class="bg-white rounded-3xl p-6 sm:p-7 imperial-card-frame reveal-item">
                <div class="text-center mb-5">
                    <h2 class="font-pattaya text-3xl sm:text-4xl text-imperial-900">Sổ lưu bút</h2>
                    <div class="ornament-divider-blue my-2.5">
                        <div></div>
                        <span>❦</span>
                        <div></div>
                    </div>
                    <p class="text-xs text-imperial-700 mt-1">
                        Cảm ơn bạn rất nhiều vì đã gửi những lời chúc mừng tốt đẹp nhất đến đám cưới của {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}!
                    </p>
                </div>

                <!-- Wish Submission Form -->
                <form id="wish-form" onsubmit="submitWish(event)" class="space-y-3 text-xs sm:text-sm mb-6">
                    <div>
                        <input 
                            type="text" 
                            id="wish-name" 
                            name="sender_name"
                            required 
                            placeholder="Nhập họ tên của bạn *" 
                            class="w-full px-4 py-2.5 rounded-xl border border-imperial-200 bg-imperial-50/40 focus:outline-none focus:ring-2 focus:ring-imperial-700"
                        >
                    </div>

                    <!-- RSVP Attendance Status -->
                    <div>
                        <label class="block text-imperial-900 font-semibold mb-1.5 text-xs">Xác nhận tham dự</label>
                        <div class="grid grid-cols-3 gap-2 text-xs">
                            <label class="flex items-center justify-center gap-1 border border-imperial-300 rounded-xl py-2 px-1 cursor-pointer has-[:checked]:bg-imperial-700 has-[:checked]:text-white has-[:checked]:border-imperial-700 transition">
                                <input type="radio" name="attendance_status" value="attending" checked onchange="toggleGuestCount29(this.value)" class="hidden">
                                <span>🌿 Tham dự</span>
                            </label>
                            <label class="flex items-center justify-center gap-1 border border-imperial-300 rounded-xl py-2 px-1 cursor-pointer has-[:checked]:bg-imperial-700 has-[:checked]:text-white has-[:checked]:border-imperial-700 transition">
                                <input type="radio" name="attendance_status" value="not_attending" onchange="toggleGuestCount29(this.value)" class="hidden">
                                <span>💌 Bận rồi</span>
                            </label>
                            <label class="flex items-center justify-center gap-1 border border-imperial-300 rounded-xl py-2 px-1 cursor-pointer has-[:checked]:bg-imperial-700 has-[:checked]:text-white has-[:checked]:border-imperial-700 transition">
                                <input type="radio" name="attendance_status" value="unsure" onchange="toggleGuestCount29(this.value)" class="hidden">
                                <span>🤔 Chưa rõ</span>
                            </label>
                        </div>
                    </div>

                    <!-- Guest Count -->
                    <div id="guest-count-wrapper-29">
                        <label class="block text-imperial-900 font-semibold mb-1 text-xs">Số người tham dự</label>
                        <select id="wish-guest-count" name="guest_count" class="w-full px-3.5 py-2.5 rounded-xl border border-imperial-200 bg-imperial-50/40 text-imperial-900 focus:outline-none focus:ring-2 focus:ring-imperial-700">
                            <option value="1">1 người (Chỉ mình tôi)</option>
                            <option value="2" selected>2 người (Đi cùng người thương)</option>
                            <option value="3">3 người (Gia đình / Bạn bè)</option>
                            <option value="4">4+ người (Cả gia đình)</option>
                        </select>
                    </div>

                    <div>
                        <textarea 
                            id="wish-message" 
                            name="message"
                            rows="3" 
                            required 
                            placeholder="Nhập lời chúc của bạn *" 
                            class="w-full px-4 py-2.5 rounded-xl border border-imperial-200 bg-imperial-50/40 focus:outline-none focus:ring-2 focus:ring-imperial-700"
                        ></textarea>
                    </div>
                    <button id="wish-submit-btn" type="submit" class="btn-imperial-blue w-full py-3 rounded-xl font-semibold uppercase tracking-wider text-xs sm:text-sm cursor-pointer flex items-center justify-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span>Gửi lời chúc &amp; Xác nhận</span>
                    </button>
                </form>

                <!-- Live Wishes List -->
                <div id="wishes-container" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                    <!-- Rendered by JS -->
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 7: HỘP QUÀ MỪNG (QR GIFT BOX)                          -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-6 text-center">
            <div class="royal-blue-brocade text-ivory-50 rounded-3xl p-6 sm:p-8 imperial-gold-frame shadow-2xl reveal-item relative overflow-hidden">
                <div onclick="toggleGiftModal(true)" class="w-16 h-16 mx-auto rounded-full bg-gold-400/20 border border-gold-300 flex items-center justify-center text-gold-300 text-2xl mb-3 cursor-pointer hover:scale-110 transition">
                    <i class="fa-solid fa-gift"></i>
                </div>
                <h3 class="font-pattaya text-3xl text-gold-metallic">Hộp Quà Mừng</h3>
                <p class="text-xs text-ivory-100/85 max-w-xs mx-auto mt-2 leading-relaxed">
                    Cảm ơn tình cảm quý báu của Quý khách dành cho {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}. Chạm vào bên dưới để mở Hộp Quà Mừng:
                </p>
                <button onclick="toggleGiftModal(true)" class="btn-imperial-gold mt-5 px-7 py-3 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider inline-flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-qrcode"></i>
                    <span>Mở Hộp Quà Mừng</span>
                </button>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- FOOTER                                                        -->
        <!-- ============================================================= -->
        <footer class="relative royal-blue-brocade text-ivory-50 py-14 px-6 text-center border-t-2 border-gold-400/50 overflow-hidden">
            <img src="https://chungdoi.com/images/themes/songlong-red/chinese_happiness.webp" alt="囍" class="w-14 h-14 object-contain mx-auto mb-3">
            <h2 class="font-pattaya text-3xl sm:text-4xl text-gold-metallic">{{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}</h2>
            <p class="font-serif italic text-sm sm:text-base text-gold-200/90 mt-3 max-w-xs mx-auto leading-relaxed">
                {{ $weddingCard->message_thanks ?: 'Sự hiện diện của quý khách là niềm vinh hạnh của gia đình chúng tôi!' }}
            </p>
            {{-- <div class="mt-5 pb-6">
                <a href="https://chungdoi.com" target="_blank" rel="noopener noreferrer" class="inline-block text-xs text-gold-300 hover:text-white font-medium tracking-wider">
                    ♡ chungdoi.com
                </a>
            </div> --}}

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
                <p class="text-xs text-imperial-600 mt-1">Quét mã QR hoặc sao chép số tài khoản ngân hàng</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Chú Rể - {{ $weddingCard->groom_name }} -->
                <div class="bg-white rounded-2xl p-3.5 border border-gold-400/60 text-center shadow-sm">
                    <span class="text-[10px] uppercase tracking-wider font-bold px-2.5 py-0.5 rounded-full bg-imperial-900 text-gold-200">
                        Chú Rể
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
                        Cô Dâu
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
            <p class="text-xs text-imperial-600 mt-1 mb-4">Tên khách mời hiển thị ở mục "Thân Mời" ngoài bìa thiệp.</p>
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
         * C. ALBUM ẢNH CAROUSEL & LIGHTBOX
         * --------------------------------------------------------------- */
        const defaultPhotos = [
            'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=85',
            'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1000&q=85',
            'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=1000&q=85',
            'https://images.unsplash.com/photo-1606800052052-a08af7148866?auto=format&fit=crop&w=1000&q=85',
            'https://images.unsplash.com/photo-1537633552985-df8429e8048b?auto=format&fit=crop&w=1000&q=85',
            'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=1000&q=85',
            'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=1000&q=85',
            'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?auto=format&fit=crop&w=1000&q=85'
        ];
        const dbPhotos = {!! $albumPhotosJson ?: '[]' !!};
        const albumPhotos = (Array.isArray(dbPhotos) && dbPhotos.length > 0) ? dbPhotos : defaultPhotos;
        let currentSlideIndex = 0;

        function renderThumbnails() {
            const thumbStrip = document.getElementById('carousel-thumbs');
            if (!thumbStrip) return;
            thumbStrip.innerHTML = albumPhotos.map((url, idx) => `
                <button 
                    type="button"
                    onclick="selectSlide(${idx})" 
                    class="aspect-square rounded-xl overflow-hidden border-2 transition cursor-pointer ${idx === currentSlideIndex ? 'border-gold-500 scale-105 shadow-md' : 'border-transparent opacity-60 hover:opacity-100'}"
                >
                    <img src="${url}" alt="Thumb ${idx + 1}" class="w-full h-full object-cover" onerror="this.src='https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=300&q=80'">
                </button>
            `).join('');
        }

        function selectSlide(idx) {
            if (!albumPhotos || albumPhotos.length === 0) return;
            currentSlideIndex = (idx + albumPhotos.length) % albumPhotos.length;
            const mainImg = document.getElementById('carousel-main-img');
            const counter = document.getElementById('carousel-counter');
            if (mainImg) mainImg.src = albumPhotos[currentSlideIndex];
            if (counter) counter.textContent = `${currentSlideIndex + 1} / ${albumPhotos.length}`;
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
         * D. SỔ LƯU BÚT & XÁC NHẬN THAM DỰ (DỮ LIỆU TỪ DATABASE)
         * --------------------------------------------------------------- */
        @php
            $cardWishes29 = $weddingCard->wishes()->approved()->latest()->take(30)->get()->map(function($w) {
                return [
                    'name' => $w->sender_name,
                    'time' => $w->created_at ? $w->created_at->diffForHumans() : 'Vừa xong',
                    'message' => $w->message,
                    'attendance_status' => $w->attendance_status,
                    'guest_count' => $w->guest_count,
                ];
            });
        @endphp
        const wishesList = @json($cardWishes29, JSON_UNESCAPED_UNICODE);
        const wishStoreUrl29 = "{{ route('wishes.store', $weddingCard->id) }}";
        const csrfToken29 = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

        function toggleGuestCount29(val) {
            const wrap = document.getElementById('guest-count-wrapper-29');
            if (wrap) wrap.style.display = (val === 'not_attending') ? 'none' : 'block';
        }

        function escapeHtml(str) {
            return String(str || '').replace(/[&<>"']/g, s => ({
                '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
            }[s]));
        }

        function getBadgeHtml29(status, count) {
            if (status === 'attending') {
                const countText = (count && count > 1) ? ` (${count} người)` : '';
                return `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-emerald-100 text-emerald-800 border border-emerald-300 ml-1.5">✓ Tham dự${countText}</span>`;
            } else if (status === 'not_attending') {
                return `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-rose-100 text-rose-800 border border-rose-300 ml-1.5">✕ Bận việc</span>`;
            } else if (status === 'unsure') {
                return `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-slate-100 text-slate-700 border border-slate-300 ml-1.5">? Chưa rõ</span>`;
            }
            return '';
        }

        function renderWishes() {
            const container = document.getElementById('wishes-container');
            if (!wishesList || wishesList.length === 0) {
                container.innerHTML = `<p class="text-xs text-center text-imperial-600 italic py-4">Hãy là người đầu tiên gửi lời chúc và xác nhận tham dự!</p>`;
                return;
            }
            container.innerHTML = wishesList.map(item => `
                <div class="bg-imperial-50/75 rounded-2xl p-3.5 border border-imperial-200 shadow-sm text-left">
                    <div class="flex items-center justify-between gap-2">
                        <div class="flex items-center flex-wrap">
                            <span class="font-bold text-imperial-900 text-xs sm:text-sm">${escapeHtml(item.name)}</span>
                            ${getBadgeHtml29(item.attendance_status, item.guest_count)}
                        </div>
                        <span class="text-[10px] text-imperial-500 whitespace-nowrap">${escapeHtml(item.time)}</span>
                    </div>
                    <p class="text-xs sm:text-sm text-imperial-800 mt-1.5 leading-relaxed">${escapeHtml(item.message)}</p>
                </div>
            `).join('');
        }

        function submitWish(e) {
            e.preventDefault();
            const nameInput = document.getElementById('wish-name');
            const msgInput = document.getElementById('wish-message');
            const submitBtn = document.getElementById('wish-submit-btn');
            const name = nameInput.value.trim();
            const message = msgInput.value.trim();
            if (!name || !message) return;

            const attRadio = document.querySelector('input[name="attendance_status"]:checked');
            const attendanceStatus = attRadio ? attRadio.value : 'attending';
            const guestCount = (attendanceStatus === 'not_attending') ? 1 : (parseInt(document.getElementById('wish-guest-count')?.value) || 1);

            const originalBtnHtml = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i><span>Đang gửi...</span>';

            fetch(wishStoreUrl29, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken29
                },
                body: JSON.stringify({
                    sender_name: name,
                    message: message,
                    attendance_status: attendanceStatus,
                    guest_count: guestCount
                })
            })
            .then(res => res.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;

                if (data && data.success) {
                    wishesList.unshift({
                        name: name,
                        time: 'Vừa xong',
                        message: message,
                        attendance_status: attendanceStatus,
                        guest_count: guestCount
                    });
                    renderWishes();
                    msgInput.value = '';
                    showToast(data.message || 'Cảm ơn lời chúc của bạn! ❦');
                } else {
                    showToast((data && data.message) ? data.message : 'Có lỗi xảy ra, vui lòng thử lại.');
                }
            })
            .catch(err => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;
                console.error(err);
                showToast('Lỗi kết nối, vui lòng thử lại sau.');
            });
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
        const weddingAudio = document.getElementById('weddingAudio');
        let isMusicPlaying = false;

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

        if (weddingAudio) {
            weddingAudio.onplay = () => {
                isMusicPlaying = true;
                updateMusicUI();
            };
            weddingAudio.onpause = () => {
                isMusicPlaying = false;
                updateMusicUI();
            };
        }

        function startMusic() {
            if (weddingAudio) {
                weddingAudio.play().then(() => {
                    isMusicPlaying = true;
                    updateMusicUI();
                }).catch(e => {
                    console.warn('Web Audio / Autoplay prevented:', e);
                });
            }
        }

        function stopMusic() {
            if (weddingAudio) {
                weddingAudio.pause();
                isMusicPlaying = false;
                updateMusicUI();
            }
        }

        function toggleMusic() {
            if (!weddingAudio) return;
            if (weddingAudio.paused) {
                weddingAudio.play().then(() => {
                    showToast('Đang phát giai điệu lễ cưới ♪');
                }).catch(e => {
                    console.warn('Playback blocked:', e);
                });
            } else {
                weddingAudio.pause();
                showToast('Đã tạm dừng nhạc nền');
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
            selectSlide(0);
            renderWishes();
            initCountdown();
            triggerScrollReveal();
        };
    </script>
</body>
</html>