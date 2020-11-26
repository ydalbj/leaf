<?php
/**
 * Template file for sidebar
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

<!--Sidebar Section-->

<div class="col-md-4 col-sm-12 col-xs-12">

	<div class="sidebar padding-left-30">
	
		<?php dynamic_sidebar( 'sidebar-1' ); ?>	
		
	</div>
	
</div>	

<!--Sidebar Section-->

<?php endif; ?>