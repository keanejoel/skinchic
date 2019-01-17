<?php


/********** OPTIONS **********/

	$GLOBALS['mobile'] = true;					// Mobile viewport

	$GLOBALS['acf-options'] = true;			// ACF options page

	$GLOBALS['font-awesome'] = true;			// Font Awesome

	$GLOBALS['bxSlider'] = true;				// bxSlider

	$GLOBALS['superfish'] = false;				// Superfish sub menu

/*****************************/



/***** SITE SETUP *****/
if ( ! function_exists( 'cornwall_setup' ) ) :
	function cornwall_setup() {

		// Let WordPress manage the document title
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages
		add_theme_support( 'post-thumbnails' );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		// Register menu locations
		register_nav_menus( array( 'main' => 'Main Menu' ) );

	}
endif;
add_action( 'after_setup_theme', 'cornwall_setup' );


/***** DISABLE WP AUTO-UPDATES *****/
define( 'WP_AUTO_UPDATE_CORE', false );


/***** ENQUE SCRIPTS AND STYLES *****/
function cornwall_scripts() {

	// Load Bootstrap stylesheet
	wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', null );

	// Load Font Awesome
	if ($GLOBALS['font-awesome']) {wp_enqueue_style('fontawesome-styles', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', '', '4.5.0' );}

	// Bootstrap
	wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', '', '3.3.7' );

	// Bootstrap optional theme styles
	if ($GLOBALS['bootstrap-theme']) {wp_enqueue_style('bootstrap-theme', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css', '', '3.3.7' );}

	// Load our main stylesheet
	wp_enqueue_style( 'theme-styles', get_stylesheet_uri(), '', null );

	// Load main javascript file
	wp_enqueue_script( 'theme-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), null );

	// Load parallax script file
	wp_enqueue_script( 'parallax-scripts', get_template_directory_uri() . '/js/parallax.min.js', array( 'jquery' ), '1.4.1' );

	// Load bxSlider file
	if ($GLOBALS['bxSlider']) {wp_enqueue_script( 'bxslider-scripts', get_template_directory_uri() . '/js/bxslider.min.js', array( 'jquery' ), '4.2.5' );}

	// Load Superfish file
	if ($GLOBALS['superfish']) {wp_enqueue_script( 'superfish-scripts', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '1.7.2' );}

}
add_action( 'wp_enqueue_scripts', 'cornwall_scripts' );


/***** TEMPLATE TAGS *****/

	// Wraps the post thumbnail in an anchor element on index views, or a div element when on single views.
	if ( ! function_exists( 'cornwall_post_thumbnail' ) ) :
		function cornwall_post_thumbnail() {
			if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
				return;
			}

			if ( is_singular() ) :
			?>

			<div class="featured-image">
				<?php the_post_thumbnail(); ?>
			</div>

			<?php else : ?>

			<a class="featured-image" href="<?php the_permalink(); ?>">
				<?php
					the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
				?>
			</a>
			<?php endif; // End is_singular()
		}
	endif; // cornwall_post_thumbnail


/***** CREATE ACF OPTIONS PAGE *****/
if ( function_exists( 'acf_add_options_page' ) && $GLOBALS['acf-options'] ) :
	acf_add_options_page();
endif;


/***** CHANGE YOAST META BOX PRIORITY *****/
add_filter( 'wpseo_metabox_prio', function() {return 'low';} );


/***** REORDER ADMIN MENU - http://randyhoyt.com/wordpress/admin/ *****/
if ( ! function_exists( 'rrh_change_post_links' ) ) :
	function rrh_change_post_links() {
		global $menu;
		$menu[1000] = $menu[5]; // Copy posts into 1000
		$menu[5] = $menu[20]; // Copy pages into 5
		$menu[20] = $menu[25]; // Copy comments into 20
		$menu[25] = $menu[10]; // Copy media into 25
		$menu[10] = $menu[1000]; // Copy posts into 10
		unset($menu[1000]); // Kill 1000
		/*echo '<pre>';
		print_r($menu);
		echo '</pre>';*/
	}
endif;
add_action('admin_menu', 'rrh_change_post_links');


/***** CUSTOM EXCERPTS *****/

	// Custom length
	if ( ! function_exists( 'new_excerpt_length' ) ) :
		function new_excerpt_length($length) {
			return 30;
		}
	endif;
	add_filter('excerpt_length', 'new_excerpt_length', 999);

	// Custom "more"
	if ( ! function_exists( 'new_excerpt_more' ) ) :
		function new_excerpt_more($more) {
			return '...';
		}
	endif;
	add_filter('excerpt_more', 'new_excerpt_more');

	/***** WOOCOMMERCE *****/
	require 'woo-functions.php';

	//get featured image as style="background-image..."
	function get_featured_bg($the_post, $size = 'large') {
		if ( has_post_thumbnail($the_post) ) {
			$bg_img = wp_get_attachment_image_src( get_post_thumbnail_id( $the_post ), $size );
			$bg_img = 'style="background-image: url('. $bg_img[0] .')"';
			return $bg_img;
		}
	}


?>
