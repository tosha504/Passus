<?php

/**
 * Search Doscs PS Block template.
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
};

$dokuments = get_field('dokuments'); ?>
<!-- Search-doscs-ps start -->
<section class="search-doscs-ps">
  <div class="container">
    <div class="search-doscs-ps__bar">
      <input type="text" id="searchInput" placeholder="Wyszukaj Dokument">
    </div>
    <?php if (!empty($dokuments) && count($dokuments) > 0) { ?>
      <ul class="search-doscs-ps__items">
        <?php foreach ($dokuments as $key => $dokument) {
          $link = get_field('link', $dokument->ID); ?>
          <li class="search-doscs-ps__items_item item">
            <p class="item__title"><?php echo $dokument->post_title; ?></p>
            <p class="item__descr"><?php echo $dokument->post_excerpt; ?></p>
            <?php if (!empty($link)) { ?><a href="<?php echo $link; ?>" target="_blank" class="item__download">Pobierz</a><?php } ?>
          </li>

        <?php } ?>
      </ul>
    <?php } ?>

    <!-- <div class="search-doscs-ps__more">
      <a href="#" id="loadMoreFile">Załaduj więcej</a>
    </div> -->
  </div>
  <script>
    jQuery(document).ready(function() {
      jQuery('#searchInput').on('input', function() {
        var filter = jQuery(this).val().toLowerCase();
        jQuery('.search-doscs-ps__items_item').each(function() {
          var title = jQuery(this).find('.item__title').text().toLowerCase();
          var descr = jQuery(this).find('.item__descr').text().toLowerCase();
          if (title.includes(filter) || descr.includes(filter)) {
            jQuery(this).show();
          } else {
            jQuery(this).hide();
          }
        });
      });
    });
  </script>
</section><!-- Search-doscs-ps end -->