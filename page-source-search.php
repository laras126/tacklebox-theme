<?php

/**
 * Template Name: Resources Search
 */


$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$args = array(
	'type'                     => 'source',
	'child_of'                 => 0,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'taxonomy'                 => 'category',
	'pad_counts'               => false 
); 

$categories = get_categories( $args );
$context['cats'] = $categories;

Timber::render(array('pages/page-source-search.twig'), $context);
