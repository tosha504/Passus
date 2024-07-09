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
}; ?>
<!-- Search-doscs-ps start -->
<section class="search-doscs-ps">
  <div class="container">
    <div class="search-doscs-ps__bar">
      <input type="text" id="searchInput" placeholder="Wyszukaj Dokument">
    </div>
    <ul class="search-doscs-ps__items">
      <li class="search-doscs-ps__items_item item">
        <p class="item__title">File name
        </p>
        <p class="item__descr">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, voluptas.</p>
        <a href="" class="item__download">Pobierz</a>
      </li>
      <li class="search-doscs-ps__items_item item">
        <p class="item__title">File name
        </p>
        <p class="item__descr">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, voluptas.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, voluptas.</p>
        <a href="" class="item__download">Pobierz</a>
      </li>
      <li class="search-doscs-ps__items_item item">
        <p class="item__title">File name
        </p>
        <p class="item__descr">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, voluptas.</p>
        <a href="" class="item__download">Pobierz</a>
      </li>
      <li class="search-doscs-ps__items_item item">
        <p class="item__title">File name
        </p>
        <p class="item__descr">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, voluptas.</p>
        <a href="" class="item__download">Pobierz</a>
      </li>
      <li class="search-doscs-ps__items_item item">
        <p class="item__title">File name
        </p>
        <p class="item__descr">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, voluptas.</p>
        <a href="" class="item__download">Pobierz</a>
      </li>
      <li class="search-doscs-ps__items_item item">
        <p class="item__title">File name
        </p>
        <p class="item__descr">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, voluptas.</p>
        <a href="" class="item__download">Pobierz</a>
      </li>
      <li class="search-doscs-ps__items_item item">
        <p class="item__title">File name
        </p>
        <p class="item__descr">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, voluptas.</p>
        <a href="" class="item__download">Pobierz</a>
      </li>
      <li class="search-doscs-ps__items_item item">
        <p class="item__title">File name
        </p>
        <p class="item__descr">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, voluptas.</p>
        <a href="" class="item__download">Pobierz</a>
      </li>
      <li class="search-doscs-ps__items_item item">
        <p class="item__title">File name
        </p>
        <p class="item__descr">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, voluptas.</p>
        <a href="" class="item__download">Pobierz</a>
      </li>
    </ul>
    <div class="search-doscs-ps__more">
      <a href="#" id="loadMoreFile">Załaduj więcej</a>
    </div>
  </div>

</section><!-- Search-doscs-ps end -->