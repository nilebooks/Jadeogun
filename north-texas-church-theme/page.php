<?php
/**
 * The template for displaying all pages
 *
 * @package North_Texas_Church
 */

get_header();
?>

<section class="page-section" data-scroll-section style="padding: 150px 0 100px; min-height: 60vh;">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header" style="margin-bottom: 40px;">
                    <h1 class="section-title"><?php the_title(); ?></h1>
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
            </article>
            <?php
        endwhile;
        ?>
    </div>
</section>

<?php
get_footer();
