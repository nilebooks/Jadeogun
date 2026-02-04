<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package North_Texas_Church
 */

get_header();
?>

<section class="error-404-section" data-scroll-section style="padding: 150px 0 100px; min-height: 70vh;">
    <div class="container">
        <div style="text-align: center; max-width: 600px; margin: 0 auto;">
            <h1 class="section-title" style="font-size: 120px; margin-bottom: 20px;">404</h1>
            <h2 style="font-size: 36px; margin-bottom: 20px;">Page Not Found</h2>
            <p style="font-size: 18px; color: #666; margin-bottom: 40px;">
                <?php esc_html_e('Sorry, the page you are looking for could not be found. It might have been moved or deleted.', 'north-texas-church'); ?>
            </p>

            <div class="search-form" style="margin-bottom: 40px;">
                <?php get_search_form(); ?>
            </div>

            <div style="margin-top: 40px;">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary" style="margin: 0 10px;">
                    <i class="fas fa-home"></i> <?php esc_html_e('Go to Homepage', 'north-texas-church'); ?>
                </a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary" style="margin: 0 10px;">
                    <i class="fas fa-envelope"></i> <?php esc_html_e('Contact Us', 'north-texas-church'); ?>
                </a>
            </div>

            <div style="margin-top: 60px;">
                <h3 style="margin-bottom: 20px;"><?php esc_html_e('You might be interested in:', 'north-texas-church'); ?></h3>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin: 10px 0;">
                        <a href="<?php echo esc_url(home_url('/about')); ?>" style="color: #1e3a8a; text-decoration: underline;">
                            <?php esc_html_e('About Us', 'north-texas-church'); ?>
                        </a>
                    </li>
                    <li style="margin: 10px 0;">
                        <a href="<?php echo esc_url(home_url('/events')); ?>" style="color: #1e3a8a; text-decoration: underline;">
                            <?php esc_html_e('Upcoming Events', 'north-texas-church'); ?>
                        </a>
                    </li>
                    <li style="margin: 10px 0;">
                        <a href="<?php echo esc_url(home_url('/sermons')); ?>" style="color: #1e3a8a; text-decoration: underline;">
                            <?php esc_html_e('Recent Sermons', 'north-texas-church'); ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
