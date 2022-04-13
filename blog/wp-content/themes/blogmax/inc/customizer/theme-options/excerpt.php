<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'blogmax_excerpt_section',
	array(
		'title'             => esc_html__( 'Excerpt','blogmax' ),
		'description'       => esc_html__( 'Excerpt section options.', 'blogmax' ),
		'panel'             => 'blogmax_theme_options_panel',
	)
);


// long Excerpt length setting and control.
$wp_customize->add_setting( 'blogmax_theme_options[long_excerpt_length]',
	array(
		'sanitize_callback' => 'blogmax_sanitize_number_range',
		'validate_callback' => 'blogmax_validate_long_excerpt',
		'default'			=> $options['long_excerpt_length'],
	)
);

$wp_customize->add_control( 'blogmax_theme_options[long_excerpt_length]',
	array(
		'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'blogmax' ),
		'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'blogmax' ),
		'section'     		=> 'blogmax_excerpt_section',
		'type'        		=> 'number',
		'input_attrs' 		=> array(
			'style'       => 'width: 80px;',
			'max'         => 100,
			'min'         => 5,
		),
	)
);
