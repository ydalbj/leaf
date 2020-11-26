<?php 
/**
 * Template Name: Business Template
 */
get_header();

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if ( ! function_exists( 'innofitp_activate' ) ):

	if ( function_exists( 'spiceb_activate' ) ):

		do_action( 'innofit_slider_action' , false);
		do_action( 'innofit_services_action', false);
		do_action( 'innofit_about_action' ,false);
		do_action( 'innofit_wooproduct_action', false);
		if(get_theme_mod('innofit_testimonial_content')!="")
		{
		do_action( 'innofit_testimonial_action' ,false);	
		}
		do_action( 'innofit_team_action' ,false);
        do_action( 'innofit_news_action' ,false);
		do_action( 'innofit_contact_action' , false);
		if(get_theme_mod('innofit_subscribe_title')!="")
		{
		do_action( 'innofit_subscriber_action' , false);
		}
		if(get_theme_mod('home_call_out_title')!="")
		{
		do_action( 'innofit_callout_action' ,false);	
		}

	endif;

endif;


if ( function_exists( 'innofitp_activate' ) ):

	    $innofit_front_page = get_theme_mod('front_page_data','services,about,portfolio,funfact,wooproduct,testimonial,team,pricing,news,map,contact,subscriber,client,instagram');
		
        do_action( 'innofit_slider_action' , false);
		
		do_action( 'innofit_after_slider_section_hook', false);
		
		$innofit_data =is_array($innofit_front_page) ? $innofit_front_page : explode(",",$innofit_front_page);
			
		if($innofit_data) 
		{
			foreach($innofit_data as $key=>$value)
			{	
                do_action( 'innofit_before_'.$value.'_section_hook', false);
				
				do_action( 'innofit_'.$value.'_action', false);
				
				do_action( 'innofit_after_'.$value.'_section_hook', false);

			}
		}

endif;


get_footer(); ?>