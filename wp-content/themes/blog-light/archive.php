<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blog-light
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
global $blog_light_header_image,$blog_light_header_style;
$blog_light_header_image = get_header_image();

if( $blog_light_header_image ){
	$blog_light_header_style = $blog_light_header_image;

} else{

	$blog_light_header_style = '';
}

$blog_light_breadcrump_option = blog_light_get_option('blog_light_breadcrumb_setting_option');


get_header(); ?>

	<!-- Start inner pager banner page -->
	<div id="" class="make-inner-banner" style="background-image: url(<?php echo esc_url($blog_light_header_style);?>);">
		<div class="container">
		<header class="entry-header">
				<div class="entry-title"><header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header --></div>
			</header>
		</div>
	</div>
	<!-- End inner pager banner page -->



<!--eadcrumb section -->
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
	<?php }  } ?>

	<!-- Start innerpage content site -->
	<div id="content" class="site-content single-make-page clearfix">
	<div class="container">
	<div class="row">
	<!-- Start primary content area -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">




			<?php
			if (have_posts()) :
				/* Start the Loop */
				while (have_posts()) : the_post();

					/*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
					get_template_part('template-parts/content', get_post_format());

				endwhile;

				the_posts_navigation();

			else :

				get_template_part('template-parts/content', 'none');

			endif; ?>



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

