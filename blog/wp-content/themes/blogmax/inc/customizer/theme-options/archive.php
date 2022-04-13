<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'blogmax_archive_section',
	array(
		'title'             => esc_html__( 'Blog/Archive','blogmax' ),
		'description'       => esc_html__( 'Archive section options.', 'blogmax' ),
		'panel'             => 'blogmax_theme_options_panel',
	)
);

// Your latest posts title setting and control.
$wp_customize->add_setting( 'blogmax_theme_options[your_latest_posts_title]',
	array(
		'default'           => $options['your_latest_posts_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control( 'blogmax_theme_options[your_latest_posts_title]',
	array(
		'label'             => esc_html__( 'Your Latest Posts Title', 'blogmax' ),
		'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'blogmax' ),
		'section'           => 'blogmax_archive_section',
		'type'				=> 'text',
		'active_callback'	=> function( $control ) {
			return !(
				blogmax_is_static_homepage_enable( $control )
			);
		}
	)
);

// features content type control and setting
$wp_customize->add_setting( 'blogmax_theme_options[blog_column]',
	array(
		'default'          	=> $options['blog_column'],
		'sanitize_callback' => 'blogmax_sanitize_select',
	)
);

$wp_customize->add_control( 'blogmax_theme_options[blog_column]',
	array(
		'label'             => esc_html__( 'Column Layout', 'blogmax' ),
		'section'           => 'blogmax_archive_section',
		'type'				=> 'select',
		'choices'			=> array( 
			'col-1'		=> esc_html__( 'One Column', 'blogmax' ),
			'col-2'		=> esc_html__( 'Two Column', 'blogmax' ),
			'col-3'		=> esc_html__( 'Three Column', 'blogmax' ),
		),
	)
);
