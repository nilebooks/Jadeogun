<?php
/**
 * North Texas SDA Church Theme Functions
 *
 * @package North_Texas_SDA_Church
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Define theme constants
 */
define( 'NTSDA_THEME_VERSION', '1.0.0' );
define( 'NTSDA_THEME_DIR', get_template_directory() );
define( 'NTSDA_THEME_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function ntsda_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails
    add_theme_support( 'post-thumbnails' );

    // Set post thumbnail size
    set_post_thumbnail_size( 1200, 675, true );

    // Add custom image sizes
    add_image_size( 'ntsda-hero', 1920, 1080, true );
    add_image_size( 'ntsda-sermon', 600, 400, true );
    add_image_size( 'ntsda-event', 400, 300, true );
    add_image_size( 'ntsda-team', 400, 500, true );
    add_image_size( 'ntsda-ministry', 600, 700, true );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'north-texas-sda-church' ),
        'footer'  => esc_html__( 'Footer Menu', 'north-texas-sda-church' ),
    ) );

    // Switch default core markup to valid HTML5
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Add support for custom logo
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    // Add support for custom background
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
    ) );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );

    // Add support for responsive embeds
    add_theme_support( 'responsive-embeds' );

    // Add support for Block Styles
    add_theme_support( 'wp-block-styles' );

    // Add support for full and wide align images
    add_theme_support( 'align-wide' );

    // Add support for custom color palette
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => esc_html__( 'Primary Orange', 'north-texas-sda-church' ),
            'slug'  => 'primary-orange',
            'color' => '#F95C28',
        ),
        array(
            'name'  => esc_html__( 'Secondary Yellow', 'north-texas-sda-church' ),
            'slug'  => 'secondary-yellow',
            'color' => '#f7b731',
        ),
        array(
            'name'  => esc_html__( 'Dark', 'north-texas-sda-church' ),
            'slug'  => 'dark',
            'color' => '#1d1d1d',
        ),
        array(
            'name'  => esc_html__( 'Light Background', 'north-texas-sda-church' ),
            'slug'  => 'light-bg',
            'color' => '#F8F1E6',
        ),
        array(
            'name'  => esc_html__( 'Green', 'north-texas-sda-church' ),
            'slug'  => 'green',
            'color' => '#3e4e3e',
        ),
    ) );
}
add_action( 'after_setup_theme', 'ntsda_theme_setup' );

/**
 * Enqueue scripts and styles
 */
function ntsda_enqueue_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'ntsda-google-fonts',
        'https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@300;400;500;600;700&family=Barlow:wght@300;400;500;600;700&family=Bebas+Neue&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Montserrat:wght@300;400;500;600;700&family=Oswald:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        array(),
        '6.4.0'
    );

    // Theme stylesheet
    wp_enqueue_style(
        'ntsda-style',
        get_stylesheet_uri(),
        array( 'ntsda-google-fonts', 'font-awesome' ),
        NTSDA_THEME_VERSION
    );

    // Theme JavaScript
    wp_enqueue_script(
        'ntsda-scripts',
        NTSDA_THEME_URI . '/assets/js/main.js',
        array( 'jquery' ),
        NTSDA_THEME_VERSION,
        true
    );

    // Localize script for AJAX
    wp_localize_script( 'ntsda-scripts', 'ntsdaAjax', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'ntsda_nonce' ),
    ) );

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'ntsda_enqueue_scripts' );

/**
 * Register Custom Post Types
 */
function ntsda_register_post_types() {
    // Sermons Post Type
    register_post_type( 'sermon', array(
        'labels' => array(
            'name'               => esc_html__( 'Sermons', 'north-texas-sda-church' ),
            'singular_name'      => esc_html__( 'Sermon', 'north-texas-sda-church' ),
            'add_new'            => esc_html__( 'Add New', 'north-texas-sda-church' ),
            'add_new_item'       => esc_html__( 'Add New Sermon', 'north-texas-sda-church' ),
            'edit_item'          => esc_html__( 'Edit Sermon', 'north-texas-sda-church' ),
            'new_item'           => esc_html__( 'New Sermon', 'north-texas-sda-church' ),
            'view_item'          => esc_html__( 'View Sermon', 'north-texas-sda-church' ),
            'search_items'       => esc_html__( 'Search Sermons', 'north-texas-sda-church' ),
            'not_found'          => esc_html__( 'No sermons found', 'north-texas-sda-church' ),
            'not_found_in_trash' => esc_html__( 'No sermons found in Trash', 'north-texas-sda-church' ),
            'menu_name'          => esc_html__( 'Sermons', 'north-texas-sda-church' ),
        ),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array( 'slug' => 'sermons' ),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'menu_icon'           => 'dashicons-microphone',
        'show_in_rest'        => true,
    ) );

    // Events Post Type
    register_post_type( 'event', array(
        'labels' => array(
            'name'               => esc_html__( 'Events', 'north-texas-sda-church' ),
            'singular_name'      => esc_html__( 'Event', 'north-texas-sda-church' ),
            'add_new'            => esc_html__( 'Add New', 'north-texas-sda-church' ),
            'add_new_item'       => esc_html__( 'Add New Event', 'north-texas-sda-church' ),
            'edit_item'          => esc_html__( 'Edit Event', 'north-texas-sda-church' ),
            'new_item'           => esc_html__( 'New Event', 'north-texas-sda-church' ),
            'view_item'          => esc_html__( 'View Event', 'north-texas-sda-church' ),
            'search_items'       => esc_html__( 'Search Events', 'north-texas-sda-church' ),
            'not_found'          => esc_html__( 'No events found', 'north-texas-sda-church' ),
            'not_found_in_trash' => esc_html__( 'No events found in Trash', 'north-texas-sda-church' ),
            'menu_name'          => esc_html__( 'Events', 'north-texas-sda-church' ),
        ),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array( 'slug' => 'events' ),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'menu_icon'           => 'dashicons-calendar-alt',
        'show_in_rest'        => true,
    ) );

    // Team Members Post Type
    register_post_type( 'team_member', array(
        'labels' => array(
            'name'               => esc_html__( 'Team Members', 'north-texas-sda-church' ),
            'singular_name'      => esc_html__( 'Team Member', 'north-texas-sda-church' ),
            'add_new'            => esc_html__( 'Add New', 'north-texas-sda-church' ),
            'add_new_item'       => esc_html__( 'Add New Team Member', 'north-texas-sda-church' ),
            'edit_item'          => esc_html__( 'Edit Team Member', 'north-texas-sda-church' ),
            'new_item'           => esc_html__( 'New Team Member', 'north-texas-sda-church' ),
            'view_item'          => esc_html__( 'View Team Member', 'north-texas-sda-church' ),
            'search_items'       => esc_html__( 'Search Team Members', 'north-texas-sda-church' ),
            'not_found'          => esc_html__( 'No team members found', 'north-texas-sda-church' ),
            'not_found_in_trash' => esc_html__( 'No team members found in Trash', 'north-texas-sda-church' ),
            'menu_name'          => esc_html__( 'Team', 'north-texas-sda-church' ),
        ),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array( 'slug' => 'team' ),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'menu_icon'           => 'dashicons-groups',
        'show_in_rest'        => true,
    ) );

    // Ministries Post Type
    register_post_type( 'ministry', array(
        'labels' => array(
            'name'               => esc_html__( 'Ministries', 'north-texas-sda-church' ),
            'singular_name'      => esc_html__( 'Ministry', 'north-texas-sda-church' ),
            'add_new'            => esc_html__( 'Add New', 'north-texas-sda-church' ),
            'add_new_item'       => esc_html__( 'Add New Ministry', 'north-texas-sda-church' ),
            'edit_item'          => esc_html__( 'Edit Ministry', 'north-texas-sda-church' ),
            'new_item'           => esc_html__( 'New Ministry', 'north-texas-sda-church' ),
            'view_item'          => esc_html__( 'View Ministry', 'north-texas-sda-church' ),
            'search_items'       => esc_html__( 'Search Ministries', 'north-texas-sda-church' ),
            'not_found'          => esc_html__( 'No ministries found', 'north-texas-sda-church' ),
            'not_found_in_trash' => esc_html__( 'No ministries found in Trash', 'north-texas-sda-church' ),
            'menu_name'          => esc_html__( 'Ministries', 'north-texas-sda-church' ),
        ),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array( 'slug' => 'ministries' ),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'menu_icon'           => 'dashicons-heart',
        'show_in_rest'        => true,
    ) );

    // Gallery Post Type
    register_post_type( 'gallery', array(
        'labels' => array(
            'name'               => esc_html__( 'Gallery', 'north-texas-sda-church' ),
            'singular_name'      => esc_html__( 'Gallery Item', 'north-texas-sda-church' ),
            'add_new'            => esc_html__( 'Add New', 'north-texas-sda-church' ),
            'add_new_item'       => esc_html__( 'Add New Gallery Item', 'north-texas-sda-church' ),
            'edit_item'          => esc_html__( 'Edit Gallery Item', 'north-texas-sda-church' ),
            'new_item'           => esc_html__( 'New Gallery Item', 'north-texas-sda-church' ),
            'view_item'          => esc_html__( 'View Gallery Item', 'north-texas-sda-church' ),
            'search_items'       => esc_html__( 'Search Gallery', 'north-texas-sda-church' ),
            'not_found'          => esc_html__( 'No gallery items found', 'north-texas-sda-church' ),
            'not_found_in_trash' => esc_html__( 'No gallery items found in Trash', 'north-texas-sda-church' ),
            'menu_name'          => esc_html__( 'Gallery', 'north-texas-sda-church' ),
        ),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array( 'slug' => 'gallery' ),
        'supports'            => array( 'title', 'thumbnail', 'custom-fields' ),
        'menu_icon'           => 'dashicons-format-gallery',
        'show_in_rest'        => true,
    ) );
}
add_action( 'init', 'ntsda_register_post_types' );

/**
 * Register Custom Taxonomies
 */
function ntsda_register_taxonomies() {
    // Sermon Series
    register_taxonomy( 'sermon_series', 'sermon', array(
        'labels' => array(
            'name'              => esc_html__( 'Sermon Series', 'north-texas-sda-church' ),
            'singular_name'     => esc_html__( 'Sermon Series', 'north-texas-sda-church' ),
            'search_items'      => esc_html__( 'Search Series', 'north-texas-sda-church' ),
            'all_items'         => esc_html__( 'All Series', 'north-texas-sda-church' ),
            'edit_item'         => esc_html__( 'Edit Series', 'north-texas-sda-church' ),
            'update_item'       => esc_html__( 'Update Series', 'north-texas-sda-church' ),
            'add_new_item'      => esc_html__( 'Add New Series', 'north-texas-sda-church' ),
            'new_item_name'     => esc_html__( 'New Series Name', 'north-texas-sda-church' ),
            'menu_name'         => esc_html__( 'Series', 'north-texas-sda-church' ),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'sermon-series' ),
        'show_in_rest'      => true,
    ) );

    // Sermon Topics
    register_taxonomy( 'sermon_topic', 'sermon', array(
        'labels' => array(
            'name'              => esc_html__( 'Topics', 'north-texas-sda-church' ),
            'singular_name'     => esc_html__( 'Topic', 'north-texas-sda-church' ),
            'search_items'      => esc_html__( 'Search Topics', 'north-texas-sda-church' ),
            'all_items'         => esc_html__( 'All Topics', 'north-texas-sda-church' ),
            'edit_item'         => esc_html__( 'Edit Topic', 'north-texas-sda-church' ),
            'update_item'       => esc_html__( 'Update Topic', 'north-texas-sda-church' ),
            'add_new_item'      => esc_html__( 'Add New Topic', 'north-texas-sda-church' ),
            'new_item_name'     => esc_html__( 'New Topic Name', 'north-texas-sda-church' ),
            'menu_name'         => esc_html__( 'Topics', 'north-texas-sda-church' ),
        ),
        'hierarchical'      => false,
        'public'            => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'sermon-topic' ),
        'show_in_rest'      => true,
    ) );

    // Event Categories
    register_taxonomy( 'event_category', 'event', array(
        'labels' => array(
            'name'              => esc_html__( 'Event Categories', 'north-texas-sda-church' ),
            'singular_name'     => esc_html__( 'Event Category', 'north-texas-sda-church' ),
            'search_items'      => esc_html__( 'Search Categories', 'north-texas-sda-church' ),
            'all_items'         => esc_html__( 'All Categories', 'north-texas-sda-church' ),
            'edit_item'         => esc_html__( 'Edit Category', 'north-texas-sda-church' ),
            'update_item'       => esc_html__( 'Update Category', 'north-texas-sda-church' ),
            'add_new_item'      => esc_html__( 'Add New Category', 'north-texas-sda-church' ),
            'new_item_name'     => esc_html__( 'New Category Name', 'north-texas-sda-church' ),
            'menu_name'         => esc_html__( 'Categories', 'north-texas-sda-church' ),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'event-category' ),
        'show_in_rest'      => true,
    ) );

    // Gallery Categories
    register_taxonomy( 'gallery_category', 'gallery', array(
        'labels' => array(
            'name'              => esc_html__( 'Gallery Categories', 'north-texas-sda-church' ),
            'singular_name'     => esc_html__( 'Gallery Category', 'north-texas-sda-church' ),
            'search_items'      => esc_html__( 'Search Categories', 'north-texas-sda-church' ),
            'all_items'         => esc_html__( 'All Categories', 'north-texas-sda-church' ),
            'edit_item'         => esc_html__( 'Edit Category', 'north-texas-sda-church' ),
            'update_item'       => esc_html__( 'Update Category', 'north-texas-sda-church' ),
            'add_new_item'      => esc_html__( 'Add New Category', 'north-texas-sda-church' ),
            'new_item_name'     => esc_html__( 'New Category Name', 'north-texas-sda-church' ),
            'menu_name'         => esc_html__( 'Categories', 'north-texas-sda-church' ),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'gallery-category' ),
        'show_in_rest'      => true,
    ) );
}
add_action( 'init', 'ntsda_register_taxonomies' );

/**
 * Register Widget Areas
 */
function ntsda_register_sidebars() {
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'north-texas-sda-church' ),
        'id'            => 'sidebar-blog',
        'description'   => esc_html__( 'Widgets for the blog sidebar.', 'north-texas-sda-church' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 1', 'north-texas-sda-church' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'First footer widget area.', 'north-texas-sda-church' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 2', 'north-texas-sda-church' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Second footer widget area.', 'north-texas-sda-church' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 3', 'north-texas-sda-church' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Third footer widget area.', 'north-texas-sda-church' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Column 4', 'north-texas-sda-church' ),
        'id'            => 'footer-4',
        'description'   => esc_html__( 'Fourth footer widget area.', 'north-texas-sda-church' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'ntsda_register_sidebars' );

/**
 * Include required files
 */
require_once NTSDA_THEME_DIR . '/inc/customizer.php';
require_once NTSDA_THEME_DIR . '/inc/template-tags.php';
require_once NTSDA_THEME_DIR . '/inc/meta-boxes.php';
require_once NTSDA_THEME_DIR . '/inc/shortcodes.php';

/**
 * Custom Walker for Primary Navigation
 */
class NTSDA_Walker_Nav_Menu extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '<ul class="sub-menu">';
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';
        
        if ( in_array( 'menu-item-has-children', $classes ) ) {
            $classes[] = 'dropdown';
        }
        
        $class_names = join( ' ', array_filter( $classes ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
        $atts['class']  = 'nav-link';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = isset( $args->before ) ? $args->before : '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= ( isset( $args->link_before ) ? $args->link_before : '' ) . apply_filters( 'the_title', $item->title, $item->ID ) . ( isset( $args->link_after ) ? $args->link_after : '' );
        
        if ( in_array( 'menu-item-has-children', $item->classes ) ) {
            $item_output .= '<span class="mobile-dropdown-toggle"><i class="fas fa-plus"></i></span>';
        }
        
        $item_output .= '</a>';
        $item_output .= isset( $args->after ) ? $args->after : '';

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

/**
 * Add nav menu CSS classes
 */
function ntsda_nav_menu_css_class( $classes, $item, $args, $depth ) {
    if ( isset( $args->add_li_class ) ) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'ntsda_nav_menu_css_class', 10, 4 );

/**
 * Prayer Request AJAX Handler
 */
function ntsda_handle_prayer_request() {
    check_ajax_referer( 'ntsda_nonce', 'nonce' );

    $name    = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
    $email   = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
    $request = isset( $_POST['request'] ) ? sanitize_textarea_field( $_POST['request'] ) : '';

    if ( empty( $name ) || empty( $email ) || empty( $request ) ) {
        wp_send_json_error( array( 'message' => 'Please fill in all required fields.' ) );
    }

    // Get admin email
    $admin_email = get_option( 'admin_email' );
    $church_email = get_theme_mod( 'ntsda_contact_email', $admin_email );

    // Email subject and message
    $subject = sprintf( 'Prayer Request from %s', $name );
    $message = sprintf(
        "Name: %s\nEmail: %s\n\nPrayer Request:\n%s",
        $name,
        $email,
        $request
    );

    // Send email
    $sent = wp_mail( $church_email, $subject, $message );

    if ( $sent ) {
        wp_send_json_success( array( 'message' => 'Your prayer request has been submitted. We will be praying for you.' ) );
    } else {
        wp_send_json_error( array( 'message' => 'There was an error submitting your request. Please try again.' ) );
    }
}
add_action( 'wp_ajax_ntsda_prayer_request', 'ntsda_handle_prayer_request' );
add_action( 'wp_ajax_nopriv_ntsda_prayer_request', 'ntsda_handle_prayer_request' );

/**
 * Contact Form AJAX Handler
 */
function ntsda_handle_contact_form() {
    check_ajax_referer( 'ntsda_nonce', 'nonce' );

    $name    = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
    $email   = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
    $phone   = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
    $subject = isset( $_POST['subject'] ) ? sanitize_text_field( $_POST['subject'] ) : '';
    $message = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

    if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
        wp_send_json_error( array( 'message' => 'Please fill in all required fields.' ) );
    }

    // Get admin email
    $admin_email = get_option( 'admin_email' );
    $church_email = get_theme_mod( 'ntsda_contact_email', $admin_email );

    // Email subject and message
    $email_subject = ! empty( $subject ) ? $subject : sprintf( 'Contact Form Message from %s', $name );
    $email_message = sprintf(
        "Name: %s\nEmail: %s\nPhone: %s\n\nMessage:\n%s",
        $name,
        $email,
        $phone,
        $message
    );

    // Send email
    $sent = wp_mail( $church_email, $email_subject, $email_message );

    if ( $sent ) {
        wp_send_json_success( array( 'message' => 'Your message has been sent. We will get back to you soon.' ) );
    } else {
        wp_send_json_error( array( 'message' => 'There was an error sending your message. Please try again.' ) );
    }
}
add_action( 'wp_ajax_ntsda_contact_form', 'ntsda_handle_contact_form' );
add_action( 'wp_ajax_nopriv_ntsda_contact_form', 'ntsda_handle_contact_form' );

/**
 * Newsletter Subscription AJAX Handler
 */
function ntsda_handle_newsletter() {
    check_ajax_referer( 'ntsda_nonce', 'nonce' );

    $email = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';

    if ( empty( $email ) || ! is_email( $email ) ) {
        wp_send_json_error( array( 'message' => 'Please enter a valid email address.' ) );
    }

    // Store subscriber in options (can be replaced with proper newsletter service integration)
    $subscribers = get_option( 'ntsda_newsletter_subscribers', array() );
    
    if ( in_array( $email, $subscribers ) ) {
        wp_send_json_error( array( 'message' => 'You are already subscribed to our newsletter.' ) );
    }

    $subscribers[] = $email;
    update_option( 'ntsda_newsletter_subscribers', $subscribers );

    wp_send_json_success( array( 'message' => 'Thank you for subscribing to our newsletter!' ) );
}
add_action( 'wp_ajax_ntsda_newsletter', 'ntsda_handle_newsletter' );
add_action( 'wp_ajax_nopriv_ntsda_newsletter', 'ntsda_handle_newsletter' );

/**
 * Get upcoming events
 */
function ntsda_get_upcoming_events( $count = 3 ) {
    $args = array(
        'post_type'      => 'event',
        'posts_per_page' => $count,
        'meta_key'       => '_event_date',
        'orderby'        => 'meta_value',
        'order'          => 'ASC',
        'meta_query'     => array(
            array(
                'key'     => '_event_date',
                'value'   => date( 'Y-m-d' ),
                'compare' => '>=',
                'type'    => 'DATE',
            ),
        ),
    );

    return new WP_Query( $args );
}

/**
 * Get featured sermons
 */
function ntsda_get_featured_sermons( $count = 3 ) {
    $args = array(
        'post_type'      => 'sermon',
        'posts_per_page' => $count,
        'meta_query'     => array(
            array(
                'key'     => '_sermon_featured',
                'value'   => '1',
                'compare' => '=',
            ),
        ),
    );

    $query = new WP_Query( $args );

    // If no featured sermons, get latest
    if ( ! $query->have_posts() ) {
        $args = array(
            'post_type'      => 'sermon',
            'posts_per_page' => $count,
        );
        $query = new WP_Query( $args );
    }

    return $query;
}

/**
 * Get next Saturday date for countdown
 */
function ntsda_get_next_saturday() {
    $today = new DateTime();
    $saturday = new DateTime( 'next Saturday 9:30:00' );
    
    // If today is Saturday, check if service time has passed
    if ( $today->format( 'l' ) === 'Saturday' ) {
        $service_time = new DateTime( 'today 9:30:00' );
        if ( $today < $service_time ) {
            $saturday = $service_time;
        }
    }
    
    return $saturday->format( 'Y-m-d H:i:s' );
}

/**
 * Add body classes
 */
function ntsda_body_classes( $classes ) {
    // Add page slug as class
    if ( is_page() ) {
        global $post;
        $classes[] = 'page-' . $post->post_name;
    }

    // Add class for front page
    if ( is_front_page() ) {
        $classes[] = 'front-page';
    }

    return $classes;
}
add_filter( 'body_class', 'ntsda_body_classes' );

/**
 * Excerpt length
 */
function ntsda_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'ntsda_excerpt_length' );

/**
 * Excerpt more
 */
function ntsda_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'ntsda_excerpt_more' );

/**
 * Allow SVG uploads
 */
function ntsda_mime_types( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'ntsda_mime_types' );

/**
 * Flush rewrite rules on theme activation
 */
function ntsda_rewrite_flush() {
    ntsda_register_post_types();
    ntsda_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'ntsda_rewrite_flush' );
