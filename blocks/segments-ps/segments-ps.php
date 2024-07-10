<?php

/**
 * Segments PS Block template.
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
$items = get_field('items'); ?>
<!-- Segments-ps start -->
<section class="segments-ps">
  <div class="container">
    <?php
    show_title_and_btn($tag, $text_title);
    if (!empty($items) && count($items) !== 0) {
      // var_dump($items)
    ?>
      <ul class="segments-ps__items">
        <?php foreach ($items as $key => $item) { ?>
          <li>
            <div class="question">
              <p class="img"><?php echo wp_get_attachment_image($item['icon'], 'full'); ?></p>
              <p class="title">
                <?php echo  $item['title']; ?>
              </p>
              <button aria-label="Toggle Accordion Content">
                <span></span>
              </button>
            </div>
            <div class="answer">
              <?php echo $item['description']; ?>
            </div>
          </li>
        <?php } ?>
      </ul>
    <?php } ?>
  </div>
</section><!-- Segments-ps end -->