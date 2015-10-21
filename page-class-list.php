<?php

/*
 * Template Name: Class Listing
 * Description: A Page Template that lists all classes by Taxonomy.
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
$context['c_user'] = new TimberUser();
$context['lessons'] = Timber::get_posts($lesson_args);
// $context['sidebar'] = Timber::get_widgets('main_sidebar');

Timber::render('pages/page-class.twig', $context);
