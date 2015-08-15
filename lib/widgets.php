<?php 

// Register Sidebars

$class_sidebar = array(
	'id'            => 'class_sidebar',
	'class'         => 'sidebar--class',
	'name'          => __( 'Class Page Sidebar', 'tbx' ),
	'description'   => __( 'Widgets to show up on the sidebar of class pages.', 'tbx' ),
	'before_title'  => '<h4 class="title--widget">',
	'after_title'   => '</h4>',
	'before_widget' => '<li class="widget">',
);
register_sidebar( $class_sidebar );

?>