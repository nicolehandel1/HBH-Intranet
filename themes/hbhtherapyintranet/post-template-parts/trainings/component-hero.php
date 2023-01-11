<?php 
$imageID = get_field('blog_header_image');
$image = wp_get_attachment_image_src( $imageID, 'full' ); 
$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true); 
?>
<div class="section hero-wrap blog-section">
    <div class="section-content blog-hero-content">

        <div class="single-hero-info blog-hero-info">
            
            <a class="archive-link" href="/operations/">Trainings</a>

            <h1 class="blog-title"><?php the_title(); ?></h1>
            
            <p class="blog-date"><?php echo get_the_date( 'F j, Y' ); ?></p>

        </div>

    </div>
</div>