<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package blog light
 */

if ( ! function_exists( 'blog_light_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function blog_light_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'blog-light' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'blog_light_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function blog_light_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'blog-light' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat_list">' . esc_html__( '%1$s','blog-light') . '</span>', $categories_list );  // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'blog-light' ) );
		
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		$comment_blog = blog_light_get_option( 'blog_light_blog_show_comments_option');
		if(!empty($comment_blog)) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
					/* translators: %s: post title */
						__('<i class="fa fa-comment" aria-hidden="true"></i><span class="screen-reader-text"> on %s</span>', 'blog-light'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

	}

	edit_post_link(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Edit <span class="screen-reader-text">%s</span>', 'blog-light' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

//catories list
if (!function_exists('blog_light_get_category')) :
	function blog_light_get_category($post_id = 0)
	{

		if (0 == $post_id) {
			global $post;
			$post_id = $post->ID;
		}
		$categories = get_the_category($post_id);
		$output = '';
		$separator = ' ';
		if ($categories) {
			$output .= '<span class="cat-links">';
			foreach ($categories as $category) {
				$output .= '<a class="at-cat-name-' . esc_attr($category->term_id) . '" href="' . esc_url(get_category_link($category->term_id)) . '"  rel="category tag">' . esc_html($category->cat_name) . '</a>' . $separator;

			}
			echo $output;
			$output .= '</span>';
			return $output;

		}
	}
endif;
