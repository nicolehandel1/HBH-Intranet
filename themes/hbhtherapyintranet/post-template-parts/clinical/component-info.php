<div class="section blg-info-section">
    <div class="section-content">

        <a class="archive-link" href="/resources/">Clinical Resources</a>

        <h1 class="blog-title"><?php the_title(); ?></h1>

    </div>
    <div class="section-content blog-info-contnt">

        <div class="single-content">
            <p><?php the_field( 'section_content' ); ?></p>
            <?php if( get_field('google_doc_link') ): ?>
                <iframe src="<?php the_field( 'google_doc_link' ); ?>?embedded=true" width="1500" height="1500"></iframe>
            <?php endif; ?>

        </div>

        <div class="sidebar">

            <p class="clinician-subtitle">Archive</p>
            <hr>

            <?php 
                $args = array(  
                        'post_type' => 'clinical',
                        'post_status' => 'publish',
                    );
                        $loop = new WP_Query( $args ); ?>
            
            <ol><?php
                while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <li><a href="<?php echo get_permalink(); ?>">
                <p class="handbook-subtitle"><?php the_title(); ?></p>
            </a></li>

            <?php endwhile; wp_reset_postdata();  ?></ol>

        </div>
    </div>
</div>