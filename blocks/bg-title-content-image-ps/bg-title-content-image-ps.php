<?php

/**
 * Bg Title Content PS Block template.
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
$background_image = !empty(get_field('background-image')) ? 'style="background-image: url(' . wp_get_attachment_url(get_field('background-image')) . ');"' : '';
$content = !empty(get_field('content')) ? "<div class='bg-title-content-image-ps__content'>" . get_field('content') . "</div>" : "";
$image = get_field('image'); ?>
<!-- Bg-title-content-image-ps start -->
<section class="bg-title-content-image-ps">
  <div class="container" <?php echo $background_image; ?>>
    <?php show_title_and_btn($tag_kopia, $text_title_kopia);
    echo $content; ?>
    <div class="bg-title-content-image-ps__image">
      <?php my_custom_attachment_image($image); ?>
    </div>
  </div>
</section><!-- Bg-title-content-image-ps end -->