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
                        olive: {
                            50: '#F4F7F2',
                            100: '#E8EFE3',
                            200: '#DCE5D5',
                            300: '#C5D3BA',
                            400: '#9BB18B',
                            500: '#688056',
                            600: '#556B45',
                            700: '#425436',
                            800: '#2E3B25',
                            900: '#1F2819',
                        },
                        ivory: '#FAFBF9',
                        champagne: '#D8C8B0'
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
            --olive-primary: #556B45;
            --olive-light: #688056;
            --olive-dark: #2E3B25;
            --sage-pale: #DCE5D5;
            --sage-soft: #E8EFE3;
        }

        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: #E6ECE2;
            background-image: 
                radial-gradient(at 15% 15%, rgba(104, 128, 86, 0.12) 0px, transparent 50%),
                radial-gradient(at 85% 85%, rgba(85, 107, 69, 0.15) 0px, transparent 50%);
            font-family: 'Be Vietnam Pro', sans-serif;
            color: #2E3B25;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        /* Paper Texture Overlay */
        .paper-texture {
            background-color: #FFFFFF;
            background-image: radial-gradient(#556B45 0.45px, transparent 0.45px), radial-gradient(#688056 0.45px, #FFFFFF 0.45px);
            background-size: 28px 28px;
            background-position: 0 0, 14px 14px;
            background-blend-mode: soft-light;
        }

        /* Subtle Linen / Silk Card Surface */
        .silk-card {
            background: linear-gradient(180deg, #FFFFFF 0%, #FAFBF9 50%, #F5F8F3 100%);
            box-shadow: 0 20px 60px rgba(46, 59, 37, 0.14), 0 0 1px rgba(85, 107, 69, 0.3);
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
            transition: transform 1.2s cubic-bezier(0.22, 1, 0.36, 1) 0.45s, opacity 0.9s ease 0.4s;
        }

        .envelope-opened .envelope-letter-slide {
            transform: translateY(-75px) scale(1.03);
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
                rgba(255, 255, 255, 0.45) 50%,
                rgba(255, 255, 255, 0) 100%
            );
            transform: rotate(25deg);
            animation: shimmerSwipe 3.2s infinite;
        }
        @keyframes shimmerSwipe {
            0% { left: -60%; }
            55%, 100% { left: 130%; }
        }

        /* Tilted Hero Photo Frames */
        .photo-frame-groom {
            transform: rotate(-5.5deg);
            transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
            border: 5px solid #DCE5D5;
            box-shadow: 0 12px 28px -6px rgba(46, 59, 37, 0.22), inset 0 0 0 1px rgba(255,255,255,0.8);
        }
        .photo-frame-groom:hover {
            transform: rotate(-2deg) translateY(-6px) scale(1.03);
            z-index: 30;
        }

        .photo-frame-bride {
            transform: rotate(6deg);
            transition: all 0.5s cubic-bezier(0.22, 1, 0.36, 1);
            border: 5px solid #DCE5D5;
            box-shadow: 0 14px 32px -6px rgba(46, 59, 37, 0.25), inset 0 0 0 1px rgba(255,255,255,0.8);
        }
        .photo-frame-bride:hover {
            transform: rotate(2deg) translateY(-6px) scale(1.03);
            z-index: 30;
        }

        /* Scroll Reveal Animations */
        .reveal-item {
            opacity: 0;
            transform: translateY(32px);
            transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-left {
            opacity: 0;
            transform: translateX(-36px);
            transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-right {
            opacity: 0;
            transform: translateX(36px);
            transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-scale {
            opacity: 0;
            transform: scale(0.92);
            transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .revealed {
            opacity: 1 !important;
            transform: translate(0, 0) scale(1) !important;
        }

        /* Floating Calla Lily Sway Animation */
        @keyframes gentleSway {
            0%, 100% { transform: rotate(-1.8deg) translateY(0px); }
            50% { transform: rotate(1.8deg) translateY(-3px); }
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
            background: #F4F7F2;
            border-radius: 8px;
        }
        .wishes-scroll::-webkit-scrollbar-thumb {
            background: #9BB18B;
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
<body class="min-h-screen flex justify-center items-start selection:bg-olive-200 selection:text-olive-900">
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
        $dayNum = $wDate ? $wDate->format('d') : '19';
        $monthNum = $wDate ? $wDate->format('m') : '12';
        $yearNum = $wDate ? $wDate->format('Y') : '2026';
        $timeStr = !empty($weddingCard->wedding_time) ? trim($weddingCard->wedding_time) : '18:00';
        $timeStrShort = preg_match('/^\d{1,2}:\d{2}/', $timeStr, $m) ? $m[0] : '18:00';

        $timelineEvents = is_array($weddingCard->timeline) ? $weddingCard->timeline : (is_string($weddingCard->timeline) ? json_decode($weddingCard->timeline, true) : null);
        if (empty($timelineEvents)) {
            $timelineEvents = [
                ['time' => '08:30 Sáng', 'title' => 'Lễ Rước Dâu & Nghi Thức Gia Tiên', 'desc' => 'Trao tráp ăn hỏi, dâng hương tổ tiên và đón dâu về nhà chồng.'],
                ['time' => '17:30 Chiều', 'title' => 'Đón Khách & Chụp Ảnh Giao Lưu', 'desc' => 'Check-in tại sảnh hoa rum trắng và lưu giữ kỷ niệm cùng cô dâu chú rể.'],
                ['time' => '18:30 Tối', 'title' => 'Khai Tiệc & Nghi Thức Cắt Bánh', 'desc' => 'Rót rượu sampanh, cắt bánh cưới và nâng ly chúc mừng hạnh phúc.'],
                ['time' => '20:00 Tối', 'title' => 'Âm Nhạc, Tung Hoa & Khiêu Vũ', 'desc' => 'Trao bó hoa cưới may mắn và hòa mình vào giai điệu Acoustic.'],
            ];
        }

        $dressCodes = !empty($weddingCard->dresscode_colors_list) 
            ? $weddingCard->dresscode_colors_list 
            : (!empty($weddingCard->dresscode_colors) 
                ? (is_array($weddingCard->dresscode_colors) ? $weddingCard->dresscode_colors : (is_string($weddingCard->dresscode_colors) ? json_decode($weddingCard->dresscode_colors, true) : null))
                : null);

        if (empty($dressCodes)) {
            $dressCodes = [
                ['hex' => '#556B45', 'name' => 'Xanh Olive', 'desc' => 'Xanh Rêu Olive (#556B45) — Thanh lịch, nhẹ nhàng và hài hòa cùng không gian hoa rum trắng.'],
                ['hex' => '#F7F6F0', 'name' => 'Trắng Kem', 'desc' => 'Trắng Kem Ivory (#F7F6F0) — Tinh khôi, trang nhã và sang trọng.'],
                ['hex' => '#D8C8B0', 'name' => 'Be Champagne', 'desc' => 'Be Champagne (#D8C8B0) — Ấm áp, nhã nhặn và tôn dáng.'],
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
        $groomStk = $weddingCard->groom_bank_account ?: ($weddingCard->groom_bank_number ?: '998819122026');
        $brideStk = $weddingCard->bride_bank_account ?: ($weddingCard->bride_bank_number ?: '190388992026');
        $groomBankName = $weddingCard->groom_bank_name ?: 'Vietcombank';
        $brideBankName = $weddingCard->bride_bank_name ?: 'Techcombank';
        $groomOwner = $weddingCard->groom_bank_owner ?: $weddingCard->groom_name;
        $brideOwner = $weddingCard->bride_bank_owner ?: $weddingCard->bride_name;

        $groomQrUrl = $weddingCard->groom_qr_url;
        $brideQrUrl = $weddingCard->bride_qr_url;

        $groomAvatarSrc = !empty($weddingCard->groom_avatar) ? (str_starts_with($weddingCard->groom_avatar, 'http') ? $weddingCard->groom_avatar : asset('storage/' . $weddingCard->groom_avatar)) : 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=600&q=85';
        $brideAvatarSrc = !empty($weddingCard->bride_avatar) ? (str_starts_with($weddingCard->bride_avatar, 'http') ? $weddingCard->bride_avatar : asset('storage/' . $weddingCard->bride_avatar)) : 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=600&q=85';
    @endphp

    <!-- REUSABLE SVG DEFINITIONS (Calla Lily, Silk Ribbon, Ornaments) -->
    <svg width="0" height="0" class="hidden" aria-hidden="true">
        <defs>
            <!-- Gradients for Silk Ribbon & Calla Lily -->
            <linearGradient id="silkRibbonGrad" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="#DCE5D5" stop-opacity="0.3" />
                <stop offset="20%" stop-color="#688056" stop-opacity="0.85" />
                <stop offset="50%" stop-color="#556B45" stop-opacity="1" />
                <stop offset="80%" stop-color="#688056" stop-opacity="0.85" />
                <stop offset="100%" stop-color="#DCE5D5" stop-opacity="0.3" />
            </linearGradient>

            <linearGradient id="silkRibbonHighlight" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="#FFFFFF" stop-opacity="0" />
                <stop offset="50%" stop-color="#E8EFE3" stop-opacity="0.9" />
                <stop offset="100%" stop-color="#FFFFFF" stop-opacity="0" />
            </linearGradient>

            <linearGradient id="lilyPetalGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#FFFFFF" />
                <stop offset="65%" stop-color="#F7FAF4" />
                <stop offset="100%" stop-color="#DCE5D5" />
            </linearGradient>

            <linearGradient id="lilyInnerGrad" x1="50%" y1="0%" x2="50%" y2="100%">
                <stop offset="0%" stop-color="#FBFDF9" />
                <stop offset="60%" stop-color="#E8EFE3" />
                <stop offset="100%" stop-color="#9BB18B" />
            </linearGradient>

            <linearGradient id="spadixGold" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#F6E27A" />
                <stop offset="50%" stop-color="#E5B94E" />
                <stop offset="100%" stop-color="#C6922C" />
            </linearGradient>

            <linearGradient id="stemOlive" x1="0%" y1="0%" x2="0%" y2="100%">
                <stop offset="0%" stop-color="#688056" />
                <stop offset="60%" stop-color="#556B45" />
                <stop offset="100%" stop-color="#DCE5D5" stop-opacity="0.2" />
            </linearGradient>

            <!-- Hand-Crafted Blooming White Calla Lily (Hoa Rum Trắng) Symbol -->
            <g id="calla-lily-bouquet">
                <!-- Delicate Olive Leaves Behind -->
                <path d="M90 120 C65 98, 45 70, 52 40 C68 55, 84 82, 94 115 Z" fill="#688056" opacity="0.75" />
                <path d="M110 120 C138 95, 158 68, 150 36 C132 52, 118 82, 106 115 Z" fill="#556B45" opacity="0.8" />
                <path d="M95 125 C55 112, 32 95, 25 75 C48 80, 72 96, 96 118 Z" fill="#9BB18B" opacity="0.65" />
                <path d="M105 125 C145 112, 168 95, 175 75 C152 80, 128 96, 104 118 Z" fill="#9BB18B" opacity="0.65" />

                <!-- Graceful Stems -->
                <path d="M98 155 Q95 115 86 78" stroke="url(#stemOlive)" stroke-width="3.5" stroke-linecap="round" fill="none" />
                <path d="M102 155 Q106 115 116 82" stroke="url(#stemOlive)" stroke-width="3" stroke-linecap="round" fill="none" />
                <path d="M100 158 L100 72" stroke="url(#stemOlive)" stroke-width="4" stroke-linecap="round" fill="none" />

                <!-- Left Smaller Calla Lily -->
                <g transform="translate(52, 28) rotate(-22) scale(0.68)">
                    <path d="M35 75 C15 55, 8 28, 28 10 C42 -2, 58 8, 62 25 C66 42, 52 65, 35 75 Z" fill="url(#lilyPetalGrad)" stroke="#C5D3BA" stroke-width="1.2" />
                    <path d="M35 75 C26 58, 24 35, 38 22 C48 32, 46 55, 35 75 Z" fill="url(#lilyInnerGrad)" opacity="0.85" />
                    <!-- Golden Spadix -->
                    <path d="M36 52 L39 22" stroke="url(#spadixGold)" stroke-width="4.5" stroke-linecap="round" />
                    <path d="M35 75 C42 62, 55 48, 56 32 C46 42, 38 58, 35 75 Z" fill="#FFFFFF" stroke="#DCE5D5" stroke-width="1" />
                </g>

                <!-- Right Smaller Calla Lily -->
                <g transform="translate(108, 18) rotate(20) scale(0.68)">
                    <path d="M35 75 C15 55, 8 28, 28 10 C42 -2, 58 8, 62 25 C66 42, 52 65, 35 75 Z" fill="url(#lilyPetalGrad)" stroke="#C5D3BA" stroke-width="1.2" />
                    <path d="M35 75 C26 58, 24 35, 38 22 C48 32, 46 55, 35 75 Z" fill="url(#lilyInnerGrad)" opacity="0.85" />
                    <!-- Golden Spadix -->
                    <path d="M36 52 L34 22" stroke="url(#spadixGold)" stroke-width="4.5" stroke-linecap="round" />
                    <path d="M35 75 C24 62, 16 48, 18 32 C28 42, 33 58, 35 75 Z" fill="#FFFFFF" stroke="#DCE5D5" stroke-width="1" />
                </g>

                <!-- Center Main Blooming Calla Lily -->
                <g transform="translate(65, 4) scale(0.95)">
                    <!-- Outer Trumpet Petal -->
                    <path d="M36 88 C10 64, 2 32, 24 10 C36 -2, 50 4, 58 16 C70 34, 60 66, 36 88 Z" fill="url(#lilyPetalGrad)" stroke="#B8C8AA" stroke-width="1.3" />
                    <!-- Inner Shaded Throat -->
                    <path d="M36 86 C24 64, 20 36, 36 20 C52 36, 48 64, 36 86 Z" fill="url(#lilyInnerGrad)" />
                    <!-- Central Golden Spadix (Nhụy Vàng) -->
                    <path d="M36 62 L36 24" stroke="url(#spadixGold)" stroke-width="5.5" stroke-linecap="round" />
                    <!-- Front Wrapping Petal Lip -->
                    <path d="M36 88 C22 72, 14 52, 16 36 C26 48, 34 65, 36 88 Z" fill="#FFFFFF" stroke="#DCE5D5" stroke-width="1" />
                    <path d="M36 88 C50 72, 58 52, 54 38 C44 50, 38 66, 36 88 Z" fill="#FAFBF9" stroke="#C5D3BA" stroke-width="1" />
                </g>

                <!-- Silk Bow Ribbon tying the stems -->
                <path d="M84 122 C70 114, 66 130, 86 128 C94 127, 106 127, 114 128 C134 130, 130 114, 116 122 C106 126, 94 126, 84 122 Z" fill="#556B45" />
                <path d="M95 126 C88 138, 78 148, 72 154" stroke="#556B45" stroke-width="2.5" stroke-linecap="round" fill="none" />
                <path d="M105 126 C112 138, 122 148, 128 154" stroke="#688056" stroke-width="2.5" stroke-linecap="round" fill="none" />
                <circle cx="100" cy="125" r="4" fill="#DCE5D5" stroke="#556B45" stroke-width="1.5" />
            </g>

            <!-- Flowing Silk Green Ribbon Divider (Dải Lụa Xanh Rêu) -->
            <g id="silk-green-ribbon">
                <!-- Soft Drop Shadow -->
                <path d="M 0,28 C 90,6 170,48 260,24 C 340,4 410,42 480,20" fill="none" stroke="#DCE5D5" stroke-width="8" stroke-linecap="round" opacity="0.45" transform="translate(0, 4)" />
                <!-- Main Flowing Silk Ribbon -->
                <path d="M -10,26 C 85,2 165,50 255,24 C 345,-2 415,44 490,18 L 490,27 C 415,52 345,10 255,33 C 165,58 85,12 -10,34 Z" fill="url(#silkRibbonGrad)" />
                <!-- Secondary Delicate Twining Silk Thread -->
                <path d="M 10,20 C 110,46 190,4 285,32 C 365,54 430,12 475,28" fill="none" stroke="#9BB18B" stroke-width="1.4" stroke-dasharray="4 3" opacity="0.85" />
                <!-- Highlight Sheen -->
                <path d="M 20,28 C 95,8 170,49 255,26 C 340,4 405,43 465,22" fill="none" stroke="url(#silkRibbonHighlight)" stroke-width="1.6" />
                <!-- Tiny Leaf Buds on the Ribbon -->
                <circle cx="255" cy="28" r="3" fill="#556B45" />
                <circle cx="247" cy="26" r="2" fill="#9BB18B" />
                <circle cx="263" cy="30" r="2" fill="#9BB18B" />
            </g>
        </defs>
    </svg>

    <!-- MAIN MOBILE-FIRST INVITATION CONTAINER (max-w-[480px] centered like Chung Đôi) -->
    <div id="app-container" class="relative w-full max-w-[480px] min-h-screen silk-card paper-texture overflow-hidden mx-auto border-x border-olive-200/80">

        <!-- CONTINUOUS SILK THREAD LINES (SỢI TƠ DUYÊN) RUNNING ALONG LEFT & RIGHT EDGES -->
        <svg class="pointer-events-none absolute inset-y-0 left-0 w-7 h-full z-10 opacity-70" preserveAspectRatio="none" viewBox="0 0 28 2000">
            <path d="M14,0 C26,180 4,360 16,540 C28,720 4,900 15,1080 C26,1260 6,1440 16,1620 C26,1800 8,1920 14,2000" fill="none" stroke="#B8C8AA" stroke-width="1.1" />
            <path d="M9,0 C2,200 22,400 10,600 C-2,800 20,1000 10,1200 C2,1400 22,1600 11,1800 C4,1920 16,1980 10,2000" fill="none" stroke="#DCE5D5" stroke-width="0.9" class="silk-thread-line" />
        </svg>
        <svg class="pointer-events-none absolute inset-y-0 right-0 w-7 h-full z-10 opacity-70" preserveAspectRatio="none" viewBox="0 0 28 2000">
            <path d="M14,0 C2,180 24,360 12,540 C0,720 24,900 13,1080 C2,1260 22,1440 12,1620 C2,1800 20,1920 14,2000" fill="none" stroke="#B8C8AA" stroke-width="1.1" />
            <path d="M19,0 C26,200 6,400 18,600 C30,800 8,1000 18,1200 C26,1400 6,1600 17,1800 C24,1920 12,1980 18,2000" fill="none" stroke="#DCE5D5" stroke-width="0.9" class="silk-thread-line" />
        </svg>

        <!-- FLOATING PETALS CANVAS -->
        <canvas id="petals-canvas" class="pointer-events-none fixed inset-0 z-30 mx-auto max-w-[480px]"></canvas>

        <!-- TOP RIGHT "XEM LẠI PHONG BÌ" & GUEST CUSTOMIZER BAR -->
        <div class="sticky top-3 z-40 flex justify-between items-center px-4 pointer-events-none">
            <div class="pointer-events-auto bg-white/85 backdrop-blur-md border border-olive-200 rounded-full px-3 py-1 text-[11px] text-olive-700 shadow-sm flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-olive-600 animate-pulse"></span>
                <span class="font-medium tracking-wide">Tơ Duyên - Xanh</span>
            </div>
            <button id="reopen-envelope-btn" onclick="reopenEnvelope()" class="pointer-events-auto bg-white/90 hover:bg-olive-50 backdrop-blur-md border border-olive-300 text-olive-800 rounded-full px-3 py-1 text-[11px] font-medium shadow-sm transition flex items-center gap-1">
                <span>✉</span> Xem lại phong bì
            </button>
        </div>

        <!-- ===================================================================
             1. 3D ENVELOPE OPENING OVERLAY (MÀN HÌNH PHONG BÌ MỞ THIỆP)
             =================================================================== -->
        <div id="envelope-overlay" class="envelope-overlay-wrapper fixed inset-0 z-50 flex items-center justify-center bg-olive-900/55 backdrop-blur-sm p-3">
            <div class="relative w-full max-w-[450px] min-h-[92vh] max-h-[860px] rounded-[28px] bg-gradient-to-b from-[#F7FAF4] via-[#FFFFFF] to-[#EFF4EC] border-2 border-olive-200 shadow-2xl flex flex-col justify-between items-center p-5 overflow-hidden">
                
                <!-- Decorative Top Corner Calla Lily Florals -->
                <div class="w-full flex justify-between items-start pointer-events-none select-none">
                    <svg class="w-28 h-28 -ml-2 -mt-2 sway-flower" viewBox="0 0 200 165">
                        <use href="#calla-lily-bouquet" />
                    </svg>
                    <div class="text-center mt-2">
                        <p class="text-[10px] uppercase tracking-[0.28em] text-olive-600 font-medium">Thiệp Báo Hỷ</p>
                        <p class="font-serif italic text-xs text-olive-500 mt-0.5">Tơ Duyên Trăm Năm</p>
                    </div>
                    <svg class="w-28 h-28 -mr-2 -mt-2 sway-flower" style="transform: scaleX(-1);" viewBox="0 0 200 165">
                        <use href="#calla-lily-bouquet" />
                    </svg>
                </div>

                <!-- Center 3D Envelope & Invitation Card Preview -->
                <div id="envelope-3d-stage" class="envelope-perspective relative w-full max-w-[360px] my-auto py-2">
                    
                    <!-- Inner White & Sage Card rising out -->
                    <div class="envelope-letter-slide relative z-20 mx-auto w-[92%] rounded-2xl bg-white border border-olive-200 shadow-lg px-5 py-6 text-center">
                        <!-- Mini Calla Lily Emblem -->
                        <div class="mx-auto w-16 h-14 mb-1">
                            <svg viewBox="0 0 200 165" class="w-full h-full">
                                <use href="#calla-lily-bouquet" />
                            </svg>
                        </div>

                        <p class="text-[11px] uppercase tracking-[0.25em] text-olive-600 font-medium mb-2">Save The Date</p>
                        
                        <!-- Couple Names -->
                        <h1 class="font-pattaya text-3xl sm:text-[34px] text-olive-800 leading-tight">
                            {{ $weddingCard->groom_name }}
                        </h1>
                        <div class="my-1 flex items-center justify-center gap-3 text-olive-500">
                            <span class="h-[1px] w-10 bg-olive-300"></span>
                            <span class="font-vibes text-2xl text-olive-600">&amp;</span>
                            <span class="h-[1px] w-10 bg-olive-300"></span>
                        </div>
                        <h1 class="font-pattaya text-3xl sm:text-[34px] text-olive-800 leading-tight">
                            {{ $weddingCard->bride_name }}
                        </h1>

                        <!-- Divider ── ❦ ── -->
                        <div class="my-3 flex items-center justify-center gap-2 text-olive-500 text-sm">
                            <span class="w-12 h-[1px] bg-gradient-to-r from-transparent to-olive-400"></span>
                            <span class="text-olive-600 text-base">❦</span>
                            <span class="w-12 h-[1px] bg-gradient-to-l from-transparent to-olive-400"></span>
                        </div>

                        <!-- Wedding Date -->
                        <p class="font-serif text-xl font-semibold tracking-wider text-olive-800">
                            {{ $dayNum }} tháng {{ $monthNum }}, {{ $yearNum }}
                        </p>
                        @if(!empty($weddingCard->lunar_date))
                        <p class="text-[11px] text-olive-500 italic mt-0.5">
                            ({{ $weddingCard->lunar_date }})
                        </p>
                        @endif

                        <!-- Guest Invitation Box -->
                        <div class="mt-4 pt-3 border-t border-dashed border-olive-200">
                            <p class="text-[11px] uppercase tracking-[0.18em] text-olive-500">Thân Mời</p>
                            <p id="envelope-guest-name" class="font-serif text-lg font-semibold text-olive-800 mt-0.5">
                                Quý Khách &amp; Gia Đình
                            </p>
                        </div>
                    </div>

                    <!-- Envelope Pocket Front & Top Flap -->
                    <div class="relative -mt-14 z-30 mx-auto w-full h-40 rounded-b-2xl bg-gradient-to-b from-[#688056] to-[#556B45] shadow-xl overflow-hidden border border-olive-600 flex flex-col justify-end items-center pb-5">
                        <!-- Diagonal Envelope Pocket Folds -->
                        <svg class="absolute inset-0 w-full h-full pointer-events-none" preserveAspectRatio="none" viewBox="0 0 400 180">
                            <polygon points="0,0 200,110 0,180" fill="#5D744C" opacity="0.65" />
                            <polygon points="400,0 200,110 400,180" fill="#4D623F" opacity="0.65" />
                            <polygon points="0,180 200,88 400,180" fill="#556B45" stroke="#DCE5D5" stroke-width="0.8" stroke-opacity="0.4" />
                        </svg>

                        <!-- Wax Seal Emblem -->
                        <div class="relative z-20 -mt-8 mb-2 w-12 h-12 rounded-full bg-gradient-to-br from-[#F5E394] via-[#D8AD48] to-[#9E741E] p-0.5 shadow-lg flex items-center justify-center border border-white/60">
                            <div class="w-full h-full rounded-full border border-amber-900/30 flex items-center justify-center text-white font-serif text-sm font-bold tracking-tighter">
                                N♥T
                            </div>
                        </div>

                        <!-- Interactive "Mở thiệp" Button -->
                        <button id="open-invitation-btn" onclick="openInvitation()" class="btn-shimmer relative z-20 bg-white text-olive-800 hover:bg-olive-50 active:scale-95 transition-all duration-300 font-medium text-sm px-7 py-2.5 rounded-full shadow-lg border border-olive-200 flex items-center gap-2 cursor-pointer">
                            <span>Mở thiệp</span>
                            <svg class="w-4 h-4 text-olive-600 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Bottom Silk Ribbon & Note -->
                <div class="w-full text-center">
                    <svg class="w-full h-8 mx-auto silk-ribbon-wave" viewBox="0 0 480 48">
                        <use href="#silk-green-ribbon" />
                    </svg>
                    <p class="text-[11px] text-olive-600/80 italic">
                        Chạm vào "Mở thiệp" để lắng nghe giai điệu tình yêu
                    </p>
                </div>
            </div>
        </div>

        <!-- ===================================================================
             2. HERO SECTION (MỞ ĐẦU THIỆP - HAI KHUNG ẢNH NGHIÊNG & HOA RUM)
             =================================================================== -->
        <section id="sec-hero" class="relative pt-4 pb-10 px-6 text-center overflow-hidden">
            
            <!-- Top Blooming Calla Lily Illustration -->
            <div class="reveal-item mx-auto w-44 h-36 -mb-2 sway-flower">
                <svg viewBox="0 0 200 165" class="w-full h-full drop-shadow-sm">
                    <use href="#calla-lily-bouquet" />
                </svg>
            </div>

            <p class="reveal-item text-[11px] uppercase tracking-[0.32em] text-olive-600 font-medium mb-7">
                Tơ Duyên Kết Nối • Trăm Năm Hạnh Phúc
            </p>

            <!-- TWO TILTED PHOTO FRAMES (HAI KHUNG ẢNH NGHIÊNG ĐẶC TRƯNG) -->
            <div class="reveal-scale relative mx-auto max-w-[340px] h-[255px] flex items-center justify-center my-2">
                <!-- Decorative soft sage circle halo behind photos -->
                <div class="absolute w-56 h-56 rounded-full bg-olive-100/70 blur-xl -z-10"></div>

                <!-- Left Tilted Frame: Groom ({{ $weddingCard->groom_name }}) -->
                <div onclick="openLightbox(0)" class="photo-frame-groom cursor-pointer relative w-[158px] h-[215px] bg-white rounded-xl p-1.5 -mr-4 z-10">
                    <div class="w-full h-full rounded-lg overflow-hidden relative bg-olive-100">
                        <img src="{{ $groomAvatarSrc }}" 
                             alt="Chú rể {{ $weddingCard->groom_name }}" 
                             class="w-full h-full object-cover object-center transition duration-700 hover:scale-110"
                             onerror="this.src='https://placehold.co/400x550/DCE5D5/2E3B25?text=Chú+Rể'">
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/55 via-black/15 to-transparent p-2 text-left">
                            <span class="text-[10px] text-white/90 tracking-wider uppercase block">Chú Rể</span>
                            <span class="font-pattaya text-white text-sm">{{ $weddingCard->groom_name }}</span>
                        </div>
                    </div>
                </div>

                <!-- Right Tilted Frame: Bride ({{ $weddingCard->bride_name }}) -->
                <div onclick="openLightbox(1)" class="photo-frame-bride cursor-pointer relative w-[158px] h-[215px] bg-white rounded-xl p-1.5 -ml-3 mt-6 z-20">
                    <div class="w-full h-full rounded-lg overflow-hidden relative bg-olive-100">
                        <img src="{{ $brideAvatarSrc }}" 
                             alt="Cô dâu {{ $weddingCard->bride_name }}" 
                             class="w-full h-full object-cover object-center transition duration-700 hover:scale-110"
                             onerror="this.src='https://placehold.co/400x550/E8EFE3/2E3B25?text=Cô+Dâu'">
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/55 via-black/15 to-transparent p-2 text-right">
                            <span class="text-[10px] text-white/90 tracking-wider uppercase block">Cô Dâu</span>
                            <span class="font-pattaya text-white text-sm">{{ $weddingCard->bride_name }}</span>
                        </div>
                    </div>
                </div>

                <!-- Small Floating Calla Lily Badge at Photo Intersection -->
                <div class="absolute -bottom-2 z-30 bg-white/95 border border-olive-200 rounded-full px-3 py-1 shadow-md flex items-center gap-1.5">
                    <span class="text-olive-600 text-xs">❦</span>
                    <span class="font-serif italic text-xs font-semibold text-olive-800">{{ $wDate ? $wDate->format('d . m . Y') : '19 . 12 . 2026' }}</span>
                    <span class="text-olive-600 text-xs">❦</span>
                </div>
            </div>

            <!-- COUPLE NAMES WITH OVERSIZED PALE GREEN "&" WATERMARK -->
            <div class="reveal-item relative mt-10 mb-4 py-4">
                <!-- Giant "&" Watermark Behind -->
                <span class="pointer-events-none select-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 font-serif italic text-[138px] leading-none text-olive-200/55 -z-0">
                    &amp;
                </span>

                <div class="relative z-10 space-y-1">
                    <h2 class="font-pattaya text-[40px] sm:text-[44px] text-olive-800 drop-shadow-sm leading-tight">
                        {{ $weddingCard->groom_name }}
                    </h2>
                    <p class="font-vibes text-2xl text-olive-600">cùng</p>
                    <h2 class="font-pattaya text-[40px] sm:text-[44px] text-olive-800 drop-shadow-sm leading-tight">
                        {{ $weddingCard->bride_name }}
                    </h2>
                </div>
            </div>

            <!-- Poetic Subtitle -->
            <p class="reveal-item font-serif italic text-base text-olive-700 max-w-[330px] mx-auto leading-relaxed">
                "Se sợi tơ duyên màu nắng mới,<br>
                Trăm năm hạnh phúc vẹn câu thề."
            </p>

            <!-- Flowing Silk Green Ribbon Divider -->
            <div class="mt-6 -mx-6">
                <svg class="w-full h-11 silk-ribbon-wave" viewBox="0 0 480 48">
                    <use href="#silk-green-ribbon" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             3. FAMILY INFORMATION & FORMAL ANNOUNCEMENT (THÔNG TIN HAI GIA ĐÌNH)
             =================================================================== -->
        <section id="sec-family" class="relative py-8 px-6 text-center">
            <!-- Small Calla Lily Header Ornament -->
            <div class="reveal-item mx-auto w-28 h-24 -mb-2 sway-flower">
                <svg viewBox="0 0 200 165" class="w-full h-full">
                    <use href="#calla-lily-bouquet" />
                </svg>
            </div>

            <!-- Two-Column Family Info (NHÀ TRAI | NHÀ GÁI) -->
            <div class="reveal-item grid grid-cols-2 gap-3 bg-olive-50/70 border border-olive-200/90 rounded-2xl p-4 shadow-sm relative">
                <!-- Center Vertical Divider -->
                <div class="absolute inset-y-4 left-1/2 w-[1px] bg-gradient-to-b from-transparent via-olive-300 to-transparent"></div>

                <!-- Nhà Trai -->
                <div class="pr-2 text-center">
                    <span class="inline-block bg-olive-600 text-white text-[10px] uppercase tracking-[0.2em] px-2.5 py-0.5 rounded-full font-medium mb-2">
                        Nhà Trai
                    </span>
                    <p class="text-xs text-olive-700 font-medium leading-relaxed">
                        Ông: <strong class="text-olive-900">{{ $weddingCard->groom_father_name ?: ($weddingCard->groom_father ?: 'Nguyễn Văn Hòa') }}</strong>
                    </p>
                    <p class="text-xs text-olive-700 font-medium leading-relaxed mt-0.5">
                        Bà: <strong class="text-olive-900">{{ $weddingCard->groom_mother_name ?: ($weddingCard->groom_mother ?: 'Trần Thị Mai') }}</strong>
                    </p>
                    <p class="text-[11px] text-olive-600/90 mt-1.5 leading-snug">
                        📍 {{ $weddingCard->address_groom ?: ($weddingCard->groom_address ?: 'Quận Ba Đình, TP. Hà Nội') }}
                    </p>
                </div>

                <!-- Nhà Gái -->
                <div class="pl-2 text-center">
                    <span class="inline-block bg-olive-600 text-white text-[10px] uppercase tracking-[0.2em] px-2.5 py-0.5 rounded-full font-medium mb-2">
                        Nhà Gái
                    </span>
                    <p class="text-xs text-olive-700 font-medium leading-relaxed">
                        Ông: <strong class="text-olive-900">{{ $weddingCard->bride_father_name ?: ($weddingCard->bride_father ?: 'Lê Minh Đức') }}</strong>
                    </p>
                    <p class="text-xs text-olive-700 font-medium leading-relaxed mt-0.5">
                        Bà: <strong class="text-olive-900">{{ $weddingCard->bride_mother_name ?: ($weddingCard->bride_mother ?: 'Phạm Thị Lan') }}</strong>
                    </p>
                    <p class="text-[11px] text-olive-600/90 mt-1.5 leading-snug">
                        📍 {{ $weddingCard->address_bride ?: ($weddingCard->bride_address ?: 'Quận Cầu Giấy, TP. Hà Nội') }}
                    </p>
                </div>
            </div>

            <!-- Formal Announcement Copy -->
            <div class="reveal-item mt-7 space-y-2">
                <p class="text-xs uppercase tracking-[0.22em] text-olive-600 font-medium">
                    Trân Trọng Báo Tin
                </p>
                <p class="font-serif italic text-base text-olive-700">
                    Lễ Thành Hôn của hai con chúng tôi
                </p>

                <div class="py-3">
                    <h3 class="font-pattaya text-3xl text-olive-800">
                        {{ $weddingCard->groom_name }}
                    </h3>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-olive-500 mt-0.5">{{ $weddingCard->groom_rank ?: 'Trưởng Nam' }}</p>

                    <div class="my-2 flex items-center justify-center gap-3">
                        <span class="w-10 h-[1px] bg-olive-300"></span>
                        <span class="font-vibes text-2xl text-olive-600">&amp;</span>
                        <span class="w-10 h-[1px] bg-olive-300"></span>
                    </div>

                    <h3 class="font-pattaya text-3xl text-olive-800">
                        {{ $weddingCard->bride_name }}
                    </h3>
                    <p class="text-[11px] uppercase tracking-[0.25em] text-olive-500 mt-0.5">Ái Nữ</p>
                </div>
            </div>

            <!-- Flowing Silk Green Ribbon Divider -->
            <div class="mt-4 -mx-6">
                <svg class="w-full h-11 silk-ribbon-wave" viewBox="0 0 480 48">
                    <use href="#silk-green-ribbon" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             4. STAGGERED LEFT-RIGHT CEREMONY & RECEPTION + MINI CALENDAR
             =================================================================== -->
        <section id="sec-events" class="relative py-6 px-6 space-y-8">
            
            <!-- Top Calla Lily -->
            <div class="reveal-item mx-auto w-28 h-24 -mb-6 sway-flower">
                <svg viewBox="0 0 200 165" class="w-full h-full">
                    <use href="#calla-lily-bouquet" />
                </svg>
            </div>

            <!-- BLOCK A: TIỆC CƯỚI NHÀ TRAI (ALIGNED LEFT - BỐ CỤC SO LE TRÁI) -->
            <div class="reveal-left mr-6 bg-gradient-to-br from-white via-olive-50/50 to-olive-100/60 border-l-4 border-olive-600 rounded-r-2xl rounded-tl-xl p-5 shadow-md relative overflow-hidden">
                <div class="flex items-center gap-2 text-olive-600 text-[11px] uppercase tracking-[0.22em] font-semibold">
                    <span>🕊️</span>
                    <span>Tiệc Cưới Nhà Trai</span>
                </div>
                <h3 class="font-pattaya text-2xl text-olive-800 mt-1">
                    Hôn Trường Nhà Trai
                </h3>

                <!-- Big Editorial Date & Time Block -->
                <div class="my-3 flex items-baseline gap-2 font-serif text-olive-800">
                    <span class="text-3xl font-bold tracking-tight text-olive-700">{{ $weddingCard->time_groom ?: ($timeStrShort ?: '18:00') }}</span>
                    <span class="text-xl text-olive-400">•</span>
                    <span class="text-base font-semibold">{{ $weddingCard->groom_eating_date ? \Carbon\Carbon::parse($weddingCard->groom_eating_date)->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : ($wDate ? $wDate->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : 'Thứ Bảy, ngày 19/12/2026') }}</span>
                </div>

                <div class="space-y-1 text-xs text-olive-700 border-t border-olive-200/80 pt-2.5">
                    @if(!empty($weddingCard->time_groom_al) || !empty($weddingCard->wedding_date_lunar))
                    <p class="italic text-olive-600">
                        (Tức ngày {{ $weddingCard->time_groom_al ?: $weddingCard->wedding_date_lunar }})
                    </p>
                    @endif
                    <p class="pt-1 leading-relaxed">
                        📍 <strong>Tại:</strong> {{ $weddingCard->address_groom ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Trai') }}
                    </p>
                </div>

                <div class="mt-4 flex flex-wrap gap-2 pt-2">
                    <a href="{{ $weddingCard->groom_map ?: ($weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode($weddingCard->address_groom ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Trai')))) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-olive-600 text-white text-xs font-medium shadow-sm hover:bg-olive-700 transition">
                        <span>🗺️</span> Chỉ đường
                    </a>
                    @if(!empty($weddingCard->groom_phone))
                    <a href="tel:{{ $weddingCard->groom_phone }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white border border-olive-300 text-olive-800 text-xs font-medium shadow-sm hover:bg-olive-50 transition">
                        <span>📞</span> Gọi Chú Rể: {{ $weddingCard->groom_phone }}
                    </a>
                    @endif
                </div>
            </div>

            <!-- BLOCK B: TIỆC CƯỚI NHÀ GÁI (ALIGNED RIGHT - BỐ CỤC SO LE PHẢI) -->
            <div class="reveal-right ml-6 bg-gradient-to-bl from-white via-olive-50/50 to-olive-100/60 border-r-4 border-olive-600 rounded-l-2xl rounded-tr-xl p-5 shadow-md text-right relative overflow-hidden">
                <div class="flex items-center justify-end gap-2 text-olive-600 text-[11px] uppercase tracking-[0.22em] font-semibold">
                    <span>Tiệc Cưới Nhà Gái</span>
                    <span>🥂</span>
                </div>
                <h3 class="font-pattaya text-2xl text-olive-800 mt-1">
                    Hôn Trường Nhà Gái
                </h3>

                <!-- Big Editorial Time & Date Block -->
                <div class="my-3 flex items-baseline justify-end gap-2 font-serif text-olive-800">
                    <span class="text-3xl font-bold text-olive-700">{{ $weddingCard->time_bride ?: ($timeStrShort ?: '11:00') }}</span>
                    <span class="text-lg text-olive-400">|</span>
                    <span class="text-base font-semibold">{{ $weddingCard->bride_eating_date ? \Carbon\Carbon::parse($weddingCard->bride_eating_date)->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : ($wDate ? $wDate->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : 'Thứ Bảy, ngày 19/12/2026') }}</span>
                </div>

                <div class="space-y-1 text-xs text-olive-700 border-t border-olive-200/80 pt-2.5">
                    @if(!empty($weddingCard->time_bride_al) || !empty($weddingCard->wedding_date_lunar))
                    <p class="italic text-olive-600">
                        (Tức ngày {{ $weddingCard->time_bride_al ?: $weddingCard->wedding_date_lunar }})
                    </p>
                    @endif
                    <p class="leading-relaxed">
                        📍 <strong>Tại:</strong> {{ $weddingCard->address_bride ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Gái') }}
                    </p>
                </div>

                <div class="mt-4 flex flex-wrap justify-end gap-2 pt-2">
                    <a href="{{ $weddingCard->bride_map ?: ($weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode($weddingCard->address_bride ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Gái')))) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-olive-600 text-white text-xs font-medium shadow-sm hover:bg-olive-700 transition">
                        <span>🗺️</span> Chỉ đường
                    </a>
                    @if(!empty($weddingCard->bride_phone))
                    <a href="tel:{{ $weddingCard->bride_phone }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white border border-olive-300 text-olive-800 text-xs font-medium shadow-sm hover:bg-olive-50 transition">
                        <span>📞</span> Gọi Cô Dâu: {{ $weddingCard->bride_phone }}
                    </a>
                    @endif
                </div>
            </div>

            <!-- MINI ROUNDED CALENDAR FOR DECEMBER 2026 & LIVE COUNTDOWN -->
            <div class="reveal-scale bg-white border-2 border-olive-200 rounded-3xl p-5 shadow-md text-center">
                <p class="text-[11px] uppercase tracking-[0.25em] text-olive-500 font-medium">Lịch Ngày Chung Đôi</p>
                <h4 class="font-pattaya text-2xl text-olive-800 mt-0.5 mb-3">
                    Tháng {{ $cal['month'] }} / {{ $cal['year'] }}
                </h4>

                <!-- Days of Week Header -->
                <div class="grid grid-cols-7 gap-1 text-[11px] font-semibold text-olive-600 border-b border-olive-100 pb-2 mb-2">
                    <div>T2</div><div>T3</div><div>T4</div><div>T5</div><div>T6</div><div>T7</div><div class="text-rose-600">CN</div>
                </div>

                <!-- Calendar Grid Loop -->
                <div class="grid grid-cols-7 gap-y-2 gap-x-1 text-xs font-serif text-olive-800 items-center">
                    @for($i = 0; $i < $leadEmpty; $i++)
                        <div></div>
                    @endfor
                    @for($d = 1; $d <= $cal['total_days']; $d++)
                        @php
                            $colIdx = ($leadEmpty + $d - 1) % 7;
                        @endphp
                        @if($d == $cal['active_day'])
                            <div class="relative flex items-center justify-center py-1">
                                <span class="pulse-heart absolute inset-0 m-auto w-8 h-8 rounded-full bg-olive-600 text-white flex items-center justify-center shadow-md font-sans font-bold text-xs">
                                    {{ $d }}
                                </span>
                                <span class="relative z-10 text-white font-bold">{{ $d }}</span>
                                <span class="absolute -top-1.5 -right-0.5 text-[10px]">💚</span>
                            </div>
                        @else
                            <div class="py-1 {{ $colIdx == 6 ? 'text-rose-600' : '' }}">{{ $d }}</div>
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
                <div class="mt-5 pt-4 border-t border-dashed border-olive-200">
                    <p class="text-[11px] uppercase tracking-[0.2em] text-olive-600 mb-2.5">Đếm Ngược Tới Giờ Lành</p>
                    <div class="grid grid-cols-4 gap-2">
                        <div class="bg-olive-50 border border-olive-200 rounded-xl py-2 px-1">
                            <span id="cd-days" class="font-serif text-2xl font-bold text-olive-800 block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-olive-600 mt-1 block">Ngày</span>
                        </div>
                        <div class="bg-olive-50 border border-olive-200 rounded-xl py-2 px-1">
                            <span id="cd-hours" class="font-serif text-2xl font-bold text-olive-800 block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-olive-600 mt-1 block">Giờ</span>
                        </div>
                        <div class="bg-olive-50 border border-olive-200 rounded-xl py-2 px-1">
                            <span id="cd-mins" class="font-serif text-2xl font-bold text-olive-800 block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-olive-600 mt-1 block">Phút</span>
                        </div>
                        <div class="bg-olive-50 border border-olive-200 rounded-xl py-2 px-1">
                            <span id="cd-secs" class="font-serif text-2xl font-bold text-olive-600 block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-olive-600 mt-1 block">Giây</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Flowing Silk Green Ribbon Divider -->
            <div class="pt-2 -mx-6">
                <svg class="w-full h-11 silk-ribbon-wave" viewBox="0 0 480 48">
                    <use href="#silk-green-ribbon" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             5. 3D FLIP PHOTO ALBUM (ALBUM ẢNH CƯỚI LẬT TRANG 3D - SO LE PHẢI)
             =================================================================== -->
        <section id="sec-album" class="relative py-6 px-6">
            <!-- Top Calla Lily -->
            <div class="reveal-item mx-auto w-28 h-24 -mb-4 sway-flower">
                <svg viewBox="0 0 200 165" class="w-full h-full">
                    <use href="#calla-lily-bouquet" />
                </svg>
            </div>

            <!-- Section Title Aligned Right (So Le Phải) -->
            <div class="reveal-right text-right mb-5 pl-8">
                <p class="text-[11px] uppercase tracking-[0.25em] text-olive-600 font-medium">Khoảnh Khắc Ngọt Ngào</p>
                <h3 class="font-pattaya text-3xl text-olive-800 mt-0.5">Album Ảnh Cưới 3D</h3>
                <p class="text-xs text-olive-600 italic mt-1">Chạm vào trang ảnh hoặc nút mũi tên để lật từng trang kỷ niệm</p>
            </div>

            <!-- Interactive 3D Page-Flip Book Container -->
            <div class="reveal-scale book-stage relative mx-auto w-full max-w-[360px] h-[430px] select-none">
                <!-- Book Spine & Back Cover Base -->
                <div class="absolute inset-0 rounded-2xl bg-olive-800 p-2.5 shadow-2xl border-2 border-olive-300 flex items-center justify-center">
                    <!-- Left Book Spine Binding Rings -->
                    <div class="absolute left-2 top-8 bottom-8 w-3 flex flex-col justify-between z-40 pointer-events-none">
                        <span class="w-4 h-2 rounded-full bg-gradient-to-r from-amber-200 to-amber-500 shadow"></span>
                        <span class="w-4 h-2 rounded-full bg-gradient-to-r from-amber-200 to-amber-500 shadow"></span>
                        <span class="w-4 h-2 rounded-full bg-gradient-to-r from-amber-200 to-amber-500 shadow"></span>
                        <span class="w-4 h-2 rounded-full bg-gradient-to-r from-amber-200 to-amber-500 shadow"></span>
                        <span class="w-4 h-2 rounded-full bg-gradient-to-r from-amber-200 to-amber-500 shadow"></span>
                    </div>

                    <!-- Dynamic 3D Pages Container -->
                    <div id="album-pages-stack" class="relative w-full h-full rounded-xl bg-ivory overflow-hidden">
                        <!-- Pages injected by JS -->
                    </div>
                </div>
            </div>

            <!-- Album Flip Controls & Page Indicator -->
            <div class="reveal-item mt-4 flex items-center justify-between max-w-[360px] mx-auto px-2">
                <button onclick="prevAlbumPage()" class="bg-white hover:bg-olive-50 active:scale-95 text-olive-800 border border-olive-300 rounded-full px-4 py-1.5 text-xs font-medium shadow-sm flex items-center gap-1.5 transition">
                    <span>←</span> Trang trước
                </button>
                <span id="album-page-indicator" class="font-serif text-sm font-semibold text-olive-800">
                    Trang 1 / 6
                </span>
                <button onclick="nextAlbumPage()" class="bg-olive-600 hover:bg-olive-700 active:scale-95 text-white rounded-full px-4 py-1.5 text-xs font-medium shadow-sm flex items-center gap-1.5 transition">
                    Lật trang <span>→</span>
                </button>
            </div>

            <!-- Quick Thumbnail Strip -->
            <div id="album-thumbs" class="reveal-item mt-4 grid grid-cols-6 gap-1.5 max-w-[360px] mx-auto">
                <!-- Populated by JS -->
            </div>

            <!-- Flowing Silk Green Ribbon Divider -->
            <div class="mt-8 -mx-6">
                <svg class="w-full h-11 silk-ribbon-wave" viewBox="0 0 480 48">
                    <use href="#silk-green-ribbon" />
                </svg>
            </div>
        </section>

        @if($weddingCard->wedding_location && $weddingCard->wedding_location !== $weddingCard->address_groom && $weddingCard->wedding_location !== $weddingCard->address_bride)
        <!-- ===================================================================
             6. GOOGLE MAPS & DIRECTIONS (BẢN ĐỒ CHỈ ĐƯỜNG TRUNG TÂM TIỆC CƯỚI)
             =================================================================== -->
        <section id="sec-map" class="relative py-6 px-6">
            <div class="reveal-left text-left mb-4 pr-8">
                <p class="text-[11px] uppercase tracking-[0.25em] text-olive-600 font-medium">Hành Trình Hạnh Phúc</p>
                <h3 class="font-pattaya text-3xl text-olive-800 mt-0.5">Bản Đồ Chỉ Đường</h3>
            </div>

            <!-- Interactive Map Card -->
            <div class="reveal-scale bg-white border-2 border-olive-200 rounded-2xl overflow-hidden shadow-md">
                <!-- Stylized Interactive SVG Map Preview with Live Pin -->
                <div class="relative w-full h-52 bg-[#E9F0E6] overflow-hidden">
                    <!-- Roads & River Vector Map of West Lake (Tây Hồ, Hà Nội) -->
                    <svg class="w-full h-full object-cover" viewBox="0 0 420 220" preserveAspectRatio="xMidYMid slice">
                        <rect width="420" height="220" fill="#EDF3EA" />
                        <!-- West Lake Water Body -->
                        <path d="M180,60 C240,40 340,55 390,110 C420,145 380,210 290,205 C210,200 140,145 155,95 C162,72 170,65 180,60 Z" fill="#CBE3E8" opacity="0.85" />
                        <!-- Park & Greenery -->
                        <circle cx="90" cy="70" r="45" fill="#DCE8D5" />
                        <circle cx="320" cy="40" r="30" fill="#DCE8D5" />
                        <!-- Major Roads (Lạc Long Quân, Âu Cơ, Võ Chí Công) -->
                        <path d="M20,210 Q110,120 190,10" stroke="#FFFFFF" stroke-width="10" fill="none" />
                        <path d="M20,210 Q110,120 190,10" stroke="#D2DEC9" stroke-width="7" fill="none" />
                        <path d="M0,115 Q160,105 420,45" stroke="#FFFFFF" stroke-width="8" fill="none" />
                        <path d="M85,0 L125,220" stroke="#FFFFFF" stroke-width="6" fill="none" />
                        <!-- Road Labels -->
                        <text x="55" y="102" fill="#556B45" font-size="9" font-weight="600" transform="rotate(-8 55,102)">Đ. Lạc Long Quân</text>
                        <text x="245" y="135" fill="#4A7C88" font-size="11" font-style="italic" font-weight="600">Hồ Tây (West Lake)</text>
                    </svg>

                    <!-- Pulsing Venue Pin Marker -->
                    <div class="absolute left-[42%] top-[44%] -translate-x-1/2 -translate-y-1/2 flex flex-col items-center">
                        <div class="bg-white/95 backdrop-blur px-2.5 py-1 rounded-full shadow-md border border-olive-300 text-[10px] font-semibold text-olive-800 whitespace-nowrap mb-1 flex items-center gap-1">
                            <span class="text-rose-500">♥</span> {{ $weddingCard->wedding_location ?: 'Forevermark Tây Hồ' }}
                        </div>
                        <div class="relative flex items-center justify-center">
                            <span class="w-8 h-8 rounded-full bg-olive-600/40 animate-ping absolute"></span>
                            <div class="w-7 h-7 rounded-full bg-olive-600 text-white flex items-center justify-center shadow-lg border-2 border-white text-xs">
                                📍
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Venue Address & Action Buttons -->
                <div class="p-4 bg-white">
                    <div class="flex items-start justify-between gap-2">
                        <div>
                            <h4 class="font-serif text-lg font-bold text-olive-900">{{ $weddingCard->wedding_location ?: 'Trung Tâm Tiệc Cưới Forevermark' }}</h4>
                            <p class="text-xs text-olive-600 mt-0.5">{{ $weddingCard->wedding_address ?: '614 Lạc Long Quân, Phường Nhật Tân, Quận Tây Hồ, Hà Nội' }}</p>
                        </div>
                        <span class="bg-olive-100 text-olive-800 text-[10px] font-semibold px-2.5 py-1 rounded-lg whitespace-nowrap">
                            Có bãi đỗ xe
                        </span>
                    </div>

                    <div class="mt-4 grid grid-cols-2 gap-2.5">
                        <a href="{{ $weddingCard->google_map_url ?: 'https://www.google.com/maps/search/?api=1&query=' . urlencode(($weddingCard->wedding_location ?: 'Tiệc Cưới') . ' ' . ($weddingCard->wedding_address ?: 'Hà Nội')) }}" 
                           target="_blank" rel="noopener noreferrer"
                           class="bg-olive-600 hover:bg-olive-700 text-white text-xs font-medium py-2.5 px-3 rounded-xl text-center shadow-sm flex items-center justify-center gap-1.5 transition">
                            <span>🗺️</span> Mở Google Maps
                        </a>
                        <button onclick="copyVenueAddress()" class="bg-olive-50 hover:bg-olive-100 text-olive-800 border border-olive-200 text-xs font-medium py-2.5 px-3 rounded-xl text-center flex items-center justify-center gap-1.5 transition">
                            <span>📋</span> Sao chép địa chỉ
                        </button>
                    </div>
                </div>
            </div>

            <!-- Flowing Silk Green Ribbon Divider -->
            <div class="mt-8 -mx-6">
                <svg class="w-full h-11 silk-ribbon-wave" viewBox="0 0 480 48">
                    <use href="#silk-green-ribbon" />
                </svg>
            </div>
        </section>
        @endif

        <!-- ===================================================================
             7. WEDDING TIMELINE & DRESS CODE (LỊCH TRÌNH & DRESS CODE)
             =================================================================== -->
        <section id="sec-timeline" class="relative py-6 px-6">
            <!-- Top Calla Lily -->
            <div class="reveal-item mx-auto w-28 h-24 -mb-4 sway-flower">
                <svg viewBox="0 0 200 165" class="w-full h-full">
                    <use href="#calla-lily-bouquet" />
                </svg>
            </div>

            <!-- Aligned Left Header -->
            <div class="reveal-left text-left mb-6">
                <p class="text-[11px] uppercase tracking-[0.25em] text-olive-600 font-medium">Cùng Nhau Ghi Dấu</p>
                <h3 class="font-pattaya text-3xl text-olive-800 mt-0.5">Lịch Trình Ngày Cưới</h3>
            </div>

            <!-- Timeline Items with Illustrated Olive Badges -->
            <div class="relative pl-4 space-y-5 before:content-[''] before:absolute before:left-[31px] before:top-4 before:bottom-4 before:w-[1.5px] before:bg-gradient-to-b before:from-olive-300 before:via-olive-500 before:to-olive-200">
                @php
                    $timelineIcons = [
                        '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><circle cx="9" cy="12" r="5"/><circle cx="15" cy="12" r="5"/></svg>',
                        '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><circle cx="12" cy="13" r="3"/></svg>',
                        '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v3m0 0a3 3 0 00-3 3v2h6v-2a3 3 0 00-3-3zM5 12h14a1 1 0 011 1v6H4v-6a1 1 0 011-1z"/></svg>',
                        '<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2z"/></svg>'
                    ];
                @endphp
                @foreach($timelineEvents as $tIdx => $tl)
                    @php
                        $tTime = is_array($tl) ? ($tl['time'] ?? '') : '';
                        $tTitle = is_array($tl) ? ($tl['title'] ?? '') : '';
                        $tDesc = is_array($tl) ? ($tl['desc'] ?? '') : '';
                        $iconSvg = $timelineIcons[$tIdx % count($timelineIcons)];
                    @endphp
                    <div class="reveal-left relative flex items-center gap-4">
                        <div class="relative z-10 w-10 h-10 rounded-full bg-white border-2 border-olive-500 shadow-sm flex items-center justify-center shrink-0 text-olive-700">
                            {!! $iconSvg !!}
                        </div>
                        <div class="flex-1 bg-white border border-olive-200/90 rounded-2xl p-3.5 shadow-sm">
                            <span class="inline-block bg-olive-100 text-olive-800 font-serif font-bold text-xs px-2.5 py-0.5 rounded-full">{{ $tTime }}</span>
                            <h4 class="font-semibold text-sm text-olive-900 mt-1">{{ $tTitle }}</h4>
                            @if(!empty($tDesc))
                            <p class="text-xs text-olive-600 mt-0.5">{{ $tDesc }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- DRESS CODE CARD -->
            <div class="reveal-scale mt-8 bg-olive-50/80 border border-olive-200 rounded-3xl p-5 text-center shadow-sm">
                <p class="text-[11px] uppercase tracking-[0.25em] text-olive-600 font-medium">Gợi Ý Trang Phục</p>
                <h4 class="font-pattaya text-2xl text-olive-800 mt-0.5">Dress Code</h4>
                <p class="text-xs text-olive-600 mt-1">Sự đồng điệu sắc màu của Quý khách sẽ giúp những bức hình kỷ niệm thêm phần trọn vẹn</p>

                <div class="mt-4 flex items-center justify-center gap-6 flex-wrap">
                    @foreach($dressCodes as $dc)
                        @php
                            $cHex = is_array($dc) ? ($dc['hex'] ?? ($dc['color'] ?? '#556B45')) : $dc;
                            $cLabel = is_array($dc) ? ($dc['name'] ?? ($dc['label'] ?? '')) : (is_string($dc) ? $dc : '');
                            $cDesc = is_array($dc) ? ($dc['desc'] ?? ($cLabel ? ($cLabel . ' (' . $cHex . ')') : $cHex)) : $cLabel;
                        @endphp
                        <button onclick="selectDressCode('{{ addslashes($cDesc) }}')" class="group flex flex-col items-center gap-1.5 focus:outline-none cursor-pointer">
                            <span class="w-12 h-12 rounded-full border-4 border-white shadow-md group-hover:scale-110 transition" style="background-color: {{ $cHex }}"></span>
                            @if(!empty($cLabel))
                            <span class="text-[11px] font-medium text-olive-800">{{ $cLabel }}</span>
                            @endif
                        </button>
                    @endforeach
                </div>

                @php
                    $dressNote = $weddingCard->dresscode_note ?: $weddingCard->dress_code_note;
                @endphp
                <p id="dresscode-note" class="mt-3 text-xs italic text-olive-700 bg-white/80 rounded-xl py-2 px-3 border border-olive-100">
                    {{ $dressNote ?: '✨ Chạm vào từng ô màu để xem gợi ý phối đồ dự tiệc' }}
                </p>
            </div>

            <!-- Flowing Silk Green Ribbon Divider -->
            <div class="mt-8 -mx-6">
                <svg class="w-full h-11 silk-ribbon-wave" viewBox="0 0 480 48">
                    <use href="#silk-green-ribbon" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             8. RSVP FORM & GUESTBOOK (XÁC NHẬN THAM DỰ & SỔ LƯU BÚT)
             =================================================================== -->
        <section id="sec-rsvp" class="relative py-6 px-6 space-y-8">
            <!-- Top Calla Lily -->
            <div class="reveal-item mx-auto w-28 h-24 -mb-4 sway-flower">
                <svg viewBox="0 0 200 165" class="w-full h-full">
                    <use href="#calla-lily-bouquet" />
                </svg>
            </div>

            <!-- UNIFIED RSVP & GUESTBOOK CARD -->
            <div class="reveal-item bg-white border-2 border-olive-200 rounded-3xl p-5 sm:p-6 shadow-md">
                <div class="text-center mb-4">
                    <p class="text-[11px] uppercase tracking-[0.25em] text-olive-600 font-medium">Xác Nhận Tham Dự &amp; Sổ Lưu Bút</p>
                    <h3 class="font-pattaya text-3xl text-olive-800 mt-0.5">Gửi Lời Chúc &amp; Phản Hồi</h3>
                    <p class="text-xs text-olive-600 mt-1">Hãy gửi lời chúc và xác nhận để gia đình chuẩn bị đón tiếp Quý khách chu đáo nhất</p>
                </div>

                <form id="rsvp-form" onsubmit="submitRSVP(event)" class="space-y-3 text-xs">
                    <div>
                        <label class="block text-olive-800 font-medium mb-1">Tên của Quý khách *</label>
                        <input id="rsvp-name" name="sender_name" type="text" required placeholder="Nhập họ và tên của bạn..." 
                               class="w-full rounded-xl border border-olive-300 bg-olive-50/40 px-3.5 py-2.5 text-olive-900 focus:outline-none focus:border-olive-600">
                    </div>

                    <div class="grid grid-cols-2 gap-2.5">
                        <div>
                            <label class="block text-olive-800 font-medium mb-1">Khách mời của</label>
                            <select id="rsvp-side" name="guest_side" class="w-full rounded-xl border border-olive-300 bg-olive-50/40 px-3 py-2.5 text-olive-900 focus:outline-none focus:border-olive-600">
                                <option value="Khách Nhà Trai">Khách Nhà Trai</option>
                                <option value="Khách Nhà Gái">Khách Nhà Gái</option>
                                <option value="Bạn chung hai nhà">Bạn chung hai nhà</option>
                            </select>
                        </div>
                        <div id="rsvp-count-wrapper-30">
                            <label class="block text-olive-800 font-medium mb-1">Số người đi cùng</label>
                            <select id="rsvp-count" name="guest_count" class="w-full rounded-xl border border-olive-300 bg-olive-50/40 px-3 py-2.5 text-olive-900 focus:outline-none focus:border-olive-600">
                                <option value="1">1 người (Chỉ mình tôi)</option>
                                <option value="2" selected>2 người (Đi cùng người thương)</option>
                                <option value="3">3 người (Gia đình 3 người)</option>
                                <option value="4">4+ người (Cả gia đình)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-olive-800 font-medium mb-1">Xác nhận tham dự</label>
                        <div class="grid grid-cols-3 gap-2">
                            <label class="flex items-center justify-center gap-1 border border-olive-300 rounded-xl py-2 px-1 cursor-pointer has-[:checked]:bg-olive-600 has-[:checked]:text-white has-[:checked]:border-olive-600 transition">
                                <input type="radio" name="attendance_status" value="attending" checked onchange="toggleGuestCount30(this.value)" class="hidden">
                                <span>💚 Tham dự</span>
                            </label>
                            <label class="flex items-center justify-center gap-1 border border-olive-300 rounded-xl py-2 px-1 cursor-pointer has-[:checked]:bg-olive-600 has-[:checked]:text-white has-[:checked]:border-olive-600 transition">
                                <input type="radio" name="attendance_status" value="not_attending" onchange="toggleGuestCount30(this.value)" class="hidden">
                                <span>🕊️ Bận rồi</span>
                            </label>
                            <label class="flex items-center justify-center gap-1 border border-olive-300 rounded-xl py-2 px-1 cursor-pointer has-[:checked]:bg-olive-600 has-[:checked]:text-white has-[:checked]:border-olive-600 transition">
                                <input type="radio" name="attendance_status" value="unsure" onchange="toggleGuestCount30(this.value)" class="hidden">
                                <span>🤔 Chưa rõ</span>
                            </label>
                        </div>
                    </div>

                    <!-- Quick Preset Wish Chips -->
                    <div>
                        <label class="block text-olive-800 font-medium mb-1">Gợi ý lời chúc nhanh</label>
                        <div class="flex flex-wrap gap-1.5">
                            <button type="button" onclick="fillPresetWish('Chúc {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }} trăm năm hạnh phúc, sớm sinh quý tử!')" class="text-[11px] bg-olive-50 hover:bg-olive-100 border border-olive-200 text-olive-700 rounded-full px-2.5 py-1 transition cursor-pointer">
                                ✨ Trăm năm hạnh phúc
                            </button>
                            <button type="button" onclick="fillPresetWish('Chúc hai bạn mãi luôn đồng tâm đồng lòng, tơ duyên bền chặt trọn đời!')" class="text-[11px] bg-olive-50 hover:bg-olive-100 border border-olive-200 text-olive-700 rounded-full px-2.5 py-1 transition cursor-pointer">
                                🌿 Tơ duyên bền chặt
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-olive-800 font-medium mb-1">Lời chúc mừng của Quý khách *</label>
                        <textarea id="rsvp-message" name="message" rows="2" required placeholder="Viết lời chúc mừng gửi tới cô dâu &amp; chú rể..." 
                                  class="w-full rounded-xl border border-olive-300 bg-white px-3.5 py-2 text-olive-900 focus:outline-none focus:border-olive-600"></textarea>
                    </div>

                    <button id="rsvp-submit-btn" type="submit" class="btn-shimmer w-full bg-olive-600 hover:bg-olive-700 text-white font-medium py-3 rounded-xl shadow-md transition cursor-pointer flex items-center justify-center gap-2">
                        <span>Gửi Lời Chúc &amp; Xác Nhận Tham Dự 💌</span>
                    </button>
                </form>

                <!-- Scrollable Wishes Feed -->
                <div class="mt-6 pt-5 border-t border-olive-200">
                    <p class="text-[11px] uppercase tracking-[0.2em] text-olive-600 font-medium text-center mb-3">Lời Chúc Đã Nhận</p>
                    <div id="wishes-list" class="wishes-scroll max-h-64 overflow-y-auto space-y-2.5 pr-1">
                        <!-- Populated by JS -->
                    </div>
                </div>
            </div>

            <!-- Flowing Silk Green Ribbon Divider -->
            <div class="pt-2 -mx-6">
                <svg class="w-full h-11 silk-ribbon-wave" viewBox="0 0 480 48">
                    <use href="#silk-green-ribbon" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             9. WEDDING GIFT BOX & CALLA LILY RED ENVELOPE (HỘP QUÀ MỪNG CƯỚI)
             =================================================================== -->
        <section id="sec-gift" class="relative pt-4 pb-24 px-6 text-center">
            <!-- Top Calla Lily -->
            <div class="reveal-item mx-auto w-28 h-24 -mb-4 sway-flower">
                <svg viewBox="0 0 200 165" class="w-full h-full">
                    <use href="#calla-lily-bouquet" />
                </svg>
            </div>

            <p class="reveal-item text-[11px] uppercase tracking-[0.25em] text-olive-600 font-medium">Gửi Trao Tâm Ý</p>
            <h3 class="reveal-item font-pattaya text-3xl text-olive-800 mt-0.5">Hộp Quà Mừng Cưới</h3>
            <p class="reveal-item text-xs text-olive-600 max-w-[320px] mx-auto mt-1">
                Chạm vào phong bao in hoa rum trắng bên dưới để gửi quà mừng cưới trực tuyến tới Cô Dâu &amp; Chú Rể
            </p>

            <!-- Interactive Calla Lily Envelope / Gift Card -->
            <div onclick="openGiftModal()" class="reveal-scale cursor-pointer group mx-auto mt-6 max-w-[270px] rounded-3xl bg-gradient-to-b from-[#688056] via-[#556B45] to-[#425436] p-5 text-white shadow-xl border-2 border-olive-200 hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden">
                <!-- Shimmer sheen -->
                <div class="absolute -inset-full top-0 block h-full w-1/2 -skew-x-12 bg-gradient-to-r from-transparent to-white opacity-20 group-hover:animate-ping"></div>

                <!-- Calla Lily Illustration Printed on the Envelope -->
                <div class="mx-auto w-28 h-24 bg-white/95 rounded-2xl p-2 shadow-inner mb-3 flex items-center justify-center">
                    <svg viewBox="0 0 200 165" class="w-full h-full">
                        <use href="#calla-lily-bouquet" />
                    </svg>
                </div>

                <span class="inline-block bg-amber-300/90 text-olive-900 font-serif font-bold text-xs px-3 py-0.5 rounded-full shadow">
                    ❦ Phong Bao Mừng Cưới ❦
                </span>
                <h4 class="font-pattaya text-xl mt-2">{{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}</h4>
                <p class="text-[11px] text-olive-100 mt-1 flex items-center justify-center gap-1">
                    <span>Chạm để mở QR Mừng Cưới</span>
                    <span>→</span>
                </p>
            </div>

            <!-- Thank You Footer -->
            <div class="reveal-item mt-12 pt-6 border-t border-olive-200/80">
                <h4 class="font-vibes text-4xl text-olive-700">Thank You!</h4>
                <p class="font-serif italic text-sm text-olive-600 mt-1">
                    {{ $weddingCard->message_thanks ?: ('Sự hiện diện và lời chúc phúc của Quý khách là món quà quý giá nhất đối với ' . $weddingCard->groom_name . ' & ' . $weddingCard->bride_name . '.') }}
                </p>
                <p class="text-[10px] uppercase tracking-[0.25em] text-olive-400 mt-4">
                    {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '19.12.2026' }} • {{ $weddingCard->template_name }}
                </p>
            </div>
        </section>

        <!-- ===================================================================
             FLOATING CONTROLS (NHẠC NỀN & MENU ĐIỀU HƯỚNG NHANH)
             =================================================================== -->
        <!-- Bottom-Left Floating Music Button -->
        <div class="fixed bottom-4 left-1/2 -translate-x-[220px] max-sm:left-4 max-sm:translate-x-0 z-40 flex items-center gap-2">
            <button id="music-toggle-btn" onclick="toggleWeddingMusic()" title="Bật/Tắt nhạc cưới"
                    class="w-11 h-11 rounded-full bg-olive-700 text-white shadow-lg border-2 border-white flex items-center justify-center hover:bg-olive-800 transition">
                <div id="music-icon-wrapper" class="flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2z"/>
                    </svg>
                </div>
            </button>
            <span id="music-status-badge" class="bg-white/90 backdrop-blur border border-olive-200 text-olive-800 text-[11px] px-2.5 py-1 rounded-full shadow-sm hidden sm:inline-block">
                Giai điệu Tơ Duyên
            </span>
        </div>

        <!-- Bottom-Right Quick Gift & RSVP Floating Bar -->
        <div class="fixed bottom-4 right-1/2 translate-x-[220px] max-sm:right-4 max-sm:translate-x-0 z-40 flex items-center gap-2">
            <button onclick="openGiftModal()" class="bg-white/95 hover:bg-olive-50 text-olive-800 border border-olive-300 rounded-full px-3.5 py-2 text-xs font-medium shadow-lg flex items-center gap-1.5 transition">
                <span>🎁</span> Mừng cưới
            </button>
        </div>
    </div>

    <!-- ===================================================================
         MODAL 1: GIFT QR & BANK ACCOUNTS (MỪNG CƯỚI ONLINE)
         =================================================================== -->
    <div id="gift-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-olive-900/60 backdrop-blur-sm p-4">
        <div class="relative w-full max-w-[420px] rounded-3xl bg-white border-2 border-olive-200 p-5 shadow-2xl max-h-[90vh] overflow-y-auto">
            <button onclick="closeGiftModal()" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-olive-100 hover:bg-olive-200 text-olive-800 flex items-center justify-center text-sm font-bold">
                ✕
            </button>

            <div class="text-center">
                <div class="mx-auto w-20 h-16 -mb-1">
                    <svg viewBox="0 0 200 165" class="w-full h-full">
                        <use href="#calla-lily-bouquet" />
                    </svg>
                </div>
                <h3 class="font-pattaya text-2xl text-olive-800">Hộp Quà Mừng Cưới</h3>
                <p class="text-xs text-olive-600 mt-0.5">Cảm ơn tình cảm yêu thương của Quý khách dành cho hai vợ chồng</p>
            </div>

            <div class="mt-4 space-y-4">
                <!-- Groom Bank Card -->
                <div class="bg-olive-50/80 border border-olive-200 rounded-2xl p-4 flex items-center gap-3.5">
                    <div class="w-24 h-24 bg-white p-1.5 rounded-xl border border-olive-200 shrink-0 flex flex-col items-center justify-center overflow-hidden">
                        <img src="{{ $groomQrUrl }}" alt="QR Chú Rể" class="w-full h-full object-contain" onerror="this.src='https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=vietcombank'">
                    </div>
                    <div class="flex-1 text-xs">
                        <span class="inline-block bg-olive-600 text-white text-[10px] px-2 py-0.5 rounded-full font-medium">Mừng Chú Rể</span>
                        <p class="font-bold text-olive-900 text-sm mt-1">{{ $groomOwner }}</p>
                        <p class="text-olive-700">Ngân hàng: <strong>{{ $groomBankName }}</strong></p>
                        <p class="text-olive-800 font-mono font-semibold mt-0.5">STK: {{ $groomStk }}</p>
                        <button onclick="copyText('{{ $groomStk }}', 'Đã sao chép STK Chú rể {{ $weddingCard->groom_name }}!')" 
                                class="mt-2 bg-white hover:bg-olive-100 text-olive-800 border border-olive-300 rounded-lg px-3 py-1 text-[11px] font-medium shadow-sm transition">
                            📋 Sao chép STK
                        </button>
                    </div>
                </div>

                <!-- Bride Bank Card -->
                <div class="bg-olive-50/80 border border-olive-200 rounded-2xl p-4 flex items-center gap-3.5">
                    <div class="w-24 h-24 bg-white p-1.5 rounded-xl border border-olive-200 shrink-0 flex flex-col items-center justify-center overflow-hidden">
                        <img src="{{ $brideQrUrl }}" alt="QR Cô Dâu" class="w-full h-full object-contain" onerror="this.src='https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=techcombank'">
                    </div>
                    <div class="flex-1 text-xs">
                        <span class="inline-block bg-olive-600 text-white text-[10px] px-2 py-0.5 rounded-full font-medium">Mừng Cô Dâu</span>
                        <p class="font-bold text-olive-900 text-sm mt-1">{{ $brideOwner }}</p>
                        <p class="text-olive-700">Ngân hàng: <strong>{{ $brideBankName }}</strong></p>
                        <p class="text-olive-800 font-mono font-semibold mt-0.5">STK: {{ $brideStk }}</p>
                        <button onclick="copyText('{{ $brideStk }}', 'Đã sao chép STK Cô dâu {{ $weddingCard->bride_name }}!')" 
                                class="mt-2 bg-white hover:bg-olive-100 text-olive-800 border border-olive-300 rounded-lg px-3 py-1 text-[11px] font-medium shadow-sm transition">
                            📋 Sao chép STK
                        </button>
                    </div>
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
            <button onclick="closeLightbox()" class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-olive-700 text-white font-bold shadow-lg flex items-center justify-center">
                ✕
            </button>
            <img id="lightbox-img" src="" alt="Wedding Portrait" class="w-full max-h-[75vh] object-cover rounded-xl">
            <p id="lightbox-caption" class="text-center font-serif italic text-sm text-olive-800 mt-2 py-1"></p>
        </div>
    </div>

    <!-- CUSTOM TOAST NOTIFICATION -->
    <div id="toast-box" class="fixed top-5 left-1/2 -translate-x-1/2 z-[60] pointer-events-none opacity-0 -translate-y-3 transition-all duration-300 bg-olive-800 text-white text-xs font-medium px-4 py-2.5 rounded-full shadow-xl border border-olive-300 flex items-center gap-2">
        <span>✨</span>
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
                title: 'Sắc Hoa Rum Trắng Tinh Khôi',
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
                subtitle: 'Trang 4 • Nụ cười rạng rỡ trong nắng chiều'
            },
            {
                url: 'https://images.unsplash.com/photo-1606800052052-a08af7148866?auto=format&fit=crop&w=800&q=85',
                title: 'Sợi Tơ Duyên Xanh Kết Nối',
                subtitle: 'Trang 5 • Chung một mái nhà yêu thương'
            },
            {
                url: 'https://images.unsplash.com/photo-1537633552985-df8429e8048b?auto=format&fit=crop&w=800&q=85',
                title: 'Hạnh Phúc Viên Mãn Trọn Đời',
                subtitle: 'Trang 6 • Hẹn gặp Quý khách ngày {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '19.12.2026' }}'
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
                    <div class="relative w-full h-[330px] rounded-lg overflow-hidden border border-olive-200 bg-olive-50">
                        <img src="${photo.url}" alt="${photo.title}" class="w-full h-full object-cover"
                             onerror="this.src='https://placehold.co/600x750/DCE5D5/2E3B25?text=Anh+Cuoi+${idx + 1}'">
                        <button onclick="event.stopPropagation(); openLightbox(${idx})" 
                                class="absolute top-2.5 right-2.5 bg-white/85 hover:bg-white text-olive-800 rounded-full w-8 h-8 flex items-center justify-center shadow text-xs"
                                title="Phóng to ảnh">
                            🔍
                        </button>
                        <div class="absolute bottom-2 left-2 bg-olive-800/75 backdrop-blur-sm text-white text-[10px] px-2.5 py-0.5 rounded-full">
                            Chạm để lật trang ➔
                        </div>
                    </div>
                    <div class="pt-2 text-center">
                        <h4 class="font-pattaya text-lg text-olive-800 leading-snug">${photo.title}</h4>
                        <p class="text-[11px] text-olive-500 italic">${photo.subtitle}</p>
                    </div>
                `;
                stack.appendChild(page);

                // Create Thumbnail
                const thumb = document.createElement('button');
                thumb.className = `h-12 rounded-lg overflow-hidden border-2 transition ${idx === currentAlbumPage ? 'border-olive-600 scale-105 shadow' : 'border-transparent opacity-65 hover:opacity-100'}`;
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
                    t.className = 'h-12 rounded-lg overflow-hidden border-2 transition border-olive-600 scale-105 shadow';
                } else {
                    t.className = 'h-12 rounded-lg overflow-hidden border-2 transition border-transparent opacity-65 hover:opacity-100';
                }
            });

            document.getElementById('album-page-indicator').textContent = `Trang ${currentAlbumPage + 1} / ${albumPhotos.length}`;
        }

        /* -----------------------------------------------------------
           2. 3D ENVELOPE OPENING & WEDDING MUSIC
        ----------------------------------------------------------- */
        const weddingAudio = document.getElementById('weddingAudio');
        let isMusicPlaying = false;

        function updateMusicUI() {
            const wrapper = document.getElementById('music-icon-wrapper');
            const badge = document.getElementById('music-status-badge');
            if (isMusicPlaying) {
                if (wrapper) wrapper.classList.add('vinyl-spinning');
                if (badge) badge.textContent = '🎵 Đang phát nhạc';
            } else {
                if (wrapper) wrapper.classList.remove('vinyl-spinning');
                if (badge) badge.textContent = 'Đã tắt nhạc';
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

        function startAmbientWeddingMusic() {
            if (weddingAudio) {
                weddingAudio.play().then(() => {
                    isMusicPlaying = true;
                    updateMusicUI();
                }).catch(e => {
                    console.warn('Audio autoplay prevented until interaction:', e);
                });
            }
        }

        function toggleWeddingMusic() {
            if (!weddingAudio) return;
            if (weddingAudio.paused) {
                weddingAudio.play().then(() => {
                    showToast('🎵 Đang phát giai điệu Tơ Duyên');
                }).catch(e => {
                    console.warn('Playback error:', e);
                });
            } else {
                weddingAudio.pause();
                showToast('🔇 Đã tạm dừng nhạc nền');
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
        const weddingDateStr = '{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format("Y-m-d") : "2026-12-19" }}';
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
            $cardWishes30 = $weddingCard->wishes()->approved()->latest()->take(30)->get()->map(function($w) {
                return [
                    'author' => $w->sender_name,
                    'time' => $w->created_at ? $w->created_at->diffForHumans() : 'Vừa xong',
                    'message' => $w->message,
                    'attendance_status' => $w->attendance_status,
                    'guest_count' => $w->guest_count,
                ];
            });
        @endphp
        const initialWishes = @json($cardWishes30, JSON_UNESCAPED_UNICODE);
        const wishStoreUrl30 = "{{ route('wishes.store', $weddingCard->id) }}";
        const csrfToken30 = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

        function toggleGuestCount30(val) {
            const wrap = document.getElementById('rsvp-count-wrapper-30');
            if (wrap) wrap.style.display = (val === 'not_attending') ? 'none' : 'block';
        }

        function getBadgeHtml30(status, count) {
            if (status === 'attending') {
                const countText = (count && count > 1) ? ` (${count} người)` : '';
                return `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-olive-100 text-olive-800 border border-olive-300 ml-1.5">✓ Tham dự${countText}</span>`;
            } else if (status === 'not_attending') {
                return `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-rose-100 text-rose-800 border border-rose-300 ml-1.5">✕ Bận việc</span>`;
            } else if (status === 'unsure') {
                return `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-medium bg-slate-100 text-slate-700 border border-slate-300 ml-1.5">? Chưa rõ</span>`;
            }
            return '';
        }

        function renderWishes() {
            const container = document.getElementById('wishes-list');
            if (!initialWishes || initialWishes.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-4 text-xs text-olive-600 italic">
                        Hãy là người đầu tiên gửi lời chúc mừng hạnh phúc đến cô dâu &amp; chú rể! 🌿
                    </div>
                `;
                return;
            }
            container.innerHTML = initialWishes.map(w => `
                <div class="bg-white border border-olive-200/90 rounded-2xl p-3 text-left shadow-sm">
                    <div class="flex items-center justify-between gap-2">
                        <div class="flex items-center flex-wrap">
                            <span class="font-semibold text-xs text-olive-900">🌿 ${w.author}</span>
                            ${getBadgeHtml30(w.attendance_status, w.guest_count)}
                        </div>
                        <span class="text-[10px] text-olive-400 whitespace-nowrap">${w.time}</span>
                    </div>
                    <p class="text-xs text-olive-700 mt-1 leading-relaxed">${w.message}</p>
                </div>
            `).join('');
        }

        function fillPresetWish(text) {
            const msgEl = document.getElementById('rsvp-message');
            if (msgEl) msgEl.value = text;
            showToast('✨ Đã điền gợi ý lời chúc!');
        }

        function submitRSVP(e) {
            e.preventDefault();
            const nameInput = document.getElementById('rsvp-name');
            const sideSelect = document.getElementById('rsvp-side');
            const msgInput = document.getElementById('rsvp-message');
            const submitBtn = document.getElementById('rsvp-submit-btn');

            const name = nameInput.value.trim();
            const side = sideSelect ? sideSelect.value : '';
            let message = msgInput.value.trim();
            if (!name || !message) return;

            const attRadio = document.querySelector('input[name="attendance_status"]:checked');
            const attendanceStatus = attRadio ? attRadio.value : 'attending';
            const guestCount = (attendanceStatus === 'not_attending') ? 1 : (parseInt(document.getElementById('rsvp-count')?.value) || 1);

            if (side) {
                message = `[${side}] ${message}`;
            }

            const originalBtnHtml = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin mr-1"></i><span>Đang gửi xác nhận...</span>';

            fetch(wishStoreUrl30, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken30
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
                    initialWishes.unshift({
                        author: name,
                        time: 'Vừa xong',
                        message: message,
                        attendance_status: attendanceStatus,
                        guest_count: guestCount
                    });
                    renderWishes();
                    msgInput.value = '';
                    showToast(data.message || 'Cảm ơn bạn đã gửi lời chúc & xác nhận! 💌');
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
            copyText('Trung Tâm Tiệc Cưới Forevermark - 614 Lạc Long Quân, Tây Hồ, Hà Nội', '📋 Đã sao chép địa chỉ nhà hàng!');
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
           6. SCROLL REVEAL (INTERSECTION OBSERVER) & FLOATING PETALS
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

            const petals = Array.from({ length: 14 }, () => ({
                x: Math.random() * width,
                y: Math.random() * height,
                r: 3 + Math.random() * 4.5,
                speedY: 0.35 + Math.random() * 0.55,
                speedX: -0.25 + Math.random() * 0.5,
                angle: Math.random() * Math.PI * 2,
                spin: (Math.random() - 0.5) * 0.015,
                isOliveLeaf: Math.random() > 0.55
            }));

            function draw() {
                ctx.clearRect(0, 0, width, height);
                petals.forEach(p => {
                    p.y += p.speedY;
                    p.x += p.speedX + Math.sin(p.angle) * 0.25;
                    p.angle += p.spin;

                    if (p.y > height + 15) {
                        p.y = -15;
                        p.x = Math.random() * width;
                    }

                    ctx.save();
                    ctx.translate(p.x, p.y);
                    ctx.rotate(p.angle);
                    ctx.beginPath();
                    if (p.isOliveLeaf) {
                        ctx.fillStyle = 'rgba(155, 177, 139, 0.32)';
                        ctx.ellipse(0, 0, p.r * 1.4, p.r * 0.65, 0, 0, Math.PI * 2);
                    } else {
                        ctx.fillStyle = 'rgba(220, 229, 213, 0.48)';
                        ctx.ellipse(0, 0, p.r, p.r * 0.8, 0, 0, Math.PI * 2);
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
</body>
</html>