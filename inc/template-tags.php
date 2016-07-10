<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package TorlanGame
 */

if ( ! function_exists( 'torlangame_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function torlangame_posted_on() {

	$time_string = '<time class="entry-date published updated" datetime="' . get_the_date( 'Y-m-d' ) . '"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_date( get_option('date_format') ) . '</a></time>';

	$byline = sprintf(
		/*esc_html_x( '%s', 'post author', 'torlangame' ), 
		'<a class="author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_avatar( get_the_author_meta( 'ID' ), 44.8 ) . '<span class="name">' . esc_html( get_the_author() ) . '</span></a>'*/
		esc_html_x( '%s', 'post author', 'torlangame' ), 
		'<a class="author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_avatar( get_the_author_meta( 'ID' ), 44.8 ) . '<span class="name">' . esc_html( get_the_author() ) . '</span></a>'
	);

	echo $time_string . $byline; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'torlangame_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function torlangame_entry_footer() {

	echo '<div class="row"><ul class="stats">';

	if ( ( 'post' === get_post_type() || 'movies' === get_post_type() ) && is_single() ) {
		the_category();
		echo '<ul class="tags-list">';
		the_tags( '<li>', '</li><li>', '</li>' );
		echo '</ul>';
	}

/*	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<li>';

		// translators: %s: post title
		comments_popup_link(  0, 1, '%' );

		echo '<span class="icon fa fa-comment"></span> ';
		echo '</li>';
	}*/

/*	echo "<li>";
	edit_post_link(
		sprintf(
			esc_html__( 'Edit %s', 'torlangame' ),
			// translators: %s: Name of current post
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
	echo "</li>";*/

	echo "</ul>";
	if ( ! is_single() ) {
		echo '<ul class="actions">';
			echo '<li><a href="' . esc_url( get_permalink() ) . '" class="button big">ادامه مطلب</a></li>';
		echo '</ul></div>';
	}

	if ( is_single() ) {
		torlangame_author_info();
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function torlangame_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'torlangame_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'torlangame_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so torlangame_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so torlangame_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in torlangame_categorized_blog.
 */
function torlangame_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'torlangame_categories' );
}
add_action( 'edit_category', 'torlangame_category_transient_flusher' );
add_action( 'save_post',     'torlangame_category_transient_flusher' );
