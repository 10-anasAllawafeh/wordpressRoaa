<?php
/**
 * include customizer classes
 * @since Fansee Blog 1.0
 */
function fansee_blog_customizer_files( $files ){

	$new_files = array(
		'class-customizer.php',
		# custom controls for customizer
		'controls/toggle/class-toggle.php',
		'controls/slider/class-slider.php',
		'controls/dropdown-categories/class-dropdown-categories.php',

		# theme options
		'sections/class-theme-options.php',
	);

	return array_merge( $files, $new_files );
}
add_filter( 'fansee_blog_modules_customizer', 'fansee_blog_customizer_files' );

/**
 * Get theme mod
 * @since Fansee Blog 1.0
 */
function fansee_blog_get( $id ){
	return Fansee_Blog_Customizer::get( $id );
}

/**
 * Register customizer options
 * @since Fansee Blog 1.0
 */
function fansee_blog_customizer_register( $wp_customize ){
	$panel = array(
		'id' => Fansee_Blog_Customizer::get_id( 'theme-options' ),
		'args' => array(
			'title'    => esc_html__( 'Theme Options', 'fansee-blog' ),
			'priority' => 10,
		)
	);
	new Fansee_Blog_Theme_Options_Customizer( $panel );
}
add_action( 'init', 'fansee_blog_customizer_register' );

/**
 * enqueue scripts and styles for customizer 
 * @since Fansee Blog 1.0
 */
function fansee_blog_custom_controls_script(){

	$script = get_theme_file_uri( 'assets/js/customizer.js' );
	$deps   = array( 'jquery', 'customize-base', 'jquery-ui-slider', 'jquery-ui-button' );
	$style  = get_theme_file_uri( 'assets/css/customizer.css' );

	wp_enqueue_script( 'fansee-blog-customizer-js', $script, $deps, '1.0', true );
	wp_enqueue_style( 'fansee-blog-customizer-css', $style );
}
add_action( 'customize_controls_enqueue_scripts', 'fansee_blog_custom_controls_script', 99	);

/**
 * Modify default customizer placement
 * @since Fansee Blog 1.0
 */
function fansee_blog_customize_register( $wp_customize ){
	$color_section = 'fansee-blog-color-section';
	$wp_customize->get_control( 'header_textcolor' )->section = $color_section;
	$wp_customize->get_control( 'background_color' )->section = $color_section;		

	$wp_customize->get_section( 'header_image' )->title = esc_html__( 'Header', 'fansee-blog' );
	$wp_customize->get_section( 'header_image' )->panel = 'fansee-blog-theme-options';
}
add_action( 'customize_register', 'fansee_blog_customize_register' );