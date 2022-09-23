<?php 

if ( have_rows( 'hm-services' ) ) : 
	while ( have_rows( 'hm-services' ) ) : the_row();  

$image = get_sub_field('hmsrv-image');

?>

<div class="section home-srv-section">
    <div class="section-content hm-srv-content">

        <div class="hmsrv-overlay-wrap">

            <img class="hm-map" src="<?php print $image['url'] ?>" data-rjs="2" alt="MA map">

            <div id="overlay" class="hmsrv-overlay">
                <?php if ( have_rows( 'service_grid' ) ) : while ( have_rows( 'service_grid' ) ) : the_row(); ?>
                
                <div id="<?php the_sub_field( 'hmsrv-id' ); ?>" class="overlay-contents vertical-center">
                <h2><?php the_sub_field( 'hmsrv-description_title' ); ?></h2>
                    <p><?php the_sub_field( 'hmsrv-description' ); ?></p></div>
                
                <?php endwhile; else : endif; ?>
            </div>

        </div>

        <div class="hmsrv-grid-wrap hmsrv-wrap-desk">

            <h2><?php the_sub_field( 'hmsrv-title' ); ?></h2>

            <div class="hmsrv-grid" onmouseover="showOverlay(overlay)" onmouseout="hideOverlay(overlay)">

                <?php if ( have_rows( 'service_grid' ) ) : while ( have_rows( 'service_grid' ) ) : the_row(); ?>

                <div class="hmsrv-grid-item" onmouseover="showDes(<?php the_sub_field( 'hmsrv-id' ); ?>)" onmouseout="hideDes(<?php the_sub_field( 'hmsrv-id' ); ?>)">
                    <div>
                        <p><?php the_sub_field( 'hmsrv-description_title' ); ?></p>
                        <p><?php $hmsrv_link = get_sub_field( 'hmsrv-link' ); if ( $hmsrv_link ) : ?><a class="hmsrv_link" href="<?php echo esc_url( $hmsrv_link); ?>">→</a><?php endif; ?></p>
                    </div>
                </div>

                <?php endwhile; else : endif; ?>

            </div>

        </div>

        <div class="hmsrv-grid-wrap hmsrv-wrap-mobile">

            <h2><?php the_sub_field( 'hmsrv-title' ); ?></h2>
            
            <img class="hm-map" src="<?php print $image['url'] ?>" data-rjs="2" alt="MA map">

            <div class="hmsrv-grid">

                <?php if ( have_rows( 'service_grid' ) ) : while ( have_rows( 'service_grid' ) ) : the_row(); ?>

                <div class="hmsrv-grid-item" onclick="showModes(x<?php the_sub_field( 'hmsrv-id' ); ?>)"><?php the_sub_field( 'hmsrv-description_title' ); ?></div>

                <div id="x<?php the_sub_field( 'hmsrv-id' ); ?>" class="hmsrv-accordian">
                    <p><?php the_sub_field( 'hmsrv-description' ); ?>
                        <?php $hmsrv_link = get_sub_field( 'hmsrv-link' ); if ( $hmsrv_link ) : ?><a class="hmsrv_link" href="<?php echo esc_url( $hmsrv_link); ?>"> Read More →</a><?php endif; ?></p>

                </div>

                <?php endwhile; else : endif; ?>

            </div>

        </div>

    </div>
</div>

<?php endwhile; endif; ?>