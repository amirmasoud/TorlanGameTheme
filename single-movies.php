<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TorlanGame
 */

get_header(); ?>

	<!-- Main -->
	<div id="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'movies' );

			//the_post_navigation();
			torlangame_post_navigation();

			torlangame_breadcrumbs();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</div>


<?php
get_sidebar();
get_footer();
