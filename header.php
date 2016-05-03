<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
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

<?php echo file_get_contents( get_template_directory() . '/assets/dist/sprite/sprite.svg' ); ?>


<div class="off-canvas-wrapper">
  <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
    <div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas data-position="left">
			<button class="close-button" aria-label="Close alert" type="button" data-toggle="offCanvasLeft">
				<span aria-hidden="true">&times;</span>
			</button>
			<a href="<?php bloginfo('url'); ?>" class="ofc-home">Home</a>
			<?php
			 $args = array (
				 'theme_location' 	=> 'primary',
				 'container' 				=> 'nav',
				 'container_class'	=> 'offcanvas-navigation',
				 'menu_class' 			=> 'mobile-menu',
			 );
				wp_nav_menu( $args );
			?>
    </div><!-- #offCanvasLeft -->
    <div class="off-canvas-content" data-off-canvas-content>
			<div class="title-bar show-for-small-only">
			  <div class="title-bar-left">
			    <button class="menu-icon" type="button" data-open="offCanvasLeft"></button>
			    <span class="title-bar-title"><?php bloginfo( 'name' ); ?></span>
			  </div>
			</div><!-- .title-bar -->
			<header id="masthead" class="" role="banner">
				<section class="row column">
					<h1 class="site-title">
						<a href="<?php esc_attr_e( home_url( '/' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					</h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</section>
				<nav id="site-navigation" class="top-bar show-for-medium" data-topbar role="navigation">
					<section class="top-bar-section row column">
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</section>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->

			<div id="content" class="site-content">
