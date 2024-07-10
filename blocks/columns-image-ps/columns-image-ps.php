<?php

/**
 * Columns Image PS Block template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or its parent block.
 */

// Load values and assign defaults.

$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

$background =  !empty(get_field('background')) ? 'style="background-image: url(' . wp_get_attachment_url(get_field('background')) . ')"' : '';
$column_left = get_field('column_left');
$column_right = get_field('column_right');
$image = get_field('image'); ?>
<!-- Columns-image-ps start -->
<section class="columns-image-ps" <?php echo $background; ?>>
  <div class="container">
    <div class="columns-image-ps__left">
      <?php echo $column_left; ?>
    </div>
    <div class="columns-image-ps__right">
      <?php echo $column_right; ?>
    </div>
    <div class="columns-image-ps__image">
      <?php if (!empty($image)) {
        my_custom_attachment_image($image);
      } ?>
    </div>
  </div>
</section><!-- Columns-image-ps end -->