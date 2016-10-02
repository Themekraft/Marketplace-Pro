<?php
/**
 * _tk functions and definitions
 *
 * @package _tk
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */

if ( ! function_exists( '_tk_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function _tk_setup() {
	global $cap, $content_width;

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	/**
	 * Add default posts and comments RSS feed links to head
	*/
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable support for Post Formats
	*/
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	*/
	add_theme_support( 'custom-background', apply_filters( '_tk_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on _tk, use a find and replace
	 * to change '_tk' to the name of your theme in all the template files
	*/
	load_theme_textdomain( '_tk', get_template_directory() . '/languages' );

	/**
	 * This theme uses wp_nav_menu() in three locations.
	*/
	register_nav_menus( array(
		'primary'  => __( 'Header Top Menu', '_tk' ),
		'slide-nav'  => __( 'Sliding Menu', '_tk' ),
		'footer-nav'  => __( 'Footer Menu', '_tk' ),
	) );

}
endif; // _tk_setup
add_action( 'after_setup_theme', '_tk_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function _tk_widgets_init() {

  // sidebar
	register_sidebar( array(
    		'name'          => __( 'Sidebar', 'MPro' ),
				'description' 	=> __( 'This is the sidebar used by default.', 'MPro'),
    		'id'            => 'sidebar-1',
    		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</aside>',
    		'before_title'  => '<h3 class="widget-title">',
    		'after_title'   => '</h3>',
	  ) );

		// sidebar
		register_sidebar( array(
	    		'name'          => __( 'Sidebar Products', 'MPro' ),
					'description' 	=> __( 'This is the sidebar used for the products single view.', 'MPro'),
	    		'id'            => 'sidebar-product',
	    		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	    		'after_widget'  => '</aside>',
	    		'before_title'  => '<h3 class="widget-title">',
	    		'after_title'   => '</h3>',
		  ) );


  // footer widgetareas
	register_sidebar( array(
			'name'          => 'Footer Column 1',
			'id'            => 'footer-column-1',
			'description'   => 'The footer columns widgetarea',
			'before_widget' => '<div id="%1$s" class="footer-column-widget %2$s">',
			'after_widget'  => '</div><div class="clear"></div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>'
	) );

	register_sidebar( array(
			'name'          => 'Footer Column 2',
			'id'            => 'footer-column-2',
			'description'   => 'The footer columns widgetarea',
			'before_widget' => '<div id="%1$s" class="footer-column-widget %2$s">',
			'after_widget'  => '</div><div class="clear"></div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>'
	) );

	register_sidebar( array(
			'name'          => 'Footer Column 3',
			'id'            => 'footer-column-3',
			'description'   => 'The footer columns widgetarea',
			'before_widget' => '<div id="%1$s" class="footer-column-widget %2$s">',
			'after_widget'  => '</div><div class="clear"></div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>'
	) );

	register_sidebar( array(
			'name'          => 'Footer Column 4',
			'id'            => 'footer-column-4',
			'description'   => 'The footer columns widgetarea',
			'before_widget' => '<div id="%1$s" class="footer-column-widget %2$s">',
			'after_widget'  => '</div><div class="clear"></div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>'
	) );

}
add_action( 'widgets_init', '_tk_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function _tk_scripts() {

	// load bootstrap css
	wp_enqueue_style( '_tk-bootstrap', get_template_directory_uri() . '/includes/resources/bootstrap/css/bootstrap.min.css' );

  // Import the necessary TK Bootstrap WP CSS additions
	wp_enqueue_style( '_tk-bootstrap-wp', get_template_directory_uri() . '/includes/css/bootstrap-wp.css' );

	// load the tk styles
	wp_enqueue_style( 'tk-style', get_stylesheet_uri() );

	// load bootstrap js
	wp_enqueue_script('_tk-bootstrapjs', get_template_directory_uri().'/includes/resources/bootstrap/js/bootstrap.min.js', array('jquery') );

	// load bootstrap wp js
	wp_enqueue_script( '_tk-bootstrapwp', get_template_directory_uri() . '/includes/js/bootstrap-wp.js', array('jquery') );

	wp_enqueue_script( '_tk-skip-link-focus-fix', get_template_directory_uri() . '/includes/js/skip-link-focus-fix.js', array(), '20130115', true );

	if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( '_tk-keyboard-image-navigation', get_template_directory_uri() . '/includes/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}


}
add_action( 'wp_enqueue_scripts', '_tk_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/includes/bootstrap-wp-navwalker.php';

/**
 * Load the page options.
 */
require get_template_directory() . '/includes/admin/page-options.php';
require get_template_directory() . '/includes/admin/customizer-options.php';



// Disable Comments on Media Attachments
function filter_media_comment_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if( $post->post_type == 'attachment' || $post->post_type == 'product' || $post->post_type == 'page' ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );


// allow SVG in media library
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// replaces the _tk_posted_on() function in includes/template-tags.php
function tk_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$time_string = sprintf( '%1$s',
		$time_string
	);

	printf( __( '<span class="posted-on"><small><i class="fa fa-calendar"></i>&nbsp;&nbsp;%1$s</small></span>', '_tk' ),
		$time_string
	);
}


// if on frontpage, add class "front-page" to body
add_filter( 'body_class', 'add_body_class_names' );
function add_body_class_names( $classes ) {
  if( is_front_page() ) {
    $classes[] = 'front-page';
  }
  if( is_category() ) {
    $classes[] = 'blog';
  }
  return $classes;
}


// Removing the default WP admin bar in the front end
add_filter('show_admin_bar', '__return_false');


// Add Google Fonts
add_action('wp_enqueue_scripts', 'oa_add_google_fonts', 0 );
function oa_add_google_fonts() {

        wp_register_style( 'oa-google-fonts-source-sans-pro', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600' );
        wp_enqueue_style( 'oa-google-fonts-source-sans-pro' );

        wp_register_style( 'oa-google-fonts-oswald', 'http://fonts.googleapis.com/css?family=Oswald' );
        wp_enqueue_style( 'oa-google-fonts-oswald' );

        wp_register_style( 'oa-google-fonts-open-sans-condensed', 'http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' );
        wp_enqueue_style( 'oa-google-fonts-open-sans-condensed' );

}



/**
 * WooCommerce Setup
 ****************************************/

if ( class_exists( 'WooCommerce' ) ) {

    // Adding WooCommerce Support
    add_action( 'after_setup_theme', 'woocommerce_support' );
    function woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }

    remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

		/* remove product meta from single products summary */
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
		add_action( 'tk_single_product_sidebar_meta', 'woocommerce_template_single_meta', 40 );


    /* always remove sidebars // sidebars added via theme templates! */
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

    add_action('woocommerce_before_main_content', 'tk_theme_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'tk_theme_wrapper_end', 10);

    function tk_theme_wrapper_start() {
      echo '<div class="main-content"><div class="container"><div class="row"><div class="main-content-inner col-xs-12">';
    }

    function tk_theme_wrapper_end() {
      echo '';
    }

    // Product Categories
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

    // Breadcrumbs
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

    // Single Product - Header
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
    // remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

    // Remove Heading "Product Description"
    add_filter( 'woocommerce_product_description_heading', 'remove_product_description_heading' );
    function remove_product_description_heading() {
      return '';
    }

    // Remove result count woocommerce shop loops
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

    // Redirect to checkout when adding to cart
    add_filter ('add_to_cart_redirect', 'redirect_to_checkout');
    function redirect_to_checkout() {
        global $woocommerce;
        $checkout_url = $woocommerce->cart->get_checkout_url();
        return $checkout_url;
    }

		// Add category name to product loop item
		// add_action( 'woocommerce_shop_loop_item_title', 'tk_add_cat_to_loop' );
		function tk_add_cat_to_loop() {
			global $woocommerce, $product, $post;
			$categ = $product->get_categories();
    	echo '<span>'.$categ.'</span>';

		}

}


/**
 * BuddyPress Setup
 ****************************************/

if ( class_exists( 'BuddyPress' ) ) {

	// Member profiles - change cropping size of cover image
	function tk_cover_image( $settings = array() ) {
	    $settings['width']  = 1168;
	    $settings['height'] = 400;

	    return $settings;
	}
	add_filter( 'bp_before_xprofile_cover_image_settings_parse_args', 'tk_cover_image', 10, 1 );


	// Set default member component to profile page instead of activity page
	define( 'BP_DEFAULT_COMPONENT', 'profile' );


	// BuddyPress Nav & Subnav
	add_action( 'bp_setup_nav', 'tk_bp_nav_tabs', 9999 );

	function tk_bp_nav_tabs() {
		global $bp;

		// This is how you remove nav tabs or subnav tabs
		// bp_core_remove_nav_item( 'activity' );
		// bp_core_remove_subnav_item( $bp->profile->slug, 'change-cover-image' );

		// Renaming a few tabs here
		$bp->bp_options_nav['profile']['public']['name'] = 'My Profile';
		$bp->bp_options_nav['profile']['edit']['name'] = 'Edit Profile';
		$bp->bp_options_nav['profile']['change-avatar']['name'] = 'Change Avatar';
		// $bp->bp_options_nav['profile']['change-cover-image']['name'] = 'Change Cover';

	}

	// BuddyPress Site-Wide Activity Stream - Change Title to the Page Title that was setup for the actual page
	add_filter( 'bp_get_directory_title', 'buddypress_sitewide_activity_title', 10, 2 );

	function buddypress_sitewide_activity_title( $title) {

			global $post; global $bp;
			if ( bp_is_activity_front_page() ) {
					$title = $post->post_title;
			}

			return $title;
	}


}
