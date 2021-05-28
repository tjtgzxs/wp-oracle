<?php
/**
 * Copyright Info Section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'blog_light_copyright_info_section',
    array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Footer Option', 'blog-light'),
    )
);

/**
 * Field for Copyright
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'blog_light_copyright',
    array(
        'default' => $default['blog_light_copyright'],
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control(
    'blog_light_copyright',
    array(
        'type' => 'text',
        'label' => esc_html__('Copyright', 'blog-light'),
        'section' => 'blog_light_copyright_info_section',
        'priority' => 8
    )
);

