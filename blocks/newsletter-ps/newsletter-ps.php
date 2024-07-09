<?php

/**
 * Newsletter PS Block template.
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
$content = get_field('content');
$short_code = get_field('short_code');
$image = get_field('image');
$background =  !empty(get_field('background')) ? 'style="background-image: url(' . wp_get_attachment_url(get_field('background')) . ')"' : ''; ?>
<!-- Newsletter-ps start -->
<section class="newsletter-ps">
  <div class="container" <?php echo $background; ?>>
    <div class="newsletter-ps__left">
      <?php my_custom_attachment_image($image); ?>
    </div>
    <div class="newsletter-ps__right">
      <?php echo $content;
      echo do_shortcode($short_code); ?>
    </div>
  </div>
</section><!-- Newsletter-ps end -->