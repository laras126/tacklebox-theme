<?php 

// Register Sidebars

$class_sidebar = array(
	'id'            => 'main_sidebar',
	'class'         => 'sidebar--main',
	'name'          => __( 'Main Sidebar', 'tbx' ),
	'description'   => __( 'Widgets to show up on the sidebar of most pages.', 'tbx' ),
	'before_title'  => '<h4 class="widget__title">',
	'after_title'   => '</h4>',
	'before_widget' => '<li class="list__item--widget">',
);
register_sidebar( $class_sidebar );

?>