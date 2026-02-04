<?php
$home_url = ntxsda_html_url('index');
$about_url = ntxsda_html_url('about');
$youth_url = ntxsda_html_url('youth-ministry');
$team_url = ntxsda_html_url('team');
$gallery_url = ntxsda_html_url('gallery');
$sermons_url = ntxsda_html_url('sermons');
$events_url = ntxsda_html_url('events');
$blog_url = ntxsda_html_url('blog');
$contact_url = ntxsda_html_url('contact');

$home_active = is_front_page() ? ' active' : '';
$about_active = is_page(array('about', 'youth-ministry', 'team', 'gallery')) ? ' active' : '';
$sermons_active = is_page('sermons') ? ' active' : '';
$events_active = is_page('events') ? ' active' : '';
$blog_active = is_page('blog') ? ' active' : '';
$contact_active = is_page('contact') ? ' active' : '';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTH6W6SrWYdcFvHr8bZACcEg3swkioidWunUw&s" type="image/x-icon">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="scroll-container" data-scroll-container>
	<header class="header">
		<div class="container">
			<div class="header-container">
				<div class="logo">
					<a href="<?php echo esc_url($home_url); ?>">
						<img src="<?php echo esc_url(ntxsda_remote_asset('images/logo.png')); ?>" alt="North Texas SDA Church Logo">
						<h1>North Texas <br> SDA Church</h1>
					</a>
				</div>
				<nav class="nav-menu">
					<ul class="nav-list">
						<li class="nav-item"><a href="<?php echo esc_url($home_url); ?>" class="nav-link<?php echo esc_attr($home_active); ?>">HOME</a></li>
						<li class="nav-item dropdown">
							<a href="<?php echo esc_url($about_url); ?>" class="nav-link<?php echo esc_attr($about_active); ?>">ABOUT US
								<span class="mobile-dropdown-toggle">
									<i class="fas fa-plus"></i>
								</span>
							</a>
							<div class="dropdown-menu">
								<a href="<?php echo esc_url($youth_url); ?>" class="dropdown-item">Our Ministries</a>
								<a href="<?php echo esc_url($team_url); ?>" class="dropdown-item">Our Team</a>
								<a href="<?php echo esc_url($gallery_url); ?>" class="dropdown-item">Gallery</a>
							</div>
						</li>
						<li class="nav-item"><a href="<?php echo esc_url($sermons_url); ?>" class="nav-link<?php echo esc_attr($sermons_active); ?>">SERMONS</a></li>
						<li class="nav-item"><a href="<?php echo esc_url($events_url); ?>" class="nav-link<?php echo esc_attr($events_active); ?>">EVENTS &amp; ANNOUNCEMENTS</a></li>
						<li class="nav-item"><a href="<?php echo esc_url($blog_url); ?>" class="nav-link<?php echo esc_attr($blog_active); ?>">BLOG</a></li>
						<li class="nav-item"><a href="<?php echo esc_url($contact_url); ?>" class="nav-link<?php echo esc_attr($contact_active); ?>">CONTACT</a></li>
					</ul>
					<div class="mobile-close">
						<i class="fas fa-times"></i>
					</div>
				</nav>
				<div class="header-buttons">
					<a href="#" class="btn btn-secondary" id="prayer-request-btn">PRAYER REQUEST</a>
					<a href="https://adventistgiving.org/donate/ANWFHL" class="btn btn-primary" target="_blank" rel="noopener">DONATE</a>
				</div>
				<div class="mobile-toggle">
					<i class="fas fa-bars"></i>
				</div>
			</div>
		</div>
	</header>
