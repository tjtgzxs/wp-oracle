<?php
/**
 * Blog Light default theme options.
 *
 * 
 * @subpackage Blog Light
 */

if ( !function_exists('blog_light_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function blog_light_get_default_theme_options()
    {

        $default = array();

        // Homepage Slider Section

		// Homepage Slider Section
		$default['blog_light_homepage_slider_option'] = 'hide';
		$default['blog_light_slider_cat_id'] = 0;
		$default['blog_light_no_of_slider'] = 3;
		



		$default['blog_light_homepage_slider_option'] = 'hide';
        $default['blog_light_slider_cat_id'] = 0;
        $default['blog_light_no_of_slider'] = 3;
	    $default['blog_light_slider_character_limit']=15;
        $default['blog_light_slider_get_started_txt'] = esc_html__('Get Started!', 'blog-light');
        $default['blog_light_slider_get_started_link'] = '#';
	    $default['blog_light_slider_know_more_txt']=esc_html__('Know More', 'blog-light');
	    $default['blog_light_slider_know_more_link']='#';

        // footer copyright.
        $default['blog_light_copyright'] = esc_html__('Copyright All Rights Reserved', 'blog-light');
        $default['blog_light_power_by'] = esc_html__('Design And Develop by Themes Make', 'blog-light');

        // Home Page Top header Info.
        $default['blog_light_top_header_section'] = 'hide';
        $default['blog_light_top_header_section_phone_number_icon'] = 'fa-phone';
        $default['blog_light_top_header_phone_no'] = '';
        $default['blog_light_email_icon'] = 'fa-envelope-o';
        $default['blog_light_top_header_email'] = '';
        $default['blog_light_social_link_hide_option'] = 0;

        // Blog.
        $default['blog_light_sidebar_layout_option'] = 'right-sidebar';
        $default['blog_light_blog_title_option'] = esc_html__('Latest Blog', 'blog-light');
        $default['blog_light_blog_excerpt_option'] = 'excerpt';
        $default['blog_light_description_length_option'] = 30;
        $default['blog_light_exclude_cat_blog_archive_option'] = '';
        $default['blog_light_read_more_text_blog_archive_option']=esc_html__('Continue Reading', 'blog-light');
        $default['blog_light_exclude_cat_blog_archive_option']='';
        $default['blog_light_image_display_option']='full';
        $default['blog_light_blog_show_date_option'] = 1;
        $default['blog_light_blog_show_author_option'] = 1;
        $default['blog_light_blog_show_cats_option'] = 1;
        $default['blog_light_blog_show_comments_option'] = 1;

        //related post
	    $default['blog_light_post_pagination_option']='numeric';
	    $default['blog_light_number_of_post_show_option']=3;
	    $default['blog_light_number_of_words_show_option']=15;
	    $default['blog_light_show_categories_option1']=1;
	    $default['blog_light_show_date_option']=1;
	    $default['blog_light_show_number_of_comments_option']=1;
	    $default['blog_light_show_feature_image_page_option']='show';
	    $default['blog_light_blog_excerpt_page_option']='full-content';

        $default['blog_light_show_author_option']='1';


        

        // Details page.
        $default['blog_light_show_feature_image_single_option'] = 'show';

        // Color Option.
      
        $default['blog_light_front_page_hide_option'] = 0;
        $default['blog_light_breadcrumb_setting_option'] = 'enable';
        $default['blog_light_post_search_placeholder_option'] = esc_html__('Search', 'blog-light');
        $default['blog_light_color_reset_option'] = 'do-not-reset';





	    // Pass through filter.
        $default = apply_filters( 'blog_light_get_default_theme_options', $default );
        return $default;
    }
endif;
