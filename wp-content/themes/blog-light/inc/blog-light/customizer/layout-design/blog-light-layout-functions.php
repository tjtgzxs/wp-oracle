<?php
if (!function_exists('blog_light_sidebar_layout')) :
    function blog_light_sidebar_layout()
    {
        $blog_light_sidebar_layout = array(
            'right-sidebar' => esc_html__('Right Sidebar', 'blog-light'),
            'left-sidebar' => esc_html__('Left Sidebar', 'blog-light'),
            'no-sidebar' => esc_html__('No Sidebar', 'blog-light'),
        );
        return apply_filters('blog_light_sidebar_layout', $blog_light_sidebar_layout);
    }
endif;

/**
 * Blog/Archive Description Option
 *
 * @since Blog Light 1.0.0
 *
 *
 * 
 * @param null
 * @return array $blog_light_blog_excerpt
 *
 */
if (!function_exists('blog_light_blog_excerpt')) :
    function blog_light_blog_excerpt()
    {
        $blog_light_blog_excerpt = array(
            'excerpt' => esc_html__('Excerpt', 'blog-light'),
            'content' => esc_html__('Content', 'blog-light'),

        );
        return apply_filters('blog_light_blog_excerpt', $blog_light_blog_excerpt);
    }
endif;

/**
 * Show/Hide Feature Image  options
 *
 * @since Blog Light 1.0.0
 *
 * @param null
 * @return array $blog_light_show_feature_image_option
 *
 */
if (!function_exists('blog_light_show_feature_image_option')) :
    function blog_light_show_feature_image_option()
    {
        $blog_light_show_feature_image_option = array(
            'show' => esc_html__('Show', 'blog-light'),
            'hide' => esc_html__('Hide', 'blog-light')
        );
        return apply_filters('blog_light_show_feature_image_option', $blog_light_show_feature_image_option);
    }
endif;
/**
 * Blog Light select_number of columns option
 *
 * @since Blog Light 1.0.0
 *
 * @param null
 * @return array $blog_light_select_number_of_columns_option
 *
 */
if (!function_exists('blog_light_select_number_of_columns_option')) :
    function blog_light_select_number_of_columns_option()
    {
        $blog_light_select_number_of_columns_option = array(
            'col-sm-12' 	=> esc_html__( '1 Columns','blog-light'),
            'col-sm-6' 	=> esc_html__( '2 Columns','blog-light'),
        );
        return apply_filters('blog_light_select_number_of_columns_option', $blog_light_select_number_of_columns_option);
    }
endif;
/**
 * Blog Image  size option
 *
 * @since Blog Light 1.0.0
 *
 * @param null
 * @return array blog_light_image_display_option
 *
 */
if (!function_exists('blog_light_image_display_option')) :
    function blog_light_image_display_option()
    {
        $blog_light_image_display_option = array(
            'thumbnail'  => esc_html__( 'Thumbnail (150x150)' ,'blog-light'),
            'medium'  => esc_html__( 'Medium (640x426)' ,'blog-light'),
            'large'    => esc_html__( 'Large (1024x1024)','blog-light'),
            'full'    => esc_html__( 'Full (original)','blog-light'),
            'post-thumbnail'    => esc_html__( 'Post Thumbnail (340x240)','blog-light')
        );
        return apply_filters('blog_light_image_display_option', $blog_light_image_display_option);
    }
endif;


/**
 * for page
 *
 * @since Blog Light 1.0.0
 *
 *
 *
 * @param null
 * @return array $blog_light_blog_excerpt
 *
 */
if (!function_exists('blog_light_page_excerp')) :
    function blog_light_page_excerpt()
    {
        $blog_light_page_excerpt = array(
            'define-word' => esc_html__('Content with define word ', 'blog-light'),
            'full-content' => esc_html__('Full Content', 'blog-light'),

        );
        return apply_filters('function blog_light_page_excerpt', $blog_light_page_excerpt);
    }
endif;


