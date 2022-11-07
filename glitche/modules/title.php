<?php
	$layout_radio = get_sub_field( 'layout_radio' );
	$title = get_sub_field( 'title' );
	$logo_switch = get_sub_field( 'logo_switch' );
	$logo = get_sub_field( 'logo' );
	$logo_url = get_sub_field( 'logo_url' );
	$type = get_sub_field( 'type' );
	$under = get_sub_field( 'under' );
	$subtitles = get_sub_field( 'subtitles' );
	$subtitles_class = 'typing-subtitle';
	$bg_type = get_sub_field( 'background_type' );
	$bg_image = get_sub_field( 'background_image' );
	$bg_video = get_sub_field( 'background_video' );
	$bg_slideshow = get_sub_field( 'background_slideshow_images' );
	$bg_slideshow_autoplay_speed = get_sub_field( 'background_slideshow_autoplay_speed' );
	$bg_slideshow_transition_speed = get_sub_field( 'background_slideshow_transition_speed' );
	$bg_video_image = get_sub_field( 'background_video_image' );
	$bg_video_mute = get_sub_field( 'background_video_mute' );
	$bg_color = get_sub_field( 'background_color' );
	$bg_gradient_color1 = get_sub_field( 'background_gradient_color1' );
	$bg_gradient_color2 = get_sub_field( 'background_gradient_color2' );
	$bg_mask_type = get_sub_field( 'background_mask_type' );
	$bg_mask_color = get_sub_field( 'background_mask_color' );
	$bg_mask_color1 = get_sub_field( 'background_mask_color1' );
	$bg_mask_color2 = get_sub_field( 'background_mask_color2' );
	$bg_mask_opacity = get_sub_field( 'background_mask_opacity' );
	$section_id = get_sub_field( 'section_id' );
	
	if ( $bg_video_mute ) {
		$bg_video_mute_config = 'true';
	} else {
		$bg_video_mute_config = 'false';
	}

	if ( $under == 2 ) {
		$subtitles_class = 'typing-bread';
	}

	$bg_mask_style = false;
	if ( $bg_mask_type != 0 ) {
		$bg_mask_style = 'opacity: '.$bg_mask_opacity.';';

		if ( $bg_mask_type == 1 ) {
			$bg_mask_style .= 'background-color: '.$bg_mask_color.';';
		}
		if ( $bg_mask_type == 2 ) {
			$bg_mask_style .= 'background-image: linear-gradient(to bottom, '.$bg_mask_color1.', '.$bg_mask_color2.');';
		}
	}
?>

<!-- Started -->
<div class="section started <?php if ( $bg_type ) : ?>background-enabled<?php endif; ?> <?php if( $layout_radio == '2' ) : ?>layout-creative<?php endif; ?>" <?php if ( $section_id ) : ?>id="section-<?php echo esc_attr( $section_id ); ?>"<?php endif; ?>>
	<?php if ( $bg_type == 1 ) : ?>
	<div class="video-bg media-bg jarallax">
		<img class="jarallax-img" src="<?php echo esc_url( $bg_image ); ?>" alt="<?php echo esc_attr( $title ); ?>">
		<div class="video-bg-mask" <?php if ( $bg_mask_style ) : ?>style="<?php echo esc_attr( $bg_mask_style ); ?>"<?php endif; ?>></div>
	</div>
	<?php elseif ( $bg_type == 2 ) : ?>
	<div id="<?php echo esc_attr( $section_id ); ?>-video-bg" class="video-bg media-bg jarallax-video video-mobile-bg" data-jarallax-video="<?php echo esc_url( $bg_video ); ?>" data-mobile-preview="<?php echo esc_url( $bg_video_image ); ?>" data-volume="<?php if( ! $bg_video_mute ) : ?>100<?php endif; ?>">
		<?php if ( $bg_mask_style ) : ?><div class="video-bg-mask" style="<?php echo esc_attr( $bg_mask_style ); ?>"></div><?php endif; ?>
	</div>
	<?php elseif ( $bg_type == 3 ) : ?>
	<div class="video-bg media-bg" style="background-color: <?php echo esc_attr( $bg_color ); ?>;"></div>
	<?php elseif ( $bg_type == 4 ) : ?>
	<div class="video-bg media-bg" style="background-image: linear-gradient(to bottom, <?php echo esc_attr( $bg_gradient_color1 ); ?>, <?php echo esc_attr( $bg_gradient_color2); ?>);"></div>
	<?php elseif ( $bg_type == 5 ) : ?>
	<?php if ( $bg_slideshow ) : ?>
	<div class="video-bg media-bg slideshow-bg">
		<div data-slick='{"arrows": 0, "autoplay": true, "autoplaySpeed": <?php echo esc_attr( $bg_slideshow_autoplay_speed ); ?>, "dots": 0, "fade": true, "speed": <?php echo esc_attr( $bg_slideshow_transition_speed ); ?>}'>
			<?php foreach( $bg_slideshow as $slide ) : ?>
			<div class="jarallax">
				<img class="jarallax-img" src="<?php echo esc_attr( $slide['image'] ); ?>" alt="<?php echo esc_attr( $title ); ?>">
			</div>
			<?php endforeach; ?>
		</div>
		<div class="video-bg-mask" <?php if ( $bg_mask_style ) : ?>style="<?php echo esc_attr( $bg_mask_style ); ?>"<?php endif; ?>></div>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	<div class="centrize full-width">
		<div class="vertical-center">
			<div class="started-content">
				<?php if ( $logo_switch ) : ?>
					<div class="logo">
						<?php if ( $logo_url ) : ?>
						<a href="<?php echo esc_url( $logo_url ); ?>">
						<?php endif; ?>
							<img src="<?php echo esc_url( $logo['url'] ); ?>" alt="<?php echo esc_attr( $title ); ?>" />
						<?php if ( $logo_url ) : ?>
						</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
				<?php if ( $title ) : ?>
				<h1 class="h-title <?php if ( $type ) : ?>glitch-effect<?php endif; ?>" data-text="<?php echo esc_attr( $title ); ?>"><?php echo esc_html( $title ); ?></h1>
				<?php endif; ?>
				<div class="h-subtitles">
					<?php if ( $under ) : ?>
					<div class="h-subtitle <?php echo esc_attr( $subtitles_class ); ?>">
						<?php if ( $under == 1 ) : ?>
							<?php foreach ( $subtitles as $item ) { ?>
								<p><?php echo wp_kses_post( $item['text'] );?></p>
							<?php } ?>
						<?php endif; ?>
						<?php if ( $under == 2 ) : ?>
							<?php glitche_breadcrumb(); ?>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					<?php if ( $under == 1 ) : ?>
						<span class="typed-subtitle"></span>
					<?php endif; ?>
					<?php if ( $under == 2 ) : ?>
						<span class="typed-bread"></span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<a href="#" class="mouse_btn" style="display: none;"><span class="ion ion-mouse"></span></a>
</div>