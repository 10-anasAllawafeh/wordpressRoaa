<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'blogmax_pagination',
	array(
		'title'               	=> esc_html__('Pagination','blogmax'),
		'description'         	=> esc_html__( 'Pagination section options.', 'blogmax' ),
		'panel'               	=> 'blogmax_theme_options_panel',
	)
);

// Sidebar position setting and control.
$wp_customize->add_setting( 'blogmax_theme_options[pagination_enable]',
	array(
		'sanitize_callback' 	=> 'blogmax_sanitize_switch_control',
		'default'             	=> $options['pagination_enable'],
	)
);

$wp_customize->add_control( new  Blogmax_Switch_Control( $wp_customize,
	'blogmax_theme_options[pagination_enable]',
		array(
			'label'               	=> esc_html__( 'Pagination Enable', 'blogmax' ),
			'section'             	=> 'blogmax_pagination',
			'on_off_label' 			=> blogmax_switch_options(),
		)
	)
);

// Site layout setting and control.
$wp_customize->add_setting( 'blogmax_theme_options[pagination_type]',
	array(
		'sanitize_callback'   	=> 'blogmax_sanitize_select',
		'default'             	=> $options['pagination_type'],
	)
);

$wp_customize->add_control( 'blogmax_theme_options[pagination_type]',
	array(
		'label'               	=> esc_html__( 'Pagination Type', 'blogmax' ),
		'section'             	=> 'blogmax_pagination',
		'type'                	=> 'select',
		'choices'			  	=> blogmax_pagination_options(),
		'active_callback'	  	=> 'blogmax_is_pagination_enable',
	)
);
