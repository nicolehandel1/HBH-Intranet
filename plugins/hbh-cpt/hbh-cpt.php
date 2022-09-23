<?php
   /*
   Plugin Name: HBH Custom Post Types
  a plugin for HBH Therapy
   Version: 1.2
   Author: Nicole Handel
   Author URI: https://nicolehandel.com
   License: GPL2
   */

// Register Custom Post Type Clinician
function create_clinician_cpt() {

	$labels = array(
		'name' => _x( 'Clinicians', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Clinician', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Clinicians', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Clinician', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Clinician Archives', 'textdomain' ),
		'attributes' => __( 'Clinician Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Clinician:', 'textdomain' ),
		'all_items' => __( 'All Clinicians', 'textdomain' ),
		'add_new_item' => __( 'Add New Clinician', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Clinician', 'textdomain' ),
		'edit_item' => __( 'Edit Clinician', 'textdomain' ),
		'update_item' => __( 'Update Clinician', 'textdomain' ),
		'view_item' => __( 'View Clinician', 'textdomain' ),
		'view_items' => __( 'View Clinicians', 'textdomain' ),
		'search_items' => __( 'Search Clinician', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Clinician', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Clinician', 'textdomain' ),
		'items_list' => __( 'Clinicians list', 'textdomain' ),
		'items_list_navigation' => __( 'Clinicians list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Clinicians list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Clinician', 'textdomain' ),
		'description' => __( 'Clinician Bios', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-users',
		'supports' => array('title', 'custom-fields'),
		'taxonomies' => array('clinician-services'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
        'rewrite' => array('slug' => 'mental-health-counselors-ma'),
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'clinician', $args );

}
add_action( 'init', 'create_clinician_cpt', 0 );

function clinician_taxonomy() {
    register_taxonomy(
        'clinician-services',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'clinician',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Services', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'clinician-services',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
        register_taxonomy(
        'clinician-modalities',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'clinician',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Modalities', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'clinician-modalities',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
    register_taxonomy(
        'clinician-specialties',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'clinician',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Specialties', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'clinician-specialties',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
    register_taxonomy(
        'clinician-insurance',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'clinician',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Accepted Insurance', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'clinician-insurance',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
    register_taxonomy(
        'clinician-location',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'clinician',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Location', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'clinician-location',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
    register_taxonomy(
        'clinician-color',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'clinician',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Color', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'clinician-color',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
    register_taxonomy(
        'clinician-licensure',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'clinician',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'License', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'clinician-licensure',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'clinician_taxonomy');


// Register Custom Post Type Service
function create_service_cpt() {

	$labels = array(
		'name' => _x( 'Services', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Service', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Services', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Service', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Service Archives', 'textdomain' ),
		'attributes' => __( 'Service Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Service:', 'textdomain' ),
		'all_items' => __( 'All Services', 'textdomain' ),
		'add_new_item' => __( 'Add New Service', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Service', 'textdomain' ),
		'edit_item' => __( 'Edit Service', 'textdomain' ),
		'update_item' => __( 'Update Service', 'textdomain' ),
		'view_item' => __( 'View Service', 'textdomain' ),
		'view_items' => __( 'View Services', 'textdomain' ),
		'search_items' => __( 'Search Service', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Service', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Service', 'textdomain' ),
		'items_list' => __( 'Services list', 'textdomain' ),
		'items_list_navigation' => __( 'Services list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Services list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Service', 'textdomain' ),
		'description' => __( 'Mental Health Services', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-universal-access',
		'supports' => array('title', 'custom-fields'),
		'taxonomies' => array('service-type'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
        'rewrite' => array('slug' => 'mental-health-services-ma'),
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'service', $args );

}
add_action( 'init', 'create_service_cpt', 0 );

function service_taxonomy() {
    register_taxonomy(
        'service-type',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'service',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Service Type', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'service-type',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'service_taxonomy');

// Register Custom Post Type Treatment
function create_treatment_cpt() {

	$labels = array(
		'name' => _x( 'Treatments', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Treatment', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Treatments', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Treatment', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Treatment Archives', 'textdomain' ),
		'attributes' => __( 'Treatment Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Treatment:', 'textdomain' ),
		'all_items' => __( 'All Treatments', 'textdomain' ),
		'add_new_item' => __( 'Add New Treatment', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Treatment', 'textdomain' ),
		'edit_item' => __( 'Edit Treatment', 'textdomain' ),
		'update_item' => __( 'Update Treatment', 'textdomain' ),
		'view_item' => __( 'View Treatment', 'textdomain' ),
		'view_items' => __( 'View Treatments', 'textdomain' ),
		'search_items' => __( 'Search Treatment', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Treatment', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Treatment', 'textdomain' ),
		'items_list' => __( 'Treatments list', 'textdomain' ),
		'items_list_navigation' => __( 'Treatments list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Treatments list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Treatment', 'textdomain' ),
		'description' => __( 'Treatment Programs', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-palmtree',
		'supports' => array('title', 'author', 'post-formats', 'custom-fields'),
		'taxonomies' => array('treatment-type'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
        'rewrite' => array('slug' => 'treatment-therapy-ma'),
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'treatment', $args );

}
add_action( 'init', 'create_treatment_cpt', 0 );

function treatment_taxonomy() {
    register_taxonomy(
        'treatment-type',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'treatment',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Treatment Type', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'treatment-type',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'treatment_taxonomy');

// Register Custom Post Type Authors
function create_author_cpt() {

	$labels = array(
		'name' => _x( 'Authors', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Author', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Authors', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Author', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Author Archives', 'textdomain' ),
		'attributes' => __( 'Author Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Author:', 'textdomain' ),
		'all_items' => __( 'All Authors', 'textdomain' ),
		'add_new_item' => __( 'Add New Author', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New Author', 'textdomain' ),
		'edit_item' => __( 'Edit Author', 'textdomain' ),
		'update_item' => __( 'Update Author', 'textdomain' ),
		'view_item' => __( 'View Author', 'textdomain' ),
		'view_items' => __( 'View Authors', 'textdomain' ),
		'search_items' => __( 'Search Author', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into Author', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Author', 'textdomain' ),
		'items_list' => __( 'Authors list', 'textdomain' ),
		'items_list_navigation' => __( 'Authors list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter Authors list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Author', 'textdomain' ),
		'description' => __( 'Author Bios', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-edit',
		'supports' => array('title', 'custom-fields'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 6,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => false,
		'hierarchical' => false,
        'rewrite' => array('slug' => 'mental-health-blog-author'),
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'author', $args );

}
add_action( 'init', 'create_author_cpt', 0 );

?>