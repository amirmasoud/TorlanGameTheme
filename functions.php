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

	register_sidebar( array(
		'name'          => esc_html__( 'home page 1', 'torlangame' ),
		'id'            => 'home-1',
		'description'   => esc_html__( 'Add widgets here.', 'torlangame' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title fancy"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'home page 2', 'torlangame' ),
		'id'            => 'home-2',
		'description'   => esc_html__( 'Add widgets here.', 'torlangame' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title fancy"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'home page 3', 'torlangame' ),
		'id'            => 'home-3',
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
    register_widget( 'torlangame_Widget_Recent_Downloads' );
}
add_action( 'widgets_init', 'torlangame_register_custom_widget' );

/**
 * Print author inforamtions
 * 
 * @return HTML
 */
function torlangame_author_info() {
	?>
	<article class="row author-box">
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
 * Add featured image to RSS feed.
 * 
 * @param  string $excerpt
 * @return string
 */
function torlangame_image_in_feed( $excerpt ) {
 
    global $post;
 
    if ( has_post_thumbnail( $post->ID ) ){
        $image = get_the_post_thumbnail( $post->ID, 'page-thumb', array( 'style' => 'margin: 10px auto' ) );
    } else {
        $image = '<div style="margin: 10px auto"><img src="https://torlangame.com/wp-content/themes/torlangame/images/torlangame-logo.png"></div>';
    }
 
    $excerpt = $image . $excerpt;
 
    return $excerpt;
} 
add_filter( 'the_excerpt_rss', 'torlangame_image_in_feed', 10 );

// Breadcrumbs
function torlangame_breadcrumbs() {
       
    // Settings
    $separator          = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'خانه';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<article class="post post-breadcrumb"><ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' بایگانی</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' بایگانی</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' بایگانی</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' بایگانی</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' بایگانی</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' بایگانی</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="صفحه ' . get_query_var('paged') . '">'.__('صفحه') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="نتیج جستجو برای: ' . get_search_query() . '">نتیج جستجو برای: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'خطای 404' . '</li>';
        }
       
        echo '</ul></article>';
           
    }
       
}

/**
 * Social share icons.
 * 
 * @param  string $content
 * @return HTML
 */
function torlangame_social_sharing_buttons($content) {
    if(is_singular() || is_home()){
        global $post;
    
        // Get current page URL 
        $torlangame_URL = wp_get_shortlink();
 
        // Get current page title
        $torlangame_Title = str_replace( ' ', '%20', get_the_title());
        
        // Get Post Thumbnail for pinterest
        if ( has_post_thumbnail( $post ) ) {
            $torlangame_Thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
        } else {
            $torlangame_Thumbnail = '';
        }
 
        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$torlangame_Title.'&amp;url='.$torlangame_URL.'&amp;توسط=TorlanGame';
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$torlangame_URL;
        $googleURL = 'https://plus.google.com/share?url='.$torlangame_URL;
        $whatsappURL = 'whatsapp://send?text='.$torlangame_Title . ' ' . $torlangame_URL;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$torlangame_URL.'&amp;title='.$torlangame_Title;
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$torlangame_URL.'&amp;media='.$torlangame_Thumbnail.'&amp;description='.$torlangame_Title;
        $telegramURL = 'https://telegram.me/share/url?url=' . $torlangame_URL;
 
        // Add sharing button at the end of page/page content
        $content .= '<div class="torlangame-social">';
        $content .= '<h3>به اشتراک گذاشتن در</h3>';
        $content .= '<a class="torlangame-link torlangame-telegram" href="'.$telegramURL.'" target="_blank"><i class="fa fa-send" aria-hidden="true"></i> تلگرام</a>';
        $content .= '<a class="torlangame-link torlangame-whatsapp" href="'.$whatsappURL.'" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> واتس اپ</a>';
        $content .= '<a class="torlangame-link torlangame-twitter" href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> توییتر</a>';
        $content .= '<a class="torlangame-link torlangame-facebook" href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> فیسبوک</a>';
        $content .= '<a class="torlangame-link torlangame-googleplus" href="'.$googleURL.'" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i> گوگل پلاس</a>';
        $content .= '<a class="torlangame-link torlangame-pinterest" href="'.$pinterestURL.'" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i> پینترست</a>';
        $content .= '<a class="torlangame-link torlangame-linkedin" href="'.$linkedInURL.'" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i> لینکدین</a>';
        $content .= '</div>';
        
        return $content;
    }else{
        // if not a post/page then don't include sharing button
        return $content;
    }
};
add_filter( 'wp_link_pages', 'torlangame_social_sharing_buttons');

function torlangame_posts_telegram_bot( $ID, $post ) {
    require 'inc/telegram.php';
    if ( $_SERVER['SERVER_NAME'] == 'localhost' ) {
        $chat_id = '@dhjdhdgjfhkdawop';
    } else {
        $chat_id = '@torlangameofficial';
    }
    $token = '257351524:AAGgskaKINHEDcov3xyLScxGfHxikILgZWw';
    $text = $post->post_title;
    $text .= PHP_EOL . 'جزئيات بيشتر در سايت تورلان گيم' . 
             PHP_EOL . wp_get_shortlink() . 
             PHP_EOL . '@TorlanGameOfficial';
    
    $bot = new telegramBot($token);
    if (has_post_thumbnail($post)) {
        $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( $ID ) );
        $bot->sendPhoto( $chat_id, $thumbnail_url, $text );
    } else {
        $bot->sendMessage($chat_id, $text);
    }
}
add_action( 'publish_post',  'torlangame_posts_telegram_bot', 10, 2 );

function torlangame_movies_telegram_bot( $ID, $post ) {
    require 'inc/telegram.php';
    if ( $_SERVER['SERVER_NAME'] == 'localhost' ) {
        $chat_id = '@dhjdhdgjfhkdawop';
    } else {
        $chat_id = '@torlangameofficial';
    }
    $token = '257351524:AAGgskaKINHEDcov3xyLScxGfHxikILgZWw';
    $text = $post->post_title;
    $text .= PHP_EOL . 'مشاهده ویدیو های بيشتر در سايت تورلان گيم' . 
             PHP_EOL . get_post_meta( $ID, 'aparat_url', true) . 
             PHP_EOL . 'torlangame.com' .
             PHP_EOL . '@TorlanGameOfficial';
    
    $bot = new telegramBot($token);
    $bot->sendMessage($chat_id, $text);
}
add_action( 'publish_movies',  'torlangame_movies_telegram_bot', 10, 2 );

function torlangame_downloads_telegram_bot( $ID, $post ) {
    require 'inc/telegram.php';
    if ( $_SERVER['SERVER_NAME'] == 'localhost' ) {
        $chat_id = '@dhjdhdgjfhkdawop';
    } else {
        $chat_id = '@torlangameofficial';
    }
    $token = '257351524:AAGgskaKINHEDcov3xyLScxGfHxikILgZWw';
    $text = $post->post_title;
    $text .= PHP_EOL . 'لینک های دانلود در سايت تورلان گيم' . 
             PHP_EOL . wp_get_shortlink() . 
             PHP_EOL . 'torlangame.com' .
             PHP_EOL . '@TorlanGameOfficial';
    
    $bot = new telegramBot($token);
    if (has_post_thumbnail($post)) {
        $thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( $ID ) );
        $bot->sendPhoto( $chat_id, $thumbnail_url, $text );
    } else {
        $bot->sendMessage($chat_id, $text);
    }
}
add_action( 'publish_downloads',  'torlangame_downloads_telegram_bot', 10, 2 );

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

/**
 * Load custom recent movies widget.
 */
require get_template_directory() . '/inc/recent-downloads-widget.php';