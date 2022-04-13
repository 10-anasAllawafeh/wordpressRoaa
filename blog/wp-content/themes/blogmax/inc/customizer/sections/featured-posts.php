<?php
/**
 * Featured Posts Section options
 *
 * @package Theme Palace
 * @subpackage Blogmax
 * @since Blogmax 1.0.0
 */

// Add Featured Posts section
$wp_customize->add_section( 'blogmax_featured_posts_section',
    array(
        'title'             => esc_html__( 'Featured Posts','blogmax' ),
        'description'       => esc_html__( 'Featured Posts Section options.', 'blogmax' ),
        'panel'             => 'blogmax_front_page_panel',
    )
);

// Featured Posts content enable control and setting
$wp_customize->add_setting( 'blogmax_theme_options[featured_posts_section_enable]',
    array(
        'default'           =>  $options['featured_posts_section_enable'],
        'sanitize_callback' => 'blogmax_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Blogmax_Switch_Control( $wp_customize,
    'blogmax_theme_options[featured_posts_section_enable]',
        array(
            'label'             => esc_html__( 'Featured Posts Section Enable', 'blogmax' ),
            'section'           => 'blogmax_featured_posts_section',
            'on_off_label'      => blogmax_switch_options(),
        )
    )
);

// featured_posts section sub title control and setting
$wp_customize->add_setting('blogmax_theme_options[featured_posts_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
        'default'  => $options['featured_posts_title'],
    )
);

$wp_customize->add_control('blogmax_theme_options[featured_posts_title]',
    array(
        'label' => esc_html__('Section Title', 'blogmax'),
        'section' => 'blogmax_featured_posts_section',
        'type' => 'text',
        'active_callback' => 'blogmax_is_featured_posts_section_enable',
    )
);

$wp_customize->selective_refresh->add_partial('blogmax_theme_options[featured_posts_title]',
    array(
        'selector' => '#blogmax_featured_posts_section .section-title',
        'render_callback' => 'blogmax_featured_posts_title_partial',
    )
);

// featured_posts section sub title control and setting
$wp_customize->add_setting('blogmax_theme_options[featured_posts_description]',
    array(
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'postMessage',
        'default'  => $options['featured_posts_description'],
    )
);

$wp_customize->add_control('blogmax_theme_options[featured_posts_description]',
    array(
        'label' => esc_html__('Section Description', 'blogmax'),
        'section' => 'blogmax_featured_posts_section',
        'type' => 'textarea',
        'active_callback' => 'blogmax_is_featured_posts_section_enable',
    )
);

$wp_customize->selective_refresh->add_partial('blogmax_theme_options[featured_posts_description]',
    array(
        'selector' => '#blogmax_featured_posts_section .section-content p',
        'render_callback' => 'blogmax_featured_posts_description_partial',
    )
);

// Add dropdown category setting and control.
$wp_customize->add_setting(  'blogmax_theme_options[featured_posts_content_category]',
    array(
        'sanitize_callback' => 'blogmax_sanitize_single_category',
    )
);

$wp_customize->add_control( new Blogmax_Dropdown_Taxonomies_Control( $wp_customize,
    'blogmax_theme_options[featured_posts_content_category]',
        array(
            'label'             => esc_html__( 'Select Category', 'blogmax' ),
            'description'       => esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'blogmax' ),
            'section'           => 'blogmax_featured_posts_section',
            'type'              => 'dropdown-taxonomies',
            'active_callback'   => 'blogmax_is_featured_posts_section_enable'
        )
    )
);


// Popular Post Read More content setting
$wp_customize->add_setting('blogmax_theme_options[featured_posts_read_more_btn_label]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['featured_posts_read_more_btn_label']

    )
);

$wp_customize->add_control('blogmax_theme_options[featured_posts_read_more_btn_label]',
    array(
        'section'			=> 'blogmax_featured_posts_section',
        'label'				=> esc_html__( 'Read More Button Label', 'blogmax' ),
        'type'          	=>'text',
        'active_callback'	=> 'blogmax_is_featured_posts_section_enable'
    )
);


// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'blogmax_theme_options[featured_posts_read_more_btn_label]',
        array(
            'selector'            => '#blogmax_featured_posts_section div.read-more a',
            'settings'            => 'blogmax_theme_options[featured_posts_read_more_btn_label]',
            'fallback_refresh'    => true,
            'container_inclusive' => false,
            'render_callback'     => 'blogmax_featured_posts_read_more_btn_label_partial',
        ) 
    );
}


// Slider Excerpt length setting and control.
$wp_customize->add_setting( 'blogmax_theme_options[featured_posts_excerpt_length]', 
	array(
		'sanitize_callback' => 'blogmax_sanitize_number_range',
		'default'			=> $options['featured_posts_excerpt_length'],
	)
);

$wp_customize->add_control( 'blogmax_theme_options[featured_posts_excerpt_length]',
	array(
		'label'       		=> esc_html__( 'Excerpt Length', 'blogmax' ),
		'description' 		=> esc_html__( 'Total words to be displayed in featured posts section', 'blogmax' ),
		'section'     		=> 'blogmax_featured_posts_section',
		'type'        		=> 'number',
		'active_callback' 	=> 'blogmax_is_featured_posts_section_enable',
	)
);