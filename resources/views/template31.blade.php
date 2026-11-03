<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $weddingCard->couple_name }} - Thiệp Cưới Online</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Pattaya, Great Vibes, Cormorant Garamond, Be Vietnam Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Great+Vibes&family=Pattaya&display=swap" rel="stylesheet">
    <!-- Tone.js for gentle wedding piano music synthesis -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tone/14.8.49/Tone.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        lotus: {
                            50: '#FDF8F9',
                            100: '#F9EBEF',
                            200: '#F2D6DE',
                            300: '#E5B8C2',
                            400: '#D88FA0',
                            500: '#C86D82',
                            600: '#B85A70',
                            700: '#964558',
                            800: '#7A5C61',
                            900: '#5C4348',
                        },
                        stem: {
                            light: '#A8BFA0',
                            DEFAULT: '#8FA882',
                            dark: '#6F8A62'
                        },
                        cream: '#FAF6F0'
                    },
                    fontFamily: {
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
            --lotus-primary: #C86D82;
            --lotus-deep: #B85A70;
            --lotus-blush: #EFCFD6;
            --lotus-smoke: #E2BEC6;
            --text-warm: #5C4348;
            --stem-green: #8FA882;
        }

        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: #FAF3F5;
            background-image: 
                radial-gradient(at 15% 15%, rgba(200, 109, 130, 0.10) 0px, transparent 50%),
                radial-gradient(at 85% 85%, rgba(229, 184, 194, 0.18) 0px, transparent 50%);
            font-family: 'Be Vietnam Pro', sans-serif;
            color: #5C4348;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        /* Subtle Pure White Paper Texture */
        .paper-texture {
            background-color: #FFFFFF;
            background-image: radial-gradient(#E5B8C2 0.4px, transparent 0.4px), radial-gradient(#F2D6DE 0.4px, #FFFFFF 0.4px);
            background-size: 28px 28px;
            background-position: 0 0, 14px 14px;
            background-blend-mode: soft-light;
        }

        /* Borderless Soft Card Surface */
        .silk-card {
            background: linear-gradient(180deg, #FFFFFF 0%, #FFFDFD 55%, #FDF8F9 100%);
            box-shadow: 0 20px 60px rgba(92, 67, 72, 0.11), 0 0 1px rgba(200, 109, 130, 0.2);
        }

        /* 3D Envelope Styles */
        .envelope-perspective {
            perspective: 1400px;
        }

        .envelope-flap {
            transform-origin: top center;
            transition: transform 1.15s cubic-bezier(0.645, 0.045, 0.355, 1), z-index 0.3s 0.5s;
            transform-style: preserve-3d;
            backface-visibility: hidden;
        }

        .envelope-opened .envelope-flap {
            transform: rotateX(180deg);
            z-index: 10;
        }

        .envelope-letter-slide {
            transition: transform 1.2s cubic-bezier(0.22, 1, 0.36, 1) 0.35s, opacity 0.9s ease 0.35s;
        }

        .envelope-opened .envelope-letter-slide {
            transform: translateY(-78px) scale(1.03);
        }

        .envelope-overlay-wrapper {
            transition: opacity 0.95s cubic-bezier(0.4, 0, 0.2, 1), visibility 0.95s;
        }

        .envelope-overlay-wrapper.hidden-overlay {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        /* Shimmer Button Effect */
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
                rgba(255, 255, 255, 0.55) 50%,
                rgba(255, 255, 255, 0) 100%
            );
            transform: rotate(25deg);
            animation: shimmerSwipe 3.2s infinite;
        }
        @keyframes shimmerSwipe {
            0% { left: -60%; }
            55%, 100% { left: 130%; }
        }

        /* Two Tilted Hero Photo Frames with Dusty Pink Borders (Viền hồng khói) */
        .photo-frame-groom {
            transform: rotate(-4.5deg);
            transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
            border: 5px solid #E2BEC6;
            box-shadow: 0 14px 30px -6px rgba(150, 69, 88, 0.18), inset 0 0 0 1px rgba(255,255,255,0.85);
        }
        .photo-frame-groom:hover {
            transform: rotate(-1.5deg) translateY(-6px) scale(1.03);
            z-index: 30;
        }

        .photo-frame-bride {
            transform: rotate(4.8deg);
            transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
            border: 5px solid #E2BEC6;
            box-shadow: 0 16px 34px -6px rgba(150, 69, 88, 0.22), inset 0 0 0 1px rgba(255,255,255,0.85);
        }
        .photo-frame-bride:hover {
            transform: rotate(1.5deg) translateY(-6px) scale(1.03);
            z-index: 30;
        }

        /* Scroll Reveal Animations */
        .reveal-item {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-left {
            opacity: 0;
            transform: translateX(-34px);
            transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-right {
            opacity: 0;
            transform: translateX(34px);
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

        /* Floating Pink Lotus Sway Animation */
        @keyframes gentleSway {
            0%, 100% { transform: rotate(-1.6deg) translateY(0px); }
            50% { transform: rotate(1.6deg) translateY(-3px); }
        }
        .sway-flower {
            animation: gentleSway 5.5s ease-in-out infinite;
            transform-origin: bottom center;
        }

        @keyframes ribbonWave {
            0%, 100% { transform: scaleX(1) translateY(0px); }
            50% { transform: scaleX(1.02) translateY(2px); }
        }
        .silk-ribbon-wave {
            animation: ribbonWave 6s ease-in-out infinite;
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

        /* Music Vinyl Spin */
        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .vinyl-spinning {
            animation: spinSlow 6s linear infinite;
        }

        /* Pulse Heart on Calendar */
        @keyframes heartBeat {
            0%, 100% { transform: scale(1); }
            25% { transform: scale(1.16); }
            50% { transform: scale(0.96); }
            75% { transform: scale(1.12); }
        }
        .pulse-heart {
            animation: heartBeat 2.2s infinite ease-in-out;
        }

        /* Custom Scrollbar for Guestbook */
        .wishes-scroll::-webkit-scrollbar {
            width: 5px;
        }
        .wishes-scroll::-webkit-scrollbar-track {
            background: #FDF8F9;
            border-radius: 8px;
        }
        .wishes-scroll::-webkit-scrollbar-thumb {
            background: #E5B8C2;
            border-radius: 8px;
        }

        /* Silk Thread SVG Background Path Animation */
        .silk-thread-line {
            stroke-dasharray: 8 6;
            animation: threadFlow 30s linear infinite;
        }
        @keyframes threadFlow {
            from { stroke-dashoffset: 500; }
            to { stroke-dashoffset: 0; }
        }
    </style>
</head>
<body class="min-h-screen flex justify-center items-start selection:bg-lotus-200 selection:text-lotus-900">
    @php
        $cal = $weddingCard->calendar_matrix;
        $dayOfWeekVi = $weddingCard->wedding_date ? $weddingCard->wedding_date->locale('vi')->dayName : 'Thứ Bảy';
        $wDate = $weddingCard->wedding_date;
        $dayNum = $wDate ? $wDate->format('d') : '20';
        $monthNum = $wDate ? $wDate->format('m') : '02';
        $yearNum = $wDate ? $wDate->format('Y') : '2027';
        $timeStr = !empty($weddingCard->wedding_time) ? trim($weddingCard->wedding_time) : '18:00';
        $timeStrShort = preg_match('/^\d{1,2}:\d{2}/', $timeStr, $m) ? $m[0] : '18:00';

        $timelineEvents = is_array($weddingCard->timeline) ? $weddingCard->timeline : (is_string($weddingCard->timeline) ? json_decode($weddingCard->timeline, true) : null);
        if (empty($timelineEvents)) {
            $timelineEvents = [
                ['time' => '17:30 Chiều', 'title' => 'Đón Khách & Chụp Ảnh Giao Lưu', 'desc' => 'Check-in tại không gian hoa sen hồng phớt và lưu giữ kỷ niệm cùng cô dâu chú rể.'],
                ['time' => '18:30 Tối', 'title' => 'Nghi Thức Lễ Thành Hôn Chính Thức', 'desc' => 'Trao nhẫn cưới, rót tháp rượu sâm panh và nâng ly chúc mừng hạnh phúc trăm năm.'],
                ['time' => '19:15 Tối', 'title' => 'Thắp Nến Hồng, Khai Tiệc & Giao Lưu', 'desc' => 'Thắp sáng đôi nến hồng tơ duyên, thưởng thức tiệc tối và giao lưu âm nhạc.'],
            ];
        }

        $dressCodes = !empty($weddingCard->dresscode_colors_list) 
            ? $weddingCard->dresscode_colors_list 
            : (!empty($weddingCard->dresscode_colors) 
                ? (is_array($weddingCard->dresscode_colors) ? $weddingCard->dresscode_colors : (is_string($weddingCard->dresscode_colors) ? json_decode($weddingCard->dresscode_colors, true) : null))
                : null);

        if (empty($dressCodes)) {
            $dressCodes = [
                ['hex' => '#F2C6D0', 'name' => 'Hồng Phấn', 'desc' => 'Hồng Phấn (#F2C6D0) — Ngọt ngào, lãng mạn và đồng điệu cùng sắc hoa sen hồng phớt.'],
                ['hex' => '#F7F3EB', 'name' => 'Kem Trắng', 'desc' => 'Kem Trắng (#F7F3EB) — Tinh khôi, thanh lịch và trang nhã.'],
                ['hex' => '#9E7B82', 'name' => 'Hồng Khói', 'desc' => 'Nâu Hồng Khói (#9E7B82) — Sang trọng, ấm áp và tôn dáng.'],
            ];
        }

        $albumData = !empty($weddingCard->album) ? (is_string($weddingCard->album) ? json_decode($weddingCard->album, true) : $weddingCard->album) : [];
        $albumPhotosJson = json_encode(!empty($albumData) && is_array($albumData) ? array_values(array_map(function($img, $idx) use ($weddingCard) {
            $u = str_starts_with($img, 'http') ? $img : asset('storage/' . $img);
            return [
                'url' => $u,
                'title' => 'Khoảnh Khắc Hạnh Phúc #' . ($idx + 1),
                'subtitle' => 'Trang ' . ($idx + 1) . ' • ' . $weddingCard->couple_name
            ];
        }, $albumData, array_keys($albumData))) : []);

        $leadEmpty = ($cal['start_day_of_week'] == 0) ? 6 : ($cal['start_day_of_week'] - 1);
        $groomStk = $weddingCard->groom_bank_account ?: ($weddingCard->groom_bank_number ?: '998820022027');
        $brideStk = $weddingCard->bride_bank_account ?: ($weddingCard->bride_bank_number ?: '190320022027');
        $groomBankName = $weddingCard->groom_bank_name ?: 'Vietcombank';
        $brideBankName = $weddingCard->bride_bank_name ?: 'Techcombank';
        $groomOwner = $weddingCard->groom_bank_owner ?: $weddingCard->groom_name;
        $brideOwner = $weddingCard->bride_bank_owner ?: $weddingCard->bride_name;

        $groomQrUrl = $weddingCard->groom_qr_url;
        $brideQrUrl = $weddingCard->bride_qr_url;

        $groomAvatarSrc = !empty($weddingCard->groom_avatar) ? (str_starts_with($weddingCard->groom_avatar, 'http') ? $weddingCard->groom_avatar : asset('storage/' . $weddingCard->groom_avatar)) : 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=600&q=85';
        $brideAvatarSrc = !empty($weddingCard->bride_avatar) ? (str_starts_with($weddingCard->bride_avatar, 'http') ? $weddingCard->bride_avatar : asset('storage/' . $weddingCard->bride_avatar)) : 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=600&q=85';
    @endphp

    <!-- ===================================================================
         REUSABLE HAND-DRAWN SVG DEFINITIONS:
         1. Pink Lotus Bouquet (Hoa Sen Hồng Phớt nhụy vàng cuống xanh)
         2. Blush Satin Silk Ribbon Divider (Dải lụa satin hồng phấn)
         3. Three Custom Hand-Drawn Timeline Illustrations
         =================================================================== -->
    <svg width="0" height="0" class="hidden" aria-hidden="true">
        <defs>
            <!-- Gradients for Blush Satin Silk Ribbon -->
            <linearGradient id="pinkSilkRibbonGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="#F9EBEF" stop-opacity="0.25" />
                <stop offset="20%" stop-color="#E5B8C2" stop-opacity="0.88" />
                <stop offset="50%" stop-color="#C86D82" stop-opacity="0.95" />
                <stop offset="80%" stop-color="#E5B8C2" stop-opacity="0.88" />
                <stop offset="100%" stop-color="#F9EBEF" stop-opacity="0.25" />
            </linearGradient>

            <linearGradient id="pinkRibbonSheen" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="#FFFFFF" stop-opacity="0" />
                <stop offset="50%" stop-color="#FFFFFF" stop-opacity="0.85" />
                <stop offset="100%" stop-color="#FFFFFF" stop-opacity="0" />
            </linearGradient>

            <!-- Lotus Petal Gradient: Creamy white base transitioning to blush pink tip -->
            <linearGradient id="lotusPetalGrad" x1="50%" y1="100%" x2="50%" y2="0%">
                <stop offset="0%" stop-color="#FFFDFB" />
                <stop offset="45%" stop-color="#FCECEF" />
                <stop offset="82%" stop-color="#E8A2B2" />
                <stop offset="100%" stop-color="#C86D82" />
            </linearGradient>

            <linearGradient id="lotusOuterPetalGrad" x1="50%" y1="100%" x2="50%" y2="0%">
                <stop offset="0%" stop-color="#FFFFFF" />
                <stop offset="55%" stop-color="#F7DCE2" />
                <stop offset="100%" stop-color="#D88296" />
            </linearGradient>

            <!-- Golden Yellow Stamen (Nhụy sen vàng) -->
            <linearGradient id="lotusStamenGold" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#FCE881" />
                <stop offset="55%" stop-color="#E8B84B" />
                <stop offset="100%" stop-color="#C9932B" />
            </linearGradient>

            <!-- Slender Pale Green Lotus Stem (Cuống sen xanh nhạt) -->
            <linearGradient id="lotusStemGreen" x1="0%" y1="0%" x2="0%" y2="100%">
                <stop offset="0%" stop-color="#8FA882" />
                <stop offset="70%" stop-color="#A8BFA0" />
                <stop offset="100%" stop-color="#E8F0E5" stop-opacity="0.3" />
            </linearGradient>

            <!-- 1. HAND-DRAWN PINK LOTUS BOUQUET (HOA SEN HỒNG PHỚT ĐẶC TRƯNG) -->
            <g id="pink-lotus-bouquet">
                <!-- Soft Lotus Pad / Foliage Behind -->
                <path d="M85 115 C55 102, 35 80, 42 54 C60 66, 76 88, 90 112 Z" fill="#A8BFA0" opacity="0.55" />
                <path d="M115 115 C145 102, 165 80, 158 54 C140 66, 124 88, 110 112 Z" fill="#8FA882" opacity="0.6" />

                <!-- Slender Pale Green Stems (Cuống sen thanh mảnh) -->
                <path d="M97 156 Q92 118 76 76" stroke="url(#lotusStemGreen)" stroke-width="3.2" stroke-linecap="round" fill="none" />
                <path d="M103 156 Q108 118 126 78" stroke="url(#lotusStemGreen)" stroke-width="3" stroke-linecap="round" fill="none" />
                <path d="M100 160 L100 68" stroke="url(#lotusStemGreen)" stroke-width="3.8" stroke-linecap="round" fill="none" />

                <!-- Left Lotus Bud (Nụ sen hồng bên trái) -->
                <g transform="translate(52, 30) rotate(-24) scale(0.72)">
                    <path d="M24 58 C8 42, 10 18, 24 4 C38 18, 40 42, 24 58 Z" fill="url(#lotusPetalGrad)" stroke="#D88FA0" stroke-width="1" />
                    <path d="M24 58 C14 46, 12 26, 18 14 C22 28, 22 44, 24 58 Z" fill="url(#lotusOuterPetalGrad)" opacity="0.9" />
                    <path d="M24 58 C34 46, 36 26, 30 14 C26 28, 26 44, 24 58 Z" fill="url(#lotusOuterPetalGrad)" opacity="0.9" />
                    <!-- Sepal base -->
                    <path d="M18 56 Q24 62 30 56" stroke="#8FA882" stroke-width="2.5" stroke-linecap="round" fill="none" />
                </g>

                <!-- Right Half-Blooming Lotus (Hoa sen hé nở bên phải) -->
                <g transform="translate(112, 24) rotate(22) scale(0.74)">
                    <path d="M28 60 C6 48, 2 26, 16 14 C24 24, 26 44, 28 60 Z" fill="url(#lotusOuterPetalGrad)" stroke="#D88FA0" stroke-width="0.9" />
                    <path d="M28 60 C50 48, 54 26, 40 14 C32 24, 30 44, 28 60 Z" fill="url(#lotusOuterPetalGrad)" stroke="#D88FA0" stroke-width="0.9" />
                    <path d="M28 60 C12 42, 14 16, 28 4 C42 16, 44 42, 28 60 Z" fill="url(#lotusPetalGrad)" stroke="#C86D82" stroke-width="1" />
                    <path d="M22 58 Q28 64 34 58" stroke="#8FA882" stroke-width="2.5" stroke-linecap="round" fill="none" />
                </g>

                <!-- Center Main Full-Blooming Pink Lotus (Đóa sen hồng nở rộ ở giữa) -->
                <g transform="translate(100, 56)">
                    <!-- Back Outer Petals -->
                    <path d="M0 24 C-34 18, -50 -8, -36 -30 C-20 -18, -10 2, 0 24 Z" fill="url(#lotusOuterPetalGrad)" stroke="#D88FA0" stroke-width="1" />
                    <path d="M0 24 C34 18, 50 -8, 36 -30 C20 -18, 10 2, 0 24 Z" fill="url(#lotusOuterPetalGrad)" stroke="#D88FA0" stroke-width="1" />
                    
                    <!-- Mid Layer Petals -->
                    <path d="M0 25 C-28 10, -36 -20, -18 -40 C-6 -24, -4 -2, 0 25 Z" fill="url(#lotusPetalGrad)" stroke="#C86D82" stroke-width="1" />
                    <path d="M0 25 C28 10, 36 -20, 18 -40 C6 -24, 4 -2, 0 25 Z" fill="url(#lotusPetalGrad)" stroke="#C86D82" stroke-width="1" />

                    <!-- Golden Stamen & Seed Pod Center (Đài sen & nhụy vàng rực rỡ) -->
                    <ellipse cx="0" cy="-6" rx="13" ry="6.5" fill="url(#lotusStamenGold)" />
                    <!-- Tiny Stamen Dots -->
                    <circle cx="-9" cy="-9" r="1.5" fill="#FFF3B0" />
                    <circle cx="-5" cy="-11" r="1.6" fill="#FFF3B0" />
                    <circle cx="0" cy="-12" r="1.7" fill="#FFF3B0" />
                    <circle cx="5" cy="-11" r="1.6" fill="#FFF3B0" />
                    <circle cx="9" cy="-9" r="1.5" fill="#FFF3B0" />
                    <path d="M-8 -5 L-10 -10 M-4 -6 L-5 -11 M0 -6 L0 -12 M4 -6 L5 -11 M8 -5 L10 -10" stroke="#D99B26" stroke-width="1.1" stroke-linecap="round" />

                    <!-- Center Upright Main Petal -->
                    <path d="M0 26 C-18 6, -18 -26, 0 -46 C18 -26, 18 6, 0 26 Z" fill="url(#lotusPetalGrad)" stroke="#C86D82" stroke-width="1.1" opacity="0.92" />

                    <!-- Front Cupping Petals -->
                    <path d="M0 26 C-22 22, -32 8, -22 -6 C-12 4, -6 16, 0 26 Z" fill="#FFFDFD" stroke="#E5B8C2" stroke-width="1" />
                    <path d="M0 26 C22 22, 32 8, 22 -6 C12 4, 6 16, 0 26 Z" fill="#FFFDFD" stroke="#E5B8C2" stroke-width="1" />
                    <path d="M0 27 C-12 20, -10 4, 0 -4 C10 4, 12 20, 0 27 Z" fill="url(#lotusOuterPetalGrad)" stroke="#D88FA0" stroke-width="1" />
                </g>

                <!-- Blush Pink Satin Bow Tying the Lotus Stems -->
                <path d="M84 122 C66 112, 62 132, 85 129 C94 127, 106 127, 115 129 C138 132, 134 112, 116 122 C106 126, 94 126, 84 122 Z" fill="#C86D82" />
                <path d="M95 126 C87 139, 76 149, 68 155" stroke="#C86D82" stroke-width="2.6" stroke-linecap="round" fill="none" />
                <path d="M105 126 C113 139, 124 149, 132 155" stroke="#D88FA0" stroke-width="2.6" stroke-linecap="round" fill="none" />
                <circle cx="100" cy="125" r="4.2" fill="#F9EBEF" stroke="#B85A70" stroke-width="1.5" />
            </g>

            <!-- 2. FLOWING BLUSH SATIN SILK RIBBON DIVIDER (DẢI LỤA SATIN HỒNG PHẤN) -->
            <g id="silk-pink-ribbon">
                <!-- Soft Blush Shadow -->
                <path d="M 0,28 C 90,6 170,48 260,24 C 340,4 410,42 480,20" fill="none" stroke="#F2D6DE" stroke-width="8" stroke-linecap="round" opacity="0.55" transform="translate(0, 4)" />
                <!-- Main Flowing Satin Ribbon -->
                <path d="M -10,26 C 85,2 165,50 255,24 C 345,-2 415,44 490,18 L 490,27 C 415,52 345,10 255,33 C 165,58 85,12 -10,34 Z" fill="url(#pinkSilkRibbonGrad)" />
                <!-- Secondary Delicate Silk Thread -->
                <path d="M 10,20 C 110,46 190,4 285,32 C 365,54 430,12 475,28" fill="none" stroke="#E5B8C2" stroke-width="1.4" stroke-dasharray="4 3" opacity="0.9" />
                <!-- Satin Gloss Highlight -->
                <path d="M 20,28 C 95,8 170,49 255,26 C 340,4 405,43 465,22" fill="none" stroke="url(#pinkRibbonSheen)" stroke-width="1.7" />
                <!-- Tiny Lotus Pearl Accent on the Ribbon -->
                <circle cx="255" cy="28" r="3.2" fill="#C86D82" />
                <circle cx="247" cy="26" r="2" fill="#E5B8C2" />
                <circle cx="263" cy="30" r="2" fill="#E5B8C2" />
            </g>

            <!-- 3A. TIMELINE ICON 1: PAIR OF WEDDING RINGS TIED WITH PINK SILK RIBBON -->
            <g id="icon-rings-ribbon">
                <!-- Flowing Pink Silk Ribbon Behind & Tying the Rings -->
                <path d="M8 22 C18 10, 28 12, 32 20 C36 12, 46 10, 56 22" fill="none" stroke="#E5B8C2" stroke-width="2.5" stroke-linecap="round" />
                <!-- Left Gold/Rose-Gold Ring -->
                <circle cx="25" cy="36" r="12" fill="none" stroke="#D49B6A" stroke-width="3.2" />
                <!-- Diamond on Left Ring -->
                <polygon points="25,19 21,24 29,24" fill="#F9EBEF" stroke="#C86D82" stroke-width="1" />
                <!-- Right Interlocked Ring -->
                <circle cx="39" cy="36" r="12" fill="none" stroke="#C86D82" stroke-width="3" />
                <!-- Pink Silk Bow Knot at Top Intersection -->
                <path d="M26 22 C19 16, 17 26, 28 25 C32 25, 36 25, 38 25 C47 26, 45 16, 38 22 Z" fill="#C86D82" />
                <path d="M30 25 Q26 33 21 38 M34 25 Q38 33 43 38" stroke="#C86D82" stroke-width="1.8" stroke-linecap="round" fill="none" />
                <circle cx="32" cy="24" r="2.5" fill="#F9EBEF" stroke="#B85A70" stroke-width="1" />
            </g>

            <!-- 3B. TIMELINE ICON 2: CHAMPAGNE GLASSES TIED WITH PINK BOWS -->
            <g id="icon-champagne-bows">
                <!-- Left Tilted Flute -->
                <g transform="translate(22, 30) rotate(-14)">
                    <path d="M-7 -18 L7 -18 L4 2 C3 7, -3 7, -4 2 Z" fill="#FDF8F9" stroke="#C86D82" stroke-width="1.8" />
                    <path d="M-5 -10 L5 -10 L3.5 1 C2.5 5, -2.5 5, -3.5 1 Z" fill="#F5D7DF" />
                    <line x1="0" y1="6" x2="0" y2="20" stroke="#C86D82" stroke-width="1.8" />
                    <line x1="-6" y1="20" x2="6" y2="20" stroke="#C86D82" stroke-width="2" stroke-linecap="round" />
                    <!-- Pink Bow on Stem -->
                    <path d="M-6 10 C-10 7, -10 14, -1 12 L1 12 C10 14, 10 7, 6 10 Z" fill="#C86D82" />
                </g>
                <!-- Right Tilted Flute -->
                <g transform="translate(42, 30) rotate(14)">
                    <path d="M-7 -18 L7 -18 L4 2 C3 7, -3 7, -4 2 Z" fill="#FDF8F9" stroke="#C86D82" stroke-width="1.8" />
                    <path d="M-5 -10 L5 -10 L3.5 1 C2.5 5, -2.5 5, -3.5 1 Z" fill="#F5D7DF" />
                    <line x1="0" y1="6" x2="0" y2="20" stroke="#C86D82" stroke-width="1.8" />
                    <line x1="-6" y1="20" x2="6" y2="20" stroke="#C86D82" stroke-width="2" stroke-linecap="round" />
                    <!-- Pink Bow on Stem -->
                    <path d="M-6 10 C-10 7, -10 14, -1 12 L1 12 C10 14, 10 7, 6 10 Z" fill="#C86D82" />
                </g>
                <!-- Toast Sparkles & Heart at Top -->
                <path d="M32 8 C30 5, 26 6, 28 10 C29 12, 32 14, 32 14 C32 14, 35 12, 36 10 C38 6, 34 5, 32 8 Z" fill="#C86D82" />
            </g>

            <!-- 3C. TIMELINE ICON 3: PAIR OF RED CANDLES WITH PINK BOWS (ĐÔI NẾN ĐỎ THẮT NƠ HỒNG) -->
            <g id="icon-red-candles">
                <!-- Left Red Wedding Candle -->
                <g transform="translate(18, 18)">
                    <!-- Golden Flame -->
                    <path d="M5 -8 C2 -3, 2 1, 5 3 C8 1, 8 -3, 5 -8 Z" fill="#F6C445" />
                    <path d="M5 -5 C3.5 -2, 3.5 0, 5 2 C6.5 0, 6.5 -2, 5 -5 Z" fill="#FFF3B0" />
                    <line x1="5" y1="2" x2="5" y2="5" stroke="#5C4348" stroke-width="1.2" />
                    <!-- Red Candle Body -->
                    <rect x="0" y="5" width="10" height="28" rx="2" fill="#C94A58" stroke="#A63442" stroke-width="1.2" />
                    <!-- Pink Silk Bow Around Candle -->
                    <rect x="0" y="16" width="10" height="3" fill="#F9EBEF" />
                    <path d="M1 17 C-5 13, -5 22, 4 19 L6 19 C15 22, 15 13, 9 17 Z" fill="#E598AA" stroke="#B85A70" stroke-width="0.8" />
                    <path d="M4 19 L1 26 M6 19 L9 26" stroke="#E598AA" stroke-width="1.5" stroke-linecap="round" />
                    <!-- Candle Holder Base -->
                    <path d="M-3 33 L13 33 L11 36 L-1 36 Z" fill="#D49B6A" />
                </g>

                <!-- Right Red Wedding Candle -->
                <g transform="translate(36, 14)">
                    <!-- Golden Flame -->
                    <path d="M5 -8 C2 -3, 2 1, 5 3 C8 1, 8 -3, 5 -8 Z" fill="#F6C445" />
                    <path d="M5 -5 C3.5 -2, 3.5 0, 5 2 C6.5 0, 6.5 -2, 5 -5 Z" fill="#FFF3B0" />
                    <line x1="5" y1="2" x2="5" y2="5" stroke="#5C4348" stroke-width="1.2" />
                    <!-- Red Candle Body -->
                    <rect x="0" y="5" width="10" height="32" rx="2" fill="#C94A58" stroke="#A63442" stroke-width="1.2" />
                    <!-- Pink Silk Bow Around Candle -->
                    <rect x="0" y="18" width="10" height="3" fill="#F9EBEF" />
                    <path d="M1 19 C-5 15, -5 24, 4 21 L6 21 C15 24, 15 15, 9 19 Z" fill="#E598AA" stroke="#B85A70" stroke-width="0.8" />
                    <path d="M4 21 L1 28 M6 21 L9 28" stroke="#E598AA" stroke-width="1.5" stroke-linecap="round" />
                    <!-- Candle Holder Base -->
                    <path d="M-3 37 L13 37 L11 40 L-1 40 Z" fill="#D49B6A" />
                </g>
            </g>
        </defs>
    </svg>

    <!-- MAIN MOBILE-FIRST INVITATION CONTAINER (max-w-[480px] centered, borderless pure white paper feel) -->
    <div id="app-container" class="relative w-full max-w-[480px] min-h-screen silk-card paper-texture overflow-hidden mx-auto">

        <!-- CONTINUOUS DELICATE SILK THREAD LINES (SỢI TƠ DUYÊN HỒNG MẢNH) ALONG LEFT & RIGHT EDGES -->
        <svg class="pointer-events-none absolute inset-y-0 left-0 w-7 h-full z-10 opacity-75" preserveAspectRatio="none" viewBox="0 0 28 2000">
            <path d="M14,0 C26,180 4,360 16,540 C28,720 4,900 15,1080 C26,1260 6,1440 16,1620 C26,1800 8,1920 14,2000" fill="none" stroke="#E8C5CE" stroke-width="1.1" />
            <path d="M9,0 C2,200 22,400 10,600 C-2,800 20,1000 10,1200 C2,1400 22,1600 11,1800 C4,1920 16,1980 10,2000" fill="none" stroke="#F2D6DE" stroke-width="0.95" class="silk-thread-line" />
        </svg>
        <svg class="pointer-events-none absolute inset-y-0 right-0 w-7 h-full z-10 opacity-75" preserveAspectRatio="none" viewBox="0 0 28 2000">
            <path d="M14,0 C2,180 24,360 12,540 C0,720 24,900 13,1080 C2,1260 22,1440 12,1620 C2,1800 20,1920 14,2000" fill="none" stroke="#E8C5CE" stroke-width="1.1" />
            <path d="M19,0 C26,200 6,400 18,600 C30,800 8,1000 18,1200 C26,1400 6,1600 17,1800 C24,1920 12,1980 18,2000" fill="none" stroke="#F2D6DE" stroke-width="0.95" class="silk-thread-line" />
        </svg>

        <!-- FLOATING LOTUS PETALS CANVAS -->
        <canvas id="petals-canvas" class="pointer-events-none fixed inset-0 z-30 mx-auto max-w-[480px]"></canvas>

        <!-- TOP BAR: THEME BADGE & "XEM LẠI PHONG BÌ" -->
        {{-- <div class="sticky top-3 z-40 flex justify-between items-center px-4 pointer-events-none">
            <div class="pointer-events-auto bg-white/90 backdrop-blur-md border border-lotus-200 rounded-full px-3 py-1 text-[11px] text-lotus-700 shadow-sm flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-lotus-500 animate-pulse"></span>
                <span class="font-medium tracking-wide">Tơ Duyên - Hồng</span>
            </div>
            <button id="reopen-envelope-btn" onclick="reopenEnvelope()" class="pointer-events-auto bg-white/90 hover:bg-lotus-50 backdrop-blur-md border border-lotus-300 text-lotus-700 rounded-full px-3 py-1 text-[11px] font-medium shadow-sm transition flex items-center gap-1">
                <span>✉</span> Xem lại phong bì
            </button>
        </div> --}}

        <!-- ===================================================================
             1. 3D ENVELOPE OPENING OVERLAY (MÀN HÌNH PHONG BÌ MỞ THIỆP)
             =================================================================== -->
        <div id="envelope-overlay" class="envelope-overlay-wrapper fixed inset-0 z-50 flex items-center justify-center bg-lotus-900/50 backdrop-blur-sm p-3">
            <div class="relative w-full max-w-[450px] min-h-[92vh] max-h-[860px] rounded-[28px] bg-gradient-to-b from-[#FFF9FA] via-[#FFFFFF] to-[#FDF2F5] border border-lotus-200 shadow-2xl flex flex-col justify-between items-center p-5 overflow-hidden">
                
                <!-- Symmetric Pink Lotus Floral Decorations at Top Corners -->
                <div class="w-full flex justify-between items-start pointer-events-none select-none">
                    <svg class="w-28 h-28 -ml-2 -mt-2 sway-flower" viewBox="0 0 200 165">
                        <use href="#pink-lotus-bouquet" />
                    </svg>
                    <div class="text-center mt-2">
                        <p class="text-[10px] uppercase tracking-[0.28em] text-lotus-500 font-medium">Thiệp Báo Hỷ</p>
                        <p class="font-serif italic text-xs text-lotus-800 mt-0.5">Tơ Duyên Trăm Năm</p>
                    </div>
                    <svg class="w-28 h-28 -mr-2 -mt-2 sway-flower" style="transform: scaleX(-1);" viewBox="0 0 200 165">
                        <use href="#pink-lotus-bouquet" />
                    </svg>
                </div>

                <!-- Center 3D Envelope & Invitation Card Preview -->
                <div id="envelope-3d-stage" class="envelope-perspective relative w-full max-w-[360px] my-auto py-2">
                    
                    <!-- Inner White & Blush Card rising out -->
                    <div class="envelope-letter-slide relative z-20 mx-auto w-[92%] rounded-2xl bg-white border border-lotus-200 shadow-lg px-5 py-6 text-center">
                        <!-- Mini Pink Lotus Emblem -->
                        <div class="mx-auto w-20 h-16 mb-1">
                            <svg viewBox="0 0 200 165" class="w-full h-full">
                                <use href="#pink-lotus-bouquet" />
                            </svg>
                        </div>

                        <p class="text-[11px] uppercase tracking-[0.25em] text-lotus-500 font-medium mb-2">Save The Date</p>
                        
                        <!-- Couple Names: {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }} -->
                        <h1 class="font-pattaya text-3xl sm:text-[35px] text-lotus-500 leading-tight">
                            {{ $weddingCard->groom_name }}
                        </h1>
                        <div class="my-1 flex items-center justify-center gap-3 text-lotus-400">
                            <span class="h-[1px] w-10 bg-lotus-200"></span>
                            <span class="font-vibes text-2xl text-lotus-500">&amp;</span>
                            <span class="h-[1px] w-10 bg-lotus-200"></span>
                        </div>
                        <h1 class="font-pattaya text-3xl sm:text-[35px] text-lotus-500 leading-tight">
                            {{ $weddingCard->bride_name }}
                        </h1>

                        <!-- Divider ── ❦ ── -->
                        <div class="my-3 flex items-center justify-center gap-2 text-lotus-400 text-sm">
                            <span class="w-12 h-[1px] bg-gradient-to-r from-transparent to-lotus-300"></span>
                            <span class="text-lotus-500 text-base">❦</span>
                            <span class="w-12 h-[1px] bg-gradient-to-l from-transparent to-lotus-300"></span>
                        </div>

                        <!-- Wedding Date -->
                        <p class="font-serif text-xl font-semibold tracking-wider text-lotus-900">
                            {{ $dayNum }} tháng {{ $monthNum }}, {{ $yearNum }}
                        </p>
                        @if(!empty($weddingCard->lunar_date))
                        <p class="text-[11px] text-lotus-800 italic mt-0.5">
                            ({{ $weddingCard->lunar_date }})
                        </p>
                        @endif

                        <!-- Guest Invitation Box -->
                        <div class="mt-4 pt-3 border-t border-dashed border-lotus-200">
                            <p class="text-[11px] uppercase tracking-[0.22em] text-lotus-500 font-medium">Thân Mời</p>
                            <p id="envelope-guest-name" class="font-serif text-lg font-semibold text-lotus-900 mt-0.5">
                                Quý Khách &amp; Gia Đình
                            </p>
                        </div>
                    </div>

                    <!-- Envelope Pocket Front & Top Flap -->
                    <div class="relative -mt-14 z-30 mx-auto w-full h-40 rounded-b-2xl bg-gradient-to-b from-[#E5AAB8] via-[#D88A9C] to-[#C86D82] shadow-xl overflow-hidden border border-lotus-300 flex flex-col justify-end items-center pb-5">
                        <!-- Diagonal Envelope Pocket Folds -->
                        <svg class="absolute inset-0 w-full h-full pointer-events-none" preserveAspectRatio="none" viewBox="0 0 400 180">
                            <polygon points="0,0 200,110 0,180" fill="#D48496" opacity="0.65" />
                            <polygon points="400,0 200,110 400,180" fill="#C47285" opacity="0.65" />
                            <polygon points="0,180 200,88 400,180" fill="#C86D82" stroke="#F9EBEF" stroke-width="0.9" stroke-opacity="0.55" />
                        </svg>

                        <!-- Wax Seal Emblem -->
                        <div class="relative z-20 -mt-8 mb-2 w-12 h-12 rounded-full bg-gradient-to-br from-[#FCE89C] via-[#DFB252] to-[#A67822] p-0.5 shadow-lg flex items-center justify-center border border-white/70">
                            <div class="w-full h-full rounded-full border border-amber-900/30 flex items-center justify-center text-white font-serif text-xs font-bold tracking-tighter">
                                B♥V
                            </div>
                        </div>

                        <!-- Interactive "Mở thiệp" Button -->
                        <button id="open-invitation-btn" onclick="openInvitation()" class="btn-shimmer relative z-20 bg-white text-lotus-700 hover:bg-lotus-50 active:scale-95 transition-all duration-300 font-medium text-sm px-7 py-2.5 rounded-full shadow-lg border border-lotus-200 flex items-center gap-2 cursor-pointer">
                            <span>Mở thiệp</span>
                            <svg class="w-4 h-4 text-lotus-500 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Bottom Blush Satin Ribbon & Note -->
                <div class="w-full text-center">
                    <svg class="w-full h-8 mx-auto silk-ribbon-wave" viewBox="0 0 480 48">
                        <use href="#silk-pink-ribbon" />
                    </svg>
                    <p class="text-[11px] text-lotus-800/80 italic">
                        Chạm vào "Mở thiệp" để lắng nghe giai điệu tình yêu
                    </p>
                </div>
            </div>
        </div>

        <!-- ===================================================================
             2. HERO SECTION (MỞ ĐẦU THIỆP - HAI KHUNG ẢNH NGHIÊNG VIỀN HỒNG KHÓI & HOA SEN)
             =================================================================== -->
        <section id="sec-hero" class="relative pt-4 pb-8 px-6 text-center overflow-hidden">
            
            <!-- Top Blooming Pink Lotus Illustration -->
            <div class="reveal-item mx-auto w-44 h-36 -mb-2 sway-flower">
                <svg viewBox="0 0 200 165" class="w-full h-full drop-shadow-sm">
                    <use href="#pink-lotus-bouquet" />
                </svg>
            </div>

            <p class="reveal-item text-[11px] uppercase tracking-[0.32em] text-lotus-500 font-medium mb-7">
                Tơ Duyên Kết Nối • Trăm Năm Hạnh Phúc
            </p>

            <!-- TWO TILTED PHOTO FRAMES WITH DUSTY PINK BORDERS (HAI KHUNG ẢNH NGHIÊNG VIỀN HỒNG KHÓI) -->
            <div class="reveal-scale relative mx-auto max-w-[340px] h-[255px] flex items-center justify-center my-2">
                <!-- Decorative soft blush circle halo behind photos -->
                <div class="absolute w-56 h-56 rounded-full bg-lotus-100/80 blur-xl -z-10"></div>

                <!-- Left Tilted Frame: Groom ({{ $weddingCard->groom_name }}) -->
                <div onclick="openLightbox(0)" class="photo-frame-groom cursor-pointer relative w-[158px] h-[215px] bg-white rounded-xl p-1.5 -mr-4 z-10">
                    <div class="w-full h-full rounded-lg overflow-hidden relative bg-lotus-50">
                        <img src="{{ $groomAvatarSrc }}" 
                             alt="Chú rể {{ $weddingCard->groom_name }}" 
                             class="w-full h-full object-cover object-center transition duration-700 hover:scale-110"
                             onerror="this.src='https://placehold.co/400x550/F9EBEF/5C4348?text=Chú+Rể'">
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/55 via-black/15 to-transparent p-2 text-left">
                            <span class="text-[10px] text-white/90 tracking-wider uppercase block">Chú Rể</span>
                            <span class="font-pattaya text-white text-sm">{{ $weddingCard->groom_name }}</span>
                        </div>
                    </div>
                </div>

                <!-- Right Tilted Frame: Bride ({{ $weddingCard->bride_name }}) -->
                <div onclick="openLightbox(1)" class="photo-frame-bride cursor-pointer relative w-[158px] h-[215px] bg-white rounded-xl p-1.5 -ml-3 mt-6 z-20">
                    <div class="w-full h-full rounded-lg overflow-hidden relative bg-lotus-50">
                        <img src="{{ $brideAvatarSrc }}" 
                             alt="Cô dâu {{ $weddingCard->bride_name }}" 
                             class="w-full h-full object-cover object-center transition duration-700 hover:scale-110"
                             onerror="this.src='https://placehold.co/400x550/F2D6DE/5C4348?text=Cô+Dâu'">
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/55 via-black/15 to-transparent p-2 text-right">
                            <span class="text-[10px] text-white/90 tracking-wider uppercase block">Cô Dâu</span>
                            <span class="font-pattaya text-white text-sm">{{ $weddingCard->bride_name }}</span>
                        </div>
                    </div>
                </div>

                <!-- Small Floating Date Badge at Photo Intersection -->
                <div class="absolute -bottom-2 z-30 bg-white/95 border border-lotus-200 rounded-full px-3 py-1 shadow-md flex items-center gap-1.5">
                    <span class="text-lotus-500 text-xs">❦</span>
                    <span class="font-serif italic text-xs font-semibold text-lotus-900">{{ $wDate ? $wDate->format('d . m . Y') : '20 . 02 . 2027' }}</span>
                    <span class="text-lotus-500 text-xs">❦</span>
                </div>
            </div>

            <!-- COUPLE NAMES WITH OVERSIZED PALE BLUSH "&" WATERMARK (#F9EBEF) -->
            <div class="reveal-item relative mt-10 mb-4 py-4">
                <!-- Giant "&" Watermark Behind -->
                <span class="pointer-events-none select-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 font-serif italic text-[142px] leading-none text-[#F7E4EA] -z-0">
                    &amp;
                </span>

                <div class="relative z-10 space-y-1">
                    <h2 class="font-pattaya text-[40px] sm:text-[44px] text-lotus-500 drop-shadow-sm leading-tight">
                        {{ $weddingCard->groom_name }}
                    </h2>
                    <p class="font-vibes text-2xl text-lotus-400">cùng</p>
                    <h2 class="font-pattaya text-[40px] sm:text-[44px] text-lotus-500 drop-shadow-sm leading-tight">
                        {{ $weddingCard->bride_name }}
                    </h2>
                </div>
            </div>

            <!-- Poetic Subtitle -->
            <p class="reveal-item font-serif italic text-base text-lotus-800 max-w-[330px] mx-auto leading-relaxed">
                "Hương sen hồng thắm duyên đôi lứa,<br>
                Lụa đào se kết nghĩa trăm năm."
            </p>

            <!-- Flowing Blush Satin Ribbon Divider -->
            <div class="mt-6 -mx-6">
                <svg class="w-full h-11 silk-ribbon-wave" viewBox="0 0 480 48">
                    <use href="#silk-pink-ribbon" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             3. FAMILY INFORMATION & FORMAL ANNOUNCEMENT (THÔNG TIN HAI GIA ĐÌNH)
             =================================================================== -->
        <section id="sec-family" class="relative py-6 px-6 text-center">
            <!-- Top Pink Lotus Header Ornament -->
            <div class="reveal-item mx-auto w-32 h-28 -mb-2 sway-flower">
                <svg viewBox="0 0 200 165" class="w-full h-full">
                    <use href="#pink-lotus-bouquet" />
                </svg>
            </div>

            <!-- Two-Column Family Info (NHÀ TRAI | NHÀ GÁI) -->
            <div class="reveal-item grid grid-cols-2 gap-3 bg-lotus-50/75 border border-lotus-200/80 rounded-2xl p-4 shadow-sm relative">
                <!-- Center Vertical Divider -->
                <div class="absolute inset-y-4 left-1/2 w-[1px] bg-gradient-to-b from-transparent via-lotus-300 to-transparent"></div>

                <!-- Nhà Trai -->
                <div class="pr-2 text-center">
                    <span class="inline-block bg-lotus-500 text-white text-[10px] uppercase tracking-[0.2em] px-2.5 py-0.5 rounded-full font-medium mb-2">
                        Nhà Trai
                    </span>
                    <p class="text-xs text-lotus-800 font-medium leading-relaxed">
                        Ông: <strong class="text-lotus-900">{{ $weddingCard->groom_father_name ?: ($weddingCard->groom_father ?: 'Trần Minh Đức') }}</strong>
                    </p>
                    <p class="text-xs text-lotus-800 font-medium leading-relaxed mt-0.5">
                        Bà: <strong class="text-lotus-900">{{ $weddingCard->groom_mother_name ?: ($weddingCard->groom_mother ?: 'Lê Thị Thu Hà') }}</strong>
                    </p>
                    <p class="text-[11px] text-lotus-800/85 mt-1.5 leading-snug">
                        📍 {{ $weddingCard->address_groom ?: ($weddingCard->groom_address ?: 'Quận 3, TP. Hồ Chí Minh') }}
                    </p>
                </div>

                <!-- Nhà Gái -->
                <div class="pl-2 text-center">
                    <span class="inline-block bg-lotus-500 text-white text-[10px] uppercase tracking-[0.2em] px-2.5 py-0.5 rounded-full font-medium mb-2">
                        Nhà Gái
                    </span>
                    <p class="text-xs text-lotus-800 font-medium leading-relaxed">
                        Ông: <strong class="text-lotus-900">{{ $weddingCard->bride_father_name ?: ($weddingCard->bride_father ?: 'Nguyễn Hoàng Nam') }}</strong>
                    </p>
                    <p class="text-xs text-lotus-800 font-medium leading-relaxed mt-0.5">
                        Bà: <strong class="text-lotus-900">{{ $weddingCard->bride_mother_name ?: ($weddingCard->bride_mother ?: 'Phạm Ngọc Lan') }}</strong>
                    </p>
                    <p class="text-[11px] text-lotus-800/85 mt-1.5 leading-snug">
                        📍 {{ $weddingCard->address_bride ?: ($weddingCard->bride_address ?: 'Quận Phú Nhuận, TP. Hồ Chí Minh') }}
                    </p>
                </div>
            </div>

            <!-- Formal Announcement Copy -->
            <div class="reveal-item mt-7 space-y-2">
                <p class="text-xs uppercase tracking-[0.22em] text-lotus-500 font-medium">
                    Trân Trọng Báo Tin
                </p>
                <p class="font-serif italic text-base text-lotus-800">
                    Lễ Thành Hôn của hai con chúng tôi
                </p>

                <div class="py-3">
                    <h3 class="font-pattaya text-3xl text-lotus-500">
                        Trần {{ $weddingCard->groom_name }}
                    </h3>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-lotus-800/75 mt-0.5">{{ $weddingCard->groom_rank ?: 'Trưởng Nam' }}</p>

                    <div class="my-2 flex items-center justify-center gap-3">
                        <span class="w-10 h-[1px] bg-lotus-200"></span>
                        <span class="font-vibes text-2xl text-lotus-500">&amp;</span>
                        <span class="w-10 h-[1px] bg-lotus-200"></span>
                    </div>

                    <h3 class="font-pattaya text-3xl text-lotus-500">
                        Nguyễn {{ $weddingCard->bride_name }}
                    </h3>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-lotus-800/75 mt-0.5">Ái Nữ</p>
                </div>
            </div>

            <!-- Flowing Blush Satin Ribbon Divider -->
            <div class="mt-4 -mx-6">
                <svg class="w-full h-11 silk-ribbon-wave" viewBox="0 0 480 48">
                    <use href="#silk-pink-ribbon" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             4. STAGGERED LEFT-RIGHT CEREMONY & RECEPTION + MINI CALENDAR
             =================================================================== -->
        <section id="sec-events" class="relative py-6 px-6 space-y-8">
            
            <!-- Top Pink Lotus -->
            <div class="reveal-item mx-auto w-32 h-28 -mb-6 sway-flower">
                <svg viewBox="0 0 200 165" class="w-full h-full">
                    <use href="#pink-lotus-bouquet" />
                </svg>
            </div>

            <!-- BLOCK A: TIỆC CƯỚI NHÀ TRAI (ALIGNED LEFT - BỐ CỤC SO LE TRÁI) -->
            <div class="reveal-left mr-6 bg-gradient-to-br from-white via-lotus-50/60 to-lotus-100/50 border-l-4 border-lotus-500 rounded-r-2xl rounded-tl-xl p-5 shadow-md relative overflow-hidden">
                <div class="flex items-center gap-2 text-lotus-600 text-[11px] uppercase tracking-[0.22em] font-semibold">
                    <span>🌸</span>
                    <span>Tiệc Cưới Nhà Trai</span>
                </div>
                <h3 class="font-pattaya text-2xl text-lotus-500 mt-1">
                    Hôn Trường Nhà Trai
                </h3>

                <!-- Big Editorial Date & Time Block -->
                <div class="my-3 flex items-baseline gap-2 font-serif text-lotus-900">
                    <span class="text-3xl font-bold tracking-tight text-lotus-600">{{ $weddingCard->time_groom ?: ($timeStrShort ?: '18:00') }}</span>
                    <span class="text-xl text-lotus-300">•</span>
                    <span class="text-base font-semibold">{{ $weddingCard->groom_eating_date ? \Carbon\Carbon::parse($weddingCard->groom_eating_date)->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : ($wDate ? $wDate->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : 'Thứ Bảy, ngày 20/02/2027') }}</span>
                </div>

                <div class="space-y-1 text-xs text-lotus-800 border-t border-lotus-200/80 pt-2.5">
                    @if(!empty($weddingCard->time_groom_al) || !empty($weddingCard->wedding_date_lunar))
                    <p class="italic text-lotus-600">
                        (Tức ngày {{ $weddingCard->time_groom_al ?: $weddingCard->wedding_date_lunar }})
                    </p>
                    @endif
                    <p class="pt-1 leading-relaxed">
                        📍 <strong>Tại:</strong> {{ $weddingCard->address_groom ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Trai') }}
                    </p>
                </div>

                <div class="mt-4 flex flex-wrap gap-2 pt-2">
                    <a href="{{ $weddingCard->groom_map ?: ($weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode($weddingCard->address_groom ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Trai')))) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-lotus-500 text-white text-xs font-medium shadow-sm hover:bg-lotus-600 transition">
                        <span>🗺️</span> Chỉ đường
                    </a>
                    @if(!empty($weddingCard->groom_phone))
                    <a href="tel:{{ $weddingCard->groom_phone }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white border border-lotus-300 text-lotus-800 text-xs font-medium shadow-sm hover:bg-lotus-50 transition">
                        <span>📞</span> Gọi Chú Rể: {{ $weddingCard->groom_phone }}
                    </a>
                    @endif
                </div>
            </div>

            <!-- BLOCK B: TIỆC CƯỚI NHÀ GÁI (ALIGNED RIGHT - BỐ CỤC SO LE PHẢI) -->
            <div class="reveal-right ml-6 bg-gradient-to-bl from-white via-lotus-50/60 to-lotus-100/50 border-r-4 border-lotus-500 rounded-l-2xl rounded-tr-xl p-5 shadow-md text-right relative overflow-hidden">
                <div class="flex items-center justify-end gap-2 text-lotus-600 text-[11px] uppercase tracking-[0.22em] font-semibold">
                    <span>Tiệc Cưới Nhà Gái</span>
                    <span>🥂</span>
                </div>
                <h3 class="font-pattaya text-2xl text-lotus-500 mt-1">
                    Hôn Trường Nhà Gái
                </h3>

                <!-- Big Editorial Time & Date Block -->
                <div class="my-3 flex items-baseline justify-end gap-2 font-serif text-lotus-900">
                    <span class="text-3xl font-bold text-lotus-600">{{ $weddingCard->time_bride ?: ($timeStrShort ?: '11:00') }}</span>
                    <span class="text-lg text-lotus-300">|</span>
                    <span class="text-base font-semibold">{{ $weddingCard->bride_eating_date ? \Carbon\Carbon::parse($weddingCard->bride_eating_date)->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : ($wDate ? $wDate->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : 'Thứ Bảy, ngày 20/02/2027') }}</span>
                </div>

                <div class="space-y-1 text-xs text-lotus-800 border-t border-lotus-200/80 pt-2.5">
                    @if(!empty($weddingCard->time_bride_al) || !empty($weddingCard->wedding_date_lunar))
                    <p class="italic text-lotus-600">
                        (Tức ngày {{ $weddingCard->time_bride_al ?: $weddingCard->wedding_date_lunar }})
                    </p>
                    @endif
                    <p class="leading-relaxed">
                        📍 <strong>Tại:</strong> {{ $weddingCard->address_bride ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Gái') }}
                    </p>
                </div>

                <div class="mt-4 flex flex-wrap justify-end gap-2 pt-2">
                    <a href="{{ $weddingCard->bride_map ?: ($weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode($weddingCard->address_bride ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Gái')))) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-lotus-500 text-white text-xs font-medium shadow-sm hover:bg-lotus-600 transition">
                        <span>🗺️</span> Chỉ đường
                    </a>
                    @if(!empty($weddingCard->bride_phone))
                    <a href="tel:{{ $weddingCard->bride_phone }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white border border-lotus-300 text-lotus-800 text-xs font-medium shadow-sm hover:bg-lotus-50 transition">
                        <span>📞</span> Gọi Cô Dâu: {{ $weddingCard->bride_phone }}
                    </a>
                    @endif
                </div>
            </div>

            <!-- MINI ROUNDED CALENDAR FOR FEBRUARY 2027 & LIVE COUNTDOWN -->
            <div class="reveal-scale bg-white border border-lotus-200 rounded-3xl p-5 shadow-md text-center">
                <p class="text-[11px] uppercase tracking-[0.25em] text-lotus-500 font-medium">Lịch Ngày Chung Đôi</p>
                <h4 class="font-pattaya text-2xl text-lotus-500 mt-0.5 mb-3">
                    Tháng {{ $cal['month'] }} / {{ $cal['year'] }}
                </h4>

                <!-- Days of Week Header -->
                <div class="grid grid-cols-7 gap-1 text-[11px] font-semibold text-lotus-700 border-b border-lotus-100 pb-2 mb-2">
                    <div>T2</div><div>T3</div><div>T4</div><div>T5</div><div>T6</div><div>T7</div><div class="text-lotus-500">CN</div>
                </div>

                <!-- Calendar Grid Loop -->
                <div class="grid grid-cols-7 gap-y-2 gap-x-1 text-xs font-serif text-lotus-900 items-center">
                    @for($i = 0; $i < $leadEmpty; $i++)
                        <div></div>
                    @endfor
                    @for($d = 1; $d <= $cal['total_days']; $d++)
                        @php
                            $colIdx = ($leadEmpty + $d - 1) % 7;
                        @endphp
                        @if($d == $cal['active_day'])
                            <div class="relative flex items-center justify-center py-1">
                                <span class="pulse-heart absolute inset-0 m-auto w-8 h-8 rounded-full bg-lotus-500 text-white flex items-center justify-center shadow-md font-sans font-bold text-xs">
                                    {{ $d }}
                                </span>
                                <span class="relative z-10 text-white font-bold">{{ $d }}</span>
                                <span class="absolute -top-1.5 -right-0.5 text-[10px]">💗</span>
                            </div>
                        @else
                            <div class="py-1 {{ $colIdx == 6 ? 'text-lotus-500 font-bold' : '' }}">{{ $d }}</div>
                        @endif
                    @endfor
                    @php
                        $trailing = (7 - (($leadEmpty + $cal['total_days']) % 7)) % 7;
                    @endphp
                    @for($t = 0; $t < $trailing; $t++)
                        <div></div>
                    @endfor
                </div>

                <!-- Real-Time Countdown Timer -->
                <div class="mt-5 pt-4 border-t border-dashed border-lotus-200">
                    <p class="text-[11px] uppercase tracking-[0.2em] text-lotus-600 mb-2.5">Đếm Ngược Tới Giờ Lành</p>
                    <div class="grid grid-cols-4 gap-2">
                        <div class="bg-lotus-50 border border-lotus-200 rounded-xl py-2 px-1">
                            <span id="cd-days" class="font-serif text-2xl font-bold text-lotus-700 block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-lotus-800 mt-1 block">Ngày</span>
                        </div>
                        <div class="bg-lotus-50 border border-lotus-200 rounded-xl py-2 px-1">
                            <span id="cd-hours" class="font-serif text-2xl font-bold text-lotus-700 block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-lotus-800 mt-1 block">Giờ</span>
                        </div>
                        <div class="bg-lotus-50 border border-lotus-200 rounded-xl py-2 px-1">
                            <span id="cd-mins" class="font-serif text-2xl font-bold text-lotus-700 block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-lotus-800 mt-1 block">Phút</span>
                        </div>
                        <div class="bg-lotus-50 border border-lotus-200 rounded-xl py-2 px-1">
                            <span id="cd-secs" class="font-serif text-2xl font-bold text-lotus-500 block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-lotus-800 mt-1 block">Giây</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Flowing Blush Satin Ribbon Divider -->
            <div class="pt-2 -mx-6">
                <svg class="w-full h-11 silk-ribbon-wave" viewBox="0 0 480 48">
                    <use href="#silk-pink-ribbon" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             5. 3D FLIP PHOTO ALBUM (ALBUM ẢNH CƯỚI LẬT TRANG 3D - SO LE PHẢI)
             =================================================================== -->
        <section id="sec-album" class="relative py-6 px-6">
            <!-- Top Pink Lotus -->
            <div class="reveal-item mx-auto w-32 h-28 -mb-4 sway-flower">
                <svg viewBox="0 0 200 165" class="w-full h-full">
                    <use href="#pink-lotus-bouquet" />
                </svg>
            </div>

            <!-- Section Title Aligned Right (So Le Phải) -->
            <div class="reveal-right text-right mb-5 pl-8">
                <p class="text-[11px] uppercase tracking-[0.25em] text-lotus-500 font-medium">Khoảnh Khắc Ngọt Ngào</p>
                <h3 class="font-pattaya text-3xl text-lotus-500 mt-0.5">Album Ảnh Cưới 3D</h3>
                <p class="text-xs text-lotus-800 italic mt-1">Chạm vào trang ảnh hoặc nút mũi tên để lật từng trang kỷ niệm</p>
            </div>

            <!-- Interactive 3D Page-Flip Book Container -->
            <div class="reveal-scale book-stage relative mx-auto w-full max-w-[360px] h-[430px] select-none">
                <!-- Book Spine & Back Cover Base -->
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-[#D88FA0] to-[#B85A70] p-2.5 shadow-2xl border-2 border-lotus-200 flex items-center justify-center">
                    <!-- Left Book Spine Binding Rings -->
                    <div class="absolute left-2 top-8 bottom-8 w-3 flex flex-col justify-between z-40 pointer-events-none">
                        <span class="w-4 h-2 rounded-full bg-gradient-to-r from-amber-100 to-amber-400 shadow"></span>
                        <span class="w-4 h-2 rounded-full bg-gradient-to-r from-amber-100 to-amber-400 shadow"></span>
                        <span class="w-4 h-2 rounded-full bg-gradient-to-r from-amber-100 to-amber-400 shadow"></span>
                        <span class="w-4 h-2 rounded-full bg-gradient-to-r from-amber-100 to-amber-400 shadow"></span>
                        <span class="w-4 h-2 rounded-full bg-gradient-to-r from-amber-100 to-amber-400 shadow"></span>
                    </div>

                    <!-- Dynamic 3D Pages Container -->
                    <div id="album-pages-stack" class="relative w-full h-full rounded-xl bg-white overflow-hidden">
                        <!-- Pages injected by JS -->
                    </div>
                </div>
            </div>

            <!-- Album Flip Controls & Page Indicator -->
            <div class="reveal-item mt-4 flex items-center justify-between max-w-[360px] mx-auto px-2">
                <button onclick="prevAlbumPage()" class="bg-white hover:bg-lotus-50 active:scale-95 text-lotus-700 border border-lotus-300 rounded-full px-4 py-1.5 text-xs font-medium shadow-sm flex items-center gap-1.5 transition">
                    <span>←</span> Trang trước
                </button>
                <span id="album-page-indicator" class="font-serif text-sm font-semibold text-lotus-900">
                    Trang 1 / 6
                </span>
                <button onclick="nextAlbumPage()" class="bg-lotus-500 hover:bg-lotus-600 active:scale-95 text-white rounded-full px-4 py-1.5 text-xs font-medium shadow-sm flex items-center gap-1.5 transition">
                    Lật trang <span>→</span>
                </button>
            </div>

            <!-- Quick Thumbnail Strip -->
            <div id="album-thumbs" class="reveal-item mt-4 grid grid-cols-6 gap-1.5 max-w-[360px] mx-auto">
                <!-- Populated by JS -->
            </div>

            <!-- Flowing Blush Satin Ribbon Divider -->
            <div class="mt-8 -mx-6">
                <svg class="w-full h-11 silk-ribbon-wave" viewBox="0 0 480 48">
                    <use href="#silk-pink-ribbon" />
                </svg>
            </div>
        </section>

        @if($weddingCard->wedding_location && $weddingCard->wedding_location !== $weddingCard->address_groom && $weddingCard->wedding_location !== $weddingCard->address_bride)
        <!-- ===================================================================
             6. GOOGLE MAPS & DIRECTIONS (BẢN ĐỒ CHỈ ĐƯỜNG TRUNG TÂM TIỆC CƯỚI)
             =================================================================== -->
        <section id="sec-map" class="relative py-6 px-6">
            <div class="reveal-left text-left mb-4 pr-8">
                <p class="text-[11px] uppercase tracking-[0.25em] text-lotus-500 font-medium">Hành Trình Hạnh Phúc</p>
                <h3 class="font-pattaya text-3xl text-lotus-500 mt-0.5">Bản Đồ Chỉ Đường</h3>
            </div>

            <!-- Interactive Map Card -->
            <div class="reveal-scale bg-white border border-lotus-200 rounded-2xl overflow-hidden shadow-md">
                <!-- Stylized Interactive SVG Map Preview with Live Pin -->
                <div class="relative w-full h-52 bg-[#FDF6F8] overflow-hidden">
                    <!-- Roads & Parks Vector Map of Phú Nhuận / Hoàng Văn Thụ, TP.HCM -->
                    <svg class="w-full h-full object-cover" viewBox="0 0 420 220" preserveAspectRatio="xMidYMid slice">
                        <rect width="420" height="220" fill="#FCF3F6" />
                        <!-- Gia Định Park & Greenery -->
                        <circle cx="110" cy="60" r="48" fill="#E6EFE2" />
                        <circle cx="330" cy="165" r="42" fill="#E6EFE2" />
                        <!-- Major Roads (Hoàng Văn Thụ, Nguyễn Văn Trỗi, Phan Đình Phùng) -->
                        <path d="M0,135 Q180,105 420,65" stroke="#FFFFFF" stroke-width="12" fill="none" />
                        <path d="M0,135 Q180,105 420,65" stroke="#F0D8DF" stroke-width="8" fill="none" />
                        <path d="M135,0 Q200,110 265,220" stroke="#FFFFFF" stroke-width="10" fill="none" />
                        <path d="M135,0 Q200,110 265,220" stroke="#F0D8DF" stroke-width="6" fill="none" />
                        <path d="M60,220 L340,10" stroke="#FFFFFF" stroke-width="6" fill="none" />
                        <!-- Road Labels -->
                        <text x="52" y="118" fill="#964558" font-size="9" font-weight="600" transform="rotate(-9 52,118)">Đ. Hoàng Văn Thụ</text>
                        <text x="215" y="175" fill="#964558" font-size="9" font-weight="600" transform="rotate(56 215,175)">Đ. Nguyễn Văn Trỗi</text>
                        <text x="75" y="55" fill="#6F8A62" font-size="9" font-style="italic" font-weight="600">CV Gia Định</text>
                    </svg>

                    <!-- Pulsing Venue Pin Marker -->
                    <div class="absolute left-[46%] top-[46%] -translate-x-1/2 -translate-y-1/2 flex flex-col items-center">
                        <div class="bg-white/95 backdrop-blur px-2.5 py-1 rounded-full shadow-md border border-lotus-300 text-[10px] font-semibold text-lotus-900 whitespace-nowrap mb-1 flex items-center gap-1">
                            <span class="text-lotus-500">♥</span> {{ $weddingCard->wedding_location ?: 'White Palace Phú Nhuận' }}
                        </div>
                        <div class="relative flex items-center justify-center">
                            <span class="w-8 h-8 rounded-full bg-lotus-500/40 animate-ping absolute"></span>
                            <div class="w-7 h-7 rounded-full bg-lotus-500 text-white flex items-center justify-center shadow-lg border-2 border-white text-xs">
                                📍
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Venue Address & Action Buttons -->
                <div class="p-4 bg-white">
                    <div class="flex items-start justify-between gap-2">
                        <div>
                            <h4 class="font-serif text-lg font-bold text-lotus-900">{{ $weddingCard->wedding_location ?: 'Trung Tâm Hội Nghị White Palace' }}</h4>
                            <p class="text-xs text-lotus-800 mt-0.5">{{ $weddingCard->wedding_address ?: '194 Hoàng Văn Thụ, Phường 9, Quận Phú Nhuận, TP. Hồ Chí Minh' }}</p>
                        </div>
                        <span class="bg-lotus-100 text-lotus-700 text-[10px] font-semibold px-2.5 py-1 rounded-lg whitespace-nowrap">
                            Có bãi đỗ xe
                        </span>
                    </div>

                    <div class="mt-4 grid grid-cols-2 gap-2.5">
                        <a href="{{ $weddingCard->google_map_url ?: 'https://www.google.com/maps/search/?api=1&query=' . urlencode(($weddingCard->wedding_location ?: 'White Palace') . ' ' . ($weddingCard->wedding_address ?: 'Hồ Chí Minh')) }}" 
                           target="_blank" rel="noopener noreferrer"
                           class="bg-lotus-500 hover:bg-lotus-600 text-white text-xs font-medium py-2.5 px-3 rounded-xl text-center shadow-sm flex items-center justify-center gap-1.5 transition">
                            <span>🗺️</span> Mở Google Maps
                        </a>
                        <button onclick="copyVenueAddress()" class="bg-lotus-50 hover:bg-lotus-100 text-lotus-800 border border-lotus-200 text-xs font-medium py-2.5 px-3 rounded-xl text-center flex items-center justify-center gap-1.5 transition">
                            <span>📋</span> Sao chép địa chỉ
                        </button>
                    </div>
                </div>
            </div>

            <!-- Flowing Blush Satin Ribbon Divider -->
            <div class="mt-8 -mx-6">
                <svg class="w-full h-11 silk-ribbon-wave" viewBox="0 0 480 48">
                    <use href="#silk-pink-ribbon" />
                </svg>
            </div>
        </section>
        @endif

        <!-- ===================================================================
             7. DRESS CODE (SO LE PHẢI) & WEDDING TIMELINE (SO LE TRÁI + 3 HÌNH VẼ TAY)
             =================================================================== -->
        <section id="sec-timeline" class="relative py-6 px-6">
            <!-- Top Pink Lotus -->
            <div class="reveal-item mx-auto w-32 h-28 -mb-4 sway-flower">
                <svg viewBox="0 0 200 165" class="w-full h-full">
                    <use href="#pink-lotus-bouquet" />
                </svg>
            </div>

            <!-- DRESS CODE CARD (ALIGNED RIGHT - SO LE PHẢI VỚI 3 Ô MÀU TRÒN) -->
            <div class="reveal-right ml-6 mb-10 bg-lotus-50/75 border border-lotus-200 rounded-3xl p-5 text-right shadow-sm">
                <p class="text-[11px] uppercase tracking-[0.25em] text-lotus-500 font-medium">Gợi Ý Trang Phục</p>
                <h4 class="font-pattaya text-3xl text-lotus-500 mt-0.5">Dress Code</h4>
                <p class="text-xs text-lotus-800 mt-1">Sự đồng điệu sắc màu của Quý khách sẽ giúp những bức hình kỷ niệm thêm phần trọn vẹn</p>

                <div class="mt-4 flex items-center justify-end gap-5 flex-wrap">
                    @foreach($dressCodes as $dc)
                        @php
                            $cHex = is_array($dc) ? ($dc['hex'] ?? ($dc['color'] ?? '#F2C6D0')) : $dc;
                            $cLabel = is_array($dc) ? ($dc['name'] ?? ($dc['label'] ?? '')) : (is_string($dc) ? $dc : '');
                            $cDesc = is_array($dc) ? ($dc['desc'] ?? ($cLabel ? ($cLabel . ' (' . $cHex . ')') : $cHex)) : $cLabel;
                        @endphp
                        <button onclick="selectDressCode('{{ addslashes($cDesc) }}')" class="group flex flex-col items-center gap-1.5 focus:outline-none cursor-pointer">
                            <span class="w-12 h-12 rounded-full border-4 border-white shadow-md group-hover:scale-110 transition" style="background-color: {{ $cHex }}"></span>
                            @if(!empty($cLabel))
                            <span class="text-[11px] font-medium text-lotus-900">{{ $cLabel }}</span>
                            @endif
                        </button>
                    @endforeach
                </div>

                @php
                    $dressNote = $weddingCard->dresscode_note ?: $weddingCard->dress_code_note;
                @endphp
                <p id="dresscode-note" class="mt-3 text-xs italic text-lotus-800 bg-white/90 rounded-xl py-2 px-3 border border-lotus-100 text-center">
                    {{ $dressNote ?: '✨ Chạm vào từng ô màu để xem gợi ý phối đồ dự tiệc' }}
                </p>
            </div>

            <!-- WEDDING TIMELINE HEADER (ALIGNED LEFT - SO LE TRÁI) -->
            <div class="reveal-left text-left mb-6">
                <p class="text-[11px] uppercase tracking-[0.25em] text-lotus-500 font-medium">Cùng Nhau Ghi Dấu</p>
                <h3 class="font-pattaya text-3xl text-lotus-500 mt-0.5">Lịch Trình Ngày Cưới</h3>
                <p class="text-xs text-lotus-800 italic mt-0.5">Các nghi thức trọng đại với biểu tượng vẽ tay Tơ Duyên Hồng</p>
            </div>

            <!-- 3 TIMELINE ITEMS WITH EXACT HAND-DRAWN ILLUSTRATIONS -->
            <div class="relative pl-3 space-y-5 before:content-[''] before:absolute before:left-[38px] before:top-6 before:bottom-6 before:w-[1.5px] before:bg-gradient-to-b before:from-lotus-200 before:via-lotus-400 before:to-lotus-200">
                @php
                    $timelineIcons = ['#icon-rings-ribbon', '#icon-champagne-bows', '#icon-red-candles'];
                @endphp
                @foreach($timelineEvents as $tIdx => $tl)
                    @php
                        $tTime = is_array($tl) ? ($tl['time'] ?? '') : '';
                        $tTitle = is_array($tl) ? ($tl['title'] ?? '') : '';
                        $tDesc = is_array($tl) ? ($tl['desc'] ?? '') : '';
                        $iconHref = $timelineIcons[$tIdx % count($timelineIcons)];
                    @endphp
                    <div class="reveal-left relative flex items-center gap-3.5">
                        <div class="relative z-10 w-14 h-14 rounded-2xl bg-white border-2 border-lotus-300 shadow-md flex items-center justify-center shrink-0">
                            <svg class="w-12 h-12" viewBox="0 0 64 56">
                                <use href="{{ $iconHref }}" />
                            </svg>
                        </div>
                        <div class="flex-1 bg-white border border-lotus-200/90 rounded-2xl p-3.5 shadow-sm">
                            <span class="inline-block bg-lotus-100 text-lotus-700 font-serif font-bold text-xs px-2.5 py-0.5 rounded-full">{{ $tTime }}</span>
                            <h4 class="font-semibold text-sm text-lotus-900 mt-1">{{ $tTitle }}</h4>
                            @if(!empty($tDesc))
                            <p class="text-xs text-lotus-800 mt-0.5">{{ $tDesc }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Flowing Blush Satin Ribbon Divider -->
            <div class="mt-8 -mx-6">
                <svg class="w-full h-11 silk-ribbon-wave" viewBox="0 0 480 48">
                    <use href="#silk-pink-ribbon" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             8. RSVP FORM & GUESTBOOK (XÁC NHẬN THAM DỰ & SỔ LƯU BÚT)
             =================================================================== -->
        <section id="sec-rsvp" class="relative py-6 px-6 space-y-8">
            <!-- Top Pink Lotus -->
            <div class="reveal-item mx-auto w-32 h-28 -mb-4 sway-flower">
                <svg viewBox="0 0 200 165" class="w-full h-full">
                    <use href="#pink-lotus-bouquet" />
                </svg>
            </div>

            <!-- RSVP CARD -->
            <div class="reveal-item bg-white border border-lotus-200 rounded-3xl p-5 shadow-md">
                <div class="text-center mb-4">
                    <p class="text-[11px] uppercase tracking-[0.25em] text-lotus-500 font-medium">Thông Tin Phản Hồi</p>
                    <h3 class="font-pattaya text-3xl text-lotus-500 mt-0.5">Xác Nhận Tham Dự</h3>
                    <p class="text-xs text-lotus-800 mt-1">Hãy xác nhận để gia đình chuẩn bị đón tiếp Quý khách chu đáo nhất</p>
                </div>

                <form id="rsvp-form" onsubmit="submitRSVP(event)" class="space-y-3 text-xs">
                    <div>
                        <label class="block text-lotus-900 font-medium mb-1">Tên của Quý khách *</label>
                        <input id="rsvp-name" type="text" required placeholder="Nhập họ và tên của bạn..." 
                               class="w-full rounded-xl border border-lotus-300 bg-lotus-50/40 px-3.5 py-2.5 text-lotus-900 focus:outline-none focus:border-lotus-500">
                    </div>

                    <div class="grid grid-cols-2 gap-2.5">
                        <div>
                            <label class="block text-lotus-900 font-medium mb-1">Khách mời của</label>
                            <select id="rsvp-side" class="w-full rounded-xl border border-lotus-300 bg-lotus-50/40 px-3 py-2.5 text-lotus-900 focus:outline-none focus:border-lotus-500">
                                <option value="Nhà Trai">Khách Nhà Trai</option>
                                <option value="Nhà Gái">Khách Nhà Gái</option>
                                <option value="Chung hai nhà">Bạn chung hai nhà</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-lotus-900 font-medium mb-1">Số người đi cùng</label>
                            <select id="rsvp-count" class="w-full rounded-xl border border-lotus-300 bg-lotus-50/40 px-3 py-2.5 text-lotus-900 focus:outline-none focus:border-lotus-500">
                                <option value="1 người">Đi 1 mình</option>
                                <option value="2 người">Đi 2 người</option>
                                <option value="Gia đình (3-4 người)">Gia đình (3-4 người)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-lotus-900 font-medium mb-1">Trạng thái tham dự</label>
                        <div class="grid grid-cols-2 gap-2">
                            <label class="flex items-center justify-center gap-1.5 border border-lotus-300 rounded-xl py-2 px-2 cursor-pointer has-[:checked]:bg-lotus-500 has-[:checked]:text-white has-[:checked]:border-lotus-500 transition">
                                <input type="radio" name="attendance" value="Sẽ tham dự" checked class="hidden">
                                <span>💗 Chắc chắn tham dự</span>
                            </label>
                            <label class="flex items-center justify-center gap-1.5 border border-lotus-300 rounded-xl py-2 px-2 cursor-pointer has-[:checked]:bg-lotus-500 has-[:checked]:text-white has-[:checked]:border-lotus-500 transition">
                                <input type="radio" name="attendance" value="Xin phép vắng mặt" class="hidden">
                                <span>🕊️ Rất tiếc bận việc</span>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn-shimmer w-full bg-lotus-500 hover:bg-lotus-600 text-white font-medium py-3 rounded-xl shadow-md transition">
                        Gửi Xác Nhận Tham Dự
                    </button>
                </form>
            </div>

            <!-- GUESTBOOK / SỔ LƯU BÚT -->
            <div class="reveal-item bg-lotus-50/70 border border-lotus-200 rounded-3xl p-5 shadow-md">
                <div class="text-center mb-4">
                    <p class="text-[11px] uppercase tracking-[0.25em] text-lotus-500 font-medium">Gửi Trao Yêu Thương</p>
                    <h3 class="font-pattaya text-3xl text-lotus-500 mt-0.5">Sổ Lưu Bút</h3>
                </div>

                <!-- Quick Preset Wish Chips -->
                <div class="flex flex-wrap gap-1.5 mb-3">
                    <button type="button" onclick="fillPresetWish('Chúc {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }} trăm năm hạnh phúc, sớm sinh quý tử!')" class="text-[11px] bg-white hover:bg-lotus-100 border border-lotus-200 text-lotus-800 rounded-full px-2.5 py-1 transition">
                        ✨ Trăm năm hạnh phúc
                    </button>
                    <button type="button" onclick="fillPresetWish('Chúc hai bạn mãi luôn ngọt ngào, tơ duyên hồng bền chặt trọn đời!')" class="text-[11px] bg-white hover:bg-lotus-100 border border-lotus-200 text-lotus-800 rounded-full px-2.5 py-1 transition">
                        🌸 Tơ duyên bền chặt
                    </button>
                </div>

                <form onsubmit="submitWish(event)" class="space-y-2.5 text-xs mb-5">
                    <input id="wish-author" type="text" required placeholder="Tên của bạn..." 
                           class="w-full rounded-xl border border-lotus-300 bg-white px-3.5 py-2 text-lotus-900 focus:outline-none focus:border-lotus-500">
                    <textarea id="wish-message" rows="2" required placeholder="Viết lời chúc mừng gửi tới {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}..." 
                              class="w-full rounded-xl border border-lotus-300 bg-white px-3.5 py-2 text-lotus-900 focus:outline-none focus:border-lotus-500"></textarea>
                    <button type="submit" class="w-full bg-lotus-600 hover:bg-lotus-700 text-white font-medium py-2.5 rounded-xl shadow transition">
                        Gửi Lời Chúc Mừng 💌
                    </button>
                </form>

                <!-- Scrollable Wishes Feed -->
                <div id="wishes-list" class="wishes-scroll max-h-60 overflow-y-auto space-y-2.5 pr-1">
                    <!-- Populated by JS -->
                </div>
            </div>

            <!-- Flowing Blush Satin Ribbon Divider -->
            <div class="pt-2 -mx-6">
                <svg class="w-full h-11 silk-ribbon-wave" viewBox="0 0 480 48">
                    <use href="#silk-pink-ribbon" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             9. CREAM WEDDING GIFT BOX TIED WITH PINK SILK RIBBON (HỘP QUÀ MỪNG CƯỚI)
             =================================================================== -->
        <section id="sec-gift" class="relative pt-4 pb-24 px-6 text-center">
            <!-- Top Pink Lotus -->
            <div class="reveal-item mx-auto w-32 h-28 -mb-4 sway-flower">
                <svg viewBox="0 0 200 165" class="w-full h-full">
                    <use href="#pink-lotus-bouquet" />
                </svg>
            </div>

            <p class="reveal-item text-[11px] uppercase tracking-[0.25em] text-lotus-500 font-medium">Gửi Trao Tâm Ý</p>
            <h3 class="reveal-item font-pattaya text-3xl text-lotus-500 mt-0.5">Hộp Quà Mừng Cưới</h3>
            <p class="reveal-item text-xs text-lotus-800 max-w-[320px] mx-auto mt-1">
                Chạm vào hộp quà màu kem buộc dải lụa hồng bên dưới để gửi quà mừng cưới tới Cô Dâu &amp; Chú Rể
            </p>

            <!-- Interactive Cream Gift Box Tied with Pink Silk Ribbon & Lotus -->
            <div onclick="openGiftModal()" class="reveal-scale cursor-pointer group mx-auto mt-6 max-w-[280px] rounded-3xl bg-gradient-to-b from-[#FFFDF9] via-[#FAF3EB] to-[#F3E7DA] p-5 text-lotus-900 shadow-xl border-2 border-[#E8C5CE] hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden">
                
                <!-- Vertical & Horizontal Pink Silk Ribbon Straps on the Cream Gift Box -->
                <div class="pointer-events-none absolute inset-y-0 left-1/2 -translate-x-1/2 w-7 bg-gradient-to-r from-[#E5B8C2] via-[#C86D82] to-[#E5B8C2] opacity-25"></div>
                <div class="pointer-events-none absolute inset-x-0 top-1/2 -translate-y-1/2 h-7 bg-gradient-to-b from-[#E5B8C2] via-[#C86D82] to-[#E5B8C2] opacity-25"></div>

                <!-- Pink Silk Bow & Lotus Illustration on the Cream Gift Box -->
                <div class="relative z-10 mx-auto w-32 h-28 bg-white/95 rounded-2xl p-2 shadow-md border border-lotus-200 mb-3 flex items-center justify-center">
                    <svg viewBox="0 0 200 165" class="w-full h-full">
                        <use href="#pink-lotus-bouquet" />
                    </svg>
                </div>

                <span class="relative z-10 inline-block bg-lotus-500 text-white font-serif font-bold text-xs px-3.5 py-0.5 rounded-full shadow">
                    🎀 Hộp Quà Lụa Hồng 🎀
                </span>
                <h4 class="relative z-10 font-pattaya text-xl text-lotus-600 mt-2">{{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}</h4>
                <p class="relative z-10 text-[11px] text-lotus-800 mt-1 flex items-center justify-center gap-1 font-medium">
                    <span>Chạm để mở Phong Bao Hoa Sen</span>
                    <span>→</span>
                </p>
            </div>

            <!-- Thank You Footer -->
            <div class="reveal-item mt-12 pt-6 border-t border-lotus-200/80">
                <h4 class="font-vibes text-4xl text-lotus-500">Thank You!</h4>
                <p class="font-serif italic text-sm text-lotus-800 mt-1">
                    {{ $weddingCard->message_thanks ?: ('Sự hiện diện và lời chúc phúc của Quý khách là món quà quý giá nhất đối với ' . $weddingCard->groom_name . ' & ' . $weddingCard->bride_name . '.') }}
                </p>
                <p class="text-[10px] uppercase tracking-[0.25em] text-lotus-400 mt-4">
                    {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '20.02.2027' }} • {{ $weddingCard->template_name }}
                </p>
            </div>
        </section>

        <!-- ===================================================================
             FLOATING CONTROLS (NHẠC NỀN & NÚT MỪNG CƯỚI NHANH)
             =================================================================== -->
        <!-- Bottom-Left Floating Music Button -->
        <div class="fixed bottom-4 left-1/2 -translate-x-[220px] max-sm:left-4 max-sm:translate-x-0 z-40 flex items-center gap-2">
            <button id="music-toggle-btn" onclick="toggleWeddingMusic()" title="Bật/Tắt nhạc cưới"
                    class="w-11 h-11 rounded-full bg-lotus-500 text-white shadow-lg border-2 border-white flex items-center justify-center hover:bg-lotus-600 transition">
                <div id="music-icon-wrapper" class="flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2z"/>
                    </svg>
                </div>
            </button>
            <span id="music-status-badge" class="bg-white/90 backdrop-blur border border-lotus-200 text-lotus-800 text-[11px] px-2.5 py-1 rounded-full shadow-sm hidden sm:inline-block">
                Giai điệu Tơ Duyên
            </span>
        </div>

        <!-- Bottom-Right Quick Gift Floating Bar -->
        <div class="fixed bottom-4 right-1/2 translate-x-[220px] max-sm:right-4 max-sm:translate-x-0 z-40 flex items-center gap-2">
            <button onclick="openGiftModal()" class="bg-white/95 hover:bg-lotus-50 text-lotus-700 border border-lotus-300 rounded-full px-3.5 py-2 text-xs font-medium shadow-lg flex items-center gap-1.5 transition">
                <span>🎁</span> Mừng cưới
            </button>
        </div>
    </div>

    <!-- ===================================================================
         MODAL 1: LOTUS-PRINTED ENVELOPES & VIETQR (MỪNG CƯỚI ONLINE)
         =================================================================== -->
    <div id="gift-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-lotus-900/60 backdrop-blur-sm p-4">
        <div class="relative w-full max-w-[420px] rounded-3xl bg-[#FFFDFB] border-2 border-lotus-200 p-5 shadow-2xl max-h-[90vh] overflow-y-auto">
            <button onclick="closeGiftModal()" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-lotus-100 hover:bg-lotus-200 text-lotus-800 flex items-center justify-center text-sm font-bold">
                ✕
            </button>

            <div class="text-center">
                <div class="mx-auto w-24 h-20 -mb-1">
                    <svg viewBox="0 0 200 165" class="w-full h-full">
                        <use href="#pink-lotus-bouquet" />
                    </svg>
                </div>
                <h3 class="font-pattaya text-2xl text-lotus-500">Phong Bao Hoa Sen Mừng Cưới</h3>
                <p class="text-xs text-lotus-800 mt-0.5">Cảm ơn tình cảm yêu thương của Quý khách dành cho {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}</p>
            </div>

            <div class="mt-4 space-y-4">
                <!-- Groom Bank Card -->
                <div class="bg-lotus-50/85 border border-lotus-200 rounded-2xl p-4 flex items-center gap-3.5 relative overflow-hidden">
                    <svg viewBox="0 0 200 165" class="w-24 h-24 absolute -right-4 -bottom-4 opacity-15 pointer-events-none">
                        <use href="#pink-lotus-bouquet" />
                    </svg>
                    <div class="w-24 h-24 bg-white p-1.5 rounded-xl border border-lotus-200 shrink-0 flex flex-col items-center justify-center overflow-hidden">
                        <img src="{{ $groomQrUrl }}" alt="QR Chú Rể" class="w-full h-full object-contain" onerror="this.src='https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=vietcombank'">
                    </div>
                    <div class="flex-1 text-xs relative z-10">
                        <span class="inline-block bg-lotus-500 text-white text-[10px] px-2 py-0.5 rounded-full font-medium">Mừng Chú Rể</span>
                        <p class="font-bold text-lotus-900 text-sm mt-1">{{ $groomOwner }}</p>
                        <p class="text-lotus-800">Ngân hàng: <strong>{{ $groomBankName }}</strong></p>
                        <p class="text-lotus-900 font-mono font-semibold mt-0.5">STK: {{ $groomStk }}</p>
                        <button onclick="copyText('{{ $groomStk }}', 'Đã sao chép STK Chú rể {{ $weddingCard->groom_name }}!')" 
                                class="mt-2 bg-white hover:bg-lotus-100 text-lotus-800 border border-lotus-300 rounded-lg px-3 py-1 text-[11px] font-medium shadow-sm transition">
                            📋 Sao chép STK
                        </button>
                    </div>
                </div>

                <!-- Bride Bank Card -->
                <div class="bg-lotus-50/85 border border-lotus-200 rounded-2xl p-4 flex items-center gap-3.5 relative overflow-hidden">
                    <svg viewBox="0 0 200 165" class="w-24 h-24 absolute -right-4 -bottom-4 opacity-15 pointer-events-none">
                        <use href="#pink-lotus-bouquet" />
                    </svg>
                    <div class="w-24 h-24 bg-white p-1.5 rounded-xl border border-lotus-200 shrink-0 flex flex-col items-center justify-center overflow-hidden">
                        <img src="{{ $brideQrUrl }}" alt="QR Cô Dâu" class="w-full h-full object-contain" onerror="this.src='https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=techcombank'">
                    </div>
                    <div class="flex-1 text-xs relative z-10">
                        <span class="inline-block bg-lotus-500 text-white text-[10px] px-2 py-0.5 rounded-full font-medium">Mừng Cô Dâu</span>
                        <p class="font-bold text-lotus-900 text-sm mt-1">{{ $brideOwner }}</p>
                        <p class="text-lotus-800">Ngân hàng: <strong>{{ $brideBankName }}</strong></p>
                        <p class="text-lotus-900 font-mono font-semibold mt-0.5">STK: {{ $brideStk }}</p>
                        <button onclick="copyText('{{ $brideStk }}', 'Đã sao chép STK Cô dâu {{ $weddingCard->bride_name }}!')" 
                                class="mt-2 bg-white hover:bg-lotus-100 text-lotus-800 border border-lotus-300 rounded-lg px-3 py-1 text-[11px] font-medium shadow-sm transition">
                            📋 Sao chép STK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===================================================================
         MODAL 2: PHOTO LIGHTBOX ZOOM
         =================================================================== -->
    <div id="lightbox-modal" onclick="closeLightbox()" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/85 backdrop-blur-sm p-4">
        <div class="relative max-w-[430px] w-full bg-white p-2.5 rounded-2xl shadow-2xl" onclick="event.stopPropagation()">
            <button onclick="closeLightbox()" class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-lotus-500 text-white font-bold shadow-lg flex items-center justify-center">
                ✕
            </button>
            <img id="lightbox-img" src="" alt="Wedding Portrait" class="w-full max-h-[75vh] object-cover rounded-xl">
            <p id="lightbox-caption" class="text-center font-serif italic text-sm text-lotus-900 mt-2 py-1"></p>
        </div>
    </div>

    <!-- CUSTOM TOAST NOTIFICATION -->
    <div id="toast-box" class="fixed top-5 left-1/2 -translate-x-1/2 z-[60] pointer-events-none opacity-0 -translate-y-3 transition-all duration-300 bg-lotus-600 text-white text-xs font-medium px-4 py-2.5 rounded-full shadow-xl border border-lotus-200 flex items-center gap-2">
        <span>🌸</span>
        <span id="toast-text">Thông báo</span>
    </div>

    <!-- ===================================================================
         JAVASCRIPT LOGIC (ANIMATIONS, 3D ALBUM, MUSIC, COUNTDOWN, WISHES)
         =================================================================== -->
    <script>
        /* -----------------------------------------------------------
           1. ALBUM PHOTOS DATA & 3D FLIP BOOK RENDERER
        ----------------------------------------------------------- */
        const defaultAlbumPhotos = [
            {
                url: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=85',
                title: 'Nắm Tay Nhau Đi Khắp Thế Gian',
                subtitle: 'Trang 1 • Khởi đầu hành trình hạnh phúc'
            },
            {
                url: 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=85',
                title: 'Hương Sen Hồng Thắm Duyên Đôi Lứa',
                subtitle: 'Trang 2 • Vẻ đẹp dịu dàng ngày chung đôi'
            },
            {
                url: 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=85',
                title: 'Lời Hứa Trăm Năm Bên Nhau',
                subtitle: 'Trang 3 • Khoảnh khắc trao nhẫn ước hẹn'
            },
            {
                url: 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=800&q=85',
                title: 'Giai Điệu Tình Yêu Ngọt Ngào',
                subtitle: 'Trang 4 • Nụ cười rạng rỡ trong nắng xuân'
            },
            {
                url: 'https://images.unsplash.com/photo-1606800052052-a08af7148866?auto=format&fit=crop&w=800&q=85',
                title: 'Sợi Tơ Duyên Hồng Kết Nối',
                subtitle: 'Trang 5 • Chung một mái nhà yêu thương'
            },
            {
                url: 'https://images.unsplash.com/photo-1537633552985-df8429e8048b?auto=format&fit=crop&w=800&q=85',
                title: 'Hạnh Phúc Viên Mãn Trọn Đời',
                subtitle: 'Trang 6 • Hẹn gặp Quý khách ngày {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '20.02.2027' }}'
            }
        ];
        const dbPhotos = {!! $albumPhotosJson ?: '[]' !!};
        const albumPhotos = (Array.isArray(dbPhotos) && dbPhotos.length > 0) ? dbPhotos : defaultAlbumPhotos;

        let currentAlbumPage = 0;

        function renderAlbumBook() {
            const stack = document.getElementById('album-pages-stack');
            const thumbs = document.getElementById('album-thumbs');
            stack.innerHTML = '';
            thumbs.innerHTML = '';

            albumPhotos.forEach((photo, idx) => {
                // Create 3D Page Card (reverse z-index so page 0 is on top)
                const page = document.createElement('div');
                page.className = `book-page-card absolute inset-0 bg-white p-3 flex flex-col justify-between cursor-pointer ${idx < currentAlbumPage ? 'flipped' : ''}`;
                page.style.zIndex = albumPhotos.length - idx;
                page.onclick = () => nextAlbumPage();

                page.innerHTML = `
                    <div class="relative w-full h-[330px] rounded-lg overflow-hidden border border-lotus-200 bg-lotus-50">
                        <img src="${photo.url}" alt="${photo.title}" class="w-full h-full object-cover"
                             onerror="this.src='https://placehold.co/600x750/F9EBEF/5C4348?text=Anh+Cuoi+${idx + 1}'">
                        <button onclick="event.stopPropagation(); openLightbox(${idx})" 
                                class="absolute top-2.5 right-2.5 bg-white/85 hover:bg-white text-lotus-800 rounded-full w-8 h-8 flex items-center justify-center shadow text-xs"
                                title="Phóng to ảnh">
                            🔍
                        </button>
                        <div class="absolute bottom-2 left-2 bg-lotus-600/80 backdrop-blur-sm text-white text-[10px] px-2.5 py-0.5 rounded-full">
                            Chạm để lật trang ➔
                        </div>
                    </div>
                    <div class="pt-2 text-center">
                        <h4 class="font-pattaya text-lg text-lotus-500 leading-snug">${photo.title}</h4>
                        <p class="text-[11px] text-lotus-800 italic">${photo.subtitle}</p>
                    </div>
                `;
                stack.appendChild(page);

                // Create Thumbnail
                const thumb = document.createElement('button');
                thumb.className = `h-12 rounded-lg overflow-hidden border-2 transition ${idx === currentAlbumPage ? 'border-lotus-500 scale-105 shadow' : 'border-transparent opacity-65 hover:opacity-100'}`;
                thumb.onclick = () => goToAlbumPage(idx);
                thumb.innerHTML = `<img src="${photo.url}" alt="Thumb ${idx+1}" class="w-full h-full object-cover">`;
                thumbs.appendChild(thumb);
            });

            document.getElementById('album-page-indicator').textContent = `Trang ${currentAlbumPage + 1} / ${albumPhotos.length}`;
        }

        function nextAlbumPage() {
            if (currentAlbumPage < albumPhotos.length - 1) {
                currentAlbumPage++;
            } else {
                currentAlbumPage = 0; // Loop back to start
            }
            updateAlbumFlipState();
        }

        function prevAlbumPage() {
            if (currentAlbumPage > 0) {
                currentAlbumPage--;
            } else {
                currentAlbumPage = albumPhotos.length - 1;
            }
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
                if (idx === currentAlbumPage) {
                    t.className = 'h-12 rounded-lg overflow-hidden border-2 transition border-lotus-500 scale-105 shadow';
                } else {
                    t.className = 'h-12 rounded-lg overflow-hidden border-2 transition border-transparent opacity-65 hover:opacity-100';
                }
            });

            document.getElementById('album-page-indicator').textContent = `Trang ${currentAlbumPage + 1} / ${albumPhotos.length}`;
        }

        /* -----------------------------------------------------------
           2. 3D ENVELOPE OPENING & GENTLE WEDDING PIANO SYNTHESIZER
        ----------------------------------------------------------- */
        let isMusicPlaying = false;
        let musicLoop = null;
        let synth = null;

        async function startAmbientWeddingMusic() {
            try {
                await Tone.start();
                if (!synth) {
                    synth = new Tone.PolySynth(Tone.Synth, {
                        oscillator: { type: 'sine' },
                        envelope: { attack: 0.08, decay: 0.4, sustain: 0.3, release: 1.8 }
                    }).toDestination();
                    synth.volume.value = -12;

                    const melody = [
                        { time: '0:0', note: ['F4', 'A4', 'C5'], dur: '2n' },
                        { time: '0:2', note: ['C4', 'E4', 'G4'], dur: '2n' },
                        { time: '1:0', note: ['D4', 'F4', 'A4'], dur: '2n' },
                        { time: '1:2', note: ['A3', 'C4', 'E4'], dur: '2n' },
                        { time: '2:0', note: ['Bb3', 'D4', 'F4'], dur: '2n' },
                        { time: '2:2', note: ['F3', 'A3', 'C4'], dur: '2n' },
                        { time: '3:0', note: ['G3', 'Bb3', 'D4'], dur: '2n' },
                        { time: '3:2', note: ['C4', 'E4', 'G4'], dur: '2n' }
                    ];

                    musicLoop = new Tone.Part((time, val) => {
                        synth.triggerAttackRelease(val.note, val.dur, time);
                    }, melody);
                    musicLoop.loop = true;
                    musicLoop.loopEnd = '4m';
                }

                Tone.Transport.bpm.value = 74;
                Tone.Transport.start();
                musicLoop.start(0);
                isMusicPlaying = true;
                updateMusicUI();
            } catch (e) {
                console.warn('Audio autoplay prevented until interaction:', e);
            }
        }

        function toggleWeddingMusic() {
            if (!isMusicPlaying) {
                startAmbientWeddingMusic();
                showToast('🎵 Đang phát giai điệu Tơ Duyên Hồng');
            } else {
                Tone.Transport.pause();
                isMusicPlaying = false;
                updateMusicUI();
                showToast('🔇 Đã tạm dừng nhạc nền');
            }
        }

        function updateMusicUI() {
            const wrapper = document.getElementById('music-icon-wrapper');
            const badge = document.getElementById('music-status-badge');
            if (isMusicPlaying) {
                wrapper.classList.add('vinyl-spinning');
                badge.textContent = '🎵 Đang phát nhạc';
            } else {
                wrapper.classList.remove('vinyl-spinning');
                badge.textContent = 'Đã tắt nhạc';
            }
        }

        function openInvitation() {
            const stage = document.getElementById('envelope-3d-stage');
            const overlay = document.getElementById('envelope-overlay');

            stage.classList.add('envelope-opened');
            startAmbientWeddingMusic();

            setTimeout(() => {
                overlay.classList.add('hidden-overlay');
                triggerVisibleScrollReveals();
            }, 900);
        }

        function reopenEnvelope() {
            const stage = document.getElementById('envelope-3d-stage');
            const overlay = document.getElementById('envelope-overlay');
            stage.classList.remove('envelope-opened');
            overlay.classList.remove('hidden-overlay');
        }

        /* -----------------------------------------------------------
           3. LIVE COUNTDOWN
        ----------------------------------------------------------- */
        const weddingDateStr = '{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format("Y-m-d") : "2027-02-20" }}';
        const weddingTimeStr = '{{ !empty($weddingCard->wedding_time) && preg_match("/^\d{1,2}:\d{2}$/", trim($weddingCard->wedding_time)) ? trim($weddingCard->wedding_time) . ":00" : "09:00:00" }}';
        const weddingTimestamp = new Date(`${weddingDateStr}T${weddingTimeStr}+07:00`).getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const diff = Math.max(0, weddingTimestamp - now);

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const secs = Math.floor((diff % (1000 * 60)) / 1000);

            document.getElementById('cd-days').textContent = String(days).padStart(2, '0');
            document.getElementById('cd-hours').textContent = String(hours).padStart(2, '0');
            document.getElementById('cd-mins').textContent = String(mins).padStart(2, '0');
            document.getElementById('cd-secs').textContent = String(secs).padStart(2, '0');
        }

        /* -----------------------------------------------------------
           4. GUESTBOOK (SỔ LƯU BÚT) & RSVP HANDLERS
        ----------------------------------------------------------- */
        @php
            $cardWishes31 = $weddingCard->wishes()->approved()->latest()->take(10)->get()->map(function($w) {
                return [
                    'author' => $w->sender_name,
                    'time' => $w->created_at ? $w->created_at->diffForHumans() : 'Vừa xong',
                    'message' => $w->message,
                ];
            });
        @endphp
        const initialWishes = @json($cardWishes31);

        function renderWishes() {
            const container = document.getElementById('wishes-list');
            if (!initialWishes || initialWishes.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-4 text-xs text-lotus-800/70 italic">
                        Hãy là người đầu tiên gửi lời chúc mừng hạnh phúc đến cô dâu &amp; chú rể! 🌸
                    </div>
                `;
                return;
            }
            container.innerHTML = initialWishes.map(w => `
                <div class="bg-white border border-lotus-200/90 rounded-2xl p-3 text-left shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="font-semibold text-xs text-lotus-900">🌸 ${w.author}</span>
                        <span class="text-[10px] text-lotus-400">${w.time}</span>
                    </div>
                    <p class="text-xs text-lotus-800 mt-1 leading-relaxed">${w.message}</p>
                </div>
            `).join('');
        }

        function fillPresetWish(text) {
            document.getElementById('wish-message').value = text;
            showToast('✨ Đã điền gợi ý lời chúc!');
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
            authorInput.value = '';
            msgInput.value = '';
            showToast('💌 Cảm ơn lời chúc tốt đẹp của Quý khách!');
        }

        function submitRSVP(e) {
            e.preventDefault();
            const name = document.getElementById('rsvp-name').value.trim();
            const side = document.getElementById('rsvp-side').value;
            const count = document.getElementById('rsvp-count').value;
            showToast(`💗 Cảm ơn ${name} (${side} - ${count}) đã xác nhận!`);
            document.getElementById('rsvp-form').reset();
        }

        /* -----------------------------------------------------------
           5. DRESS CODE, CLIPBOARD, MODALS & LIGHTBOX
        ----------------------------------------------------------- */
        function selectDressCode(desc) {
            const note = document.getElementById('dresscode-note');
            note.textContent = '👗 ' + desc;
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
            copyText('Trung Tâm Hội Nghị White Palace - 194 Hoàng Văn Thụ, Phường 9, Quận Phú Nhuận, TP. Hồ Chí Minh', '📋 Đã sao chép địa chỉ nhà hàng!');
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
            }, 3000);
        }

        /* -----------------------------------------------------------
           6. SCROLL REVEAL (INTERSECTION OBSERVER) & FLOATING LOTUS PETALS
        ----------------------------------------------------------- */
        function triggerVisibleScrollReveals() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    }
                });
            }, { threshold: 0.14 });

            document.querySelectorAll('.reveal-item, .reveal-left, .reveal-right, .reveal-scale').forEach(el => {
                observer.observe(el);
            });
        }

        function initFloatingPetalsCanvas() {
            const canvas = document.getElementById('petals-canvas');
            const ctx = canvas.getContext('2d');
            let width = canvas.width = Math.min(window.innerWidth, 480);
            let height = canvas.height = window.innerHeight;

            window.addEventListener('resize', () => {
                width = canvas.width = Math.min(window.innerWidth, 480);
                height = canvas.height = window.innerHeight;
            });

            const petals = Array.from({ length: 15 }, () => ({
                x: Math.random() * width,
                y: Math.random() * height,
                r: 3.2 + Math.random() * 4.5,
                speedY: 0.35 + Math.random() * 0.55,
                speedX: -0.25 + Math.random() * 0.5,
                angle: Math.random() * Math.PI * 2,
                spin: (Math.random() - 0.5) * 0.015,
                isBlushPetal: Math.random() > 0.35
            }));

            function draw() {
                ctx.clearRect(0, 0, width, height);
                petals.forEach(p => {
                    p.y += p.speedY;
                    p.x += p.speedX + Math.sin(p.angle) * 0.28;
                    p.angle += p.spin;

                    if (p.y > height + 15) {
                        p.y = -15;
                        p.x = Math.random() * width;
                    }

                    ctx.save();
                    ctx.translate(p.x, p.y);
                    ctx.rotate(p.angle);
                    ctx.beginPath();
                    if (p.isBlushPetal) {
                        ctx.fillStyle = 'rgba(229, 184, 194, 0.42)';
                        ctx.ellipse(0, 0, p.r * 1.25, p.r * 0.75, 0, 0, Math.PI * 2);
                    } else {
                        ctx.fillStyle = 'rgba(200, 109, 130, 0.24)';
                        ctx.ellipse(0, 0, p.r, p.r * 0.65, 0, 0, Math.PI * 2);
                    }
                    ctx.fill();
                    ctx.restore();
                });
                requestAnimationFrame(draw);
            }
            draw();
        }

        /* -----------------------------------------------------------
           INITIALIZE ON WINDOW LOAD
        ----------------------------------------------------------- */
        window.onload = function () {
            // Check URL param ?khach=... for personalized guest name
            const params = new URLSearchParams(window.location.search);
            const guestParam = params.get('khach');
            if (guestParam) {
                document.getElementById('envelope-guest-name').textContent = guestParam;
            }

            renderAlbumBook();
            renderWishes();
            updateCountdown();
            setInterval(updateCountdown, 1000);
            triggerVisibleScrollReveals();
            initFloatingPetalsCanvas();
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