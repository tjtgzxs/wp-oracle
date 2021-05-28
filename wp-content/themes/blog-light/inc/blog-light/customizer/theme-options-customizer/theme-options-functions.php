<?php
/**
 * Breadcrumb  display option options
 * @param null
 * @return array $blog_light_show_breadcrumb_option
 *
 */
if (!function_exists('blog_light_show_breadcrumb_option')) :
    function blog_light_show_breadcrumb_option()
    {
        $blog_light_show_breadcrumb_option = array(
            'enable' => esc_html__('Enable', 'blog-light'),
            'disable' => esc_html__('Disable', 'blog-light')
        );
        return apply_filters('blog_light_show_breadcrumb_option', $blog_light_show_breadcrumb_option);
    }
endif;


/**
 * Reset Option
 *
 *
 * @param null
 * @return array $blog_light_reset_option
 *
 */
if (!function_exists('blog_light_reset_option')) :
    function blog_light_reset_option()
    {
        $blog_light_reset_option = array(
            'do-not-reset' => esc_html__('Do Not Reset', 'blog-light'),
            'reset-all' => esc_html__('Reset All', 'blog-light'),
        );
        return apply_filters('blog_light_reset_option', $blog_light_reset_option);
    }
endif;



/**
 * Sanitize Multiple Category
 * =====================================
 */

if ( !function_exists('blog_light_sanitize_multiple_category') ) :

    function blog_light_sanitize_multiple_category( $values )
    {

        $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

        return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
    }

endif;

/**
 * Pagination option
 *
 * @since Blog Light 1.0.0
 *
 * @param null
 * @return array $blog_light_pagination_option
 *
 */
if (!function_exists('blog_light_pagination_option')) :
    function blog_light_pagination_option()
    {
        $blog_light_pagination_option = array(
            'default' 	=> esc_html__( 'Default','blog-light'),
            'numeric' 	=> esc_html__( 'Numeric','blog-light'),
        );
        return apply_filters('blog_light_reset_option', $blog_light_pagination_option);
    }
endif;

