<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package glitche
 */

get_header();
?>

	<!-- Started -->
	<div class="section started">
		<div class="centrize full-width">
			<div class="vertical-center">
				<div class="started-content">
					<h1 class="h-title blog_title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search: %s', 'glitche' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
					<div class="h-subtitle typing-bread">
						<?php glitche_breadcrumb(); ?>
					</div>
					<span class="typed-bread"></span>
				</div>
			</div>
		</div>
		<a href="#" class="mouse_btn"><span class="ion ion-mouse"></span></a>
	</div>
	
	<!-- Blog -->
	<div class="section blog">
		<div class="content">

		<?php if ( have_posts() ) : ?>
			<div class="title">
				<div class="title_inner"><?php echo esc_html__( 'Search Results', 'glitche' ); ?></div>
			</div>
			<div class="box-items">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );
				endwhile;
				?>
			</div>
			
			<div class="pager">
				<?php
					echo paginate_links( array(
						'prev_text'		=> esc_html__( 'Prev', 'glitche' ),
						'next_text'		=> esc_html__( 'Next', 'glitche' ),
					) );
				?>
			</div>
			
		<?php else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>

			<div class="clear"></div>
		</div>
	</div>
<?php
get_sidebar();
get_footer();