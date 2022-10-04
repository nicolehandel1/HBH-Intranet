<div class="section blg-info-section">
    <div class="section-content blog-info-contnt">
        
        <div class="single-content">
            
            <?php if ( have_rows( 'content' ) ): ?>
                <?php while ( have_rows( 'content' ) ) : the_row(); ?>
                    <?php if ( get_row_layout() == 'subtitle' ) : ?>
                        <h2><?php the_sub_field( 'training_subtitle' ); ?></h2>
                    <?php elseif ( get_row_layout() == 'editor' ) : ?>
                        <p><?php the_sub_field( 'training_editior' ); ?></p>
                    <?php elseif ( get_row_layout() == 'video' ) : ?>
                        <?php the_sub_field( 'training_editior' ); ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php else: ?>
                <?php // No layouts found ?>
            <?php endif; ?>
            
        </div>
        
        <div class="sidebar">
            
            <p class="clinician-subtitle">Archive</p>
            <hr>
            
        
        </div>

    </div>
</div>