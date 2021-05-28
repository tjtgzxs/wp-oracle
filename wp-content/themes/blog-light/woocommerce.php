<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bussiness Epic
 */
global $blog_light_header_image,$blog_light_header_style;
$blog_light_header_image = get_header_image();

if( $blog_light_header_image ){
    $blog_light_header_style = $blog_light_header_image;

} else{

    $blog_light_header_style = '';
}


$blog_light_breadcrump_option = blog_light_get_option('blog_light_breadcrumb_setting_option');
$blog_light_hide_breadcrump_option = blog_light_get_option('blog_light_hide_breadcrumb_front_page_option');
$blog_light_designlayout = get_post_meta(get_the_ID(), 'blog_light_sidebar_layout', true  );


if( ($blog_light_hide_breadcrump_option== 1 && is_front_page()) || !is_front_page())
{

    get_header(); ?>

    <!-- Start inner pager banner page -->
    <div id="" class="make-inner-banner" style="background-image: url(<?php echo esc_url($blog_light_header_style); ?>);">
        <div class="container">
            <header class="entry-header">
                <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );

                ?>
            </header>
        </div>
    </div>
    <!-- End inner pager banner page -->

    <!-- Start breadcrumb section -->
    <?php
    if (function_exists('bcn_display')) {

        if ($blog_light_breadcrump_option == "enable") {
            ?>
            <div class="breadcrumbs">
                <div class="container">

                    <?php global $post_id;
                    blog_light_breadcrumb_type($post_id); ?>

                </div>
            </div>
        <?php }  } } ?>
    <!-- End breadcrumb section -->

    <!-- Start innerpage content site -->
    <div id="content" class="site-content single-make-page">
        <div class="container  clearfix">
            <div class="row">
                <!-- Start primary content area -->
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">

                        <?php if ( have_posts() ) :
                            woocommerce_content();
                        endif;
                        ?>
                    </main><!-- #main -->
                </div><!-- #primary -->

                <aside id="sidebar-primary" class="widget-area sidebar" role="complementary">
                    <section  class="widget ">
                        <?php get_sidebar();?>
                    </section>
                </aside>

            </div>
        </div>
    </div>

<?php

get_footer();
