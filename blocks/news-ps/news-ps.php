<?php

/**
 * News PS Block template.
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
$tag =  get_field('tag');
$text_title =  get_field('text_title');
$see_more =  get_field('see_more');
$posts_block_ps = get_field('posts_block_ps'); ?>
<!-- News-ps start -->
<section class="news-ps">
  <div class="container">
    <?php show_title_and_btn($tag, $text_title, $see_more);
    if (!empty($posts_block_ps) && count($posts_block_ps) > 0) { ?>
      <ul class="news-ps__items">
        <?php foreach ($posts_block_ps as $key => $post_ps) {
          $year = date("Y", strtotime($post_ps->post_date_gmt));
          $year_url =intval(date('Y')) > intval($year) ? "?_year={$year}" : ""; ?>
          <li class="news-ps__items_item">
            <a href="<?php echo get_site_url() . "/aktualnosci/{$year_url}#post-" . $post_ps->ID; ?>">
              <?php
              echo '<p class="news-ps__items_item-date">' . date('d.m.Y', strtotime($post_ps->post_date)) . '</p>';
              echo  '<p class="news-ps__items_item-title">' . $post_ps->post_title . '</p>';
              echo '<p class="news-ps__items_item-excerpt">' .  $post_ps->post_excerpt . '</p>';
              ?>
              <span>Czytaj więcej</span>
            </a>
          </li>
        <?php } ?>
      </ul>
    <?php } ?>
  </div>
</section><!-- News-ps end -->