<?php
/**
 * The template for displaying archive pages
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
					<h1 class="h-title glitch-effect" data-text="<?php echo esc_attr( get_the_archive_title() ); ?>"><?php echo esc_html( get_the_archive_title() ); ?></h1>
					<div class="h-subtitle typing-bread">
						<?php glitche_breadcrumb(); ?>
					</div>
					<span class="typed-bread"></span>
				</div>
			</div>
		</div>
		<a href="#" class="mouse_btn"><span class="ion ion-mouse"></span></a>
	</div>

	<?php
	//get portfolio subtitle
	$pf_subtitle = get_field( 'portfolio_subtitle', 'option' );
	if( ! $pf_subtitle ) {
		$pf_subtitle = esc_html__( 'Recent Works', 'glitche' );
	}
	?>

	<!-- Works -->
	<div class="section works">
		<div class="content">
			<?php if ( have_posts() ) : ?>

			<div class="title">
				<div class="title_inner"><?php echo esc_html( $pf_subtitle ); ?></div>
			</div>
			
			<div class="box-items portfolio-items">
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