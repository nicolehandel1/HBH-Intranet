<?php
/**
 *	Template Name: Home Page
**/

	// get the header
	set_query_var("body_class", 'home');
	get_header();

	get_template_part( 'page-template-parts/home/component', 'home-hero');
    get_template_part( 'page-template-parts/home/component', 'home-services');
    get_template_part( 'page-template-parts/home/component', 'home-info');
    get_template_part( 'page-template-parts/home/component', 'home-clinicians');
    get_template_part( 'page-template-parts/home/component', 'home-testimonials');
    get_template_part( 'page-template-parts/home/component', 'home-calltoaction');

    
 	// get the footer
 	get_footer(); 
 ?>
