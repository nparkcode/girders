<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Girders
 * @since Girders 1.0
 */

get_header(); ?>

	<section class="error-404 not-found clearfix">

		<header class="page-header">

			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'girders' ); ?></h1>

		</header>

		<div class="page-content">
			
			<p><?php esc_html_e( 'It looks like nothing was found at this location. This may be due to the page being moved, renamed or deleted.', 'girders' ); ?></p>

			<ul>
				<li><?php esc_html_e( 'Check the URL in the address bar above;', 'girders' ); ?></li>
				<li><?php printf( esc_html__( 'Look for the page in the main navigation above or on the %s page;', 'girders' ), '<a href="/site-map/" title="Site Map Page">Site Map</a>' ); ?></li>
				<li><?php esc_html_e( 'Or try using the Search below.', 'girders' ); ?></li>
			</ul>

			<?php get_search_form(); ?>

		</div>

	</section>

<?php get_footer();
