<?php 

/* 
 * 
 * Taxonomies
 *
 */



// ----
// Taxonomy for Source Types
// ----

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
	'not_found'                  => __( 'Not Found', 'tsk' )
);

$rewrite = array(
	'slug'                => 'source-type',
	'with_front'          => true,
	'pages'               => true,
	'feeds'               => true,
);

$args = array(
	'labels'                     => $labels,
	'hierarchical'               => true,
	'public'                     => true,
	'show_ui'                    => true,
	'show_admin_column'          => true,
	'show_in_nav_menus'          => true,
	'show_tagcloud'              => true,
	'rewrite'      				 => $rewrite
);
register_taxonomy( 'source_type', array( 'source' ), $args );



// ----
// Taxonomy for Levels
// ----

$labels = array(
	'name'                       => _x( 'Levels', 'Taxonomy General Name', 'tbx' ),
	'singular_name'              => _x( 'Level', 'Taxonomy Singular Name', 'tbx' ),
	'menu_name'                  => __( 'Levels', 'tbx' ),
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
register_taxonomy( 'level', array( 'source', 'post', 'page', 'lesson', 'screencast' ), $args );


// ----
// Taxonomy for Classes
// ----

$labels = array(
	'name'                       => _x( 'Classes', 'Taxonomy General Name', 'tbx' ),
	'singular_name'              => _x( 'Class', 'Taxonomy Singular Name', 'tbx' ),
	'menu_name'                  => __( 'Classes', 'tbx' ),
	'all_items'                  => __( 'All Classes', 'tbx' ),
	'parent_item'                => __( 'Parent Class', 'tbx' ),
	'parent_item_colon'          => __( 'Parent Class:', 'tbx' ),
	'new_item_name'              => __( 'New Class Name', 'tbx' ),
	'add_new_item'               => __( 'Add New Class', 'tbx' ),
	'edit_item'                  => __( 'Edit Class', 'tbx' ),
	'update_item'                => __( 'Update Class', 'tbx' ),
	'view_item'                  => __( 'View Class', 'tbx' ),
	'separate_items_with_commas' => __( 'Separate Classes with commas', 'tbx' ),
	'add_or_remove_items'        => __( 'Add or remove Classes', 'tbx' ),
	'choose_from_most_used'      => __( 'Choose from the most used', 'tbx' ),
	'popular_items'              => __( 'Popular Classes', 'tbx' ),
	'search_items'               => __( 'Search Classes', 'tbx' ),
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
register_taxonomy( 'class', array( 'lesson', 'screencast' ), $args );

 ?>