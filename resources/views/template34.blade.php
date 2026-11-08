<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $weddingCard->couple_name }} - Thiệp Cưới Online</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Pattaya, Great Vibes, Dancing Script, Cormorant Garamond, Be Vietnam Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Dancing+Script:wght@400;600;700&family=Great+Vibes&family=Pattaya&display=swap" rel="stylesheet">
    <!-- Tone.js for romantic sakura music-box synthesis -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tone/14.8.49/Tone.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        sakura: {
                            50: '#FFF8FA',
                            100: '#FDF0F4',
                            200: '#F9DCE5',
                            300: '#F2BFD0',
                            400: '#E899B1',
                            500: '#D66886',
                            600: '#BF4E6E',
                            700: '#9E3A57',
                            800: '#784856',
                            900: '#5A3E46',
                        },
                        champagne: {
                            light: '#FBF6EC',
                            DEFAULT: '#C9A46A',
                            dark: '#A68046'
                        }
                    },
                    fontFamily: {
                        dancing: ['"Dancing Script"', 'cursive'],
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
            --sakura-bg: #FFF8FA;
            --sakura-card: #FDF0F4;
            --sakura-primary: #D66886;
            --sakura-petal: #E899B1;
            --sakura-text: #5A3E46;
            --champagne-gold: #C9A46A;
        }

        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: #FCEEF3;
            background-image: 
                radial-gradient(at 12% 15%, rgba(214, 104, 134, 0.12) 0px, transparent 50%),
                radial-gradient(at 88% 85%, rgba(232, 153, 177, 0.2) 0px, transparent 50%);
            font-family: 'Be Vietnam Pro', sans-serif;
            color: #5A3E46;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        /* Delicate Sakura Paper Texture */
        .sakura-paper {
            background-color: #FFF9FA;
            background-image: 
                radial-gradient(circle, rgba(232, 153, 177, 0.42) 1.2px, transparent 1.2px);
            background-size: 18px 18px;
        }

        .sakura-container-shadow {
            box-shadow: 0 22px 65px rgba(90, 62, 70, 0.13), 0 0 1px rgba(214, 104, 134, 0.25);
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
        $dayNum = $wDate ? $wDate->format('d') : '31';
        $monthNum = $wDate ? $wDate->format('m') : '05';
        $yearNum = $wDate ? $wDate->format('Y') : '2026';
        $timeStr = !empty($weddingCard->wedding_time) ? trim($weddingCard->wedding_time) : '18:00';
        $timeStrShort = preg_match('/^\d{1,2}:\d{2}/', $timeStr, $m) ? $m[0] : '18:00';

        $timelineEvents = is_array($weddingCard->timeline) ? $weddingCard->timeline : (is_string($weddingCard->timeline) ? json_decode($weddingCard->timeline, true) : null);
        if (empty($timelineEvents) && !empty($weddingCard->timeline_list)) {
            $timelineEvents = $weddingCard->timeline_list;
        }
        if (empty($timelineEvents)) {
            $timelineEvents = [
                ['time' => '17:30', 'title' => 'Đón Khách & Chụp Ảnh Check-in', 'desc' => 'Lưu giữ khoảnh khắc kỷ niệm bên vườn hoa anh đào cùng Cô Dâu & Chú Rể.', 'icon' => '📸'],
                ['time' => '18:00', 'title' => 'Nghi Thức Lễ Thành Hôn', 'desc' => 'Cô dâu chú rể tiến vào lễ đường, trao nhẫn cưới và lời thề nguyện trăm năm.', 'icon' => '💍'],
                ['time' => '18:30', 'title' => 'Khai Tiệc & Nâng Ly Chúc Mừng', 'desc' => 'Rót tháp rượu hồng, cắt bánh cưới và thưởng thức ẩm thực tinh tế.', 'icon' => '🥂'],
                ['time' => '19:30', 'title' => 'Giao Lưu Âm Nhạc & Tung Hoa Cưới', 'desc' => 'Cùng hòa giọng trong những bản tình ca ngọt ngào và trao gửi bó hoa may mắn.', 'icon' => '🎶'],
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
                ['hex' => '#F4C2D1', 'name' => 'Hồng Pastel', 'desc' => 'Dịu dàng, ngọt ngào đồng điệu cùng sắc hoa anh đào.'],
                ['hex' => '#FAF6F0', 'name' => 'Trắng Kem', 'desc' => 'Tinh khôi, thanh lịch và trang nhã.'],
                ['hex' => '#E3CCA8', 'name' => 'Be Champagne', 'desc' => 'Sang trọng, ấm áp và nổi bật.'],
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
        </defs>
    </svg>

    <!-- ===================================================================
         12+ CONTINUOUS FALLING SAKURA PETALS LAYER (DOM + SVG PETALS)
         =================================================================== -->
    <div id="falling-sakura-layer" class="pointer-events-none fixed inset-0 z-30 overflow-hidden mx-auto max-w-[480px]" aria-hidden="true">
        <!-- Populated dynamically with 14 custom SVG notched petals & 🌸 blossoms -->
    </div>

    <!-- MAIN MOBILE-FIRST INVITATION CONTAINER (max-w-[480px] centered) -->
    <div id="app-container" class="relative w-full max-w-[480px] min-h-screen sakura-paper sakura-container-shadow overflow-hidden mx-auto border-x border-sakura-200/70">

        <!-- Soft Side Framing Lines -->
        <div class="pointer-events-none absolute inset-y-0 left-2.5 w-[1px] bg-gradient-to-b from-sakura-200 via-sakura-300/60 to-sakura-200 z-10"></div>
        <div class="pointer-events-none absolute inset-y-0 right-2.5 w-[1px] bg-gradient-to-b from-sakura-200 via-sakura-300/60 to-sakura-200 z-10"></div>

        <!-- TOP STICKY BAR: TEMPLATE BADGE & REOPEN ENVELOPE BUTTON -->
        {{-- <div class="sticky top-3 z-40 flex justify-between items-center px-4 pointer-events-none">
            <div class="pointer-events-auto bg-white/90 backdrop-blur-md border border-neutral-200 rounded-full px-3 py-1 text-[11px] text-neutral-700 shadow-sm flex items-center gap-1.5">
                <span class="text-xs">✉</span>
                <span class="font-medium tracking-wide">Mẫu Thiệp 34</span>
            </div>
            <button id="reopen-envelope-btn" onclick="reopenEnvelope()" class="pointer-events-auto bg-white/90 hover:bg-neutral-50 backdrop-blur-md border border-neutral-300 text-neutral-700 rounded-full px-3 py-1 text-[11px] font-medium shadow-sm transition flex items-center gap-1 cursor-pointer">
                <span>✉</span> Xem lại phong bì
            </button>
        </div> --}}

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
             2. HERO SECTION (MINIMALIST EDITORIAL STUDIO - STYLE ẢNH MẪU CHUẨN)
             =================================================================== -->
        <section id="sec-hero" class="relative pt-3 pb-8 px-3 sm:px-4 text-center overflow-hidden bg-white">
            
            <!-- Minimalist Wedding Card Frame (Khung ảnh chân dung tạp chí) -->
            <div class="reveal-scale relative mx-auto w-full max-w-[430px] rounded-2xl overflow-hidden border border-neutral-300/80 shadow-[0_12px_40px_rgba(0,0,0,0.08)] bg-white group">
                
                <!-- Top-Left Editorial Slogan (Góc trên bên trái ảnh như ảnh mẫu) -->
                <div class="absolute top-4 left-4 sm:top-5 sm:left-5 text-left pointer-events-none select-none z-20">
                    <p class="font-dancing text-xs sm:text-[13px] text-neutral-600 leading-tight">Love is</p>
                    <p class="font-dancing text-base sm:text-lg text-neutral-800 -mt-0.5 font-bold">A Canvas</p>
                    <p class="font-dancing text-xs sm:text-[13px] text-neutral-600 -mt-0.5">Burnished</p>
                    <div class="w-5 h-[1px] bg-neutral-400 mt-1 transform -rotate-12"></div>
                </div>

                <!-- Main Full Studio Wedding Portrait Container -->
                <div onclick="openLightbox(0)" class="relative w-full aspect-[9/14] sm:min-h-[640px] cursor-pointer overflow-hidden bg-neutral-100">
                    <img src="{{ $weddingCard->banner_top ? (str_starts_with($weddingCard->banner_top, 'http') ? $weddingCard->banner_top : asset('storage/' . $weddingCard->banner_top)) : asset('template34/images/hero_sample.jpg') }}" 
                         alt="{{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}" 
                         class="w-full h-full object-cover object-top transition duration-700 group-hover:scale-105"
                         onerror="this.src='{{ asset('template34/images/hero_sample.jpg') }}'">
                    
                    <!-- Soft White Gradient Overlay at Bottom (Tạo nền sáng tinh tế cho Typography đè lên váy) -->
                    <div class="absolute inset-x-0 bottom-0 h-[52%] bg-gradient-to-t from-white via-white/85 to-transparent pointer-events-none"></div>
                </div>

                <!-- Typography Overlay on Gown (Chữ đè lên phần váy cô dâu chuẩn style ảnh mẫu) -->
                <div class="absolute inset-x-0 bottom-5 sm:bottom-7 flex flex-col items-center justify-end px-4 z-10 text-center pointer-events-none">
                    
                    <!-- Tên Cô Dâu Chú Rể (Font Dancing Script nét đen uốn lượn nghệ thuật) -->
                    <h1 class="font-dancing text-2xl sm:text-[32px] text-neutral-900 font-bold tracking-wide drop-shadow-sm leading-tight">
                        {{ $weddingCard->groom_name }} - {{ $weddingCard->bride_name }}
                    </h1>

                    <!-- Tiêu đề: THƯ MỜI TIỆC CƯỚI -->
                    <p class="mt-2 text-[11px] sm:text-xs uppercase tracking-[0.28em] font-sans text-neutral-800 font-semibold">
                        THƯ MỜI TIỆC CƯỚI
                    </p>

                    <!-- Khung Ngày Cưới (2 đường kẻ đen kẹp giữa thứ & ngày tháng năm) -->
                    <div class="my-3 w-full max-w-[240px] sm:max-w-[270px] border-y-2 border-neutral-900 py-2.5 flex flex-col items-center justify-center">
                        <p class="text-[10px] sm:text-[11px] uppercase tracking-[0.35em] text-neutral-800 font-semibold font-sans">
                            {{ mb_strtoupper($dayOfWeekVi, 'UTF-8') }}
                        </p>
                        <p class="mt-1 font-sans text-xl sm:text-[24px] font-bold tracking-[0.22em] text-neutral-950">
                            {{ $dayNum }} . {{ $monthNum }} . {{ $yearNum }}
                        </p>
                    </div>

                    <!-- Lời tựa tình yêu (2 câu thơ viết tay đối xứng) -->
                    <div class="mt-1 text-center font-dancing text-[14px] sm:text-[16.5px] text-neutral-700 leading-snug">
                        <p>Yêu nhau là chuyện cả đời</p>
                        <p class="mt-0.5">Yêu người vừa ý, cưới người mình thương</p>
                    </div>

                    <!-- Chữ dọc nhỏ góc phải -->
                    <div class="absolute bottom-1 right-2 text-[9px] tracking-widest text-neutral-400 rotate-90 origin-bottom-right">
                        nelove
                    </div>
                </div>
            </div>

            <!-- Divider nhẹ phía dưới -->
            <div class="mt-6 -mx-6 flex justify-center items-center gap-2">
                <span class="w-16 h-[1px] bg-neutral-300"></span>
                <span class="text-xs text-neutral-400">❦</span>
                <span class="w-16 h-[1px] bg-neutral-300"></span>
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

            <!-- CARD 1: LỄ VU QUY & TIỆC CƯỚI NHÀ GÁI -->
            <div class="reveal-left bg-white border border-sakura-200 rounded-3xl p-5 shadow-md relative overflow-hidden">
                <div class="flex items-center justify-between">
                    <span class="inline-flex items-center gap-1.5 bg-sakura-100 text-sakura-700 text-[11px] font-semibold px-3 py-1 rounded-full border border-sakura-200">
                        <span>🌸</span> Tiệc Cưới Nhà Gái
                    </span>
                    <span class="text-xs font-serif italic text-sakura-600">{{ $weddingCard->time_bride ?: (!empty($weddingCard->ceremony_time) ? $weddingCard->ceremony_time : '11:00') }} — {{ $dayOfWeekVi }}</span>
                </div>

                <h4 class="font-pattaya text-2xl text-sakura-500 mt-2.5">Hôn Trường Nhà Gái</h4>

                <!-- Large Editorial Date Block -->
                <div class="my-3 py-2.5 px-3 bg-sakura-50/90 border border-sakura-200/80 rounded-2xl flex items-center justify-center gap-2 font-serif text-sakura-900">
                    <span class="text-2xl font-bold text-sakura-600">{{ $weddingCard->time_bride ?: (!empty($weddingCard->ceremony_time) ? $weddingCard->ceremony_time : '11:00') }}</span>
                    <span class="h-6 w-[1px] bg-sakura-300"></span>
                    <span class="text-sm font-semibold uppercase tracking-wider">
                        {{ $weddingCard->bride_eating_date ? \Carbon\Carbon::parse($weddingCard->bride_eating_date)->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : ($wDate ? $wDate->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : 'Chủ Nhật, ngày 28/03/2027') }}
                    </span>
                </div>

                @if(!empty($weddingCard->time_bride_al) || !empty($weddingCard->wedding_date_lunar))
                <p class="text-xs italic text-sakura-600 text-center">
                    (Tức ngày {{ $weddingCard->time_bride_al ?: $weddingCard->wedding_date_lunar }})
                </p>
                @endif

                <div class="mt-3 pt-3 border-t border-dashed border-sakura-200 text-xs text-sakura-800 space-y-1.5">
                    <p>📍 <strong>Tại Tư Gia Nhà Gái:</strong> {{ $weddingCard->address_bride ?: ($weddingCard->bride_address ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Gái')) }}</p>
                    <div class="pt-2 flex flex-wrap gap-2">
                        <a href="{{ $weddingCard->bride_map ?: ($weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode($weddingCard->address_bride ?: ($weddingCard->bride_address ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Gái'))))) }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-1.5 bg-sakura-500 hover:bg-sakura-600 text-white font-medium px-4 py-2 rounded-xl text-xs shadow-sm transition">
                            <span>🗺️</span> Chỉ đường
                        </a>
                        @if(!empty($weddingCard->bride_phone))
                        <a href="tel:{{ $weddingCard->bride_phone }}"
                           class="inline-flex items-center gap-1.5 bg-sakura-100 hover:bg-sakura-200 text-sakura-700 font-medium px-4 py-2 rounded-xl text-xs border border-sakura-200 transition">
                            <span>📞</span> Gọi Cô Dâu: {{ $weddingCard->bride_phone }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- CARD 2: LỄ THÀNH HÔN & TIỆC CƯỚI NHÀ TRAI -->
            <div class="reveal-right bg-white border border-sakura-200 rounded-3xl p-5 shadow-md relative overflow-hidden">
                <div class="flex items-center justify-between">
                    <span class="inline-flex items-center gap-1.5 bg-sakura-100 text-sakura-700 text-[11px] font-semibold px-3 py-1 rounded-full border border-sakura-200">
                        <span>💍</span> Tiệc Cưới Nhà Trai
                    </span>
                    <span class="text-xs font-serif italic text-sakura-600">{{ $weddingCard->time_groom ?: (!empty($weddingCard->wedding_time) ? $timeStrShort : '18:00') }} — {{ $dayOfWeekVi }}</span>
                </div>

                <h4 class="font-pattaya text-2xl text-sakura-500 mt-2.5">Hôn Trường Nhà Trai</h4>

                <div class="my-3 py-2.5 px-3 bg-sakura-50/90 border border-sakura-200/80 rounded-2xl flex items-center justify-center gap-2 font-serif text-sakura-900">
                    <span class="text-2xl font-bold text-sakura-600">{{ $weddingCard->time_groom ?: (!empty($weddingCard->wedding_time) ? $timeStrShort : '18:00') }}</span>
                    <span class="h-6 w-[1px] bg-sakura-300"></span>
                    <span class="text-sm font-semibold uppercase tracking-wider">
                        {{ $weddingCard->groom_eating_date ? \Carbon\Carbon::parse($weddingCard->groom_eating_date)->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : ($wDate ? $wDate->locale('vi')->isoFormat('dddd, [ngày] DD/MM/YYYY') : 'Chủ Nhật, ngày 28/03/2027') }}
                    </span>
                </div>

                @if(!empty($weddingCard->time_groom_al) || !empty($weddingCard->wedding_date_lunar))
                <p class="text-xs italic text-sakura-600 text-center">
                    (Tức ngày {{ $weddingCard->time_groom_al ?: $weddingCard->wedding_date_lunar }})
                </p>
                @endif

                <div class="mt-3 pt-3 border-t border-dashed border-sakura-200 text-xs text-sakura-800 space-y-1.5">
                    <p>📍 <strong>Tại Tư Gia Nhà Trai:</strong> {{ $weddingCard->address_groom ?: ($weddingCard->groom_address ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Trai')) }}</p>
                    <div class="pt-2 flex flex-wrap gap-2">
                        <a href="{{ $weddingCard->groom_map ?: ($weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode($weddingCard->address_groom ?: ($weddingCard->groom_address ?: ($weddingCard->wedding_address ?: 'Tư gia Nhà Trai'))))) }}" target="_blank" rel="noopener noreferrer"
                           class="inline-flex items-center gap-1.5 bg-sakura-500 hover:bg-sakura-600 text-white font-medium px-4 py-2 rounded-xl text-xs shadow-sm transition">
                            <span>🗺️</span> Chỉ đường
                        </a>
                        @if(!empty($weddingCard->groom_phone))
                        <a href="tel:{{ $weddingCard->groom_phone }}"
                           class="inline-flex items-center gap-1.5 bg-sakura-100 hover:bg-sakura-200 text-sakura-700 font-medium px-4 py-2 rounded-xl text-xs border border-sakura-200 transition">
                            <span>📞</span> Gọi Chú Rể: {{ $weddingCard->groom_phone }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            @if($weddingCard->wedding_location && $weddingCard->wedding_location !== $weddingCard->address_groom && $weddingCard->wedding_location !== $weddingCard->address_bride && $weddingCard->wedding_location !== $weddingCard->groom_address && $weddingCard->wedding_location !== $weddingCard->bride_address)
            <!-- CARD 3: TIỆC CƯỚI TRUNG TÂM / NHÀ HÀNG (NẾU CÓ) -->
            <div class="reveal-scale bg-gradient-to-b from-[#FFF5F8] to-white border-2 border-sakura-300 rounded-3xl p-5 shadow-lg relative overflow-hidden">
                <div class="flex items-center justify-between">
                    <span class="inline-flex items-center gap-1.5 bg-sakura-500 text-white text-[11px] font-semibold px-3 py-1 rounded-full shadow-sm">
                        <span>🥂</span> Tiệc Cưới Trung Tâm
                    </span>
                    <span class="text-xs font-serif font-bold text-sakura-700">{{ $timeStrShort }} — {{ $dayNum }}.{{ $monthNum }}.{{ $yearNum }}</span>
                </div>

                <h4 class="font-pattaya text-2xl text-sakura-500 mt-2.5">{{ $weddingCard->wedding_location }}</h4>
                <p class="text-xs font-semibold text-sakura-800 mt-0.5">Sảnh Tiệc Cưới Trọng Thể</p>
                @if($weddingCard->wedding_address)
                <p class="text-xs text-sakura-800/90 mt-1">📍 {{ $weddingCard->wedding_address }}</p>
                @endif

                <div class="my-3 py-2 px-3 bg-white border border-sakura-200 rounded-xl flex items-center justify-between text-xs">
                    <span>🕕 Đón khách: <strong>{{ !empty($timelineEvents[0]['time']) ? $timelineEvents[0]['time'] : '17:30' }}</strong></span>
                    <span class="text-sakura-300">|</span>
                    <span>🥂 Khai tiệc: <strong>{{ $timeStrShort }} {{ $dayOfWeekVi }}</strong></span>
                </div>

                <!-- Google Maps Action Buttons -->
                <div class="grid grid-cols-2 gap-2.5 mt-3">
                    <a href="{{ $weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode(($weddingCard->wedding_location) . ' ' . ($weddingCard->wedding_address ?: 'Hà Nội'))) }}" 
                       target="_blank" rel="noopener noreferrer"
                       class="bg-sakura-500 hover:bg-sakura-600 text-white text-xs font-medium py-2.5 px-3 rounded-xl text-center shadow-sm flex items-center justify-center gap-1.5 transition">
                        <span>🗺️</span> Chỉ đường Google Maps
                    </a>
                    <button onclick="copyVenueAddress()" class="bg-white hover:bg-sakura-50 text-sakura-800 border border-sakura-300 text-xs font-medium py-2.5 px-3 rounded-xl text-center flex items-center justify-center gap-1.5 transition cursor-pointer">
                        <span>📋</span> Sao chép địa chỉ
                    </button>
                </div>
            </div>
            @endif

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

                        $rawIcon = is_array($tl) ? ($tl['icon'] ?? '') : '';
                        $tIcon = '';
                        if (!empty($rawIcon)) {
                            $tIcon = $rawIcon;
                        } else {
                            $titleLower = mb_strtolower($tTitle, 'UTF-8');
                            if (str_contains($titleLower, 'đón dâu') || str_contains($titleLower, 'rước dâu') || str_contains($titleLower, 'xe')) {
                                $tIcon = '🚗';
                            } elseif (str_contains($titleLower, 'gia tiên')) {
                                $tIcon = '🌸';
                            } elseif (str_contains($titleLower, 'đón khách') || str_contains($titleLower, 'chụp')) {
                                $tIcon = '📸';
                            } elseif (str_contains($titleLower, 'hôn lễ') || str_contains($titleLower, 'thành hôn') || str_contains($titleLower, 'nghi thức')) {
                                $tIcon = '💍';
                            } elseif (str_contains($titleLower, 'tiệc') || str_contains($titleLower, 'ăn')) {
                                $tIcon = '🍽️';
                            } elseif (str_contains($titleLower, 'rượu') || str_contains($titleLower, 'nâng ly') || str_contains($titleLower, 'bánh')) {
                                $tIcon = '🥂';
                            } elseif (str_contains($titleLower, 'nhạc') || str_contains($titleLower, 'khiêu vũ') || str_contains($titleLower, 'kết thúc')) {
                                $tIcon = '🎶';
                            } else {
                                $tIcon = $tlIcons[$tIdx % count($tlIcons)];
                            }
                        }
                    @endphp
                    <div class="reveal-left relative flex items-center gap-3.5">
                        <div class="relative z-10 w-12 h-12 rounded-2xl bg-white border-2 border-sakura-300 shadow-sm flex items-center justify-center shrink-0 text-lg">
                            @if(str_starts_with($tIcon, 'fa-'))
                                <i class="fa-solid {{ $tIcon }} text-sakura-600 text-base"></i>
                            @else
                                {{ $tIcon }}
                            @endif
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
                            $cColor = is_array($dc) ? ($dc['hex'] ?? ($dc['color'] ?? '#F4C2D1')) : $dc;
                            $cLabel = is_array($dc) ? ($dc['name'] ?? ($dc['label'] ?? '')) : (is_string($dc) ? $dc : '');
                            $cDesc = is_array($dc) ? ($dc['desc'] ?? ($cLabel ? ($cLabel . ' — Gợi ý trang phục dự tiệc sang trọng.') : '')) : '';
                        @endphp
                        <button onclick="selectDressCode('{{ addslashes($cLabel . ($cColor ? ' (' . $cColor . ')' : '') . ($cDesc ? ' — ' . $cDesc : '')) }}')" class="group flex flex-col items-center gap-1.5 cursor-pointer">
                            <span class="w-12 h-12 rounded-full border-4 border-white shadow-md group-hover:scale-110 transition" style="background-color: {{ $cColor }}"></span>
                            @if(!empty($cLabel))
                            <span class="text-[11px] font-medium text-sakura-900">{{ $cLabel }}</span>
                            @endif
                        </button>
                    @endforeach
                </div>

                @php
                    $dressNote = $weddingCard->dresscode_note ?: $weddingCard->dress_code_note;
                @endphp
                @if(!empty($dressNote))
                <p id="dresscode-note" class="mt-3 text-xs italic text-sakura-800 bg-white/90 rounded-xl py-2 px-3 border border-sakura-200">
                    {{ $dressNote }}
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

            <!-- UNIFIED RSVP & GUESTBOOK CARD -->
            <div class="reveal-item bg-white border border-sakura-200 rounded-3xl p-5 sm:p-6 shadow-md">
                <div class="text-center mb-4">
                    <p class="text-[11px] uppercase tracking-[0.25em] text-sakura-500 font-semibold">Xác Nhận Tham Dự &amp; Sổ Lưu Bút</p>
                    <h3 class="font-pattaya text-3xl text-sakura-500 mt-0.5">Gửi Lời Chúc &amp; Phản Hồi</h3>
                    <p class="text-xs text-sakura-800 mt-1">Sự hiện diện và lời chúc của Quý khách là niềm hạnh phúc lớn lao của gia đình chúng tôi</p>
                </div>

                <form id="rsvp-form" onsubmit="submitRSVP(event)" class="space-y-3 text-xs">
                    <div>
                        <label class="block text-sakura-900 font-medium mb-1">Tên Quý khách *</label>
                        <input id="rsvp-name" name="sender_name" type="text" required placeholder="Nhập họ và tên của bạn..." 
                               class="w-full rounded-xl border border-sakura-300 bg-sakura-50/50 px-3.5 py-2.5 text-sakura-900 font-medium focus:outline-none focus:border-sakura-500">
                    </div>

                    <div class="grid grid-cols-2 gap-2.5">
                        <div>
                            <label class="block text-sakura-900 font-medium mb-1">Khách mời của</label>
                            <select id="rsvp-side" name="guest_side" class="w-full rounded-xl border border-sakura-300 bg-sakura-50/50 px-3 py-2.5 text-sakura-900 focus:outline-none focus:border-sakura-500">
                                <option value="Khách Nhà Trai">Khách Nhà Trai</option>
                                <option value="Khách Nhà Gái">Khách Nhà Gái</option>
                                <option value="Bạn chung hai nhà">Bạn chung hai nhà</option>
                            </select>
                        </div>
                        <div id="rsvp-count-wrapper-34">
                            <label class="block text-sakura-900 font-medium mb-1">Số lượng tham dự</label>
                            <select id="rsvp-count" name="guest_count" class="w-full rounded-xl border border-sakura-300 bg-sakura-50/50 px-3 py-2.5 text-sakura-900 focus:outline-none focus:border-sakura-500">
                                <option value="1">1 người</option>
                                <option value="2" selected>2 người</option>
                                <option value="3">3 người (Gia đình)</option>
                                <option value="4">4+ người (Cả gia đình)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sakura-900 font-medium mb-1">Xác nhận tham dự</label>
                        <div class="grid grid-cols-3 gap-2">
                            <label class="flex items-center justify-center gap-1 border border-sakura-300 rounded-xl py-2 px-1 cursor-pointer has-[:checked]:bg-sakura-500 has-[:checked]:text-white has-[:checked]:border-sakura-500 transition">
                                <input type="radio" name="attendance_status" value="attending" checked onchange="toggleGuestCount34(this.value)" class="hidden">
                                <span>🌸 Sẽ tham gia</span>
                            </label>
                            <label class="flex items-center justify-center gap-1 border border-sakura-300 rounded-xl py-2 px-1 cursor-pointer has-[:checked]:bg-sakura-500 has-[:checked]:text-white has-[:checked]:border-sakura-500 transition">
                                <input type="radio" name="attendance_status" value="not_attending" onchange="toggleGuestCount34(this.value)" class="hidden">
                                <span>🕊️ Rất tiếc bận</span>
                            </label>
                            <label class="flex items-center justify-center gap-1 border border-sakura-300 rounded-xl py-2 px-1 cursor-pointer has-[:checked]:bg-sakura-500 has-[:checked]:text-white has-[:checked]:border-sakura-500 transition">
                                <input type="radio" name="attendance_status" value="unsure" onchange="toggleGuestCount34(this.value)" class="hidden">
                                <span>🤔 Chưa rõ</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sakura-900 font-medium mb-1">Lưu ý thực đơn (Ăn chay / Dị ứng nếu có)</label>
                        <select id="rsvp-diet" name="guest_diet" class="w-full rounded-xl border border-sakura-300 bg-sakura-50/50 px-3 py-2 text-sakura-900 focus:outline-none focus:border-sakura-500">
                            <option value="Thực đơn tiêu chuẩn">Thực đơn tiêu chuẩn (Mặn)</option>
                            <option value="Thực đơn Chay">Đăng ký bàn Chay</option>
                            <option value="Có trẻ nhỏ đi cùng">Có trẻ nhỏ đi cùng (cần ghế trẻ em)</option>
                        </select>
                    </div>

                    <!-- Preset Quick-Wish Chips -->
                    <div>
                        <label class="block text-sakura-900 font-medium mb-1">Gợi ý lời chúc nhanh</label>
                        <div class="flex flex-wrap gap-1.5">
                            <button type="button" onclick="fillPresetWish('Chúc {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }} trăm năm hạnh phúc, tình yêu luôn rực rỡ như mùa hoa anh đào!')" class="text-[11px] bg-white hover:bg-sakura-50 border border-sakura-200 text-sakura-800 rounded-full px-2.5 py-1 transition cursor-pointer">
                                🌸 Trăm năm hạnh phúc
                            </button>
                            <button type="button" onclick="fillPresetWish('Chúc hai bạn sớm đón thiên thần nhỏ, gia đình luôn ngập tràn tiếng cười!')" class="text-[11px] bg-white hover:bg-sakura-50 border border-sakura-200 text-sakura-800 rounded-full px-2.5 py-1 transition cursor-pointer">
                                👶 Sớm sinh quý tử
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sakura-900 font-medium mb-1">Lời chúc mừng của Quý khách *</label>
                        <textarea id="rsvp-message" name="message" rows="2" required placeholder="Viết lời chúc mừng gửi tới {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}..." 
                                  class="w-full rounded-xl border border-sakura-300 bg-white px-3.5 py-2 text-sakura-900 focus:outline-none focus:border-sakura-500"></textarea>
                    </div>

                    <button id="rsvp-submit-btn" type="submit" class="btn-shimmer w-full bg-sakura-500 hover:bg-sakura-600 text-white font-semibold py-3 rounded-xl shadow-md transition cursor-pointer flex items-center justify-center gap-2">
                        <span>Gửi Lời Chúc &amp; Xác Nhận Tham Dự 🌸</span>
                    </button>
                </form>

                <!-- Scrollable Wishes Feed -->
                <div class="mt-6 pt-5 border-t border-sakura-200">
                    <p class="text-[11px] uppercase tracking-[0.2em] text-sakura-500 font-semibold text-center mb-3">Lời Chúc Đã Nhận</p>
                    <div id="wishes-list" class="wishes-scroll max-h-64 overflow-y-auto space-y-2.5 pr-1">
                        <!-- Populated by JS -->
                    </div>
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
             FLOATING ACTION CONTROLS (MUSIC TOGGLE & QUICK QR/RSVP)
             =================================================================== -->
        <!-- Bottom-Left Floating Music Vinyl Toggle -->
        <div class="fixed bottom-4 left-1/2 -translate-x-[220px] max-sm:left-4 max-sm:translate-x-0 z-40 flex items-center gap-2">
            <button id="music-toggle-btn" onclick="toggleWeddingMusic()" title="Bật/Tắt nhạc nền"
                    class="w-11 h-11 rounded-full bg-sakura-500 text-white shadow-lg border-2 border-white flex items-center justify-center hover:bg-sakura-600 transition cursor-pointer">
                <div id="music-icon-wrapper" class="flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2z"/>
                    </svg>
                </div>
            </button>
            <span id="music-status-badge" class="bg-white/90 backdrop-blur border border-sakura-200 text-sakura-800 text-[11px] px-2.5 py-1 rounded-full shadow-sm hidden sm:inline-block">
                Giai điệu Anh Đào
            </span>
        </div>

        <!-- Bottom-Right Floating Quick RSVP & Gift Buttons -->
        <div class="fixed bottom-4 right-1/2 translate-x-[220px] max-sm:right-4 max-sm:translate-x-0 z-40 flex items-center gap-1.5">
            <a href="#sec-rsvp" class="bg-white/95 hover:bg-sakura-50 text-sakura-700 border border-sakura-300 rounded-full px-3 py-2 text-xs font-medium shadow-lg flex items-center gap-1 transition">
                <span>✉</span> RSVP
            </a>
            <button onclick="openGiftModal()" class="bg-sakura-500 hover:bg-sakura-600 text-white rounded-full px-3.5 py-2 text-xs font-medium shadow-lg flex items-center gap-1 transition cursor-pointer">
                <span>🎁</span> Mừng cưới
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
           3. ENVELOPE OPENING & WEDDING MUSIC
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

        function startSakuraWeddingMusic() {
            if (weddingAudio) {
                weddingAudio.play().then(() => {
                    isMusicPlaying = true;
                    updateMusicUI();
                }).catch(e => {
                    console.warn('Audio waiting for user gesture:', e);
                });
            }
        }

        function toggleWeddingMusic() {
            if (!weddingAudio) return;
            if (weddingAudio.paused) {
                weddingAudio.play().then(() => {
                    showToast('🎵 Đang phát giai điệu Anh Đào Hồng');
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
            $cardWishes34 = $weddingCard->wishes()->approved()->latest()->take(30)->get()->map(function($w) {
                return [
                    'author' => $w->sender_name,
                    'time' => $w->created_at ? $w->created_at->diffForHumans() : 'Vừa xong',
                    'message' => $w->message,
                    'attendance_status' => $w->attendance_status,
                    'guest_count' => $w->guest_count,
                ];
            });
        @endphp
        const initialWishes = @json($cardWishes34, JSON_UNESCAPED_UNICODE);
        const wishStoreUrl34 = "{{ route('wishes.store', $weddingCard->id) }}";
        const csrfToken34 = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

        function toggleGuestCount34(val) {
            const wrap = document.getElementById('rsvp-count-wrapper-34');
            if (wrap) wrap.style.display = (val === 'not_attending') ? 'none' : 'block';
        }

        function getBadgeHtml34(status, count) {
            if (status === 'attending') {
                const countText = (count && count > 1) ? ` (${count} người)` : '';
                return `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-sakura-100 text-sakura-700 border border-sakura-300 ml-1.5">✓ Tham gia${countText}</span>`;
            } else if (status === 'not_attending') {
                return `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-gray-100 text-gray-700 border border-gray-300 ml-1.5">✕ Bận việc</span>`;
            } else if (status === 'unsure') {
                return `<span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-slate-100 text-slate-700 border border-slate-300 ml-1.5">? Chưa rõ</span>`;
            }
            return '';
        }

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
                    <div class="flex items-center justify-between gap-2">
                        <div class="flex items-center flex-wrap">
                            <span class="font-semibold text-xs text-sakura-900">🌸 ${w.author}</span>
                            ${getBadgeHtml34(w.attendance_status, w.guest_count)}
                        </div>
                        <span class="text-[10px] text-sakura-400 whitespace-nowrap">${w.time}</span>
                    </div>
                    <p class="text-xs text-sakura-800 mt-1 leading-relaxed">${w.message}</p>
                </div>
            `).join('');
        }

        function fillPresetWish(text) {
            const msgEl = document.getElementById('rsvp-message');
            if (msgEl) msgEl.value = text;
            showToast('🌸 Đã chọn lời chúc gợi ý!');
        }

        function submitRSVP(e) {
            e.preventDefault();
            const nameInput = document.getElementById('rsvp-name');
            const sideSelect = document.getElementById('rsvp-side');
            const dietSelect = document.getElementById('rsvp-diet');
            const msgInput = document.getElementById('rsvp-message');
            const submitBtn = document.getElementById('rsvp-submit-btn');

            const name = nameInput.value.trim();
            const side = sideSelect ? sideSelect.value : '';
            const diet = dietSelect ? dietSelect.value : '';
            let message = msgInput.value.trim();
            if (!name || !message) return;

            const attRadio = document.querySelector('input[name="attendance_status"]:checked');
            const attendanceStatus = attRadio ? attRadio.value : 'attending';
            const guestCount = (attendanceStatus === 'not_attending') ? 1 : (parseInt(document.getElementById('rsvp-count')?.value) || 1);

            let prefix = [];
            if (side) prefix.push(side);
            if (diet && diet !== 'Thực đơn tiêu chuẩn') prefix.push(diet);
            if (prefix.length > 0) {
                message = `[${prefix.join(' - ')}] ${message}`;
            }

            const originalBtnHtml = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin mr-1"></i><span>Đang gửi xác nhận...</span>';

            fetch(wishStoreUrl34, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken34
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
                    showToast(data.message || 'Cảm ơn bạn đã gửi lời chúc & xác nhận! 🌸');
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
                const envEl = document.getElementById('envelope-guest-name');
                if (envEl) envEl.textContent = guestParam;
                const heroEl = document.getElementById('hero-guest-name');
                if (heroEl) heroEl.textContent = guestParam;
                const rsvpNameEl = document.getElementById('rsvp-name');
                if (rsvpNameEl) rsvpNameEl.value = guestParam;
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
</body>
</html>