<?php

/**
 * Theme enqueue scripts and styles.
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
if (!function_exists('start_scripts')) {
	function start_scripts()
	{
		$query_args =	 curent_setting_args();
		$query_args['post_type'] = get_queried_object()->name;

		$my_query = new WP_Query($query_args);
		$theme_uri = get_template_directory_uri();
		// Custom JS
		wp_enqueue_script('start_functions', $theme_uri . '/src/index.js', ['jquery'], time(), true);
		wp_localize_script('start_functions', 'localizedObject', [
			'ajaxurl' => admin_url('admin-ajax.php'),
			'nonce' => wp_create_nonce('ajax_nonce'),
			'posts' => json_encode($my_query->query_vars), // Pass initial query
			'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
			'max_page' => $my_query->max_num_pages
		]);

		// Custom css
		wp_enqueue_style('start_style', $theme_uri . '/src/index.css', [], time());

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'start_scripts',);



function custom_block_theme_acf_enqueue_scripts()
{
	$theme_uri = get_template_directory_uri();
	//if slick
	// wp_register_script('slick_theme_functions', $theme_uri . '/libery/slick.min.js', [], false, true);
	if (has_block('acf/segments-ps', get_queried_object_id())) {
		wp_enqueue_script('segments-ps', get_template_directory_uri() . "/blocks/segments-ps/segments-ps.js", array(), '1.0.0', true);
	}

	if (has_block('acf/search-doscs-ps', get_queried_object_id())) {
		wp_enqueue_script('search-doscs-ps', get_template_directory_uri() . "/blocks/search-doscs-ps/search-doscs-ps.js", array(), '1.0.0', true);
	}
}
add_action('wp_enqueue_scripts', 'custom_block_theme_acf_enqueue_scripts');
add_action('admin_enqueue_scripts', 'custom_block_theme_acf_enqueue_scripts');
