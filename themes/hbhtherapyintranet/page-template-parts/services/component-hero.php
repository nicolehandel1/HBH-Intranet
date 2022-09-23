<div class="section srvpg-hero-section">
    <div class="section-content srvpg-hero-content">

        <div class="single-hero-info srvpg-title-wrap">

            <h1 class="pg-title"><?php the_field( 'srv-tre-page_title' ); ?></h1>
            
            <a class="phone" href="tel:<?php the_field( 'header_phone_number_link', 'option' ); ?>"><?php the_field( 'header_phone_number', 'option' ); ?></a>

            <?php if ( have_rows( 'calltoact_button', 'option' ) ) :  while ( have_rows( 'calltoact_button', 'option' ) ) : the_row(); ?>
            <a class="btn" href="<?php the_sub_field( 'calltoact_button_link' ); ?>" target="_blank"><?php the_sub_field( 'calltoact_button_label' ); ?></a>
            	<?php endwhile; endif; ?>

        </div>
        
        <div class="srvpg-summary-wrap">
            
            <p class="srvpg-summary"><?php the_field( 'services_summary' ); ?></p>
        
        </div>

    </div>
</div>