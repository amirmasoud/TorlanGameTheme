<?php
/**
 * TorlanGame functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TorlanGame
 */

if ( ! function_exists( 'torlangame_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function torlangame_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on TorlanGame, use a find and replace
	 * to change 'torlangame' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'torlangame', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('torlangame-article-thumb', 840, 341, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'torlangame' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'torlangame_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'torlangame_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function torlangame_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'torlangame_content_width', 640 );
}
add_action( 'after_setup_theme', 'torlangame_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function torlangame_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'torlangame' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'torlangame' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title fancy"><span>',
		'after_title'   => '</span></h2>',
	) );
}
add_action( 'widgets_init', 'torlangame_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function torlangame_scripts() {
	wp_enqueue_style( 'torlangame-style', get_stylesheet_uri() );

	wp_enqueue_script( 'torlangame-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'torlangame-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'torlangame-all', get_template_directory_uri() . '/js/all.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'torlangame_scripts' );

/**
 * Display navigation to next/previous set of posts when applicable.
 */
function torlangame_the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<!-- Pagination 
	<a href="#" class="disabled button big next">Previous Page</a>
	<a href="" class="button big previous">Next Page</a>
	-->
		<ul class="actions pagination">
			<?php if ( get_next_posts_link() ) : ?>
			<li><?php next_posts_link( __( 'مطالب قبلی', 'torlangame' ) ); ?></li>
			<?php endif; ?>
			<?php if ( get_previous_posts_link() ) : ?>
			<li><?php previous_posts_link( __( 'مطالب بعدی', 'torlangame' ) ); ?></li>
			<?php endif; ?>
		</ul>
	<?php
}

/**
 * Register custom widgets.
 * 
 * @return HTML
 */
function torlangame_register_custom_widget() {
    register_widget( 'torlangame_Widget_Recent_Posts' );
    register_widget( 'torlangame_Widget_Recent_Movies' );
}
add_action( 'widgets_init', 'torlangame_register_custom_widget' );

/**
 * Print author inforamtions
 * 
 * @return HTML
 */
function torlangame_author_info() {
	?>
	<article class="post row author-box">
		<div class="col-md-10 col-xs-12">
			<h1><?php the_author(); ?></h1>
			<p><?php the_author_meta( 'description' ); ?></p>
		</div>
		<div class="col-md-2 col-xs-12">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 256 ) ?>
		</div>
	</article>
	<?php
}

/**
 * Post navigation with mini post.
 * 
 * @return HTML
 */
function torlangame_post_navigation() {
	$args = array(
		'next_text' => '<div class="post"><h1><i>بعدی:</i>   %title</h1></div>',
		'prev_text' => '<div class="post"><h1><i>قبلی:</i>   %title</h1></div>',
	);
	the_post_navigation( $args );
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom recent post widget.
 */
require get_template_directory() . '/inc/recent-post-widget.php';

/**
 * Load video custom post type
 */
require get_template_directory() . '/inc/video-post-type.php';

/**
 * Load custom recent movies widget.
 */
require get_template_directory() . '/inc/recent-movies-widget.php';

/**
 * Load Download custom post type
 */
require get_template_directory() . '/inc/download-post-type.php';
