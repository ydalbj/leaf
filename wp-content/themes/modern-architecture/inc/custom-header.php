<?php
/**
 * Custom header implementation
 */

function modern_architecture_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'modern_architecture_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 220,
		'wp-head-callback'       => 'modern_architecture_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'modern_architecture_custom_header_setup' );

if ( ! function_exists( 'modern_architecture_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see modern_architecture_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'modern_architecture_header_style' );
function modern_architecture_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .page-template-custom-home-page #header, #header {
			background-image:url('".esc_url(get_header_image())."');
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'modern-architecture-basic-style', $custom_css );
	endif;
}
endif; // modern_architecture_header_style