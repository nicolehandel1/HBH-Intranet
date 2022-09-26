<?php
   /*
   Plugin Name: HBH Custom Post Types
  a plugin for HBH Therapy
   Version: 1.2
   Author: Nicole Handel
   Author URI: https://nicolehandel.com
   License: GPL2
   */

// Register Custom Post Type Service
function create_handbook_cpt() {

	$labels = array(
		'name' => _x( 'Handbook', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Handbook', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Handbook', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Handbook', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Handbook Archives', 'textdomain' ),
		'attributes' => __( 'Handbook Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Section:', 'textdomain' ),
		'all_items' => __( 'All Section', 'textdomain' ),
		'add_new_item' => __( 'Add New Section', 'textdomain' ),
		'add_new' => __( 'Add New Section', 'textdomain' ),
		'new_item' => __( 'New Section', 'textdomain' ),
		'edit_item' => __( 'Edit Section', 'textdomain' ),
		'update_item' => __( 'Update Section', 'textdomain' ),
		'view_item' => __( 'View Section', 'textdomain' ),
		'view_items' => __( 'View Sections', 'textdomain' ),
		'search_items' => __( 'Search Section', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Section', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Section', 'textdomain' ),
		'items_list' => __( 'Section list', 'textdomain' ),
		'items_list_navigation' => __( 'Section list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Section list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Handbook', 'textdomain' ),
		'description' => __( 'HBH Handbook', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-book',
		'supports' => array('title', 'custom-fields'),
		'taxonomies' => array('section-type'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
        'rewrite' => array('slug' => 'handbook'),
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'handbook', $args );

}
add_action( 'init', 'create_handbook_cpt', 0 );

function section_taxonomy() {
    register_taxonomy(
        'section-type',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'handbook',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Section Type', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'section-type',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'section_taxonomy');


?>