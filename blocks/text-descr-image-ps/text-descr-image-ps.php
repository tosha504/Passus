<?php

/**
 * Text Descr Image PS Block template.
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
$tag_kopia = get_field('tag_kopia');
$text_title_kopia = get_field('text_title_kopia');

$description = '<div class="text-descr-image-ps__descr">' . get_field('description') . '</div>';
$image = get_field('image'); ?>
<!-- Text-descr-image-ps start -->
<section class="text-descr-image-ps">
  <div class="container">
    <div class="text-descr-image-ps__left">
      <?php show_title_and_btn($tag_kopia, $text_title_kopia);
      echo $description; ?>
    </div>
    <div class="text-descr-image-ps__right">
      <?php my_custom_attachment_image($image); ?>
    </div>
  </div>

</section><!-- Text-descr-image-ps end -->