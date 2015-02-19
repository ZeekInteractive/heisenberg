<?php
/**
 * The template for displaying all single posts.
 *
 * @package Heisenberg
 */

get_header(); ?>
	
<div class="row"><!-- .row start -->

	<div class="large-8 columns"><!-- .columns start -->

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'page-templates/partials/content', 'single' ); ?>

				<?php the_post_navigation(); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- .columns end -->

	<div class="large-4 columns"><!-- .columns start -->

		<?php get_sidebar(); ?>

	</div><!-- .columns end -->

</div><!-- .row end -->

<?php get_footer(); ?>
