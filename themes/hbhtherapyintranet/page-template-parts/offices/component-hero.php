<?php 
$officeBg =  get_field( 'office_header_image');
?>
<style>
    .ofchero-wrap {
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-color: #008587;
        width: 100%;
        height: auto;
    }
    .office-hero-info {
        width: 40%;
        height: auto;
        margin: 10%;
        padding: 60px;
        border-radius: 3px;
        background-color: rgba(255, 255, 255, .85);
        transition: .25s ease;
    }
    .office-title {
        color: #008587;
        margin: 0px 0px 80px 0px;
    }
    .office-details {
        font-weight: 800;
        margin-bottom: 10px;
    }
    
@media only screen and (max-width: 1300px) {

}

@media only screen and (max-width: 1100px) {

}

@media only screen and (max-width: 800px) {
    a.office-phone {
        text-align: left;
    }
    .office-hero-info {
        width: 90%;
        margin: 5%;
        padding: 25px;
    }
    .office-hero-info {
        background-color: rgba(255, 255, 255, .9);
    }
    .office-title {
        margin: 0px 0px 25px 0px;
    }
}
</style>
<div class="">

    <div class="section-content single-hero-content ofchero-wrap" style="background-image: url('<?php echo $officeBg ; ?>');">

            <div class="office-hero-info">
                <h2 class="office-title"><?php the_field( 'page_title' ); ?></h2>
                <address class="office-details"><?php the_field( 'address' ); ?></address>
                <p class="office-details"><?php the_field( 'hours' ); ?></p>
                <a class="phone office-phone" href="tel:<?php the_field( 'phone_link' ); ?>"><?php the_field( 'phone_label' ); ?></a>
                
                <?php $button_link = get_field( 'button_link' );  if ( $button_link ) : ?>
                <a class="btn" href="<?php echo esc_url( $button_link); ?>"><?php the_field( 'button_label' ); ?></a>
                <?php endif; ?>
                
            </div>

    </div>
</div>