<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
					<h1 class="h-title glitch-effect" data-text="<?php esc_attr_e( '404', 'glitche' ); ?>"><?php esc_html_e( '404', 'glitche' ); ?></h1>
					<div class="h-subtitle typing-subtitle">
						<p><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'glitche' ); ?></p>
					</div>
					<span class="typed-subtitle"></span>
				</div>
			</div>
		</div>
	</div>

<?php
get_sidebar();
get_footer();
