<?php 

if ( have_rows( 'hm-testimonial' ) ) : while ( have_rows( 'hm-testimonial' ) ) : the_row();  

$tImage = get_sub_field('hmtestimonial-image');

$bImage = get_sub_field('hmtestimonial-border-image');

?>

<div class="section home-testimonial-section">
    <div class="section-content hm-testimonial-content">

        <div class="testimonial-img-wrap">
            <img class="testimonial-img" src="<?php print $tImage['url'] ?>" data-rjs="2" alt="Butterfly Flying">
        </div>

        <div class="testimonial-wrap">
            <h2><?php the_sub_field( 'hmtestimonial-title' ); ?></h2>

            <div class="quote-wrap">

                <div class="testimonial-img-mobile">
                    <img class="testimonial-img" src="<?php print $tImage['url'] ?>" data-rjs="2" alt="Butterfly Flying">
                </div>

                <?php if ( have_rows( 'hm-testimonials-group' ) ) : ?>
                <div class="owl-carousel owl-theme">

                    <?php while ( have_rows( 'hm-testimonials-group' ) ) : the_row(); ?>
                    <div>
                        <p class="testimonial-quote"><?php the_sub_field( 'hmtestimonial-quote' ); ?> "</p>
                        <p class="testimonial-quote testimonial-attribute"><?php the_sub_field( 'hmtestimonial-attribution' ); ?></p>
                    </div>
                    <?php endwhile; ?>

                </div>
                <?php else : ?>
                <?php // No rows found ?>
                <?php endif; ?>

            </div>

        </div>

        <img class="testimonial-border-img" src="<?php print $bImage['url'] ?>" data-rjs="2" alt="Butterfly Flying">

    </div>

</div>

<?php endwhile; ?>
<?php endif; ?>