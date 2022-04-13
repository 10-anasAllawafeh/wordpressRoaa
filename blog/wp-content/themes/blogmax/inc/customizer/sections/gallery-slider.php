<?php
/**
 * Gallery Slider Section options
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */

// Add Gallery Slider section
$wp_customize->add_section( 'blogmax_gallery_slider_section',
	array(
		'title'             => esc_html__( 'Gallery Slider','blogmax' ),
		'description'       => esc_html__( 'Gallery Slider Section options.', 'blogmax' ),
		'panel'             => 'blogmax_front_page_panel',
	)
);

// Gallery Slider content enable control and setting
$wp_customize->add_setting( 'blogmax_theme_options[gallery_slider_section_enable]', 
	array(
		'default'			=> 	$options['gallery_slider_section_enable'],
		'sanitize_callback' => 'blogmax_sanitize_switch_control',
	) 
);

$wp_customize->add_control( new  Blogmax_Switch_Control( $wp_customize,
	'blogmax_theme_options[gallery_slider_section_enable]',
		array(
			'label'             => esc_html__( 'Gallery Slider Section Enable', 'blogmax' ),
			'section'           => 'blogmax_gallery_slider_section',
			'on_off_label' 		=> blogmax_switch_options(),
		)
	)
);

// Gallery Slider autoplay enable control and setting
$wp_customize->add_setting( 'blogmax_theme_options[gallery_slider_autoplay_enable]',
	array(
		'default'			=> 	$options['gallery_slider_autoplay_enable'],
		'sanitize_callback' => 'blogmax_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Blogmax_Switch_Control( $wp_customize,
	'blogmax_theme_options[gallery_slider_autoplay_enable]',
		array(
			'label'             => esc_html__( 'Slider Autoplay Enable', 'blogmax' ),
			'section'           => 'blogmax_gallery_slider_section',
			'active_callback'   => 'blogmax_is_gallery_slider_section_enable',
			'on_off_label' 		=> blogmax_switch_options(),
		)
	)
);


for ( $i = 1; $i <= $options['gallery_slider_count']; $i++ ) :

	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'blogmax_theme_options[gallery_slider_content_page_'. $i .']', 
		array(
			'sanitize_callback' => 'blogmax_sanitize_page',
		)
	);

	$wp_customize->add_control( new  Blogmax_Dropdown_Chooser( $wp_customize,
		'blogmax_theme_options[gallery_slider_content_page_'. $i .']', 
			array(
				'label'             => sprintf(esc_html__( 'Select Page: %d', 'blogmax'), $i ),
				'section'           => 'blogmax_gallery_slider_section',
				'choices'			=> blogmax_page_choices(),
				'active_callback'	=> 'blogmax_is_gallery_slider_section_enable',
			)
		)
	);

	// Blogmax_Customize_Horizontal_Line
    $wp_customize->add_setting('blogmax_theme_options[gallery_slider_separator'. $i .']',
		array(
			'sanitize_callback'      => 'blogmax_sanitize_html',
		)
	);

    $wp_customize->add_control(new Blogmax_Customize_Horizontal_Line($wp_customize,
		'blogmax_theme_options[gallery_slider_separator'. $i .']',
			array(
				'active_callback'       => 'blogmax_is_gallery_slider_section_enable',
				'type'                  => 'hr',
				'section'               => 'blogmax_gallery_slider_section',
			)
		)
	);

endfor;