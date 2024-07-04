<?php

/**
 * Make ACF Options
 */

defined('ABSPATH') || exit;

if (function_exists('acf_add_options_page')) {
  $option_page = acf_add_options_page([
    'page_title' => 'General settings',
    'menu_title' => 'General settings',
    'menu_slug' => 'theme-general-settings',
    'post_id' => 'options',
    'capability' => 'edit_posts',
    'redirect' => false
  ]);

  $option_page_header = acf_add_options_page([
    'page_title' => 'Header settings',
    'menu_title' => 'Header settings',
    'menu_slug' => 'theme-header-settings',
    'post_id' => 'options_header',
    'capability' => 'edit_posts',
    'icon_url' => 'dashicons-admin-settings',
    'redirect' => false
  ]);

  $option_page_footer = acf_add_options_page([
    'page_title' => 'Footer settings',
    'menu_title' => 'Footer settings',
    'menu_slug' => 'theme-footer-settings',
    'post_id' => 'options_footer',
    'capability' => 'edit_posts',
    'icon_url' => 'dashicons-admin-settings',
    'redirect' => false
  ]);
}

function acf_json_save_point()
{
  return get_template_directory() . '/acf-json';
}

function acf_json_load_point($paths)
{
  unset($paths[0]);
  $paths[] = get_template_directory() . '/acf-json';
  return $paths;
}
function acf_json_change_field_group($group)
{
  $groups = array(
    'group_64dcb34c9db9a',
    'group_64dcb34c9db9a__trashed',
    'group_64dc8b9fc1e74',
    'group_64dc8b9fc1e74__trashed',
    'group_64e30cbb90836',
    'group_64e30cbb90836__trashed',

  );
  if (in_array($group['key'], $groups)) {
    add_filter('acf/settings/save_json', array('acf_json_save_point'));
  }
  return $group;
}

add_action('acf/update_field_group', 'acf_json_change_field_group');
add_action('acf/trash_field_group', 'acf_json_change_field_group');
add_action('acf/untrash_field_group', 'acf_json_change_field_group');
add_filter('acf/settings/load_json', 'acf_json_load_point');
