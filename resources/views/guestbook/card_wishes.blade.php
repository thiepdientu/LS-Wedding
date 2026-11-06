<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sổ Lưu Bút & Xác Nhận Tham Dự | {{ $card->couple_name }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            serif: ['"Cormorant Garamond"', 'Georgia', 'serif'],
            sans: ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
          },
          colors: {
            wine: {
              50: '#fdf2f2',
              100: '#fde6e6',
              600: '#9b1c28',
              700: '#80141f',
              800: '#6b141a',
              900: '#4a0b10',
            },
            gold: {
              300: '#f6d89b',
              400: '#e5be6b',
              500: '#caa04d',
            }
          }
        }
      }
    }
  </script>
  <style>
    body {
      background-color: #faf7f5;
      color: #2b2b2b;
      font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
    }
    .hero-pattern {
      background-color: #580d13;
      background-image: radial-gradient(rgba(246, 216, 155, 0.12) 1px, transparent 0);
      background-size: 20px 20px;
    }
  </style>
</head>
<body class="min-h-screen flex flex-col antialiased">

  <!-- TOP HEADER / HERO -->
  <header class="hero-pattern text-white pt-8 pb-10 px-4 shadow-lg relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-transparent to-black/60 pointer-events-none"></div>

    <div class="max-w-3xl mx-auto relative z-10 text-center">
      <!-- Back to wedding invite link -->
      <div class="inline-flex items-center gap-2 mb-4">
        <a href="{{ route('wedding.invite', $card->identifyWedding) }}" 
           class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-white/15 hover:bg-white/25 text-white/90 text-xs font-medium backdrop-blur-sm transition-all border border-white/20">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
          </svg>
          <span>Xem Thiệp Cưới</span>
        </a>
        <button type="button" 
                onclick="copyPageUrl()" 
                id="copyBtn"
                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-white/15 hover:bg-white/25 text-white/90 text-xs font-medium backdrop-blur-sm transition-all border border-white/20 cursor-pointer">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
          </svg>
          <span id="copyBtnText">Sao chép Link</span>
        </button>
      </div>

      <p class="font-serif italic text-gold-300 text-lg md:text-xl tracking-wider mb-1">Sổ Lưu Bút &amp; Xác Nhận Tham Dự</p>
      <h1 class="font-serif text-3xl md:text-5xl font-bold tracking-tight text-white mb-3">
        {{ $card->couple_name }}
      </h1>

      @if($card->wedding_date)
        <p class="text-xs md:text-sm text-white/80 flex items-center justify-center gap-2">
          <svg class="w-4 h-4 text-gold-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
          </svg>
          <span>{{ $card->formatted_wedding_datetime }}</span>
        </p>
      @endif

      @if($card->wedding_address)
        <p class="text-xs text-white/70 max-w-md mx-auto mt-1 line-clamp-1">
          📍 {{ $card->wedding_address }}
        </p>
      @endif
    </div>
  </header>

  <!-- MAIN CONTENT CONTAINER -->
  <main class="max-w-3xl mx-auto px-4 -mt-5 flex-1 w-full pb-16 relative z-20">

    <!-- KPI STATS CARDS -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6">
      <!-- Total Wishes -->
      <div class="bg-white rounded-2xl p-4 shadow-sm border border-stone-200/80 flex flex-col justify-between">
        <span class="text-[11px] font-semibold text-stone-500 uppercase tracking-wider">Lời chúc</span>
        <div class="mt-2 flex items-baseline justify-between">
          <span class="text-2xl font-bold text-wine-800">{{ $stats['total'] }}</span>
          <span class="text-lg">💬</span>
        </div>
      </div>

      <!-- Attending Guests -->
      <div class="bg-white rounded-2xl p-4 shadow-sm border border-emerald-200/80 bg-emerald-50/20 flex flex-col justify-between">
        <span class="text-[11px] font-semibold text-emerald-800 uppercase tracking-wider">Sẽ tham dự</span>
        <div class="mt-2 flex items-baseline justify-between">
          <div>
            <span class="text-2xl font-bold text-emerald-700">{{ $stats['attending_count'] }}</span>
            <span class="text-xs text-emerald-600 block">({{ $stats['attending_guests'] }} người)</span>
          </div>
          <span class="text-lg">🍷</span>
        </div>
      </div>

      <!-- Declined -->
      <div class="bg-white rounded-2xl p-4 shadow-sm border border-rose-200/80 bg-rose-50/20 flex flex-col justify-between">
        <span class="text-[11px] font-semibold text-rose-800 uppercase tracking-wider">Không đến</span>
        <div class="mt-2 flex items-baseline justify-between">
          <div>
            <span class="text-2xl font-bold text-rose-700">{{ $stats['declined_count'] }}</span>
            <span class="text-xs text-rose-500 block">khách</span>
          </div>
          <span class="text-lg">💌</span>
        </div>
      </div>

      <!-- Unsure -->
      <div class="bg-white rounded-2xl p-4 shadow-sm border border-stone-200/80 flex flex-col justify-between">
        <span class="text-[11px] font-semibold text-stone-500 uppercase tracking-wider">Chưa rõ</span>
        <div class="mt-2 flex items-baseline justify-between">
          <div>
            <span class="text-2xl font-bold text-stone-700">{{ $stats['unsure_count'] }}</span>
            <span class="text-xs text-stone-400 block">khách</span>
          </div>
          <span class="text-lg">⏳</span>
        </div>
      </div>
    </div>

    <!-- FILTER BAR & EXPORT BUTTON -->
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-stone-200/80 mb-6">
      <form method="GET" action="{{ route('wedding.card-guestbook', $card->identifyWedding) }}" id="filterForm">
        <!-- Search Input -->
        <div class="relative mb-3">
          <input type="text" 
                 name="search" 
                 value="{{ request('search') }}" 
                 placeholder="Tìm theo tên khách hoặc nội dung lời chúc..." 
                 class="w-full pl-10 pr-10 py-2.5 text-sm bg-stone-50 border border-stone-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-wine-600/30 focus:border-wine-700 text-stone-800 transition-all">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-stone-400">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
          </div>
          @if(request('search'))
            <a href="{{ route('wedding.card-guestbook', ['key' => $card->identifyWedding, 'attendance' => request('attendance')]) }}" 
               class="absolute inset-y-0 right-0 pr-3 flex items-center text-stone-400 hover:text-stone-600">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </a>
          @endif
        </div>

        <!-- Filter Pills & Export Button -->
        <div class="flex flex-wrap items-center justify-between gap-2 pt-1 border-t border-stone-100">
          <div class="flex flex-wrap items-center gap-1.5">
            @php
              $currentAtt = request('attendance', 'all');
            @endphp
            <a href="{{ route('wedding.card-guestbook', ['key' => $card->identifyWedding, 'attendance' => 'all', 'search' => request('search')]) }}" 
               class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all {{ $currentAtt === 'all' ? 'bg-wine-800 text-white shadow-xs' : 'bg-stone-100 text-stone-600 hover:bg-stone-200' }}">
              Tất cả ({{ $stats['total'] }})
            </a>
            <a href="{{ route('wedding.card-guestbook', ['key' => $card->identifyWedding, 'attendance' => 'attending', 'search' => request('search')]) }}" 
               class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all {{ $currentAtt === 'attending' ? 'bg-emerald-700 text-white shadow-xs' : 'bg-stone-100 text-stone-600 hover:bg-stone-200' }}">
              Tham dự ({{ $stats['attending_count'] }})
            </a>
            <a href="{{ route('wedding.card-guestbook', ['key' => $card->identifyWedding, 'attendance' => 'not_attending', 'search' => request('search')]) }}" 
               class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all {{ $currentAtt === 'not_attending' ? 'bg-rose-700 text-white shadow-xs' : 'bg-stone-100 text-stone-600 hover:bg-stone-200' }}">
              Báo vắng ({{ $stats['declined_count'] }})
            </a>
            <a href="{{ route('wedding.card-guestbook', ['key' => $card->identifyWedding, 'attendance' => 'unsure', 'search' => request('search')]) }}" 
               class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all {{ $currentAtt === 'unsure' ? 'bg-stone-700 text-white shadow-xs' : 'bg-stone-100 text-stone-600 hover:bg-stone-200' }}">
              Chưa rõ ({{ $stats['unsure_count'] }})
            </a>
          </div>

          <!-- Export CSV -->
          <a href="{{ route('wedding.card-guestbook.export', ['key' => $card->identifyWedding, 'attendance' => request('attendance'), 'search' => request('search')]) }}" 
             class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold transition-colors shadow-xs ml-auto">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span>Tải Excel (CSV)</span>
          </a>
        </div>
      </form>
    </div>

    <!-- WISHES LIST -->
    <div class="space-y-3">
      @forelse($wishes as $wish)
        <article class="bg-white rounded-2xl p-4 shadow-sm border border-stone-200/80 transition-all hover:shadow-md">
          <div class="flex items-start justify-between gap-3 mb-2">
            <div class="flex items-center gap-2.5">
              <!-- Avatar circle with initials -->
              <div class="w-9 h-9 rounded-full bg-gradient-to-br from-wine-700 to-wine-900 text-white font-bold text-sm flex items-center justify-center shrink-0 shadow-xs">
                {{ mb_substr(trim($wish->sender_name), 0, 1) }}
              </div>
              <div>
                <h3 class="font-bold text-stone-900 text-sm md:text-base leading-tight">
                  {{ $wish->sender_name }}
                </h3>
                <span class="text-[11px] text-stone-400">
                  {{ $wish->created_at ? $wish->created_at->diffForHumans() : $wish->formatted_created_at }}
                </span>
              </div>
            </div>

            <!-- Attendance Badge -->
            <div>
              @if($wish->attendance_status === 'attending')
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                  <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                  <span>Sẽ tham dự ({{ $wish->guest_count ?: 1 }})</span>
                </span>
              @elseif($wish->attendance_status === 'not_attending')
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-700 border border-rose-200">
                  <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                  <span>Không thể đến</span>
                </span>
              @else
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-stone-100 text-stone-600 border border-stone-200">
                  <span class="w-1.5 h-1.5 rounded-full bg-stone-400"></span>
                  <span>Chưa rõ RSVP</span>
                </span>
              @endif
            </div>
          </div>

          <!-- Message Body -->
          <div class="pl-11 pr-1">
            <p class="text-stone-700 text-sm leading-relaxed whitespace-pre-wrap">
              {{ $wish->message }}
            </p>
          </div>
        </article>
      @empty
        <div class="bg-white rounded-2xl p-10 text-center border border-stone-200/80 shadow-sm">
          <div class="w-12 h-12 mx-auto mb-3 rounded-full bg-stone-100 flex items-center justify-center text-xl text-stone-400">
            💌
          </div>
          <h4 class="font-bold text-stone-800 text-base mb-1">Chưa có phản hồi nào</h4>
          <p class="text-xs text-stone-500 max-w-sm mx-auto">
            @if(request('search') || request('attendance') !== 'all')
              Không tìm thấy lời chúc nào phù hợp với bộ lọc hiện tại. Thử xóa tìm kiếm nhé!
            @else
              Khách mời chưa gửi lời chúc hoặc xác nhận tham dự cho thiệp này.
            @endif
          </p>
          @if(request('search') || (request('attendance') && request('attendance') !== 'all'))
            <a href="{{ route('wedding.card-guestbook', $card->identifyWedding) }}" 
               class="inline-block mt-3 px-4 py-1.5 bg-stone-100 hover:bg-stone-200 text-stone-700 text-xs font-semibold rounded-lg transition-colors">
              Xóa bộ lọc
            </a>
          @endif
        </div>
      @endforelse
    </div>

    <!-- PAGINATION -->
    @if($wishes->hasPages())
      <div class="mt-6 flex justify-center">
        {{ $wishes->links() }}
      </div>
    @endif

  </main>

  <!-- FOOTER -->
  <footer class="mt-auto py-6 border-t border-stone-200/60 bg-stone-100/50 text-center text-xs text-stone-400">
    <p>Hệ thống thiệp cưới thông minh <span class="font-semibold text-wine-800">LS-Wedding</span></p>
  </footer>

  <script>
    function copyPageUrl() {
      const url = window.location.href;
      const btnText = document.getElementById('copyBtnText');
      
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(url).then(() => {
          btnText.textContent = 'Đã sao chép!';
          setTimeout(() => { btnText.textContent = 'Sao chép Link'; }, 2000);
        });
      } else {
        prompt('Sao chép đường dẫn:', url);
      }
    }
  </script>
</body>
</html>
