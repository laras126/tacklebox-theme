<?php

/*
 * Template Name: Class Page
 * Description: A Page Template for classes that shows associated lessons.
 */


$term_id = get_field('class_taxonomy');
$lesson_args = array(
		'post_type' => 'lesson',
		'tax_query' => array(
	        array(
	            'taxonomy' => 'class', 
	            'terms' => $term_id, 
	            'field' => 'id', 
	            'operator' => 'IN'
	        )
	    )
	);

$user_id = get_current_user_id();

$context = Timber::get_context();
$post = new TimberPost();
$lessons = Timber::get_posts($lesson_args);

$context['post'] = $post;

// foreach ($lessons as $lesson) {
$context['lesson_completed'] = get_user_meta( $user_id, '_lesson_'.$lesson->ID.'_complete' )[0];
// }

$context['c_user'] = new TimberUser();

$context['lessons'] = $lessons;
Timber::render('pages/_page-class.twig', $context);
