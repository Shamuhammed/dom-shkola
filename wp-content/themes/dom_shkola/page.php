<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dom_shkola
 */

get_header();
?>

	<main class="main default-page" id="main">
		<section class="default-page__section">
			<div class="container">
				<div class="default-page__title">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="default-page__content">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();
