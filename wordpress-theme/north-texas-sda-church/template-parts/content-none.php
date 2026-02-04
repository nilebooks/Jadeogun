<?php
/**
 * Template part for displaying a message when no posts are found
 *
 * @package North_Texas_SDA_Church
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'north-texas-sda-church' ); ?></h1>
    </header>

    <div class="page-content">
        <?php if ( is_search() ) : ?>
            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'north-texas-sda-church' ); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php esc_html_e( "It seems we can't find what you're looking for. Perhaps searching can help.", 'north-texas-sda-church' ); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</section>
