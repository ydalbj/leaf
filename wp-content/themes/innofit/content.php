<?php
/**
 * The default template for displaying content
*/
?>

	<article <?php post_class( 'post-content-area' ); ?>>			
		<?php 
			if(has_post_thumbnail()){
			if ( !is_single() ) {
			echo '<figure class="post-thumbnail"><a class="post-thumbnail" href="'.esc_url(get_the_permalink()).'">';
			the_post_thumbnail( '', array( 'class'=>'img-responsive' ) );
			echo '</a></figure>';
			} } ?>

		
		<div class="post-content">	
				<?php $innofit_blog_meta_section_enable = get_theme_mod('blog_meta_section_enable',true);
					if($innofit_blog_meta_section_enable ==true) { ?>
				<div class="entry-meta">
					<span class="entry-date">
					<a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"><time>
					<?php echo esc_html(get_the_date());?></time></a>
					</span>
				
					<?php $innofit_cat_list = get_the_category_list();
					if(!empty($innofit_cat_list)) { ?>
					<span class="cat-links"><?php the_category(' '); ?></span>
					<?php } $innofit_tag_list = get_the_tag_list();
					if(!empty($innofit_tag_list)) { ?>
					<span class="tag-links"><?php the_tags('', '', ''); ?></span>
					<?php } ?>
				</div>
					<?php } ?>
															
			<header class="entry-header">
				<?php if ( is_single() ) :
				the_title( '<h3 class="entry-title">', '</h3>' );
				else :
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
				endif;
				?>
			</header>
			
			<div class="entry-content">
				<?php 
				if(is_single()):
					the_content();
				else:
				the_excerpt(); 
				endif;?>
				<?php wp_link_pages( ); ?>
				<?php if(!is_single()):?>
				<p class="item-meta"><a href="<?php the_permalink();?>" class="more-link btn-ex-small btn-border"><?php _e('Read more','innofit'); ?></a>
			<?php endif;?>
			</div>
			<?php if($innofit_blog_meta_section_enable ==true) { ?>
			<hr>
			<div class="item-meta">
				
				<div class="pull-left v-center">
					
					<a class="avatar" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' )) );?>"><?php echo get_avatar( get_the_author_meta('user_email'), $size = '40'); ?></a>
					
					<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' )) );?>"><?php echo esc_html__('By ','innofit');?><?php echo esc_html(get_the_author());?></a>
					
				</div>
				
			</div>
			<?php } ?>
		</div>				
	</article>