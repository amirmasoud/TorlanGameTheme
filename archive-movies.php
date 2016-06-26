<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TorlanGame
 */

get_header(); ?>

	<div id="main">

		<?php
		if ( have_posts() ) : ?>

			<article <?php post_class("post"); ?>>
				<h1><?php the_archive_title(); ?></h1>
				<p><?php the_archive_description(); ?></p>
			</article>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'movies' );

			endwhile;

			torlangame_the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	</div>

<?php
get_sidebar();
get_footer();
