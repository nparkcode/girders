<?php
/**
 * Archive Template
 *
 * Default template for displaying archives (categories, tags, taxonomies, dates, authors, etc.).
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Girders
 * @since Girders 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			<?php the_archive_description( '<div class="archive-description>', '</div>' ); ?>

		</header>

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">

				<header class="entry-header">

					<h3 class="entry-title h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

					<p class="entry-meta"><?php printf( __( 'Posted <time class="updated" datetime="%1$s">%2$s</time> by <span class="author">%3$s</span> <span class="amp">&amp;</span> filed under %4$s.', 'girders' ), get_the_time( 'Y-m-d' ), get_the_time( get_option( 'date_format' ) ), girders_get_the_author_posts_link(), get_the_category_list( ', ' ) ); ?></p>

				</header>

				<section class="entry-content clearfix">

					<?php //the_post_thumbnail(); ?>

					<?php the_excerpt(); ?>

				</section>

				<?php /* Hidden By Default - no content
				<footer class="entry-footer">
				</footer>
				*/ ?>

			</article><?php // END post article ?>

		<?php endwhile; ?>

		<?php get_template_part( 'template-parts/pager' ); // WordPress template pager/pagination ?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/error' ); // WordPress template error message ?>

	<?php endif; ?>

<?php get_footer();
