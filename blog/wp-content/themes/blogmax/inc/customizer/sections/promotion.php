<?php
/**
 * Promotion Section options
 *
 * @package Theme Palace
 * @subpackage  Blogmax
 * @since  Blogmax 1.0.0
 */

// Add Promotion section
$wp_customize->add_section( 'blogmax_promotion_section',
    array(
        'title'             => esc_html__( 'Promotion','blogmax' ),
        'description'       => esc_html__( 'Promotion Section options.', 'blogmax' ),
        'panel'             => 'blogmax_front_page_panel',
    )
);

// Promotion content enable control and setting
$wp_customize->add_setting( 'blogmax_theme_options[promotion_section_enable]',
    array(
        'default'			=> 	$options['promotion_section_enable'],
        'sanitize_callback' => 'blogmax_sanitize_switch_control',
    )
);

$wp_customize->add_control( new  Blogmax_Switch_Control( $wp_customize,
    'blogmax_theme_options[promotion_section_enable]',
        array(
            'label'             => esc_html__( 'Promotion Section Enable', 'blogmax' ),
            'section'           => 'blogmax_promotion_section',
            'on_off_label' 		=> blogmax_switch_options(),
        )
    )
);

// promotion section sub title control and setting
$wp_customize->add_setting('blogmax_theme_options[promotion_sub_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
        'default'  => $options['promotion_sub_title'],
    )
);

$wp_customize->add_control('blogmax_theme_options[promotion_sub_title]',
    array(
        'label' => esc_html__('Section Sub Title', 'blogmax'),
        'section' => 'blogmax_promotion_section',
        'type' => 'text',
        'active_callback' => 'blogmax_is_promotion_section_enable',
    )
);

$wp_customize->selective_refresh->add_partial('blogmax_theme_options[promotion_sub_title]',
    array(
        'selector' => '#blogmax_promotion_section .section-subtitle',
        'render_callback' => 'blogmax_promotion_sub_title_partial',
    )
);

// Promotion content type control and setting
$wp_customize->add_setting( 'blogmax_theme_options[promotion_content_type]',
    array(
        'default'          	=> $options['promotion_content_type'],
        'sanitize_callback' => 'blogmax_sanitize_select',
    ) 
);

$wp_customize->add_setting( 'blogmax_theme_options[promotion_content_page]',
    array(
        'sanitize_callback' => 'blogmax_sanitize_page',
    )
);

$wp_customize->add_control( new  Blogmax_Dropdown_Chooser( $wp_customize,
    'blogmax_theme_options[promotion_content_page]',
        array(
            'label'             => esc_html__( 'Select Page', 'blogmax' ),
            'section'           => 'blogmax_promotion_section',
            'choices'			=> blogmax_page_choices(),
            'active_callback'	=> 'blogmax_is_promotion_section_enable',
        )
    )
);

// Promotion read more setting and control
$wp_customize->add_setting( 'blogmax_theme_options[promotion_read_more]',
    array(
        'default'			=> $options['promotion_read_more'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         =>'postMessage',
    )
);

$wp_customize->add_control( 'blogmax_theme_options[promotion_read_more]',
    array(
        'label'           	=> esc_html__( 'Read More Text', 'blogmax' ),
        'section'        	=> 'blogmax_promotion_section',
        'active_callback' 	=> 'blogmax_is_promotion_section_enable',
        'type'				=> 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogmax_theme_options[promotion_read_more]',
        array(
            'selector'            => '#blogmax_promotion_section div.read-more a.btn',
            'settings'            => 'blogmax_theme_options[promotion_read_more]',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'blogmax_promotion_read_more_partial',
        )
    );
}
