<?php
/**
 * dom_shkola functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dom_shkola
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dom_shkola_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on dom_shkola, use a find and replace
		* to change 'dom_shkola' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'dom_shkola', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'dom_shkola' ),
			'menu-2' => esc_html__( 'Other', 'dom_shkola' ),
			'menu-3' => esc_html__( 'Footer', 'dom_shkola' ),
			'menu-4' => esc_html__( 'Footer_other', 'dom_shkola' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'dom_shkola_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'dom_shkola_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dom_shkola_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dom_shkola_content_width', 640 );
}
add_action( 'after_setup_theme', 'dom_shkola_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dom_shkola_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dom_shkola' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dom_shkola' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dom_shkola_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dom_shkola_scripts() {
	wp_enqueue_style( 'fonts', get_template_directory_uri() . '/assets/css/fonts.min.css', '1.0.0');
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.min.css', '1.0.0');
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.min.css', '1.0.0');

	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.min.css', array(), '1.1.0');

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', false, null, true );
	
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'imask', get_template_directory_uri() . '/assets/js/imask.min.js', array('jquery'), '1.0.0', true );
	// wp_enqueue_script( 'imask', 'https://unpkg.com/imask', array('jquery'), '1.0.0', true );
	
	// wp_enqueue_script( 'imagelazy', get_template_directory_uri() . '/assets/js/min/imagelazy.min.js', array('jquery'), '1.0.0', true );
	/*
	wp_enqueue_script( 'accordeon', get_template_directory_uri() . '/assets/js/min/accordeon.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'ajax', get_template_directory_uri() . '/assets/js/min/ajax.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'top-menu', get_template_directory_uri() . '/assets/js/min/top-menu.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'popups', get_template_directory_uri() . '/assets/js/min/popups.min.js', array('jquery', 'magnific-popup'), '1.0.0', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/min/script.min.js', array('jquery', 'imask'), '1.0.2', true );
	wp_enqueue_script( 'sliders', get_template_directory_uri() . '/assets/js/min/sliders.min.js', array('jquery', 'slick'), '1.0.0', true );
	*/
	wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/js/app.min.js', array('jquery', 'slick', 'magnific-popup', 'imask'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'dom_shkola_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/**
 * Добавляет SVG в список разрешенных для загрузки файлов.
 */
add_filter( 'upload_mimes', 'svg_upload_allow' );
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

/**
 * Пользовательский AJAX-обработчик
 */
require_once get_template_directory() . '/custom-ajax-handler.php';

/**
 * Загрузка библиотеки Media на странице настроек
 */
function load_wp_media_files() {
	wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'load_wp_media_files');

/**
 * Вывод полей настройки на левую панель
 */
add_action('admin_menu', 'my_custom_options_page');
function my_custom_options_page() {
    add_menu_page(
        'Настройки сайта', // Название страницы
        'Настройки сайта', // Название меню
        'manage_options',  // Способность
        'site-settings',   // Слаг
        'my_custom_options_page_html', // Функция вывода
        '', // Иконка (необязательно)
        20  // Позиция в меню
    );
}

function my_custom_options_page_html() {
    // Проверка прав доступа
    if ( ! current_user_can('manage_options') ) {
        return;
    }

    // Вывод содержимого страницы
    echo '<div class="wrap">';
    echo '<h1>Настройки сайта</h1>';
    echo '<form method="post" action="options.php">';
    settings_fields('my_options_group');
    do_settings_sections('site-settings');
    submit_button();
    echo '</form>';
    echo '</div>';
}

add_action('admin_init', 'my_custom_settings');
function my_custom_settings() {
    register_setting('my_options_group', 'organization_name');
    register_setting('my_options_group', 'phone_number');
    register_setting('my_options_group', 'email');
    register_setting('my_options_group', 'address');
    register_setting('my_options_group', 'city');
    register_setting('my_options_group', 'country');
    register_setting('my_options_group', 'postal_code');
    register_setting('my_options_group', 'image');
    register_setting('my_options_group', 'description');
    register_setting('my_options_group', 'legal_name');

    add_settings_section('my_settings_section', 'Мои настройки', null, 'site-settings');

    add_settings_field('organization_name', 'Название организации', 'my_text_field_callback', 'site-settings', 'my_settings_section', array('name' => 'organization_name'));
    add_settings_field('phone_number', 'Номер телефона', 'my_text_field_callback', 'site-settings', 'my_settings_section', array('name' => 'phone_number'));
    add_settings_field('email', 'Email', 'my_text_field_callback', 'site-settings', 'my_settings_section', array('name' => 'email'));
    add_settings_field('address', 'Адрес', 'my_text_field_callback', 'site-settings', 'my_settings_section', array('name' => 'address'));
    add_settings_field('city', 'Город', 'my_text_field_callback', 'site-settings', 'my_settings_section', array('name' => 'city'));
    add_settings_field('country', 'Страна', 'my_text_field_callback', 'site-settings', 'my_settings_section', array('name' => 'country'));
    add_settings_field('postal_code', 'Почтовый индекс', 'my_text_field_callback', 'site-settings', 'my_settings_section', array('name' => 'postal_code'));
    add_settings_field('image', 'Картинка', 'my_image_field_callback', 'site-settings', 'my_settings_section');
    add_settings_field('description', 'Описание', 'my_textarea_field_callback', 'site-settings', 'my_settings_section', array('name' => 'description'));
    add_settings_field('legal_name', 'Юридическое имя организации', 'my_text_field_callback', 'site-settings', 'my_settings_section', array('name' => 'legal_name'));
}

function my_text_field_callback($args) {
    $value = get_option($args['name']);
    echo '<input type="text" name="' . esc_attr($args['name']) . '" value="' . esc_attr($value) . '">';
}

function my_textarea_field_callback($args) {
    $value = get_option($args['name']);
    echo '<textarea name="' . esc_attr($args['name']) . '">' . esc_textarea($value) . '</textarea>';
}

function my_image_field_callback() {
    $value = get_option('image');
    echo '<input type="text" name="image" value="' . esc_attr($value) . '">';
    echo '<button class="upload_image_button button">Загрузить изображение</button>';
    echo '<script>
        jQuery(document).ready(function($){
            $(".upload_image_button").click(function(e) {
                e.preventDefault();
                var custom_uploader = wp.media({
                    title: "Выберите изображение",
                    button: {
                        text: "Использовать это изображение"
                    },
                    multiple: false
                })
                .on("select", function() {
                    var attachment = custom_uploader.state().get("selection").first().toJSON();
                    $("input[name=\'image\']").val(attachment.url);
                })
                .open();
            });
        });
    </script>';
}

/**
* Пользовательские функции
*/
# возрат номера телефона без лишних символов
function getPhoneObject ($num){
	$phone_link = preg_replace('/[^0-9+]/', '', $num); 
	return array($num, $phone_link);
}

function truncateString($text, $length) {
	// Удаляем все теги <p>
	$text = preg_replace('/<\/?p>/', '', $text);
	// Удаляем все HTML-комментарии
	$text = preg_replace('/<!--.*?-->/', '', $text);
	// Проверяем, если длина текста меньше или равна указанному числу, возвращаем текст
	if (strlen($text) <= $length) {
		 return $text;
	}
	// В противном случае, обрезаем текст до указанной длины
	return substr($text, 0, $length) . '...';
}

/**
 * Тема по умолчанию
 */
add_filter('pre_option_template', function() {
   return 'dom_shkola';
});
add_filter('pre_option_stylesheet', function() {
   return 'dom_shkola';
});

function validate_comment_field($commentdata) {
    if (!isset($_POST['current_page'])) {
        wp_die('Ошибка: подозрение на спам!');
    }

    $current_page = filter_var($_POST['current_page'], FILTER_SANITIZE_URL);

    if (empty($current_page) || strpos($current_page, $_SERVER['HTTP_HOST']) === false) {
        wp_die('Ошибка: неверное значение поля!');
    }

    return $commentdata;
}
add_filter('pre_comment_on_post', 'validate_comment_field');

function add_hidden_field($fields) {
    $fields['current_page'] = '<input type="hidden" name="current_page" value="">';
    return $fields;
}
add_filter('comment_form_default_fields', 'add_hidden_field');