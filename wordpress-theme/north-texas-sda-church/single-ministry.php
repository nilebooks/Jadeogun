<?php
/**
 * Single Ministry Template
 *
 * @package North_Texas_SDA_Church
 */

get_header();

// Get ministry meta
$leader       = get_post_meta( get_the_ID(), '_ministry_leader', true );
$email        = get_post_meta( get_the_ID(), '_ministry_email', true );
$meeting_time = get_post_meta( get_the_ID(), '_ministry_meeting_time', true );
$location     = get_post_meta( get_the_ID(), '_ministry_location', true );
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
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-ministry' ); ?>>
                
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( $leader || $email || $meeting_time || $location ) : ?>
                    <div class="ministry-details-card">
                        <?php if ( $leader ) : ?>
                            <div class="ministry-detail">
                                <i class="fas fa-user"></i>
                                <div>
                                    <strong><?php esc_html_e( 'Ministry Leader', 'north-texas-sda-church' ); ?></strong>
                                    <p><?php echo esc_html( $leader ); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ( $email ) : ?>
                            <div class="ministry-detail">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <strong><?php esc_html_e( 'Contact Email', 'north-texas-sda-church' ); ?></strong>
                                    <p><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ( $meeting_time ) : ?>
                            <div class="ministry-detail">
                                <i class="fas fa-clock"></i>
                                <div>
                                    <strong><?php esc_html_e( 'Meeting Time', 'north-texas-sda-church' ); ?></strong>
                                    <p><?php echo esc_html( $meeting_time ); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ( $location ) : ?>
                            <div class="ministry-detail">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <strong><?php esc_html_e( 'Location', 'north-texas-sda-church' ); ?></strong>
                                    <p><?php echo esc_html( $location ); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
                    <?php ntsda_share_buttons(); ?>
                </footer>
            </article>

            <?php
            the_post_navigation( array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous Ministry:', 'north-texas-sda-church' ) . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Ministry:', 'north-texas-sda-church' ) . '</span> <span class="nav-title">%title</span>',
            ) );
            ?>
        </div>
    </section>

</main>

<style>
.ministry-details-card {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    background: #f9f9f9;
    padding: 30px;
    border-radius: 12px;
    margin-bottom: 40px;
}

.ministry-detail {
    display: flex;
    align-items: flex-start;
    gap: 15px;
}

.ministry-detail i {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--primary-color);
    color: var(--white);
    border-radius: 50%;
    font-size: 16px;
    flex-shrink: 0;
}

.ministry-detail strong {
    display: block;
    font-size: 12px;
    text-transform: uppercase;
    color: var(--text-light);
    margin-bottom: 5px;
}

.ministry-detail p {
    margin: 0;
    color: var(--dark-color);
}

.ministry-detail a {
    color: var(--primary-color);
}

@media (max-width: 768px) {
    .ministry-details-card {
        grid-template-columns: 1fr;
    }
}
</style>

<?php
get_footer();
