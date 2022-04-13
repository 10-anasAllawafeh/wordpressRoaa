<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */

$wp_customize->add_section( 'blogmax_breadcrumb',
	array(
		'title'             => esc_html__( 'Breadcrumb','blogmax' ),
		'description'       => esc_html__( 'Breadcrumb section options.', 'blogmax' ),
		'panel'             => 'blogmax_theme_options_panel',
	)
);

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'blogmax_theme_options[breadcrumb_enable]',
	array(
		'sanitize_callback' => 'blogmax_sanitize_switch_control',
		'default'          	=> $options['breadcrumb_enable'],
	)
);

$wp_customize->add_control( new  Blogmax_Switch_Control( $wp_customize,
	'blogmax_theme_options[breadcrumb_enable]',
		array(
			'label'            	=> esc_html__( 'Enable Breadcrumb', 'blogmax' ),
			'section'          	=> 'blogmax_breadcrumb',
			'on_off_label' 		=> blogmax_switch_options(),
		)
	)
);

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'blogmax_theme_options[breadcrumb_separator]',
	array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'          	=> $options['breadcrumb_separator'],
	)
);

$wp_customize->add_control( 'blogmax_theme_options[breadcrumb_separator]',
	array(
		'label'            	=> esc_html__( 'Separator', 'blogmax' ),
		'active_callback' 	=> 'blogmax_is_breadcrumb_enable',
		'section'          	=> 'blogmax_breadcrumb',
	)
);
