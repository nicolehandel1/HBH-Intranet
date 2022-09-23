<div class="section covid-section abt-section" id="covid">
    <div class="section-content covid-content">
        <h1 class="pg-title abt-title covid-title"><?php the_field( 'covid_section_title' ); ?></h1>
        <p class="abt-sum covid-sum"><?php the_field( 'covid_section_content' ); ?></p>
        
        <?php $covid_button_link = get_field( 'covid_button_link' ); if ( $covid_button_link ) : ?>
        <div class="flex-center"><a class="btn" href="<?php echo esc_url( $covid_button_link); ?>"><?php the_field( 'covid_button_label' ); ?></a></div>
        <?php endif; ?>
    </div>
</div>