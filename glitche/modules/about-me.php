<?php
	$title = get_sub_field( 'title' );
	$photo = get_sub_field( 'photo' );
	$description = get_sub_field( 'text' ); 
	$info = get_sub_field( 'info' );
	$button = get_sub_field( 'button' );
	$additional_buttons = get_sub_field( 'additional_buttons' );
	$section_id = get_sub_field( 'section_id' );
?>

<!-- About -->
<div class="section about" <?php if ( $section_id ) : ?>id="section-<?php echo esc_attr( $section_id ); ?>"<?php endif; ?>>
	<div class="content">
		<?php if ( $title ) : ?>
		<div class="title">
			<div class="title_inner"><?php echo esc_html( $title ); ?></div>
		</div>
		<?php endif; ?>
		
		<?php if ( $photo ) : ?>
		<div class="image">
			<img src="<?php echo esc_url( $photo['sizes']['glitche_100x100'] ); ?>" alt="<?php echo esc_attr( $title ); ?>" />
		</div>
		<?php endif; ?>
		
		<?php if ( $description || $info || $button ) : ?>
		<div class="desc">
			<?php if ( $description ) : ?>
			<?php echo wp_kses_post( $description ); ?>
			<?php endif; ?>
			<?php if ( $info ) : ?>
			<div class="info-list">
				<ul>
					<?php foreach ( $info as $item ) { ?>
					<li><strong><?php echo esc_html( $item['label'] ); ?>:</strong> <?php echo esc_html( $item['value'] ); ?></li>
					<?php } ?>
				</ul>
			</div>
			<?php endif; ?>
			<?php if ( $button || $additional_buttons ) : ?>
			<div class="bts bts-list">
				<?php if ( $button['label'] ) : ?>
				<a href="<?php echo esc_url( $button['url'] ); ?>" class="btn fill" data-text="<?php echo esc_attr( $button['label'] ); ?>">
					<?php echo esc_html( $button['label'] ); ?>	
				</a>
				<?php endif; ?>
				<?php if ( $additional_buttons ) : ?>
					<?php foreach ( $additional_buttons as $btn ) { ?>
						<a href="<?php echo esc_url( $btn['url'] ); ?>" class="btn fill" data-text="<?php echo esc_attr( $btn['label'] ); ?>">
							<?php echo esc_html( $btn['label'] ); ?>	
						</a>
					<?php } ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<div class="clear"></div>
	</div>
</div>