<?php
/**
 * Default Page Template
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Girders
 * @since Girders 1.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

				<header class="page-header">

					<h1 class="page-title"><?php the_title(); ?></h1>

				</header>

				<section class="page-content clearfix">

					<?php the_content(); ?>

					<?php wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'girders' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
					) ); ?>

				 </section>

				<?php
					  // If comments are open or we have at least one comment, load up the comment template
					  if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
					  endif;
				 ?>

			</article>

		<?php endwhile; ?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/error' ); // WordPress template error message ?>

	<?php endif; ?>

<?php get_footer();
