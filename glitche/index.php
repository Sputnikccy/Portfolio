<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
					<h1 class="h-title glitch-effect" data-text="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></h1>
					<div class="h-subtitle typing-subtitle">
						<p><?php bloginfo( 'description' ); ?></p>
					</div>
					<span class="typed-subtitle"></span>
				</div>
			</div>
		</div>
		<a href="#" class="mouse_btn"><span class="ion ion-mouse"></span></a>
	</div>

	<?php
	//get blog subtitle
	$blog_subtitle = get_field( 'blog_subtitle', 'option' );
	if( ! $blog_subtitle ) {
		$blog_subtitle = esc_html__( 'Latest Posts', 'glitche' );
	}
	?>

	<!-- Blog -->
	<div class="section blog">
		<div class="content">
			<?php if ( have_posts() ) : ?>
				<div class="title">
					<div class="title_inner"><?php echo esc_html( $blog_subtitle ); ?></div>
				</div>
				<div class="box-items">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

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