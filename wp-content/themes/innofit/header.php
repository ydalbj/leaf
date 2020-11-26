<!DOCTYPE html>
<html <?php language_attributes();?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>

	<?php wp_head(); ?>
</head>
	<?php 
	$innofit_layout_style=get_theme_mod('innofit_layout_style','wide');
	if($innofit_layout_style == "boxed")
	{ $class="boxed"; }
	else
	{ $class="wide"; }
    ?>
	<body <?php body_class($class); ?> data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
	<?php wp_body_open(); ?>	
<div id="page" class="site">
	<a class="skip-link innofit-screen-reader" href="#content"><?php esc_html_e( 'Skip to content', 'innofit' ); ?></a>	
		<div id="wrapper">	
			<?php if(!is_customize_preview()){ ?>
			<!--Custom Navbar For Desktop View-->
			<div id="loader-wrapper">
				<div id="loader"></div>
				<div class="loader-section section-left"></div>
				<div class="loader-section section-right"></div>
			</div>
			<!--Custom Navbar For Desktop View-->
			<?php } ?>
			<?php 
			$innofit_home_page_slider_enabled = get_theme_mod('home_page_slider_enabled','on');
			if($innofit_home_page_slider_enabled !='on' || is_home())
			{?>
			<nav class="navbar navbar-custom navbar-fixed-top one-page desktop-header" role="navigation">
			<?php } else { ?>
			<nav class="navbar navbar-custom <?php if(is_page_template('template-business.php')) { echo 'navbar-transparent'; } ?> navbar-fixed-top one-page desktop-header" role="navigation">
			<?php } ?>
				<div class="container-fluid">
					<div class="row v-center">
					
						<div class="col-lg-2 col-md-3 col-xs-5">
							<?php the_custom_logo(); ?>
			<div class="site-branding-text">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
				$innofit_description = get_bloginfo( 'description', 'display' );
				if ( $innofit_description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo esc_html($innofit_description); ?></p>
				<?php endif; ?>
			</div>
						</div>
						
						<div class="col-lg-8 col-md-6 col-xs-2">
							
								<?php 	
							    wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_class'        => 'nav navbar-nav navbar-right',
								'fallback_cb'       => 'innofit_fallback_page_menu',
								'walker'            => new Innofit_nav_walker())
								);
								?>	
									
						</div>
						
						<div class="col-lg-2 col-md-3 col-xs-5 text-right">						   
						   <div class="header-module">
						
						    <?php if(is_active_sidebar('menu_social_media_sidebar')): ?>
							
							<?php dynamic_sidebar( 'menu_social_media_sidebar' );  ?>
						
						    <?php endif; ?> 
						
					 	    <?php 
								 if ( class_exists( 'WooCommerce' ) ) {
									 
									$shop_button = '';
									$shop_button .= '<div class="cart-header">';
											global $woocommerce; 
											$cart_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
											$shop_button .= '<a class="cart-icon" href="'.esc_url($cart_link).'" >';
											
											if ($woocommerce->cart->cart_contents_count == 0){
													$shop_button .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
												}
												else
												{
													$shop_button .= '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
												}
												   
												$shop_button .= '</a>';
												
												$shop_button .= '<a href="'.esc_url($cart_link).'" ><span class="cart-total">
												'.sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'innofit'), $woocommerce->cart->cart_contents_count).'</span></a>';
													
													
												echo $shop_button;
										}
								?>
								
							</div>
						</div>
						
					</div>	
				</div>
			</nav>
			<!--/End of Custom Navbar For Desktop View-->
			
			
			<!--Custom Navbar For Mobile View-->
			<nav class="navbar navbar-custom navbar-fixed-top one-page mobile-header" role="navigation">
				<div class="container-fluid v-center">
					<div class="navbar-header">
						<?php the_custom_logo(); ?>
						<div class="site-branding-text">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							$innofit_description = get_bloginfo( 'description', 'display' );
							if ( $innofit_description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo esc_html($innofit_description); ?></p>
							<?php endif; ?>
						</div>
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
							<span class="sr-only"> <?php esc_html_e('Toggle navigation','innofit'); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="custom-collapse">
					<?php 	
					   wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_class'        => 'nav navbar-nav navbar-right',
						'fallback_cb'       => 'innofit_fallback_page_menu',
						'walker'            => new Innofit_nav_walker())
					);
					?>
						<div class="header-module">
						
						    <?php if(is_active_sidebar('menu_social_media_sidebar')): ?>
							
							<?php dynamic_sidebar( 'menu_social_media_sidebar' );  ?>
						
						    <?php endif; ?> 
						
					 	    <?php 
								 if ( class_exists( 'WooCommerce' ) ) {
									 
									$shop_button = '';
									$shop_button .= '<div class="cart-header">';
											global $woocommerce; 
											$cart_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
											$shop_button .= '<a class="cart-icon" href="'.esc_url($cart_link).'" >';
											
											if ($woocommerce->cart->cart_contents_count == 0){
													$shop_button .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
												}
												else
												{
													$shop_button .= '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
												}
												   
												$shop_button .= '</a>';
												
												$shop_button .= '<a href="'.esc_url($cart_link).'" ><span class="cart-total">
													'.sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'innofit'), $woocommerce->cart->cart_contents_count).'</span></a>';
													
													
												echo $shop_button;
										}
								?>
								
							</div>
						</div>
				</div>
			</nav>		
<!--/End of Custom Navbar For Mobile View-->