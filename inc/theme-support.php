<?php

function theme_supports(): void
{
	// Enable support for Post Thumbnails on posts and pages
	add_theme_support( 'post-thumbnails' );

	// Let WordPress manage the document title
	add_theme_support('title-tag' );

	// Output valid HTML5 forms
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	// Enable support for Post Formats
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Register menus
	function register_menus(): void
    {
		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu' ),
				'footer-menu' => __( 'Footer Menu' )
			)
		);
	}
	add_action( 'init', 'register_menus' );

	// Adding favicon
	function add_favicon(): void
    {
		echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/assets/img/favicon.png"/>';
	}
	add_action( 'wp_head', 'add_favicon' );

	// Disable WordPress sanitization to allow more than just $allowedtags from /wp-includes/kses.php.
	remove_filter( 'pre_user_description', 'wp_filter_kses' );
	// Add sanitization for WordPress posts.
	add_filter( 'pre_user_description', 'wp_filter_post_kses' );
	// Adding excerpt to pages
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'after_setup_theme', 'theme_supports' );