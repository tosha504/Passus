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

$items = get_field('items'); ?>
<!-- Partners-ps start -->
<section class="partners-ps">
  <div class="container">
    <?php if (!empty($items) && count($items) > 0) { ?>
      <ul class="partners-ps__items">
        <?php
        foreach ($items as $key => $item) { ?>
          <li class="partners-ps__items_item">
            <?php echo my_custom_attachment_image($item['item']); ?>
          </li>
        <?php } ?>
      </ul>
    <?php } ?>
  </div>
</section><!-- Partners-ps end -->