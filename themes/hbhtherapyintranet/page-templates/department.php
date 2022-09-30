<style>

</style>
<?php
/**
 *	Template Name: Department Page
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

                    <div class="sidebar hr-sidebar">
                        <?php  get_template_part( 'page-template-parts/department/component', 'sidebar'); ?>
                    </div>

                    <div class="single-content">
                        <?php get_template_part( 'page-template-parts/department/component', 'resources'); ?>
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