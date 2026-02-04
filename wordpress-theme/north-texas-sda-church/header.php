<?php
/**
 * Header Template
 *
 * @package North_Texas_SDA_Church
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="scroll-container" data-scroll-container>
    <header class="site-header" id="site-header">
        <div class="container">
            <div class="header-container">
                <div class="site-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php ntsda_site_logo(); ?>
                        <span class="logo-text">
                            <?php
                            $church_name = get_theme_mod( 'ntsda_church_name', 'North Texas SDA Church' );
                            $name_parts = explode( ' ', $church_name, 2 );
                            if ( count( $name_parts ) >= 2 ) {
                                echo esc_html( $name_parts[0] ) . '<br>' . esc_html( $name_parts[1] );
                            } else {
                                echo esc_html( $church_name );
                            }
                            ?>
                        </span>
                    </a>
                </div>

                <nav class="nav-menu" id="nav-menu">
                    <?php
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'nav-list',
                            'container'      => false,
                            'walker'         => new NTSDA_Walker_Nav_Menu(),
                            'fallback_cb'    => false,
                        ) );
                    } else {
                        // Default menu if no menu is assigned
                        ?>
                        <ul class="nav-list">
                            <li class="nav-item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-link"><?php esc_html_e( 'HOME', 'north-texas-sda-church' ); ?></a></li>
                            <li class="nav-item menu-item-has-children">
                                <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="nav-link"><?php esc_html_e( 'ABOUT US', 'north-texas-sda-church' ); ?>
                                    <span class="mobile-dropdown-toggle"><i class="fas fa-plus"></i></span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo esc_url( get_post_type_archive_link( 'ministry' ) ); ?>"><?php esc_html_e( 'Our Ministries', 'north-texas-sda-church' ); ?></a></li>
                                    <li><a href="<?php echo esc_url( get_post_type_archive_link( 'team_member' ) ); ?>"><?php esc_html_e( 'Our Team', 'north-texas-sda-church' ); ?></a></li>
                                    <li><a href="<?php echo esc_url( get_post_type_archive_link( 'gallery' ) ); ?>"><?php esc_html_e( 'Gallery', 'north-texas-sda-church' ); ?></a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="<?php echo esc_url( get_post_type_archive_link( 'sermon' ) ); ?>" class="nav-link"><?php esc_html_e( 'SERMONS', 'north-texas-sda-church' ); ?></a></li>
                            <li class="nav-item"><a href="<?php echo esc_url( get_post_type_archive_link( 'event' ) ); ?>" class="nav-link"><?php esc_html_e( 'EVENTS', 'north-texas-sda-church' ); ?></a></li>
                            <li class="nav-item"><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="nav-link"><?php esc_html_e( 'BLOG', 'north-texas-sda-church' ); ?></a></li>
                            <li class="nav-item"><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="nav-link"><?php esc_html_e( 'CONTACT', 'north-texas-sda-church' ); ?></a></li>
                        </ul>
                        <?php
                    }
                    ?>
                    <div class="mobile-close">
                        <i class="fas fa-times"></i>
                    </div>
                </nav>

                <div class="header-buttons">
                    <a href="#" class="btn btn-secondary" id="prayer-request-btn"><?php esc_html_e( 'PRAYER REQUEST', 'north-texas-sda-church' ); ?></a>
                    <a href="<?php echo esc_url( get_theme_mod( 'ntsda_donation_url', 'https://adventistgiving.org/donate/ANWFHL' ) ); ?>" class="btn btn-primary" target="_blank"><?php esc_html_e( 'DONATE', 'north-texas-sda-church' ); ?></a>
                </div>

                <div class="mobile-toggle">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Prayer Request Modal -->
    <div class="prayer-modal-overlay" id="prayer-modal">
        <div class="prayer-modal">
            <button class="prayer-modal-close" id="prayer-modal-close">&times;</button>
            <h2 class="prayer-modal-title"><?php esc_html_e( 'Prayer Request', 'north-texas-sda-church' ); ?></h2>
            <form class="prayer-form" id="prayer-request-form">
                <input type="text" name="name" placeholder="<?php esc_attr_e( 'Your Name *', 'north-texas-sda-church' ); ?>" required>
                <input type="email" name="email" placeholder="<?php esc_attr_e( 'Your Email *', 'north-texas-sda-church' ); ?>" required>
                <textarea name="request" placeholder="<?php esc_attr_e( 'Your Prayer Request *', 'north-texas-sda-church' ); ?>" required></textarea>
                <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Submit Request', 'north-texas-sda-church' ); ?></button>
            </form>
        </div>
    </div>
