<?php

use Timber\Timber;

$context = Timber::context();
$context['temp_dir_uri'] = get_template_directory_uri();

// query CPT
$context['projects'] = Timber::get_posts( [ 'post_type' => 'project' ] );

$templates = array('templates/index.twig');

// front page setup
if (is_front_page()) {	array_unshift( $templates, 'templates/home.twig'); }

$home_page = Timber::get_post( [
  'name' => 'home',
  'post_type' => 'page'
] );

if ($home_page) { $context['home_page'] = $home_page; }

Timber::render($templates, $context);
