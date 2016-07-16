<?php
get_header(); ?>
	<!-- Main -->
	<div id="main">
		<div class="row">
			<div class="col-md-9 col-xs-12 margin-top-20">
				<?php echo do_shortcode("[metaslider id=4883]"); ?>

				<div class="row">
					<div class="col-md-6 col-xs-12 margin-top-20">
						<a href="http://www.aparat.com/TorlanGame">
							<img src="https://torlangame.com/wp-content/uploads/2016/07/aprat-torlan-466-95.png" class="img-responsive center-block" width="100%" alt="telegram channel">
						</a>
					</div>

					<div class="col-md-6 col-xs-12 margin-top-20">
						<a href="https://telegram.me/torlangameofficial">
							<img src="https://torlangame.com/wp-content/uploads/2016/07/telegram-torlan-466-95.png" class="img-responsive center-block" width="100%" alt="telegram channel">
						</a>
					</div>
				</div>

			</div><!-- col-md-9 col-xs-12 margin-top-20 -->
			<div class="col-md-3 col-xs-12 margin-top-20">
				<h2 class="widget-title fancy"><span><a href="<?php echo get_post_type_archive_link( 'movies' ) ?>">آخرین ویدیو ها</a></span></h2>
				<?php the_widget( 'torlangame_Widget_Recent_Movies', 'number=2' ) ?>
			</div><!-- col-md-3 col-xs-12 margin-top-20 -->
		</div><!-- .row -->

		<div class="row">
			<div class="col-md-4 col-xs-12">
				<h2 class="widget-title fancy"><span><a href="<?php echo get_category_link( get_cat_ID( 'خبر' ) ) ?>">آخرین خبر ها</a></span></h2>
				<?php the_widget( 'torlangame_Widget_Recent_Posts', array( 'number' => 5, 'category' => get_cat_ID( 'خبر' ) ) ) ?>
			</div>
			<div class="col-md-4 col-xs-12">
				<h2 class="widget-title fancy"><span><a href="<?php echo get_category_link( get_cat_ID( 'راهنما و تقلب' ) ) ?>">آخرین راهنما و تقلب ها</a></span></h2>
				<?php the_widget( 'torlangame_Widget_Recent_Posts', array( 'number' => 5, 'category' => get_cat_ID( 'راهنما و تقلب' ) ) ) ?>
			</div>
			<div class="col-md-4 col-xs-12">
				<h2 class="widget-title fancy"><span><a href="<?php echo get_post_type_archive_link( 'downloads' ) ?>">آخرین دانلود ها</a></span></h2>
				<?php the_widget( 'torlangame_Widget_Recent_Downloads', 'number=5' ) ?>
			</div>
		</div>
		<footer class="footer-distributed">

			<div class="footer-left">

				<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" name="s" placeholder="<?php _e("جستجو", "toelangame") ?>" value="<?php echo get_search_query(); ?>" />
				</form>

				<div class="row">
					<div class="col-xs-2 align-center">				
						<a href="https://twitter.com/TorlanGame"><i class="fa fa-twitter"></i></a>
					</div>
					<div class="col-xs-2 align-center">					
						<a href="https://www.facebook.com/TorlanGame/"><i class="fa fa-facebook"></i></a>
					</div>
					<div class="col-xs-2 align-center">					
						<a href="https://www.instagram.com/torlangame/"><i class="fa fa-instagram"></i></a>
					</div>
					<div class="col-xs-2 align-center">					
						<a href="https://plus.google.com/b/108685213706490577534/108685213706490577534/posts"><i class="fa fa-google-plus"></i></a>
					</div>
					<div class="col-xs-2 align-center">					
						<a href="http://www.aparat.com/TorlanGame"><i class="fa fa-video-camera"></i></a>
					</div>
					<div class="col-xs-2 align-center">					
						<a href="https://telegram.me/torlangameofficial"><i class="fa fa-send"></i></a>
					</div>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-links">
					<a href="http://torlangame.com/category/%D8%AE%D8%A8%D8%B1/"><i class="fa fa-newspaper-o" aria-hidden="true"></i> خبر</a>
					.
					<a href="http://torlangame.com/category/%D9%88%DB%8C%DA%98%D9%87-%DA%AF%DB%8C%D9%85%D8%B1-%D9%87%D8%A7/"><i class="fa fa-gamepad" aria-hidden="true"></i> ویژه گیمرها</a>
					.
					<a href="http://torlangame.com/category/%D8%B1%D8%A7%D9%87%D9%86%D9%85%D8%A7-%D9%88-%D8%AA%D9%82%D9%84%D8%A8/"><i class="fa fa-motorcycle" aria-hidden="true"></i> راهنما و تقلب</a>
					.
					<a href="http://torlangame.com/category/%D8%B3%DB%8C%D8%B3%D8%AA%D9%85-%D9%85%D9%88%D8%B1%D8%AF-%D9%86%DB%8C%D8%A7%D8%B2/"><i class="fa fa-laptop" aria-hidden="true"></i> سیستم مورد نیاز</a>
					.
					<a href="http://torlangame.com/downloads/"><i class="fa fa-cloud-download" aria-hidden="true"></i> دانلود</a>
					.
					<a href="http://torlangame.com/movies/"><i class="fa fa-video-camera" aria-hidden="true"></i> ویدیو</a>
				</p>

				<p class="footer-company-name align-right"><?php bloginfo( 'name' ); ?> &copy; 1395</p>

			</div>

		</footer>
	</div><!-- #main -->

<?php
get_footer();
