<?php
/**
 * Sidebar Template
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Girders
 * @since Girders 1.0
 */
?>

<?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
	<div id="left-sidebar" class="sidebar clearfix" role="complementary">
	<?php dynamic_sidebar( 'left-sidebar' ); ?>
	</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
	<div id="right-sidebar" class="sidebar clearfix" role="complementary">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
	</div>
<?php endif;
