<?php
// Innofit scripts
if( !function_exists('innofit_scripts_function'))
{
	function innofit_scripts_function(){
		
		// function for custom skin color
		
		if(get_theme_mod('custom_color_enable') == true) {
				innofit_custom_light(); 
		}
		else
		{
			wp_enqueue_style('innofit-default', INNOFIT_TEMPLATE_DIR_URI . '/css/default.css');
		}
		// css
		wp_enqueue_style('bootstrap', INNOFIT_TEMPLATE_DIR_URI . '/css/bootstrap.min.css');
		wp_enqueue_style('innofit-style', get_stylesheet_uri() );
		
		wp_enqueue_style('innofit-font-awesome.min-css', INNOFIT_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.min.css');
		//js
		wp_enqueue_script('bootstrap', INNOFIT_TEMPLATE_DIR_URI . '/js/bootstrap.min.js',array('jquery'));
		
		// Menu & page scroll js		
		wp_enqueue_script('innofit-menu-js', INNOFIT_TEMPLATE_DIR_URI . '/js/menu.js',array('jquery'));
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action('wp_enqueue_scripts','innofit_scripts_function');
?>