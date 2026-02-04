<?php
/**
 * Single Post Template
 *
 * @package North_Texas_SDA_Church
 */

get_header();
?>

<main id="primary" class="site-main">

    <header class="page-header">
        <div class="container">
            <?php ntsda_breadcrumbs(); ?>
            <h1 class="page-title"><?php the_title(); ?></h1>
            <div class="post-meta">
                <?php ntsda_posted_on(); ?>
                <?php ntsda_posted_by(); ?>
            </div>
        </div>
    </header>

    <section class="page-content">
        <div class="container">
            <div class="single-post-container">
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'north-texas-sda-church' ),
                            'after'  => '</div>',
                        ) );
                        ?>
                    </div>

                    <footer class="entry-footer">
                        <?php ntsda_entry_footer(); ?>
                        <?php ntsda_share_buttons(); ?>
                    </footer>
                </article>

                <?php
                // Post navigation
                the_post_navigation( array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'north-texas-sda-church' ) . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'north-texas-sda-church' ) . '</span> <span class="nav-title">%title</span>',
                ) );

                // Comments
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
                ?>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
