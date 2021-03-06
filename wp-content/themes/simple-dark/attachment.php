<?php
/**
 * The template for displaying attachment
 *
 * @package SimpleDark
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper" id="single-wrapper">

	<div class="container" id="content" tabindex="-1">

		<div class="row">

			<div class="col content-area" id="primary">

			<main class="site-main" id="main">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-3 border-bottom' ); ?>>

				<header class="entry-header">

					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

					<div class="entry-meta border-bottom pb-1 mb-3">

						<?php simpledark_posted_on(); ?>

					</div><!-- .entry-meta -->

				</header>

				<div class="entry-content">

					<div class="entry-attachment">
						<?php if ( wp_attachment_is_image( $post->ID ) ) : $att_image = wp_get_attachment_image_src( $post->ID, 'full' ); ?>
							<a href="<?php echo esc_url( wp_get_attachment_url( $post->ID ) ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
								<img src="<?php echo esc_url( $att_image[0] ); ?>" width="<?php echo esc_attr( $att_image[1] ); ?>" height="<?php echo esc_attr( $att_image[2] ); ?>" class="attachment-full d-block mx-auto mb-3" alt="<?php the_title_attribute(); ?>" />
							</a>
						<?php else : ?>
							<a href="<?php echo esc_url( wp_get_attachment_url( $post->ID ) ); ?>" title="<?php echo esc_attr( get_the_title( $post->ID ), 1 ); ?>" rel="attachment">
								<?php echo esc_url( basename( $post->guid ) ); ?>
							</a>
						<?php endif; ?>
					</div>

					<?php if ( ! empty( $post->post_excerpt ) ) {
						echo '<div class="entry-caption pb-2 text-center">';
						the_excerpt();
						echo '</div>'; 
					} ?>

					<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

				</div>

				<?php simpledark_edit_link(); ?>

				<div id="attachment-nav" class="row mx-0 border-top py-3">
					<div class="prev-img-link px-0 col-12 col-sm-6 col-md-12 col-lg-6"><?php previous_image_link( false ); ?></div>
					<div class="next-img-link px-0 col-12 col-sm-6 col-md-12 col-lg-6 text-right"><?php next_image_link( false ); ?></div>
				</div>

				<div class="border-top py-3">
					<a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" title="<?php esc_attr_e( 'Return to:', 'simple-dark' ); ?> <?php echo esc_attr( get_the_title( $post->post_parent ), 1 ); ?>" rev="attachment">
						<?php printf( 
						/* translators: %s: Arrow sign */
						esc_html__( '%s Return to: ', 'simple-dark' ), '<i class="fa fa-arrow-left" aria-hidden="true"></i>' 
						); ?>
						<?php echo esc_html( get_the_title( $post->post_parent ) ); ?>						
					</a>
				</div>

			</article>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

			<?php endwhile; endif; ?>

			</main><!-- #main -->

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer();
