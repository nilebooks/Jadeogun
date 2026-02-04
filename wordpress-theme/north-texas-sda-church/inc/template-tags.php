<?php
/**
 * Template Tags
 *
 * @package North_Texas_SDA_Church
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Display posted on date
 */
function ntsda_posted_on() {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

    $time_string = sprintf(
        $time_string,
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_html( get_the_date() )
    );

    echo '<span class="posted-on">' . $time_string . '</span>';
}

/**
 * Display posted by
 */
function ntsda_posted_by() {
    echo '<span class="byline">' . esc_html__( 'by ', 'north-texas-sda-church' ) . '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span>';
}

/**
 * Display entry footer with categories, tags, comments link
 */
function ntsda_entry_footer() {
    // Hide category and tag text for pages
    if ( 'post' === get_post_type() ) {
        $categories_list = get_the_category_list( ', ' );
        if ( $categories_list ) {
            echo '<span class="cat-links">' . esc_html__( 'Posted in ', 'north-texas-sda-church' ) . $categories_list . '</span>';
        }

        $tags_list = get_the_tag_list( '', ', ' );
        if ( $tags_list ) {
            echo '<span class="tags-links">' . esc_html__( 'Tagged ', 'north-texas-sda-church' ) . $tags_list . '</span>';
        }
    }

    if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo '<span class="comments-link">';
        comments_popup_link(
            sprintf(
                wp_kses(
                    __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'north-texas-sda-church' ),
                    array( 'span' => array( 'class' => array() ) )
                ),
                wp_kses_post( get_the_title() )
            )
        );
        echo '</span>';
    }

    edit_post_link(
        sprintf(
            wp_kses(
                __( 'Edit <span class="screen-reader-text">%s</span>', 'north-texas-sda-church' ),
                array( 'span' => array( 'class' => array() ) )
            ),
            wp_kses_post( get_the_title() )
        ),
        '<span class="edit-link">',
        '</span>'
    );
}

/**
 * Display post thumbnail
 */
function ntsda_post_thumbnail( $size = 'post-thumbnail' ) {
    if ( post_password_required() || is_attachment() ) {
        return;
    }

    if ( has_post_thumbnail() ) {
        echo '<div class="post-thumbnail">';
        if ( is_singular() ) {
            the_post_thumbnail( $size );
        } else {
            echo '<a href="' . esc_url( get_permalink() ) . '">';
            the_post_thumbnail( $size, array(
                'alt' => the_title_attribute( array( 'echo' => false ) ),
            ) );
            echo '</a>';
        }
        echo '</div>';
    }
}

/**
 * Display pagination
 */
function ntsda_pagination() {
    the_posts_pagination( array(
        'mid_size'  => 2,
        'prev_text' => '<i class="fas fa-chevron-left"></i>',
        'next_text' => '<i class="fas fa-chevron-right"></i>',
    ) );
}

/**
 * Display social links
 */
function ntsda_social_links() {
    $facebook  = get_theme_mod( 'ntsda_facebook' );
    $youtube   = get_theme_mod( 'ntsda_youtube' );
    $instagram = get_theme_mod( 'ntsda_instagram' );
    $whatsapp  = get_theme_mod( 'ntsda_whatsapp' );

    echo '<div class="footer-social">';
    
    if ( $facebook ) {
        echo '<a href="' . esc_url( $facebook ) . '" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="Facebook"><i class="fab fa-facebook-f"></i></a>';
    }
    
    if ( $youtube ) {
        echo '<a href="' . esc_url( $youtube ) . '" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="YouTube"><i class="fab fa-youtube"></i></a>';
    }
    
    if ( $instagram ) {
        echo '<a href="' . esc_url( $instagram ) . '" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="Instagram"><i class="fab fa-instagram"></i></a>';
    }
    
    if ( $whatsapp ) {
        echo '<a href="' . esc_url( $whatsapp ) . '" target="_blank" rel="noopener noreferrer" class="footer-social-link" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>';
    }
    
    echo '</div>';
}

/**
 * Display site logo
 */
function ntsda_site_logo() {
    if ( has_custom_logo() ) {
        the_custom_logo();
    } else {
        echo '<img src="' . esc_url( NTSDA_THEME_URI . '/assets/images/logo.png' ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
    }
}

/**
 * Display church name
 */
function ntsda_church_name() {
    $church_name = get_theme_mod( 'ntsda_church_name', 'North Texas SDA Church' );
    echo esc_html( $church_name );
}

/**
 * Display address
 */
function ntsda_address() {
    $address_1 = get_theme_mod( 'ntsda_address_1', 'Denton First SDA Church' );
    $address_2 = get_theme_mod( 'ntsda_address_2', '11010 US-HWY 377' );
    $address_3 = get_theme_mod( 'ntsda_address_3', 'Pilot Point, TX 76258' );

    echo '<div class="footer-address">';
    if ( $address_1 ) {
        echo esc_html( $address_1 ) . '<br>';
    }
    if ( $address_2 ) {
        echo esc_html( $address_2 ) . '<br>';
    }
    if ( $address_3 ) {
        echo esc_html( $address_3 );
    }
    echo '</div>';
}

/**
 * Display phone number
 */
function ntsda_phone() {
    $phone = get_theme_mod( 'ntsda_phone', '+1 (940) 488 9656' );
    if ( $phone ) {
        echo '<p class="footer-contact-item">' . esc_html( $phone ) . '</p>';
    }
}

/**
 * Display email
 */
function ntsda_email() {
    $email = get_theme_mod( 'ntsda_contact_email', 'anwfhl-com@txsda.org' );
    if ( $email ) {
        echo '<p class="footer-contact-item">' . esc_html( $email ) . '</p>';
    }
}

/**
 * Display breadcrumbs
 */
function ntsda_breadcrumbs() {
    if ( is_front_page() ) {
        return;
    }

    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'north-texas-sda-church' ) . '</a>';

    if ( is_category() || is_single() ) {
        echo ' <span class="separator">/</span> ';
        the_category( ' <span class="separator">/</span> ' );
        if ( is_single() ) {
            echo ' <span class="separator">/</span> ';
            echo '<span class="current">' . get_the_title() . '</span>';
        }
    } elseif ( is_page() ) {
        echo ' <span class="separator">/</span> ';
        echo '<span class="current">' . get_the_title() . '</span>';
    } elseif ( is_search() ) {
        echo ' <span class="separator">/</span> ';
        echo '<span class="current">' . esc_html__( 'Search Results', 'north-texas-sda-church' ) . '</span>';
    } elseif ( is_archive() ) {
        echo ' <span class="separator">/</span> ';
        echo '<span class="current">';
        if ( is_post_type_archive() ) {
            post_type_archive_title();
        } elseif ( is_tax() ) {
            single_term_title();
        } else {
            the_archive_title();
        }
        echo '</span>';
    }

    echo '</nav>';
}

/**
 * Get event date formatted
 */
function ntsda_get_event_date( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $event_date = get_post_meta( $post_id, '_event_date', true );
    
    if ( $event_date ) {
        return date_i18n( get_option( 'date_format' ), strtotime( $event_date ) );
    }

    return get_the_date( '', $post_id );
}

/**
 * Get event time formatted
 */
function ntsda_get_event_time( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $start_time = get_post_meta( $post_id, '_event_start_time', true );
    $end_time   = get_post_meta( $post_id, '_event_end_time', true );

    if ( $start_time && $end_time ) {
        return sprintf( '%s - %s', $start_time, $end_time );
    } elseif ( $start_time ) {
        return $start_time;
    }

    return '';
}

/**
 * Get event location
 */
function ntsda_get_event_location( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    return get_post_meta( $post_id, '_event_location', true );
}

/**
 * Get sermon speaker
 */
function ntsda_get_sermon_speaker( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    return get_post_meta( $post_id, '_sermon_speaker', true );
}

/**
 * Get sermon video URL
 */
function ntsda_get_sermon_video( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    return get_post_meta( $post_id, '_sermon_video_url', true );
}

/**
 * Get sermon audio URL
 */
function ntsda_get_sermon_audio( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    return get_post_meta( $post_id, '_sermon_audio_url', true );
}

/**
 * Get team member role
 */
function ntsda_get_team_member_role( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    return get_post_meta( $post_id, '_team_member_role', true );
}

/**
 * Get team member email
 */
function ntsda_get_team_member_email( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    return get_post_meta( $post_id, '_team_member_email', true );
}

/**
 * Display read time estimate
 */
function ntsda_read_time() {
    $content = get_the_content();
    $word_count = str_word_count( strip_tags( $content ) );
    $read_time = ceil( $word_count / 200 );

    echo '<span class="read-time">' . sprintf( esc_html__( '%d min read', 'north-texas-sda-church' ), $read_time ) . '</span>';
}

/**
 * Display share buttons
 */
function ntsda_share_buttons() {
    $url   = urlencode( get_permalink() );
    $title = urlencode( get_the_title() );

    echo '<div class="share-buttons">';
    echo '<span class="share-label">' . esc_html__( 'Share:', 'north-texas-sda-church' ) . '</span>';
    echo '<a href="https://www.facebook.com/sharer/sharer.php?u=' . $url . '" target="_blank" rel="noopener noreferrer" class="share-button facebook"><i class="fab fa-facebook-f"></i></a>';
    echo '<a href="https://twitter.com/intent/tweet?url=' . $url . '&text=' . $title . '" target="_blank" rel="noopener noreferrer" class="share-button twitter"><i class="fab fa-twitter"></i></a>';
    echo '<a href="https://www.linkedin.com/shareArticle?mini=true&url=' . $url . '&title=' . $title . '" target="_blank" rel="noopener noreferrer" class="share-button linkedin"><i class="fab fa-linkedin-in"></i></a>';
    echo '<a href="mailto:?subject=' . $title . '&body=' . $url . '" class="share-button email"><i class="fas fa-envelope"></i></a>';
    echo '</div>';
}
