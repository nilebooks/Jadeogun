<?php
/**
 * Sermon Archive Template
 *
 * @package North_Texas_SDA_Church
 */

get_header();
?>

<main id="primary" class="site-main">

    <header class="page-header">
        <div class="container">
            <h1 class="page-title"><?php esc_html_e( 'Sermons', 'north-texas-sda-church' ); ?></h1>
            <p class="page-subtitle"><?php esc_html_e( 'Listen to our latest sermons and grow in your faith journey.', 'north-texas-sda-church' ); ?></p>
        </div>
    </header>

    <section class="featured-sermons-section" style="background-color: #fff;">
        <div class="container">
            <?php if ( have_posts() ) : ?>
                <div class="featured-sermons-container">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content', 'sermon' );
                    endwhile;
                    ?>
                </div>

                <?php ntsda_pagination(); ?>

            <?php else : ?>
                <?php get_template_part( 'template-parts/content', 'none' ); ?>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php
get_footer();
