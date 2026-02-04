<?php
/**
 * Shortcodes
 *
 * @package North_Texas_SDA_Church
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Upcoming Events Shortcode
 * Usage: [upcoming_events count="3"]
 */
function ntsda_upcoming_events_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'count' => 3,
    ), $atts, 'upcoming_events' );

    $events = ntsda_get_upcoming_events( intval( $atts['count'] ) );

    if ( ! $events->have_posts() ) {
        return '<p>' . esc_html__( 'No upcoming events.', 'north-texas-sda-church' ) . '</p>';
    }

    ob_start();
    ?>
    <div class="modern-events-container">
        <?php while ( $events->have_posts() ) : $events->the_post(); ?>
            <?php
            $event_date = get_post_meta( get_the_ID(), '_event_date', true );
            $start_time = get_post_meta( get_the_ID(), '_event_start_time', true );
            $end_time   = get_post_meta( get_the_ID(), '_event_end_time', true );
            $date_obj   = $event_date ? new DateTime( $event_date ) : new DateTime();
            ?>
            <div class="modern-event-card">
                <div class="modern-event-left">
                    <div class="modern-event-date">
                        <span class="modern-event-day-name"><?php echo esc_html( $date_obj->format( 'D' ) ); ?></span>
                        <span class="modern-event-day"><?php echo esc_html( $date_obj->format( 'd' ) ); ?></span>
                        <span class="modern-event-month"><?php echo esc_html( $date_obj->format( 'M' ) ); ?></span>
                    </div>
                </div>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="modern-event-image">
                        <?php the_post_thumbnail( 'ntsda-event' ); ?>
                    </div>
                <?php endif; ?>
                <div class="modern-event-content">
                    <h3 class="modern-event-title"><?php the_title(); ?></h3>
                    <p class="modern-event-description"><?php echo wp_trim_words( get_the_excerpt(), 25 ); ?></p>
                    <div class="modern-event-details">
                        <p class="modern-event-time">
                            <?php
                            echo esc_html( strtoupper( $date_obj->format( 'M d' ) ) );
                            if ( $start_time ) {
                                echo ' @ ' . esc_html( $start_time );
                                if ( $end_time ) {
                                    echo ' - ' . esc_html( $end_time );
                                }
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="modern-event-action">
                    <a href="<?php the_permalink(); ?>" class="modern-event-button"><?php esc_html_e( 'VIEW DETAILS', 'north-texas-sda-church' ); ?></a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode( 'upcoming_events', 'ntsda_upcoming_events_shortcode' );

/**
 * Featured Sermons Shortcode
 * Usage: [featured_sermons count="3"]
 */
function ntsda_featured_sermons_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'count' => 3,
    ), $atts, 'featured_sermons' );

    $sermons = ntsda_get_featured_sermons( intval( $atts['count'] ) );

    if ( ! $sermons->have_posts() ) {
        return '<p>' . esc_html__( 'No sermons found.', 'north-texas-sda-church' ) . '</p>';
    }

    ob_start();
    ?>
    <div class="featured-sermons-container">
        <?php while ( $sermons->have_posts() ) : $sermons->the_post(); ?>
            <div class="featured-sermon-card">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="featured-sermon-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'ntsda-sermon' ); ?>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="featured-sermon-date"><?php echo esc_html( strtoupper( get_the_date( 'F j, Y' ) ) ); ?></div>
                <h3 class="featured-sermon-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="featured-sermon-author">
                    <?php
                    $speaker = get_post_meta( get_the_ID(), '_sermon_speaker', true );
                    if ( $speaker ) :
                    ?>
                        <div class="featured-sermon-author-name"><?php echo esc_html( $speaker ); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode( 'featured_sermons', 'ntsda_featured_sermons_shortcode' );

/**
 * Team Members Shortcode
 * Usage: [team_members count="4"]
 */
function ntsda_team_members_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'count' => -1,
    ), $atts, 'team_members' );

    $args = array(
        'post_type'      => 'team_member',
        'posts_per_page' => intval( $atts['count'] ),
        'meta_key'       => '_team_member_order',
        'orderby'        => 'meta_value_num',
        'order'          => 'ASC',
    );

    $team = new WP_Query( $args );

    if ( ! $team->have_posts() ) {
        return '<p>' . esc_html__( 'No team members found.', 'north-texas-sda-church' ) . '</p>';
    }

    ob_start();
    ?>
    <div class="team-container">
        <?php while ( $team->have_posts() ) : $team->the_post(); ?>
            <div class="team-member">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="team-member-image">
                        <?php the_post_thumbnail( 'ntsda-team' ); ?>
                    </div>
                <?php endif; ?>
                <div class="team-member-info">
                    <h3 class="team-member-name"><?php the_title(); ?></h3>
                    <?php
                    $role = get_post_meta( get_the_ID(), '_team_member_role', true );
                    if ( $role ) :
                    ?>
                        <p class="team-member-role"><?php echo esc_html( $role ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode( 'team_members', 'ntsda_team_members_shortcode' );

/**
 * Ministries Shortcode
 * Usage: [ministries count="4"]
 */
function ntsda_ministries_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'count' => 4,
    ), $atts, 'ministries' );

    $args = array(
        'post_type'      => 'ministry',
        'posts_per_page' => intval( $atts['count'] ),
    );

    $ministries = new WP_Query( $args );

    if ( ! $ministries->have_posts() ) {
        return '<p>' . esc_html__( 'No ministries found.', 'north-texas-sda-church' ) . '</p>';
    }

    ob_start();
    ?>
    <div class="ministries-container">
        <?php while ( $ministries->have_posts() ) : $ministries->the_post(); ?>
            <div class="ministry-card">
                <div class="ministry-image">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'ntsda-ministry' ); ?>
                    <?php endif; ?>
                    <div class="ministry-overlay"></div>
                    <h3 class="ministry-title"><?php the_title(); ?></h3>
                    <a href="<?php the_permalink(); ?>" class="ministry-link">
                        <?php esc_html_e( 'LEARN MORE', 'north-texas-sda-church' ); ?> <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode( 'ministries', 'ntsda_ministries_shortcode' );

/**
 * Contact Info Shortcode
 * Usage: [contact_info]
 */
function ntsda_contact_info_shortcode() {
    ob_start();
    ?>
    <div class="contact-info-shortcode">
        <div class="contact-item">
            <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
            <div class="contact-text">
                <h4><?php esc_html_e( 'Address', 'north-texas-sda-church' ); ?></h4>
                <?php ntsda_address(); ?>
            </div>
        </div>
        <div class="contact-item">
            <div class="contact-icon"><i class="fas fa-phone"></i></div>
            <div class="contact-text">
                <h4><?php esc_html_e( 'Phone', 'north-texas-sda-church' ); ?></h4>
                <?php ntsda_phone(); ?>
            </div>
        </div>
        <div class="contact-item">
            <div class="contact-icon"><i class="fas fa-envelope"></i></div>
            <div class="contact-text">
                <h4><?php esc_html_e( 'Email', 'north-texas-sda-church' ); ?></h4>
                <?php ntsda_email(); ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'contact_info', 'ntsda_contact_info_shortcode' );

/**
 * Service Times Shortcode
 * Usage: [service_times]
 */
function ntsda_service_times_shortcode() {
    $sabbath_school = get_theme_mod( 'ntsda_sabbath_school_time', '9:30 AM' );
    $worship        = get_theme_mod( 'ntsda_worship_time', '11:00 AM' );
    $prayer_meeting = get_theme_mod( 'ntsda_prayer_meeting_time', 'Wednesday 7:00 PM' );

    ob_start();
    ?>
    <div class="service-times-shortcode">
        <div class="service-time-item">
            <i class="fas fa-book-open"></i>
            <h4><?php esc_html_e( 'Sabbath School', 'north-texas-sda-church' ); ?></h4>
            <p><?php echo esc_html( $sabbath_school ); ?></p>
        </div>
        <div class="service-time-item">
            <i class="fas fa-church"></i>
            <h4><?php esc_html_e( 'Divine Worship', 'north-texas-sda-church' ); ?></h4>
            <p><?php echo esc_html( $worship ); ?></p>
        </div>
        <div class="service-time-item">
            <i class="fas fa-pray"></i>
            <h4><?php esc_html_e( 'Prayer Meeting', 'north-texas-sda-church' ); ?></h4>
            <p><?php echo esc_html( $prayer_meeting ); ?></p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'service_times', 'ntsda_service_times_shortcode' );

/**
 * Countdown Shortcode
 * Usage: [countdown]
 */
function ntsda_countdown_shortcode() {
    $next_saturday = ntsda_get_next_saturday();

    ob_start();
    ?>
    <div class="countdown-section-shortcode" data-target="<?php echo esc_attr( $next_saturday ); ?>">
        <div class="countdown-timer">
            <div class="countdown-item">
                <div class="countdown-number" id="countdown-days">00</div>
                <div class="countdown-label"><?php esc_html_e( 'DAYS', 'north-texas-sda-church' ); ?></div>
            </div>
            <div class="countdown-separator">:</div>
            <div class="countdown-item">
                <div class="countdown-number" id="countdown-hours">00</div>
                <div class="countdown-label"><?php esc_html_e( 'HOURS', 'north-texas-sda-church' ); ?></div>
            </div>
            <div class="countdown-separator">:</div>
            <div class="countdown-item">
                <div class="countdown-number" id="countdown-minutes">00</div>
                <div class="countdown-label"><?php esc_html_e( 'MINUTES', 'north-texas-sda-church' ); ?></div>
            </div>
            <div class="countdown-separator">:</div>
            <div class="countdown-item">
                <div class="countdown-number" id="countdown-seconds">00</div>
                <div class="countdown-label"><?php esc_html_e( 'SECONDS', 'north-texas-sda-church' ); ?></div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'countdown', 'ntsda_countdown_shortcode' );

/**
 * Social Links Shortcode
 * Usage: [social_links]
 */
function ntsda_social_links_shortcode() {
    ob_start();
    ntsda_social_links();
    return ob_get_clean();
}
add_shortcode( 'social_links', 'ntsda_social_links_shortcode' );

/**
 * Prayer Request Form Shortcode
 * Usage: [prayer_request_form]
 */
function ntsda_prayer_request_form_shortcode() {
    ob_start();
    ?>
    <div class="prayer-form-container">
        <form class="prayer-form" id="prayer-request-form">
            <input type="text" name="name" placeholder="<?php esc_attr_e( 'Your Name *', 'north-texas-sda-church' ); ?>" required>
            <input type="email" name="email" placeholder="<?php esc_attr_e( 'Your Email *', 'north-texas-sda-church' ); ?>" required>
            <textarea name="request" placeholder="<?php esc_attr_e( 'Your Prayer Request *', 'north-texas-sda-church' ); ?>" rows="6" required></textarea>
            <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Submit Prayer Request', 'north-texas-sda-church' ); ?></button>
        </form>
        <div class="prayer-form-message"></div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'prayer_request_form', 'ntsda_prayer_request_form_shortcode' );

/**
 * Contact Form Shortcode
 * Usage: [contact_form]
 */
function ntsda_contact_form_shortcode() {
    ob_start();
    ?>
    <div class="contact-form-container">
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
    <?php
    return ob_get_clean();
}
add_shortcode( 'contact_form', 'ntsda_contact_form_shortcode' );

/**
 * Google Map Shortcode
 * Usage: [google_map]
 */
function ntsda_google_map_shortcode() {
    $map_url = get_theme_mod( 'ntsda_google_maps' );

    if ( ! $map_url ) {
        return '';
    }

    return '<div class="map-section"><iframe src="' . esc_url( $map_url ) . '" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>';
}
add_shortcode( 'google_map', 'ntsda_google_map_shortcode' );

/**
 * Button Shortcode
 * Usage: [button text="Learn More" url="/about" style="primary"]
 */
function ntsda_button_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'text'   => 'Learn More',
        'url'    => '#',
        'style'  => 'primary',
        'target' => '_self',
    ), $atts, 'button' );

    $class = 'btn btn-' . sanitize_html_class( $atts['style'] );

    return '<a href="' . esc_url( $atts['url'] ) . '" class="' . esc_attr( $class ) . '" target="' . esc_attr( $atts['target'] ) . '">' . esc_html( $atts['text'] ) . '</a>';
}
add_shortcode( 'button', 'ntsda_button_shortcode' );
