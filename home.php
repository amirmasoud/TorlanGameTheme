<?php
get_header(); ?>
	<!-- Main -->
	<div id="main">
		<div class="row">
			<div class="col-md-9 col-xs-12 margin-top-20">
				<?php echo do_shortcode("[metaslider id=3508]"); ?>

				<div class="row">
					<div class="col-md-6 col-xs-12 margin-top-20">
						<img src="https://torlangame.com/wp-content/uploads/2016/07/aprat-torlan-466-95.png" class="img-responsive center-block" width="100%" alt="telegram channel">
					</div>

					<div class="col-md-6 col-xs-12 margin-top-20">
						<img src="https://torlangame.com/wp-content/uploads/2016/07/telegram-torlan-466-95.png" class="img-responsive center-block" width="100%" alt="telegram channel">
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 col-xs-12 margin-top-20">
						<h2 class="widget-title fancy"><span><a href="<?php echo get_category_link( get_cat_ID( 'راهنما و تقلب' ) ) ?>">آخرین راهنما و تقلب ها</a></span></h2>
						<?php the_widget( 'torlangame_Widget_Recent_Posts', array( 'number' => 5, 'category' => get_cat_ID( 'راهنما و تقلب' ) ) ) ?>
					</div>
					<div class="col-md-6 col-xs-12 margin-top-20">
						<h2 class="widget-title fancy"><span><a href="<?php echo get_category_link( get_cat_ID( 'خبر' ) ) ?>">آخرین خبر ها</a></span></h2>
						<?php the_widget( 'torlangame_Widget_Recent_Posts', array( 'number' => 5, 'category' => get_cat_ID( 'خبر' ) ) ) ?>
					</div>
				</div>

			</div><!-- col-md-9 col-xs-12 margin-top-20 -->
			<div class="col-md-3 col-xs-12 margin-top-20">
				<h2 class="widget-title fancy"><span><a href="<?php echo get_post_type_archive_link( 'movies' ) ?>">آخرین ویدیو ها</a></span></h2>
				<?php the_widget( 'torlangame_Widget_Recent_Movies', 'number=2' ) ?>
			</div><!-- col-md-3 col-xs-12 margin-top-20 -->
		</div><!-- .row -->
	</div><!-- #main -->
<?php
get_footer();
