<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
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
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">

		<div class="row"><!-- .row start -->

			<div class="small-12 columns"><!-- .columns start -->

				<div class="site-branding">

					<div class="row"><!-- .row start -->

						<div class="large-6 small-12 columns"><!-- .columns start -->

							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

						</div><!-- .columns end -->

						<div class="large-6 small-12 columns"><!-- .columns start -->

							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

						</div><!-- .columns end -->

					</div><!-- .row end -->

				</div><!-- .site-branding -->

			</div><!-- .columns end -->

			<div class="small-12 columns"><!-- .columns start -->

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->

			</div><!-- .columns end -->

		</div><!-- .row end -->

	</header><!-- #masthead -->

	<div id="content" class="site-content row">
