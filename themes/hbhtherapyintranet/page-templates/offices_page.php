<?php
/**
 *	Template Name: Office Page
**/

	// get the header
	//set_query_var("body_class", 'firm');
	get_header(); ?>

<?php
    
    the_field( 'local-schema' );
	get_template_part( 'page-template-parts/offices/component', 'hero');
    get_template_part( 'page-template-parts/offices/component', 'info');
    get_template_part( 'page-template-parts/offices/component', 'office-calltoaction'); 

 	// get the footer
 	get_footer(); 
 ?>
