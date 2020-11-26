<?php
/**
 * Template for displaying search forms in Modern Architecture
 *
 * @subpackage Modern Architecture
 * @since 1.0
 * @version 0.1
 */
?>

<?php $modern_architecture_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e('Search for:','modern-architecture'); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder','modern-architecture' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
	</label>
	<button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'modern-architecture' ); ?></button>
</form>