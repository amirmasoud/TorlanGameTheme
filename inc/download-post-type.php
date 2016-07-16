<?php
/**
 * Register download post type
 * @return void
 */
function torlangame_download_cpt_init() {

	// custom lables for download post type
	$labels = array(
		'name'               => _x( 'دانلود ها', 'post type general name', 'torlnagame' ),
		'singular_name'      => _x( 'دانلود', 'post type singular name', 'torlnagame' ),
		'menu_name'          => _x( 'دانلود ها', 'admin menu', 'torlnagame' ),
		'name_admin_bar'     => _x( 'دانلود', 'add new on admin bar', 'torlnagame' ),
		'add_new'            => _x( 'افزودن دانلود', 'download', 'torlnagame' ),
		'add_new_item'       => __( 'افزودن دانلود جدید', 'torlnagame' ),
		'new_item'           => __( 'دانلود جدید', 'torlnagame' ),
		'edit_item'          => __( 'ویرایش دانلود', 'torlnagame' ),
		'view_item'          => __( 'نمایش دانلود', 'torlnagame' ),
		'all_items'          => __( 'همه دانلود ها', 'torlnagame' ),
		'search_items'       => __( 'جستجوی دانلود', 'torlnagame' ),
		'parent_item_colon'  => __( 'دانلود ها پدر:', 'torlnagame' ),
		'not_found'          => __( 'دانلودیی یافت نشد.', 'torlnagame' ),
		'not_found_in_trash' => __( 'دانلودیی در زباله دان یافت نشد.', 'torlnagame' )
	);
	// custom arguments for download post type
	$args = array(
		'labels'             => $labels,
		'description'        => __( 'توضیح.', 'torlnagame' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_icon'	         => 'dashicons-download',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'downloads' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'thumbnail', 'editor', 'revisions', 'comments', '' ),
		'exclude_from_search'=> false,
		'taxonomies'		 => array('downloads_categories')
	);
	register_post_type( 'downloads', $args );
}
add_action( 'init', 'torlangame_download_cpt_init' );

// Register Custom Taxonomy
function torlangame_downloads_categories() {

	$labels = array(
		'name'                       => _x( 'دسته دانلود ها', 'Taxonomy General Name', 'torlangame' ),
		'singular_name'              => _x( 'دسته دانلود', 'Taxonomy Singular Name', 'torlangame' ),
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
	register_taxonomy( 'downloads_category', array( 'downloads' ), $args );

}
add_action( 'init', 'torlangame_downloads_categories', 0 );

add_filter( 'rwmb_meta_boxes', 'your_prefix_meta_boxes' );
function your_prefix_meta_boxes( $meta_boxes ) {
    $meta_boxes[] = array(
        'title'      => __( 'Test Meta Box', 'torlangame' ),
        'post_types' => 'downloads',
        'fields'     => array(
            array(
                'id'   => 'magnet_link',
                'name' => __( 'Magnet Link', 'torlangame' ),
                'type' => 'text',
                'clone' => true,
            ),
            array(
                'id'   => 'magnet_link_size',
                'name' => __( 'Magnet Size', 'torlangame' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'direct_link',
                'name' => __( 'Direct Link', 'torlangame' ),
                'type' => 'text',
                'clone' => true,
            ),
            array(
                'id'   => 'direct_link_size',
                'name' => __( 'Direct Size', 'torlangame' ),
                'type' => 'text',
            ),
            array(
                'id'   => 'game_thumbnail',
                'name' => __( 'Thumbnail', 'torlangame' ),
                'type' => 'image_advanced',
            ),
        ),
    );
    return $meta_boxes;
}