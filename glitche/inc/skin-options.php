<?php
/**
 * Skin
 */
if ( function_exists( 'get_field' ) ) {
	/**
	 * Dark Version
	 */

	$theme_ui = get_field( 'theme_ui', 'options' );

	if ( $theme_ui ) {
		function glitche_dark_stylesheets() {
			wp_enqueue_style( 'glitche-dark', get_template_directory_uri() . '/assets/css/dark.css', '1.0' );
		}
		add_action( 'wp_enqueue_scripts', 'glitche_dark_stylesheets', 10 );

	}
}

function glitche_skin() {
	$theme_ui = get_field( 'theme_ui', 'options' );

	$bg_color = get_field( 'theme_bg_color', 'options' );
	$theme_color = get_field( 'theme_color', 'options' );
	$line_color = get_field( 'line_color', 'options' );
	$heading_color = get_field( 'heading_color', 'options' );
	$text_color = get_field( 'text_color', 'options' );
	$text_link_color = get_field( 'text_link_color', 'options' );
	$subtitle_color = get_field( 'subtitle_color', 'options' );
	$content_area_color = get_field( 'content_area_color', 'options' );

	if ( $theme_ui ) {
		$bg_color = get_field( 'theme_bg_dark_color', 'options' );
		$line_color = get_field( 'line_dark_color', 'options' );
		$heading_color = get_field( 'heading_dark_color', 'options' );
		$text_color = get_field( 'text_dark_color', 'options' );
		$text_link_color = get_field( 'text_link_dark_color', 'options' );
		$subtitle_color = get_field( 'subtitle_dark_color', 'options' );
		$content_area_color = get_field( 'content_area_dark_color', 'options' );
	}

	$heading_font = get_field( 'heading_font_family', 'options' );
	$text_font = get_field( 'text_font_family', 'options' );
	$heading_font_size = get_field( 'heading_font_size', 'options' );
	$text_font_size = get_field( 'text_font_size', 'options' );
	$menu_font_size = get_field( 'menu_font_size', 'options' );

	$header_logo_type = get_field( 'header_logo_type', 'options' );
	$header_logo_color = get_field( 'header_logo_color', 'options' );
	$header_logo_font_family = get_field( 'header_logo_font_family', 'options' );
	$header_logo_font_size = get_field( 'header_logo_font_size', 'options' );
?>
	
<style>
	<?php if ( $text_color ) : ?>
	/* Text Color */
	body {
		color: <?php echo esc_attr( $text_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $text_link_color ) : ?>
	/* Text Link Color */
	a, 
	.section.works .filters label {
		color: <?php echo esc_attr( $text_link_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $heading_color ) : ?>
	/* Heading Color */
	.section.started .started-content .h-title, 
	h1, 
	h2, 
	h3, 
	h4, 
	h5, 
	h6 {
		color: <?php echo esc_attr( $heading_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $subtitle_color ) : ?>
	/* Section Title Color */
	.section .content .title .title_inner, 
	.resume-items .resume-item .name, 
	.service-items .service-item .name, 
	.post-comments .post-comment .desc .name, 
	.content-sidebar h2.widget-title {
		color: <?php echo esc_attr( $subtitle_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $bg_color ) : ?>
	/* Background Color */
	body, 
	.container .line {
		background: <?php echo esc_attr( $bg_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $line_color ) : ?>
	/* Line Border Color */
	.section .content .title .title_inner, 
	.box-items .box-item .category, 
	.comment-info span.comment-reply,
	.content-sidebar span.screen-reader-text span, 
	.content-sidebar h2.widget-title span, 
	.popup-box .category {
		box-shadow: inset 0 -6px 0px <?php echo esc_attr( $line_color ); ?>;
		-moz-box-shadow: inset 0 -6px 0px <?php echo esc_attr( $line_color ); ?>;
		-webkit-box-shadow: inset 0 -6px 0px <?php echo esc_attr( $line_color ); ?>;
		-khtml-box-shadow: inset 0 -6px 0px <?php echo esc_attr( $line_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $content_area_color ) : ?>
	/* Content Area Background Color */
	.container, 
	.section:before, 
	.footer, 
	.header, 
	.glitch-effect:before, 
	.glitch-effect:after, 
	.glitch-effect-white:before, 
	.glitch-effect-white:after, 
	.header.fixed, 
	.header.opened, 
	.footer.fixed, 
	.popup-box, 
	.preloader,
	.skills.circles .progress:after {
		background: <?php echo esc_attr( $content_area_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $theme_color ) : ?>
	/* 1. Theme Colors */
	a.btn.fill, 
	.btn.fill, 
	a.btn:hover, 
	.btn:hover, 
	.header .head-top .menu-btn:hover:before,
	.header .head-top .menu-btn:hover:after, 
	.header .head-top .menu-btn:hover span, 
	.header .head-top .top-menu ul li.menu-contact-btn.current-menu-item a,
	.header .head-top .top-menu ul li.menu-contact-btn a:hover, 
	.resume-items .resume-item:before, 
	.resume-items .resume-item .date:before,
	.skills ul li .progress .percentage, 
	.box-items .box-item .image .info .centrize, 
	.single-post-text ul li:before, 
	.single-post-text ol li:before,
	.sidebar_btn:hover, 
	.single-post-text input[type="submit"], 
	.header .head-top .top-menu ul li.menu-contact-btn.current-menu-item > a, 
	.header .head-top .top-menu ul li.menu-contact-btn > a:hover, 
	.glitch-effect-white:before, 
	.glitch-effect-white:after, 
	.skills ul li .progress .percentage, 
	.skills.dotted ul li .progress .da span,
	.pricing-item .feature-list ul li strong,
	.reviews-carousel .swiper-nav .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active,
	.team-carousel .swiper-nav .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active,
	.woocommerce-js ul.products li.product .button, 
	.woocommerce-js #respond input#submit.alt, 
	.woocommerce-js a.button.alt, 
	.woocommerce-js button.button.alt, 
	.woocommerce-js input.button.alt,
	.woocommerce-js #review_form #respond .form-submit input,
	.woocommerce-js .cart .button, .woocommerce-js .cart input.button,
	.woocommerce-js #respond input#submit, 
	.woocommerce-js a.button, 
	.woocommerce-js button.button, 
	.woocommerce-js input.button,
	.woocommerce-js .cart-btn .button:hover, 
	.woocommerce-js .edit:hover,
	.woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link.is-active a {
		background: <?php echo esc_attr( $theme_color ); ?>;
	}
	a:hover, 
	.preloader .load, 
	.preloader .typed-load, 
	.preloader .typed-cursor, 
	.header .head-top .top-menu ul li.current-menu-item > a,
	.section.started .mouse_btn, 
	.info-list ul li strong, 
	.resume-items .resume-item .date, 
	.service-items .service-item .icon,
	.section.works .filters label.glitch-effect, 
	.box-items .box-item:hover .desc .name, 
	.box-items .box-item .date,
	.started-content .date, 
	.single-post-text p a, 
	.post-text-bottom span.cat-links a, 
	.post-text-bottom .tags-links a, 
	.post-text-bottom .tags-links span,
	footer .soc a:hover .ion, 
	.footer .soc a:hover .ion, 
	.pricing-item .icon, 
	.content-sidebar .tagcloud a, 
	.content-sidebar .widget ul li a:hover, 
	.box-items .box-item .date a, 
	.skills.list ul li .name:before, 
	.background-enabled .header .head-top .top-menu ul li.current-menu-item > a, 
	.background-enabled .header .head-top .top-menu-nav .sub-menu li a:hover, 
	.header .head-top .top-menu-nav .sub-menu li a:hover, 
	.header .head-top .top-menu-nav .children li a:hover, 
	.widget_nav_menu .menu li.current-menu-item > a,
	.team-item .soc a:hover,
	.team-item .soc a:hover .icon,
	.woocommerce-js nav.woocommerce-pagination ul li a:focus, 
	.woocommerce-js nav.woocommerce-pagination ul li a:hover, 
	.woocommerce-js nav.woocommerce-pagination ul li span.current,
	.woocommerce-js div.product .woocommerce-tabs ul.tabs li, 
	.woocommerce-js div.product .woocommerce-tabs ul.tabs li.active,
	.woocommerce-js .cart-btn .button, 
	.woocommerce-js .edit,
	.woocommerce-error a, 
	.woocommerce-info a, 
	.woocommerce-message a,
	.woocommerce-js .star-rating,
	.woocommerce-js ul.products li.product .star-rating,
	.woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link a {
		color: <?php echo esc_attr( $theme_color ); ?>;
	}
	.woocommerce-js .cart-btn .button, 
	.woocommerce-js .edit {
		color: <?php echo esc_attr( $theme_color ); ?>!important;
	}
	a.btn.fill, 
	.btn.fill, 
	.header .head-top .top-menu ul li.menu-contact-btn.current-menu-item a, 
	.header .head-top .top-menu ul li.menu-contact-btn a:hover,
	.resume-items .resume-item .date, 
	.box-items .box-item .date, 
	.started-content .date, 
	.post-text-bottom .tags-links a, 
	.post-text-bottom .tags-links span,
	.sidebar_btn:hover, 
	.content-sidebar .tagcloud a, 
	.skills.circles .progress .bar, 
	.skills.circles .progress.p51 .fill, 
	.skills.circles .progress.p52 .fill, 
	.skills.circles .progress.p53 .fill, 
	.skills.circles .progress.p54 .fill, 
	.skills.circles .progress.p55 .fill, 
	.skills.circles .progress.p56 .fill, 
	.skills.circles .progress.p57 .fill, 
	.skills.circles .progress.p58 .fill, 
	.skills.circles .progress.p59 .fill, 
	.skills.circles .progress.p60 .fill, 
	.skills.circles .progress.p61 .fill, 
	.skills.circles .progress.p62 .fill, 
	.skills.circles .progress.p63 .fill, 
	.skills.circles .progress.p64 .fill, 
	.skills.circles .progress.p65 .fill, 
	.skills.circles .progress.p66 .fill, 
	.skills.circles .progress.p67 .fill, 
	.skills.circles .progress.p68 .fill, 
	.skills.circles .progress.p69 .fill, 
	.skills.circles .progress.p70 .fill, 
	.skills.circles .progress.p71 .fill, 
	.skills.circles .progress.p72 .fill, 
	.skills.circles .progress.p73 .fill, 
	.skills.circles .progress.p74 .fill, 
	.skills.circles .progress.p75 .fill, 
	.skills.circles .progress.p76 .fill, 
	.skills.circles .progress.p77 .fill, 
	.skills.circles .progress.p78 .fill, 
	.skills.circles .progress.p79 .fill, 
	.skills.circles .progress.p80 .fill, 
	.skills.circles .progress.p81 .fill, 
	.skills.circles .progress.p82 .fill, 
	.skills.circles .progress.p83 .fill, 
	.skills.circles .progress.p84 .fill, 
	.skills.circles .progress.p85 .fill, 
	.skills.circles .progress.p86 .fill, 
	.skills.circles .progress.p87 .fill, 
	.skills.circles .progress.p88 .fill, 
	.skills.circles .progress.p89 .fill, 
	.skills.circles .progress.p90 .fill, 
	.skills.circles .progress.p91 .fill, 
	.skills.circles .progress.p92 .fill, 
	.skills.circles .progress.p93 .fill, 
	.skills.circles .progress.p94 .fill, 
	.skills.circles .progress.p95 .fill, 
	.skills.circles .progress.p96 .fill, 
	.skills.circles .progress.p97 .fill, 
	.skills.circles .progress.p98 .fill, 
	.skills.circles .progress.p99 .fill, 
	.skills.circles .progress.p100 .fill,
	.woocommerce-js .cart-btn .button, 
	.woocommerce-js .edit,
	.woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link a {
		border-color: <?php echo esc_attr( $theme_color ); ?>;
	}
	.single-post-text blockquote {
		border-left-color: <?php echo esc_attr( $theme_color ); ?>;
	}
	input:focus, 
	textarea:focus, 
	button:focus, 
	button:hover {
		border-bottom-color: <?php echo esc_attr( $theme_color ); ?>;
	}
	@media (min-width: 180px) {
		.glitch-effect-white:before,
		.glitch-effect-white:after {
			background: <?php echo esc_attr( $theme_color ); ?>;
		}
		.glitch-effect:after,
		.glitch-effect-white:after {
			text-shadow: -1px 0 <?php echo esc_attr( $theme_color ); ?>;
		}
		.glitch-effect:before,
		.glitch-effect-white:before {
			text-shadow: 2px 0 <?php echo esc_attr( $theme_color ); ?>;
		}
	}
	<?php endif; ?>
	
	<?php if ( $heading_font ) : ?>
	/* 5. Heading Font Family */
	.section.started .started-content .h-title {
		font-family: '<?php echo esc_attr( $heading_font['font_name'] ); ?>';
	}
	<?php endif; ?>
	
	<?php if ( $text_font ) : ?>
	/* 6. Text Font Family */
	body {
		font-family: '<?php echo esc_attr( $text_font['font_name'] ); ?>';;
	}
	<?php endif; ?>
	
	<?php if ( $heading_font_size ) : ?>
	/* 7. Heading Font Size */
	.section.started .started-content .h-title {
		font-size: <?php echo esc_attr( $heading_font_size ); ?>px;
	}
	<?php endif; ?>
	
	<?php if ( $text_font_size ) : ?>
	/* 8. Text Font Size */
	body, 
	p, 
	.single-post-text ul li, 
	.single-post-text ol li, 
	.section.started .started-content .typed-subtitle, 
	.section.started .started-content .typed-bread,
	.box-items .box-item,
	.skills ul li .name,
	.pricing-items .pricing-col,
	.service-items .service-item .name {
		font-size: <?php echo esc_attr( $text_font_size ); ?>px;
	}
	<?php endif; ?>

	<?php if ( $menu_font_size ) : ?>
	/* 8. Menu Font Size */
	.top-menu-nav {
		font-size: <?php echo esc_attr( $menu_font_size ); ?>px;
	}
	<?php endif; ?>
	
	<?php if ( $header_logo_type == 1 ) : ?>
	/* 9. Logo Text */
	<?php if ( $header_logo_color ) : ?>
	.header .logo a {
		color: <?php echo esc_attr( $header_logo_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $header_logo_font_family ) : ?>
	.header .logo a {
		font-family: '<?php echo esc_attr( $header_logo_font_family['font_name'] ); ?>';
	}
	<?php endif; ?>

	<?php if ( $header_logo_font_size ) : ?>
	.header .logo a {
		font-size: <?php echo esc_attr( $header_logo_font_size ); ?>px;
	}
	<?php endif; ?>

	<?php endif; ?>
</style>
		
<?php
}
add_action( 'wp_head', 'glitche_skin', 10 );