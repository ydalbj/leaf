<?php
if ( ! function_exists( 'innofitp_activate' ) ):
?>
<!--Footer Section-->
<footer class="site-footer">	
	<div class="container-fluid">
		<div class="row footer-sidebar">
	   
			<!--Site Info-->	
			<div class="col-md-3 col-sm-4 col-xs-12">		
				<div class="site-info">
					<div class="site-branding pbottom-50">
					<?php the_custom_logo(); ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							$innofit_description = get_bloginfo( 'description', 'display' );
							if ( $innofit_description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo esc_html($innofit_description); ?></p>
							<?php endif; ?>
					</div>
					<?php $innofit_footer_copyright = get_theme_mod('footer_copyright_text','<p>'.__( '<a href="https://wordpress.org">Proudly powered by WordPress</a> | Theme: <a href="https://spicethemes.com" rel="nofollow">Innofit</a> by SpiceThemes', 'innofit' ).'</p>');?>
					<?php echo wp_kses_post($innofit_footer_copyright);?>
				</div>
			</div>
			<!--/Site Info-->		
			
			<!--Footer Widgets-->		
			<div class="col-md-9 col-sm-8 col-xs-12">		
				<div class="row">
					<?php get_template_part('sidebar','footer');?>
				</div>
			</div>
			<!--/Footer Widgets-->
		</div>
		
	</div>			
</footer>
<!--End of Footer Section-->

<!--Page Scroll Up-->
<div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
<!--/Page Scroll Up-->
<?php wp_footer(); ?>
</div>
</body>
</html>
<?php endif; ?>

<?php
if (function_exists( 'innofitp_activate' ) ):
     do_action( 'innofit_footer_action', false); 
endif; ?>