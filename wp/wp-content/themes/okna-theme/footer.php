<?php
/**
 * The footer for our theme
 * @package Bar Restaurant
 */
 $footer_widget_style = esc_html(get_theme_mod('footer_widget_style',3)); 
 $hide_widget_area = esc_html(get_theme_mod('hide_widget_area',1));
 if($hide_widget_area != 2) : ?>
<footer id="main-footer2">
    <div class="container">
        <div class="row">
            <?php  $footer_widget_style = $footer_widget_style+1;
            $footer_column_value = floor(12/($footer_widget_style)); ?>
            <?php $k = 1; ?>
                <?php for( $i=0; $i<$footer_widget_style; $i++) { ?>
                <?php if (is_active_sidebar('footer-'.$k)) { ?>
                    <div class="col-md-<?php echo esc_attr($footer_column_value); ?> col-sm-<?php echo esc_attr($footer_column_value); ?> col-xs-12 footer-column">
                        <?php dynamic_sidebar('footer-'.$k); ?>
                    </div>
                <?php }
                    $k++;
                } ?>
        </div>
    </div>
</footer>
<?php endif; ?>             
<footer id="main-footer1">
    <div class="container-fluid">
        <div class="row">
            <div class="copyright">
                <div class="container">
                <?php if(get_theme_mod('footer_menu') != '') : ?>
                    <div class="row">
                       <div class="footer-menu">
                        <?php $bar_restaurant_menu_arguments = array('menu' => get_theme_mod('footer_menu'),
                          'container_class' => 'footer-menu',
                          'items_wrap' => '<ul id="%1$s" class="">%3$s</ul>');
                          wp_nav_menu($bar_restaurant_menu_arguments); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="footer-copyrights">
                            <div class="footer-social-links">
                                <ul class="list-inline">
                                <?php for($i=1;$i<=10;$i++): 
                                if(get_theme_mod('bar_restaurant_social_icon'.$i) != '' && get_theme_mod('bar_restaurant_social_iconLink'.$i) != ''){ ?>    
                                    <li><a href="<?php echo esc_url(get_theme_mod('bar_restaurant_social_iconLink'.$i)); ?>"><i class="fa <?php echo esc_attr(get_theme_mod('bar_restaurant_social_icon'.$i)); ?>"></i></a></li>
                                <?php } endfor; ?>
                                </ul>
                            </div>
                            <?php if(get_theme_mod('copyright_area_text') != '') : ?>
                                <p><?php echo wp_kses_post(get_theme_mod('copyright_area_text')); ?></p>
                            <?php endif; ?>
                            <p><?php esc_html_e('Powered By ','bar-restaurant'); ?><a href="<?php echo esc_url('https://voilathemes.com/wordpress-themes/bar-restaurant/','bar-restaurant'); ?>"><?php esc_html_e('Bar Restaurant WordPress Theme','bar-restaurant'); ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div></div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>