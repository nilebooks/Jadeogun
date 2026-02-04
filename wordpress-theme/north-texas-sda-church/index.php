<?php
/**
 * Main Template File
 *
 * @package North_Texas_SDA_Church
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php if ( is_home() && ! is_front_page() ) : ?>
        <header class="page-header">
            <div class="container">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </div>
        </header>
    <?php endif; ?>

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
