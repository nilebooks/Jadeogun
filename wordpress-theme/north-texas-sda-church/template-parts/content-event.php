<?php
/**
 * Template part for displaying events
 *
 * @package North_Texas_SDA_Church
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$event_date = get_post_meta( get_the_ID(), '_event_date', true );
$start_time = get_post_meta( get_the_ID(), '_event_start_time', true );
$end_time   = get_post_meta( get_the_ID(), '_event_end_time', true );
$location   = get_post_meta( get_the_ID(), '_event_location', true );
$date_obj   = $event_date ? new DateTime( $event_date ) : new DateTime();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'modern-event-card' ); ?>>
    <div class="modern-event-left">
        <div class="modern-event-date">
            <span class="modern-event-day-name"><?php echo esc_html( strtoupper( $date_obj->format( 'D' ) ) ); ?></span>
            <span class="modern-event-day"><?php echo esc_html( $date_obj->format( 'd' ) ); ?></span>
            <span class="modern-event-month"><?php echo esc_html( strtoupper( $date_obj->format( 'M' ) ) ); ?></span>
        </div>
    </div>
    
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="modern-event-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'ntsda-event' ); ?>
            </a>
        </div>
    <?php endif; ?>
    
    <div class="modern-event-content">
        <h3 class="modern-event-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <p class="modern-event-description"><?php echo wp_trim_words( get_the_excerpt(), 25 ); ?></p>
        <div class="modern-event-details">
            <p class="modern-event-time">
                <?php
                echo esc_html( strtoupper( $date_obj->format( 'M d' ) ) );
                if ( $start_time ) {
                    echo ' @ ' . esc_html( $start_time );
                    if ( $end_time ) {
                        echo ' - ' . esc_html( $end_time );
                    }
                }
                ?>
            </p>
            <?php if ( $location ) : ?>
                <p class="modern-event-location"><i class="fas fa-map-marker-alt"></i> <?php echo esc_html( $location ); ?></p>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="modern-event-action">
        <a href="<?php the_permalink(); ?>" class="modern-event-button"><?php esc_html_e( 'VIEW DETAILS', 'north-texas-sda-church' ); ?></a>
    </div>
</article>
