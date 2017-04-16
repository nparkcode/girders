<?php
/**
 * Footer Template
 *
 * Contains the closing of the "main" div and all content after.
 *
 * @package Girders
 * @since Girders 1.0
 */
?>

					</div><?php // END #main ?>

				<?php get_sidebar(); ?>

			</div><?php // END #inner-content ?>

		</div><?php // END #content ?>

		<footer id="colophon" class="footer" role="contentinfo">

			<div id="inner-footer" class="wrap clearfix">

				<nav role="navigation" aria-label="<?php _e( 'Footer Navigation', 'girders' ); ?>">

					<?php girders_footer_nav(); ?>

				</nav>

				<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>

			</div>

		</footer>

		<p id="back-top">
			<a href="#top"><i class="fa fa-angle-up"></i></a>
		</p>

	</div><?php // END #container ?>

<?php
wp_footer();
?>

</body>
</html>