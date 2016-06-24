<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package TorlanGame
 */

get_header(); ?>
<!-- Main -->
<div id="main">
	<article <?php post_class("error-404 not-found post"); ?>>
		<header>
			<div class="title">
				<h2><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'torlangame' ); ?></h2>
			</div>
		</header>
		<div class="entry-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'torlangame' ); ?></p>
					<?php
						get_search_form();

						the_widget( 'torlangame_Widget_Recent_Posts' );
					?>
		</div><!-- .entry-content -->
	</article>
</div>
<?php
get_footer();
