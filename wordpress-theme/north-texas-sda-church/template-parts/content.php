<?php
/**
 * Template part for displaying posts
 *
 * @package North_Texas_SDA_Church
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post-card' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="blog-post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'medium_large' ); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="blog-post-content">
        <div class="blog-post-date"><?php echo esc_html( get_the_date() ); ?></div>
        
        <h2 class="blog-post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <div class="blog-post-excerpt">
            <?php the_excerpt(); ?>
        </div>
    </div>
</article>
