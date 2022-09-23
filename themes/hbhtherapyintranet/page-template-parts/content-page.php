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
    <div class="section-content blog-info-contnt">
        
        <div class="single-content" style="margin-top: 100px;">
            
            <h1 class="blog-title office-title"><?php the_title(); ?></h1>
            
            <div class="entry-content"><?php the_content(); ?></div>
            
        </div>
        
        <div class="sidebar">
            
            <p class="clinician-subtitle">Appointments</p>
            <hr>
            <a class="phone" href="tel:<?php the_field( 'header_phone_number_link', 'option' ); ?>"><?php the_field( 'header_phone_number', 'option' ); ?></a>

            <a class="btn" href="" target="_blank"><?php the_field( 'clinician_button_label', 'option' ); ?></a>
            
            <a class="archive-link" href="/counselors-appointments/"><?php the_field( 'clinicians_view_all_label', 'option' ); ?></a>

        </div>

    </div>
</div>

</article><!-- #post-<?php the_ID(); ?> -->