<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Heisenberg
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="masthead">
	<section class="row column">
		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
			</a>
		</h1>
		<h2 class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></h2>
	</section>
	<?php
	$args = [
		'theme_location' => 'primary',
		'container'      => '',
	];
	wp_nav_menu( $args ); ?>
</header>
<div id="content" class="site-content" role="main">