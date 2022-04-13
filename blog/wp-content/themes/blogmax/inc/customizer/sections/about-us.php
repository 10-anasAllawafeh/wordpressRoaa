<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Blogmax
 * @since Blogmax 1.0.0
 */

// Add About section
$wp_customize->add_section( 'blogmax_about_us_section',
	array(
		'title'             => esc_html__( 'About us','blogmax' ),
		'description'       => esc_html__( 'About us  Section options.', 'blogmax' ),
        'panel'             => 'blogmax_front_page_panel',
	)
);

// About content enable control and setting
$wp_customize->add_setting( 'blogmax_theme_options[about_us_section_enable]',
	array(
		'default'			=> 	$options['about_us_section_enable'],
		'sanitize_callback' => 'blogmax_sanitize_switch_control',
	)
);

$wp_customize->add_control( new Blogmax_Switch_Control( $wp_customize,
	'blogmax_theme_options[about_us_section_enable]',
		array(
			'label'             => esc_html__( 'About Section Enable', 'blogmax' ),
			'section'           => 'blogmax_about_us_section',
			'on_off_label' 		=> blogmax_switch_options(),
		)
	)
);

// About title setting
$wp_customize->add_setting('blogmax_theme_options[about_us_custom_sub_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['about_us_custom_sub_title']
    )
);

$wp_customize->add_control('blogmax_theme_options[about_us_custom_sub_title]',
    array(
        'section'			=> 'blogmax_about_us_section',
        'label'				=> esc_html__( 'Section Sub Title:', 'blogmax' ),
        'type'          	=>'text',
        'active_callback' 	=> 'blogmax_is_about_us_section_enable'
    )
);

$wp_customize->selective_refresh->add_partial('blogmax_theme_options[about_us_custom_sub_title]',
    array(
        'selector'            => '#blogmax_about_us_section div.section-header p.section-subtitle',
        'render_callback'     => 'blogmax_about_us_custom_sub_title_partial',
    )
);

// About Excerpt length setting and control.
$wp_customize->add_setting( 'blogmax_theme_options[about_us_excerpt_length]',
	array(
		'sanitize_callback' => 'blogmax_sanitize_number_range',
		'default'			=> $options['about_us_excerpt_length'],
	)
);

$wp_customize->add_control( 'blogmax_theme_options[about_us_excerpt_length]',
	array(
		'label'       		=> esc_html__( 'Excerpt Length', 'blogmax' ),
		'description' 		=> esc_html__( 'Total words to be displayed in About section', 'blogmax' ),
		'section'     		=> 'blogmax_about_us_section',
		'type'        		=> 'number',
		'active_callback' 	=> 'blogmax_is_about_us_section_enable',
	)
);

// about pages drop down chooser control and setting
$wp_customize->add_setting( 'blogmax_theme_options[about_us_content_page]',
	array(
		'sanitize_callback' => 'blogmax_sanitize_page',
	)
);

$wp_customize->add_control( new Blogmax_Dropdown_Chooser( $wp_customize,
	'blogmax_theme_options[about_us_content_page]',
		array(
			'label'             => esc_html__( 'Select Page', 'blogmax' ),
			'section'           => 'blogmax_about_us_section',
			'choices'			=> blogmax_page_choices(),
			'active_callback'	=> 'blogmax_is_about_us_section_enable',
		)
	)
);

//about_us_btn_txt
$wp_customize->add_setting('blogmax_theme_options[about_us_btn_txt]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['about_us_btn_txt'],
    )
);

$wp_customize->add_control('blogmax_theme_options[about_us_btn_txt]',
    array(
        'section'			=> 'blogmax_about_us_section',
        'label'				=> esc_html__( 'Button Text:', 'blogmax' ),
        'type'          	=> 'text',
        'active_callback' 	=> 'blogmax_is_about_us_section_enable'
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogmax_theme_options[about_us_btn_txt]',
		array(
			'selector'            => '#blogmax_about_us_section div.read-more a.btn',
			'settings'            => 'blogmax_theme_options[about_us_btn_txt]',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'blogmax_about_us_btn_txt_partial',
		)
	);
}
