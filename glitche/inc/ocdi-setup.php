<?php

if ( class_exists( 'GlitchePlugin' ) ) {

function glitche_ocdi_import_files() {
	return array(
		array(
			'import_file_name'			 => 'Default (Elementor)',
			'categories'				   => array( 'Elementor' ),
			'import_file_url'			=> GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/e01/content.xml',
			'import_preview_image_url'	 => GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/e01/preview.jpg',
			'preview_url'				  => 'https://bslthemes.com/glitche/',
		),
		array(
			'import_file_name'			 => 'One Page (Elementor)',
			'categories'				   => array( 'Elementor' ),
			'import_file_url'			=> GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/e02/content.xml',
			'import_preview_image_url'	 => GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/e02/preview.jpg',
			'preview_url'				  => 'https://bslthemes.com/glitche/onepage/',
		),
		array(
			'import_file_name'			 => 'Creative (Elementor)',
			'categories'				   => array( 'Elementor' ),
			'import_file_url'			=> GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/e03/content.xml',
			'import_preview_image_url'	 => GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/e03/preview.jpg',
			'preview_url'				  => 'https://bslthemes.com/glitche/creative/',
		),
		array(
			'import_file_name'			 => 'Dark Skin (Elementor)',
			'categories'				   => array( 'Elementor' ),
			'import_file_url'			=> GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/e04/content.xml',
			'import_preview_image_url'	 => GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/e04/preview.jpg',
			'preview_url'				  => 'https://bslthemes.com/glitche/dark/',
		),

		array(
			'import_file_name'			 => 'Default (ACF)',
			'categories'				   => array( 'ACF' ),
			'import_file_url'			=> GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/01/content.xml',
			'import_preview_image_url'	 => GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/01/preview.jpg',
			'preview_url'				  => 'https://bslthemes.com/glitche/',
		),
		array(
			'import_file_name'			 => 'One Page (ACF)',
			'categories'				   => array( 'ACF' ),
			'import_file_url'			=> GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/02/content.xml',
			'import_preview_image_url'	 => GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/02/preview.jpg',
			'preview_url'				  => 'https://bslthemes.com/glitche/onepage/',
		),
		array(
			'import_file_name'			 => 'Creative (ACF)',
			'categories'				   => array( 'ACF' ),
			'import_file_url'			=> GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/03/content.xml',
			'import_preview_image_url'	 => GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/03/preview.jpg',
			'preview_url'				  => 'https://bslthemes.com/glitche/creative/',
		),
		array(
			'import_file_name'			 => 'Dark Skin (ACF)',
			'categories'				   => array( 'ACF' ),
			'import_file_url'			=> GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/04/content.xml',
			'import_preview_image_url'	 => GLITCHE_EXTRA_PLUGINS_DIRECTORY . '/normal/ocdi-import/demo/04/preview.jpg',
			'preview_url'				  => 'https://bslthemes.com/glitche/dark/',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'glitche_ocdi_import_files' );

function glitche_ocdi_after_import_setup( $selected_import ) {

	// Assign posts page (blog page).
	$blog_page_id  = get_page_by_title( 'Blog (Elementor)' );
	update_option( 'page_for_posts', $blog_page_id->ID );
	update_option( 'posts_per_page', 6 );

    // options fields
	$ocdi_fields_static = array(
		'options_copyright' => '© 2019 Glitche. All rights reserved.',
		'_options_copyright' => 'field_5b68cceac1b66',
		'options_social_links_0_icon' => 'ion-social-linkedin',
		'_options_social_links_0_icon' => 'field_5b68cccfc1b64',
		'options_social_links_0_url' => 'https://www.linkedin.com/',
		'_options_social_links_0_url' => 'field_5b68ccd7c1b65',
		'options_social_links_1_icon' => 'ion-social-github',
		'_options_social_links_1_icon' => 'field_5b68cccfc1b64',
		'options_social_links_1_url' => 'https://github.com/',
		'_options_social_links_1_url' => 'field_5b68ccd7c1b65',
		'options_social_links_2_icon' => 'ion-social-facebook',
		'_options_social_links_2_icon' => 'field_5b68cccfc1b64',
		'options_social_links_2_url' => 'https://www.facebook.com/',
		'_options_social_links_2_url' => 'field_5b68ccd7c1b65',
		'options_social_links_3_icon' => 'ion-social-instagram',
		'_options_social_links_3_icon' => 'field_5b68cccfc1b64',
		'options_social_links_3_url' => 'https://www.instagram.com/',
		'_options_social_links_3_url' => 'field_5b68ccd7c1b65',
		'options_social_links' => 4,
		'_options_social_links' => 'field_5b68ccabc1b63',
		'options_preloader_text' => 'loading...',
		'_options_preloader_text' => 'field_5b74af51444c8',
		'options_header_logo' => 464,
		'_options_header_logo' => 'field_5bdf2d0242459',
        'options_blog_featured_img' => 1,
        '_options_blog_featured_img' => 'field_5b81b84430cbb',
        'options_disable_post_glitch' => 1,
        '_options_disable_post_glitch' => 'field_5c60459c64a5d',
        'options_portfolio_qv' => 1,
        '_options_portfolio_qv' => 'field_5b81d5104b42a',
        'options_portfolio_featured_img' => 1,
        '_options_portfolio_featured_img' => 'field_5c61895c95df6'
	);
	$ocdi_fields_to_change = array();

	if( 'Default (Elementor)' === $selected_import['import_file_name'] ) {

        // Assign front page.
        $front_page_id = get_page_by_title( 'Home (Elementor)' );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'TopMenuElementor', 'nav_menu' );
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);

        // options fields
		$ocdi_fields_to_change = array(
			'options_theme_bg_color' => '#f26b38',
			'_options_theme_bg_color' => 'field_5b86baa686d10',
			'options_theme_color' => '#f26b38',
			'_options_theme_color' => 'field_5b68d509665d9'
		);
	}
	if( 'One Page (Elementor)' === $selected_import['import_file_name'] ) {

        // Assign front page.
        $front_page_id = get_page_by_title( 'Home OnePage (Elementor)' );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'OnePageMenuElementor', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
                'primary' => $main_menu->term_id,
            )
        );

        // options fields
        $ocdi_fields_to_change = array(
            'options_theme_bg_color' => '#f26b38',
            '_options_theme_bg_color' => 'field_5b86baa686d10',
            'options_theme_color' => '#f26b38',
            '_options_theme_color' => 'field_5b68d509665d9'
        );
	}
	if( 'Creative (Elementor)' === $selected_import['import_file_name'] ) {

		// Assign front page.
        $front_page_id = get_page_by_title( 'Home Creative (Elementor)' );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'TopMenuElementor', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
                'primary' => $main_menu->term_id,
            )
        );

        // options fields
        $ocdi_fields_to_change = array(
            'options_theme_bg_color' => '#ffffff',
            '_options_theme_bg_color' => 'field_5b86baa686d10',
            'options_content_area_color' => '#f1f1f1',
            '_options_content_area_color' => 'field_5c5b9756742c4',
            'options_theme_color' => '#C60021',
            '_options_theme_color' => 'field_5b68d509665d9',
            'options_line_color' => '#f1f1f1',
            '_options_line_color' => 'field_5b68d6af665dc'
        );
	}
	if( 'Dark Skin (Elementor)' === $selected_import['import_file_name'] ) {

		// Assign front page.
        $front_page_id = get_page_by_title( 'Home (Elementor)' );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'TopMenuElementor', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
                'primary' => $main_menu->term_id,
            )
        );

        // options fields
        $ocdi_fields_to_change = array(
            'options_theme_ui' => 1,
            '_options_theme_ui' => 'field_5c5b911f422d5'
        );
	}

	if( 'Default (ACF)' === $selected_import['import_file_name'] ) {

        // Assign front page.
        $front_page_id = get_page_by_title( 'Home' );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'TopMenu', 'nav_menu' );
		set_theme_mod( 'nav_menu_locations', array(
				'primary' => $main_menu->term_id,
			)
		);

        // options fields
		$ocdi_fields_to_change = array(
			'options_theme_bg_color' => '#f26b38',
			'_options_theme_bg_color' => 'field_5b86baa686d10',
			'options_theme_color' => '#f26b38',
			'_options_theme_color' => 'field_5b68d509665d9'
		);
	}
	if( 'One Page (ACF)' === $selected_import['import_file_name'] ) {

        // Assign front page.
        $front_page_id = get_page_by_title( 'Home OnePage' );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'OnePageMenu', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
                'primary' => $main_menu->term_id,
            )
        );

        // options fields
        $ocdi_fields_to_change = array(
            'options_theme_bg_color' => '#f26b38',
            '_options_theme_bg_color' => 'field_5b86baa686d10',
            'options_theme_color' => '#f26b38',
            '_options_theme_color' => 'field_5b68d509665d9'
        );
	}
	if( 'Creative (ACF)' === $selected_import['import_file_name'] ) {

		// Assign front page.
        $front_page_id = get_page_by_title( 'Home Creative' );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'TopMenu', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
                'primary' => $main_menu->term_id,
            )
        );

        // options fields
        $ocdi_fields_to_change = array(
            'options_theme_bg_color' => '#ffffff',
            '_options_theme_bg_color' => 'field_5b86baa686d10',
            'options_content_area_color' => '#f1f1f1',
            '_options_content_area_color' => 'field_5c5b9756742c4',
            'options_theme_color' => '#C60021',
            '_options_theme_color' => 'field_5b68d509665d9',
            'options_line_color' => '#f1f1f1',
            '_options_line_color' => 'field_5b68d6af665dc'
        );
	}
	if( 'Dark Skin (ACF)' === $selected_import['import_file_name'] ) {

		// Assign front page.
        $front_page_id = get_page_by_title( 'Home' );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );

        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'TopMenu', 'nav_menu' );
        set_theme_mod( 'nav_menu_locations', array(
                'primary' => $main_menu->term_id,
            )
        );

        // options fields
        $ocdi_fields_to_change = array(
            'options_theme_ui' => 1,
            '_options_theme_ui' => 'field_5c5b911f422d5'
        );
	}

	global $wpdb;
	foreach ( array_merge( $ocdi_fields_static, $ocdi_fields_to_change ) as $field => $value ) {
		if ( $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'options WHERE option_name = \'' . $field . '\'' ) == 0 ) {
			$wpdb->insert( $wpdb->prefix . 'options', array( 'option_value' => $value, 'option_name' => $field, 'autoload' => 'no' ), array( '%s', '%s', '%s' ) );
		} else {
			$wpdb->update( $wpdb->prefix . 'options', array( 'option_value' => $value ), array( 'option_name' => $field ) );
		}
	}

}
add_action( 'pt-ocdi/after_import', 'glitche_ocdi_after_import_setup' );

}
