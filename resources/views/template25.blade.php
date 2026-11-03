<!DOCTYPE html>
<html lang="vi" class="scroll-smooth">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $weddingCard->couple_name }} - Thiệp Cưới Online</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Cormorant Garamond, Playfair Display, Great Vibes, Be Vietnam Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Great+Vibes&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <!-- Tone.js for romantic garden acoustic piano synthesis -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tone/14.8.49/Tone.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        moc: {
                            cream: '#FFFAF7',
                            paper: '#FAF5F0',
                            card: '#F4EFE8',
                            taupe: '#A68972',
                            taupeDark: '#8B6E58',
                            leafLight: '#B3C995',
                            leafMid: '#8FB369',
                            leafOlive: '#6E8F52',
                            greenTitle: '#4D663C',
                            greenDark: '#2E4724',
                            forestBand: '#2A4021',
                            stamen: '#E5A93B',
                            text: '#3B4733'
                        }
                    },
                    fontFamily: {
                        serif: ['"Cormorant Garamond"', 'Georgia', 'serif'],
                        playfair: ['"Playfair Display"', 'Georgia', 'serif'],
                        vibes: ['"Great Vibes"', 'cursive'],
                        sans: ['"Be Vietnam Pro"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        :root {
            --bg-cream: #FFFAF7;
            --taupe-border: #A68972;
            --forest-band: #2B4222;
            --green-title: #4D663C;
            --green-label: #4D5D43;
        }

        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            background-color: #EAE4DC;
            background-image:
                radial-gradient(at 15% 15%, rgba(110, 143, 82, 0.14) 0px, transparent 50%),
                radial-gradient(at 85% 85%, rgba(166, 137, 114, 0.16) 0px, transparent 50%);
            font-family: 'Be Vietnam Pro', sans-serif;
            color: #3B4733;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        /* Warm Ivory Cream Watercolor Paper Texture (#FFFAF7) */
        .moc-paper {
            background-color: #FFFAF7;
            background-image:
                radial-gradient(rgba(166, 137, 114, 0.06) 1px, transparent 0),
                radial-gradient(rgba(110, 143, 82, 0.04) 1px, #FFFAF7 0);
            background-size: 28px 28px;
            background-position: 0 0, 14px 14px;
        }

        .moc-container-shadow {
            box-shadow: 0 25px 70px rgba(42, 64, 33, 0.16), 0 0 1px rgba(166, 137, 114, 0.4);
        }

        /* Dark Forest Green Horizontal Botanical Band in Hero Section */
        .hero-forest-band {
            background-color: #2C4223;
            background-image:
                radial-gradient(ellipse at 20% 50%, rgba(143, 179, 105, 0.22) 0%, transparent 60%),
                radial-gradient(ellipse at 78% 45%, rgba(179, 201, 149, 0.18) 0%, transparent 55%),
                linear-gradient(90deg, #23361B 0%, #314A27 50%, #24381C 100%);
            box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.28), inset 0 -2px 6px rgba(0, 0, 0, 0.25);
        }

        /* Tilted Portrait Frames with Warm Taupe Borders (#A68972) */
        .portrait-frame-groom {
            border: 5.5px solid #A68972;
            background-color: #A68972;
            transform: rotate(-10.5deg);
            box-shadow: 0 14px 28px rgba(42, 35, 28, 0.22), 0 4px 10px rgba(42, 35, 28, 0.12);
            transition: transform 0.5s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.5s ease;
        }
        .portrait-frame-groom:hover {
            transform: rotate(-8.5deg) scale(1.02);
            box-shadow: 0 18px 34px rgba(42, 35, 28, 0.28);
        }

        .portrait-frame-bride {
            border: 5.5px solid #A68972;
            background-color: #A68972;
            transform: rotate(10.5deg);
            box-shadow: 0 16px 32px rgba(42, 35, 28, 0.24), 0 4px 10px rgba(42, 35, 28, 0.14);
            transition: transform 0.5s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.5s ease;
        }
        .portrait-frame-bride:hover {
            transform: rotate(8.5deg) scale(1.02);
            box-shadow: 0 20px 36px rgba(42, 35, 28, 0.3);
        }

        /* Continuous Floating White Hoa Mộc Petals */
        .dom-petal {
            position: fixed;
            top: -8%;
            z-index: 35;
            pointer-events: none;
            user-select: none;
            animation: mocPetalFall linear infinite;
        }

        @keyframes mocPetalFall {
            0% {
                transform: translate3d(0, -5vh, 0) rotate(0deg) rotateY(0deg);
                opacity: 0;
            }
            12% {
                opacity: 0.88;
            }
            50% {
                transform: translate3d(24px, 48vh, 0) rotate(160deg) rotateY(130deg);
                opacity: 0.82;
            }
            88% {
                opacity: 0.7;
            }
            100% {
                transform: translate3d(-18px, 106vh, 0) rotate(340deg) rotateY(260deg);
                opacity: 0;
            }
        }

        /* Gentle Botanical Breeze Animation */
        @keyframes botanicalSway {
            0%, 100% { transform: rotate(0deg) translateY(0px); }
            50% { transform: rotate(1.3deg) translateY(-2px); }
        }
        .sway-top-right {
            animation: botanicalSway 6.5s ease-in-out infinite;
            transform-origin: top right;
        }
        .sway-bottom-left {
            animation: botanicalSway 7s ease-in-out infinite;
            transform-origin: bottom left;
        }

        /* 3D Envelope Styles */
        .envelope-perspective {
            perspective: 1400px;
        }
        .envelope-letter-slide {
            transition: transform 1.15s cubic-bezier(0.22, 1, 0.36, 1) 0.2s, opacity 0.85s ease 0.2s;
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

        /* Scroll Reveal Animations */
        .reveal-item {
            opacity: 0;
            transform: translateY(26px);
            transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-left {
            opacity: 0;
            transform: translateX(-28px);
            transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-right {
            opacity: 0;
            transform: translateX(28px);
            transition: opacity 0.85s cubic-bezier(0.22, 1, 0.36, 1), transform 0.85s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal-scale {
            opacity: 0;
            transform: scale(0.94);
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

        /* Sound Equalizer Bars Animation */
        @keyframes eqBar {
            0%, 100% { height: 5px; }
            50% { height: 15px; }
        }
        .eq-bar-1 { animation: eqBar 0.8s ease-in-out infinite; }
        .eq-bar-2 { animation: eqBar 0.55s ease-in-out infinite 0.15s; }
        .eq-bar-3 { animation: eqBar 0.9s ease-in-out infinite 0.3s; }
        .eq-paused span { animation-play-state: paused !important; height: 6px !important; }

        @keyframes heartBeat {
            0%, 100% { transform: scale(1); }
            25% { transform: scale(1.15); }
            50% { transform: scale(0.95); }
            75% { transform: scale(1.1); }
        }
        .pulse-heart {
            animation: heartBeat 2.1s infinite ease-in-out;
        }

        /* Custom Scrollbar for Wishes */
        .wishes-scroll::-webkit-scrollbar {
            width: 5px;
        }
        .wishes-scroll::-webkit-scrollbar-track {
            background: #FFFAF7;
            border-radius: 8px;
        }
        .wishes-scroll::-webkit-scrollbar-thumb {
            background: #A68972;
            border-radius: 8px;
        }
    </style>
</head>
<body class="min-h-screen flex justify-center items-start selection:bg-moc-leafLight/40 selection:text-moc-greenDark">

    <!-- ===================================================================
         REUSABLE WATERCOLOR "HOA MỘC - XANH" BOTANICAL SVG DEFINITIONS:
         - White 5-Petal Mock-Orange / Jasmine Flowers with Golden Stamens
         - Multi-toned Watercolor Foliage (#3B5929, #5F8243, #8DB368, #B5CC96)
         - Top-Right & Bottom-Left Corner Clusters + Watermark Flowers
         =================================================================== -->
    <svg width="0" height="0" class="hidden" aria-hidden="true">
        <defs>
            <!-- Soft Watercolor White Petal Gradient -->
            <radialGradient id="mocWhitePetal" cx="50%" cy="68%" r="70%">
                <stop offset="0%" stop-color="#EDE6D8" />
                <stop offset="28%" stop-color="#F7F4EE" />
                <stop offset="72%" stop-color="#FFFFFF" />
                <stop offset="100%" stop-color="#F3EFE8" />
            </radialGradient>

            <radialGradient id="mocPetalShadow" cx="50%" cy="50%" r="60%">
                <stop offset="0%" stop-color="#D8D2C5" stop-opacity="0.65" />
                <stop offset="100%" stop-color="#FFFFFF" stop-opacity="0" />
            </radialGradient>

            <!-- Rich Watercolor Leaf Gradients -->
            <linearGradient id="leafDarkGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#2F4C22" />
                <stop offset="55%" stop-color="#4A6E35" />
                <stop offset="100%" stop-color="#6F9451" />
            </linearGradient>

            <linearGradient id="leafMidGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#587C3E" />
                <stop offset="60%" stop-color="#7FA35B" />
                <stop offset="100%" stop-color="#A8C484" />
            </linearGradient>

            <linearGradient id="leafLightGrad" x1="0%" y1="100%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="#87A963" />
                <stop offset="65%" stop-color="#B0C98E" />
                <stop offset="100%" stop-color="#CFE0B4" />
            </linearGradient>

            <!-- Single Realistic Watercolor Leaf (Lá Hoa Mộc có gân lá) -->
            <g id="moc-leaf-dark">
                <path d="M 0,0 C -18,-14 -24,-42 0,-68 C 24,-42 18,-14 0,0 Z" fill="url(#leafDarkGrad)" />
                <path d="M 0,-2 L 0,-62" stroke="#8FB369" stroke-width="0.9" stroke-linecap="round" opacity="0.65" />
                <path d="M 0,-18 L -9,-28 M 0,-30 L 10,-42 M 0,-42 L -8,-52" stroke="#8FB369" stroke-width="0.65" stroke-linecap="round" opacity="0.5" />
            </g>

            <g id="moc-leaf-mid">
                <path d="M 0,0 C -16,-12 -22,-38 0,-62 C 22,-38 16,-12 0,0 Z" fill="url(#leafMidGrad)" />
                <path d="M 0,-2 L 0,-56" stroke="#D4E3BE" stroke-width="0.85" stroke-linecap="round" opacity="0.7" />
                <path d="M 0,-16 L -8,-25 M 0,-28 L 8,-38 M 0,-38 L -7,-47" stroke="#D4E3BE" stroke-width="0.6" stroke-linecap="round" opacity="0.55" />
            </g>

            <g id="moc-leaf-light">
                <path d="M 0,0 C -15,-12 -20,-35 0,-56 C 20,-35 15,-12 0,0 Z" fill="url(#leafLightGrad)" opacity="0.92" />
                <path d="M 0,-2 L 0,-50" stroke="#5A7A42" stroke-width="0.7" stroke-linecap="round" opacity="0.45" />
            </g>

            <!-- Single Broad Ruffled White Hoa Mộc Petal -->
            <g id="moc-single-petal">
                <path d="M 0,0 C -16,-8 -25,-28 -14,-44 C -7,-52 7,-52 14,-44 C 25,-28 16,-8 0,0 Z"
                      fill="url(#mocWhitePetal)" stroke="#DDD6C7" stroke-width="0.7" />
                <!-- Delicate Watercolor Vein Lines -->
                <path d="M 0,-4 C -4,-18 -5,-32 -2,-44 M 0,-4 C 4,-18 5,-32 2,-44 M 0,-6 L 0,-46"
                      fill="none" stroke="#DFD9CB" stroke-width="0.55" opacity="0.75" />
            </g>

            <!-- Full Blooming 5-Petal White Hoa Mộc Flower with Golden-Amber Stamens -->
            <g id="moc-flower-bloom">
                <circle cx="0" cy="2" r="32" fill="url(#mocPetalShadow)" />
                <use href="#moc-single-petal" transform="rotate(0)" />
                <use href="#moc-single-petal" transform="rotate(72)" />
                <use href="#moc-single-petal" transform="rotate(144)" />
                <use href="#moc-single-petal" transform="rotate(216)" />
                <use href="#moc-single-petal" transform="rotate(288)" />
                <!-- Warm Golden-Yellow Stamen Center (#E5A93B & #C87D20) -->
                <circle cx="0" cy="0" r="6" fill="#E8B84B" opacity="0.45" />
                <g stroke="#C87D20" stroke-width="1.05" stroke-linecap="round">
                    <line x1="0" y1="0" x2="-3" y2="-13" />
                    <line x1="0" y1="0" x2="3" y2="-14" />
                    <line x1="0" y1="0" x2="9" y2="-10" />
                    <line x1="0" y1="0" x2="13" y2="-3" />
                    <line x1="0" y1="0" x2="12" y2="5" />
                    <line x1="0" y1="0" x2="7" y2="11" />
                    <line x1="0" y1="0" x2="0" y2="13" />
                    <line x1="0" y1="0" x2="-7" y2="11" />
                    <line x1="0" y1="0" x2="-12" y2="4" />
                    <line x1="0" y1="0" x2="-13" y2="-4" />
                    <line x1="0" y1="0" x2="-8" y2="-10" />
                </g>
                <g fill="#F4B93B">
                    <circle cx="-3" cy="-13.5" r="1.8" />
                    <circle cx="3" cy="-14.5" r="1.9" />
                    <circle cx="9.5" cy="-10.5" r="1.7" />
                    <circle cx="13.5" cy="-3" r="1.8" />
                    <circle cx="12.5" cy="5.5" r="1.7" />
                    <circle cx="7.5" cy="11.5" r="1.9" />
                    <circle cx="0" cy="13.5" r="1.7" />
                    <circle cx="-7.5" cy="11.5" r="1.8" />
                    <circle cx="-12.5" cy="4.5" r="1.8" />
                    <circle cx="-13.5" cy="-4" r="1.7" />
                    <circle cx="-8.5" cy="-10.5" r="1.9" />
                    <circle cx="0" cy="-6" r="1.6" fill="#D98218" />
                    <circle cx="5" cy="-3" r="1.5" fill="#D98218" />
                    <circle cx="-4" cy="4" r="1.6" fill="#D98218" />
                    <circle cx="4" cy="5" r="1.5" fill="#D98218" />
                </g>
            </g>

            <!-- Half/Side View White Blossom & Buds -->
            <g id="moc-flower-side">
                <use href="#moc-single-petal" transform="rotate(-38) scale(0.92)" />
                <use href="#moc-single-petal" transform="rotate(0) scale(0.98)" />
                <use href="#moc-single-petal" transform="rotate(38) scale(0.92)" />
                <path d="M -8,2 Q 0,14 8,2 Z" fill="#6E8F52" />
                <circle cx="0" cy="-6" r="3.5" fill="#E5A93B" />
            </g>

            <!-- Section Header Floral Emblem -->
            <g id="moc-section-header">
                <use href="#moc-leaf-light" transform="translate(88, 30) rotate(-68) scale(0.58)" />
                <use href="#moc-leaf-light" transform="translate(112, 30) rotate(68) scale(0.58)" />
                <use href="#moc-leaf-mid" transform="translate(92, 28) rotate(-42) scale(0.52)" />
                <use href="#moc-leaf-mid" transform="translate(108, 28) rotate(42) scale(0.52)" />
                <use href="#moc-flower-bloom" transform="translate(100, 26) scale(0.42)" />
            </g>

            <!-- Botanical Divider -->
            <g id="moc-botanical-divider">
                <path d="M 35,24 Q 140,12 240,24 T 445,24" fill="none" stroke="#C5B4A2" stroke-width="1.2" />
                <path d="M 75,24 Q 160,34 240,24 T 405,24" fill="none" stroke="#9AB57A" stroke-width="0.9" stroke-dasharray="4 4" />
                <use href="#moc-leaf-mid" transform="translate(232, 24) rotate(-65) scale(0.35)" />
                <use href="#moc-leaf-mid" transform="translate(248, 24) rotate(65) scale(0.35)" />
                <use href="#moc-flower-bloom" transform="translate(240, 24) scale(0.28)" />
            </g>
        </defs>
    </svg>

    <!-- ===================================================================
         CONTINUOUS FLOATING WHITE HOA MỘC PETALS LAYER
         =================================================================== -->
    <div id="falling-moc-layer" class="pointer-events-none fixed inset-0 z-30 overflow-hidden mx-auto max-w-[480px]" aria-hidden="true"></div>

    <!-- MAIN MOBILE-FIRST INVITATION CONTAINER (max-w-[480px] centered) -->
    <div id="app-container" class="relative w-full max-w-[480px] min-h-screen moc-paper moc-container-shadow overflow-hidden mx-auto border-x border-moc-taupe/30">

        <!-- ===================================================================
             1. 3D ENVELOPE INTRO OVERLAY (HOA MỘC - XANH)
             =================================================================== -->
        <div id="envelope-overlay" class="envelope-overlay-wrapper fixed inset-0 z-50 flex items-center justify-center bg-[#1F2E1A]/55 backdrop-blur-sm p-3">
            <div class="relative w-full max-w-[445px] min-h-[90vh] max-h-[860px] rounded-[28px] moc-paper border-2 border-moc-taupe/60 shadow-2xl flex flex-col justify-between items-center p-5 overflow-hidden">

                <!-- Top-Right & Top-Left Watercolor Hoa Mộc Accents -->
                <svg class="pointer-events-none absolute -top-4 -right-4 w-56 h-48 sway-top-right" viewBox="0 0 260 220">
                    <use href="#moc-leaf-light" transform="translate(150, 110) rotate(145) scale(1.1)" />
                    <use href="#moc-leaf-mid" transform="translate(185, 95) rotate(165) scale(1.2)" />
                    <use href="#moc-leaf-dark" transform="translate(140, 75) rotate(125) scale(1.15)" />
                    <use href="#moc-flower-bloom" transform="translate(135, 62) scale(0.95)" />
                    <use href="#moc-flower-side" transform="translate(200, 95) rotate(145) scale(0.75)" />
                </svg>

                <!-- Center 3D Envelope & Inner Invitation Card -->
                <div id="envelope-3d-stage" class="envelope-perspective relative w-full max-w-[360px] my-auto pt-8">
                    <!-- Inner Cream & Boho Green Card -->
                    <div class="envelope-letter-slide relative z-20 mx-auto w-[93%] rounded-2xl bg-[#FFFAF7] border-2 border-moc-taupe/60 shadow-lg px-5 py-6 text-center">
                        <div class="mx-auto w-36 h-12 -mt-2 mb-1">
                            <svg viewBox="0 0 200 50" class="w-full h-full">
                                <use href="#moc-section-header" />
                            </svg>
                        </div>

                        <p class="text-[10px] uppercase tracking-[0.28em] text-moc-greenTitle font-semibold mb-1.5">
                            Thiệp Mời Hôn Lễ
                        </p>

                        <!-- Couple Names: {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }} -->
                        <h1 class="font-serif text-3xl sm:text-[36px] font-semibold text-moc-greenTitle leading-tight">
                            {{ $weddingCard->groom_name }}
                        </h1>
                        <div class="my-1 flex items-center justify-center gap-3">
                            <span class="h-[1px] w-10 bg-moc-taupe/50"></span>
                            <span class="font-vibes text-2xl text-moc-taupeDark">&amp;</span>
                            <span class="h-[1px] w-10 bg-moc-taupe/50"></span>
                        </div>
                        <h1 class="font-serif text-3xl sm:text-[36px] font-semibold text-moc-greenTitle leading-tight">
                            {{ $weddingCard->bride_name }}
                        </h1>

                        <!-- Ornamental Divider -->
                        <div class="my-3 flex items-center justify-center gap-2.5">
                            <div class="w-12 h-[1px] bg-gradient-to-r from-transparent to-moc-taupe"></div>
                            <span class="text-moc-greenTitle text-base leading-none">❦</span>
                            <div class="w-12 h-[1px] bg-gradient-to-l from-transparent to-moc-taupe"></div>
                        </div>

                        <!-- Wedding Date -->
                        <p class="font-serif text-xl font-bold tracking-wider text-moc-greenDark">
                            {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->locale('vi')->isoFormat('D [tháng] M, Y') : '24 tháng 5, 2026' }}
                        </p>
                        <p class="text-[11px] text-moc-text/80 italic mt-0.5">
                            (Nhằm ngày {{ $weddingCard->wedding_date_lunar ?: '08 tháng 04 năm Bính Ngọ' }})
                        </p>

                        <!-- Guest Invitation Box -->
                        <div class="mt-4 pt-3 px-3 pb-2.5 rounded-xl bg-moc-card/90 border border-moc-taupe/40">
                            <p class="text-[11px] uppercase tracking-[0.24em] text-moc-greenTitle font-semibold">
                                Thân Mời
                            </p>
                            <p id="envelope-guest-name" class="font-serif text-xl font-bold text-moc-greenDark mt-0.5">
                                Quý Khách &amp; Gia Đình
                            </p>
                            <p class="text-[11px] text-moc-text/80 mt-0.5">
                                Đến dự lễ thành hôn của hai con chúng tôi
                            </p>
                        </div>
                    </div>

                    <!-- Envelope Front Pocket & Interactive Button -->
                    <div class="relative -mt-11 z-30 mx-auto w-full h-36 rounded-b-2xl bg-gradient-to-b from-[#4D663C] via-[#3A522C] to-[#2A4021] shadow-xl overflow-hidden border border-moc-taupe/60 flex flex-col justify-end items-center pb-5 pt-10">
                        <svg class="absolute inset-0 w-full h-full pointer-events-none" preserveAspectRatio="none" viewBox="0 0 400 170">
                            <polygon points="0,0 200,105 0,170" fill="#364E29" opacity="0.75" />
                            <polygon points="400,0 200,105 400,170" fill="#2A4021" opacity="0.75" />
                            <polygon points="0,170 200,82 400,170" fill="#23371B" stroke="#A68972" stroke-width="1.2" stroke-opacity="0.7" />
                        </svg>

                        <!-- Wax Seal -->
                        <div class="relative z-20 -mt-7 mb-2.5 w-11 h-11 rounded-full bg-gradient-to-br from-[#E9D1A7] via-[#C29B61] to-[#8C673A] p-0.5 shadow-lg flex items-center justify-center border border-white/80">
                            <div class="w-full h-full rounded-full border border-amber-950/30 flex items-center justify-center text-white font-serif text-xs font-bold">
                                🌿
                            </div>
                        </div>

                        <button id="open-invitation-btn" onclick="openInvitation()" class="btn-shimmer relative z-20 bg-[#FFFAF7] text-moc-greenDark hover:bg-moc-card active:scale-95 transition-all duration-300 font-semibold text-sm px-8 py-2.5 rounded-full shadow-lg border border-moc-taupe flex items-center gap-2 cursor-pointer">
                            <span>Mở thiệp</span>
                            <span class="text-moc-greenTitle">🌿</span>
                        </button>
                    </div>
                </div>

                <!-- Bottom Note -->
                <div class="w-full text-center relative z-10">
                    <svg class="w-full h-7 mx-auto" viewBox="0 0 480 48">
                        <use href="#moc-botanical-divider" />
                    </svg>
                    <p class="text-[11px] text-moc-text/75 italic">
                        Chạm vào "Mở thiệp" để bật giai điệu &amp; mở thiệp Hoa Mộc Xanh
                    </p>
                </div>
            </div>
        </div>

        <!-- ===================================================================
             2. EXACT HERO SECTION (100% IDENTICAL TO USER'S SCREENSHOT)
             - Warm Ivory Cream Background (#FFFAF7)
             - Top-Right Watercolor Hoa Mộc Cluster (White Flowers, Golden Stamens, Lush Leaves)
             - Bottom-Left Watercolor Hoa Mộc Cluster
             - Faint Translucent Watermark Blossoms (Top-Left & Bottom-Right)
             - Full-Width Dark Forest Green Horizontal Botanical Band (#2C4223)
             - Two Tilted Taupe-Bordered Frames (#A68972):
               * Top-Left Groom Frame (-10.5deg) + "{{ $weddingCard->groom_rank ?: 'Trưởng Nam' }} / {{ $weddingCard->groom_name }}" on right
               * Bottom-Right Bride Frame (+10.5deg) + "{{ $weddingCard->bride_rank ?: 'Út Nữ' }} / {{ $weddingCard->bride_name }}" on left
             - Right-Edge White Pill Floating Badge with Blue Droplet Sparkle Icon
             =================================================================== -->
        <section id="sec-hero" class="relative w-full min-h-[820px] sm:min-h-[850px] overflow-hidden select-none pt-2 pb-10">

            <!-- LAYER 1A: FAINT WATERMARK WHITE BLOSSOMS & LEAVES (TOP-LEFT BEHIND GROOM) -->
            <div data-parallax="-0.08" class="pointer-events-none absolute top-[55px] -left-[35px] w-[280px] h-[310px] opacity-[0.22] z-0">
                <svg viewBox="0 0 280 310" class="w-full h-full">
                    <use href="#moc-leaf-light" transform="translate(115, 115) rotate(-35) scale(1.35)" />
                    <use href="#moc-leaf-mid" transform="translate(145, 145) rotate(55) scale(1.3)" />
                    <use href="#moc-leaf-light" transform="translate(75, 195) rotate(-65) scale(1.25)" />
                    <use href="#moc-leaf-mid" transform="translate(180, 190) rotate(82) scale(1.15)" />
                    <use href="#moc-leaf-light" transform="translate(95, 240) rotate(-120) scale(1.2)" />
                    <use href="#moc-flower-bloom" transform="translate(92, 130) scale(1.35)" />
                    <use href="#moc-flower-bloom" transform="translate(42, 215) scale(0.95)" />
                </svg>
            </div>

            <!-- LAYER 1B: FAINT WATERMARK WHITE BLOSSOMS & LEAVES (BOTTOM-RIGHT BEHIND BRIDE) -->
            <div data-parallax="0.08" class="pointer-events-none absolute bottom-[5px] -right-[25px] w-[320px] h-[340px] opacity-[0.23] z-0">
                <svg viewBox="0 0 320 340" class="w-full h-full">
                    <!-- Soft Sage Leaf Behind "{{ $weddingCard->bride_rank ?: 'Út Nữ' }} / {{ $weddingCard->bride_name }}" Text -->
                    <use href="#moc-leaf-light" transform="translate(88, 95) rotate(-30) scale(1.45)" />
                    <use href="#moc-leaf-mid" transform="translate(210, 145) rotate(25) scale(1.4)" />
                    <use href="#moc-leaf-light" transform="translate(160, 245) rotate(-55) scale(1.35)" />
                    <use href="#moc-leaf-mid" transform="translate(245, 250) rotate(65) scale(1.35)" />
                    <use href="#moc-flower-bloom" transform="translate(215, 190) scale(1.45)" />
                    <use href="#moc-flower-bloom" transform="translate(135, 285) scale(1.1)" />
                </svg>
            </div>

            <!-- LAYER 2: TOP-RIGHT FOREGROUND WATERCOLOR HOA MỘC CLUSTER (MATCHING SCREENSHOT) -->
            <div data-parallax="-0.05" class="pointer-events-none absolute -top-[12px] -right-[14px] w-[345px] h-[275px] z-20 sway-top-right">
                <svg viewBox="0 0 350 280" class="w-full h-full drop-shadow-sm">
                    <!-- Back Lighter Watercolor Leaves Hanging Down -->
                    <use href="#moc-leaf-light" transform="translate(195, 125) rotate(165) scale(1.28)" />
                    <use href="#moc-leaf-light" transform="translate(245, 148) rotate(172) scale(1.32)" />
                    <use href="#moc-leaf-light" transform="translate(330, 155) rotate(160) scale(1.45)" />
                    <use href="#moc-leaf-mid" transform="translate(152, 85) rotate(135) scale(1.18)" />
                    <!-- Mid & Dark Lush Green Leaves -->
                    <use href="#moc-leaf-mid" transform="translate(282, 118) rotate(155) scale(1.35)" />
                    <use href="#moc-leaf-dark" transform="translate(240, 72) rotate(158) scale(1.28)" />
                    <use href="#moc-leaf-dark" transform="translate(295, 78) rotate(138) scale(1.32)" />
                    <use href="#moc-leaf-dark" transform="translate(335, 65) rotate(118) scale(1.2)" />
                    <!-- Woody Twig Stem -->
                    <path d="M 355,12 Q 280,22 215,42" fill="none" stroke="#6E5239" stroke-width="4.5" stroke-linecap="round" />
                    <!-- Side White Buds at Top-Right -->
                    <use href="#moc-flower-side" transform="translate(295, 25) rotate(155) scale(0.95)" />
                    <!-- Large Main White 5-Petal Hoa Mộc Blossom with Rich Golden Stamens -->
                    <use href="#moc-flower-bloom" transform="translate(205, 48) rotate(12) scale(1.38)" />
                </svg>
            </div>

            <!-- LAYER 3: FULL-WIDTH DARK FOREST GREEN HORIZONTAL BOTANICAL BAND (MIDDLE) -->
            <div class="hero-forest-band absolute left-0 right-0 top-[352px] h-[56px] z-10 overflow-hidden flex items-center">
                <!-- Subtle Dark Botanical Pattern Inside Band -->
                <svg class="w-full h-full opacity-25" viewBox="0 0 480 60" preserveAspectRatio="none">
                    <g fill="#8FB369">
                        <circle cx="28" cy="30" r="14" opacity="0.3" />
                        <path d="M 45,30 C 55,10 75,10 85,30 C 75,50 55,50 45,30 Z" />
                        <path d="M 95,25 C 110,5 130,5 140,25 C 130,45 110,45 95,25 Z" opacity="0.6" />
                        <path d="M 340,32 C 355,12 375,12 385,32 C 375,52 355,52 340,32 Z" />
                        <path d="M 395,24 C 415,6 435,6 450,24 C 435,44 415,44 395,24 Z" opacity="0.7" />
                        <circle cx="460" cy="34" r="12" opacity="0.35" />
                    </g>
                    <!-- Small Faint Blossom Silhouettes Inside Green Band -->
                    <use href="#moc-flower-bloom" transform="translate(35, 32) scale(0.42)" opacity="0.35" />
                    <use href="#moc-flower-bloom" transform="translate(95, 26) scale(0.35)" opacity="0.28" />
                    <use href="#moc-flower-bloom" transform="translate(390, 30) scale(0.4)" opacity="0.32" />
                    <use href="#moc-flower-bloom" transform="translate(445, 28) scale(0.34)" opacity="0.28" />
                </svg>
            </div>

            @php
                $groomAvatarSrc = !empty($weddingCard->groom_avatar)
                    ? (str_starts_with($weddingCard->groom_avatar, 'http') ? $weddingCard->groom_avatar : asset('storage/' . $weddingCard->groom_avatar))
                    : (!empty($weddingCard->groom_image)
                        ? (str_starts_with($weddingCard->groom_image, 'http') ? $weddingCard->groom_image : asset('storage/' . $weddingCard->groom_image))
                        : 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=800&q=85');

                $brideAvatarSrc = !empty($weddingCard->bride_avatar)
                    ? (str_starts_with($weddingCard->bride_avatar, 'http') ? $weddingCard->bride_avatar : asset('storage/' . $weddingCard->bride_avatar))
                    : (!empty($weddingCard->bride_image)
                        ? (str_starts_with($weddingCard->bride_image, 'http') ? $weddingCard->bride_image : asset('storage/' . $weddingCard->bride_image))
                        : 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=800&q=85');
            @endphp
            <!-- LAYER 4: TWO TILTED OVERLAPPING PORTRAIT FRAMES & COUPLE TYPOGRAPHY -->
            <div class="relative z-20 w-full h-[640px] mt-[115px]">

                <!-- 4A. GROOM TILTED PORTRAIT FRAME (TOP-LEFT, ROTATED -10.5DEG) -->
                <div onclick="openLightbox(0)"
                     class="portrait-frame-groom cursor-pointer absolute left-[10.5%] top-[18px] w-[46%] aspect-[3/3.82] overflow-hidden">
                    <div class="relative w-full h-full bg-[#3A5328] overflow-hidden">
                        <img src="{{ $groomAvatarSrc }}"
                             alt="Chú Rể {{ $weddingCard->groom_name }}"
                             class="w-full h-full object-cover object-center brightness-105 contrast-[1.02]"
                             onerror="this.src='https://placehold.co/450x570/3A5328/FFFFFF?text=Chú+Rể'">
                        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/15 via-transparent to-emerald-950/10"></div>
                    </div>
                </div>

                <!-- 4B. GROOM TYPOGRAPHY: "{{ $weddingCard->groom_rank ?: 'Trưởng Nam' }} / {{ $weddingCard->groom_name }}" (TO THE RIGHT OF GROOM FRAME, ABOVE GREEN BAND) -->
                <div class="absolute left-[56%] top-[128px] right-4 text-left z-30 pointer-events-none">
                    <p class="font-serif text-[15px] sm:text-[16px] font-semibold text-[#4D5D43] tracking-wide leading-snug">
                        {{ $weddingCard->groom_rank ?: 'Trưởng Nam' }}
                    </p>
                    <h1 class="font-serif text-[32px] sm:text-[36px] font-semibold text-[#4D663C] leading-tight mt-0.5 tracking-tight">
                        {{ $weddingCard->groom_name }}
                    </h1>
                </div>

                <!-- 4C. BRIDE TILTED PORTRAIT FRAME (BOTTOM-RIGHT, ROTATED +10.5DEG, OVERLAPPING GREEN BAND) -->
                <div onclick="openLightbox(1)"
                     class="portrait-frame-bride cursor-pointer absolute right-[11.5%] top-[232px] w-[46%] aspect-[3/3.82] overflow-hidden z-20">
                    <div class="relative w-full h-full bg-[#3D562A] overflow-hidden">
                        <img src="{{ $brideAvatarSrc }}"
                             alt="Cô Dâu {{ $weddingCard->bride_name }}"
                             class="w-full h-full object-cover object-center brightness-105"
                             onerror="this.src='https://placehold.co/450x570/3D562A/FFFFFF?text=Cô+Dâu'">
                        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-black/15 via-transparent to-emerald-950/10"></div>
                    </div>
                </div>

                <!-- 4D. BRIDE TYPOGRAPHY: "{{ $weddingCard->bride_rank ?: 'Út Nữ' }} / {{ $weddingCard->bride_name }}" (TO THE LEFT OF BRIDE FRAME, BELOW GREEN BAND) -->
                <div class="absolute left-6 right-[55.5%] top-[338px] text-right z-30 pointer-events-none">
                    <p class="font-serif text-[15px] sm:text-[16px] font-semibold text-[#4D5D43] tracking-wide leading-snug">
                        {{ $weddingCard->bride_rank ?: 'Út Nữ' }}
                    </p>
                    <h2 class="font-serif text-[32px] sm:text-[36px] font-semibold text-[#4D663C] leading-tight mt-0.5 tracking-tight">
                        {{ $weddingCard->bride_name }}
                    </h2>
                </div>
            </div>

            <!-- LAYER 5: RIGHT-EDGE WHITE PILL FLOATING BADGE WITH BLUE DROPLET SPARKLE ICON (EXACT MATCH) -->
            <button onclick="triggerPetalShower()" title="Hiệu ứng cánh hoa rơi"
                    class="absolute right-0 top-[452px] z-30 bg-white hover:bg-sky-50 active:scale-95 transition-all pl-3 pr-3.5 py-2 rounded-l-full shadow-[0_4px_16px_rgba(0,0,0,0.12)] border border-r-0 border-slate-100 flex items-center justify-center cursor-pointer">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                    <!-- Blue Water Droplet -->
                    <path d="M10.5 4.5C10.5 4.5 5.5 10.2 5.5 14C5.5 16.7614 7.73858 19 10.5 19C13.2614 19 15.5 16.7614 15.5 14C15.5 10.2 10.5 4.5 10.5 4.5Z" fill="#0EA5E9"/>
                    <path d="M8.2 14.5C8.2 13.2 9 11.8 9.5 11" stroke="#BAE6FD" stroke-width="1.3" stroke-linecap="round"/>
                    <!-- Four-Point Blue Sparkles -->
                    <path d="M18 4L18.6 5.9L20.5 6.5L18.6 7.1L18 9L17.4 7.1L15.5 6.5L17.4 5.9L18 4Z" fill="#38BDF8"/>
                    <path d="M19.5 11.5L19.9 12.6L21 13L19.9 13.4L19.5 14.5L19.1 13.4L18 13L19.1 12.6L19.5 11.5Z" fill="#0284C7"/>
                </svg>
            </button>

            <!-- LAYER 6: BOTTOM-LEFT FOREGROUND WATERCOLOR HOA MỘC CLUSTER (MATCHING SCREENSHOT) -->
            <div data-parallax="0.04" class="pointer-events-none absolute bottom-0 -left-[12px] w-[265px] h-[270px] z-20 sway-bottom-left">
                <svg viewBox="0 0 270 275" class="w-full h-full drop-shadow-sm">
                    <!-- Woody Branch Stems -->
                    <path d="M -5,190 Q 55,180 128,195" fill="none" stroke="#7A5C43" stroke-width="3.6" stroke-linecap="round" />
                    <path d="M 48,184 Q 72,218 92,248" fill="none" stroke="#7A5C43" stroke-width="2.8" stroke-linecap="round" />
                    <!-- Top-Left Protruding Green Leaf -->
                    <use href="#moc-leaf-mid" transform="translate(8, 36) rotate(72) scale(0.95)" />
                    <!-- Lush Extending Green Leaves to the Right & Down -->
                    <use href="#moc-leaf-light" transform="translate(95, 165) rotate(25) scale(1.05)" />
                    <use href="#moc-leaf-mid" transform="translate(115, 192) rotate(112) scale(1.08)" />
                    <use href="#moc-leaf-dark" transform="translate(72, 200) rotate(145) scale(1.18)" />
                    <use href="#moc-leaf-mid" transform="translate(112, 212) rotate(148) scale(1.05)" />
                    <use href="#moc-leaf-dark" transform="translate(36, 208) rotate(168) scale(1.12)" />
                    <!-- Main Blooming White Hoa Mộc Flower in Middle-Left -->
                    <use href="#moc-flower-bloom" transform="translate(26, 118) rotate(-8) scale(1.18)" />
                    <!-- Lower White Blossoms & Buds -->
                    <use href="#moc-flower-side" transform="translate(12, 195) rotate(45) scale(0.85)" />
                    <use href="#moc-flower-bloom" transform="translate(15, 258) rotate(18) scale(0.98)" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             3. SAVE THE DATE & TWO-COLUMN FAMILY INFORMATION (NHÀ TRAI - NHÀ GÁI)
             =================================================================== -->
        <section id="sec-family" class="relative pt-4 pb-6 px-6 text-center">
            <!-- Hoa Mộc Header Emblem -->
            <div class="reveal-item mx-auto w-40 h-12 mb-1">
                <svg viewBox="0 0 200 50" class="w-full h-full">
                    <use href="#moc-section-header" />
                </svg>
            </div>

            <p class="reveal-item text-[11px] uppercase tracking-[0.26em] text-moc-greenTitle font-semibold">
                Trân Trọng Báo Tin Lễ Thành Hôn
            </p>
            <p class="reveal-item font-serif italic text-base text-moc-text/85 max-w-[345px] mx-auto mt-1 leading-relaxed">
                "Giữa hương hoa mộc tinh khôi và sắc xanh dịu mát của khu vườn mùa hạ, chúng mình nắm tay nhau bước vào chương mới của cuộc đời."
            </p>

            <!-- Two-Column Symmetrical Family Box: NHÀ TRAI | NHÀ GÁI -->
            <div class="reveal-item mt-5 grid grid-cols-2 gap-3 bg-[#F7F2EB] border border-moc-taupe/45 rounded-2xl p-4 shadow-sm relative">
                <!-- Center Vertical Divider -->
                <div class="absolute inset-y-4 left-1/2 w-[1px] bg-gradient-to-b from-transparent via-moc-taupe/60 to-transparent"></div>

                <!-- Nhà Trai -->
                <div class="pr-2 text-center">
                    <span class="inline-block bg-moc-greenDark text-white text-[10px] uppercase tracking-[0.18em] px-2.5 py-0.5 rounded-full font-medium mb-2">
                        Nhà Trai
                    </span>
                    <p class="text-xs text-moc-text leading-relaxed">
                        Ông: <strong class="text-moc-greenDark">{{ $weddingCard->groom_father_name ?: ($weddingCard->groom_father ?: 'Nguyễn Quốc Minh') }}</strong>
                    </p>
                    <p class="text-xs text-moc-text leading-relaxed mt-0.5">
                        Bà: <strong class="text-moc-greenDark">{{ $weddingCard->groom_mother_name ?: ($weddingCard->groom_mother ?: 'Lê Thị Thanh Mai') }}</strong>
                    </p>
                    <p class="text-[11px] text-moc-text/75 mt-1.5 leading-snug">
                        📍 {{ $weddingCard->address_groom ?: ($weddingCard->groom_address ?: 'Quận Ba Đình, TP. Hà Nội') }}
                    </p>
                </div>

                <!-- Nhà Gái -->
                <div class="pl-2 text-center">
                    <span class="inline-block bg-moc-greenDark text-white text-[10px] uppercase tracking-[0.18em] px-2.5 py-0.5 rounded-full font-medium mb-2">
                        Nhà Gái
                    </span>
                    <p class="text-xs text-moc-text leading-relaxed">
                        Ông: <strong class="text-moc-greenDark">{{ $weddingCard->bride_father_name ?: ($weddingCard->bride_father ?: 'Trần Đình Hòa') }}</strong>
                    </p>
                    <p class="text-xs text-moc-text leading-relaxed mt-0.5">
                        Bà: <strong class="text-moc-greenDark">{{ $weddingCard->bride_mother_name ?: ($weddingCard->bride_mother ?: 'Phạm Thị Bích Ngọc') }}</strong>
                    </p>
                    <p class="text-[11px] text-moc-text/75 mt-1.5 leading-snug">
                        📍 {{ $weddingCard->address_bride ?: ($weddingCard->bride_address ?: 'Quận Cầu Giấy, TP. Hà Nội') }}
                    </p>
                </div>
            </div>

            <!-- Couple Formal Hierarchy Card -->
            <div class="reveal-item mt-5 py-4 px-4 bg-white/90 border border-moc-taupe/40 rounded-2xl shadow-sm">
                <div class="grid grid-cols-2 gap-2 items-center">
                    <div>
                        <span class="text-[11px] font-serif font-semibold text-moc-taupeDark uppercase tracking-widest">{{ $weddingCard->groom_rank ?: 'Trưởng Nam' }}</span>
                        <h3 class="font-serif text-2xl font-bold text-moc-greenTitle mt-0.5">{{ $weddingCard->groom_name }}</h3>
                    </div>
                    <div>
                        <span class="text-[11px] font-serif font-semibold text-moc-taupeDark uppercase tracking-widest">{{ $weddingCard->bride_rank ?: 'Út Nữ' }}</span>
                        <h3 class="font-serif text-2xl font-bold text-moc-greenTitle mt-0.5">{{ $weddingCard->bride_name }}</h3>
                    </div>
                </div>
            </div>

            <!-- Botanical Divider -->
            <div class="mt-6 -mx-6">
                <svg class="w-full h-10" viewBox="0 0 480 48">
                    <use href="#moc-botanical-divider" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             4. CEREMONY DETAILS: TIỆC CƯỚI NHÀ TRAI & TIỆC CƯỚI NHÀ GÁI
             =================================================================== -->
        <section id="sec-ceremonies" class="relative py-4 px-6 space-y-5">
            <div class="reveal-item text-center">
                <p class="text-[11px] uppercase tracking-[0.26em] text-moc-taupeDark font-semibold">Thời Gian &amp; Địa Điểm</p>
                <h3 class="font-serif text-3xl font-bold text-moc-greenTitle mt-0.5">Thông Tin Tiệc Cưới</h3>
            </div>

            @php
                // 1. Dữ liệu Tiệc Cưới Nhà Trai
                $groomPartyDate = $weddingCard->groom_eating_date ?: $weddingCard->wedding_date;
                $groomPartyTime = $weddingCard->time_groom ?: ($weddingCard->wedding_time ?: '11:00');
                $groomPartyDayOfWeek = $groomPartyDate ? mb_strtoupper($groomPartyDate->locale('vi')->isoFormat('dddd')) : 'CHỦ NHẬT';
                $groomPartyDay = $groomPartyDate ? $groomPartyDate->format('d') : '24';
                $groomPartyMonth = $groomPartyDate ? $groomPartyDate->format('m') : '05';
                $groomPartyYear = $groomPartyDate ? $groomPartyDate->format('Y') : '2026';
                $groomPartyLunar = $weddingCard->time_groom_al ?: ($weddingCard->wedding_date_al ?: ($weddingCard->wedding_date_lunar ?: 'ngày 08 tháng 04 năm Bính Ngọ'));
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
                $bridePartyLunar = $weddingCard->time_bride_al ?: ($weddingCard->wedding_date_al ?: ($weddingCard->wedding_date_lunar ?: 'ngày 08 tháng 04 năm Bính Ngọ'));
                $brideVenueAddress = $weddingCard->address_bride ?: ($weddingCard->address_wedding ?: 'Tư gia Nhà Gái');
                $brideMapUrl = !empty($weddingCard->bride_map)
                    ? $weddingCard->bride_map
                    : (!empty($weddingCard->address_wedding_map)
                        ? $weddingCard->address_wedding_map
                        : ('https://www.google.com/maps/search/?api=1&query=' . urlencode($brideVenueAddress)));
            @endphp

            <!-- CARD 1: TIỆC CƯỚI NHÀ TRAI -->
            <div class="reveal-left bg-gradient-to-b from-[#F9F6F0] to-white border-2 border-moc-taupe rounded-3xl p-5 shadow-md">
                <div class="flex items-center justify-between">
                    <span class="inline-flex items-center gap-1.5 bg-moc-greenDark text-white text-[11px] font-semibold px-3 py-1 rounded-full shadow-sm">
                        <span>🤵</span> {{ $weddingCard->groom_eating_title ?: 'Tiệc Cưới Nhà Trai' }}
                    </span>
                    <span class="text-xs font-serif font-bold text-moc-greenTitle">{{ $groomPartyTime }} — {{ $groomPartyDayOfWeek }}</span>
                </div>

                <div class="my-3 py-2.5 px-3 bg-white border border-moc-taupe/35 rounded-2xl flex items-center justify-center gap-3 font-serif text-moc-greenDark">
                    <span class="text-3xl font-bold text-moc-greenTitle">{{ $groomPartyDay }}</span>
                    <span class="h-6 w-[1px] bg-moc-taupe/50"></span>
                    <span class="text-lg font-semibold uppercase tracking-wider">Tháng {{ $groomPartyMonth }}</span>
                    <span class="h-6 w-[1px] bg-moc-taupe/50"></span>
                    <span class="text-2xl font-bold">{{ $groomPartyYear }}</span>
                </div>

                <p class="text-xs italic text-moc-text/80 text-center">
                    (Tức {{ $groomPartyLunar }})
                </p>

                <div class="mt-3 pt-3 border-t border-dashed border-moc-taupe/40 text-xs text-moc-text space-y-1.5">
                    <p>📍 <strong>Địa điểm tổ chức:</strong> {{ $groomVenueAddress }}</p>
                </div>

                <!-- Google Maps & Call Groom Buttons -->
                <div class="grid {{ !empty($weddingCard->groom_phone) ? 'grid-cols-2' : 'grid-cols-1' }} gap-2.5 mt-3">
                    <a href="{{ $groomMapUrl }}"
                       target="_blank" rel="noopener noreferrer"
                       class="bg-moc-greenDark hover:bg-moc-greenTitle text-white text-xs font-medium py-2.5 px-3 rounded-xl text-center shadow-sm flex items-center justify-center gap-1.5 transition">
                        <span>🗺️</span> Chỉ đường Bản đồ
                    </a>
                    @if(!empty($weddingCard->groom_phone))
                        <a href="tel:{{ $weddingCard->groom_phone }}"
                           class="bg-white hover:bg-moc-card text-moc-greenDark border border-moc-taupe text-xs font-medium py-2.5 px-3 rounded-xl text-center flex items-center justify-center gap-1.5 transition">
                            <span>📞</span> Liên hệ: {{ $weddingCard->groom_phone }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- CARD 2: TIỆC CƯỚI NHÀ GÁI -->
            <div class="reveal-right bg-white border border-moc-taupe/45 rounded-3xl p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <span class="inline-flex items-center gap-1.5 bg-moc-card text-moc-greenDark text-[11px] font-semibold px-3 py-1 rounded-full border border-moc-taupe/40">
                        <span>👰</span> {{ $weddingCard->bride_eating_title ?: 'Tiệc Cưới Nhà Gái' }}
                    </span>
                    <span class="text-xs font-serif italic text-moc-taupeDark font-semibold">{{ $bridePartyTime }} — {{ $bridePartyDayOfWeek }}</span>
                </div>

                <div class="my-3 py-2.5 px-3 bg-moc-paper border border-moc-taupe/35 rounded-2xl flex items-center justify-center gap-3 font-serif text-moc-greenDark">
                    <span class="text-3xl font-bold text-moc-greenTitle">{{ $bridePartyDay }}</span>
                    <span class="h-6 w-[1px] bg-moc-taupe/50"></span>
                    <span class="text-lg font-semibold uppercase tracking-wider">Tháng {{ $bridePartyMonth }}</span>
                    <span class="h-6 w-[1px] bg-moc-taupe/50"></span>
                    <span class="text-2xl font-bold">{{ $bridePartyYear }}</span>
                </div>

                <p class="text-xs italic text-moc-text/80 text-center">
                    (Tức {{ $bridePartyLunar }})
                </p>

                <div class="mt-3 pt-3 border-t border-dashed border-moc-taupe/40 text-xs text-moc-text space-y-1.5">
                    <p>📍 <strong>Địa điểm tổ chức:</strong> {{ $brideVenueAddress }}</p>
                </div>

                <!-- Google Maps & Call Bride Buttons -->
                <div class="grid {{ !empty($weddingCard->bride_phone) ? 'grid-cols-2' : 'grid-cols-1' }} gap-2.5 mt-3">
                    <a href="{{ $brideMapUrl }}"
                       target="_blank" rel="noopener noreferrer"
                       class="bg-moc-greenDark hover:bg-moc-greenTitle text-white text-xs font-medium py-2.5 px-3 rounded-xl text-center shadow-sm flex items-center justify-center gap-1.5 transition">
                        <span>🗺️</span> Chỉ đường Bản đồ
                    </a>
                    @if(!empty($weddingCard->bride_phone))
                        <a href="tel:{{ $weddingCard->bride_phone }}"
                           class="bg-white hover:bg-moc-card text-moc-greenDark border border-moc-taupe text-xs font-medium py-2.5 px-3 rounded-xl text-center flex items-center justify-center gap-1.5 transition">
                            <span>📞</span> Liên hệ: {{ $weddingCard->bride_phone }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- Botanical Divider -->
            <div class="pt-2 -mx-6">
                <svg class="w-full h-10" viewBox="0 0 480 48">
                    <use href="#moc-botanical-divider" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             5. MINI WEDDING CALENDAR (THÁNG 05 / 2026 - DAY 24) & LIVE COUNTDOWN
             =================================================================== -->
        <section id="sec-calendar" class="relative py-4 px-6">
            <div class="reveal-scale bg-white border border-moc-taupe/50 rounded-3xl p-5 shadow-md text-center">
                @php
                    $cal = $weddingCard->calendar_matrix;
                    $leadEmpty = ($cal['start_day_of_week'] == 0) ? 6 : ($cal['start_day_of_week'] - 1);
                @endphp
                <p class="text-[11px] uppercase tracking-[0.26em] text-moc-taupeDark font-semibold">Save The Date</p>
                <h4 class="font-serif text-2xl font-bold text-moc-greenTitle mt-0.5 mb-3">
                    {{ $cal['month_title'] }}
                </h4>

                <!-- Days of Week Header -->
                <div class="grid grid-cols-7 gap-1 text-[11px] font-semibold text-moc-greenDark border-b border-moc-taupe/30 pb-2 mb-2">
                    <div>T2</div><div>T3</div><div>T4</div><div>T5</div><div>T6</div><div>T7</div><div class="text-moc-taupeDark">CN</div>
                </div>

                <!-- Calendar Grid -->
                <div class="grid grid-cols-7 gap-y-2 gap-x-1 text-xs font-serif text-moc-text items-center">
                    @for ($i = 0; $i < $leadEmpty; $i++)
                        <div></div>
                    @endfor
                    @for ($d = 1; $d <= $cal['total_days']; $d++)
                        @if ($d == $cal['active_day'])
                            <div class="relative flex items-center justify-center py-1">
                                <span class="pulse-heart absolute inset-0 m-auto w-8 h-8 rounded-full bg-moc-greenTitle text-white flex items-center justify-center shadow-md"></span>
                                <span class="relative z-10 text-white font-sans font-bold text-xs">{{ $d }}</span>
                                <span class="absolute -top-2 -right-0.5 text-[10px]">🌿</span>
                            </div>
                        @else
                            <div class="py-1 {{ ($leadEmpty + $d) % 7 == 0 ? 'text-moc-taupeDark' : '' }}">{{ $d }}</div>
                        @endif
                    @endfor
                </div>

                <!-- Live Countdown Timer Boxes -->
                <div class="mt-5 pt-4 border-t border-dashed border-moc-taupe/40">
                    <p id="countdown-label" class="text-[11px] uppercase tracking-[0.2em] text-moc-greenTitle font-semibold mb-2.5">
                        Đếm Ngược Đến Ngày Chung Đôi ({{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '24.05.2026' }})
                    </p>
                    <div class="grid grid-cols-4 gap-2">
                        <div class="bg-moc-paper border border-moc-taupe/40 rounded-2xl py-2.5 px-1">
                            <span id="cd-days" class="font-serif text-2xl font-bold text-moc-greenDark block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-moc-text/80 mt-1 block">Ngày</span>
                        </div>
                        <div class="bg-moc-paper border border-moc-taupe/40 rounded-2xl py-2.5 px-1">
                            <span id="cd-hours" class="font-serif text-2xl font-bold text-moc-greenDark block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-moc-text/80 mt-1 block">Giờ</span>
                        </div>
                        <div class="bg-moc-paper border border-moc-taupe/40 rounded-2xl py-2.5 px-1">
                            <span id="cd-mins" class="font-serif text-2xl font-bold text-moc-greenDark block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-moc-text/80 mt-1 block">Phút</span>
                        </div>
                        <div class="bg-moc-paper border border-moc-taupe/40 rounded-2xl py-2.5 px-1">
                            <span id="cd-secs" class="font-serif text-2xl font-bold text-moc-taupeDark block leading-none">00</span>
                            <span class="text-[10px] uppercase tracking-wider text-moc-text/80 mt-1 block">Giây</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botanical Divider -->
            <div class="mt-6 -mx-6">
                <svg class="w-full h-10" viewBox="0 0 480 48">
                    <use href="#moc-botanical-divider" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             6. WEDDING TIMELINE (LỊCH TRÌNH) & BOHO GARDEN DRESS CODE
             =================================================================== -->
        <section id="sec-timeline" class="relative py-4 px-6">
            <div class="reveal-item text-center mb-5">
                <p class="text-[11px] uppercase tracking-[0.25em] text-moc-taupeDark font-semibold">Chương Trình Hôn Lễ</p>
                <h3 class="font-serif text-3xl font-bold text-moc-greenTitle mt-0.5">Lịch Trình Ngày Cưới</h3>
            </div>

            <!-- Vertical Botanical Timeline -->
            @if (!empty($weddingCard->timeline_list) && count($weddingCard->timeline_list) > 0)
                <div class="relative pl-3 space-y-4 before:content-[''] before:absolute before:left-[36px] before:top-5 before:bottom-5 before:w-[1.5px] before:bg-gradient-to-b before:from-moc-taupe/40 before:via-moc-greenTitle before:to-moc-taupe/40">
                    @foreach ($weddingCard->timeline_list as $item)
                        <div class="reveal-left relative flex items-center gap-3.5">
                            <div class="relative z-10 w-12 h-12 rounded-2xl bg-white border-2 border-moc-taupe shadow-sm flex items-center justify-center shrink-0 text-lg">
                                🌿
                            </div>
                            <div class="flex-1 bg-white border border-moc-taupe/40 rounded-2xl p-3.5 shadow-sm">
                                <div class="flex items-center justify-between">
                                    <span class="bg-moc-card text-moc-greenDark font-serif font-bold text-xs px-2.5 py-0.5 rounded-full">{{ $item['time'] ?? '' }}</span>
                                </div>
                                <h4 class="font-semibold text-sm text-moc-greenDark mt-1">{{ $item['title'] ?? '' }}</h4>
                                @if(!empty($item['description']))
                                    <p class="text-xs text-moc-text/85 mt-0.5">{{ $item['description'] }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="relative pl-3 space-y-4 before:content-[''] before:absolute before:left-[36px] before:top-5 before:bottom-5 before:w-[1.5px] before:bg-gradient-to-b before:from-moc-taupe/40 before:via-moc-greenTitle before:to-moc-taupe/40">
                    <div class="reveal-left relative flex items-center gap-3.5">
                        <div class="relative z-10 w-12 h-12 rounded-2xl bg-white border-2 border-moc-taupe shadow-sm flex items-center justify-center shrink-0 text-lg">
                            📸
                        </div>
                        <div class="flex-1 bg-white border border-moc-taupe/40 rounded-2xl p-3.5 shadow-sm">
                            <div class="flex items-center justify-between">
                                <span class="bg-moc-card text-moc-greenDark font-serif font-bold text-xs px-2.5 py-0.5 rounded-full">10:30</span>
                                <span class="text-[10px] text-moc-greenTitle font-medium">🌿 Vườn Hoa Mộc</span>
                            </div>
                            <h4 class="font-semibold text-sm text-moc-greenDark mt-1">Đón Khách &amp; Trà Chiều Check-in</h4>
                            <p class="text-xs text-moc-text/85 mt-0.5">Gặp gỡ, chụp hình kỷ niệm cùng {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }} tại không gian sân vườn.</p>
                        </div>
                    </div>

                    <div class="reveal-left relative flex items-center gap-3.5">
                        <div class="relative z-10 w-12 h-12 rounded-2xl bg-white border-2 border-moc-taupe shadow-sm flex items-center justify-center shrink-0 text-lg">
                            💍
                        </div>
                        <div class="flex-1 bg-white border border-moc-taupe/40 rounded-2xl p-3.5 shadow-sm">
                            <div class="flex items-center justify-between">
                                <span class="bg-moc-card text-moc-greenDark font-serif font-bold text-xs px-2.5 py-0.5 rounded-full">11:00</span>
                                <span class="text-[10px] text-moc-greenTitle font-medium">🌿 Lễ Đường</span>
                            </div>
                            <h4 class="font-semibold text-sm text-moc-greenDark mt-1">Nghi Thức Lễ Thành Hôn</h4>
                            <p class="text-xs text-moc-text/85 mt-0.5">Trao nhẫn cưới, rót rượu sâm panh và đón nhận lời chúc phúc từ hai bên gia đình.</p>
                        </div>
                    </div>

                    <div class="reveal-left relative flex items-center gap-3.5">
                        <div class="relative z-10 w-12 h-12 rounded-2xl bg-white border-2 border-moc-taupe shadow-sm flex items-center justify-center shrink-0 text-lg">
                            🥂
                        </div>
                        <div class="flex-1 bg-white border border-moc-taupe/40 rounded-2xl p-3.5 shadow-sm">
                            <div class="flex items-center justify-between">
                                <span class="bg-moc-card text-moc-greenDark font-serif font-bold text-xs px-2.5 py-0.5 rounded-full">11:30</span>
                                <span class="text-[10px] text-moc-greenTitle font-medium">🌿 Tiệc Thân Mật</span>
                            </div>
                            <h4 class="font-semibold text-sm text-moc-greenDark mt-1">Khai Tiệc &amp; Giao Lưu Âm Nhạc</h4>
                            <p class="text-xs text-moc-text/85 mt-0.5">Thưởng thức tiệc cưới, lắng nghe giai điệu Acoustic và tung hoa cưới may mắn.</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- DRESS CODE SWATCHES (BOHO FLORAL GREEN PALETTE) -->
            <div class="reveal-item mt-7 bg-[#F5F0E8] border border-moc-taupe/45 rounded-3xl p-5 text-center shadow-sm">
                <p class="text-[11px] uppercase tracking-[0.25em] text-moc-taupeDark font-semibold">Gợi Ý Trang Phục</p>
                <h4 class="font-serif text-2xl font-bold text-moc-greenTitle mt-0.5">Dress Code</h4>
                <p class="text-xs text-moc-text/85 mt-1">{{ $weddingCard->dresscode_note ?: 'Rất hân hạnh được đón tiếp Quý khách trong các gam màu thanh lịch đồng điệu cùng khu vườn Hoa Mộc' }}</p>

                <div class="mt-4 flex items-center justify-center gap-5 flex-wrap">
                    @if (!empty($weddingCard->dresscode_colors_list) && count($weddingCard->dresscode_colors_list) > 0)
                        @foreach ($weddingCard->dresscode_colors_list as $color)
                            <button onclick="selectDressCode('{{ $color['name'] ?? '' }} ({{ $color['hex'] }})')" class="group flex flex-col items-center gap-1.5 cursor-pointer">
                                <span class="w-11 h-11 rounded-full border-4 border-white shadow-md group-hover:scale-110 transition" style="background-color: {{ $color['hex'] }};"></span>
                                <span class="text-[11px] font-medium text-moc-greenDark">{{ $color['name'] ?? '' }}</span>
                            </button>
                        @endforeach
                    @else
                        <button onclick="selectDressCode('Trắng Kem (#F5F2EB) — Tinh khôi như cánh hoa mộc trắng.')" class="group flex flex-col items-center gap-1.5 cursor-pointer">
                            <span class="w-11 h-11 rounded-full bg-[#F5F2EB] border-4 border-moc-taupe/40 shadow-md group-hover:scale-110 transition"></span>
                            <span class="text-[11px] font-medium text-moc-greenDark">Trắng Kem</span>
                        </button>
                        <button onclick="selectDressCode('Xanh Lá Ô Liu (#587246) — Tươi mát, hài hòa cùng thiên nhiên.')" class="group flex flex-col items-center gap-1.5 cursor-pointer">
                            <span class="w-11 h-11 rounded-full bg-[#587246] border-4 border-white shadow-md group-hover:scale-110 transition"></span>
                            <span class="text-[11px] font-medium text-moc-greenDark">Xanh Ô Liu</span>
                        </button>
                        <button onclick="selectDressCode('Nâu Gỗ Taupe (#A68972) — Ấm áp, cổ điển và sang trọng.')" class="group flex flex-col items-center gap-1.5 cursor-pointer">
                            <span class="w-11 h-11 rounded-full bg-[#A68972] border-4 border-white shadow-md group-hover:scale-110 transition"></span>
                            <span class="text-[11px] font-medium text-moc-greenDark">Nâu Taupe</span>
                        </button>
                        <button onclick="selectDressCode('Be Champagne (#D8C39A) — Nhẹ nhàng, nhã nhặn.')" class="group flex flex-col items-center gap-1.5 cursor-pointer">
                            <span class="w-11 h-11 rounded-full bg-[#D8C39A] border-4 border-white shadow-md group-hover:scale-110 transition"></span>
                            <span class="text-[11px] font-medium text-moc-greenDark">Champagne</span>
                        </button>
                    @endif
                </div>

                <p id="dresscode-note" class="mt-3 text-xs italic text-moc-greenDark bg-white/90 rounded-xl py-2 px-3 border border-moc-taupe/35">
                    {{ $weddingCard->dresscode_note ?: '✨ Chạm vào từng ô màu để xem gợi ý phối đồ dự tiệc' }}
                </p>
            </div>

            <!-- Botanical Divider -->
            <div class="mt-6 -mx-6">
                <svg class="w-full h-10" viewBox="0 0 480 48">
                    <use href="#moc-botanical-divider" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             7. INTERACTIVE 3D FLIPBOOK PHOTO ALBUM & LIGHTBOX
             =================================================================== -->
        <section id="sec-album" class="relative py-4 px-6">
            <div class="reveal-item text-center mb-5">
                <p class="text-[11px] uppercase tracking-[0.25em] text-moc-taupeDark font-semibold">Khoảnh Khắc Ngọt Ngào</p>
                <h3 class="font-serif text-3xl font-bold text-moc-greenTitle mt-0.5">Album Ảnh Cưới 3D</h3>
                <p class="text-xs text-moc-text/80 italic mt-1">Chạm vào trang ảnh hoặc nút bên dưới để lật từng trang kỷ niệm</p>
            </div>

            <!-- 3D Flip Book Container -->
            <div class="reveal-scale book-stage relative mx-auto w-full max-w-[360px] h-[425px] select-none">
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-[#A68972] to-[#7D634E] p-2.5 shadow-2xl border-2 border-moc-taupe flex items-center justify-center">
                    <div id="album-pages-stack" class="relative w-full h-full rounded-xl bg-white overflow-hidden"></div>
                </div>
            </div>

            <!-- Album Flip Controls -->
            <div class="reveal-item mt-4 flex items-center justify-between max-w-[360px] mx-auto px-2">
                <button onclick="prevAlbumPage()" class="bg-white hover:bg-moc-card active:scale-95 text-moc-greenDark border border-moc-taupe rounded-full px-4 py-1.5 text-xs font-medium shadow-sm flex items-center gap-1.5 transition cursor-pointer">
                    <span>←</span> Trang trước
                </button>
                <span id="album-page-indicator" class="font-serif text-sm font-bold text-moc-greenDark">
                    Trang 1 / 6
                </span>
                <button onclick="nextAlbumPage()" class="bg-moc-greenDark hover:bg-moc-greenTitle active:scale-95 text-white rounded-full px-4 py-1.5 text-xs font-medium shadow-sm flex items-center gap-1.5 transition cursor-pointer">
                    Lật trang <span>→</span>
                </button>
            </div>

            <!-- Thumbnail Strip -->
            <div id="album-thumbs" class="reveal-item mt-4 grid grid-cols-6 gap-1.5 max-w-[360px] mx-auto"></div>

            <!-- Botanical Divider -->
            <div class="mt-6 -mx-6">
                <svg class="w-full h-10" viewBox="0 0 480 48">
                    <use href="#moc-botanical-divider" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             8. RSVP CONFIRMATION FORM & GUESTBOOK (SỔ LƯU BÚT)
             =================================================================== -->
        <section id="sec-rsvp" class="relative py-4 px-6 space-y-7">
            <!-- RSVP Form -->
            <div class="reveal-item bg-white border border-moc-taupe/50 rounded-3xl p-5 shadow-md">
                <div class="text-center mb-4">
                    <p class="text-[11px] uppercase tracking-[0.25em] text-moc-taupeDark font-semibold">Thông Tin Phản Hồi</p>
                    <h3 class="font-serif text-3xl font-bold text-moc-greenTitle mt-0.5">Xác Nhận Tham Dự</h3>
                    <p class="text-xs text-moc-text/80 mt-1">Sự hiện diện của Quý khách là niềm vinh hạnh lớn lao của gia đình chúng tôi</p>
                </div>

                <form id="rsvp-form" onsubmit="submitRSVP(event)" class="space-y-3 text-xs">
                    <div>
                        <label class="block text-moc-greenDark font-medium mb-1">Tên Quý khách *</label>
                        <input id="rsvp-name" type="text" required placeholder="Nhập họ và tên của bạn..."
                               class="w-full rounded-xl border border-moc-taupe/60 bg-moc-cream px-3.5 py-2.5 text-moc-greenDark font-medium focus:outline-none focus:border-moc-greenTitle">
                    </div>

                    <div class="grid grid-cols-2 gap-2.5">
                        <div>
                            <label class="block text-moc-greenDark font-medium mb-1">Khách mời của</label>
                            <select id="rsvp-side" class="w-full rounded-xl border border-moc-taupe/60 bg-moc-cream px-3 py-2.5 text-moc-greenDark focus:outline-none focus:border-moc-greenTitle">
                                <option value="Khách Nhà Trai">Khách Nhà Trai</option>
                                <option value="Khách Nhà Gái">Khách Nhà Gái</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-moc-greenDark font-medium mb-1">Số lượng tham dự</label>
                            <select id="rsvp-count" class="w-full rounded-xl border border-moc-taupe/60 bg-moc-cream px-3 py-2.5 text-moc-greenDark focus:outline-none focus:border-moc-greenTitle">
                                <option value="1 người">1 người</option>
                                <option value="2 người" selected>2 người</option>
                                <option value="Gia đình (3-4 người)">Gia đình (3-4 người)</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        <label class="flex items-center justify-center gap-1.5 border border-moc-taupe/60 rounded-xl py-2.5 px-2 cursor-pointer has-[:checked]:bg-moc-greenDark has-[:checked]:text-white has-[:checked]:border-moc-greenDark transition">
                            <input type="radio" name="attendance" value="Sẽ tham dự" checked class="hidden">
                            <span>🌿 Sẽ tham dự</span>
                        </label>
                        <label class="flex items-center justify-center gap-1.5 border border-moc-taupe/60 rounded-xl py-2.5 px-2 cursor-pointer has-[:checked]:bg-moc-taupeDark has-[:checked]:text-white has-[:checked]:border-moc-taupeDark transition">
                            <input type="radio" name="attendance" value="Xin gửi lời chúc" class="hidden">
                            <span>🕊️ Xin gửi lời chúc</span>
                        </label>
                    </div>

                    <button type="submit" class="btn-shimmer w-full bg-moc-greenDark hover:bg-moc-greenTitle text-white font-semibold py-3 rounded-xl shadow-md transition cursor-pointer">
                        Gửi Xác Nhận Tham Dự 🌿
                    </button>
                </form>
            </div>

            <!-- GUESTBOOK / SỔ LƯU BÚT -->
            <div class="reveal-item bg-[#F6F1E9] border border-moc-taupe/50 rounded-3xl p-5 shadow-md">
                <div class="text-center mb-4">
                    <p class="text-[11px] uppercase tracking-[0.25em] text-moc-taupeDark font-semibold">Gửi Trao Yêu Thương</p>
                    <h3 class="font-serif text-3xl font-bold text-moc-greenTitle mt-0.5">Sổ Lưu Bút</h3>
                </div>

                <div class="flex flex-wrap gap-1.5 mb-3">
                    <button type="button" onclick="fillPresetWish('Chúc {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }} trăm năm hạnh phúc, tình yêu luôn tươi mới và ngát hương như vườn hoa mộc!')" class="text-[11px] bg-white hover:bg-moc-cream border border-moc-taupe/40 text-moc-greenDark rounded-full px-2.5 py-1 transition cursor-pointer">
                        🌿 Trăm năm hạnh phúc
                    </button>
                    <button type="button" onclick="fillPresetWish('Chúc hai em sớm đón thiên thần nhỏ, gia đình luôn ngập tràn tiếng cười!')" class="text-[11px] bg-white hover:bg-moc-cream border border-moc-taupe/40 text-moc-greenDark rounded-full px-2.5 py-1 transition cursor-pointer">
                        👶 Sớm sinh quý tử
                    </button>
                </div>

                <form onsubmit="submitWish(event)" class="space-y-2.5 text-xs mb-5">
                    <input id="wish-author" type="text" required placeholder="Tên của bạn..."
                           class="w-full rounded-xl border border-moc-taupe/60 bg-white px-3.5 py-2 text-moc-greenDark focus:outline-none focus:border-moc-greenTitle">
                    <textarea id="wish-message" rows="2" required placeholder="Viết lời chúc mừng gửi tới {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}..."
                              class="w-full rounded-xl border border-moc-taupe/60 bg-white px-3.5 py-2 text-moc-greenDark focus:outline-none focus:border-moc-greenTitle"></textarea>
                    <button type="submit" class="w-full bg-moc-taupeDark hover:bg-moc-greenDark text-white font-semibold py-2.5 rounded-xl shadow transition cursor-pointer">
                        Gửi Lời Chúc Phúc 💌
                    </button>
                </form>

                <div id="wishes-list" class="wishes-scroll max-h-60 overflow-y-auto space-y-2.5 pr-1"></div>
            </div>

            <!-- Botanical Divider -->
            <div class="pt-2 -mx-6">
                <svg class="w-full h-10" viewBox="0 0 480 48">
                    <use href="#moc-botanical-divider" />
                </svg>
            </div>
        </section>

        <!-- ===================================================================
             9. WEDDING GIFT BOX & VIETQR MỪNG CƯỚI (HỘP QUÀ HOA MỘC)
             =================================================================== -->
        <section id="sec-gift" class="relative pt-2 pb-24 px-6 text-center">
            <div class="reveal-item mx-auto w-36 h-11 mb-1">
                <svg viewBox="0 0 200 50" class="w-full h-full">
                    <use href="#moc-section-header" />
                </svg>
            </div>

            <p class="reveal-item text-[11px] uppercase tracking-[0.25em] text-moc-taupeDark font-semibold">Gửi Trao Tâm Ý</p>
            <h3 class="reveal-item font-serif text-3xl font-bold text-moc-greenTitle mt-0.5">Hộp Quà Mừng Cưới</h3>
            <p class="reveal-item text-xs text-moc-text/85 max-w-[330px] mx-auto mt-1">
                Chạm vào hộp quà Hoa Mộc bên dưới để gửi tình cảm và lời chúc phúc tới Cô Dâu &amp; Chú Rể
            </p>

            <!-- Interactive Hoa Mộc Gift Box -->
            <div onclick="openGiftModal()" class="reveal-scale cursor-pointer group mx-auto mt-5 max-w-[285px] rounded-3xl bg-gradient-to-b from-[#FFFAF7] via-[#F5EFE6] to-[#EAE0D3] p-5 text-moc-greenDark shadow-xl border-2 border-moc-taupe hover:-translate-y-1.5 transition-all duration-300 relative overflow-hidden">
                <div class="relative z-10 mx-auto w-28 h-24 bg-white rounded-2xl p-2 shadow-md border border-moc-taupe/40 mb-3 flex items-center justify-center">
                    <svg viewBox="0 0 120 100" class="w-full h-full">
                        <use href="#moc-leaf-mid" transform="translate(42, 60) rotate(-55) scale(0.75)" />
                        <use href="#moc-leaf-dark" transform="translate(78, 60) rotate(55) scale(0.75)" />
                        <use href="#moc-flower-bloom" transform="translate(60, 52) scale(0.85)" />
                    </svg>
                </div>

                <span class="relative z-10 inline-block bg-moc-greenDark text-white font-serif font-bold text-xs px-3.5 py-1 rounded-full shadow">
                    🌿 Mở Hộp Quà Mừng Cưới 🌿
                </span>
                <h4 class="relative z-10 font-serif text-2xl font-bold text-moc-greenTitle mt-2">{{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}</h4>
                <p class="relative z-10 text-[11px] text-moc-taupeDark mt-1 flex items-center justify-center gap-1 font-medium">
                    <span>Xem mã VietQR &amp; Số tài khoản</span>
                    <span>→</span>
                </p>
            </div>

            <!-- Footer -->
            <div class="reveal-item mt-12 pt-6 border-t border-moc-taupe/30">
                <h4 class="font-vibes text-4xl text-moc-greenTitle">Thank You!</h4>
                <p class="font-serif italic text-sm text-moc-text/85 mt-1 max-w-[340px] mx-auto">
                    {{ $weddingCard->message_thanks ?: ('Sự hiện diện của Quý khách là niềm vinh hạnh lớn lao nhất đối với gia đình và hai vợ chồng ' . $weddingCard->groom_name . ' & ' . $weddingCard->bride_name . '.') }}
                </p>
                <p class="text-[10px] uppercase tracking-[0.28em] text-moc-taupeDark mt-4">
                    Hoa Mộc Xanh • {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '24.05.2026' }}
                </p>
            </div>
        </section>

        <!-- ===================================================================
             FLOATING CONTROLS (MESSENGER + SOUND EQUALIZER + REOPEN ENVELOPE)
             =================================================================== -->
        <div class="fixed bottom-5 right-1/2 translate-x-[222px] max-sm:right-3.5 max-sm:translate-x-0 z-40 flex flex-col items-center gap-3">
            <!-- Messenger Quick Contact Button -->
            <div id="floating-messenger-widget" class="relative group">
                <button onclick="dismissMessengerWidget(event)" title="Đóng"
                        class="absolute -top-1 -right-1 z-20 w-5 h-5 rounded-full bg-[#3A4750] text-white text-[10px] flex items-center justify-center shadow border border-white/80 cursor-pointer">
                    ✕
                </button>
                <a href="#sec-rsvp" title="Gửi lời chúc & Xác nhận tham dự"
                   class="w-12 h-12 rounded-full bg-[#2E4724] hover:bg-[#3D5C30] text-white shadow-[0_6px_18px_rgba(46,71,36,0.4)] flex items-center justify-center transition transform hover:scale-105 border-2 border-[#A68972]">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.477 2 2 6.145 2 11.259c0 2.913 1.454 5.512 3.726 7.21V22l3.405-1.869c.909.252 1.871.388 2.869.388 5.523 0 10-4.145 10-9.259S17.523 2 12 2zm1.003 12.456l-2.548-2.718-4.97 2.718 5.467-5.803 2.61 2.718 4.908-2.718-5.467 5.803z"/>
                    </svg>
                </a>
            </div>

            <!-- Music Equalizer Button (|.|) -->
            <button id="music-toggle-btn" onclick="toggleWeddingMusic()" title="Bật / Tắt nhạc nền"
                    class="w-11 h-11 rounded-full bg-[#A68972] hover:bg-[#8E725C] text-white shadow-[0_5px_15px_rgba(166,137,114,0.45)] border-2 border-[#FFFAF7] flex items-center justify-center transition transform hover:scale-105 cursor-pointer">
                <div id="music-eq-bars" class="flex items-end justify-center gap-[3px] h-4 eq-paused">
                    <span class="w-[3px] bg-white rounded-full eq-bar-1"></span>
                    <span class="w-[3px] bg-white rounded-full eq-bar-2"></span>
                    <span class="w-[3px] bg-white rounded-full eq-bar-3"></span>
                </div>
            </button>
        </div>

        <!-- Bottom-Left Reopen Envelope & Gift Quick Button -->
        <div class="fixed bottom-5 left-1/2 -translate-x-[222px] max-sm:left-3.5 max-sm:translate-x-0 z-40 flex items-center gap-1.5">
            <button onclick="reopenEnvelope()" class="bg-white/95 hover:bg-moc-card text-moc-greenDark border border-moc-taupe rounded-full px-3 py-2 text-[11px] font-medium shadow-md flex items-center gap-1 transition cursor-pointer">
                <span>✉</span> Phong bì
            </button>
            <button onclick="openGiftModal()" class="bg-moc-greenDark hover:bg-moc-greenTitle text-white rounded-full px-3 py-2 text-[11px] font-medium shadow-md flex items-center gap-1 transition cursor-pointer">
                <span>🎁</span> Mừng cưới
            </button>
        </div>
    </div>

    <!-- ===================================================================
         MODAL 1: VIETQR GIFT BOX (MINH QUÂN & THU HÀ)
         =================================================================== -->
    <div id="gift-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm p-4">
        <div class="relative w-full max-w-[420px] rounded-3xl moc-paper border-2 border-moc-taupe p-5 shadow-2xl max-h-[90vh] overflow-y-auto">
            <button onclick="closeGiftModal()" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-moc-card hover:bg-moc-taupe/30 text-moc-greenDark flex items-center justify-center text-sm font-bold cursor-pointer">
                ✕
            </button>

            <div class="text-center">
                <div class="mx-auto w-32 h-11 mb-1">
                    <svg viewBox="0 0 200 50" class="w-full h-full">
                        <use href="#moc-section-header" />
                    </svg>
                </div>
                <h3 class="font-serif text-2xl font-bold text-moc-greenTitle">Hộp Quà Mừng Cưới</h3>
                <p class="text-xs text-moc-text/80 mt-0.5">Chân thành cảm ơn tình cảm quý báu của Quý khách dành cho {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}</p>
            </div>

            <div class="mt-4 space-y-4">
                <!-- Groom QR Card ({{ $weddingCard->groom_name }}) -->
                <div class="bg-white border border-moc-taupe/50 rounded-2xl p-4 flex items-center gap-3.5">
                    <div class="w-24 h-24 bg-moc-cream p-1 rounded-xl border border-moc-taupe/40 shrink-0 flex flex-col items-center justify-center overflow-hidden">
                        <img src="{{ $weddingCard->groom_qr_url }}" alt="QR Chú Rể" class="w-full h-full object-contain">
                    </div>
                    <div class="flex-1 text-xs">
                        <span class="inline-block bg-moc-greenDark text-white text-[10px] px-2 py-0.5 rounded-full font-medium">{{ $weddingCard->groom_rank ?: 'Trưởng Nam' }} • Chú Rể</span>
                        <p class="font-bold text-moc-greenDark text-sm mt-1">{{ $weddingCard->groom_bank_owner ?: $weddingCard->groom_name }}</p>
                        <p class="text-moc-text">Ngân hàng: <strong>{{ $weddingCard->groom_bank_name ?: 'Vietcombank' }}</strong></p>
                        <p class="text-moc-greenDark font-mono font-semibold mt-0.5">STK: {{ $weddingCard->groom_bank_account ?: ($weddingCard->groom_bank_number ?: '098124052026') }}</p>
                        <button onclick="copyText('{{ $weddingCard->groom_bank_account ?: $weddingCard->groom_bank_number }}', 'Đã sao chép STK Chú rể {{ $weddingCard->groom_name }}!')"
                                class="mt-2 bg-moc-cream hover:bg-moc-card text-moc-greenDark border border-moc-taupe rounded-lg px-3 py-1 text-[11px] font-medium shadow-sm transition cursor-pointer">
                            📋 Sao chép STK
                        </button>
                    </div>
                </div>

                <!-- Bride QR Card ({{ $weddingCard->bride_name }}) -->
                <div class="bg-white border border-moc-taupe/50 rounded-2xl p-4 flex items-center gap-3.5">
                    <div class="w-24 h-24 bg-moc-cream p-1 rounded-xl border border-moc-taupe/40 shrink-0 flex flex-col items-center justify-center overflow-hidden">
                        <img src="{{ $weddingCard->bride_qr_url }}" alt="QR Cô Dâu" class="w-full h-full object-contain">
                    </div>
                    <div class="flex-1 text-xs">
                        <span class="inline-block bg-moc-taupeDark text-white text-[10px] px-2 py-0.5 rounded-full font-medium">{{ $weddingCard->bride_rank ?: 'Út Nữ' }} • Cô Dâu</span>
                        <p class="font-bold text-moc-greenDark text-sm mt-1">{{ $weddingCard->bride_bank_owner ?: $weddingCard->bride_name }}</p>
                        <p class="text-moc-text">Ngân hàng: <strong>{{ $weddingCard->bride_bank_name ?: 'Techcombank' }}</strong></p>
                        <p class="text-moc-greenDark font-mono font-semibold mt-0.5">STK: {{ $weddingCard->bride_bank_account ?: ($weddingCard->bride_bank_number ?: '190324052026') }}</p>
                        <button onclick="copyText('{{ $weddingCard->bride_bank_account ?: $weddingCard->bride_bank_number }}', 'Đã sao chép STK Cô dâu {{ $weddingCard->bride_name }}!')"
                                class="mt-2 bg-moc-cream hover:bg-moc-card text-moc-greenDark border border-moc-taupe rounded-lg px-3 py-1 text-[11px] font-medium shadow-sm transition cursor-pointer">
                            📋 Sao chép STK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===================================================================
         MODAL 2: PHOTO LIGHTBOX VIEWER
         =================================================================== -->
    <div id="lightbox-modal" onclick="closeLightbox()" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/85 backdrop-blur-sm p-4">
        <div class="relative max-w-[430px] w-full bg-[#FFFAF7] p-2.5 rounded-2xl border-2 border-moc-taupe shadow-2xl" onclick="event.stopPropagation()">
            <button onclick="closeLightbox()" class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-moc-greenDark text-white font-bold shadow-lg flex items-center justify-center cursor-pointer">
                ✕
            </button>
            <img id="lightbox-img" src="" alt="Wedding Portrait" class="w-full max-h-[75vh] object-cover rounded-xl">
            <p id="lightbox-caption" class="text-center font-serif italic text-sm text-moc-greenDark mt-2 py-1"></p>
        </div>
    </div>

    <!-- TOAST NOTIFICATION -->
    <div id="toast-box" class="fixed top-5 left-1/2 -translate-x-1/2 z-[60] pointer-events-none opacity-0 -translate-y-3 transition-all duration-300 bg-moc-greenDark text-white text-xs font-medium px-4 py-2.5 rounded-full shadow-xl border border-moc-taupe flex items-center gap-2">
        <span>🌿</span>
        <span id="toast-text">Thông báo</span>
    </div>

    <!-- ===================================================================
         JAVASCRIPT LOGIC (PETALS, PARALLAX, 3D ALBUM, MUSIC, RSVP)
         =================================================================== -->
    <script>
        /* -----------------------------------------------------------
           1. FLOATING WHITE HOA MỘC PETALS & DROPLET SPARKLE TRIGGER
        ----------------------------------------------------------- */
        function initFloatingMocPetals(count = 12) {
            const container = document.getElementById('falling-moc-layer');
            container.innerHTML = '';

            for (let i = 0; i < count; i++) {
                const petal = document.createElement('div');
                petal.className = 'dom-petal';
                const leftPos = (i * (100 / count)) + (Math.random() * 5);
                const duration = 8 + Math.random() * 7;
                const delay = -(Math.random() * 12);
                const size = 14 + Math.floor(Math.random() * 9);

                petal.style.left = `${leftPos}%`;
                petal.style.animationDuration = `${duration}s`;
                petal.style.animationDelay = `${delay}s`;

                petal.innerHTML = `
                    <svg width="${size}" height="${size}" viewBox="-20 -46 40 48" class="drop-shadow-sm">
                        <path d="M 0,0 C -14,-8 -22,-26 -12,-40 C -6,-46 6,-46 12,-40 C 22,-26 14,-8 0,0 Z"
                              fill="#FFFFFF" stroke="#E2DCD0" stroke-width="1" opacity="0.92" />
                        <circle cx="0" cy="-6" r="2" fill="#E5A93B" opacity="0.7" />
                    </svg>
                `;
                container.appendChild(petal);
            }
        }

        function triggerPetalShower() {
            initFloatingMocPetals(22);
            showToast('✨ Đã bật hiệu ứng mưa cánh Hoa Mộc trắng!');
        }

        function dismissMessengerWidget(e) {
            e.stopPropagation();
            e.preventDefault();
            const widget = document.getElementById('floating-messenger-widget');
            if (widget) widget.style.display = 'none';
        }

        /* -----------------------------------------------------------
           2. SUBTLE PARALLAX EFFECT ON WATERCOLOR BOTANICAL CLUSTERS
        ----------------------------------------------------------- */
        window.addEventListener('scroll', () => {
            const scrollY = window.scrollY;
            document.querySelectorAll('[data-parallax]').forEach(el => {
                const speed = parseFloat(el.getAttribute('data-parallax')) || 0.05;
                el.style.transform = `translate3d(0, ${scrollY * speed}px, 0)`;
            });
        }, { passive: true });

        /* -----------------------------------------------------------
           3. ALBUM PHOTOS & 3D FLIP BOOK RENDERER
        ----------------------------------------------------------- */
        @php
            $albumData = !empty($weddingCard->album) ? (is_string($weddingCard->album) ? json_decode($weddingCard->album, true) : $weddingCard->album) : [];
            $albumItems = [];
            if (!empty($albumData) && is_array($albumData)) {
                foreach ($albumData as $idx => $img) {
                    $imgUrl = str_starts_with($img, 'http') ? $img : asset('storage/' . $img);
                    $albumItems[] = [
                        'url' => $imgUrl,
                        'title' => 'Ảnh kỷ niệm ' . ($idx + 1),
                        'subtitle' => 'Khoảnh khắc hạnh phúc của ' . $weddingCard->couple_name,
                    ];
                }
            }
            $albumPhotosJson = json_encode($albumItems);
        @endphp
        const defaultPhotos = [
            {
                url: 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=800&q=85',
                title: '{{ $weddingCard->groom_rank ?: 'Trưởng Nam' }} {{ $weddingCard->groom_name }}',
                subtitle: 'Trang 1 • Chú rể lịch lãm giữa khu vườn mùa hạ'
            },
            {
                url: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=800&q=85',
                title: '{{ $weddingCard->bride_rank ?: 'Út Nữ' }} {{ $weddingCard->bride_name }}',
                subtitle: 'Trang 2 • Cô dâu dịu dàng như đóa hoa mộc trắng'
            },
            {
                url: 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=85',
                title: 'Khúc Giao Mùa Hạnh Phúc',
                subtitle: 'Trang 3 • {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}'
            },
            {
                url: 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?auto=format&fit=crop&w=800&q=85',
                title: 'Nắm Tay Nhau Đi Qua Tháng Năm',
                subtitle: 'Trang 4 • Khoảnh khắc bình yên bên nhau'
            },
            {
                url: 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=800&q=85',
                title: 'Lời Hứa Trăm Năm',
                subtitle: 'Trang 5 • Chung một mái nhà ấm áp'
            },
            {
                url: 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=800&q=85',
                title: 'Hẹn Gặp Quý Khách Ngày {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '24.05.2026' }}',
                subtitle: 'Trang 6 • {{ $weddingCard->wedding_location ?: 'The Chloe Garden & Palace' }}'
            }
        ];
        const dbAlbumPhotos = {!! $albumPhotosJson ?: '[]' !!};
        const albumPhotos = (Array.isArray(dbAlbumPhotos) && dbAlbumPhotos.length > 0) ? dbAlbumPhotos : defaultPhotos;

        let currentAlbumPage = 0;

        function renderAlbumBook() {
            const stack = document.getElementById('album-pages-stack');
            const thumbs = document.getElementById('album-thumbs');
            stack.innerHTML = '';
            thumbs.innerHTML = '';

            albumPhotos.forEach((photo, idx) => {
                const page = document.createElement('div');
                page.className = `book-page-card absolute inset-0 bg-[#FFFAF7] p-3 flex flex-col justify-between cursor-pointer ${idx < currentAlbumPage ? 'flipped' : ''}`;
                page.style.zIndex = albumPhotos.length - idx;
                page.onclick = () => nextAlbumPage();

                page.innerHTML = `
                    <div class="relative w-full h-[325px] rounded-lg overflow-hidden border-2 border-moc-taupe bg-moc-card">
                        <img src="${photo.url}" alt="${photo.title}" class="w-full h-full object-cover"
                             onerror="this.src='https://placehold.co/600x750/F4EFE8/4D663C?text=Minh+Quan+%26+Thu+Ha'">
                        <button onclick="event.stopPropagation(); openLightbox(${idx})"
                                class="absolute top-2.5 right-2.5 bg-white/90 hover:bg-white text-moc-greenDark rounded-full w-8 h-8 flex items-center justify-center shadow text-xs cursor-pointer"
                                title="Phóng to ảnh">
                            🔍
                        </button>
                        <div class="absolute bottom-2 left-2 bg-moc-greenDark/85 backdrop-blur-sm text-white text-[10px] px-2.5 py-0.5 rounded-full">
                            Chạm để lật trang ➔
                        </div>
                    </div>
                    <div class="pt-2 text-center">
                        <h4 class="font-serif text-xl font-bold text-moc-greenTitle leading-snug">${photo.title}</h4>
                        <p class="text-[11px] text-moc-text/80 italic">${photo.subtitle}</p>
                    </div>
                `;
                stack.appendChild(page);

                const thumb = document.createElement('button');
                thumb.className = `h-12 rounded-lg overflow-hidden border-2 transition cursor-pointer ${idx === currentAlbumPage ? 'border-moc-greenDark scale-105 shadow' : 'border-transparent opacity-65 hover:opacity-100'}`;
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
                t.className = `h-12 rounded-lg overflow-hidden border-2 transition cursor-pointer ${idx === currentAlbumPage ? 'border-moc-greenDark scale-105 shadow' : 'border-transparent opacity-65 hover:opacity-100'}`;
            });

            document.getElementById('album-page-indicator').textContent = `Trang ${currentAlbumPage + 1} / ${albumPhotos.length}`;
        }

        /* -----------------------------------------------------------
           4. ENVELOPE OPENING & ACOUSTIC GARDEN PIANO SYNTHESIZER
        ----------------------------------------------------------- */
        let isMusicPlaying = false;
        let musicLoop = null;
        let synth = null;

        async function startGardenWeddingMusic() {
            try {
                await Tone.start();
                if (!synth) {
                    synth = new Tone.PolySynth(Tone.Synth, {
                        oscillator: { type: 'triangle' },
                        envelope: { attack: 0.06, decay: 0.5, sustain: 0.25, release: 2.2 }
                    }).toDestination();
                    synth.volume.value = -11;

                    const gardenMelody = [
                        { time: '0:0', note: ['G4', 'B4', 'D5'], dur: '2n' },
                        { time: '0:2', note: ['D4', 'F#4', 'A4'], dur: '2n' },
                        { time: '1:0', note: ['E4', 'G4', 'B4'], dur: '2n' },
                        { time: '1:2', note: ['B3', 'D4', 'G4'], dur: '2n' },
                        { time: '2:0', note: ['C4', 'E4', 'G4'], dur: '2n' },
                        { time: '2:2', note: ['G3', 'B3', 'D4'], dur: '2n' },
                        { time: '3:0', note: ['A3', 'C4', 'E4'], dur: '2n' },
                        { time: '3:2', note: ['D4', 'F#4', 'C5'], dur: '2n' }
                    ];

                    musicLoop = new Tone.Part((time, val) => {
                        synth.triggerAttackRelease(val.note, val.dur, time);
                    }, gardenMelody);
                    musicLoop.loop = true;
                    musicLoop.loopEnd = '4m';
                }

                Tone.Transport.bpm.value = 74;
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
                startGardenWeddingMusic();
                showToast('🎵 Đang phát giai điệu Hoa Mộc Xanh');
            } else {
                Tone.Transport.pause();
                isMusicPlaying = false;
                updateMusicUI();
                showToast('🔇 Đã tạm dừng nhạc nền');
            }
        }

        function updateMusicUI() {
            const eq = document.getElementById('music-eq-bars');
            if (!eq) return;
            if (isMusicPlaying) {
                eq.classList.remove('eq-paused');
            } else {
                eq.classList.add('eq-paused');
            }
        }

        function openInvitation() {
            const stage = document.getElementById('envelope-3d-stage');
            const overlay = document.getElementById('envelope-overlay');

            stage.classList.add('envelope-opened');
            startGardenWeddingMusic();
            initFloatingMocPetals(15);

            setTimeout(() => {
                overlay.classList.add('hidden-overlay');
                triggerVisibleScrollReveals();
            }, 850);
        }

        function reopenEnvelope() {
            const stage = document.getElementById('envelope-3d-stage');
            const overlay = document.getElementById('envelope-overlay');
            stage.classList.remove('envelope-opened');
            overlay.classList.remove('hidden-overlay');
        }

        /* -----------------------------------------------------------
           5. LIVE COUNTDOWN TIMER
        ----------------------------------------------------------- */
        const weddingDateStr = '{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format("Y-m-d") : "2026-05-24" }}';
        const weddingTimeStr = '{{ !empty($weddingCard->wedding_time) && preg_match("/^\d{1,2}:\d{2}$/", trim($weddingCard->wedding_time)) ? trim($weddingCard->wedding_time) . ":00" : "11:00:00" }}';
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
                    ? 'Hành Trình Hạnh Phúc Từ Ngày {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '24.05.2026' }}'
                    : 'Đếm Ngược Khoảnh Khắc Chung Đôi ({{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d.m.Y') : '24.05.2026' }})';
            }

            document.getElementById('cd-days').textContent = String(days).padStart(2, '0');
            document.getElementById('cd-hours').textContent = String(hours).padStart(2, '0');
            document.getElementById('cd-mins').textContent = String(mins).padStart(2, '0');
            document.getElementById('cd-secs').textContent = String(secs).padStart(2, '0');
        }

        /* -----------------------------------------------------------
           6. GUESTBOOK WISHES & RSVP HANDLERS
        ----------------------------------------------------------- */
        @php
            $cardWishes25 = $weddingCard->wishes()->approved()->latest()->take(10)->get()->map(function($w) {
                return [
                    'author' => $w->sender_name,
                    'time' => $w->created_at ? $w->created_at->diffForHumans() : 'Vừa xong',
                    'message' => $w->message,
                ];
            });
        @endphp
        const initialWishes = @json($cardWishes25);

        function renderWishes() {
            const container = document.getElementById('wishes-list');
            if (!initialWishes || initialWishes.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-4 text-xs text-moc-text/70 italic">
                        Hãy là người đầu tiên gửi lời chúc mừng đến cô dâu &amp; chú rể! 🌿
                    </div>
                `;
                return;
            }
            container.innerHTML = initialWishes.map(w => `
                <div class="bg-white border border-moc-taupe/40 rounded-2xl p-3 text-left shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="font-semibold text-xs text-moc-greenDark">🌿 ${w.author}</span>
                        <span class="text-[10px] text-moc-taupeDark">${w.time}</span>
                    </div>
                    <p class="text-xs text-moc-text mt-1 leading-relaxed">${w.message}</p>
                </div>
            `).join('');
        }

        function fillPresetWish(text) {
            document.getElementById('wish-message').value = text;
            showToast('🌿 Đã chọn lời chúc gợi ý!');
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
            showToast(`🌿 Cảm ơn ${name} (${side} • ${status} • ${count}) đã xác nhận!`);
        }

        /* -----------------------------------------------------------
           7. DRESS CODE, CLIPBOARD, MODALS & SCROLL REVEAL
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
            copyText('The Chloe Garden & Palace - Số 268 Đường Thanh Niên, Quận Tây Hồ, TP. Hà Nội', '📋 Đã sao chép địa chỉ tiệc cưới!');
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
                document.getElementById('rsvp-name').value = guestParam;
                document.getElementById('wish-author').value = guestParam;
            }

            if (params.get('open') === '1') {
                setTimeout(openInvitation, 300);
            }

            initFloatingMocPetals(12);
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