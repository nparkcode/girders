<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package Girders
 * @since Girders 1.0
 */
?>

	<form method="get" id="searchform" class="clearfix" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'girders' ); ?></label>
		<input type="text" name="s" id="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'Search the Site&hellip;', 'girders' ); ?>" />
		<input type="submit" id="searchsubmit" value="<?php esc_attr_e( 'Go', 'girders' ); ?>" />
	</form>