<?php
/**
 * Bussiness Epic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blog light
 */

if ( ! function_exists( 'blog_light_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme dynamic, which
	 * runs before the init dynamic. The init dynamic is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function blog_light_setup() {
		/*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Bussiness Epic, use a find and replace
         * to change 'blog_light' to the name of your theme in all the template files.
         */
		load_theme_textdomain( 'blog-ight');

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		
		/*woocommerce compatible*/
		
		add_theme_support( 'woocommerce' );

		/*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
		add_theme_support( 'title-tag' );

		/*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
		add_theme_support( 'post-thumbnails' );

        add_image_size( 'blog-light-single', 600, 245 ); //300 pixels wide (and unlimited height)

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'blog-light' ),
			'social-link' => esc_html__('Social Link', 'blog-light'),
			'top-menu' => esc_html__('top-menu', 'blog-light'),


		) );

		/*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'blog_light_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for sidebar-widgets.
		add_theme_support( 'customize-selective-refresh-sidebar-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'blog_light_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blog_light_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blog_light_content_width', 640 );
}
add_action( 'after_setup_theme', 'blog_light_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blog_light_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'blog-light' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add sidebar-widgets here.', 'blog-light' ),
		'before_widget' => '<section id="%1$s" class="widget  %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Top Home Page Widgets Area ', 'blog-light'),
		'id' => 'homepage_widgets',
		'description' => esc_html__('Add sidebar-widgets here.', 'blog-light'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	


	register_sidebar(array(
		'name' => esc_html__('Footer1 ', 'blog-light'),
		'id' => 'footer1',
		'description' => esc_html__('Add sidebar-widgets here.', 'blog-light'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title footer-bottom-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer2 ', 'blog-light'),
		'id' => 'footer2',
		'description' => esc_html__('Add sidebar-widgets here.', 'blog-light'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title footer-bottom-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer3 ', 'blog-light'),
		'id' => 'footer3',
		'description' => esc_html__('Add sidebar-widgets here.', 'blog-light'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title footer-bottom-title">',
		'after_title' => '</h2>',
	));
	
}
add_action( 'widgets_init', 'blog_light_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blog_light_scripts() {


	wp_enqueue_style( 'owl.carousel', get_template_directory_uri().'/propoties/css/owl.carousel.css' );
	wp_enqueue_style( 'owl.theme', get_template_directory_uri().'/propoties/css/owl.theme.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri().'/propoties/css/slick.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/propoties/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome',get_template_directory_uri().'/propoties/css/font-awesome.min.css' );
	wp_enqueue_style( 'font-animate', get_template_directory_uri().'/propoties/css/animate.css' );
	wp_enqueue_style( 'blog-light-style', get_stylesheet_uri() );
	wp_enqueue_style( 'blog-light-media', get_template_directory_uri().'/propoties/css/media.css' );

	wp_enqueue_script( 'carousel.min', get_template_directory_uri().'/propoties/js/owl.carousel.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'slick.min', get_template_directory_uri().'/propoties/js/slick.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri().'/propoties/js/waypoints.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/propoties/js/bootstrap.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'wow', get_template_directory_uri().'/propoties/js/wow.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'jquery.isotope', get_template_directory_uri().'/propoties/js/jquery.isotope.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'jquery.touchSwipe', get_template_directory_uri().'/propoties/js/jquery.touchSwipe.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'counterup', get_template_directory_uri().'/propoties/js/counterup.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'sticky-sidebar', get_template_directory_uri() . '/propoties/js/theia-sticky-sidebar.js', array('jquery'), '4.5.0' );

	wp_enqueue_script( 'blog-light-main', get_template_directory_uri().'/propoties/js/main.js', array('jquery'), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blog_light_scripts' );



/**
 * define size of logo.
 */

if (!function_exists('blog_light_custom_logo_setup')) :
	function blog_light_custom_logo_setup()
	{
		add_theme_support('custom-logo', array(
			'height' => 90,
			'width' => 300,
			'flex-width' => true,
		));
	}

	add_action('after_setup_theme', 'blog_light_custom_logo_setup');
endif;


if (!function_exists('blog_light_widgets_backend_enqueue')) :
	function blog_light_widgets_backend_enqueue($hook)
	{
		if ('sidebar-widgets.php' != $hook) {
			return;
		}

		wp_register_script('blog-light-widgets', get_template_directory_uri() . '/propoties/js/widgets.js', array('jquery'), true);
		wp_enqueue_media();
		wp_enqueue_script('blog-light-custom-sidebar-widgets');
	}

	add_action('admin_enqueue_scripts', 'blog_light_widgets_backend_enqueue');
endif;



if (!function_exists('blog_light_widgets_backend_enqueue')) :
	function blog_light_widgets_backend_enqueue($hook)
	{
		if ('sidebar-widgets.php' != $hook) {
			return;
		}

		wp_register_script('blog-light-widgets', get_template_directory_uri() . '/propoties/js/widgets.js', array('jquery'), true);
		wp_enqueue_media();
		wp_enqueue_script('blog-light-widgets');
	}

	add_action('admin_enqueue_scripts', 'blog_light_widgets_backend_enqueue');
endif;




if (!function_exists('blog_light_admin_css_enqueue_new_post')) :
	function blog_light_admin_css_enqueue_new_post($hook)
	{
		if ('post-new.php' != $hook) {
			return;
		}
		wp_enqueue_style('blog-light-admin', get_template_directory_uri() . '/propoties/css/admin.css', array(), '2.0.0');
	}
	add_action('admin_enqueue_scripts', 'blog_light_admin_css_enqueue_new_post');
endif;




$args = array(
	'flex-width'    => true,
	'width'         => 980,
	'flex-height'    => true,
	'height'        => 200,
	'default-image' => get_template_directory_uri() . '/propoties/images/header.jpg',
);
add_theme_support( 'custom-header', $args );



add_action('admin_enqueue_scripts', 'blog_light_widgets_backend_enqueue');
function blog_light_widgets_backend_enqueue()
{
	wp_register_script('blog-light-custom-widgets', get_template_directory_uri() . '/propoties/js/widgets.js', array('jquery'), true);
	wp_enqueue_media();
	wp_enqueue_script('blog-light-custom-widgets');
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/loadall.php';

require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*activation plugins*/
require get_template_directory() . '/third-party-function/TGM/class-tgm-plugin-activation.php';
require get_template_directory() . '/third-party-function/TGM/plugin-slug.php';

/*add custom body class for sidebar section*/




/*for sidebar adding options**/

function blog_light_names( $classes ) {
	// add 'class-name' to the $classes array
	$sidebardesignlayout = esc_attr( get_post_meta(get_the_ID(), 'blog_light_sidebar_layout', true) );
	if (is_singular() && $sidebardesignlayout != "default-sidebar")
	{
		$sidebardesignlayout = esc_attr( get_post_meta(get_the_ID(), 'blog_light_sidebar_layout', true) );

	} else
	{
		$sidebardesignlayout = esc_attr(blog_light_get_option('blog_light_sidebar_layout_option' ));
	}

	$classes[] = $sidebardesignlayout;
	return $classes;
}
add_filter( 'body_class', 'blog_light_names' );



/**
 * Exclude category in blog page
 *
 * @since Blog Light 1.0.0
 *
 * @param null
 * @return int
 */
if (!function_exists('blog_light_exclude_category_in_blog_page')) :
	function blog_light_exclude_category_in_blog_page($query)
	{
		if ($query->is_home && $query-> is_main_query())
		{
			$catid = blog_light_get_option('blog_light_exclude_cat_blog_archive_option');
			$exclude_categories = $catid;
			if (!empty($exclude_categories))
			{
				$cats = explode(',', $exclude_categories);
				$cats = array_filter($cats, 'is_numeric');
				$string_exclude = '';
				echo $string_exclude;
				if (!empty($cats))
				{
					$string_exclude = '-' . implode(',-', $cats);
					$query->set('cat', $string_exclude);
				}
			}
		}
		return $query;
	}
endif;
add_filter('pre_get_posts', 'blog_light_exclude_category_in_blog_page');



// woocommerce images popup code
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );







if (!function_exists('blog_light_social_sharing')) :
	function blog_light_social_sharing($post_id)
	{
		$blog_light_url = get_the_permalink($post_id);
		$blog_light_title = get_the_title($post_id);
		$blog_light_image = get_the_post_thumbnail_url($post_id);
		$blog_the_link= get_the_permalink($post_id);

		//sharing url
		$blog_light_twitter_sharing_url = esc_url('http://twitter.com/share?text=' . $blog_light_title . '&url=' . $blog_light_url);
		$blog_light_pinterest_sharing_url = esc_url('http://pinterest.com/pin/create/button/?url=' . $blog_light_url . '&media=' . $blog_light_image . '&description=' . $blog_light_title);
		$blog_light_linkedin_sharing_url = esc_url('http://www.linkedin.com/shareArticle?mini=true&title=' . $blog_light_title . '&url=' . $blog_light_url);

		?>

		<ul class="post-share">
			<li><a target="_blank" href="<?php echo esc_url($blog_light_twitter_sharing_url); ?>"><i class="fa fa-twitter"></i></a></li>
			<li><a target="_blank" href="<?php echo esc_url($blog_light_pinterest_sharing_url); ?>"><i class="fa fa-pinterest"></i></a></li>
			<li> <a target="_blank" href="<?php echo esc_url($blog_light_linkedin_sharing_url); ?>"><i class="fa fa-linkedin"></i></a></li>
		</ul>
		<?php
	}
endif;
add_action('blog_light_social_sharing', 'blog_light_social_sharing', 10);


/* =====adding menu last and first class==========*/
function blog_light_first_and_last_menu_class($items) {
	$items[1]->classes[] = 'first-menu';
	$items[count($items)]->classes[] = 'last-menu';
	return $items;
}
add_filter('wp_nav_menu_objects', 'blog_light_first_and_last_menu_class');

/* for bcn breadcrumb plugin */


/* =============================hook for breadcumb ==================================================*/

if (!function_exists('blog_light_breadcrumb_type')) :

	function blog_light_breadcrumb_type($post_id)
	{


		if (function_exists('bcn_display')) {


			?>
			
					<?php
					echo "<div class='breadcrumbs'><div id='cwp-breadcrumbs' class='cwp-breadcrumbs'>";
					bcn_display();
					echo "</div></div>";
					?>
				
			<?php
		}
	}
endif;

add_action('blog_light_breadcrumb_type', 'blog_light_breadcrumb_type', 10, 1);

add_filter('bcn_breadcrumb_title', function($title, $type, $id) {
	if ($type[0] === 'home') {
		$title = get_the_title(get_option('page_on_front'));
	}
	return $title;
}, 42, 3);