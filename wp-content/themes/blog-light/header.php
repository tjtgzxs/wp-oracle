<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blog light
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('at-sticky-sidebar'); ?>itemscope itemtype="http://schema.org/WebPage" >
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
else { do_action( 'wp_body_open' ); }
?>


<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'blog-light') ?></a>
	<a href="#" class="scrollup"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
	<header id="masthead" class="site-header" role="banner">
		<!-- Start Top header Section -->
		<?php
		/**
		 * The template for displaying all pages.
		 *
		 * This is the template that displays all pages by default.
		 * Please note that this is the WordPress construct of pages
		 * and that other 'pages' on your WordPress site may use a
		 * different template.
		 *
		 * @link https://codex.wordpress.org/Template_Hierarchy
		 *
		 * @subpackage Blog Light
		 */
		// retrieving Customizer Value
		$section_option = blog_light_get_option('blog_light_top_header_section');
		if ($section_option == 'show') {

			$social_menu = blog_light_get_option('blog_light_social_link_hide_option');
			?>
			<div class="top-header">
				<div class="container">
					<div class="row">
						<!-- Start top contact info Section -->
						<div class="col-xs-12 col-sm-6">
							<div class="top-header-contact-info">

								<?php
								if (has_nav_menu('top-menu')) {
									wp_nav_menu(array('theme_location' => 'top-menu', 'menu_class' => 'menu', 'menu_id' => 'menu-social-menu'));

								}
								?>
							</div>
						</div>
						<!-- End top contact info Section -->


						<!-- Start top social icon Section -->

						<div class="col-xs-12 col-sm-6">


							<?php
							if ($social_menu == 1) {

								?>
								<div class="top-header-socialicon">

									<?php
									if (has_nav_menu('social-link')) {
										wp_nav_menu(array('theme_location' => 'social-link', 'menu_class' => 'menu', 'menu_id' => 'menu-social-menu'));

									}
									?>

								</div>

							<?php } ?>
						</div>
						<!-- End top social icon Section -->


					</div>
				</div>
			</div>
		<?php } ?>
		<!-- End Top header Section -->
		<!-- Start logo and menu Section -->
		<div class="container">
			<!-- Start Site title Section -->
			<div class="site-branding">

				<!-- <img src="images/logo.png" alt=""> -->
				<?php
				if (has_custom_logo()) { ?>
					<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
						<?php the_custom_logo(); ?>
					</a>
				<?php } else {
					if (is_front_page() && is_home()) : ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url(home_url('/')); ?>"
							   rel="home"><?php bloginfo('name'); ?></a>
						</h1>
					<?php else : ?>
						<h1 class="site-title">
							<a href="<?php echo esc_url(home_url('/')); ?>"
							   rel="home"><?php bloginfo('name'); ?></a>
						</h1>
						<?php
					endif;
					?>

					<?php
					$description = get_bloginfo('description', 'display');
					if ($description || is_customize_preview()) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
					endif;
				} ?>
				<button class="visible-xs visible-sm  clearfix">

					<span id="showbutton" class="clearfix">
						<a href="#">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</a></span>
				</button>
			</div>
			<!-- End Site title Section -->
		</div>
		<div class="main-header">
			<div class="container">

				<!-- Start Menu Section -->
				<div class="menu">
					<!--<nav id="site-navigation" class="main-navigation" role="navigation"> -->
					<div class="nav-wrapper">
						<!-- for toogle menu -->

						<div class=""></div>

						<nav class="column-12 im-hiding">
							<div class="clearfix">
								<?php
								if (has_nav_menu('primary')) {
									wp_nav_menu(array(
											'theme_location' => 'primary',
											'menu_class' => 'main-nav',


										)
									);
								}
								?>
						</nav>
						<!-- / main nav -->
					</div>
					<!-- </nav> -->
				</div>
				<!-- End Menu Section -->

			</div>
		</div>
		<!-- End logo and menu Section -->
	</header>