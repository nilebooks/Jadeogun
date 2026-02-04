<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="scroll-container" data-scroll-container>
    <header class="header">
        <div class="container">
            <div class="header-container">
                <div class="logo">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
                        </a>
                        <?php
                    }
                    ?>
                </div>

                <nav class="nav-menu" id="nav-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'container' => false,
                        'fallback_cb' => function() {
                            echo '<a href="' . esc_url(home_url('/')) . '">Home</a>';
                            echo '<a href="' . esc_url(home_url('/about')) . '">About</a>';
                            echo '<a href="' . esc_url(home_url('/events')) . '">Events</a>';
                            echo '<a href="' . esc_url(home_url('/sermons')) . '">Sermons</a>';
                            echo '<a href="' . esc_url(home_url('/contact')) . '">Contact</a>';
                        },
                    ));
                    ?>
                    <div class="header-buttons">
                        <a href="#" class="btn btn-primary prayer-request-btn" id="prayer-request-btn">
                            <i class="fas fa-praying-hands"></i> Prayer Request
                        </a>
                    </div>
                    <div class="mobile-close" id="mobile-close">
                        <i class="fas fa-times"></i>
                    </div>
                </nav>

                <div class="mobile-toggle" id="mobile-toggle">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </header>
