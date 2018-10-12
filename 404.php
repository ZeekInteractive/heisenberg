<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Heisenberg
 */

get_header(); ?>

	<div class="grid-x grid-padding-x">

		<div class="medium-8 cell">

			<h1>Oops! That page can't be found.</h1>

			<p>It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>
			<?php
			get_search_form();

			the_widget( 'WP_Widget_Recent_Posts' ); ?>

		</div>

		<aside class="medium-4 cell">

			<?php get_sidebar(); ?>

		</aside>

	</div>

<?php
get_footer();
