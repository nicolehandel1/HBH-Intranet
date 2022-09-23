<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HBH_Therapy
 */

get_header(); ?>

<article>

<?php

get_template_part( 'post-template-parts/service/component', 'hero');
        
get_template_part( 'post-template-parts/service/component', 'info');?>
    
</article>    
    
<?php get_footer(); ?>