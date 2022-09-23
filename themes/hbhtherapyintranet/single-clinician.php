<?php
/**
 * The template for displaying all single clinicians
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HBH_Therapy
 */

get_header(); ?>

<?php

get_template_part( 'post-template-parts/clinicians/component', 'hero');
        
get_template_part( 'post-template-parts/clinicians/component', 'info');?>
    
<?php get_footer(); ?>