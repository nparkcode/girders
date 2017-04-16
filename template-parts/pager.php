<?php
/**
 * Pagination
 *
 * @package Girders
 * @since Girders 1.0
 */

if ( function_exists( 'girders_page_navi' ) ) : ?>

	<?php global $wp_query; girders_page_navi( '', '', $wp_query ); ?>

<?php else : ?>

	<nav class="wp-prev-next">
		<ul class="clearfix">
			<li class="prev-link">
				<?php next_posts_link( __( '&laquo; Older Entries', 'girders' ) ); ?>
			</li>
			<li class="next-link">
				<?php previous_posts_link( __( 'Newer Entries &raquo;', 'girders' ) ); ?>
			</li>
		</ul>
	</nav>

<?php
endif;
