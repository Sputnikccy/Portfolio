<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package glitche
 */

?>

<?php
	$portfolio_featured_img = get_field( 'portfolio_featured_img', 'option' );
	$info = get_field( 'info' );

	/*get categories*/
	$current_categories = get_the_terms( get_the_ID(), 'portfolio_categories' );
	$categories_string = '';
	if ( $current_categories && ! is_wp_error( $current_categories ) ) {
		$arr_keys = array_keys( $current_categories );
		$last_key = end( $arr_keys );
		foreach ( $current_categories as $key => $value ) {
			$categories_string .= '<span class="tag">' . $value->name. '</span>';
		}
	}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-post-text">

		<div class="portfolio-info <?php if ( $info ) : ?>portfolio-cols<?php endif; ?>">
			<div class="description-col">
				<div class="title">
					<div class="title_inner"><?php echo esc_html__( 'Description', 'glitche' ); ?></div>
				</div>
				<?php
					if ( has_post_thumbnail() && ! $portfolio_featured_img ) : 
						the_post_thumbnail( 'full', array(
							'alt' => the_title_attribute( array(
								'echo' => false,
							)),
						) );
					endif;
				
					the_content(); 

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'glitche' ),
						'after'  => '</div>',
					) );
				?>
			</div>
			<?php if ( $info ) : ?>
			<div class="details-col">
				<div class="title">
					<div class="title_inner"><?php echo esc_html__( 'Details', 'glitche' ); ?></div>
				</div>
				<ul class="details-list">
					<?php foreach( $info as $item ) : ?>
					<li>
						<strong><?php echo esc_html( $item['name'] ); ?></strong> 
						<?php if ( $item['type'] == 1 ) : ?>
							<?php echo esc_html( $item['text'] ); ?>
						<?php elseif ( $item['type'] == 2 ) : ?>
							<a href="<?php echo esc_url( $item['link']['url'] ); ?>"<?php if ( $item['link']['target'] ) : ?> target="_blank"<?php endif; ?>><?php echo esc_html( $item['link']['title'] ); ?></a>
						<?php endif; ?>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
		</div>

	</div>

	<div class="post-text-bottom">
		
		<span class="tags-links">
			<?php esc_html_e( 'Categories:', 'glitche' ); ?>
			
			<?php if ( $categories_string ) : ?>
				<?php echo wp_kses_post( $categories_string ); ?>
			<?php endif; ?>
		</span>
		
		<?php glitche_entry_footer(); ?>
	</div>
</div><!-- #post-<?php the_ID(); ?> -->
