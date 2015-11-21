<?php
/**
 * The Template for displaying all single posts
 *
 *
 * @package  WordPress
 * @subpackage  Timber
 */

$context = array();
$context['main_sidebar'] = Timber::get_widgets('main_sidebar');

Timber::render(array('sidebars/sidebar.twig'), $data);