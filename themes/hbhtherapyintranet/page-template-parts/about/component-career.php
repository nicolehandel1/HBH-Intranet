<div class="section srvpg-hero-section abt-section" id="career">
    <div class="section-content abt-content">
        
        <div class="srvpg-summary-wrap">
            <h1 class="pg-title abt-title career-tl"><?php the_field( 'careers_section_title' ); ?></h1>
            <p class=""><?php the_field( 'careers_section_content' ); ?></p>
            
            <?php $careers_button_link = get_field( 'careers_button_link' ); if ( $careers_button_link ) : ?>
                <a class="btn" href="<?php echo esc_url( $careers_button_link); ?>"><?php the_field( 'Careers_button_label' ); ?></a>
            <?php endif; ?>
        </div>
        
        <div class="single-hero-info srvpg-title-wrap career-title-wrap abt-title-wrap" style="background-image: url('<?php the_field( 'careers_image' ); ?>')">
        </div>

    </div>
</div>