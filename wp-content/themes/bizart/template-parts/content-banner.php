<?php
/**
 * Template part for displaying inner banner in pages
 * @since Bizart 1.0
 */

if( ( is_archive() || is_home() ) && bizart_get( 'hide-in-archive-page' ) ){
	return;
}

if( is_singular( 'post' ) || is_page() || is_home() ){ 

	if( is_front_page() ){
		$src = get_header_image();
		
	}else{
		$id = bizart_get_page_id();
		
		$meta_id = 'bizart-disable-inner-banner';
		if( "on" == get_post_meta( $id, $meta_id, true ) ){
			return;
		}

		$meta_id = 'bizart-use-featured-image-for-banner';
		if( 'on' == get_post_meta( $id, $meta_id, true ) ){
			$src = get_the_post_thumbnail_url( $id, 'full' );
		}else{
			$src = get_header_image();
		}
	}
}else{
	$src = get_header_image();
}

if( isset( $src ) ){
	$src = 'background: url( '. esc_url( $src ) .' )';
}else{
	$src = '';
}

$breadcrumb = bizart_get( 'show-breadcrumb' );		
?>
<div class="bizart-inner-banner-wrapper" style="<?php echo esc_attr( $src ); ?>"> 
	<div class="container">
		<div class="bizart-inner-banner">
			<header class="entry-header">
				<?php 
					if( is_singular() ){
						the_title( '<h1 class="entry-title">', '</h1>' );
					}elseif(  is_archive() ){
						the_archive_title( '<h2 class="entry-title">', '</h2>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					}elseif( is_home() ){
						# when home page is latest posts the custom title.
						$blog_title = bizart_get( 'banner-title' );
						?>
						<h2 class="entry-title"><?php echo esc_html( $blog_title ) ?></h2>
						<?php
					}elseif(  is_search() ){
						get_search_form();
						/* translators: %s: search page result */ 
						?>
						<h2 class="entry-title">
							<?php 
								printf( 
									esc_html__( 'Search Results for: %s', 'bizart' ), 
									'<span>' . get_search_query() . '</span>' 
								);
							?>
						</h2>
						<?php
					}
				?>
			</header><!-- .entry-header -->
		</div>

		<?php if( $breadcrumb ): ?>
		    <div class="breadcrumb-wrapper">
		    	<?php 
		    		$breadcrumb_args = array(
		    		    'container'   => 'div',
		    		    'show_browse' => false,
		    		);
		    		bizart_breadcrumb_trail( $breadcrumb_args ); 
		    	?>
			</div>
		<?php endif; ?>
	</div>
</div>
