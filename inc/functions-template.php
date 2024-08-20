<?php

/**
 * Custom functions
 *
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

function my_custom_attachment_image($attachment_id)
{
  echo wp_get_attachment_image($attachment_id, 'full', false, ['alt' => get_post_meta($attachment_id, '_wp_attachment_image_alt', true), 'loading' => 'lazy', 'title' => get_the_title($attachment_id)]);
}

function show_title_and_btn($tag, $text_title, $button = null)
{
  $button_show = '';
  if ($button !== null) {
    $link_url = $button['url'];
    $link_title = $button['title'];
    $link_target = $button['target'] ? $button['target'] : '_self';
    $button_show = '<a class="button button__arrow" href="' . esc_url($link_url) . '" target="' . esc_attr($link_target) . '">' . $link_title . '</a>';
  }

  echo <<<TITLE_AND_BTN
  <div class="title-block-ps">
    <$tag>$text_title</$tag>
    $button_show
  </div>
  TITLE_AND_BTN;
}

function banner_table_templates()
{
  if (have_rows('tables')) {
    while (have_rows('tables')) {
      the_row();
      if (get_row_layout() == 'simple_table') {
        get_template_part('builder-templates/simple-table');
      } else if (get_row_layout() == 'shareholding_table') {
        get_template_part('builder-templates/shareholding-table');
      } else if (get_row_layout() == 'slider_table') {
        get_template_part('builder-templates/slider-table');
      }
    }
  }
}


function remove_private_prefix_from_title($title)
{
  if (strpos($title, 'Prywatne: ') === 0) {
    // Remove "Private: " from the title
    $title = str_replace('Prywatne: ', '', $title);
  }
  if (strpos($title, 'Private: ') === 0) {
    // Remove "Private: " from the title
    $title = str_replace('Private: ', '', $title);
  }

  return $title;
}
