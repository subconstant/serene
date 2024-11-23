<?php

use Timber\Timber;

$context = Timber::context();
$context['post'] = Timber::get_post();

// Query Posts
$context['posts'] = Timber::get_posts( [ 'post_type' => 'post' ] );

/* *!* Carbon Fields example

$context['home_image'] = wp_get_attachment_url(carbon_get_post_meta($post->ID, 'home_image'));
$context['home_text'] = carbon_get_post_meta($post->ID, 'home_hero_text');

*/

Timber::render('templates/home.twig', $context);
