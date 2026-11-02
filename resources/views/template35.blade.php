<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $weddingCard->couple_name }} - Thiệp Cưới Online</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Alex Brush, Great Vibes, Pattaya, Cormorant Garamond, Be Vietnam Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Great+Vibes&family=Pattaya&display=swap" rel="stylesheet">
    <!-- Tone.js for romantic sakura music-box synthesis -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tone/14.8.49/Tone.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        sakura: {
                            50: '#FAF7F2',
                            100: '#FDF0F4',
                            200: '#F5D6DF',
                            300: '#EBBAC8',
                            400: '#DE92A8',
                            500: '#B34B5E',
                            600: '#9E3D50',
                            700: '#843142',
                            800: '#6B3D47',
                            900: '#4F2D35',
                        },
                        champagne: {
                            light: '#FBF6EC',
                            DEFAULT: '#C9A46A',
                            dark: '#A68046'
                        }
                    },
                    fontFamily: {
                        calligraphy: ['"Alex Brush"', '"Great Vibes"', 'cursive'],
                        pattaya: ['"Pattaya"', 'cursive'],
                        vibes: ['"Great Vibes"', 'cursive'],
                        serif: ['"Cormorant Garamond"', 'serif'],
                        sans: ['"Be Vietnam Pro"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --sakura-bg: #FAF7F2;
            --sakura-card: #FDF0F4;
            --sakura-primary: #B34B5E;
            --sakura-petal: #E899B1;
            --sakura-text: #4F2D35;
            --champagne-gold: #C9A46A;
        }

        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: #EFECE6;
            font-family: 'Be Vietnam Pro', sans-serif;
            color: #4F2D35;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        /* Realistic Handmade Washi / Embossed Watercolor Paper Texture (#FAF7F2) */
        .sakura-paper {
            background-color: #FAF7F2;
            background-image:
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='220' height='220' viewBox='0 0 220 220'%3E%3Cfilter id='washi'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.045 0.11' numOctaves='4' seed='8' result='noise'/%3E%3CfeDiffuseLighting in='noise' lighting-color='%23FAF7F2' surfaceScale='1.65' result='light'%3E%3CfeDistantLight azimuth='60' elevation='58'/%3E%3C/feDiffuseLighting%3E%3C/filter%3E%3Crect width='220' height='220' filter='url(%23washi)' opacity='0.42'/%3E%3C/svg%3E"),
                radial-gradient(ellipse at 20% 15%, rgba(255, 255, 255, 0.65) 0%, transparent 60%),
                radial-gradient(ellipse at 80% 75%, rgba(242, 234, 222, 0.6) 0%, transparent 65%);
            background-repeat: repeat, no-repeat, no-repeat;
        }

        .sakura-container-shadow {
            box-shadow: 0 22px 65px rgba(79, 45, 53, 0.14), 0 0 1px rgba(179, 75, 94, 0.2);
        }

        /* Tilted Polaroid Frame matching reference screenshot */
        .hero-polaroid-frame {
            background: #FFFFFF;
            padding: 12px 12px 15px 12px;
            border-radius: 2px;
            transform: rotate(9.5deg);
            box-shadow: 0 14px 32px rgba(90, 50, 60, 0.14), 0 3px 10px rgba(90, 50, 60, 0.08);
            transition: transform 0.55s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.55s ease;
        }
        .hero-polaroid-frame:hover {
            transform: rotate(7.5deg) scale(1.015);
            box-shadow: 0 18px 38px rgba(90, 50, 60, 0.19);
        }

        /* Animated Audio Equalizer Bars (|.|) */
        @keyframes eqBar1 {
            0%, 100% { height: 13px; }
            50% { height: 5px; }
        }
        @keyframes eqBar2 {
            0%, 100% { height: 5px; }
            45% { height: 14px; }
        }
        @keyframes eqBar3 {
            0%, 100% { height: 11px; }
            55% { height: 6px; }
        }
        .eq-playing .eq-bar-1 {
            animation: eqBar1 0.85s ease-in-out infinite;
        }
        .eq-playing .eq-bar-2 {
            animation: eqBar2 0.7s ease-in-out infinite;
        }
        .eq-playing .eq-bar-3 {
            animation: eqBar3 0.95s ease-in-out infinite;
        }

        /* Continuous Falling 12+ DOM Sakura Petals */
        .dom-petal {
            position: fixed;
            top: -10%;
            z-index: 35;
            pointer-events: none;
            user-select: none;
            animation: sakuraFall linear infinite;
        }

        @keyframes sakuraFall {
            0% {
                transform: translate3d(0, -5vh, 0) rotate(0deg) rotateY(0deg);
                opacity: 0;
            }
            10% {
                opacity: 0.9;
            }
            50% {
                transform: translate3d(28px, 50vh, 0) rotate(180deg) rotateY(120deg);
                opacity: 0.85;
            }
            90% {
                opacity: 0.8;
            }
            100% {
                transform: translate3d(-22px, 108vh, 0) rotate(360deg) rotateY(280deg);
                opacity: 0;
            }
        }

        /* 3D Envelope Styles */
        .envelope-perspective {
            perspective: 1400px;
        }

        .envelope-letter-slide {
            transition: transform 1.15s cubic-bezier(0.22, 1, 0.36, 1) 0.25s, opacity 0.85s ease 0.25s;
        }

        .envelope-opened .envelope-letter-slide {
            transform: translateY(-82px) scale(1.03);
        }

        .envelope-overlay-wrapper {
            transition: opacity 0.95s cubic-bezier(0.4, 0, 0.2, 1), visibility 0.95s;
        }

        .envelope-overlay-wrapper.hidden-overlay {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        /* Shimmer & Pulse Button */
        .btn-shimmer {
            position: relative;
            overflow: hidden;
        }
        .btn-shimmer::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 45%;
            height: 200%;
            background: linear-gradient(
                to right,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.6) 50%,
                rgba(255, 255, 255, 0) 100%
            );
            transform: rotate(25deg);
            animation: shimmerSwipe 3s infinite;
        }
        @keyframes shimmerSwipe {
            0% { left: -60%; }
            55%, 100% { left: 130%; }
        }

        /* Gentle Branch Sway Animation */
        @keyframes branchSway {
            0%, 100% { transform: rotate(0deg) translateY(0px); }
            50% { transform: rotate(1.8deg) translateY(-2.5px); }
        }
        .sakura-branch-sway {
            animation: branchSway 5.5s ease-in-out infinite;
            transform-origin: top left;
        }
        .sakura-branch-sway-right {
            animation: branchSway 6s ease-in-out infinite;
            transform-origin: top right;
        }

        /* Scroll Reveal Animations */
        .reveal-item {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-left {
            opacity: 0;
            transform: translateX(-30px);
            transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-right {
            opacity: 0;
            transform: translateX(30px);
            transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-scale {
            opacity: 0;
            transform: scale(0.93);
            transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .revealed {
            opacity: 1 !important;
            transform: translate(0, 0) scale(1) !important;
        }

        /* 3D Flip Book Album Styles */
        .book-stage {
            perspective: 1500px;
        }
        .book-page-card {
            transform-style: preserve-3d;
            transition: transform 0.85s cubic-bezier(0.645, 0.045, 0.355, 1), opacity 0.6s ease;
            transform-origin: left center;
        }
        .book-page-card.flipped {
            transform: rotateY(-165deg);
            opacity: 0;
            pointer-events: none;
        }

        /* Vinyl Spin & Heart Pulse */
        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .vinyl-spinning {
            animation: spinSlow 6s linear infinite;
        }

        @keyframes heartBeat {
            0%, 100% { transform: scale(1); }
            25% { transform: scale(1.16); }
            50% { transform: scale(0.95); }
            75% { transform: scale(1.12); }
        }
        .pulse-heart {
            animation: heartBeat 2.1s infinite ease-in-out;
        }

        /* Custom Scrollbar for Guestbook */
        .wishes-scroll::-webkit-scrollbar {
            width: 5px;
        }
        .wishes-scroll::-webkit-scrollbar-track {
            background: #FFF8FA;
            border-radius: 8px;
        }
        .wishes-scroll::-webkit-scrollbar-thumb {
            background: #E899B1;
            border-radius: 8px;
        }
    </style>
</head>
<body class="min-h-screen flex justify-center items-start selection:bg-sakura-200 selection:text-sakura-900">
    @php
        $cal = $weddingCard->calendar_matrix;
        $dayOfWeekVi = $weddingCard->wedding_date ? $weddingCard->wedding_date->locale('vi')->dayName : 'Chủ Nhật';
        $wDate = $weddingCard->wedding_date;
        $dayNum = $wDate ? $wDate->format('d') : '31';
        $monthNum = $wDate ? $wDate->format('m') : '05';
        $yearNum = $wDate ? $wDate->format('Y') : '2026';
        $timeStr = !empty($weddingCard->wedding_time) ? trim($weddingCard->wedding_time) : '18:00';
        $timeStrShort = preg_match('/^\d{1,2}:\d{2}/', $timeStr, $m) ? $m[0] : '18:00';

        $timelineEvents = is_array($weddingCard->timeline) ? $weddingCard->timeline : (is_string($weddingCard->timeline) ? json_decode($weddingCard->timeline, true) : null);
        if (empty($timelineEvents)) {
            $timelineEvents = [
                ['time' => '17:30', 'title' => 'Đón Khách & Chụp Ảnh Check-in', 'desc' => 'Lưu giữ khoảnh khắc kỷ niệm bên vườn hoa anh đào cùng Cô Dâu & Chú Rể.', 'icon' => '📸'],
                ['time' => '18:00', 'title' => 'Nghi Thức Lễ Thành Hôn', 'desc' => 'Cô dâu chú rể tiến vào lễ đường, trao nhẫn cưới và lời thề nguyện trăm năm.', 'icon' => '💍'],
                ['time' => '18:30', 'title' => 'Khai Tiệc & Nâng Ly Chúc Mừng', 'desc' => 'Rót tháp rượu hồng, cắt bánh cưới và thưởng thức ẩm thực tinh tế.', 'icon' => '🥂'],
                ['time' => '19:30', 'title' => 'Giao Lưu Âm Nhạc & Tung Hoa Cưới', 'desc' => 'Cùng hòa giọng trong những bản tình ca ngọt ngào và trao gửi bó hoa may mắn.', 'icon' => '🎶'],
            ];
        }

        $dressCodes = is_array($weddingCard->dress_code) ? $weddingCard->dress_code : (is_string($weddingCard->dress_code) ? json_decode($weddingCard->dress_code, true) : null);
        if (empty($dressCodes)) {
            $dressCodes = [
                ['color' => '#F4C2D1', 'label' => 'Hồng Pastel', 'desc' => 'Dịu dàng, ngọt ngào đồng điệu cùng sắc hoa anh đào.'],
                ['color' => '#FAF6F0', 'label' => 'Trắng Kem', 'desc' => 'Tinh khôi, thanh lịch và trang nhã.'],
                ['color' => '#E3CCA8', 'label' => 'Be Champagne', 'desc' => 'Sang trọng, ấm áp và nổi bật.'],
            ];
        }

        $albumData = !empty($weddingCard->album) ? (is_string($weddingCard->album) ? json_decode($weddingCard->album, true) : $weddingCard->album) : [];
        $albumPhotosJson = json_encode(!empty($albumData) && is_array($albumData) ? array_values(array_map(function($img) {
            return str_starts_with($img, 'http') ? $img : asset('storage/' . $img);
        }, $albumData)) : []);

        $leadEmpty = ($cal['start_day_of_week'] == 0) ? 6 : ($cal['start_day_of_week'] - 1);
        $groomStk = $weddingCard->groom_bank_account ?: ($weddingCard->groom_bank_number ?: '045131052026');
        $brideStk = $weddingCard->bride_bank_account ?: ($weddingCard->bride_bank_number ?: '190331052026');
        $groomBankName = $weddingCard->groom_bank_name ?: 'Vietcombank';
        $brideBankName = $weddingCard->bride_bank_name ?: 'Techcombank';
        $groomOwner = $weddingCard->groom_bank_owner ?: $weddingCard->groom_name;
        $brideOwner = $weddingCard->bride_bank_owner ?: $weddingCard->bride_name;

        $groomQrUrl = $weddingCard->groom_qr_url;
        $brideQrUrl = $weddingCard->bride_qr_url;
    @endphp

    <!-- ===================================================================
         REUSABLE HAND-DRAWN WATERCOLOR SAKURA SVG DEFINITIONS:
         1. 5-Petal Notched Sakura Flower (Hoa anh đào 5 cánh khuyết nhụy vàng)
         2. Arching Blooming Cherry Blossom Branch (Cành hoa anh đào cổ thụ)
         3. Sakura Floral Section Header & Ornamental Divider
         =================================================================== -->
    <svg width="0" height="0" class="hidden" aria-hidden="true">
        <defs>
            <!-- Watercolor Gradient for Sakura Petals -->
            <radialGradient id="sakuraPetalGrad" cx="50%" cy="65%" r="65%">
                <stop offset="0%" stop-color="#D66886" />
                <stop offset="38%" stop-color="#F4B8CA" />
                <stop offset="82%" stop-color="#FDE8EF" />
                <stop offset="100%" stop-color="#FFFFFF" />
            </radialGradient>

            <radialGradient id="sakuraBudGrad" cx="50%" cy="50%" r="60%">
                <stop offset="0%" stop-color="#D66886" />
                <stop offset="70%" stop-color="#E899B1" />
                <stop offset="100%" stop-color="#F9DCE5" />
            </radialGradient>

            <!-- Single Notched Sakura Petal Path (Cánh hoa có khe khuyết chữ V ở đỉnh) -->
            <path id="single-sakura-petal" d="M 0,0 C -8,-10 -13,-24 -5,-32 L 0,-26 L 5,-32 C 13,-24 8,-10 0,0 Z" />

            <!-- Full 5-Petal Blooming Sakura Flower -->
            <g id="sakura-blossom-full">
                <use href="#single-sakura-petal" fill="url(#sakuraPetalGrad)" stroke="#E899B1" stroke-width="0.6" transform="rotate(0)" />
                <use href="#single-sakura-petal" fill="url(#sakuraPetalGrad)" stroke="#E899B1" stroke-width="0.6" transform="rotate(72)" />
                <use href="#single-sakura-petal" fill="url(#sakuraPetalGrad)" stroke="#E899B1" stroke-width="0.6" transform="rotate(144)" />
                <use href="#single-sakura-petal" fill="url(#sakuraPetalGrad)" stroke="#E899B1" stroke-width="0.6" transform="rotate(216)" />
                <use href="#single-sakura-petal" fill="url(#sakuraPetalGrad)" stroke="#E899B1" stroke-width="0.6" transform="rotate(288)" />
                <!-- Crimson & Golden Stamens (Nhụy hoa anh đào) -->
                <circle cx="0" cy="0" r="3.2" fill="#D66886" opacity="0.75" />
                <g stroke="#C97A63" stroke-width="0.7" stroke-linecap="round">
                    <line x1="0" y1="0" x2="0" y2="-8" />
                    <line x1="0" y1="0" x2="6" y2="-5" />
                    <line x1="0" y1="0" x2="7" y2="3" />
                    <line x1="0" y1="0" x2="3" y2="8" />
                    <line x1="0" y1="0" x2="-3" y2="8" />
                    <line x1="0" y1="0" x2="-7" y2="3" />
                    <line x1="0" y1="0" x2="-6" y2="-5" />
                </g>
                <g fill="#F6C85F">
                    <circle cx="0" cy="-8.5" r="1.2" />
                    <circle cx="6.5" cy="-5.5" r="1.2" />
                    <circle cx="7.5" cy="3.2" r="1.2" />
                    <circle cx="3.2" cy="8.5" r="1.2" />
                    <circle cx="-3.2" cy="8.5" r="1.2" />
                    <circle cx="-7.5" cy="3.2" r="1.2" />
                    <circle cx="-6.5" cy="-5.5" r="1.2" />
                </g>
            </g>

            <!-- Arching Sakura Branch Artwork (Cành hoa anh đào vươn từ góc) -->
            <g id="sakura-corner-branch">
                <!-- Woody Brown Twigs -->
                <path d="M -5,15 Q 55,22 115,48 T 205,62" fill="none" stroke="#6E473B" stroke-width="3.6" stroke-linecap="round" />
                <path d="M 45,24 Q 78,56 122,82" fill="none" stroke="#6E473B" stroke-width="2.4" stroke-linecap="round" />
                <path d="M 95,40 Q 138,24 178,28" fill="none" stroke="#7D5346" stroke-width="2" stroke-linecap="round" />
                <path d="M 25,18 Q 38,58 28,92" fill="none" stroke="#7D5346" stroke-width="1.8" stroke-linecap="round" />

                <!-- Small Tender Green Leaves -->
                <path d="M 82,36 C 88,24 102,24 104,34 C 96,40 88,40 82,36 Z" fill="#8FA882" opacity="0.75" />
                <path d="M 142,50 C 152,42 164,46 162,56 C 152,58 146,54 142,50 Z" fill="#8FA882" opacity="0.75" />

                <!-- Pink Sakura Buds -->
                <ellipse cx="182" cy="28" rx="6" ry="3.8" transform="rotate(-15 182 28)" fill="url(#sakuraBudGrad)" />
                <ellipse cx="126" cy="84" rx="5.5" ry="3.5" transform="rotate(25 126 84)" fill="url(#sakuraBudGrad)" />
                <ellipse cx="28" cy="94" rx="5" ry="3.2" transform="rotate(75 28 94)" fill="url(#sakuraBudGrad)" />

                <!-- Blooming Sakura Clusters Along the Branch -->
                <use href="#sakura-blossom-full" transform="translate(36, 26) scale(0.76) rotate(12)" />
                <use href="#sakura-blossom-full" transform="translate(76, 46) scale(0.62) rotate(-24)" />
                <use href="#sakura-blossom-full" transform="translate(115, 42) scale(0.72) rotate(32)" />
                <use href="#sakura-blossom-full" transform="translate(158, 56) scale(0.55) rotate(-15)" />
                <use href="#sakura-blossom-full" transform="translate(96, 72) scale(0.48) rotate(40)" />
                <use href="#sakura-blossom-full" transform="translate(196, 62) scale(0.44) rotate(8)" />
            </g>

            <!-- Center Section Sakura Wreath / Header Emblem -->
            <g id="sakura-section-emblem">
                <path d="M 35,34 Q 100,18 165,34" fill="none" stroke="#8C5D4F" stroke-width="1.8" stroke-linecap="round" />
                <path d="M 55,30 Q 100,44 145,30" fill="none" stroke="#E899B1" stroke-width="1" stroke-dasharray="3 3" />
                <use href="#sakura-blossom-full" transform="translate(68, 28) scale(0.45) rotate(-18)" />
                <use href="#sakura-blossom-full" transform="translate(132, 28) scale(0.45) rotate(18)" />
                <use href="#sakura-blossom-full" transform="translate(100, 25) scale(0.64)" />
            </g>

            <!-- Delicate Ornamental Sakura Divider -->
            <g id="sakura-ribbon-divider">
                <path d="M 20,24 Q 130,8 240,24 T 460,24" fill="none" stroke="#F2BFD0" stroke-width="1.5" />
                <path d="M 60,24 Q 150,36 240,24 T 420,24" fill="none" stroke="#E899B1" stroke-width="1" stroke-dasharray="4 4" />
                <use href="#sakura-blossom-full" transform="translate(240, 24) scale(0.42)" />
                <circle cx="205" cy="22" r="2.2" fill="#D66886" opacity="0.6" />
                <circle cx="275" cy="26" r="2.2" fill="#D66886" opacity="0.6" />
            </g>

            <!-- Detailed Watercolor Round Pink Sakura Bud (Nụ hoa tròn rủ xuống giống ảnh mẫu) -->
            <g id="watercolor-round-bud">
                <!-- Sepals / Calyx (Đài hoa nâu đỏ) -->
                <path d="M -3,0 Q 0,-7 3,0 L 4,5 Q 0,3 -4,5 Z" fill="#8B434B" />
                <!-- Plump Watercolor Pink Bud -->
                <circle cx="0" cy="14" r="10.5" fill="url(#sakuraBudGrad)" />
                <path d="M -8,10 Q -2,22 7,17 Q 2,25 -6,21 Z" fill="#D66886" opacity="0.45" />
                <path d="M 2,6 Q 9,12 7,20" fill="none" stroke="#FFF5F8" stroke-width="1.4" opacity="0.65" />
            </g>

            <!-- Soft Side-Profile Watercolor Blossom -->
            <g id="watercolor-side-blossom">
                <ellipse cx="-8" cy="4" rx="11" ry="7" transform="rotate(-28 -8 4)" fill="url(#sakuraPetalGrad)" />
                <ellipse cx="7" cy="5" rx="11" ry="6.5" transform="rotate(22 7 5)" fill="url(#sakuraPetalGrad)" />
                <ellipse cx="0" cy="-2" rx="9" ry="11" fill="url(#sakuraBudGrad)" opacity="0.85" />
                <path d="M -4,10 Q 0,16 4,10" fill="#8B434B" />
            </g>
        </defs>
    </svg>

    <!-- ===================================================================
         12+ CONTINUOUS FALLING SAKURA PETALS LAYER (DOM + SVG PETALS)
         =================================================================== -->
    <div id="falling-sakura-layer" class="pointer-events-none fixed inset-0 z-30 overflow-hidden mx-auto max-w-[480px]" aria-hidden="true">
        <!-- Populated dynamically with 14 custom SVG notched petals & 🌸 blossoms -->
    </div>

    <!-- MAIN MOBILE-FIRST INVITATION CONTAINER (max-w-[480px] centered) -->
    <div id="app-container" class="relative w-full max-w-[480px] min-h-screen sakura-paper sakura-container-shadow overflow-hidden mx-auto">

        <!-- ===================================================================
             1. 3D ENVELOPE / COVER OVERLAY (?open=1 TRANSITION)
             =================================================================== -->
        <div id="envelope-overlay" class="envelope-overlay-wrapper fixed inset-0 z-50 flex items-center justify-center bg-sakura-900/45 backdrop-blur-sm p-3">
            <div class="relative w-full max-w-[450px] min-h-[92vh] max-h-[870px] rounded-[30px] bg-gradient-to-b from-[#FFF9FB] via-[#FFFDFD] to-[#FDF0F4] border-2 border-sakura-200 shadow-2xl flex flex-col justify-between items-center p-5 overflow-hidden">
                
                <!-- Top Arching Sakura Branches Across Envelope Header -->
                <div class="w-full flex justify-between items-start pointer-events-none select-none -mt-2">
                    <svg class="w-40 h-24 -ml-4 sakura-branch-sway" viewBox="0 0 220 110">
                        <use href="#sakura-corner-branch" />
                    </svg>
                    <svg class="w-40 h-24 -mr-4 sakura-branch-sway-right" style="transform: scaleX(-1);" viewBox="0 0 220 110">
                        <use href="#sakura-corner-branch" />
                    </svg>
                </div>

                <!-- Center 3D Envelope & Personalized Invitation Card -->
                <div id="envelope-3d-stage" class="envelope-perspective relative w-full max-w-[365px] my-auto py-1">
                    
                    <!-- Inner Sakura Invitation Card -->
                    <div class="envelope-letter-slide relative z-20 mx-auto w-[93%] rounded-2xl bg-white border border-sakura-200 shadow-lg px-5 py-6 text-center">
                        <!-- Top Sakura Emblem -->
                        <div class="mx-auto w-32 h-11 -mt-2 mb-1">
                            <svg viewBox="0 0 200 50" class="w-full h-full">
                                <use href="#sakura-section-emblem" />
                            </svg>
                        </div>

                        <p class="text-[10px] uppercase tracking-[0.28em] text-sakura-500 font-semibold mb-1.5">
                            Thiệp Mời Hôn Lễ
                        </p>

                        <!-- Couple Names: {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }} -->
                        <h1 class="font-pattaya text-3xl sm:text-[36px] text-sakura-500 leading-tight">
                            {{ $weddingCard->groom_name }}
                        </h1>
                        <div class="my-1 flex items-center justify-center gap-3 text-sakura-400">
                            <span class="h-[1px] w-10 bg-sakura-200"></span>
                            <span class="font-vibes text-2xl text-sakura-500">&amp;</span>
                            <span class="h-[1px] w-10 bg-sakura-200"></span>
                        </div>
                        <h1 class="font-pattaya text-3xl sm:text-[36px] text-sakura-500 leading-tight">
                            {{ $weddingCard->bride_name }}
                        </h1>

                        <!-- Ornamental Divider: <div></div><span>❦</span><div></div> -->
                        <div class="my-3 flex items-center justify-center gap-2.5 text-sakura-400">
                            <div class="w-12 h-[1px] bg-gradient-to-r from-transparent to-sakura-300"></div>
                            <span class="text-sakura-500 text-base leading-none">❦</span>
                            <div class="w-12 h-[1px] bg-gradient-to-l from-transparent to-sakura-300"></div>
                        </div>

                        <!-- Wedding Date -->
                        <p class="font-serif text-xl font-bold tracking-wider text-sakura-900">
                            {{ $dayNum }} tháng {{ $monthNum }}, {{ $yearNum }}
                        </p>
                        @if(!empty($weddingCard->lunar_date))
                        <p class="text-[11px] text-sakura-800 italic mt-0.5">
                            ({{ $weddingCard->lunar_date }})
                        </p>
                        @endif

                        <!-- Personalized Guest Invitation Box -->
                        <div class="mt-4 pt-3.5 px-3 pb-2.5 rounded-xl bg-sakura-50/90 border border-sakura-200">
                            <p class="text-[11px] uppercase tracking-[0.24em] text-sakura-500 font-semibold">
                                Thân Mời
                            </p>
                            <p id="envelope-guest-name" class="font-serif text-xl font-bold text-sakura-700 mt-0.5">
                                Anh Minh Khôi
                            </p>
                            <p class="text-[11px] text-sakura-800 mt-1">
                                đến dự buổi tiệc chung vui cùng gia đình
                            </p>
                        </div>
                    </div>

                    <!-- Envelope Front Pocket & Interactive Button -->
                    <div class="relative -mt-12 z-30 mx-auto w-full h-38 rounded-b-2xl bg-gradient-to-b from-[#F2BFD0] via-[#E899B1] to-[#D66886] shadow-xl overflow-hidden border border-sakura-300 flex flex-col justify-end items-center pb-5 pt-10">
                        <!-- Diagonal Envelope Pocket Folds -->
                        <svg class="absolute inset-0 w-full h-full pointer-events-none" preserveAspectRatio="none" viewBox="0 0 400 170">
                            <polygon points="0,0 200,105 0,170" fill="#E38DA8" opacity="0.65" />
                            <polygon points="400,0 200,105 400,170" fill="#D47693" opacity="0.65" />
                            <polygon points="0,170 200,82 400,170" fill="#D66886" stroke="#FFF8FA" stroke-width="1" stroke-opacity="0.6" />
                        </svg>

                        <!-- Champagne Gold Sakura Wax Seal -->
                        <div class="relative z-20 -mt-7 mb-2.5 w-12 h-12 rounded-full bg-gradient-to-br from-[#F9E4B7] via-[#C9A46A] to-[#9E7840] p-0.5 shadow-lg flex items-center justify-center border border-white/80">
                            <div class="w-full h-full rounded-full border border-amber-900/30 flex items-center justify-center text-white font-serif text-xs font-bold">
                                🌸
                            </div>
                        </div>

                        <!-- Interactive "Mở thiệp" Button -->
                        <button id="open-invitation-btn" onclick="openInvitation()" class="btn-shimmer relative z-20 bg-white text-sakura-700 hover:bg-sakura-50 active:scale-95 transition-all duration-300 font-semibold text-sm px-8 py-2.5 rounded-full shadow-lg border border-sakura-200 flex items-center gap-2 cursor-pointer">
                            <span>Mở thiệp</span>
                            <span class="text-sakura-500">🌸</span>
                        </button>
                    </div>
                </div>

                <!-- Bottom Ornamental Note -->
                <div class="w-full text-center">
                    <svg class="w-full h-7 mx-auto" viewBox="0 0 480 48">
                        <use href="#sakura-ribbon-divider" />
                    </svg>
                    <p class="text-[11px] text-sakura-800/80 italic">
                        Chạm vào "Mở thiệp" để bật nhạc &amp; ngắm mưa hoa anh đào
                    </p>
                </div>
            </div>
        </div>

        <!-- ===================================================================
             2. HERO SECTION (100% EXACT MATCH TO REFERENCE SCREENSHOT)
             - Washi cream paper texture (#FAF7F2)
             - Large diagonal watercolor Sakura branch from top-right down left side
             - Single tilted white Polaroid frame (rotate 9.5deg) with pink studio portrait
             - Stacked crimson-rose calligraphy: {{ $weddingCard->groom_name }} / & / {{ $weddingCard->bride_name }} (#B34B5E)
             =================================================================== -->
        <section id="sec-hero" class="relative pt-0 pb-10 px-4 text-center overflow-hidden min-h-[820px] flex flex-col items-center">

            <!-- Subtle Top-Right Reopen Envelope Pill (Translucent so it doesn't disturb the artwork) -->
            <button id="reopen-envelope-btn" onclick="reopenEnvelope()" title="Xem lại phong bì"
                    class="absolute top-3 right-3 z-30 bg-white/60 hover:bg-white/90 backdrop-blur-sm border border-sakura-300/60 text-sakura-600 rounded-full px-2.5 py-1 text-[10px] font-medium shadow-sm transition flex items-center gap-1 cursor-pointer">
                <span>✉</span> Phong bì
            </button>

            <!-- LARGE WATERCOLOR SAKURA BRANCH ARTWORK (Stretching from top-right across to mid-left) -->
            <div class="pointer-events-none select-none absolute top-0 left-0 right-0 w-full h-[540px] z-10">
                <svg viewBox="0 0 480 560" class="w-full h-full overflow-visible" preserveAspectRatio="xMidYMin slice">
                    <defs>
                        <!-- Watercolor Wood Bark Linear Gradient -->
                        <linearGradient id="woodBarkGrad" x1="100%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" stop-color="#6B4C3E" />
                            <stop offset="35%" stop-color="#8C6756" />
                            <stop offset="70%" stop-color="#6E4E40" />
                            <stop offset="100%" stop-color="#825E4E" />
                        </linearGradient>
                        <linearGradient id="woodHighlightGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#B39382" stop-opacity="0.7" />
                            <stop offset="100%" stop-color="#755344" stop-opacity="0.2" />
                        </linearGradient>
                    </defs>

                    <!-- Upper Left Horizontal Sub-Branch -->
                    <path d="M 315,62 C 245,58 175,38 95,46 C 55,50 22,68 -12,86"
                          fill="none" stroke="url(#woodBarkGrad)" stroke-width="7.5" stroke-linecap="round" />
                    <path d="M 115,45 C 78,28 38,34 -5,52"
                          fill="none" stroke="#7E5B4B" stroke-width="3.5" stroke-linecap="round" />

                    <!-- Main Diagonal Trunk from Top-Right (485, 16) Sweeping Down Left Side (-15, 365) -->
                    <path d="M 492,12 C 430,55 372,82 292,115 C 215,146 142,205 86,265 C 48,308 16,338 -16,375"
                          fill="none" stroke="url(#woodBarkGrad)" stroke-width="15" stroke-linecap="round" />
                    <!-- Bark Watercolor Highlight Texture Stroke -->
                    <path d="M 488,15 C 428,56 370,80 290,113 C 212,144 140,202 84,262 C 46,305 14,335 -14,370"
                          fill="none" stroke="url(#woodHighlightGrad)" stroke-width="6" stroke-dasharray="28 14 18 10" stroke-linecap="round" />

                    <!-- Lower Twigs & Stems Behind the Left Edge of the Polaroid -->
                    <path d="M 162,188 C 115,198 78,210 38,225"
                          fill="none" stroke="#7A5747" stroke-width="4.5" stroke-linecap="round" />
                    <path d="M 122,226 C 120,256 112,282 108,302"
                          fill="none" stroke="#7A5747" stroke-width="3.2" stroke-linecap="round" />
                    <path d="M 54,296 C 65,332 62,368 48,395"
                          fill="none" stroke="#7A5747" stroke-width="3.5" stroke-linecap="round" />

                    <!-- Reddish-Pink Leaf/Bud Shoots Along Upper Branch -->
                    <ellipse cx="356" cy="96" rx="11" ry="4.5" transform="rotate(-38 356 96)" fill="#C66B75" opacity="0.85" />
                    <ellipse cx="225" cy="44" rx="9" ry="4" transform="rotate(28 225 44)" fill="#B55965" opacity="0.85" />
                    <ellipse cx="258" cy="136" rx="8" ry="3.8" transform="rotate(-25 258 136)" fill="#C66B75" opacity="0.8" />

                    <!-- Top Edge Blooming Cluster (x: 190-275, y: 12-30) -->
                    <use href="#watercolor-side-blossom" transform="translate(262, 22) scale(1.25) rotate(18)" />
                    <use href="#sakura-blossom-full" transform="translate(216, 16) scale(0.95) rotate(-12)" />

                    <!-- Upper-Left Hanging Buds (x: 10-95, y: 30-115) -->
                    <use href="#watercolor-round-bud" transform="translate(46, 22) scale(0.95) rotate(-25)" />
                    <line x1="92" y1="46" x2="84" y2="76" stroke="#7A5747" stroke-width="2.2" />
                    <use href="#watercolor-round-bud" transform="translate(84, 76) scale(1.25) rotate(8)" />
                    <line x1="34" y1="62" x2="18" y2="95" stroke="#7A5747" stroke-width="2" />
                    <use href="#watercolor-round-bud" transform="translate(18, 95) scale(0.85) rotate(18)" />
                    <use href="#watercolor-round-bud" transform="translate(2, 54) scale(0.75) rotate(-15)" />

                    <!-- Main Upper Hero Sakura Blossom & Bud (x: 162, y: 66) -->
                    <use href="#sakura-blossom-full" transform="translate(162, 66) scale(1.22) rotate(14)" />
                    <line x1="186" y1="82" x2="195" y2="100" stroke="#7A5747" stroke-width="2" />
                    <use href="#watercolor-round-bud" transform="translate(196, 98) scale(0.9) rotate(-18)" />

                    <!-- Mid-Left Double Sakura Cluster (x: 55-95, y: 165-225) -->
                    <use href="#sakura-blossom-full" transform="translate(82, 172) scale(1.05) rotate(-18)" />
                    <use href="#sakura-blossom-full" transform="translate(62, 212) scale(0.96) rotate(22)" />

                    <!-- Hanging Round Buds Behind the Left Edge of the Tilted Polaroid (x: 108-145, y: 240-360) -->
                    <use href="#watercolor-round-bud" transform="translate(110, 248) scale(0.85) rotate(10)" />
                    <use href="#watercolor-side-blossom" transform="translate(142, 266) scale(0.95) rotate(-30)" />
                    <use href="#watercolor-round-bud" transform="translate(128, 315) scale(1.05) rotate(15)" />
                    <use href="#watercolor-round-bud" transform="translate(108, 365) scale(0.95) rotate(-8)" />
                    <use href="#watercolor-round-bud" transform="translate(95, 422) scale(1.05) rotate(12)" />

                    <!-- Bottom-Left Blossom & Buds Near Left Edge (x: 0-55, y: 345-445) -->
                    <use href="#sakura-blossom-full" transform="translate(38, 358) scale(1.1) rotate(-15)" />
                    <use href="#watercolor-round-bud" transform="translate(2, 442) scale(0.8) rotate(20)" />
                </svg>
            </div>

            <!-- SINGLE TILTED WHITE POLAROID FRAME (Overlapping the Sakura Branch) -->
            <div class="reveal-scale relative z-20 mt-[118px] ml-7 sm:ml-9">
                <div onclick="openLightbox(0)" class="hero-polaroid-frame cursor-pointer w-[278px] sm:w-[298px]">
                    <!-- Studio Pink Portrait Container (#ECA6B0) -->
                    <div class="relative w-full aspect-[3/4] overflow-hidden bg-[#ECA6B0]">
                        @if(!empty($weddingCard->cover_image) || !empty($weddingCard->groom_avatar))
                            <img src="{{ $weddingCard->cover_image ? asset('storage/' . $weddingCard->cover_image) : asset('storage/' . $weddingCard->groom_avatar) }}" 
                                 alt="{{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}" 
                                 class="w-full h-full object-cover object-center"
                                 onerror="this.src='https://placehold.co/500x680/FDF0F4/5A3E46?text={{ urlencode($weddingCard->couple_name) }}'">
                        @else
                        <!-- Generated High-Resolution Studio Couple Portrait (Groom in white suit & glasses + Bride in white strapless gown on pastel pink studio background) -->
                        <svg viewBox="0 0 600 800" class="w-full h-full object-cover block" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <!-- Studio Pastel Pink Backdrop Gradient -->
                                <radialGradient id="studioPinkBg" cx="55%" cy="38%" r="72%">
                                    <stop offset="0%" stop-color="#F3B7C0" />
                                    <stop offset="55%" stop-color="#ECA5B0" />
                                    <stop offset="100%" stop-color="#DF8F9B" />
                                </radialGradient>
                                <linearGradient id="suitWhite" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#FFFFFF" />
                                    <stop offset="65%" stop-color="#F7F4F2" />
                                    <stop offset="100%" stop-color="#E8E2DE" />
                                </linearGradient>
                                <linearGradient id="gownWhite" x1="0%" y1="0%" x2="0%" y2="100%">
                                    <stop offset="0%" stop-color="#FFFFFF" />
                                    <stop offset="50%" stop-color="#FAF7F7" />
                                    <stop offset="100%" stop-color="#EFE9E9" />
                                </linearGradient>
                                <linearGradient id="skinTone" x1="0%" y1="0%" x2="0%" y2="100%">
                                    <stop offset="0%" stop-color="#FFE7DC" />
                                    <stop offset="100%" stop-color="#F5CBB8" />
                                </linearGradient>
                            </defs>

                            <!-- Pastel Pink Studio Backdrop -->
                            <rect width="600" height="800" fill="url(#studioPinkBg)" />

                            <!-- Subtle Warm Floor/Backdrop Shadow -->
                            <ellipse cx="300" cy="760" rx="260" ry="60" fill="#CF7D8A" opacity="0.35" />

                            <!-- ================= GROOM (LEFT, WHITE SUIT & GLASSES, CHEEK HEART POSE) ================= -->
                            <!-- Groom White Trousers -->
                            <path d="M 105,540 L 65,800 L 160,800 L 195,625 L 205,800 L 290,800 L 285,540 Z" fill="#F0ECE9" />
                            <path d="M 192,590 L 160,800" stroke="#DDD6D0" stroke-width="3" fill="none" />

                            <!-- Groom White Double-Breasted Suit Jacket -->
                            <path d="M 135,285 C 165,265 275,270 315,305 L 302,575 C 235,585 155,565 98,545 Z" fill="url(#suitWhite)" />
                            <!-- Suit Lapels & Shirt/Tie -->
                            <polygon points="245,282 292,300 265,385 235,345" fill="#D5DCE6" />
                            <polygon points="258,312 272,316 258,378 246,356" fill="#5A382E" />
                            <path d="M 215,280 L 252,395 L 302,312" fill="none" stroke="#EAE4E0" stroke-width="4" />

                            <!-- Groom Raised Left Arm Making Cheek Heart -->
                            <path d="M 135,295 C 90,285 68,265 78,242 C 92,218 165,205 235,212 L 245,252 C 190,262 155,278 135,295 Z" fill="url(#suitWhite)" />
                            <!-- Groom Left Hand (Curved Heart on Cheek) -->
                            <path d="M 232,208 C 255,198 272,206 270,224 C 266,238 248,236 235,230 Z" fill="url(#skinTone)" />

                            <!-- Groom Neck & Head (Tilted Playfully Toward Bride) -->
                            <path d="M 262,238 L 305,248 L 295,302 L 252,290 Z" fill="url(#skinTone)" />
                            <ellipse cx="305" cy="215" rx="46" ry="56" transform="rotate(18 305 215)" fill="url(#skinTone)" />

                            <!-- Groom Stylish Black Hair -->
                            <path d="M 268,185 C 265,148 308,132 348,148 C 378,160 385,192 365,215 C 355,188 332,175 305,178 C 288,180 276,192 268,185 Z" fill="#1F1A1C" />
                            <!-- Groom Eyeglasses -->
                            <g transform="rotate(18 312 212)" stroke="#23191B" stroke-width="3.2" fill="none">
                                <rect x="292" y="198" width="24" height="17" rx="4" fill="#FFFFFF" fill-opacity="0.15" />
                                <rect x="324" y="198" width="22" height="17" rx="4" fill="#FFFFFF" fill-opacity="0.15" />
                                <line x1="316" y1="204" x2="324" y2="204" />
                                <line x1="276" y1="202" x2="292" y2="204" />
                            </g>
                            <!-- Groom Happy Smile -->
                            <path d="M 304,238 Q 318,252 332,240 Z" fill="#B84A58" />
                            <path d="M 306,239 Q 318,244 330,240" stroke="#FFFFFF" stroke-width="3" fill="none" />

                            <!-- ================= BRIDE (RIGHT, WHITE STRAPLESS BALLGOWN, CHEEK HEART POSE) ================= -->
                            <!-- Bride Neck, Shoulders & Deolletage -->
                            <path d="M 345,325 C 365,305 438,312 462,338 L 452,415 L 340,405 Z" fill="url(#skinTone)" />
                            <path d="M 385,268 L 422,272 L 420,332 L 382,328 Z" fill="url(#skinTone)" />

                            <!-- Bride Head & Radiant Face -->
                            <ellipse cx="408" cy="242" rx="44" ry="54" transform="rotate(-6 408 242)" fill="url(#skinTone)" />
                            <!-- Bride Long Wavy Dark Hair -->
                            <path d="M 366,225 C 364,175 408,168 442,188 C 468,205 468,255 458,312 C 448,265 446,225 426,205 C 402,196 378,205 366,225 Z" fill="#1E181A" />
                            <!-- Bride Eyes, Blush & Sweet Smile -->
                            <circle cx="392" cy="238" r="9" fill="#F29CA8" opacity="0.45" />
                            <circle cx="432" cy="242" r="9" fill="#F29CA8" opacity="0.45" />
                            <path d="M 384,225 Q 394,220 402,226" stroke="#2B1E20" stroke-width="2.8" fill="none" stroke-linecap="round" />
                            <path d="M 418,227 Q 428,222 436,228" stroke="#2B1E20" stroke-width="2.8" fill="none" stroke-linecap="round" />
                            <path d="M 396,256 Q 410,268 424,257 Z" fill="#C84B5C" />
                            <path d="M 399,257 Q 410,262 421,258" stroke="#FFFFFF" stroke-width="2.5" fill="none" />

                            <!-- Bride Right Arm & Groom Right Sleeve Holding Hands at Center -->
                            <path d="M 285,325 C 318,355 322,425 305,468 L 265,455 C 268,405 262,358 285,325 Z" fill="url(#suitWhite)" />
                            <!-- Interlocked Hands in Center -->
                            <circle cx="298" cy="368" r="22" fill="url(#skinTone)" />
                            <path d="M 286,362 Q 298,354 310,365" stroke="#E2B29E" stroke-width="2" fill="none" />

                            <!-- Bride Left Arm Raised Making Cheek Heart -->
                            <path d="M 455,335 C 485,355 498,395 485,418 C 468,412 456,365 442,272 L 456,265 C 476,315 492,358 485,418" fill="url(#skinTone)" />
                            <circle cx="445" cy="258" r="14" fill="url(#skinTone)" />

                            <!-- Bride White Strapless Corset Bodice & Fluffy Tulle Skirt -->
                            <path d="M 342,382 C 358,364 388,368 400,384 C 414,368 442,366 456,385 L 444,505 C 410,518 372,515 346,498 Z" fill="url(#gownWhite)" />
                            <!-- Voluminous White Tulle Ballgown Skirt -->
                            <path d="M 346,495 C 295,575 245,685 215,800 L 585,800 C 565,665 515,565 444,498 Z" fill="url(#gownWhite)" />
                            <!-- Delicate Tulle Skirt Folds -->
                            <path d="M 368,508 L 285,800" stroke="#EAE2E2" stroke-width="2.5" fill="none" />
                            <path d="M 398,512 L 385,800" stroke="#EFE8E8" stroke-width="3" fill="none" />
                            <path d="M 426,508 L 495,800" stroke="#EAE2E2" stroke-width="2.5" fill="none" />
                        </svg>
                        @endif
                    </div>
                </div>
            </div>

            <!-- STACKED CALLIGRAPHY COUPLE NAMES DIRECTLY BELOW THE PHOTO ({{ $weddingCard->groom_name }} / & / {{ $weddingCard->bride_name }}) -->
            <div class="reveal-item relative z-20 mt-14 mb-4 text-center select-none">
                <h1 class="font-calligraphy text-[58px] sm:text-[64px] text-[#B34B5E] leading-[1.05] tracking-normal drop-shadow-[0_1px_1px_rgba(179,75,94,0.12)]">
                    {{ $weddingCard->groom_name }}
                </h1>
                <div class="font-calligraphy text-[44px] sm:text-[48px] text-[#B34B5E] leading-none my-2">
                    &amp;
                </div>
                <h1 class="font-calligraphy text-[60px] sm:text-[66px] text-[#B34B5E] leading-[1.05] tracking-normal drop-shadow-[0_1px_1px_rgba(179,75,94,0.12)]">
                    {{ $weddingCard->bride_name }}
                </h1>
            </div>

            <!-- Subtle Scroll Prompt & Personalized Invitation Note Below the Hero Fold -->
            <div class="reveal-item mt-8 pt-4 w-full max-w-[355px] mx-auto">
                <div class="my-2 flex items-center justify-center gap-2.5 text-sakura-400">
                    <div class="w-12 h-[1px] bg-gradient-to-r from-transparent to-sakura-300"></div>
                    <span class="text-sakura-500 text-sm">❦</span>
                    <span class="font-serif font-semibold text-sm tracking-[0.22em] text-sakura-700">{{ $dayNum }} . {{ $monthNum }} . {{ $yearNum }}</span>
                    <span class="text-sakura-500 text-sm">❦</span>
                    <div class="w-12 h-[1px] bg-gradient-to-l from-transparent to-sakura-300"></div>
                </div>

                <!-- Personalized Welcome Banner for Anh Minh Khôi -->
                <div class="mt-4 bg-white/75 backdrop-blur-sm border border-sakura-200 rounded-2xl p-3.5 shadow-sm">
                    <p class="text-[11px] uppercase tracking-[0.2em] text-sakura-500 font-semibold">Thân Mời Quý Khách</p>
                    <p id="hero-guest-name" class="font-serif text-lg font-bold text-sakura-600 mt-0.5">Anh Minh Khôi</p>
                    <p class="text-xs text-sakura-800 mt-0.5">Đến dự buổi tiệc chung vui cùng gia đình chúng tôi</p>
                </div>
            </div>

            <!-- Ornamental Sakura Divider -->
            <div class="mt-6 -mx-4 w-full">
                <svg class="w-full h-10" viewBox="0 0 480 48">
                    <use href="#sakura-ribbon-divider" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             3. FAMILY INFORMATION WITH HIERARCHY (THÔNG TIN HAI GIA ĐÌNH & THỨ BẬC)
             =================================================================== -->
        <section id="sec-family" class="relative py-5 px-6 text-center">
            <!-- Sakura Header Emblem -->
            <div class="reveal-item mx-auto w-36 h-11 mb-2">
                <svg viewBox="0 0 200 50" class="w-full h-full">
                    <use href="#sakura-section-emblem" />
                </svg>
            </div>

            <p class="reveal-item text-[11px] uppercase tracking-[0.24em] text-sakura-500 font-semibold mb-3">
                Thông Tin Hai Gia Đình
            </p>

            <!-- Two-Column Symmetrical Layout: NHÀ TRAI | NHÀ GÁI -->
            <div class="reveal-item grid grid-cols-2 gap-3 bg-sakura-100/65 border border-sakura-200 rounded-2xl p-4 shadow-sm relative">
                <!-- Center Vertical Line -->
                <div class="absolute inset-y-4 left-1/2 w-[1px] bg-gradient-to-b from-transparent via-sakura-300 to-transparent"></div>

                <!-- Nhà Trai -->
                <div class="pr-2 text-center">
                    <span class="inline-block bg-sakura-500 text-white text-[10px] uppercase tracking-[0.18em] px-2.5 py-0.5 rounded-full font-medium mb-2">
                        Nhà Trai
                    </span>
                    <p class="text-xs text-sakura-800 leading-relaxed">
                        Ông: <strong class="text-sakura-900">{{ $weddingCard->groom_father_name ?: ($weddingCard->groom_father ?: 'Nguyễn Văn Hòa') }}</strong>
                    </p>
                    <p class="text-xs text-sakura-800 leading-relaxed mt-0.5">
                        Bà: <strong class="text-sakura-900">{{ $weddingCard->groom_mother_name ?: ($weddingCard->groom_mother ?: 'Lê Thị Bích Thủy') }}</strong>
                    </p>
                    <p class="text-[11px] text-sakura-800/85 mt-1.5 leading-snug">
                        📍 {{ $weddingCard->address_groom ?: ($weddingCard->groom_address ?: 'Quận Cầu Giấy, TP. Hà Nội') }}
                    </p>
                </div>

                <!-- Nhà Gái -->
                <div class="pl-2 text-center">
                    <span class="inline-block bg-sakura-500 text-white text-[10px] uppercase tracking-[0.18em] px-2.5 py-0.5 rounded-full font-medium mb-2">
                        Nhà Gái
                    </span>
                    <p class="text-xs text-sakura-800 leading-relaxed">
                        Ông: <strong class="text-sakura-900">{{ $weddingCard->bride_father_name ?: ($weddingCard->bride_father ?: 'Trần Quốc Tuấn') }}</strong>
                    </p>
                    <p class="text-xs text-sakura-800 leading-relaxed mt-0.5">
                        Bà: <strong class="text-sakura-900">{{ $weddingCard->bride_mother_name ?: ($weddingCard->bride_mother ?: 'Phạm Thị Mai Hương') }}</strong>
                    </p>
                    <p class="text-[11px] text-sakura-800/85 mt-1.5 leading-snug">
                        📍 {{ $weddingCard->address_bride ?: ($weddingCard->bride_address ?: 'Quận Ba Đình, TP. Hà Nội') }}
                    </p>
                </div>
            </div>

            <!-- Formal Announcement & Explicit Birth-Order Hierarchy -->
            <div class="reveal-item mt-7 space-y-2">
                <p class="text-xs uppercase tracking-[0.2em] text-sakura-600 font-semibold">
                    Trân Trọng Báo Tin Lễ Thành Hôn Của Hai Con Chúng Tôi
                </p>

                <div class="py-3 bg-white/85 border border-sakura-200/80 rounded-2xl px-4 mt-3 shadow-sm">
                    <!-- Groom Full Name & Hierarchy -->
                    <div>
                        <span class="inline-block text-[10px] uppercase tracking-[0.25em] text-champagne-dark bg-champagne-light border border-champagne/40 px-2.5 py-0.5 rounded-full font-semibold">
                            Chú Rể • {{ $weddingCard->groom_rank ?: 'Trưởng Nam' }}
                        </span>
                        <h3 class="font-pattaya text-3xl text-sakura-500 mt-1">
                            {{ $weddingCard->groom_name }}
                        </h3>
                    </div>

                    <!-- Divider -->
                    <div class="my-2.5 flex items-center justify-center gap-3">
                        <div class="w-12 h-[1px] bg-sakura-200"></div>
                        <span class="font-vibes text-2xl text-sakura-500">&amp;</span>
                        <div class="w-12 h-[1px] bg-sakura-200"></div>
                    </div>

                    <!-- Bride Full Name & Hierarchy -->
                    <div>
                        <span class="inline-block text-[10px] uppercase tracking-[0.25em] text-champagne-dark bg-champagne-light border border-champagne/40 px-2.5 py-0.5 rounded-full font-semibold">
                            Cô Dâu • {{ $weddingCard->bride_rank ?: 'Út Nữ' }}
                        </span>
                        <h3 class="font-pattaya text-3xl text-sakura-500 mt-1">
                            {{ $weddingCard->bride_name }}
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Ornamental Sakura Divider -->
            <div class="mt-6 -mx-6">
                <svg class="w-full h-10" viewBox="0 0 480 48">
                    <use href="#sakura-ribbon-divider" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             4. SEPARATE CEREMONY CARDS: LỄ VU QUY, LỄ THÀNH HÔN & TIỆC CƯỚI
             =================================================================== -->
        <section id="sec-ceremonies" class="relative py-5 px-6 space-y-6">
            <!-- Sakura Header Emblem -->
            <div class="reveal-item mx-auto w-36 h-11 -mb-2">
                <svg viewBox="0 0 200 50" class="w-full h-full">
                    <use href="#sakura-section-emblem" />
                </svg>
            </div>

            <div class="reveal-item text-center">
                <p class="text-[11px] uppercase tracking-[0.25em] text-sakura-500 font-semibold">Thời Gian &amp; Địa Điểm</p>
                <h3 class="font-pattaya text-3xl text-sakura-500 mt-0.5">Nghi Thức Hôn Lễ</h3>
            </div>

            <!-- CARD 1: LỄ VU QUY (NHÀ GÁI) -->
            <div class="reveal-left bg-white border border-sakura-200 rounded-3xl p-5 shadow-md relative overflow-hidden">
                <div class="flex items-center justify-between">
                    <span class="inline-flex items-center gap-1.5 bg-sakura-100 text-sakura-700 text-[11px] font-semibold px-3 py-1 rounded-full border border-sakura-200">
                        <span>🌸</span> Lễ Vu Quy • Nhà Gái
                    </span>
                    <span class="text-xs font-serif italic text-sakura-600">{{ !empty($weddingCard->ceremony_time) ? $weddingCard->ceremony_time : '08:00' }} — {{ $dayOfWeekVi }}</span>
                </div>

                <h4 class="font-pattaya text-2xl text-sakura-500 mt-2.5">Lễ Vu Quy</h4>

                <!-- Large Editorial Date Block -->
                <div class="my-3 py-2.5 px-3 bg-sakura-50/90 border border-sakura-200/80 rounded-2xl flex items-center justify-center gap-3 font-serif text-sakura-900">
                    <span class="text-3xl font-bold text-sakura-600">{{ $dayNum }}</span>
                    <span class="h-6 w-[1px] bg-sakura-300"></span>
                    <span class="text-lg font-semibold uppercase tracking-wider">Tháng {{ $monthNum }}</span>
                    <span class="h-6 w-[1px] bg-sakura-300"></span>
                    <span class="text-2xl font-bold">{{ $yearNum }}</span>
                </div>

                @if(!empty($weddingCard->lunar_date))
                <p class="text-xs italic text-sakura-600 text-center">
                    ({{ $weddingCard->lunar_date }})
                </p>
                @endif

                <div class="mt-3 pt-3 border-t border-dashed border-sakura-200 text-xs text-sakura-800 space-y-1.5">
                    <p>📍 <strong>Tại Tư Gia Nhà Gái:</strong> {{ $weddingCard->bride_address ?: 'Số 86 Phan Đình Phùng, Quận Ba Đình, TP. Hà Nội' }}</p>
                    <div class="pt-1.5 flex gap-2">
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($weddingCard->bride_address ?: 'Số 86 Phan Đình Phùng, Quận Ba Đình, TP. Hà Nội') }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-1 bg-sakura-100 hover:bg-sakura-200 text-sakura-700 font-medium px-3 py-1.5 rounded-xl transition">
                            <span>🗺️</span> Xem bản đồ Nhà Gái
                        </a>
                    </div>
                </div>
            </div>

            <!-- CARD 2: LỄ THÀNH HÔN (NHÀ TRAI) -->
            <div class="reveal-right bg-white border border-sakura-200 rounded-3xl p-5 shadow-md relative overflow-hidden">
                <div class="flex items-center justify-between">
                    <span class="inline-flex items-center gap-1.5 bg-sakura-100 text-sakura-700 text-[11px] font-semibold px-3 py-1 rounded-full border border-sakura-200">
                        <span>💍</span> Lễ Thành Hôn • Nhà Trai
                    </span>
                    <span class="text-xs font-serif italic text-sakura-600">{{ !empty($weddingCard->wedding_time) ? $timeStrShort : '10:00' }} — {{ $dayOfWeekVi }}</span>
                </div>

                <h4 class="font-pattaya text-2xl text-sakura-500 mt-2.5">Lễ Thành Hôn</h4>

                <div class="my-3 py-2.5 px-3 bg-sakura-50/90 border border-sakura-200/80 rounded-2xl flex items-center justify-center gap-3 font-serif text-sakura-900">
                    <span class="text-2xl font-bold text-sakura-600">{{ !empty($weddingCard->wedding_time) ? $timeStrShort : '10:00' }}</span>
                    <span class="h-6 w-[1px] bg-sakura-300"></span>
                    <span class="text-lg font-semibold">{{ $dayOfWeekVi }}, {{ $dayNum }}.{{ $monthNum }}.{{ $yearNum }}</span>
                </div>

                @if(!empty($weddingCard->lunar_date))
                <p class="text-xs italic text-sakura-600 text-center">
                    ({{ $weddingCard->lunar_date }})
                </p>
                @endif

                <div class="mt-3 pt-3 border-t border-dashed border-sakura-200 text-xs text-sakura-800 space-y-1.5">
                    <p>📍 <strong>Tại Tư Gia Nhà Trai:</strong> {{ $weddingCard->groom_address ?: 'Số 168 Cầu Giấy, Quận Cầu Giấy, TP. Hà Nội' }}</p>
                    <div class="pt-1.5 flex gap-2">
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($weddingCard->groom_address ?: 'Số 168 Cầu Giấy, Quận Cầu Giấy, TP. Hà Nội') }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-1 bg-sakura-100 hover:bg-sakura-200 text-sakura-700 font-medium px-3 py-1.5 rounded-xl transition">
                            <span>🗺️</span> Xem bản đồ Nhà Trai
                        </a>
                    </div>
                </div>
            </div>

            <!-- CARD 3: TIỆC CƯỚI NHÀ HÀNG (SAKURA GRAND PALACE + EMBEDDED MAP) -->
            <div class="reveal-scale bg-gradient-to-b from-[#FFF5F8] to-white border-2 border-sakura-300 rounded-3xl p-5 shadow-lg relative overflow-hidden">
                <div class="flex items-center justify-between">
                    <span class="inline-flex items-center gap-1.5 bg-sakura-500 text-white text-[11px] font-semibold px-3 py-1 rounded-full shadow-sm">
                        <span>🥂</span> Tiệc Cưới Nhà Hàng
                    </span>
                    <span class="text-xs font-serif font-bold text-sakura-700">{{ $timeStrShort }} — {{ $dayNum }}.{{ $monthNum }}.{{ $yearNum }}</span>
                </div>

                <h4 class="font-pattaya text-2xl text-sakura-500 mt-2.5">{{ $weddingCard->wedding_location ?: 'Sakura Grand Palace' }}</h4>
                <p class="text-xs font-semibold text-sakura-800 mt-0.5">Sảnh Tiệc Cưới Trọng Thể</p>
                <p class="text-xs text-sakura-800/90 mt-1">📍 {{ $weddingCard->wedding_address ?: '268 Đường Thanh Niên (Ven Hồ Tây), Quận Tây Hồ, TP. Hà Nội' }}</p>

                <div class="my-3 py-2 px-3 bg-white border border-sakura-200 rounded-xl flex items-center justify-between text-xs">
                    <span>🕕 Đón khách: <strong>{{ !empty($timelineEvents[0]['time']) ? $timelineEvents[0]['time'] : '17:30' }}</strong></span>
                    <span class="text-sakura-300">|</span>
                    <span>🥂 Khai tiệc: <strong>{{ $timeStrShort }} {{ $dayOfWeekVi }}</strong></span>
                </div>

                <!-- Interactive Vector Map Preview of Sakura Grand Palace -->
                <div class="relative w-full h-44 rounded-2xl overflow-hidden border border-sakura-200 bg-[#FCF2F5] my-3">
                    <svg class="w-full h-full object-cover" viewBox="0 0 420 190" preserveAspectRatio="xMidYMid slice">
                        <rect width="420" height="190" fill="#FDF2F6" />
                        <!-- West Lake Water (Hồ Tây) & Trúc Bạch -->
                        <path d="M0,0 L240,0 Q210,95 120,130 L0,110 Z" fill="#E3F0F5" />
                        <path d="M260,120 Q340,105 420,135 L420,190 L240,190 Z" fill="#E3F0F5" />
                        <!-- Sakura Gardens -->
                        <circle cx="320" cy="52" r="36" fill="#F9DCE5" opacity="0.7" />
                        <!-- Thanh Niên Road -->
                        <path d="M40,190 Q200,95 360,0" stroke="#FFFFFF" stroke-width="12" fill="none" />
                        <path d="M40,190 Q200,95 360,0" stroke="#F2BFD0" stroke-width="7" fill="none" />
                        <text x="65" y="45" fill="#5A8396" font-size="10" font-style="italic" font-weight="600">Hồ Tây</text>
                        <text x="235" y="95" fill="#9E3A57" font-size="9" font-weight="600" transform="rotate(-30 235,95)">Đ. Thanh Niên</text>
                    </svg>

                    <!-- Pulsing Pin -->
                    <div class="absolute left-[50%] top-[48%] -translate-x-1/2 -translate-y-1/2 flex flex-col items-center">
                        <div class="bg-white/95 px-2.5 py-0.5 rounded-full shadow border border-sakura-300 text-[10px] font-bold text-sakura-700 mb-1">
                            🌸 {{ $weddingCard->wedding_location ?: 'Sakura Grand Palace' }}
                        </div>
                        <div class="relative flex items-center justify-center">
                            <span class="w-7 h-7 rounded-full bg-sakura-500/40 animate-ping absolute"></span>
                            <div class="w-6 h-6 rounded-full bg-sakura-500 text-white flex items-center justify-center shadow border border-white text-xs">
                                📍
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Google Maps Action Buttons -->
                <div class="grid grid-cols-2 gap-2.5 mt-3">
                    <a href="{{ $weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode(($weddingCard->wedding_location ?: 'Sakura Grand Palace') . ' ' . ($weddingCard->wedding_address ?: 'Hà Nội'))) }}" 
                       target="_blank" rel="noopener noreferrer"
                       class="bg-sakura-500 hover:bg-sakura-600 text-white text-xs font-medium py-2.5 px-3 rounded-xl text-center shadow-sm flex items-center justify-center gap-1.5 transition">
                        <span>🗺️</span> Chỉ đường Google Maps
                    </a>
                    <button onclick="copyVenueAddress()" class="bg-white hover:bg-sakura-50 text-sakura-800 border border-sakura-300 text-xs font-medium py-2.5 px-3 rounded-xl text-center flex items-center justify-center gap-1.5 transition cursor-pointer">
                        <span>📋</span> Sao chép địa chỉ
                    </button>
                </div>
            </div>

            <!-- Ornamental Sakura Divider -->
            <div class="pt-2 -mx-6">
                <svg class="w-full h-10" viewBox="0 0 480 48">
                    <use href="#sakura-ribbon-divider" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             5. MINI WEDDING CALENDAR (MAY 2026) & LIVE COUNTDOWN TIMER
             =================================================================== -->
        <section id="sec-calendar" class="relative py-5 px-6">
            <div class="reveal-scale bg-white border border-sakura-200 rounded-3xl p-5 shadow-md text-center">
                <p class="text-[11px] uppercase tracking-[0.25em] text-sakura-500 font-semibold">Lịch Ngày Chung Đôi</p>
                <h4 class="font-pattaya text-2xl text-sakura-500 mt-0.5 mb-3">
                    Tháng {{ $cal['month'] }} / {{ $cal['year'] }}
                </h4>

                <!-- Days of Week Header -->
                <div class="grid grid-cols-7 gap-1 text-[11px] font-semibold text-sakura-700 border-b border-sakura-100 pb-2 mb-2">
                    <div>T2</div><div>T3</div><div>T4</div><div>T5</div><div>T6</div><div>T7</div><div class="text-sakura-500">CN</div>
                </div>

                <!-- Dynamic Calendar Grid -->
                <div class="grid grid-cols-7 gap-y-2 gap-x-1 text-xs font-serif text-sakura-900 items-center">
                    @for($i = 0; $i < $leadEmpty; $i++)
                        <div></div>
                    @endfor
                    @for($d = 1; $d <= $cal['total_days']; $d++)
                        @php
                            $colIdx = ($leadEmpty + $d - 1) % 7;
                        @endphp
                        @if($d == $cal['active_day'])
                            <div class="relative flex items-center justify-center py-1">
                                <span class="pulse-heart absolute inset-0 m-auto w-8 h-8 rounded-full bg-sakura-500 text-white flex items-center justify-center shadow-md"></span>
                                <span class="relative z-10 text-white font-sans font-bold text-xs">{{ $d }}</span>
                                <span class="absolute -top-2 -right-0.5 text-[10px]">🌸</span>
                            </div>
                        @else
                            <div class="py-1 {{ $colIdx == 6 ? 'text-sakura-500 font-semibold' : '' }}">
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

                <!-- Live Countdown Timer Boxes -->
                <div class="mt-5 pt-4 border-t border-dashed border-sakura-200">
                    <p id="countdown-label" class="text-[11px] uppercase tracking-[0.2em] text-sakura-600 font-medium mb-2.5">
                        Đếm Ngược Khoảnh Khắc Chung Đôi
                    </p>
                    <div class="grid grid-cols-4 gap-2">
                        <div class="bg-sakura-50 border border-sakura-200 rounded-2xl py-2.5 px-1">
                            <span id="cd-days" class="font-serif text-2xl font-bold text-sakura-600 block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-sakura-800 mt-1 block">Ngày</span>
                        </div>
                        <div class="bg-sakura-50 border border-sakura-200 rounded-2xl py-2.5 px-1">
                            <span id="cd-hours" class="font-serif text-2xl font-bold text-sakura-600 block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-sakura-800 mt-1 block">Giờ</span>
                        </div>
                        <div class="bg-sakura-50 border border-sakura-200 rounded-2xl py-2.5 px-1">
                            <span id="cd-mins" class="font-serif text-2xl font-bold text-sakura-600 block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-sakura-800 mt-1 block">Phút</span>
                        </div>
                        <div class="bg-sakura-50 border border-sakura-200 rounded-2xl py-2.5 px-1">
                            <span id="cd-secs" class="font-serif text-2xl font-bold text-sakura-500 block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-sakura-800 mt-1 block">Giây</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ornamental Sakura Divider -->
            <div class="mt-6 -mx-6">
                <svg class="w-full h-10" viewBox="0 0 480 48">
                    <use href="#sakura-ribbon-divider" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             6. WEDDING TIMELINE (LỊCH TRÌNH NGÀY CƯỚI) & DRESS CODE
             =================================================================== -->
        <section id="sec-timeline" class="relative py-5 px-6">
            <!-- Sakura Header Emblem -->
            <div class="reveal-item mx-auto w-36 h-11 mb-2">
                <svg viewBox="0 0 200 50" class="w-full h-full">
                    <use href="#sakura-section-emblem" />
                </svg>
            </div>

            <div class="reveal-item text-center mb-6">
                <p class="text-[11px] uppercase tracking-[0.25em] text-sakura-500 font-semibold">Chương Trình Hôn Lễ</p>
                <h3 class="font-pattaya text-3xl text-sakura-500 mt-0.5">Lịch Trình Ngày Cưới</h3>
            </div>

            <!-- Dynamic Sakura Timeline -->
            <div class="relative pl-3 space-y-4 before:content-[''] before:absolute before:left-[36px] before:top-5 before:bottom-5 before:w-[1.5px] before:bg-gradient-to-b before:from-sakura-200 before:via-sakura-400 before:to-sakura-200">
                @php
                    $tlIcons = ['📸', '💍', '🥂', '🎶', '🌸', '✨'];
                @endphp
                @foreach($timelineEvents as $tIdx => $tl)
                    @php
                        $tTime = is_array($tl) ? ($tl['time'] ?? '') : '';
                        $tTitle = is_array($tl) ? ($tl['title'] ?? '') : '';
                        $tDesc = is_array($tl) ? ($tl['desc'] ?? ($tl['subtitle'] ?? '')) : '';
                        $tIcon = is_array($tl) && !empty($tl['icon']) ? $tl['icon'] : ($tlIcons[$tIdx % count($tlIcons)]);
                    @endphp
                    <div class="reveal-left relative flex items-center gap-3.5">
                        <div class="relative z-10 w-12 h-12 rounded-2xl bg-white border-2 border-sakura-300 shadow-sm flex items-center justify-center shrink-0 text-lg">
                            {{ $tIcon }}
                        </div>
                        <div class="flex-1 bg-white border border-sakura-200 rounded-2xl p-3.5 shadow-sm">
                            <div class="flex items-center justify-between">
                                <span class="bg-sakura-100 text-sakura-700 font-serif font-bold text-xs px-2.5 py-0.5 rounded-full">{{ $tTime }}</span>
                                <span class="text-[10px] text-sakura-500 font-medium">🌸 Nghi thức</span>
                            </div>
                            <h4 class="font-semibold text-sm text-sakura-900 mt-1">{{ $tTitle }}</h4>
                            @if(!empty($tDesc))
                            <p class="text-xs text-sakura-800 mt-0.5">{{ $tDesc }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- DRESS CODE SWATCHES -->
            <div class="reveal-item mt-8 bg-sakura-100/70 border border-sakura-200 rounded-3xl p-5 text-center shadow-sm">
                <p class="text-[11px] uppercase tracking-[0.25em] text-sakura-500 font-semibold">Gợi Ý Trang Phục</p>
                <h4 class="font-pattaya text-2xl text-sakura-500 mt-0.5">Dress Code</h4>
                <p class="text-xs text-sakura-800 mt-1">Sự đồng điệu sắc màu của Quý khách sẽ giúp không gian tiệc cưới thêm phần rạng rỡ</p>

                <div class="mt-4 flex items-center justify-center gap-6 flex-wrap">
                    @foreach($dressCodes as $dc)
                        @php
                            $cColor = is_array($dc) ? ($dc['color'] ?? '#F4C2D1') : '#F4C2D1';
                            $cLabel = is_array($dc) ? ($dc['label'] ?? '') : $dc;
                            $cDesc = is_array($dc) ? ($dc['desc'] ?? ($cLabel . ' — Gợi ý trang phục dự tiệc sang trọng.')) : '';
                        @endphp
                        <button onclick="selectDressCode('{{ addslashes($cLabel . ' (' . $cColor . ') — ' . $cDesc) }}')" class="group flex flex-col items-center gap-1.5 cursor-pointer">
                            <span class="w-12 h-12 rounded-full border-4 border-white shadow-md group-hover:scale-110 transition" style="background-color: {{ $cColor }}"></span>
                            <span class="text-[11px] font-medium text-sakura-900">{{ $cLabel }}</span>
                        </button>
                    @endforeach
                </div>

                @if(!empty($weddingCard->dress_code_note))
                <p id="dresscode-note" class="mt-3 text-xs italic text-sakura-800 bg-white/90 rounded-xl py-2 px-3 border border-sakura-200">
                    {{ $weddingCard->dress_code_note }}
                </p>
                @else
                <p id="dresscode-note" class="mt-3 text-xs italic text-sakura-800 bg-white/90 rounded-xl py-2 px-3 border border-sakura-200">
                    ✨ Chạm vào từng ô màu để xem gợi ý trang phục dự tiệc
                </p>
                @endif
            </div>

            <!-- Ornamental Sakura Divider -->
            <div class="mt-6 -mx-6">
                <svg class="w-full h-10" viewBox="0 0 480 48">
                    <use href="#sakura-ribbon-divider" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             7. INTERACTIVE 3D PHOTO ALBUM & LIGHTBOX GALLERY
             =================================================================== -->
        <section id="sec-album" class="relative py-5 px-6">
            <div class="reveal-item mx-auto w-36 h-11 mb-2">
                <svg viewBox="0 0 200 50" class="w-full h-full">
                    <use href="#sakura-section-emblem" />
                </svg>
            </div>

            <div class="reveal-item text-center mb-5">
                <p class="text-[11px] uppercase tracking-[0.25em] text-sakura-500 font-semibold">Kỷ Niệm Tình Yêu</p>
                <h3 class="font-pattaya text-3xl text-sakura-500 mt-0.5">Album Ảnh Cưới 3D</h3>
                <p class="text-xs text-sakura-800 italic mt-1">Chạm vào trang ảnh hoặc nút điều hướng để lật từng trang album</p>
            </div>

            <!-- Interactive 3D Page-Flip Book -->
            <div class="reveal-scale book-stage relative mx-auto w-full max-w-[360px] h-[425px] select-none">
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-[#E899B1] to-[#D66886] p-2.5 shadow-2xl border-2 border-sakura-200 flex items-center justify-center">
                    <!-- Left Book Binding Rings -->
                    <div class="absolute left-2 top-8 bottom-8 w-3 flex flex-col justify-between z-40 pointer-events-none">
                        <span class="w-4 h-2 rounded-full bg-gradient-to-r from-amber-100 to-amber-400 shadow"></span>
                        <span class="w-4 h-2 rounded-full bg-gradient-to-r from-amber-100 to-amber-400 shadow"></span>
                        <span class="w-4 h-2 rounded-full bg-gradient-to-r from-amber-100 to-amber-400 shadow"></span>
                        <span class="w-4 h-2 rounded-full bg-gradient-to-r from-amber-100 to-amber-400 shadow"></span>
                        <span class="w-4 h-2 rounded-full bg-gradient-to-r from-amber-100 to-amber-400 shadow"></span>
                    </div>

                    <div id="album-pages-stack" class="relative w-full h-full rounded-xl bg-white overflow-hidden">
                        <!-- Pages rendered by JS -->
                    </div>
                </div>
            </div>

            <!-- Album Flip Controls -->
            <div class="reveal-item mt-4 flex items-center justify-between max-w-[360px] mx-auto px-2">
                <button onclick="prevAlbumPage()" class="bg-white hover:bg-sakura-50 active:scale-95 text-sakura-700 border border-sakura-300 rounded-full px-4 py-1.5 text-xs font-medium shadow-sm flex items-center gap-1.5 transition cursor-pointer">
                    <span>←</span> Trang trước
                </button>
                <span id="album-page-indicator" class="font-serif text-sm font-semibold text-sakura-900">
                    Trang 1 / 6
                </span>
                <button onclick="nextAlbumPage()" class="bg-sakura-500 hover:bg-sakura-600 active:scale-95 text-white rounded-full px-4 py-1.5 text-xs font-medium shadow-sm flex items-center gap-1.5 transition cursor-pointer">
                    Lật trang <span>→</span>
                </button>
            </div>

            <!-- Thumbnail Grid Strip -->
            <div id="album-thumbs" class="reveal-item mt-4 grid grid-cols-6 gap-1.5 max-w-[360px] mx-auto">
                <!-- Populated by JS -->
            </div>

            <!-- Ornamental Sakura Divider -->
            <div class="mt-6 -mx-6">
                <svg class="w-full h-10" viewBox="0 0 480 48">
                    <use href="#sakura-ribbon-divider" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             8. RSVP CONFIRMATION FORM (PRE-FILLED WITH ANH MINH KHÔI) & GUESTBOOK
             =================================================================== -->
        <section id="sec-rsvp" class="relative py-5 px-6 space-y-8">
            <div class="reveal-item mx-auto w-36 h-11 -mb-2">
                <svg viewBox="0 0 200 50" class="w-full h-full">
                    <use href="#sakura-section-emblem" />
                </svg>
            </div>

            <!-- RSVP FORM CARD -->
            <div class="reveal-item bg-white border border-sakura-200 rounded-3xl p-5 shadow-md">
                <div class="text-center mb-4">
                    <p class="text-[11px] uppercase tracking-[0.25em] text-sakura-500 font-semibold">Thông Tin Phản Hồi</p>
                    <h3 class="font-pattaya text-3xl text-sakura-500 mt-0.5">Xác Nhận Tham Dự</h3>
                    <p class="text-xs text-sakura-800 mt-1">Sự hiện diện của Quý khách là niềm hạnh phúc lớn lao của gia đình chúng tôi</p>
                </div>

                <form id="rsvp-form" onsubmit="submitRSVP(event)" class="space-y-3 text-xs">
                    <div>
                        <label class="block text-sakura-900 font-medium mb-1">Tên Quý khách *</label>
                        <input id="rsvp-name" type="text" required value="Anh Minh Khôi" placeholder="Nhập họ và tên của bạn..." 
                               class="w-full rounded-xl border border-sakura-300 bg-sakura-50/50 px-3.5 py-2.5 text-sakura-900 font-medium focus:outline-none focus:border-sakura-500">
                    </div>

                    <div class="grid grid-cols-2 gap-2.5">
                        <div>
                            <label class="block text-sakura-900 font-medium mb-1">Khách mời của</label>
                            <select id="rsvp-side" class="w-full rounded-xl border border-sakura-300 bg-sakura-50/50 px-3 py-2.5 text-sakura-900 focus:outline-none focus:border-sakura-500">
                                <option value="Khách Nhà Trai">Khách Nhà Trai</option>
                                <option value="Khách Nhà Gái">Khách Nhà Gái</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sakura-900 font-medium mb-1">Số lượng tham dự</label>
                            <select id="rsvp-count" class="w-full rounded-xl border border-sakura-300 bg-sakura-50/50 px-3 py-2.5 text-sakura-900 focus:outline-none focus:border-sakura-500">
                                <option value="1 người">1 người</option>
                                <option value="2 người" selected>2 người</option>
                                <option value="Gia đình (3-4 người)">Gia đình (3-4 người)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sakura-900 font-medium mb-1">Xác nhận tham dự</label>
                        <div class="grid grid-cols-2 gap-2">
                            <label class="flex items-center justify-center gap-1.5 border border-sakura-300 rounded-xl py-2.5 px-2 cursor-pointer has-[:checked]:bg-sakura-500 has-[:checked]:text-white has-[:checked]:border-sakura-500 transition">
                                <input type="radio" name="attendance" value="Sẽ tham gia" checked class="hidden">
                                <span>🌸 Sẽ tham gia</span>
                            </label>
                            <label class="flex items-center justify-center gap-1.5 border border-sakura-300 rounded-xl py-2.5 px-2 cursor-pointer has-[:checked]:bg-sakura-500 has-[:checked]:text-white has-[:checked]:border-sakura-500 transition">
                                <input type="radio" name="attendance" value="Rất tiếc không thể đến" class="hidden">
                                <span>🕊️ Rất tiếc không thể đến</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sakura-900 font-medium mb-1">Lưu ý thực đơn (Ăn chay / Dị ứng nếu có)</label>
                        <select id="rsvp-diet" class="w-full rounded-xl border border-sakura-300 bg-sakura-50/50 px-3 py-2 text-sakura-900 focus:outline-none focus:border-sakura-500">
                            <option value="Thực đơn tiêu chuẩn">Thực đơn tiêu chuẩn (Mặn)</option>
                            <option value="Thực đơn Chay">Đăng ký bàn Chay</option>
                            <option value="Có trẻ nhỏ đi cùng">Có trẻ nhỏ đi cùng (cần ghế trẻ em)</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-shimmer w-full bg-sakura-500 hover:bg-sakura-600 text-white font-semibold py-3 rounded-xl shadow-md transition cursor-pointer">
                        Gửi Xác Nhận Tham Dự 🌸
                    </button>
                </form>
            </div>

            <!-- GUESTBOOK / SỔ LỜI CHÚC -->
            <div class="reveal-item bg-sakura-100/65 border border-sakura-200 rounded-3xl p-5 shadow-md">
                <div class="text-center mb-4">
                    <p class="text-[11px] uppercase tracking-[0.25em] text-sakura-500 font-semibold">Gửi Trao Yêu Thương</p>
                    <h3 class="font-pattaya text-3xl text-sakura-500 mt-0.5">Sổ Lưu Bút</h3>
                </div>

                <!-- Preset Quick-Wish Chips -->
                <div class="flex flex-wrap gap-1.5 mb-3">
                    <button type="button" onclick="fillPresetWish('Chúc {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }} trăm năm hạnh phúc, tình yêu luôn rực rỡ như mùa hoa anh đào!')" class="text-[11px] bg-white hover:bg-sakura-50 border border-sakura-200 text-sakura-800 rounded-full px-2.5 py-1 transition cursor-pointer">
                        🌸 Trăm năm hạnh phúc
                    </button>
                    <button type="button" onclick="fillPresetWish('Chúc hai bạn sớm đón thiên thần nhỏ, gia đình luôn ngập tràn tiếng cười!')" class="text-[11px] bg-white hover:bg-sakura-50 border border-sakura-200 text-sakura-800 rounded-full px-2.5 py-1 transition cursor-pointer">
                        👶 Sớm sinh quý tử
                    </button>
                </div>

                <form onsubmit="submitWish(event)" class="space-y-2.5 text-xs mb-5">
                    <input id="wish-author" type="text" required value="Anh Minh Khôi" placeholder="Tên của bạn..." 
                           class="w-full rounded-xl border border-sakura-300 bg-white px-3.5 py-2 text-sakura-900 focus:outline-none focus:border-sakura-500">
                    <textarea id="wish-message" rows="2" required placeholder="Viết lời chúc mừng gửi tới {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}..." 
                              class="w-full rounded-xl border border-sakura-300 bg-white px-3.5 py-2 text-sakura-900 focus:outline-none focus:border-sakura-500"></textarea>
                    <button type="submit" class="w-full bg-sakura-600 hover:bg-sakura-700 text-white font-semibold py-2.5 rounded-xl shadow transition cursor-pointer">
                        Gửi Lời Chúc Mừng 💌
                    </button>
                </form>

                <!-- Live Scrollable Wishes Feed -->
                <div id="wishes-list" class="wishes-scroll max-h-60 overflow-y-auto space-y-2.5 pr-1">
                    <!-- Populated by JS -->
                </div>
            </div>

            <!-- Ornamental Sakura Divider -->
            <div class="pt-2 -mx-6">
                <svg class="w-full h-10" viewBox="0 0 480 48">
                    <use href="#sakura-ribbon-divider" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             9. WEDDING GIFT BOX & QR MỪNG CƯỚI (HỘP QUÀ MỪNG CƯỚI)
             =================================================================== -->
        <section id="sec-gift" class="relative pt-3 pb-24 px-6 text-center">
            <div class="reveal-item mx-auto w-36 h-11 mb-2">
                <svg viewBox="0 0 200 50" class="w-full h-full">
                    <use href="#sakura-section-emblem" />
                </svg>
            </div>

            <p class="reveal-item text-[11px] uppercase tracking-[0.25em] text-sakura-500 font-semibold">Gửi Trao Tâm Ý</p>
            <h3 class="reveal-item font-pattaya text-3xl text-sakura-500 mt-0.5">Hộp Quà Mừng Cưới</h3>
            <p class="reveal-item text-xs text-sakura-800 max-w-[330px] mx-auto mt-1">
                Chạm vào hộp quà hoa anh đào bên dưới để gửi tình cảm và lời chúc phúc tới Cô Dâu &amp; Chú Rể
            </p>

            <!-- Interactive Sakura Gift Box -->
            <div onclick="openGiftModal()" class="reveal-scale cursor-pointer group mx-auto mt-6 max-w-[285px] rounded-3xl bg-gradient-to-b from-[#FFFDF9] via-[#FDF0F4] to-[#F9DCE5] p-5 text-sakura-900 shadow-xl border-2 border-sakura-300 hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden">
                <!-- Satin Ribbon Cross Straps -->
                <div class="pointer-events-none absolute inset-y-0 left-1/2 -translate-x-1/2 w-7 bg-gradient-to-r from-sakura-300 via-sakura-500 to-sakura-300 opacity-20"></div>
                <div class="pointer-events-none absolute inset-x-0 top-1/2 -translate-y-1/2 h-7 bg-gradient-to-b from-sakura-300 via-sakura-500 to-sakura-300 opacity-20"></div>

                <!-- Sakura Blossom Emblem Inside Gift Card -->
                <div class="relative z-10 mx-auto w-28 h-24 bg-white/95 rounded-2xl p-2 shadow-md border border-sakura-200 mb-3 flex items-center justify-center">
                    <svg viewBox="0 0 120 100" class="w-full h-full">
                        <use href="#sakura-blossom-full" transform="translate(60, 52) scale(1.1)" />
                        <use href="#sakura-blossom-full" transform="translate(28, 35) scale(0.55)" />
                        <use href="#sakura-blossom-full" transform="translate(92, 35) scale(0.55)" />
                    </svg>
                </div>

                <span class="relative z-10 inline-block bg-sakura-500 text-white font-serif font-bold text-xs px-3.5 py-0.5 rounded-full shadow">
                    🌸 Mở Hộp Quà Mừng Cưới 🌸
                </span>
                <h4 class="relative z-10 font-pattaya text-xl text-sakura-600 mt-2">{{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}</h4>
                <p class="relative z-10 text-[11px] text-sakura-800 mt-1 flex items-center justify-center gap-1 font-medium">
                    <span>Xem mã QR &amp; Số tài khoản</span>
                    <span>→</span>
                </p>
            </div>

            <!-- Thank You Footer -->
            <div class="reveal-item mt-12 pt-6 border-t border-sakura-200">
                <h4 class="font-vibes text-4xl text-sakura-500">Thank You!</h4>
                <p class="font-serif italic text-sm text-sakura-800 mt-1 max-w-[340px] mx-auto">
                    {{ $weddingCard->message_thanks ?: ('Sự hiện diện của Quý khách là niềm vinh hạnh lớn lao nhất đối với gia đình và hai vợ chồng ' . $weddingCard->groom_name . ' & ' . $weddingCard->bride_name . '.') }}
                </p>
                <p class="text-[10px] uppercase tracking-[0.28em] text-sakura-400 mt-4">
                    {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '31.05.2026' }} • {{ $weddingCard->template_name }}
                </p>
            </div>
        </section>

        <!-- ===================================================================
             FLOATING ACTION CONTROLS ON RIGHT SIDE (100% MATCHING SCREENSHOT)
             1. Pink Messenger Button (#FF2E63) with small dark-grey '×' close badge
             2. Dusty-Rose Circular Audio Equalizer Button (#B85D69) with '|.|' bars
             =================================================================== -->
        <div class="fixed bottom-8 right-1/2 translate-x-[224px] max-sm:right-3.5 max-sm:translate-x-0 z-40 flex flex-col items-center gap-4">
            
            <!-- 1. Floating Pink Messenger Chat / Wish Button (#FF2E63) -->
            <div id="floating-messenger-widget" class="relative group">
                <!-- Small Dark Grey Close '×' Badge at Top-Right -->
                <button onclick="dismissMessengerWidget(event)" title="Ẩn nút chat"
                        class="absolute -top-1 -right-1 z-20 w-5 h-5 rounded-full bg-[#454B54] hover:bg-[#2F343B] text-white text-[11px] leading-none flex items-center justify-center shadow border border-white/40 cursor-pointer">
                    ×
                </button>
                <!-- Main Pink Circle Button -->
                <a href="#sec-rsvp" title="Gửi lời chúc & Xác nhận tham dự"
                   class="w-13 h-13 w-[52px] h-[52px] rounded-full bg-[#FF2E63] hover:bg-[#E82456] active:scale-95 text-white shadow-[0_6px_18px_rgba(255,46,99,0.38)] flex items-center justify-center transition cursor-pointer">
                    <!-- White Speech Bubble with Lightning Bolt (Messenger Icon) -->
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.36 2 2 6.13 2 11.7c0 2.91 1.19 5.44 3.14 7.17.16.13.26.35.27.57l.05 1.78c.04.57.61.94 1.13.71l1.98-.87c.17-.08.36-.1.55-.06.88.24 1.83.38 2.88.38 5.64 0 10-4.13 10-9.7C22 6.13 17.64 2 12 2zm5.8 7.56-2.9 4.6c-.46.73-1.45.91-2.13.39l-2.3-1.72a.6.6 0 0 0-.72 0l-3.1 2.35c-.41.31-.95-.18-.68-.62l2.9-4.6c.46-.73 1.45-.91 2.13-.39l2.3 1.72a.6.6 0 0 0 .72 0l3.1-2.35c.41-.31.95.18.68.62z"/>
                    </svg>
                </a>
            </div>

            <!-- 2. Floating Dusty-Rose Circular Equalizer Music Button (#B85D69) -->
            <button id="music-toggle-btn" onclick="toggleWeddingMusic()" title="Bật/Tắt nhạc nền"
                    class="w-[48px] h-[48px] rounded-full bg-[#B85D69] hover:bg-[#A44C58] active:scale-95 text-white shadow-[0_6px_16px_rgba(164,76,88,0.35)] p-1 flex items-center justify-center transition cursor-pointer">
                <div id="music-icon-wrapper" class="w-full h-full rounded-full border border-white/35 flex items-end justify-center gap-[3.5px] pb-[13px] eq-playing">
                    <span class="eq-bar-1 w-[3px] h-[12px] bg-white rounded-full transition-all"></span>
                    <span class="eq-bar-2 w-[3px] h-[5px] bg-white rounded-full transition-all"></span>
                    <span class="eq-bar-3 w-[3px] h-[10px] bg-white rounded-full transition-all"></span>
                </div>
            </button>
        </div>
    </div>

    <!-- ===================================================================
         MODAL 1: SAKURA WEDDING GIFT QR & BANK ACCOUNTS
         =================================================================== -->
    <div id="gift-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-sakura-900/60 backdrop-blur-sm p-4">
        <div class="relative w-full max-w-[420px] rounded-3xl bg-[#FFFDFD] border-2 border-sakura-200 p-5 shadow-2xl max-h-[90vh] overflow-y-auto">
            <button onclick="closeGiftModal()" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-sakura-100 hover:bg-sakura-200 text-sakura-800 flex items-center justify-center text-sm font-bold cursor-pointer">
                ✕
            </button>

            <div class="text-center">
                <div class="mx-auto w-32 h-11 mb-1">
                    <svg viewBox="0 0 200 50" class="w-full h-full">
                        <use href="#sakura-section-emblem" />
                    </svg>
                </div>
                <h3 class="font-pattaya text-2xl text-sakura-500">Hộp Quà Mừng Cưới</h3>
                <p class="text-xs text-sakura-800 mt-0.5">Chân thành cảm ơn tình cảm quý báu của Quý khách dành cho {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}</p>
            </div>

            <div class="mt-4 space-y-4">
                <!-- Groom QR Card ({{ $weddingCard->groom_name }}) -->
                <div class="bg-sakura-50/90 border border-sakura-200 rounded-2xl p-4 flex items-center gap-3.5 relative overflow-hidden">
                    <div class="w-24 h-24 bg-white p-1.5 rounded-xl border border-sakura-200 shrink-0 flex flex-col items-center justify-center">
                        <img src="{{ $groomQrUrl }}" alt="QR Chú Rể" class="w-full h-full object-contain">
                        <span class="text-[8px] font-semibold text-sakura-600 mt-0.5">{{ $groomBankName }}</span>
                    </div>
                    <div class="flex-1 text-xs relative z-10">
                        <span class="inline-block bg-sakura-500 text-white text-[10px] px-2 py-0.5 rounded-full font-medium">Chú Rể • {{ $weddingCard->groom_rank ?: 'Trưởng Nam' }}</span>
                        <p class="font-bold text-sakura-900 text-sm mt-1">{{ mb_strtoupper($groomOwner) }}</p>
                        <p class="text-sakura-800">Ngân hàng: <strong>{{ $groomBankName }}</strong></p>
                        <p class="text-sakura-900 font-mono font-semibold mt-0.5">STK: {{ $groomStk }}</p>
                        <button onclick="copyText('{{ $groomStk }}', 'Đã sao chép STK Chú rể {{ $weddingCard->groom_name }}!')" 
                                class="mt-2 bg-white hover:bg-sakura-100 text-sakura-800 border border-sakura-300 rounded-lg px-3 py-1 text-[11px] font-medium shadow-sm transition cursor-pointer">
                            📋 Sao chép STK
                        </button>
                    </div>
                </div>

                @if(!empty($weddingCard->bride_bank_number) || !empty($weddingCard->bride_qr_image))
                <!-- Bride QR Card ({{ $weddingCard->bride_name }}) -->
                <div class="bg-sakura-50/90 border border-sakura-200 rounded-2xl p-4 flex items-center gap-3.5 relative overflow-hidden">
                    <div class="w-24 h-24 bg-white p-1.5 rounded-xl border border-sakura-200 shrink-0 flex flex-col items-center justify-center">
                        <img src="{{ $brideQrUrl }}" alt="QR Cô Dâu" class="w-full h-full object-contain">
                        <span class="text-[8px] font-semibold text-sakura-600 mt-0.5">{{ $brideBankName }}</span>
                    </div>
                    <div class="flex-1 text-xs relative z-10">
                        <span class="inline-block bg-sakura-500 text-white text-[10px] px-2 py-0.5 rounded-full font-medium">Cô Dâu • {{ $weddingCard->bride_rank ?: 'Út Nữ' }}</span>
                        <p class="font-bold text-sakura-900 text-sm mt-1">{{ mb_strtoupper($brideOwner) }}</p>
                        <p class="text-sakura-800">Ngân hàng: <strong>{{ $brideBankName }}</strong></p>
                        <p class="text-sakura-900 font-mono font-semibold mt-0.5">STK: {{ $brideStk }}</p>
                        <button onclick="copyText('{{ $brideStk }}', 'Đã sao chép STK Cô dâu {{ $weddingCard->bride_name }}!')" 
                                class="mt-2 bg-white hover:bg-sakura-100 text-sakura-800 border border-sakura-300 rounded-lg px-3 py-1 text-[11px] font-medium shadow-sm transition cursor-pointer">
                            📋 Sao chép STK
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- ===================================================================
         MODAL 2: PHOTO LIGHTBOX VIEWER
         =================================================================== -->
    <div id="lightbox-modal" onclick="closeLightbox()" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/85 backdrop-blur-sm p-4">
        <div class="relative max-w-[430px] w-full bg-white p-2.5 rounded-2xl shadow-2xl" onclick="event.stopPropagation()">
            <button onclick="closeLightbox()" class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-sakura-500 text-white font-bold shadow-lg flex items-center justify-center cursor-pointer">
                ✕
            </button>
            <img id="lightbox-img" src="" alt="Wedding Portrait" class="w-full max-h-[75vh] object-cover rounded-xl">
            <p id="lightbox-caption" class="text-center font-serif italic text-sm text-sakura-900 mt-2 py-1"></p>
        </div>
    </div>

    <!-- TOAST NOTIFICATION -->
    <div id="toast-box" class="fixed top-5 left-1/2 -translate-x-1/2 z-[60] pointer-events-none opacity-0 -translate-y-3 transition-all duration-300 bg-sakura-600 text-white text-xs font-medium px-4 py-2.5 rounded-full shadow-xl border border-sakura-200 flex items-center gap-2">
        <span>🌸</span>
        <span id="toast-text">Thông báo</span>
    </div>

    <!-- ===================================================================
         JAVASCRIPT LOGIC (14 FALLING SAKURA PETALS, 3D ALBUM, MUSIC, RSVP)
         =================================================================== -->
    <script>
        /* -----------------------------------------------------------
           1. GENERATE 14 CONTINUOUS FALLING SAKURA PETALS (🌸 & SVG)
        ----------------------------------------------------------- */
        function initFallingSakuraPetals(intensify = false) {
            const container = document.getElementById('falling-sakura-layer');
            container.innerHTML = '';
            const count = intensify ? 18 : 14;

            for (let i = 0; i < count; i++) {
                const petal = document.createElement('div');
                petal.className = 'dom-petal';
                const leftPos = (i * (100 / count)) + (Math.random() * 5);
                const duration = 7 + Math.random() * 7;
                const delay = -(Math.random() * 12);
                const size = 13 + Math.floor(Math.random() * 10);

                petal.style.left = `${leftPos}%`;
                petal.style.animationDuration = `${duration}s`;
                petal.style.animationDelay = `${delay}s`;

                if (i % 3 === 0) {
                    petal.textContent = '🌸';
                    petal.style.fontSize = `${size}px`;
                    petal.style.opacity = '0.85';
                } else {
                    petal.innerHTML = `
                        <svg width="${size}" height="${size}" viewBox="-16 -36 32 38" class="drop-shadow-sm">
                            <path d="M 0,0 C -9,-10 -14,-24 -5,-32 L 0,-26 L 5,-32 C 14,-24 9,-10 0,0 Z" 
                                  fill="${i % 2 === 0 ? '#F2BFD0' : '#E899B1'}" opacity="0.88" />
                        </svg>
                    `;
                }
                container.appendChild(petal);
            }
        }

        /* -----------------------------------------------------------
           2. ALBUM PHOTOS & 3D FLIP BOOK RENDERER
        ----------------------------------------------------------- */
        const defaultPhotos = [
            {
                url: 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=85',
                title: 'Mùa Hoa Anh Đào Năm Ấy',
                subtitle: 'Trang 1 • {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}'
            },
            {
                url: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=85',
                title: 'Nắm Tay Nhau Đi Qua Bốn Mùa',
                subtitle: 'Trang 2 • Khoảnh khắc dịu dàng bên nhau'
            },
            {
                url: 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=85',
                title: 'Lời Hứa Trăm Năm Hạnh Phúc',
                subtitle: 'Trang 3 • Trao nhau ánh nhìn yêu thương'
            },
            {
                url: 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=800&q=85',
                title: 'Nụ Cười Rạng Rỡ Ngày Chung Đôi',
                subtitle: 'Trang 4 • Sắc hồng anh đào kết duyên'
            },
            {
                url: 'https://images.unsplash.com/photo-1606800052052-a08af7148866?auto=format&fit=crop&w=800&q=85',
                title: 'Chung Một Mái Nhà Ấm Áp',
                subtitle: 'Trang 5 • Tình yêu đơm hoa kết trái'
            },
            {
                url: 'https://images.unsplash.com/photo-1537633552985-df8429e8048b?auto=format&fit=crop&w=800&q=85',
                title: 'Hẹn Gặp Quý Khách Ngày {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format("d.m.Y") : "31.05.2026" }}',
                subtitle: 'Trang 6 • {{ $weddingCard->wedding_location ?: "Sakura Grand Palace" }}'
            }
        ];
        const dbPhotosRaw = {!! $albumPhotosJson ?: '[]' !!};
        const albumPhotos = (Array.isArray(dbPhotosRaw) && dbPhotosRaw.length > 0)
            ? dbPhotosRaw.map((u, i) => ({
                url: u,
                title: `Khoảnh Khắc Kỷ Niệm ${i + 1}`,
                subtitle: `Trang ${i + 1} • {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}`
            }))
            : defaultPhotos;

        let currentAlbumPage = 0;

        function renderAlbumBook() {
            const stack = document.getElementById('album-pages-stack');
            const thumbs = document.getElementById('album-thumbs');
            stack.innerHTML = '';
            thumbs.innerHTML = '';

            albumPhotos.forEach((photo, idx) => {
                const page = document.createElement('div');
                page.className = `book-page-card absolute inset-0 bg-white p-3 flex flex-col justify-between cursor-pointer ${idx < currentAlbumPage ? 'flipped' : ''}`;
                page.style.zIndex = albumPhotos.length - idx;
                page.onclick = () => nextAlbumPage();

                page.innerHTML = `
                    <div class="relative w-full h-[325px] rounded-lg overflow-hidden border border-sakura-200 bg-sakura-50">
                        <img src="${photo.url}" alt="${photo.title}" class="w-full h-full object-cover"
                             onerror="this.src='https://placehold.co/600x750/FDF0F4/5A3E46?text=Anh+Cuoi+${idx + 1}'">
                        <button onclick="event.stopPropagation(); openLightbox(${idx})" 
                                class="absolute top-2.5 right-2.5 bg-white/85 hover:bg-white text-sakura-800 rounded-full w-8 h-8 flex items-center justify-center shadow text-xs cursor-pointer"
                                title="Phóng to ảnh">
                            🔍
                        </button>
                        <div class="absolute bottom-2 left-2 bg-sakura-600/80 backdrop-blur-sm text-white text-[10px] px-2.5 py-0.5 rounded-full">
                            Chạm để lật trang ➔
                        </div>
                    </div>
                    <div class="pt-2 text-center">
                        <h4 class="font-pattaya text-lg text-sakura-500 leading-snug">${photo.title}</h4>
                        <p class="text-[11px] text-sakura-800 italic">${photo.subtitle}</p>
                    </div>
                `;
                stack.appendChild(page);

                const thumb = document.createElement('button');
                thumb.className = `h-12 rounded-lg overflow-hidden border-2 transition cursor-pointer ${idx === currentAlbumPage ? 'border-sakura-500 scale-105 shadow' : 'border-transparent opacity-65 hover:opacity-100'}`;
                thumb.onclick = () => goToAlbumPage(idx);
                thumb.innerHTML = `<img src="${photo.url}" alt="Thumb ${idx+1}" class="w-full h-full object-cover">`;
                thumbs.appendChild(thumb);
            });

            document.getElementById('album-page-indicator').textContent = `Trang ${currentAlbumPage + 1} / ${albumPhotos.length}`;
        }

        function nextAlbumPage() {
            currentAlbumPage = (currentAlbumPage + 1) % albumPhotos.length;
            updateAlbumFlipState();
        }

        function prevAlbumPage() {
            currentAlbumPage = (currentAlbumPage - 1 + albumPhotos.length) % albumPhotos.length;
            updateAlbumFlipState();
        }

        function goToAlbumPage(index) {
            currentAlbumPage = index;
            updateAlbumFlipState();
        }

        function updateAlbumFlipState() {
            const pages = document.querySelectorAll('#album-pages-stack .book-page-card');
            pages.forEach((p, idx) => {
                if (idx < currentAlbumPage) {
                    p.classList.add('flipped');
                } else {
                    p.classList.remove('flipped');
                }
            });

            const thumbs = document.querySelectorAll('#album-thumbs button');
            thumbs.forEach((t, idx) => {
                t.className = `h-12 rounded-lg overflow-hidden border-2 transition cursor-pointer ${idx === currentAlbumPage ? 'border-sakura-500 scale-105 shadow' : 'border-transparent opacity-65 hover:opacity-100'}`;
            });

            document.getElementById('album-page-indicator').textContent = `Trang ${currentAlbumPage + 1} / ${albumPhotos.length}`;
        }

        /* -----------------------------------------------------------
           3. ENVELOPE OPENING & ROMANTIC SAKURA MUSIC-BOX SYNTHESIZER
        ----------------------------------------------------------- */
        let isMusicPlaying = false;
        let musicLoop = null;
        let synth = null;

        async function startSakuraWeddingMusic() {
            try {
                await Tone.start();
                if (!synth) {
                    synth = new Tone.PolySynth(Tone.Synth, {
                        oscillator: { type: 'sine' },
                        envelope: { attack: 0.05, decay: 0.4, sustain: 0.25, release: 2.0 }
                    }).toDestination();
                    synth.volume.value = -11;

                    const sakuraMelody = [
                        { time: '0:0', note: ['A4', 'C5', 'E5'], dur: '2n' },
                        { time: '0:2', note: ['E4', 'G4', 'B4'], dur: '2n' },
                        { time: '1:0', note: ['F4', 'A4', 'C5'], dur: '2n' },
                        { time: '1:2', note: ['C4', 'E4', 'G4'], dur: '2n' },
                        { time: '2:0', note: ['D4', 'F4', 'A4'], dur: '2n' },
                        { time: '2:2', note: ['A3', 'C4', 'E4'], dur: '2n' },
                        { time: '3:0', note: ['B3', 'D4', 'G4'], dur: '2n' },
                        { time: '3:2', note: ['E4', 'G4', 'C5'], dur: '2n' }
                    ];

                    musicLoop = new Tone.Part((time, val) => {
                        synth.triggerAttackRelease(val.note, val.dur, time);
                    }, sakuraMelody);
                    musicLoop.loop = true;
                    musicLoop.loopEnd = '4m';
                }

                Tone.Transport.bpm.value = 76;
                Tone.Transport.start();
                musicLoop.start(0);
                isMusicPlaying = true;
                updateMusicUI();
            } catch (e) {
                console.warn('Audio waiting for user gesture:', e);
            }
        }

        function toggleWeddingMusic() {
            if (!isMusicPlaying) {
                startSakuraWeddingMusic();
                showToast('🎵 Đang phát giai điệu Anh Đào Hồng');
            } else {
                Tone.Transport.pause();
                isMusicPlaying = false;
                updateMusicUI();
                showToast('🔇 Đã tạm dừng nhạc nền');
            }
        }

        function updateMusicUI() {
            const wrapper = document.getElementById('music-icon-wrapper');
            if (isMusicPlaying) {
                wrapper.classList.add('eq-playing');
            } else {
                wrapper.classList.remove('eq-playing');
            }
        }

        function dismissMessengerWidget(e) {
            e.stopPropagation();
            e.preventDefault();
            const widget = document.getElementById('floating-messenger-widget');
            if (widget) {
                widget.style.display = 'none';
            }
        }

        function openInvitation() {
            const stage = document.getElementById('envelope-3d-stage');
            const overlay = document.getElementById('envelope-overlay');

            stage.classList.add('envelope-opened');
            startSakuraWeddingMusic();
            initFallingSakuraPetals(true);

            setTimeout(() => {
                overlay.classList.add('hidden-overlay');
                triggerVisibleScrollReveals();
            }, 880);
        }

        function reopenEnvelope() {
            const stage = document.getElementById('envelope-3d-stage');
            const overlay = document.getElementById('envelope-overlay');
            stage.classList.remove('envelope-opened');
            overlay.classList.remove('hidden-overlay');
        }

        /* -----------------------------------------------------------
           4. LIVE COUNTDOWN TIMER
        ----------------------------------------------------------- */
        const weddingDateStr = '{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format("Y-m-d") : "2026-05-31" }}';
        const weddingTimeStr = '{{ !empty($weddingCard->wedding_time) && preg_match("/^\d{1,2}:\d{2}$/", trim($weddingCard->wedding_time)) ? trim($weddingCard->wedding_time) . ":00" : "18:00:00" }}';
        const weddingTargetDate = new Date(`${weddingDateStr}T${weddingTimeStr}+07:00`).getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const diff = Math.abs(weddingTargetDate - now);
            const isPast = now > weddingTargetDate;

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const secs = Math.floor((diff % (1000 * 60)) / 1000);

            const labelEl = document.getElementById('countdown-label');
            if (labelEl) {
                labelEl.textContent = isPast
                    ? 'Hành Trình Hạnh Phúc Từ Ngày {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '31.05.2026' }}'
                    : 'Đếm Ngược Khoảnh Khắc Chung Đôi';
            }

            document.getElementById('cd-days').textContent = String(days).padStart(2, '0');
            document.getElementById('cd-hours').textContent = String(hours).padStart(2, '0');
            document.getElementById('cd-mins').textContent = String(mins).padStart(2, '0');
            document.getElementById('cd-secs').textContent = String(secs).padStart(2, '0');
        }

        /* -----------------------------------------------------------
           5. GUESTBOOK WISHES & RSVP HANDLERS
        ----------------------------------------------------------- */
        @php
            $cardWishes35 = $weddingCard->wishes()->approved()->latest()->take(10)->get()->map(function($w) {
                return [
                    'author' => $w->sender_name,
                    'time' => $w->created_at ? $w->created_at->diffForHumans() : 'Vừa xong',
                    'message' => $w->message,
                ];
            });
        @endphp
        const initialWishes = @json($cardWishes35);

        function renderWishes() {
            const container = document.getElementById('wishes-list');
            if (!initialWishes || initialWishes.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-4 text-xs text-sakura-800/70 italic">
                        Hãy là người đầu tiên gửi lời chúc mừng hạnh phúc đến cô dâu &amp; chú rể! 🌸
                    </div>
                `;
                return;
            }
            container.innerHTML = initialWishes.map(w => `
                <div class="bg-white border border-sakura-200 rounded-2xl p-3 text-left shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="font-semibold text-xs text-sakura-900">🌸 ${w.author}</span>
                        <span class="text-[10px] text-sakura-400">${w.time}</span>
                    </div>
                    <p class="text-xs text-sakura-800 mt-1 leading-relaxed">${w.message}</p>
                </div>
            `).join('');
        }

        function fillPresetWish(text) {
            document.getElementById('wish-message').value = text;
            showToast('🌸 Đã chọn lời chúc gợi ý!');
        }

        function submitWish(e) {
            e.preventDefault();
            const authorInput = document.getElementById('wish-author');
            const msgInput = document.getElementById('wish-message');
            if (!authorInput.value.trim() || !msgInput.value.trim()) return;

            initialWishes.unshift({
                author: authorInput.value.trim(),
                time: 'Vừa xong',
                message: msgInput.value.trim()
            });
            renderWishes();
            msgInput.value = '';
            showToast('💌 Đã gửi lời chúc tới {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}!');
        }

        function submitRSVP(e) {
            e.preventDefault();
            const name = document.getElementById('rsvp-name').value.trim();
            const side = document.getElementById('rsvp-side').value;
            const count = document.getElementById('rsvp-count').value;
            const status = document.querySelector('input[name="attendance"]:checked').value;
            showToast(`🌸 Cảm ơn ${name} (${side} • ${status} • ${count}) đã xác nhận!`);
        }

        /* -----------------------------------------------------------
           6. DRESS CODE, CLIPBOARD, MODALS & SCROLL REVEAL
        ----------------------------------------------------------- */
        function selectDressCode(desc) {
            document.getElementById('dresscode-note').textContent = '👗 ' + desc;
        }

        function copyText(text, successMsg) {
            const tempInput = document.createElement('textarea');
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);
            showToast(successMsg);
        }

        function copyVenueAddress() {
            copyText('Sakura Grand Palace (Sảnh Anh Đào) - 268 Đường Thanh Niên, Quận Tây Hồ, TP. Hà Nội', '📋 Đã sao chép địa chỉ Sakura Grand Palace!');
        }

        function openGiftModal() {
            const modal = document.getElementById('gift-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeGiftModal() {
            const modal = document.getElementById('gift-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function openLightbox(index) {
            const photo = albumPhotos[index] || albumPhotos[0];
            document.getElementById('lightbox-img').src = photo.url;
            document.getElementById('lightbox-caption').textContent = photo.title;
            const modal = document.getElementById('lightbox-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeLightbox() {
            const modal = document.getElementById('lightbox-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function showToast(message) {
            const box = document.getElementById('toast-box');
            document.getElementById('toast-text').textContent = message;
            box.classList.remove('opacity-0', '-translate-y-3');
            box.classList.add('opacity-100', 'translate-y-0');
            clearTimeout(window._toastTimer);
            window._toastTimer = setTimeout(() => {
                box.classList.add('opacity-0', '-translate-y-3');
                box.classList.remove('opacity-100', 'translate-y-0');
            }, 3200);
        }

        function triggerVisibleScrollReveals() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    }
                });
            }, { threshold: 0.12 });

            document.querySelectorAll('.reveal-item, .reveal-left, .reveal-right, .reveal-scale').forEach(el => {
                observer.observe(el);
            });
        }

        /* -----------------------------------------------------------
           INITIALIZE ON WINDOW LOAD
        ----------------------------------------------------------- */
        window.onload = function () {
            const params = new URLSearchParams(window.location.search);
            const guestParam = params.get('khach');
            if (guestParam) {
                document.getElementById('envelope-guest-name').textContent = guestParam;
                document.getElementById('hero-guest-name').textContent = guestParam;
                document.getElementById('rsvp-name').value = guestParam;
                document.getElementById('wish-author').value = guestParam;
            }

            // Support ?open=1 query parameter to auto-open envelope
            if (params.get('open') === '1') {
                setTimeout(openInvitation, 350);
            }

            initFallingSakuraPetals(false);
            renderAlbumBook();
            renderWishes();
            updateCountdown();
            setInterval(updateCountdown, 1000);
            triggerVisibleScrollReveals();
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