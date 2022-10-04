<?php 
$imageID = get_field('blog_header_image');
$image = wp_get_attachment_image_src( $imageID, 'full' ); 
$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true); 
?>
<div class="section hero-wrap blog-section">
    <div class="section-content blog-hero-content">

        <div class="single-hero-info blog-hero-info">
            
            <a class="archive-link" href="/news/">News & Updates</a>

            <h1 class="blog-title"><?php the_title(); ?></h1>

            <?php if( get_field('blog_subtitle') ): ?>
            <h2 class="blog-hero-subtitle"><?php the_field( 'blog_subtitle' ); ?></h2>
            <?php endif; ?>

            <?php if ( have_rows( 'blog_author' ) ):  while ( have_rows( 'blog_author' ) ) : the_row(); ?>
                    
                <?php if ( get_row_layout() == 'other' ) : $blog_author_other = get_sub_field( 'blog_author_other' ); if ( $blog_author_other ) :  $post = $blog_author_other;  setup_postdata( $post ); ?> 
            
                <p class="blog-author" rel="author"><?php the_sub_field( 'text_before_name_copy' ); ?> <?php the_title(); ?></p><?php wp_reset_postdata(); ?>
            
                <?php endif; elseif ( get_row_layout() == 'clinician' ) : $blog_authot_clincician = get_sub_field( 'blog_authot_clincician' ); if ( $blog_authot_clincician ) : $post = $blog_authot_clincician;  setup_postdata( $post ); ?>
            
                <p><?php the_sub_field( 'text_before_name' ); ?> <a class="blog-author" rel="author" href="<?php the_permalink(); ?>"><?php the_title( ); ?>, <?php $license = wp_get_post_terms($post->ID, 'clinician-licensure'); if ($license) { $out = array(); foreach ($license as $license) { $out[] = '' .$license->name .''; } echo join( ', ',$out ); } ?></a></p><?php wp_reset_postdata(); ?>
            
            <?php endif; endif; endwhile; else: endif; ?>
            
            <p class="blog-date"><?php echo get_the_date( 'F j, Y' ); ?></p>

        </div>

    </div>
</div>