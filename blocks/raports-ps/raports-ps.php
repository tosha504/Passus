<?php

/**
 * Raports PS Block template.
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
$bg_color_btn = !empty(get_field('bg_color_btn')) ? 'style="background:' . get_field('bg_color_btn') . ';"' : '';
$see_more = !empty(get_field('see_more')) ? '<a class="button button__arrow" ' . $bg_color_btn . ' href="' . esc_url(get_field('see_more')['url']) . '" target="' . esc_attr(get_field('see_more')['target']) . '">' . get_field('see_more')['title'] . '</a>' : '';
$descr = get_field('descr');
$image = get_field('image');
$background_color = !empty(get_field('background_color')) ? 'style="background:' . get_field('background_color') . ';"' : '';
$image = get_field('image');
$curent_reports = get_field('curent_reports'); ?>
<!-- Raports-ps start -->
<section class="raports-ps" <?php echo $background_color; ?>>
  <div class="container">
    <div class="raports-ps__left">
      <div class="raports-ps__left_wrap">
        <?php show_title_and_btn($tag, $text_title);
        echo $descr . $see_more; ?>
      </div>
      <?php my_custom_attachment_image($image); ?>
    </div>

    <div class="raports-ps__right">
      <?php if (!empty($curent_reports) && count($curent_reports) > 0) { ?>
        <ul class="raports-ps__right_elemnts elements">
          <?php
          foreach ($curent_reports as $key => $reports) {
            $espi = get_field('espi', $reports->ID);
            $date = new DateTime($reports->post_date);
            $formattedDate = $date->format('d.m.Y');
            $trim_words = 40;
            $excerpt = wp_trim_words($reports->post_content, $trim_words); ?>
            <li class="elements__item item">
              <div class="date-cat">
                <p><?php echo $formattedDate ?></p>
                <p class="cat"><?php echo $espi; ?></p>
              </div>
              <p class="item__title"><?php echo $reports->post_title ?></p>
              <p class="item__descr"><?php echo $excerpt ?></p>
              <span>Pełna treść raportu</span>
            </li>
          <?php } ?>
        </ul>
      <?php } ?>
    </div>
  </div>
</section><!-- Raports-ps end -->