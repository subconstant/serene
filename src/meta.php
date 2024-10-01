<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');

function crb_attach_theme_options()
{

  // site meta
  Container::make('theme_options', __('Site Meta'))
    ->add_fields(array(
      Field::make('text', 'home_text', 'Homepage Text')
        ->set_attribute( 'placeholder', '(Custom field text here)' )
    ));

  // post meta
  Container::make('post_meta', 'Post Meta')
    ->add_fields(array(
      Field::make('text', 'post_meta1', 'Testing Field'),
    ));
}

//load cf
add_action('after_setup_theme', 'crb_load');
function crb_load()
{
  \Carbon_Fields\Carbon_Fields::boot();
}