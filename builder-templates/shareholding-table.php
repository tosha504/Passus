<?php

/**
 * Shareholding table
 *
 * @package  bht-tnl
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$columns = get_sub_field('columns'); ?>
<div class="shareholding-table">
  <div class="container">
    <?php if (!empty($columns) && count($columns) > 0) { ?>
      <div class="shareholding-table__table">
        <div class="shareholding-table__table_header">
          <div>Akcjonariusz</div>
          <div>Liczba akcji</div>
          <div>Udział w kapitale</div>
          <div>Liczba głosów</div>
          <div>Udział w głosach</div>
        </div>
        <div class="shareholding-table__table_body">
          <?php foreach ($columns as $key => $column) { ?>
            <div class="shareholding-table__table_body-row">
              <div><?php echo $column['shareholder']; ?></div>
              <div><?php echo $column['number_of_shares']; ?></div>
              <div><?php echo $column['share_in_capital']; ?></div>
              <div><?php echo $column['number_of_votes']; ?></div>
              <div><?php echo $column['share_of_vote']; ?></div>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  </div>
</div>