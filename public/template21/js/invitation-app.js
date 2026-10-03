
jQuery(document).ready(function ($) {
    gsap.registerPlugin(ScrollToPlugin)
    var audio = $('#audio')[0]
   const weddingEl = document.querySelector('#wedding')
    if (weddingEl) {
        gsap.set(weddingEl, { display: 'none' })
    }
    // open-thiep 
    const openThiepBtn = document.querySelector('.open-thiep')
    if(openThiepBtn) {
    openThiepBtn.addEventListener('click', e => {
        e.preventDefault();
        gsap.to(window, {
            duration: 1.5,             
            scrollTo: "#wedding",       
            ease: "power2.inOut"  ,
        });
        autoScroll()
        jQuery('#wedding').show()
        AOS.refresh();
        toggleMusic()
    });
    }
    //end open thiệp cưới
    
    // ==== end gsap ======
    //toggle music
    $('.btn-music').on('click' , toggleMusic)
    function toggleMusic(){
      if(!audio && $(audio).empty()){
        return;
      }
      const isPause = audio.paused;
      const play = isPause ? audio.play()  : audio.pause()
      const icon = isPause ? $('.btn-music svg').addClass('animate-spin') : $('.btn-music svg').removeClass('animate-spin')
    }
    //AJAX HANDLE
    $(document).on('click', '.ajax_send_wish', function(e){
      e.preventDefault()
      const $button = $(this)
      const $currentButton = $button.html()
      const $message = ('.message')
      const $form_id = $button.data('form')
      const $url = $button.data('url')
      const $nonce_name = $button.data('nonce-name')
      const $post = $button.data('post')
      const $action = $button.data('action')
      const form = $($form_id)
      const $formData = new FormData(form[0])
      $formData.append('action' , $action)
      //console.log([...$formData.entries()]);
      if(!pro_validate(form)){
            return;
      };
      $.ajax({
        url: $url,
        type: 'POST',
        processData: false, 
        contentType: false, 
        data: $formData,
        beforeSend: function(){
          $button.prop('disabled' , true).html('<i class="ri-loader-line animate-spin mr-2"></i> Đang gửi....')
        },
        success : function(res){
          if(res.success){

            $($message).fadeIn(400)
            form[0].reset()
            $('.wish-list').fadeIn().prepend(`
              <div class="wish-item" data-aos="fade-up">
                <div class="inline-flex gap-2">
                  <h4 class="font-semibold text-white">
                    ${res.data.name}
                  </h4>
                </div>

                <div class="wish-message italic">
                  ${res.data.message}
                </div>
              </div>
              `)
            setTimeout(() => {
              $($message).fadeOut(400)
            }, 2000);
            $button.html($currentButton)
          }
          
        },
        error: function(xhr, status, error) {
            var errorMessage = 'Có lỗi xảy ra!';
            
            if(xhr.responseJSON && xhr.responseJSON.data && xhr.responseJSON.data.message) {
                errorMessage = xhr.responseJSON.data.message;
            }
            $($message).html('<div class="text-red-400!"> ' + errorMessage + ' </div>').fadeIn(400)
           
        },
      })

    })

    //helper
    function pro_validate(form ,  rule = {}){
        let $inputs = $(form).find("[validate]");
        if ($inputs.length === 0) return true;
        let isValid = true;
        $inputs.each(function () {
        let $input = $(this);
        let rule = $input.attr("validate"); // text, email, phone...
        let val = $input.val().trim();
        let error = "";

        if (val === "") {
            error = "Vui lòng không được để trống !";
        } 
        else if (rule === "name") {
            if (val.length < 4) error = "Tên quá ngắn vui lòng nhập đầy đủ họ tên";
        } 
        else if (rule === "email") {
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) error = "Email không hợp lệ";
        } 
        else if (rule === "phone") {
            if (!/^[0-9]{9,11}$/.test(val)) error = "Số điện thoại không hợp lệ";
        } 
        else if (rule === "password") {
            if (val.length < 6) error = "Mật khẩu phải >= 6 ký tự";
        }
        let error_class ='border-red-600!';
        if (error) {
            isValid = false; // ❌ đánh dấu form không hợp lệ
            let $errorEl = $input.next(".error-message");
            $($input).addClass(error_class)
            if (!$errorEl.length) {
                $errorEl = $("<span class='error-message' style='color:red;font-size:12px'></span>");
                $input.after($errorEl);
            }
            $errorEl.text(error).show();
        } else {
            $input.next(".error-message").text("").hide();
            $($input).removeClass(error_class)
        }
        
        });
        return isValid;
    }

    function autoScroll(speed = 150, direction = 1, delay = 3000) {
    let rafId = null;
    let running = true;
    let timerId = null;

    // Dừng
    function stop() {
      running = false;
      cancelAnimationFrame(rafId);
      clearTimeout(timerId);
      $(document).off('.autoScroll');
    }

    // Lắng nghe hành động của user
    $(document).on(
      'wheel.autoScroll keydown.autoScroll mousedown.autoScroll touchstart.autoScroll',
      stop
    );

    // Hàm bắt đầu cuộn sau delay
    function startScroll() {
      if (!running) return;

      (function loop() {
        if (!running) return;
        window.scrollBy(0, direction);
        setTimeout(loop, 1000 / speed);
      })();
    }

    // Đợi 3s rồi mới chạy
    timerId = setTimeout(startScroll, delay);

    return stop;
  }
  // Thêm vào file invitation-app.js
  $('[animation]').each(function () {
    $('.main-content').hide()
    const el = $(this);
    const attr = el.attr('animation');
    if (!attr) return;

    const parts = attr.split(':');
    const type  = parts[0].trim();
    const delay = parseInt(parts[1]) || 2000;

    setTimeout(() => {
      el.addClass(type);
      setTimeout(() => {
        el.remove(); 
      }, 6000);
      $('.main-content').show()
    }, delay);

    setTimeout(() => {
      AOS.refresh();
    }, delay + 500);
  });

  //BIRTHDAY
  //open
  const openBtn = document.querySelector('.open_birthday')
  const openDiv = document.querySelector('#open')
  const contentB = document.querySelector('#birthday-content')
  const media = $(openDiv).find('img.media')
  const evenlope = $(openDiv).find('img.evenlope ')
  const load_text = $('.load-text')
  if (openDiv) {
    gsap.set(contentB, { display: 'none' })
  }
  
  if(openBtn) {
    openBtn.addEventListener('click', e => {
        e.preventDefault();
        $(openBtn).removeClass('overflow-hidden')
        $(load_text).fadeOut()
        $(media).addClass('uk-animation-slide-top uk-animation-reverse')
        $(evenlope).addClass('uk-animation-slide-bottom uk-animation-reverse')
        toggleMusic()
        setTimeout(() => {
          $(openDiv).hide()
          $(contentB).show()
          AOS.refresh();
          autoScroll()
        }, 1000);
        
        
    });
    }

  // day js
  const ACF_DATE = $('#calendar').data('date');
  const background_hl = $('#calendar').data('background');
  const text_color = $('#calendar').data('color');
  const highlighted = dayjs(ACF_DATE.replace(' ', 'T'));
  const month = highlighted.startOf('month');
 
  const grid = document.getElementById('calendar_pick');
 
  ['CN','T2','T3','T4','T5','T6','T7'].forEach(d => {
    const el = document.createElement('div');
    el.className = 'dn text-center';
    el.textContent = d;
    grid.appendChild(el);
  });
 
  for (let i = 0; i < month.day(); i++) {
    const el = document.createElement('div');
    el.className = 'day empty';
    grid.appendChild(el);
  }
 
  for (let d = 1; d <= month.daysInMonth(); d++) {
    const el = document.createElement('div');
    el.className = 'day text-center size-10';
    el.textContent = d;
    if (d === highlighted.date()) {
    el.innerHTML =  `
    <div class="relative animation-ballon flex flex-col justify-center -translate-y-2 items-center z-1  aspect-1/1 bg-contain bg-center bg-no-repeat bg-transparent!" data-aos="fade-in"
    style="background-image: url(${background_hl})"
    >
      <span class="relative ${text_color} text-center text-xl font-bold"> ${d} </span>
    </div>
    `;
    }
    grid.appendChild(el);
  }

  //Thêm vào lịch
  $('.add_calendar').off('click').on('click', function() {
    addToCalendar({
        title: $(this).data('title'),
        start: $(this).data('start'),
        end: '',
        location: $(this).data('location'),
        description: $(this).data('description'),
    });
  });
  function addToCalendar({ title, start, end, location = '', description = '' }) {
    if (!end) {
      const d = new Date(start.replace(' ', 'T'));
      d.setHours(d.getHours() + 2);
      const pad = n => String(n).padStart(2, '0');
      end = `${d.getFullYear()}-${pad(d.getMonth()+1)}-${pad(d.getDate())} ${pad(d.getHours())}:${pad(d.getMinutes())}:00`;
    }
    function fmt(dt) {
      return dt.replace(/[-: ]/g, '').slice(0, 15).replace(/^(\d{8})/, '$1T');
    }
    const params = new URLSearchParams({
      action: 'TEMPLATE',
      text: title,
      dates: fmt(start) + '/' + fmt(end),
      location,
      details: description,
    });

    const url = 'https://calendar.google.com/calendar/render?' + params.toString();

      const ua = navigator.userAgent || '';
      const isAndroid = /android/i.test(ua);
      const isIOS = /iPad|iPhone|iPod/.test(ua) ||
        (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);

      if (isAndroid) {
        // Android: thử mở app native trước, fallback về web
        const intentUrl = `intent://calendar.google.com/calendar/render?${params.toString()}#Intent;scheme=https;package=com.google.android.calendar;end`;
        const a = document.createElement('a');
        a.href = intentUrl;
        a.click();
      } else {
        // iOS + desktop: mở Google Calendar web
        window.open(url, '_blank');
      }
  }

  // fix iframe
  $('iframe').addClass('w-full').attr('uk-responsive' , '')
}); 





