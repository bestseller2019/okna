<?php
/**
 * Bar Restaurant Enqueues scripts and styles.
 *
 * @package Bar Restaurant 
 */
function bar_restaurant_scripts() {
	wp_enqueue_style( 'bar-restaurant-google-font-ruthie', '//fonts.googleapis.com/css?family=Ruthie', array() );
	wp_enqueue_style( 'bar-restaurant-google-font-quicksand', '//fonts.googleapis.com/css?family=Quicksand', array() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array() );
	wp_enqueue_style( 'bar-restaurant-default-style', get_template_directory_uri() . '/css/default.css', array()  );
	wp_enqueue_script('jquery');
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), false, true );
	wp_enqueue_script('jquery-masonry');
	bar_restaurant_dynamic_styles();
}
add_action( 'wp_enqueue_scripts', 'bar_restaurant_scripts' );