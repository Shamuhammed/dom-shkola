export function sliders() {
   $(document).ready(function () {
      console.log("sliders functions ready!");     

      /* Слайдер формат образования */
      const $sliderFormat = $('.format-slider__list');
      const sliderFormatOpitons = {
         dots: true,
         infinite: false,
         lazyLoad: 'ondemand',
         autoplay: false,
         speed: 300,
         slidesToShow: 1,
         slidesToScroll: 1,
         fade: true,
         cssEase: 'linear',
         adaptiveHeight: true
      }
      $sliderFormat.slick(sliderFormatOpitons);
   
      $('.format__items-list li').click(function(){
         const slideIndex = $(this).data('slide');
         $sliderFormat.slick('slickGoTo', slideIndex);
      });
      
      $sliderFormat.on('afterChange', function(event, slick, currentSlide){
         $('.format__items-list li').removeClass('_active');
         $('.format__items-list li[data-slide="' + currentSlide + '"]').addClass('_active');
      });      
     
   });
}