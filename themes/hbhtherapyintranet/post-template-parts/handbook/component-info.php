<div class="section blg-info-section">
    <div class="section-content blog-info-contnt">
        
        <div class="single-content">
            <p><?php the_field( 'section_content' ); ?></p>
           
        </div>
        
        <div class="sidebar">
            
            <p class="clinician-subtitle">Appointments</p>
            <hr>
            <a class="phone" href="tel:<?php the_field( 'header_phone_number_link', 'option' ); ?>"><?php the_field( 'header_phone_number', 'option' ); ?></a>

            <a class="btn" href="<?php the_field( 'view_availability_link', 'option' ); ?>" target="_blank"><?php the_field( 'clinician_button_label', 'option' ); ?></a>
            
            <a class="archive-link" href="/counselors-appointments/"><?php the_field( 'clinicians_view_all_label', 'option' ); ?></a>

        </div>

    </div>
</div>