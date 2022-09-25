<div class="section blg-info-section">
    <div class="section-content blog-info-contnt">
        
        <div class="single-content">
            
            <?php if ( have_rows( 'blog_content' ) ): ?>
                <?php while ( have_rows( 'blog_content' ) ) : the_row(); ?>
                    <?php if ( get_row_layout() == 'section_title' ) : ?>
            
            <h2 class="blog-subtitle"><?php the_sub_field( 'blog_section_title' ); ?></h2>
            
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
            
           <!-- Author ------------->
                
           <?php if ( have_rows( 'blog_author' ) ): ?>
                
           <h1 class="blog-subtitle bauthor-title">About The Author</h1>

           <?php while ( have_rows( 'blog_author' ) ) : the_row(); ?>
		   
           <?php if ( get_row_layout() == 'other' ) : $blog_author_other = get_sub_field( 'blog_author_other' ); if ( $blog_author_other ) :  $post = $blog_author_other;  setup_postdata( $post ); ?>

                <div class="bauthor-wrap">
                    <img class="bauthor-img" src="<?php the_field( 'author_bioheadshot' ); ?>" data-rjs="2" alt="<?php the_field( 'author_bioname' ); ?> Headshot" />
                    <div class="">
                        <h4 class="bauthor-name" rel="author"><?php the_field( 'author_bioname' ); ?></h4>
                        <p class="bauthor-bio"><?php the_field( 'author_bio' ); ?></p>
                    </div>
                </div><?php wp_reset_postdata(); ?>
            
            <?php endif; elseif ( get_row_layout() == 'clinician' ) : $blog_authot_clincician = get_sub_field( 'blog_authot_clincician' ); if ( $blog_authot_clincician ) : $post = $blog_authot_clincician;  setup_postdata( $post ); ?>
            
                <div class="bauthor-wrap">
                    <img class="bauthor-img" src="<?php the_field( 'clinician-headshot' ); ?>" data-rjs="2" alt="<?php the_title( ); ?> Headshot" />
                    <div class="">
                        <h4 class="bauthor-name" rel="author"><?php the_title( ); ?>, <?php $license = wp_get_post_terms($post->ID, 'clinician-licensure'); if ($license) { $out = array(); foreach ($license as $license) { $out[] = '' .$license->name .''; } echo join( ', ',$out ); } ?></h4>
                        <p class="bauthor-bio"><?php the_field( 'author_summary' ); ?> <a href="<?php the_permalink(); ?>" class="bauthor-more">More About Author →</a></p>
                    </div>
                </div><?php wp_reset_postdata(); ?>

                <?php endif; endif; endwhile; else: endif; ?>
            
        </div>
        
        <div class="sidebar">
            
            <p class="clinician-subtitle">Archive</p>
            <hr>
            
        
        </div>

    </div>
</div>