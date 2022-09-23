<?php 
$insurance = get_terms( array(
    'taxonomy' => 'clinician-insurance',
    'hide_empty' => false, ) );
?>
<div class="section clin-info-section">
    <div class="section-content clin-info-content">
        <div class="sidebar">
            
            <p class="clinician-subtitle"><?php the_field( 'photo_gallery_title' ); ?></p>
            <hr>
            
            <?php $images = get_field( 'office_photo_gallery' ); if ( $images ) :  ?>
            
                <?php foreach ( $images as $image ): 
            
                    $content .= '<a href="'. $image['url'] .'">';
                    $content .= '<img src="'. $image['sizes']['medium_large'] .'" alt="'. $image['alt'] .'" />';
                    $content .= '</a>';
                    ?>

                <?php endforeach; if ( function_exists('slb_activate') ){ $content = slb_activate($content); } echo $content; 
            endif; ?>

            
            <p class="clinician-subtitle">Accepted Insurance Providers</p>
            <hr>
            <ul class="sidebar-bullets"><?php foreach ($insurance as $ins){
                echo '<li>' .$ins->name .'</li>';} ?></ul>
            <p class="clinician-subtitle">Share</p>
            <hr>
            <div class="share-icons">
                <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
                    <i class="fab fa-facebook-f" alt="Facebook share link"></i> 
                </a>
                
                <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
                    <i class="fab fa-twitter" alt="Twitter share link"></i>
                </a>
                
                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" target="_blank">
                    <i class="fab fa-linkedin-in" alt="LinkedIn share link"></i>
                </a>
            </div>

        
            <p class="clinician-subtitle">For Appointments</p>
            <hr>
            <a class="phone" href="tel:<?php the_field( 'phone_link' ); ?>">Call <?php the_field( 'phone_label' ); ?></a>

            <a class="btn" href="/counselors-appointments/">View Availabiltiy</a>
            
            <a class="archive-link" href="/about-us/">View All Offices</a>

        </div>
        
        <div class="single-content">
            <h1 class="blog-title office-title"><?php the_title(); ?></h1>
            <?php if ( have_rows( 'blog_content' ) ): ?>
                <?php while ( have_rows( 'blog_content' ) ) : the_row(); ?>
                    <?php if ( get_row_layout() == 'section_title' ) : ?>
            
            <h2 class="blog-subtitle office-subtitle"><?php the_sub_field( 'blog_section_title' ); ?></h2>
            
                    <?php elseif ( get_row_layout() == 'section_content' ) : ?>
            
                        <p><?php the_sub_field( 'blog_section_content' ); ?></p>
            
                    <?php elseif ( get_row_layout() == 'image' ) : ?>
            
                        <?php $blog_content_image = get_sub_field( 'blog_content_image' ); ?>
                        <?php if ( $blog_content_image ) : ?>
                            <img src="<?php echo esc_url( $blog_content_image['url'] ); ?>" alt="<?php echo esc_attr( $blog_content_image['alt'] ); ?>" />
                        <?php endif; ?>
            
                    <?php elseif ( get_row_layout() == 'quote' ) : ?>
            
                        <?php the_sub_field( 'quote' ); ?>
                        <?php the_sub_field( 'attribute' ); ?>
            
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php else: ?>
                <?php // No layouts found ?>
            <?php endif; ?>
            
            <?php the_field( 'psychology_today_verification' ); ?>
            
        </div>

    </div>
</div>