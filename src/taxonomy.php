<?php

add_action( 'init', 'register_custom_taxonomies' );

function register_custom_taxonomies() {

    /* Taxonomy Publisher for CPT Projects
    register_taxonomy( 'publisher', array( 'project' ), array(
        'labels' => array(
            'name'              => _x( 'Publishers', 'taxonomy general name', 'serene' ),
            'singular_name'     => _x( 'Publisher', 'taxonomy singular name', 'serene' ),
            'search_items'      => __( 'Search Publishers', 'serene' ),
            'all_items'         => __( 'All Publishers', 'serene' ),
            'parent_item'       => __( 'Parent Publisher', 'serene' ),
            'parent_item_colon' => __( 'Parent Publisher:', 'serene' ),
            'edit_item'         => __( 'Edit Publisher', 'serene' ),
            'update_item'       => __( 'Update Publisher', 'serene' ),
            'add_new_item'      => __( 'Add New Publisher', 'serene' ),
            'new_item_name'     => __( 'New Publisher Name', 'serene' ),
            'menu_name'         => __( 'Publishers', 'serene' ),
        ),
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'publisher' ),
        'show_in_rest' => true,
    ) );
    */

}
