<?php
get_header(); ?>

	<div class="grid-x grid-padding-x">

		<div class="medium-8 cell">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();

					the_title( '<h1>', '</h1>' );

					the_content();

				endwhile;

				the_posts_navigation();

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			else :

				echo esc_html( 'Sorry, no posts' );

			endif;

			if ( is_home() ) : ?>

				<h4 style="margin-top: 1.25em;">Tabs</h4>
				<ul class="tabs" data-tabs id="example-tabs">
					<li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Tab 1</a></li>
					<li class="tabs-title"><a data-tabs-target="panel2" href="#panel2">Tab 2</a></li>
				</ul>
				<div class="tabs-content" data-tabs-content="example-tabs" style="margin-bottom: 5em;">
					<div class="tabs-panel is-active" id="panel1">
						<p>Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus.</p>
					</div>
					<div class="tabs-panel" id="panel2">
						<p>Suspendisse dictum feugiat nisl ut dapibus.  Vivamus hendrerit arcu sed erat molestie vehicula. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.  Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.</p>
					</div>
				</div>
			<?php
			endif; ?>
		</div>

		<aside class="medium-4 cell">

			<?php get_sidebar(); ?>

		</aside>

	</div>

<?php
get_footer();
