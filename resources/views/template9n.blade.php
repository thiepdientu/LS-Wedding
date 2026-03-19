<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $weddingCard->groom_name }} ❤️ {{ $weddingCard->bride_name }} - Thiệp cưới online</title>
    <meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $weddingCard->groom_name }} ❤️ {{ $weddingCard->bride_name }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ $weddingCard->groom_name }} ❤️{{ $weddingCard->bride_name }}">
    <meta property="og:updated_time" content="2024-03-13T11:56:14+00:00">
    <meta property="og:image" content="{{ asset($weddingCard->banner_preview) }}">
    <meta property="og:image:secure_url" content="{{ asset($weddingCard->banner_preview) }}">
    <meta property="og:image:width" content="961">
    <meta property="og:image:height" content="1440">
    <meta property="og:image:alt" content="Thiệp 01">
    <meta property="og:image:type" content="image/jpeg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $weddingCard->groom_name }}❤️ {{ $weddingCard->bride_name }}">
    <meta name="twitter:image" content="{{ asset($weddingCard->banner_preview) }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400&family=Montserrat:wght@200;300;400;600&family=Great+Vibes&family=Alex+Brush&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --primary: #b4975a;
            --bg-site: #ffecce1a;
            --text-main: #3d3d3d;
            --text-muted: #71717a;
            --wedding-green: #1e3a2d; /* Màu xanh đậm cho countdown */
        }
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--bg-site);
            color: var(--text-main);
            scroll-behavior: smooth;
        }
        .font-serif { font-family: 'Cormorant Garamond', serif; }
        .font-signature { font-family: 'Alex Brush', cursive; }
        
        .hero-zoom {
            animation: slow-zoom 25s infinite alternate ease-in-out;
        }
        @keyframes slow-zoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }

        .reveal {
            opacity: 0;
            transform: translateY(25px);
            transition: all 1.2s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .hero-overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.2) 40%, transparent 100%);
        }

        .timeline-line {
            position: absolute;
            left: 50%;
            width: 1px;
            height: 100%;
            background: linear-gradient(to bottom, transparent, var(--primary), transparent);
            transform: translateX(-50%);
        }

        .btn-premium {
            background: var(--primary);
            color: white;
            transition: all 0.3s ease;
            letter-spacing: 0.15em;
        }
        .btn-premium:hover {
            background: #967d4a;
            transform: translateY(-2px);
        }

        .photo-frame {
            border: 1px solid rgba(180, 151, 90, 0.1);
            background: white;
        }

        .footer-overlay {
            background: rgba(0, 0, 0, 0.45);
        }

        .event-card {
            background: white;
            border-radius: 2rem;
            padding: 2rem;
            box-shadow: 0 10px 30px -10px rgba(0,0,0,0.05);
            max-width: 400px;
            margin: 0 auto;
        }
        .date-display {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            margin: 1.5rem 0;
        }
        .date-text-small {
            font-size: 0.875rem;
            color: var(--text-muted);
            padding: 0.5rem 0;
            border-top: 1px solid #3f3f46;
            border-bottom: 1px solid #3f3f46;
            min-width: 80px;
        }
        .date-main {
            font-size: 3rem;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 400;
            line-height: 1;
        }

        /* Lightbox Styles */
        #lightbox {
            background-color: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(5px);
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        #lightbox.active {
            display: flex;
            opacity: 1;
        }
        #lightbox img {
            max-width: 90%;
            max-height: 85%;
            object-fit: contain;
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }
        #lightbox.active img {
            transform: scale(1);
        }

        /* Countdown New Style */
        .countdown-floral {
            background-image: url('https://www.transparentpng.com/download/floral/wedding-floral-frame-free-download-2.png');
            background-position: right top;
            background-repeat: no-repeat;
            background-size: 300px;
        }
    </style>
</head>
<body class="overflow-x-hidden">

    <!-- Audio -->
    <audio id="bgMusic" loop src="{{ asset('template01/media/Shane-Filan-Beautiful-In-White-Official-Video.mp3') }}"></audio>

    <!-- Floating Music Toggle -->
    <button id="musicToggle" class="fixed bottom-10 right-10 z-[100] bg-white/95 p-4 rounded-full border border-primary/20 shadow-xl transition-all hover:scale-110 active:scale-95">
        <i data-lucide="music" id="musicIcon" class="w-5 h-5 text-primary"></i>
    </button>

    <!-- 1. HERO SECTION -->
     <section class="relative h-screen flex flex-col items-center justify-end text-center pb-24 px-4 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img 
                src="{{ asset($weddingCard->banner_top) }}" 
                alt=" {{ $weddingCard->groom_name }}
                ❤️
                {{ $weddingCard->bride_name }}" 
                class="w-full h-full object-cover hero-zoom"
            >
            <div class="absolute inset-0 hero-overlay"></div>
        </div>

        <div class="relative z-10 space-y-2 mb-4">
            <h1 class="text-4xl md:text-[8rem] text-white font-signature drop-shadow-2xl reveal active">
                {{ $weddingCard->bride_name }} <span style="font-size: 20px;">❤️</span> {{ $weddingCard->groom_name }}
            </h1>
          
            <div class="space-y-3 reveal active" style="transition-delay: 0.3s;">
                <span class="text-white/90 uppercase tracking-[0.4em] text-[10px] md:text-xs font-semibold drop-shadow-md">Save The Date</span>
                <p class="text-4xl md:text-5xl text-white font-serif drop-shadow-md">{{ \Carbon\Carbon::parse($weddingCard->wedding_date)->day }}.{{ \Carbon\Carbon::parse($weddingCard->wedding_date)->month }}.{{ \Carbon\Carbon::parse($weddingCard->wedding_date)->year }}</p>
            </div>
            <div class="pt-12 reveal active" style="transition-delay: 0.6s;">
                <i data-lucide="chevron-down" class="w-6 h-6 mx-auto text-white/50 animate-bounce"></i>
            </div>
        </div>
    </section>

    <!-- 2. INVITATION MESSAGE -->
    <section class="py-20 bg-white px-6 text-center">
        <div class="max-w-2xl mx-auto reveal">
            <img src="https://cdn-icons-png.flaticon.com/512/2904/2904973.png" class="w-12 h-12 mx-auto mb-10 opacity-30 grayscale" alt="decoration">
            <h2 class="text-4xl font-serif italic text-primary mb-8">Lời mời trân trọng</h2>
            <p class="text-gray-500 leading-loose font-light text-lg">
                "Bởi vì tình yêu là một món quà, và ngày cưới là khoảnh khắc chúng tôi muốn chia sẻ món quà đó cùng bạn. 
                Sự hiện diện của bạn không chỉ là niềm vinh dự, mà còn là mảnh ghép hoàn hảo cho niềm hạnh phúc của chúng tôi."
            </p>
            <div class="mt-12 flex justify-center items-center gap-4">
               <span class="text-xs uppercase tracking-widest text-primary font-semibold">{{ $weddingCard->bride_name }}</span>
                <i data-lucide="heart" class="w-4 h-4 text-primary/40 fill-primary/10"></i>
                <span class="text-xs uppercase tracking-widest text-primary font-semibold">{{ $weddingCard->groom_name }}</span>
            </div>
        </div>
    </section>

    <!-- NEW: 2.5 COUNTDOWN SECTION (Like image_d2d2f8.png) -->
    <section class="py-10 bg-white relative overflow-hidden countdown-floral">
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10 reveal">
            <h2 class="text-5xl md:text-7xl font-signature text-[#b4975a]/60 mb-12">Countdown</h2>
            <div class="flex items-center justify-center gap-4 md:gap-10 text-4xl md:text-8xl font-semibold text-[var(--wedding-green)]">
                <div class="flex flex-col items-center">
                    <span id="days">00</span>
                </div>
                <span class="opacity-30 mb-4 md:mb-8">:</span>
                <div class="flex flex-col items-center">
                    <span id="hours">00</span>
                </div>
                <span class="opacity-30 mb-4 md:mb-8">:</span>
                <div class="flex flex-col items-center">
                    <span id="minutes">00</span>
                </div>
                <span class="opacity-30 mb-4 md:mb-8">:</span>
                <div class="flex flex-col items-center">
                    <span id="seconds">00</span>
                </div>
            </div>
        </div>
    </section>

    @php
        $album = !empty($weddingCard->album) ? json_decode($weddingCard->album, true) : [];
        $stories = [];
        if ($weddingCard->love_story != ',') {
            $test = '1/2/2023:Hẹn Hò,1/3/2025:Tỏ tình,2/04/2025:Đính Hôn, 2/05/2025:Kết Hôn';
            $items = explode(',', $weddingCard->love_story);
            foreach ($items as $item) {
                [$date, $story] = explode(':', $item);
                $image = !empty($album) ? array_shift($album) : null; // Lấy ảnh đầu tiên và loại khỏi album
                $stories[] = ['date' => trim($date), 'story' => trim($story), 'image' => $image];
            }
        }

    @endphp

    @if (!empty($stories))

<!-- 3. LOVE STORY TIMELINE -->
    <section class="py-20 bg-[var(--bg-site)] px-6 relative overflow-hidden">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-24 reveal">
                <h2 class="text-5xl font-serif italic mb-4">Love Story</h2>
                <div class="w-16 h-px bg-primary mx-auto"></div>
            </div>

            <div class="relative space-y-24">
                <div class="timeline-line hidden md:block"></div>

                 @foreach ($stories as $story)
  <div class="flex flex-col md:flex-row items-center gap-12 reveal">
                    <div class="flex-1 hidden md:block"></div>
                    <div class="relative z-10 w-40 h-40 shrink-0 p-2 bg-white border border-primary/10 rounded-full overflow-hidden shadow-xl cursor-pointer gallery-item">
                        <img src="{{ asset($story['image']) }}" class="w-full h-full object-cover rounded-full">
                    </div>
                    <div class="flex-1 text-center md:text-left">
                        <span class="text-primary font-serif italic text-xl">{{ $story['date'] }}</span>
                        <h3 class="text-2xl font-semibold mt-2 mb-4">{{ $story['story'] }}</h3>
                        <!-- <p class="text-gray-500 text-sm leading-relaxed">Không cần quá ồn ào, chỉ cần một cái gật đầu và một lời hứa sẽ bên nhau mãi mãi.</p> -->
                    </div>
                </div>

                    @endforeach
              
              
    
            </div>
        </div>
    </section>

    @endif

    

    <!-- 4. GALLERY -->
    <section class="py-20 bg-white px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16 reveal">
                <span class="text-primary uppercase tracking-[0.4em] text-[10px] font-bold">Moments</span>
                <h2 class="text-5xl font-serif italic mt-4">Album</h2>
            </div>
            @php
            $album = !empty($weddingCard->album) ? json_decode($weddingCard->album, true) : [];
        @endphp
            <div class="grid grid-cols-2 gap-4 md:gap-6 reveal">
                 @if (!empty($album))
                    @foreach (json_decode($weddingCard->album, true) as $image)
                       
                        <div class="aspect-[3/4] overflow-hidden rounded-2xl shadow-sm cursor-pointer gallery-item photo-frame p-2 transition-transform duration-500 hover:-translate-y-1">
                    <img src="{{ asset($image) }}" class="w-full h-full object-cover rounded-xl">
                </div>
                    @endforeach
                @endif

                
            </div>
        </div>
    </section>

    <!-- 5. EVENTS -->
      <section class="py-20 bg-[var(--bg-site)] px-6">
        <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-12">
             <h2 class="text-3xl font-serif italic mt-4 text-center">{{ $weddingCard->message_invite }}</h2>
            <!-- Tiệc Nhà Gái -->
            <div class="reveal">
                <div class="event-card text-center">
                    <div class="w-64 h-64 mx-auto mb-8 rounded-full overflow-hidden border-4 border-white shadow-lg">
                        <img src="{{ asset($weddingCard->bride_avatar) }}" class="w-full h-full object-cover" alt="Cô dâu">
                    </div>
                    <h3 class="text-3xl font-serif text-gray-700 mb-6">{{ $weddingCard->bride_eating_title }}</h3>
                    <div class="space-y-1 text-sm text-gray-500 mb-6 font-light">
                        <p>{{ $weddingCard->address_bride }}</p>
                        
                    </div>
                    <p class="text-sm font-bold text-gray-700 uppercase tracking-widest">Vào lúc {{ $weddingCard->time_bride }}</p>
                    
                    <div class="date-display">
                        <div class="date-text-small font-light"> @php
                                            \Carbon\Carbon::setLocale('vi'); // Đặt ngôn ngữ tiếng Việt
                                            $date = \Carbon\Carbon::parse($weddingCard->bride_eating_date);
                                            $weekdayBride = ucwords($date->translatedFormat('l')); // Viết hoa chữ cái đầu của mỗi từ // Viết hoa chữ cái đầu // Lấy thứ tiếng Việt
                                        @endphp
                                        {{ $weekdayBride }} </div>
                        <div class="date-main">{{ \Carbon\Carbon::parse($weddingCard->bride_eating_date)->day }}/{{ \Carbon\Carbon::parse($weddingCard->bride_eating_date)->month }}</div>
                        <div class="date-text-small font-light">{{ \Carbon\Carbon::parse($weddingCard->bride_eating_date)->year }}</div>
                    </div>
                    
                    <p class="text-xs italic text-gray-400 mb-10">{{ $weddingCard->time_bride_al }}</p>
                    
                   <div style="display:flex; gap:8px; justify-content:center;">
                    <a href="tel:{{ $weddingCard->bride_phone }}" class="uk-icon-button uk-margin-small-right" target="_blank" uk-icon="receiver"> <i data-lucide="phone" class="w-5 h-5"></i></a>
   <a href="{{ $weddingCard->bride_map }}" class="uk-icon-button  uk-margin-small-right" target="_blank" uk-icon="location">  <i data-lucide="map" class="w-5 h-5"></i></a>
   
</div>

                </div>
            </div>

            <!-- Tiệc Nhà Trai -->
            <div class="reveal">
                <div class="event-card text-center">
                    <div class="w-64 h-64 mx-auto mb-8 rounded-full overflow-hidden border-4 border-white shadow-lg">
                        <img src="{{ asset($weddingCard->groom_avatar) }}" class="w-full h-full object-cover" alt="Chú rể">
                    </div>
                    <h3 class="text-3xl font-serif text-gray-700 mb-6">{{ $weddingCard->message_invite }}</h3>
                    <div class="space-y-1 text-sm text-gray-500 mb-6 font-light">
                        <p>{{ $weddingCard->address_groom }}</p>
                       
                    </div>
                    <p class="text-sm font-bold text-gray-700 uppercase tracking-widest">Vào lúc {{ $weddingCard->time_groom }}</p>
                    
                    <div class="date-display">
                        <div class="date-text-small font-light"> @php
                                            \Carbon\Carbon::setLocale('vi'); // Đặt ngôn ngữ tiếng Việt
                                            $date = \Carbon\Carbon::parse($weddingCard->groom_eating_date);
                                            $weekdayGroom = ucwords($date->translatedFormat('l')); // Viết hoa chữ cái đầu của mỗi từ // Viết hoa chữ cái đầu // Lấy thứ tiếng Việt
                                        @endphp
                                        {{ $weekdayGroom }}</div>
                        <div class="date-main">{{ \Carbon\Carbon::parse($weddingCard->groom_eating_date)->day }}/{{ \Carbon\Carbon::parse($weddingCard->groom_eating_date)->month }}</div>
                        <div class="date-text-small font-light">{{ \Carbon\Carbon::parse($weddingCard->groom_eating_date)->year }}</div>
                    </div>
                    
                    <p class="text-xs italic text-gray-400 mb-10">{{ $weddingCard->time_groom_al }}</p>
                    
                  <div style="display:flex; gap:8px; justify-content:center;">
                    <a href="tel:{{ $weddingCard->groom_phone }}" class="uk-icon-button uk-margin-small-right" target="_blank" uk-icon="receiver"> <i data-lucide="phone" class="w-5 h-5"></i></a>
   <a href="{{ $weddingCard->groom_map }}" class="uk-icon-button  uk-margin-small-right" target="_blank" uk-icon="location">  <i data-lucide="map" class="w-5 h-5"></i></a>
   
</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. GIFT & RSVP -->
    <section class="py-20 bg-white text-center px-6">
        <div class="max-w-2xl mx-auto reveal">
            <h2 class="text-4xl font-serif italic text-primary mb-6">{{ $weddingCard->message_gift }}</h2>
            <p class="text-gray-400 mb-16 text-sm leading-relaxed font-light px-8">
                Tình yêu và sự hiện diện của bạn là món quà quý giá nhất đối với chúng tôi. 
            </p>
            <div class="grid grid-cols-2 gap-8 mb-24">
                <div class="p-8 bg-[var(--bg-site)] rounded-3xl border border-primary/10 transition-all">
                    <img src="{{ asset($weddingCard->groom_qr) }}" class="w-32 h-32 mx-auto mb-6 rounded-xl shadow-md">
                    <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Mừng cưới</p>
                    <p class="font-bold text-primary">{{ $weddingCard->groom_name }}</p>
                </div>
                <div class="p-8 bg-[var(--bg-site)] rounded-3xl border border-primary/10 transition-all">
                    <img src="{{ asset($weddingCard->bride_qr) }}" class="w-32 h-32 mx-auto mb-6 rounded-xl shadow-md">
                    <p class="text-[10px] text-gray-400 uppercase tracking-widest mb-1">Mừng cưới</p>
                    <p class="font-bold text-primary">{{ $weddingCard->bride_name }}</p>
                </div>
            </div>
            <button style="display: none;" id="rsvpBtn" class="px-[4rem] py-5 btn-premium rounded-full text-xs font-bold uppercase shadow-2xl shadow-primary/30">
                Xác nhận tham dự
            </button>
        </div>
    </section>

    <!-- 7. THANK YOU SECTION -->
    <section class="relative h-screen flex flex-col items-center justify-center text-center px-4 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img 
                src="{{ asset($weddingCard->banner_thanks) }}" 
                alt="Thank You Background" 
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 footer-overlay"></div>
        </div>
        <div class="relative z-10 space-y-6 reveal">
            <h2 class="text-6xl md:text-[7rem] text-white font-signature drop-shadow-xl">
                Thank you!
            </h2>
            <p class="text-white text-lg md:text-2xl drop-shadow-md tracking-wide px-4">
                 {{ $weddingCard->message_thanks }}
            </p>
        </div>
    </section>

    <!-- RSVP Modal -->
    <div id="rsvpModal" class="fixed inset-0 z-[200] hidden flex items-center justify-center p-4 bg-black/70 backdrop-blur-md">
        <div class="bg-white w-full max-w-md p-10 rounded-[2.5rem] relative scale-90 opacity-0 transition-all duration-300" id="modalContent">
            <button id="closeModal" class="absolute top-6 right-6 text-gray-300 hover:text-primary">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
            <h3 class="text-3xl italic text-primary text-center mb-8">Bạn sẽ đến chứ?</h3>
            <form class="space-y-5">
                <input type="text" placeholder="Họ và Tên" class="w-full p-4 bg-[var(--bg-site)] border-none rounded-2xl outline-none text-sm">
                <select class="w-full p-4 bg-[var(--bg-site)] border-none rounded-2xl outline-none text-sm appearance-none">
                    <option>Bạn của Chú rể</option>
                    <option>Bạn của Cô dâu</option>
                </select>
                <div class="flex items-center gap-4 bg-[var(--bg-site)] p-4 rounded-2xl">
                    <span class="text-sm text-gray-500 flex-1">Số người tham dự</span>
                    <input type="number" value="1" min="1" class="w-16 bg-transparent text-center font-bold text-primary outline-none">
                </div>
                <button type="submit" class="w-full py-5 btn-premium rounded-2xl font-bold uppercase text-xs shadow-lg">Gửi xác nhận</button>
            </form>
        </div>
    </div>

    <!-- Lightbox Overlay -->
    <div id="lightbox" class="fixed inset-0 z-[300] hidden items-center justify-center p-4 flex-col">
        <button id="closeLightbox" class="absolute top-8 right-8 text-white/70 hover:text-white transition-colors z-[310]">
            <i data-lucide="x" class="w-10 h-10"></i>
        </button>
        <img id="lightboxImg" src="" alt="Full size image">
    </div>

    <script>
        lucide.createIcons();

        const bgMusic = document.getElementById('bgMusic');
        const musicToggle = document.getElementById('musicToggle');
        const musicIcon = document.getElementById('musicIcon');
        let isPlaying = false;

        musicToggle.addEventListener('click', () => {
            if (isPlaying) {
                bgMusic.pause();
                musicIcon.setAttribute('data-lucide', 'music');
            } else {
                bgMusic.play().catch(e => {});
                musicIcon.setAttribute('data-lucide', 'pause');
            }
            isPlaying = !isPlaying;
            lucide.createIcons();
        });

        const reveals = document.querySelectorAll('.reveal');
        const checkReveal = () => {
            reveals.forEach(el => {
                const elementTop = el.getBoundingClientRect().top;
                if (elementTop < window.innerHeight - 100) {
                    el.classList.add('active');
                }
            });
        };
        window.addEventListener('scroll', checkReveal);
        checkReveal();

        const modal = document.getElementById('rsvpModal');
        const modalContent = document.getElementById('modalContent');
        const openBtn = document.getElementById('rsvpBtn');
        const closeBtn = document.getElementById('closeModal');

        openBtn.onclick = () => {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modalContent.classList.remove('scale-90', 'opacity-0');
            }, 10);
        };

        const closeModal = () => {
            modalContent.classList.add('scale-90', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        };

        closeBtn.onclick = closeModal;
        window.onclick = (e) => { if(e.target === modal) closeModal(); };

        // Lightbox Logic
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightboxImg');
        const closeLightbox = document.getElementById('closeLightbox');
        const galleryItems = document.querySelectorAll('.gallery-item img');

        galleryItems.forEach(img => {
            img.parentElement.addEventListener('click', () => {
                lightboxImg.src = img.src;
                lightbox.classList.remove('hidden');
                setTimeout(() => lightbox.classList.add('active'), 10);
                document.body.style.overflow = 'hidden';
            });
        });

        const closeLightboxFn = () => {
            lightbox.classList.remove('active');
            setTimeout(() => {
                lightbox.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        };

        closeLightbox.onclick = closeLightboxFn;
        lightbox.onclick = (e) => { if(e.target === lightbox) closeLightboxFn(); };

        // 2. Countdown Logic (Updated Date: Jan 31, 2026)
        const weddingDate = new Date('May 31, 2026 10:00:00').getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const gap = weddingDate - now;

            const second = 1000;
            const minute = second * 60;
            const hour = minute * 60;
            const day = hour * 24;

            const d = Math.floor(gap / day);
            const h = Math.floor((gap % day) / hour);
            const m = Math.floor((gap % hour) / minute);
            const s = Math.floor((gap % minute) / second);

            document.getElementById('days').innerText = d > 0 ? d.toString().padStart(2, '0') : "00";
            document.getElementById('hours').innerText = h > 0 ? h.toString().padStart(2, '0') : "00";
            document.getElementById('minutes').innerText = m > 0 ? m.toString().padStart(2, '0') : "00";
            document.getElementById('seconds').innerText = s > 0 ? s.toString().padStart(2, '0') : "00";
        }

        setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>
</body>
</html>