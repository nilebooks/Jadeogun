<?php
/**
 * Search Form Template
 *
 * @package North_Texas_SDA_Church
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label class="screen-reader-text" for="search-field"><?php esc_html_e( 'Search for:', 'north-texas-sda-church' ); ?></label>
    <input type="search" id="search-field" class="search-field" placeholder="<?php esc_attr_e( 'Search...', 'north-texas-sda-church' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
    <button type="submit" class="search-submit">
        <i class="fas fa-search"></i>
        <span class="screen-reader-text"><?php esc_html_e( 'Search', 'north-texas-sda-church' ); ?></span>
    </button>
</form>
