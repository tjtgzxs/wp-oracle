<?php
/**
 * Functions for get_theme_mod()
 *
 
 */
if (!function_exists('blog_light_get_option')) :

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function blog_light_get_option($key = '')
    {
        if (empty($key)) {
            return;
        }
        $blog_light_default_options = blog_light_get_default_theme_options();

        $default = (isset($blog_light_default_options[$key])) ? $blog_light_default_options[$key] : '';

        $theme_option = get_theme_mod($key, $default);

        return $theme_option;

    }

endif;

