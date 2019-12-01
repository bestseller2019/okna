<?php
/**
 * Bar Restaurant Theme Widgets.
 *
 * @package Bar Restaurant
 */
function bar_restaurant_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bar-restaurant' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here.', 'bar-restaurant' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'bar-restaurant' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here.', 'bar-restaurant' ),
		'before_widget' => '<aside id="%1$s" class="footer-widget widget widget_recent_entries %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'bar-restaurant' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here.', 'bar-restaurant' ),
		'before_widget' => '<aside id="%1$s" class="footer-widget widget widget_recent_entries %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          =>  __( 'Footer 3', 'bar-restaurant' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here.', 'bar-restaurant' ),
		'before_widget' => '<aside id="%1$s" class="footer-widget widget widget_recent_entries %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          =>  __( 'Footer 4', 'bar-restaurant' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here.', 'bar-restaurant' ),
		'before_widget' => '<aside id="%1$s" class="footer-widget widget widget_recent_entries %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bar_restaurant_widgets_init' );