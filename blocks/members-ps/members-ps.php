<?php

/**
 * Text Descr Image PS Block template.
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
$members = get_field('members'); ?>

<!-- Members-ps start -->
<section class="members">
  <div class="container">
    <?php if (!empty($members) &&  count($members) > 0) { ?>
      <ul class="members__items">
        <?php
        foreach ($members as $key => $member) {
          $post_state = get_field('post-state', $member->ID);
          $curriculum_vitae = get_field('curriculum_vitae', $member->ID);
          $linkedin = get_field('linkedin', $member->ID); ?>
          <li class="members__items_item item">
            <div class="item__top">
              <p class="item__top_title"><?php echo $member->post_title ?></p>
              <?php if (!empty($linkedin)) {
                echo '<a class="linkedin-social" href="' . $linkedin . '"></a>';
              } ?>
            </div>
            <p class="item__position"><?php echo $post_state; ?></p>
            <p class="item__description"><?php echo $member->post_excerpt; ?></p>

            <?php if (!empty($curriculum_vitae)) {
              echo ' <a href="' . $curriculum_vitae . '" target="_blank" class="item__download">Pobierz Życiorys</a>';
            } ?>
          </li>
        <?php } ?>
      </ul>
    <?php  } ?>
  </div>
</section>
<!-- Members-ps end -->