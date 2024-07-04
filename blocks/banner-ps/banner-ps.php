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

$background =  !empty(get_field('background')) ? 'style="background-image: url(' . wp_get_attachment_url(get_field('background')) . ')"' : '';
$items = get_field('items'); ?>
<!-- Banner-ps start -->
<section class="banner-ps" <?php echo $background; ?>>
  <div class="container">
    <?php if (!empty($items) && count($items) > 0) { ?>
      <ul class="banner-ps__items">
        <?php
        foreach ($items as $key => $item) {
          $link = $item['link'];
          if ($link) {
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
            <li class="banner-ps__items_item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo my_custom_attachment_image($item['item']); ?></a></li>
        <?php }
        } ?>
      </ul>
    <?php }
    ?>
  </div>

</section><!-- Banner-ps end -->