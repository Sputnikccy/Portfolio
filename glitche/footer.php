<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package glitche
 */

?>

		</div>
		
		<?php
			$social_links = get_field( 'social_links', 'options' );
			$copyright = get_field( 'copyright', 'options' );
		?>

		<!-- Footer -->
		<footer class="footer">
			<?php if ( $social_links ) : ?>
			<div class="soc">
				<?php foreach ( $social_links as $link ) { ?>
				<a target="_blank" href="<?php echo esc_url( $link['url'] ); ?>">
					<span class="ion <?php echo esc_attr( $link['icon'] ); ?>"></span>
				</a>
				<?php } ?>
			</div>
			<?php endif; ?>
			<div class="copy"><?php the_field( 'copyright', 'options' ); ?></div>
			<div class="clr"></div>
		</footer>
		
		<!-- Lines -->
		<div class="line top"></div>
		<div class="line bottom"></div>
		<div class="line left"></div>
		<div class="line right"></div>
		
	</div>

<!-- Custom JS -->
<?php if( get_field( 'custom_js', 'options' ) ) : ?>
	<script>
		<?php the_field( 'custom_js', 'options' ); ?> 
	</script>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>