<?php

/**
 * start functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package passus
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function passus_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on start, use a find and replace
	 * to change 'start' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('passus', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-header' => esc_html__('Header menu', 'passus'),
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
			'passus_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'passus_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function passus_content_width()
{
	$GLOBALS['content_width'] = apply_filters('passus_content_width', 640);
}
add_action('after_setup_theme', 'passus_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function passus_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'start'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'start'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'passus_widgets_init');

/**
 * Disable Gutenberg
 */
// add_filter('use_block_editor_for_post', '__return_false');

// Theme includes directory.
$passus_inc_dir = 'inc';

// Array of files to include.
$passus_includes = array(
	'/functions-template.php',  // 	Theme custom functions
	'/enqueue.php',				//	Enqueue scripts and styles.
	'/custom-header.php',		//	Implement the Custom Header feature.
	'/customizer.php',			//	Customizer additions.
	'/template-tags.php',		// 	Custom template tags for this theme.
	'/template-functions.php',	//	Functions which enhance the theme by hooking into WordPress.
	'/acf-block-register.php',
	'/install-plugin-formthis-theme.php',
	'/acf-custom-functions.php',
	'/passus-custom-post-types.php'
);

// Load WooCommerce functions if WooCommerce is activated.
if (class_exists('WooCommerce')) {
	$passus_includes[] = '/woocommerce.php';
}

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Include files.
foreach ($passus_includes as $file) {
	require_once get_theme_file_path($passus_inc_dir . $file);
}

require_once dirname(__FILE__) . '/inc/class-tgm-plugin-activation.php';

//svg
function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

define('ALLOW_UNFILTERED_UPLOADS', true);

function fix_svg_thumb_display()
{
	echo
	'<style>
		td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail {
			width: 100% !important;
			height: auto !important;
		}
	</style>';
}


add_filter('get_the_archive_title', function ($title) {
	if (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	}
	if (is_home()) {
		$title = get_queried_object()->post_title;
	}

	return $title;
});


function display_year_buttons($post_type)
{
	global $wpdb;
	$years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_type = '$post_type' AND post_status IN ('publish', 'private') ORDER BY post_date DESC");
	$get_year = isset($_GET['_year']) ? intval($_GET['_year']) : intval(date('Y'));
	// Convert all years to integers to avoid string duplicates
	$years = array_map('intval', $years);
	$current_year = intval(date('Y'));
	// Check if the current year already exists in the list
	if (!in_array($current_year, $years, true)) {
		array_unshift($years, $current_year);
	}
	// Remove any accidental duplicates
	$years = array_unique($years);
	echo '<form id="year-filter-form">';
	echo '<input id="postType" type="hidden" value="' . $post_type . '">';
	foreach ($years as $key => $year) {
		$active_class = intval($get_year) === intval($year) ? "active" : "";
		echo '<button type="submit" class="year-filter ' . $active_class . '" name="_year" value="' . esc_attr($year) . '">' . esc_html($year) . '</button>';
	}
	echo '</form>';
}
?>
<?php
add_action('wp_ajax_load_more_posts', 'load_more_posts_callback');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts_callback');

function load_more_posts_callback()
{
	$year = isset($_POST['_year']) ? intval($_POST['_year']) : intval(date('Y'));
	$args = curent_setting_args();
	$args['post_type'] = $_POST["post_type"];
	$args['paged'] = $_POST['page'] + 1;
	$args['date_query'] = array(
		array(
			'year' => $year
		),
	);
	$query = new WP_Query($args);

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('template-parts/content', get_post_type());
		}
	} else {
		echo '<p>No posts found for ' . esc_html($year) . '.</p>';
	}
	wp_die();
}


function curent_setting_args()
{
	$year = isset($_GET['_year']) ? intval($_GET['_year']) : intval(date('Y'));
	$args = array(
		'posts_per_page' => 3,
		'post_status' => array('publish', 'private'),
		'date_query' => array(
			array(
				'year' => $year
			),
		),
	);
	return $args;
}


function custom_mime_types($mimes)
{
	$mimes['xhtml'] = 'application/xhtml+xml';
	return $mimes;
}
add_filter('upload_mimes', 'custom_mime_types');
