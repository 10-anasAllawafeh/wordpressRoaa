<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */

if ( ! function_exists( 'blogmax_is_topbar_section_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since  Blogmax 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogmax_is_topbar_section_enable( $control ) {
		return $control->manager->get_setting( 'blogmax_theme_options[topbar_section_enable]' )->value();
	}
endif;

if ( ! function_exists( 'blogmax_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Blogmax 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogmax_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

if ( ! function_exists( 'blogmax_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since  Blogmax 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogmax_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'blogmax_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'blogmax_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since  Blogmax 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function blogmax_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'blogmax_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Check if hero slider section is enabled.
 *
 * @since  Blogmax 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogmax_is_gallery_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blogmax_theme_options[gallery_slider_section_enable]' )->value() );
}

/**
 * Check if about section is enabled.
 *
 * @since Blogmax 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogmax_is_about_us_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blogmax_theme_options[about_us_section_enable]' )->value() );
}

/**
 * Check if Promotion section is enabled.
 *
 * @since  Blogmax 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogmax_is_promotion_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blogmax_theme_options[promotion_section_enable]' )->value() );
}

/**
 * Check if featured_posts section is enabled.
 *
 * @since  Blogmax 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogmax_is_featured_posts_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blogmax_theme_options[featured_posts_section_enable]' )->value() );
}

/**
 * Check if latest_post section is enabled.
 *
 * @since  Blogmax 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function blogmax_is_latest_posts_section_enable( $control ) {
	return ( $control->manager->get_setting( 'blogmax_theme_options[latest_posts_section_enable]' )->value() );
}
