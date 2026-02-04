<?php
/**
 * Template part for displaying sermons
 *
 * @package North_Texas_SDA_Church
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$speaker   = get_post_meta( get_the_ID(), '_sermon_speaker', true );
$video_url = get_post_meta( get_the_ID(), '_sermon_video_url', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'featured-sermon-card' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="featured-sermon-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'ntsda-sermon' ); ?>
                <?php if ( $video_url ) : ?>
                    <div class="sermon-play-button">
                        <i class="fas fa-play"></i>
                    </div>
                <?php endif; ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="featured-sermon-date"><?php echo esc_html( strtoupper( get_the_date( 'F j, Y' ) ) ); ?></div>
    
    <h3 class="featured-sermon-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h3>

    <?php if ( $speaker ) : ?>
        <div class="featured-sermon-author">
            <div class="featured-sermon-author-name"><?php echo esc_html( $speaker ); ?></div>
        </div>
    <?php endif; ?>
</article>
