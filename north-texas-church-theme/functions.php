<?php
/**
 * North Texas SDA Church Theme Functions
 *
 * @package North_Texas_Church
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function north_texas_church_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-background');
    add_theme_support('customize-selective-refresh-widgets');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'north-texas-church'),
        'footer' => __('Footer Menu', 'north-texas-church'),
    ));

    // Set image sizes
    add_image_size('event-thumbnail', 800, 500, true);
    add_image_size('sermon-thumbnail', 600, 400, true);
    add_image_size('leader-thumbnail', 400, 400, true);
}
add_action('after_setup_theme', 'north_texas_church_setup');

/**
 * Enqueue Scripts and Styles
 */
function north_texas_church_scripts() {
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Bebas+Neue&family=Lora:ital,wght@0,400..700;1,400..700&family=Oswald:wght@200..700&display=swap', array(), null);
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Theme stylesheet
    wp_enqueue_style('north-texas-church-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    
    // Locomotive Scroll
    wp_enqueue_script('locomotive-scroll', 'https://unpkg.com/@studio-freight/lenis@1.0.38/bundled/lenis.min.js', array(), '1.0.38', true);
    
    // jQuery (already included in WordPress)
    wp_enqueue_script('jquery');
    
    // Theme scripts
    wp_enqueue_script('north-texas-church-main', get_template_directory_uri() . '/js/main.js', array('jquery'), wp_get_theme()->get('Version'), true);
    
    // Localize script for AJAX
    wp_localize_script('north-texas-church-main', 'northTexasChurch', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('north_texas_church_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'north_texas_church_scripts');

/**
 * Register Custom Post Types
 */
function north_texas_church_custom_post_types() {
    // Events Post Type
    register_post_type('event', array(
        'labels' => array(
            'name' => __('Events', 'north-texas-church'),
            'singular_name' => __('Event', 'north-texas-church'),
            'add_new' => __('Add New Event', 'north-texas-church'),
            'add_new_item' => __('Add New Event', 'north-texas-church'),
            'edit_item' => __('Edit Event', 'north-texas-church'),
            'new_item' => __('New Event', 'north-texas-church'),
            'view_item' => __('View Event', 'north-texas-church'),
            'search_items' => __('Search Events', 'north-texas-church'),
            'not_found' => __('No events found', 'north-texas-church'),
            'not_found_in_trash' => __('No events found in trash', 'north-texas-church'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'events'),
        'show_in_rest' => true,
    ));

    // Sermons Post Type
    register_post_type('sermon', array(
        'labels' => array(
            'name' => __('Sermons', 'north-texas-church'),
            'singular_name' => __('Sermon', 'north-texas-church'),
            'add_new' => __('Add New Sermon', 'north-texas-church'),
            'add_new_item' => __('Add New Sermon', 'north-texas-church'),
            'edit_item' => __('Edit Sermon', 'north-texas-church'),
            'new_item' => __('New Sermon', 'north-texas-church'),
            'view_item' => __('View Sermon', 'north-texas-church'),
            'search_items' => __('Search Sermons', 'north-texas-church'),
            'not_found' => __('No sermons found', 'north-texas-church'),
            'not_found_in_trash' => __('No sermons found in trash', 'north-texas-church'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-video-alt3',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'sermons'),
        'show_in_rest' => true,
    ));

    // Prayer Requests Post Type
    register_post_type('prayer_request', array(
        'labels' => array(
            'name' => __('Prayer Requests', 'north-texas-church'),
            'singular_name' => __('Prayer Request', 'north-texas-church'),
            'add_new' => __('Add New Prayer Request', 'north-texas-church'),
            'add_new_item' => __('Add New Prayer Request', 'north-texas-church'),
            'edit_item' => __('Edit Prayer Request', 'north-texas-church'),
            'new_item' => __('New Prayer Request', 'north-texas-church'),
            'view_item' => __('View Prayer Request', 'north-texas-church'),
            'search_items' => __('Search Prayer Requests', 'north-texas-church'),
            'not_found' => __('No prayer requests found', 'north-texas-church'),
            'not_found_in_trash' => __('No prayer requests found in trash', 'north-texas-church'),
        ),
        'public' => false,
        'show_ui' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-heart',
        'supports' => array('title', 'editor'),
        'capability_type' => 'post',
        'capabilities' => array(
            'create_posts' => 'edit_posts',
        ),
        'map_meta_cap' => true,
        'show_in_rest' => true,
    ));

    // Team Members Post Type
    register_post_type('team_member', array(
        'labels' => array(
            'name' => __('Team Members', 'north-texas-church'),
            'singular_name' => __('Team Member', 'north-texas-church'),
            'add_new' => __('Add New Team Member', 'north-texas-church'),
            'add_new_item' => __('Add New Team Member', 'north-texas-church'),
            'edit_item' => __('Edit Team Member', 'north-texas-church'),
            'new_item' => __('New Team Member', 'north-texas-church'),
            'view_item' => __('View Team Member', 'north-texas-church'),
            'search_items' => __('Search Team Members', 'north-texas-church'),
            'not_found' => __('No team members found', 'north-texas-church'),
            'not_found_in_trash' => __('No team members found in trash', 'north-texas-church'),
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'team'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'north_texas_church_custom_post_types');

/**
 * Register Custom Taxonomies
 */
function north_texas_church_taxonomies() {
    // Event Categories
    register_taxonomy('event_category', 'event', array(
        'labels' => array(
            'name' => __('Event Categories', 'north-texas-church'),
            'singular_name' => __('Event Category', 'north-texas-church'),
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'event-category'),
    ));

    // Sermon Series
    register_taxonomy('sermon_series', 'sermon', array(
        'labels' => array(
            'name' => __('Sermon Series', 'north-texas-church'),
            'singular_name' => __('Sermon Series', 'north-texas-church'),
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'sermon-series'),
    ));

    // Prayer Request Categories
    register_taxonomy('prayer_category', 'prayer_request', array(
        'labels' => array(
            'name' => __('Prayer Categories', 'north-texas-church'),
            'singular_name' => __('Prayer Category', 'north-texas-church'),
        ),
        'hierarchical' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'north_texas_church_taxonomies');

/**
 * Register Widget Areas
 */
function north_texas_church_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer Column 1', 'north-texas-church'),
        'id' => 'footer-1',
        'description' => __('Footer widget area 1', 'north-texas-church'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Column 2', 'north-texas-church'),
        'id' => 'footer-2',
        'description' => __('Footer widget area 2', 'north-texas-church'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Column 3', 'north-texas-church'),
        'id' => 'footer-3',
        'description' => __('Footer widget area 3', 'north-texas-church'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Column 4', 'north-texas-church'),
        'id' => 'footer-4',
        'description' => __('Footer widget area 4', 'north-texas-church'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'north_texas_church_widgets_init');

/**
 * Add Custom Meta Boxes
 */
function north_texas_church_add_meta_boxes() {
    // Event Date Meta Box
    add_meta_box(
        'event_details',
        __('Event Details', 'north-texas-church'),
        'north_texas_church_event_details_callback',
        'event',
        'normal',
        'high'
    );

    // Sermon Details Meta Box
    add_meta_box(
        'sermon_details',
        __('Sermon Details', 'north-texas-church'),
        'north_texas_church_sermon_details_callback',
        'sermon',
        'normal',
        'high'
    );

    // Prayer Request Details Meta Box
    add_meta_box(
        'prayer_details',
        __('Prayer Request Details', 'north-texas-church'),
        'north_texas_church_prayer_details_callback',
        'prayer_request',
        'normal',
        'high'
    );

    // Team Member Details Meta Box
    add_meta_box(
        'team_member_details',
        __('Team Member Details', 'north-texas-church'),
        'north_texas_church_team_member_details_callback',
        'team_member',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'north_texas_church_add_meta_boxes');

/**
 * Event Details Meta Box Callback
 */
function north_texas_church_event_details_callback($post) {
    wp_nonce_field('north_texas_church_event_details', 'north_texas_church_event_details_nonce');
    
    $event_date = get_post_meta($post->ID, '_event_date', true);
    $event_time = get_post_meta($post->ID, '_event_time', true);
    $event_location = get_post_meta($post->ID, '_event_location', true);
    $event_address = get_post_meta($post->ID, '_event_address', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="event_date"><?php _e('Event Date', 'north-texas-church'); ?></label></th>
            <td><input type="date" id="event_date" name="event_date" value="<?php echo esc_attr($event_date); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="event_time"><?php _e('Event Time', 'north-texas-church'); ?></label></th>
            <td><input type="time" id="event_time" name="event_time" value="<?php echo esc_attr($event_time); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="event_location"><?php _e('Location Name', 'north-texas-church'); ?></label></th>
            <td><input type="text" id="event_location" name="event_location" value="<?php echo esc_attr($event_location); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="event_address"><?php _e('Address', 'north-texas-church'); ?></label></th>
            <td><textarea id="event_address" name="event_address" rows="3" class="large-text"><?php echo esc_textarea($event_address); ?></textarea></td>
        </tr>
    </table>
    <?php
}

/**
 * Sermon Details Meta Box Callback
 */
function north_texas_church_sermon_details_callback($post) {
    wp_nonce_field('north_texas_church_sermon_details', 'north_texas_church_sermon_details_nonce');
    
    $sermon_date = get_post_meta($post->ID, '_sermon_date', true);
    $sermon_speaker = get_post_meta($post->ID, '_sermon_speaker', true);
    $sermon_video_url = get_post_meta($post->ID, '_sermon_video_url', true);
    $sermon_audio_url = get_post_meta($post->ID, '_sermon_audio_url', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="sermon_date"><?php _e('Sermon Date', 'north-texas-church'); ?></label></th>
            <td><input type="date" id="sermon_date" name="sermon_date" value="<?php echo esc_attr($sermon_date); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="sermon_speaker"><?php _e('Speaker', 'north-texas-church'); ?></label></th>
            <td><input type="text" id="sermon_speaker" name="sermon_speaker" value="<?php echo esc_attr($sermon_speaker); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="sermon_video_url"><?php _e('Video URL', 'north-texas-church'); ?></label></th>
            <td><input type="url" id="sermon_video_url" name="sermon_video_url" value="<?php echo esc_attr($sermon_video_url); ?>" class="large-text" placeholder="https://youtube.com/..."></td>
        </tr>
        <tr>
            <th><label for="sermon_audio_url"><?php _e('Audio URL', 'north-texas-church'); ?></label></th>
            <td><input type="url" id="sermon_audio_url" name="sermon_audio_url" value="<?php echo esc_attr($sermon_audio_url); ?>" class="large-text"></td>
        </tr>
    </table>
    <?php
}

/**
 * Prayer Request Details Meta Box Callback
 */
function north_texas_church_prayer_details_callback($post) {
    wp_nonce_field('north_texas_church_prayer_details', 'north_texas_church_prayer_details_nonce');
    
    $requester_name = get_post_meta($post->ID, '_requester_name', true);
    $requester_email = get_post_meta($post->ID, '_requester_email', true);
    $requester_phone = get_post_meta($post->ID, '_requester_phone', true);
    $is_confidential = get_post_meta($post->ID, '_is_confidential', true);
    $contact_requested = get_post_meta($post->ID, '_contact_requested', true);
    $prayer_status = get_post_meta($post->ID, '_prayer_status', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="requester_name"><?php _e('Requester Name', 'north-texas-church'); ?></label></th>
            <td><input type="text" id="requester_name" name="requester_name" value="<?php echo esc_attr($requester_name); ?>" class="regular-text" readonly></td>
        </tr>
        <tr>
            <th><label for="requester_email"><?php _e('Email', 'north-texas-church'); ?></label></th>
            <td><input type="email" id="requester_email" name="requester_email" value="<?php echo esc_attr($requester_email); ?>" class="regular-text" readonly></td>
        </tr>
        <tr>
            <th><label for="requester_phone"><?php _e('Phone', 'north-texas-church'); ?></label></th>
            <td><input type="text" id="requester_phone" name="requester_phone" value="<?php echo esc_attr($requester_phone); ?>" class="regular-text" readonly></td>
        </tr>
        <tr>
            <th><label for="is_confidential"><?php _e('Confidential', 'north-texas-church'); ?></label></th>
            <td><input type="checkbox" id="is_confidential" name="is_confidential" value="1" <?php checked($is_confidential, '1'); ?> disabled> <?php _e('This is a confidential request', 'north-texas-church'); ?></td>
        </tr>
        <tr>
            <th><label for="contact_requested"><?php _e('Contact Requested', 'north-texas-church'); ?></label></th>
            <td><input type="checkbox" id="contact_requested" name="contact_requested" value="1" <?php checked($contact_requested, '1'); ?> disabled> <?php _e('Requester wants to be contacted', 'north-texas-church'); ?></td>
        </tr>
        <tr>
            <th><label for="prayer_status"><?php _e('Status', 'north-texas-church'); ?></label></th>
            <td>
                <select id="prayer_status" name="prayer_status" class="regular-text">
                    <option value="pending" <?php selected($prayer_status, 'pending'); ?>><?php _e('Pending', 'north-texas-church'); ?></option>
                    <option value="praying" <?php selected($prayer_status, 'praying'); ?>><?php _e('Praying', 'north-texas-church'); ?></option>
                    <option value="answered" <?php selected($prayer_status, 'answered'); ?>><?php _e('Answered', 'north-texas-church'); ?></option>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Team Member Details Meta Box Callback
 */
function north_texas_church_team_member_details_callback($post) {
    wp_nonce_field('north_texas_church_team_member_details', 'north_texas_church_team_member_details_nonce');
    
    $position = get_post_meta($post->ID, '_position', true);
    $email = get_post_meta($post->ID, '_email', true);
    $phone = get_post_meta($post->ID, '_phone', true);
    $display_order = get_post_meta($post->ID, '_display_order', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="position"><?php _e('Position/Title', 'north-texas-church'); ?></label></th>
            <td><input type="text" id="position" name="position" value="<?php echo esc_attr($position); ?>" class="regular-text" placeholder="e.g., Senior Pastor, Youth Leader"></td>
        </tr>
        <tr>
            <th><label for="email"><?php _e('Email', 'north-texas-church'); ?></label></th>
            <td><input type="email" id="email" name="email" value="<?php echo esc_attr($email); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="phone"><?php _e('Phone', 'north-texas-church'); ?></label></th>
            <td><input type="text" id="phone" name="phone" value="<?php echo esc_attr($phone); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="display_order"><?php _e('Display Order', 'north-texas-church'); ?></label></th>
            <td><input type="number" id="display_order" name="display_order" value="<?php echo esc_attr($display_order); ?>" class="small-text" min="0" step="1"> <span class="description"><?php _e('Lower numbers appear first', 'north-texas-church'); ?></span></td>
        </tr>
    </table>
    <?php
}

/**
 * Save Meta Box Data
 */
function north_texas_church_save_meta_boxes($post_id) {
    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save Event Meta
    if (isset($_POST['north_texas_church_event_details_nonce']) && wp_verify_nonce($_POST['north_texas_church_event_details_nonce'], 'north_texas_church_event_details')) {
        if (isset($_POST['event_date'])) {
            update_post_meta($post_id, '_event_date', sanitize_text_field($_POST['event_date']));
        }
        if (isset($_POST['event_time'])) {
            update_post_meta($post_id, '_event_time', sanitize_text_field($_POST['event_time']));
        }
        if (isset($_POST['event_location'])) {
            update_post_meta($post_id, '_event_location', sanitize_text_field($_POST['event_location']));
        }
        if (isset($_POST['event_address'])) {
            update_post_meta($post_id, '_event_address', sanitize_textarea_field($_POST['event_address']));
        }
    }

    // Save Sermon Meta
    if (isset($_POST['north_texas_church_sermon_details_nonce']) && wp_verify_nonce($_POST['north_texas_church_sermon_details_nonce'], 'north_texas_church_sermon_details')) {
        if (isset($_POST['sermon_date'])) {
            update_post_meta($post_id, '_sermon_date', sanitize_text_field($_POST['sermon_date']));
        }
        if (isset($_POST['sermon_speaker'])) {
            update_post_meta($post_id, '_sermon_speaker', sanitize_text_field($_POST['sermon_speaker']));
        }
        if (isset($_POST['sermon_video_url'])) {
            update_post_meta($post_id, '_sermon_video_url', esc_url_raw($_POST['sermon_video_url']));
        }
        if (isset($_POST['sermon_audio_url'])) {
            update_post_meta($post_id, '_sermon_audio_url', esc_url_raw($_POST['sermon_audio_url']));
        }
    }

    // Save Prayer Request Meta
    if (isset($_POST['north_texas_church_prayer_details_nonce']) && wp_verify_nonce($_POST['north_texas_church_prayer_details_nonce'], 'north_texas_church_prayer_details')) {
        if (isset($_POST['prayer_status'])) {
            update_post_meta($post_id, '_prayer_status', sanitize_text_field($_POST['prayer_status']));
        }
    }

    // Save Team Member Meta
    if (isset($_POST['north_texas_church_team_member_details_nonce']) && wp_verify_nonce($_POST['north_texas_church_team_member_details_nonce'], 'north_texas_church_team_member_details')) {
        if (isset($_POST['position'])) {
            update_post_meta($post_id, '_position', sanitize_text_field($_POST['position']));
        }
        if (isset($_POST['email'])) {
            update_post_meta($post_id, '_email', sanitize_email($_POST['email']));
        }
        if (isset($_POST['phone'])) {
            update_post_meta($post_id, '_phone', sanitize_text_field($_POST['phone']));
        }
        if (isset($_POST['display_order'])) {
            update_post_meta($post_id, '_display_order', absint($_POST['display_order']));
        }
    }
}
add_action('save_post', 'north_texas_church_save_meta_boxes');

/**
 * AJAX Handler for Prayer Requests
 */
function north_texas_church_submit_prayer_request() {
    check_ajax_referer('north_texas_church_nonce', 'nonce');

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $category = sanitize_text_field($_POST['category']);
    $request = sanitize_textarea_field($_POST['request']);
    $confidential = isset($_POST['confidential']) ? '1' : '0';
    $contact_me = isset($_POST['contact_me']) ? '1' : '0';

    // Create prayer request post
    $post_id = wp_insert_post(array(
        'post_title' => $name . ' - ' . $category,
        'post_content' => $request,
        'post_status' => 'publish',
        'post_type' => 'prayer_request',
    ));

    if ($post_id) {
        // Save meta data
        update_post_meta($post_id, '_requester_name', $name);
        update_post_meta($post_id, '_requester_email', $email);
        update_post_meta($post_id, '_requester_phone', $phone);
        update_post_meta($post_id, '_is_confidential', $confidential);
        update_post_meta($post_id, '_contact_requested', $contact_me);
        update_post_meta($post_id, '_prayer_status', 'pending');

        // Set prayer category
        wp_set_object_terms($post_id, $category, 'prayer_category');

        // Send email notification
        $admin_email = get_option('admin_email');
        $subject = 'New Prayer Request: ' . $category;
        $message = "A new prayer request has been submitted:\n\n";
        $message .= "Name: $name\n";
        $message .= "Email: $email\n";
        $message .= "Phone: $phone\n";
        $message .= "Category: $category\n";
        $message .= "Confidential: " . ($confidential ? 'Yes' : 'No') . "\n";
        $message .= "Contact Requested: " . ($contact_me ? 'Yes' : 'No') . "\n\n";
        $message .= "Request:\n$request\n\n";
        $message .= "View in admin: " . admin_url('post.php?post=' . $post_id . '&action=edit');

        wp_mail($admin_email, $subject, $message);

        wp_send_json_success(array(
            'message' => 'Your prayer request has been submitted successfully. Our prayer team will be praying for you.',
        ));
    } else {
        wp_send_json_error(array(
            'message' => 'There was an error submitting your prayer request. Please try again.',
        ));
    }
}
add_action('wp_ajax_submit_prayer_request', 'north_texas_church_submit_prayer_request');
add_action('wp_ajax_nopriv_submit_prayer_request', 'north_texas_church_submit_prayer_request');

/**
 * Customizer Settings
 */
function north_texas_church_customize_register($wp_customize) {
    // Hero Section Settings
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'north-texas-church'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_title', array(
        'default' => 'Welcome to North Texas SDA Church',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'north-texas-church'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Join us in worship and fellowship',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'north-texas-church'),
        'section' => 'hero_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('hero_video_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('hero_video_url', array(
        'label' => __('Hero Video URL', 'north-texas-church'),
        'section' => 'hero_section',
        'type' => 'url',
    ));

    // Contact Information
    $wp_customize->add_section('contact_info', array(
        'title' => __('Contact Information', 'north-texas-church'),
        'priority' => 35,
    ));

    $wp_customize->add_setting('church_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('church_phone', array(
        'label' => __('Church Phone', 'north-texas-church'),
        'section' => 'contact_info',
        'type' => 'text',
    ));

    $wp_customize->add_setting('church_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('church_email', array(
        'label' => __('Church Email', 'north-texas-church'),
        'section' => 'contact_info',
        'type' => 'email',
    ));

    $wp_customize->add_setting('church_address', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('church_address', array(
        'label' => __('Church Address', 'north-texas-church'),
        'section' => 'contact_info',
        'type' => 'textarea',
    ));

    // Social Media Links
    $wp_customize->add_section('social_media', array(
        'title' => __('Social Media', 'north-texas-church'),
        'priority' => 40,
    ));

    $social_networks = array('facebook', 'twitter', 'instagram', 'youtube', 'linkedin');
    foreach ($social_networks as $network) {
        $wp_customize->add_setting($network . '_url', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control($network . '_url', array(
            'label' => ucfirst($network) . ' URL',
            'section' => 'social_media',
            'type' => 'url',
        ));
    }
}
add_action('customize_register', 'north_texas_church_customize_register');

/**
 * Add Admin Menu for Theme Documentation
 */
function north_texas_church_admin_menu() {
    add_theme_page(
        __('Theme Documentation', 'north-texas-church'),
        __('Documentation', 'north-texas-church'),
        'edit_theme_options',
        'north-texas-church-docs',
        'north_texas_church_docs_page'
    );
}
add_action('admin_menu', 'north_texas_church_admin_menu');

/**
 * Theme Documentation Page
 */
function north_texas_church_docs_page() {
    ?>
    <div class="wrap">
        <h1><?php _e('North Texas SDA Church Theme Documentation', 'north-texas-church'); ?></h1>
        
        <div class="card">
            <h2><?php _e('Getting Started', 'north-texas-church'); ?></h2>
            <p><?php _e('Thank you for using the North Texas SDA Church theme. This theme is specifically designed for church websites with features including:', 'north-texas-church'); ?></p>
            <ul>
                <li><?php _e('Event Management', 'north-texas-church'); ?></li>
                <li><?php _e('Sermon Archive', 'north-texas-church'); ?></li>
                <li><?php _e('Prayer Request System', 'north-texas-church'); ?></li>
                <li><?php _e('Team Member Directory', 'north-texas-church'); ?></li>
                <li><?php _e('Responsive Design', 'north-texas-church'); ?></li>
                <li><?php _e('Customizable Hero Section', 'north-texas-church'); ?></li>
            </ul>
        </div>

        <div class="card">
            <h2><?php _e('Custom Post Types', 'north-texas-church'); ?></h2>
            <h3><?php _e('Events', 'north-texas-church'); ?></h3>
            <p><?php _e('Create and manage church events with dates, times, locations, and featured images.', 'north-texas-church'); ?></p>
            
            <h3><?php _e('Sermons', 'north-texas-church'); ?></h3>
            <p><?php _e('Archive your sermons with video/audio URLs, speakers, and sermon series.', 'north-texas-church'); ?></p>
            
            <h3><?php _e('Prayer Requests', 'north-texas-church'); ?></h3>
            <p><?php _e('Receive and manage prayer requests from your congregation with privacy options.', 'north-texas-church'); ?></p>
            
            <h3><?php _e('Team Members', 'north-texas-church'); ?></h3>
            <p><?php _e('Showcase your church staff and leadership team.', 'north-texas-church'); ?></p>
        </div>

        <div class="card">
            <h2><?php _e('Customization', 'north-texas-church'); ?></h2>
            <p><?php _e('Visit Appearance > Customize to modify:', 'north-texas-church'); ?></p>
            <ul>
                <li><?php _e('Site Identity (Logo, Title, Tagline)', 'north-texas-church'); ?></li>
                <li><?php _e('Hero Section (Title, Subtitle, Video)', 'north-texas-church'); ?></li>
                <li><?php _e('Contact Information', 'north-texas-church'); ?></li>
                <li><?php _e('Social Media Links', 'north-texas-church'); ?></li>
                <li><?php _e('Colors and Backgrounds', 'north-texas-church'); ?></li>
            </ul>
        </div>

        <div class="card">
            <h2><?php _e('Support', 'north-texas-church'); ?></h2>
            <p><?php _e('For support and documentation, please visit: northtexassdachurch.com', 'north-texas-church'); ?></p>
        </div>
    </div>
    <?php
}
