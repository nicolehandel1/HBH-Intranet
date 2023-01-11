<div class="section blg-info-section">
    <div class="section-content blog-info-contnt">
        
        <div class="single-content">
            
            <?php if ( have_rows( 'content' ) ): ?>
                <?php while ( have_rows( 'content' ) ) : the_row(); ?>
                    <?php if ( get_row_layout() == 'subtitle' ) : ?>
                        <h3 style="font-size: 2em;"><?php the_sub_field( 'training_subtitle' ); ?></h3>
                    <?php elseif ( get_row_layout() == 'editor' ) : ?>
                        <p><?php the_sub_field( 'training_editior' ); ?></p>
                    <?php elseif ( get_row_layout() == 'video' ) : ?>
                        <?php the_sub_field( 'training_video' ); ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php else: ?>
                <?php // No layouts found ?>
            <?php endif; ?>
            
        </div>
        
        <div class="sidebar">

            <p class="clinician-subtitle">Archive</p>
            <hr>

            <?php
            $custom_terms = get_terms('training-type');

            foreach($custom_terms as $custom_term) {
                wp_reset_query();
                $args = array('post_type' => 'training',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'training-type',
                            'field' => 'slug',
                            'terms' => $custom_term->slug,
                        ),
                    ),
                 );

                 $loop = new WP_Query($args);
                 if($loop->have_posts()) { ?>


            <p class="hb-cat"><?php echo $custom_term->name; ?> Topic List</p>

            <ol>
            <?php while($loop->have_posts()) : $loop->the_post(); ?>

            
                <li><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
            

            <?php endwhile; ?></ol>


            <?php }
            } ?>


        </div>

        </div>
</div>