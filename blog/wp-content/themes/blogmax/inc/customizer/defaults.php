<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 * @return array An array of default values
 */

function blogmax_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$blogmax_default_options = array(
		// Color Options
		'header_title_color'			    => '#fff',
		'header_tagline_color'			    => '#fff',
		'header_txt_logo_extra'			    => 'show-all',

		// loader
		'loader_enable'         		    => (bool) false,
		'loader_icon'         			    => 'default',

		// breadcrumb
		'breadcrumb_enable'				    => (bool) true,
		'breadcrumb_separator'			    => '/',
				
		// homepage options
		'enable_frontpage_content' 			=> false,

		// layout 
		'site_layout'         			    => 'wide',
		'sidebar_position'         		    => 'right-sidebar',
		'post_sidebar_position' 		    => 'right-sidebar',
		'page_sidebar_position' 		    => 'right-sidebar',

		// excerpt options
		'long_excerpt_length'               => 25,

		// pagination options
		'pagination_enable'         	    => (bool) true,
		'pagination_type'         		    => 'default',

		// footer options
		'copyright_text'           		    => sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'blogmax' ), '[the-year]', '[site-link]' ).'</a>',
		'scroll_top_visible'        	    => (bool) true,

		// reset options
		'reset_options'      			    => (bool) false,
		
		// homepage sections sortable
		'pro_sortable' 			    	=> 'gallery_slider,about_us,featured_posts,promotion,latest_posts',

		// blog/archive options
		'your_latest_posts_title' 		    => esc_html__( 'Blogs', 'blogmax' ),
		'blog_column'						=> 'col-2',


		// single post theme options
		'single_post_hide_date' 		    => (bool) false,
		'single_post_hide_author'		    => (bool) false,
		'single_post_hide_category'		    => (bool) false,
		'single_post_hide_tags'			    => (bool) false,

		/* Front Page */

		// top bar
		'topbar_section_enable'					=> (bool) false,
		'social_menu_enable'					=> (bool) false,

		// hero slider
		'gallery_slider_section_enable'			=> (bool) false,
		'gallery_slider_autoplay_enable'		=> (bool) false,
		'gallery_slider_count'					=> 4,

		//latest_post 
		'latest_posts_section_enable'		   => (bool) false,
		'latest_posts_content_type'			   => 'recent',
		'latest_posts_sub_title'               => esc_html__('Don’t Miss this!','blogmax'),
		'latest_posts_title'    			   => esc_html__('Browse More Posts','blogmax'),
		'latest_posts_count'				   => 4,
		'latest_posts_column'				   => 'col-4',
		
		//featured_posts 
		'featured_posts_section_enable'			=> (bool) false,
		'featured_posts_count'				 	=> 3,
		'featured_posts_title'    			   	=> esc_html__('Our Bloggies','blogmax'),
		'featured_posts_description'    		=> esc_html__('Most writers struggle with getting their writing done for one surprising reason. They think writing is a one-step process, when in fact, it’s a three-step process. The minutes would tick by, with me stupidly staring at the cursor...','blogmax'),
		'featured_posts_excerpt_length'			=> 30,
		'featured_posts_read_more_btn_label'    => esc_html__('Read More','blogmax'),
		
		//about us
		'about_us_section_enable'				=> (bool) false,
		'about_us_custom_sub_title'				=> esc_html__('Welcome to the','blogmax'),
		'about_us_excerpt_length'				=> 40,
		'about_us_btn_txt'                  	=> esc_html__('Learn More','blogmax'),

		//promotion
		'promotion_section_enable' 				=> false,
		'promotion_content_type'				=> 'post',
		'promotion_read_more'					=>	esc_html__('Read More', 'blogmax'),
		'promotion_sub_title'					=>	esc_html__('Full width post', 'blogmax'),
		'promotion_custom_title'				=> esc_html__('We are very creative and innovative team','blogmax'),


	);

	$output = apply_filters( 'blogmax_default_theme_options', $blogmax_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}