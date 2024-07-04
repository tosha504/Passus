<?php

/**
 * Calendar PS Block template.
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

$events_display = get_field('events_display');
$tag =  get_field('tag');
$text_title =  get_field('text_title');
$see_more =  get_field('see_more'); ?>
<!-- Calendar-ps start -->
<section class="calendar-ps">
  <div class="container">
    <?php
    show_title_and_btn($tag, $text_title, $see_more);
    if (!empty($events_display) && count($events_display) > 0) { ?>
      <ul class="calendar-ps__items">
        <?php
        foreach ($events_display as $key => $event) {
          $date_event_ps = !empty(get_field('date_event_ps', $event->ID)) ? '<p class="calendar-ps__items_item-date">' . get_field('date_event_ps', $event->ID) . '</p>' : '';
          $link_event = get_field('link_event', $event->ID);
          $terms = get_the_terms($event->ID, 'categories-calendar'); ?>
          <li class="calendar-ps__items_item">
            <a href="<?php echo esc_url($link_event); ?>">
              <?php
              echo $date_event_ps;
              echo '<p class="calendar-ps__items_item-title">' . $event->post_title . '</p>';
              if (!empty($terms)) {
                foreach ($terms as $key => $term) {
                  $icon_categories = get_field('icon_categories', 'term_' . $term->term_id);
                  echo '<p class="calendar-ps__items_item-cat">' . $term->name . wp_get_attachment_image($icon_categories, 'full') . '</p>';
                }
              } ?>
            </a>
          </li>
        <?php
        } ?>
      </ul>
    <?php }
    ?>
  </div>

</section><!-- Calendar-ps end -->