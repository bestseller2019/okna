<?php
/**
 * Bar Restaurant theme's functions and definitions.
 *
 * @package Bar Restaurant
 */

require_once (get_template_directory() . '/inc/class-tgm-plugin-activation.php');
if ( ! function_exists( 'bar_restaurant_setup' ) ) :

function bar_restaurant_setup() {
	
	load_theme_textdomain( 'bar-restaurant', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
  ) );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus( array(
		'primary' => esc_html__( 'Top Header Menu', 'bar-restaurant' ),
	) );
	add_theme_support( 'html5' );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) );

  add_filter('siteorigin_widgets_active_widgets', 'bar_restaurant_active_widgets');
  function bar_restaurant_active_widgets($active){
    //Bundled Widgets
    $active['video'] = true;
    $active['testimonial'] = true;
    $active['simple-masonry'] = true;
    $active['slider'] = true;
    $active['cta'] = true;
    $active['contact'] = true;
    $active['features'] = true;
    $active['headline'] = true;
    $active['hero'] = true;
 
    return $active;
  }
}
endif;
add_action( 'after_setup_theme', 'bar_restaurant_setup' );

function bar_restaurant_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bar_restaurant_content_width', 640 );
}
add_action( 'after_setup_theme', 'bar_restaurant_content_width', 0 );

function bar_restaurant_custom_excerpt_Length( $length ) {
  if(is_admin()){
    return $length;
  }
  return 34;
}
add_filter( 'excerpt_length', 'bar_restaurant_custom_excerpt_Length', 999 );
function bar_restaurant_custom_excerpt_Length_more( $more ) {
  if(is_admin()){
    return $more;
  }
  return ' {...}';
}
add_filter( 'excerpt_more', 'bar_restaurant_custom_excerpt_Length_more' );
add_action( 'admin_menu', 'bar_restaurant_admin_menu');
function bar_restaurant_admin_menu( ) {
    add_theme_page( __('Pro Feature','bar-restaurant'), __('Bar Restaurant Pro','bar-restaurant'), 'manage_options', 'bar-restaurant-pro-buynow', 'bar_restaurant_pro_buy_now', 300 ); 
  
}
function bar_restaurant_pro_buy_now(){ ?>  
  <div class="business_consultant_plus_version">
  <a href="<?php echo esc_url('https://voilathemes.com/wordpress-themes/bar-restaurant-pro/'); ?>" target="_blank">
    <img src ="<?php echo esc_url(get_template_directory_uri().'/images/bar-restaurant-pro-features.png') ?>" width="100%" height="auto" />
  </a>
</div>
<?php }
/*
* TGM plugin activation register hook 
*/
add_action( 'tgmpa_register', 'bar_restaurant_action_tgm_plugin_active_register_required_plugins' );
function bar_restaurant_action_tgm_plugin_active_register_required_plugins() {
    if(class_exists('TGM_Plugin_Activation')){
      $plugins = array(
        array(
           'name'      => __('Page Builder by SiteOrigin','bar-restaurant'),
           'slug'      => 'siteorigin-panels',
           'required'  => false,
        ),
        array(
           'name'      => __('SiteOrigin Widgets Bundle','bar-restaurant'),
           'slug'      => 'so-widgets-bundle',
           'required'  => false,
        ),
        array(
           'name'      => __('Contact Form 7','bar-restaurant'),
           'slug'      => 'contact-form-7',
           'required'  => false,
        ),
      );
      $config = array(
        'default_path' => '',
        'menu'         => 'bar-restaurant-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'strings'      => array(
           'page_title'                      => __( 'Install Required Plugins', 'bar-restaurant' ),
           'menu_title'                      => __( 'Install Plugins', 'bar-restaurant' ),
           'installing'                      => /* translators: %s is plugin title */__( 'Installing Plugin: %s', 'bar-restaurant' ),            
           'plugin_activated'                => __( 'Plugin activated successfully.', 'bar-restaurant' ),
           'complete'                        => /* translators: %s is install plugins count. */__( 'All plugins installed and activated successfully. %s', 'bar-restaurant' ), 
           'nag_type'                        => 'updated'
        )
      );
      bar_restaurant( $plugins, $config );
    }
}
/**
 * wp enqueue style and script.
 */
require_once get_template_directory() . '/inc/enqueue-file.php';
require_once get_template_directory() . '/inc/widgets.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/breadcumbs.php';