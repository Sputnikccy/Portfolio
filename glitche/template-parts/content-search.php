<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package glitche
 */

?>

<div class="box-item">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="image">
			<?php glitche_post_thumbnail(); ?>
		</div>
		<div class="desc">
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="date">
					<a href="<?php echo esc_url( get_permalink() ); ?>">
						<?php echo esc_html( get_the_date() ); ?>
							
					</a>
				</div>
			<?php endif; ?>

			<a href="<?php echo esc_url( get_permalink() ); ?>" class="name"><?php the_title(); ?></a>
		</div>
	</div><!-- #post-<?php the_ID(); ?> -->
</div>