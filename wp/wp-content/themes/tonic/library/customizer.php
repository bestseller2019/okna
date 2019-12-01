<?php
/**
 * Set up the default theme options
 *
 * @since 1.0.0
 */
function bavotasan_default_theme_options() {
	//delete_option( 'theme_mods_tonic' );
	return array(
		'width' => '',
		'layout' => '2',
		'primary' => 'c8',
		'tagline' => 'on',
		'display_author' => 'on',
		'display_date' => 'on',
		'display_comment_count' => 'on',
		'display_categories' => 'on',
		'excerpt_content' => 'excerpt',
		'home_posts' =>'on',
		'jumbo_headline_title' => 'Jumbo Headline!',
		'jumbo_headline_text' => 'Got something important to say? Then make it stand out by using the jumbo headline option and get your visitor&rsquo;s attention right away.',
		'jumbo_headline_button_text' => 'Call to Action',
		'jumbo_headline_button_link' => '#',
	);
}

function bavotasan_theme_options() {
	$bavotasan_default_theme_options = bavotasan_default_theme_options();

	$return = array();
	foreach( $bavotasan_default_theme_options as $option => $value ) {
		$return[$option] = get_theme_mod( $option, $value );
	}

	return $return;
}

class Bavotasan_Customizer {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'customize_register' ) );

		$mods = get_option( 'theme_mods_tonic' );
		if ( empty( $mods ) ) {
			add_option( 'theme_mods_tonic', get_option( 'tonic_theme_options' ) );
		}
	}

	/**
	 * Adds theme options to the Customizer screen
	 *
	 * This function is attached to the 'customize_register' action hook.
	 *
	 * @param	class $wp_customize
	 *
	 * @since 1.0.0
	 */
	public function customize_register( $wp_customize ) {
		$bavotasan_default_theme_options = bavotasan_default_theme_options();

		$wp_customize->add_setting( 'tagline', array(
			'default' => $bavotasan_default_theme_options['tagline'],
            'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );

		$wp_customize->add_control( 'tagline', array(
			'label' => __( 'Display Tagline', 'tonic' ),
			'section' => 'title_tagline',
			'type' => 'checkbox',
		) );

		// Layout section panel
		$wp_customize->add_section( 'bavotasan_layout', array(
			'title' => __( 'Layout', 'tonic' ),
			'priority' => 35,
		) );

		$wp_customize->add_setting( 'width', array(
			'default' => $bavotasan_default_theme_options['width'],
            'sanitize_callback' => 'esc_attr',
			) );

		$wp_customize->add_control( 'width', array(
			'label' => __( 'Site Width', 'tonic' ),
			'section' => 'bavotasan_layout',
			'priority' => 10,
			'type' => 'select',
			'choices' => array(
				'' => '1200px',
				'w960' => __( '960px', 'tonic' ),
			),
		) );

		$wp_customize->add_setting( 'layout', array(
			'default' => $bavotasan_default_theme_options['layout'],
            'sanitize_callback' => 'esc_attr',
		) );

		$wp_customize->add_control( 'layout', array(
			'label' => __( 'Site Layout', 'tonic' ),
			'section' => 'bavotasan_layout',
			'priority' => 15,
			'type' => 'radio',
			'choices' => array(
				'1' => __( 'Left Sidebar', 'tonic' ),
				'2' => __( 'Right Sidebar', 'tonic' ),
				'6' => __( 'No Sidebar', 'tonic' )
			),
		) );

		$choices =  array(
			'c2' => '17%',
			'c3' => '25%',
			'c4' => '34%',
			'c5' => '42%',
			'c6' => '50%',
			'c7' => '58%',
			'c8' => '66%',
			'c9' => '75%',
			'c10' => '83%',
			'c12' => '100%',
		);

		$wp_customize->add_setting( 'primary', array(
			'default' => $bavotasan_default_theme_options['primary'],
            'sanitize_callback' => 'esc_attr',
		) );

		$wp_customize->add_control( 'primary', array(
			'label' => __( 'Main Content', 'tonic' ),
			'section' => 'bavotasan_layout',
			'priority' => 20,
			'type' => 'select',
			'choices' => $choices,
		) );

		$wp_customize->add_setting( 'excerpt_content', array(
			'default' => $bavotasan_default_theme_options['excerpt_content'],
            'sanitize_callback' => 'esc_attr',
		) );

		$wp_customize->add_control( 'excerpt_content', array(
			'label' => __( 'Post Content Display', 'tonic' ),
			'section' => 'bavotasan_layout',
			'priority' => 30,
			'type' => 'radio',
			'choices' => array(
				'excerpt' => __( 'Teaser Excerpt', 'tonic' ),
				'content' => __( 'Full Content', 'tonic' ),
			),
		) );

		$wp_customize->add_setting( 'home_posts', array(
			'default' => $bavotasan_default_theme_options['home_posts'],
            'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );

		$wp_customize->add_control( 'home_posts', array(
			'label' => __( 'Display Home Page Posts &amp; Sidebar', 'tonic' ),
			'section' => 'bavotasan_layout',
			'priority' => 40,
			'type' => 'checkbox',
		) );

		// Jumbotron
		$wp_customize->add_section( 'bavotasan_jumbo', array(
			'title' => __( 'Jumbo Headline', 'tonic' ),
			'priority' => 36,
		) );

		$wp_customize->add_setting( 'jumbo_headline_title', array(
			'default' => $bavotasan_default_theme_options['jumbo_headline_title'],
            'sanitize_callback' => 'esc_attr',
		) );

		$wp_customize->add_control( 'jumbo_headline_title', array(
			'label' => __( 'Title', 'tonic' ),
			'section' => 'bavotasan_jumbo',
			'priority' => 26,
			'type' => 'text',
		) );

		$wp_customize->add_setting( 'jumbo_headline_text', array(
			'default' => $bavotasan_default_theme_options['jumbo_headline_text'],
            'sanitize_callback' => 'esc_attr',
		) );

		$wp_customize->add_control( 'jumbo_headline_text', array(
			'label' => __( 'Text', 'tonic' ),
			'section' => 'bavotasan_jumbo',
			'priority' => 27,
			'type' => 'text',
		) );

		$wp_customize->add_setting( 'jumbo_headline_button_text', array(
			'default' => $bavotasan_default_theme_options['jumbo_headline_button_text'],
            'sanitize_callback' => 'esc_attr',
		) );

		$wp_customize->add_control( 'jumbo_headline_button_text', array(
			'label' => __( 'Button Text', 'tonic' ),
			'section' => 'bavotasan_jumbo',
			'priority' => 28,
			'type' => 'text',
		) );

		$wp_customize->add_setting( 'jumbo_headline_button_link', array(
			'default' => $bavotasan_default_theme_options['jumbo_headline_button_link'],
            'sanitize_callback' => 'esc_url',
		) );

		$wp_customize->add_control( 'jumbo_headline_button_link', array(
			'label' => __( 'Button Link', 'tonic' ),
			'section' => 'bavotasan_jumbo',
			'priority' => 29,
			'type' => 'text',
		) );

		// Posts panel
		$wp_customize->add_section( 'bavotasan_posts', array(
			'title' => __( 'Posts', 'tonic' ),
			'priority' => 45,
		) );

		$wp_customize->add_setting( 'display_categories', array(
			'default' => $bavotasan_default_theme_options['display_categories'],
            'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );

		$wp_customize->add_control( 'display_categories', array(
			'label' => __( 'Display Categories', 'tonic' ),
			'section' => 'bavotasan_posts',
			'type' => 'checkbox',
		) );

		$wp_customize->add_setting( 'display_author', array(
			'default' => $bavotasan_default_theme_options['display_author'],
            'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );

		$wp_customize->add_control( 'display_author', array(
			'label' => __( 'Display Author', 'tonic' ),
			'section' => 'bavotasan_posts',
			'type' => 'checkbox',
		) );

		$wp_customize->add_setting( 'display_date', array(
			'default' => $bavotasan_default_theme_options['display_date'],
            'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );

		$wp_customize->add_control( 'display_date', array(
			'label' => __( 'Display Date', 'tonic' ),
			'section' => 'bavotasan_posts',
			'type' => 'checkbox',
		) );

		$wp_customize->add_setting( 'display_comment_count', array(
			'default' => $bavotasan_default_theme_options['display_comment_count'],
            'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );

		$wp_customize->add_control( 'display_comment_count', array(
			'label' => __( 'Display Comment Count', 'tonic' ),
			'section' => 'bavotasan_posts',
			'type' => 'checkbox',
		) );
	}

	/**
	 * Sanitize checkbox options
	 *
	 * @since 1.0.2
	 */
    public function sanitize_checkbox( $value ) {
        if ( 'on' != $value )
            $value = false;

        return $value;
    }
}
$bavotasan_customizer = new Bavotasan_Customizer;