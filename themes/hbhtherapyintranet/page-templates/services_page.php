<?php
/**
 *	Template Name: Services Page
**/

	// get the header
	set_query_var("body_class", 'services');
	get_header();

	get_template_part( 'page-template-parts/services/component', 'hero');

    get_template_part( 'page-template-parts/services/component', 'filter-grid');

    
 	// get the footer
 	get_footer(); 
 ?>
