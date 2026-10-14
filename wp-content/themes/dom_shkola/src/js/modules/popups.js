export function popups() {
   $(document).ready(function () {
      console.log("popups functions ready!");



      /* Стандартный */
      $('.open-popup-link').each(function (index) {
         $(this).magnificPopup({
            type: 'inline',
            midClick: true,
            callbacks: {
               beforeOpen: function () {
                  const clickedLink = this.ev;
                  const $currentPopup = $($(clickedLink).attr('href'))[0];
   
                  const $titleData = $(clickedLink[0]).data('title');
                  const $textData = $(clickedLink[0]).data('text');
                  const $imageData1 = $(clickedLink[0]).data('thumbnail-1');
                  const $imageData2 = $(clickedLink[0]).data('thumbnail-2');
                  const $imageData3 = $(clickedLink[0]).data('thumbnail-3');
                  const $imageData4 = $(clickedLink[0]).data('thumbnail-4');
      
                  $($currentPopup).find('.form-popup__content h3').html($titleData);
                  $($currentPopup).find('.form-popup__content>p').html($textData);
                  $($currentPopup).find('._title input').val($titleData);
                  $($currentPopup).find('.form-popup__thumbnails img:nth-child(1)').attr('src', $imageData1);
                  $($currentPopup).find('.form-popup__thumbnails img:nth-child(2)').attr('src', $imageData2);
                  $($currentPopup).find('.form-popup__thumbnails img:nth-child(3)').attr('src', $imageData3);
                  $($currentPopup).find('.form-popup__thumbnails img:nth-child(4)').attr('src', $imageData4);
               },
               beforeClose: function () {
                  var $currentPopup = $(this.content);
                  const popupForm = $currentPopup.find('form')[0];
                  if (popupForm) {
                     popupForm.reset();
                     $('.form__policy input').closest('label').removeClass('_active');
                  }
               }
            }
         });
      });

      document.addEventListener('wpcf7mailsent', function(event) { $.magnificPopup.open({ items: { src: '#thanks-popup' }, type: 'inline' }); }, false);

      /* всплывающей попап */
      const $bottomPopup = $('#bottom-popup');
      $(document).ready(function () {
         setTimeout(function () {
            $bottomPopup.addClass('_show');
            
            $bottomPopup.find('.bottom-popup__close').on('click', function () {
               $bottomPopup.removeClass('_show');
            });
         }, 5000);
      });

      $(document).on('formSubmitted', function () {
         $.magnificPopup.open({
               items: {
                  src: '#thanks-popup'
               },
               type: 'inline'
         });
      });    
   });
}