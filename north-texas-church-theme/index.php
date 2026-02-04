<?php
/**
 * The main template file
 *
 * @package North_Texas_Church
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section" id="hero" data-scroll-section>
    <div class="video-background">
        <?php if (get_theme_mod('hero_video_url')) : ?>
            <video autoplay muted loop id="hero-video" playsinline>
                <source src="<?php echo esc_url(get_theme_mod('hero_video_url')); ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        <?php endif; ?>
        <div class="overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                <?php 
                $hero_title = get_theme_mod('hero_title', 'YOUR<br>COMMUNITY.<br><span class="highlight">YOUR CHURCH.</span>');
                echo wp_kses_post($hero_title);
                ?>
            </h1>
            <p class="hero-subtitle">
                <?php echo esc_html(get_theme_mod('hero_subtitle', 'A Place where you can Worship and get Involved')); ?>
            </p>
            <div class="hero-buttons">
                <div class="hero-buttons-row">
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">JOIN US THIS SATURDAY</a>
                    <a href="https://www.youtube.com/channel/UC2Ha7c6bwtYnsfk1uVi3fPA" target="_blank" class="btn btn-outline">WATCH LIVE</a>
                </div>
                <div class="hero-buttons-row">
                    <a href="https://adventist.org/beliefs" target="_blank" class="btn btn-secondary">What We Believe</a>
                    <a href="https://adventist.org/identity" target="_blank" class="btn btn-secondary">Who We Are</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Countdown Band -->
<section class="countdown-band">
    <p>Next service scheduled in</p>
    <div class="countdown-item">
        <div class="countdown-number" id="countdown-days">0</div>
        <div class="countdown-label">Days</div>
    </div>
    <div class="countdown-separator">:</div>
    <div class="countdown-item">
        <div class="countdown-number" id="countdown-hours">0</div>
        <div class="countdown-label">Hours</div>
    </div>
    <div class="countdown-separator">:</div>
    <div class="countdown-item">
        <div class="countdown-number" id="countdown-minutes">0</div>
        <div class="countdown-label">MINUTES</div>
    </div>
    <div class="countdown-separator">:</div>
    <div class="countdown-item">
        <div class="countdown-number" id="countdown-seconds">0</div>
        <div class="countdown-label">SECONDS</div>
    </div>
</section>

<!-- Welcome Section -->
<section class="welcome-section" data-scroll-section>
    <div class="container">
        <div class="welcome-container">
            <div class="welcome-content" data-scroll>
                <?php
                $welcome_page = get_page_by_path('welcome');
                if ($welcome_page) {
                    echo '<h2>' . esc_html($welcome_page->post_title) . '</h2>';
                    echo wp_kses_post($welcome_page->post_content);
                } else {
                    ?>
                    <h2>Welcome to North Texas SDA Church</h2>
                    <p>We are a vibrant community of believers dedicated to spreading the love of Christ. Whether you're seeking spiritual growth, community, or a place to belong, we welcome you with open arms.</p>
                    <p>Join us every Saturday for worship, fellowship, and biblical teaching that will strengthen your faith and inspire your walk with God.</p>
                    <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-primary">Learn More About Us</a>
                    <?php
                }
                ?>
            </div>
            <div class="welcome-image" data-scroll>
                <?php
                if ($welcome_page && has_post_thumbnail($welcome_page->ID)) {
                    echo get_the_post_thumbnail($welcome_page->ID, 'large');
                } else {
                    ?>
                    <img src="https://images.squarespace-cdn.com/content/v1/5843ab37e6f2e16ba63fa175/1489184542191-OK4AAAYZ768ER75BLNN2/Header+-+04+Worship.jpg?format=1500w" alt="Welcome">
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section" data-scroll-section>
    <div class="container">
        <div class="about-container">
            <div class="about-image" data-scroll>
                <?php
                $about_page = get_page_by_path('about');
                if ($about_page && has_post_thumbnail($about_page->ID)) {
                    echo get_the_post_thumbnail($about_page->ID, 'large', array('class' => 'about-image'));
                } else {
                    ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/pastor1.jpg" class="about-image" alt="North Texas SDA Church">
                    <?php
                }
                ?>
            </div>
            <div class="about-content" data-scroll>
                <div class="about-header">
                    <h2>About Our Church</h2>
                </div>
                <div class="about-text">
                    <?php
                    if ($about_page) {
                        echo wp_kses_post($about_page->post_content);
                    } else {
                        ?>
                        <p>North Texas SDA Church is a faith community committed to sharing God's love and truth. We believe in building relationships, strengthening families, and making a positive impact in our community.</p>
                        <p>Our mission is to guide people to experience the transforming power of Jesus Christ through worship, fellowship, and service.</p>
                        <?php
                    }
                    ?>
                    <div class="about-button">
                        <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-primary">Discover More</a>
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
                <i class="fas fa-bullseye"></i>
                <h3>Our Mission</h3>
                <p>To glorify God by making disciples of Jesus Christ through worship, fellowship, and service to our community and the world.</p>
            </div>
            <div class="mvv-box">
                <i class="fas fa-eye"></i>
                <h3>Our Vision</h3>
                <p>A thriving faith community where every person experiences God's love, finds their purpose, and lives out their faith daily.</p>
            </div>
            <div class="mvv-box">
                <i class="fas fa-heart"></i>
                <h3>Our Values</h3>
                <p>Faith, Love, Community, Excellence, and Service guide everything we do as we strive to follow Christ's example.</p>
            </div>
        </div>
    </div>
</section>

<!-- Events Section -->
<section class="modern-events-section events-section" data-scroll-section>
    <div class="container">
        <h2 class="section-title">Upcoming Events</h2>
        <p class="section-subtitle">Join us for these exciting upcoming events and activities</p>
        
        <div class="events-grid" id="events-grid">
            <?php
            $events_query = new WP_Query(array(
                'post_type' => 'event',
                'posts_per_page' => 6,
                'meta_key' => '_event_date',
                'orderby' => 'meta_value',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => '_event_date',
                        'value' => date('Y-m-d'),
                        'compare' => '>=',
                        'type' => 'DATE',
                    ),
                ),
            ));

            if ($events_query->have_posts()) :
                while ($events_query->have_posts()) : $events_query->the_post();
                    $event_date = get_post_meta(get_the_ID(), '_event_date', true);
                    $event_time = get_post_meta(get_the_ID(), '_event_time', true);
                    $event_location = get_post_meta(get_the_ID(), '_event_location', true);
                    ?>
                    <div class="event-card" data-scroll>
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('event-thumbnail', array('class' => 'event-image')); ?>
                        <?php else : ?>
                            <img src="https://abwe.org/wp-content/uploads/2022/11/iStock_000056350654_Large.jpg" class="event-image" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <div class="event-content">
                            <?php if ($event_date) : ?>
                                <span class="event-date">
                                    <i class="far fa-calendar"></i> <?php echo date('F j, Y', strtotime($event_date)); ?>
                                    <?php if ($event_time) : ?>
                                        at <?php echo date('g:i A', strtotime($event_time)); ?>
                                    <?php endif; ?>
                                </span>
                            <?php endif; ?>
                            <h3 class="event-title"><?php the_title(); ?></h3>
                            <p class="event-description"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <?php if ($event_location) : ?>
                                <p class="event-location"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($event_location); ?></p>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Default events if none exist
                ?>
                <div class="event-card" data-scroll>
                    <img src="https://abwe.org/wp-content/uploads/2022/11/iStock_000056350654_Large.jpg" class="event-image" alt="Sabbath Worship">
                    <div class="event-content">
                        <span class="event-date"><i class="far fa-calendar"></i> Every Saturday</span>
                        <h3 class="event-title">Sabbath Worship Service</h3>
                        <p class="event-description">Join us for our weekly worship service every Saturday morning.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
                <?php
            endif;
            ?>
        </div>
        
        <div style="text-align: center; margin-top: 40px;">
            <a href="<?php echo esc_url(home_url('/events')); ?>" class="btn btn-primary">View All Events</a>
        </div>
    </div>
</section>

<!-- Featured Sermons Section -->
<section class="featured-sermons-section" data-scroll-section style="padding: 100px 0; background: #f8f9fa;">
    <div class="container">
        <h2 class="section-title">Recent Sermons</h2>
        <p class="section-subtitle">Watch or listen to our latest messages</p>
        
        <div class="events-grid">
            <?php
            $sermons_query = new WP_Query(array(
                'post_type' => 'sermon',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'DESC',
            ));

            if ($sermons_query->have_posts()) :
                while ($sermons_query->have_posts()) : $sermons_query->the_post();
                    $sermon_speaker = get_post_meta(get_the_ID(), '_sermon_speaker', true);
                    $sermon_date = get_post_meta(get_the_ID(), '_sermon_date', true);
                    ?>
                    <div class="event-card" data-scroll>
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('sermon-thumbnail', array('class' => 'event-image')); ?>
                        <?php else : ?>
                            <img src="https://blog.ronniefloyd.com/wp-content/uploads/Preaching.png" class="event-image" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <div class="event-content">
                            <?php if ($sermon_date) : ?>
                                <span class="event-date">
                                    <i class="far fa-calendar"></i> <?php echo date('F j, Y', strtotime($sermon_date)); ?>
                                </span>
                            <?php endif; ?>
                            <h3 class="event-title"><?php the_title(); ?></h3>
                            <?php if ($sermon_speaker) : ?>
                                <p class="sermon-speaker"><i class="fas fa-user"></i> <?php echo esc_html($sermon_speaker); ?></p>
                            <?php endif; ?>
                            <p class="event-description"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Watch Now</a>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        
        <div style="text-align: center; margin-top: 40px;">
            <a href="<?php echo esc_url(home_url('/sermons')); ?>" class="btn btn-primary">View All Sermons</a>
        </div>
    </div>
</section>

<!-- Leadership Section -->
<section class="leadership-section" data-scroll-section style="padding: 100px 0;">
    <div class="container">
        <h2 class="section-title">Our Leadership</h2>
        <p class="section-subtitle">Meet our dedicated team of leaders committed to serving our community</p>
        
        <div class="events-grid">
            <?php
            $team_query = new WP_Query(array(
                'post_type' => 'team_member',
                'posts_per_page' => 4,
                'meta_key' => '_display_order',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
            ));

            if ($team_query->have_posts()) :
                while ($team_query->have_posts()) : $team_query->the_post();
                    $position = get_post_meta(get_the_ID(), '_position', true);
                    $email = get_post_meta(get_the_ID(), '_email', true);
                    ?>
                    <div class="event-card" data-scroll>
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('leader-thumbnail', array('class' => 'event-image', 'style' => 'height: 400px; object-fit: cover;')); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/pastor1.jpg" class="event-image" alt="<?php the_title(); ?>" style="height: 400px; object-fit: cover;">
                        <?php endif; ?>
                        <div class="event-content">
                            <h3 class="event-title"><?php the_title(); ?></h3>
                            <?php if ($position) : ?>
                                <p class="leader-position" style="color: #1e3a8a; font-weight: 600; margin-bottom: 10px;">
                                    <?php echo esc_html($position); ?>
                                </p>
                            <?php endif; ?>
                            <p class="event-description"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            <?php if ($email) : ?>
                                <p><a href="mailto:<?php echo esc_attr($email); ?>" class="btn btn-secondary">Contact</a></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Get Involved Section -->
<section class="get-involved-section" data-scroll-section style="padding: 100px 0; background: linear-gradient(135deg, #1e3a8a, #3b82f6); color: #fff;">
    <div class="container">
        <h2 class="section-title" style="color: #fff;">Get Involved</h2>
        <p class="section-subtitle" style="color: rgba(255, 255, 255, 0.9);">There are many ways to connect and serve in our church community</p>
        
        <div class="mvv-container">
            <div class="mvv-box">
                <i class="fas fa-bible"></i>
                <h3>Bible Study</h3>
                <p>Join us for weekly Bible study sessions where we dive deep into God's Word together.</p>
            </div>
            <div class="mvv-box">
                <i class="fas fa-hands-helping"></i>
                <h3>Volunteer</h3>
                <p>Make a difference by serving in one of our many ministries and outreach programs.</p>
            </div>
            <div class="mvv-box">
                <i class="fas fa-users"></i>
                <h3>Small Groups</h3>
                <p>Connect with others through small groups focused on fellowship and spiritual growth.</p>
            </div>
        </div>
        
        <div style="text-align: center; margin-top: 40px;">
            <a href="<?php echo esc_url(home_url('/get-involved')); ?>" class="btn btn-secondary">Learn More</a>
        </div>
    </div>
</section>

<!-- Donation Section -->
<section class="donation-section" data-scroll-section style="padding: 100px 0; background: #f8f9fa;">
    <div class="container">
        <div class="welcome-container">
            <div class="welcome-content" data-scroll style="text-align: center; max-width: 700px; margin: 0 auto;">
                <h2>Support Our Ministry</h2>
                <p>Your generous giving helps us fulfill our mission to share God's love with our community and beyond. Thank you for your support!</p>
                <div style="margin-top: 30px;">
                    <a href="<?php echo esc_url(home_url('/give')); ?>" class="btn btn-primary" style="margin: 0 10px;">Give Online</a>
                    <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-secondary" style="margin: 0 10px;">Learn About Giving</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
