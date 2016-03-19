<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */


$terms = get_the_terms($post->ID, 'class');
$lesson_args = array(
		'post_type' => 'lesson',
		'tax_query' => array(
	        array(
	            'taxonomy' => 'class', 
	            'terms' => $terms[0],
	            'field' => 'id', 
	            'operator' => 'IN'
	        )
	    )
	);

$screencast_args = array(
	'connected_type' => 'sc_to_lesson',
	'connected_items' => get_queried_object(),
	'nopaging' => true,
	'suppress_filters' => false,
	'orderby' => 'menu_order'
);

$user_id = get_current_user_id();

$context = Timber::get_context();
$post = Timber::query_post();

// $context['lesson_completed'] = get_user_meta( $user_id, '_lesson_'.$post->ID.'_complete' )[0];

$context['post'] = $post;
$context['user'] = $user_id;

$context['related_lessons'] = Timber::get_posts($lesson_args);
$context['screencasts'] = Timber::get_posts($screencast_args);

if (post_password_required($post->ID)){
	Timber::render('single-password.twig', $context);
} else {
	Timber::render(array('singles/single-' . $post->ID . '.twig', 'singles/single-' . $post->post_type . '.twig', 'singles/single.twig'), $context);
}
