<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_meta');

function crb_attach_meta()
{

  // Theme options
  Container::make('theme_options', __('Site Meta'))
    ->set_icon( 'dashicons-laptop' )
    ->add_fields(array(
      Field::make('text', 'test_theme_meta', 'Site Meta Example')
        ->set_attribute( 'placeholder', '(Custom field text here)' )
    ));

  /* Default post meta
  Container::make('post_meta', 'Post Meta')
    ->add_fields(array(
      Field::make('text', 'post_meta1', 'Testing Field'),
    ));
  */

  /* Specific post meta
  Container::make('post_meta', 'Homepage Settings')
    ->where('post_type', '=', 'page')
    ->where( 'post_id', '=', '13')
    ->add_fields(array(
      Field::make('textarea', 'home_text', 'Home Text'),
      Field::make('image', 'home_image', 'Home Image')
          ->set_type(array('image'))
  ));
  */
}


//load cf
add_action('after_setup_theme', 'crb_load');
function crb_load()
{
  \Carbon_Fields\Carbon_Fields::boot();
}