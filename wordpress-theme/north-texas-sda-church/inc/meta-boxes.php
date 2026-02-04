<?php
/**
 * Meta Boxes
 *
 * @package North_Texas_SDA_Church
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register meta boxes
 */
function ntsda_register_meta_boxes() {
    // Event Meta Box
    add_meta_box(
        'ntsda_event_details',
        esc_html__( 'Event Details', 'north-texas-sda-church' ),
        'ntsda_event_meta_box_callback',
        'event',
        'normal',
        'high'
    );

    // Sermon Meta Box
    add_meta_box(
        'ntsda_sermon_details',
        esc_html__( 'Sermon Details', 'north-texas-sda-church' ),
        'ntsda_sermon_meta_box_callback',
        'sermon',
        'normal',
        'high'
    );

    // Team Member Meta Box
    add_meta_box(
        'ntsda_team_member_details',
        esc_html__( 'Team Member Details', 'north-texas-sda-church' ),
        'ntsda_team_member_meta_box_callback',
        'team_member',
        'normal',
        'high'
    );

    // Ministry Meta Box
    add_meta_box(
        'ntsda_ministry_details',
        esc_html__( 'Ministry Details', 'north-texas-sda-church' ),
        'ntsda_ministry_meta_box_callback',
        'ministry',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'ntsda_register_meta_boxes' );

/**
 * Event Meta Box Callback
 */
function ntsda_event_meta_box_callback( $post ) {
    wp_nonce_field( 'ntsda_event_nonce', 'ntsda_event_nonce' );

    $event_date       = get_post_meta( $post->ID, '_event_date', true );
    $event_start_time = get_post_meta( $post->ID, '_event_start_time', true );
    $event_end_time   = get_post_meta( $post->ID, '_event_end_time', true );
    $event_location   = get_post_meta( $post->ID, '_event_location', true );
    $event_address    = get_post_meta( $post->ID, '_event_address', true );
    $event_link       = get_post_meta( $post->ID, '_event_link', true );
    ?>

    <table class="form-table">
        <tr>
            <th><label for="event_date"><?php esc_html_e( 'Event Date', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="date" id="event_date" name="event_date" value="<?php echo esc_attr( $event_date ); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="event_start_time"><?php esc_html_e( 'Start Time', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="time" id="event_start_time" name="event_start_time" value="<?php echo esc_attr( $event_start_time ); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="event_end_time"><?php esc_html_e( 'End Time', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="time" id="event_end_time" name="event_end_time" value="<?php echo esc_attr( $event_end_time ); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="event_location"><?php esc_html_e( 'Location Name', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="text" id="event_location" name="event_location" value="<?php echo esc_attr( $event_location ); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="event_address"><?php esc_html_e( 'Address', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <textarea id="event_address" name="event_address" rows="3" class="large-text"><?php echo esc_textarea( $event_address ); ?></textarea>
            </td>
        </tr>
        <tr>
            <th><label for="event_link"><?php esc_html_e( 'Event Link (optional)', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="url" id="event_link" name="event_link" value="<?php echo esc_url( $event_link ); ?>" class="regular-text">
                <p class="description"><?php esc_html_e( 'External link for event registration or details.', 'north-texas-sda-church' ); ?></p>
            </td>
        </tr>
    </table>

    <?php
}

/**
 * Sermon Meta Box Callback
 */
function ntsda_sermon_meta_box_callback( $post ) {
    wp_nonce_field( 'ntsda_sermon_nonce', 'ntsda_sermon_nonce' );

    $sermon_speaker   = get_post_meta( $post->ID, '_sermon_speaker', true );
    $sermon_date      = get_post_meta( $post->ID, '_sermon_date', true );
    $sermon_video_url = get_post_meta( $post->ID, '_sermon_video_url', true );
    $sermon_audio_url = get_post_meta( $post->ID, '_sermon_audio_url', true );
    $sermon_pdf_url   = get_post_meta( $post->ID, '_sermon_pdf_url', true );
    $sermon_scripture = get_post_meta( $post->ID, '_sermon_scripture', true );
    $sermon_featured  = get_post_meta( $post->ID, '_sermon_featured', true );
    ?>

    <table class="form-table">
        <tr>
            <th><label for="sermon_speaker"><?php esc_html_e( 'Speaker', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="text" id="sermon_speaker" name="sermon_speaker" value="<?php echo esc_attr( $sermon_speaker ); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="sermon_date"><?php esc_html_e( 'Sermon Date', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="date" id="sermon_date" name="sermon_date" value="<?php echo esc_attr( $sermon_date ); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="sermon_scripture"><?php esc_html_e( 'Scripture Reference', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="text" id="sermon_scripture" name="sermon_scripture" value="<?php echo esc_attr( $sermon_scripture ); ?>" class="regular-text">
                <p class="description"><?php esc_html_e( 'e.g., John 3:16-17', 'north-texas-sda-church' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="sermon_video_url"><?php esc_html_e( 'Video URL', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="url" id="sermon_video_url" name="sermon_video_url" value="<?php echo esc_url( $sermon_video_url ); ?>" class="regular-text">
                <p class="description"><?php esc_html_e( 'YouTube, Vimeo, or direct video URL.', 'north-texas-sda-church' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="sermon_audio_url"><?php esc_html_e( 'Audio URL', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="url" id="sermon_audio_url" name="sermon_audio_url" value="<?php echo esc_url( $sermon_audio_url ); ?>" class="regular-text">
                <p class="description"><?php esc_html_e( 'MP3 or audio file URL.', 'north-texas-sda-church' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="sermon_pdf_url"><?php esc_html_e( 'Notes/PDF URL', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="url" id="sermon_pdf_url" name="sermon_pdf_url" value="<?php echo esc_url( $sermon_pdf_url ); ?>" class="regular-text">
                <p class="description"><?php esc_html_e( 'PDF or document URL for sermon notes.', 'north-texas-sda-church' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="sermon_featured"><?php esc_html_e( 'Featured Sermon', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <label>
                    <input type="checkbox" id="sermon_featured" name="sermon_featured" value="1" <?php checked( $sermon_featured, '1' ); ?>>
                    <?php esc_html_e( 'Display this sermon in the featured section on the homepage.', 'north-texas-sda-church' ); ?>
                </label>
            </td>
        </tr>
    </table>

    <?php
}

/**
 * Team Member Meta Box Callback
 */
function ntsda_team_member_meta_box_callback( $post ) {
    wp_nonce_field( 'ntsda_team_member_nonce', 'ntsda_team_member_nonce' );

    $member_role     = get_post_meta( $post->ID, '_team_member_role', true );
    $member_email    = get_post_meta( $post->ID, '_team_member_email', true );
    $member_phone    = get_post_meta( $post->ID, '_team_member_phone', true );
    $member_facebook = get_post_meta( $post->ID, '_team_member_facebook', true );
    $member_twitter  = get_post_meta( $post->ID, '_team_member_twitter', true );
    $member_linkedin = get_post_meta( $post->ID, '_team_member_linkedin', true );
    $member_order    = get_post_meta( $post->ID, '_team_member_order', true );
    ?>

    <table class="form-table">
        <tr>
            <th><label for="team_member_role"><?php esc_html_e( 'Role/Position', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="text" id="team_member_role" name="team_member_role" value="<?php echo esc_attr( $member_role ); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="team_member_email"><?php esc_html_e( 'Email', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="email" id="team_member_email" name="team_member_email" value="<?php echo esc_attr( $member_email ); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="team_member_phone"><?php esc_html_e( 'Phone', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="text" id="team_member_phone" name="team_member_phone" value="<?php echo esc_attr( $member_phone ); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="team_member_facebook"><?php esc_html_e( 'Facebook URL', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="url" id="team_member_facebook" name="team_member_facebook" value="<?php echo esc_url( $member_facebook ); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="team_member_twitter"><?php esc_html_e( 'Twitter URL', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="url" id="team_member_twitter" name="team_member_twitter" value="<?php echo esc_url( $member_twitter ); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="team_member_linkedin"><?php esc_html_e( 'LinkedIn URL', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="url" id="team_member_linkedin" name="team_member_linkedin" value="<?php echo esc_url( $member_linkedin ); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="team_member_order"><?php esc_html_e( 'Display Order', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="number" id="team_member_order" name="team_member_order" value="<?php echo esc_attr( $member_order ); ?>" class="small-text" min="0">
                <p class="description"><?php esc_html_e( 'Lower numbers display first.', 'north-texas-sda-church' ); ?></p>
            </td>
        </tr>
    </table>

    <?php
}

/**
 * Ministry Meta Box Callback
 */
function ntsda_ministry_meta_box_callback( $post ) {
    wp_nonce_field( 'ntsda_ministry_nonce', 'ntsda_ministry_nonce' );

    $ministry_leader       = get_post_meta( $post->ID, '_ministry_leader', true );
    $ministry_email        = get_post_meta( $post->ID, '_ministry_email', true );
    $ministry_meeting_time = get_post_meta( $post->ID, '_ministry_meeting_time', true );
    $ministry_location     = get_post_meta( $post->ID, '_ministry_location', true );
    ?>

    <table class="form-table">
        <tr>
            <th><label for="ministry_leader"><?php esc_html_e( 'Ministry Leader', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="text" id="ministry_leader" name="ministry_leader" value="<?php echo esc_attr( $ministry_leader ); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="ministry_email"><?php esc_html_e( 'Contact Email', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="email" id="ministry_email" name="ministry_email" value="<?php echo esc_attr( $ministry_email ); ?>" class="regular-text">
            </td>
        </tr>
        <tr>
            <th><label for="ministry_meeting_time"><?php esc_html_e( 'Meeting Time', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="text" id="ministry_meeting_time" name="ministry_meeting_time" value="<?php echo esc_attr( $ministry_meeting_time ); ?>" class="regular-text">
                <p class="description"><?php esc_html_e( 'e.g., Every Saturday at 9:30 AM', 'north-texas-sda-church' ); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="ministry_location"><?php esc_html_e( 'Meeting Location', 'north-texas-sda-church' ); ?></label></th>
            <td>
                <input type="text" id="ministry_location" name="ministry_location" value="<?php echo esc_attr( $ministry_location ); ?>" class="regular-text">
            </td>
        </tr>
    </table>

    <?php
}

/**
 * Save Event Meta
 */
function ntsda_save_event_meta( $post_id ) {
    if ( ! isset( $_POST['ntsda_event_nonce'] ) || ! wp_verify_nonce( $_POST['ntsda_event_nonce'], 'ntsda_event_nonce' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $fields = array(
        'event_date'       => 'sanitize_text_field',
        'event_start_time' => 'sanitize_text_field',
        'event_end_time'   => 'sanitize_text_field',
        'event_location'   => 'sanitize_text_field',
        'event_address'    => 'sanitize_textarea_field',
        'event_link'       => 'esc_url_raw',
    );

    foreach ( $fields as $field => $sanitize ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_post_meta( $post_id, '_' . $field, $sanitize( $_POST[ $field ] ) );
        }
    }
}
add_action( 'save_post_event', 'ntsda_save_event_meta' );

/**
 * Save Sermon Meta
 */
function ntsda_save_sermon_meta( $post_id ) {
    if ( ! isset( $_POST['ntsda_sermon_nonce'] ) || ! wp_verify_nonce( $_POST['ntsda_sermon_nonce'], 'ntsda_sermon_nonce' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $fields = array(
        'sermon_speaker'   => 'sanitize_text_field',
        'sermon_date'      => 'sanitize_text_field',
        'sermon_video_url' => 'esc_url_raw',
        'sermon_audio_url' => 'esc_url_raw',
        'sermon_pdf_url'   => 'esc_url_raw',
        'sermon_scripture' => 'sanitize_text_field',
    );

    foreach ( $fields as $field => $sanitize ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_post_meta( $post_id, '_' . $field, $sanitize( $_POST[ $field ] ) );
        }
    }

    // Handle checkbox
    $featured = isset( $_POST['sermon_featured'] ) ? '1' : '0';
    update_post_meta( $post_id, '_sermon_featured', $featured );
}
add_action( 'save_post_sermon', 'ntsda_save_sermon_meta' );

/**
 * Save Team Member Meta
 */
function ntsda_save_team_member_meta( $post_id ) {
    if ( ! isset( $_POST['ntsda_team_member_nonce'] ) || ! wp_verify_nonce( $_POST['ntsda_team_member_nonce'], 'ntsda_team_member_nonce' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $fields = array(
        'team_member_role'     => 'sanitize_text_field',
        'team_member_email'    => 'sanitize_email',
        'team_member_phone'    => 'sanitize_text_field',
        'team_member_facebook' => 'esc_url_raw',
        'team_member_twitter'  => 'esc_url_raw',
        'team_member_linkedin' => 'esc_url_raw',
        'team_member_order'    => 'absint',
    );

    foreach ( $fields as $field => $sanitize ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_post_meta( $post_id, '_' . $field, $sanitize( $_POST[ $field ] ) );
        }
    }
}
add_action( 'save_post_team_member', 'ntsda_save_team_member_meta' );

/**
 * Save Ministry Meta
 */
function ntsda_save_ministry_meta( $post_id ) {
    if ( ! isset( $_POST['ntsda_ministry_nonce'] ) || ! wp_verify_nonce( $_POST['ntsda_ministry_nonce'], 'ntsda_ministry_nonce' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $fields = array(
        'ministry_leader'       => 'sanitize_text_field',
        'ministry_email'        => 'sanitize_email',
        'ministry_meeting_time' => 'sanitize_text_field',
        'ministry_location'     => 'sanitize_text_field',
    );

    foreach ( $fields as $field => $sanitize ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_post_meta( $post_id, '_' . $field, $sanitize( $_POST[ $field ] ) );
        }
    }
}
add_action( 'save_post_ministry', 'ntsda_save_ministry_meta' );
