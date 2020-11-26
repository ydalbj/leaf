<?php
/**
 * The header for our theme
 *
 * @subpackage Modern Architecture
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'modern-architecture' ); ?></a>

<div id="header">
	<div class="topbar">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<?php if (get_theme_mod('modern_architecture_topbar_text','')) {?>
						<p><?php echo esc_html(get_theme_mod('modern_architecture_topbar_text','')); ?></p>
					<?php } ?>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="social-icons">
						<?php if(get_theme_mod('modern_architecture_facebook_url','')){ ?>
							<a href="<?php echo esc_url(get_theme_mod('modern_architecture_facebook_url','')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'modern-architecture'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('modern_architecture_twitter_url','')){ ?>
							<a href="<?php echo esc_url(get_theme_mod('modern_architecture_twitter_url','')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'modern-architecture'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('modern_architecture_instagram_url','')){ ?>
							<a href="<?php echo esc_url(get_theme_mod('modern_architecture_instagram_url','')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'modern-architecture'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('modern_architecture_linkedin_url','')){ ?>
							<a href="<?php echo esc_url(get_theme_mod('modern_architecture_linkedin_url','')); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php echo esc_html('Linkedin', 'modern-architecture'); ?></span></a>
						<?php }?>
						<?php if(get_theme_mod('modern_architecture_pinterest_url','')){ ?>
							<a href="<?php echo esc_url(get_theme_mod('modern_architecture_pinterest_url','')); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php echo esc_html('Pinterest', 'modern-architecture'); ?></span></a>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom-header">
		<div class="container">
			<div class="row">
				<div class="logo col-lg-3 col-md-5 col-9">
					<?php if ( has_custom_logo() ) : ?>
	            		<?php the_custom_logo(); ?>
		            <?php endif; ?>
	             	<?php if (get_theme_mod('modern_architecture_show_site_title',true)) {?>
              		<?php $blog_info = get_bloginfo( 'name' ); ?>
		                <?php if ( ! empty( $blog_info ) ) : ?>
		                  	<?php if ( is_front_page() && is_home() ) : ?>
		                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		                  	<?php else : ?>
	                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	                  		<?php endif; ?>
		                <?php endif; ?>
		            <?php }?>
		            <?php if (get_theme_mod('modern_architecture_show_tagline',true)) {?>
		                <?php
	                  		$description = get_bloginfo( 'description', 'display' );
		                  	if ( $description || is_customize_preview() ) :
		                ?>
	                  	<p class="site-description">
	                    	<?php echo esc_attr($description); ?>
	                  	</p>
	              		<?php endif; ?>
              		<?php }?>
				</div>
				<div class="menu-section col-lg-9 col-md-7 col-3">
					<div class="toggle-menu responsive-menu">
						<?php if(has_nav_menu('primary')){ ?>
			            	<button onclick="modern_architecture_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','modern-architecture'); ?></span></button>
			            <?php }?>
			        </div>
					<div id="sidelong-menu" class="nav sidenav">
		                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'modern-architecture' ); ?>">
		                  	<?php if(has_nav_menu('primary')){
			                    wp_nav_menu( array( 
									'theme_location' => 'primary',
									'container_class' => 'main-menu-navigation clearfix' ,
									'menu_class' => 'clearfix',
									'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
									'fallback_cb' => 'wp_page_menu',
			                    ) ); 
		                  	} ?>
		                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="modern_architecture_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','modern-architecture'); ?></span></a>
		                </nav>
		            </div>
				</div>
			</div>
		</div>
	</div>
</div>