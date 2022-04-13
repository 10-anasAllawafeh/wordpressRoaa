<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since Fansee Blog 1.0
 */

if ( ! is_active_sidebar( 'fansee_blog_sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php 
		dynamic_sidebar( 'fansee_blog_sidebar' ); 
	?>
</aside><!-- #secondary -->