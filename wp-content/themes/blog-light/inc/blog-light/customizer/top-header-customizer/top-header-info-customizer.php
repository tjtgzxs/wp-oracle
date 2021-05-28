<?php
/**
 * Blog Light Header Info Section
 *
 */
$wp_customize->add_section(
    'blog_light_top_header_info_section',
    array(
        'priority' => 6,
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Top Header Info', 'blog-light'),
    )
);

$wp_customize->add_setting(
    'blog_light_top_header_section',
    array(
        'default' => $default['blog_light_top_header_section'],
        'sanitize_callback' => 'blog_light_sanitize_select',
    )
);

$hide_show_top_header_option = blog_light_slider_option();
$wp_customize->add_control(
    'blog_light_top_header_section',
    array(
        'type' => 'radio',
        'label' => esc_html__('Top Header Info Option', 'blog-light'),
        'description' => esc_html__('Show/hide Option for Top Header Info Section.', 'blog-light'),
        'section' => 'blog_light_top_header_info_section',
        'choices' => $hide_show_top_header_option,
        'priority' => 5
    )
);




/**
 *   Show/Hide Social Link
 */
$wp_customize->add_setting(
    'blog_light_social_link_hide_option',
    array(
        'default' => $default['blog_light_social_link_hide_option'],
        'sanitize_callback' => 'blog_light_sanitize_checkbox',
    )
);
$wp_customize->add_control('blog_light_social_link_hide_option',
    array(
        'label' => esc_html__('Hide/Show Social Menu', 'blog-light'),
        'section' => 'blog_light_top_header_info_section',
        'type' => 'checkbox',
        'priority' => 10
    )
);