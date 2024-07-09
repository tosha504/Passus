<?php

/**
 * Banner Title Descr PS Block template.
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
$tag = get_field('tag');
$text_title = get_field('text_title');
$descr = get_field('descr');
$background = !empty(get_field('background')) ? 'style="background-image: url(' . wp_get_attachment_url(get_field('background')) . ')"' : ''; ?>
<!-- Banner-title-descr-ps start -->
<section class="banner-title-descr-ps" <?php echo $background; ?>>
  <div class="container">
    <?php show_title_and_btn($tag, $text_title);
    echo '<p>' . $descr . '</p>';  ?>
  </div>

</section><!-- Banner-title-descr-ps end -->