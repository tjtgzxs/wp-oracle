<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blog light
 */
$hide_show_feature_image_page=blog_light_get_option( 'blog_light_show_feature_image_page_option');
$page_display_image_size= blog_light_get_option( 'blog_light_image_display_option_page');
?>
<article id="post-<?php the_ID(); ?>"
		 class="post type-post status-publish has-post-thumbnail hentry" <?php post_class(); ?>>


	<figure>
		<div class="view hm-zoom">
			<a href="<?php the_permalink(); ?>">
				<?php

				if (has_post_thumbnail() && $hide_show_feature_image_page == 'show') {
					the_post_thumbnail($page_display_image_size, array('class' => 'img-fluid'));
				}
				?>

				<div class="mask flex-center">

				</div>
			</a>
		</div>
	</figure>
	<header class="entry-header">
		<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	</header>

	<div class="entry-content">
		<?php


		the_content();

		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'blog-light'),
			'after' => '</div>',
		));

		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->


