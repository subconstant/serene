<?php

use Timber\Timber;

$context = Timber::context();
$context['temp_dir_uri'] = get_template_directory_uri();


// check for posts page
if (is_home()) {
  Timber::render('templates/blog.twig', $context);
} else {
  Timber::render('templates/index.twig', $context);
}