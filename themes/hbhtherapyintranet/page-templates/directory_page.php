<?php
/**
 *	Template Name: Directory Page
**/

	// get the header
	set_query_var("body_class", '');
	get_header(); ?>

<article id="post-<?php the_ID();  ?>" <?php post_class(); ?>>

	<div class="section blg-info-section">
    <div class="section-content">
        
        <div class="default-content">
            
            <h1 class="page-title"><?php echo get_the_title(); ?></h1>
            <div class="entry-content">

	<?php get_template_part( 'page-template-parts/directory/component', 'hero');  ?>
    
            </div>
            
        </div>

    </div>
</div>

</article><!-- #post-<?php the_ID(); ?> -->
<?php

// get the footer
 	get_footer(); 
 ?>
