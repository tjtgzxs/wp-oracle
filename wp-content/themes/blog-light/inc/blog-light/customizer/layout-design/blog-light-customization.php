<?php
/**
 * Layout/Design Option
 *
 */
$wp_customize->add_panel(
    'blog_light_design_layout_options',
    array(
        'priority' => 7,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__(' Layout/Design Option', 'blog-light'),
    )
);

/*-------------------------------------------------------------------------------------------*/
/**
 * Sidebar Option
 *
 */
$wp_customize->add_section(
    'blog_light_default_sidebar_layout_option',
    array(
        'title' => esc_html__('Default Sidebar Layout Option', 'blog-light'),
        'panel' => 'blog_light_design_layout_options',
        'priority' => 6,
    )
);

/**
 * Sidebar Option
 */
$wp_customize->add_setting(
    'blog_light_sidebar_layout_option',
    array(
        'default' => $default['blog_light_sidebar_layout_option'],
        'sanitize_callback' => 'blog_light_sanitize_select',
    )
);


$layout = blog_light_sidebar_layout();
$wp_customize->add_control('blog_light_sidebar_layout_option',
    array(
        'label' => esc_html__('Default Sidebar Layout', 'blog-light'),
        'description' => esc_html__('Home/front page does not have sidebar. Inner pages like blog, archive single page/post Sidebar Layout. However single page/post sidebar can be overridden.', 'blog-light'),
        'section' => 'blog_light_default_sidebar_layout_option',
        'type' => 'select',
        'choices' => $layout,
        'priority' => 10
    )
);


/*-------------------------------------------------------------------------------------------*/

/**
 * Blog/Archive Layout Option
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'blog_light_blog_archive_layout_option',
    array(
        'title' => esc_html__('Blog/Archive Layout Option', 'blog-light'),
        'panel' => 'blog_light_design_layout_options',
        'priority' => 7,
    )
);


/**
 * Blog Page Title
 */
$wp_customize->add_setting(
    'blog_light_blog_title_option',
    array(
        'default' => $default['blog_light_blog_title_option'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control('blog_light_blog_title_option',
    array(
        'label' => esc_html__('Blog Page Title', 'blog-light'),
        'section' => 'blog_light_blog_archive_layout_option',
        'type' => 'text',
        'priority' => 11
    )
);

/**
 * Blog/Archive excerpt option
 */
$wp_customize->add_setting(
    'blog_light_blog_excerpt_option',
    array(
        'default' => $default['blog_light_blog_excerpt_option'],
        'sanitize_callback' => 'blog_light_sanitize_select',
    )
);
$blogexcerpt = blog_light_blog_excerpt();
$wp_customize->add_control('blog_light_blog_excerpt_option',
    array(
        'choices' => $blogexcerpt,
        'label' => esc_html__('Show Description From', 'blog-light'),
        'section' => 'blog_light_blog_archive_layout_option',
        'type' => 'select',
        'priority' => 8
    )
);

/**
 * Description Length In Words
 */
$wp_customize->add_setting(
    'blog_light_description_length_option',
    array(
        'default' => $default['blog_light_description_length_option'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control('blog_light_description_length_option',
    array(
        'label' => esc_html__('Description Length In Words', 'blog-light'),
        'section' => 'blog_light_blog_archive_layout_option',
        'type' => 'number',
        'priority' => 12
    )
);


/**
 * Blog/Archive Image display options
 */
$wp_customize->add_setting(
    'blog_light_image_display_option',
    array(
        'default'           => $default['blog_light_image_display_option'],
        'sanitize_callback' => 'blog_light_sanitize_select',
    )
);

$image_display_option = blog_light_image_display_option();
$wp_customize->add_control('blog_light_image_display_option',
    array(
        'choices'   => $image_display_option,
        'label'      => esc_html__('Image display options','blog-light'),
        'section'   => 'blog_light_blog_archive_layout_option',
        'type'	  	=> 'select',
        'priority'  => 10
    )
);
/*-------------------------------------------------------------------------------------------*/
/**
 * Feature Image Option
 *
 */
$wp_customize->add_section(
    'blog_light_feature_image_info_option',
    array(
        'title' => esc_html__('Feature Image Option For Single Page/Posts', 'blog-light'),
        'panel' => 'blog_light_design_layout_options',
        'priority' => 6,
    )
);

/**
 * Exclude Categories In Blog/Archive Pages
 */
$wp_customize->add_setting(
    'blog_light_exclude_cat_blog_archive_option',
    array(
        'default' => $default['blog_light_exclude_cat_blog_archive_option'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('blog_light_exclude_cat_blog_archive_option',
    array(
        'label' => esc_html__('Exclude Categories In Blog Page', 'blog-light'),
        'description' => esc_html__('Enter categories ids with comma separated eg: 2,7,14,47. For including all categories left blank', 'blog-light'),
        'section' => 'blog_light_blog_archive_layout_option',
        'type' => 'text',
        'priority' => 13
    )
);
/**
 * Read More Text
 */
$wp_customize->add_setting(
    'blog_light_read_more_text_blog_archive_option',
    array(
        'default' => $default['blog_light_read_more_text_blog_archive_option'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control('blog_light_read_more_text_blog_archive_option',
    array(
        'label' => esc_html__('Read More Text', 'blog-light'),
        'section' => 'blog_light_blog_archive_layout_option',
        'type' => 'text',
        'priority' => 14
    )
);


/**
 *   Show Date
 */
$wp_customize->add_setting(
    'blog_light_blog_show_date_option',
    array(
        'default'           =>  $default['blog_light_blog_show_date_option'],
        'sanitize_callback' => 'blog_light_sanitize_checkbox',
    )
);
$wp_customize->add_control('blog_light_blog_show_date_option',
    array(
        'label'      => esc_html__('  Show Date','blog-light'),
        'section'   => 'blog_light_blog_archive_layout_option',
        'type'	  	=> 'checkbox',
        'priority'  => 21
    )
);

/**
 *   Show Author
 */
$wp_customize->add_setting(
    'blog_light_blog_show_author_option',
    array(
        'default'           => $default['blog_light_blog_show_author_option'],
        'sanitize_callback' => 'blog_light_sanitize_checkbox',
    )
);
$wp_customize->add_control('blog_light_blog_show_author_option',
    array(
        'label'      => esc_html__('Show Author','blog-light'),
        'section'   => 'blog_light_blog_archive_layout_option',
        'type'	  	=> 'checkbox',
        'priority'  => 21
    )
);

/**
 *   Show Cats
 */
$wp_customize->add_setting(
    'blog_light_blog_show_cats_option',
    array(
        'default'           => $default['blog_light_blog_show_cats_option'],
        'sanitize_callback' => 'blog_light_sanitize_checkbox',
    )
);
$wp_customize->add_control('blog_light_blog_show_cats_option',
    array(
        'label'      => esc_html__('Show Cats','blog-light'),
        'section'   => 'blog_light_blog_archive_layout_option',
        'type'	  	=> 'checkbox',
        'priority'  => 21
    )
);

/**
 *   Show Comments
 */
$wp_customize->add_setting(
    'blog_light_blog_show_comments_option',
    array(
        'default'           => $default['blog_light_blog_show_comments_option'],
        'sanitize_callback' => 'blog_light_sanitize_checkbox',
    )
);
$wp_customize->add_control('blog_light_blog_show_comments_option',
    array(
        'label'      => esc_html__(' Show Comments','blog-light'),
        'section'   => 'blog_light_blog_archive_layout_option',
        'type'	  	=> 'checkbox',
        'priority'  => 22
    )
);

/**
 * Feature Image Option Single page
 */
$wp_customize->add_setting(
    'blog_light_show_feature_image_single_option',
    array(
        'default' => $default['blog_light_show_feature_image_single_option'],
        'sanitize_callback' => 'blog_light_sanitize_select',
    )
);

$hide_show_feature_image_option = blog_light_show_feature_image_option();
$wp_customize->add_control(
    'blog_light_show_feature_image_single_option',
    array(
        'type' => 'radio',
        'label' => esc_html__('Show/Hide Feature Image For Single Page/Posts', 'blog-light'),
        'section' => 'blog_light_feature_image_info_option',
        'choices' => $hide_show_feature_image_option,
        'priority' => 5
    )
);


/*-------------------------------------------------------------------------------------------*/
/**
 * Single Post option
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'blog_light_single_post_design_option',
    array(
        'title'		=> esc_html__( 'Single Post Option','blog-light'),
        'panel'     => 'blog_light_design_layout_options',
        'priority'  => 8,
    )
);




/**
 *  Show Categories
 */
$wp_customize->add_setting(
    'blog_light_show_categories_option1',
    array(
        'default'           => $default['blog_light_show_categories_option1'],
        'sanitize_callback' => 'blog_light_sanitize_checkbox',
    )
);
$wp_customize->add_control('blog_light_show_categories_option1',
    array(
        'label'      => esc_html__(' Show Categories','blog-light'),
        'section'   => 'blog_light_single_post_design_option',
        'type'	  	=> 'checkbox',
        'priority'  => 10
    )
);



/**
 *  Show Date
 */
$wp_customize->add_setting(
    'blog_light_show_date_option',
    array(
        'default'           => $default['blog_light_show_date_option'],
        'sanitize_callback' => 'blog_light_sanitize_checkbox',
    )
);
$wp_customize->add_control('blog_light_show_date_option',
    array(
        'label'      => esc_html__('Show Date','blog-light'),
        'section'   => 'blog_light_single_post_design_option',
        'type'	  	=> 'checkbox',
        'priority'  => 10
    )
);

/**
 *  Show Author
 */
$wp_customize->add_setting(
    'blog_light_show_author_option',
    array(
        'default'           => $default['blog_light_show_author_option'],
        'sanitize_callback' => 'blog_light_sanitize_checkbox',
    )
);
$wp_customize->add_control('blog_light_show_author_option',
    array(
        'label'      => esc_html__('Show Author','blog-light'),
        'section'   => 'blog_light_single_post_design_option',
        'type'	  	=> 'checkbox',
        'priority'  => 10
    )
);
/**
 *  Show Comments
 */
$wp_customize->add_setting(
    'blog_light_show_number_of_comments_option',
    array(
        'default'           => $default['blog_light_show_number_of_comments_option'],
        'sanitize_callback' => 'blog_light_sanitize_checkbox',
    )
);
$wp_customize->add_control('blog_light_show_number_of_comments_option',
    array(
        'label'      => esc_html__('Show Comments','blog-light'),
        'section'   => 'blog_light_single_post_design_option',
        'type'	  	=> 'checkbox',
        'priority'  => 10
    )
);



/*******************page option**************************/
$wp_customize->add_section(
    'blog_light_page_option',
    array(
        'title' => esc_html__('Page Option', 'blog-light'),
        'panel' => 'blog_light_design_layout_options',
        'priority' => 22,
    )
);



/**
 * Feature Image Option page
 */
$wp_customize->add_setting(
    'blog_light_show_feature_image_page_option',
    array(
        'default' => $default['blog_light_show_feature_image_page_option'],
        'sanitize_callback' => 'blog_light_sanitize_select',
    )
);

$hide_show_feature_image_option = blog_light_show_feature_image_option();
$wp_customize->add_control(
    'blog_light_show_feature_image_page_option',
    array(
        'type' => 'radio',
        'label' => esc_html__('Show/Hide Feature Image For  page', 'blog-light'),
        'section' => 'blog_light_page_option',
        'choices' => $hide_show_feature_image_option,
        'priority' => 5
    )
);

/**
 * Blog/Archive Image display options
 */
$wp_customize->add_setting(
    'blog_light_image_display_option_page',
    array(
        'default'           => $default['blog_light_image_display_option'],
        'sanitize_callback' => 'blog_light_sanitize_select',
    )
);

$image_display_option = blog_light_image_display_option();
$wp_customize->add_control('blog_light_image_display_option_page',
    array(
        'choices'   => $image_display_option,
        'label'      => esc_html__('Image display options','blog-light'),
        'section'   => 'blog_light_page_option',
        'type'	  	=> 'select',
        'priority'  => 10
    )
);

/**
 * page excerpt option
 */
$wp_customize->add_setting(
    'blog_light_blog_excerpt_page_option',
    array(
        'default' => $default['blog_light_blog_excerpt_page_option'],
        'sanitize_callback' => 'blog_light_sanitize_select',
    )
);
$blogexcerpt = blog_light_page_excerpt();
$wp_customize->add_control('blog_light_blog_excerpt_page_option',
    array(
        'choices' => $blogexcerpt,
        'label' => esc_html__('Show Description From', 'blog-light'),
        'section' => 'blog_light_page_option',
        'type' => 'select',
        'priority' => 8
    )
);

/**
 * Number of words in contents
 */
$wp_customize->add_setting(
    'blog_light_number_of_words_show_page_option',
    array(
        'default'           => $default['blog_light_number_of_words_show_option'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control('blog_light_number_of_words_show_page_option',
    array(
        'label'      => esc_html__('Number of words in contents related Posts','blog-light'),
        'section'   => 'blog_light_page_option',
        'type'	  	=> 'number',
        'priority'  => 10
    )
);



	