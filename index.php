<?php
get_header(); ?>

    <div class="row">

        <main class="medium-8 columns">

			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();

					the_title('<h1>', '</h1>');

                    the_content();

				endwhile;

				the_posts_navigation();

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			else :

				echo esc_html( 'Sorry, no posts' );

			endif; ?>

        </main>

        <aside class="medium-4 columns">

			<?php get_sidebar(); ?>

        </aside>

    </div>

<?php
get_footer();
