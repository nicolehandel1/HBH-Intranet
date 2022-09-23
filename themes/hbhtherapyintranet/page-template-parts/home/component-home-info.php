<style>
    .home-info-section {
        background: #fff;
    }

    .hm-info-content {
        
    }
    
    .hm-info-content h2 {
        color: #085962;
    }

    @media only screen and (min-width: 1125px) {}
    
    @media only screen and (max-width: 1125px) {}

    @media only screen and (max-width: 700px) {}
    
</style>

<?php 

if ( have_rows( 'hm-info' ) ) : 
	while ( have_rows( 'hm-info' ) ) : the_row();  

$image = get_sub_field('hminfo-image');

if(get_sub_field('hminfo-title')):
?>

<div class="section home-info-section">
    <div class="section-content hm-info-content">
        
        <h2><?php the_sub_field( 'hminfo-title' ); ?></h2>

        <div style="background-color: #FAF8F4; border: 1px solid #4d4d4d; height: 600px;"></div>
        
    </div>
</div>

<?php endif;

 /* Display noting if no section title */

 endwhile; endif; ?>