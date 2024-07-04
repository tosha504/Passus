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
$tag_kopia = get_field('tag_kopia');
$text_title_kopia = get_field('text_title_kopia');

$description = '<div class="text-descr-image-ps__descr">' . get_field('description') . '</div>';
$image = get_field('image'); ?>
<!-- Text-descr-image-ps start -->
<section class="text-descr-image-ps">
  <div class="container">
    <div class="text-descr-image-ps__left">
      <?php show_title_and_btn($tag_kopia, $text_title_kopia);
      echo $description; ?>
    </div>
    <div class="text-descr-image-ps__right">
      <?php my_custom_attachment_image($image); ?>
    </div>
  </div>

</section><!-- Text-descr-image-ps end -->

<!-- Members-ps start -->
<section class="members">
  <div class="container">
    <ul class="members__items">
      <li class="members__items_item item">
        <div class="item__top">
          <p class="item__top_title">Tadeusz Dudek</p>
          <a class="linkedin-social" href="#"></a>
        </div>
        <p class="item__position">Prezes Zarządu</p>
        <p class="item__description">
          Tadeusz Dudek jest jednym z założycieli Spółki i od początku jej istnienia, czyli od lipca 2014 nieprzerwanie
          pełni funkcję Prezesa Zarządu Spółki.
        </p>
        <a href="#" class="item__download">Pobierz Życiorys</a>
      </li>

      <li class="members__items_item item">
        <div class="item__top">
          <p class="item__top_title">Tadeusz Dudek</p>
          <a class="linkedin-social" href="#"></a>
        </div>
        <p class="item__position">Prezes Zarządu</p>
        <p class="item__description">
          Bartosz Dzirba od lipca 2014 r. pełni funkcję dyrektora działu technicznego oraz wchodzi w skład Zarządu,
          początkowo jako Członek Zarządu, od dnia 12 października 2021 r. został awansowany na stanowisko Wiceprezesa
          Zarządu
        </p>
        <a href="#" class="item__download">Pobierz Życiorys</a>
      </li>

      <li class="members__items_item item">
        <div class="item__top">
          <p class="item__top_title">Tadeusz Dudek</p>
          <a class="linkedin-social" href="#"></a>
        </div>
        <p class="item__position">Prezes Zarządu</p>
        <p class="item__description">
          Łukasz Bieńko pełni funkcję Członka Zarządu oraz dyrektora ds. badań i rozwoju w Spółce od 2014 roku. W ramach
          Grupy Emitenta jest liderem segmentu Produkty Własne oraz odpowiada za prace badawczo-rozwojowe.
        </p>
        <a href="#" class="item__download">Pobierz Życiorys</a>
      </li>

      <li class="members__items_item item">
        <div class="item__top">
          <p class="item__top_title">Tadeusz Dudek</p>
          Linkedin
        </div>
        <p class="item__position">Prezes Zarządu</p>
        <p class="item__description">
          Michał Czernikow jest jednym z założycieli Spółki i od początku jej istnienia tj. od
          22.07.2014 roku pełni funkcję Członka Zarządu.
        </p>
        <a href="#" class="item__download">Pobierz Życiorys</a>
      </li>

      <li class="members__items_item item">
        <div class="item__top">
          <p class="item__top_title">Tadeusz Dudek</p>
          Linkedin
        </div>
        <p class="item__position">Prezes Zarządu</p>
        <p class="item__description">
          Dorota Deręg pełni funkcję członka Zarządu od 1 lutego 2023 roku. Współpracę z
          Passus S.A. rozpoczęła w lutym 2022 roku kiedy to objęła stanowisko Dyrektora
          Finansowego. Posiada dwudziestoletnie doświadczenie zawodowe.
        </p>
        <a href="#" class="item__download">Pobierz Życiorys</a>
      </li>

      <li class="members__items_item item">
        <div class="item__top">
          <p class="item__top_title">Tadeusz Dudek</p>
          Linkedin
        </div>
        <p class="item__position">Prezes Zarządu</p>
        <p class="item__description">
          Dariusz Kostanek od 2014 r. pełni funkcję Członka Zarządu oraz dyrektora ds.
          marketingu w Spółce. W ramach Grupy odpowiada za za segment Usługi AWS,
          rozwijany przez Chaos Gears S.A., w której pełni funkcję Członka Zarządu.
        </p>
        <a href="#" class="item__download">Pobierz Życiorys</a>
      </li>


    </ul>
  </div>
</section>
<!-- Members-ps end -->