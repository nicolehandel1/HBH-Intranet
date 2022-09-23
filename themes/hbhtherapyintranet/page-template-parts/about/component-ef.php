<div class="section srvpg-hero-section abt-section ef-section" id="ef">
    <div class="section-content abt-content ins-content">

        <div class="single-hero-info srvpg-title-wrap ef-title-wrap abt-title-wrap">
            <h1 class="pg-title abt-title"><?php the_field( 'ef_section_title' ); ?></h1>
        </div>
        
        <div class="srvpg-summary-wrap">
            <p class="srvpg-summary"><?php the_field( 'ef_section_content' ); ?></p>
            
            <?php $ef_button_link = get_field( 'ef_button_link' ); ?>
                <?php if ( $ef_button_link ) : ?>
                <a class="btn" href="<?php echo get_permalink( $ef_button_link ); ?>"><?php the_field( 'ef_button_label' ); ?></a>
            <?php endif; ?>
        </div>

    </div>
</div>