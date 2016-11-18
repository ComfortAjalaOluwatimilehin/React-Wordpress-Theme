<!DOCTYPE html>
  <html>
    <head>
        <title><?php echo wp_title("");?></title>
        <?php do_action("wp_head"); ?>
    </head>
    <body>
    <div id="header_space" style="height='<?php echo get_custom_header()->height;?>'"></div>
