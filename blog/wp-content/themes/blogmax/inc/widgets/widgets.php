<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Blogmax
 *
 * @package Theme Palace
 * @subpackage Blogmax
 * @since Blogmax 1.0.0
 */

/*

/*
 * Add popular post widget
 */
require get_template_directory() . '/inc/widgets/social-link-widget.php';
/*

/**
 * Register widgets
 */
function blogmax_register_widgets() {

	register_widget( 'Blogmax_Social_Link' );

}
add_action( 'widgets_init', 'blogmax_register_widgets' );