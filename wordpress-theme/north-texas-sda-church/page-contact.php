<?php
/**
 * Template Name: Contact Page
 *
 * @package North_Texas_SDA_Church
 */

get_header();
?>

<main id="primary" class="site-main">

    <header class="page-header">
        <div class="container">
            <h1 class="page-title"><?php esc_html_e( 'Contact Us', 'north-texas-sda-church' ); ?></h1>
            <p class="page-subtitle"><?php esc_html_e( "We'd love to hear from you. Get in touch with us!", 'north-texas-sda-church' ); ?></p>
        </div>
    </header>

    <section class="contact-section">
        <div class="container">
            <div class="contact-container">
                <div class="contact-info">
                    <h3><?php esc_html_e( 'Get In Touch', 'north-texas-sda-church' ); ?></h3>
                    <div class="contact-details">
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h4><?php esc_html_e( 'Address', 'north-texas-sda-church' ); ?></h4>
                                <?php ntsda_address(); ?>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-text">
                                <h4><?php esc_html_e( 'Phone', 'north-texas-sda-church' ); ?></h4>
                                <?php ntsda_phone(); ?>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <h4><?php esc_html_e( 'Email', 'north-texas-sda-church' ); ?></h4>
                                <?php ntsda_email(); ?>
                            </div>
                        </div>
                    </div>

                    <h4><?php esc_html_e( 'Service Times', 'north-texas-sda-church' ); ?></h4>
                    <div class="service-times">
                        <p><strong><?php esc_html_e( 'Sabbath School:', 'north-texas-sda-church' ); ?></strong> <?php echo esc_html( get_theme_mod( 'ntsda_sabbath_school_time', '9:30 AM' ) ); ?></p>
                        <p><strong><?php esc_html_e( 'Divine Worship:', 'north-texas-sda-church' ); ?></strong> <?php echo esc_html( get_theme_mod( 'ntsda_worship_time', '11:00 AM' ) ); ?></p>
                        <p><strong><?php esc_html_e( 'Prayer Meeting:', 'north-texas-sda-church' ); ?></strong> <?php echo esc_html( get_theme_mod( 'ntsda_prayer_meeting_time', 'Wednesday 7:00 PM' ) ); ?></p>
                    </div>

                    <?php ntsda_social_links(); ?>
                </div>

                <div class="contact-form-wrapper">
                    <h3><?php esc_html_e( 'Send Us a Message', 'north-texas-sda-church' ); ?></h3>
                    <form class="contact-form" id="ntsda-contact-form">
                        <div class="form-row">
                            <input type="text" name="name" placeholder="<?php esc_attr_e( 'Your Name *', 'north-texas-sda-church' ); ?>" required>
                            <input type="email" name="email" placeholder="<?php esc_attr_e( 'Your Email *', 'north-texas-sda-church' ); ?>" required>
                        </div>
                        <div class="form-row">
                            <input type="tel" name="phone" placeholder="<?php esc_attr_e( 'Phone Number', 'north-texas-sda-church' ); ?>">
                            <input type="text" name="subject" placeholder="<?php esc_attr_e( 'Subject', 'north-texas-sda-church' ); ?>">
                        </div>
                        <textarea name="message" placeholder="<?php esc_attr_e( 'Your Message *', 'north-texas-sda-church' ); ?>" rows="6" required></textarea>
                        <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Send Message', 'north-texas-sda-church' ); ?></button>
                    </form>
                    <div class="contact-form-message"></div>
                </div>
            </div>
        </div>
    </section>

    <?php
    $map_url = get_theme_mod( 'ntsda_google_maps' );
    if ( $map_url ) :
    ?>
        <section class="map-section">
            <iframe src="<?php echo esc_url( $map_url ); ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    <?php endif; ?>

</main>

<?php
get_footer();
