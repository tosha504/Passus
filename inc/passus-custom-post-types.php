<?php

/**
 * Custom post-types
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action('init', 'register_post_types');

function register_post_types()
{
  register_post_type('calendar', array(
    'label' => 'Kalendarium',
    'public' => true,
    'menu_icon'           => 'dashicons-calendar-alt',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    'rewrite' => array('slug' => 'kalendarium'),
    'has_archive' => true,
  ));

  register_post_type('current-reports', array(
    'label' => 'Raporty Bieżące',
    'public' => true,
    'menu_icon'           => 'dashicons-media-text',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    'rewrite' => array('slug' => 'raporty-biezace'),
    'has_archive' => true,
  ));
}


function create_taxonomy()
{
  register_taxonomy('categories-calendar', 'calendar', array(
    'hierarchical'    => true,
    'label'           => 'Kategorie',
    'public'          => false,
    'show_ui'         => true,
  ));
}

add_action('init', 'create_taxonomy');
