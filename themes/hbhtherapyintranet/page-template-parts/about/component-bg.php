<?php
$heroImageID = get_field('about_background_image'); 
$heroImage = wp_get_attachment_image_src( $heroImageID, 'full' ); 
$heroAlt_text = get_post_meta($heroImageID , '_wp_attachment_image_alt', true); 
?>
<div class="section-content">
       <div class="butterfly-img-wrap"><img src="<?php echo $heroImage[0]; ?>" alt="<?php echo $heroAlt_text; ?>" width="100%" height="100%"></div>
</div>