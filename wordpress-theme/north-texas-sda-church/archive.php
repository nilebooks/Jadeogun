<?php
/**
 * Archive Template
 *
 * @package North_Texas_SDA_Church
 */

get_header();
?>

<main id="primary" class="site-main">

    <header class="page-header">
        <div class="container">
            <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="page-subtitle">', '</div>' );
            ?>
        </div>
    </header>

    <section class="page-content">
        <div class="container">
            <?php if ( have_posts() ) : ?>
                <div class="blog-posts">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content', get_post_type() );
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
