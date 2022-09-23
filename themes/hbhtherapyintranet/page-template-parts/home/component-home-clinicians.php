<style>
@media only screen and (max-width: 1100px) and (min-width: 700px)  {
    a.clinician-card-name {
        font-size: 1.1em;
    }
    .clinician-card-container a.btn {
        font-size: 16px;
    }
    a.clinician-card-link {
        font-size 14px;
    }
    }
</style>
<?php 
if ( have_rows( 'hm-clinicians' ) ) : 
	while ( have_rows( 'hm-clinicians' ) ) : the_row();  

if(get_sub_field('hmclin-title')):
?>

<div class="section homeclin-section">
    <div class="section-content hmclin-content">

        <h2><?php the_sub_field( 'hmclin-title' ); ?></h2>
        <?php $hmclin_subtitle_link = get_sub_field( 'hmclin-subtitle_link' ); ?>
		<?php if ( $hmclin_subtitle_link ) : ?>
            <a class="hmclin-view-all" href="<?php echo esc_url( $hmclin_subtitle_link); ?>"><?php the_sub_field( 'hmclin-subtitle' ); ?></a>
        <?php endif; ?>

        <?php if ( have_rows( 'featured_clinicians' ) ) : ?>
        
        <div class="hmclin-card-wrap">
            <?php while ( have_rows( 'featured_clinicians' ) ) : the_row();  $hm_clinician = get_sub_field( 'hm-clinician' ); ?>
                <?php if ( $hm_clinician ) : $post = $hm_clinician; setup_postdata( $post ); ?>
            
            <div class="clinician-card-container">
                <img src="<?php the_field( 'clinician-headshot' ); ?>" alt="<?php the_title( ); ?> Headshot" class="clinician-card-image">
                <div class="clinician-card-overlay">
                    <div class="clinician-card-info">
                        <a class="clinician-card-name" href="<?php the_permalink(); ?>"><?php the_title(); ?>, 
                        <?php $license = wp_get_post_terms($post->ID, 'clinician-licensure');
                            if ($license) { $out = array(); foreach ($license as $license) {
                                $out[] = '' .$license->name .'';
                            }
                            echo join( ', ',$out ); } ?>
                        </a>
                        <a class="clinician-card-link" href="<?php the_permalink(); ?>">View Full Bio →</a>
                        <a class="btn" href="<?php the_field( 'clinician-book_now_link' ); ?>" target="_blank" ><?php the_field( 'clinician_button_label', 'option' ); ?></a>
                    </div>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>
            <?php endif;  endwhile; ?>

        </div>
        		<?php else : ?>
			<?php // No rows found ?>
		<?php endif; ?>

    </div>
</div>

<?php endif;

 /* Display noting if no section title */

 endwhile; endif; ?>
