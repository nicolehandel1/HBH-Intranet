<?php
/**
 *	Template Name: Clinician Page
**/

	// get the header
	//set_query_var("body_class", 'clinicians');
	get_header();

    get_template_part( 'page-template-parts/clinicians/component', 'hero');

    get_template_part( 'page-template-parts/clinicians/component', 'filters');

    get_template_part( 'page-template-parts/clinicians/component', 'grid');
    
 	// get the footer
 	get_footer(); 
 ?>
