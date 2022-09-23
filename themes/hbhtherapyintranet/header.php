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
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NQ4TKDH');</script>
    <!-- End Google Tag Manager -->
    
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
    
    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '394515039158653');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=394515039158653&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->

    <?php wp_head(); ?>
</head>

    <body <?php body_class(); ?>>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NQ4TKDH"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'hbhtherapy' ); ?></a>

        <div class="section-wrapper bg-about"><?php get_template_part( 'page-template-parts/about/component', 'bg');?></div>
        <div class="section-wrapper bg-clinicians"><?php get_template_part( 'page-template-parts/clinicians/component', 'bg');?></div>
        
        <div class="section-wrapper"></div>

        <header id="masthead" class="site-header">

            <div class="nav-container">
                <div class="hbh-nav-container">
                    <div class="site-branding">
                        <a href="/"><img src="<?php the_field( 'header_desktop_logo', 'option' ); ?>" data-rjs="2" alt="HBH Logo"></a>
                    </div><!-- .site-branding -->

                    <a class="phone" href="tel:<?php the_field( 'header_phone_number_link', 'option' ); ?>"><?php the_field( 'header_phone_number', 'option' ); ?></a>

                    <div class="site-menu" href="javascript:void(0);"  onclick="navToggle()">
                        <p class="menu-label">menu</p>
                        <nav id="myNav" class="main-navigation">
                            <a class="menu-btn" >
                                <div class="hamburger">
                                    <div class="nav-bar one"></div>
                                    <div class="nav-bar two"></div>
                                    <div class="nav-bar three"></div>
                                </div>
                            </a>
                            <!-- Button to close the overlay navigation -->
                        </nav><!-- #site-navigation -->
                    </div>
                </div>
            </div>

            <!-- Overlay content -->
            <div class="menu-right">
            <div class="menu-section-wrap" id="menu">
                <div class="menu-content" style="background-image: url(<?php the_field( 'main_menu_image', 'option' ); ?>)";>
                    <div class="menu" id="menu-content">
                        <a href="javascript:void(0);" class="menu-btn" onclick="navToggle()">
                                <div class="hamburger">
                                    <div class="nav-bar one-active"></div>
                                    <div class="nav-bar two-active"></div>
                                    <div class="nav-bar three-active"></div>
                                </div>
                            </a>
                        <div class="hbhmenu">
                            <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            )
                        );
                    ?>
                        </div>
                    </div>
                </div>
            </div>
                </div>

        </header><!-- #masthead -->