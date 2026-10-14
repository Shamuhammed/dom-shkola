
<!-- form-popup -->
<div class="form-popup white-popup mfp-hide" id="form-popup">
   <div class="form-popup__inner">
      <div class="form-popup__title">
         <div class="title">
            <div class="title__inner">
               <div class="title__wrapper">
                  <h2>На связи</h2>
               </div>
            </div>
         </div>
      </div>
      <div class="form-popup__row">
         <div class="form-popup__column">
            <div class="form-popup__content">
               <h3>
                  Неделя обучения бесплатно!
               </h3>
               <p>
                  Заполните заявку, и специалист приемной комиссии свяжется с Вами, ответит на все вопросы и поможет подобрать подходящий формат обучения.
               </p>
            </div>
            <div class="form-popup__thumbnails">
               <img width="100" height="100" loading="lazy" src="<?php bloginfo('template_url'); ?>/assets/img/hero-thumbnail-1.png" alt="image">
               <img width="100" height="100" loading="lazy" src="<?php bloginfo('template_url'); ?>/assets/img/hero-thumbnail-2.png" alt="image">
               <img width="100" height="100" loading="lazy" src="<?php bloginfo('template_url'); ?>/assets/img/hero-thumbnail-3.png" alt="image">
               <img width="100" height="100" loading="lazy" src="<?php bloginfo('template_url'); ?>/assets/img/hero-thumbnail-4.png" alt="image">
            </div>
         </div>
         <div class="form-popup__column">
            <div class="form">
               <?php echo do_shortcode('[contact-form-7 id="ecb8a38" title="Контактная форма 2"]'); ?>
               <div class="form-popup__social">
                  <p>
                     Или свяжитесь с нами по телефону:
                  </p>
                  <?php
                     $contact_data = get_field('contacts_fields', 2);
                     $phone_number_arr = array('8 800 000 00 00', '8 800 000 00 00');
                     if (isset($contact_data)) {
                        $phone_number_arr = getPhoneObject(($contact_data['contacts_phonenumber']));
                     }
                  ?>
                  <a href="tel:<?php echo ($phone_number_arr[1]); ?>">
                     <?php echo ($phone_number_arr[0]); ?>
                     <!-- <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="45" height="45" rx="22.5" fill="#A5C784"/>
                        <path d="M19.2559 26.6885C21.8486 29.29 25.0039 31.2939 27.5791 31.2939C28.7305 31.2939 29.7412 30.8896 30.5498 29.9932C31.0244 29.4658 31.3145 28.8594 31.3145 28.2529C31.3145 27.7871 31.1299 27.3301 30.6816 27.0137L27.9834 25.0977C27.5527 24.7988 27.2012 24.6582 26.8848 24.6582C26.4717 24.6582 26.1025 24.8867 25.6982 25.291L25.0654 25.9238C24.96 26.0205 24.8369 26.0645 24.7227 26.0645C24.582 26.0645 24.4502 26.0117 24.3623 25.959C23.8086 25.6602 22.8594 24.8516 21.9805 23.9727C21.1016 23.0938 20.2842 22.1533 19.9941 21.5908C19.9414 21.4941 19.8975 21.3711 19.8975 21.2305C19.8975 21.125 19.9326 21.002 20.0293 20.8965L20.6621 20.2549C21.0576 19.8418 21.2949 19.4814 21.2949 19.0684C21.2949 18.7432 21.1543 18.3916 20.8555 17.9697L18.9482 15.2979C18.623 14.8408 18.166 14.6475 17.665 14.6475C17.0674 14.6475 16.4697 14.9111 15.9512 15.4121C15.0723 16.2383 14.6855 17.2666 14.6855 18.4004C14.6855 20.9756 16.6631 24.0957 19.2559 26.6885Z" fill="#FFFAEE"/>
                     </svg> -->
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- thanks-popup -->
<div class="thanks-popup white-popup mfp-hide" id="thanks-popup">
   <div class="thanks-popup__inner">
      <h2><?php the_field('thanks_title', 2) ?>
      </h2>
      <p><?php the_field('thanks_text', 2) ?></p>
   </div>
</div>

<!-- bottom-popup -->
<?php
   $bottom_popup_fields = get_field('bottom-popup_fields', 2) ?? '';
   if (isset($bottom_popup_fields) || $bottom_popup_fields['bottom_popup_hide']) {
      ?>
      <div id="bottom-popup" class="bottom-popup-small bottom-popup">
         <div class="bottom-popup__outer">
            <div class="bottom-popup__inner">
               <div class="bottom-popup__content">
                  <h2><?php echo $bottom_popup_fields['bottom-popup_title'] ?? ''; ?></h2>
                  <p><?php echo $bottom_popup_fields['bottom-popup_text'] ?? ''; ?></p>
               </div>
               <a href="#form-popup" class="btn btn_black open-popup-link"
                  data-title="<?php echo $bottom_popup_fields['bottom-popup_popup_title'] ?>"
                  data-text="<?php echo $bottom_popup_fields['bottom-popup_popup_text'] ?>"
                  data-thumbnail-1="<?php echo $bottom_popup_fields['bottom-popup_popup_thumbnail_1'] ?>"
                  data-thumbnail-2="<?php echo $bottom_popup_fields['bottom-popup_popup_thumbnail_2'] ?>"
                  data-thumbnail-3="<?php echo $bottom_popup_fields['bottom-popup_popup_thumbnail_3'] ?>"
                  data-thumbnail-4="<?php echo $bottom_popup_fields['bottom-popup_popup_thumbnail_4'] ?>"  
               ><?php echo $bottom_popup_fields['bottom-popup_btn'] ?? 'Записаться'; ?></a>
               <span class="bottom-popup__close"></span>
            </div>
         </div>
      </div>
      <?php
   }
?>