<?php

function register_styles(): void
{
	wp_enqueue_style('main-styles', get_template_directory_uri() . '/assets/css/app.css', array(), filemtime(get_template_directory() . '/assets/css/app.css'), false);
}
add_action( 'wp_enqueue_scripts', 'register_styles' );

function replace_core_jquery_version(): void
{
	wp_deregister_script('jquery');
	wp_register_script('jquery', "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js", '', '', false);
	wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );

function register_scripts(): void
{
	wp_register_script('main-script',get_template_directory_uri() . '/assets/js/app.js', array(), filemtime(get_template_directory() . '/assets/js/app.js'),true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap.bundle.min.js', array(), '', true );
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/vendor/popper.min.js', array(), '', true );
	// Localize the script with new data
	$translation_array = array(
		'themeUrl' => get_template_directory_uri(),
	);
	wp_localize_script('main-script', 'php_vars', $translation_array);
	// Enqueued script with localized data.
	wp_enqueue_script('main-script');
}
add_action( 'wp_enqueue_scripts', 'register_scripts' );

function add_type_attribute($tag, $handle, $src) {
    if ( 'main-script' === $handle ) {
        $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_type_attribute', 10, 3);

// Remove unused styles and scripts
function remove_styles_scripts(): void
{
	wp_dequeue_style( 'wp-block-library' ); // WordPress core
	wp_dequeue_style( 'wp-block-library-theme' ); // WordPress core
	wp_dequeue_style( 'wc-block-style' ); // WooCommerce
	wp_dequeue_style( 'storefront-gutenberg-blocks' ); // Storefront theme
}
add_action( 'wp_enqueue_scripts', 'remove_styles_scripts', 100 );

