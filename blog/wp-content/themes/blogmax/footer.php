<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */

/**
 * blogmax_footer_primary_content hook
 *
 * @hooked blogmax_add_subscribe_section -  10
 *
 */
do_action( 'blogmax_footer_primary_content' );

/**
 * blogmax_content_end_action hook
 *
 * @hooked blogmax_content_end -  10
 *
 */
do_action( 'blogmax_content_end_action' );

/**
 * blogmax_content_end_action hook
 *
 * @hooked blogmax_footer_start -  10
 * @hooked Blogmax_Footer_Widgets->add_footer_widgets -  20
 * @hooked blogmax_footer_site_info -  40
 * @hooked blogmax_footer_end -  100
 *
 */
do_action( 'blogmax_footer' );

/**
 * blogmax_page_end_action hook
 *
 * @hooked blogmax_page_end -  10
 *
 */
do_action( 'blogmax_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
