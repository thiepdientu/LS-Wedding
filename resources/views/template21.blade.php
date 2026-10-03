<!DOCTYPE html>
<html lang="vi" prefix="og: https://ogp.me/ns#">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- OpenGraph Metadata -->
  <title>{{ $weddingCard->groom_name }} ❤️ {{ $weddingCard->bride_name }} - Thiệp Cưới Phương Đông</title>
  <meta property="og:title" content="{{ $weddingCard->groom_name }} ❤️ {{ $weddingCard->bride_name }} - Lời Mời Thành Hôn">
  <meta property="og:description" content="Trân trọng kính mời quý khách đến chung vui cùng gia đình chúng tôi tại {{ $weddingCard->name_place_wedding ?? 'buổi tiệc cưới' }} ngày {{ $weddingCard->wedding_date }}">
  <meta property="og:image" content="{{ !empty($weddingCard->banner_preview) ? asset($weddingCard->banner_preview) : asset('template21/images/chuhi.png') }}">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="website">

  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500;700&family=Playfair+Display:ital,wght@0,500;0,700;1,600&family=Reddit+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css">

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'oriental-red': '#E51D23',
            'oriental-darkred': '#981B1E',
            'oriental-gold': '#FCE8AB',
            'oriental-orange': '#F18C22'
          }
        }
      }
    }
  </script>

  <!-- Core & Animation Styles -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
  <link rel="stylesheet" href="{{ asset('template21/css/core-admin.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template21/css/animation.css') }}">

  <style>
    :root {
      --font-primary: 'Reddit Sans', sans-serif;
      --font-title: 'Playfair Display', serif;
      --font-script: 'Dancing Script', cursive;
      --color-primary: #E51D23;
      --color-secondary: #981B1E;
      --color-gold: #FCE8AB;
      --color-orange: #F18C22;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: var(--font-primary);
      background-color: #FAFAFA;
      color: #222222;
      overflow-x: hidden;
      line-height: 1.5;
    }

    .font-script { font-family: var(--font-script) !important; }
    .font-title { font-family: var(--font-title) !important; }
    .font-primary { font-family: var(--font-primary) !important; }

    /* Pattern chìm Á Đông */
    .pattern {
      background: repeating-radial-gradient(circle, transparent, transparent 5.6px, #E5DFDE 5.6px, #E5DFDE 7.2px), 
                  repeating-radial-gradient(circle, transparent, transparent 5.6px, #E5DFDE 5.6px, #E5DFDE 7.2px), 
                  transparent;
      background-size: 32px 32px;
      background-position: 0 0, 16px 16px, 32px 16px;
    }

    /* Đảm bảo màn hình mở thiệp luôn chuẩn đỏ và căn giữa */
    #envelope-screen {
      background: linear-gradient(180deg, #981B1E 0%, #E51D23 50%, #981B1E 100%) !important;
      min-height: 100vh;
      width: 100%;
      position: relative;
      display: flex !important;
      flex-direction: column !important;
      justify-content: space-between !important;
      align-items: center !important;
      text-align: center !important;
      color: #FFFFFF !important;
      padding: 30px 16px 20px;
      overflow: hidden;
    }

    /* Khung ảnh tròn màn hình đầu */
    .envelope-avatar-container {
      width: 190px !important;
      height: 190px !important;
      max-width: 190px !important;
      max-height: 190px !important;
      border-radius: 9999px !important;
      overflow: hidden !important;
      border: 4px solid #FCE8AB !important;
      margin: 16px auto !important;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4) !important;
      background-color: #981B1E !important;
    }

    .envelope-avatar-container img {
      width: 100% !important;
      height: 100% !important;
      object-fit: cover !important;
      border-radius: 9999px !important;
      display: block !important;
    }

    /* Nút mở thiệp */
    .btn-open-envelope {
      background: none !important;
      border: none !important;
      cursor: pointer !important;
      display: flex !important;
      flex-direction: column !important;
      align-items: center !important;
      gap: 6px !important;
      color: #FCE8AB !important;
      outline: none !important;
    }

    .btn-open-circle {
      width: 48px !important;
      height: 48px !important;
      border-radius: 9999px !important;
      background: rgba(252, 232, 171, 0.95) !important;
      color: #981B1E !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      border: 2px solid #FFFFFF !important;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3) !important;
      font-size: 24px !important;
      transition: transform 0.3s ease;
    }
    .btn-open-circle:hover {
      transform: scale(1.1);
    }

    /* Thẻ giới thiệu cô dâu chú rể */
    .about-card {
      border-radius: 18px !important;
      background: linear-gradient(180deg, #981B1E 0%, #E51D23 50%, #981B1E 100%) !important;
      padding: 24px !important;
      color: #FFFFFF !important;
      box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
      position: relative !important;
      overflow: hidden !important;
      margin-bottom: 20px !important;
    }

    .couple-avatar {
      width: 150px !important;
      height: 150px !important;
      max-width: 150px !important;
      max-height: 150px !important;
      border-radius: 9999px !important;
      overflow: hidden !important;
      border: 4px solid #FCE8AB !important;
      box-shadow: 0 6px 18px rgba(0,0,0,0.2) !important;
      flex-shrink: 0 !important;
      margin: 0 auto !important;
      background-color: #981B1E;
    }

    .couple-avatar img {
      width: 100% !important;
      height: 100% !important;
      object-fit: cover !important;
      border-radius: 9999px !important;
      display: block !important;
    }

    /* Nút vàng mạ kim */
    .btn-gold {
      background: linear-gradient(135deg, #FCE8AB 0%, #F18C22 100%) !important;
      color: #7A1215 !important;
      font-weight: 700 !important;
      border: none !important;
    }
    .btn-gold:hover {
      filter: brightness(1.08);
    }

    /* Animation đĩa nhạc */
    @keyframes spin-slow {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
    .animate-spin-slow {
      animation: spin-slow 8s linear infinite;
    }

    /* Modal mờ */
    .modal-backdrop {
      background-color: rgba(0, 0, 0, 0.75);
      backdrop-filter: blur(4px);
    }
  </style>
</head>
<body class="bg-[#FAFAFA] font-primary">

@php
    // Chuẩn bị Album ảnh
    $album = !empty($weddingCard->album) ? (is_array($weddingCard->album) ? $weddingCard->album : json_decode($weddingCard->album, true)) : [];
    if (!is_array($album)) $album = [];

    // Chuẩn bị Câu chuyện tình yêu
    $stories = [];
    if (!empty($weddingCard->love_story) && $weddingCard->love_story != ',') {
        $items = explode(',', $weddingCard->love_story);
        foreach ($items as $item) {
            if (strpos($item, ':') !== false) {
                $parts = explode(':', $item, 2);
                $stories[] = [
                    'date' => trim($parts[0]),
                    'title' => trim($parts[1]),
                    'desc' => ''
                ];
            } else {
                $stories[] = [
                    'date' => '',
                    'title' => trim($item),
                    'desc' => ''
                ];
            }
        }
    }
    if (empty($stories)) {
        $stories = [
            ['date' => 'Tháng 3 – 2018', 'title' => 'Lần đầu gặp gỡ', 'desc' => 'Một buổi chiều đầy nắng, ánh mắt lướt qua nhau - nhẹ thôi, nhưng đủ khiến thời gian như dừng lại.'],
            ['date' => 'Tháng 6 – 2018', 'title' => 'Những tin nhắn đầu tiên', 'desc' => 'Từ những lời hỏi han vu vơ mỗi ngày, tình cảm nảy nở tự nhiên như hơi thở.'],
            ['date' => 'Tháng 11 – 2019', 'title' => 'Lời tỏ tình dưới mưa', 'desc' => 'Không hoa, không quà, chỉ có tiếng mưa rơi và hai trái tim đập chung một nhịp.'],
            ['date' => 'Tháng 10 – 2024', 'title' => 'Lời cầu hôn ngọt ngào', 'desc' => 'Dưới khung cảnh lãng mạn, anh trao em chiếc nhẫn đính ước cùng lời thề hẹn trăm năm.'],
            ['date' => 'Ngày hôm nay', 'title' => 'Ngày thành hôn', 'desc' => 'Từ hai con người xa lạ, giờ đây chúng mình đã trở thành một gia đình nhỏ ngập tràn tiếng cười.']
        ];
    }

    // Thời gian ngày cưới format
    $weddingTimestamp = strtotime($weddingCard->wedding_date ?? 'now');
    $day = date('d', $weddingTimestamp);
    $month = date('m', $weddingTimestamp);
    $year = date('Y', $weddingTimestamp);

    // Thời gian countdown
    $countdownTime = !empty($weddingCard->wedding_date) 
        ? $weddingCard->wedding_date . ' ' . (!empty($weddingCard->wedding_time) ? $weddingCard->wedding_time : '18:00:00')
        : date('Y-m-d 18:00:00');

    // Ảnh đại diện
    $brideAvatar = !empty($weddingCard->bride_avatar) ? asset($weddingCard->bride_avatar) : (!empty($album[0]) ? asset($album[0]) : asset('template21/images/chuhi.png'));
    $groomAvatar = !empty($weddingCard->groom_avatar) ? asset($weddingCard->groom_avatar) : (!empty($album[1]) ? asset($album[1]) : asset('template21/images/chuhi.png'));
    $bannerTop = !empty($weddingCard->banner_top) ? asset($weddingCard->banner_top) : $brideAvatar;
@endphp

<!-- ================= 1. MÀN HÌNH MỞ THIỆP (PRELOAD / ENVELOPE) ================= -->
<div id="envelope-screen">
  <!-- Pattern chìm -->
  <div class="absolute inset-0 pattern opacity-10 pointer-events-none"></div>

  <!-- Lồng đèn 2 bên trên -->
  <div class="absolute top-0 left-0 w-28 md:w-44 pointer-events-none z-10" data-aos="fade-down" data-aos-duration="1200">
    <img src="{{ asset('template21/images/longden-1.png') }}" alt="Lồng đèn" class="w-full">
  </div>
  <div class="absolute top-0 right-0 w-28 md:w-44 pointer-events-none z-10" data-aos="fade-down" data-aos-duration="1200">
    <img src="{{ asset('template21/images/longden-2.png') }}" alt="Lồng đèn" class="w-full">
  </div>

  <!-- Nhành hoa đào đỏ 2 góc dưới -->
  <div class="absolute -bottom-6 -left-6 w-40 md:w-64 pointer-events-none z-10" data-aos="zoom-in-right">
    <img src="{{ asset('template21/images/red-flower-1.png') }}" alt="Hoa trang trí" class="w-full">
  </div>
  <div class="absolute -bottom-4 -right-4 w-32 md:w-52 pointer-events-none z-10" data-aos="zoom-in-left">
    <img src="{{ asset('template21/images/red-flower-2.png') }}" alt="Hoa trang trí" class="w-full">
  </div>

  <!-- Khối nội dung trung tâm -->
  <div class="relative z-20 flex flex-col items-center justify-center max-w-md w-full px-4 my-auto">
    <!-- Chữ Hỷ -->
    <img src="{{ asset('template21/images/chuhi.png') }}" alt="Chữ Hỷ" class="w-24 md:w-28 mx-auto drop-shadow-md" data-aos="zoom-in">

    <p class="text-xl md:text-2xl font-title text-[#FCE8AB] mt-3 tracking-widest uppercase" data-aos="fade-up">
      Save <span class="font-script text-3xl lowercase">the</span> Date
    </p>

    <div class="text-base md:text-lg font-semibold text-[#FCE8AB]/90 tracking-wider mt-1" data-aos="fade-up">
      {{ $weddingCard->wedding_date }}
    </div>

    <!-- Ảnh tròn cô dâu chú rể -->
    <div class="relative my-4" data-aos="zoom-in" data-aos-duration="1000">
      <div class="envelope-avatar-container">
        <img src="{{ $bannerTop }}" alt="Ảnh cưới">
      </div>
    </div>

    <!-- Tên cô dâu & chú rể -->
    <div class="flex items-center justify-center font-script text-3xl md:text-4xl text-[#FCE8AB] gap-3" data-aos="fade-up">
      <span>{{ $weddingCard->groom_name }}</span>
      <span class="text-xl font-title text-white">❤️</span>
      <span>{{ $weddingCard->bride_name }}</span>
    </div>

    <!-- Giờ và địa điểm -->
    <div class="text-white/90 text-sm md:text-base mt-4" data-aos="fade-up">
      <p class="font-bold text-lg text-[#FCE8AB]">{{ $weddingCard->wedding_time }}</p>
      <p class="font-title text-xl text-white font-semibold">{{ $weddingCard->name_place_wedding }}</p>
      <p class="italic text-xs md:text-sm text-white/80 mt-1 max-w-xs mx-auto">{{ $weddingCard->address_wedding }}</p>
    </div>
  </div>

  <!-- Nút mở thiệp -->
  <div class="relative z-20 pb-4 pt-2">
    <button id="btn-open-card" class="btn-open-envelope group">
      <span class="text-[#FCE8AB] text-xs md:text-sm font-semibold tracking-wider uppercase animate-pulse">Chạm để mở thiệp</span>
      <div class="btn-open-circle animate-bounce">
        <i class="ri-arrow-down-line"></i>
      </div>
    </button>
  </div>
</div>

<!-- ================= PHẦN THIỆP CHÍNH ================= -->
<div id="main-content" class="relative max-w-xl mx-auto bg-white shadow-2xl overflow-hidden min-h-screen">

  <!-- ================= 2. GIỚI THIỆU CÔ DÂU & CHÚ RỂ ================= -->
  <section id="about" class="py-12 px-4 bg-white relative">
    <div class="text-center mb-8" data-aos="fade-up">
      <img src="{{ asset('template21/images/chuhi-small.png') }}" alt="" class="w-8 mx-auto mb-2 opacity-80">
      <h2 class="font-title text-3xl md:text-4xl text-[#981B1E] uppercase tracking-wide font-bold">Đám Cưới Của</h2>
      <p class="font-script text-2xl text-[#E51D23] mt-1">The Happy Couple</p>
    </div>

    <div class="grid grid-cols-1 gap-6">
      <!-- Card Chú Rể -->
      <div class="about-card" data-aos="fade-up">
        <div class="absolute inset-0 pattern opacity-10 pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row items-center gap-6">
          <div class="couple-avatar">
            <img src="{{ $groomAvatar }}" alt="{{ $weddingCard->groom_name }}">
          </div>
          <div class="text-center md:text-left flex-1">
            <p class="font-script text-2xl text-[#FCE8AB]">The Groom</p>
            <h3 class="font-title text-3xl font-bold tracking-wide mt-1">{{ $weddingCard->groom_name }}</h3>
            @if(!empty($weddingCard->groom_birthday))
              <p class="text-xs text-white/80 mt-1"><i class="ri-cake-2-line mr-1"></i> {{ $weddingCard->groom_birthday }}</p>
            @endif
            @if(!empty($weddingCard->groom_phone))
              <a href="tel:{{ $weddingCard->groom_phone }}" class="inline-flex items-center gap-1.5 text-xs bg-[#FCE8AB] text-[#981B1E] px-3 py-1 rounded-full font-bold mt-2 shadow">
                <i class="ri-phone-fill"></i> {{ $weddingCard->groom_phone }}
              </a>
            @endif
            <p class="text-sm text-white/90 italic mt-3 leading-relaxed">
              {{ !empty($weddingCard->des_groom) ? $weddingCard->des_groom : 'Một người luôn vững vàng, ấm áp và luôn dành trọn tình cảm yêu thương cho gia đình nhỏ.' }}
            </p>
          </div>
        </div>
      </div>

      <!-- Card Cô Dâu -->
      <div class="about-card" data-aos="fade-up">
        <div class="absolute inset-0 pattern opacity-10 pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row-reverse items-center gap-6">
          <div class="couple-avatar">
            <img src="{{ $brideAvatar }}" alt="{{ $weddingCard->bride_name }}">
          </div>
          <div class="text-center md:text-right flex-1">
            <p class="font-script text-2xl text-[#FCE8AB]">The Bride</p>
            <h3 class="font-title text-3xl font-bold tracking-wide mt-1">{{ $weddingCard->bride_name }}</h3>
            @if(!empty($weddingCard->bride_birthday))
              <p class="text-xs text-white/80 mt-1"><i class="ri-cake-2-line mr-1"></i> {{ $weddingCard->bride_birthday }}</p>
            @endif
            @if(!empty($weddingCard->bride_phone))
              <a href="tel:{{ $weddingCard->bride_phone }}" class="inline-flex items-center gap-1.5 text-xs bg-[#FCE8AB] text-[#981B1E] px-3 py-1 rounded-full font-bold mt-2 shadow">
                <i class="ri-phone-fill"></i> {{ $weddingCard->bride_phone }}
              </a>
            @endif
            <p class="text-sm text-white/90 italic mt-3 leading-relaxed">
              {{ !empty($weddingCard->des_bride) ? $weddingCard->des_bride : 'Dịu dàng, chu đáo và luôn mang lại nụ cười, nguồn năng lượng tích cực cho những người xung quanh.' }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 3. CÂU CHUYỆN TÌNH YÊU (LOVE STORY) ================= -->
  <section id="story" class="relative py-14 text-white overflow-hidden bg-gradient-to-b from-[#981B1E] via-[#7A1215] to-[#981B1E]">
    <!-- Viền hoa văn Á Đông trên & dưới -->
    <div class="absolute top-0 left-0 w-full h-4 bg-repeat-x bg-contain" style="background-image: url('{{ asset('template21/images/china-line.png') }}')"></div>
    <div class="absolute bottom-0 left-0 w-full h-4 bg-repeat-x bg-contain" style="background-image: url('{{ asset('template21/images/china-line.png') }}')"></div>

    <div class="text-center mb-10 px-4" data-aos="fade-up">
      <p class="font-script text-3xl text-[#FCE8AB]">Love Story</p>
      <h2 class="font-title text-2xl md:text-3xl font-bold uppercase tracking-wider text-white">Chuyện Chúng Mình</h2>
      <div class="w-16 h-0.5 bg-[#FCE8AB] mx-auto mt-2"></div>
    </div>

    <div class="relative px-6 max-w-lg mx-auto">
      <!-- Đường trục dọc timeline -->
      <div class="absolute left-10 top-2 bottom-6 w-0.5 bg-[#FCE8AB]/50"></div>

      <div class="space-y-8">
        @foreach($stories as $story)
          <div class="flex items-start gap-5 relative" data-aos="fade-up">
            <!-- Icon chữ Hỷ tròn -->
            <div class="w-8 h-8 rounded-full bg-[#FCE8AB] text-[#981B1E] flex items-center justify-center flex-shrink-0 z-10 shadow-md ring-4 ring-[#981B1E]">
              <img src="{{ asset('template21/images/chuhi-small.png') }}" class="w-4 h-4" alt="">
            </div>
            <!-- Nội dung mốc -->
            <div class="bg-white/10 backdrop-blur-sm p-4 rounded-xl flex-1 border border-white/10 shadow">
              <span class="text-xs font-bold uppercase tracking-wider text-[#FCE8AB]">{{ $story['date'] }}</span>
              <h4 class="font-title text-lg font-bold text-white mt-0.5">{{ $story['title'] }}</h4>
              @if(!empty($story['desc']))
                <p class="text-xs md:text-sm text-white/80 mt-1 italic leading-relaxed">{{ $story['desc'] }}</p>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ================= 4. ALBUM ẢNH CƯỚI (PHOTO GALLERY) ================= -->
  @if(!empty($album) && count($album) > 0)
  <section id="album" class="py-12 px-4 bg-white">
    <div class="text-center mb-8" data-aos="fade-up">
      <img src="{{ asset('template21/images/chuhi-small.png') }}" alt="" class="w-8 mx-auto mb-2 opacity-80">
      <h2 class="font-title text-3xl md:text-4xl text-[#981B1E] uppercase tracking-wide font-bold">Album Ảnh Cưới</h2>
      <p class="font-script text-2xl text-[#E51D23] mt-1">Khoảnh khắc đáng nhớ</p>
    </div>

    <!-- Lưới ảnh Gallery -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
      @foreach($album as $index => $img)
        <a href="{{ asset($img) }}" class="glightbox block overflow-hidden rounded-xl shadow-md aspect-square group relative" data-gallery="wedding-gallery" data-aos="zoom-in" data-aos-delay="{{ ($index % 4) * 100 }}">
          <img src="{{ asset($img) }}" alt="Ảnh cưới" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
          <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white">
            <i class="ri-zoom-in-line text-2xl"></i>
          </div>
        </a>
      @endforeach
    </div>
  </section>
  @endif

  <!-- ================= 5. ĐẾM NGƯỢC & THIỆP MỜI (COUNTDOWN & INVITATION) ================= -->
  <section id="invitation" class="py-14 px-4 bg-gradient-to-b from-[#981B1E] to-[#7A1215] text-white text-center relative overflow-hidden">
    <!-- Viền gấm -->
    <div class="absolute top-0 left-0 w-full h-4 bg-repeat-x bg-contain" style="background-image: url('{{ asset('template21/images/china-line.png') }}')"></div>

    <div class="max-w-md mx-auto relative z-10">
      <p class="font-script text-3xl text-[#FCE8AB]" data-aos="fade-up">Countdown to the Big Day</p>
      <h2 class="font-title text-2xl md:text-3xl font-bold uppercase tracking-wider text-white" data-aos="fade-up">Cùng Đếm Ngược</h2>

      <!-- Bộ đếm ngược thời gian thực -->
      <div id="countdown-timer" data-target="{{ $countdownTime }}" class="grid grid-cols-4 gap-2 md:gap-3 my-8 text-center" data-aos="zoom-in">
        <div class="bg-black/30 backdrop-blur-md p-3 rounded-xl border border-[#FCE8AB]/30">
          <span id="cd-days" class="block text-2xl md:text-3xl font-bold text-[#FCE8AB]">00</span>
          <span class="text-xs text-white/80">Ngày</span>
        </div>
        <div class="bg-black/30 backdrop-blur-md p-3 rounded-xl border border-[#FCE8AB]/30">
          <span id="cd-hours" class="block text-2xl md:text-3xl font-bold text-[#FCE8AB]">00</span>
          <span class="text-xs text-white/80">Giờ</span>
        </div>
        <div class="bg-black/30 backdrop-blur-md p-3 rounded-xl border border-[#FCE8AB]/30">
          <span id="cd-minutes" class="block text-2xl md:text-3xl font-bold text-[#FCE8AB]">00</span>
          <span class="text-xs text-white/80">Phút</span>
        </div>
        <div class="bg-black/30 backdrop-blur-md p-3 rounded-xl border border-[#FCE8AB]/30">
          <span id="cd-seconds" class="block text-2xl md:text-3xl font-bold text-[#FCE8AB]">00</span>
          <span class="text-xs text-white/80">Giây</span>
        </div>
      </div>

      <!-- Thẻ thiệp vàng sang trọng -->
      <div class="bg-gradient-to-br from-[#FCE8AB] via-[#FFF3D1] to-[#F18C22] text-[#7A1215] p-6 md:p-8 rounded-[24px] shadow-2xl relative border-2 border-white/50" data-aos="flip-up">
        <img src="{{ asset('template21/images/chuhi.png') }}" alt="" class="w-14 mx-auto mb-3">
        
        <p class="font-title text-xl font-bold tracking-widest uppercase">Trân Trọng Kính Mời</p>
        <p class="text-xs font-semibold text-[#981B1E] uppercase mt-1">Đến dự buổi lễ thành hôn</p>

        <!-- Thời gian lớn -->
        <div class="my-4 py-2 border-y border-[#7A1215]/30 flex items-center justify-center gap-4">
          <div class="text-right flex-1">
            <span class="block text-xs uppercase font-semibold text-[#7A1215]/80">Tháng</span>
            <span class="text-lg font-bold">{{ $month }}</span>
          </div>
          <div class="text-4xl md:text-5xl font-extrabold text-[#981B1E] font-title px-3">
            {{ $day }}
          </div>
          <div class="text-left flex-1">
            <span class="block text-xs uppercase font-semibold text-[#7A1215]/80">Năm</span>
            <span class="text-lg font-bold">{{ $year }}</span>
          </div>
        </div>

        <p class="text-base font-bold text-[#981B1E]"><i class="ri-time-line mr-1"></i> Vào lúc {{ $weddingCard->wedding_time }}</p>

        <div class="mt-4 pt-3 border-t border-[#7A1215]/20">
          <h3 class="font-title text-xl md:text-2xl font-bold text-[#7A1215]">{{ $weddingCard->name_place_wedding }}</h3>
          <p class="text-xs md:text-sm text-[#7A1215]/90 mt-1">{{ $weddingCard->address_wedding }}</p>
        </div>

        @if(!empty($weddingCard->address_wedding_map))
          <div class="mt-6">
            <a href="{{ $weddingCard->address_wedding_map }}" target="_blank" class="inline-flex items-center gap-2 bg-[#981B1E] text-white px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg hover:bg-[#7A1215] transition-colors">
              <i class="ri-map-pin-2-fill text-sm text-[#FCE8AB]"></i> Chỉ Đường Bản Đồ
            </a>
          </div>
        @endif
      </div>
    </div>
  </section>

  <!-- ================= 6. LỊCH TRÌNH TIỆC CƯỚI (TIMELINE) ================= -->
  <section id="schedule" class="py-12 px-4 bg-white text-center">
    <div class="mb-8" data-aos="fade-up">
      <img src="{{ asset('template21/images/chuhi-small.png') }}" alt="" class="w-8 mx-auto mb-2 opacity-80">
      <h2 class="font-title text-2xl md:text-3xl text-[#981B1E] uppercase tracking-wide font-bold">Lịch Trình Buổi Tiệc</h2>
      <p class="text-xs text-gray-500 uppercase tracking-widest mt-1">Wedding Program</p>
    </div>

    <div class="max-w-md mx-auto space-y-4 text-left">
      <div class="flex items-center gap-4 p-4 rounded-xl bg-red-50/50 border border-red-100 shadow-sm" data-aos="fade-up">
        <div class="w-12 h-12 rounded-full bg-[#E51D23] text-[#FCE8AB] flex items-center justify-center font-bold text-sm flex-shrink-0 shadow">
          16:30
        </div>
        <div>
          <h4 class="font-bold text-gray-800 text-sm md:text-base">Đón Khách & Chụp Hình</h4>
          <p class="text-xs text-gray-500 mt-0.5">Cô dâu & Chú rể chào đón người thân, bạn bè lưu giữ khoảnh khắc kỷ niệm.</p>
        </div>
      </div>

      <div class="flex items-center gap-4 p-4 rounded-xl bg-red-50/50 border border-red-100 shadow-sm" data-aos="fade-up" data-aos-delay="100">
        <div class="w-12 h-12 rounded-full bg-[#981B1E] text-[#FCE8AB] flex items-center justify-center font-bold text-sm flex-shrink-0 shadow">
          17:30
        </div>
        <div>
          <h4 class="font-bold text-gray-800 text-sm md:text-base">Nghi Thức Lễ Thành Hôn</h4>
          <p class="text-xs text-gray-500 mt-0.5">Trao nhẫn cưới thiêng liêng, cắt bánh và cùng chúc phúc trăm năm.</p>
        </div>
      </div>

      <div class="flex items-center gap-4 p-4 rounded-xl bg-red-50/50 border border-red-100 shadow-sm" data-aos="fade-up" data-aos-delay="200">
        <div class="w-12 h-12 rounded-full bg-[#E51D23] text-[#FCE8AB] flex items-center justify-center font-bold text-sm flex-shrink-0 shadow">
          18:00
        </div>
        <div>
          <h4 class="font-bold text-gray-800 text-sm md:text-base">Khai Tiệc Mừng & Nâng Ly</h4>
          <p class="text-xs text-gray-500 mt-0.5">Thưởng thức ẩm thực và nâng ly chúc mừng hạnh phúc đôi lứa.</p>
        </div>
      </div>

      <div class="flex items-center gap-4 p-4 rounded-xl bg-red-50/50 border border-red-100 shadow-sm" data-aos="fade-up" data-aos-delay="300">
        <div class="w-12 h-12 rounded-full bg-[#981B1E] text-[#FCE8AB] flex items-center justify-center font-bold text-sm flex-shrink-0 shadow">
          19:30
        </div>
        <div>
          <h4 class="font-bold text-gray-800 text-sm md:text-base">Âm Nhạc & Chúc Phúc</h4>
          <p class="text-xs text-gray-500 mt-0.5">Giao lưu âm nhạc sôi nổi cùng những lời chúc chân thành nhất.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 7. DRESSCODE (TRANG PHỤC GỢI Ý) ================= -->
  <section id="dresscode" class="py-10 px-4 bg-neutral-50 text-center border-t border-b border-gray-100">
    <div class="max-w-md mx-auto" data-aos="fade-up">
      <h3 class="font-title text-2xl text-[#981B1E] uppercase font-bold tracking-wider">Dresscode</h3>
      <p class="text-xs text-gray-500 mt-1">Trang phục gợi ý cho buổi tiệc</p>

      <div class="flex items-center justify-center gap-6 mt-6">
        <!-- Nam -->
        <div class="text-center">
          <p class="text-xs font-semibold text-gray-700 mb-2">Quý Nam</p>
          <div class="flex items-center justify-center -space-x-2">
            <span class="w-8 h-8 rounded-full border-2 border-white shadow bg-black" title="Đen"></span>
            <span class="w-8 h-8 rounded-full border-2 border-white shadow bg-slate-600" title="Ghi xám"></span>
            <span class="w-8 h-8 rounded-full border-2 border-white shadow bg-[#981B1E]" title="Đỏ đô"></span>
          </div>
        </div>

        <div class="w-px h-10 bg-gray-300"></div>

        <!-- Nữ -->
        <div class="text-center">
          <p class="text-xs font-semibold text-gray-700 mb-2">Quý Nữ</p>
          <div class="flex items-center justify-center -space-x-2">
            <span class="w-8 h-8 rounded-full border-2 border-white shadow bg-[#E51D23]" title="Đỏ tươi"></span>
            <span class="w-8 h-8 rounded-full border-2 border-white shadow bg-[#FCE8AB]" title="Vàng be"></span>
            <span class="w-8 h-8 rounded-full border-2 border-white shadow bg-pink-300" title="Hồng pastel"></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= 8. FORM XÁC NHẬN THAM DỰ (RSVP) ================= -->
  <section id="rsvp" class="py-12 px-4 bg-gradient-to-t from-[#981B1E] via-[#E51D23] to-[#981B1E] text-white">
    <div class="max-w-md mx-auto" data-aos="fade-up">
      <div class="text-center mb-6">
        <p class="font-script text-3xl text-[#FCE8AB]">R.S.V.P</p>
        <h2 class="font-title text-2xl md:text-3xl font-bold uppercase tracking-wider text-white">Xác Nhận Tham Dự</h2>
        <p class="text-xs text-white/80 mt-1">Xin vui lòng xác nhận để gia đình chuẩn bị chu đáo nhất</p>
      </div>

      <form id="rsvp-form" class="space-y-4 bg-black/20 backdrop-blur-md p-6 rounded-2xl border border-white/20 shadow-xl">
        <div>
          <label class="block text-xs font-semibold text-[#FCE8AB] mb-1">Họ và tên của bạn</label>
          <input type="text" id="rsvp-name" required placeholder="Nhập tên của bạn..." class="w-full px-4 py-2.5 rounded-lg bg-white text-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-[#FCE8AB]">
        </div>

        <div>
          <label class="block text-xs font-semibold text-[#FCE8AB] mb-1">Bạn sẽ tham dự chứ?</label>
          <select id="rsvp-status" class="w-full px-4 py-2.5 rounded-lg bg-white text-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-[#FCE8AB]">
            <option value="yes">Chắc chắn rồi! Tôi sẽ tham dự</option>
            <option value="no">Tiếc quá, tôi bận mất rồi</option>
          </select>
        </div>

        <div>
          <label class="block text-xs font-semibold text-[#FCE8AB] mb-1">Số lượng người đi cùng</label>
          <select id="rsvp-guests" class="w-full px-4 py-2.5 rounded-lg bg-white text-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-[#FCE8AB]">
            <option value="1">1 người</option>
            <option value="2">2 người</option>
            <option value="3">3 người</option>
            <option value="4">4+ người</option>
          </select>
        </div>

        <div>
          <label class="block text-xs font-semibold text-[#FCE8AB] mb-1">Gửi lời chúc phúc</label>
          <textarea id="rsvp-message" rows="3" placeholder="Gửi vài dòng chúc phúc tới cô dâu chú rể..." class="w-full px-4 py-2.5 rounded-lg bg-white text-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-[#FCE8AB]"></textarea>
        </div>

        <button type="submit" class="w-full btn-gold py-3 rounded-lg text-sm uppercase tracking-wider shadow-lg transition-transform active:scale-95 cursor-pointer">
          Gửi Xác Nhận & Lời Chúc
        </button>

        <div id="rsvp-success" class="hidden text-center text-sm font-semibold text-[#FCE8AB] bg-black/40 p-3 rounded-lg border border-[#FCE8AB]/30 mt-3 animate-fade-in">
          Cảm ơn bạn đã gửi lời chúc và xác nhận! ❤️
        </div>
      </form>
    </div>
  </section>

  <!-- ================= 9. LỜI CẢM ƠN (THANK YOU) ================= -->
  <section id="thankyou" class="py-16 px-6 bg-white text-center relative overflow-hidden">
    <div class="max-w-md mx-auto" data-aos="fade-up">
      <img src="{{ asset('template21/images/chuhi.png') }}" alt="" class="w-16 mx-auto mb-4">
      <h2 class="font-title text-3xl font-bold text-[#981B1E] uppercase">Lời Cảm Ơn</h2>
      <p class="font-script text-2xl text-[#E51D23] mt-1">Thank you so much</p>
      
      <p class="text-sm md:text-base text-gray-700 leading-relaxed mt-4 italic">
        {{ !empty($weddingCard->message_thanks) 
            ? $weddingCard->message_thanks 
            : 'Sự hiện diện và lời chúc phúc của quý khách là niềm vinh hạnh to lớn và là món quà ý nghĩa nhất dành cho chúng tôi trong ngày vui trọng đại này. Xin chân thành cảm ơn!' 
        }}
      </p>

      <div class="font-script text-2xl text-[#981B1E] font-bold mt-6">
        {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}
      </div>
    </div>
  </section>

  <!-- Footer bản quyền -->
  <footer class="py-4 bg-[#7A1215] text-white/60 text-center text-xs">
    <p>© {{ date('Y') }} {{ $weddingCard->groom_name }} & {{ $weddingCard->bride_name }}. Thiệp cưới điện tử Phương Đông.</p>
  </footer>

</div>

<!-- ================= 10. TIỆN ÍCH NỔI CỐ ĐỊNH (MUSIC & GIFT) ================= -->

<!-- Nút Bật/Tắt Nhạc Nền -->
<div class="fixed top-5 right-5 z-[999999]">
  <button id="btn-toggle-music" class="w-11 h-11 rounded-full bg-gradient-to-tr from-[#981B1E] to-[#E51D23] text-[#FCE8AB] border-2 border-white shadow-xl flex items-center justify-center focus:outline-none animate-spin-slow cursor-pointer">
    <i id="music-icon" class="ri-music-2-fill text-lg"></i>
  </button>
  <audio id="bg-audio" loop preload="auto">
    <source src="{{ asset('template21/audio/Marry-Me.mp3') }}" type="audio/mpeg">
  </audio>
</div>

<!-- Nút Hộp Quà Mừng Cưới (Gift Box) -->
<div class="fixed bottom-6 right-5 z-[999999]">
  <button id="btn-open-gift" class="w-12 h-12 md:w-14 md:h-14 rounded-full bg-gradient-to-tr from-[#E51D23] via-[#F18C22] to-[#FCE8AB] text-[#7A1215] border-2 border-white shadow-2xl flex items-center justify-center animate-bounce hover:scale-110 transition-transform focus:outline-none cursor-pointer">
    <i class="ri-gift-fill text-2xl"></i>
  </button>
</div>

<!-- ================= MODAL MÃ QR MỪNG CƯỚI ================= -->
<div id="gift-modal" class="fixed inset-0 z-[9999999] hidden flex items-center justify-center p-4 modal-backdrop">
  <div class="bg-white rounded-[24px] max-w-sm w-full p-6 text-center shadow-2xl relative border-4 border-[#FCE8AB]">
    <!-- Nút đóng -->
    <button id="btn-close-gift" class="absolute top-3 right-3 w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-600 flex items-center justify-center cursor-pointer">
      <i class="ri-close-line text-lg"></i>
    </button>

    <img src="{{ asset('template21/images/chuhi.png') }}" class="w-12 mx-auto mb-2" alt="">
    <h3 class="font-title text-2xl font-bold text-[#981B1E] uppercase">Mừng Cưới Online</h3>
    <p class="text-xs text-gray-500 mb-4">Gửi quà và lời chúc phúc đến cô dâu & chú rể</p>

    <!-- Tabs chọn Nhà Trai / Nhà Gái -->
    <div class="flex rounded-lg bg-gray-100 p-1 mb-4">
      <button id="tab-groom" class="flex-1 py-1.5 rounded-md text-xs font-bold transition-all bg-[#981B1E] text-white shadow cursor-pointer">
        Chú Rể
      </button>
      <button id="tab-bride" class="flex-1 py-1.5 rounded-md text-xs font-bold transition-all text-gray-600 cursor-pointer">
        Cô Dâu
      </button>
    </div>

    <!-- QR Chú rể -->
    <div id="content-groom" class="qr-content space-y-2">
      <div class="p-2 border-2 border-dashed border-[#981B1E]/40 rounded-xl inline-block bg-white shadow-inner">
        <img src="{{ !empty($weddingCard->groom_qr) ? asset($weddingCard->groom_qr) : asset('template21/images/chuhi.png') }}" alt="QR Chú Rể" class="w-48 h-48 object-contain mx-auto">
      </div>
      <p class="text-xs font-bold text-gray-800">Chú rể: {{ $weddingCard->groom_name }}</p>
      @if(!empty($weddingCard->groom_phone))
        <p class="text-xs text-gray-500">SĐT/Ví: {{ $weddingCard->groom_phone }}</p>
      @endif
    </div>

    <!-- QR Cô dâu -->
    <div id="content-bride" class="qr-content hidden space-y-2">
      <div class="p-2 border-2 border-dashed border-[#E51D23]/40 rounded-xl inline-block bg-white shadow-inner">
        <img src="{{ !empty($weddingCard->bride_qr) ? asset($weddingCard->bride_qr) : asset('template21/images/chuhi.png') }}" alt="QR Cô Dâu" class="w-48 h-48 object-contain mx-auto">
      </div>
      <p class="text-xs font-bold text-gray-800">Cô dâu: {{ $weddingCard->bride_name }}</p>
      @if(!empty($weddingCard->bride_phone))
        <p class="text-xs text-gray-500">SĐT/Ví: {{ $weddingCard->bride_phone }}</p>
      @endif
    </div>

    <p class="text-[11px] text-gray-400 mt-4 italic">Xin chân thành cảm ơn tình cảm quý báu của quý khách!</p>
  </div>
</div>

<!-- ================= JAVASCRIPT LOGIC ================= -->
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // 1. Khởi tạo AOS Animation
    AOS.init({
      duration: 800,
      once: true,
      offset: 50
    });

    // 2. Khởi tạo GLightbox cho Album ảnh
    const lightbox = GLightbox({
      selector: '.glightbox',
      touchNavigation: true,
      loop: true
    });

    // 3. Xử lý mở thiệp (Trượt màn hình Preload)
    const btnOpen = document.getElementById('btn-open-card');
    const mainContent = document.getElementById('main-content');
    const audio = document.getElementById('bg-audio');

    if (btnOpen) {
      btnOpen.addEventListener('click', function () {
        mainContent.scrollIntoView({ behavior: 'smooth' });
        // Thử phát nhạc tự động khi người dùng tương tác mở thiệp
        if (audio && audio.paused) {
          audio.play().catch(function() {
            console.log('Autoplay blocked by browser policy');
          });
        }
      });
    }

    // 4. Bật / Tắt Nhạc nền
    const btnMusic = document.getElementById('btn-toggle-music');
    const musicIcon = document.getElementById('music-icon');

    if (btnMusic && audio) {
      btnMusic.addEventListener('click', function () {
        if (audio.paused) {
          audio.play();
          btnMusic.classList.add('animate-spin-slow');
          musicIcon.className = 'ri-music-2-fill text-lg';
        } else {
          audio.pause();
          btnMusic.classList.remove('animate-spin-slow');
          musicIcon.className = 'ri-volume-mute-fill text-lg';
        }
      });
    }

    // 5. Đếm ngược thời gian thực
    const timerElem = document.getElementById('countdown-timer');
    if (timerElem) {
      const targetStr = timerElem.getAttribute('data-target').replace(/-/g, "/");
      const targetDate = new Date(targetStr).getTime();

      function updateCountdown() {
        const now = new Date().getTime();
        const distance = targetDate - now;

        if (distance > 0) {
          const days = Math.floor(distance / (1000 * 60 * 60 * 24));
          const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          const seconds = Math.floor((distance % (1000 * 60)) / 1000);

          document.getElementById('cd-days').innerText = String(days).padStart(2, '0');
          document.getElementById('cd-hours').innerText = String(hours).padStart(2, '0');
          document.getElementById('cd-minutes').innerText = String(minutes).padStart(2, '0');
          document.getElementById('cd-seconds').innerText = String(seconds).padStart(2, '0');
        } else {
          document.getElementById('cd-days').innerText = '00';
          document.getElementById('cd-hours').innerText = '00';
          document.getElementById('cd-minutes').innerText = '00';
          document.getElementById('cd-seconds').innerText = '00';
        }
      }

      updateCountdown();
      setInterval(updateCountdown, 1000);
    }

    // 6. Xử lý Modal Quà Tặng & QR
    const btnOpenGift = document.getElementById('btn-open-gift');
    const btnCloseGift = document.getElementById('btn-close-gift');
    const giftModal = document.getElementById('gift-modal');
    const tabGroom = document.getElementById('tab-groom');
    const tabBride = document.getElementById('tab-bride');
    const contentGroom = document.getElementById('content-groom');
    const contentBride = document.getElementById('content-bride');

    if (btnOpenGift && giftModal) {
      btnOpenGift.addEventListener('click', () => giftModal.classList.remove('hidden'));
    }
    if (btnCloseGift && giftModal) {
      btnCloseGift.addEventListener('click', () => giftModal.classList.add('hidden'));
    }
    if (giftModal) {
      giftModal.addEventListener('click', (e) => {
        if (e.target === giftModal) giftModal.classList.add('hidden');
      });
    }

    if (tabGroom && tabBride) {
      tabGroom.addEventListener('click', function () {
        tabGroom.className = 'flex-1 py-1.5 rounded-md text-xs font-bold transition-all bg-[#981B1E] text-white shadow cursor-pointer';
        tabBride.className = 'flex-1 py-1.5 rounded-md text-xs font-bold transition-all text-gray-600 cursor-pointer';
        contentGroom.classList.remove('hidden');
        contentBride.classList.add('hidden');
      });

      tabBride.addEventListener('click', function () {
        tabBride.className = 'flex-1 py-1.5 rounded-md text-xs font-bold transition-all bg-[#E51D23] text-white shadow cursor-pointer';
        tabGroom.className = 'flex-1 py-1.5 rounded-md text-xs font-bold transition-all text-gray-600 cursor-pointer';
        contentBride.classList.remove('hidden');
        contentGroom.classList.add('hidden');
      });
    }

    // 7. Xử lý Form RSVP
    const rsvpForm = document.getElementById('rsvp-form');
    const rsvpSuccess = document.getElementById('rsvp-success');

    if (rsvpForm) {
      rsvpForm.addEventListener('submit', function (e) {
        e.preventDefault();
        rsvpSuccess.classList.remove('hidden');
        rsvpForm.reset();
      });
    }
  });
</script>

</body>
</html>
