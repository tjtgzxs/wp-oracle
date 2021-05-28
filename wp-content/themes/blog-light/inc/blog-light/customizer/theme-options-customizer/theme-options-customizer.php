<?php
/**
 * Theme Option
 *
 * @since 1.0.0
 */
 $wp_customize-> add_panel(
    'blog_light_theme_options',
    array(
        'priority' => 7,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Theme Option', 'blog-light'),
    )
);


/*-------------------------------------------------------------------------------------------*/
/**
 * Hide Static page in Home page
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'blog_light_front_page_option',
    array(
        'title' => esc_html__('Front Page Options', 'blog-light'),
        'panel' => 'blog_light_theme_options',
        'priority' => 6,
    )
);



/*-------------------------------------------------------------------------------------------*/
/**
 * Breadcrumb Options
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'blog_light_breadcrumb_option',
    array(
        'title' => esc_html__('Breadcrumb Options', 'blog-light'),
        'panel' => 'blog_light_theme_options',
        'priority' => 6,
    )
);

/**
 * Breadcrumb Option
 */
$wp_customize->add_setting(
    'blog_light_breadcrumb_setting_option',
    array(
        'default' => $default['blog_light_breadcrumb_setting_option'],
        'sanitize_callback' => 'blog_light_sanitize_select',
        'transport' => 'refresh'

    )
);
$hide_show_breadcrumb_option = blog_light_show_breadcrumb_option();
$wp_customize->add_control('blog_light_breadcrumb_setting_option',
    array(
        'label' => esc_html__('Breadcrumb Options', 'blog-light'),
        'section' => 'blog_light_breadcrumb_option',
        'choices' => $hide_show_breadcrumb_option,
        'type' => 'select',
        'priority' => 10
    )
);




/*
 * Pagination Options
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'blog_light_pagination_option',
    array(
        'title'		=> esc_html__('Pagination Options','blog-light'),
        'panel'     => 'blog_light_theme_options',
        'priority'  => 12,
    )
);

/**
 *Pagination Options
 */
$wp_customize->add_setting(
    'blog_light_post_pagination_option',
    array(
        'default'           =>  $default['blog_light_post_pagination_option'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'
    )
);
$pagination_option = blog_light_pagination_option();
$wp_customize->add_control('blog_light_post_pagination_option',
    array(
        'label'      => esc_html__('Pagination Options','blog-light'),
        'description'    => sprintf( esc_html__( 'Blog and Archive Pages Pagination', 'blog-light' )),
        'section'   => 'blog_light_pagination_option',
        'type'	  	=> 'select',
        'choices'   => $pagination_option,
        'priority'  => 12
    )
);
/*-------------------------------------------------------------------------------------------*/
/**
 * Search Placeholder
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'blog_light_search_option',
    array(
        'title' => esc_html__('Search', 'blog-light'),
        'panel' => 'blog_light_theme_options',
        'priority' => 12,
    )
);

/**
 *Search Placeholder
 */
$wp_customize->add_setting(
    'blog_light_post_search_placeholder_option',
    array(
        'default' => $default['blog_light_post_search_placeholder_option'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh'

    )
);

$wp_customize->add_control('blog_light_post_search_placeholder_option',
    array(
        'label' => esc_html__('Search Placeholder', 'blog-light'),
        'section' => 'blog_light_search_option',
        'type' => 'text',
        'priority' => 10
    )
);
