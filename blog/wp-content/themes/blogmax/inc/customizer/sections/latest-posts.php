<?php
/**
 * Latest Post Section options
 *
 * @package Theme Palace
 * @subpackage Blogmax
 * @since Blogmax 1.0.0
 */

// Add Latest Post section
$wp_customize->add_section( 'blogmax_latest_posts_section',
    array(
        'title'             => esc_html__( 'Latest Post','blogmax' ),
        'description'       => esc_html__( 'Latest Post Section options.', 'blogmax' ),
        'panel'             => 'blogmax_front_page_panel',
    )
);

// Latest Post content enable control and setting
$wp_customize->add_setting( 'blogmax_theme_options[latest_posts_section_enable]',
    array(
        'default'           =>  $options['latest_posts_section_enable'],
        'sanitize_callback' => 'blogmax_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Blogmax_Switch_Control( $wp_customize,
    'blogmax_theme_options[latest_posts_section_enable]',
        array(
            'label'             => esc_html__( 'Latest Post Section Enable', 'blogmax' ),
            'section'           => 'blogmax_latest_posts_section',
            'on_off_label'      => blogmax_switch_options(),
        ) 
    )
);

// latest_post section sub title control and setting
$wp_customize->add_setting('blogmax_theme_options[latest_posts_sub_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
        'default'  => $options['latest_posts_sub_title'],
    )
);

$wp_customize->add_control('blogmax_theme_options[latest_posts_sub_title]',
    array(
        'label' => esc_html__('Section Sub Title', 'blogmax'),
        'section' => 'blogmax_latest_posts_section',
        'type' => 'text',
        'active_callback' => 'blogmax_is_latest_posts_section_enable',
    )
);

$wp_customize->selective_refresh->add_partial('blogmax_theme_options[latest_posts_sub_title]',
    array(
        'selector' => '#blogmax_latest_posts_section .section-subtitle',
        'render_callback' => 'blogmax_latest_posts_sub_title_partial',
    )
);

// latest_post title setting and control
$wp_customize->add_setting( 'blogmax_theme_options[latest_posts_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['latest_posts_title'],
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control( 'blogmax_theme_options[latest_posts_title]',
    array(
        'label'             => esc_html__( 'Section Title', 'blogmax' ),
        'section'           => 'blogmax_latest_posts_section',
        'active_callback'   => 'blogmax_is_latest_posts_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogmax_theme_options[latest_posts_title]',
        array(
            'selector'            => '#blogmax_latest_posts_section .section-header h2',
            'settings'            => 'blogmax_theme_options[latest_posts_title]',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'blogmax_latest_posts_title_partial',
        )
    );
}

// Event social icons number control and setting
$wp_customize->add_setting( 'blogmax_theme_options[latest_posts_count]',
    array(
        'default'           => $options['latest_posts_count'],
        'sanitize_callback' => 'blogmax_sanitize_number_range',
        'validate_callback' => 'blogmax_validate_latest_posts_count',
    )
);

$wp_customize->add_control( 'blogmax_theme_options[latest_posts_count]',
    array(
        'label'             => esc_html__( 'Number of Posts', 'blogmax' ),
        'description'       => esc_html__( 'Note: Min 2 & Max 12. Please input the valid number and save. Then refresh the page to see the change.', 'blogmax' ),
        'section'           => 'blogmax_latest_posts_section',
        'active_callback'   => 'blogmax_is_latest_posts_section_enable',
        'type'              => 'number',
        'input_attrs'       => array(
            'min'   => 2,
            'max'   => 12,
            'style' => 'width: 100px;'
        ),
    )
);

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'blogmax_theme_options[latest_posts_category_exclude]',
    array(
        'sanitize_callback' => 'blogmax_sanitize_category_list',
    )
);

$wp_customize->add_control( new Blogmax_Dropdown_Multiple_Chooser( $wp_customize,
    'blogmax_theme_options[latest_posts_category_exclude]',
        array(
            'label'             => esc_html__( 'Select Excluding Categories', 'blogmax' ),
            'section'           => 'blogmax_latest_posts_section',
            'type'              => 'dropdown_multiple_chooser',
            'choices'           =>  blogmax_category_choices(),
            'active_callback'   => 'blogmax_is_latest_posts_section_enable'
        )
    )
);


// latest_post content type control and setting
$wp_customize->add_setting( 'blogmax_theme_options[latest_posts_column]',
    array(
        'default'          	=> $options['latest_posts_column'],
        'sanitize_callback' => 'blogmax_sanitize_select',
    )
);

$wp_customize->add_control( 'blogmax_theme_options[latest_posts_column]',
    array(
        'label'             => esc_html__( 'Column Layout', 'blogmax' ),
        'section'           => 'blogmax_latest_posts_section',
        'type'				=> 'select',
        'active_callback' 	=> 'blogmax_is_latest_posts_section_enable',
        'choices'			=> array( 
            'col-1'		=> esc_html__( 'One Column', 'blogmax' ),
            'col-2'		=> esc_html__( 'Two Column', 'blogmax' ),
            'col-3'		=> esc_html__( 'Three Column', 'blogmax' ),
            'col-4'		=> esc_html__( 'Four Column', 'blogmax' ),
        ),
    )
);