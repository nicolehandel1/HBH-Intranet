<?php 
$author = get_queried_object();
?>
<div class="section clin-info-section">
    <div class="section-content clin-info-content">

        <div class="sidebar hr-sidebar">
            
            <p class="clinician-subtitle">Connect</p>
            <hr>
            
            <a class="sd-email" href="mailto:<?php echo $author->user_email; ?>"><span class="dashicons dashicons-email-alt2"></span><?php echo $author->user_email; ?></a>
            <a class="hr-btn btn" href="<?php the_field( 'linkedin' ); ?>"><img src="http://intranet.hbhtherapy.com/wp-content/uploads/2022/09/Linkedin-logo-png.png" /></a>

        </div>
        
        <div class="single-content">
            
            <!------------- Bio Content ------------->
            
        <p class="clinician-subtitle">About Me</p>
            <hr>    
            
         <p><?php the_field( 'about_me'); ?></p>

           
            
        </div>

    </div>
</div>