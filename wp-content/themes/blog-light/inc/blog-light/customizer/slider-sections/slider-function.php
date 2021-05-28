<?php

/**
 * Slider  options
 * @param null
 * @return array $blog_light_slider_option
 *
 */
if (!function_exists('blog_light_slider_option')) :
    function blog_light_slider_option()
    {
        $blog_light_slider_option = array(
            'show' => esc_html__('Show', 'blog-light'),
            'hide' => esc_html__('Hide', 'blog-light')
        );
        return apply_filters('blog_light_slider_option', $blog_light_slider_option);
    }
endif;