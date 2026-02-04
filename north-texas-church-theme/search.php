<?php
/**
 * The template for displaying search results
 *
 * @package North_Texas_Church
 */

get_header();
?>

<section class="search-results-section" data-scroll-section style="padding: 150px 0 100px;">
    <div class="container">
        <header class="page-header" style="margin-bottom: 60px;">
            <h1 class="section-title">
                <?php
                printf(
                    esc_html__('Search Results for: %s', 'north-texas-church'),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </header>

        <?php if (have_posts()) : ?>

            <div class="search-results">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <article class="search-result-item" style="margin-bottom: 40px; padding-bottom: 40px; border-bottom: 1px solid #ddd;">
                        <h2 style="margin-bottom: 15px;">
                            <a href="<?php the_permalink(); ?>" style="color: #1e3a8a;">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        
                        <div class="entry-meta" style="font-size: 14px; color: #666; margin-bottom: 15px;">
                            <span><i class="far fa-calendar"></i> <?php echo get_the_date(); ?></span>
                            <span style="margin-left: 15px;">
                                <i class="far fa-folder"></i> 
                                <?php
                                $post_type = get_post_type_object(get_post_type());
                                echo esc_html($post_type->labels->singular_name);
                                ?>
                            </span>
                        </div>

                        <div class="entry-summary" style="font-size: 16px; line-height: 1.6; color: #555;">
                            <?php the_excerpt(); ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                            <?php esc_html_e('Read More', 'north-texas-church'); ?>
                        </a>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <div class="pagination" style="margin-top: 60px;">
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
                <h2><?php esc_html_e('Nothing Found', 'north-texas-church'); ?></h2>
                <p style="font-size: 18px; color: #666; margin-bottom: 30px;">
                    <?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'north-texas-church'); ?>
                </p>
                <div class="search-form">
                    <?php get_search_form(); ?>
                </div>
            </div>

        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
