<?php

/**
 * Cleaning the header for greater site performance.
 */

// remove WP emoji code in header
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

// remove Windows Live Writer application which is no longer actively developed
remove_action( 'wp_head', 'wlwmanifest_link');

// remove short link
remove_action( 'wp_head', 'wp_shortlink_wp_head');

// remove api.w.org relation links
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('template_redirect', 'rest_output_link_header');

// remove weblog client link
remove_action ('wp_head', 'rsd_link');

// removing WP version
function remove_version(): string
{
  return '';
}
add_filter('the_generator', 'remove_version');

function remove_inline_styles(): void
{
  global $wp_styles;
  if ( is_object( $wp_styles ) && isset( $wp_styles->queue ) ) {
    foreach ( $wp_styles->queue as $handle ) {
      if ( isset( $wp_styles->registered[$handle] ) ) {
        $wp_styles->registered[$handle]->extra['after'] = array();
      }
    }
  }
}
add_action('wp_print_styles', 'remove_inline_styles', 100);

// Hide inline stuff for admins
function remove_customize_support_script(): void
{
  if (current_user_can('administrator')) {
    remove_action('wp_head', '_wp_customize_loader_settings', 11);
  }
}
add_action('init', 'remove_customize_support_script');

