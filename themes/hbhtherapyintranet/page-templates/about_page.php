<?php
/**
 *	Template Name: About Page
**/

	// get the header
	//set_query_var("body_class", 'about');
	get_header();

	get_template_part( 'page-template-parts/about/component', 'hero');

    get_template_part( 'page-template-parts/about/component', 'offices');

    get_template_part( 'page-template-parts/about/component', 'ef');

    get_template_part( 'page-template-parts/about/component', 'ins');

    get_template_part( 'page-template-parts/about/component', 'covid');

    get_template_part( 'page-template-parts/about/component', 'career');

    
 	// get the footer
 	get_footer(); 
 ?>
