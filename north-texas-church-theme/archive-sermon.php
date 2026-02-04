<?php
/**
 * The template for displaying sermon archive
 *
 * @package North_Texas_Church
 */

get_header();
?>

<section class="sermons-archive-section" data-scroll-section style="padding: 150px 0 100px;">
    <div class="container">
        <header class="page-header" style="text-align: center; margin-bottom: 60px;">
            <h1 class="section-title">Sermon Archive</h1>
            <p class="section-subtitle">Watch or listen to our messages</p>
        </header>

        <?php if (have_posts()) : ?>
            <div class="events-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    $sermon_speaker = get_post_meta(get_the_ID(), '_sermon_speaker', true);
                    $sermon_date = get_post_meta(get_the_ID(), '_sermon_date', true);
                    $sermon_video_url = get_post_meta(get_the_ID(), '_sermon_video_url', true);
                    ?>
                    <div class="event-card" data-scroll>
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('sermon-thumbnail', array('class' => 'event-image')); ?>
                            </a>
                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="https://blog.ronniefloyd.com/wp-content/uploads/Preaching.png" class="event-image" alt="<?php the_title(); ?>">
                            </a>
                        <?php endif; ?>
                        <div class="event-content">
                            <?php if ($sermon_date) : ?>
                                <span class="event-date">
                                    <i class="far fa-calendar"></i> <?php echo date('F j, Y', strtotime($sermon_date)); ?>
                                </span>
                            <?php endif; ?>
                            <h3 class="event-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <?php if ($sermon_speaker) : ?>
                                <p class="sermon-speaker"><i class="fas fa-user"></i> <?php echo esc_html($sermon_speaker); ?></p>
                            <?php endif; ?>
                            <p class="event-description"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            <?php if ($sermon_video_url) : ?>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                    <i class="fas fa-play"></i> Watch Now
                                </a>
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                            <?php endif; ?>
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
                <h2>No Sermons Found</h2>
                <p>Check back soon for new messages!</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
