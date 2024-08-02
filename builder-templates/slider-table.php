<?php

/**
 * Slider table
 *
 * @package  bht-tnl
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$columns = get_sub_field('columns');
$columns_2 = get_sub_field('columns_2'); ?>
<div class="slider-table">
  <div class="container">
    <?php if (!empty($columns) && count($columns) > 0) { ?>
      <div class="slider-table__table">
        <div class="slider-table__table_top">
          <div>Wyniki roczne</div>
          <div><?php
                $link = get_sub_field('link');
                if ($link) :
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
              <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
          </div>
          <div id="controls">
            <button id="prev-btn" aria-label="Previous"></button>
            <button id="next-btn" aria-label="Next"></button>
          </div>
        </div>
        <div class="slider-table__table_body">
          <div class="slider-table__table_body-first">
            <div style="background-color: var(--grey3)">
              <p style="opacity: 0;font-size: 20px;">trait_exists</p>
            </div>
            <div>Sprawozdanie z wyniku i przepływów pieniężnych (dane za okres) Grupy Passus S.A.</div>
            <div>Przychody netto ze sprzedaży</div>
            <div>Zysk (strata) ze sprzedaży</div>
            <div>Amortyzacja</div>
            <div>Zysk (strata) z działalności operacyjnej</div>
            <div>Zysk (strata) brutto</div>
            <div>Zysk (strata) netto </div>
            <div>Zysk (strata) netto jedn. dominującej</div>
            <div>Środki pieniężne netto z działalności operacyjnej</div>
            <div>Środki pieniężne netto z działalności inwestycyjnej</div>
            <div>Środki pieniężne netto z działalności finansowej</div>
            <div>Zmiana netto stanu środków pieniężnych i ich ekwiwalentów</div>

            <div>Sprawozdanie z sytuacji finansowej Grupy Passus S.A.</div>

            <div>Aktywa razem</div>
            <div>Należności długoterminowe</div>
            <div>Należności krótkoterminowe</div>
            <div>Środki pieniężne i inne aktywa pieniężne</div>
            <div>Zobowiązania długoterminowe</div>
            <div>Zobowiązania krótkoterminowe</div>
            <div>Kapitał własny</div>
            <div>Kapitał własny przypadający akcjonariuszom jednostki dominującej</div>
            <div>Kapitał zakładowy</div>
            <div>Liczba akcji (w szt.)</div>
            <div>Zysk (strata) na jedną akcję zwykłą (w zł/EUR)</div>
            <div>Rozwodniony zysk (strata) na jedną akcję zwykłą (w zł/EUR)</div>

          </div>

          <div class="slider-table__table_body-slider">
            <?php foreach ($columns as $key => $column) { ?>
              <div class="wrap">
                <div><?php echo  $column["year"]; ?></div>
                <div>
                  <p style="opacity: 0;">trait_exists</p>
                </div>
                <div><?php echo  $column["col_1"]; ?></div>
                <div><?php echo  $column["col_2"]; ?></div>
                <div><?php echo  $column["col_3"]; ?></div>
                <div><?php echo  $column["col_4"]; ?></div>
                <div><?php echo  $column["col_5"]; ?></div>
                <div><?php echo  $column["col_6"]; ?></div>
                <div><?php echo  $column["col_7"]; ?></div>
                <div><?php echo  $column["col_8"]; ?></div>
                <div><?php echo  $column["col_9"]; ?></div>
                <div><?php echo  $column["col_10"]; ?></div>
                <div><?php echo  $column["col_11"]; ?></div>

                <div>
                  <p style="opacity: 0;">trait_exists</p>
                </div>
                <div><?php echo  $column["col_13"]; ?></div>
                <div><?php echo  $column["col_14"]; ?></div>
                <div><?php echo  $column["col_15"]; ?></div>
                <div><?php echo  $column["col_16"]; ?></div>
                <div><?php echo  $column["col_17"]; ?></div>
                <div><?php echo  $column["col_18"]; ?></div>
                <div><?php echo  $column["col_19"]; ?></div>
                <div><?php echo  $column["col_20"]; ?></div>
                <div><?php echo  $column["col_21"]; ?></div>
                <div><?php echo  $column["col_22"]; ?></div>
                <div><?php echo  $column["col_23"]; ?></div>
                <div><?php echo  $column["col_24"]; ?></div>

              </div>
            <?php } ?>
          </div>

        </div>
      </div>
    <?php } ?>
  </div>
</div>