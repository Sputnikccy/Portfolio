<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package glitche
 */

get_header();
?>
	
	<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'template-parts/start-section' ); ?>
	
	<!-- Blog -->
	<div class="section blog">
		<div class="content">
			<?php
				get_template_part( 'template-parts/content', 'single-portfolio' );
				
				the_post_navigation( array(
					'screen_reader_text' => ' ',
					'next_text' => '<span class="post-nav-prev post-nav-text">' . esc_html__( 'Next', 'glitche' ) . '</span>',
					'prev_text' => '<span class="post-nav-next post-nav-text">' . esc_html__( 'Prev', 'glitche' ) . '</span>'
				) );
			
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
			
			<div class="clear"></div>
		</div>
	</div>
	
	<?php endwhile; ?>

<?php
get_sidebar();
get_footer();