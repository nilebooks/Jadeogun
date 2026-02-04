<?php
/**
 * Search Results Template
 *
 * @package North_Texas_SDA_Church
 */

get_header();
?>

<main id="primary" class="site-main">

    <header class="page-header">
        <div class="container">
            <h1 class="page-title">
                <?php
                printf(
                    /* translators: %s: search query. */
                    esc_html__( 'Search Results for: %s', 'north-texas-sda-church' ),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </div>
    </header>

    <section class="page-content">
        <div class="container">
            <?php if ( have_posts() ) : ?>
                <div class="blog-posts">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content', 'search' );
                    endwhile;
                    ?>
                </div>

                <?php ntsda_pagination(); ?>

            <?php else : ?>
                <div class="no-results">
                    <h2><?php esc_html_e( 'Nothing Found', 'north-texas-sda-church' ); ?></h2>
                    <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'north-texas-sda-church' ); ?></p>
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php
get_footer();
