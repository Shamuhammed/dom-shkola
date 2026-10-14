<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package dom_shkola
 */

get_header();
?>

      <!-- MAIN ============================================= -->
      <main class="main default-page page-404" id="main">
         <!-- hero ============================================= -->
         <section class="default-page__section page-404__section">
            <div class="container">
               <div class="default-page__content page-404__content">
                  <div class="">
                     <h1>
                        Ошибка 404
                     </h1>
                  </div>
                  <br>
                  <h2>
                     Упс! Страница не найдена.
                  </h2>
                  <p>
                     Похоже, что страница, которую вы ищете, была перемещена или удалена. Но не волнуйтесь, мы поможем вам найти нужную информацию.
                  </p>
                  <ul>
                     <li>
                        <a href="<?php echo (home_url() ?? '/'); ?>">Вернуться на главную страницу</a>
                     </li>
                     <li>
								<?php
									$contact_data = get_field('contacts_fields', 2);
									$phone_number_arr = array('8 800 000 00 00', '8 800 000 00 00');
									if (isset($contact_data)) {
										$phone_number_arr = getPhoneObject(($contact_data['contacts_phonenumber']));
									}
								?>
                        <a href="<?php echo ($phone_number_arr[1]); ?>">Связаться с нами</a>
                     </li>
                  </ul>
               </div>
            </div>
         </section>
      </main>
      <!-- END MAIN -->

<?php
get_footer();
