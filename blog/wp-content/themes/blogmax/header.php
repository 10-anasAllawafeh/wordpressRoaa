<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage  Blogmax
	 * @since  Blogmax 1.0.0
	 */

	/**
	 * blogmax_doctype hook
	 *
	 * @hooked blogmax_doctype -  10
	 *
	 */
	do_action( 'blogmax_doctype' );

?>
<head>
<?php
	/**
	 * blogmax_before_wp_head hook
	 *
	 * @hooked blogmax_head -  10
	 *
	 */
	do_action( 'blogmax_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>
<?php
	/**
	 * blogmax_page_start_action hook
	 *
	 * @hooked blogmax_page_start -  10
	 *
	 */
	do_action( 'blogmax_page_start_action' ); 

	/**
	 * blogmax_header_action hook
	 *
	 * @hooked blogmax_site_branding -  10
	 * @hooked blogmax_header_start -  20
	 * @hooked blogmax_site_navigation -  30
	 * @hooked blogmax_header_end -  50
	 *
	 */
	do_action( 'blogmax_header_action' );

	/**
	 * blogmax_content_start_action hook
	 *
	 * @hooked blogmax_content_start -  10
	 *
	 */
	do_action( 'blogmax_content_start_action' );

    /**
     * blogmax_header_image_action hook
     *
     * @hooked blogmax_header_image -  10
     *
     */
    do_action( 'blogmax_header_image_action' );
	
