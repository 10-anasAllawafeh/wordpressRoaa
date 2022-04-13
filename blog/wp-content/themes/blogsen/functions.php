<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( ! function_exists( 'blogsen_enqueue_styles' ) ) :
    /**
     * Load assets.
     *
     * @since 1.0.0
     */
    function blogsen_enqueue_styles() {
        wp_enqueue_style( 'blogbell-style-parent', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'blogsen-style', get_stylesheet_directory_uri() . '/style.css', array( 'blogbell-style-parent' ), '1.0.0' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'blogsen_enqueue_styles', 99 );

// END ENQUEUE PARENT ACTION
if ( ! function_exists( 'blogsen_fonts_url' ) ) :

	function blogsen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Lobster, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lobster font: on or off', 'blogsen' ) ) {
		$fonts[] = 'Lobster:300,400,500,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Redressed, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Redressed: on or off', 'blogsen' ) ) {
		$fonts[] = 'Redressed';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;


if ( ! function_exists( 'blogsen_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
function blogsen_get_default_theme_options() {

    $theme_data = wp_get_theme();
    $defaults = array();


    // Featured Slider Section
    $defaults['disable_featured-slider_section']    = false;
    $defaults['disable_white_overlay']      = false;
    // About Section
    $defaults['disable_about_section']  = false;
    $defaults['latest_posts_title']         = esc_html__( 'Latest Posts', 'blogsen' );
    $defaults['pagination_type']        = 'default';

    // Blog Section
    $defaults['disable_blog_section']       = false;    
    $defaults['blog_title']                 = esc_html__( 'Featured Post', 'blogsen' ); 

    
    //General Section
    $defaults['readmore_text']              = esc_html__('Read More','blogsen');
    $defaults['excerpt_length']             = 40;
    $defaults['layout_options_blog']            = 'no-sidebar';
    $defaults['layout_options_archive']         = 'no-sidebar';
    $defaults['layout_options_page']            = 'right-sidebar';  
    $defaults['layout_options_single']          = 'right-sidebar';  

    //Footer section        
    $defaults['copyright_text']             = esc_html__( 'Copyright &copy; All rights reserved.', 'blogsen' );

    return $defaults;
}
endif;
add_filter( 'blogbell_filter_default_theme_options', 'blogsen_get_default_theme_options', 99 );


if ( ! function_exists( 'blogsen_customize_backend_styles' ) ) :
    /**
     * Load assets.
     *
     * @since 1.0.0
     */
    function blogsen_customize_backend_styles() {
        wp_enqueue_style( 'blogsen-style', get_stylesheet_directory_uri() . '/customizer-style.css' );
    }
endif;
add_action( 'customize_controls_enqueue_scripts', 'blogsen_customize_backend_styles', 99 );
