<?php
/**
 * The header of our theme
 * @package Bar Restaurant
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>
<body <?php body_class();?>>
    <div class="preloader"><span class="preloader-gif"></span></div>
    <header class="header">
    <?php  ?>
        <!-- Header with Brand -->
        <nav class="navbar-fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 top-menu">
                        <div class="logo-description">
                            <div class="header-logo">
                                <?php if( has_custom_logo() ) { ?>                            
                                    <?php the_custom_logo(); ?>                            
                                <?php }
                                $scroll_logo=get_theme_mod('scroll_logo');
                                $scroll_logo=wp_get_attachment_url($scroll_logo); 
                                if($scroll_logo == ''){
                                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                                    $scroll_logo = wp_get_attachment_url( $custom_logo_id , 'full' );
                                }
                                if($scroll_logo != ''){ ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home" itemprop="url">
                                        <img class="img-responsive logo-dark" src="<?php echo esc_url($scroll_logo); ?>" alt="<?php esc_attr_e('Logo','bar-restaurant'); ?>">
                                    </a>
                                <?php } ?>
                            </div>
                            <?php if(get_theme_mod('header_text')):?>
                                <div class="header-text">
                                    <?php echo '<a href='.esc_url( home_url( '/' ) ).' title='.esc_attr( get_bloginfo( 'name', 'display' ) ).' rel="home"><h3 class="site-title logo-box">'.esc_html(get_bloginfo('name')).'</h3><span class="site-description">'.esc_html(get_bloginfo('description')).'</span></a>'; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div id="cssmenu">
                          <?php $defaults = array(
                                'theme_location' => 'primary',
                                'container'      => 'ul', 
                            );
                            wp_nav_menu($defaults); ?> 
                        </div>   
                    </div>
                </div>
            </div>
        </nav>
    </header>