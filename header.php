<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TorlanGame
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lte IE 8]><script src="js/ie/html5shiv.js"></script><![endif]-->
<?php wp_head(); ?>
<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.min.css" /><![endif]-->
<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.min.css" /><![endif]-->
</head>

<body <?php body_class(); ?>>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<nav class="links">
							<ul>
								<li><a href="http://torlangame.com/category/%D8%AE%D8%A8%D8%B1/"><i class="fa fa-newspaper-o" aria-hidden="true"></i> خبر</a></li>
								<li><a href="http://torlangame.com/category/%D9%88%DB%8C%DA%98%D9%87-%DA%AF%DB%8C%D9%85%D8%B1-%D9%87%D8%A7/"><i class="fa fa-gamepad" aria-hidden="true"></i> ویژه گیمرها</a></li>
								<li><a href="http://torlangame.com/category/%D8%B1%D8%A7%D9%87%D9%86%D9%85%D8%A7-%D9%88-%D8%AA%D9%82%D9%84%D8%A8/"><i class="fa fa-motorcycle" aria-hidden="true"></i> راهنما و تقلب</a></li>
								<li><a href="http://torlangame.com/category/%D8%B3%DB%8C%D8%B3%D8%AA%D9%85-%D9%85%D9%88%D8%B1%D8%AF-%D9%86%DB%8C%D8%A7%D8%B2/"><i class="fa fa-laptop" aria-hidden="true"></i> سیستم مورد نیاز</a></li>
								<li><a href="http://torlangame.com/category/%D8%AF%D8%A7%D9%86%D9%84%D9%88%D8%AF/"><i class="fa fa-cloud-download" aria-hidden="true"></i> دانلود</a></li>
								<li><a href="http://torlangame.com/movies/"><i class="fa fa-video-camera" aria-hidden="true"></i> ویدیو</a></li>
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="search">
									<a class="fa-search" href="#search">Search</a>
									<form id="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
										<input type="text" name="s" placeholder="<?php _e("جستجو", "toelangame") ?>" value="<?php echo get_search_query(); ?>" />
									</form>
								</li>
								<li class="menu">
									<a class="fa-bars" href="#menu">Menu</a>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Menu -->
					<section id="menu">

						<!-- Search -->
							<section>
								<form class="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<input type="text" name="s" placeholder="<?php _e("جستجو", "toelangame") ?>" value="<?php echo get_search_query(); ?>" />
								</form>
							</section>

						<!-- Links -->
							<section>
								<ul class="links">
									<li>
										<a href="http://torlangame.com/category/%D8%AE%D8%A8%D8%B1/">
											<h3><i class="fa fa-newspaper-o" aria-hidden="true"></i> خبر</h3>
										</a>
									</li>
									<li>
										<a href="http://torlangame.com/category/%D9%88%DB%8C%DA%98%D9%87-%DA%AF%DB%8C%D9%85%D8%B1-%D9%87%D8%A7/">
											<h3><i class="fa fa-gamepad" aria-hidden="true"></i> ویژه گیمرها</h3>
										</a>
									</li>
									<li>
										<a href="http://torlangame.com/category/%D8%B1%D8%A7%D9%87%D9%86%D9%85%D8%A7-%D9%88-%D8%AA%D9%82%D9%84%D8%A8/">
											<h3><i class="fa fa-motorcycle" aria-hidden="true"></i> راهنما و تقلب</h3>
										</a>
									</li>
									<li>
										<a href="http://torlangame.com/category/%D8%B3%DB%8C%D8%B3%D8%AA%D9%85-%D9%85%D9%88%D8%B1%D8%AF-%D9%86%DB%8C%D8%A7%D8%B2/">
											<h3><i class="fa fa-laptop" aria-hidden="true"></i> سیستم مورد نیاز</h3>
										</a>
									</li>
									<li>
										<a href="http://torlangame.com/category/%D8%AF%D8%A7%D9%86%D9%84%D9%88%D8%AF/">
											<h3><i class="fa fa-cloud-download" aria-hidden="true"></i> دانلود</h3>
										</a>
									</li>
									<li>
										<a href="http://torlangame.com/movies/">
											<h3><i class="fa fa-video-camera" aria-hidden="true"></i> ویدیو</h3>
										</a>
									</li>
								</ul>
							</section>

					</section>
