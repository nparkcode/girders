<?php
/**
 * Create a Custom Theme Guide
 *
 * This may be useful for clients as a user guide.
 * Edit however it may suit your needs.
 *
 * @since Girders 1.1
 */

/**
 * Girders theme page html
 *
 * @since Girders 1.1
 */
function girders_theme_page() { ?>
	<div class="wrap">
		<h2>Girders Theme Guide</h2>
		<ul>
			<li>Here you can add theme specific instructions for clients;</li>
			<li>Show content to specific users by capability or role;</li>
			<li>Or do something completely different.</li>
		</ul>
		<strong>Resources</strong>
		<ol>
			<li><a href="http://scaffolding.io" target="_blank">Scaffolding Theme</a></li>
			<li><a href="http://codex.wordpress.org" target="_blank">WordPress Codex</a></li>
			<?php if ( class_exists( 'Woocommerce' ) ) { ?>
				<li><a href="http://docs.woothemes.com/documentation/plugins/woocommerce/" target="_blank">WooCommerce</a></li>
			<?php } ?>
		</ol>
		<strong>Theme Supports</strong>
		<ol>
			<?php if ( current_theme_supports( 'post-thumbnails' ) ) { ?>
				<li>Post Thumbnails</li>
			<?php } ?>
			<?php if ( current_theme_supports( 'post-formats' ) ) { ?>
				<li>Post Formats</li>
			<?php } ?>
			<?php if ( current_theme_supports( 'custom-header' ) ) { ?>
				<li>Custom Headers</li>
			<?php } ?>
			<?php if ( current_theme_supports( 'custom-background' ) ) { ?>
				<li>Custom Background</li>
			<?php } ?>
			<?php if ( current_theme_supports( 'menus' ) ) { ?>
				<li>Menus</li>
			<?php } ?>
			<?php if ( current_theme_supports( 'automatic-feed-links' ) ) { ?>
				<li>RSS Feed</li>
			<?php } ?>
			<?php if ( current_theme_supports( 'editor-style' ) ) { ?>
				<li>Custom Editor Styles</li>
			<?php } ?>
			<?php if ( current_theme_supports( 'widgets' ) ) { ?>
				<li>Widgets</li>
			<?php } ?>
			<?php if ( current_theme_supports( 'html5' ) ) { ?>
				<li>HTML5</li>
			<?php } ?>
			<?php if ( current_theme_supports( 'title-tag' ) ) { ?>
				<li>Title Tags</li>
			<?php } ?>
		</ol>
	</div>
	<?php
} // end girders_theme_page()

/**
 * Add girders theme page in appearances dropdown menu
 *
 * @see girders_theme_page
 * @since Girders 1.1
 */
function girders_theme_menu() {
	add_theme_page( 'Girders Theme', 'Girders Guide', 'edit_theme_options', 'girders_theme_guide', 'girders_theme_page' );
}
add_action( 'admin_menu', 'girders_theme_menu' );
