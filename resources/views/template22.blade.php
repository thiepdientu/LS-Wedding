<!DOCTYPE html>
<html lang="vi" dir="ltr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <title>{{ $weddingCard->couple_name }} - Thiệp Cưới Online</title>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600;1,700&family=Pattaya&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Great+Vibes&display=swap" rel="stylesheet">
  <style>
    :root {
      --wine-950: #38070b;
      --wine-900: #520d12;
      --wine-800: #6b141a;
      --wine-700: #821b22;
      --wine-600: #99262e;
      --wine-200: #e8c5c8;
      --wine-100: #f5e4e6;
      --cream-bg: #faf7f5;
      --cream-card: #f4eee9;
      --gold-accent: #c89d54;
      --gold-light: #e6c88a;
      --text-dark: #2c1618;
      --text-muted: #6e4f52;
      --card-max-width: 450px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      -webkit-tap-highlight-color: transparent;
    }

    html, body {
      width: 100%;
      min-height: 100vh;
      background-color: #e8dedb;
      color: var(--text-dark);
      font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
      overflow-x: hidden;
      scroll-behavior: smooth;
    }

    body.locked {
      overflow: hidden;
      height: 100vh;
    }

    /* Outer Frame */
    .app-shell {
      position: relative;
      width: 100%;
      max-width: var(--card-max-width);
      min-height: 100vh;
      margin: 0 auto;
      background-color: var(--cream-bg);
      background-image:
        radial-gradient(circle at 12% 18%, rgba(107, 20, 26, 0.04) 0%, transparent 45%),
        radial-gradient(circle at 88% 75%, rgba(107, 20, 26, 0.05) 0%, transparent 50%);
      box-shadow: 0 18px 60px rgba(56, 7, 11, 0.22);
      overflow: hidden;
    }

    /* Watercolor Floral Background Left Side */
    .watercolor-branch-bg {
      position: absolute;
      top: 40px;
      left: -28px;
      width: 270px;
      height: 680px;
      pointer-events: none;
      z-index: 1;
      opacity: 0.16;
      background-image: url('https://chungdoi.com/images/themes/minimalism-dark-red/flower2-decoration.webp');
      background-repeat: no-repeat;
      background-size: contain;
      filter: blur(0.3px);
    }

    /* 12 Floating Petals Layer (Exact DOM structure) */
    .floating-petals-layer {
      position: fixed;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100%;
      max-width: var(--card-max-width);
      height: 100vh;
      pointer-events: none;
      z-index: 35;
      overflow: hidden;
      transition: opacity 0.4s ease;
    }

    .floating-petals-layer.off {
      opacity: 0;
    }

    .floating-petals-layer > div {
      position: absolute;
      top: -10%;
      width: 13px;
      height: 17px;
      background: radial-gradient(circle at 30% 30%, #b82934, #6b141a 75%);
      border-radius: 75% 0 75% 45%;
      opacity: 0.55;
      box-shadow: 0 2px 6px rgba(82, 13, 18, 0.18);
      animation: fallPetal linear infinite;
    }

    .floating-petals-layer > div:nth-child(even) {
      background: radial-gradient(circle at 35% 35%, #d4af37, #9e7a2b 80%);
      width: 9px;
      height: 12px;
      border-radius: 60% 20% 60% 20%;
      opacity: 0.42;
    }

    .floating-petals-layer > div:nth-child(1)  { left: 7%;  animation-duration: 13s; animation-delay: 0s; }
    .floating-petals-layer > div:nth-child(2)  { left: 16%; animation-duration: 16s; animation-delay: 2.2s; }
    .floating-petals-layer > div:nth-child(3)  { left: 25%; animation-duration: 12s; animation-delay: 4.1s; }
    .floating-petals-layer > div:nth-child(4)  { left: 34%; animation-duration: 18s; animation-delay: 1.1s; }
    .floating-petals-layer > div:nth-child(5)  { left: 43%; animation-duration: 14s; animation-delay: 5.5s; }
    .floating-petals-layer > div:nth-child(6)  { left: 52%; animation-duration: 15s; animation-delay: 3.0s; }
    .floating-petals-layer > div:nth-child(7)  { left: 61%; animation-duration: 13.5s; animation-delay: 6.4s; }
    .floating-petals-layer > div:nth-child(8)  { left: 70%; animation-duration: 17s; animation-delay: 1.8s; }
    .floating-petals-layer > div:nth-child(9)  { left: 78%; animation-duration: 12.5s; animation-delay: 4.7s; }
    .floating-petals-layer > div:nth-child(10) { left: 85%; animation-duration: 16.5s; animation-delay: 0.7s; }
    .floating-petals-layer > div:nth-child(11) { left: 91%; animation-duration: 14.2s; animation-delay: 3.9s; }
    .floating-petals-layer > div:nth-child(12) { left: 96%; animation-duration: 15.8s; animation-delay: 2.6s; }

    @keyframes fallPetal {
      0% {
        transform: translate3d(0, -5vh, 0) rotate(0deg) rotateX(0deg);
        opacity: 0;
      }
      12% {
        opacity: 0.65;
      }
      50% {
        transform: translate3d(22px, 50vh, 0) rotate(180deg) rotateX(140deg);
      }
      88% {
        opacity: 0.55;
      }
      100% {
        transform: translate3d(-18px, 108vh, 0) rotate(360deg) rotateX(320deg);
        opacity: 0;
      }
    }

    /* =====================================================
       COVER OVERLAY GATE (Exact ChungDoi Minimalism Đỏ Đậm)
       ===================================================== */
    .cover-gate {
      position: fixed;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100%;
      max-width: var(--card-max-width);
      height: 100vh;
      z-index: 100;
      display: flex;
      align-items: center;
      justify-content: center;
      perspective: 1400px;
      transition: visibility 1s ease, opacity 0.9s ease;
    }

    .cover-gate.opened {
      pointer-events: none;
      opacity: 0;
      visibility: hidden;
    }

    .gate-door {
      position: absolute;
      top: 0;
      width: 50.5%;
      height: 100%;
      background: linear-gradient(165deg, #6b141a 0%, #4d0b10 55%, #38070b 100%);
      transition: transform 1.15s cubic-bezier(0.7, 0, 0.2, 1);
      z-index: 1;
      overflow: hidden;
    }

    .gate-door::after {
      content: "";
      position: absolute;
      inset: 14px;
      border: 1px solid rgba(230, 200, 138, 0.28);
      pointer-events: none;
    }

    .gate-door.left {
      left: 0;
      transform-origin: left center;
      border-right: 1px solid rgba(230, 200, 138, 0.35);
    }

    .gate-door.right {
      right: 0;
      transform-origin: right center;
      border-left: 1px solid rgba(230, 200, 138, 0.35);
    }

    .cover-gate.opened .gate-door.left {
      transform: rotateY(-105deg);
    }

    .cover-gate.opened .gate-door.right {
      transform: rotateY(105deg);
    }

    .cover-card-inner {
      position: relative;
      z-index: 3;
      width: 88%;
      min-height: 78vh;
      background: rgba(250, 247, 245, 0.97);
      border-radius: 24px;
      padding: 46px 26px 42px;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      box-shadow: 0 24px 60px rgba(24, 2, 4, 0.48), inset 0 0 0 1px rgba(107, 20, 26, 0.15);
      overflow: hidden;
      transition: transform 0.85s cubic-bezier(0.65, 0, 0.25, 1), opacity 0.65s ease;
    }

    .cover-card-inner::before {
      content: "";
      position: absolute;
      inset: 10px;
      border: 1px solid rgba(107, 20, 26, 0.22);
      border-radius: 18px;
      pointer-events: none;
    }

    .cover-gate.opened .cover-card-inner {
      transform: scale(0.88) translateY(-20px);
      opacity: 0;
    }

    /* Two symmetrical floral decorations from minimalism-dark-red */
    .cover-flowers-pair img {
      position: absolute;
      width: 175px;
      height: auto;
      pointer-events: none;
      opacity: 0.92;
      animation: gentleBreeze 6s ease-in-out infinite alternate;
    }

    .cover-flowers-pair img:first-child {
      top: -18px;
      left: -18px;
      transform-origin: top left;
    }

    .cover-flowers-pair img:last-child {
      bottom: -18px;
      right: -18px;
      transform: rotate(180deg);
      transform-origin: center;
      animation-name: gentleBreezeReverse;
    }

    @keyframes gentleBreeze {
      0% { transform: rotate(0deg) scale(1); }
      100% { transform: rotate(3.5deg) scale(1.03); }
    }

    @keyframes gentleBreezeReverse {
      0% { transform: rotate(180deg) scale(1); }
      100% { transform: rotate(183.5deg) scale(1.03); }
    }

    .cover-couple-title {
      font-family: 'Pattaya', cursive;
      color: var(--wine-800);
      font-weight: 400;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 4px;
      margin-bottom: 18px;
      z-index: 2;
    }

    .cover-couple-title span:first-child,
    .cover-couple-title span:last-child {
      font-size: 2.55rem;
      line-height: 1.2;
      letter-spacing: 0.5px;
      text-shadow: 0 2px 10px rgba(107, 20, 26, 0.08);
    }

    .cover-couple-title span:nth-child(2) {
      font-family: 'Cormorant Garamond', serif;
      font-style: italic;
      font-size: 1.75rem;
      color: var(--gold-accent);
      margin: -2px 0;
    }

    .cover-ornament-divider {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      width: 72%;
      margin: 6px 0 18px;
    }

    .cover-ornament-divider div {
      flex: 1;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(107, 20, 26, 0.45), transparent);
    }

    .cover-ornament-divider span {
      color: var(--wine-800);
      font-size: 1.15rem;
      line-height: 1;
    }

    .cover-wedding-date {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.32rem;
      font-weight: 600;
      letter-spacing: 1.5px;
      color: var(--wine-900);
      margin-bottom: 22px;
    }

    .cover-invite-label {
      margin-bottom: 26px;
    }

    .cover-invite-label p {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.1rem;
      text-transform: uppercase;
      letter-spacing: 3px;
      color: var(--text-muted);
      padding: 6px 22px;
      border-top: 1px solid rgba(107, 20, 26, 0.2);
      border-bottom: 1px solid rgba(107, 20, 26, 0.2);
    }

    .btn-open-card {
      position: relative;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 13px 38px;
      background: linear-gradient(135deg, var(--wine-700), var(--wine-900));
      color: #fff;
      text-decoration: none;
      font-size: 0.95rem;
      font-weight: 600;
      letter-spacing: 1.8px;
      text-transform: uppercase;
      border-radius: 999px;
      box-shadow: 0 10px 24px rgba(107, 20, 26, 0.35), 0 0 0 4px rgba(107, 20, 26, 0.12);
      cursor: pointer;
      transition: transform 0.25s ease, box-shadow 0.25s ease;
      overflow: hidden;
    }

    .btn-open-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 14px 28px rgba(107, 20, 26, 0.45), 0 0 0 6px rgba(107, 20, 26, 0.16);
    }

    .btn-open-card div {
      position: absolute;
      inset: 0;
      background: linear-gradient(110deg, transparent 25%, rgba(255,255,255,0.28) 50%, transparent 75%);
      transform: translateX(-100%);
      animation: shimmerBtn 3s infinite;
    }

    @keyframes shimmerBtn {
      100% { transform: translateX(100%); }
    }

    /* =====================================================
       HERO SECTION (100% Minimalism Envelope + 2 Polaroids)
       ===================================================== */
    .hero-minimal-section {
      position: relative;
      padding: 48px 20px 10px;
      text-align: center;
      z-index: 2;
    }

    .save-the-date-heading {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.48rem;
      font-weight: 500;
      letter-spacing: 4.5px;
      color: var(--wine-800);
      text-transform: uppercase;
      margin-bottom: 12px;
    }

    .leaf-divider {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      width: 155px;
      margin: 0 auto 34px;
    }

    .leaf-divider::before,
    .leaf-divider::after {
      content: "";
      flex: 1;
      height: 1px;
      background-color: rgba(107, 20, 26, 0.32);
    }

    .leaf-divider svg {
      width: 16px;
      height: 16px;
      fill: rgba(107, 20, 26, 0.55);
    }

    /* 3D Dark Red Envelope & 2 Tilted Polaroid Photos */
    .envelope-stage {
      position: relative;
      width: 300px;
      height: 335px;
      margin: 10px auto 28px;
      user-select: none;
    }

    /* Back Flap (Open Triangular Top) */
    .env-back-flap {
      position: absolute;
      top: 14px;
      left: 15px;
      width: 270px;
      height: 170px;
      background: linear-gradient(180deg, #5c1016 0%, #470a0f 100%);
      clip-path: polygon(50% 0%, 100% 100%, 0% 100%);
      z-index: 1;
      filter: drop-shadow(0 -3px 8px rgba(56, 7, 11, 0.15));
    }

    .env-inner-pocket {
      position: absolute;
      bottom: 0;
      left: 15px;
      width: 270px;
      height: 165px;
      background: #42090d;
      z-index: 1;
      border-radius: 0 0 6px 6px;
    }

    /* Two Polaroid Cards Inside Envelope */
    .polaroid-card {
      position: absolute;
      background: #ffffff;
      padding: 6px 6px 14px 6px;
      border-radius: 2px;
      box-shadow: 0 10px 24px rgba(32, 6, 8, 0.25);
      transition: transform 0.75s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.3s ease;
      cursor: pointer;
    }

    .polaroid-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    /* Left Polaroid (Bride) */
    .polaroid-card.bride-card {
      width: 148px;
      height: 186px;
      top: 48px;
      left: 18px;
      z-index: 3;
      transform: rotate(-10.5deg) translateY(25px);
    }

    /* Right Polaroid (Groom) */
    .polaroid-card.groom-card {
      width: 146px;
      height: 184px;
      top: 10px;
      right: 16px;
      z-index: 2;
      transform: rotate(9.5deg) translateY(25px);
    }

    body.card-unlocked .polaroid-card.bride-card {
      transform: rotate(-10.5deg) translateY(0);
    }

    body.card-unlocked .polaroid-card.groom-card {
      transform: rotate(9.5deg) translateY(0);
    }

    .polaroid-card:hover {
      z-index: 6 !important;
      transform: scale(1.05) rotate(0deg) !important;
      box-shadow: 0 16px 32px rgba(56, 7, 11, 0.35);
    }

    /* Front Envelope Pocket Flaps */
    .env-front-left {
      position: absolute;
      bottom: 0;
      left: 15px;
      width: 270px;
      height: 165px;
      background: linear-gradient(135deg, #7c1820 0%, #631117 100%);
      clip-path: polygon(0 0, 52% 54%, 0 100%);
      z-index: 4;
    }

    .env-front-right {
      position: absolute;
      bottom: 0;
      left: 15px;
      width: 270px;
      height: 165px;
      background: linear-gradient(225deg, #75161d 0%, #5b0f15 100%);
      clip-path: polygon(100% 0, 48% 54%, 100% 100%);
      z-index: 4;
    }

    .env-front-bottom {
      position: absolute;
      bottom: 0;
      left: 15px;
      width: 270px;
      height: 165px;
      background: linear-gradient(180deg, #6e151b 0%, #540d12 100%);
      clip-path: polygon(0 100%, 50% 42%, 100% 100%);
      z-index: 5;
      border-radius: 0 0 6px 6px;
      filter: drop-shadow(0 -3px 6px rgba(28, 3, 5, 0.25));
    }

    .env-base-shadow {
      position: absolute;
      bottom: -8px;
      left: 22px;
      width: 256px;
      height: 18px;
      background: radial-gradient(ellipse at center, rgba(56, 7, 11, 0.32) 0%, transparent 75%);
      z-index: 0;
    }

    /* 3D Gold Wax Seal Stamp */
    .gold-wax-seal {
      position: absolute;
      bottom: 66px;
      left: 50%;
      transform: translateX(-50%);
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: radial-gradient(circle at 32% 28%, #f8e2a2 0%, #d4a449 45%, #9e6f1e 85%, #78500d 100%);
      box-shadow:
        0 4px 10px rgba(32, 4, 7, 0.42),
        inset 0 2px 3px rgba(255, 250, 220, 0.65),
        inset 0 -2px 4px rgba(84, 52, 6, 0.7);
      z-index: 6;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .gold-wax-seal::before {
      content: "";
      width: 36px;
      height: 36px;
      border-radius: 50%;
      border: 1.5px dashed rgba(120, 80, 13, 0.55);
      position: absolute;
    }

    .gold-wax-seal svg {
      width: 22px;
      height: 22px;
      fill: #724b0b;
      filter: drop-shadow(0 1px 0 rgba(255, 238, 185, 0.55));
    }

    /* Couple Names Stacked with Watermark Ampersand */
    .hero-couple-block {
      position: relative;
      padding: 8px 16px 18px;
      margin-bottom: 6px;
    }

    .hero-ampersand-bg {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -52%);
      font-family: 'Great Vibes', cursive;
      font-size: 6.8rem;
      color: rgba(107, 20, 26, 0.085);
      pointer-events: none;
      z-index: 0;
      line-height: 1;
    }

    .hero-couple-name {
      position: relative;
      z-index: 1;
      font-family: 'Cormorant Garamond', serif;
      font-style: italic;
      font-weight: 600;
      font-size: 3.1rem;
      line-height: 1.18;
      color: var(--wine-800);
      letter-spacing: 0.5px;
    }

    .hero-couple-name + .hero-couple-name {
      margin-top: 8px;
    }

    /* =====================================================
       DARK RED ARCH SECTION (THÔNG TIN LỄ CƯỚI)
       ===================================================== */
    .wine-arch-container {
      position: relative;
      z-index: 2;
      margin: 12px 14px 0;
      background: linear-gradient(180deg, var(--wine-800) 0%, var(--wine-900) 45%, var(--wine-950) 100%);
      color: #fdfaf7;
      border-radius: 220px 220px 28px 28px;
      padding: 68px 20px 44px;
      text-align: center;
      box-shadow: 0 16px 42px rgba(56, 7, 11, 0.28);
      overflow: hidden;
    }

    .wine-arch-container::before {
      content: "";
      position: absolute;
      inset: 8px;
      border-radius: 214px 214px 22px 22px;
      border: 1px solid rgba(230, 200, 138, 0.22);
      pointer-events: none;
    }

    .arch-section-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.55rem;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: #ffffff;
      margin-bottom: 30px;
    }

    .family-two-cols {
      display: grid;
      grid-template-columns: 1fr 1fr;
      position: relative;
      gap: 12px;
      margin-bottom: 30px;
      padding-bottom: 24px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.14);
    }

    .family-two-cols::after {
      content: "";
      position: absolute;
      top: 6px;
      bottom: 28px;
      left: 50%;
      width: 1px;
      background: rgba(255, 255, 255, 0.25);
    }

    .family-col {
      padding: 0 6px;
    }

    .family-col .role-label {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1rem;
      color: rgba(255, 255, 255, 0.78);
      margin-bottom: 6px;
    }

    .family-col .parent-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.12rem;
      font-weight: 700;
      line-height: 1.45;
      color: #ffffff;
    }

    .family-col .parent-addr {
      font-size: 0.76rem;
      color: rgba(255, 255, 255, 0.72);
      margin-top: 6px;
      line-height: 1.4;
    }

    .announce-subtitle {
      font-size: 0.82rem;
      letter-spacing: 2px;
      text-transform: uppercase;
      line-height: 1.65;
      color: var(--gold-light);
      margin-bottom: 20px;
    }

    .arch-couple-names h3 {
      font-family: 'Pattaya', cursive;
      font-size: 2.15rem;
      font-weight: 400;
      color: #ffffff;
      margin-bottom: 2px;
    }

    .arch-couple-names .rank-tag {
      font-size: 0.8rem;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.72);
      margin-bottom: 8px;
    }

    .arch-couple-names .amp {
      font-family: 'Cormorant Garamond', serif;
      font-style: italic;
      font-size: 1.7rem;
      color: var(--gold-light);
      margin: 4px 0 8px;
    }

    /* Ceremony Time Box */
    .ceremony-highlight-box {
      margin-top: 26px;
      background: rgba(255, 255, 255, 0.07);
      border: 1px solid rgba(230, 200, 138, 0.25);
      border-radius: 18px;
      padding: 24px 16px;
    }

    .ceremony-highlight-box .headline {
      font-size: 0.82rem;
      letter-spacing: 1.8px;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.86);
      line-height: 1.55;
    }

    .ceremony-highlight-box .sub {
      font-size: 0.76rem;
      letter-spacing: 2px;
      color: var(--gold-light);
      margin: 8px 0 6px;
    }

    .ceremony-time-big {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.6rem;
      font-weight: 700;
      color: #ffffff;
      line-height: 1.1;
      margin-bottom: 12px;
    }

    .ceremony-date-row {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 14px;
      font-family: 'Cormorant Garamond', serif;
      margin: 10px 0;
    }

    .ceremony-date-row .part {
      font-size: 0.95rem;
      letter-spacing: 1.5px;
      text-transform: uppercase;
      padding: 4px 0;
      border-top: 1px solid rgba(255, 255, 255, 0.3);
      border-bottom: 1px solid rgba(255, 255, 255, 0.3);
      min-width: 88px;
    }

    .ceremony-date-row .day-num {
      font-size: 2.75rem;
      font-weight: 700;
      color: var(--gold-light);
      line-height: 1;
    }

    .ceremony-year {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.55rem;
      font-weight: 600;
      letter-spacing: 3px;
      color: #ffffff;
      margin-top: 4px;
    }

    .ceremony-lunar {
      font-size: 0.82rem;
      font-style: italic;
      color: rgba(255, 255, 255, 0.75);
      margin-top: 6px;
    }

    /* =====================================================
       GENERAL SECTIONS (ALBUM, RECEPTION, CALENDAR, TIMELINE, GUESTBOOK, GIFT)
       ===================================================== */
    .content-section {
      position: relative;
      z-index: 2;
      padding: 42px 20px 10px;
      text-align: center;
    }

    .section-floral-badge {
      width: 110px;
      height: auto;
      margin: 0 auto 10px;
      opacity: 0.85;
      display: block;
    }

    .section-heading {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.75rem;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--wine-800);
      margin-bottom: 8px;
    }

    .section-subtext {
      font-size: 0.86rem;
      color: var(--text-muted);
      margin-bottom: 22px;
    }

    /* Album Carousel 1 / 8 */
    .album-carousel-card {
      position: relative;
      background: #ffffff;
      border-radius: 18px;
      padding: 10px;
      box-shadow: 0 12px 30px rgba(56, 7, 11, 0.1);
      border: 1px solid rgba(107, 20, 26, 0.1);
    }

    .album-main-viewport {
      position: relative;
      width: 100%;
      aspect-ratio: 3 / 4;
      border-radius: 12px;
      overflow: hidden;
      background: #f2ebe9;
    }

    .album-main-viewport img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease, opacity 0.35s ease;
      cursor: zoom-in;
    }

    .album-nav-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 38px;
      height: 38px;
      border-radius: 50%;
      border: none;
      background: rgba(255, 255, 255, 0.85);
      color: var(--wine-800);
      font-size: 1.1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      z-index: 4;
    }

    .album-nav-btn.prev { left: 10px; }
    .album-nav-btn.next { right: 10px; }

    .album-counter-pill {
      display: inline-block;
      margin-top: 12px;
      padding: 4px 16px;
      border-radius: 99px;
      background: var(--wine-100);
      color: var(--wine-800);
      font-size: 0.8rem;
      font-weight: 600;
      letter-spacing: 1px;
    }

    .album-thumbs-row {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 8px;
      margin-top: 12px;
    }

    .album-thumb-item {
      aspect-ratio: 1;
      border-radius: 8px;
      overflow: hidden;
      cursor: pointer;
      opacity: 0.55;
      border: 2px solid transparent;
      transition: all 0.25s ease;
    }

    .album-thumb-item.active {
      opacity: 1;
      border-color: var(--wine-800);
      transform: scale(1.03);
    }

    .album-thumb-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* Reception & Calendar Card */
    .reception-card {
      background: #ffffff;
      border-radius: 22px;
      padding: 28px 18px;
      box-shadow: 0 12px 32px rgba(56, 7, 11, 0.08);
      border: 1px solid rgba(107, 20, 26, 0.12);
    }

    .reception-slots {
      display: flex;
      justify-content: center;
      gap: 16px;
      margin: 18px 0 24px;
    }

    .slot-pill {
      flex: 1;
      background: var(--cream-bg);
      border: 1px solid rgba(107, 20, 26, 0.16);
      border-radius: 12px;
      padding: 10px 8px;
    }

    .slot-pill span:first-child {
      display: block;
      font-size: 0.76rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: var(--text-muted);
      margin-bottom: 4px;
    }

    .slot-pill span:last-child {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.35rem;
      font-weight: 700;
      color: var(--wine-800);
    }

    /* Countdown Grid */
    .countdown-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 8px;
      margin: 14px 0 24px;
    }

    .cd-box {
      background: linear-gradient(145deg, var(--wine-800), var(--wine-950));
      color: #ffffff;
      border-radius: 12px;
      padding: 12px 6px;
      box-shadow: 0 6px 16px rgba(82, 13, 18, 0.22);
    }

    .cd-box .num {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.65rem;
      font-weight: 700;
      color: var(--gold-light);
      line-height: 1.1;
    }

    .cd-box .lbl {
      font-size: 0.7rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      opacity: 0.85;
      margin-top: 4px;
    }

    /* January 2026 Calendar */
    .calendar-sheet {
      background: var(--cream-bg);
      border-radius: 16px;
      padding: 18px 14px;
      border: 1px solid rgba(107, 20, 26, 0.14);
      margin-bottom: 20px;
    }

    .cal-month-header {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.3rem;
      font-weight: 700;
      color: var(--wine-800);
      letter-spacing: 1.5px;
      text-transform: uppercase;
      margin-bottom: 12px;
    }

    .cal-weekdays, .cal-days-grid {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 4px;
      text-align: center;
    }

    .cal-weekdays div {
      font-size: 0.74rem;
      font-weight: 600;
      color: var(--wine-700);
      padding-bottom: 6px;
    }

    .cal-days-grid div {
      height: 34px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.84rem;
      color: var(--text-dark);
      position: relative;
    }

    .cal-days-grid div.wedding-day {
      background: var(--wine-800);
      color: #ffffff;
      font-weight: 700;
      border-radius: 50%;
      width: 34px;
      margin: 0 auto;
      box-shadow: 0 0 0 4px rgba(107, 20, 26, 0.2);
      animation: pulseHeart 2s infinite;
    }

    .cal-days-grid div.wedding-day::after {
      content: "♥";
      position: absolute;
      top: -6px;
      right: -3px;
      font-size: 0.65rem;
      color: var(--gold-accent);
    }

    @keyframes pulseHeart {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.08); }
    }

    .btn-outline-wine, .btn-solid-wine {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 12px 26px;
      border-radius: 999px;
      font-size: 0.86rem;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
      text-decoration: none;
      cursor: pointer;
      transition: all 0.25s ease;
    }

    .btn-solid-wine {
      background: linear-gradient(135deg, var(--wine-700), var(--wine-900));
      color: #ffffff;
      border: none;
      box-shadow: 0 8px 20px rgba(107, 20, 26, 0.28);
    }

    .btn-outline-wine {
      background: transparent;
      color: var(--wine-800);
      border: 1.5px solid var(--wine-800);
    }

    .btn-outline-wine:hover, .btn-solid-wine:hover {
      transform: translateY(-2px);
    }

    /* Venue Card */
    .venue-box {
      background: #ffffff;
      border-radius: 20px;
      padding: 24px 18px;
      margin-top: 18px;
      border: 1px solid rgba(107, 20, 26, 0.14);
      box-shadow: 0 10px 28px rgba(56, 7, 11, 0.07);
    }

    .venue-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.35rem;
      font-weight: 700;
      color: var(--wine-800);
      margin: 6px 0 8px;
    }

    .venue-address {
      font-size: 0.86rem;
      color: var(--text-muted);
      line-height: 1.55;
      margin-bottom: 16px;
    }

    /* Dresscode Swatches */
    .dresscode-swatches {
      display: flex;
      justify-content: center;
      gap: 18px;
      margin-top: 14px;
    }

    .swatch-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 6px;
    }

    .swatch-circle {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      border: 2px solid #ffffff;
    }

    .swatch-label {
      font-size: 0.75rem;
      color: var(--text-muted);
      font-weight: 500;
    }

    /* Timeline List */
    .timeline-list {
      list-style: none;
      max-width: 340px;
      margin: 18px auto 0;
      padding: 0;
      position: relative;
    }

    .timeline-list::before {
      content: "";
      position: absolute;
      top: 10px;
      bottom: 10px;
      left: 88px;
      width: 1.5px;
      background: rgba(107, 20, 26, 0.25);
    }

    .timeline-list li {
      display: grid;
      grid-template-columns: 74px 28px 1fr;
      align-items: center;
      padding: 12px 0;
      text-align: left;
    }

    .timeline-list .tl-time {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.2rem;
      font-weight: 700;
      color: var(--wine-800);
      text-align: right;
      padding-right: 8px;
    }

    .timeline-list .tl-dot {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background: var(--wine-800);
      border: 3px solid var(--cream-bg);
      box-shadow: 0 0 0 2px var(--wine-800);
      margin: 0 auto;
      position: relative;
      z-index: 2;
    }

    .timeline-list .tl-event {
      font-size: 0.92rem;
      font-weight: 500;
      color: var(--text-dark);
      padding-left: 8px;
    }

    /* Guestbook Section */
    .guestbook-form {
      background: #ffffff;
      border-radius: 18px;
      padding: 18px;
      border: 1px solid rgba(107, 20, 26, 0.14);
      margin-bottom: 18px;
      text-align: left;
    }

    .guestbook-form input,
    .guestbook-form textarea {
      width: 100%;
      padding: 11px 14px;
      border-radius: 10px;
      border: 1px solid rgba(107, 20, 26, 0.22);
      background: var(--cream-bg);
      font-family: inherit;
      font-size: 0.88rem;
      color: var(--text-dark);
      margin-bottom: 10px;
      outline: none;
    }

    .guestbook-form input:focus,
    .guestbook-form textarea:focus {
      border-color: var(--wine-800);
    }

    .wishes-feed {
      max-height: 310px;
      overflow-y: auto;
      display: flex;
      flex-direction: column;
      gap: 10px;
      text-align: left;
      padding-right: 4px;
    }

    .wish-item {
      background: #ffffff;
      border-radius: 14px;
      padding: 13px 15px;
      border-left: 3.5px solid var(--wine-800);
      box-shadow: 0 4px 14px rgba(56, 7, 11, 0.06);
    }

    .wish-header {
      display: flex;
      justify-content: space-between;
      align-items: baseline;
      margin-bottom: 5px;
    }

    .wish-author {
      font-weight: 700;
      font-size: 0.88rem;
      color: var(--wine-800);
    }

    .wish-time {
      font-size: 0.72rem;
      color: var(--text-muted);
    }

    .wish-content {
      font-size: 0.85rem;
      color: var(--text-dark);
      line-height: 1.45;
    }

    /* Gift Box Card */
    .gift-trigger-card {
      background: linear-gradient(145deg, var(--wine-800), var(--wine-950));
      color: #ffffff;
      border-radius: 22px;
      padding: 28px 20px;
      box-shadow: 0 14px 34px rgba(56, 7, 11, 0.26);
      cursor: pointer;
      transition: transform 0.25s ease;
    }

    .gift-trigger-card:hover {
      transform: translateY(-3px);
    }

    /* Footer */
    .card-footer {
      text-align: center;
      padding: 36px 24px 48px;
      color: var(--text-muted);
      font-size: 0.86rem;
      line-height: 1.6;
    }

    .card-footer .brand-link {
      display: inline-block;
      margin-top: 12px;
      color: var(--wine-800);
      text-decoration: none;
      font-weight: 600;
      font-size: 0.8rem;
    }

    /* =====================================================
       FLOATING WIDGETS (RIGHT SIDE)
       ===================================================== */
    .floating-controls {
      position: fixed;
      right: max(12px, calc(50% - 215px));
      bottom: 20px;
      z-index: 60;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 12px;
    }

    .float-btn {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      border: none;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 6px 18px rgba(32, 4, 7, 0.25);
      transition: transform 0.2s ease;
    }

    .float-btn:hover {
      transform: scale(1.08);
    }

    .float-btn.petal-toggle {
      background: #ffffff;
      color: var(--wine-800);
      border: 1px solid rgba(107, 20, 26, 0.2);
    }

    .float-btn.chat-wish {
      background: linear-gradient(135deg, #ff2a6d, #e0115f);
      color: #ffffff;
    }

    .float-btn.music-bars {
      background: var(--wine-800);
      color: #ffffff;
      border: 2px solid rgba(255, 255, 255, 0.8);
    }

    .eq-bars {
      display: flex;
      align-items: flex-end;
      gap: 2.5px;
      height: 15px;
    }

    .eq-bars span {
      width: 3px;
      background: #ffffff;
      border-radius: 2px;
      height: 5px;
       transition: height 0.2s ease;
    }

    .music-bars.playing .eq-bars span:nth-child(1) { animation: eqBounce 0.7s infinite ease-in-out; }
    .music-bars.playing .eq-bars span:nth-child(2) { animation: eqBounce 0.55s infinite ease-in-out 0.15s; }
    .music-bars.playing .eq-bars span:nth-child(3) { animation: eqBounce 0.8s infinite ease-in-out 0.3s; }
    .music-bars.playing .eq-bars span:nth-child(4) { animation: eqBounce 0.6s infinite ease-in-out 0.1s; }

    @keyframes eqBounce {
      0%, 100% { height: 4px; }
      50% { height: 15px; }
    }

    /* =====================================================
       MODALS (QR GIFT & LIGHTBOX)
       ===================================================== */
    .modal-backdrop {
      position: fixed;
      inset: 0;
      background: rgba(26, 4, 6, 0.76);
      backdrop-filter: blur(5px);
      z-index: 120;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 16px;
    }

    .modal-backdrop.active {
      display: flex;
    }

    .modal-panel {
      background: var(--cream-bg);
      width: 100%;
      max-width: 410px;
      border-radius: 22px;
      padding: 24px 18px;
      position: relative;
      max-height: 90vh;
      overflow-y: auto;
      text-align: center;
      box-shadow: 0 24px 60px rgba(0, 0, 0, 0.45);
    }

    .modal-close {
      position: absolute;
      top: 14px;
      right: 14px;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      border: none;
      background: rgba(107, 20, 26, 0.1);
      color: var(--wine-800);
      font-size: 1.1rem;
      cursor: pointer;
    }

    .qr-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 14px;
      margin-top: 14px;
    }

    .qr-box {
      background: #ffffff;
      border-radius: 16px;
      padding: 16px;
      border: 1px solid rgba(107, 20, 26, 0.15);
    }

    .qr-box h4 {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.15rem;
      color: var(--wine-800);
      margin-bottom: 10px;
    }

    .qr-box img {
      width: 165px;
      height: 165px;
      object-fit: contain;
      border-radius: 8px;
      border: 1px solid #eee;
      margin-bottom: 8px;
    }

    .qr-box p {
      font-size: 0.82rem;
      color: var(--text-dark);
      line-height: 1.45;
    }

    /* Scroll Reveal Animation */
    .reveal {
      opacity: 0;
      transform: translateY(24px);
      transition: opacity 0.75s ease, transform 0.75s ease;
    }

    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }
  </style>
</head>
<body class="locked">

  <!-- Background Audio -->
  <audio id="weddingAudio" loop preload="auto">
    @if(!empty($weddingCard->music_url))
        <source src="{{ $weddingCard->music_url }}" type="audio/mpeg">
    @endif
    <source src="https://cdn.pixabay.com/download/audio/2022/05/27/audio_1808fbf07a.mp3?filename=romantic-piano-112191.mp3" type="audio/mpeg">
</audio>

  <!-- 12 Floating Petals Layer (Exact DOM structure) -->
  <div class="floating-petals-layer" id="petalsLayer" aria-hidden="true">
    <div></div><div></div><div></div><div></div><div></div><div></div>
    <div></div><div></div><div></div><div></div><div></div><div></div>
  </div>

  <!-- =====================================================
       COVER OVERLAY (Exact Minimalism Đỏ Đậm Cover DOM)
       ===================================================== -->
  <div class="cover-gate" id="coverGate">
    <div class="gate-door left"></div>
    <div class="gate-door right"></div>

    <div class="cover-card-inner">
      <div class="cover-flowers-pair">
        <img alt="" aria-hidden="true" src="https://chungdoi.com/images/themes/minimalism-dark-red/flower2-decoration.webp" onerror="this.style.display='none'">
        <img alt="" aria-hidden="true" src="https://chungdoi.com/images/themes/minimalism-dark-red/flower2-decoration.webp" onerror="this.style.display='none'">
      </div>

      <h1 class="cover-couple-title">
        <span>{{ $weddingCard->groom_name }}</span>
        <span>&amp;</span>
        <span>{{ $weddingCard->bride_name }}</span>
      </h1>

      <div class="cover-ornament-divider">
        <div></div>
        <span>❦</span>
        <div></div>
      </div>

      <div class="cover-wedding-date">
        <span dir="auto">{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->locale('vi')->isoFormat('D [tháng] M, Y') : '3 tháng 1, 2026' }}</span>
      </div>

      <div class="cover-invite-label">
        <p><span dir="auto">Thân Mời</span></p>
      </div>

      <a href="?open=1" rel="nofollow" class="btn-open-card" id="openCardBtn">
        <span dir="auto">Mở thiệp</span>
        <div></div>
      </a>
    </div>
  </div>

  <!-- =====================================================
       MAIN INVITATION CONTENT
       ===================================================== -->
  <div class="app-shell">
    <div class="watercolor-branch-bg" aria-hidden="true"></div>

    <!-- 1. HERO SAVE THE DATE WITH DARK RED ENVELOPE & 2 POLAROIDS -->
    <section class="hero-minimal-section">
      <h2 class="save-the-date-heading">SAVE THE DATE</h2>
      <div class="leaf-divider" aria-hidden="true">
        <svg viewBox="0 0 24 24"><path d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8,20C19,20 22,3 22,3C21,5 14,5.25 9,6.25C4,7.25 2,11.5 2,13.5C2,15.5 3.75,17.25 3.75,17.25C7,8 17,8 17,8Z"/></svg>
      </div>

      <!-- 3D Dark Red Envelope + 2 Polaroids + Gold Wax Seal -->
      <div class="envelope-stage">
        <div class="env-base-shadow"></div>
        <div class="env-back-flap"></div>
        <div class="env-inner-pocket"></div>

        <!-- Bride Polaroid (Left Tilted) -->
        <div class="polaroid-card bride-card" onclick="openLightbox(0)">
          <img src="{{ !empty($weddingCard->bride_image) ? asset('storage/' . $weddingCard->bride_image) : 'https://assets.chungdoi.com/photo-library/design/5019eadee002f02ce6f39d9c5bdb7304d4da683b4e109c41e7ed14e63391d9b0.webp' }}" alt="Cô Dâu {{ $weddingCard->bride_name }}">
        </div>

        <!-- Groom Polaroid (Right Tilted) -->
        <div class="polaroid-card groom-card" onclick="openLightbox(1)">
          <img src="{{ !empty($weddingCard->groom_image) ? asset('storage/' . $weddingCard->groom_image) : 'https://assets.chungdoi.com/photo-library/design/1f83fb78c75b96a05661eca4cbc50dd771fc37411920623d6d9729eea1daa7c8.webp' }}" alt="Chú Rể {{ $weddingCard->groom_name }}">
        </div>

        <!-- Envelope Front Flaps -->
        <div class="env-front-left"></div>
        <div class="env-front-right"></div>
        <div class="env-front-bottom"></div>

        <!-- Embossed Gold Wax Seal -->
        <div class="gold-wax-seal" aria-hidden="true">
          <svg viewBox="0 0 24 24">
            <path d="M12 2C9.5 2 8 4 8 6.5C8 8.2 9 9.7 10.5 10.4C7.5 11.2 5 13.8 5 17H7C7 14.2 9.2 12 12 12C14.8 12 17 14.2 17 17H19C19 13.8 16.5 11.2 13.5 10.4C15 9.7 16 8.2 16 6.5C16 4 14.5 2 12 2ZM12 4C13.4 4 14 5.1 14 6.5C14 7.9 13.4 9 12 9C10.6 9 10 7.9 10 6.5C10 5.1 10.6 4 12 4ZM12 14C9.8 14 8 15.8 8 18V22H16V18C16 15.8 14.2 14 12 14Z"/>
          </svg>
        </div>
      </div>

      <!-- Couple Names with Watermark '&' -->
      <div class="hero-couple-block">
        <div class="hero-ampersand-bg">&amp;</div>
        <div class="hero-couple-name">{{ $weddingCard->groom_name }}</div>
        <div class="hero-couple-name">{{ $weddingCard->bride_name }}</div>
      </div>

      <div class="leaf-divider" style="margin-bottom: 16px;" aria-hidden="true">
        <svg viewBox="0 0 24 24"><path d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8,20C19,20 22,3 22,3C21,5 14,5.25 9,6.25C4,7.25 2,11.5 2,13.5C2,15.5 3.75,17.25 3.75,17.25C7,8 17,8 17,8Z"/></svg>
      </div>
    </section>

    <!-- 2. DARK RED ARCH SECTION: THÔNG TIN LỄ CƯỚI -->
    <section class="wine-arch-container reveal">
      <h2 class="arch-section-title">THÔNG TIN LỄ CƯỚI</h2>

      <div class="family-two-cols">
        <div class="family-col">
          <div class="role-label">Nhà Trai</div>
          <div class="parent-name">{{ $weddingCard->groom_father ?: 'Trần Văn Hùng' }}</div>
          <div class="parent-name">{{ $weddingCard->groom_mother ?: 'Phạm Thị Lan' }}</div>
          <div class="parent-addr">{{ $weddingCard->groom_address ?: 'Đống Đa, Hà Nội' }}</div>
        </div>
        <div class="family-col">
          <div class="role-label">Nhà Gái</div>
          <div class="parent-name">{{ $weddingCard->bride_father ?: 'Nguyễn Văn Nam' }}</div>
          <div class="parent-name">{{ $weddingCard->bride_mother ?: 'Lê Thị Hương' }}</div>
          <div class="parent-addr">{{ $weddingCard->bride_address ?: 'Cầu Giấy, Hà Nội' }}</div>
        </div>
      </div>

      <div class="announce-subtitle">
        TRÂN TRỌNG BÁO TIN<br>LỄ THÀNH HÔN CỦA CON CHÚNG TÔI
      </div>

      <div class="arch-couple-names">
        <h3>{{ $weddingCard->groom_name }}</h3>
        <div class="rank-tag">{{ $weddingCard->groom_rank ?: 'Trưởng Nam' }}</div>
        <div class="amp">&amp;</div>
        <h3>{{ $weddingCard->bride_name }}</h3>
        <div class="rank-tag">{{ $weddingCard->bride_rank ?: 'Út Nữ' }}</div>
      </div>

      <div class="ceremony-highlight-box">
        <div class="headline">{{ $weddingCard->event_type ?: 'LỄ THÀNH HÔN ĐƯỢC CỬ HÀNH TẠI' }}<br>{{ $weddingCard->ceremony_location ?: 'TƯ GIA' }}</div>
        <div class="sub">VÀO LÚC</div>
        <div class="ceremony-time-big">{{ $weddingCard->ceremony_time ?: ($weddingCard->wedding_time ?: '09:00') }}</div>
        <div class="ceremony-date-row">
          <span class="part">{{ $weddingCard->wedding_date ? mb_strtoupper($weddingCard->wedding_date->locale('vi')->isoFormat('dddd')) : 'THỨ BẢY' }}</span>
          <span class="day-num">{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d') : '03' }}</span>
          <span class="part">THÁNG {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('m') : '01' }}</span>
        </div>
        <div class="ceremony-year">{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('Y') : '2026' }}</div>
        <div class="ceremony-lunar">(Tức ngày {{ $weddingCard->wedding_date_lunar ?: '15 tháng 11 năm Ất Tỵ' }})</div>
      </div>
    </section>

    <!-- 3. ALBUM ẢNH CƯỚI (1 / 8) -->
    <section class="content-section reveal">
      <img class="section-floral-badge" src="https://chungdoi.com/images/themes/minimalism-dark-red/flower2-decoration.webp" alt="" onerror="this.style.display='none'">
      <h2 class="section-heading">Album Ảnh</h2>
      <p class="section-subtext">Khoảnh khắc hạnh phúc của {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}</p>

      <div class="album-carousel-card">
        <div class="album-main-viewport">
          <button class="album-nav-btn prev" onclick="stepAlbum(-1)" aria-label="Ảnh trước">❮</button>
          <img id="albumActiveImg" src="{{ !empty($weddingCard->cover_image) ? asset('storage/' . $weddingCard->cover_image) : 'https://assets.chungdoi.com/photo-library/design/5019eadee002f02ce6f39d9c5bdb7304d4da683b4e109c41e7ed14e63391d9b0.webp' }}" alt="Ảnh cưới {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}" onclick="openLightbox(currentAlbumIndex)">
          <button class="album-nav-btn next" onclick="stepAlbum(1)" aria-label="Ảnh tiếp">❯</button>
        </div>
        <div class="album-counter-pill" id="albumCounter">1 / 8</div>
        <div class="album-thumbs-row" id="albumThumbs"></div>
      </div>
    </section>

    <!-- 4. THÔNG TIN TIỆC CƯỚI & LỊCH -->
    <section class="content-section reveal">
      <h2 class="section-heading">THÔNG TIN TIỆC CƯỚI</h2>
      <p class="section-subtext">Tiệc cưới sẽ diễn ra vào lúc:</p>

      <div class="reception-card">
        <div class="ceremony-time-big" style="color: var(--wine-800);">{{ $weddingCard->wedding_time ?: '18:00' }}</div>
        <div class="ceremony-date-row" style="color: var(--wine-800);">
          <span class="part" style="border-color: rgba(107,20,26,0.25);">{{ $weddingCard->wedding_date ? mb_strtoupper($weddingCard->wedding_date->locale('vi')->isoFormat('dddd')) : 'THỨ BẢY' }}</span>
          <span class="day-num" style="color: var(--wine-800);">{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('d') : '03' }}</span>
          <span class="part" style="border-color: rgba(107,20,26,0.25);">THÁNG {{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('m') : '01' }}</span>
        </div>
        <div class="ceremony-year" style="color: var(--wine-900);">{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format('Y') : '2026' }}</div>
        <div class="ceremony-lunar" style="color: var(--text-muted);">(Tức ngày {{ $weddingCard->wedding_date_lunar ?: '15 tháng 11 năm Ất Tỵ' }})</div>

        <div class="reception-slots">
          <div class="slot-pill">
            <span>Đón khách</span>
            <span>{{ $weddingCard->guest_welcome_time ?: '17:30' }}</span>
          </div>
          <div class="slot-pill">
            <span>Khai tiệc</span>
            <span>{{ $weddingCard->wedding_time ?: '18:00' }}</span>
          </div>
        </div>

        <h3 class="section-heading" style="font-size: 1.35rem; margin-bottom: 6px;">Cùng đếm ngược</h3>
        <div class="countdown-grid" id="countdownGrid">
          <div class="cd-box"><div class="num" id="cdDays">00</div><div class="lbl">Ngày</div></div>
          <div class="cd-box"><div class="num" id="cdHours">00</div><div class="lbl">Giờ</div></div>
          <div class="cd-box"><div class="num" id="cdMins">00</div><div class="lbl">Phút</div></div>
          <div class="cd-box"><div class="num" id="cdSecs">00</div><div class="lbl">Giây</div></div>
        </div>

        <!-- Dynamic Calendar -->
        @php
          $cal = $weddingCard->calendar_matrix;
          $leadEmpty = ($cal['start_day_of_week'] == 0) ? 6 : ($cal['start_day_of_week'] - 1);
        @endphp
        <div class="calendar-sheet">
          <div class="cal-month-header">{{ $cal['month_title'] }}</div>
          <div class="cal-weekdays">
            <div>T2</div><div>T3</div><div>T4</div><div>T5</div><div>T6</div><div>T7</div><div>CN</div>
          </div>
          <div class="cal-days-grid">
            @for ($i = 0; $i < $leadEmpty; $i++)
              <div></div>
            @endfor
            @for ($d = 1; $d <= $cal['total_days']; $d++)
              <div class="{{ $d == $cal['active_day'] ? 'wedding-day' : '' }}">{{ $d }}</div>
            @endfor
          </div>
        </div>

        @php
          $calSummary = urlencode('Đám cưới ' . $weddingCard->couple_name);
          $calDate = $weddingCard->wedding_date ? $weddingCard->wedding_date->format('Ymd') : '20260103';
          $calTime = !empty($weddingCard->wedding_time) && preg_match('/^\d{1,2}:\d{2}$/', trim($weddingCard->wedding_time)) ? str_replace(':', '', trim($weddingCard->wedding_time)) . '00' : '110000';
          $calLocation = urlencode(($weddingCard->wedding_location ?: '') . ', ' . ($weddingCard->wedding_address ?: ''));
        @endphp
        <a class="btn-solid-wine" target="_blank" rel="noopener noreferrer"
           href="https://www.google.com/calendar/render?action=TEMPLATE&text={{ $calSummary }}&dates={{ $calDate }}T{{ $calTime }}/{{ $calDate }}T{{ $calTime }}&details={{ $calSummary }}&location={{ $calLocation }}">
          <span>📅 Thêm vào lịch</span>
        </a>
      </div>

      <!-- Venue Location -->
      <div class="venue-box">
        <div style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1.5px; color: var(--text-muted);">Tiệc cưới sẽ tổ chức tại</div>
        <div class="venue-name">{{ $weddingCard->wedding_location ?: 'Trung Tâm Tiệc Cưới Hoàng Gia' }}</div>
        <div class="venue-address">{{ $weddingCard->wedding_address ?: 'Ngõ 74 P. Nguyễn Thị Định, Nhân Chính, Thanh Xuân, Hà Nội' }}</div>
        <a class="btn-outline-wine" target="_blank" rel="noopener noreferrer"
           href="{{ $weddingCard->google_map_url ?: ('https://www.google.com/maps/search/?api=1&query=' . urlencode(($weddingCard->wedding_location ?: '') . ' ' . ($weddingCard->wedding_address ?: ''))) }}">
          <span>📍 Chỉ đường Google Maps</span>
        </a>
      </div>
    </section>

    <!-- 5. DRESS CODE & LỊCH TRÌNH NGÀY CƯỚI -->
    <section class="content-section reveal">
      <h2 class="section-heading">DRESS CODE</h2>
      <p class="section-subtext">{{ $weddingCard->dresscode_note ?: 'Trang phục dự tiệc gợi ý' }}</p>
      <div class="dresscode-swatches">
        @if (!empty($weddingCard->dresscode_colors_list) && count($weddingCard->dresscode_colors_list) > 0)
          @foreach ($weddingCard->dresscode_colors_list as $color)
            <div class="swatch-item">
              <div class="swatch-circle" style="background: {{ $color['hex'] }};"></div>
              <span class="swatch-label">{{ $color['name'] ?? '' }}</span>
            </div>
          @endforeach
        @else
          <div class="swatch-item">
            <div class="swatch-circle" style="background: #6b141a;"></div>
            <span class="swatch-label">Đỏ Rượu</span>
          </div>
          <div class="swatch-item">
            <div class="swatch-circle" style="background: #f3ece4;"></div>
            <span class="swatch-label">Kem Ngà</span>
          </div>
          <div class="swatch-item">
            <div class="swatch-circle" style="background: #c89d54;"></div>
            <span class="swatch-label">Champagne</span>
          </div>
          <div class="swatch-item">
            <div class="swatch-circle" style="background: #222222;"></div>
            <span class="swatch-label">Đen Lịch Lãm</span>
          </div>
        @endif
      </div>

      <h2 class="section-heading" style="margin-top: 38px;">LỊCH TRÌNH NGÀY CƯỚI</h2>
      @if (!empty($weddingCard->timeline_list) && count($weddingCard->timeline_list) > 0)
        <ol class="timeline-list">
          @foreach ($weddingCard->timeline_list as $item)
            <li>
              <span class="tl-time">{{ $item['time'] ?? '' }}</span>
              <span class="tl-dot"></span>
              <span class="tl-event">{{ $item['title'] ?? ($item['description'] ?? '') }}</span>
            </li>
          @endforeach
        </ol>
      @else
        <ol class="timeline-list">
          <li><span class="tl-time">17:30</span><span class="tl-dot"></span><span class="tl-event">Đón khách &amp; Chụp ảnh lưu niệm</span></li>
          <li><span class="tl-time">18:00</span><span class="tl-dot"></span><span class="tl-event">Khai tiệc &amp; Nghi thức lễ cưới</span></li>
          <li><span class="tl-time">18:30</span><span class="tl-dot"></span><span class="tl-event">Rót rượu Champagne &amp; Cắt bánh</span></li>
          <li><span class="tl-time">18:45</span><span class="tl-dot"></span><span class="tl-event">Khai vị &amp; Phục vụ món chính</span></li>
          <li><span class="tl-time">21:00</span><span class="tl-dot"></span><span class="tl-event">Giao lưu &amp; Kết thúc tiệc</span></li>
        </ol>
      @endif
    </section>

    <!-- 6. SỔ LƯU BÚT (GUESTBOOK) -->
    <section class="content-section reveal" id="guestbookSection">
      <h2 class="section-heading">Sổ lưu bút</h2>
      <p class="section-subtext">Gửi lời chúc tốt đẹp nhất đến {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }}</p>

      <form class="guestbook-form" id="wishForm" onsubmit="submitWish(event)">
        <input type="text" id="guestNameInput" placeholder="Tên của bạn *" required />
        <textarea id="guestWishInput" rows="3" placeholder="Nhập lời chúc mừng hạnh phúc... *" required></textarea>
        <button type="submit" class="btn-solid-wine" style="width: 100%;">Gửi lời chúc ♥</button>
      </form>

      <div class="wishes-feed" id="wishesFeed">
        <div class="wish-item">
          <div class="wish-header"><span class="wish-author">Bạn Hoàng dev</span><span class="wish-time">Vừa xong</span></div>
          <p class="wish-content">Chúc {{ $weddingCard->groom_name }} &amp; {{ $weddingCard->bride_name }} trăm năm hạnh phúc, mãi yêu nhau đầu bạc răng long!</p>
        </div>
        <div class="wish-item">
          <div class="wish-header"><span class="wish-author">Hoài Nam</span><span class="wish-time">Hôm nay</span></div>
          <p class="wish-content">Chúc hai bạn luôn nắm tay nhau qua mọi chặng đường, sớm có thiên thần nhỏ nhé!!!</p>
        </div>
        <div class="wish-item">
          <div class="wish-header"><span class="wish-author">Bạn Linh</span><span class="wish-time">Hôm nay</span></div>
          <p class="wish-content">Mừng ngày trọng đại! Chúc hai bạn cười nhiều hơn cãi, yêu nhiều hơn giận nhen!</p>
        </div>
        <div class="wish-item">
          <div class="wish-header"><span class="wish-author">Chị Huyền</span><span class="wish-time">Hôm qua</span></div>
          <p class="wish-content">Chúc hai em trăm năm hạnh phúc, vợ chồng đồng lòng &lt;3</p>
        </div>
      </div>
    </section>

    <!-- 7. HỘP QUÀ MỪNG (QR GIFT MODAL) -->
    <section class="content-section reveal">
      <div class="gift-trigger-card" onclick="toggleGiftModal(true)">
        <div style="font-size: 2rem; margin-bottom: 6px;">🎁</div>
        <h2 class="section-heading" style="color: #ffffff; margin-bottom: 6px;">Hộp Quà Mừng</h2>
        <p style="font-size: 0.84rem; color: rgba(255,255,255,0.82); margin-bottom: 14px;">
          Gửi quà mừng cưới đến Chú Rể {{ $weddingCard->groom_name }} &amp; Cô Dâu {{ $weddingCard->bride_name }}
        </p>
        <span class="btn-outline-wine" style="border-color: var(--gold-light); color: var(--gold-light); padding: 8px 22px;">
          Mở Hộp Quà Mừng
        </span>
      </div>
    </section>

    <footer class="card-footer">
      <p>Sự hiện diện của quý khách là niềm vinh hạnh của gia đình chúng tôi!</p>
      <a class="brand-link" href="# top" onclick="reopenCoverGate(event)">↺ Xem lại hiệu ứng mở thiệp</a>
    </footer>
  </div>

  <!-- FLOATING RIGHT CONTROLS (Exact match to screenshot) -->
  <div class="floating-controls">
    <button class="float-btn petal-toggle" id="petalToggleBtn" title="Bật/Tắt hiệu ứng cánh hoa" onclick="togglePetals()">
      💧
    </button>
    <button class="float-btn chat-wish" title="Gửi lời chúc nhanh" onclick="document.getElementById('guestbookSection').scrollIntoView({behavior:'smooth'})">
      💬
    </button>
    <button class="float-btn music-bars" id="musicBtn" title="Bật/Tắt nhạc nền" onclick="toggleMusic()">
      <div class="eq-bars">
        <span></span><span></span><span></span><span></span>
      </div>
    </button>
  </div>

  <!-- MODAL HỘP QUÀ MỪNG QR -->
  <div class="modal-backdrop" id="giftModal" onclick="if(event.target===this) toggleGiftModal(false)">
    <div class="modal-panel">
      <button class="modal-close" onclick="toggleGiftModal(false)">✕</button>
      <h3 class="section-heading" style="font-size: 1.5rem;">Hộp Quà Mừng</h3>
      <p class="section-subtext" style="margin-bottom: 10px;">Quét mã QR ngân hàng để gửi lời chúc &amp; quà mừng</p>
      <div class="qr-grid">
        <div class="qr-box">
          <h4>Chú Rể - {{ $weddingCard->groom_name }}</h4>
          <img src="{{ !empty($weddingCard->groom_qr_image) ? asset('storage/' . $weddingCard->groom_qr_image) : ('https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=' . urlencode(($weddingCard->groom_bank_name ?: 'Vietcombank') . ' ' . ($weddingCard->groom_bank_number ?: '0000000000') . ' ' . ($weddingCard->groom_bank_owner ?: 'TRAN HOANG LONG'))) }}" alt="QR Chú Rể">
          <p><strong>{{ $weddingCard->groom_bank_name ?: 'Vietcombank' }}</strong></p>
          <p>STK: <strong>{{ $weddingCard->groom_bank_number ?: '0000000000' }}</strong></p>
          <p>CTK: {{ $weddingCard->groom_bank_owner ?: 'TRAN HOANG LONG' }}</p>
        </div>
        <div class="qr-box">
          <h4>Cô Dâu - {{ $weddingCard->bride_name }}</h4>
          <img src="{{ !empty($weddingCard->bride_qr_image) ? asset('storage/' . $weddingCard->bride_qr_image) : ('https://api.qrserver.com/v1/create-qr-code/?size=220x220&data=' . urlencode(($weddingCard->bride_bank_name ?: 'BIDV') . ' ' . ($weddingCard->bride_bank_number ?: '6665558888') . ' ' . ($weddingCard->bride_bank_owner ?: 'NGUYEN BAO NGOC'))) }}" alt="QR Cô Dâu">
          <p><strong>{{ $weddingCard->bride_bank_name ?: 'BIDV' }}</strong></p>
          <p>STK: <strong>{{ $weddingCard->bride_bank_number ?: '6665558888' }}</strong></p>
          <p>CTK: {{ $weddingCard->bride_bank_owner ?: 'NGUYEN BAO NGOC' }}</p>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL LIGHTBOX ALBUM -->
  <div class="modal-backdrop" id="lightboxModal" onclick="if(event.target===this) closeLightbox()">
    <div class="modal-panel" style="background: transparent; box-shadow: none; max-width: 440px; padding: 0;">
      <button class="modal-close" style="background: #fff; top: -40px; right: 0;" onclick="closeLightbox()">✕</button>
      <img id="lightboxImg" src="" alt="Phóng to ảnh cưới" style="width: 100%; border-radius: 14px; max-height: 82vh; object-fit: contain;">
    </div>
  </div>

  @php
    $albumData = !empty($weddingCard->album) ? (is_string($weddingCard->album) ? json_decode($weddingCard->album, true) : $weddingCard->album) : [];
    $albumPhotosJson = json_encode(!empty($albumData) && is_array($albumData) ? array_values(array_map(function($img) {
        return str_starts_with($img, 'http') ? $img : asset('storage/' . $img);
    }, $albumData)) : []);
  @endphp
  <script>
    // 8 Wedding Photos from ChungDoi Design Library
    const defaultPhotos = [
      "https://assets.chungdoi.com/photo-library/design/5019eadee002f02ce6f39d9c5bdb7304d4da683b4e109c41e7ed14e63391d9b0.webp",
      "https://assets.chungdoi.com/photo-library/design/1f83fb78c75b96a05661eca4cbc50dd771fc37411920623d6d9729eea1daa7c8.webp",
      "https://assets.chungdoi.com/photo-library/design/a4bacc8760315d26e8660bcd2943d479c968e7e92892d2e367cfab6facb63017.webp",
      "https://assets.chungdoi.com/photo-library/design/655375b2b2c6edb9772053c6a2150a6247ccf7002f69a1b733f682fa05d6309f.webp",
      "https://assets.chungdoi.com/photo-library/design/fb57414f47aa2c9189bc9fa20f34d557dd1a4cd13a908fd30633275ca5abaf6d.webp",
      "https://assets.chungdoi.com/photo-library/design/76763999ecb5db3569cea7991a2ea4fdf32e4a2639daeb28c6f2a9b5fdf6f313.webp",
      "https://assets.chungdoi.com/photo-library/design/da4ca736067f9572362cd90a28e95274e985ffa76cc58e3c36b23219ebf4f6f7.webp",
      "https://assets.chungdoi.com/photo-library/design/107e38d720d04da6442122cbe91d47eda6ebc8c962579a14b345ba3ad6dd49a4.webp"
    ];
    const dbAlbumPhotos = {!! $albumPhotosJson ?: '[]' !!};
    const albumPhotos = (Array.isArray(dbAlbumPhotos) && dbAlbumPhotos.length > 0) ? dbAlbumPhotos : defaultPhotos;

    let currentAlbumIndex = 0;
    const coverGate = document.getElementById('coverGate');
    const openCardBtn = document.getElementById('openCardBtn');
    const weddingAudio = document.getElementById('weddingAudio');
    const musicBtn = document.getElementById('musicBtn');

    // Open Invitation Action
    function unlockInvitation(e) {
      if (e) e.preventDefault();
      coverGate.classList.add('opened');
      document.body.classList.remove('locked');
      document.body.classList.add('card-unlocked');

      weddingAudio.play().then(() => {
        musicBtn.classList.add('playing');
      }).catch(() => {});
    }

    openCardBtn.addEventListener('click', unlockInvitation);

    function reopenCoverGate(e) {
      if (e) e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
      document.body.classList.remove('card-unlocked');
      document.body.classList.add('locked');
      coverGate.classList.remove('opened');
    }

    // Auto-open if URL has ?open=1
    if (window.location.search.includes('open=1')) {
      unlockInvitation();
    }

    // Music Toggle
    function toggleMusic() {
      if (weddingAudio.paused) {
        weddingAudio.play();
        musicBtn.classList.add('playing');
      } else {
        weddingAudio.pause();
        musicBtn.classList.remove('playing');
      }
    }

    // Petals Toggle
    function togglePetals() {
      const layer = document.getElementById('petalsLayer');
      layer.classList.toggle('off');
    }

    // Render Album Thumbnails & Carousel
    const thumbsContainer = document.getElementById('albumThumbs');
    const activeImg = document.getElementById('albumActiveImg');
    const counterEl = document.getElementById('albumCounter');

    function renderAlbum() {
      thumbsContainer.innerHTML = '';
      albumPhotos.forEach((src, idx) => {
        const div = document.createElement('div');
        div.className = 'album-thumb-item' + (idx === currentAlbumIndex ? ' active' : '');
        div.innerHTML = `<img src="${src}" alt="Ảnh ${idx + 1}">`;
        div.onclick = () => selectAlbumPhoto(idx);
        thumbsContainer.appendChild(div);
      });
    }

    function selectAlbumPhoto(idx) {
      currentAlbumIndex = (idx + albumPhotos.length) % albumPhotos.length;
      activeImg.style.opacity = '0.35';
      setTimeout(() => {
        activeImg.src = albumPhotos[currentAlbumIndex];
        activeImg.style.opacity = '1';
      }, 140);
      counterEl.textContent = `${currentAlbumIndex + 1} / ${albumPhotos.length}`;
      renderAlbum();
    }

    function stepAlbum(dir) {
      selectAlbumPhoto(currentAlbumIndex + dir);
    }

    renderAlbum();

    // Lightbox
    function openLightbox(idx) {
      document.getElementById('lightboxImg').src = albumPhotos[idx];
      document.getElementById('lightboxModal').classList.add('active');
    }

    function closeLightbox() {
      document.getElementById('lightboxModal').classList.remove('active');
    }

    // Gift Modal
    function toggleGiftModal(show) {
      document.getElementById('giftModal').classList.toggle('active', show);
    }

    // Guestbook Wish Submission
    function submitWish(e) {
      e.preventDefault();
      const nameEl = document.getElementById('guestNameInput');
      const wishEl = document.getElementById('guestWishInput');
      const feed = document.getElementById('wishesFeed');

      const item = document.createElement('div');
      item.className = 'wish-item';
      item.innerHTML = `
        <div class="wish-header">
          <span class="wish-author">${nameEl.value.replace(/</g, '&lt;')}</span>
          <span class="wish-time">Vừa xong</span>
        </div>
        <p class="wish-content">${wishEl.value.replace(/</g, '&lt;')}</p>
      `;
      feed.prepend(item);
      nameEl.value = '';
      wishEl.value = '';
    }

    // Countdown Timer
    const weddingDateStr = '{{ $weddingCard->wedding_date ? $weddingCard->wedding_date->format("Y-m-d") : "2026-12-31" }}';
    const weddingTimeStr = '{{ !empty($weddingCard->wedding_time) && preg_match("/^\d{1,2}:\d{2}$/", trim($weddingCard->wedding_time)) ? trim($weddingCard->wedding_time) . ":00" : "18:00:00" }}';
    const targetWeddingDate = new Date(`${weddingDateStr}T${weddingTimeStr}+07:00`).getTime();
    function updateCountdown() {
      const now = Date.now();
      const diff = Math.max(0, targetWeddingDate - now);
      const days = Math.floor(diff / (1000 * 60 * 60 * 24));
      const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
      const mins = Math.floor((diff / (1000 * 60)) % 60);
      const secs = Math.floor((diff / 1000) % 60);

      document.getElementById('cdDays').textContent = String(days).padStart(2, '0');
      document.getElementById('cdHours').textContent = String(hours).padStart(2, '0');
      document.getElementById('cdMins').textContent = String(mins).padStart(2, '0');
      document.getElementById('cdSecs').textContent = String(secs).padStart(2, '0');
    }
    updateCountdown();
    setInterval(updateCountdown, 1000);

    // Scroll Reveal Observer
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, { threshold: 0.12 });

    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
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