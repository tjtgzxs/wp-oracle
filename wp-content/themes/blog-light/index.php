<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blog light
 */

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
 * @package blog light
 */
global $blog_light_header_image, $blog_light_header_style;
$blog_light_header_image = get_header_image();

if ($blog_light_header_image) {
    $blog_light_header_style = $blog_light_header_image;

} else {

    $blog_light_header_style = '';
}
$blog_page_title = blog_light_get_option('blog_light_blog_title_option');
$blog_light_navigation = blog_light_get_option('blog_light_post_pagination_option');


get_header(); ?>



<!-- End Home Page widget Area -->
<div class="slider-section">
    <?php
    $blog_light_slider_section_option = blog_light_get_option('blog_light_homepage_slider_option');
    if ($blog_light_slider_section_option != 'hide') {

        $blog_light_slider_section_cat_id = blog_light_get_option('blog_light_slider_cat_id');

        $blog_light_get_started_text = blog_light_get_option('blog_light_slider_get_started_txt');

        $blog_light_get_started_text_link = blog_light_get_option('blog_light_slider_get_started_link');

        $blog_light_slider_category = get_category($blog_light_slider_section_cat_id);

        if (!empty($blog_light_slider_section_cat_id)) {
            $count = $blog_light_slider_category->category_count;
            $no_of_slider = blog_light_get_option('blog_light_no_of_slider');

            if ($count > 0 && $no_of_slider > 0) {

                $i = 0;
                if (!empty($blog_light_slider_section_cat_id)) {
                    $blog_light_home_slider_section = array('cat' => $blog_light_slider_section_cat_id, 'posts_per_page' => $no_of_slider);
                    $blog_light_home_slider_section_query = new WP_Query($blog_light_home_slider_section);
                    if ($blog_light_home_slider_section_query->have_posts()) {
                        while ($blog_light_home_slider_section_query->have_posts()) {
                            $blog_light_home_slider_section_query->the_post();


                            ?>

                            <div class="blog-light-inner">

                                <div class="blog-light-image">
                                    <a href="#">

                                        <?php if (has_post_thumbnail()) {
                                            $image_id = get_post_thumbnail_id();
                                            $image_url = wp_get_attachment_image_src($image_id, 'full', true); ?>
                                            <img src="<?php echo esc_url($image_url[0]); ?>" class="img-responsive"
                                                 alt="<?php the_title_attribute(); ?>">
                                        <?php } ?> </a>
                                    <div class="blog-light-content">
			<span class="blog-date-entry-date">
				<?php echo esc_html(get_the_date()) ; ?>
			</span>
                                        <h2><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
                                    </div>
                                </div>

                            </div>

                            <?php
                            $i++;
                        }

                    }
                    wp_reset_postdata();
                }
            }
        }
    }


    ?>
    <!-- End Featured Slider -->


</div>
<!--  -->

<!-- Start Home Page widget Area -->
<div id="home-page-widget-area" class="widget">

    <?php dynamic_sidebar('homepage_widgets'); ?>

</div>

<!-- Start innerpage content site -->
<div id="content" class="site-content single-make-page">
    <div class="container  clearfix">
        <div class="row">
            <!-- Start primary content area -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <?php
                    if (have_posts()) :
                        /* Start the Loop */
                        while (have_posts()) : the_post();
                            {
                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part('template-parts/content', get_post_format());
                            }

                        endwhile;
                        wp_reset_postdata();
                        if ($blog_light_navigation == 'numeric') {
                            the_posts_pagination();
                        } else {
                            the_posts_navigation();
                        }

                    else :
                        get_template_part('template-parts/content', 'none');
                    endif; ?>
                </main><!-- #main -->
            </div><!-- #primary -->

            <aside id="secondary" class="widget-area sidebar" role="complementary">
                <section class="widget ">
                    <?php get_sidebar(); ?>
                </section>
            </aside>

        </div>
    </div>
</div>

<!-- Start Home Page widget Area -->
<div id="home-page-widget-area" class="widget">

    <?php dynamic_sidebar('footer40'); ?>


</div>

</div>
</div>

<?php
get_footer();
?>

