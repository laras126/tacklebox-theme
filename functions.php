<?php

// Taxonomy for Source Levels

function tbx_source_level() {

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
add_action( 'init', 'tbx_source_level', 0 );

?>