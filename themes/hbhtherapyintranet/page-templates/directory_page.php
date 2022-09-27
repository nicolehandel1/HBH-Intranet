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
        
        <div class="department-content">
            
            <h1 class="pg-title"><?php echo get_the_title(); ?></h1>
            <div class="entry-content">
                
                <p class="search">
                    <input type="text" class="quicksearch" placeholder="Search..." />
                    <img src="<?php the_field( 'search_icon', 'option' ); ?>" data-rjs="2" alt="search icon" />
                </p>

	<?php get_template_part( 'page-template-parts/directory/component', 'grid');  ?>
    
            </div>
            
        </div>

    </div>
</div>

</article><!-- #post-<?php the_ID(); ?> -->
<?php

// get the footer
 	get_footer(); 
 ?>
