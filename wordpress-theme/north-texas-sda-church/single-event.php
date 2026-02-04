<?php
/**
 * Single Event Template
 *
 * @package North_Texas_SDA_Church
 */

get_header();

// Get event meta
$event_date = get_post_meta( get_the_ID(), '_event_date', true );
$start_time = get_post_meta( get_the_ID(), '_event_start_time', true );
$end_time   = get_post_meta( get_the_ID(), '_event_end_time', true );
$location   = get_post_meta( get_the_ID(), '_event_location', true );
$address    = get_post_meta( get_the_ID(), '_event_address', true );
$event_link = get_post_meta( get_the_ID(), '_event_link', true );
$date_obj   = $event_date ? new DateTime( $event_date ) : new DateTime();
?>

<main id="primary" class="site-main">

    <header class="page-header">
        <div class="container">
            <?php ntsda_breadcrumbs(); ?>
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
    </header>

    <section class="page-content">
        <div class="container">
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-event' ); ?>>
                
                <div class="event-details-card">
                    <div class="event-date-large">
                        <span class="event-day-name"><?php echo esc_html( $date_obj->format( 'l' ) ); ?></span>
                        <span class="event-day-number"><?php echo esc_html( $date_obj->format( 'd' ) ); ?></span>
                        <span class="event-month-year"><?php echo esc_html( $date_obj->format( 'F Y' ) ); ?></span>
                    </div>
                    
                    <div class="event-info-list">
                        <?php if ( $start_time ) : ?>
                            <div class="event-info-item">
                                <i class="fas fa-clock"></i>
                                <span>
                                    <?php
                                    echo esc_html( $start_time );
                                    if ( $end_time ) {
                                        echo ' - ' . esc_html( $end_time );
                                    }
                                    ?>
                                </span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ( $location ) : ?>
                            <div class="event-info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?php echo esc_html( $location ); ?></span>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ( $address ) : ?>
                            <div class="event-info-item">
                                <i class="fas fa-location-dot"></i>
                                <span><?php echo nl2br( esc_html( $address ) ); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ( $event_link ) : ?>
                        <a href="<?php echo esc_url( $event_link ); ?>" class="btn btn-primary" target="_blank">
                            <?php esc_html_e( 'Register / More Info', 'north-texas-sda-church' ); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
                    <?php
                    $categories = get_the_terms( get_the_ID(), 'event_category' );
                    if ( $categories && ! is_wp_error( $categories ) ) :
                    ?>
                        <div class="event-categories">
                            <strong><?php esc_html_e( 'Category:', 'north-texas-sda-church' ); ?></strong>
                            <?php echo get_the_term_list( get_the_ID(), 'event_category', '', ', ' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php ntsda_share_buttons(); ?>
                </footer>
            </article>

            <?php
            the_post_navigation( array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous Event:', 'north-texas-sda-church' ) . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Event:', 'north-texas-sda-church' ) . '</span> <span class="nav-title">%title</span>',
            ) );
            ?>
        </div>
    </section>

</main>

<?php
get_footer();
