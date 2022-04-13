<?php
/**
 * Home Page sections
 *
 * This is the template that includes all the other files for home page sections
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */

// about section
require get_template_directory() . '/inc/sections/about-us.php';

// latest-post section
require get_template_directory() . '/inc/sections/latest-posts.php';

// recent-product section
require get_template_directory() . '/inc/sections/gallery-slider.php';

// promotion section
require get_template_directory() . '/inc/sections/promotion.php';

// featured-posts section
require get_template_directory() . '/inc/sections/featured-posts.php';