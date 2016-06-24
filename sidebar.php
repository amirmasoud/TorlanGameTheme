<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TorlanGame
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<!-- Sidebar -->
	<section id="sidebar">
		<!-- Intro -->
			<section id="intro">
				<header>
					<img src="<?php echo get_stylesheet_directory_uri() ?>/images/torlangame-logo.png" width="355">
					<p></p>
				</header>
			</section>
			<?php dynamic_sidebar( 'sidebar-1' ); ?>

		<!-- Footer -->
			<section id="footer">
				<ul class="icons align-center">
					<li><a href="https://twitter.com/TorlanGame" class="fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="https://www.facebook.com/TorlanGame/" class="fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="https://www.instagram.com/torlangame/" class="fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="https://plus.google.com/b/108685213706490577534/108685213706490577534/posts" class="fa-google-plus"><span class="label">Google Plus</span></a></li>
					<li><a href="http://www.aparat.com/TorlanGame" class="fa-video-camera"><span class="label">Aparat</span></a></li>
					<li><a href="https://telegram.me/torlangameofficial" class="fa-send"><span class="label">Telegram</span></a></li>
				</ul>
			</section>

	</section>
