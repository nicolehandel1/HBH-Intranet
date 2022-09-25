<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HBH_Therapy
 */

?>

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
            
            <div class="entry-content"><?php the_content(); ?></div>
            
        </div>

    </div>
</div>

</article><!-- #post-<?php the_ID(); ?> -->