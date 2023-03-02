<?php 
$author = get_queried_object();
?>
<div class="section clin-info-section">
    <div class="section-content clin-info-content">

        <div class="sidebar hr-sidebar">
            
            <?php if ( have_rows( 'office_hours', $author ) ) : ?>
                <p class="clinician-subtitle">Office Hours</p>
                <hr>
                <?php while ( have_rows( 'office_hours', $author ) ) : the_row(); ?>

                <p><strong><?php the_sub_field( 'location' ); ?></strong><br>
                <?php the_sub_field( 'hours' ); ?></p>

                <?php endwhile; ?>
            <?php else : ?>
                <?php // No rows found ?>
            <?php endif; ?>   
            
            <p class="clinician-subtitle">Connect</p>
            <hr>
            
            <a class="sd-email" href="mailto:<?php echo $author->user_email; ?>"><span class="dashicons dashicons-email-alt2"></span> <?php echo $author->user_email; ?></a>
            
            <?php if( get_field('phone_number', $author) ): ?>
                <p>For employee use only<br><span class="dashicons dashicons-phone"></span> <?php the_field( 'phone_number', $author ); ?></p>
            <?php endif; ?>

            <?php if( get_field('linkedin', $author) ): ?>
                <a class="hr-btn btn logo-btn" href="<?php the_field( 'linkedin', $author ); ?>"><img src="http://intranet.hbhtherapy.com/wp-content/uploads/2022/09/Linkedin-logo-png.png" /></a>
            <?php endif; ?>

        </div>
        
        <div class="single-content">
            
            <!------------- Bio Content -------------> 
            
        <p class="clinician-subtitle">About Me</p>
            <hr>    
            
         <p><?php the_field( 'about_me', $author); ?></p>

            
        </div>

    </div>
</div>