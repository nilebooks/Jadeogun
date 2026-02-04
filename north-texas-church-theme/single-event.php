<?php
/**
 * The template for displaying single events
 *
 * @package North_Texas_Church
 */

get_header();
?>

<section class="single-event-section" data-scroll-section style="padding: 150px 0 100px;">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            $event_date = get_post_meta(get_the_ID(), '_event_date', true);
            $event_time = get_post_meta(get_the_ID(), '_event_time', true);
            $event_location = get_post_meta(get_the_ID(), '_event_location', true);
            $event_address = get_post_meta(get_the_ID(), '_event_address', true);
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header" style="margin-bottom: 40px; text-align: center;">
                    <h1 class="section-title"><?php the_title(); ?></h1>
                    <div class="event-meta" style="font-size: 18px; color: #666; margin-top: 20px;">
                        <?php if ($event_date) : ?>
                            <span class="event-date" style="display: inline-block; margin: 0 15px;">
                                <i class="far fa-calendar"></i> <?php echo date('l, F j, Y', strtotime($event_date)); ?>
                            </span>
                        <?php endif; ?>
                        <?php if ($event_time) : ?>
                            <span class="event-time" style="display: inline-block; margin: 0 15px;">
                                <i class="far fa-clock"></i> <?php echo date('g:i A', strtotime($event_time)); ?>
                            </span>
                        <?php endif; ?>
                        <?php if ($event_location) : ?>
                            <span class="event-location" style="display: inline-block; margin: 0 15px;">
                                <i class="fas fa-map-marker-alt"></i> <?php echo esc_html($event_location); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="entry-thumbnail" style="margin-bottom: 40px; text-align: center;">
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; max-width: 1000px; border-radius: 10px;')); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content" style="font-size: 18px; line-height: 1.8; color: #555; max-width: 900px; margin: 0 auto;">
                    <?php the_content(); ?>

                    <?php if ($event_address) : ?>
                        <div class="event-address" style="margin-top: 40px; padding: 30px; background: #f8f9fa; border-radius: 10px;">
                            <h3 style="margin-bottom: 15px;"><i class="fas fa-map-marker-alt"></i> Location</h3>
                            <p><?php echo nl2br(esc_html($event_address)); ?></p>
                        </div>
                    <?php endif; ?>
                </div>

                <div style="text-align: center; margin-top: 60px;">
                    <a href="<?php echo esc_url(home_url('/events')); ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Events
                    </a>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</section>

<?php
get_footer();
