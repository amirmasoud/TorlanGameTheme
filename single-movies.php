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

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	<!-- Footer -->
		<section id="footer">
			<ul class="icons">
				<li><a href="https://twitter.com/TorlanGame" class="fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="https://www.facebook.com/TorlanGame/" class="fa-facebook"><span class="label">Facebook</span></a></li>
				<li><a href="https://www.instagram.com/torlangame/" class="fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="https://plus.google.com/b/108685213706490577534/108685213706490577534/posts" class="fa-google-plus"><span class="label">Google Plus</span></a></li>
				<li><a href="http://www.aparat.com/TorlanGame" class="fa-video-camera"><span class="label">Aparat</span></a></li>
				<li><a href="https://telegram.me/torlangameofficial" class="fa-send"><span class="label">Telegram</span></a></li>
			</ul>
		</section>
	</div>


<?php
//get_sidebar();
get_footer();
