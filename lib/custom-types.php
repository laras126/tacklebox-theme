<?php 

// ----
// Custom Type for Sources
// ----

$labels = array(
	'name'                => _x( 'Resources', 'Post Type General Name', 'tbx' ),
	'singular_name'       => _x( 'Resource', 'Post Type Singular Name', 'tbx' ),
	'menu_name'           => __( 'Resources', 'tbx' ),
	'parent_item_colon'   => __( 'Parent Resource:', 'tbx' ),
	'all_items'           => __( 'All Resources', 'tbx' ),
	'view_item'           => __( 'View Resource', 'tbx' ),
	'add_new_item'        => __( 'Add New Resource', 'tbx' ),
	'add_new'             => __( 'Add New', 'tbx' ),
	'edit_item'           => __( 'Edit Resource', 'tbx' ),
	'update_item'         => __( 'Update Resource', 'tbx' ),
	'search_items'        => __( 'Search Resource', 'tbx' ),
	'not_found'           => __( 'Not found', 'tbx' ),
	'not_found_in_trash'  => __( 'Not found in Trash', 'tbx' ),
);
$rewrite = array(
	'slug'                => 'resources',
	'with_front'          => true,
	'pages'               => true,
	'feeds'               => true,
);
$args = array(
	'label'               => __( 'source', 'tbx' ),
	'description'         => __( 'Resources attached to posts.', 'tbx' ),
	'labels'              => $labels,
	'supports'            => array( 'title' ),
	'taxonomies'          => array( 'source_type', 'category', 'level' ),
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
	'publicly_queryable'  => true,
	'rewrite'             => $rewrite,
	'capability_type'     => 'page',
);
register_post_type( 'source', $args );



// ----
// Lessons Custom Type
// ----

$labels = array(
	'name'                => _x( 'Lessons', 'Post Type General Name', 'tbx' ),
	'singular_name'       => _x( 'Lesson', 'Post Type Singular Name', 'tbx' ),
	'menu_name'           => __( 'Lessons', 'tbx' ),
	'parent_item_colon'   => __( 'Parent Lesson:', 'tbx' ),
	'all_items'           => __( 'All Lessons', 'tbx' ),
	'view_item'           => __( 'View Lesson', 'tbx' ),
	'add_new_item'        => __( 'Add New Lesson', 'tbx' ),
	'add_new'             => __( 'Add New', 'tbx' ),
	'edit_item'           => __( 'Edit Lesson', 'tbx' ),
	'update_item'         => __( 'Update Lesson', 'tbx' ),
	'search_items'        => __( 'Search Lesson', 'tbx' ),
	'not_found'           => __( 'Not found', 'tbx' ),
	'not_found_in_trash'  => __( 'Not found in Trash', 'tbx' ),
);
$rewrite = array(
	'slug'                => 'lessons',
	'with_front'          => true,
	'pages'               => true,
	'feeds'               => true,
);
$args = array(
	'label'               => __( 'lesson', 'tbx' ),
	'description'         => __( 'Lessons attached to posts.', 'tbx' ),
	'labels'              => $labels,
	'supports'            => array( 'title' ),
	'taxonomies'          => array( 'category', 'level', 'class', 'post_tag' ),
	'hierarchical'        => false,
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'show_in_nav_menus'   => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-welcome-learn-more',
	'can_export'          => true,
	'has_archive'         => true,
	'exclude_from_search' => true,
	'publicly_queryable'  => true,
	'rewrite'             => $rewrite,
	'capability_type'     => 'post',
);
register_post_type( 'lesson', $args );




// ----
// Screencast Custom Type
// ----

$labels = array(
	'name'                => _x( 'Assignments', 'Post Type General Name', 'tbx' ),
	'singular_name'       => _x( 'Assignment', 'Post Type Singular Name', 'tbx' ),
	'menu_name'           => __( 'Assignments', 'tbx' ),
	'parent_item_colon'   => __( 'Parent Assignment:', 'tbx' ),
	'all_items'           => __( 'All Assignments', 'tbx' ),
	'view_item'           => __( 'View Assignment', 'tbx' ),
	'add_new_item'        => __( 'Add New Assignment', 'tbx' ),
	'add_new'             => __( 'Add New', 'tbx' ),
	'edit_item'           => __( 'Edit Assignment', 'tbx' ),
	'update_item'         => __( 'Update Assignment', 'tbx' ),
	'search_items'        => __( 'Search Assignment', 'tbx' ),
	'not_found'           => __( 'Not found', 'tbx' ),
	'not_found_in_trash'  => __( 'Not found in Trash', 'tbx' ),
);
$rewrite = array(
	'slug'                => 'assignments',
	'with_front'          => true,
	'pages'               => true,
	'feeds'               => true,
);
$args = array(
	'label'               => __( 'screencast', 'tbx' ),
	'description'         => __( 'Assignments attached to lessons.', 'tbx' ),
	'labels'              => $labels,
	'supports'            => array( 'title' ),
	'taxonomies'          => array( 'category', 'level', 'class', 'post_tag' ),
	'hierarchical'        => false,
	'public'              => true,
	'show_ui'             => true,
	'show_in_menu'        => true,
	'show_in_nav_menus'   => true,
	'show_in_admin_bar'   => true,
	'menu_position'       => 5,
	'menu_icon'           => 'dashicons-video-alt3',
	'can_export'          => true,
	'has_archive'         => true,
	'exclude_from_search' => true,
	'publicly_queryable'  => true,
	'rewrite'             => $rewrite,
	'capability_type'     => 'post',
);
register_post_type( 'screencast', $args );

 ?>