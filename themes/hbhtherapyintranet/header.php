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
.site-header {
    width: 100%;
}
    
.subnav-wrap {
    width: 100%;
    background: #334954;
    }
    
.nav-wrap {
    width: 100%;
    background: #f5efe9;
    padding-top: 20px;
    }

.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    max-width: 1680px;
    margin: 0 auto;
    padding: 10px 16px;
}
    
.main-site-branding {
    display: flex;
    height: 2rem;     
} 
    
.subhead-logo:hover {
    opacity: .5;    
}    
    
.hd-social {
    font-size: 25px;
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
}   
    
a.hdsocial {
    padding-left: 15px;
    color: #008587;
}
    
a.hdsocial {
    padding-left: 20px;
    color: #7BBEB6;
}
    
span {
    color: #7BBEB6;
}    

.site-branding {
    display: flex;
    align-items: baseline;
    height: 5.5rem; 
    color: #008587; 
}

.site-menu {
    display: flex;
    justify-content: flex-end;
}

.caret {
    font-size: 15px;
    padding-left: 15px;
}

.nav-container a.phone {
    margin-bottom: 0px;
    margin-right: 83px;
}

@media only screen and (max-width: 800px) {

    .nav-container {
        height: 3.5rem;
    }

    .nav-container a.phone {
        margin: 0px 50px;
        letter-spacing: 0;
        font-size: 14px;
    }
    .menu-label {
        display: none;
    }
}

.main-navigation {
    display: block;
    width: 100%;
}

.main-navigation ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding-left: 0;
}

.main-navigation ul ul {
    box-shadow: 0 3px 3px rgba(0, 0, 0, 0.2);
    float: left;
    position: absolute;
    top: 100%;
    left: -999em;
    z-index: 99999;
}

.main-navigation ul ul ul {
    left: -999em;
    top: 0;
}

.main-navigation ul ul li:hover > ul,
.main-navigation ul ul li.focus > ul {
    display: block;
    left: auto;
}

.main-navigation ul ul a {
    width: 200px;
}

.main-navigation ul li:hover > ul,
.main-navigation ul li.focus > ul {
    left: auto;
}

.main-navigation li {
    position: relative;
    padding: 0 10px;
    font-size: 22px;
}

.main-navigation a {
    display: block;
    color: #008587;
    text-decoration: none;
}  
    
.main-navigation a:visited {
    color: #008587;
}
    
.main-navigation a:hover {
    color: #F7931E;
}      

.site-main .comment-navigation,
.site-main .posts-navigation,
.site-main .post-navigation {
    margin: 0 0 1.5em;
}

.comment-navigation .nav-links,
.posts-navigation .nav-links,
.post-navigation .nav-links {
    display: flex;
}

.comment-navigation .nav-previous,
.posts-navigation .nav-previous,
.post-navigation .nav-previous {
    flex: 1 0 50%;
}

.comment-navigation .nav-next,
.posts-navigation .nav-next,
.post-navigation .nav-next {
    text-align: end;
    flex: 1 0 50%;
}
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
                    <span class="" style="padding-right: 10px;"><?php global $current_user; wp_get_current_user(); if ( is_user_logged_in() ) { echo  $current_user->display_name; } else { wp_loginout(); } ?> - </span>
                    <a class="" style="padding-right: 10px;" href="/wp-login.php?loggedout=true&wp_lang=en_US">Logout</a>
                    <a class="" href="/wp-admin/">Backend</a>
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