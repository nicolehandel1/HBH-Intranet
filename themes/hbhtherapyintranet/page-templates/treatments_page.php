<?php
/**
 *	Template Name: Treatments Page
**/

	// get the header
	//set_query_var("body_class", 'firm');
	get_header(); ?>

<?php

	get_template_part( 'page-template-parts/treatments/component', 'hero');

    get_template_part( 'page-template-parts/treatments/component', 'filter-grid');

    
 	// get the footer
 	get_footer(); 
 ?>
