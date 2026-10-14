<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dom_shkola
 */

	$footer_fields = get_field('footer_fields', 2);
	$year_foundation = $footer_fields['footer_year'] ?? '2017';
	$footer_org = $footer_fields['footer_org'] ?? 'ДОМ-ШКОЛА';
	$footer_slogan = $footer_fields['footer_slogan'] ?? 'Домашняя школа дистанционного обучения РШДО';

	$contact_data = get_field('contacts_fields', 2);
	$phone_number_arr = array('8 800 000 00 00', '8 800 000 00 00');
	$email;
	
	if (isset($contact_data)) {
		$phone_number_arr = getPhoneObject(($contact_data['contacts_phonenumber']));
		$email = $contact_data['contacts_email'];
	} 
	
	$email_org = get_option('email') ?? '';
	$address = get_option('address') ?? '';
	$city = get_option('city') ?? '';			
	$organization = get_option('organization_name');
	$organization_postal_code = get_option('postal_code') ?? '';
	$organization_description = get_option('description') ?? '';
	$country = get_option('country') ?? '';
	$image = get_option('image') ?? '';
	$legal_name = get_option('legal_name') ?? '';
	$url = home_url() ?? '';
?>
		<div itemscope="" itemtype="http://schema.org/Organization" class="displa-none">
			<meta itemprop="name" content="<?php echo $organization; ?>">
			<meta itemprop="telephone" content="<?php echo $phone_number_arr[1]; ?>">
			<meta itemprop="email" content="<?php echo $email_org; ?>">
			<meta itemprop="address" content="<?php echo $city . ', ' . $address; ?>">
			<meta itemprop="addressCountry" content="Россия">
			<meta itemprop="streetAddress" content="<?php echo $address; ?>">
			<meta itemprop="addressLocality" content="<?php echo $city;?>">
			<meta itemprop="postalCode" content="<?php echo $organization_postal_code;?>">
			<meta itemprop="logo" content="<?php bloginfo('template_url'); ?>/assets/img/favicon/favicon.png">
			<meta itemprop="image" content="<?php echo $image;?>">
			<meta itemprop="description" content="<?php echo $organization_description; ?>">
			<meta itemprop="legalName" content="<?php echo $legal_name; ?>">
			<meta itemprop="url" content="<?php echo $url; ?>">
		</div>	
      <!-- FOOTER ============================================= -->
      <svg class="svg" width="0" height="0" hidden>
         <clipPath id="clip-path-footer" clipPathUnits="objectBoundingBox"><path d="M1,0 H0 V0.048 H0.013 C0.065,0.048,0.113,0.108,0.153,0.212 C0.184,0.291,0.214,0.387,0.245,0.485 C0.326,0.738,0.409,1,0.506,1 C0.604,1,0.687,0.738,0.767,0.485 C0.798,0.387,0.829,0.291,0.86,0.212 C0.9,0.108,0.948,0.048,1,0.048 V0"></path></clipPath>
      </svg>
      <footer class="footer" id="footer">
         <div class="container">
            <div class="footer__inner">
               <div class="footer__figure footer__figure_left"><span></span><span></span></div>
               <div class="footer__figure footer__figure_center"><span></span><span></span></div>
               <div class="footer__figure footer__figure_right"><span></span><span></span></div>
               <div class="footer__row">
                  <div class="footer__col _animate _fadein" data-delay="2">
                     <div class="footer__logo">
                        <a href="<?php echo home_url(); ?>">
								<?php 
									$custom_logo_id = get_theme_mod('custom_logo'); $logo = wp_get_attachment_image_src($custom_logo_id, 'full'); 
									$logo_url = has_custom_logo() ? $logo[0] : '';
								   if ($logo_url) {
										?>
											<img class="lazy" width="50" height="50" data-src="<?php echo esc_url($logo_url); ?>" alt="Российская онлайн-школа с 1 по 11 класс">
										<?php
									} else {
										?>
											<img class="lazy" width="50" height="50" data-src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg" alt="Российская онлайн-школа с 1 по 11 класс">
										<?php
									}
								?>
                        </a>
                        <h2><?php echo $footer_slogan; ?></h2>
                     </div>
                  </div>
                  <div class="footer__col footer-nav _animate _fadein" data-delay="3">
                     <nav>
								<?php
									if (is_front_page()) {
										wp_nav_menu( [
											'theme_location' => 'menu-3',
											'menu_id'        => 'footer-menu',
											'container'       => '',
											'container_class' => '',
											'container_id'    => '',
											'menu_class'      => 'menu',
											'menu_id'         => '',
											'echo'            => true,
											'fallback_cb'     => 'wp_page_menu',
											'before'          => '',
											'after'           => '',
											'link_before'     => '',
											'link_after'      => '',
											'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											'depth'           => 0,
											'walker'          => '',
										] );
									} else {
										wp_nav_menu( [
											'theme_location' => 'menu-4',
											'menu_id'        => 'footer-other-menu',
											'container'       => '',
											'container_class' => '',
											'container_id'    => '',
											'menu_class'      => 'menu',
											'menu_id'         => '',
											'echo'            => true,
											'fallback_cb'     => 'wp_page_menu',
											'before'          => '',
											'after'           => '',
											'link_before'     => '',
											'link_after'      => '',
											'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											'depth'           => 0,
											'walker'          => '',
										] );
									}
								?>
                     </nav>
                  </div>
                  <div class="footer__col _animate _fadein" data-delay="4">
                     <div class="footer__contacts">
                        <p>
                           <a href="mailto:<?php echo $email; ?>">
                              <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <rect width="45" height="45" rx="22.5" fill="#A5C784"/>
                                 <path d="M22.0088 23.5771C22.3867 23.5771 22.7207 23.4014 23.1162 23.0059L30.7803 15.4033C30.4375 15.0957 29.8311 14.9463 28.9785 14.9463H14.8018C14.0459 14.9463 13.5098 15.0869 13.2021 15.3682L20.9014 23.0059C21.2881 23.4014 21.6309 23.5771 22.0088 23.5771ZM12.3584 28.8945L18.6777 22.6367L12.3672 16.4053C12.209 16.6865 12.1211 17.1523 12.1211 17.8115V27.5234C12.1211 28.165 12.2002 28.6221 12.3584 28.8945ZM31.6416 28.8857C31.791 28.6133 31.8701 28.1562 31.8701 27.5234V17.8115C31.8701 17.1699 31.7822 16.7041 31.624 16.4316L25.3398 22.6367L31.6416 28.8857ZM15.0127 30.3887H29.1895C29.9629 30.3887 30.5078 30.2393 30.8242 29.9492L24.3906 23.5596L23.8457 24.0957C23.2393 24.6846 22.6592 24.9658 22.0088 24.9658C21.3584 24.9658 20.7695 24.6846 20.1631 24.0957L19.6182 23.5596L13.1934 29.9316C13.5449 30.2305 14.1602 30.3887 15.0127 30.3887Z" fill="#FFFAEE"/>
                              </svg>
                              <?php echo $email; ?></a>
                        </p>
                        <p>
                           <a href="tel:<?php echo ($phone_number_arr[1]); ?>">
                              <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <rect width="45" height="45" rx="22.5" fill="#D2B48C"/>
                                 <path d="M19.2559 26.6885C21.8486 29.29 25.0039 31.2939 27.5791 31.2939C28.7305 31.2939 29.7412 30.8896 30.5498 29.9932C31.0244 29.4658 31.3145 28.8594 31.3145 28.2529C31.3145 27.7871 31.1299 27.3301 30.6816 27.0137L27.9834 25.0977C27.5527 24.7988 27.2012 24.6582 26.8848 24.6582C26.4717 24.6582 26.1025 24.8867 25.6982 25.291L25.0654 25.9238C24.96 26.0205 24.8369 26.0645 24.7227 26.0645C24.582 26.0645 24.4502 26.0117 24.3623 25.959C23.8086 25.6602 22.8594 24.8516 21.9805 23.9727C21.1016 23.0938 20.2842 22.1533 19.9941 21.5908C19.9414 21.4941 19.8975 21.3711 19.8975 21.2305C19.8975 21.125 19.9326 21.002 20.0293 20.8965L20.6621 20.2549C21.0576 19.8418 21.2949 19.4814 21.2949 19.0684C21.2949 18.7432 21.1543 18.3916 20.8555 17.9697L18.9482 15.2979C18.623 14.8408 18.166 14.6475 17.665 14.6475C17.0674 14.6475 16.4697 14.9111 15.9512 15.4121C15.0723 16.2383 14.6855 17.2666 14.6855 18.4004C14.6855 20.9756 16.6631 24.0957 19.2559 26.6885Z" fill="#FFFAEE"/>
                              </svg>
                              <?php echo ($phone_number_arr[0]); ?></a>
                        </p>
                        <div class="footer__menuicon menu-icon"><span><span></span></span></div>
                     </div>
                  </div>
               </div>
               <div class="footer__bottom-row">
                  <p class="footer__copy">
                     ©️ <?php echo $year_foundation . ' - ' . date("Y") . ', ' . $footer_org; ?>
                  </p>            
                  <p class="footer__docs">
                     <!-- <a href="<?php echo get_permalink(53); ?>">
                        Договор оферты
                     </a> -->
                     <a href="<?php echo get_privacy_policy_url(); ?>">
                        Политика конфиденциальности
                     </a>
                  </p>
               </div>
            </div>
         </div>
      </footer>
      <!-- END FOOTER -->
   </div>

	<?php 
	get_template_part('template-parts/popups');
	wp_footer(); 
?>
</body>

</html>
