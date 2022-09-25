<style>

</style>
<?php
/**
 *	Template Name: HR Page
**/

	// get the header
	//set_query_var("body_class", 'firm');
	get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="section blg-info-section">
        <div class="section-content">
            <div class="default-content">

                <h1 class="page-title"><?php the_field( 'page_title' ); ?></h1>
                <div class="clin-info-content">

                    <div class="sidebar">
                        <?php  get_template_part( 'page-template-parts/hr/component', 'sidebar'); ?>
                    </div>

                    <div class="single-content">
                        <?php get_template_part( 'page-template-parts/hr/component', 'handbook'); ?>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
<?php

 	// get the footer
 	get_footer(); 
 ?>