<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function blogmax_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogmax' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function blogmax_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogmax' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}

/**
 * List of products for post choices.
 * @return Array Array of post ids and name.
 */
function blogmax_product_choices() {
    $posts = get_posts( array( 'numberposts' => -1, 'post_type' => 'product' ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogmax' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function blogmax_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogmax' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function blogmax_product_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'product_cat',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'blogmax' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}

if ( ! function_exists( 'blogmax_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function blogmax_site_layout() {
        $blogmax_site_layout = array(
            'wide'          => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
            'boxed-layout'  => esc_url( get_template_directory_uri() . '/assets/images/boxed.png' ),
        );

        $output = apply_filters( 'blogmax_site_layout', $blogmax_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'blogmax_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function blogmax_selected_sidebar() {
        $blogmax_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'blogmax' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'blogmax' ),
        );

        $output = apply_filters( 'blogmax_selected_sidebar', $blogmax_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'blogmax_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function blogmax_global_sidebar_position() {
        $blogmax_global_sidebar_position = array(
            'right-sidebar' => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
            'no-sidebar'    => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
        );

        $output = apply_filters( 'blogmax_global_sidebar_position', $blogmax_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'blogmax_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function blogmax_sidebar_position() {
        $blogmax_sidebar_position = array(
            'right-sidebar'         => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
            'no-sidebar-content'    => esc_url( get_template_directory_uri() . '/assets/images/boxed.png' ),
        );

        $output = apply_filters( 'blogmax_sidebar_position', $blogmax_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'blogmax_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function blogmax_pagination_options() {
        $blogmax_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'blogmax' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'blogmax' ),
        );

        $output = apply_filters( 'blogmax_pagination_options', $blogmax_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'blogmax_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function blogmax_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'blogmax' ),
            'off'       => esc_html__( 'Disable', 'blogmax' )
        );
        return apply_filters( 'blogmax_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'blogmax_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function blogmax_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'blogmax' ),
            'off'       => esc_html__( 'No', 'blogmax' )
        );
        return apply_filters( 'blogmax_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'blogmax_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function blogmax_sortable_sections() {
        $options = blogmax_get_theme_options();
  
        $sections = array(
            'gallery_slider'            => esc_html__( 'Gallery Slider', 'blogmax' ),
            'about_us'                  => esc_html__( 'About us', 'blogmax' ),
            'promotion'                 => esc_html__( 'Promotion', 'blogmax' ),
            'featured_posts'           => esc_html__( 'Featured Posts', 'blogmax' ),
            'subscribe'                 => esc_html__( 'Subscription', 'blogmax' ),
            'latest_posts'              => esc_html__( 'Latest Post', 'blogmax' ),
        );
      
         
        return apply_filters( 'blogmax_sortable_sections', $sections );
    }
endif;
