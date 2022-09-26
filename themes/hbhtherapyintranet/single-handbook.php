<?php
/**
 * The template for displaying all single handbooks
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HBH_Therapy
 */

get_header(); ?>

<article>

<?php

get_template_part( 'post-template-parts/handbook/component', 'hero');
        
get_template_part( 'post-template-parts/handbook/component', 'info');?>
    
</article>    
    
<?php get_footer(); ?>