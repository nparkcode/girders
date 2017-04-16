<?php
/**
 * Error Messages
 *
 * @package Girders
 * @since Girders 1.0
 */
?>

<section class="post-not-found clearfix">

	<header class="page-header">
		<h1><?php _e( 'Oops, Post Not Found!', 'girders' ); ?></h1>
	</header>

	<div class="page-content">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'girders' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'girders' ); ?></p>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'girders' ); ?></p>

			<?php get_search_form(); ?>

		<?php endif; ?>

	</div>

</section>