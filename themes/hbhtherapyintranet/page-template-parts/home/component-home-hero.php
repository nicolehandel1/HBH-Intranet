<?php
$heroImageID = get_field('home-hero_image'); 
$heroImage = wp_get_attachment_image_src( $heroImageID, 'full' ); 
$heroAlt_text = get_post_meta($heroImageID , '_wp_attachment_image_alt', true); 
?>

<div class="section bg-home">
    <div class="section-content align-center">
        <div class="home-call-wrap hero-wrap">
            <h1 class="home-tagline"><?php the_field( 'home-tagline' ); ?></h1>
            <h3><?php the_field( 'home-suheading' ); ?></h3>
            
            <?php if ( have_rows( 'hero_button' ) ) :  while ( have_rows( 'hero_button' ) ) : the_row(); 
                $button_link = get_sub_field( 'button_link' ); ?>
		
            <?php if ( $button_link ) : ?>
            <a class="btn" href="<?php echo esc_url( $button_link); ?>"><?php the_sub_field( 'button_label' ); ?></a>
            <?php endif;  endwhile;  endif; ?>
            
        </div>
        <div class="butterfly-img-wrap"><img src="<?php echo $heroImage[0]; ?>" data-rjs="2" alt="<?php echo $heroAlt_text; ?>" width="100%" height="100%"></div>
    </div>
</div>
