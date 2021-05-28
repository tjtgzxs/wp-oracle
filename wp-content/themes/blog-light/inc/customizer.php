<?php
/**
 * Theme Customizer
 *
 * @package blog light
 */
require get_template_directory() . '/inc/customizer-pro/class-customize.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blog_light_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $default=blog_light_get_default_theme_options();
	require get_template_directory() . '/inc/blog-light/customizer/slider-sections/slider-customizer.php';
	require get_template_directory() . '/inc/blog-light/customizer/top-header-customizer/top-header-info-customizer.php';
	require get_template_directory() . '/inc/blog-light/customizer/layout-design/blog-light-customization.php';
	require get_template_directory() . '/inc/blog-light/customizer/theme-options-customizer/theme-options-customizer.php';
	require get_template_directory() . '/inc/blog-light/customizer/footer-option/footer-option-customizer.php';


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'blog_light_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'blog_light_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'blog_light_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blog_light_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blog_light_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blog_light_customize_preview_js() {
	wp_enqueue_script( 'blog-light-customizer', get_template_directory_uri() . '/propoties/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blog_light_customize_preview_js' );
