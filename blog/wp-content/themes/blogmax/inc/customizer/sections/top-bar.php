<?php
/**
 * Topbar Section options
 *
 * @package Theme Palace
 * @subpackage Blogmax
 * @since Blogmax 1.0.0
 */

// Add Topbar section
$wp_customize->add_section( 'blogmax_topbar_section',
	array(
		'title'             => esc_html__( 'Topbar','blogmax' ),
		'description'       => esc_html__( 'Topbar Section options.', 'blogmax' ),
		'panel'             => 'blogmax_front_page_panel',
	)
);

// topbar enable/disable control and setting
$wp_customize->add_setting( 'blogmax_theme_options[topbar_section_enable]',
	array(
		'default'			=> 	$options['topbar_section_enable'],
		'sanitize_callback' => 'blogmax_sanitize_switch_control',
	)
);

$wp_customize->add_control( new Blogmax_Switch_Control( $wp_customize,
	'blogmax_theme_options[topbar_section_enable]',
		array(
			'label'             => esc_html__( 'Topbar Section Enable', 'blogmax' ),
			'section'           => 'blogmax_topbar_section',
			'on_off_label' 		=> blogmax_switch_options(),
		)
	)
);


// Topbar content enable control and setting
$wp_customize->add_setting( 'blogmax_theme_options[social_menu_enable]',
	array(
		'default'			=> 	$options['social_menu_enable'],
		'sanitize_callback' => 'blogmax_sanitize_switch_control',
	)
);
 
 $wp_customize->add_control( new Blogmax_Switch_Control( $wp_customize,
	'blogmax_theme_options[social_menu_enable]',
		array(
			'label'             => esc_html__( 'Social Menu Enable', 'blogmax' ),
			'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show secondary and social menu.', 'blogmax' ), esc_html__( 'Click Here', 'blogmax' ), esc_html__( 'to create menu', 'blogmax' ) ),
			'section'           => 'blogmax_topbar_section',
			'active_callback'   => 'blogmax_is_topbar_section_enable',
			'on_off_label' 		=> blogmax_switch_options(),
		)
	)
);
