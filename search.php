<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package TorlanGame
 */

get_header(); ?>

	<div id="main">

		<?php
		if ( have_posts() ) : ?>

			<article <?php post_class("post"); ?>>
				<header>
					<div class="title">
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'torlangame' ), '<span>' . get_search_query() . '</span>' ); ?></h1>					
					</div>
				</header>
				<div class="entry-content">
							<?php
								get_search_form();
							?>
				</div><!-- .entry-content -->
			</article>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			torlangame_the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	</div>

<?php
//get_sidebar();
get_footer();
