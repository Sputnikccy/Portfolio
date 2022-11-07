<?php
	$title = get_sub_field( 'title' );
	$clients = get_sub_field( 'items' );
	$section_id = get_sub_field( 'section_id' );
?>

<!-- Clients -->
<div class="section clients" <?php if ( $section_id ) : ?>id="section-<?php echo esc_attr( $section_id ); ?>"<?php endif; ?>>
	<div class="content">
		<?php if ( $title ) : ?>
		<div class="title">
			<div class="title_inner"><?php echo esc_html( $title ); ?></div>
		</div>
		<?php endif; ?>
		
		<?php if ( $clients ) : ?>
		<div class="box-items">
			<?php foreach ( $clients as $item ) { ?>
			<div class="box-item">
				<div class="image">
					<a target="_blank" href="<?php echo esc_url( $item['url'] ); ?>">
						
						<?php
							$img = $item['img'];
							if( $img ) : 
						?>
							<img src="<?php echo esc_url( $img['sizes']['glitche_282x232'] ); ?>" alt="<?php echo esc_attr__( 'Client', 'glitche' ); ?>" />
						<?php endif; ?>
						<span class="info">
							<span class="centrize full-width">
								<span class="vertical-center">
									<span class="ion ion-link"></span>
								</span>
							</span>
						</span>
					</a>
				</div>
			</div>
			<?php } ?>
		</div>
		<?php endif; ?>
		
		<div class="clear"></div>
	</div>
</div>