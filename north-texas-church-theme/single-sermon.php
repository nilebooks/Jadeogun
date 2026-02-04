<?php
/**
 * The template for displaying single sermons
 *
 * @package North_Texas_Church
 */

get_header();
?>

<section class="single-sermon-section" data-scroll-section style="padding: 150px 0 100px;">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            $sermon_speaker = get_post_meta(get_the_ID(), '_sermon_speaker', true);
            $sermon_date = get_post_meta(get_the_ID(), '_sermon_date', true);
            $sermon_video_url = get_post_meta(get_the_ID(), '_sermon_video_url', true);
            $sermon_audio_url = get_post_meta(get_the_ID(), '_sermon_audio_url', true);
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header" style="margin-bottom: 40px; text-align: center;">
                    <h1 class="section-title"><?php the_title(); ?></h1>
                    <div class="sermon-meta" style="font-size: 18px; color: #666; margin-top: 20px;">
                        <?php if ($sermon_date) : ?>
                            <span class="sermon-date" style="display: inline-block; margin: 0 15px;">
                                <i class="far fa-calendar"></i> <?php echo date('F j, Y', strtotime($sermon_date)); ?>
                            </span>
                        <?php endif; ?>
                        <?php if ($sermon_speaker) : ?>
                            <span class="sermon-speaker" style="display: inline-block; margin: 0 15px;">
                                <i class="fas fa-user"></i> <?php echo esc_html($sermon_speaker); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </header>

                <?php if ($sermon_video_url) : ?>
                    <div class="sermon-video" style="margin-bottom: 40px; max-width: 1000px; margin-left: auto; margin-right: auto;">
                        <?php
                        // Handle YouTube URLs
                        if (strpos($sermon_video_url, 'youtube.com') !== false || strpos($sermon_video_url, 'youtu.be') !== false) {
                            preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&\?\/]+)/', $sermon_video_url, $matches);
                            if (!empty($matches[1])) {
                                $video_id = $matches[1];
                                echo '<div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">';
                                echo '<iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border-radius: 10px;" src="https://www.youtube.com/embed/' . esc_attr($video_id) . '" frameborder="0" allowfullscreen></iframe>';
                                echo '</div>';
                            }
                        } else {
                            echo '<video controls style="width: 100%; border-radius: 10px;">';
                            echo '<source src="' . esc_url($sermon_video_url) . '" type="video/mp4">';
                            echo 'Your browser does not support the video tag.';
                            echo '</video>';
                        }
                        ?>
                    </div>
                <?php elseif (has_post_thumbnail()) : ?>
                    <div class="entry-thumbnail" style="margin-bottom: 40px; text-align: center;">
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; max-width: 1000px; border-radius: 10px;')); ?>
                    </div>
                <?php endif; ?>

                <?php if ($sermon_audio_url) : ?>
                    <div class="sermon-audio" style="margin-bottom: 40px; max-width: 1000px; margin-left: auto; margin-right: auto;">
                        <audio controls style="width: 100%;">
                            <source src="<?php echo esc_url($sermon_audio_url); ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                <?php endif; ?>

                <div class="entry-content" style="font-size: 18px; line-height: 1.8; color: #555; max-width: 900px; margin: 0 auto;">
                    <?php the_content(); ?>
                </div>

                <div style="text-align: center; margin-top: 60px;">
                    <a href="<?php echo esc_url(home_url('/sermons')); ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Sermons
                    </a>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</section>

<?php
get_footer();
