<?php 

$location = wp_get_post_terms($post->ID, 'clinician-location');

$license = wp_get_post_terms($post->ID, 'clinician-licensure');

?>

<div class="section clinician-hero-section hero-wrap">
    <div class="section-content single-hero-content">

        <div class="single-clinician-heroimg">
            <img class="clinician-single-headshot" src="<?php the_field( 'clinician-headshot' ); ?>" data-rjs="2" alt="<?php the_title( ); ?> Headshot" />
        </div>

        <div class="single-hero-info">

            <h1 class="blog-title"><?php the_title( ); ?>,

                <?php if ($license) { $out = array(); foreach ($license as $license) {
                        $out[] = '' .$license->name .'';
                    }
                    echo join( ', ',$out ); } ?>

            </h1>

            <?php if ($location) { $out = array(); ?>
            <p class="clinician-subtitle">For <?php foreach ($location as $location) { $out[] = '' .$location->name .''; } echo join( ' & ',$out ); } ?> Appointments</p>

            <a class="phone" href="tel:<?php the_field( 'number_link' ); ?>"><?php the_field( 'number_label' ); ?></a>

            <a class="btn <?php $terms = wp_get_post_terms(get_the_id(), 'clinician-color');  foreach ($terms as $term) { echo $term->slug.' ';} ?>" href="<?php the_field( 'clinician-book_now_link' ); ?>" target="_blank"><?php the_field( 'clinician_button_label', 'option' ); ?></a>

        </div>

    </div>
</div>