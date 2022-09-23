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

<style>
    .site-info {
        background-color: #334954;
        width: 100%;
    }

    .footer-section {
        padding: 100px 50px 50px 50px;
        font-size: 16px;
    }

    .footer-logo-container {
        display: flex;
        flex-wrap: wrap;
        width: 25%;
    }

    .footer-logo {
        width: auto;
        height: 81px;
    }

    .footer-container {
        display: flex;
        flex-wrap:wrap;
        align-items: flex-end;
        padding: 50px 0 20px 0;
    }

    .footer-content {
        width: 50%;
    }
    
    .ftlocations {
        columns: 2 auto;
    }
    
    .ft-location {
        margin-bottom: 25px;
    }
    
    .ftinfo {
        display: flex;
        flex-wrap:wrap;
        align-items: flex-end;
        padding-left: 50px;
    }
    
    .ft-info {
        width: 50%;
        margin-bottom: 25px;
    }

    .footer-content h4 {
        color: #7BBEB6;
        font-weight: 800;
        margin: 0 0 5px 0;
    }
    
    .ft-titlink:hover {
        color: #fff;
    }
    
    .ftphone {
        display: block;
        color: #FAF8F4;
    }
    
    .ftaddress {
        margin-top: 5px;
        color: #FAF8F4;
    }
    
    .ft-social {
        font-size: 30px;
        display: flex;
        justify-content: flex-end;
    }
    
    .ftsocial {
        padding-left: 20px;
    }
    
    a.ftsocial {
        color: #fff;
    }
    
    a.ftsocial:hover {
        color: #7BBEB6;
    }

    .copy-privacy hr {
        background-color: #7BBEB6;
    }

    .copy-privacy p,
    .copy-privacy li {
        color: #7BBEB6;
    }

    .copy-privacy ul {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin: -0.5rem -2.5rem;
        white-space: nowrap;
    }

    .copy-privacy li {
        -ms-flex-align: center;
        align-items: center;
        display: -ms-flexbox;
        display: flex;
        line-height: 1;
        padding: 0.5rem 0;
    }

    .copy-privacy li:not(:last-child):after {
        content: "|";
        font-size: 12px;
        padding: 0 13px;
    }

    @media only screen and (max-width: 1065px) {
        .footer-logo-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        width: 100%;
        }

        .footer-container {
        width: 100%;
        text-align: center;
        }

        .footer-content {
        width: 100%;
        }
        
        .ftinfo {
            padding-left: 0px;
        }
          
        .ft-social {
            justify-content: center;
        }

        .ftsocial {
        padding: 15px;
        }

    }
    
    @media (max-width: 800px) {
        .footer-section {
            padding: 100px 10px 50px 10px;
        }
        
        .ftlocations {
            columns: 1;
        }
        
        .ftinfo {
            columns: 1;
        }
        
        .ft-info {
            width: 100%;
        }
        
        .copy-privacy ul {
            -ms-flex-direction: column;
            flex-direction: column;
            padding: 0;
            margin: 1rem 0 3rem;
        }

        .copy-privacy li {
            justify-content: center;
        }

        .copy-privacy li:after {
            display: none;
        }

        .copy-privacy p {
            text-align: center;
        }
    }
</style>

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
                            <a href="<?php echo esc_url( $location_page_link); ?>"><h4 class="ft-titlink"><?php the_sub_field( 'location_name' ); ?></h4></a>
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
                            <?php $career_page_link = get_field( 'career_page_link', 'option' ); ?>
                                <?php if ( $career_page_link ) : ?>
                                <a href="<?php echo esc_url( $career_page_link); ?>"><h4 class="ft-titlink" style="margin-top: 25px;">Careers</h4></a>
                                <a class="ftphone" href="mailto:<?php the_field( 'careers_email', 'option' ); ?>"><?php the_field( 'careers_email', 'option' ); ?></a>
                                <?php endif; ?>
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
                    <?php $privacy_page_link = get_field( 'privacy_page_link', 'option' ); ?>
                    <li><a href="<?php echo esc_url( $privacy_page_link); ?>">Privacy Policy & Terms of Use</a></li>
                    <li><a href="<?php the_field( 'sitemap_link', 'option' ); ?>" target="_blank">Sitemap</a></li>
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