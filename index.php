<?php
/**
 * Default Template
 *
 * Used if no other suitable template is available.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Girders
 * @since Girders 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="entry-header">

					<h2 class="entry-title" itemprop="headline"><?php the_title(); ?></h2>

					<p class="entry-meta vcard"><?php printf( __( 'Posted <time class="updated" datetime="%1$s">%2$s</time> by <span class="author">%3$s</span> <span class="amp">&amp;</span> filed under %4$s.', 'girders' ), get_the_time( 'Y-m-d' ), get_the_time( get_option( 'date_format' ) ), girders_get_the_author_posts_link(), get_the_category_list( ', ' ) ); ?></p>

				</header>

				<section class="entry-content clearfix" itemprop="articleBody">

					<?php the_content(); ?>

					<?php wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'girders' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) ); ?>

				</section>
				
				<footer class="entry-footer">

					<?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ', ', '</p>'); ?>

				</footer>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			</article>

		<?php endwhile; ?>

	<?php else : ?>

		<?php get_template_part ( 'template-parts/error' ); // WordPress template error message ?>

	<?php endif; ?>

<?php get_footer();
