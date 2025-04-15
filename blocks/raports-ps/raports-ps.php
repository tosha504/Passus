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
$curent_reports = get_field('curent_reports');
$bg_element = !empty(get_field('bg_element')) ? 'style="background:' . get_field('bg_element') . ';"' : ''; ?>
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
      <?php if (!empty($curent_reports)) {
        $args = array(
          'post_type' => $curent_reports,
          'posts_per_page' => 3,
          'post_status' => array('publish', 'private'),
          'orderby'   => 'meta_value',
          'order' => 'DESC',
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) { ?>
          <ul class="raports-ps__right_elemnts elements">
            <?php while ($query->have_posts()) {
              $query->the_post();
              $espi = !empty(get_field('espi', get_the_ID())) ? '<p class="cat">' . get_field('espi', get_the_ID()) . '</p>' : '';
              $date = new DateTime(get_the_date());
              $formattedDate = $date->format('d.m.Y');
              $trim_words = 40;
              $excerpt = wp_trim_words(get_the_content(), $trim_words); ?>
              <li class="elements__item item" <?php echo $bg_element; ?>>
                <a href="<?php echo get_site_url() . '/' . get_post_type_object($curent_reports)->rewrite['slug'] . '?_year=' .  $date->format('Y') . '/#post-' . get_the_ID(); ?>">
                  <div class="date-cat">
                    <p><?php echo $formattedDate ?></p>
                    <?php echo  $espi; ?>
                  </div>
                  <p class="item__title"><?php echo remove_private_prefix_from_title(get_the_title()); ?></p>
                  <p class="item__descr"><?php echo $excerpt; ?></p>
                  <span>Pełna treść raportu</span>
                </a>
              </li>
          <?php }
          } ?>
          </ul>
        <?php } ?>
    </div>
  </div>
</section><!-- Raports-ps end -->