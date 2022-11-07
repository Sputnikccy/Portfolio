<?php
	$title = get_sub_field( 'title' );
	$filters = get_sub_field( 'filters' );
	$portfolio_type = get_sub_field( 'portfolio_type' );
	$portfolio = get_sub_field( 'items' );
	$portfolio_categories = glitche_get_categories( 'portfolio_categories' );
	$portfolio_qv = get_field( 'portfolio_qv', 'option' );
	$section_id = get_sub_field( 'section_id' );
	$portfolio_hide_desc = get_field( 'portfolio_hide_desc', 'options' );
	$portfolio_hide_single_link = get_field( 'portfolio_hide_single_link', 'options' );
?>

<!-- Works -->
<div class="section works" <?php if ( $section_id ) : ?>id="section-<?php echo esc_attr( $section_id ); ?>"<?php endif; ?>>
	<div class="content">
		<?php if ( $title ) : ?>
		<div class="title">
			<div class="title_inner"><?php echo esc_html( $title ); ?></div>
		</div>
		<?php endif; ?>
		
		<?php if ( $filters == '1' && $portfolio_categories ) : ?>
		<div class="filter-menu">
			<div class="filters">
				<div class="btn-group">
					<label data-text="<?php echo esc_attr( 'All', 'glitche' ); ?>" class="glitch-effect">
						<input type="radio" name="fl_radio" value=".box-item" /><?php echo esc_html__( 'All', 'glitche' ); ?>
					</label>
				</div>
				<?php foreach ( $portfolio_categories as $cat ) { ?>
				<div class="btn-group">
					<label data-text="<?php echo esc_attr( $cat->name ); ?>">
						<input type="radio" name="fl_radio" value=".f-<?php echo esc_attr( $cat->slug ); ?>" /><?php echo esc_html( $cat->name ); ?>
					</label>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ( $portfolio ) : ?>
		<div class="box-items portfolio-items <?php if( $portfolio_hide_desc ) : ?> portfolio-items__hide-desc<?php endif; ?><?php if( $portfolio_type == '1' ) : ?> portfolio-new<?php endif; ?>">
			
			<?php foreach ( $portfolio as $row ) { ?>
			<?php
				/*get categories*/
				$current_categories = get_the_terms( $row['post']->ID, 'portfolio_categories' );
				$categories_string = '';
				$categories_slugs_string = '';
				if ( $current_categories && ! is_wp_error( $current_categories ) ) {
					$arr_keys = array_keys( $current_categories );
					$last_key = end( $arr_keys );
					foreach ( $current_categories as $key => $value ) {
						if ( $key == $last_key ) {
							$categories_string .= $value->name . ' ';
						} else {
							$categories_string .= $value->name . ', ';
						}
						$categories_slugs_string .= 'f-' . $value->slug . ' ';
					}
				}
				/*get content*/
				$title = get_the_title( $row['post']->ID );
				$content = apply_filters( 'the_content', get_post_field( 'post_content', $row['post']->ID ) );

				/*get portfolio type*/
				$type = get_field( 'portfolio_type', $row['post']->ID );
				$popup_url = '#popup-' . $row['post']->ID;
				$popup_class = 'has-popup-media';
				$preview_icon = 'ion-ios-plus-empty';
				$popup_link_target = false;
				$images = false;
				$btn_text = get_field( 'button_text', $row['post']->ID );
				if(empty($btn_text)){
					$btn_text = esc_html__( 'View Project', 'glitche' );
				}
				$btn_url = get_field( 'button_url', $row['post']->ID );

				if ( $type == 2 ) {
					$popup_url = get_the_post_thumbnail_url( $row['post']->ID, 'glitche_500x500' );
					$popup_class = 'has-popup-image';
					$preview_icon = 'ion-image';
				} elseif ( $type == 3 ) {
					$popup_url = get_field( 'video_url', $row['post']->ID );
					$popup_class = 'has-popup-video';
					$preview_icon = 'ion-videocamera';
				} elseif ( $type == 4 ) {
					$popup_url = get_field( 'music_url', $row['post']->ID );
					$popup_class = 'has-popup-music';
					$preview_icon = 'ion-music-note';
				} elseif ( $type == 5 ) {
					$popup_url = '#gallery-' . $row['post']->ID;
					$popup_class = 'has-popup-gallery';
					$preview_icon = 'ion-images';
					$images = get_field('gallery', $row['post']->ID );
				} elseif ( $type == 6 ) {
					$popup_url = $btn_url;
					$popup_link_target = true;
					$popup_class = 'has-popup-link';
					$preview_icon = 'ion-link';
				} else { }
			?>
			
			<div class="box-item <?php echo esc_attr( $categories_slugs_string ); ?>">
				<div class="image">
					<?php if ( $portfolio_qv ) : ?>
					<a href="<?php echo esc_url( $popup_url ); ?>" class="<?php echo esc_attr( $popup_class ); ?>"<?php if ( $popup_link_target ) : ?> target="_blank"<?php endif; ?>>
						<?php

						if (  $portfolio_type == '0' ) : 
							if ( has_post_thumbnail ( $row['post']->ID ) ) :
								echo get_the_post_thumbnail( $row['post']->ID, 'glitche_282x282' );
							endif;
						elseif ( $portfolio_type == '1' ) : 
							if ( has_post_thumbnail ( $row['post']->ID ) ) :
								echo get_the_post_thumbnail( $row['post']->ID, 'glitche_680xAuto' );
							endif;
						endif;
						
						?>
						<?php if ( has_post_thumbnail ( $row['post']->ID ) ) : ?>
						<span class="info">
							<span class="centrize full-width">
								<span class="vertical-center">
									<span class="ion <?php echo esc_attr( $preview_icon ); ?>"></span>
								</span>
							</span>
						</span>
						<?php endif; ?>
					</a>
					<?php if( $images ) : ?>
					<div id="gallery-<?php echo esc_attr( $row['post']->ID ); ?>" class="mfp-hide">
						<?php foreach( $images as $image ): ?>
						<?php $gallery_img_src = wp_get_attachment_image_src( $image['ID'], 'full' ); ?>
						<a href="<?php echo esc_url( $gallery_img_src[0] ); ?>"></a>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
					
					<?php else : ?>
					<a href="<?php echo esc_url( get_the_permalink( $row['post']->ID ) ); ?>">
						<?php

						if (  $portfolio_type == '0' ) : 
							if ( has_post_thumbnail ( $row['post']->ID ) ) :
								echo get_the_post_thumbnail( $row['post']->ID, 'glitche_282x282' );
							endif;
						elseif ( $portfolio_type == '1' ) : 
							if ( has_post_thumbnail ( $row['post']->ID ) ) :
								echo get_the_post_thumbnail( $row['post']->ID, 'glitche_680xAuto' );
							endif;
						endif;
						
						?>
						<?php if ( has_post_thumbnail ( $row['post']->ID ) ) : ?>
						<span class="info">
							<span class="centrize full-width">
								<span class="vertical-center">
									<span class="ion ion-ios-book-outline"></span>
								</span>
							</span>
						</span>
						<?php endif; ?>
					</a>	
					<?php endif; ?>
				</div>
				<?php if ( ! $portfolio_hide_desc ) : ?>
				<div class="desc">
					<?php if ( $categories_string ) : ?>
					<div class="category"><?php echo esc_html( $categories_string ); ?></div>
					<?php endif; ?>

					<?php if ( $portfolio_hide_single_link ) : ?>
					<a href="<?php echo esc_url( $popup_url ); ?>" class="name <?php echo esc_attr( $popup_class ); ?>"><?php echo esc_html( $title ); ?></a>
					<?php else : ?>
					<a href="<?php echo esc_url( get_the_permalink( $row['post']->ID ) ); ?>" class="name"><?php echo esc_html( $title ); ?></a>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<?php if ( $portfolio_qv ) : ?>
				<div id="popup-<?php echo esc_attr( $row['post']->ID ); ?>" class="popup-box mfp-fade mfp-hide">
					<div class="content">
						<div class="image">
							<?php if ( has_post_thumbnail( $row['post']->ID ) ) : 
								echo get_the_post_thumbnail( $row['post']->ID, 'glitche_500x500' );
							endif; ?>
						</div>
						
						<div class="desc single-post-text">
							<?php if ( $categories_string ) : ?>
							<div class="category"><?php echo esc_html( $categories_string ); ?></div>
							<?php endif; ?>
							<h4><?php echo esc_html( $title ); ?></h4>
							<?php echo apply_filters( 'the_content', get_post_field( 'post_content', $row['post']->ID ) ); ?>
							<?php if ( $btn_url ) : ?>
							<a href="<?php echo esc_url( $btn_url ); ?>" target="_blank" class="btn" data-text="<?php echo esc_attr( $btn_text ); ?>">
								<?php echo esc_html( $btn_text ); ?>
							</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<?php } ?>
		</div>
		<?php endif; ?>
		
		<div class="clear"></div>
	</div>
</div>