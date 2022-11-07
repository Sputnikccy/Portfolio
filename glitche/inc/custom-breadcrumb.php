<?php

/**
 * Breadcrumb
 */
if ( ! function_exists( 'glitche_breadcrumb' ) ) {
	function glitche_breadcrumb() {
		$sep = __( ' / ', 'glitche' );

		if ( ! is_front_page() ) {
		
			// Start the breadcrumb with a link to your homepage
			echo '<p class="breadcrumbs">';
			echo '<a href="' . esc_url( home_url() ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '">' . esc_html__( 'Home', 'glitche' ) . '</a>';
			
			// If the current page is a static posts page, show its title.
			if ( ( is_home() || is_category() || is_singular( 'post' ) ) && get_option( 'page_for_posts', true ) ) {
				$blog_title = get_the_title( get_option( 'page_for_posts', true ) );
				$blog_link = get_the_permalink( get_option( 'page_for_posts', true ) );

				echo esc_html( $sep );
				echo '<a href="' . esc_url( $blog_link ) . '" title="' . esc_attr( $blog_title ) . '">' . esc_html( $blog_title ) . '</a>';
			}

			// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
			if ( is_category() || is_single() ){
				$category = get_the_category();

				if( $category ) {
					echo esc_html( $sep ) . esc_html( $category[0]->cat_name );
				}
			} elseif ( is_post_type_archive( 'portfolio' ) ) {
				echo esc_html( $sep ) . esc_html__( 'Portfolio', 'glitche' );
			} elseif ( is_archive() || is_single() ){
				echo esc_html( $sep );

				if ( is_day() ) {
					printf( __( '%s', 'glitche' ), get_the_date() );
				} elseif ( is_month() ) {
					printf( __( '%s', 'glitche' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'glitche' ) ) );
				} elseif ( is_year() ) {
					printf( __( '%s', 'glitche' ), get_the_date( _x( 'Y', 'yearly archives date format', 'glitche' ) ) );
				} elseif ( is_tag() ) {
					echo get_the_archive_title();
				} else {
					esc_html_e( 'Archives', 'glitche' );
				}
			}
			
			// If Portfolio page	
			if ( is_singular( 'portfolio' ) ) {
				echo esc_html( $sep ) . esc_html__( 'Portfolio', 'glitche' );
			}
		
			// If the current page is a static page, show its title.
			if ( is_search() ) {
				echo esc_html( $sep );
				printf( esc_html__( 'Search: %s', 'glitche' ), '<span>' . get_search_query() . '</span>' );
			}
			
			// If the current page is a static page, show its title.
			if ( is_page() ) {
				echo esc_html( $sep );
				the_title();
			}
			
			echo '</p>';
		}
	}
}
