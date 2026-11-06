<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $weddingCard->couple_name }} - Thiệp Cưới Online</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Great+Vibes&family=Pattaya&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        marble: {
                            50: '#fdfcf9',
                            100: '#fcfaf5',
                            200: '#f7f1e3',
                            300: '#efe4cc',
                            400: '#e2cfa8',
                        },
                        gold: {
                            100: '#fbf3db',
                            200: '#f5e2a8',
                            300: '#e6c875',
                            400: '#d4af37',
                            500: '#c59b27',
                            600: '#9a7418',
                            700: '#785810',
                            800: '#563e0a',
                            900: '#382705',
                        },
                        bronze: {
                            950: '#231808',
                            900: '#2f220d',
                            800: '#4a3718',
                            700: '#664d25',
                            600: '#846636',
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
            --marble-cream: #fcfaf5;
            --gold-primary: #c59b27;
            --gold-bright: #d4af37;
            --gold-deep: #9a7418;
            --bronze-dark: #2f220d;
            --bronze-main: #4a3718;
        }

        body {
            background-color: #ebe3d2;
            color: var(--bronze-dark);
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
            -webkit-tap-highlight-color: transparent;
        }

        /* Authentic ChungDoi Marble-Yellow Texture Background */
        .marble-surface {
            background-color: var(--marble-cream);
            background-image: 
                linear-gradient(180deg, rgba(252, 250, 245, 0.86) 0%, rgba(247, 241, 227, 0.82) 50%, rgba(252, 250, 245, 0.88) 100%),
                url('https://chungdoi.com/images/themes/marble-yellow/marble.webp');
            background-size: cover;
            background-position: center;
            background-attachment: local;
        }

        .marble-card-surface {
            background-color: #ffffff;
            background-image: 
                linear-gradient(135deg, rgba(255, 255, 255, 0.94) 0%, rgba(252, 249, 240, 0.9) 100%),
                url('https://chungdoi.com/images/themes/marble-yellow/marble.webp');
            background-size: cover;
            background-position: center;
        }

        /* Metallic Gold Foil Text Gradient */
        .text-gold-foil {
            background: linear-gradient(135deg, #8a6412 0%, #c59b27 32%, #e8c967 52%, #b5891c 75%, #78560d 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Luxury Double Gold Frame */
        .gold-luxury-frame {
            border: 1.5px solid rgba(197, 155, 39, 0.55);
            box-shadow: 
                0 18px 45px rgba(74, 55, 24, 0.12),
                inset 0 0 0 5px rgba(255, 255, 255, 0.65),
                inset 0 0 0 6.5px rgba(197, 155, 39, 0.35);
        }

        /* Gentle Sway Animations for leaf-1.webp & leaf-2.webp */
        @keyframes leafSwayLeft {
            0%, 100% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(3.2deg) scale(1.03); }
        }
        @keyframes leafSwayRight {
            0%, 100% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(-3.2deg) scale(1.03); }
        }
        @keyframes medallionFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-4px) rotate(2deg); }
        }

        .anim-leaf-left {
            animation: leafSwayLeft 6.5s ease-in-out infinite;
            transform-origin: top left;
        }
        .anim-leaf-right {
            animation: leafSwayRight 7s ease-in-out infinite;
            transform-origin: bottom right;
        }
        .anim-medallion {
            animation: medallionFloat 4.5s ease-in-out infinite;
        }

        /* =========================================================
         * VINTAGE SCRAPBOOK POLAROID HERO SECTION (THE WEDDING OF)
         * ========================================================= */
        .vintage-paper-hero {
            background-color: #f7f3ec;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(139, 109, 88, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(139, 109, 88, 0.06) 0%, transparent 50%),
                url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.035'/%3E%3C/svg%3E");
            position: relative;
        }

        .vintage-polaroid-card {
            background: #ffffff;
            padding: 12px 12px 34px 12px;
            border-radius: 2px;
            box-shadow: 
                0 18px 40px rgba(74, 55, 30, 0.22),
                0 4px 12px rgba(0, 0, 0, 0.06),
                inset 0 0 0 1px rgba(0, 0, 0, 0.04);
            transform: rotate(-3.5deg);
            transition: transform 0.5s cubic-bezier(0.2, 1, 0.3, 1), box-shadow 0.4s ease;
            position: relative;
            cursor: pointer;
        }

        .vintage-polaroid-card:hover {
            transform: rotate(0deg) scale(1.02);
            box-shadow: 
                0 24px 50px rgba(74, 55, 30, 0.28),
                0 6px 16px rgba(0, 0, 0, 0.08);
            z-index: 10;
        }

        /* Top Washi Tape with torn edges */
        .washi-tape-top {
            position: absolute;
            top: -14px;
            left: 50%;
            transform: translateX(-50%) rotate(0.6deg);
            width: 126px;
            height: 32px;
            background: rgba(206, 185, 156, 0.85);
            background-image: 
                repeating-linear-gradient(45deg, rgba(255,255,255,0.12) 0px, rgba(255,255,255,0.12) 2px, transparent 2px, transparent 4px),
                linear-gradient(180deg, rgba(218, 196, 168, 0.9) 0%, rgba(188, 164, 134, 0.82) 100%);
            clip-path: polygon(
                0% 12%, 3% 0%, 97% 0%, 100% 10%, 
                98% 30%, 100% 50%, 97% 70%, 100% 90%, 
                97% 100%, 3% 100%, 0% 88%, 3% 68%, 
                0% 48%, 2% 28%
            );
            box-shadow: 0 2px 6px rgba(60, 42, 25, 0.16);
            backdrop-filter: blur(1.5px);
            z-index: 5;
            pointer-events: none;
        }

        /* Stem Washi Tape */
        .washi-tape-stem {
            position: absolute;
            bottom: 6px;
            left: -12px;
            width: 58px;
            height: 22px;
            transform: rotate(-14deg);
            background: rgba(206, 185, 156, 0.85);
            background-image: 
                repeating-linear-gradient(45deg, rgba(255,255,255,0.12) 0px, rgba(255,255,255,0.12) 2px, transparent 2px, transparent 4px),
                linear-gradient(180deg, rgba(218, 196, 168, 0.9) 0%, rgba(188, 164, 134, 0.82) 100%);
            clip-path: polygon(
                0% 15%, 4% 0%, 96% 0%, 100% 12%, 
                98% 35%, 100% 55%, 97% 75%, 100% 95%, 
                96% 100%, 4% 100%, 0% 85%, 3% 65%, 
                0% 45%, 2% 25%
            );
            box-shadow: 0 2px 5px rgba(60, 42, 25, 0.16);
            backdrop-filter: blur(1.5px);
            z-index: 6;
            pointer-events: none;
        }

        /* Realistic Melted Gold Wax Seal */
        .vintage-wax-seal {
            position: absolute;
            right: -16px;
            bottom: -18px;
            width: 66px;
            height: 66px;
            border-radius: 48% 52% 49% 51% / 53% 47% 53% 47%;
            background: radial-gradient(circle at 34% 30%, #fae6be 0%, #dbb264 36%, #a87e2b 70%, #724e12 100%);
            box-shadow: 
                0 8px 18px rgba(55, 38, 15, 0.38),
                inset 0 2px 3px rgba(255, 250, 220, 0.7),
                inset 0 -3px 5px rgba(60, 35, 6, 0.65);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 6;
            user-select: none;
            transition: transform 0.3s ease;
        }

        .vintage-wax-seal:hover {
            transform: scale(1.08) rotate(5deg);
        }

        .vintage-wax-seal-inner {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 1.5px dashed rgba(118, 80, 16, 0.55);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: inset 0 2px 4px rgba(70, 45, 10, 0.45);
        }

        .wax-seal-monogram {
            font-family: 'Great Vibes', 'Cormorant Garamond', cursive;
            font-size: 1.65rem;
            line-height: 1;
            font-weight: 700;
            color: #6a4911;
            text-shadow: 
                1px 1px 0 rgba(255, 248, 220, 0.55),
                -1px -1px 0 rgba(70, 45, 10, 0.5);
            letter-spacing: 1px;
            transform: rotate(-4deg);
        }

        /* =========================================================
         * 12 FLOATING GOLDEN PETALS LAYER (EXACT DEMO DOM)
         * ========================================================= */
        .floating-gold-layer {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 35;
            overflow: hidden;
            transition: opacity 0.4s ease;
        }
        .floating-gold-layer.effects-off {
            opacity: 0;
        }
        .floating-gold-petal {
            position: absolute;
            top: -10%;
            width: 13px;
            height: 17px;
            background: radial-gradient(circle at 30% 30%, #f5e2a8, #c59b27 72%, #9a7418 100%);
            border-radius: 75% 0 75% 45%;
            opacity: 0.55;
            box-shadow: 0 2px 8px rgba(154, 116, 24, 0.28);
            animation: fallGoldPetal linear infinite;
        }
        .floating-gold-petal:nth-child(even) {
            width: 10px;
            height: 13px;
            background: radial-gradient(circle at 35% 35%, #fff8e1, #dfc06c 80%);
            border-radius: 60% 25% 60% 25%;
            opacity: 0.48;
        }
        @keyframes fallGoldPetal {
            0% {
                transform: translate3d(0, -6vh, 0) rotate(0deg) rotateX(0deg);
                opacity: 0;
            }
            14% {
                opacity: 0.72;
            }
            50% {
                transform: translate3d(22px, 50vh, 0) rotate(180deg) rotateX(135deg);
            }
            88% {
                opacity: 0.55;
            }
            100% {
                transform: translate3d(-16px, 108vh, 0) rotate(360deg) rotateX(310deg);
                opacity: 0;
            }
        }

        /* =========================================================
         * 3D SPLIT-GATE COVER SCREEN (MÀN HÌNH MỞ THIỆP CẨM THẠCH VÀNG)
         * ========================================================= */
        #invitation-gate {
            position: fixed;
            inset: 0;
            z-index: 100;
            perspective: 1600px;
            transition: visibility 1.2s ease, opacity 1.1s ease;
        }
        #invitation-gate.gate-opened {
            pointer-events: none;
            visibility: hidden;
            opacity: 0;
            transition-delay: 0.9s;
        }
        .gate-door-left,
        .gate-door-right {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 50.2%;
            background-color: #f8f2e4;
            background-image: 
                linear-gradient(135deg, rgba(252, 250, 245, 0.92), rgba(239, 228, 204, 0.88)),
                url('https://chungdoi.com/images/themes/marble-yellow/marble.webp');
            background-size: cover;
            transition: transform 1.28s cubic-bezier(0.68, 0, 0.15, 1);
            z-index: 10;
            overflow: hidden;
        }
        .gate-door-left {
            left: 0;
            border-right: 1.5px solid rgba(197, 155, 39, 0.55);
            transform-origin: left center;
        }
        .gate-door-right {
            right: 0;
            border-left: 1.5px solid rgba(197, 155, 39, 0.55);
            transform-origin: right center;
        }
        #invitation-gate.gate-opened .gate-door-left {
            transform: translateX(-103%) rotateY(-12deg);
        }
        #invitation-gate.gate-opened .gate-door-right {
            transform: translateX(103%) rotateY(12deg);
        }
        .gate-cover-card {
            transition: transform 0.85s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.65s ease;
        }
        #invitation-gate.gate-opened .gate-cover-card {
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
            background: linear-gradient(90deg, transparent, #c59b27, transparent);
        }
        .ornament-divider span {
            color: #b5891c;
            font-size: 1.22rem;
            line-height: 1;
        }

        /* Gold Foil Primary Button ("Mở thiệp") */
        .btn-marble-gold {
            background: linear-gradient(135deg, #dfbe5b 0%, #c59b27 50%, #9a7418 100%);
            color: #ffffff;
            box-shadow: 0 10px 26px -4px rgba(154, 116, 24, 0.5), inset 0 1px 1px rgba(255, 255, 255, 0.6);
            position: relative;
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .btn-marble-gold:hover {
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 14px 32px -4px rgba(154, 116, 24, 0.68);
        }
        .btn-marble-gold::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 45%;
            height: 200%;
            background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.55) 50%, rgba(255,255,255,0) 100%);
            transform: rotate(25deg);
            animation: shimmerGoldBtn 3.2s infinite;
        }
        @keyframes shimmerGoldBtn {
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

        /* Heartbeat Pulse for Wedding Day 14 on Calendar */
        @keyframes pulseHeartDay14 {
            0%, 100% { transform: scale(1); }
            35% { transform: scale(1.16); }
            65% { transform: scale(0.95); }
        }
        .animate-pulse-day {
            animation: pulseHeartDay14 1.9s infinite ease-in-out;
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
            background: #fcfaf5;
        }
        ::-webkit-scrollbar-thumb {
            background: #c59b27;
            border-radius: 3px;
        }
    </style>
</head>
<body class="min-h-screen selection:bg-gold-500 selection:text-white">
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
        $dayOfWeekVi = $weddingCard->wedding_date ? $weddingCard->wedding_date->locale('vi')->dayName : 'Chủ Nhật';
        $wDate = $weddingCard->wedding_date;
        $dayNum = $wDate ? $wDate->format('d') : '14';
        $monthNum = $wDate ? $wDate->format('m') : '02';
        $yearNum = $wDate ? $wDate->format('Y') : '2027';
        $timeStr = !empty($weddingCard->wedding_time) ? trim($weddingCard->wedding_time) : '18:00';
        $timeStrShort = preg_match('/^\d{1,2}:\d{2}/', $timeStr, $m) ? $m[0] : '18:00';

        $timelineEvents = is_array($weddingCard->timeline) ? $weddingCard->timeline : (is_string($weddingCard->timeline) ? json_decode($weddingCard->timeline, true) : null);
        if (empty($timelineEvents) && !empty($weddingCard->timeline_list)) {
            $timelineEvents = $weddingCard->timeline_list;
        }
        if (empty($timelineEvents)) {
            $timelineEvents = [
                ['time' => '07:30', 'title' => 'Lễ Rước Dâu', 'icon' => 'fa-car-side'],
                ['time' => '09:00', 'title' => 'Lễ Gia Tiên', 'icon' => 'fa-heart'],
                ['time' => '11:00', 'title' => 'Đón Khách', 'icon' => 'fa-camera-retro'],
                ['time' => '11:30', 'title' => 'Hôn Lễ Chính Thức', 'icon' => 'fa-ring'],
                ['time' => '12:00', 'title' => 'Khai Tiệc', 'icon' => 'fa-utensils'],
            ];
        }

        $dressCodes = !empty($weddingCard->dresscode_colors_list) 
            ? $weddingCard->dresscode_colors_list 
            : (!empty($weddingCard->dresscode_colors) 
                ? (is_array($weddingCard->dresscode_colors) ? $weddingCard->dresscode_colors : (is_string($weddingCard->dresscode_colors) ? json_decode($weddingCard->dresscode_colors, true) : null))
                : (!empty($weddingCard->dress_code) 
                    ? (is_array($weddingCard->dress_code) ? $weddingCard->dress_code : (is_string($weddingCard->dress_code) ? json_decode($weddingCard->dress_code, true) : null))
                    : null));

        if (empty($dressCodes)) {
            $dressCodes = [
                ['hex' => '#d4af37', 'name' => 'Vàng Gold'],
                ['hex' => '#fcfaf5', 'name' => 'Trắng Kem'],
                ['hex' => '#d8c3a5', 'name' => 'Be Champagne'],
            ];
        }

        $heroBannerTop = !empty($weddingCard->banner_top) 
            ? (str_starts_with($weddingCard->banner_top, 'http') ? $weddingCard->banner_top : asset('storage/' . $weddingCard->banner_top)) 
            : (!empty($weddingCard->banner_preview) 
                ? (str_starts_with($weddingCard->banner_preview, 'http') ? $weddingCard->banner_preview : asset('storage/' . $weddingCard->banner_preview))
                : 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=900&q=85');

        // Extract initials for Wax Seal Monogram (e.g., Thành & Ngọc -> TN)
        $groomWords = preg_split('/\s+/', trim($weddingCard->groom_name ?? ''));
        $brideWords = preg_split('/\s+/', trim($weddingCard->bride_name ?? ''));
        $groomFirstChar = !empty($groomWords) ? mb_substr(end($groomWords), 0, 1, 'UTF-8') : 'T';
        $brideFirstChar = !empty($brideWords) ? mb_substr(end($brideWords), 0, 1, 'UTF-8') : 'N';
        $monogramText = mb_strtoupper($groomFirstChar . $brideFirstChar);

        $albumData = !empty($weddingCard->album) ? (is_string($weddingCard->album) ? json_decode($weddingCard->album, true) : $weddingCard->album) : [];
        $albumPhotosArray = (!empty($albumData) && is_array($albumData)) ? array_values(array_map(function($img) {
            return str_starts_with($img, 'http') ? $img : asset('storage/' . $img);
        }, $albumData)) : [];
        if (!empty($heroBannerTop) && !in_array($heroBannerTop, $albumPhotosArray)) {
            array_unshift($albumPhotosArray, $heroBannerTop);
        }
        $albumPhotosJson = json_encode($albumPhotosArray);

        $leadEmpty = ($cal['start_day_of_week'] == 0) ? 6 : ($cal['start_day_of_week'] - 1);
        $groomStk = $weddingCard->groom_bank_account ?: ($weddingCard->groom_bank_number ?: '0000000000');
        $brideStk = $weddingCard->bride_bank_account ?: ($weddingCard->bride_bank_number ?: '0000000000');
        $groomBankName = $weddingCard->groom_bank_name ?: 'Vietcombank';
        $brideBankName = $weddingCard->bride_bank_name ?: 'Techcombank';
        $groomOwner = $weddingCard->groom_bank_owner ?: $weddingCard->groom_name;
        $brideOwner = $weddingCard->bride_bank_owner ?: $weddingCard->bride_name;

        $groomQrUrl = $weddingCard->groom_qr_url;
        $brideQrUrl = $weddingCard->bride_qr_url;

        $groomAvatarSrc = !empty($weddingCard->groom_avatar) ? (str_starts_with($weddingCard->groom_avatar, 'http') ? $weddingCard->groom_avatar : asset('storage/' . $weddingCard->groom_avatar)) : 'https://assets.chungdoi.com/photo-library/design/53fe1ac6520c377e14384b2940cb1edca37668313fa366532c6b50c57cc5e6ba.webp';
        $brideAvatarSrc = !empty($weddingCard->bride_avatar) ? (str_starts_with($weddingCard->bride_avatar, 'http') ? $weddingCard->bride_avatar : asset('storage/' . $weddingCard->bride_avatar)) : 'https://assets.chungdoi.com/photo-library/design/9428e6bdde0a685c2ad1fac40d343b5d50cd9c415610dfd0dec4d222f65b136c.webp';
    @endphp

    <!-- Golden Dust Sparkles Canvas -->
    <canvas id="marble-gold-canvas" class="fixed inset-0 pointer-events-none z-20"></canvas>

    <!-- 12 Floating Golden Petals Layer (Exact ChungĐôi DOM structure: 12 child <div>s) -->
    <div class="floating-gold-layer" id="floating-petals-container" aria-hidden="true"></div>

    <!-- ================================================================= -->
    <!-- 1. 3D SPLIT-GATE COVER SCREEN (MÀN HÌNH MỞ THIỆP CẨM THẠCH VÀNG)  -->
    <!-- ================================================================= -->
    <div id="invitation-gate" class="flex items-center justify-center p-4 sm:p-6">
        <!-- Left & Right Marble Curtain Doors -->
        <div class="gate-door-left">
            <div class="h-full w-full opacity-25 flex items-center justify-end pr-4 select-none">
                <img src="https://chungdoi.com/images/themes/marble-yellow/leaf-1.webp" alt="" class="w-44 h-auto object-contain" onerror="this.style.display='none'">
            </div>
        </div>
        <div class="gate-door-right">
            <div class="h-full w-full opacity-25 flex items-center justify-start pl-4 select-none">
                <img src="https://chungdoi.com/images/themes/marble-yellow/leaf-2.webp" alt="" class="w-44 h-auto object-contain" onerror="this.style.display='none'">
            </div>
        </div>

        <!-- Center Cover Card (Exact ChungĐôi Cẩm Thạch Vàng DOM structure) -->
        <div class="gate-cover-card relative z-20 w-full max-w-[430px] marble-card-surface rounded-[28px] p-7 sm:p-10 text-center gold-luxury-frame overflow-hidden">
            
            <!-- Authentic Marble Background Image Layer & Corner Golden Leaves (leaf-1.webp & leaf-2.webp) -->
            <img 
                src="https://chungdoi.com/images/themes/marble-yellow/marble.webp" 
                alt="" 
                aria-hidden="true"
                class="absolute inset-0 w-full h-full object-cover opacity-35 pointer-events-none select-none"
                onerror="this.style.display='none'"
            >
            <img 
                src="https://chungdoi.com/images/themes/marble-yellow/leaf-1.webp" 
                alt="" 
                aria-hidden="true"
                class="anim-leaf-left absolute -top-4 -left-4 w-36 sm:w-44 pointer-events-none select-none opacity-95"
                onerror="this.style.display='none'"
            >
            <img 
                src="https://chungdoi.com/images/themes/marble-yellow/leaf-2.webp" 
                alt="" 
                aria-hidden="true"
                class="anim-leaf-right absolute -bottom-4 -right-4 w-36 sm:w-44 pointer-events-none select-none opacity-95"
                onerror="this.style.display='none'"
            >

            <!-- Golden Crest Icon -->
            <div class="relative z-10 mx-auto w-14 h-14 rounded-full bg-gold-100/90 border border-gold-400/60 flex items-center justify-center mb-4 shadow-sm">
                <span class="text-gold-600 font-serif text-2xl">❦</span>
            </div>

            <p class="relative z-10 text-[11px] uppercase tracking-[0.35em] text-gold-700 font-semibold mb-3">
                Save The Date
            </p>

            <!-- Exact Cover Heading: <h1><span>{{ $weddingCard->groom_name }}</span><span>&</span><span>{{ $weddingCard->bride_name }}</span></h1> -->
            <h1 class="relative z-10 my-2 flex flex-col items-center justify-center space-y-1">
                <span class="font-pattaya text-4xl sm:text-5xl text-gold-foil py-0.5 drop-shadow-sm">{{ $weddingCard->groom_name }}</span>
                <span class="font-serif italic text-2xl text-gold-600 my-0.5">&amp;</span>
                <span class="font-pattaya text-4xl sm:text-5xl text-gold-foil py-0.5 drop-shadow-sm">{{ $weddingCard->bride_name }}</span>
            </h1>

            <!-- Exact Ornamental Divider: <div><div></div><span>❦</span><div></div></div> -->
            <div class="ornament-divider my-5 relative z-10">
                <div></div>
                <span>❦</span>
                <div></div>
            </div>

            <!-- Exact Date -->
            <p class="relative z-10 font-serif text-xl sm:text-2xl text-bronze-900 font-bold tracking-widest mb-5" dir="auto">
                {{ $dayNum }} tháng {{ $monthNum }}, {{ $yearNum }}
            </p>

            <!-- Personalized Guest Invitation Badge ("Thân Mời") -->
            <div class="relative z-10 bg-marble-100/95 border border-gold-400/60 rounded-2xl px-5 py-3.5 mb-7 max-w-xs mx-auto shadow-inner">
                <p class="text-xs uppercase tracking-[0.28em] text-gold-700 font-bold" dir="auto">
                    Thân Mời
                </p>
                <p id="cover-guest-name" class="font-serif text-lg sm:text-xl text-bronze-900 font-bold tracking-wide mt-1">
                    Quý Khách &amp; Gia Đình
                </p>
            </div>

            <!-- Exact Open Invitation Button: <a href="?open=1"><span>Mở thiệp</span><div></div></a> -->
            <div class="relative z-10">
                <a href="?open=1" id="btn-open-card" onclick="openInvitation(event)" rel="nofollow" class="btn-marble-gold px-10 py-3.5 rounded-full font-bold text-sm tracking-[0.18em] uppercase inline-flex items-center gap-3 cursor-pointer">
                    <i class="fa-regular fa-envelope-open text-base"></i>
                    <span dir="auto">Mở thiệp</span>
                    <div></div>
                </a>
            </div>

            <p class="relative z-10 text-[11px] text-bronze-700/75 mt-4 italic">
                Chạm để mở thiệp &amp; thưởng thức giai điệu tình yêu
            </p>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- 2. MAIN WEDDING INVITATION CONTENT (?open=1 STATE)                -->
    <!-- ================================================================= -->
    <main id="main-invitation" class="relative z-10 max-w-[520px] mx-auto shadow-[0_0_90px_rgba(47,34,13,0.22)] marble-surface border-x border-gold-400/45 overflow-hidden">

        <!-- Sticky Top Bar: Template Info & Guest Name Switcher -->
        {{-- <div class="sticky top-0 z-30 bg-marble-100/95 backdrop-blur-md border-b border-gold-300/60 px-4 py-2.5 flex items-center justify-between text-xs text-bronze-800">
            <div class="flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-gold-500"></span>
                <span>Mẫu thiệp: <strong class="font-bold text-bronze-900">Cẩm Thạch Vàng</strong></span>
            </div>
            <div class="flex items-center gap-3">
                <button onclick="reopenCoverGate()" class="text-gold-700 hover:text-bronze-950 underline font-medium flex items-center gap-1 cursor-pointer">
                    <i class="fa-regular fa-envelope text-[10px]"></i> Bìa thiệp
                </button>
                <button onclick="openGuestModal()" class="text-gold-700 hover:text-bronze-950 underline font-medium flex items-center gap-1 cursor-pointer">
                    <i class="fa-solid fa-user-pen text-[10px]"></i> Đổi tên khách
                </button>
            </div>
        </div> --}}

        <!-- ============================================================= -->
        <!-- SECTION 1: VINTAGE SCRAPBOOK POLAROID & THE WEDDING OF        -->
        <!-- ============================================================= -->
        <section class="vintage-paper-hero relative pt-12 pb-14 px-4 sm:px-6 text-center overflow-hidden border-b border-gold-300/40">
            <!-- Botanical Leaf Sketch Watermarks on Left & Right -->
            <svg class="absolute top-12 -left-6 w-36 sm:w-44 h-auto text-[#967d68] opacity-35 pointer-events-none select-none -rotate-12" viewBox="0 0 100 200" fill="none" stroke="currentColor" stroke-width="1.2">
                <path d="M40 180 C35 130 55 80 40 10" stroke-linecap="round"/>
                <path d="M40 140 C20 135 15 115 35 125" fill="currentColor" fill-opacity="0.1"/>
                <path d="M42 120 C60 115 65 95 45 105" fill="currentColor" fill-opacity="0.1"/>
                <path d="M38 95 C18 90 12 70 34 80" fill="currentColor" fill-opacity="0.1"/>
                <path d="M43 75 C62 70 66 50 45 60" fill="currentColor" fill-opacity="0.1"/>
                <path d="M39 50 C22 45 18 28 36 38" fill="currentColor" fill-opacity="0.1"/>
                <path d="M41 30 C58 24 55 12 40 10" fill="currentColor" fill-opacity="0.1"/>
            </svg>

            <!-- Botanical Leaf Sketch Watermark on Right -->
            <svg class="absolute bottom-16 -right-6 w-36 sm:w-44 h-auto text-[#967d68] opacity-30 pointer-events-none select-none rotate-12" viewBox="0 0 100 200" fill="none" stroke="currentColor" stroke-width="1.2">
                <path d="M60 190 C65 140 45 90 60 20" stroke-linecap="round"/>
                <path d="M58 150 C78 145 82 125 62 135" fill="currentColor" fill-opacity="0.1"/>
                <path d="M62 130 C42 125 38 105 58 115" fill="currentColor" fill-opacity="0.1"/>
                <path d="M59 105 C79 100 84 80 64 90" fill="currentColor" fill-opacity="0.1"/>
                <path d="M63 85 C45 80 40 60 60 70" fill="currentColor" fill-opacity="0.1"/>
                <path d="M58 60 C76 55 78 38 60 48" fill="currentColor" fill-opacity="0.1"/>
            </svg>

            <!-- Subtle Vintage Cottage/House Sketch Watermark at Top Right -->
            <svg class="absolute top-4 right-3 w-28 sm:w-32 h-auto text-[#967d68] opacity-25 pointer-events-none select-none" viewBox="0 0 120 100" fill="none" stroke="currentColor" stroke-width="1">
                <polygon points="20,50 60,18 100,50" />
                <rect x="26" y="50" width="68" height="42" />
                <rect x="40" y="62" width="16" height="30" />
                <rect x="68" y="58" width="16" height="18" />
                <line x1="76" y1="58" x2="76" y2="76" />
                <line x1="68" y1="67" x2="84" y2="67" />
                <line x1="10" y1="92" x2="110" y2="92" stroke-dasharray="2 2" />
                <path d="M85 30 L85 20 L92 20 L92 36" />
            </svg>

            <!-- Header Typography: THE WEDDING OF / Thành & Ngọc -->
            <div class="relative z-10 reveal-item max-w-sm mx-auto mb-8">
                <p class="font-serif text-xs sm:text-sm uppercase tracking-[0.32em] text-[#8c6d58] font-bold">
                    THE WEDDING OF
                </p>
                <h1 class="font-serif font-bold text-4xl sm:text-5xl text-[#3f2d21] mt-2.5 tracking-normal leading-tight">
                    {{ $weddingCard->groom_name }} <span class="font-serif font-normal italic text-3xl sm:text-4xl text-[#8c6d58] mx-1">&amp;</span> {{ $weddingCard->bride_name }}
                </h1>
            </div>

            <!-- Tilted Polaroid Photo Card with Washi Tape, Dried Flower & Wax Seal -->
            <div class="relative z-10 flex justify-center items-center py-3 reveal-item">
                <div class="vintage-polaroid-card w-[86%] max-w-[335px]" onclick="openLightbox(0)" title="Chạm để phóng to ảnh cưới">
                    
                    <!-- Top Washi Tape (Kraft Paper Tape with Torn Edges) -->
                    <div class="washi-tape-top" aria-hidden="true"></div>

                    <!-- Inner Photo (Banner Top Photo) -->
                    <div class="w-full aspect-[4/5] sm:aspect-[3/4] bg-[#eae4db] overflow-hidden rounded-[2px] relative group">
                        <img 
                            src="{{ $heroBannerTop }}" 
                            alt="{{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}" 
                            class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700"
                            onerror="this.src='https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=900&q=85'"
                        >
                    </div>

                    <!-- Dried Flower Botanical Twig (Bottom Left) -->
                    <svg class="absolute -bottom-6 -left-5 w-24 sm:w-28 h-auto pointer-events-none select-none z-10" viewBox="0 0 100 160" fill="none">
                        <!-- Main stem -->
                        <path d="M38 152 C42 125 40 85 46 22" stroke="#7e5d3c" stroke-width="2.2" stroke-linecap="round"/>
                        <path d="M42 110 C32 98 22 84 18 68" stroke="#7e5d3c" stroke-width="1.6" stroke-linecap="round"/>
                        <path d="M44 80 C54 70 66 56 68 42" stroke="#7e5d3c" stroke-width="1.6" stroke-linecap="round"/>
                        <path d="M45 52 C36 44 28 32 26 22" stroke="#7e5d3c" stroke-width="1.4" stroke-linecap="round"/>
                        <!-- Dried delicate buds / blooms in golden-brown & cream -->
                        <circle cx="18" cy="68" r="4.5" fill="#caa476" opacity="0.95"/>
                        <circle cx="16" cy="65" r="3" fill="#ecd8bf"/>
                        <circle cx="24" cy="74" r="3.5" fill="#a47c4e"/>
                        <circle cx="28" cy="85" r="4" fill="#caa476" opacity="0.9"/>
                        <circle cx="68" cy="42" r="4.5" fill="#caa476" opacity="0.95"/>
                        <circle cx="70" cy="39" r="3" fill="#ecd8bf"/>
                        <circle cx="60" cy="48" r="3.5" fill="#a47c4e"/>
                        <circle cx="56" cy="60" r="4" fill="#caa476" opacity="0.9"/>
                        <circle cx="26" cy="22" r="4" fill="#caa476"/>
                        <circle cx="24" cy="20" r="2.8" fill="#ecd8bf"/>
                        <circle cx="32" cy="28" r="3.2" fill="#a47c4e"/>
                        <circle cx="46" cy="22" r="4.5" fill="#caa476"/>
                        <circle cx="48" cy="18" r="3" fill="#ecd8bf"/>
                        <circle cx="42" cy="32" r="3.5" fill="#a47c4e"/>
                    </svg>

                    <!-- Small Washi Tape taping down the dried flower stem -->
                    <div class="washi-tape-stem" aria-hidden="true"></div>

                    <!-- 3D Melted Gold Wax Seal with Monogram (Bottom Right) -->
                    <div class="vintage-wax-seal" title="Con dấu sáp niêm phong {{ $monogramText }}">
                        <div class="vintage-wax-seal-inner">
                            <span class="wax-seal-monogram">{{ $monogramText }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 2: THÔNG TIN LỄ CƯỚI (FAMILY & CEREMONY DETAILS)      -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8 relative">
            <div class="marble-card-surface rounded-3xl p-6 sm:p-8 gold-luxury-frame text-center relative overflow-hidden reveal-item">
                <!-- Decorative Golden Leaves (leaf-1.webp & leaf-2.webp) -->
                <img 
                    src="https://chungdoi.com/images/themes/marble-yellow/leaf-1.webp" 
                    alt="leaf" 
                    class="anim-leaf-left absolute -top-6 -right-6 w-32 opacity-45 pointer-events-none select-none rotate-90"
                    onerror="this.style.display='none'"
                >
                <img 
                    src="https://chungdoi.com/images/themes/marble-yellow/leaf-2.webp" 
                    alt="leaf" 
                    class="anim-leaf-right absolute -bottom-6 -left-6 w-32 opacity-45 pointer-events-none select-none -rotate-90"
                    onerror="this.style.display='none'"
                >

                <!-- Section Heading -->
                <h2 class="font-serif text-2xl sm:text-3xl font-bold uppercase tracking-[0.12em] text-bronze-900">
                    THÔNG TIN LỄ CƯỚI
                </h2>
                <div class="ornament-divider my-3">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>

                <!-- Two-Column Family Information (Exact HƯNG YÊN Demo Data) -->
                <div class="grid grid-cols-2 gap-3 text-center border-y border-gold-300/70 py-5 my-4 relative">
                    <div class="absolute left-1/2 top-4 bottom-4 w-px bg-gold-300/70 -translate-x-1/2"></div>

                    <!-- Nhà Trai -->
                    <div class="pr-2">
                        <p class="text-[11px] uppercase tracking-widest text-gold-700 font-bold mb-1">
                            Nhà Trai
                        </p>
                        <p class="font-serif text-base sm:text-lg font-bold text-bronze-900 leading-snug">
                            {{ $weddingCard->groom_father_name ?: ($weddingCard->groom_father ?: 'Vũ Văn Hoàng') }}
                        </p>
                        <p class="font-serif text-base sm:text-lg font-bold text-bronze-900 leading-snug">
                            {{ $weddingCard->groom_mother_name ?: ($weddingCard->groom_mother ?: 'Vũ Kim Phượng') }}
                        </p>
                        <p class="text-[11px] text-bronze-700 mt-2 leading-relaxed">
                            {{ $weddingCard->address_groom ?: ($weddingCard->groom_address ?: 'Số 27 Phố Bạch Đằng, Minh Khai, Hưng Yên') }}
                        </p>
                    </div>

                    <!-- Nhà Gái -->
                    <div class="pl-2">
                        <p class="text-[11px] uppercase tracking-widest text-gold-700 font-bold mb-1">
                            Nhà Gái
                        </p>
                        <p class="font-serif text-base sm:text-lg font-bold text-bronze-900 leading-snug">
                            {{ $weddingCard->bride_father_name ?: ($weddingCard->bride_father ?: 'Lê Quốc Bảo') }}
                        </p>
                        <p class="font-serif text-base sm:text-lg font-bold text-bronze-900 leading-snug">
                            {{ $weddingCard->bride_mother_name ?: ($weddingCard->bride_mother ?: 'Lê Thảo Vy') }}
                        </p>
                        <p class="text-[11px] text-bronze-700 mt-2 leading-relaxed">
                            {{ $weddingCard->address_bride ?: ($weddingCard->bride_address ?: 'Thôn Đại Từ, Văn Lâm, Hưng Yên') }}
                        </p>
                    </div>
                </div>

                <!-- Formal Announcement Text -->
                <p class="text-xs sm:text-sm uppercase tracking-[0.15em] text-gold-700 font-bold leading-relaxed mt-5">
                    TRÂN TRỌNG BÁO TIN LỄ THÀNH HÔN CỦA CON CHÚNG TÔI
                </p>

                <!-- Couple Full Names -->
                <div class="my-6 space-y-1">
                    <h3 class="font-pattaya text-3xl sm:text-4xl text-gold-foil py-0.5">
                        Vũ {{ $weddingCard->groom_name }}
                    </h3>
                    <div class="py-1 font-serif italic text-2xl text-gold-600">&amp;</div>
                    <h3 class="font-pattaya text-3xl sm:text-4xl text-gold-foil py-0.5">
                        Lê {{ $weddingCard->bride_name }}
                    </h3>
                </div>

                <!-- Ceremony Time Block -->
                <div class="bg-marble-100/95 border border-gold-400/55 rounded-2xl p-5 mt-4 shadow-inner">
                    <p class="text-xs sm:text-sm uppercase tracking-[0.16em] text-bronze-900 font-bold">
                        LỄ THÀNH HÔN{{ $weddingCard->wedding_location ? ' - ' . $weddingCard->wedding_location : ' - Nhà hàng Queen Palace' }}
                    </p>
                    <p class="text-[11px] uppercase tracking-[0.22em] text-gold-700 font-semibold mt-1.5">
                        VÀO LÚC {{ $timeStrShort }} | {{ mb_strtoupper($dayOfWeekVi) }}
                    </p>

                    <!-- Date Split Row -->
                    <div class="flex items-center justify-center gap-3 sm:gap-5 my-3 text-bronze-900 font-serif">
                        <span class="text-xs sm:text-sm uppercase tracking-widest font-bold border-y border-gold-400/70 py-1 px-2.5">
                            {{ mb_strtoupper($dayOfWeekVi) }}
                        </span>
                        <span class="text-4xl sm:text-5xl font-bold text-gold-600 leading-none">
                            {{ $dayNum }}
                        </span>
                        <span class="text-xs sm:text-sm uppercase tracking-widest font-bold border-y border-gold-400/70 py-1 px-2.5">
                            THÁNG {{ $monthNum }}
                        </span>
                    </div>

                    <p class="font-serif text-2xl font-bold text-bronze-900 tracking-widest">
                        {{ $yearNum }}
                    </p>
                    @if(!empty($weddingCard->lunar_date))
                    <p class="font-serif italic text-xs sm:text-sm text-bronze-700 mt-1">
                        ({{ $weddingCard->lunar_date }})
                    </p>
                    @endif
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 3: ALBUM ẢNH (INTERACTIVE CAROUSEL 1 / 9 + LIGHTBOX)  -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8">
            <div class="text-center mb-6 reveal-item">
                <h2 class="font-pattaya text-3xl sm:text-4xl text-gold-foil py-0.5">Album Ảnh</h2>
                <div class="ornament-divider my-2.5">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>
            </div>

            <!-- Interactive Main Slider with 1 / 9 Counter -->
            <div class="reveal-item">
                <div class="relative rounded-3xl overflow-hidden border-2 border-gold-400/65 shadow-2xl bg-bronze-950 aspect-[3/4] group">
                    <img 
                        id="carousel-main-img" 
                        onclick="openLightbox(currentSlideIndex)"
                        src="https://assets.chungdoi.com/photo-library/design/9428e6bdde0a685c2ad1fac40d343b5d50cd9c415610dfd0dec4d222f65b136c.webp" 
                        alt="Album ảnh cưới 1" 
                        class="w-full h-full object-cover transition-all duration-500 cursor-pointer"
                    >

                    <!-- Slide Counter Badge (Exact "1 / 9" format) -->
                    <div id="carousel-counter" class="absolute top-4 right-4 px-3.5 py-1 rounded-full bg-bronze-950/70 border border-gold-400/50 backdrop-blur-sm text-gold-200 text-xs font-semibold tracking-widest">
                        1 / 9
                    </div>

                    <!-- Fullscreen Trigger Badge -->
                    <button onclick="openLightbox(currentSlideIndex)" title="Phóng to ảnh" class="absolute top-4 left-4 w-9 h-9 rounded-full bg-bronze-950/60 hover:bg-bronze-900 text-gold-200 border border-gold-400/40 flex items-center justify-center transition cursor-pointer">
                        <i class="fa-solid fa-expand text-xs"></i>
                    </button>

                    <!-- Prev / Next Arrows -->
                    <button onclick="stepCarousel(-1)" aria-label="Ảnh trước" class="absolute left-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/85 hover:bg-white text-bronze-900 shadow-lg flex items-center justify-center transition cursor-pointer">
                        <i class="fa-solid fa-chevron-left text-sm"></i>
                    </button>
                    <button onclick="stepCarousel(1)" aria-label="Ảnh tiếp" class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/85 hover:bg-white text-bronze-900 shadow-lg flex items-center justify-center transition cursor-pointer">
                        <i class="fa-solid fa-chevron-right text-sm"></i>
                    </button>
                </div>

                <!-- Thumbnail Strip (9 Photos) -->
                <div id="carousel-thumbs" class="grid grid-cols-5 sm:grid-cols-9 gap-2 mt-3">
                    <!-- Populated dynamically by JS -->
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 4: THÔNG TIN TIỆC CƯỚI, ĐẾM NGƯỢC & LỊCH THÁNG 2/2027 -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8">
            <div class="marble-card-surface rounded-3xl p-6 sm:p-8 gold-luxury-frame text-center relative overflow-hidden reveal-item">
                <!-- Decorative Golden Leaves -->
                <img 
                    src="https://chungdoi.com/images/themes/marble-yellow/leaf-2.webp" 
                    alt="leaf" 
                    class="anim-leaf-left absolute -top-5 -left-5 w-28 opacity-45 pointer-events-none select-none"
                    onerror="this.style.display='none'"
                >

                <!-- Heading -->
                <h2 class="font-serif text-2xl sm:text-3xl font-bold uppercase tracking-[0.12em] text-bronze-900">
                    THÔNG TIN TIỆC CƯỚI
                </h2>
                <div class="ornament-divider my-3">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>

                <!-- Hai Khối Tiệc Cưới: Nhà Trai & Nhà Gái -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-6 text-center">
                    <!-- Nhà Trai -->
                    <div class="marble-card-surface border border-gold-400/60 rounded-2xl p-5 shadow-sm flex flex-col justify-between">
                        <div>
                            <span class="inline-block px-3 py-1 rounded-full bg-gold-600 text-white text-xs uppercase tracking-wider font-bold mb-2">
                                Tiệc Cưới Nhà Trai
                            </span>
                            <h3 class="font-serif text-xl font-bold text-bronze-900 mt-1">
                                Hôn Trường Nhà Trai
                            </h3>
                            <p class="font-serif text-3xl font-bold text-gold-600 my-2">
                                {{ $weddingCard->time_groom ?: ($timeStrShort ?: '18:00') }}
                            </p>
                            <p class="text-xs sm:text-sm font-bold text-bronze-900">
                                {{ $weddingCard->groom_eating_date ? \Carbon\Carbon::parse($weddingCard->groom_eating_date)->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : ($wDate ? $wDate->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : 'Chủ Nhật, ngày 14/02/2027') }}
                            </p>
                            @if(!empty($weddingCard->time_groom_al) || !empty($weddingCard->wedding_date_lunar))
                            <p class="text-xs text-bronze-700 italic mt-0.5">
                                (Tức ngày {{ $weddingCard->time_groom_al ?: $weddingCard->wedding_date_lunar }})
                            </p>
                            @endif
                            <div class="text-xs text-bronze-800 mt-3 pt-3 border-t border-gold-300/60">
                                <strong class="text-bronze-900 block mb-1">Địa chỉ:</strong>
                                {{ $weddingCard->address_groom ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Trai') }}
                            </div>
                        </div>

                        <div class="mt-4 pt-3 flex flex-wrap gap-2 justify-center">
                            <a 
                                href="{{ $weddingCard->groom_map ?: ($weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode($weddingCard->address_groom ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Trai')))) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="btn-marble-gold px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider inline-flex items-center gap-1.5 shadow-sm"
                            >
                                <i class="fa-solid fa-diamond-turn-right"></i>
                                <span>Chỉ đường</span>
                            </a>
                            @if(!empty($weddingCard->groom_phone))
                            <a 
                                href="tel:{{ $weddingCard->groom_phone }}"
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full border border-gold-600 text-gold-700 hover:bg-gold-600 hover:text-white text-xs font-bold uppercase tracking-wider transition"
                            >
                                <i class="fa-solid fa-phone"></i>
                                <span>Chú Rể: {{ $weddingCard->groom_phone }}</span>
                            </a>
                            @endif
                        </div>
                    </div>

                    <!-- Nhà Gái -->
                    <div class="marble-card-surface border border-gold-400/60 rounded-2xl p-5 shadow-sm flex flex-col justify-between">
                        <div>
                            <span class="inline-block px-3 py-1 rounded-full bg-gold-600 text-white text-xs uppercase tracking-wider font-bold mb-2">
                                Tiệc Cưới Nhà Gái
                            </span>
                            <h3 class="font-serif text-xl font-bold text-bronze-900 mt-1">
                                Hôn Trường Nhà Gái
                            </h3>
                            <p class="font-serif text-3xl font-bold text-gold-600 my-2">
                                {{ $weddingCard->time_bride ?: ($timeStrShort ?: '11:00') }}
                            </p>
                            <p class="text-xs sm:text-sm font-bold text-bronze-900">
                                {{ $weddingCard->bride_eating_date ? \Carbon\Carbon::parse($weddingCard->bride_eating_date)->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : ($wDate ? $wDate->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : 'Chủ Nhật, ngày 14/02/2027') }}
                            </p>
                            @if(!empty($weddingCard->time_bride_al) || !empty($weddingCard->wedding_date_lunar))
                            <p class="text-xs text-bronze-700 italic mt-0.5">
                                (Tức ngày {{ $weddingCard->time_bride_al ?: $weddingCard->wedding_date_lunar }})
                            </p>
                            @endif
                            <div class="text-xs text-bronze-800 mt-3 pt-3 border-t border-gold-300/60">
                                <strong class="text-bronze-900 block mb-1">Địa chỉ:</strong>
                                {{ $weddingCard->address_bride ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Gái') }}
                            </div>
                        </div>

                        <div class="mt-4 pt-3 flex flex-wrap gap-2 justify-center">
                            <a 
                                href="{{ $weddingCard->bride_map ?: ($weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode($weddingCard->address_bride ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Gái')))) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="btn-marble-gold px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider inline-flex items-center gap-1.5 shadow-sm"
                            >
                                <i class="fa-solid fa-diamond-turn-right"></i>
                                <span>Chỉ đường</span>
                            </a>
                            @if(!empty($weddingCard->bride_phone))
                            <a 
                                href="tel:{{ $weddingCard->bride_phone }}"
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-full border border-gold-600 text-gold-700 hover:bg-gold-600 hover:text-white text-xs font-bold uppercase tracking-wider transition"
                            >
                                <i class="fa-solid fa-phone"></i>
                                <span>Cô Dâu: {{ $weddingCard->bride_phone }}</span>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Live Countdown ("Cùng đếm ngược") -->
                <div class="my-6 pt-5 border-t border-gold-300/60">
                    <p id="countdown-title" class="font-pattaya text-2xl text-gold-foil mb-3">
                        Cùng đếm ngược
                    </p>
                    <div class="grid grid-cols-4 gap-2.5">
                        <div class="bg-marble-100 border border-gold-400/60 rounded-2xl py-2.5 px-1 shadow-sm">
                            <span id="cd-days" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-700">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-bronze-700">Ngày</span>
                        </div>
                        <div class="bg-marble-100 border border-gold-400/60 rounded-2xl py-2.5 px-1 shadow-sm">
                            <span id="cd-hours" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-700">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-bronze-700">Giờ</span>
                        </div>
                        <div class="bg-marble-100 border border-gold-400/60 rounded-2xl py-2.5 px-1 shadow-sm">
                            <span id="cd-mins" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-700">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-bronze-700">Phút</span>
                        </div>
                        <div class="bg-marble-100 border border-gold-400/60 rounded-2xl py-2.5 px-1 shadow-sm">
                            <span id="cd-secs" class="block font-serif text-2xl sm:text-3xl font-bold text-gold-700">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-bronze-700">Giây</span>
                        </div>
                    </div>
                </div>

                <!-- Calendar Card -->
                <div class="bg-marble-100/90 border border-gold-400/50 rounded-2xl p-4 sm:p-5 mt-5">
                    <h4 class="font-serif text-xl font-bold text-bronze-900 mb-3">
                        Tháng {{ $cal['month'] }} / {{ $cal['year'] }}
                    </h4>
                    <div class="grid grid-cols-7 gap-1 text-xs font-semibold text-gold-700 border-b border-gold-300/60 pb-2 mb-2.5">
                        <div>T2</div>
                        <div>T3</div>
                        <div>T4</div>
                        <div>T5</div>
                        <div>T6</div>
                        <div>T7</div>
                        <div class="text-gold-600 font-bold">CN</div>
                    </div>
                    <div class="grid grid-cols-7 gap-y-2 gap-x-1 text-xs sm:text-sm text-bronze-900 items-center">
                        @for($i = 0; $i < $leadEmpty; $i++)
                            <div></div>
                        @endfor
                        @for($d = 1; $d <= $cal['total_days']; $d++)
                            @php
                                $colIdx = ($leadEmpty + $d - 1) % 7;
                            @endphp
                            @if($d == $cal['active_day'])
                                <div class="relative flex items-center justify-center py-1">
                                    <span class="w-9 h-9 rounded-full bg-gradient-to-br from-gold-400 to-gold-600 text-white font-bold flex items-center justify-center shadow-md animate-pulse-day relative">
                                        {{ $d }}
                                        <i class="fa-solid fa-heart text-[10px] text-red-500 absolute -top-1 -right-1"></i>
                                    </span>
                                </div>
                            @else
                                <div class="py-1 {{ $colIdx == 6 ? 'text-gold-600 font-bold' : '' }}">
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
                        href="https://www.google.com/calendar/render?action=TEMPLATE&text={{ urlencode('Đám cưới ' . $weddingCard->groom_name . ' & ' . $weddingCard->bride_name) }}&dates={{ $wDate ? $wDate->format('Ymd') : '20270214' }}T{{ str_replace(':', '', $timeStrShort) }}00/{{ $wDate ? $wDate->format('Ymd') : '20270214' }}T{{ sprintf('%02d', (intval(substr($timeStrShort, 0, 2)) + 3) % 24) }}{{ substr($timeStrShort, 3, 2) }}00&details={{ urlencode('Kính mời quý khách đến chung vui cùng gia đình chúng tôi!') }}&location={{ urlencode(($weddingCard->wedding_location ?: 'Nhà hàng Tiệc Cưới') . ', ' . ($weddingCard->wedding_address ?: 'Hưng Yên')) }}&ctz=Asia/Ho_Chi_Minh"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="btn-marble-gold px-7 py-3 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider inline-flex items-center gap-2"
                    >
                        <i class="fa-regular fa-calendar-check"></i>
                        <span>Thêm vào lịch</span>
                    </a>
                </div>

                @if($weddingCard->wedding_location && $weddingCard->wedding_location !== $weddingCard->address_groom && $weddingCard->wedding_location !== $weddingCard->address_bride)
                <!-- Central Venue & Directions -->
                <div class="mt-8 pt-6 border-t border-gold-300/60 text-center">
                    <p class="text-xs uppercase tracking-[0.2em] text-gold-700 font-bold">
                        Trung tâm tiệc cưới chung
                    </p>
                    <p class="font-serif text-lg sm:text-xl font-bold text-bronze-900 mt-1.5 px-2 leading-snug">
                        {{ $weddingCard->wedding_location }}{{ $weddingCard->wedding_address ? ' - ' . $weddingCard->wedding_address : '' }}
                    </p>

                    @if($weddingCard->google_map_url)
                    <div class="mt-4">
                        <a 
                            href="{{ $weddingCard->google_map_url }}" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="inline-flex items-center gap-2 px-7 py-2.5 rounded-full border-2 border-gold-600 text-gold-700 hover:bg-gold-600 hover:text-white text-xs sm:text-sm font-bold uppercase tracking-wider transition"
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
        <!-- SECTION 5: DRESS CODE & LỊCH TRÌNH NGÀY CƯỚI (9 STEPS)        -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-6 space-y-6">
            <!-- Dress Code Card -->
            <div class="marble-card-surface rounded-3xl p-6 gold-luxury-frame text-center reveal-item">
                <h3 class="font-serif text-2xl font-bold uppercase tracking-[0.15em] text-bronze-900">
                    DRESS CODE
                </h3>
                <p class="text-xs text-bronze-700 mt-1 mb-4">
                    Trang phục dự tiệc
                </p>

                <!-- Circular Color Swatches -->
                <div class="flex items-center justify-center gap-6 my-2 flex-wrap">
                    @foreach($dressCodes as $dc)
                        @php
                            $cHex = is_array($dc) ? ($dc['hex'] ?? ($dc['color'] ?? '#d4af37')) : $dc;
                            $cLabel = is_array($dc) ? ($dc['name'] ?? ($dc['label'] ?? '')) : (is_string($dc) ? $dc : '');
                        @endphp
                        <div class="group flex flex-col items-center gap-1.5">
                            <span class="w-11 h-11 rounded-full border-2 border-white shadow-md ring-1 ring-gold-300 transition transform group-hover:scale-110" style="background-color: {{ $cHex }}"></span>
                            @if(!empty($cLabel))
                            <span class="text-[11px] text-bronze-800 font-medium">{{ $cLabel }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>
                @php
                    $dressNote = $weddingCard->dresscode_note ?: $weddingCard->dress_code_note;
                @endphp
                @if(!empty($dressNote))
                <p class="text-xs text-bronze-700 mt-3 italic">{{ $dressNote }}</p>
                @endif
            </div>

            <!-- LỊCH TRÌNH NGÀY CƯỚI -->
            <div class="marble-card-surface rounded-3xl p-6 sm:p-7 gold-luxury-frame reveal-item relative overflow-hidden">
                <div class="text-center mb-6">
                    <h3 class="font-serif text-2xl font-bold uppercase tracking-[0.12em] text-bronze-900">
                        LỊCH TRÌNH NGÀY CƯỚI
                    </h3>
                    <div class="ornament-divider my-2.5">
                        <div></div>
                        <span>❦</span>
                        <div></div>
                    </div>
                </div>

                <div class="relative max-w-sm mx-auto">
                    <!-- Center vertical gold line -->
                    <div class="absolute left-[87px] top-3 bottom-3 w-0.5 bg-gradient-to-b from-gold-300 via-gold-500 to-gold-300"></div>

                    <ol class="space-y-4 relative z-10">
                        @foreach($timelineEvents as $tIdx => $tl)
                            @php
                                $tTime = is_array($tl) ? ($tl['time'] ?? '') : '';
                                $tTitle = is_array($tl) ? ($tl['title'] ?? '') : '';
                                $tDesc = is_array($tl) ? ($tl['desc'] ?? '') : '';

                                // Smart icon detection
                                $rawIcon = is_array($tl) ? ($tl['icon'] ?? '') : '';
                                $tIcon = '';
                                if (!empty($rawIcon) && !str_starts_with($rawIcon, 'medallion-') && $rawIcon !== 'fa-house-chimney-heart') {
                                    $tIcon = $rawIcon;
                                } else {
                                    $titleLower = mb_strtolower($tTitle, 'UTF-8');
                                    if (str_contains($titleLower, 'đón dâu') || str_contains($titleLower, 'rước dâu') || str_contains($titleLower, 'xe')) {
                                        $tIcon = 'fa-car-side';
                                    } elseif (str_contains($titleLower, 'gia tiên')) {
                                        $tIcon = 'fa-heart';
                                    } elseif (str_contains($titleLower, 'đón khách') || str_contains($titleLower, 'chụp')) {
                                        $tIcon = 'fa-camera-retro';
                                    } elseif (str_contains($titleLower, 'hôn lễ') || str_contains($titleLower, 'thành hôn') || str_contains($titleLower, 'nghi thức')) {
                                        $tIcon = 'fa-ring';
                                    } elseif (str_contains($titleLower, 'rượu') || str_contains($titleLower, 'nâng ly') || str_contains($titleLower, 'giao bôi')) {
                                        $tIcon = 'fa-champagne-glasses';
                                    } elseif (str_contains($titleLower, 'bánh')) {
                                        $tIcon = 'fa-cake-candles';
                                    } elseif (str_contains($titleLower, 'tiệc') || str_contains($titleLower, 'ăn')) {
                                        $tIcon = 'fa-utensils';
                                    } elseif (str_contains($titleLower, 'nhạc') || str_contains($titleLower, 'khiêu vũ') || str_contains($titleLower, 'kết thúc')) {
                                        $tIcon = 'fa-music';
                                    } else {
                                        $fallbackList = ['fa-heart', 'fa-car-side', 'fa-ring', 'fa-champagne-glasses', 'fa-utensils', 'fa-cake-candles', 'fa-music'];
                                        $tIcon = $fallbackList[$tIdx % count($fallbackList)];
                                    }
                                }
                            @endphp
                            <li class="flex items-center gap-4">
                                <span class="w-14 text-right font-serif text-base sm:text-lg font-bold text-gold-700 shrink-0">{{ $tTime }}</span>
                                <span class="w-8 h-8 rounded-full bg-gradient-to-br from-gold-400 to-gold-600 text-white flex items-center justify-center text-xs shadow-md shrink-0 ring-4 ring-marble-100 z-10">
                                    <i class="fa-solid {{ $tIcon }}"></i>
                                </span>
                                <div class="text-left flex-1 min-w-0">
                                    <h4 class="text-xs sm:text-sm font-bold text-bronze-900 leading-tight">{{ $tTitle }}</h4>
                                    @if(!empty($tDesc))
                                    <p class="text-[11px] text-bronze-700 mt-0.5 leading-snug">{{ $tDesc }}</p>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 6: SỔ LƯU BÚT (EXACT 8 DEMO WISHES + LIVE FORM)       -->
        <!-- ============================================================= -->
        <section id="guestbook-section" class="px-4 sm:px-6 py-8">
            <div class="marble-card-surface rounded-3xl p-6 sm:p-7 gold-luxury-frame reveal-item">
                <div class="text-center mb-5">
                    <h2 class="font-pattaya text-3xl sm:text-4xl text-gold-foil py-0.5">Sổ lưu bút</h2>
                    <div class="ornament-divider my-2.5">
                        <div></div>
                        <span>❦</span>
                        <div></div>
                    </div>
                    <p class="text-xs text-bronze-700 mt-1">
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
                            class="w-full px-4 py-2.5 rounded-xl border border-gold-400/60 bg-marble-50 focus:outline-none focus:ring-2 focus:ring-gold-500"
                        >
                    </div>

                    <!-- RSVP Attendance Status -->
                    <div>
                        <label class="block text-bronze-900 font-semibold mb-1.5 text-xs">Xác nhận tham dự</label>
                        <div class="grid grid-cols-3 gap-2 text-xs">
                            <label class="flex items-center justify-center gap-1 border border-gold-400/80 rounded-xl py-2 px-1 cursor-pointer has-[:checked]:bg-gold-500 has-[:checked]:text-black has-[:checked]:font-semibold transition">
                                <input type="radio" name="attendance_status" value="attending" checked onchange="toggleGuestCount32(this.value)" class="hidden">
                                <span>🥂 Tham dự</span>
                            </label>
                            <label class="flex items-center justify-center gap-1 border border-gold-400/80 rounded-xl py-2 px-1 cursor-pointer has-[:checked]:bg-gold-500 has-[:checked]:text-black has-[:checked]:font-semibold transition">
                                <input type="radio" name="attendance_status" value="not_attending" onchange="toggleGuestCount32(this.value)" class="hidden">
                                <span>💌 Bận rồi</span>
                            </label>
                            <label class="flex items-center justify-center gap-1 border border-gold-400/80 rounded-xl py-2 px-1 cursor-pointer has-[:checked]:bg-gold-500 has-[:checked]:text-black has-[:checked]:font-semibold transition">
                                <input type="radio" name="attendance_status" value="unsure" onchange="toggleGuestCount32(this.value)" class="hidden">
                                <span>🤔 Chưa rõ</span>
                            </label>
                        </div>
                    </div>

                    <!-- Guest Count -->
                    <div id="guest-count-wrapper-32">
                        <label class="block text-bronze-900 font-semibold mb-1 text-xs">Số người tham dự</label>
                        <select id="wish-guest-count" name="guest_count" class="w-full px-3.5 py-2.5 rounded-xl border border-gold-400/60 bg-marble-50 text-bronze-900 focus:outline-none focus:ring-2 focus:ring-gold-500">
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
                            class="w-full px-4 py-2.5 rounded-xl border border-gold-400/60 bg-marble-50 focus:outline-none focus:ring-2 focus:ring-gold-500"
                        ></textarea>
                    </div>
                    <button id="wish-submit-btn" type="submit" class="btn-marble-gold w-full py-3 rounded-xl font-bold uppercase tracking-wider text-xs sm:text-sm cursor-pointer flex items-center justify-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span>Gửi lời chúc &amp; Xác nhận</span>
                    </button>
                </form>

                <!-- Live Wishes List (Pre-populated with Exact 8 Wishes from Demo) -->
                <div id="wishes-container" class="space-y-3 max-h-80 overflow-y-auto pr-1">
                    <!-- Rendered by JS -->
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 7: HỘP QUÀ MỪNG (WEDDING GIFT BOX & QR MODAL)         -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-6 text-center">
            <div class="bg-gradient-to-br from-bronze-900 via-bronze-950 to-black text-marble-100 rounded-3xl p-6 sm:p-8 border-2 border-gold-400/70 shadow-2xl reveal-item relative overflow-hidden">
                <div onclick="toggleGiftModal(true)" class="w-16 h-16 mx-auto rounded-full bg-gold-400/20 border border-gold-300 flex items-center justify-center text-gold-300 text-2xl mb-3 cursor-pointer hover:scale-110 transition">
                    <i class="fa-solid fa-gift"></i>
                </div>
                <h3 class="font-pattaya text-3xl text-gold-300">Hộp Quà Mừng</h3>
                <p class="text-xs text-marble-200/85 max-w-xs mx-auto mt-2 leading-relaxed">
                    Cảm ơn tình cảm quý báu của Quý khách dành cho {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}. Chạm vào bên dưới để mở Hộp Quà Mừng:
                </p>
                <button onclick="toggleGiftModal(true)" class="btn-marble-gold mt-5 px-7 py-3 rounded-full text-xs sm:text-sm font-bold uppercase tracking-wider inline-flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-qrcode"></i>
                    <span>Mở Hộp Quà Mừng</span>
                </button>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- FOOTER                                                        -->
        <!-- ============================================================= -->
        <footer class="relative py-12 px-6 text-center border-t border-gold-300/60 bg-marble-200/65 overflow-hidden">
            <img 
                src="https://chungdoi.com/images/themes/marble-yellow/leaf-1.webp" 
                alt="" 
                class="anim-leaf-right absolute -bottom-6 -right-6 w-32 pointer-events-none opacity-65"
                onerror="this.style.display='none'"
            >

            <div class="ornament-divider mb-3">
                <div></div>
                <span>❦</span>
                <div></div>
            </div>
            <h2 class="font-pattaya text-3xl sm:text-4xl text-gold-foil py-0.5">{{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}</h2>
            <p class="font-serif italic text-sm sm:text-base text-bronze-800 mt-3 max-w-xs mx-auto leading-relaxed">
                {{ $weddingCard->message_thanks ?: 'Sự hiện diện của quý khách là niềm vinh hạnh của gia đình chúng tôi!' }}
            </p>
            {{-- <div class="mt-5">
                <a href="https://chungdoi.com" target="_blank" rel="noopener noreferrer" class="inline-block text-xs text-gold-700 hover:text-bronze-950 font-semibold tracking-wider">
                    ♡ chungdoi.com
                </a>
            </div> --}}
        </footer>
    </main>

    <!-- ================================================================= -->
    <!-- 3. FLOATING RIGHT & LEFT CONTROLS                                 -->
    <!-- ================================================================= -->

    <!-- Right-Edge Floating Effect Toggle Tab (Water-Drop Sparkle Icon) -->
    <button 
        id="btn-effect-toggle" 
        onclick="toggleFallingEffects()" 
        title="Bật / Tắt hiệu ứng cánh hoa vàng rơi" 
        class="fixed right-0 top-[52%] -translate-y-1/2 z-40 bg-white hover:bg-marble-50 text-[#0088cc] pl-3 pr-2.5 py-2.5 rounded-l-full shadow-[0_4px_18px_rgba(0,0,0,0.16)] border border-r-0 border-gold-300 flex items-center justify-center cursor-pointer transition-transform hover:scale-105"
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

        <!-- Marble Gold Music Equalizer Button (II.I) -->
        <button 
            id="btn-music" 
            onclick="toggleMusic()" 
            title="Bật / Tắt nhạc cưới" 
            class="w-12 h-12 rounded-full bg-gradient-to-br from-gold-500 to-gold-700 hover:from-gold-400 hover:to-gold-600 border-2 border-white text-white shadow-[0_6px_20px_rgba(154,116,24,0.45)] flex items-center justify-center cursor-pointer transition transform hover:scale-105"
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
        <button onclick="toggleGiftModal(true)" title="Mở Hộp Quà Mừng (QR)" class="w-11 h-11 rounded-full bg-gold-600 border-2 border-white text-white shadow-lg flex items-center justify-center cursor-pointer hover:scale-105 transition">
            <i class="fa-solid fa-gift text-base"></i>
        </button>
        <span id="music-status-pill" class="hidden sm:inline-block px-3 py-1 rounded-full bg-white/95 border border-gold-300 text-[11px] text-bronze-800 font-medium shadow-sm backdrop-blur-sm">
            Nhạc nền: Tắt
        </span>
    </div>

    <!-- ================================================================= -->
    <!-- 4. MODALS (HỘP QUÀ MỪNG QR, LIGHTBOX DIALOG, GUEST NAME)          -->
    <!-- ================================================================= -->

    <!-- Hộp Quà Mừng Modal (Exact Demo Account: {{ $weddingCard->groom_bank_name ?: 'Vietcombank' }} {{ $weddingCard->bride_bank_account ?: '0000000000' }} - THIEP CUOI DEMO) -->
    <div id="gift-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-bronze-950/75 backdrop-blur-sm p-4">
        <div class="marble-card-surface text-bronze-950 rounded-3xl max-w-sm w-full p-6 border-2 border-gold-400 shadow-2xl relative">
            <button onclick="toggleGiftModal(false)" class="absolute top-3.5 right-3.5 w-8 h-8 rounded-full bg-gold-100 text-bronze-900 hover:bg-gold-200 flex items-center justify-center cursor-pointer">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="text-center mb-5">
                <h3 class="font-pattaya text-3xl text-gold-foil py-0.5">Hộp Quà Mừng</h3>
                <p class="text-xs text-bronze-700 mt-1">Quét mã QR hoặc sao chép số tài khoản ngân hàng</p>
            </div>

            <div class="grid grid-cols-1 gap-4 max-h-[70vh] overflow-y-auto pr-1">
                <!-- Chú Rể -->
                <div class="bg-white rounded-2xl p-4 border border-gold-300 text-center shadow-sm">
                    <span class="text-[11px] uppercase tracking-wider font-bold px-3 py-1 rounded-full bg-gold-100 text-gold-800">
                        Chú Rể - {{ $weddingCard->groom_name }}
                    </span>
                    <img 
                        src="{{ $groomQrUrl }}" 
                        alt="QR Chú Rể" 
                        class="w-36 h-36 mx-auto my-3 rounded-xl border border-gold-200 p-1.5 object-contain"
                    >
                    <p class="text-xs font-bold text-bronze-900">Ngân hàng: {{ $groomBankName }}</p>
                    <p class="text-xs text-bronze-700 font-medium mt-0.5">Chủ TK: {{ $groomOwner }}</p>
                    <p class="text-xs font-mono font-bold text-bronze-950 my-1.5">STK: {{ $groomStk }}</p>
                    <button onclick="copyText('{{ $groomStk }}', 'Đã sao chép STK Chú Rể ({{ $groomStk }})!')" class="btn-marble-gold mt-2 w-full py-2 rounded-xl text-xs font-bold cursor-pointer">
                        <i class="fa-regular fa-copy mr-1"></i> Sao chép STK Chú Rể
                    </button>
                </div>

                @if(!empty($weddingCard->bride_bank_account) || !empty($weddingCard->bride_bank_number) || !empty($weddingCard->bride_qr))
                <!-- Cô Dâu -->
                <div class="bg-white rounded-2xl p-4 border border-gold-300 text-center shadow-sm">
                    <span class="text-[11px] uppercase tracking-wider font-bold px-3 py-1 rounded-full bg-gold-100 text-gold-800">
                        Cô Dâu - {{ $weddingCard->bride_name }}
                    </span>
                    <img 
                        src="{{ $brideQrUrl }}" 
                        alt="QR Cô Dâu" 
                        class="w-36 h-36 mx-auto my-3 rounded-xl border border-gold-200 p-1.5 object-contain"
                    >
                    <p class="text-xs font-bold text-bronze-900">Ngân hàng: {{ $brideBankName }}</p>
                    <p class="text-xs text-bronze-700 font-medium mt-0.5">Chủ TK: {{ $brideOwner }}</p>
                    <p class="text-xs font-mono font-bold text-bronze-950 my-1.5">STK: {{ $brideStk }}</p>
                    <button onclick="copyText('{{ $brideStk }}', 'Đã sao chép STK Cô Dâu ({{ $brideStk }})!')" class="btn-marble-gold mt-2 w-full py-2 rounded-xl text-xs font-bold cursor-pointer">
                        <i class="fa-regular fa-copy mr-1"></i> Sao chép STK Cô Dâu
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Guest Name Customizer Modal -->
    <div id="guest-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-bronze-950/75 backdrop-blur-sm p-4">
        <div class="marble-card-surface text-bronze-950 rounded-3xl max-w-sm w-full p-6 border-2 border-gold-400 shadow-2xl">
            <h4 class="font-serif text-2xl font-bold text-bronze-900">Tùy chỉnh Tên Khách Mời</h4>
            <p class="text-xs text-bronze-700 mt-1 mb-4">Tên khách mời hiển thị ở mục "Thân Mời" ngoài bìa thiệp.</p>
            <input type="text" id="custom-guest-input" placeholder="VD: Anh Tuấn & Chị Ngọc" class="w-full px-3.5 py-2.5 rounded-xl border border-gold-400 bg-white text-sm mb-4 focus:outline-none">
            <div class="flex justify-end gap-2">
                <button onclick="closeGuestModal()" class="px-4 py-2 rounded-xl border border-gold-500 text-bronze-800 text-xs font-medium cursor-pointer">Hủy</button>
                <button onclick="applyGuestName()" class="btn-marble-gold px-4 py-2 rounded-xl text-xs font-bold cursor-pointer">Cập nhật</button>
            </div>
        </div>
    </div>

    <!-- Fullscreen Lightbox Dialog -->
    <div id="lightbox-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-4">
        <div id="lightbox-counter" class="absolute top-5 left-5 px-3.5 py-1 rounded-full bg-white/15 text-gold-200 text-xs font-medium tracking-widest">
            1 / 9
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
        <div class="px-5 py-2.5 rounded-full bg-bronze-950 border border-gold-400 text-gold-200 text-xs sm:text-sm shadow-2xl flex items-center gap-2">
            <span class="text-gold-400 font-serif">❦</span>
            <span id="toast-text">Thông báo</span>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- 5. JAVASCRIPT LOGIC & INTERACTIVE EFFECTS                         -->
    <!-- ================================================================= -->
    <script>
        /* ---------------------------------------------------------------
         * A. 12 FLOATING GOLDEN PETALS IN BACKGROUND (EXACT DEMO DOM)
         * --------------------------------------------------------------- */
        function initFloatingGoldPetals() {
            const container = document.getElementById('floating-petals-container');
            const count = 12; // Exact 12 floating child <div> elements as on ChungĐôi demo
            for (let i = 0; i < count; i++) {
                const div = document.createElement('div');
                div.className = 'floating-gold-petal';
                const leftPct = ((i * 8.3) + 5) % 95;
                const duration = 12 + (i % 5) * 3.2;
                const delay = -(i * 1.8);
                div.style.left = `${leftPct}%`;
                div.style.animationDuration = `${duration}s`;
                div.style.animationDelay = `${delay}s`;
                container.appendChild(div);
            }
        }

        /* ---------------------------------------------------------------
         * B. GOLDEN DUST SPARKLES CANVAS
         * --------------------------------------------------------------- */
        let effectsActive = true;

        function toggleFallingEffects() {
            effectsActive = !effectsActive;
            const canvas = document.getElementById('marble-gold-canvas');
            const layer = document.getElementById('floating-petals-container');
            const btn = document.getElementById('btn-effect-toggle');
            if (effectsActive) {
                canvas.style.opacity = '1';
                layer.classList.remove('effects-off');
                btn.classList.remove('opacity-50');
                showToast('Đã bật hiệu ứng cánh hoa vàng rơi ✨');
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

        function initMarbleGoldCanvas() {
            const canvas = document.getElementById('marble-gold-canvas');
            const ctx = canvas.getContext('2d');
            let width = canvas.width = window.innerWidth;
            let height = canvas.height = window.innerHeight;

            window.addEventListener('resize', () => {
                width = canvas.width = window.innerWidth;
                height = canvas.height = window.innerHeight;
            });

            const sparkles = Array.from({ length: 24 }, () => ({
                x: Math.random() * width,
                y: Math.random() * height,
                r: 1.5 + Math.random() * 2.5,
                vy: 0.35 + Math.random() * 0.65,
                vx: -0.2 + Math.random() * 0.4,
                alpha: 0.25 + Math.random() * 0.5
            }));

            function draw() {
                ctx.clearRect(0, 0, width, height);
                for (const s of sparkles) {
                    s.y += s.vy;
                    s.x += s.vx;
                    if (s.y > height + 10) {
                        s.y = -10;
                        s.x = Math.random() * width;
                    }
                    ctx.fillStyle = `rgba(212, 175, 55, ${s.alpha})`;
                    ctx.beginPath();
                    ctx.arc(s.x, s.y, s.r, 0, Math.PI * 2);
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
            'https://assets.chungdoi.com/photo-library/design/9428e6bdde0a685c2ad1fac40d343b5d50cd9c415610dfd0dec4d222f65b136c.webp',
            'https://assets.chungdoi.com/photo-library/design/53fe1ac6520c377e14384b2940cb1edca37668313fa366532c6b50c57cc5e6ba.webp',
            'https://assets.chungdoi.com/photo-library/design/5169823e2046899b26d9ce7cf2a452249052ea8c50ff314d84e8dfbedba45c71.webp',
            'https://assets.chungdoi.com/photo-library/design/83b987b712c877f3ce3c72317fe74553eed8de3f7ac7dbf135660bd3902ef115.webp',
            'https://assets.chungdoi.com/photo-library/design/12ff63fe762cd0c5ca2730ecfb046f7b393a92ff01eab8ee2a94e8eca5702ed5.webp',
            'https://assets.chungdoi.com/photo-library/design/233f83fc04b7eab1e263c4a2a6f089d3bdaee9e544b9996acaffa59969291ed4.webp',
            'https://assets.chungdoi.com/photo-library/design/709ef51371b16aeec07abc414f420341351d35af51bf69c818bde0ab0dd668bc.webp',
            'https://assets.chungdoi.com/photo-library/design/b45fdd26a285e8b31bddf294dc0f205ae152332de9ab6a26b91e5f169bde4bb4.webp',
            'https://assets.chungdoi.com/photo-library/design/fd3178ccf0efc276f3ecd58effa45b6aee5764defcdb64723b2d4d27973a3d67.webp'
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
                    class="aspect-square rounded-xl overflow-hidden border-2 transition cursor-pointer ${idx === currentSlideIndex ? 'border-gold-600 scale-105 shadow-md' : 'border-transparent opacity-60 hover:opacity-100'}"
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
            img.src = albumPhotos[currentSlideIndex];
            counter.textContent = `${currentSlideIndex + 1} / ${albumPhotos.length}`;
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
            try {
                $cardWishes32 = $weddingCard->wishes()->approved()->latest()->take(30)->get()->map(function($w) {
                    return [
                        'name' => $w->sender_name,
                        'time' => $w->created_at ? $w->created_at->diffForHumans() : 'Vừa xong',
                        'message' => $w->message,
                        'attendance_status' => $w->attendance_status,
                        'guest_count' => $w->guest_count,
                    ];
                });
            } catch (\Throwable $e) {
                $cardWishes32 = [];
            }
        @endphp
        const wishesList = @json($cardWishes32, JSON_UNESCAPED_UNICODE);
        const wishStoreUrl32 = "{{ route('wishes.store', $weddingCard->id) }}";
        const csrfToken32 = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

        function toggleGuestCount32(val) {
            const wrap = document.getElementById('guest-count-wrapper-32');
            if (wrap) wrap.style.display = (val === 'not_attending') ? 'none' : 'block';
        }

        function escapeHtml(str) {
            return String(str || '').replace(/[&<>"']/g, s => ({
                '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
            }[s]));
        }

        function getBadgeHtml32(status, count) {
            if (status === 'attending') {
                const countText = (count && count > 1) ? ` (${count} người)` : '';
                return `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-amber-100 text-amber-900 border border-amber-300 ml-1.5">✓ Tham dự${countText}</span>`;
            } else if (status === 'not_attending') {
                return `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-stone-100 text-stone-700 border border-stone-300 ml-1.5">✕ Bận việc</span>`;
            } else if (status === 'unsure') {
                return `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-slate-100 text-slate-700 border border-slate-300 ml-1.5">? Chưa rõ</span>`;
            }
            return '';
        }

        function renderWishes() {
            const container = document.getElementById('wishes-container');
            if (!wishesList || wishesList.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-4 text-xs text-bronze-700 italic">
                        Hãy là người đầu tiên gửi lời chúc mừng hạnh phúc đến cô dâu &amp; chú rể! ✨
                    </div>
                `;
                return;
            }
            container.innerHTML = wishesList.map(item => `
                <div class="bg-marble-100/90 rounded-2xl p-3.5 border border-gold-300/70 shadow-sm text-left">
                    <div class="flex items-center justify-between gap-2">
                        <div class="flex items-center flex-wrap">
                            <span class="font-bold text-bronze-900 text-xs sm:text-sm">${escapeHtml(item.name)}</span>
                            ${getBadgeHtml32(item.attendance_status, item.guest_count)}
                        </div>
                        <span class="text-[10px] text-bronze-600 whitespace-nowrap">${escapeHtml(item.time)}</span>
                    </div>
                    <p class="text-xs sm:text-sm text-bronze-800 mt-1.5 leading-relaxed">${escapeHtml(item.message)}</p>
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
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin mr-1"></i><span>Đang gửi...</span>';

            fetch(wishStoreUrl32, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken32
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
                    showToast(data.message || 'Cảm ơn bạn đã gửi lời chúc và xác nhận! 🥂');
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
         * E. COUNTDOWN TIMER
         * --------------------------------------------------------------- */
        function initCountdown() {
            const weddingDateStr = '{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format("Y-m-d") : "2027-02-14" }}';
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
                    showToast('Đang phát nhạc nền lễ cưới ♪');
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

            initFloatingGoldPetals();
            initMarbleGoldCanvas();
            renderThumbnails();
            renderWishes();
            initCountdown();
            triggerScrollReveal();
        };
    </script>
</body>
</html>