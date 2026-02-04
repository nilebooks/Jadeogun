<?php
/**
 * Footer Template
 *
 * @package North_Texas_SDA_Church
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

    <!-- Footer Section -->
    <footer class="site-footer" data-scroll-section>
        <div class="container">
            <div class="footer-container">
                <!-- Stay Connected Column -->
                <div class="footer-column">
                    <h3 class="footer-title"><?php esc_html_e( 'Stay Connected', 'north-texas-sda-church' ); ?></h3>
                    <p class="footer-text"><?php esc_html_e( 'Get updates on events and inspiration.', 'north-texas-sda-church' ); ?></p>
                    <form class="footer-subscribe" id="newsletter-form">
                        <input type="email" class="footer-input" name="email" placeholder="<?php esc_attr_e( 'Email*', 'north-texas-sda-church' ); ?>" required>
                        <button type="submit" class="footer-button"><?php esc_html_e( 'Subscribe', 'north-texas-sda-church' ); ?></button>
                    </form>
                </div>

                <!-- Pages Column -->
                <div class="footer-column">
                    <h3 class="footer-title"><?php esc_html_e( 'Pages', 'north-texas-sda-church' ); ?></h3>
                    <?php
                    if ( has_nav_menu( 'footer' ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-links',
                            'container'      => false,
                            'depth'          => 1,
                        ) );
                    } else {
                        ?>
                        <ul class="footer-links">
                            <li class="footer-link-item"><a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="footer-link"><?php esc_html_e( 'About Us', 'north-texas-sda-church' ); ?></a></li>
                            <li class="footer-link-item"><a href="<?php echo esc_url( get_post_type_archive_link( 'ministry' ) ); ?>" class="footer-link"><?php esc_html_e( 'Ministries', 'north-texas-sda-church' ); ?></a></li>
                            <li class="footer-link-item"><a href="<?php echo esc_url( get_post_type_archive_link( 'sermon' ) ); ?>" class="footer-link"><?php esc_html_e( 'Sermons', 'north-texas-sda-church' ); ?></a></li>
                            <li class="footer-link-item"><a href="<?php echo esc_url( get_post_type_archive_link( 'event' ) ); ?>" class="footer-link"><?php esc_html_e( 'Events', 'north-texas-sda-church' ); ?></a></li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>

                <!-- Location Column -->
                <div class="footer-column">
                    <h3 class="footer-title"><?php esc_html_e( 'Location', 'north-texas-sda-church' ); ?></h3>
                    <?php ntsda_address(); ?>
                </div>

                <!-- Contact Column -->
                <div class="footer-column">
                    <h3 class="footer-title"><?php esc_html_e( 'Contact', 'north-texas-sda-church' ); ?></h3>
                    <div class="footer-contact-info">
                        <?php ntsda_phone(); ?>
                        <?php ntsda_email(); ?>
                    </div>
                    <?php ntsda_social_links(); ?>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-logo">
                    <?php ntsda_site_logo(); ?>
                    <div class="footer-logo-text">
                        <?php
                        $church_name = get_theme_mod( 'ntsda_church_name', 'North Texas SDA Church' );
                        $name_parts = explode( ' ', $church_name, 2 );
                        ?>
                        <span class="footer-logo-title"><?php echo esc_html( $name_parts[0] ?? 'North Texas' ); ?></span>
                        <span class="footer-logo-subtitle"><?php echo esc_html( $name_parts[1] ?? 'SDA Church' ); ?></span>
                    </div>
                </div>
                <div class="footer-copyright">
                    <span>&copy; <?php echo esc_html( date( 'Y' ) ); ?> - <?php esc_html_e( 'All Rights Reserved', 'north-texas-sda-church' ); ?></span>
                    <span class="footer-developer"><?php esc_html_e( 'Designed and Developed by', 'north-texas-sda-church' ); ?> <a href="https://adventtech.ca/">Advent Tech</a></span>
                </div>
            </div>
        </div>
    </footer>

</div><!-- End of scroll-container -->

<?php wp_footer(); ?>
</body>
</html>
