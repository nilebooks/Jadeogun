<?php
/**
 * Front Page Template
 *
 * @package North_Texas_SDA_Church
 */

get_header();

// Get customizer values
$hero_title_1    = get_theme_mod( 'ntsda_hero_title_1', 'YOUR' );
$hero_title_2    = get_theme_mod( 'ntsda_hero_title_2', 'COMMUNITY.' );
$hero_title_3    = get_theme_mod( 'ntsda_hero_title_3', 'YOUR CHURCH.' );
$hero_subtitle   = get_theme_mod( 'ntsda_hero_subtitle', 'A Place where you can Worship and get Involved' );
$hero_video      = get_theme_mod( 'ntsda_hero_video' );
$hero_image      = get_theme_mod( 'ntsda_hero_image' );
$youtube_url     = get_theme_mod( 'ntsda_youtube_url', 'https://www.youtube.com/channel/UC2Ha7c6bwtYnsfk1uVi3fPA' );
$donation_url    = get_theme_mod( 'ntsda_donation_url', 'https://adventistgiving.org/donate/ANWFHL' );
$next_saturday   = ntsda_get_next_saturday();
?>

<!-- Hero Section -->
<section class="hero-section" id="hero" data-scroll-section>
    <div class="video-background">
        <?php if ( $hero_video ) : ?>
            <video autoplay muted loop id="hero-video">
                <source src="<?php echo esc_url( wp_get_attachment_url( $hero_video ) ); ?>" type="video/mp4">
                <?php esc_html_e( 'Your browser does not support the video tag.', 'north-texas-sda-church' ); ?>
            </video>
        <?php elseif ( $hero_image ) : ?>
            <img src="<?php echo esc_url( $hero_image ); ?>" alt="<?php esc_attr_e( 'Hero Background', 'north-texas-sda-church' ); ?>">
        <?php else : ?>
            <div style="background: linear-gradient(135deg, #1d1d1d, #3e4e3e); width: 100%; height: 100%;"></div>
        <?php endif; ?>
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                <?php echo esc_html( $hero_title_1 ); ?><br>
                <?php echo esc_html( $hero_title_2 ); ?><br>
                <span class="highlight"><?php echo esc_html( $hero_title_3 ); ?></span>
            </h1>
            <p class="hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></p>
            <div class="hero-buttons">
                <div class="hero-buttons-row">
                    <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'JOIN US THIS SATURDAY', 'north-texas-sda-church' ); ?></a>
                    <a href="<?php echo esc_url( $youtube_url ); ?>" target="_blank" class="btn btn-outline"><?php esc_html_e( 'WATCH LIVE', 'north-texas-sda-church' ); ?></a>
                </div>
                <div class="hero-buttons-row">
                    <a href="https://adventist.org/beliefs" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'What We Believe', 'north-texas-sda-church' ); ?></a>
                    <a href="https://adventist.org/identity" target="_blank" class="btn btn-secondary"><?php esc_html_e( 'Who We Are', 'north-texas-sda-church' ); ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Countdown Band -->
<section class="countdown-band" data-target="<?php echo esc_attr( $next_saturday ); ?>">
    <p><?php esc_html_e( 'Next service scheduled in', 'north-texas-sda-church' ); ?></p>
    <div class="countdown-item">
        <div class="countdown-number" id="countdown-days">00</div>
        <div class="countdown-label"><?php esc_html_e( 'Days', 'north-texas-sda-church' ); ?></div>
    </div>
    <div class="countdown-separator">:</div>
    <div class="countdown-item">
        <div class="countdown-number" id="countdown-hours">00</div>
        <div class="countdown-label"><?php esc_html_e( 'Hours', 'north-texas-sda-church' ); ?></div>
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
</section>

<!-- Welcome Section -->
<section class="welcome-section" data-scroll-section>
    <div class="container">
        <?php
        $welcome_image = get_theme_mod( 'ntsda_welcome_image' );
        if ( $welcome_image ) :
        ?>
            <img src="<?php echo esc_url( $welcome_image ); ?>" class="welcome-image" alt="<?php esc_attr_e( 'Church Interior', 'north-texas-sda-church' ); ?>" data-scroll>
        <?php endif; ?>

        <div class="welcome-container">
            <div class="welcome-content" data-scroll>
                <h2 class="section-title"><?php echo esc_html( get_theme_mod( 'ntsda_welcome_title', 'WELCOME TO NORTH TEXAS SDA CHURCH' ) ); ?></h2>
                <p class="welcome-text"><?php echo wp_kses_post( get_theme_mod( 'ntsda_welcome_text', 'We are a Bible-believing community and would love to have you join our family. To learn more about what we believe you can visit the About Us page on this site. Please join us for Bible study, worship, and prayer.' ) ); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- About/Pastor Section -->
<section class="about-section" data-scroll-section>
    <div class="container">
        <div class="about-container">
            <?php
            $pastor_image = get_theme_mod( 'ntsda_pastor_image' );
            if ( $pastor_image ) :
            ?>
                <img src="<?php echo esc_url( $pastor_image ); ?>" class="about-image" alt="<?php echo esc_attr( get_theme_mod( 'ntsda_pastor_name', 'Pastor' ) ); ?>">
            <?php else : ?>
                <img src="<?php echo esc_url( NTSDA_THEME_URI . '/assets/images/pastor-placeholder.jpg' ); ?>" class="about-image" alt="<?php esc_attr_e( 'Pastor', 'north-texas-sda-church' ); ?>">
            <?php endif; ?>
            
            <div class="about-content" data-scroll>
                <div class="about-header">
                    <h3 class="about-subtitle"><?php esc_html_e( 'Welcome Message from Pastor', 'north-texas-sda-church' ); ?></h3>
                    <h2 class="about-title"><?php esc_html_e( 'Welcome to North Texas Seventh-day Adventist Church!', 'north-texas-sda-church' ); ?></h2>
                </div>
                <div class="about-text">
                    <p><?php echo wp_kses_post( get_theme_mod( 'ntsda_pastor_message', "We're so glad you're here. I'm Pastor " . get_theme_mod( 'ntsda_pastor_name', 'Denton W. Rhone' ) . ", and I warmly invite you to be part of a growing, Spirit-led church family where you can serve, grow, and belong. At NTSDA, we're passionate about sharing Christ's love through worship, outreach, and community." ) ); ?></p>
                    <div class="about-button">
                        <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'ABOUT US', 'north-texas-sda-church' ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission, Vision, Values Section -->
<section class="mvv-section" data-scroll-section>
    <div class="container">
        <div class="mvv-container" data-scroll>
            <div class="mvv-box">
                <h3 class="mvv-title"><?php esc_html_e( 'Our Mission', 'north-texas-sda-church' ); ?></h3>
                <p class="mvv-text"><?php echo esc_html( get_theme_mod( 'ntsda_mission', "To share the love of Christ and prepare lives for Christ's soon return." ) ); ?></p>
            </div>
            <div class="mvv-box">
                <h3 class="mvv-title"><?php esc_html_e( 'Our Vision', 'north-texas-sda-church' ); ?></h3>
                <p class="mvv-text"><?php echo esc_html( get_theme_mod( 'ntsda_vision', 'A world transformed by the everlasting gospel and faithful living.' ) ); ?></p>
            </div>
            <div class="mvv-box">
                <h3 class="mvv-title"><?php esc_html_e( 'Our Values', 'north-texas-sda-church' ); ?></h3>
                <p class="mvv-text"><?php echo esc_html( get_theme_mod( 'ntsda_values', 'Faith, compassion, truth, service, and Christ-centered living.' ) ); ?></p>
            </div>
        </div>
        <div class="mvv-welcome">
            <h3 class="mvv-welcome-text"><?php echo esc_html( get_theme_mod( 'ntsda_welcome_quote', "You're always welcome here." ) ); ?></h3>
        </div>
    </div>
</section>

<!-- Ministries Section -->
<?php
$ministries = new WP_Query( array(
    'post_type'      => 'ministry',
    'posts_per_page' => 4,
) );

if ( $ministries->have_posts() ) :
?>
<section class="ministries-section" id="ministry" data-scroll-section>
    <div class="container">
        <div class="section-header" data-scroll>
            <h2 class="section-title"><?php esc_html_e( 'OUR MINISTRIES', 'north-texas-sda-church' ); ?></h2>
        </div>
        <div class="ministries-container" data-scroll>
            <?php while ( $ministries->have_posts() ) : $ministries->the_post(); ?>
                <div class="ministry-card">
                    <div class="ministry-image">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'ntsda-ministry' ); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url( NTSDA_THEME_URI . '/assets/images/ministry-placeholder.jpg' ); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                        <div class="ministry-overlay"></div>
                        <h3 class="ministry-title"><?php the_title(); ?></h3>
                        <a href="<?php the_permalink(); ?>" class="ministry-link"><?php esc_html_e( 'LEARN MORE', 'north-texas-sda-church' ); ?> <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="section-button">
            <a href="<?php echo esc_url( get_post_type_archive_link( 'ministry' ) ); ?>" class="btn btn-primary"><?php esc_html_e( 'ALL MINISTRIES', 'north-texas-sda-church' ); ?></a>
        </div>
    </div>
</section>
<?php
wp_reset_postdata();
endif;
?>

<!-- Upcoming Events Section -->
<?php
$events = ntsda_get_upcoming_events( 3 );

if ( $events->have_posts() ) :
?>
<section class="modern-events-section" data-scroll-section>
    <div class="container">
        <div class="modern-events-header" data-scroll>
            <h2 class="modern-events-title"><?php esc_html_e( 'UPCOMING', 'north-texas-sda-church' ); ?><br><?php esc_html_e( 'EVENTS', 'north-texas-sda-church' ); ?></h2>
            <p class="modern-events-subtitle">
                <?php esc_html_e( "Stay connected with what's happening at North Texas SDA Church! From worship nights and Bible studies to outreach programs and fellowship gatherings, there's always something for everyone.", 'north-texas-sda-church' ); ?>
            </p>
        </div>
        <div class="modern-events-container" data-scroll>
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
                            <span class="modern-event-day-name"><?php echo esc_html( strtoupper( $date_obj->format( 'D' ) ) ); ?></span>
                            <span class="modern-event-day"><?php echo esc_html( $date_obj->format( 'd' ) ); ?></span>
                            <span class="modern-event-month"><?php echo esc_html( strtoupper( $date_obj->format( 'M' ) ) ); ?></span>
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
    </div>
</section>
<?php
wp_reset_postdata();
endif;
?>

<!-- Featured Sermons Section -->
<?php
$sermons = ntsda_get_featured_sermons( 3 );

if ( $sermons->have_posts() ) :
?>
<section class="featured-sermons-section" data-scroll-section>
    <div class="container">
        <div class="featured-sermons-label"><?php esc_html_e( 'FEATURED SERMONS', 'north-texas-sda-church' ); ?></div>
        <h2 class="featured-sermons-title"><?php esc_html_e( 'FEATURED SERMONS', 'north-texas-sda-church' ); ?></h2>
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
                        <?php if ( has_custom_logo() ) : ?>
                            <div class="featured-sermon-author-image">
                                <?php the_custom_logo(); ?>
                            </div>
                        <?php endif; ?>
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
    </div>
</section>
<?php
wp_reset_postdata();
endif;
?>

<!-- Countdown Timer Section -->
<section class="countdown-section" data-scroll-section>
    <div class="countdown-background"></div>
    <div class="countdown-overlay"></div>
    <div class="countdown-container" data-target="<?php echo esc_attr( $next_saturday ); ?>">
        <h2 class="countdown-title"><?php esc_html_e( "Don't miss the next service", 'north-texas-sda-church' ); ?></h2>
        <div class="countdown-timer">
            <div class="countdown-item">
                <div class="countdown-number" id="countdown-section-days">00</div>
                <div class="countdown-label"><?php esc_html_e( 'DAYS', 'north-texas-sda-church' ); ?></div>
            </div>
            <div class="countdown-separator">:</div>
            <div class="countdown-item">
                <div class="countdown-number" id="countdown-section-hours">00</div>
                <div class="countdown-label"><?php esc_html_e( 'HOURS', 'north-texas-sda-church' ); ?></div>
            </div>
            <div class="countdown-separator">:</div>
            <div class="countdown-item">
                <div class="countdown-number" id="countdown-section-minutes">00</div>
                <div class="countdown-label"><?php esc_html_e( 'MINUTES', 'north-texas-sda-church' ); ?></div>
            </div>
            <div class="countdown-separator">:</div>
            <div class="countdown-item">
                <div class="countdown-number" id="countdown-section-seconds">00</div>
                <div class="countdown-label"><?php esc_html_e( 'SECONDS', 'north-texas-sda-church' ); ?></div>
            </div>
        </div>
        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="countdown-button"><?php esc_html_e( 'JOIN US THIS SATURDAY', 'north-texas-sda-church' ); ?></a>
    </div>
</section>

<!-- Leadership/Pastor Section -->
<section class="leadership-section" id="leadership" data-scroll-section>
    <div class="container">
        <div class="leadership-header" data-scroll>
            <div>
                <span class="leadership-label"><?php esc_html_e( 'LEADING WITH LOVE', 'north-texas-sda-church' ); ?></span>
                <h2 class="leadership-title"><?php esc_html_e( 'MEET OUR PASTORS', 'north-texas-sda-church' ); ?></h2>
            </div>
        </div>

        <div class="leadership-container" data-scroll>
            <div class="about-container">
                <div class="leader-card">
                    <?php
                    $pastor_image = get_theme_mod( 'ntsda_pastor_image' );
                    if ( $pastor_image ) :
                    ?>
                        <img src="<?php echo esc_url( $pastor_image ); ?>" alt="<?php echo esc_attr( get_theme_mod( 'ntsda_pastor_name', 'Pastor' ) ); ?>" class="leader-image">
                    <?php endif; ?>
                    <div class="leader-info">
                        <h3 class="leader-name"><?php echo esc_html( get_theme_mod( 'ntsda_pastor_name', 'Denton Rhone' ) ); ?></h3>
                        <p class="leader-role"><?php echo esc_html( get_theme_mod( 'ntsda_pastor_title', 'Pastor' ) ); ?></p>
                    </div>
                </div>
                <div class="about-content">
                    <div class="about-title"><?php echo esc_html( get_theme_mod( 'ntsda_pastor_name', 'Denton Rhone' ) ); ?></div>
                    <div class="about-subtitle"><?php echo esc_html( get_theme_mod( 'ntsda_pastor_title', 'Pastor' ) ); ?></div>
                    <div class="about-text">
                        <p><?php echo wp_kses_post( get_theme_mod( 'ntsda_pastor_message', "Dr. Denton Rhone joined the North Texas Seventh-day Adventist Church (NTX SDA) in April 2024. He holds a PhD in Education & Leadership and a D.Min. in Ministry & Missions, reflecting his lifelong dedication to learning and equipping God's people." ) ); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Donation Section -->
<section class="donation-section" id="donate" data-scroll-section>
    <div class="donation-background"></div>
    <div class="container">
        <div class="donation-container">
            <div class="donation-left" data-scroll>
                <h2 class="donation-title"><?php esc_html_e( 'SUPPORT OUR MISSION', 'north-texas-sda-church' ); ?></h2>
                <p class="donation-description">
                    <?php esc_html_e( 'Your generosity helps us serve our community, support missions, and continue sharing the message of hope. Whether you give once or set up recurring donations, every contribution makes a difference.', 'north-texas-sda-church' ); ?>
                </p>
                <a href="<?php echo esc_url( $donation_url ); ?>" class="donation-more-link" target="_blank">
                    <?php esc_html_e( 'VIEW MORE CAUSES', 'north-texas-sda-church' ); ?>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <div class="donation-right" data-scroll>
                <div class="donation-card">
                    <h3 class="donation-card-title"><?php esc_html_e( 'Support Our Cause', 'north-texas-sda-church' ); ?></h3>
                    <p class="donation-card-description">
                        <?php esc_html_e( 'Help our organization by donating today! Donations go to making a difference for our cause.', 'north-texas-sda-church' ); ?>
                    </p>
                    <a href="<?php echo esc_url( $donation_url ); ?>" class="donation-button" target="_blank">
                        <?php esc_html_e( 'Donate now', 'north-texas-sda-church' ); ?>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <div class="donation-secure">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L4 5V11.09C4 16.14 7.41 20.85 12 22C16.59 20.85 20 16.14 20 11.09V5L12 2Z" stroke="currentColor" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span><?php esc_html_e( '100% Secure Donation', 'north-texas-sda-church' ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section" id="faq" data-scroll-section>
    <div class="container">
        <div class="faq-container">
            <div class="faq-left" data-scroll>
                <span class="faq-label"><?php esc_html_e( 'SEEK. LEARN. GROW.', 'north-texas-sda-church' ); ?></span>
                <h2 class="faq-title"><?php esc_html_e( 'FREQUENTLY ASKED QUESTIONS', 'north-texas-sda-church' ); ?></h2>
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="faq-contact">
                    <?php esc_html_e( 'CONTACT FOR MORE', 'north-texas-sda-church' ); ?>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>

            <div class="faq-right">
                <ul class="faq-list">
                    <li class="faq-item active">
                        <div class="faq-question">
                            <span class="faq-question-text"><?php esc_html_e( 'What are your gatherings like?', 'north-texas-sda-church' ); ?></span>
                            <span class="faq-icon"></span>
                        </div>
                        <div class="faq-answer">
                            <?php esc_html_e( 'First, we must understand church is not a building, a Sabbath school class, or a service time. According to scripture, a church gathering is a group of people coming together in Christ and the people are the church. Jesus shows us in Matthew 18 that a gathering can be as little as two people together.', 'north-texas-sda-church' ); ?>
                        </div>
                    </li>

                    <li class="faq-item">
                        <div class="faq-question">
                            <span class="faq-question-text"><?php esc_html_e( 'What happens when I visit?', 'north-texas-sda-church' ); ?></span>
                            <span class="faq-icon"></span>
                        </div>
                        <div class="faq-answer">
                            <?php esc_html_e( "When you visit, you'll be warmly welcomed by our greeting team. Our service includes worship music, prayer, and a relevant message from the Bible. After the service, we invite you to stay for refreshments and to meet our community.", 'north-texas-sda-church' ); ?>
                        </div>
                    </li>

                    <li class="faq-item">
                        <div class="faq-question">
                            <span class="faq-question-text"><?php esc_html_e( 'What should I bring?', 'north-texas-sda-church' ); ?></span>
                            <span class="faq-icon"></span>
                        </div>
                        <div class="faq-answer">
                            <?php esc_html_e( 'Just bring yourself! If you have a Bible, feel free to bring it, but we also provide Bibles and have scripture displayed during the service. We also have a mobile app where you can follow along with the message and take notes.', 'north-texas-sda-church' ); ?>
                        </div>
                    </li>

                    <li class="faq-item">
                        <div class="faq-question">
                            <span class="faq-question-text"><?php esc_html_e( 'How should I dress?', 'north-texas-sda-church' ); ?></span>
                            <span class="faq-icon"></span>
                        </div>
                        <div class="faq-answer">
                            <?php esc_html_e( 'We have no dress code. Some people come in suits, others in jeans and t-shirts. We care more about you being here than what you wear. Come as you are and feel comfortable!', 'north-texas-sda-church' ); ?>
                        </div>
                    </li>

                    <li class="faq-item">
                        <div class="faq-question">
                            <span class="faq-question-text"><?php esc_html_e( 'Can I invite people to come with?', 'north-texas-sda-church' ); ?></span>
                            <span class="faq-icon"></span>
                        </div>
                        <div class="faq-answer">
                            <?php esc_html_e( "Absolutely! We encourage you to invite friends, family, neighbors, or colleagues. Our church is open to everyone, and we love welcoming new people into our community.", 'north-texas-sda-church' ); ?>
                        </div>
                    </li>

                    <li class="faq-item">
                        <div class="faq-question">
                            <span class="faq-question-text"><?php esc_html_e( "What if we didn't answer your question?", 'north-texas-sda-church' ); ?></span>
                            <span class="faq-icon"></span>
                        </div>
                        <div class="faq-answer">
                            <?php esc_html_e( "If you have any other questions, please don't hesitate to reach out. You can contact us through our website, email, or phone. Our team is always happy to help and provide any information you need.", 'north-texas-sda-church' ); ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
