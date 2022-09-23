<?php 

$image = get_sub_field('hminfo-image');

$services = wp_get_post_terms($post->ID, 'clinician-services');

$modalities = wp_get_post_terms($post->ID, 'clinician-modalities');

$specialties = wp_get_post_terms($post->ID, 'clinician-specialties');

$insurance = wp_get_post_terms($post->ID, 'clinician-insurance');

$location = wp_get_post_terms($post->ID, 'clinician-location');

?>

<div class="section clin-info-section">
    <div class="section-content clin-info-content">

        <div class="sidebar">
            
            <?php if ($services) { $out = array(); ?>
            <p class="clinician-subtitle">Services</p>
            <hr>
            <ul class="sidebar-bullets"><?php foreach ($services as $service) {
                        $out[] = '<li>' .$service->name .'</li>';
                    }
                    echo join( $out ); } ?></ul>

            <?php if ($insurance) { $out = array(); ?>
            <p class="clinician-subtitle">Accepted Insurance Providers</p>
            <hr>
            <ul class="sidebar-bullets"><?php foreach ($insurance as $insurance) {
                        $out[] = '<li>' .$insurance->name .'</li>';
                    }
                    echo join( $out ); } ?></ul>
            
            <p class="clinician-subtitle">Share</p>
            <hr>
            <div class="share-icons">
                <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
                    <i class="fab fa-facebook-f" alt="Facebook share link"></i> 
                </a>
                
                <a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
                    <i class="fab fa-twitter" alt="Twitter share link"></i>
                </a>
                
                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" target="_blank">
                    <i class="fab fa-linkedin-in" alt="LinkedIn share link"></i>
                </a>
            </div>

            <?php if ($location) { $out = array(); ?>
            <p class="clinician-subtitle">For <?php foreach ($location as $location) { $out[] = '' .$location->name .''; } echo join( ' & ',$out ); } ?> Appointments</p>
            <hr>
            <a class="phone" href="tel:<?php the_field( 'number_link' ); ?>"><?php the_field( 'number_label' ); ?></a>

            <a class="btn <?php $terms = wp_get_post_terms(get_the_id(), 'clinician-color');  foreach ($terms as $term) { echo $term->slug.' ';} ?>" href="<?php the_field( 'clinician-book_now_link' ); ?>" target="_blank"><?php the_field( 'clinician_button_label', 'option' ); ?></a>
            
            <a class="archive-link" href="/counselors-appointments/"><?php the_field( 'clinicians_view_all_label', 'option' ); ?></a>

        </div>
        
        <div class="single-content">
            
            <!------------- Bio Content ------------->
            
            
            <?php if ( have_rows( 'clinician_bio_content' ) ): while ( have_rows( 'clinician_bio_content' ) ) : the_row(); ?>
            
            <?php if ( get_row_layout() == 'counseling_style' ) : ?>
                <p class="clinician-subtitle">Counseling Style</p>
                <p><?php the_sub_field( 'clinician-counseling_style' ); ?></p>
                
            <?php elseif ( get_row_layout() == 'experience' ) : ?>
                <p class="clinician-subtitle">Experience</p>
                <p><?php the_sub_field( 'clinician-experience' ); ?></p>
                
            <?php elseif ( get_row_layout() == 'other' ) : ?>
                <p><?php the_sub_field( 'miscother' ); ?></p>
                
            <?php endif; ?>

            <?php endwhile; else: endif; ?>

            <!------------- Specialties & Modalities ------------->
            
            <?php if ($specialties) { $out = array(); ?>
            <p class="clinician-subtitle">Specialties</p>
            <ul><?php foreach ($specialties as $specialty) {
                        $out[] = '<li>' .$specialty->name .'</li>';
                    }
                    echo join( $out ); } ?></ul>

            
            <?php if ($modalities) { $out = array(); ?>
            <p class="clinician-subtitle">Clinical Modalities + Treatments</p>
            <ul><?php foreach ($modalities as $modality) {
                        $out[] = '<li>' .$modality->name .'</li>';
                    }
                    echo join( $out ); } ?></ul>
            
            <!------------- Call to Action ------------->

            <p><?php the_field( 'clinician-call_to_action' ); ?></p>
            
            <!-----------Psychology Today ----------------->
            
            <?php the_field( 'psychology_today_verification' ); ?>
            
            <!------------- Articles ------------->
            
            <?php if ( have_rows( 'articles' ) ) : ?>
            <p class="clinician-subtitle"><?php the_field( 'articles_section_title', 'option' ); ?></p>
            
	           <u><?php while ( have_rows( 'articles' ) ) : the_row(); $clinician_articles = get_sub_field( 'clinician_articles' ); ?>
            
		      <?php if ( $clinician_articles ) : $post = $clinician_articles; setup_postdata( $post ); ?> 
			     <li class="bio-article"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		      <?php wp_reset_postdata(); endif; ?>
            
	       <?php endwhile; ?></u>
            <?php else : endif; ?>
            
        </div>

    </div>
</div>