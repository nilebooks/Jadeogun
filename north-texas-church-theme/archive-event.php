<?php
/**
 * The template for displaying event archive
 *
 * @package North_Texas_Church
 */

get_header();
?>

<section class="events-archive-section" data-scroll-section style="padding: 150px 0 100px;">
    <div class="container">
        <header class="page-header" style="text-align: center; margin-bottom: 60px;">
            <h1 class="section-title">Church Events</h1>
            <p class="section-subtitle">Join us for these exciting events and activities</p>
        </header>

        <?php if (have_posts()) : ?>
            <div class="events-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    $event_date = get_post_meta(get_the_ID(), '_event_date', true);
                    $event_time = get_post_meta(get_the_ID(), '_event_time', true);
                    $event_location = get_post_meta(get_the_ID(), '_event_location', true);
                    ?>
                    <div class="event-card" data-scroll>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('event-thumbnail', array('class' => 'event-image')); ?>
                            </a>
                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="https://abwe.org/wp-content/uploads/2022/11/iStock_000056350654_Large.jpg" class="event-image" alt="<?php the_title(); ?>">
                            </a>
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
                            <h3 class="event-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="event-description"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <?php if ($event_location) : ?>
                                <p class="event-location"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html($event_location); ?></p>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                    <?php
                endwhile;
                ?>
            </div>

            <div class="pagination" style="margin-top: 60px; text-align: center;">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => '<i class="fas fa-arrow-left"></i> Previous',
                    'next_text' => 'Next <i class="fas fa-arrow-right"></i>',
                ));
                ?>
            </div>

        <?php else : ?>
            <div style="text-align: center; padding: 60px 20px;">
                <h2>No Events Found</h2>
                <p>Check back soon for upcoming events!</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
