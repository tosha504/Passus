<?php

/**
 * Banner PS Block template.
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
$title = !empty(get_field('calendar_descr')) ? '<h1>' . get_field('calendar_descr') . '</h1>' : ' ';
$background = !empty(get_field('bg_archive_image')) ? 'style="background-image: url(' . wp_get_attachment_url(get_field('bg_archive_image')) . ')"' : '';
?>
<!-- Banner-ps start -->
<section class="simple-banner-ps" <?php echo $background; ?>>
  <div class="container">
    <?php echo $title; ?>
  </div>

</section><!-- Banner-ps end -->