<?php
/**
 * glitche functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package glitche
 */

define( 'GLITCHE_EXTRA_PLUGINS_DIRECTORY', 'https://beshley.com/plugins-latest/glitche/' );
define( 'GLITCHE_EXTRA_PLUGINS_PREFIX', 'Glitche' );

if ( ! function_exists( 'glitche_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function glitche_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on glitche, use a find and replace
		 * to change 'glitche' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'glitche', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'glitche' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Image Sizes
		add_image_size( 'glitche_100x100', 100, 100, true );
		add_image_size( 'glitche_282x232', 282, 232, true );
		add_image_size( 'glitche_282x282', 282, 282, true );
		add_image_size( 'glitche_500x500', 500, 500, true );
		add_image_size( 'glitche_680xAuto', 680, 9999, false );
		add_image_size( 'glitche_680x680', 680, 680, true );
		add_image_size( 'glitche_1920xAuto', 1920, 9999, false );
	}
endif;
add_action( 'after_setup_theme', 'glitche_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function glitche_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'glitche_content_width', 900 );
}
add_action( 'after_setup_theme', 'glitche_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function glitche_widgets_init() {
	register_sidebar( array(
		'name'		  => esc_html__( 'Sidebar', 'glitche' ),
		'id'			=> 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'glitche' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'glitche_widgets_init' );

/**
 * Register Default Fonts
 */
function glitche_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Lora, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$roboto_mono = _x( 'on', 'Roboto Mono: on or off', 'glitche' );


	if ( 'off' !== $roboto_mono ) {
		$font_families = array();

		$font_families[] = 'Roboto Mono:400,100,300italic,300,100italic,400italic,500,500italic,700,700italic';
		$font_families[] = 'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function glitche_stylesheets() {
	// Web fonts
	wp_enqueue_style( 'glitche-fonts', glitche_fonts_url(), array(), null );

	$headingsFont =  get_field( 'heading_font_family', 'options' );
	$paragraphsFont =  get_field( 'text_font_family', 'options' );
	$logoFont =  get_field( 'header_logo_font_family', 'options' );

	// Custom fonts
	if ( $headingsFont ) {
		wp_enqueue_style( 'glitche_heading_font', $headingsFont['url'] , array(), null );
	}
	if ( $paragraphsFont ) {
		wp_enqueue_style( 'glitche_paragraph_font', $paragraphsFont['url'] , array(), null );
	}
	if ( $logoFont ) {
		wp_enqueue_style( 'glitche_logo_font', $logoFont['url'] , array(), null );
	}

	/*Styles*/
	wp_enqueue_style( 'glitche-style', get_stylesheet_uri() );
	wp_enqueue_style( 'onicons', get_template_directory_uri() . '/assets/css/ionicons.css', '1.0' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.css', '1.0' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', '1.0' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', '1.0' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', '1.0' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', '1.0' );
	wp_enqueue_style( 'jarallax', get_template_directory_uri() . '/assets/css/jarallax.css', '1.0' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper.css', '1.0' );
}
add_action( 'wp_enqueue_scripts', 'glitche_stylesheets' );

function glitche_scripts() {
	/*Default Scripts*/
	wp_enqueue_script( 'glitche-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/*Theme Scripts*/
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jquery-validate', get_template_directory_uri() . '/assets/js/jquery.validate.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'imagesloaded-pkgd', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.js', array(), '1.0.0', true );
	wp_enqueue_script( 'glitche-isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'glitche-parallax', get_template_directory_uri() . '/assets/js/simpleParallax.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'typed', get_template_directory_uri() . '/assets/js/typed.js', array(), '1.0.0', true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'rrssb', get_template_directory_uri() . '/assets/js/rrssb.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'jarallax', get_template_directory_uri() . '/assets/js/jarallax.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'jarallax-video', get_template_directory_uri() . '/assets/js/jarallax-video.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'jarallax-element', get_template_directory_uri() . '/assets/js/jarallax-element.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'glitche-scripts', get_template_directory_uri() . '/assets/js/glitche-scripts.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'glitche_scripts' );

/**
 * TGM
 */
require get_template_directory() . '/inc/plugins/plugins.php';

/**
 * ACF Options
 */

function glitche_acf_fa_version( $version ) {
 $version = 5;
 return $version;
}
add_filter( 'ACFFA_override_major_version', 'glitche_acf_fa_version' );

function glitche_acf_json_load_point( $paths ) {
	$paths = array( get_template_directory() . '/inc/acf-json' );
	if( is_child_theme() ) {
		$paths[] = get_stylesheet_directory() . '/inc/acf-json';
	}

	return $paths;
}

add_filter('acf/settings/load_json', 'glitche_acf_json_load_point');

if ( function_exists( 'acf_add_options_page' ) ) {
	// Hide ACF field group menu item
	add_filter( 'acf/settings/show_admin', '__return_false' );

	// Add ACF Options Page
	acf_add_options_page( array(
		'page_title' 	=> esc_html__( 'Theme Options', 'glitche' ),
		'menu_title'	=> esc_html__( 'Theme Options', 'glitche' ),
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_theme_options',
		'icon_url'		=> 'dashicons-bslthemes',
		'position' 		=> 3,
	) );

	// Hide ACF Pro Update Notice
	function glitche_remove_update_notice( $value ) {
		if ( isset( $value->response[ 'advanced-custom-fields-pro/acf.php' ] ) ){
			unset( $value->response[ 'advanced-custom-fields-pro/acf.php' ] );
		}
		return $value;
	}
	add_filter( 'site_transient_update_plugins', 'glitche_remove_update_notice' );
}

function glitche_acf_json_save_point( $path ) {
	// update path
	$path = get_stylesheet_directory() . '/inc/acf-json';

	// return
	return $path;
}
add_filter( 'acf/settings/save_json', 'glitche_acf_json_save_point' );

function glitche_acf_fallback() {
	// ACF Plugin fallback
	if ( ! is_admin() && ! function_exists( 'get_field' ) ) {
		function get_field( $field = '', $id = false ) {
			return false;
		}
		function the_field( $field = '', $id = false ) {
			return false;
		}
		function have_rows( $field = '', $id = false ) {
			return false;
		}
		function has_sub_field( $field = '', $id = false ) {
			return false;
		}
		function get_sub_field( $field = '', $id = false ) {
			return false;
		}
		function the_sub_field( $field = '', $id = false ) {
			return false;
		}
	}
}
add_action( 'init', 'glitche_acf_fallback' );

/**
 * OCDI
 */
require get_template_directory() . '/inc/ocdi-setup.php';

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
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Include Custom Breadcrumb
 */
require get_template_directory() . '/inc/custom-breadcrumb.php';

/**
 * Include Skin Options
 */
require get_template_directory() . '/inc/skin-options.php';

/**
 * Get Categories
 */
if ( ! function_exists( 'glitche_get_categories' ) ) {
	function glitche_get_categories( $taxonomy, $order_by = 'DESC' ) {
		$args = array(
			'type'			=> 'post',
			'child_of'		=> 0,
			'parent'		=> '',
			'orderby'		=> 'name',
			'order'			=> $order_by,
			'hide_empty'	=> 1,
			'hierarchical'	=> 1,
			'taxonomy'		=> $taxonomy,
			'pad_counts'	=> false
		);

		return get_categories( $args );
	}
}

/**
 * Get Archive Title
 */

function glitche_archive_title($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_post_type_archive( 'portfolio' ) ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( esc_html__( 'Tag: ', 'glitche' ), false );
	} elseif ( is_author() ) {
		$title = esc_html__( 'Author: ', 'glitche' ) . get_the_author();
	}

	return $title;
}
add_filter( 'get_the_archive_title', 'glitche_archive_title' );

/**
 * Excerpt
 */
function glitche_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'glitche_custom_excerpt_length' );

function glitche_new_excerpt_more( $more ) {
	return esc_html__( '...', 'glitche' );
}
add_filter( 'excerpt_more', 'glitche_new_excerpt_more' );

/**
 * Comments
 */
if ( ! function_exists( 'glitche_comment' ) ) {
	function glitche_comment( $comment, $args, $depth ) {
		?>
			<li <?php comment_class( 'post-comment' ); ?> id="li-comment-<?php comment_ID(); ?>" >
				<div id="comment-<?php comment_ID(); ?>" class="comment">
					<div class="comment-image image">
						<?php
							$avatar_size = 80;
							if ( '0' != $comment->comment_parent ){
								$avatar_size = 80;
							}
							echo get_avatar( $comment, $avatar_size );
						?>
					</div>
					<div class="comment-desc desc">
						<div class="comment-name name">
							<?php comment_author_link(); ?>
						</div>
						<div class="comment-text">
							<p><?php comment_text(); ?></p>
						</div>
						<div class="comment-info">
							<span class="comment-time"><?php comment_time(); ?></span>
							<span class="comment-date"><?php comment_date(); ?></span>
							<span class="comment-reply">
								<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
							</span>
						</div>
					</div>
				</div>
			</li>
		<?php
	}
}

/**
 * Woocommerce Support
 */

function glitche_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 300,
		'single_image_width' => 300,
		'product_grid' => array(
			'default_rows' => 3,
			'min_rows' => 3,
			'max_rows' => 3,
			'default_columns' => 3,
			'min_columns' => 3,
			'max_columns' => 3,
		),
	) );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'glitche_add_woocommerce_support' );

/**
 * Update contents AJAX mini-cart
 */

function glitche_woocommerce_update_count_mini_cart( $fragments ) {
	ob_start();
	?>

	<span class="cart-count">
		<?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'glitche' ), WC()->cart->get_cart_contents_count() ); ?>
	</span>

	<?php
	$fragments['span.cart-count'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'glitche_woocommerce_update_count_mini_cart' );

function glitche_woocommerce_update_content_mini_cart( $fragments ) {
	ob_start();
	?>

	<div class="cart-widget">
       <?php woocommerce_mini_cart(); ?>
    </div>

	<?php
	$fragments['div.cart-widget'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'glitche_woocommerce_update_content_mini_cart' );
