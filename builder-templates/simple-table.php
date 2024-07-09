<?php

/**
 * Simple table
 *
 * @package  bht-tnl
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$columns = get_sub_field('columns'); ?>
<div class="simple-table">
  <div class="container">
    <?php if (!empty($columns) && count($columns) > 0) { ?>
      <div class="simple-table__table">
        <div>Podstawowe Informacje</div>
        <?php foreach ($columns as $key => $column) { ?>
          <div>
            <p><?php echo $column['left_column']; ?></p>
            <p><?php echo $column['right_column']; ?></p>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</div>