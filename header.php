<!DOCTYPE html>
<html <?php language_attributes(); ?>  lang="en">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <title>WordPress Theme</title>
        <?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php get_template_part( 'templates/main-navigation' ); ?>
