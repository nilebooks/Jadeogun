<?php
/**
 * Template part for displaying search results
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
                <?php the_post_thumbnail( 'medium' ); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="blog-post-content">
        <span class="post-type-badge"><?php echo esc_html( get_post_type_object( get_post_type() )->labels->singular_name ); ?></span>
        <div class="blog-post-date"><?php echo esc_html( get_the_date() ); ?></div>
        
        <h2 class="blog-post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <div class="blog-post-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="read-more-link"><?php esc_html_e( 'Read More', 'north-texas-sda-church' ); ?> &rarr;</a>
    </div>
</article>
