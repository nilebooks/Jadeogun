<?php
/**
 * Single Sermon Template
 *
 * @package North_Texas_SDA_Church
 */

get_header();

// Get sermon meta
$speaker    = get_post_meta( get_the_ID(), '_sermon_speaker', true );
$video_url  = get_post_meta( get_the_ID(), '_sermon_video_url', true );
$audio_url  = get_post_meta( get_the_ID(), '_sermon_audio_url', true );
$pdf_url    = get_post_meta( get_the_ID(), '_sermon_pdf_url', true );
$scripture  = get_post_meta( get_the_ID(), '_sermon_scripture', true );
?>

<main id="primary" class="site-main">

    <header class="page-header">
        <div class="container">
            <?php ntsda_breadcrumbs(); ?>
            <h1 class="page-title"><?php the_title(); ?></h1>
            <div class="sermon-meta">
                <?php if ( $speaker ) : ?>
                    <span class="sermon-speaker"><i class="fas fa-user"></i> <?php echo esc_html( $speaker ); ?></span>
                <?php endif; ?>
                <span class="sermon-date"><i class="fas fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?></span>
                <?php if ( $scripture ) : ?>
                    <span class="sermon-scripture"><i class="fas fa-book-bible"></i> <?php echo esc_html( $scripture ); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <section class="page-content">
        <div class="container">
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-sermon' ); ?>>
                
                <?php if ( $video_url ) : ?>
                    <div class="sermon-video">
                        <?php echo wp_oembed_get( $video_url ); ?>
                    </div>
                <?php elseif ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

                <?php if ( $audio_url ) : ?>
                    <div class="sermon-audio">
                        <h3><?php esc_html_e( 'Listen to Audio', 'north-texas-sda-church' ); ?></h3>
                        <audio controls>
                            <source src="<?php echo esc_url( $audio_url ); ?>" type="audio/mpeg">
                            <?php esc_html_e( 'Your browser does not support the audio element.', 'north-texas-sda-church' ); ?>
                        </audio>
                    </div>
                <?php endif; ?>

                <div class="sermon-actions">
                    <?php if ( $video_url ) : ?>
                        <a href="<?php echo esc_url( $video_url ); ?>" class="btn btn-primary" target="_blank">
                            <i class="fas fa-play"></i> <?php esc_html_e( 'Watch Video', 'north-texas-sda-church' ); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ( $audio_url ) : ?>
                        <a href="<?php echo esc_url( $audio_url ); ?>" class="btn btn-outline" download>
                            <i class="fas fa-download"></i> <?php esc_html_e( 'Download Audio', 'north-texas-sda-church' ); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ( $pdf_url ) : ?>
                        <a href="<?php echo esc_url( $pdf_url ); ?>" class="btn btn-outline" target="_blank">
                            <i class="fas fa-file-pdf"></i> <?php esc_html_e( 'View Notes', 'north-texas-sda-church' ); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
                    <?php
                    $series = get_the_terms( get_the_ID(), 'sermon_series' );
                    if ( $series && ! is_wp_error( $series ) ) :
                    ?>
                        <div class="sermon-series">
                            <strong><?php esc_html_e( 'Series:', 'north-texas-sda-church' ); ?></strong>
                            <?php
                            foreach ( $series as $s ) {
                                echo '<a href="' . esc_url( get_term_link( $s ) ) . '">' . esc_html( $s->name ) . '</a>';
                            }
                            ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    $topics = get_the_terms( get_the_ID(), 'sermon_topic' );
                    if ( $topics && ! is_wp_error( $topics ) ) :
                    ?>
                        <div class="sermon-topics">
                            <strong><?php esc_html_e( 'Topics:', 'north-texas-sda-church' ); ?></strong>
                            <?php echo get_the_term_list( get_the_ID(), 'sermon_topic', '', ', ' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php ntsda_share_buttons(); ?>
                </footer>
            </article>

            <?php
            the_post_navigation( array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous Sermon:', 'north-texas-sda-church' ) . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Sermon:', 'north-texas-sda-church' ) . '</span> <span class="nav-title">%title</span>',
            ) );
            ?>
        </div>
    </section>

</main>

<?php
get_footer();
