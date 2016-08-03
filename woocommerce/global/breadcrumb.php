<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;

if ( ! empty( $breadcrumb ) ) {

	echo $wrap_before;
	
	/**
	 * SCAFFOLDING EDIT
	 * highly customized
	 * add referer url for single product pages
	 * @TODO: check for custom post types other than product, product attributes
	 */
	
	// Update breadcrumb on product pages
	if ( is_product() ) {

		// Get referring url
		$referer = wp_get_referer();
		
		// Category/tag base
		$permalinks = get_option( 'woocommerce_permalinks' );
		$cat_base = ( ! empty( $permalinks['category_base'] ) ) ? $permalinks['category_base'] : 'product-category';
		$tag_base = ( ! empty( $permalinks['tag_base'] ) ) ? $permalinks['tag_base'] : 'product-tag';
		$slug = '';

		if ( strpos( $referer, $cat_base ) !== false ) {
			$slug = $cat_base;
			$tax = 'product_cat';
		} elseif ( strpos( $referer, $tag_base ) !== false ) {
			$slug = $tag_base;
			$tax = 'product_tag';
		}
		
		// Make sure referrer url is coming from a category or tag
		if ( ! empty( $slug ) && strpos( $referer, $slug ) !== false ) {
			
			// Strip forward slash from end of url
			$referer_rtrim = rtrim( $referer, '/' );

			// Strip front of url including and before product-category 
			$referer_trim_front = substr( strstr( $referer_rtrim, '/' . $slug . '/'), strlen('/' . $slug . '/') );

			// Strip end of url including pagination
			$referer_trim_end = ( strpos( $referer_trim_front, '/page/' ) ) ? substr( $referer_trim_front, 0, strpos( $referer_trim_front, '/page/' ) ) : $referer_trim_front;

			// Put remaining slugs in url into an array
			$referer_array = explode( '/', $referer_trim_end );

			$breadcrumb_size = sizeof( $breadcrumb ) - 1; // offset 0 index
			$breadcrumb_update = array();
			$relevant_terms = array();
			$int = 0;

			$breadcrumb_update[] = $breadcrumb[0]; // push home link

			$reverse_referer_array = array_reverse( $referer_array );

			$child_term = get_term_by( 'slug', $reverse_referer_array[ $int ], $tax );

			if ( $child_term ) {
				$ancestors = get_ancestors( $child_term->term_id, $tax );
				$reverse_ancestors = array_reverse( $ancestors );

				if ( $reverse_ancestors ) {
					foreach ( $reverse_ancestors as $ancestor ) {
						$term = get_term( $ancestor, $tax );
						$relevant_terms[] = array( $term->name, get_term_link( $term->term_id, $tax ) );
					}
				}

				$relevant_terms[] = array( $child_term->name, get_term_link( $child_term->term_id, $tax ) );
			}

			$breadcrumb_update = array_merge( $breadcrumb_update, $relevant_terms ); // merge our referrer links

			$breadcrumb_update[] = $breadcrumb[ $breadcrumb_size ]; // push current product

			$breadcrumb = $breadcrumb_update; // use our updated array for breadcrumb

		}
		
	}
	
	// Override breadcrumb on category pages
	if ( is_singular( 'post' ) ) {
		$breadcrumb = array();
		$blog_id = get_option( 'page_for_posts' );
		$breadcrumb[] = array( 'Home', get_home_url() );
		$breadcrumb[] = array( get_the_title( $blog_id ), get_permalink( $blog_id ) );
		$breadcrumb[] = array( get_the_title( $post->ID ), '' );
	}
	
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

	foreach ( $breadcrumb as $key => $crumb ) {

		echo $before;
		
		if ( $key == 0 ) {
			$class = ' class="crumb-first"';
		} else {
			$class = '';
		}

		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			echo '<a href="' . esc_url( $crumb[1] ) . '" title="' . esc_attr( $crumb[0] ) . '"' . $class . '>' . wp_strip_all_tags( $crumb[0] ) . '</a>';
		} else {
			echo '<span class="crumb-current">' . wp_strip_all_tags( $crumb[0] ) . '</span>';
		}

		echo $after;

		if ( sizeof( $breadcrumb ) !== $key + 1 ) {
			echo $delimiter;
		}

	}

	echo $wrap_after;

}