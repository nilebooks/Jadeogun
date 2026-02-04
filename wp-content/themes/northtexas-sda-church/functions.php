<?php

if (!defined('ABSPATH')) {
	exit;
}

function ntxsda_setup(): void {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action('after_setup_theme', 'ntxsda_setup');

function ntxsda_remote_asset(string $path): string {
	return 'https://northtexassdachurch.com/' . ltrim($path, '/');
}

function ntxsda_html_url(string $slug): string {
	$slug = trim($slug, '/');
	if ($slug === '' || $slug === 'index') {
		return wp_make_link_relative(home_url('/index.html'));
	}

	return wp_make_link_relative(home_url('/' . $slug . '.html'));
}

function ntxsda_body_classes(array $classes): array {
	if (is_page('sermons')) {
		$classes[] = 'sermons-page';
	}

	if (is_page('events') || is_page('blog') || is_page('team')) {
		$classes[] = 'events-page';
	}

	if (is_page('contact')) {
		$classes[] = 'contact-page';
	}

	if (is_page('youth-ministry')) {
		$classes[] = 'ministries-page';
	}

	if (is_page('sermon-video')) {
		$classes[] = 'sermon-video-page';
	}

	return $classes;
}
add_filter('body_class', 'ntxsda_body_classes');

function ntxsda_enqueue_firebase(): void {
	wp_enqueue_script(
		'ntxsda-firebase-app',
		'https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js',
		array(),
		null,
		true
	);
	wp_enqueue_script(
		'ntxsda-firebase-firestore',
		'https://www.gstatic.com/firebasejs/9.23.0/firebase-firestore-compat.js',
		array('ntxsda-firebase-app'),
		null,
		true
	);
	wp_enqueue_script(
		'ntxsda-firebase-auth',
		'https://www.gstatic.com/firebasejs/9.23.0/firebase-auth-compat.js',
		array('ntxsda-firebase-app'),
		null,
		true
	);
	wp_enqueue_script(
		'ntxsda-firebase-storage',
		'https://www.gstatic.com/firebasejs/9.23.0/firebase-storage-compat.js',
		array('ntxsda-firebase-app'),
		null,
		true
	);
	wp_enqueue_script(
		'ntxsda-firebase-config',
		'https://northtexassdachurch.com/firebase-config.js',
		array('ntxsda-firebase-app'),
		null,
		true
	);
}

function ntxsda_enqueue_assets(): void {
	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_style(
		'ntxsda-fonts',
		'https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Bebas+Neue&family=Lora:ital,wght@0,400..700;1,400..700&family=Oswald:wght@200..700&display=swap',
		array(),
		null
	);
	wp_enqueue_style(
		'ntxsda-fontawesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
		array(),
		'6.4.0'
	);
	wp_enqueue_style(
		'ntxsda-base',
		'https://northtexassdachurch.com/style.css',
		array(),
		null
	);
	wp_enqueue_style(
		'ntxsda-pages',
		get_template_directory_uri() . '/assets/css/pages.css',
		array('ntxsda-base'),
		$theme_version
	);
	wp_enqueue_style(
		'ntxsda-custom',
		get_template_directory_uri() . '/assets/css/custom.css',
		array('ntxsda-base'),
		$theme_version
	);

	if (is_page('sermon-video')) {
		wp_enqueue_style(
			'ntxsda-sermon-video',
			get_template_directory_uri() . '/assets/css/sermon-video.css',
			array('ntxsda-base'),
			$theme_version
		);
	}

	if (!is_front_page()) {
		wp_enqueue_style(
			'ntxsda-locomotive',
			'https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.4/dist/locomotive-scroll.min.css',
			array(),
			'4.1.4'
		);
		wp_enqueue_script(
			'ntxsda-locomotive',
			'https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.4/dist/locomotive-scroll.min.js',
			array(),
			'4.1.4',
			true
		);
	}

	wp_enqueue_script('jquery');
	$main_deps = array('jquery');

	$needs_firebase = is_front_page() || is_page(array('events', 'sermons', 'sermon-video'));
	if ($needs_firebase) {
		ntxsda_enqueue_firebase();
	}

	if (is_front_page()) {
		wp_enqueue_script(
			'ntxsda-lenis',
			'https://unpkg.com/@studio-freight/lenis@1.0.38/bundled/lenis.min.js',
			array(),
			'1.0.38',
			true
		);
		wp_add_inline_script(
			'ntxsda-lenis',
			'const lenis = new Lenis({duration: 1.2,smooth: true,direction: "vertical",gestureDirection: "vertical",smoothTouch: false,touchMultiplier: 2,infinite: false,});function raf(time){lenis.raf(time);requestAnimationFrame(raf);}requestAnimationFrame(raf);',
			'after'
		);
		$main_deps[] = 'ntxsda-lenis';
		wp_enqueue_script(
			'ntxsda-firebase-connector',
			get_template_directory_uri() . '/assets/js/firebase-connector.js',
			array('ntxsda-firebase-firestore', 'ntxsda-firebase-config'),
			$theme_version,
			true
		);
		wp_add_inline_script(
			'ntxsda-firebase-connector',
			'window.ntxsdaAssets = ' . wp_json_encode(
				array(
					'logoUrl' => ntxsda_remote_asset('images/logo.png'),
					'pastorUrl' => ntxsda_remote_asset('images/pastor1.jpg'),
				)
			) . '; window.ntxsdaUrls = ' . wp_json_encode(
				array(
					'events' => ntxsda_html_url('events'),
					'sermonVideo' => ntxsda_html_url('sermon-video'),
				)
			) . ';',
			'before'
		);
		wp_enqueue_script(
			'ntxsda-rss-feeds',
			'https://northtexassdachurch.com/js/rss-feeds.js',
			array(),
			null,
			true
		);
	}

	wp_enqueue_script(
		'ntxsda-main',
		'https://northtexassdachurch.com/js/main.js',
		$main_deps,
		null,
		true
	);
	wp_add_inline_script(
		'ntxsda-main',
		'if (typeof window.scroll === "function" && typeof window.scroll.scrollTo !== "function" && typeof window.scrollTo === "function") { window.scroll.scrollTo = window.scrollTo.bind(window); }',
		'before'
	);

	if (is_page('sermons')) {
		wp_enqueue_script(
			'ntxsda-sermons-sync',
			'https://northtexassdachurch.com/js/sermons-sync.js',
			array('ntxsda-firebase-firestore', 'ntxsda-firebase-config'),
			null,
			true
		);
	}

	if (is_page('events')) {
		wp_enqueue_script(
			'ntxsda-events-sync',
			'https://northtexassdachurch.com/js/events-sync.js',
			array('ntxsda-firebase-firestore', 'ntxsda-firebase-config'),
			null,
			true
		);
	}

	if (is_page('sermon-video')) {
		wp_enqueue_script(
			'ntxsda-sermon-video',
			'https://northtexassdachurch.com/js/sermon-video.js',
			array('ntxsda-firebase-firestore', 'ntxsda-firebase-config'),
			null,
			true
		);
	}
}
add_action('wp_enqueue_scripts', 'ntxsda_enqueue_assets');

function ntxsda_add_html_rewrites(): void {
	add_rewrite_rule('index\.html$', 'index.php', 'top');
	add_rewrite_rule('([^/]+)\.html$', 'index.php?pagename=$matches[1]', 'top');
}
add_action('init', 'ntxsda_add_html_rewrites');

function ntxsda_flush_rewrites(): void {
	ntxsda_add_html_rewrites();
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'ntxsda_flush_rewrites');
