<?php
/**
 * Ministry Archive Template
 *
 * @package North_Texas_SDA_Church
 */

get_header();
?>

<main id="primary" class="site-main">

    <header class="page-header">
        <div class="container">
            <h1 class="page-title"><?php esc_html_e( 'Our Ministries', 'north-texas-sda-church' ); ?></h1>
            <p class="page-subtitle"><?php esc_html_e( 'Discover ways to serve, grow, and connect with our church family.', 'north-texas-sda-church' ); ?></p>
        </div>
    </header>

    <section class="ministries-section">
        <div class="container">
            <?php if ( have_posts() ) : ?>
                <div class="ministries-container">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        ?>
                        <div class="ministry-card">
                            <div class="ministry-image">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail( 'ntsda-ministry' ); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url( NTSDA_THEME_URI . '/assets/images/ministry-placeholder.jpg' ); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                                <div class="ministry-overlay"></div>
                                <h3 class="ministry-title"><?php the_title(); ?></h3>
                                <a href="<?php the_permalink(); ?>" class="ministry-link"><?php esc_html_e( 'LEARN MORE', 'north-texas-sda-church' ); ?> <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <?php
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
