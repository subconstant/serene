<?php
add_action('init', 'register_custom_post_types');

function register_custom_post_types() {

    //CPT 'project' start
    register_post_type('project', array(
      'labels'             => array(
          'name'               => _x('Projects', 'post type general name', 'serene'),
          'singular_name'      => _x('Project', 'post type singular name', 'serene'),
          'menu_name'          => _x('Projects', 'admin menu', 'serene'),
          'name_admin_bar'     => _x('Project', 'add new on admin bar', 'serene'),
          'add_new'            => _x('Add New', 'Project', 'serene'),
          'add_new_item'       => __('Add New Project', 'serene'),
          'new_item'           => __('New Project', 'serene'),
          'edit_item'          => __('Edit Project', 'serene'),
          'view_item'          => __('View Project', 'serene'),
          'all_items'          => __('All Projects', 'serene'),
          'search_items'       => __('Search Projects', 'serene'),
          'parent_item_colon'  => __('Parent Projects:', 'serene'),
          'not_found'          => __('No Projects found.', 'serene'),
          'not_found_in_trash' => __('No Projects found in Trash.', 'serene')
      ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'menu_icon'          => 'dashicons-open-folder',
      'query_var'          => true,
      'rewrite'            => array('slug' => 'projects'),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
      'show_in_rest'       => true
    ));
    //CPT 'project' end


}
?>
