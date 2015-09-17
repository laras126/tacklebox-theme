<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package 	WordPress
 * @subpackage 	Timber
 * @since 		Timber 0.2
 */


	// Totally not the best way to do this, I think.

	$term = get_queried_object();
	$slug = $term->taxonomy;

	$tax_args = array(
		'post_type' => 'lesson',
		'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'class',
				'terms'	=> $term
			),
		),
	);

	$ass_args = array(
		'post_type' => 'screencast',
		'tax_query' => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'class',
				'terms'	=> $term
			),
		),
	);

	$templates = array('archives/taxonomy-class.twig', 'index.twig');

	$data = Timber::get_context();
	$data['term'] = $term;
	$data['lessons'] = Timber::get_posts($tax_args);
	$data['assignments'] = Timber::get_posts($ass_args);

	Timber::render($templates, $data);
