<?php

/**
 * Kontak Form Banner PS Block template.
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

$kontak_info = get_field('kontak_info'); ?>
<!-- Kontak-form-banner-ps start -->
<section class="kontak-general-ps">
  <div class="container">
    <?php if (!empty($kontak_info) && count($kontak_info) > 0) { ?>
      <ul class="kontak-general-ps__items">
        <?php
        foreach ($kontak_info as $key => $info) {
          $title = !empty($info['title']) ? "<h2>{$info['title']}</h2>" : "";
          echo '<li class="kontak-general-ps__items_item">' . $title . '<div class="kontak-general-ps__items_item-content">
          ' . $info['content'] . '
          </div></li>';
        } ?>
      </ul>
    <?php } ?>
  </div>
</section><!-- Kontak-form-banner-ps end -->