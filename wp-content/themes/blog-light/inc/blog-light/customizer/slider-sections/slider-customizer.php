<?php
/**
 * HomePage Settings Panel on customizer
 */
$wp_customize->add_panel(
    'blog_light_homepage_settings_panel',
    array(
        'priority' => 5,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('HomePage Slider Settings', 'blog-light'),
    )
);

/*-------------------------------------------------------------------------------------------------*/
/**
 * Slider Section
 *
 */
$wp_customize->add_section(
    'blog_light_slider_section',
    array(
        'title' => esc_html__('Slider Section', 'blog-light'),
        'panel' => 'blog_light_homepage_settings_panel',
        'priority' => 6,
    )
);

/**
 * Show/Hide option for Homepage Slider Section
 *
 */

$wp_customize->add_setting(
    'blog_light_homepage_slider_option',
    array(
        'default' => $default['blog_light_homepage_slider_option'],
        'sanitize_callback' => 'blog_light_sanitize_select',
    )
);
$hide_show_option = blog_light_slider_option();
$wp_customize->add_control(
    'blog_light_homepage_slider_option',
    array(
        'type' => 'radio',
        'label' => esc_html__('Slider Option', 'blog-light'),
        'description' => esc_html__('Show/hide option for homepage Slider Section.', 'blog-light'),
        'section' => 'blog_light_slider_section',
        'choices' => $hide_show_option,
        'priority' => 7
    )
);

/**
 * Dropdown available category for homepage slider
 *
 */


$wp_customize->add_setting(
    'blog_light_slider_cat_id',
    array(
        'default' => $default['blog_light_slider_cat_id'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(new blog_light_Customize_Category_Control(
        $wp_customize,
        'blog_light_slider_cat_id',
        array(
            'label' => esc_html__('Slider Category', 'blog-light'),
            'description' => esc_html__('Select Category for Homepage Slider Section', 'blog-light'),
            'section' => 'blog_light_slider_section',
            'priority' => 8,

        )
    )
);
/**
 * Field for no of posts to display..
 *
 */
$wp_customize->add_setting(
    'blog_light_no_of_slider',
    array(
        'default' => $default['blog_light_no_of_slider'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'blog_light_no_of_slider',
    array(
        'type' => 'number',
        'label' => esc_html__('No of Slider', 'blog-light'),
        'section' => 'blog_light_slider_section',
        'priority' => 10
    )
);


	