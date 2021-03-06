<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blog light
 */

?>

<section class="no-results not-found">
	<article id="post-<?php the_ID(); ?>"class="post type-post status-publish has-post-thumbnail hentry" <?php post_class(); ?>>
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'blog-light' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'blog-light' ); ?></p>
			<?php
			get_search_form();

		endif; ?>
	</div><!-- .page-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
</section><!-- .no-results -->
