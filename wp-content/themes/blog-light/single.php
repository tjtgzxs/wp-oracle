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

$Show_comment=blog_light_get_option( 'blog_light_show_number_of_comments_option');


get_header(); ?>

	<!-- Start inner pager banner page -->
	<div id="" class="make-inner-banner" style="background-image: url(<?php echo esc_url($blog_light_header_style); ?>);">

		<div class="container">
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
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
<?php }  } ?>

	<!-- Start innerpage content site -->
	<div id="content" class="site-content single-make-page clearfix">
		<div class="container">
			<div class="row">
				<!-- Start primary content area -->
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">



						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content','single' );


                            if($Show_comment=='1') {
								// If comments are open or we have at least one comment, load up the comment template.
								if (comments_open() || get_comments_number()) :
									comments_template();

								endif;
							}

						endwhile; // End of the loop.

						?>
		

					</main><!-- #main -->

				</div><!-- #primary -->

				<aside id="secondary" class="widget-area sidebar" role="complementary">
					<section  class="widget ">
						<?php get_sidebar();?>
					</section>
				</aside>
			</div>
		</div>
	</div>
	
<?php
get_footer();
