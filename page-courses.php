<?php

/*
 * Template Name: Course Listing
 */


$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['courses'] = Timber::get_terms('class');

Timber::render('pages/page-courses.twig', $context);
