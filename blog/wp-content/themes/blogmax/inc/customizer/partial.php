<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage  Blogmax
* @since  Blogmax 1.0.0
*/

// blog btn title
if ( ! function_exists( 'blogmax_copyright_text_partial' ) ) :
    function blogmax_copyright_text_partial() {
        $options = blogmax_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;

// latest_posts_title selective refresh
if ( ! function_exists( 'blogmax_latest_posts_title_partial' ) ) :
    function blogmax_latest_posts_title_partial() {
        $options = blogmax_get_theme_options();
        return esc_html( $options['latest_posts_title'] );
    }
endif;

// latest_posts_sub_title selective refresh
if ( ! function_exists( 'blogmax_latest_posts_sub_title_partial' ) ) :
    function blogmax_latest_posts_sub_title_partial() {
        $options = blogmax_get_theme_options();
        return esc_html( $options['latest_posts_sub_title'] );
    }
endif;

// subscribe_section_description selective refresh
if ( ! function_exists( 'blogmax_subscribe_section_description_partial' ) ) :
    function blogmax_subscribe_section_description_partial() {
        $options = blogmax_get_theme_options();
        return esc_html( $options['subscribe_section_description'] );
    }
endif;

// subscribe_section_title selective refresh
if ( ! function_exists( 'blogmax_subscribe_section_title_partial' ) ) :
    function blogmax_subscribe_section_title_partial() {
        $options = blogmax_get_theme_options();
        return esc_html( $options['subscribe_section_title'] );
    }
endif;

// subscribe_section_subtitle selective refresh
if ( ! function_exists( 'blogmax_subscribe_section_subtitle_partial' ) ) :
    function blogmax_subscribe_section_subtitle_partial() {
        $options = blogmax_get_theme_options();
        return esc_html( $options['subscribe_section_subtitle'] );
    }
endif;

// subscribe_section_btn_txt selective refresh
if ( ! function_exists( 'blogmax_subscribe_section_btn_txt_partial' ) ) :
    function blogmax_subscribe_section_btn_txt_partial() {
        $options = blogmax_get_theme_options();
        return esc_html( $options['subscribe_section_btn_txt'] );
    }
endif;

// testimonial_sub_title selective refresh
if ( ! function_exists( 'blogmax_testimonial_sub_title_partial' ) ) :
    function blogmax_testimonial_sub_title_partial() {
        $options = blogmax_get_theme_options();
        return esc_html( $options['testimonial_sub_title'] );
    }
endif;

// about_us_btn_txt selective refresh
if ( ! function_exists( 'blogmax_about_us_btn_txt_partial' ) ) :
    function blogmax_about_us_btn_txt_partial() {
        $options = blogmax_get_theme_options();
        return esc_html( $options['about_us_btn_txt'] );
    }
endif;

// about_us_custom_sub_title selective refresh
if ( ! function_exists( 'blogmax_about_us_custom_sub_title_partial' ) ) :
    function blogmax_about_us_custom_sub_title_partial() {
        $options = blogmax_get_theme_options();
        return esc_html( $options['about_us_custom_sub_title'] );
    }
endif;

// promotion_read_more selective refresh
if ( ! function_exists( 'blogmax_promotion_read_more_partial' ) ) :
    function blogmax_promotion_read_more_partial() {
        $options = blogmax_get_theme_options();
        return esc_html( $options['promotion_read_more'] );
    }
endif;

// promotion_sub_title selective refresh
if ( ! function_exists( 'blogmax_promotion_sub_title_partial' ) ) :
    function blogmax_promotion_sub_title_partial() {
        $options = blogmax_get_theme_options();
        return esc_html( $options['promotion_sub_title'] );
    }
endif;

// featured_posts_read_more_btn_label selective refresh
if ( ! function_exists( 'blogmax_featured_posts_read_more_btn_label_partial' ) ) :
    function blogmax_featured_posts_read_more_btn_label_partial() {
        $options = blogmax_get_theme_options();
        return esc_html( $options['featured_posts_read_more_btn_label'] );
    }
endif;

// featured_posts_description selective refresh
if ( ! function_exists( 'blogmax_featured_posts_description_partial' ) ) :
    function blogmax_featured_posts_description_partial() {
        $options = blogmax_get_theme_options();
        return esc_html( $options['featured_posts_description'] );
    }
endif;

// featured_posts_title selective refresh
if ( ! function_exists( 'blogmax_featured_posts_title_partial' ) ) :
    function blogmax_featured_posts_title_partial() {
        $options = blogmax_get_theme_options();
        return esc_html( $options['featured_posts_title'] );
    }
endif;

