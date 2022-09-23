<?php
/**
 *	Template Name: Blog Page
**/

	// get the header
	set_query_var("body_class", 'blog');
	get_header();

	get_template_part( 'page-template-parts/blog/component', 'blog-archive');

    //get_template_part( 'template-parts/blog/component', 'archive');

    
 	// get the footer
 	get_footer(); 
 ?>
