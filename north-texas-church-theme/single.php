<?php
/**
 * The template for displaying all single posts
 *
 * @package North_Texas_Church
 */

get_header();
?>

<section class="single-post-section" data-scroll-section style="padding: 150px 0 100px;">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header" style="margin-bottom: 40px;">
                    <h1 class="section-title"><?php the_title(); ?></h1>
                    <div class="entry-meta" style="font-size: 16px; color: #666; margin-top: 20px;">
                        <span class="posted-on">
                            <i class="far fa-calendar"></i> <?php echo get_the_date(); ?>
                        </span>
                        <span class="byline" style="margin-left: 20px;">
                            <i class="far fa-user"></i> <?php the_author(); ?>
                        </span>
                        <?php if (has_category()) : ?>
                            <span class="categories" style="margin-left: 20px;">
                                <i class="far fa-folder"></i> <?php the_category(', '); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="entry-thumbnail" style="margin-bottom: 40px;">
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; border-radius: 10px;')); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content" style="font-size: 18px; line-height: 1.8; color: #555;">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'north-texas-church'),
                        'after' => '</div>',
                    ));
                    ?>
                </div>

                <?php if (get_the_tags()) : ?>
                    <footer class="entry-footer" style="margin-top: 40px; padding-top: 40px; border-top: 1px solid #ddd;">
                        <div class="tags">
                            <i class="fas fa-tags"></i> <?php the_tags('', ', '); ?>
                        </div>
                    </footer>
                <?php endif; ?>
            </article>

            <div class="post-navigation" style="margin-top: 60px; display: flex; justify-content: space-between; gap: 20px;">
                <?php
                $prev_post = get_previous_post();
                $next_post = get_next_post();
                
                if ($prev_post) :
                    ?>
                    <div class="nav-previous" style="flex: 1;">
                        <a href="<?php echo get_permalink($prev_post); ?>" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> <?php echo esc_html($prev_post->post_title); ?>
                        </a>
                    </div>
                    <?php
                endif;

                if ($next_post) :
                    ?>
                    <div class="nav-next" style="flex: 1; text-align: right;">
                        <a href="<?php echo get_permalink($next_post); ?>" class="btn btn-secondary">
                            <?php echo esc_html($next_post->post_title); ?> <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                    <?php
                endif;
                ?>
            </div>
            <?php
        endwhile;
        ?>
    </div>
</section>

<?php
get_footer();
