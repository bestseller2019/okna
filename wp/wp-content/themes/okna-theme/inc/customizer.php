<?php
/**
 * Bar Restaurant Theme Customizer.
 *
 * @package Bar Restaurant
 */
function bar_restaurant_sanitize_select( $input, $setting ) {
  // Ensure input is a slug.
  $input = sanitize_key( $input );
  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;  
  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
/**
* Bar Restaurant Customization options
**/
//get categories
function bar_restaurant_menu_list(){
  $bar_restaurant_menu = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
  $bar_restaurant_menus[''] = esc_html__('Select','bar-restaurant');
  foreach ( $bar_restaurant_menu as $menu ):
    $bar_restaurant_menus[$menu->name] = $menu->name;
  endforeach;
  return $bar_restaurant_menus;
}
function bar_restaurant_customize_register( $wp_customize ) {
  $wp_customize->add_panel(
    'general',
    array(
        'title' => esc_html__( 'General', 'bar-restaurant' ),
        'description' => esc_html__('styling options','bar-restaurant'),
        'priority' => 20, 
    )
  );
  /*----------------404 page------------*/
  $wp_customize->add_section(
    'bar_restaurant_404_page',
    array(
      'title' => esc_html__('404 Page Option', 'bar-restaurant'),
      'priority' => 120,
      'description' => ''
    )
  );
  $wp_customize->add_setting( '404_heading_text', array(
        'default'        => esc_html__('404 Page Not Found','bar-restaurant'),
        'sanitize_callback' => 'sanitize_text_field',
        'capability'     => 'edit_theme_options',
    ) );
    $wp_customize->add_control( '404_heading_text', array(
            'label'   => esc_html__('Title','bar-restaurant'),
            'section' => 'bar_restaurant_404_page',
            'type'    => 'text',
        ) );
    $wp_customize->add_setting(
        '404_desc',
        array(
            'default' => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.','bar-restaurant'),
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'wp_kses_post',
            'priority' => 20, 
        )
    );
    $wp_customize->add_control(
        '404_desc',
        array(
            'section' => 'bar_restaurant_404_page',                
            'label'   => esc_html__('Enter Description','bar-restaurant'),
            'type'    => 'textarea',
        )
    );
  /*-----------------end 404 page---------*/
   //All our sections, settings, and controls will be added here
  $wp_customize->add_section(
    'bar_restaurant_social_links',
    array(
      'title' => esc_html__('Social Accounts', 'bar-restaurant'),
      'priority' => 120,
      'description' => balanceTags( 'In first input box, you need to add FONT AWESOME shortcode which you can find <a target="_blank" href="https://fontawesome.bootstrapcheatsheets.com/">here</a> and in second input box, you need to add your social media profile URL.<br /> Enter the URL of your social accounts. Leave it empty to hide the icon.' , true),
      'panel' => 'footer'
    )
  );
  $wp_customize->get_section('title_tagline')->panel = 'general'; 
  $wp_customize->get_section('static_front_page')->panel = 'general';

  $bar_restaurant_social_icon = array();
  for($i=1;$i <= 10;$i++):
  $bar_restaurant_social_icon[] =  array( 'slug'=>sprintf('bar_restaurant_social_icon%d',$i),
   'default' => '',
   'label' => sprintf(/* translators: %s is count */esc_html__( 'Social Account %s', 'bar-restaurant' ),$i),
   'priority' => sprintf('%d',$i) );
  endfor;
  foreach($bar_restaurant_social_icon as $bar_restaurant_social_icons){
    $wp_customize->add_setting(
        $bar_restaurant_social_icons['slug'],
        array(
          'default' => '',
          'capability'     => 'edit_theme_options',
          'type' => 'theme_mod',
          'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        $bar_restaurant_social_icons['slug'],
        array(
            'section' => 'bar_restaurant_social_links',
            'label'      =>   $bar_restaurant_social_icons['label'],
            'priority' => $bar_restaurant_social_icons['priority']
        )
    );
  }
$bar_restaurant_social_iconLink = array();
for($i=1;$i <= 10;$i++):
  $bar_restaurant_social_iconLink[] =  array( 'slug'=>sprintf('bar_restaurant_social_iconLink%d',$i),
   'default' => '',
   'label' => sprintf(/* translators: %s is count */esc_html__( 'Social Link %s', 'bar-restaurant' ),$i),
   'priority' => sprintf('%d',$i) );
  endfor;
  foreach($bar_restaurant_social_iconLink as $bar_restaurant_social_icons){
    $wp_customize->add_setting(
        $bar_restaurant_social_icons['slug'],
        array(
            'default' => '',
            'capability'     => 'edit_theme_options',
            'type' => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        $bar_restaurant_social_icons['slug'],
        array(
            'section' => 'bar_restaurant_social_links',
            'priority' => $bar_restaurant_social_icons['priority']
        )
    );
}
/*
*Multiple logo upload code
*/
$wp_customize->add_setting(
    'preloader',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bar_restaurant_sanitize_select',
        'priority' => 20, 
    )
);
$wp_customize->add_section( 'preloaderSection' , array(
    'title'       => esc_html__( 'Preloader', 'bar-restaurant' ),
    'priority'    => 32,
    'capability'     => 'edit_theme_options',
    'panel' => 'general'
) );
$wp_customize->add_control(
    'preloader',
    array(
        'section' => 'preloaderSection',                
        'label'   => esc_html__('Preloader','bar-restaurant'),
        'type'    => 'radio',
        'choices'        => array(
            "1"   => esc_html__( "On", 'bar-restaurant' ),
            "2"   => esc_html__( "Off", 'bar-restaurant' ),
        ),
    )
);
$wp_customize->add_setting('header_fix', array(
        'default' => false,  
        'sanitize_callback' => 'sanitize_text_field',
));
$wp_customize->add_control('header_fix', array(
    'label'   => esc_html__('Header Fix','bar-restaurant'),
    'section' => 'title_tagline',
    'type'    => 'checkbox',
    'priority' => 20
));
/*------Scroll Logo Option---------*/
$wp_customize->add_setting(
    'scroll_logo',
    array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'scroll_logo', array(
    'section'     => 'title_tagline',
    'label'       => __( 'Upload Scroll Logo' ,'bar-restaurant'),
    'description' => __('Logo Size (120 * 60)','bar-restaurant'),
    'flex_width'  => true,
    'flex_height' => true,
    'width'       => 120,
    'height'      => 50,
    'priority'    => 19,
    'default-image' => '',
) ) );
$wp_customize->add_setting(
  'logo_height',
  array(
    'default' => '',
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'absint',
    )
  );
$wp_customize->add_control(
  'logo_height',
  array(
    'section' => 'title_tagline',
    'label'      => __('Enter Logo Size', 'bar-restaurant'),
    'description' => __("Use if you want to increase or decrease logo size (optional) Don't include `px` in the string. e.g. 20 (default: 10px)",'bar-restaurant'),
    'type'       => 'text',
    'priority'    => 21,
    )
  );
//Remove Background Image Section
$wp_customize->get_section('background_image')->panel = 'general';
$wp_customize->add_setting(
    'theme_color',
    array(
        'default' => '#8C001A',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'theme_color',
    array(
        'label'      => esc_html__('Theme Color ', 'bar-restaurant'),
        'section' => 'colors',
        'priority' => 10
    )
  )
);
$wp_customize->add_setting(
  'secondary_color',
  array(
      'default' => '#02111B',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
  new WP_Customize_Color_Control(
    $wp_customize,
    'secondary_color',
    array(
        'label'      => esc_html__('Secondary Color', 'bar-restaurant'),
        'section' => 'colors',
        'priority' => 11
    )
  )
);
//Footer Section
$wp_customize->add_panel(
    'footer',
    array(
        'title' => esc_html__( 'Footer', 'bar-restaurant' ),
        'description' => esc_html__('Footer options','bar-restaurant'),
        'priority' => 105, 
    )
);
$wp_customize->add_section( 'footer_widget_area' , array(
    'title'       => esc_html__( 'Footer Widget Area', 'bar-restaurant' ),
    'priority'    => 135,
    'capability'     => 'edit_theme_options',
    'panel' => 'footer'
) );


$wp_customize->add_section( 'footer_copyright' , array(
    'title'       => esc_html__( 'Footer Copyright Area', 'bar-restaurant' ),
    'priority'    => 135,
    'capability'     => 'edit_theme_options',
    'panel' => 'footer'
) );
$wp_customize->add_setting(
    'hide_widget_area',
    array(
        'default' => '1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bar_restaurant_sanitize_select',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'hide_widget_area',
    array(
        'section' => 'footer_widget_area',                
        'label'   => esc_html__('Hide Copyright Section','bar-restaurant'),
        'type'    => 'select',
        'choices'        => array(
          "1"   => esc_html__( "Show", 'bar-restaurant' ),
          "2"   => esc_html__( "Hide", 'bar-restaurant' ),
        ),
    )
);
$wp_customize->add_setting(
  'footer_widget_style',
  array(
      'default' => '3',
      'capability'     => 'edit_theme_options',
      'sanitize_callback' => 'bar_restaurant_sanitize_select',
      'priority' => 20, 
  )
);
$wp_customize->add_control(
  'footer_widget_style',
  array(
      'section' => 'footer_widget_area',                
      'label'   => esc_html__('Select Widget Area','bar-restaurant'),
      'type'    => 'select',
      'choices'        => array(
          "1"   => esc_html__( "2 column", 'bar-restaurant' ),
          "2"   => esc_html__( "3 column", 'bar-restaurant' ),
          "3"   => esc_html__( "4 column", 'bar-restaurant' )
      ),
  )
);
$wp_customize->add_setting(
    'footer_menu',
    array(
        'default' => 'style1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'bar_restaurant_sanitize_select',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'footer_menu',
    array(
        'section' => 'footer_copyright',
        'label'   => esc_html__('Choose Footer Menu','bar-restaurant'),
        'type'    => 'select',
        'choices' => bar_restaurant_menu_list(),
    )
);
$wp_customize->add_setting(
    'copyright_area_text',
    array(
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'wp_kses_post',
        'priority' => 20, 
    )
);
$wp_customize->add_control(
    'copyright_area_text',
    array(
        'section' => 'footer_copyright',                
        'label'   => esc_html__('Enter Copyright Text','bar-restaurant'),
        'type'    => 'textarea',
    )
);

}
add_action( 'customize_register', 'bar_restaurant_customize_register' );

function bar_restaurant_dynamic_styles(){
  wp_enqueue_style( 'bar-restaurant-style', get_stylesheet_uri() );
  $custom_css = '';
  if(get_theme_mod('preloader') == 2) : 
     $custom_css.= ".preloader .preloader-custom-gif, .preloader .preloader-gif{background:none !important;}";
  endif;
  $custom_css.= ".admin-bar .header .navbar-top{top:0;}.blog-sidebar .widget ul li a:hover,.blog-content-left a, #breadcrumbs li.item-current, #breadcrumbs a:hover, .bloginner-content-part .title-data h2, .blog-sidebar aside h3, .blog-sidebar .widget ul li:hover:before, .meta-nav-prev, .meta-nav-next, .meta-nav-next:hover, .meta-nav-prev:hover, .blog-single-inner-page p a:hover, .comment-metadata a, .reply a:hover, .reply a:focus, .reply a:active, .widget_rss .widget-title a.rsswidget{ color : ".esc_attr(get_theme_mod('theme_color','#8C001A'))."; }.bloginner-content-part ul li a { color : ".esc_attr(get_theme_mod('theme_color','#8C001A'))."; }textarea:focus ~ label, .widget .tagcloud a:hover{ color : ".esc_attr(get_theme_mod('theme_color','#8C001A'))."; }input:focus ~ label, input:valid ~ label, input[type=submit]:hover, #wp-calendar tfoot td a, .blog-title h2{ color : ".esc_attr(get_theme_mod('theme_color','#8C001A'))."; }.page-numbers.current, a.page-numbers:hover,.leave-reply-form p.form-submit:hover, .leave-reply-form p.form-submit:focus,.leave-reply-form p.form-submit:active,button, .header .navbar-fixed-top, .reply a, input[type=submit], .tagcloud a, #main-footer1, .footer-widget #wp-calendar #today,.home .header .navbar-top-scroll{ background : ".esc_attr(get_theme_mod('theme_color','#8C001A'))."; }input:focus,textarea:focus, .meta-nav-next:hover, .meta-nav-prev:hover, .reply a:hover, .reply a:focus, .reply a:active, input[type=submit]:hover, .widget .tagcloud a:hover{border-color: ".esc_attr(get_theme_mod('theme_color','#8C001A'))."; }#blog-innerpage-content .bloginner-content-part blockquote{ border-color : ".esc_attr(get_theme_mod('theme_color','#8C001A  '))."; }.search-form .screen-reader-text{ color : ".esc_attr(get_theme_mod('theme_color','#8C001A'))."; }.default-feature-image{ background : ".esc_attr(get_theme_mod('theme_color','#8C001A'))."; border: 1px solid ".esc_attr(get_theme_mod('theme_color','#8C001A'))."; }   .blog-sidebar input:focus { border-color: ".esc_attr(get_theme_mod('theme_color','#8C001A'))."; }a:focus, a:hover,button.search-submit{ color: ".esc_attr(get_theme_mod('theme_color','#8C001A'))."; }.blog-sidebar #today,#cssmenu ul ul li a{ background : ".esc_attr(get_theme_mod('theme_color','#8C001A')).";} button, #main-footer2, .blog-image-overlay, #cssmenu #menu-button{Background-color: ".esc_attr(get_theme_mod('secondary_color','#02111B')).";}.blog-sidebar th,.widget select,.blog-sidebar .widget ul li a,input, textarea{color: ".esc_attr(get_theme_mod('secondary_color','#02111B')).";}
    .blog-sidebar aside h3 {border-color: ".esc_attr(get_theme_mod('secondary_color','#02111B')).";}";
    $logo_height = (get_theme_mod('logo_height'))?(get_theme_mod('logo_height')):45;
    $custom_css.= ".navbar-fixed-top .header-logo img { max-height: ".esc_attr($logo_height)."px;   }";
    $custom_css.= ".header-logo a, #breadcrumbs a, #breadcrumbs .separator, .bloginner-content-part ul li a:hover, .bloginner-content-part .title-data ul li, .blog-sidebar .widget ul li:before, .blog-single-inner-page p a, .comment-metadata a:hover, #wp-calendar tfoot td a:hover {color: ".esc_attr(get_theme_mod('secondary_color','#02111B')).";";
    
  wp_add_inline_style( 'bar-restaurant-style', $custom_css );  
  wp_enqueue_script( 'bar-restaurant-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), false, true );

  $header_fix = get_theme_mod('header_fix',0);
  $script_js = '';
  if($header_fix == 0){
      $script_js.="jQuery(window).scroll(function(){jQuery('.navbar-fixed-top').css('position', 'relative');jQuery('.navbar-fixed-top').addClass('navbar-top')});";
   }else{
     $script_js.="jQuery(window).scroll(function(){jQuery('.navbar-fixed-top').css('position', 'fixed'); if (jQuery(window).scrollTop()> 50) { jQuery('.navbar-fixed-top').addClass('navbar-top-scroll');} else{jQuery('.navbar-fixed-top').removeClass('navbar-top-scroll');} });";
   }
   wp_add_inline_script( 'bar-restaurant-custom', $script_js );
}
