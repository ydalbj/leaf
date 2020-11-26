<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'modern_architecture_above_slider' ); ?>

	<?php if( get_theme_mod('modern_architecture_slider_hide_show') != ''){ ?>
		<section id="slider">
		  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
			    <?php $modern_architecture_slider_pages = array();
		      	for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'modern_architecture_slider' . $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $modern_architecture_slider_pages[] = $mod;
			        }
		      	}
		      	if( !empty($modern_architecture_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $modern_architecture_slider_pages,
			          	'orderby' => 'post__in'
			        );
			        $query = new WP_Query( $args );
			        if ( $query->have_posts() ) :
			          $i = 1;
			    ?>     
				    <div class="carousel-inner" role="listbox">
				      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
					        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
					        	<?php the_post_thumbnail(); ?>
					          	<div class="carousel-caption">
						            <div class="inner_carousel">
						              	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
						            </div>
					          	</div>
					        </div>
				      	<?php $i++; endwhile; 
				      	wp_reset_postdata();?>
				    </div>
			    <?php else : ?>
			    	<div class="no-postfound"></div>
	      		<?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		          	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-left"></i><?php esc_html_e( 'PREV','modern-architecture' );?></span>
		          <span class="screen-reader-text"><?php esc_html_e( 'Previous','modern-architecture' );?></span>
		        </a>
		        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		          	<span class="carousel-control-next-icon" aria-hidden="true"><?php esc_html_e( 'NEXT','modern-architecture' );?><i class="fas fa-long-arrow-alt-right"></i></span>
		          <span class="screen-reader-text"><?php esc_html_e( 'Next','modern-architecture' );?></span>
		        </a>
		  	</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>

	<?php do_action('modern_architecture_below_slider'); ?>

	<section id="our-services">
		<div class="container">
			<div class="service-title">
				<?php if (get_theme_mod('modern_architecture_subheading_text','')) { ?>
					<strong><?php echo esc_html(get_theme_mod('modern_architecture_subheading_text','')); ?></strong>
				<?php } ?>
				<?php if (get_theme_mod('modern_architecture_heading_text','')) { ?>
					<h2><?php echo esc_html(get_theme_mod('modern_architecture_heading_text','')); ?></h2>
				<?php } ?>
			</div>
			<div class="service-box">
	            <div class="row">
		      		<?php $modern_architecture_catData1 =  get_theme_mod('modern_architecture_category_setting');
      				if($modern_architecture_catData1){ 
	      				$page_query = new WP_Query(array( 'category_name' => esc_html($modern_architecture_catData1 ,'modern-architecture')));?>
		        		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>	
		          			<div class="col-lg-4 col-md-4">
		          				<div class="service-section">
		      						<div class="service-img">
							      		<?php the_post_thumbnail(); ?>
							  		</div>
	          						<div class="service-content">
					            		<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					            		<p><?php $modern_architecture_excerpt = get_the_excerpt(); echo esc_html( modern_architecture_string_limit_words( $modern_architecture_excerpt,18 ) ); ?></p>
					            		<div class="read-btn">
						            		<a href="<?php the_permalink(); ?>"><?php esc_html_e('Learn More','modern-architecture'); ?><i class="fas fa-long-arrow-alt-right"></i><span class="screen-reader-text"><?php esc_html_e('Learn More','modern-architecture'); ?></span></a>
								       	</div>
		            				</div>	
		          				</div>
						    </div>
		          		<?php endwhile; 
		          	wp_reset_postdata();
		      		}?>
	      		</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</section>

	<?php do_action('modern_architecture_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	        <?php the_content(); ?>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>