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

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['lessons'] = Timber::get_posts($lesson_args);
Timber::render('pages/_page-class.twig', $context);

