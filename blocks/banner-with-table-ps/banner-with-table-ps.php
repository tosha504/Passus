<?php

/**
 * Banner With Table PS Block template.
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
$tag = get_field('tag');
$title = get_field('text_title'); ?>
<!-- Banner-with-table-ps start -->
<section class="banner-with-table-ps" <?php echo $background; ?>>
  <div class="container">
    <?php show_title_and_btn($tag, $title); ?>
  </div>
</section><!-- Banner-with-table-ps end -->
<?php banner_table_templates();
