<?php
/**
 * VW Corporate Lite Theme Customizer
 *
 * @package VW Corporate Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_corporate_lite_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('vw_corporate_lite_panel_id', array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('VW Settings', 'vw-corporate-lite'),
			'description'    => __('Description of what this panel does.', 'vw-corporate-lite'),
		));

	$wp_customize->add_section('vw_corporate_lite_left_right', array(
			'title'    => __('General Settings', 'vw-corporate-lite'),
			'priority' => 30,
			'panel'    => 'vw_corporate_lite_panel_id',
		));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_corporate_lite_theme_options', array(
			'default'           => '',
			'sanitize_callback' => 'vw_corporate_lite_sanitize_choices',
		));

	$wp_customize->add_control('vw_corporate_lite_theme_options',
		array(
			'type'           => 'radio',
			'label'          => __('Do you want this section', 'vw-corporate-lite'),
			'section'        => 'vw_corporate_lite_left_right',
			'choices'        => array(
				'Left Sidebar'  => __('Left Sidebar', 'vw-corporate-lite'),
				'Right Sidebar' => __('Right Sidebar', 'vw-corporate-lite'),
				'One Column'    => __('One Column', 'vw-corporate-lite'),
				'Three Columns' => __('Three Columns', 'vw-corporate-lite'),
				'Four Columns'  => __('Four Columns', 'vw-corporate-lite'),
				'Grid Layout'   => __('Grid Layout', 'vw-corporate-lite')
			),
		));

	$font_array = array(
		''                       => __('No Fonts', 'vw-corporate-lite'),
		'Abril Fatface'          => __('Abril Fatface', 'vw-corporate-lite'),
		'Acme'                   => __('Acme', 'vw-corporate-lite'),
		'Anton'                  => __('Anton', 'vw-corporate-lite'),
		'Architects Daughter'    => __('Architects Daughter', 'vw-corporate-lite'),
		'Arimo'                  => __('Arimo', 'vw-corporate-lite'),
		'Arsenal'                => __('Arsenal', 'vw-corporate-lite'),
		'Arvo'                   => __('Arvo', 'vw-corporate-lite'),
		'Alegreya'               => __('Alegreya', 'vw-corporate-lite'),
		'Alfa Slab One'          => __('Alfa Slab One', 'vw-corporate-lite'),
		'Averia Serif Libre'     => __('Averia Serif Libre', 'vw-corporate-lite'),
		'Bangers'                => __('Bangers', 'vw-corporate-lite'),
		'Boogaloo'               => __('Boogaloo', 'vw-corporate-lite'),
		'Bad Script'             => __('Bad Script', 'vw-corporate-lite'),
		'Bitter'                 => __('Bitter', 'vw-corporate-lite'),
		'Bree Serif'             => __('Bree Serif', 'vw-corporate-lite'),
		'BenchNine'              => __('BenchNine', 'vw-corporate-lite'),
		'Cabin'                  => __('Cabin', 'vw-corporate-lite'),
		'Cardo'                  => __('Cardo', 'vw-corporate-lite'),
		'Courgette'              => __('Courgette', 'vw-corporate-lite'),
		'Cherry Swash'           => __('Cherry Swash', 'vw-corporate-lite'),
		'Cormorant Garamond'     => __('Cormorant Garamond', 'vw-corporate-lite'),
		'Crimson Text'           => __('Crimson Text', 'vw-corporate-lite'),
		'Cuprum'                 => __('Cuprum', 'vw-corporate-lite'),
		'Cookie'                 => __('Cookie', 'vw-corporate-lite'),
		'Chewy'                  => __('Chewy', 'vw-corporate-lite'),
		'Days One'               => __('Days One', 'vw-corporate-lite'),
		'Dosis'                  => __('Dosis', 'vw-corporate-lite'),
		'Droid Sans'             => __('Droid Sans', 'vw-corporate-lite'),
		'Economica'              => __('Economica', 'vw-corporate-lite'),
		'Fredoka One'            => __('Fredoka One', 'vw-corporate-lite'),
		'Fjalla One'             => __('Fjalla One', 'vw-corporate-lite'),
		'Francois One'           => __('Francois One', 'vw-corporate-lite'),
		'Frank Ruhl Libre'       => __('Frank Ruhl Libre', 'vw-corporate-lite'),
		'Gloria Hallelujah'      => __('Gloria Hallelujah', 'vw-corporate-lite'),
		'Great Vibes'            => __('Great Vibes', 'vw-corporate-lite'),
		'Handlee'                => __('Handlee', 'vw-corporate-lite'),
		'Hammersmith One'        => __('Hammersmith One', 'vw-corporate-lite'),
		'Inconsolata'            => __('Inconsolata', 'vw-corporate-lite'),
		'Indie Flower'           => __('Indie Flower', 'vw-corporate-lite'),
		'IM Fell English SC'     => __('IM Fell English SC', 'vw-corporate-lite'),
		'Julius Sans One'        => __('Julius Sans One', 'vw-corporate-lite'),
		'Josefin Slab'           => __('Josefin Slab', 'vw-corporate-lite'),
		'Josefin Sans'           => __('Josefin Sans', 'vw-corporate-lite'),
		'Kanit'                  => __('Kanit', 'vw-corporate-lite'),
		'Lobster'                => __('Lobster', 'vw-corporate-lite'),
		'Lato'                   => __('Lato', 'vw-corporate-lite'),
		'Lora'                   => __('Lora', 'vw-corporate-lite'),
		'Libre Baskerville'      => __('Libre Baskerville', 'vw-corporate-lite'),
		'Lobster Two'            => __('Lobster Two', 'vw-corporate-lite'),
		'Merriweather'           => __('Merriweather', 'vw-corporate-lite'),
		'Monda'                  => __('Monda', 'vw-corporate-lite'),
		'Montserrat'             => __('Montserrat', 'vw-corporate-lite'),
		'Muli'                   => __('Muli', 'vw-corporate-lite'),
		'Marck Script'           => __('Marck Script', 'vw-corporate-lite'),
		'Noto Serif'             => __('Noto Serif', 'vw-corporate-lite'),
		'Open Sans'              => __('Open Sans', 'vw-corporate-lite'),
		'Overpass'               => __('Overpass', 'vw-corporate-lite'),
		'Overpass Mono'          => __('Overpass Mono', 'vw-corporate-lite'),
		'Oxygen'                 => __('Oxygen', 'vw-corporate-lite'),
		'Orbitron'               => __('Orbitron', 'vw-corporate-lite'),
		'Patua One'              => __('Patua One', 'vw-corporate-lite'),
		'Pacifico'               => __('Pacifico', 'vw-corporate-lite'),
		'Padauk'                 => __('Padauk', 'vw-corporate-lite'),
		'Playball'               => __('Playball', 'vw-corporate-lite'),
		'Playfair Display'       => __('Playfair Display', 'vw-corporate-lite'),
		'PT Sans'                => __('PT Sans', 'vw-corporate-lite'),
		'Philosopher'            => __('Philosopher', 'vw-corporate-lite'),
		'Permanent Marker'       => __('Permanent Marker', 'vw-corporate-lite'),
		'Poiret One'             => __('Poiret One', 'vw-corporate-lite'),
		'Quicksand'              => __('Quicksand', 'vw-corporate-lite'),
		'Quattrocento Sans'      => __('Quattrocento Sans', 'vw-corporate-lite'),
		'Raleway'                => __('Raleway', 'vw-corporate-lite'),
		'Rubik'                  => __('Rubik', 'vw-corporate-lite'),
		'Rokkitt'                => __('Rokkitt', 'vw-corporate-lite'),
		'Russo One'              => __('Russo One', 'vw-corporate-lite'),
		'Righteous'              => __('Righteous', 'vw-corporate-lite'),
		'Slabo'                  => __('Slabo', 'vw-corporate-lite'),
		'Source Sans Pro'        => __('Source Sans Pro', 'vw-corporate-lite'),
		'Shadows Into Light Two' => __('Shadows Into Light Two', 'vw-corporate-lite'),
		'Shadows Into Light'     => __('Shadows Into Light', 'vw-corporate-lite'),
		'Sacramento'             => __('Sacramento', 'vw-corporate-lite'),
		'Shrikhand'              => __('Shrikhand', 'vw-corporate-lite'),
		'Tangerine'              => __('Tangerine', 'vw-corporate-lite'),
		'Ubuntu'                 => __('Ubuntu', 'vw-corporate-lite'),
		'VT323'                  => __('VT323', 'vw-corporate-lite'),
		'Varela Round'           => __('Varela Round', 'vw-corporate-lite'),
		'Vampiro One'            => __('Vampiro One', 'vw-corporate-lite'),
		'Vollkorn'               => __('Vollkorn', 'vw-corporate-lite'),
		'Volkhov'                => __('Volkhov', 'vw-corporate-lite'),
		'Yanone Kaffeesatz'      => __('Yanone Kaffeesatz', 'vw-corporate-lite')
	);

	//Typography
	$wp_customize->add_section('vw_corporate_lite_typography', array(
			'title'    => __('Typography', 'vw-corporate-lite'),
			'priority' => 30,
			'panel'    => 'vw_corporate_lite_panel_id',
		));

	// This is Paragraph Color picker setting
	$wp_customize->add_setting('vw_corporate_lite_paragraph_color', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_corporate_lite_paragraph_color', array(
				'label'    => __('Paragraph Color', 'vw-corporate-lite'),
				'section'  => 'vw_corporate_lite_typography',
				'settings' => 'vw_corporate_lite_paragraph_color',
			)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('vw_corporate_lite_paragraph_font_family', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'vw_corporate_lite_sanitize_choices',
		));
	$wp_customize->add_control(
		'vw_corporate_lite_paragraph_font_family', array(
			'section' => 'vw_corporate_lite_typography',
			'label'   => __('Paragraph Fonts', 'vw-corporate-lite'),
			'type'    => 'select',
			'choices' => $font_array,
		));

	$wp_customize->add_setting('vw_corporate_lite_paragraph_font_size', array(
			'default'           => '12px',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('vw_corporate_lite_paragraph_font_size', array(
			'label'   => __('Paragraph Font Size', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_typography',
			'setting' => 'vw_corporate_lite_paragraph_font_size',
			'type'    => 'text',
		));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('vw_corporate_lite_atag_color', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_corporate_lite_atag_color', array(
				'label'    => __('"a" Tag Color', 'vw-corporate-lite'),
				'section'  => 'vw_corporate_lite_typography',
				'settings' => 'vw_corporate_lite_atag_color',
			)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('vw_corporate_lite_atag_font_family', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'vw_corporate_lite_sanitize_choices',
		));
	$wp_customize->add_control(
		'vw_corporate_lite_atag_font_family', array(
			'section' => 'vw_corporate_lite_typography',
			'label'   => __('"a" Tag Fonts', 'vw-corporate-lite'),
			'type'    => 'select',
			'choices' => $font_array,
		));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('vw_corporate_lite_li_color', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_corporate_lite_li_color', array(
				'label'    => __('"li" Tag Color', 'vw-corporate-lite'),
				'section'  => 'vw_corporate_lite_typography',
				'settings' => 'vw_corporate_lite_li_color',
			)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('vw_corporate_lite_li_font_family', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'vw_corporate_lite_sanitize_choices',
		));
	$wp_customize->add_control(
		'vw_corporate_lite_li_font_family', array(
			'section' => 'vw_corporate_lite_typography',
			'label'   => __('"li" Tag Fonts', 'vw-corporate-lite'),
			'type'    => 'select',
			'choices' => $font_array,
		));

	// This is H1 Color picker setting
	$wp_customize->add_setting('vw_corporate_lite_h1_color', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_corporate_lite_h1_color', array(
				'label'    => __('H1 Color', 'vw-corporate-lite'),
				'section'  => 'vw_corporate_lite_typography',
				'settings' => 'vw_corporate_lite_h1_color',
			)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('vw_corporate_lite_h1_font_family', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'vw_corporate_lite_sanitize_choices',
		));
	$wp_customize->add_control(
		'vw_corporate_lite_h1_font_family', array(
			'section' => 'vw_corporate_lite_typography',
			'label'   => __('H1 Fonts', 'vw-corporate-lite'),
			'type'    => 'select',
			'choices' => $font_array,
		));

	//This is H1 FontSize setting
	$wp_customize->add_setting('vw_corporate_lite_h1_font_size', array(
			'default'           => '50px',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('vw_corporate_lite_h1_font_size', array(
			'label'   => __('H1 Font Size', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_typography',
			'setting' => 'vw_corporate_lite_h1_font_size',
			'type'    => 'text',
		));

	// This is H2 Color picker setting
	$wp_customize->add_setting('vw_corporate_lite_h2_color', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_corporate_lite_h2_color', array(
				'label'    => __('h2 Color', 'vw-corporate-lite'),
				'section'  => 'vw_corporate_lite_typography',
				'settings' => 'vw_corporate_lite_h2_color',
			)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('vw_corporate_lite_h2_font_family', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'vw_corporate_lite_sanitize_choices',
		));
	$wp_customize->add_control(
		'vw_corporate_lite_h2_font_family', array(
			'section' => 'vw_corporate_lite_typography',
			'label'   => __('h2 Fonts', 'vw-corporate-lite'),
			'type'    => 'select',
			'choices' => $font_array,
		));

	//This is H2 FontSize setting
	$wp_customize->add_setting('vw_corporate_lite_h2_font_size', array(
			'default'           => '45px',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('vw_corporate_lite_h2_font_size', array(
			'label'   => __('h2 Font Size', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_typography',
			'setting' => 'vw_corporate_lite_h2_font_size',
			'type'    => 'text',
		));

	// This is H3 Color picker setting
	$wp_customize->add_setting('vw_corporate_lite_h3_color', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_corporate_lite_h3_color', array(
				'label'    => __('h3 Color', 'vw-corporate-lite'),
				'section'  => 'vw_corporate_lite_typography',
				'settings' => 'vw_corporate_lite_h3_color',
			)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('vw_corporate_lite_h3_font_family', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'vw_corporate_lite_sanitize_choices',
		));
	$wp_customize->add_control(
		'vw_corporate_lite_h3_font_family', array(
			'section' => 'vw_corporate_lite_typography',
			'label'   => __('h3 Fonts', 'vw-corporate-lite'),
			'type'    => 'select',
			'choices' => $font_array,
		));

	//This is H3 FontSize setting
	$wp_customize->add_setting('vw_corporate_lite_h3_font_size', array(
			'default'           => '36px',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('vw_corporate_lite_h3_font_size', array(
			'label'   => __('h3 Font Size', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_typography',
			'setting' => 'vw_corporate_lite_h3_font_size',
			'type'    => 'text',
		));

	// This is H4 Color picker setting
	$wp_customize->add_setting('vw_corporate_lite_h4_color', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_corporate_lite_h4_color', array(
				'label'    => __('h4 Color', 'vw-corporate-lite'),
				'section'  => 'vw_corporate_lite_typography',
				'settings' => 'vw_corporate_lite_h4_color',
			)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('vw_corporate_lite_h4_font_family', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'vw_corporate_lite_sanitize_choices',
		));
	$wp_customize->add_control(
		'vw_corporate_lite_h4_font_family', array(
			'section' => 'vw_corporate_lite_typography',
			'label'   => __('h4 Fonts', 'vw-corporate-lite'),
			'type'    => 'select',
			'choices' => $font_array,
		));

	//This is H4 FontSize setting
	$wp_customize->add_setting('vw_corporate_lite_h4_font_size', array(
			'default'           => '30px',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('vw_corporate_lite_h4_font_size', array(
			'label'   => __('h4 Font Size', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_typography',
			'setting' => 'vw_corporate_lite_h4_font_size',
			'type'    => 'text',
		));

	// This is H5 Color picker setting
	$wp_customize->add_setting('vw_corporate_lite_h5_color', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_corporate_lite_h5_color', array(
				'label'    => __('h5 Color', 'vw-corporate-lite'),
				'section'  => 'vw_corporate_lite_typography',
				'settings' => 'vw_corporate_lite_h5_color',
			)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('vw_corporate_lite_h5_font_family', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'vw_corporate_lite_sanitize_choices',
		));
	$wp_customize->add_control(
		'vw_corporate_lite_h5_font_family', array(
			'section' => 'vw_corporate_lite_typography',
			'label'   => __('h5 Fonts', 'vw-corporate-lite'),
			'type'    => 'select',
			'choices' => $font_array,
		));

	//This is H5 FontSize setting
	$wp_customize->add_setting('vw_corporate_lite_h5_font_size', array(
			'default'           => '25px',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('vw_corporate_lite_h5_font_size', array(
			'label'   => __('h5 Font Size', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_typography',
			'setting' => 'vw_corporate_lite_h5_font_size',
			'type'    => 'text',
		));

	// This is H6 Color picker setting
	$wp_customize->add_setting('vw_corporate_lite_h6_color', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_hex_color',
		));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_corporate_lite_h6_color', array(
				'label'    => __('h6 Color', 'vw-corporate-lite'),
				'section'  => 'vw_corporate_lite_typography',
				'settings' => 'vw_corporate_lite_h6_color',
			)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('vw_corporate_lite_h6_font_family', array(
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'vw_corporate_lite_sanitize_choices',
		));
	$wp_customize->add_control(
		'vw_corporate_lite_h6_font_family', array(
			'section' => 'vw_corporate_lite_typography',
			'label'   => __('h6 Fonts', 'vw-corporate-lite'),
			'type'    => 'select',
			'choices' => $font_array,
		));

	//This is H6 FontSize setting
	$wp_customize->add_setting('vw_corporate_lite_h6_font_size', array(
			'default'           => '18px',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('vw_corporate_lite_h6_font_size', array(
			'label'   => __('h6 Font Size', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_typography',
			'setting' => 'vw_corporate_lite_h6_font_size',
			'type'    => 'text',
		));

	//Topbar section
	$wp_customize->add_section('vw_corporate_lite_topbar_icon', array(
			'title'       => __('Topbar Section', 'vw-corporate-lite'),
			'description' => __('Add Header Content here', 'vw-corporate-lite'),
			'priority'    => null,
			'panel'       => 'vw_corporate_lite_panel_id',
		));

	$wp_customize->add_setting('vw_corporate_lite_contact_corporate', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('vw_corporate_lite_contact_corporate', array(
			'label'   => __('Add Phone Number', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_topbar_icon',
			'setting' => 'vw_corporate_lite_contact_corporate',
			'type'    => 'text',
		));

	$wp_customize->add_setting('vw_corporate_lite_email_corporate', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		));

	$wp_customize->add_control('vw_corporate_lite_email_corporate', array(
			'label'   => __('Add Email', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_topbar_icon',
			'setting' => 'vw_corporate_lite_email_corporate',
			'type'    => 'text',
		));

	//Social Icons(topbar)
	$wp_customize->add_section('vw_corporate_lite_topbar_header', array(
			'title'       => __('Social Icon Section', 'vw-corporate-lite'),
			'description' => __('Add Header Content here', 'vw-corporate-lite'),
			'priority'    => null,
			'panel'       => 'vw_corporate_lite_panel_id',
		));

	$wp_customize->add_setting('vw_corporate_lite_youtube_url', array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		));
	$wp_customize->add_control('vw_corporate_lite_youtube_url', array(
			'label'   => __('Add Youtube link', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_topbar_header',
			'setting' => 'vw_corporate_lite_youtube_url',
			'type'    => 'url',
		));

	$wp_customize->add_setting('vw_corporate_lite_facebook_url', array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		));
	$wp_customize->add_control('vw_corporate_lite_facebook_url', array(
			'label'   => __('Add Facebook link', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_topbar_header',
			'setting' => 'vw_corporate_lite_facebook_url',
			'type'    => 'url',
		));

	$wp_customize->add_setting('vw_corporate_lite_twitter_url', array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		));
	$wp_customize->add_control('vw_corporate_lite_twitter_url', array(
			'label'   => __('Add Twitter link', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_topbar_header',
			'setting' => 'vw_corporate_lite_twitter_url',
			'type'    => 'url',
		));

	$wp_customize->add_setting('vw_corporate_lite_rss_url', array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		));
	$wp_customize->add_control('vw_corporate_lite_rss_url', array(
			'label'   => __('Add RSS link', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_topbar_header',
			'setting' => 'vw_corporate_lite_rss_url',
			'type'    => 'url',
		));

	//home page slider
	$wp_customize->add_section('vw_corporate_lite_slidersettings', array(
			'title'    => __('Slider Settings', 'vw-corporate-lite'),
			'priority' => 30,
			'panel'    => 'vw_corporate_lite_panel_id',
		));

	for ($count = 1; $count <= 4; $count++) {

		// Add color scheme setting and control.
		$wp_customize->add_setting('vw_corporate_lite_slidersettings-page-'.$count, array(
				'default'           => '',
				'sanitize_callback' => 'absint',
			));

		$wp_customize->add_control('vw_corporate_lite_slidersettings-page-'.$count, array(
				'label'   => __('Select Slide Image Page', 'vw-corporate-lite'),
				'section' => 'vw_corporate_lite_slidersettings',
				'type'    => 'dropdown-pages',
			));
	}

	//OUR services
	$wp_customize->add_section('vw_corporate_lite_our_services', array(
			'title'       => __('Our Services', 'vw-corporate-lite'),
			'description' => __('This section will appear below the slider.', 'vw-corporate-lite'),
			'panel'       => 'vw_corporate_lite_panel_id',
		));

	$wp_customize->add_setting('vw_corporate_lite_sec1_title', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
	$wp_customize->add_control('vw_corporate_lite_sec1_title', array(
			'label'   => __('Section Title', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_our_services',
			'setting' => 'vw_corporate_lite_sec1_title',
			'type'    => 'text',
		));

	$wp_customize->add_setting('vw_corporate_lite_sec1_subtitle', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
	$wp_customize->add_control('vw_corporate_lite_sec1_subtitle', array(
			'label'   => __('Section Sub-Title', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_our_services',
			'setting' => 'vw_corporate_lite_sec1_subtitle',
			'type'    => 'text',
		));

	for ($count = 0; $count <= 2; $count++) {

		$wp_customize->add_setting('vw_corporate_lite_servicesettings-page-'.$count, array(
				'default'           => '',
				'sanitize_callback' => 'absint',
			));
		$wp_customize->add_control('vw_corporate_lite_servicesettings-page-'.$count, array(
				'label'   => __('Select Service Page', 'vw-corporate-lite'),
				'section' => 'vw_corporate_lite_our_services',
				'type'    => 'dropdown-pages',
			));
	}

	// Footer
	$wp_customize->add_section('vw_corporate_lite_footer', array(
			'title'       => __('Footer', 'vw-corporate-lite'),
			'description' => __('Add Copyright text.', 'vw-corporate-lite'),
			'panel'       => 'vw_corporate_lite_panel_id',
		));

	$wp_customize->add_setting('vw_corporate_lite_footer_copy', array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
	$wp_customize->add_control('vw_corporate_lite_footer_copy', array(
			'label'   => __('Copyright Text', 'vw-corporate-lite'),
			'section' => 'vw_corporate_lite_footer',
			'setting' => 'vw_corporate_lite_footer_copy',
			'type'    => 'text',
		));

}
add_action('customize_register', 'vw_corporate_lite_customize_register');

load_template(trailingslashit(get_template_directory()).'/inc/logo-resizer.php');
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Corporate_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if (is_null($instance)) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the controls.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections($manager) {

		// Load custom sections.
		load_template(trailingslashit(get_template_directory()).'/inc/section-pro.php');

		// Register custom section types.
		$manager->register_section_type('VW_Corporate_Lite_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new VW_Corporate_Lite_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('VW Corporate Pro', 'vw-corporate-lite'),
					'pro_text' => esc_html__('Upgrade Pro', 'vw-corporate-lite'),
					'pro_url'  => esc_url('https://www.vwthemes.com/premium/corporate-wordpress-theme')
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new VW_Corporate_Lite_Customize_Section_Pro(
				$manager,
				'example_2',
				array(
					'priority' => 9,
					'title'    => esc_html__('Documentation', 'vw-corporate-lite'),
					'pro_text' => esc_html__('Docs', 'vw-corporate-lite'),
					'pro_url'  => admin_url('themes.php?page=vw_corporate_lite_guide')
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script('vw-corporate-lite-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));

		wp_enqueue_style('vw-corporate-lite-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
VW_Corporate_Lite_Customize::get_instance();