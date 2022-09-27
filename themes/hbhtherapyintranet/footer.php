<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HBH_Therapy
 */

?>
<footer id="colophon" class="site-footer">
    <div class="section-wrapper home-srv-wrap site-info">
        <div class="section-content footer-section">

            <div class="">
                <div class="footer-logo-container"><img class="footer-logo" src="<?php the_field( 'footer_logo', 'option' ); ?>" alt="HBH Logo"></div>

                <!-- Column One -->
                <div class="footer-container">
                    
                    <div class="footer-content ftlocations">
                        
                        <?php if ( have_rows( 'footer-locations', 'option' ) ) : while ( have_rows( 'footer-locations', 'option' ) ) : the_row(); 
                            $location_page_link = get_sub_field( 'location_page_link' ); ?>
                        
                        <address class="ft-location">
                            <h4 class="ft-titlink"><?php the_sub_field( 'location_name' ); ?></h4>
                            <a class="ftphone" href="tel:<?php the_sub_field( 'phone_link' ); ?>;"><?php the_sub_field( 'phone_label' ); ?></a>
                            <p class="ftaddress"><?php the_sub_field( 'address' ); ?></p>
                        </address>
                        
                        <?php endwhile;  else :  endif; ?>
                        
                    </div>
                    
                    <div class="footer-content ftinfo">
                        <div class="ft-info">
                            <h4>Shop</h4>
                            <a class="ftphone" href="<?php the_field( 'store_link', 'option' ); ?>" target="_blank"><?php the_field( 'store-label', 'option' ); ?></a>
                            <h4 class="ft-titlink" style="margin-top: 25px;">Contact</h4>
                            <a class="ftphone" href="tel:<?php the_field( 'contact_phone_link', 'option' ); ?>;"><?php the_field( 'contact_phone_label', 'option' ); ?></a>
                            <a class="ftphone" href="mailto:<?php the_field( 'contact_email', 'option' ); ?>"><?php the_field( 'contact_email', 'option' ); ?></a>
                            
                        </div>
                        <div class="ft-info ft-social">
                            <a href="<?php the_field( 'facebook_link', 'option' ); ?>" target="_blank" class="ftsocial"><i class="fab fa-facebook-f" alt="Facebook share link"></i></a>
                            <a href="<?php the_field( 'instagram_link', 'option' ); ?>" target="_blank" class="ftsocial"><i class="fab fa-instagram" alt="Twitter share link"></i></a>
                            <a href="<?php the_field( 'linkedin_link', 'option' ); ?>" target="_blank" class="ftsocial"><i class="fab fa-linkedin-in" alt="LinkedIn share link"></i></a>
                        </div>
                    </div> 

                </div>
            </div>
            
            <div class="copy-privacy">
                <hr>
                <ul>
                    <li><a href="<?php the_field( 'privacy_page_link', 'option' ); ?>">www.hbhbtherapy.com</a></li>
                    <li>&copy; <?php echo date("Y"); ?> Handel Behvioral Health</li>
                </ul> 

                <p><?php the_field( 'subtext', 'option' ); ?></p>
            </div>

        </div>
    </div> <!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>

</html>