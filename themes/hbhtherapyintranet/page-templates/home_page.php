<?php
/**
 *	Template Name: Home Page
**/

	// get the header
	set_query_var("body_class", 'home');
	get_header(); ?>

<style>
h2 {
    font-weight: 700;
    font-size: 24px;
    line-height: 32px;
    color: #085962;
}
.page {
    margin: 0; 
}
</style>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="section blg-info-section">
    <div class="section-content">
        
        <div class="default-content">
            
            <div class="entry-content" style="display: flex; flex-wrap: wrap-reverse;">
                <?php 
                get_template_part( 'page-template-parts/home/component', 'home-updates');
                get_template_part( 'page-template-parts/home/component', 'home-calendar');
                ?>
            </div>
            
        </div>

    </div>
</div>

</article><!-- #post-<?php the_ID(); ?> -->
<?php
	
    
 	// get the footer
 	get_footer(); 
 ?>
