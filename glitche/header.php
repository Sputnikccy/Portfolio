<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package glitche
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<?php wp_head(); ?>
	
	<!-- Custom CSS -->
	<?php if ( get_field( 'custom_css', 'options' ) ) : ?>
		<style>
			<?php the_field( 'custom_css', 'options' ) ?> 
		</style>
	<?php endif; ?>
	
	<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	
	<?php
		$sidebar_disable = get_field( 'sidebar_disable', 'options' );
		$preloader_text = get_field( 'preloader_text', 'options' );
		$header_logo = get_field( 'header_logo', 'options' );
		$header_logo_type = get_field( 'header_logo_type', 'options' );
		$header_logo_text = get_field( 'header_logo_text', 'options' );
	?>
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="centrize full-width">
			<div class="vertical-center">
				<div class="pre-inner">
					<?php if( $preloader_text ) : ?>
					<div class="load typing-load"><p><?php echo esc_html( $preloader_text ); ?></p></div>
					<?php endif; ?>
					<span class="typed-load"></span>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Container -->
	<div class="container">
	
		<!-- Header -->
		<header class="header">
			<div class="head-top">
				<a href="#" class="menu-btn"><span></span></a>
				<?php if ( $header_logo_type == 1  ) : ?>
				<div class="logo">
					<a href="<?php echo esc_url( home_url() ); ?>">
						<?php echo esc_html( $header_logo_text ); ?>
					</a>
				</div>
				<?php else : ?>
				<?php if ( $header_logo ) : ?>
				<div class="logo">
					<a href="<?php echo esc_url( home_url() ); ?>">
						<img src="<?php echo esc_url( $header_logo['url'] ); ?>" alt="<?php bloginfo('name'); ?>" />
					</a>
				</div>
				<?php endif; ?>
				<?php endif; ?>
				
				<div class="top-menu">
					<div class="top-menu-nav">	
						<?php
							wp_nav_menu( array(
								'theme_location' => 'primary'
							) );
						?>
					</div>
					
					<?php if ( ! $sidebar_disable && is_active_sidebar( 'sidebar-1' ) ) : ?>
						<span class="sidebar_btn">
							<span></span>
						</span>
					<?php endif; ?>

				</div>

				<!-- Woocommerce cart -->
				<?php if ( class_exists( 'WooCommerce' ) ) : ?>
					<?php if ( true == get_theme_mod( 'cart_shop', true ) ) : ?>
						<div class="cart-btn">
							<div class="cart-icon">
								<span class="ion ion-android-cart"></span>
								<span class="cart-count"><?php echo sprintf (_n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'glitche' ), WC()->cart->get_cart_contents_count() ); ?></span> 
							</div>
							<div class="cart-widget">
								<?php woocommerce_mini_cart(); ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endif; ?>

			</div>
		</header>
		
		<!-- Wrapper -->
		<div class="wrapper">