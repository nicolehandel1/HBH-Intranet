<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HBH_Therapy
 */

?>

<style>

</style>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://use.typekit.net/gzp8yat.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta property="og:title" content="<?php the_title() ?>"/>
    <meta property="og:image" content="<?php the_post_thumbnail() ?>"/>
    <meta property="og:url" content="<?php the_permalink(); ?>"/>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-CONVERSION_ID"></script>
    <script>

    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'AW-CONVERSION_ID');
    gtag('config', 'UA-227614035-1');
    </script>

    <?php wp_head(); ?>
</head>

    <body <?php body_class(); ?>>
        
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'hbhtherapy' ); ?></a>

        <header id="masthead" class="site-header">
            
            <div class="subnav-wrap"><div class="nav-container">
                
                <div class="main-site-branding">
                    <a class="subhead-logo" href="https://hbhtherapy.com/"><img src="<?php the_field( 'subhead-logo', 'option' ); ?>" alt="HBH Logo"></a>
                    <div class="hd-social">
                        <a href="<?php the_field( 'facebook_link', 'option' ); ?>" target="_blank" class="hdsocial"><i class="fab fa-facebook-f" alt="Facebook share link"></i></a>
                        <a href="<?php the_field( 'instagram_link', 'option' ); ?>" target="_blank" class="hdsocial"><i class="fab fa-instagram" alt="Twitter share link"></i></a>
                        <a href="<?php the_field( 'linkedin_link', 'option' ); ?>" target="_blank" class="hdsocial"><i class="fab fa-linkedin-in" alt="LinkedIn share link"></i></a>
                    </div>
                </div><!-- .site-branding -->
                
                <div class="site-menu">
                    <span class="subhead-user" style="padding-right: 10px;"><?php global $current_user; wp_get_current_user(); if ( is_user_logged_in() ) { echo  $current_user->display_name; } else { wp_loginout(); } ?> - </span>
                    <a class="" style="padding-right: 10px;" href="/wp-admin/">Edit</a>
                    <a class="" href="/wp-login.php?loggedout=true&wp_lang=en_US">Logout</a>
                </div>
                
            </div></div>

            <div class="nav-wrap"><div class="nav-container">
   
                    <div class="site-branding">
                        <a href="/"><img src="<?php the_field( 'header_desktop_logo', 'option' ); ?>"  alt="HBH Logo"></a>
                        <h1 style="padding-left: 5px;"><?php echo get_bloginfo( 'name' ); ?></h1>
                    </div><!-- .site-branding -->


                    <div class="site-menu">
                        <nav id="myNav" class="main-navigation">
                            <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                                'orderby' => 'menu_order',
                            )
                        );
                    ?>
                            <!-- Button to close the overlay navigation -->
                        </nav><!-- #site-navigation -->
                    </div> 

                </div></div>

        </header><!-- #masthead -->