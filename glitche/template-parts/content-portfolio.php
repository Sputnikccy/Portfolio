<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package glitche
 */

?>

<?php
// quick view
$portfolio_qv = get_field( 'portfolio_qv', 'option' );
$portfolio_hide_desc = get_field( 'portfolio_hide_desc', 'options' );
$portfolio_hide_single_link = get_field( 'portfolio_hide_single_link', 'options' );

// get categories
$current_categories = get_the_terms( get_the_ID(), 'portfolio_categories' );
$categories_string = '';
if ( $current_categories && ! is_wp_error( $current_categories ) ) {
	$arr_keys = array_keys( $current_categories );
	$last_key = end( $arr_keys );
	foreach ( $current_categories as $key => $value ) {
		if ( $key == $last_key ) {
			$categories_string .= $value->name . ' ';
		} else {
			$categories_string .= $value->name . ', ';
		}
	}
}

// get portfolio type
$type = get_field( 'portfolio_type' );
$popup_url = '#popup-' . get_the_ID();
$popup_class = 'has-popup-media';
$preview_icon = 'ion-ios-plus-empty';
$popup_link_target = false;
$images = false;
$btn_text = get_field( 'button_text' );
if(empty($btn_text)){
	$btn_text = esc_html__( 'View Project', 'glitche' );
}
$btn_url = get_field( 'button_url' );

if ( $type == 2 ) {
	$popup_url = get_the_post_thumbnail_url( get_the_ID(), 'glitche_500x500' );
	$popup_class = 'has-popup-image';
	$preview_icon = 'ion-image';
} elseif ( $type == 3 ) {
	$popup_url = get_field( 'video_url' );
	$popup_class = 'has-popup-video';
	$preview_icon = 'ion-videocamera';
} elseif ( $type == 4 ) {
	$popup_url = get_field( 'music_url' );
	$popup_class = 'has-popup-music';
	$preview_icon = 'ion-music-note';
} elseif ( $type == 5 ) {
	$popup_url = '#gallery-' . get_the_ID();
	$popup_class = 'has-popup-gallery';
	$preview_icon = 'ion-images';
	$images = get_field('gallery' );
} elseif ( $type == 6 ) {
	$popup_url = $btn_url;
	$popup_link_target = true;
	$popup_class = 'has-popup-link';
	$preview_icon = 'ion-link';
} else { }
?>

<div class="box-item">
	<div class="image">
		<?php if ( $portfolio_qv ) : ?>
		<a href="<?php echo esc_url( $popup_url ); ?>" class="<?php echo esc_attr( $popup_class ); ?>"<?php if ( $popup_link_target ) : ?> target="_blank"<?php endif; ?>>
			<?php if ( has_post_thumbnail() ) : 
				the_post_thumbnail( 'glitche_282x282' );
			?>
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
		<div id="gallery-<?php echo esc_attr( get_the_ID() ); ?>" class="mfp-hide">
			<?php foreach( $images as $image ): ?>
			<?php $gallery_img_src = wp_get_attachment_image_src( $image['ID'], 'full' ); ?>
			<a href="<?php echo esc_url( $gallery_img_src[0] ); ?>"></a>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
		<?php else : ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php if ( has_post_thumbnail() ) : 
				the_post_thumbnail( 'glitche_282x282' );
			?>
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
		<a href="<?php echo esc_url( $popup_url ); ?>" class="name <?php echo esc_attr( $popup_class ); ?>"><?php the_title(); ?></a>
		<?php else : ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="name"><?php the_title(); ?></a>
		<?php endif; ?>
	</div>
	<?php endif; ?>
	<?php if ( $portfolio_qv ) : ?>
	<div id="popup-<?php the_ID(); ?>" class="popup-box mfp-fade mfp-hide">
		<div class="content">
			<div class="image">
				<?php if ( has_post_thumbnail() ) : 
					the_post_thumbnail( 'glitche_500x500' );
				endif; ?>
			</div>
			
			<div class="desc single-post-text">
				<?php if ( $categories_string ) : ?>
				<div class="category"><?php echo esc_html( $categories_string ); ?></div>
				<?php endif; ?>
				<h4><?php the_title(); ?></h4>
				<?php the_content(); ?>
				<?php if ( $btn_url ) : ?>
				<a href="<?php echo esc_url( $btn_url ); ?>" class="btn" data-text="<?php echo esc_attr( $btn_text ); ?>">
					<?php echo esc_html( $btn_text ); ?>
				</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>
