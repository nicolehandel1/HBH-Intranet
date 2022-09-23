<div class="section office-calltoaction">

    <div class="section-content align-center">
        <div class="home-call-wrap home-call-btom">
            <h1 class="home-tagline"><?php the_field( 'call_to_action' ); ?></h1>
            <h3><?php the_field( 'bottom-home-suheading_copy' ); ?></h3>
            
            <?php if ( have_rows( 'call_to_action_button' ) ) :  while ( have_rows( 'call_to_action_button' ) ) : the_row(); 
                $call_button_link = get_sub_field( 'call_button_link' ); ?>
		
            <?php if ( $call_button_link ) : ?>
            <a class="btn" href="<?php echo esc_url( $call_button_link); ?>"><?php the_sub_field( 'call_button_label' ); ?></a>
            <?php endif;  endwhile;  endif; ?>
            
        </div>
    </div>
</div>
