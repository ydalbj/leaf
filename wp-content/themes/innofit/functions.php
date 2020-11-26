<?php
// Global variables define
if ( ! function_exists( 'wp_body_open' ) ) {

	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 */
		do_action( 'wp_body_open' );
	}
}

define('INNOFIT_TEMPLATE_DIR_URI',get_template_directory_uri());	
define('INNOFIT_TEMPLATE_DIR',get_template_directory());
define('INNOFIT_THEME_FUNCTIONS_PATH',INNOFIT_TEMPLATE_DIR.'/functions');

// Theme functions file including
require( INNOFIT_THEME_FUNCTIONS_PATH . '/scripts/script.php');
require( INNOFIT_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php');
require( INNOFIT_THEME_FUNCTIONS_PATH . '/menu/st_nav_walker.php');
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( ! function_exists( 'innofitp_activate' ) ):
require( INNOFIT_THEME_FUNCTIONS_PATH .'/font/font.php');
endif;
require( INNOFIT_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');
require( INNOFIT_THEME_FUNCTIONS_PATH . '/template-tags.php');
require( INNOFIT_THEME_FUNCTIONS_PATH . '/excerpt/excerpt.php');
require( INNOFIT_THEME_FUNCTIONS_PATH . '/widgets/sidebars.php');
require( INNOFIT_THEME_FUNCTIONS_PATH . '/widgets/wdl_social_icon.php');
require( INNOFIT_THEME_FUNCTIONS_PATH . '/widgets/wdl_featured_latest_news.php');

require INNOFIT_TEMPLATE_DIR . '/admin/admin-init.php';

// Adding customizer files
require( INNOFIT_THEME_FUNCTIONS_PATH . '/customizer/customizer_sections_settings.php' );
require( INNOFIT_THEME_FUNCTIONS_PATH . '/customizer/customizer_layout_settings.php');
require( INNOFIT_THEME_FUNCTIONS_PATH . '/customizer/customizer_color_back_settings.php');
require( INNOFIT_THEME_FUNCTIONS_PATH . '/customizer/customizer-pro.php');
require( INNOFIT_THEME_FUNCTIONS_PATH . '/customizer/customizer_theme_style.php');
require( INNOFIT_THEME_FUNCTIONS_PATH . '/custom-style/custom-css.php');

//Alpha Color Control
require( INNOFIT_THEME_FUNCTIONS_PATH . '/customizer/customizer-alpha-color-picker/class-innofit-customize-alpha-color-control.php');

//Customizer Page Editor
require( INNOFIT_THEME_FUNCTIONS_PATH . '/customizer/customizer-page-editor/class/class-innofit-page-editor.php');

//Customizer Subscriber tabs
require( INNOFIT_THEME_FUNCTIONS_PATH . '/customizer/customizer-tabs/class/class-innofit-customize-control-tabs.php');

//Subscriber Info
require( INNOFIT_THEME_FUNCTIONS_PATH . '/customizer/customizer-subscribe-info/class-innofit-subscribe-info.php');

//Plugin Install
require( INNOFIT_THEME_FUNCTIONS_PATH . '/plugin-install/class-innofit-plugin-install-helper.php');

// set default content width
if ( ! isset( $content_width ) ) {
	$content_width = 696;
}
// Theme title
if( !function_exists( 'innofit_head_title' ) ) 
{
	function innofit_head_title( $title , $sep ) {
		global $paged, $page;
		
		if ( is_feed() )
				return $title;
			
		// Add the site name
		$title .= get_bloginfo( 'name' );
		
		// Add the site description for the home / front page
		$site_description = get_bloginfo( 'description' );
		if ( $site_description && ( is_home() || is_front_page() ) )
				$title = "$title $sep $site_description";
			
		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
				$title = "$title $sep " . sprintf( esc_html__('Page', 'innofit' ), max( $paged, $page ) );
			
		return $title;
	}
}
add_filter( 'wp_title', 'innofit_head_title', 10, 2);


if ( ! function_exists( 'innofit_theme_setup' ) ) :

function innofit_theme_setup() {
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	
	load_theme_textdomain( 'innofit', INNOFIT_TEMPLATE_DIR . '/languages' );

	
	// Add default posts and comments RSS feed links to head.
	
	add_theme_support( 'automatic-feed-links' );
	
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	 
	add_theme_support( 'title-tag' );
	
	// supports featured image
	
	add_theme_support( 'post-thumbnails' );

	
	
	// This theme uses wp_nav_menu() in two locations.
	
	register_nav_menus( array(
	
		'primary' => esc_html__( 'Primary Menu', 'innofit' ),
		
	) );
	
	
	// woocommerce support
	add_theme_support( 'woocommerce' );
	
	if (  function_exists( 'innofitp_activate' ) ):
	//Custom background support
	add_theme_support( 'custom-background' );
	endif;
	
	//Custom logo
	add_theme_support( 'custom-logo', array(
		'height'      => 40,
		'width'       => 175,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' )
	) );

	add_editor_style();
}
endif; 
add_action( 'after_setup_theme', 'innofit_theme_setup' );


function innofit_logo_class($html)
{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
}
add_filter('get_custom_logo','innofit_logo_class');

if ( ! function_exists( 'innofitp_activate' ) ):
add_action( 'admin_init', 'innofit_detect_button' );
	function innofit_detect_button() {
	wp_enqueue_style( 'innofit-info-button', INNOFIT_TEMPLATE_DIR_URI . '/css/import-button.css' );
}
endif;

function innofit_new_content_more($more)
	{  global $post;
		return '<p><a href="' . esc_url(get_permalink()) . "#more-{$post->ID}\" class=\"more-link btn-ex-small btn-border\">" .esc_html__('Read More','innofit')."</a></p>";
	}
	add_filter( 'the_content_more_link', 'innofit_new_content_more' );

function innofit_customizer_live_preview() {
	wp_enqueue_script(
		'innofit-customizer-preview', INNOFIT_TEMPLATE_DIR_URI . '/js/customizer.js', array(
			'jquery',
			'customize-preview',
		), 999, true
	);
}
add_action( 'customize_preview_init', 'innofit_customizer_live_preview' );

//Add my style admin bar
function innofit_admin_css() {
    if ( is_user_logged_in() && is_admin_bar_showing() ) {?>
   <style type="text/css">
    @media (min-width: 600px){
       .navbar-fixed-top{top:32px;}
    }
   </style>
<?php }
}
add_action('wp_head', 'innofit_admin_css');

add_action( 'after_setup_theme', 'innofit_theme_woocommerce_setup' );

function innofit_theme_woocommerce_setup() {
   add_theme_support( 'wc-product-gallery-zoom' );
   add_theme_support( 'wc-product-gallery-lightbox' );
   add_theme_support( 'wc-product-gallery-slider' );
}

require_once INNOFIT_TEMPLATE_DIR . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'innofit_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function innofit_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		 // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => 'Spice Box',
            'slug'      => 'spicebox',
            'required'  => false,
        ),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}