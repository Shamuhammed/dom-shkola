<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dom_shkola
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>      
      
      <meta name="author" content="sh-studio"/>
		<?php wp_head(); ?>
   </head>

   <body <?php body_class(); ?> id="<?php echo get_the_ID() ?? ''; ?>" >
		<?php wp_body_open(); ?>
		<!-- PRELOADER SPINNER ============================================= -->
		<div id="loader-wrapper"></div>
		<!-- PAGE CONTENT ============================================= -->
		<div class="wrapper">
			<!-- HEADER ============================================= -->
			<?php
				$contact_data = get_field('contacts_fields', 2);
				$phone_number_arr = array('8 800 000 00 00', '8 800 000 00 00');
				if (isset($contact_data)) {
					$phone_number_arr = getPhoneObject(($contact_data['contacts_phonenumber']));
				}

				if (!is_front_page()) {

					$custom_logo_id = get_theme_mod('custom_logo'); $logo = wp_get_attachment_image_src($custom_logo_id, 'full'); 
					$logo_url = has_custom_logo() ? $logo[0] : '';
			?>
			<header class="header" id="header">
				<div class="header__wrapper">
					<div class="container">
						<div class="header__inner">
							<a class="header__logo _animate _fadein" data-delay="2" href="<?php echo (home_url() ?? '/'); ?>">
								<?php 
								   if ($logo_url) {
										?>
											<img width="50" height="50" src="<?php echo esc_url($logo_url); ?>" alt="Российская онлайн-школа с 1 по 11 класс">
										<?php
									} else {
										?>
											<img width="50" height="50" src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg" alt="Российская онлайн-школа с 1 по 11 класс">
										<?php
									}
								?>
								<p><?php echo get_option('description') ?? 'Российская онлайн-<br>школа с 1 по 11 класс'; ?></p>
							</a>
							<div class="header__collapse top-menu-collapse _animate _fadein" data-delay="2">
								<?php
									wp_nav_menu( [
										'theme_location' => 'menu-2',
										'menu_id'        => 'other-menu',
										'container'       => 'nav',
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
								?>
							</div>
							<div class="header__contacts top-contacts _animate _fadein" data-delay="2">
								<a href="mailto:<?php echo $contact_data['contacts_email']; ?>" class="top-contacts__icon">
									<img width="34" height="34" src="<?php bloginfo('template_url'); ?>/assets/img/envelope-icon.svg" alt="envelope icon">
								</a>
								<a href="tel:<?php echo ($phone_number_arr[1]); ?>">
									<?php echo $phone_number_arr[0]; ?>
								</a>
								<div class="menu-icon"><span><span></span></span></div>
							</div>
						</div>
					</div>
				</div>
			</header><!-- #masthead -->
			<?php } ?>
			
