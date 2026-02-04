<?php
/**
 * Theme Customizer
 *
 * @package North_Texas_SDA_Church
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Add customizer settings
 */
function ntsda_customize_register( $wp_customize ) {

    // ========================================
    // Theme Options Panel
    // ========================================
    $wp_customize->add_panel( 'ntsda_theme_options', array(
        'title'       => esc_html__( 'Theme Options', 'north-texas-sda-church' ),
        'description' => esc_html__( 'Customize the North Texas SDA Church theme.', 'north-texas-sda-church' ),
        'priority'    => 30,
    ) );

    // ========================================
    // General Settings Section
    // ========================================
    $wp_customize->add_section( 'ntsda_general_settings', array(
        'title'    => esc_html__( 'General Settings', 'north-texas-sda-church' ),
        'panel'    => 'ntsda_theme_options',
        'priority' => 10,
    ) );

    // Church Name
    $wp_customize->add_setting( 'ntsda_church_name', array(
        'default'           => 'North Texas SDA Church',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'ntsda_church_name', array(
        'label'   => esc_html__( 'Church Name', 'north-texas-sda-church' ),
        'section' => 'ntsda_general_settings',
        'type'    => 'text',
    ) );

    // Tagline
    $wp_customize->add_setting( 'ntsda_tagline', array(
        'default'           => 'A Place where you can Worship and get Involved',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'ntsda_tagline', array(
        'label'   => esc_html__( 'Tagline', 'north-texas-sda-church' ),
        'section' => 'ntsda_general_settings',
        'type'    => 'text',
    ) );

    // ========================================
    // Hero Section
    // ========================================
    $wp_customize->add_section( 'ntsda_hero_section', array(
        'title'    => esc_html__( 'Hero Section', 'north-texas-sda-church' ),
        'panel'    => 'ntsda_theme_options',
        'priority' => 20,
    ) );

    // Hero Title Line 1
    $wp_customize->add_setting( 'ntsda_hero_title_1', array(
        'default'           => 'YOUR',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_hero_title_1', array(
        'label'   => esc_html__( 'Hero Title Line 1', 'north-texas-sda-church' ),
        'section' => 'ntsda_hero_section',
        'type'    => 'text',
    ) );

    // Hero Title Line 2
    $wp_customize->add_setting( 'ntsda_hero_title_2', array(
        'default'           => 'COMMUNITY.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_hero_title_2', array(
        'label'   => esc_html__( 'Hero Title Line 2', 'north-texas-sda-church' ),
        'section' => 'ntsda_hero_section',
        'type'    => 'text',
    ) );

    // Hero Title Line 3 (Highlighted)
    $wp_customize->add_setting( 'ntsda_hero_title_3', array(
        'default'           => 'YOUR CHURCH.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_hero_title_3', array(
        'label'   => esc_html__( 'Hero Title Line 3 (Highlighted)', 'north-texas-sda-church' ),
        'section' => 'ntsda_hero_section',
        'type'    => 'text',
    ) );

    // Hero Subtitle
    $wp_customize->add_setting( 'ntsda_hero_subtitle', array(
        'default'           => 'A Place where you can Worship and get Involved',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_hero_subtitle', array(
        'label'   => esc_html__( 'Hero Subtitle', 'north-texas-sda-church' ),
        'section' => 'ntsda_hero_section',
        'type'    => 'text',
    ) );

    // Hero Background Video
    $wp_customize->add_setting( 'ntsda_hero_video', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'ntsda_hero_video', array(
        'label'     => esc_html__( 'Hero Background Video', 'north-texas-sda-church' ),
        'section'   => 'ntsda_hero_section',
        'mime_type' => 'video',
    ) ) );

    // Hero Background Image (Fallback)
    $wp_customize->add_setting( 'ntsda_hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ntsda_hero_image', array(
        'label'   => esc_html__( 'Hero Background Image (Fallback)', 'north-texas-sda-church' ),
        'section' => 'ntsda_hero_section',
    ) ) );

    // YouTube Live URL
    $wp_customize->add_setting( 'ntsda_youtube_url', array(
        'default'           => 'https://www.youtube.com/channel/UC2Ha7c6bwtYnsfk1uVi3fPA',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'ntsda_youtube_url', array(
        'label'   => esc_html__( 'YouTube Channel/Live URL', 'north-texas-sda-church' ),
        'section' => 'ntsda_hero_section',
        'type'    => 'url',
    ) );

    // Donation URL
    $wp_customize->add_setting( 'ntsda_donation_url', array(
        'default'           => 'https://adventistgiving.org/donate/ANWFHL',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'ntsda_donation_url', array(
        'label'   => esc_html__( 'Donation URL', 'north-texas-sda-church' ),
        'section' => 'ntsda_hero_section',
        'type'    => 'url',
    ) );

    // ========================================
    // Welcome Section
    // ========================================
    $wp_customize->add_section( 'ntsda_welcome_section', array(
        'title'    => esc_html__( 'Welcome Section', 'north-texas-sda-church' ),
        'panel'    => 'ntsda_theme_options',
        'priority' => 30,
    ) );

    // Welcome Title
    $wp_customize->add_setting( 'ntsda_welcome_title', array(
        'default'           => 'WELCOME TO NORTH TEXAS SDA CHURCH',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_welcome_title', array(
        'label'   => esc_html__( 'Welcome Title', 'north-texas-sda-church' ),
        'section' => 'ntsda_welcome_section',
        'type'    => 'text',
    ) );

    // Welcome Text
    $wp_customize->add_setting( 'ntsda_welcome_text', array(
        'default'           => 'We are a Bible-believing community and would love to have you join our family. To learn more about what we believe you can visit the About Us page on this site. Please join us for Bible study, worship, and prayer.',
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'ntsda_welcome_text', array(
        'label'   => esc_html__( 'Welcome Text', 'north-texas-sda-church' ),
        'section' => 'ntsda_welcome_section',
        'type'    => 'textarea',
    ) );

    // Welcome Image
    $wp_customize->add_setting( 'ntsda_welcome_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ntsda_welcome_image', array(
        'label'   => esc_html__( 'Welcome Image', 'north-texas-sda-church' ),
        'section' => 'ntsda_welcome_section',
    ) ) );

    // ========================================
    // Mission, Vision, Values Section
    // ========================================
    $wp_customize->add_section( 'ntsda_mvv_section', array(
        'title'    => esc_html__( 'Mission, Vision, Values', 'north-texas-sda-church' ),
        'panel'    => 'ntsda_theme_options',
        'priority' => 35,
    ) );

    // Mission
    $wp_customize->add_setting( 'ntsda_mission', array(
        'default'           => "To share the love of Christ and prepare lives for Christ's soon return.",
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_mission', array(
        'label'   => esc_html__( 'Our Mission', 'north-texas-sda-church' ),
        'section' => 'ntsda_mvv_section',
        'type'    => 'textarea',
    ) );

    // Vision
    $wp_customize->add_setting( 'ntsda_vision', array(
        'default'           => 'A world transformed by the everlasting gospel and faithful living.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_vision', array(
        'label'   => esc_html__( 'Our Vision', 'north-texas-sda-church' ),
        'section' => 'ntsda_mvv_section',
        'type'    => 'textarea',
    ) );

    // Values
    $wp_customize->add_setting( 'ntsda_values', array(
        'default'           => 'Faith, compassion, truth, service, and Christ-centered living.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_values', array(
        'label'   => esc_html__( 'Our Values', 'north-texas-sda-church' ),
        'section' => 'ntsda_mvv_section',
        'type'    => 'textarea',
    ) );

    // Welcome Quote
    $wp_customize->add_setting( 'ntsda_welcome_quote', array(
        'default'           => "You're always welcome here.",
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_welcome_quote', array(
        'label'   => esc_html__( 'Welcome Quote', 'north-texas-sda-church' ),
        'section' => 'ntsda_mvv_section',
        'type'    => 'text',
    ) );

    // ========================================
    // Pastor Section
    // ========================================
    $wp_customize->add_section( 'ntsda_pastor_section', array(
        'title'    => esc_html__( 'Pastor Welcome', 'north-texas-sda-church' ),
        'panel'    => 'ntsda_theme_options',
        'priority' => 40,
    ) );

    // Pastor Name
    $wp_customize->add_setting( 'ntsda_pastor_name', array(
        'default'           => 'Denton W. Rhone',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_pastor_name', array(
        'label'   => esc_html__( 'Pastor Name', 'north-texas-sda-church' ),
        'section' => 'ntsda_pastor_section',
        'type'    => 'text',
    ) );

    // Pastor Title
    $wp_customize->add_setting( 'ntsda_pastor_title', array(
        'default'           => 'Pastor',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_pastor_title', array(
        'label'   => esc_html__( 'Pastor Title', 'north-texas-sda-church' ),
        'section' => 'ntsda_pastor_section',
        'type'    => 'text',
    ) );

    // Pastor Image
    $wp_customize->add_setting( 'ntsda_pastor_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ntsda_pastor_image', array(
        'label'   => esc_html__( 'Pastor Image', 'north-texas-sda-church' ),
        'section' => 'ntsda_pastor_section',
    ) ) );

    // Pastor Welcome Message
    $wp_customize->add_setting( 'ntsda_pastor_message', array(
        'default'           => "We're so glad you're here. I warmly invite you to be part of a growing, Spirit-led church family where you can serve, grow, and belong.",
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'ntsda_pastor_message', array(
        'label'   => esc_html__( 'Pastor Welcome Message', 'north-texas-sda-church' ),
        'section' => 'ntsda_pastor_section',
        'type'    => 'textarea',
    ) );

    // ========================================
    // Contact Information Section
    // ========================================
    $wp_customize->add_section( 'ntsda_contact_section', array(
        'title'    => esc_html__( 'Contact Information', 'north-texas-sda-church' ),
        'panel'    => 'ntsda_theme_options',
        'priority' => 50,
    ) );

    // Address Line 1
    $wp_customize->add_setting( 'ntsda_address_1', array(
        'default'           => 'Denton First SDA Church',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_address_1', array(
        'label'   => esc_html__( 'Address Line 1', 'north-texas-sda-church' ),
        'section' => 'ntsda_contact_section',
        'type'    => 'text',
    ) );

    // Address Line 2
    $wp_customize->add_setting( 'ntsda_address_2', array(
        'default'           => '11010 US-HWY 377',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_address_2', array(
        'label'   => esc_html__( 'Address Line 2', 'north-texas-sda-church' ),
        'section' => 'ntsda_contact_section',
        'type'    => 'text',
    ) );

    // Address Line 3
    $wp_customize->add_setting( 'ntsda_address_3', array(
        'default'           => 'Pilot Point, TX 76258',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_address_3', array(
        'label'   => esc_html__( 'Address Line 3', 'north-texas-sda-church' ),
        'section' => 'ntsda_contact_section',
        'type'    => 'text',
    ) );

    // Phone Number
    $wp_customize->add_setting( 'ntsda_phone', array(
        'default'           => '+1 (940) 488 9656',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_phone', array(
        'label'   => esc_html__( 'Phone Number', 'north-texas-sda-church' ),
        'section' => 'ntsda_contact_section',
        'type'    => 'text',
    ) );

    // Email Address
    $wp_customize->add_setting( 'ntsda_contact_email', array(
        'default'           => 'anwfhl-com@txsda.org',
        'sanitize_callback' => 'sanitize_email',
    ) );

    $wp_customize->add_control( 'ntsda_contact_email', array(
        'label'   => esc_html__( 'Email Address', 'north-texas-sda-church' ),
        'section' => 'ntsda_contact_section',
        'type'    => 'email',
    ) );

    // Google Maps Embed URL
    $wp_customize->add_setting( 'ntsda_google_maps', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'ntsda_google_maps', array(
        'label'       => esc_html__( 'Google Maps Embed URL', 'north-texas-sda-church' ),
        'description' => esc_html__( 'Enter the embed URL from Google Maps.', 'north-texas-sda-church' ),
        'section'     => 'ntsda_contact_section',
        'type'        => 'url',
    ) );

    // ========================================
    // Social Media Section
    // ========================================
    $wp_customize->add_section( 'ntsda_social_section', array(
        'title'    => esc_html__( 'Social Media', 'north-texas-sda-church' ),
        'panel'    => 'ntsda_theme_options',
        'priority' => 60,
    ) );

    // Facebook
    $wp_customize->add_setting( 'ntsda_facebook', array(
        'default'           => 'https://www.facebook.com/NTXSDA',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'ntsda_facebook', array(
        'label'   => esc_html__( 'Facebook URL', 'north-texas-sda-church' ),
        'section' => 'ntsda_social_section',
        'type'    => 'url',
    ) );

    // YouTube
    $wp_customize->add_setting( 'ntsda_youtube', array(
        'default'           => 'https://www.youtube.com/@NorthTexasSDAChurch',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'ntsda_youtube', array(
        'label'   => esc_html__( 'YouTube URL', 'north-texas-sda-church' ),
        'section' => 'ntsda_social_section',
        'type'    => 'url',
    ) );

    // Instagram
    $wp_customize->add_setting( 'ntsda_instagram', array(
        'default'           => 'https://www.instagram.com/ntxsda/',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'ntsda_instagram', array(
        'label'   => esc_html__( 'Instagram URL', 'north-texas-sda-church' ),
        'section' => 'ntsda_social_section',
        'type'    => 'url',
    ) );

    // WhatsApp
    $wp_customize->add_setting( 'ntsda_whatsapp', array(
        'default'           => 'https://wa.me/19404889656',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'ntsda_whatsapp', array(
        'label'   => esc_html__( 'WhatsApp URL', 'north-texas-sda-church' ),
        'section' => 'ntsda_social_section',
        'type'    => 'url',
    ) );

    // ========================================
    // Service Times Section
    // ========================================
    $wp_customize->add_section( 'ntsda_service_times', array(
        'title'    => esc_html__( 'Service Times', 'north-texas-sda-church' ),
        'panel'    => 'ntsda_theme_options',
        'priority' => 70,
    ) );

    // Sabbath School Time
    $wp_customize->add_setting( 'ntsda_sabbath_school_time', array(
        'default'           => '9:30 AM',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_sabbath_school_time', array(
        'label'   => esc_html__( 'Sabbath School Time', 'north-texas-sda-church' ),
        'section' => 'ntsda_service_times',
        'type'    => 'text',
    ) );

    // Divine Worship Time
    $wp_customize->add_setting( 'ntsda_worship_time', array(
        'default'           => '11:00 AM',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_worship_time', array(
        'label'   => esc_html__( 'Divine Worship Time', 'north-texas-sda-church' ),
        'section' => 'ntsda_service_times',
        'type'    => 'text',
    ) );

    // Prayer Meeting Time
    $wp_customize->add_setting( 'ntsda_prayer_meeting_time', array(
        'default'           => 'Wednesday 7:00 PM',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'ntsda_prayer_meeting_time', array(
        'label'   => esc_html__( 'Prayer Meeting Time', 'north-texas-sda-church' ),
        'section' => 'ntsda_service_times',
        'type'    => 'text',
    ) );

    // ========================================
    // Colors Section
    // ========================================
    $wp_customize->add_section( 'ntsda_colors_section', array(
        'title'    => esc_html__( 'Theme Colors', 'north-texas-sda-church' ),
        'panel'    => 'ntsda_theme_options',
        'priority' => 80,
    ) );

    // Primary Color
    $wp_customize->add_setting( 'ntsda_primary_color', array(
        'default'           => '#F95C28',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ntsda_primary_color', array(
        'label'   => esc_html__( 'Primary Color', 'north-texas-sda-church' ),
        'section' => 'ntsda_colors_section',
    ) ) );

    // Secondary Color
    $wp_customize->add_setting( 'ntsda_secondary_color', array(
        'default'           => '#f7b731',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ntsda_secondary_color', array(
        'label'   => esc_html__( 'Secondary Color', 'north-texas-sda-church' ),
        'section' => 'ntsda_colors_section',
    ) ) );

    // Accent Color
    $wp_customize->add_setting( 'ntsda_accent_color', array(
        'default'           => '#ffc646',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ntsda_accent_color', array(
        'label'   => esc_html__( 'Accent Color', 'north-texas-sda-church' ),
        'section' => 'ntsda_colors_section',
    ) ) );
}
add_action( 'customize_register', 'ntsda_customize_register' );

/**
 * Output custom CSS from customizer
 */
function ntsda_customizer_css() {
    $primary_color   = get_theme_mod( 'ntsda_primary_color', '#F95C28' );
    $secondary_color = get_theme_mod( 'ntsda_secondary_color', '#f7b731' );
    $accent_color    = get_theme_mod( 'ntsda_accent_color', '#ffc646' );

    $css = "
        :root {
            --primary-color: {$primary_color};
            --secondary-color: {$secondary_color};
            --accent-color: {$accent_color};
        }
    ";

    wp_add_inline_style( 'ntsda-style', $css );
}
add_action( 'wp_enqueue_scripts', 'ntsda_customizer_css' );

/**
 * Customizer live preview
 */
function ntsda_customize_preview_js() {
    wp_enqueue_script(
        'ntsda-customize-preview',
        NTSDA_THEME_URI . '/assets/js/customize-preview.js',
        array( 'customize-preview' ),
        NTSDA_THEME_VERSION,
        true
    );
}
add_action( 'customize_preview_init', 'ntsda_customize_preview_js' );
