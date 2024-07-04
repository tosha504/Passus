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

$title_contact = !empty(get_field('title_contact')) ? '<h1>' . get_field('title_contact') . '</h1>' : ' ';
$bg_archive_image = get_field('bg_archive_image')  ? 'style="background-image: url(' . wp_get_attachment_url(get_field('bg_archive_image')) . ')"' : '';;
$form_short_code = get_field('form_short-code');
$links = get_field('links'); ?>
<!-- Kontak-form-banner-ps start -->
<section class="kontak-form-banner-ps">
  <div class="banner-top" <?php echo $bg_archive_image; ?>>
    <div class="container">
      <?php echo $title_contact; ?>
    </div>
  </div>
  <div class="container">
    <div class="kontak-form-banner-ps__form">
      <?php if (!empty($links) && count($links) > 0) { ?>
        <ul class="kontak-form-banner-ps__form_items">
          <?php
          foreach ($links as $key => $item) {
            $link = $item['link'];
            if ($link) {
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self'; ?>
              <li class="kontak-form-banner-ps__form_items-item"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo my_custom_attachment_image($item['icon']); ?><?php echo $link_title; ?></a></li>
          <?php }
          } ?>
        </ul>
      <?php } ?>
      <?php
      echo do_shortcode($form_short_code); ?>
    </div>
  </div>
</section><!-- Kontak-form-banner-ps end -->