<?php
/**
 * Register movie post type
 * @return void
 */
function torlangame_cpt_init() {

	// custom lables for movie post type
	$labels = array(
		'name'               => _x( 'ویدیو ها', 'post type general name', 'torlnagame' ),
		'singular_name'      => _x( 'ویدیو', 'post type singular name', 'torlnagame' ),
		'menu_name'          => _x( 'ویدیو ها', 'admin menu', 'torlnagame' ),
		'name_admin_bar'     => _x( 'ویدیو', 'add new on admin bar', 'torlnagame' ),
		'add_new'            => _x( 'افزودن ویدیو', 'movie', 'torlnagame' ),
		'add_new_item'       => __( 'افزودن ویدیو جدید', 'torlnagame' ),
		'new_item'           => __( 'ویدیو جدید', 'torlnagame' ),
		'edit_item'          => __( 'ویرایش ویدیو', 'torlnagame' ),
		'view_item'          => __( 'نمایش ویدیو', 'torlnagame' ),
		'all_items'          => __( 'همه ویدیو ها', 'torlnagame' ),
		'search_items'       => __( 'جستجوی ویدیو', 'torlnagame' ),
		'parent_item_colon'  => __( 'ویدیو ها پدر:', 'torlnagame' ),
		'not_found'          => __( 'ویدیویی یافت نشد.', 'torlnagame' ),
		'not_found_in_trash' => __( 'ویدیویی در زباله دان یافت نشد.', 'torlnagame' )
	);
	// custom arguments for movie post type
	$args = array(
		'labels'             => $labels,
		'description'        => __( 'توضیح.', 'torlnagame' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_icon'	         => 'dashicons-format-video',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'movies' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'thumbnail', 'editor', 'revisions', 'comments', '' ),
		'exclude_from_search'=> false,
		'taxonomies'		 => array('movies_categories')
	);
	register_post_type( 'movies', $args );
}
add_action( 'init', 'torlangame_cpt_init' );

// Register Custom Taxonomy
function movies_categories() {

	$labels = array(
		'name'                       => _x( 'دسته ویدیو ها', 'Taxonomy General Name', 'torlangame' ),
		'singular_name'              => _x( 'دسته ویدیو', 'Taxonomy Singular Name', 'torlangame' ),
		'menu_name'                  => __( 'دسته', 'torlangame' ),
		'all_items'                  => __( 'همه دسته ها', 'torlangame' ),
		'parent_item'                => __( 'دسته پدر', 'torlangame' ),
		'parent_item_colon'          => __( 'دسته پدر:', 'torlangame' ),
		'new_item_name'              => __( 'نام دسته جدید', 'torlangame' ),
		'add_new_item'               => __( 'افزودن دسته جدید', 'torlangame' ),
		'edit_item'                  => __( 'ویرایش دسته', 'torlangame' ),
		'update_item'                => __( 'به روزرسانی دسته', 'torlangame' ),
		'view_item'                  => __( 'نمایش دسته', 'torlangame' ),
		'separate_items_with_commas' => __( 'جدا کردن دسته ها با کاما', 'torlangame' ),
		'add_or_remove_items'        => __( 'افزودن یا حذف دسته ها', 'torlangame' ),
		'choose_from_most_used'      => __( 'انتخاب از بین بیشتر استفاده شده ها', 'torlangame' ),
		'popular_items'              => __( 'دسته های پرطرفدار', 'torlangame' ),
		'search_items'               => __( 'جستجوی دسته ها', 'torlangame' ),
		'not_found'                  => __( 'یافت نشد', 'torlangame' ),
		'no_terms'                   => __( 'بدون دسته', 'torlangame' ),
		'items_list'                 => __( 'لیست دسته ها', 'torlangame' ),
		'items_list_navigation'      => __( 'راهبری لیست دسته ها', 'torlangame' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'movies_category', array( 'movies' ), $args );

}
add_action( 'init', 'movies_categories', 0 );


/**
 * Add custom meta box for rate and publish year
 * @return void
 */
function movie_add_meta_box() {
	add_meta_box('aparat_url', __('آپارات', 'movie'), 'aparat_url_meta_box_callback', 'movies');
}
/**
 * Callback function of rating movie, to generate inputs on movies post type
 * @param  stdObj $post
 * @return HTML
 */
function aparat_url_meta_box_callback($post) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field('movie_save_meta_box_data', 'movie_meta_box_nonce');
	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$aparat_url_value = get_post_meta($post->ID, 'aparat_url', true);
	// generate input of type number for rating movies
	// with range of 0-10 and step 0.1
	echo '<label for="aparat_url">';
	_e( 'لینک آپارات', 'movie' );
	echo '</label> ';
	echo '<input type="url" id="aparat_url" name="aparat_url" value="' . esc_attr($aparat_url_value) . '" min="0" max="10" step="0.1" />';
}
add_action('add_meta_boxes', 'movie_add_meta_box');

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function movie_save_meta_box_data($post_id) {
	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */
	// Check if our nonce is set.
	if ( ! isset( $_POST['movie_meta_box_nonce'] ) ) {
		return;
	}
	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['movie_meta_box_nonce'], 'movie_save_meta_box_data' ) ) {
		return;
	}
	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}
	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['aparat_url'] ) ) {
		return;
	}
	// now that we now aparat_url is set let validate it to our custom values
	if ( $_POST['aparat_url'] > 10 || $_POST['aparat_url'] < 0 ) {
		return;
	}

	// Sanitize user input.
	$aparat_url_data = sanitize_text_field( $_POST['aparat_url'] );
	// Update the meta field in the database.
	update_post_meta( $post_id, 'aparat_url', $aparat_url_data );
}
add_action( 'save_post', 'movie_save_meta_box_data' );