<?php
/**
 * The template for displaying all authors
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HBH_Therapy
 */

get_header(); ?>

<style>
body.author {
    background: #f5efe9;
    }
    .sd-email {
        display: block;
        color: #4D4D4D;
        margin: 30px 0px;
    }
</style>

<?php

get_template_part( 'post-template-parts/clinicians/component', 'hero');
        
get_template_part( 'post-template-parts/clinicians/component', 'info');?>
    
<?php get_footer(); ?>