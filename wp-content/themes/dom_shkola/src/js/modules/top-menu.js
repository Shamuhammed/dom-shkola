export function topMenu() {
   console.log('custum topMenu ready!')

   $(document).ready(function () {

      const $menuIcon = $('.menu-icon');
      const $headerCollapse = $('.top-menu-collapse');
      const $header = $('#header');
      const $body = $('body');
      // const $envelope = $('.envelope');
      

      /* header-menu */
      $menuIcon.on('click', function (e) {
         const bodyWidthBefore = $body.width();

         $(this).toggleClass('_close');
         $body.toggleClass('_overflow');
         if ($(e.target).closest('.footer').length > 0) {
            $('.footer-nav').toggleClass('_show');
         } else {
            $headerCollapse.toggleClass('_show');
         }

         // добавление оступа при открытии меню
         const bodyWidthAfter = $body.width() - bodyWidthBefore;
         $body.css('padding-right', (bodyWidthAfter + 'px'));
         // $envelope.css('padding-right', (bodyWidthAfter + 'px'));
         if ($header.hasClass('_fixed')) $header.css('padding-right', (bodyWidthAfter + 'px'));
         if (!$body.hasClass('_overflow')) {
            $body.css('padding-right', '0');
            $header.css('padding-right', '0');
            // $envelope.css('padding-right', '0');
         }
      })

      /* header fixed on scroll */
      let prevScroll = 0;
      $(window).scroll(function () {
         const scrolled = $(window).scrollTop();
         if (scrolled > 100 && scrolled > prevScroll) {
            $header.addClass('_fixed');
         } else {
            $header.removeClass('_fixed');
         }
         prevScroll = scrolled;
      });

      /* Анимация скрола */
      const $headerNavLinks = $('.top-menu-collapse nav li a, .footer-nav nav li a');
   
      $headerNavLinks.on('click', function(event) {
         const targetId = $(this).attr('href');
         if (!targetId.startsWith('#')) return; // Отменяем выполнение функции
         
         event.preventDefault();
         const $targetSection = $(targetId);
      
         if ($targetSection.length) {
            $('html, body').animate({
               // scrollTop: $targetSection.offset().top - (headerHeight + 30)
               scrollTop: $targetSection.offset().top
            }, 800); // 800 миллисекунд для плавного скролла
         }
      });
      
      $headerNavLinks.on('click', function () {
         $menuIcon.removeClass('_close');
         $headerCollapse.removeClass('_show');
         $body.removeClass('_hidden');
      })
   });
}