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
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Great+Vibes&family=Pattaya&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        botanical: {
                            950: '#14261e',
                            900: '#1e352b',
                            800: '#2d4a3e',
                            700: '#3c5c4e',
                            600: '#4a6b5b',
                            500: '#6b8e78',
                            400: '#8fa998',
                            300: '#b5c9bc',
                            200: '#d5e2d9',
                            100: '#e8f0ec',
                            50: '#f4f7f5',
                        },
                        alabaster: {
                            50: '#fdfcfa',
                            100: '#faf9f5',
                            200: '#f3f1eb',
                            300: '#e8e4da',
                        },
                        champagne: {
                            300: '#e2cba0',
                            400: '#d4b87a',
                            500: '#c5a059',
                            600: '#a6823c',
                        }
                    },
                    fontFamily: {
                        pattaya: ['"Pattaya"', 'cursive'],
                        script: ['"Great Vibes"', 'cursive'],
                        serif: ['"Cormorant Garamond"', '"Playfair Display"', 'Georgia', 'serif'],
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --forest-dark: #1e352b;
            --forest-main: #2d4a3e;
            --sage-main: #4a6b5b;
            --sage-light: #8fa998;
            --eucalyptus-bg: #f4f7f5;
            --paper-cream: #faf9f5;
            --champagne: #c5a059;
        }

        body {
            background-color: #e9efe9;
            color: var(--forest-dark);
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        /* Subtle Organic Linen & Watercolor Paper Texture */
        .paper-texture {
            background-color: var(--paper-cream);
            background-image: 
                radial-gradient(circle at 15% 15%, rgba(143, 169, 152, 0.12) 0%, transparent 45%),
                radial-gradient(circle at 85% 80%, rgba(197, 160, 89, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.8) 0%, rgba(243, 241, 235, 0.6) 100%);
        }

        /* Minimalist Double Arch & Botanical Frame */
        .minimal-double-frame {
            border: 1px solid rgba(74, 107, 91, 0.35);
            box-shadow: inset 0 0 0 5px transparent, inset 0 0 0 6px rgba(197, 160, 89, 0.35);
        }

        /* Gentle Swaying Animation for Corner Botanical Illustrations */
        @keyframes gentleSway {
            0%, 100% { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(2.2deg) scale(1.02); }
        }
        @keyframes gentleSwayReverse {
            0%, 100% { transform: rotate(180deg) scale(1); }
            50% { transform: rotate(182.2deg) scale(1.02); }
        }
        .flower-background-tl {
            animation: gentleSway 7s ease-in-out infinite;
            transform-origin: top left;
        }
        .flower-background-br {
            animation: gentleSwayReverse 7.5s ease-in-out infinite;
            transform-origin: center center;
        }

        /* 12 Floating Botanical Leaves Layer */
        .floating-botanical-container {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 5;
            overflow: hidden;
        }
        .floating-leaf-node {
            position: absolute;
            color: rgba(74, 107, 91, 0.14);
            user-select: none;
            animation: floatLeafUp linear infinite;
        }
        @keyframes floatLeafUp {
            0% {
                transform: translateY(105vh) rotate(0deg) translateX(0px);
                opacity: 0;
            }
            15% { opacity: 1; }
            85% { opacity: 1; }
            100% {
                transform: translateY(-15vh) rotate(45deg) translateX(25px);
                opacity: 0;
            }
        }

        /* 3D Split-Gate Cover Screen (Màn hình Mở Thiệp Minimalism Xanh) */
        #invitation-gate {
            position: fixed;
            inset: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 1600px;
            transition: visibility 1.2s ease, opacity 1.1s ease;
        }
        #invitation-gate.gate-opened {
            pointer-events: none;
            visibility: hidden;
            opacity: 0;
            transition-delay: 0.9s;
        }
        .gate-panel-left,
        .gate-panel-right {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 50%;
            background: linear-gradient(160deg, #f4f7f5 0%, #e4ede8 55%, #d8e5de 100%);
            transition: transform 1.25s cubic-bezier(0.65, 0, 0.15, 1), box-shadow 1.25s ease;
            z-index: 10;
        }
        .gate-panel-left {
            left: 0;
            border-right: 1px solid rgba(74, 107, 91, 0.25);
            transform-origin: left center;
        }
        .gate-panel-right {
            right: 0;
            border-left: 1px solid rgba(74, 107, 91, 0.25);
            transform-origin: right center;
        }
        #invitation-gate.gate-opened .gate-panel-left {
            transform: translateX(-103%) rotateY(-10deg);
        }
        #invitation-gate.gate-opened .gate-panel-right {
            transform: translateX(103%) rotateY(10deg);
        }
        .gate-cover-card {
            position: relative;
            z-index: 30;
            transform: translateZ(20px);
            transition: transform 0.85s cubic-bezier(0.34, 1.56, 0.64, 1), opacity 0.65s ease;
        }
        #invitation-gate.gate-opened .gate-cover-card {
            transform: scale(1.09) translateY(-10px);
            opacity: 0;
        }

        /* Exact ChungĐôi Ornamental Divider: <div></div><span>❦</span><div></div> */
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
            background: linear-gradient(90deg, transparent, #6b8e78, transparent);
        }
        .ornament-divider span {
            color: #4a6b5b;
            font-size: 1.2rem;
            line-height: 1;
        }

        /* Botanical Primary Button ("Mở thiệp") */
        .btn-botanical {
            background: linear-gradient(135deg, #3c5c4e 0%, #2d4a3e 55%, #1e352b 100%);
            color: #faf9f5;
            box-shadow: 0 10px 25px -5px rgba(45, 74, 62, 0.45), inset 0 1px 1px rgba(255, 255, 255, 0.25);
            position: relative;
            overflow: hidden;
            transition: all 0.35s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .btn-botanical:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 14px 30px -5px rgba(45, 74, 62, 0.6);
        }
        .btn-botanical::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 42%;
            height: 200%;
            background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.35) 50%, rgba(255,255,255,0) 100%);
            transform: rotate(25deg);
            animation: shimmerBtn 3.4s infinite;
        }
        @keyframes shimmerBtn {
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

        /* Spinning Vinyl Music Disc */
        @keyframes spinDisc {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .spin-disc {
            animation: spinDisc 7s linear infinite;
        }
        .spin-paused {
            animation-play-state: paused;
        }

        /* Heartbeat Pulse for Dec 19 Calendar Badge */
        @keyframes pulseHeart {
            0%, 100% { transform: scale(1); }
            35% { transform: scale(1.14); }
            65% { transform: scale(0.96); }
        }
        .animate-pulse-heart {
            animation: pulseHeart 2s infinite ease-in-out;
        }

        /* =========================================================
         * HERO ENVELOPE, POLAROID PHOTOS & WAX SEAL (100% REF MATCH)
         * ========================================================= */
        .thin-leaf-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 170px;
            margin: 0 auto;
        }
        .thin-leaf-divider .line {
            flex: 1;
            height: 1px;
            background-color: #b7c2b2;
            position: relative;
        }
        .thin-leaf-divider .line-left::before {
            content: '';
            position: absolute;
            left: 0;
            top: -1.5px;
            width: 3.5px;
            height: 3.5px;
            border-radius: 50%;
            background-color: #b7c2b2;
        }
        .thin-leaf-divider .line-right::after {
            content: '';
            position: absolute;
            right: 0;
            top: -1.5px;
            width: 3.5px;
            height: 3.5px;
            border-radius: 50%;
            background-color: #b7c2b2;
        }

        /* 3D Olive-Sage Envelope */
        .hero-envelope-scene {
            position: relative;
            width: 285px;
            height: 325px;
            margin: 14px auto 0;
            user-select: none;
        }
        @media (min-width: 400px) {
            .hero-envelope-scene {
                width: 308px;
                height: 345px;
            }
        }

        /* Top Open Triangle Flap (Behind Photos) */
        .env-top-flap {
            position: absolute;
            top: 46px;
            left: 0;
            right: 0;
            height: 112px;
            background: linear-gradient(180deg, #6a805b 0%, #5b714d 100%);
            clip-path: polygon(0% 100%, 50% 0%, 100% 100%);
            z-index: 1;
            filter: drop-shadow(0 -2px 6px rgba(0,0,0,0.08));
        }

        /* Envelope Inner Pocket */
        .env-back-pocket {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 170px;
            background: #556a47;
            border-radius: 0 0 8px 8px;
            z-index: 1;
            box-shadow: 0 18px 36px -8px rgba(45, 65, 38, 0.38);
        }

        /* Polaroid Photo Cards Popping Out */
        .env-polaroid {
            position: absolute;
            background: #ffffff;
            padding: 6px 6px 14px 6px;
            border-radius: 2px;
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.18), 0 2px 6px rgba(0, 0, 0, 0.08);
            cursor: pointer;
            transition: transform 0.65s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.4s ease;
        }
        /* Right Groom Photo (Higher & Behind Left Bride Photo) */
        .env-polaroid-right {
            width: 148px;
            height: 196px;
            right: 12px;
            top: 12px;
            z-index: 2;
            transform: translateY(45px) rotate(2deg);
        }
        /* Left Bride Photo (In Front & Tilted Left) */
        .env-polaroid-left {
            width: 158px;
            height: 204px;
            left: 14px;
            top: 42px;
            z-index: 3;
            transform: translateY(45px) rotate(-3deg);
        }
        /* Fan-out animation once card is revealed */
        .hero-envelope-scene.photos-fanned .env-polaroid-right {
            transform: translateY(0) rotate(9.5deg);
        }
        .hero-envelope-scene.photos-fanned .env-polaroid-left {
            transform: translateY(0) rotate(-10.5deg);
        }
        .env-polaroid-right:hover {
            transform: translateY(-8px) rotate(11deg) scale(1.04) !important;
            z-index: 6;
            box-shadow: 0 18px 32px rgba(0, 0, 0, 0.26);
        }
        .env-polaroid-left:hover {
            transform: translateY(-8px) rotate(-12deg) scale(1.04) !important;
            z-index: 6;
            box-shadow: 0 18px 32px rgba(0, 0, 0, 0.26);
        }

        /* Envelope Front Left & Right Flaps */
        .env-side-flaps {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 170px;
            z-index: 4;
            pointer-events: none;
            border-radius: 0 0 8px 8px;
            overflow: hidden;
        }
        .env-flap-left {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #839a73 0%, #738b64 100%);
            clip-path: polygon(0 0, 53% 56%, 0 100%);
        }
        .env-flap-right {
            position: absolute;
            inset: 0;
            background: linear-gradient(225deg, #809770 0%, #6f8760 100%);
            clip-path: polygon(100% 0, 47% 56%, 100% 100%);
        }
        /* Envelope Front Bottom Triangle Flap */
        .env-flap-bottom {
            position: absolute;
            inset: 0;
            background: linear-gradient(0deg, #6d845e 0%, #7c936d 100%);
            clip-path: polygon(0 100%, 50% 42%, 100% 100%);
            filter: drop-shadow(0 -3px 5px rgba(0, 0, 0, 0.14));
        }
        /* Subtle Diagonal Fold Crease Lines */
        .env-crease-lines {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        /* 3D Gold Wax Seal Stamp */
        .wax-seal-btn {
            position: absolute;
            bottom: 72px;
            left: 50%;
            transform: translateX(-50%);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            z-index: 5;
            background: radial-gradient(circle at 32% 30%, #f7dc8c 0%, #d4a445 45%, #a87620 85%, #875b12 100%);
            box-shadow: 
                0 4px 10px rgba(0, 0, 0, 0.32),
                inset 0 2px 3px rgba(255, 248, 214, 0.8),
                inset 0 -2px 4px rgba(102, 66, 9, 0.85);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .wax-seal-btn:hover {
            transform: translateX(-50%) scale(1.08);
        }
        .wax-seal-inner {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: 1.5px solid rgba(133, 88, 16, 0.55);
            box-shadow: inset 0 1px 3px rgba(92, 59, 6, 0.55), 0 1px 1px rgba(255, 240, 185, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Olive-Sage Arch Dome Section ("THÔNG TIN LỄ CƯỚI") */
        .olive-arch-section {
            background: linear-gradient(180deg, #798f6a 0%, #6f8660 40%, #637955 100%);
            border-top-left-radius: 50% 145px;
            border-top-right-radius: 50% 145px;
            box-shadow: 0 -10px 30px rgba(77, 97, 71, 0.12);
        }

        /* Equalizer Sound Bars Animation (Bottom Right Button) */
        @keyframes eqBar1 {
            0%, 100% { height: 14px; }
            50% { height: 5px; }
        }
        @keyframes eqBar2 {
            0%, 100% { height: 7px; }
            50% { height: 15px; }
        }
        @keyframes eqBar3 {
            0%, 100% { height: 4px; }
            50% { height: 10px; }
        }
        @keyframes eqBar4 {
            0%, 100% { height: 11px; }
            50% { height: 5px; }
        }
        .eq-bars-playing .bar-1 { animation: eqBar1 0.8s ease-in-out infinite; }
        .eq-bars-playing .bar-2 { animation: eqBar2 0.7s ease-in-out infinite; }
        .eq-bars-playing .bar-3 { animation: eqBar3 0.9s ease-in-out infinite; }
        .eq-bars-playing .bar-4 { animation: eqBar4 0.75s ease-in-out infinite; }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f4f7f5;
        }
        ::-webkit-scrollbar-thumb {
            background: #6b8e78;
            border-radius: 3px;
        }
    </style>
</head>
<body class="min-h-screen selection:bg-botanical-700 selection:text-white">

    <!-- Background Audio -->
    <audio id="weddingAudio" loop preload="auto">
        @if(!empty($weddingCard->music_url))
            <source src="{{ $weddingCard->music_url }}" type="audio/mpeg">
        @endif
        <source src="{{ asset('template01/media/Shane-Filan-Beautiful-In-White-Official-Video.mp3') }}" type="audio/mpeg">
        <source src="https://cdn.pixabay.com/download/audio/2022/05/27/audio_1808fbf07a.mp3?filename=romantic-piano-112191.mp3" type="audio/mpeg">
    </audio>

    <!-- Interactive Falling Eucalyptus Leaves & White Petals Canvas -->
    <canvas id="botanical-canvas" class="fixed inset-0 pointer-events-none z-20"></canvas>

    <!-- 12 Floating Botanical Leaf Elements (Exact ChungĐôi structure) -->
    <div class="floating-botanical-container" id="floating-leaves-layer" aria-hidden="true"></div>

    <!-- ================================================================= -->
    <!-- 1. 3D SPLIT-GATE COVER SCREEN (MÀN HÌNH MỞ THIỆP MINIMALISM XANH) -->
    <!-- ================================================================= -->
    <div id="invitation-gate" class="flex items-center justify-center p-4 sm:p-6">
        <!-- Left & Right Split Curtain Doors -->
        <div class="gate-panel-left">
            <div class="h-full w-full opacity-20 flex items-center justify-end pr-6 select-none">
                <svg class="w-40 h-40 text-botanical-600" viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="1">
                    <path d="M95,50 C70,25 40,20 10,50 C40,80 70,75 95,50 Z" />
                    <path d="M10,50 Q50,50 95,50" />
                </svg>
            </div>
        </div>
        <div class="gate-panel-right">
            <div class="h-full w-full opacity-20 flex items-center justify-start pl-6 select-none">
                <svg class="w-40 h-40 text-botanical-600" viewBox="0 0 100 100" fill="none" stroke="currentColor" stroke-width="1">
                    <path d="M5,50 C30,25 60,20 90,50 C60,80 30,75 5,50 Z" />
                    <path d="M5,50 Q50,50 90,50" />
                </svg>
            </div>
        </div>

        <!-- Center Cover Card (Replicating ChungĐôi Minimalism Xanh Cover DOM) -->
        <div class="gate-cover-card relative z-20 w-full max-w-[430px] paper-texture rounded-[28px] p-7 sm:p-10 text-center minimal-double-frame shadow-[0_25px_70px_rgba(30,53,43,0.22)] overflow-hidden">
            
            <!-- Symmetrical Botanical Corner Illustrations (flower-background) -->
            <div class="flower-background-tl absolute -top-4 -left-4 w-36 h-36 sm:w-44 sm:h-44 pointer-events-none opacity-85">
                <svg viewBox="0 0 200 200" class="w-full h-full">
                    <g fill="none" stroke="#4a6b5b" stroke-width="1.5">
                        <path d="M10,160 Q45,90 140,20" stroke="#2d4a3e" stroke-width="1.8"/>
                        <path d="M25,120 Q10,90 35,70 Q55,85 25,120 Z" fill="#8fa998" fill-opacity="0.35"/>
                        <path d="M55,85 Q40,50 70,35 Q85,60 55,85 Z" fill="#6b8e78" fill-opacity="0.3"/>
                        <path d="M95,52 Q85,22 115,15 Q122,40 95,52 Z" fill="#8fa998" fill-opacity="0.35"/>
                        <path d="M40,115 Q75,130 95,105 Q70,85 40,115 Z" fill="#4a6b5b" fill-opacity="0.22"/>
                        <path d="M75,75 Q110,85 130,62 Q105,45 75,75 Z" fill="#6b8e78" fill-opacity="0.25"/>
                        <circle cx="52" cy="95" r="5" fill="#c5a059" fill-opacity="0.6" stroke="none"/>
                        <circle cx="92" cy="58" r="4" fill="#c5a059" fill-opacity="0.6" stroke="none"/>
                    </g>
                </svg>
            </div>

            <div class="flower-background-br absolute -bottom-4 -right-4 w-36 h-36 sm:w-44 sm:h-44 pointer-events-none opacity-85">
                <svg viewBox="0 0 200 200" class="w-full h-full">
                    <g fill="none" stroke="#4a6b5b" stroke-width="1.5">
                        <path d="M10,160 Q45,90 140,20" stroke="#2d4a3e" stroke-width="1.8"/>
                        <path d="M25,120 Q10,90 35,70 Q55,85 25,120 Z" fill="#8fa998" fill-opacity="0.35"/>
                        <path d="M55,85 Q40,50 70,35 Q85,60 55,85 Z" fill="#6b8e78" fill-opacity="0.3"/>
                        <path d="M95,52 Q85,22 115,15 Q122,40 95,52 Z" fill="#8fa998" fill-opacity="0.35"/>
                        <path d="M40,115 Q75,130 95,105 Q70,85 40,115 Z" fill="#4a6b5b" fill-opacity="0.22"/>
                        <path d="M75,75 Q110,85 130,62 Q105,45 75,75 Z" fill="#6b8e78" fill-opacity="0.25"/>
                        <circle cx="52" cy="95" r="5" fill="#c5a059" fill-opacity="0.6" stroke="none"/>
                        <circle cx="92" cy="58" r="4" fill="#c5a059" fill-opacity="0.6" stroke="none"/>
                    </g>
                </svg>
            </div>

            <!-- Minimalist Botanical Crest -->
            <div class="relative z-10 mx-auto w-16 h-16 rounded-full bg-botanical-100 border border-botanical-400/50 flex items-center justify-center mb-4 shadow-sm">
                <svg class="w-8 h-8 text-botanical-800" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6">
                    <path d="M32 54C32 54 14 40 14 24C14 14 24 10 32 18C40 10 50 14 50 24C50 40 32 54 32 54Z" fill="#e8f0ec"/>
                    <path d="M22 46C28 36 36 28 46 18" stroke="#c5a059" stroke-width="1.5"/>
                </svg>
            </div>

            <p class="relative z-10 text-[11px] uppercase tracking-[0.35em] text-botanical-600 font-semibold mb-3">
                Wedding Invitation
            </p>

            <!-- Exact ChungĐôi Cover Heading Structure: <h1><span>{{ $weddingCard->groom_name }}</span> <span>&</span> <span>{{ $weddingCard->bride_name }}</span></h1> -->
            <h1 class="relative z-10 my-2 flex flex-col items-center justify-center space-y-1">
                <span class="font-pattaya text-4xl sm:text-5xl text-botanical-800 tracking-wide drop-shadow-sm">{{ $weddingCard->groom_name }}</span>
                <span class="font-serif italic text-2xl text-champagne-500 my-0.5">&amp;</span>
                <span class="font-pattaya text-4xl sm:text-5xl text-botanical-800 tracking-wide drop-shadow-sm">{{ $weddingCard->bride_name }}</span>
            </h1>

            <!-- Exact ChungĐôi Ornamental Divider: <div></div><span>❦</span><div></div> -->
            <div class="ornament-divider my-5 relative z-10">
                <div></div>
                <span>❦</span>
                <div></div>
            </div>

            <!-- Wedding Date -->
            <p class="relative z-10 font-serif text-xl sm:text-2xl text-botanical-800 font-semibold tracking-widest mb-5">
                {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->locale('vi')->isoFormat('D [tháng] M, Y') : '19 tháng 12, 2026' }}
            </p>

            <!-- Personalized Guest Invitation Box ("Thân Mời") -->
            <div class="relative z-10 bg-botanical-50/90 border border-botanical-300/80 rounded-2xl px-5 py-3.5 mb-7 max-w-xs mx-auto shadow-inner">
                <p class="text-[11px] uppercase tracking-[0.28em] text-botanical-600 font-semibold mb-1">
                    Thân Mời
                </p>
                <p id="cover-guest-name" class="font-serif text-lg sm:text-xl text-botanical-900 font-bold tracking-wide">
                    Bạn và Gia đình
                </p>
            </div>

            <!-- Exact ChungĐôi Open Invitation Trigger: <a href="?open=1"><span>Mở thiệp</span></a> -->
            <div class="relative z-10">
                <a href="?open=1" id="btn-open-card" onclick="openInvitation(event)" class="btn-botanical px-10 py-3.5 rounded-full font-semibold text-sm tracking-[0.18em] uppercase inline-flex items-center gap-3 cursor-pointer">
                    <i class="fa-regular fa-envelope-open text-base text-champagne-300"></i>
                    <span>Mở thiệp</span>
                </a>
            </div>

            <p class="relative z-10 text-[11px] text-botanical-600/75 mt-4 italic">
                Chạm để mở thiệp &amp; lắng nghe giai điệu tình yêu
            </p>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- 2. MAIN WEDDING INVITATION CONTENT (NỘI DUNG THIỆP CHÍNH)         -->
    <!-- ================================================================= -->
    <main id="main-invitation" class="relative z-10 max-w-[520px] mx-auto shadow-[0_0_80px_rgba(30,53,43,0.18)] paper-texture border-x border-botanical-300/60 overflow-hidden">

        <!-- Sticky Top Bar: Template Info & Guest Name Switcher -->
        {{-- <div class="sticky top-0 z-30 bg-alabaster-100/90 backdrop-blur-md border-b border-botanical-200 px-4 py-2.5 flex items-center justify-between text-xs text-botanical-800">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#768d67]"></span>
                <span>Mẫu thiệp: <strong class="font-semibold text-botanical-900">Minimalism Xanh</strong></span>
            </div>
            <div class="flex items-center gap-3">
                <button onclick="reopenCoverGate()" class="text-botanical-700 hover:text-botanical-950 underline font-medium flex items-center gap-1 cursor-pointer">
                    <i class="fa-regular fa-envelope text-[10px]"></i> Bìa thiệp
                </button>
                <button onclick="openGuestModal()" class="text-botanical-700 hover:text-botanical-950 underline font-medium flex items-center gap-1 cursor-pointer">
                    <i class="fa-solid fa-user-pen text-[10px]"></i> Đổi tên khách
                </button>
            </div>
        </div> --}}

        <!-- ============================================================= -->
        <!-- SECTION 1: HERO BANNER (EXACT 100% MATCH TO REFERENCE IMAGE)  -->
        <!-- ============================================================= -->
        <section class="relative pt-11 pb-4 px-5 text-center overflow-hidden">
            
            <!-- Left & Right Watercolor Botanical Branches Background (Matches Reference Image) -->
            <svg class="absolute left-0 top-12 w-60 h-[560px] pointer-events-none opacity-45 select-none flower-background-tl" viewBox="0 0 260 600" fill="none">
                <!-- Tall Left Watercolor Stem & Leaves -->
                <path d="M-10,590 Q45,440 32,290 T65,80" stroke="#b9c6b2" stroke-width="1.8" fill="none"/>
                <path d="M32,460 Q75,410 105,340" stroke="#c2cebc" stroke-width="1.4" fill="none"/>
                <path d="M30,360 C5,310 15,250 45,220 C68,260 55,320 30,360 Z" fill="#d8e2d2" fill-opacity="0.65"/>
                <path d="M40,260 C15,200 25,130 65,90 C88,140 72,210 40,260 Z" fill="#dfe7da" fill-opacity="0.55"/>
                <path d="M55,440 C85,405 118,395 140,420 C115,450 80,455 55,440 Z" fill="#cedac7" fill-opacity="0.6"/>
                <path d="M38,510 C68,475 110,465 135,492 C105,525 68,530 38,510 Z" fill="#d5e0cf" fill-opacity="0.55"/>
                <path d="M75,380 C100,340 138,325 162,348 C135,382 100,392 75,380 Z" fill="#d8e2d2" fill-opacity="0.5"/>
            </svg>

            <svg class="absolute right-0 bottom-8 w-52 h-72 pointer-events-none opacity-40 select-none" viewBox="0 0 220 300" fill="none">
                <!-- Soft Right Watercolor Leaf Behind Names -->
                <path d="M220,260 Q140,200 70,150" stroke="#c5d0bf" stroke-width="1.5" fill="none"/>
                <path d="M180,210 C130,170 95,120 120,85 C165,105 195,160 180,210 Z" fill="#dce5d7" fill-opacity="0.6"/>
                <path d="M140,235 C85,220 45,190 60,155 C105,160 145,195 140,235 Z" fill="#e2eadc" fill-opacity="0.55"/>
            </svg>

            <!-- 1. "SAVE THE DATE" Header & Delicate Leaf Divider -->
            <div class="relative z-10 reveal-item">
                <h2 class="font-serif text-[18px] sm:text-[20px] uppercase tracking-[0.22em] text-[#556950] font-semibold">
                    SAVE THE DATE
                </h2>
                <div class="thin-leaf-divider mt-3 mb-2">
                    <div class="line line-left"></div>
                    <svg class="w-4 h-3.5 text-[#8a9b84] shrink-0" viewBox="0 0 24 20" fill="currentColor">
                        <path d="M12 18C12 18 7 13 7 7C7 4 9.5 2 12 5C14.5 2 17 4 17 7C17 13 12 18 12 18Z" opacity="0.55"/>
                        <path d="M12 18C12 18 3 15 2 9C1.5 6 4 4.5 7 7C9 9 12 18 12 18Z" opacity="0.8"/>
                        <path d="M12 18C12 18 21 15 22 9C22.5 6 20 4.5 17 7C15 9 12 18 12 18Z" opacity="0.8"/>
                    </svg>
                    <div class="line line-right"></div>
                </div>
            </div>

            <!-- 2. 3D Olive-Sage Envelope with 2 Tilted Polaroid Photos & Gold Wax Seal -->
            <div id="hero-envelope" class="hero-envelope-scene photos-fanned relative z-10 reveal-item">
                <!-- Open Top Triangle Flap -->
                <div class="env-top-flap"></div>

                <!-- Inner Pocket -->
                <div class="env-back-pocket"></div>

                @php
                    $albumDataHero = !empty($weddingCard->album) ? (is_string($weddingCard->album) ? json_decode($weddingCard->album, true) : $weddingCard->album) : [];
                    $firstAlbumImg = (!empty($albumDataHero) && is_array($albumDataHero) && isset($albumDataHero[0])) 
                        ? (str_starts_with($albumDataHero[0], 'http') ? $albumDataHero[0] : asset('storage/' . $albumDataHero[0])) 
                        : null;
                    $secondAlbumImg = (!empty($albumDataHero) && is_array($albumDataHero) && isset($albumDataHero[1])) 
                        ? (str_starts_with($albumDataHero[1], 'http') ? $albumDataHero[1] : asset('storage/' . $albumDataHero[1])) 
                        : null;

                    $groomAvatarSrc = !empty($weddingCard->groom_avatar)
                        ? (str_starts_with($weddingCard->groom_avatar, 'http') ? $weddingCard->groom_avatar : asset('storage/' . $weddingCard->groom_avatar))
                        : (!empty($weddingCard->groom_image)
                            ? (str_starts_with($weddingCard->groom_image, 'http') ? $weddingCard->groom_image : asset('storage/' . $weddingCard->groom_image))
                            : ($secondAlbumImg ?: (!empty($weddingCard->banner_top) 
                                ? (str_starts_with($weddingCard->banner_top, 'http') ? $weddingCard->banner_top : asset('storage/' . $weddingCard->banner_top))
                                : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=700&q=85')));

                    $brideAvatarSrc = !empty($weddingCard->bride_avatar)
                        ? (str_starts_with($weddingCard->bride_avatar, 'http') ? $weddingCard->bride_avatar : asset('storage/' . $weddingCard->bride_avatar))
                        : (!empty($weddingCard->bride_image)
                            ? (str_starts_with($weddingCard->bride_image, 'http') ? $weddingCard->bride_image : asset('storage/' . $weddingCard->bride_image))
                            : ($firstAlbumImg ?: (!empty($weddingCard->banner_preview) 
                                ? (str_starts_with($weddingCard->banner_preview, 'http') ? $weddingCard->banner_preview : asset('storage/' . $weddingCard->banner_preview))
                                : 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=700&q=85')));
                @endphp

                <!-- RIGHT POLAROID: Groom in Black Suit -->
                <div onclick="openSingleImage('{{ $groomAvatarSrc }}')" title="Chạm để phóng to ảnh Chú Rể" class="env-polaroid env-polaroid-right">
                    <div class="w-full h-full overflow-hidden bg-[#ecebe6] relative">
                        <img 
                            src="{{ $groomAvatarSrc }}" 
                            alt="Chú Rể {{ $weddingCard->groom_name }}" 
                            class="w-full h-full object-cover object-top filter contrast-[1.03]"
                            onerror="this.src='https://placehold.co/400x520/e8ece6/2d4a3e?text=Chú+Rể'"
                        >
                    </div>
                </div>

                <!-- LEFT POLAROID: Bride in White Dress -->
                <div onclick="openSingleImage('{{ $brideAvatarSrc }}')" title="Chạm để phóng to ảnh Cô Dâu" class="env-polaroid env-polaroid-left">
                    <div class="w-full h-full overflow-hidden bg-[#f2f1ed] relative">
                        <img 
                            src="{{ $brideAvatarSrc }}" 
                            alt="Cô Dâu {{ $weddingCard->bride_name }}" 
                            class="w-full h-full object-cover object-center"
                            onerror="this.src='https://placehold.co/400x520/f4f7f5/2d4a3e?text=Cô+Dâu'"
                        >
                    </div>
                </div>

                <!-- Front Envelope Flaps (Left, Right, Bottom) -->
                <div class="env-side-flaps">
                    <div class="env-flap-left"></div>
                    <div class="env-flap-right"></div>
                    <div class="env-flap-bottom"></div>
                    <!-- Subtle Envelope Fold Lines -->
                    <svg class="env-crease-lines w-full h-full" viewBox="0 0 300 170" preserveAspectRatio="none">
                        <line x1="0" y1="0" x2="150" y2="95" stroke="rgba(255,255,255,0.22)" stroke-width="1"/>
                        <line x1="300" y1="0" x2="150" y2="95" stroke="rgba(255,255,255,0.22)" stroke-width="1"/>
                        <line x1="0" y1="170" x2="150" y2="72" stroke="rgba(70,90,58,0.28)" stroke-width="1.2"/>
                        <line x1="300" y1="170" x2="150" y2="72" stroke="rgba(70,90,58,0.28)" stroke-width="1.2"/>
                    </svg>
                </div>

                <!-- 3D Embossed Gold Wax Seal with Rose Engraving -->
                <button type="button" onclick="replayEnvelopeAnimation()" title="Chạm vào con dấu sáp vàng" class="wax-seal-btn">
                    <div class="wax-seal-inner">
                        <!-- Embossed Rose & Stem SVG -->
                        <svg class="w-6 h-6 text-[#855810]" viewBox="0 0 32 32" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 15C13 15 11 12.5 11 10C11 7.5 13.5 6 16 6C18.5 6 21 7.5 21 10C21 12.5 19 15 16 15Z" fill="rgba(255,230,150,0.35)"/>
                            <path d="M13.5 10C14.5 8.5 17.5 8.5 18.5 10C17.5 11.8 14.5 11.8 13.5 10Z"/>
                            <path d="M16 15V26"/>
                            <path d="M16 20C13.5 19.5 12 18 11.5 16.5C13.5 16.5 15 17.8 16 20Z" fill="rgba(255,230,150,0.3)"/>
                            <path d="M16 22C18.5 21.5 20 20 20.5 18.5C18.5 18.5 17 19.8 16 22Z" fill="rgba(255,230,150,0.3)"/>
                        </svg>
                    </div>
                </button>
            </div>

            <!-- 3. Couple Names ("{{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}") with Watermark Ampersand -->
            <div class="relative z-10 mt-8 mb-3 py-2 reveal-item">
                <!-- Background Watermark "&" -->
                <span class="font-script text-[6.5rem] sm:text-[7.2rem] text-[#8a9b84]/25 select-none pointer-events-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 leading-none">
                    &amp;
                </span>

                <h1 class="relative z-10 font-serif italic font-semibold text-[42px] sm:text-[48px] text-[#53684d] leading-[1.15] tracking-normal">
                    {{ $weddingCard->groom_name }}
                </h1>
                <div class="h-3 sm:h-4"></div>
                <h1 class="relative z-10 font-serif italic font-semibold text-[42px] sm:text-[48px] text-[#53684d] leading-[1.15] tracking-normal">
                    {{ $weddingCard->bride_name }}
                </h1>
            </div>

            <!-- 4. Bottom Delicate Divider before Arch Section -->
            <div class="thin-leaf-divider my-5 relative z-10 reveal-item">
                <div class="line line-left"></div>
                <svg class="w-4 h-3.5 text-[#8a9b84] shrink-0" viewBox="0 0 24 20" fill="currentColor">
                    <path d="M12 18C12 18 7 13 7 7C7 4 9.5 2 12 5C14.5 2 17 4 17 7C17 13 12 18 12 18Z" opacity="0.55"/>
                    <path d="M12 18C12 18 3 15 2 9C1.5 6 4 4.5 7 7C9 9 12 18 12 18Z" opacity="0.8"/>
                    <path d="M12 18C12 18 21 15 22 9C22.5 6 20 4.5 17 7C15 9 12 18 12 18Z" opacity="0.8"/>
                </svg>
                <div class="line line-right"></div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 2: OLIVE-SAGE ARCH DOME "THÔNG TIN LỄ CƯỚI"           -->
        <!-- (EXACT 100% MATCH TO BOTTOM OF REFERENCE IMAGE)               -->
        <!-- ============================================================= -->
        <section class="olive-arch-section text-white pt-14 pb-12 px-5 sm:px-7 mt-1 relative z-10">
            <!-- Arch Heading -->
            <div class="text-center reveal-item">
                <h2 class="font-serif text-[22px] sm:text-[25px] font-bold uppercase tracking-[0.06em] text-white drop-shadow-sm">
                    THÔNG TIN LỄ CƯỚI
                </h2>
            </div>

            <!-- Two-Column Family Parents Info (Exact Match: Trần Văn Hùng & Nguyễn Văn Nam) -->
            <div class="grid grid-cols-2 gap-2 text-center mt-7 pt-2 pb-6 border-b border-white/20 reveal-item relative">
                <!-- Center Vertical Divider Line -->
                <div class="absolute left-1/2 top-3 bottom-6 w-px bg-white/35 -translate-x-1/2"></div>

                <!-- Left Column: Nhà Trai -->
                <div class="pr-3">
                    <p class="font-serif text-sm sm:text-base text-white/80 mb-1.5">
                        Nhà Trai
                    </p>
                    <p class="font-serif text-[16px] sm:text-[18px] font-bold text-white leading-snug">
                        {{ $weddingCard->groom_father_name ?: ($weddingCard->groom_father ?: 'Trần Văn Hùng') }}
                    </p>
                    <p class="font-serif text-[16px] sm:text-[18px] font-bold text-white leading-snug mt-0.5">
                        {{ $weddingCard->groom_mother_name ?: ($weddingCard->groom_mother ?: 'Lê Thị Hoa') }}
                    </p>
                    <p class="text-[11px] text-white/75 mt-2 leading-relaxed">
                        {{ $weddingCard->address_groom ?: ($weddingCard->groom_address ?: 'Quận 1, TP. Hồ Chí Minh') }}
                    </p>
                </div>

                <!-- Right Column: Nhà Gái -->
                <div class="pl-3">
                    <p class="font-serif text-sm sm:text-base text-white/80 mb-1.5">
                        Nhà Gái
                    </p>
                    <p class="font-serif text-[16px] sm:text-[18px] font-bold text-white leading-snug">
                        {{ $weddingCard->bride_father_name ?: ($weddingCard->bride_father ?: 'Nguyễn Văn Nam') }}
                    </p>
                    <p class="font-serif text-[16px] sm:text-[18px] font-bold text-white leading-snug mt-0.5">
                        {{ $weddingCard->bride_mother_name ?: ($weddingCard->bride_mother ?: 'Phạm Thị Lan') }}
                    </p>
                    <p class="text-[11px] text-white/75 mt-2 leading-relaxed">
                        {{ $weddingCard->address_bride ?: ($weddingCard->bride_address ?: 'Quận 3, TP. Hồ Chí Minh') }}
                    </p>
                </div>
            </div>

            <!-- Formal Wedding Announcement Inside Olive Section -->
            <div class="text-center space-y-3 mt-7 reveal-item">
                <p class="text-xs sm:text-sm text-white/90 uppercase tracking-[0.2em]">
                    Trân trọng báo tin Lễ Thành Hôn của hai con chúng tôi
                </p>

                <div class="py-3">
                    <h3 class="font-serif italic text-3xl sm:text-4xl font-semibold text-white">{{ $weddingCard->groom_name }}</h3>
                    <span class="inline-block my-1.5 text-champagne-300 font-serif text-xl">&amp;</span>
                    <h3 class="font-serif italic text-3xl sm:text-4xl font-semibold text-white">{{ $weddingCard->bride_name }}</h3>
                </div>

                <!-- Personalized Guest Invitation Callout -->
                <div class="bg-white/12 backdrop-blur-sm border border-white/30 rounded-2xl p-4 sm:p-5 mt-3 max-w-md mx-auto">
                    <p class="text-[11px] uppercase tracking-[0.28em] text-champagne-300 font-semibold">
                        Trân Trọng Kính Mời
                    </p>
                    <p id="inner-guest-name" class="font-serif text-xl sm:text-2xl font-bold text-white my-1.5">
                        Bạn và Gia đình
                    </p>
                    <p class="text-xs text-white/85 leading-relaxed">
                        Đến dự bữa tiệc thân mật chung vui cùng gia đình chúng tôi vào ngày <strong class="text-white">{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->locale('vi')->isoFormat('D [tháng] M, Y') : '19 tháng 12, 2026' }}</strong>. Sự hiện diện của Quý khách là niềm vinh hạnh lớn lao!
                    </p>
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 3: LỊCH & ĐỒNG HỒ ĐẾM NGƯỢC            -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8 text-center">
            @php
                $cal = $weddingCard->calendar_matrix;
                $leadEmpty = ($cal['start_day_of_week'] == 0) ? 6 : ($cal['start_day_of_week'] - 1);
            @endphp
            <div class="reveal-item">
                <p class="text-[11px] uppercase tracking-[0.3em] text-botanical-600 font-semibold mb-1">Save The Date</p>
                <h3 class="font-serif text-3xl sm:text-4xl text-botanical-900 font-semibold">{{ $cal['month_title'] }}</h3>
                <div class="ornament-divider my-3">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>
            </div>

            <!-- Calendar Card -->
            <div class="bg-white/95 border border-botanical-200 rounded-3xl p-5 sm:p-6 shadow-lg mt-4 reveal-item">
                <!-- Days of week header -->
                <div class="grid grid-cols-7 gap-1 text-xs font-semibold text-botanical-700 border-b border-botanical-200 pb-2.5 mb-3">
                    <div>T2</div>
                    <div>T3</div>
                    <div>T4</div>
                    <div>T5</div>
                    <div>T6</div>
                    <div class="text-botanical-800 font-bold">T7</div>
                    <div class="text-champagne-600">CN</div>
                </div>

                <!-- Calendar Grid -->
                <div class="grid grid-cols-7 gap-y-2.5 gap-x-1 text-xs sm:text-sm text-botanical-800 items-center">
                    @for ($i = 0; $i < $leadEmpty; $i++)
                        <div></div>
                    @endfor
                    @for ($d = 1; $d <= $cal['total_days']; $d++)
                        @if ($d == $cal['active_day'])
                            <div class="relative flex items-center justify-center py-1">
                                <span class="w-9 h-9 rounded-full bg-botanical-800 text-white font-bold flex items-center justify-center shadow-md animate-pulse-heart relative">
                                    {{ $d }}
                                    <i class="fa-solid fa-heart text-[10px] text-champagne-400 absolute -top-1 -right-1"></i>
                                </span>
                            </div>
                        @else
                            <div class="py-1 {{ ($leadEmpty + $d) % 7 == 0 ? 'text-champagne-600' : '' }}">{{ $d }}</div>
                        @endif
                    @endfor
                </div>

                <!-- Live Countdown Timer -->
                <div class="mt-6 pt-5 border-t border-botanical-200">
                    <p id="countdown-label" class="text-[11px] uppercase tracking-[0.22em] text-botanical-600 font-semibold mb-3">
                        Đếm ngược đến ngày chung đôi ({{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '19.12.2026' }})
                    </p>
                    <div class="grid grid-cols-4 gap-2.5">
                        <div class="bg-botanical-50 border border-botanical-200 rounded-2xl py-2.5 px-1">
                            <span id="cd-days" class="block font-serif text-2xl sm:text-3xl font-bold text-botanical-800">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-botanical-600">Ngày</span>
                        </div>
                        <div class="bg-botanical-50 border border-botanical-200 rounded-2xl py-2.5 px-1">
                            <span id="cd-hours" class="block font-serif text-2xl sm:text-3xl font-bold text-botanical-800">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-botanical-600">Giờ</span>
                        </div>
                        <div class="bg-botanical-50 border border-botanical-200 rounded-2xl py-2.5 px-1">
                            <span id="cd-mins" class="block font-serif text-2xl sm:text-3xl font-bold text-botanical-800">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-botanical-600">Phút</span>
                        </div>
                        <div class="bg-botanical-50 border border-botanical-200 rounded-2xl py-2.5 px-1">
                            <span id="cd-secs" class="block font-serif text-2xl sm:text-3xl font-bold text-botanical-800">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-botanical-600">Giây</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 4: SỰ KIỆN CƯỚI (NHÀ TRAI & NHÀ GÁI) & DRESSCODE     -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8">
            <div class="text-center mb-6 reveal-item">
                <p class="text-[11px] uppercase tracking-[0.3em] text-botanical-600 font-semibold mb-1">Wedding Timeline</p>
                <h3 class="font-serif text-3xl sm:text-4xl text-botanical-900 font-semibold">Thông Tin Tiệc Cưới</h3>
                <div class="ornament-divider my-3">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>
            </div>

            @php
                // 1. Dữ liệu Tiệc Cưới Nhà Trai
                $groomPartyDate = $weddingCard->groom_eating_date ?: $weddingCard->wedding_date;
                $groomPartyTime = $weddingCard->time_groom ?: ($weddingCard->wedding_time ?: '11:00');
                $groomPartyDayOfWeek = $groomPartyDate ? mb_strtoupper($groomPartyDate->locale('vi')->isoFormat('dddd')) : 'THỨ BẢY';
                $groomPartyDay = $groomPartyDate ? $groomPartyDate->format('d/m/Y') : '19/12/2026';
                $groomPartyLunar = $weddingCard->time_groom_al ?: ($weddingCard->wedding_date_al ?: ($weddingCard->wedding_date_lunar ?: '11/11 Bính Ngọ'));
                $groomVenueAddress = $weddingCard->address_groom ?: ($weddingCard->address_wedding ?: 'Tư gia Nhà Trai');
                $groomMapUrl = !empty($weddingCard->groom_map)
                    ? $weddingCard->groom_map
                    : (!empty($weddingCard->address_wedding_map)
                        ? $weddingCard->address_wedding_map
                        : ('https://www.google.com/maps/search/?api=1&query=' . urlencode($groomVenueAddress)));

                // 2. Dữ liệu Tiệc Cưới Nhà Gái
                $bridePartyDate = $weddingCard->bride_eating_date ?: $weddingCard->wedding_date;
                $bridePartyTime = $weddingCard->time_bride ?: ($weddingCard->wedding_time ?: '11:00');
                $bridePartyDayOfWeek = $bridePartyDate ? mb_strtoupper($bridePartyDate->locale('vi')->isoFormat('dddd')) : 'THỨ BẢY';
                $bridePartyDay = $bridePartyDate ? $bridePartyDate->format('d/m/Y') : '19/12/2026';
                $bridePartyLunar = $weddingCard->time_bride_al ?: ($weddingCard->wedding_date_al ?: ($weddingCard->wedding_date_lunar ?: '11/11 Bính Ngọ'));
                $brideVenueAddress = $weddingCard->address_bride ?: ($weddingCard->address_wedding ?: 'Tư gia Nhà Gái');
                $brideMapUrl = !empty($weddingCard->bride_map)
                    ? $weddingCard->bride_map
                    : (!empty($weddingCard->address_wedding_map)
                        ? $weddingCard->address_wedding_map
                        : ('https://www.google.com/maps/search/?api=1&query=' . urlencode($brideVenueAddress)));
            @endphp

            <div class="space-y-4">
                <!-- Event 1: Tiệc Cưới Nhà Trai -->
                <div class="bg-white/95 rounded-3xl p-5 sm:p-6 border border-botanical-200 shadow-md reveal-item">
                    <div class="flex items-start justify-between gap-3 border-b border-botanical-100 pb-3 mb-3.5">
                        <div>
                            <span class="inline-block px-3 py-0.5 rounded-full bg-botanical-100 text-botanical-800 text-[10px] uppercase tracking-wider font-semibold mb-1">
                                Nhà Trai
                            </span>
                            <h4 class="font-serif text-2xl font-bold text-botanical-900">{{ $weddingCard->groom_eating_title ?: 'Tiệc Cưới Nhà Trai' }}</h4>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-botanical-50 border border-botanical-300 flex items-center justify-center text-botanical-700">
                            <i class="fa-solid fa-ring"></i>
                        </div>
                    </div>

                    <div class="space-y-2 text-xs sm:text-sm text-botanical-800">
                        <div class="flex items-center gap-2.5">
                            <i class="fa-regular fa-clock text-botanical-600 w-4 text-center"></i>
                            <span><strong>{{ $groomPartyTime }} {{ $groomPartyDayOfWeek }}</strong> — Ngày {{ $groomPartyDay }} (Tức {{ $groomPartyLunar }})</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <i class="fa-solid fa-location-dot text-botanical-600 w-4 text-center mt-1"></i>
                            <div>
                                <p class="font-semibold text-botanical-900">Địa điểm tổ chức</p>
                                <p class="text-xs text-botanical-600">{{ $groomVenueAddress }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid {{ !empty($weddingCard->groom_phone) ? 'grid-cols-2' : 'grid-cols-1' }} gap-2.5 mt-4">
                        <a href="{{ $groomMapUrl }}" target="_blank" rel="noopener noreferrer" class="py-2.5 px-3 rounded-xl bg-botanical-800 hover:bg-botanical-700 text-white text-xs font-medium flex items-center justify-center gap-1.5 transition cursor-pointer">
                            <i class="fa-solid fa-map-location-dot"></i> Xem Bản Đồ
                        </a>
                        @if(!empty($weddingCard->groom_phone))
                            <a href="tel:{{ $weddingCard->groom_phone }}" class="py-2.5 px-3 rounded-xl border border-botanical-600 text-botanical-800 hover:bg-botanical-50 text-xs font-medium flex items-center justify-center gap-1.5 transition cursor-pointer">
                                <i class="fa-solid fa-phone"></i> Liên hệ: {{ $weddingCard->groom_phone }}
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Event 2: Tiệc Cưới Nhà Gái -->
                <div class="bg-white/95 rounded-3xl p-5 sm:p-6 border border-botanical-200 shadow-md reveal-item">
                    <div class="flex items-start justify-between gap-3 border-b border-botanical-100 pb-3 mb-3.5">
                        <div>
                            <span class="inline-block px-3 py-0.5 rounded-full bg-botanical-100 text-botanical-800 text-[10px] uppercase tracking-wider font-semibold mb-1">
                                Nhà Gái
                            </span>
                            <h4 class="font-serif text-2xl font-bold text-botanical-900">{{ $weddingCard->bride_eating_title ?: 'Tiệc Cưới Nhà Gái' }}</h4>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-botanical-50 border border-botanical-300 flex items-center justify-center text-botanical-700">
                            <i class="fa-solid fa-leaf"></i>
                        </div>
                    </div>

                    <div class="space-y-2 text-xs sm:text-sm text-botanical-800">
                        <div class="flex items-center gap-2.5">
                            <i class="fa-regular fa-clock text-botanical-600 w-4 text-center"></i>
                            <span><strong>{{ $bridePartyTime }} {{ $bridePartyDayOfWeek }}</strong> — Ngày {{ $bridePartyDay }} (Tức {{ $bridePartyLunar }})</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <i class="fa-solid fa-location-dot text-botanical-600 w-4 text-center mt-1"></i>
                            <div>
                                <p class="font-semibold text-botanical-900">Địa điểm tổ chức</p>
                                <p class="text-xs text-botanical-600">{{ $brideVenueAddress }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid {{ !empty($weddingCard->bride_phone) ? 'grid-cols-2' : 'grid-cols-1' }} gap-2.5 mt-4">
                        <a href="{{ $brideMapUrl }}" target="_blank" rel="noopener noreferrer" class="py-2.5 px-3 rounded-xl bg-botanical-800 hover:bg-botanical-700 text-white text-xs font-medium flex items-center justify-center gap-1.5 transition cursor-pointer">
                            <i class="fa-solid fa-map-location-dot"></i> Xem Bản Đồ
                        </a>
                        @if(!empty($weddingCard->bride_phone))
                            <a href="tel:{{ $weddingCard->bride_phone }}" class="py-2.5 px-3 rounded-xl border border-botanical-600 text-botanical-800 hover:bg-botanical-50 text-xs font-medium flex items-center justify-center gap-1.5 transition cursor-pointer">
                                <i class="fa-solid fa-phone"></i> Liên hệ: {{ $weddingCard->bride_phone }}
                            </a>
                        @endif
                    </div>
                </div>

                @if(!empty($weddingCard->wedding_location))
                <!-- Event 3: Tiệc Cưới Trung Tâm / Nhà Hàng (Nếu có) -->
                <div class="bg-white/95 rounded-3xl p-5 sm:p-6 border border-botanical-200 shadow-md reveal-item">
                    <div class="flex items-start justify-between gap-3 border-b border-botanical-100 pb-3 mb-3.5">
                        <div>
                            <span class="inline-block px-3 py-0.5 rounded-full bg-botanical-800 text-white text-[10px] uppercase tracking-wider font-semibold mb-1">
                                Tiệc Cưới Chính
                            </span>
                            <h4 class="font-serif text-2xl font-bold text-botanical-900">{{ $weddingCard->wedding_location }}</h4>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-botanical-50 border border-botanical-300 flex items-center justify-center text-botanical-700">
                            <i class="fa-solid fa-champagne-glasses"></i>
                        </div>
                    </div>

                    <div class="space-y-2 text-xs sm:text-sm text-botanical-800">
                        <div class="flex items-center gap-2.5">
                            <i class="fa-regular fa-clock text-botanical-600 w-4 text-center"></i>
                            <span><strong>{{ $weddingCard->wedding_time ?: '18:00' }}</strong> — Ngày {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d/m/Y') : '19/12/2026' }}@if($weddingCard->guest_welcome_time) (Đón khách: {{ $weddingCard->guest_welcome_time }})@endif</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <i class="fa-solid fa-location-dot text-botanical-600 w-4 text-center mt-1"></i>
                            <div>
                                <p class="font-semibold text-botanical-900">{{ $weddingCard->wedding_location }}</p>
                                <p class="text-xs text-botanical-600">{{ $weddingCard->wedding_address ?: '' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ $weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode(($weddingCard->wedding_location ?: '') . ' ' . ($weddingCard->wedding_address ?: ''))) }}" target="_blank" rel="noopener noreferrer" class="w-full py-2.5 px-3 rounded-xl bg-botanical-800 hover:bg-botanical-700 text-white text-xs font-medium flex items-center justify-center gap-1.5 transition cursor-pointer">
                            <i class="fa-solid fa-map-location-dot"></i> Xem Bản Đồ Trung Tâm Tiệc Cưới
                        </a>
                    </div>
                </div>
                @endif
            </div>

            <!-- Minimalist Dresscode Palette -->
            <div class="bg-botanical-50/90 border border-botanical-200 rounded-2xl p-4 mt-5 text-center reveal-item">
                <p class="text-[11px] uppercase tracking-[0.25em] text-botanical-700 font-semibold mb-2">
                    {{ $weddingCard->dresscode_note ?: 'Dresscode Gợi Ý' }}
                </p>
                <div class="flex items-center justify-center gap-3 my-2 flex-wrap">
                    @if (!empty($weddingCard->dresscode_colors_list) && count($weddingCard->dresscode_colors_list) > 0)
                        @foreach ($weddingCard->dresscode_colors_list as $color)
                            <div class="flex flex-col items-center gap-1">
                                <span class="w-8 h-8 rounded-full border border-white shadow" style="background-color: {{ $color['hex'] }};"></span>
                                <span class="text-[10px] text-botanical-700">{{ $color['name'] ?? '' }}</span>
                            </div>
                        @endforeach
                    @else
                        <div class="flex flex-col items-center gap-1">
                            <span class="w-8 h-8 rounded-full bg-[#2d4a3e] border border-white shadow"></span>
                            <span class="text-[10px] text-botanical-700">Forest</span>
                        </div>
                        <div class="flex flex-col items-center gap-1">
                            <span class="w-8 h-8 rounded-full bg-[#8fa998] border border-white shadow"></span>
                            <span class="text-[10px] text-botanical-700">Sage</span>
                        </div>
                        <div class="flex flex-col items-center gap-1">
                            <span class="w-8 h-8 rounded-full bg-[#f5f2eb] border border-botanical-300 shadow"></span>
                            <span class="text-[10px] text-botanical-700">Cream</span>
                        </div>
                        <div class="flex flex-col items-center gap-1">
                            <span class="w-8 h-8 rounded-full bg-[#d4b87a] border border-white shadow"></span>
                            <span class="text-[10px] text-botanical-700">Champagne</span>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 5: CHUYỆN TÌNH YÊU (LOVE STORY TIMELINE)              -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8">
            <div class="text-center mb-7 reveal-item">
                <p class="text-[11px] uppercase tracking-[0.3em] text-botanical-600 font-semibold mb-1">Our Love Story</p>
                <h3 class="font-serif text-3xl sm:text-4xl text-botanical-900 font-semibold">Chuyện Tình Yêu</h3>
                <div class="ornament-divider my-3">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>
            </div>

            @if (!empty($weddingCard->timeline_list) && count($weddingCard->timeline_list) > 0)
                <div class="relative border-l border-botanical-400/60 ml-4 pl-6 space-y-6">
                    @foreach ($weddingCard->timeline_list as $item)
                        <div class="relative reveal-item">
                            <span class="absolute -left-[33px] top-1 w-5 h-5 rounded-full bg-botanical-700 text-white flex items-center justify-center text-[10px] shadow">
                                <i class="fa-solid fa-heart"></i>
                            </span>
                            <div class="bg-white/90 border border-botanical-200 rounded-2xl p-4 shadow-sm">
                                <span class="text-[11px] uppercase tracking-widest text-botanical-600 font-semibold">{{ $item['time'] ?? '' }}</span>
                                <h4 class="font-serif text-xl text-botanical-900 font-bold mt-0.5">{{ $item['title'] ?? '' }}</h4>
                                @if(!empty($item['description']))
                                    <p class="text-xs text-botanical-700 mt-1.5 leading-relaxed">{{ $item['description'] }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="relative border-l border-botanical-400/60 ml-4 pl-6 space-y-6">
                    <!-- Milestone 1 -->
                    <div class="relative reveal-item">
                        <span class="absolute -left-[33px] top-1 w-5 h-5 rounded-full bg-botanical-700 text-white flex items-center justify-center text-[10px] shadow">
                            <i class="fa-solid fa-seedling"></i>
                        </span>
                        <div class="bg-white/90 border border-botanical-200 rounded-2xl p-4 shadow-sm">
                            <span class="text-[11px] uppercase tracking-widest text-botanical-600 font-semibold">Mùa Xuân, 2023</span>
                            <h4 class="font-serif text-xl text-botanical-900 font-bold mt-0.5">Lần Đầu Gặp Gỡ</h4>
                            <p class="text-xs text-botanical-700 mt-1.5 leading-relaxed">
                                Một buổi sáng cuối tuần đầy nắng tại xưởng gốm nhỏ ở Thảo Điền, ánh mắt tình cờ chạm nhau giữa hương trà nhài dịu nhẹ.
                            </p>
                        </div>
                    </div>

                    <!-- Milestone 2 -->
                    <div class="relative reveal-item">
                        <span class="absolute -left-[33px] top-1 w-5 h-5 rounded-full bg-botanical-700 text-white flex items-center justify-center text-[10px] shadow">
                            <i class="fa-solid fa-heart"></i>
                        </span>
                        <div class="bg-white/90 border border-botanical-200 rounded-2xl p-4 shadow-sm">
                            <span class="text-[11px] uppercase tracking-widest text-botanical-600 font-semibold">Tháng 08, 2024</span>
                            <h4 class="font-serif text-xl text-botanical-900 font-bold mt-0.5">Chuyến Đi Đà Lạt Đáng Nhớ</h4>
                            <p class="text-xs text-botanical-700 mt-1.5 leading-relaxed">
                                Cùng nhau đón bình minh giữa rừng thông mờ sương, hai đứa nhận ra bình yên chẳng ở đâu xa mà chính là ở cạnh người kia.
                            </p>
                        </div>
                    </div>

                    <!-- Milestone 3 -->
                    <div class="relative reveal-item">
                        <span class="absolute -left-[33px] top-1 w-5 h-5 rounded-full bg-botanical-700 text-white flex items-center justify-center text-[10px] shadow">
                            <i class="fa-solid fa-gem"></i>
                        </span>
                        <div class="bg-white/90 border border-botanical-200 rounded-2xl p-4 shadow-sm">
                            <span class="text-[11px] uppercase tracking-widest text-botanical-600 font-semibold">{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->locale('vi')->isoFormat('D [Tháng] M, Y') : '19 Tháng 12, 2026' }}</span>
                            <h4 class="font-serif text-xl text-botanical-900 font-bold mt-0.5">Về Chung Một Nhà</h4>
                            <p class="text-xs text-botanical-700 mt-1.5 leading-relaxed">
                                Khép lại hành trình hẹn hò ngọt ngào để mở ra chương mới mang tên Gia Đình với sự chúc phúc của hai bên nội ngoại.
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </section>

        @php
            $albumData = !empty($weddingCard->album) ? (is_string($weddingCard->album) ? json_decode($weddingCard->album, true) : $weddingCard->album) : [];
            $albumList = [];
            if (!empty($albumData) && is_array($albumData)) {
                foreach ($albumData as $item) {
                    if (!empty($item)) {
                        $albumList[] = str_starts_with($item, 'http') ? $item : asset('storage/' . $item);
                    }
                }
            }
        @endphp

        <!-- ============================================================= -->
        <!-- SECTION 6: ALBUM HÌNH CƯỚI (INTERACTIVE CAROUSEL & LIGHTBOX)  -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8">
            <div class="text-center mb-6 reveal-item">
                <p class="text-[11px] uppercase tracking-[0.3em] text-botanical-600 font-semibold mb-1">Sweet Moments</p>
                <h3 class="font-serif text-3xl sm:text-4xl text-botanical-900 font-semibold">Album Hình Cưới</h3>
                <div class="ornament-divider my-3">
                    <div></div>
                    <span>❦</span>
                    <div></div>
                </div>
            </div>

            @php
                $albumCoverSrc = !empty($albumList) && count($albumList) > 0
                    ? $albumList[0]
                    : (!empty($weddingCard->cover_image)
                        ? (str_starts_with($weddingCard->cover_image, 'http') ? $weddingCard->cover_image : asset('storage/' . $weddingCard->cover_image))
                        : 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1000&q=80');
            @endphp

            <!-- Interactive Main Slider with 1 / 6 Counter -->
            <div class="reveal-item max-w-xl mx-auto">
                <div id="carousel-viewport" class="relative rounded-3xl overflow-hidden border-2 border-botanical-200 shadow-xl bg-botanical-950 aspect-[3/4] group">
                    <img 
                        id="carousel-main-img" 
                        onclick="openLightbox(currentSlideIndex)"
                        src="{{ $albumCoverSrc }}" 
                        alt="Album ảnh cưới {{ $weddingCard->couple_name }}" 
                        class="w-full h-full object-cover transition-all duration-500 cursor-pointer"
                    >

                    <!-- Slide Counter Badge (Exact "1 / 6" format) -->
                    <div id="carousel-counter" class="absolute top-4 right-4 px-3.5 py-1 rounded-full bg-black/55 backdrop-blur-sm text-white text-xs font-medium tracking-widest select-none">
                        1 / 6
                    </div>

                    <!-- Fullscreen Trigger Badge -->
                    <button onclick="openLightbox(currentSlideIndex)" title="Phóng to ảnh" class="absolute top-4 left-4 w-9 h-9 rounded-full bg-black/45 hover:bg-black/70 text-white flex items-center justify-center transition cursor-pointer">
                        <i class="fa-solid fa-expand text-xs"></i>
                    </button>

                    <!-- Prev / Next Arrows -->
                    <button onclick="stepCarousel(-1)" aria-label="Ảnh trước" class="absolute left-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/85 hover:bg-white text-botanical-900 shadow-lg flex items-center justify-center transition cursor-pointer">
                        <i class="fa-solid fa-chevron-left text-sm"></i>
                    </button>
                    <button onclick="stepCarousel(1)" aria-label="Ảnh tiếp" class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/85 hover:bg-white text-botanical-900 shadow-lg flex items-center justify-center transition cursor-pointer">
                        <i class="fa-solid fa-chevron-right text-sm"></i>
                    </button>
                </div>

                <!-- Thumbnail Strip -->
                <div id="carousel-thumbs" class="flex gap-2.5 overflow-x-auto py-2 px-1 mt-3 scrollbar-none justify-center">
                    <!-- Populated dynamically by JS -->
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 7: XÁC NHẬN THAM DỰ (RSVP) & SỔ LƯU BÚT               -->
        <!-- ============================================================= -->
        <section id="rsvp-section" class="px-4 sm:px-6 py-8">
            <div class="bg-white/95 rounded-3xl p-6 sm:p-7 border border-botanical-200 shadow-lg reveal-item">
                <div class="text-center mb-5">
                    <span class="text-botanical-600 font-serif text-2xl">❦</span>
                    <h3 class="font-serif text-2xl sm:text-3xl font-bold text-botanical-900 mt-1">
                        Sổ Lưu Bút &amp; Xác Nhận Tham Dự
                    </h3>
                    <p class="text-xs text-botanical-600 mt-1">
                        Gửi lời chúc tốt đẹp nhất đến {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }} nhân ngày trọng đại
                    </p>
                </div>

                <form id="rsvp-form" onsubmit="submitRSVP(event)" class="space-y-3.5 text-xs sm:text-sm">
                    <div>
                        <label class="block font-semibold text-botanical-900 mb-1">Tên của bạn *</label>
                        <input type="text" id="rsvp-name" required placeholder="Nhập họ và tên của bạn..." class="w-full px-3.5 py-2.5 rounded-xl border border-botanical-300 bg-botanical-50/40 focus:outline-none focus:ring-2 focus:ring-botanical-600">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block font-semibold text-botanical-900 mb-1">Khách mời của</label>
                            <select id="rsvp-side" class="w-full px-3 py-2.5 rounded-xl border border-botanical-300 bg-botanical-50/40 focus:outline-none">
                                <option value="Nhà Trai">Nhà Trai</option>
                                <option value="Nhà Gái">Nhà Gái</option>
                                <option value="Bạn chung hai bên">Bạn chung</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-semibold text-botanical-900 mb-1">Số người tham dự</label>
                            <select id="rsvp-guests" class="w-full px-3 py-2.5 rounded-xl border border-botanical-300 bg-botanical-50/40 focus:outline-none">
                                <option value="1 người">1 người</option>
                                <option value="2 người">2 người</option>
                                <option value="Đi cùng gia đình">Gia đình</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-botanical-900 mb-1">Xác nhận tham dự</label>
                        <div class="grid grid-cols-2 gap-2.5">
                            <label class="flex items-center gap-2 p-2.5 rounded-xl border border-botanical-300 bg-botanical-50/40 cursor-pointer">
                                <input type="radio" name="attendance" value="Sẽ tham dự" checked class="accent-botanical-800">
                                <span>Chắc chắn tham dự</span>
                            </label>
                            <label class="flex items-center gap-2 p-2.5 rounded-xl border border-botanical-300 bg-botanical-50/40 cursor-pointer">
                                <input type="radio" name="attendance" value="Xin phép vắng mặt" class="accent-botanical-800">
                                <span>Bận mất rồi</span>
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-botanical-900 mb-1">Lời chúc gửi tới Cô Dâu &amp; Chú Rể *</label>
                        <textarea id="rsvp-wish" rows="3" required placeholder="Chúc {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }} trăm năm hạnh phúc..." class="w-full px-3.5 py-2.5 rounded-xl border border-botanical-300 bg-botanical-50/40 focus:outline-none focus:ring-2 focus:ring-botanical-600"></textarea>
                    </div>

                    <button type="submit" class="btn-botanical w-full py-3.5 rounded-xl font-semibold uppercase tracking-wider text-xs sm:text-sm cursor-pointer flex items-center justify-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i> Gửi Lời Chúc &amp; Xác Nhận
                    </button>
                </form>

                <!-- Sổ Lưu Bút (Live Wishes Feed) -->
                <div class="mt-7 pt-5 border-t border-botanical-200">
                    <div class="flex items-center justify-between mb-3">
                        <h4 class="font-serif text-xl font-bold text-botanical-900">Lời Chúc Từ Người Thương</h4>
                        <span id="wish-count-badge" class="text-xs px-2.5 py-0.5 rounded-full bg-botanical-100 text-botanical-800 font-semibold">3 lời chúc</span>
                    </div>
                    <div id="wishes-list" class="space-y-3 max-h-64 overflow-y-auto pr-1">
                        <!-- Populated by JS -->
                    </div>
                </div>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- SECTION 8: HỘP MỪNG CƯỚI (WEDDING GIFT / QR CODE)             -->
        <!-- ============================================================= -->
        <section class="px-4 sm:px-6 py-8 text-center">
            <div class="bg-gradient-to-br from-botanical-800 via-botanical-900 to-botanical-950 text-alabaster-50 rounded-3xl p-6 sm:p-8 shadow-xl reveal-item relative overflow-hidden">
                <div class="w-14 h-14 mx-auto rounded-full bg-white/10 border border-champagne-400/50 flex items-center justify-center text-champagne-300 text-2xl mb-3">
                    <i class="fa-solid fa-gift"></i>
                </div>
                <h3 class="font-serif text-3xl text-white font-semibold">Hộp Mừng Cưới</h3>
                <p class="text-xs text-botanical-100/85 max-w-xs mx-auto mt-2 leading-relaxed">
                    Cảm ơn tình cảm yêu thương của bạn dành cho {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}. Bạn có thể gửi quà mừng trực tuyến qua mã QR bên dưới:
                </p>
                <button onclick="toggleGiftModal(true)" class="mt-5 px-7 py-3 rounded-full bg-champagne-400 hover:bg-champagne-300 text-botanical-950 text-xs sm:text-sm font-bold uppercase tracking-wider inline-flex items-center gap-2 transition shadow-lg cursor-pointer">
                    <i class="fa-solid fa-qrcode"></i> Mở Hộp Mừng Cưới (QR)
                </button>
            </div>
        </section>

        <!-- ============================================================= -->
        <!-- FOOTER                                                        -->
        <!-- ============================================================= -->
        <footer class="relative py-12 px-6 text-center border-t border-botanical-200 bg-botanical-50/70 overflow-hidden">
            <div class="flower-background-br absolute -bottom-5 -right-5 w-32 h-32 pointer-events-none opacity-60">
                <svg viewBox="0 0 200 200" class="w-full h-full">
                    <g fill="none" stroke="#4a6b5b" stroke-width="1.5">
                        <path d="M10,160 Q45,90 140,20" stroke="#2d4a3e" stroke-width="1.8"/>
                        <path d="M25,120 Q10,90 35,70 Q55,85 25,120 Z" fill="#8fa998" fill-opacity="0.35"/>
                        <path d="M55,85 Q40,50 70,35 Q85,60 55,85 Z" fill="#6b8e78" fill-opacity="0.3"/>
                    </g>
                </svg>
            </div>

            <div class="text-2xl text-botanical-600 font-serif mb-2 select-none">❦</div>
            <h2 class="font-pattaya text-3xl sm:text-4xl text-botanical-800">{{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}</h2>
            <p class="text-xs text-botanical-600 mt-2 italic">
                {{ $weddingCard->message_thanks ?: 'Sự hiện diện của quý khách là niềm vinh hạnh của gia đình chúng tôi!' }}
            </p>
            <p class="text-[11px] text-botanical-500 mt-3 tracking-widest uppercase">
                {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d . m . Y') : '19 . 12 . 2026' }} • {{ $weddingCard->template_name }}
            </p>
        </footer>
    </main>

    <!-- ================================================================= -->
    <!-- 3. FLOATING WIDGETS MATCHING REFERENCE IMAGE                      -->
    <!-- ================================================================= -->
    
    <!-- Right-Edge Floating Effect Toggle Tab (Blue Water-Drop Sparkle Icon in White Rounded Tab) -->
    <button 
        id="btn-effect-toggle" 
        onclick="toggleFallingEffects()" 
        title="Bật / Tắt hiệu ứng lá & cánh hoa rơi" 
        class="fixed right-0 top-[53%] -translate-y-1/2 z-40 bg-white hover:bg-alabaster-50 text-[#1d9bf0] pl-3 pr-2.5 py-2.5 rounded-l-full shadow-[0_4px_18px_rgba(0,0,0,0.14)] border border-r-0 border-botanical-200 flex items-center justify-center cursor-pointer transition-transform hover:scale-105"
    >
        <span class="relative flex items-center justify-center w-6 h-6">
            <i class="fa-solid fa-droplet text-[17px] text-[#0088cc]"></i>
            <i class="fa-solid fa-wand-magic-sparkles text-[9px] text-[#00a8e8] absolute -top-0.5 -right-1"></i>
        </span>
    </button>

    <!-- Bottom-Right Floating Widgets: Messenger Quick Wish & Olive Equalizer Music Button -->
    <div class="fixed bottom-4 right-4 z-40 flex flex-col items-center gap-3">
        <!-- Pink Messenger / Quick Wish Bubble (with dismiss 'x' badge like reference image) -->
        <div id="floating-chat-widget" class="relative group">
            <button 
                onclick="dismissChatWidget(event)" 
                title="Ẩn nút lời chúc nhanh"
                class=" -top-1 -right-1 absolute w-5 h-5 rounded-full bg-slate-700 text-white text-[10px] flex items-center justify-center shadow hover:bg-slate-900 z-10 cursor-pointer"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
            <a 
                href="#rsvp-section" 
                title="Gửi lời chúc & Xác nhận tham dự"
                class="w-12 h-12 rounded-full bg-[#ff2e63] hover:bg-[#e61e52] text-white shadow-[0_6px_20px_rgba(255,46,99,0.45)] flex items-center justify-center transition transform hover:scale-105"
            >
                <i class="fa-brands fa-facebook-messenger text-2xl"></i>
            </a>
        </div>

        <!-- Olive-Sage Circular Music Equalizer Button (Matches bottom-right of reference image) -->
        <button 
            id="btn-music" 
            onclick="toggleMusic()" 
            title="Bật / Tắt nhạc nền" 
            class="w-12 h-12 rounded-full bg-[#6d7f5d]/95 hover:bg-[#5d6f4e] border-2 border-[#b5c4a7] text-white shadow-[0_6px_20px_rgba(45,65,38,0.35)] flex items-center justify-center cursor-pointer transition transform hover:scale-105"
        >
            <div id="music-eq-bars" class="flex items-end justify-center gap-[3px] h-4 w-5">
                <span class="bar-1 w-[3px] h-3.5 bg-white rounded-full transition-all"></span>
                <span class="bar-2 w-[3px] h-2 bg-white rounded-full transition-all"></span>
                <span class="bar-3 w-[3px] h-1 bg-white rounded-full transition-all"></span>
                <span class="bar-4 w-[3px] h-2.5 bg-white rounded-full transition-all"></span>
            </div>
        </button>
    </div>

    <!-- Bottom-Left Quick Gift QR Button -->
    <div class="fixed bottom-4 left-4 z-40 flex items-center gap-2">
        <button onclick="toggleGiftModal(true)" title="Mở Hộp Mừng Cưới (QR)" class="w-11 h-11 rounded-full bg-[#768d67] border-2 border-white text-white shadow-lg flex items-center justify-center cursor-pointer hover:scale-105 transition">
            <i class="fa-solid fa-gift text-base"></i>
        </button>
        <span id="music-status-pill" class="hidden sm:inline-block px-3 py-1 rounded-full bg-white/90 border border-botanical-300 text-[11px] text-botanical-800 font-medium shadow-sm backdrop-blur-sm">
            Nhạc nền: Tắt
        </span>
    </div>

    <!-- ================================================================= -->
    <!-- 4. MODALS (HỘP MỪNG CƯỚI QR, GOOGLE MAPS, LIGHTBOX, GUEST NAME)   -->
    <!-- ================================================================= -->

    <!-- Hộp Mừng Cưới (Bank QR Modal) -->
    <div id="gift-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-botanical-950/70 backdrop-blur-sm p-4">
        <div class="bg-alabaster-50 text-botanical-950 rounded-3xl max-w-md w-full p-6 border border-botanical-300 shadow-2xl relative">
            <button onclick="toggleGiftModal(false)" class="absolute top-3.5 right-3.5 w-8 h-8 rounded-full bg-botanical-100 text-botanical-800 hover:bg-botanical-200 flex items-center justify-center cursor-pointer">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div class="text-center mb-5">
                <span class="text-xl text-botanical-600 font-serif">❦</span>
                <h3 class="font-serif text-2xl font-bold text-botanical-900">Hộp Mừng Cưới</h3>
                <p class="text-xs text-botanical-600">Quét mã QR hoặc sao chép số tài khoản ngân hàng</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Groom QR -->
                <div class="bg-white rounded-2xl p-3.5 border border-botanical-200 text-center shadow-sm">
                    <span class="text-[10px] uppercase tracking-wider font-bold px-2.5 py-0.5 rounded-full bg-botanical-100 text-botanical-800">Mừng Chú Rể</span>
                    <img src="{{ $weddingCard->groom_qr_url }}" alt="QR Chú Rể" class="w-32 h-32 mx-auto my-2.5 rounded-xl border border-botanical-200 p-1 object-contain">
                    <p class="text-xs font-bold text-botanical-900">{{ $weddingCard->groom_bank_name ?: 'Vietcombank' }}</p>
                    <p class="text-xs text-botanical-700 font-medium">{{ $weddingCard->groom_bank_owner ?: $weddingCard->groom_name }}</p>
                    <p class="text-xs font-mono font-semibold text-botanical-900 my-1">{{ $weddingCard->groom_bank_account ?: ($weddingCard->groom_bank_number ?: '1038495061') }}</p>
                    <button onclick="copyText('{{ $weddingCard->groom_bank_account ?: $weddingCard->groom_bank_number }}', 'Đã sao chép STK Chú Rể!')" class="mt-1 w-full py-1.5 rounded-lg bg-botanical-800 hover:bg-botanical-700 text-white text-[11px] font-medium cursor-pointer">
                        <i class="fa-regular fa-copy mr-1"></i> Sao chép STK
                    </button>
                </div>

                <!-- Bride QR -->
                <div class="bg-white rounded-2xl p-3.5 border border-botanical-200 text-center shadow-sm">
                    <span class="text-[10px] uppercase tracking-wider font-bold px-2.5 py-0.5 rounded-full bg-botanical-100 text-botanical-800">Mừng Cô Dâu</span>
                    <img src="{{ $weddingCard->bride_qr_url }}" alt="QR Cô Dâu" class="w-32 h-32 mx-auto my-2.5 rounded-xl border border-botanical-200 p-1 object-contain">
                    <p class="text-xs font-bold text-botanical-900">Ngân hàng {{ $weddingCard->bride_bank_name ?: 'ACB' }}</p>
                    <p class="text-xs text-botanical-700 font-medium">{{ $weddingCard->bride_bank_owner ?: $weddingCard->bride_name }}</p>
                    <p class="text-xs font-mono font-semibold text-botanical-900 my-1">{{ $weddingCard->bride_bank_account ?: ($weddingCard->bride_bank_number ?: '2849506172') }}</p>
                    <button onclick="copyText('{{ $weddingCard->bride_bank_account ?: $weddingCard->bride_bank_number }}', 'Đã sao chép STK Cô Dâu!')" class="mt-1 w-full py-1.5 rounded-lg bg-botanical-800 hover:bg-botanical-700 text-white text-[11px] font-medium cursor-pointer">
                        <i class="fa-regular fa-copy mr-1"></i> Sao chép STK
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Maps Modal -->
    <div id="map-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-botanical-950/70 backdrop-blur-sm p-4">
        <div class="bg-alabaster-50 text-botanical-950 rounded-3xl max-w-md w-full p-5 border border-botanical-300 shadow-2xl relative">
            <button onclick="closeMapModal()" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-botanical-100 text-botanical-800 flex items-center justify-center cursor-pointer">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <h4 id="map-modal-title" class="font-serif text-xl font-bold text-botanical-900 pr-8">Địa điểm tổ chức</h4>
            <p id="map-modal-address" class="text-xs text-botanical-600 mt-1 mb-3"></p>
            <div class="w-full h-60 rounded-2xl overflow-hidden border border-botanical-200 bg-botanical-50">
                <iframe id="map-iframe" class="w-full h-full border-0" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="mt-4 flex justify-end gap-2">
                <button onclick="copyCurrentAddress()" class="px-4 py-2 rounded-xl bg-botanical-800 text-white text-xs font-medium cursor-pointer">
                    <i class="fa-regular fa-copy mr-1"></i> Sao chép địa chỉ
                </button>
            </div>
        </div>
    </div>

    <!-- Guest Name Customizer Modal -->
    <div id="guest-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-botanical-950/70 backdrop-blur-sm p-4">
        <div class="bg-alabaster-50 text-botanical-950 rounded-3xl max-w-sm w-full p-6 border border-botanical-300 shadow-2xl">
            <h4 class="font-serif text-2xl font-bold text-botanical-900">Tùy chỉnh Tên Khách Mời</h4>
            <p class="text-xs text-botanical-600 mt-1 mb-4">Tên khách mời hiển thị ở mục "Thân Mời" ngoài bìa thiệp và trong Thư Ngỏ.</p>
            <input type="text" id="custom-guest-input" placeholder="VD: Anh Tuấn & Chị Ngọc" class="w-full px-3.5 py-2.5 rounded-xl border border-botanical-300 bg-white text-sm mb-4 focus:outline-none">
            <div class="flex justify-end gap-2">
                <button onclick="closeGuestModal()" class="px-4 py-2 rounded-xl border border-botanical-400 text-botanical-800 text-xs font-medium cursor-pointer">Hủy</button>
                <button onclick="applyGuestName()" class="px-4 py-2 rounded-xl bg-botanical-800 text-white text-xs font-medium cursor-pointer">Cập nhật</button>
            </div>
        </div>
    </div>

    <!-- Lightbox Modal -->
    <div id="lightbox-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 p-4">
        <!-- Slide Counter Badge -->
        <div id="lightbox-counter" class="absolute top-5 left-5 px-3.5 py-1 rounded-full bg-white/15 text-white text-xs font-medium tracking-widest select-none">
            1 / 6
        </div>
        <button onclick="closeLightbox()" class="absolute top-4 right-4 w-10 h-10 rounded-full bg-white/15 text-white hover:bg-white/30 flex items-center justify-center cursor-pointer">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>
        <button id="lightbox-prev" onclick="stepLightbox(-1)" class="absolute left-3 sm:left-6 w-10 h-10 rounded-full bg-white/15 text-white hover:bg-white/30 flex items-center justify-center cursor-pointer">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <img id="lightbox-img" src="" alt="Preview" class="max-h-[85vh] max-w-[90vw] rounded-2xl border-2 border-botanical-300 object-contain shadow-2xl">
        <button id="lightbox-next" onclick="stepLightbox(1)" class="absolute right-3 sm:right-6 w-10 h-10 rounded-full bg-white/15 text-white hover:bg-white/30 flex items-center justify-center cursor-pointer">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>

    <!-- Toast Notification -->
    <div id="toast-box" class="fixed top-5 left-1/2 -translate-x-1/2 z-[120] pointer-events-none opacity-0 transition-all duration-300 transform -translate-y-3">
        <div class="px-5 py-2.5 rounded-full bg-botanical-900 border border-champagne-400 text-white text-xs sm:text-sm shadow-2xl flex items-center gap-2">
            <span class="text-champagne-300">❦</span>
            <span id="toast-text">Thông báo</span>
        </div>
    </div>

    <!-- ================================================================= -->
    <!-- 5. JAVASCRIPT LOGIC & BOTANICAL ANIMATIONS                        -->
    <!-- ================================================================= -->
    <script>
        /* ---------------------------------------------------------------
         * A. 12 FLOATING BOTANICAL LEAF ELEMENTS IN BACKGROUND
         * --------------------------------------------------------------- */
        function initFloatingBotanicalNodes() {
            const container = document.getElementById('floating-leaves-layer');
            const symbols = ['❦', '✿', '❀', '❁'];
            const count = 12; // Exact 12 floating elements as on ChungĐôi demo
            for (let i = 0; i < count; i++) {
                const div = document.createElement('div');
                div.className = 'floating-leaf-node';
                div.textContent = symbols[i % symbols.length];
                const sizeRem = (1.2 + (i % 4) * 0.55).toFixed(2);
                const leftPct = ((i * 8.4) + 4) % 94;
                const duration = 17 + (i % 5) * 4;
                const delay = -(i * 2.1);
                div.style.fontSize = `${sizeRem}rem`;
                div.style.left = `${leftPct}%`;
                div.style.animationDuration = `${duration}s`;
                div.style.animationDelay = `${delay}s`;
                container.appendChild(div);
            }
        }

        /* ---------------------------------------------------------------
         * B. FALLING EUCALYPTUS LEAVES & WHITE JASMINE PETALS CANVAS
         * --------------------------------------------------------------- */
        let effectsEnabled = true;

        function toggleFallingEffects() {
            effectsEnabled = !effectsEnabled;
            const canvas = document.getElementById('botanical-canvas');
            const layer = document.getElementById('floating-leaves-layer');
            const btn = document.getElementById('btn-effect-toggle');
            if (effectsEnabled) {
                canvas.style.opacity = '1';
                layer.style.opacity = '1';
                btn.classList.remove('opacity-50');
                showToast('Đã bật hiệu ứng cánh hoa & lá rơi ✨');
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

        function replayEnvelopeAnimation() {
            const env = document.getElementById('hero-envelope');
            if (!env) return;
            env.classList.remove('photos-fanned');
            setTimeout(() => {
                env.classList.add('photos-fanned');
            }, 300);
            showToast('{{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }} • {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '19.12.2026' }} ❦');
        }

        function initBotanicalCanvas() {
            const canvas = document.getElementById('botanical-canvas');
            const ctx = canvas.getContext('2d');
            let width = canvas.width = window.innerWidth;
            let height = canvas.height = window.innerHeight;

            window.addEventListener('resize', () => {
                width = canvas.width = window.innerWidth;
                height = canvas.height = window.innerHeight;
            });

            const leaves = Array.from({ length: 24 }, () => ({
                x: Math.random() * width,
                y: Math.random() * height,
                r: 3 + Math.random() * 4.5,
                vy: 0.4 + Math.random() * 0.75,
                vx: -0.25 + Math.random() * 0.5,
                angle: Math.random() * Math.PI * 2,
                spin: 0.008 + Math.random() * 0.02,
                type: Math.random() > 0.35 ? 'eucalyptus' : 'jasmine'
            }));

            function draw() {
                ctx.clearRect(0, 0, width, height);
                for (const p of leaves) {
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
                    if (p.type === 'eucalyptus') {
                        ctx.fillStyle = 'rgba(107, 142, 120, 0.32)';
                        ctx.beginPath();
                        ctx.ellipse(0, 0, p.r * 1.4, p.r * 0.75, 0, 0, Math.PI * 2);
                        ctx.fill();
                    } else {
                        ctx.fillStyle = 'rgba(197, 160, 89, 0.35)';
                        ctx.beginPath();
                        ctx.arc(0, 0, p.r * 0.45, 0, Math.PI * 2);
                        ctx.fill();
                    }
                    ctx.restore();
                }
                requestAnimationFrame(draw);
            }
            draw();
        }

        /* ---------------------------------------------------------------
         * C. SPLIT-GATE OPENING & WEDDING MUSIC HANDLER
         * --------------------------------------------------------------- */
        const weddingAudio = document.getElementById('weddingAudio');
        let isMusicPlaying = false;

        if (weddingAudio) {
            weddingAudio.onplay = () => { isMusicPlaying = true; updateMusicUI(); };
            weddingAudio.onpause = () => { isMusicPlaying = false; updateMusicUI(); };
        }

        function startBackgroundMusic() {
            if (!weddingAudio) return;
            weddingAudio.play().then(() => {
                isMusicPlaying = true;
                updateMusicUI();
            }).catch(err => {
                console.warn('Audio playback blocked or waiting user gesture', err);
            });
        }

        function stopBackgroundMusic() {
            if (!weddingAudio) return;
            weddingAudio.pause();
            isMusicPlaying = false;
            updateMusicUI();
        }

        function toggleMusic() {
            if (!weddingAudio) return;
            if (weddingAudio.paused) {
                startBackgroundMusic();
                showToast('Đang phát nhạc nền lễ cưới ♪');
            } else {
                stopBackgroundMusic();
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
                startBackgroundMusic();
            }
            // Animate the two Polaroid photos fanning out of the olive envelope
            const env = document.getElementById('hero-envelope');
            if (env) {
                env.classList.remove('photos-fanned');
                setTimeout(() => env.classList.add('photos-fanned'), 450);
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
         * D. COUNTDOWN TIMER
         * --------------------------------------------------------------- */
        function initCountdown() {
            const weddingDateStr = '{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format("Y-m-d") : "2026-12-19" }}';
            const weddingTimeStr = '{{ !empty($weddingCard->wedding_time) && preg_match("/^\d{1,2}:\d{2}$/", trim($weddingCard->wedding_time)) ? trim($weddingCard->wedding_time) . ":00" : "18:00:00" }}';
            const weddingTarget = new Date(`${weddingDateStr}T${weddingTimeStr}+07:00`).getTime();

            function updateClock() {
                const now = Date.now();
                let diff = weddingTarget - now;
                const labelEl = document.getElementById('countdown-label');

                if (diff < 0) {
                    diff = Math.abs(diff);
                    if (labelEl) {
                        labelEl.textContent = 'Hạnh phúc viên mãn từ ngày {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '19.12.2026' }}';
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

            updateClock();
            setInterval(updateClock, 1000);
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
         * F. SỔ LƯU BÚT (DỮ LIỆU TỪ DATABASE) & RSVP
         * --------------------------------------------------------------- */
        @php
            $cardWishes26 = $weddingCard->wishes()->approved()->latest()->take(10)->get()->map(function($w) {
                return [
                    'name' => $w->sender_name,
                    'side' => 'Khách quý',
                    'attendance' => 'Chúc phúc',
                    'wish' => $w->message,
                    'time' => $w->created_at ? $w->created_at->diffForHumans() : 'Vừa xong',
                ];
            });
        @endphp
        const wishesData = @json($cardWishes26);

        function renderWishes() {
            const list = document.getElementById('wishes-list');
            const badge = document.getElementById('wish-count-badge');
            badge.textContent = `${wishesData.length} lời chúc`;

            if (!wishesData || wishesData.length === 0) {
                list.innerHTML = `
                    <div class="text-center py-4 text-xs text-botanical-600 italic">
                        Hãy là người đầu tiên gửi lời chúc mừng hạnh phúc đến cô dâu &amp; chú rể!
                    </div>
                `;
                return;
            }

            list.innerHTML = wishesData.map(item => `
                <div class="bg-botanical-50/70 rounded-2xl p-3.5 border border-botanical-200 shadow-sm">
                    <div class="flex items-center justify-between gap-2">
                        <span class="font-bold text-botanical-900 text-xs sm:text-sm">${escapeHtml(item.name)}</span>
                        <span class="text-[10px] px-2.5 py-0.5 rounded-full bg-white text-botanical-700 border border-botanical-200">
                            ${escapeHtml(item.side)} • ${escapeHtml(item.attendance)}
                        </span>
                    </div>
                    <p class="text-xs text-botanical-800 mt-1.5 leading-relaxed">${escapeHtml(item.wish)}</p>
                    <p class="text-[10px] text-botanical-500 mt-1">${escapeHtml(item.time)}</p>
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
            showToast('Cảm ơn lời chúc & xác nhận của bạn! ❦');
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
            'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=1000&q=85',
            'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1000&q=85',
            'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=1000&q=85',
            'https://images.unsplash.com/photo-1606800052052-a08af7148866?auto=format&fit=crop&w=1000&q=85',
            'https://images.unsplash.com/photo-1537633552985-df8429e8048b?auto=format&fit=crop&w=1000&q=85'
        ];
        const dbGallery = {!! $albumPhotosJson ?: '[]' !!};
        const galleryUrls = (Array.isArray(dbGallery) && dbGallery.length > 0) ? dbGallery : defaultGallery;
        let currentSlideIndex = 0;

        function renderThumbnails() {
            const thumbStrip = document.getElementById('carousel-thumbs');
            if (!thumbStrip) return;
            thumbStrip.innerHTML = galleryUrls.map((url, idx) => `
                <button 
                    type="button"
                    onclick="selectSlide(${idx})" 
                    aria-label="Xem ảnh ${idx + 1}"
                    class="w-14 h-14 sm:w-16 sm:h-16 aspect-square rounded-xl overflow-hidden border-2 transition-all duration-300 flex-shrink-0 cursor-pointer ${idx === currentSlideIndex ? 'border-botanical-700 scale-105 shadow-md opacity-100 ring-2 ring-botanical-400/40' : 'border-transparent opacity-65 hover:opacity-100'}"
                >
                    <img src="${url}" alt="Thumb ${idx + 1}" class="w-full h-full object-cover">
                </button>
            `).join('');

            const activeBtn = thumbStrip.children[currentSlideIndex];
            if (activeBtn && activeBtn.scrollIntoView) {
                activeBtn.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
            }
        }

        function selectSlide(idx) {
            currentSlideIndex = (idx + galleryUrls.length) % galleryUrls.length;
            const mainImg = document.getElementById('carousel-main-img');
            const counter = document.getElementById('carousel-counter');
            if (mainImg) {
                mainImg.style.opacity = '0.35';
                setTimeout(() => {
                    mainImg.src = galleryUrls[currentSlideIndex];
                    mainImg.style.opacity = '1';
                }, 120);
            }
            if (counter) counter.textContent = `${currentSlideIndex + 1} / ${galleryUrls.length}`;
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
            const prevBtn = document.getElementById('lightbox-prev');
            const nextBtn = document.getElementById('lightbox-next');

            if (prevBtn) prevBtn.style.display = 'flex';
            if (nextBtn) nextBtn.style.display = 'flex';
            if (counter) {
                counter.style.display = 'block';
                counter.textContent = `${currentSlideIndex + 1} / ${galleryUrls.length}`;
            }
            if (img) img.src = galleryUrls[currentSlideIndex];
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
            document.body.classList.add('overflow-hidden');
        }

        function openSingleImage(src) {
            const modal = document.getElementById('lightbox-modal');
            const img = document.getElementById('lightbox-img');
            const counter = document.getElementById('lightbox-counter');
            const prevBtn = document.getElementById('lightbox-prev');
            const nextBtn = document.getElementById('lightbox-next');

            if (prevBtn) prevBtn.style.display = 'none';
            if (nextBtn) nextBtn.style.display = 'none';
            if (counter) counter.style.display = 'none';
            if (img) img.src = src;
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }
            document.body.classList.add('overflow-hidden');
        }

        function closeLightbox() {
            const modal = document.getElementById('lightbox-modal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
            document.body.classList.remove('overflow-hidden');
            selectSlide(currentSlideIndex);
        }

        function stepLightbox(dir) {
            currentSlideIndex = (currentSlideIndex + dir + galleryUrls.length) % galleryUrls.length;
            const img = document.getElementById('lightbox-img');
            const counter = document.getElementById('lightbox-counter');
            if (img) img.src = galleryUrls[currentSlideIndex];
            if (counter) counter.textContent = `${currentSlideIndex + 1} / ${galleryUrls.length}`;
            selectSlide(currentSlideIndex);
        }

        // Close on Escape or click outside
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' || e.key === 'Esc') {
                closeLightbox();
            } else if (e.key === 'ArrowLeft') {
                const modal = document.getElementById('lightbox-modal');
                if (modal && !modal.classList.contains('hidden')) stepLightbox(-1);
            } else if (e.key === 'ArrowRight') {
                const modal = document.getElementById('lightbox-modal');
                if (modal && !modal.classList.contains('hidden')) stepLightbox(1);
            }
        });

        // Touch swipe on carousel
        (function() {
            const viewport = document.getElementById('carousel-viewport');
            if (!viewport) return;
            let touchStartX = 0;
            let touchEndX = 0;
            viewport.addEventListener('touchstart', e => {
                touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });
            viewport.addEventListener('touchend', e => {
                touchEndX = e.changedTouches[0].screenX;
                if (touchStartX - touchEndX > 45) {
                    stepCarousel(1);
                } else if (touchEndX - touchStartX > 45) {
                    stepCarousel(-1);
                }
            }, { passive: true });
        })();

        renderThumbnails();

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
                'DESCRIPTION:Thiệp mời cưới Minimalism Xanh - {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }} (19/12/2026)',
                'END:VEVENT',
                'END:VCALENDAR'
            ].join('\n');

            const blob = new Blob([icsContent], { type: 'text/calendar;charset=utf-8' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'lich-cuoi-dang-khoa-my-duyen.ics';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            showToast('Đã tải tệp lịch (.ics) vào thiết bị!');
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
                document.getElementById('inner-guest-name').textContent = val;
                showToast(`Đã cập nhật tên khách mời: ${val}`);
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
            const params = new URLSearchParams(window.location.search);
            const guestParam = params.get('khach') || params.get('guest');
            if (guestParam) {
                document.getElementById('cover-guest-name').textContent = guestParam;
                document.getElementById('inner-guest-name').textContent = guestParam;
            }

            // If URL has ?open=1, automatically open the cover gate
            if (params.get('open') === '1') {
                document.getElementById('invitation-gate').classList.add('gate-opened');
            }

            initFloatingBotanicalNodes();
            initBotanicalCanvas();
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