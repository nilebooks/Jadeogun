<?php
/**
 * Sidebar Template
 *
 * @package North_Texas_SDA_Church
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! is_active_sidebar( 'sidebar-blog' ) ) {
    return;
}
?>

<aside id="secondary" class="sidebar">
    <?php dynamic_sidebar( 'sidebar-blog' ); ?>
</aside>
