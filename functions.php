<?php


// Routes for Courses

// Timber::add_route(':category/:name', function($params){
//     $query = 'title='.$params['name'].'&category'.$params['category'];
//     Timber::load_template('single.php', $query);
// });


/* 
 * 
 * Custom Post Types
 *
 */

function tbx_sources() {

	$labels = array(
		'name'                => _x( 'Sources', 'Post Type General Name', 'tbx' ),
		'singular_name'       => _x( 'Source', 'Post Type Singular Name', 'tbx' ),
		'menu_name'           => __( 'Sources', 'tbx' ),
		'parent_item_colon'   => __( 'Parent Source:', 'tbx' ),
		'all_items'           => __( 'All Sources', 'tbx' ),
		'view_item'           => __( 'View Source', 'tbx' ),
		'add_new_item'        => __( 'Add New Source', 'tbx' ),
		'add_new'             => __( 'Add New', 'tbx' ),
		'edit_item'           => __( 'Edit Source', 'tbx' ),
		'update_item'         => __( 'Update Source', 'tbx' ),
		'search_items'        => __( 'Search Source', 'tbx' ),
		'not_found'           => __( 'Not found', 'tbx' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'tbx' ),
	);
	$rewrite = array(
		'slug'                => 'sources',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'source', 'tbx' ),
		'description'         => __( 'Sources attached to posts.', 'tbx' ),
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'taxonomies'          => array( 'source_type', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-links',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => false,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'source', $args );


	// Taxonomy for Source Types

	$labels = array(
		'name'                       => _x( 'Source Types', 'Taxonomy General Name', 'tsk' ),
		'singular_name'              => _x( 'Source Type', 'Taxonomy Singular Name', 'tsk' ),
		'menu_name'                  => __( 'Source Type', 'tsk' ),
		'all_items'                  => __( 'All Types', 'tsk' ),
		'parent_item'                => __( 'Parent Type', 'tsk' ),
		'parent_item_colon'          => __( 'Parent Type:', 'tsk' ),
		'new_item_name'              => __( 'New Type Name', 'tsk' ),
		'add_new_item'               => __( 'Add New Type', 'tsk' ),
		'edit_item'                  => __( 'Edit Type', 'tsk' ),
		'update_item'                => __( 'Update Type', 'tsk' ),
		'view_item'                  => __( 'View Type', 'tsk' ),
		'separate_items_with_commas' => __( 'Separate types with commas', 'tsk' ),
		'add_or_remove_items'        => __( 'Add or remove types', 'tsk' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'tsk' ),
		'popular_items'              => __( 'Popular Types', 'tsk' ),
		'search_items'               => __( 'Search Types', 'tsk' ),
		'not_found'                  => __( 'Not Found', 'tsk' ),
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
	register_taxonomy( 'source_type', array( 'source' ), $args );



	// Taxonomy for Levels

	$labels = array(
		'name'                       => _x( 'Source Levels', 'Taxonomy General Name', 'tbx' ),
		'singular_name'              => _x( 'Source Level', 'Taxonomy Singular Name', 'tbx' ),
		'menu_name'                  => __( 'Source Level', 'tbx' ),
		'all_items'                  => __( 'All Levels', 'tbx' ),
		'parent_item'                => __( 'Parent Level', 'tbx' ),
		'parent_item_colon'          => __( 'Parent Level:', 'tbx' ),
		'new_item_name'              => __( 'New Level Name', 'tbx' ),
		'add_new_item'               => __( 'Add New Level', 'tbx' ),
		'edit_item'                  => __( 'Edit Level', 'tbx' ),
		'update_item'                => __( 'Update Level', 'tbx' ),
		'view_item'                  => __( 'View Level', 'tbx' ),
		'separate_items_with_commas' => __( 'Separate Levels with commas', 'tbx' ),
		'add_or_remove_items'        => __( 'Add or remove Levels', 'tbx' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'tbx' ),
		'popular_items'              => __( 'Popular Levels', 'tbx' ),
		'search_items'               => __( 'Search Levels', 'tbx' ),
		'not_found'                  => __( 'Not Found', 'tbx' ),
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
	register_taxonomy( 'level', array( 'source', 'post' ), $args );

}
add_action( 'init', 'tbx_sources', 0 );

?>