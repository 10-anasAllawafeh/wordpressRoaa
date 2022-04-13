<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'blogmax_reset_section',
	array(
		'title'             => esc_html__('Reset all settings','blogmax'),
		'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'blogmax' ),
	)
);

// Add reset enable setting and control.
$wp_customize->add_setting( 'blogmax_theme_options[reset_options]',
	array(
		'default'           => $options['reset_options'],
		'sanitize_callback' => 'blogmax_sanitize_checkbox',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( 'blogmax_theme_options[reset_options]',
	array(
		'label'             => esc_html__( 'Check to reset all settings', 'blogmax' ),
		'section'           => 'blogmax_reset_section',
		'type'              => 'checkbox',
	)
);
