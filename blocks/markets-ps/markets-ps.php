<?php

/**
 * Markets PS Block template.
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
$elements = get_field('elements'); ?>
<!-- Markets-ps start -->
<section class="markets-ps">
  <div class="container">
    <?php show_title_and_btn($tag, $text_title);
    if (!empty($elements) && count($elements) > 0) { ?>
      <ul class="markets-ps__elements">
        <?php foreach ($elements as $key => $element) { ?>
          <li class="markets-ps__elements_element">
            <a href="<?php echo $element['link'] ?>">
              <?php my_custom_attachment_image($element['element_image']);
              echo '<p class="markets-ps__elements_element-title">' . $element['element_title'] . '</p>'; ?>
            </a>
          </li>
        <?php } ?>
      </ul>
    <?php } ?>
  </div>

</section><!-- Markets-ps end -->