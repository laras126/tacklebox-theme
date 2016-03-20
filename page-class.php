<?php

/*
 * Template Name: Class Sales Page
 * Description: A Page Template for classes that shows associated lessons.
 */

$term_id = get_field('class_taxonomy'); // Get ACF field
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

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['c_user'] = new TimberUser();
$context['lessons'] = Timber::get_posts($lesson_args);

Timber::render('pages/page-class.twig', $context);
