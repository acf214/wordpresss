<?php
function chronicle_customizer( $wp_customize ) { 
	wp_enqueue_style('customizr', get_template_directory_uri() .'/css/customizr.css');
	wp_enqueue_style('customizr-fa', get_template_directory_uri() .'/iconpicker-control/assets/css/font-awesome.min.css');
	
	$wp_customize->get_setting( 'background_color' )->transport = 'refresh';
	$wp_customize->get_setting( 'background_image' )->transport = 'refresh';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	'selector' => '.site-title',
	'render_callback' => 'blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'custom_logo', array(
	'selector' => '.site-custom_logo',
	'render_callback' => 'custom_logo',
	) );
	/* Genral section */
		/* Slider Section */
	$wp_customize->add_panel( 'chronicle_theme_option', array(
    'title' => __( 'Theme Options','chronicle' ),
    'priority' => 1, // Mixed with top-level-section hierarchy.
	) );

	//changelog//	
	$wp_customize->add_section('changelog_sec',	array('title' =>  __( 'Changelog','chronicle' ),
			'panel'=>'chronicle_theme_option',
            'priority' => 1,
    ));
	$wp_customize->add_setting( 'changelog', array(
			'default'    		=> null,
			'sanitize_callback' => 'chronicle_sanitize_text',
	));
	$wp_customize->add_control( new chronicle_changelog_Control( $wp_customize, 'changelog', array(
			'label'    => __( 'Chronicle', 'chronicle' ),
			'section'  => 'changelog_sec',
			'settings' => 'changelog',
			'priority' => 1,
	)));
	//changelog close//	


	$wp_customize->add_section(
        'general_sec',
        array(
            'title' => __('Theme General Options','chronicle'),
            'description' => __('Here you can customize Your theme\'s general Settings','chronicle'),
			'panel'=>'chronicle_theme_option',
			'capabilit'=>'edit_theme_options',
            'priority' => 35,
			
        ) ); 
	
	$wl_theme_options = chronicle_get_options();
	$wp_customize->add_setting(
		'chronicle_theme_options[_frontpage]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['_frontpage'],
			'sanitize_callback'=>'chronicle_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'chronicle_front_page', array(
		'label'        => __( 'Show Front Page', 'chronicle' ),
		'type'=>'checkbox',
		'section'    => 'general_sec',
		'settings'   => 'chronicle_theme_options[_frontpage]',
	) );
	
	$wp_customize->add_setting(
		'chronicle_theme_options[snoweffect]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['snoweffect'],
			'sanitize_callback'=>'chronicle_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'snoweffect', array(
		'label'        => __( 'Snow Effect', 'chronicle' ),
		'type'=>'checkbox',
		'section'    => 'general_sec',
		'settings'   => 'chronicle_theme_options[snoweffect]',
	) );
	
	$wp_customize->add_setting(
		'chronicle_theme_options[sticky_header]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['sticky_header'],
			'sanitize_callback'=>'chronicle_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'sticky_header', array(
		'label'        => __( 'Sticky Header', 'chronicle' ),
		'type'=>'checkbox',
		'section'    => 'general_sec',
		'settings'   => 'chronicle_theme_options[sticky_header]',
	) );
	
	$wp_customize->add_setting(
		'chronicle_theme_options[height]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['height'],
			'sanitize_callback'=>'chronicle_sanitize_integer',
			'capability'        => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[width]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['width'],
			'sanitize_callback'=>'chronicle_sanitize_integer',
			'capability'        => 'edit_theme_options',
		)
	);
	

	
	$wp_customize->add_control( 'chronicle_logo_height', array(
		'label'        => __( 'Logo Height', 'chronicle' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'chronicle_theme_options[height]',
	) );
	$wp_customize->add_control( 'chronicle_logo_width', array(
		'label'        => __( 'Logo Width', 'chronicle' ),
		'type'=>'number',
		'section'    => 'general_sec',
		'settings'   => 'chronicle_theme_options[width]',
	) );
	
	/* Font Section*/
	$wp_customize->add_section('font_sec', array(
	    'title' => __('Theme Google Font', 'chronicle'),
		'panel' => 'chronicle_theme_option',
		'description' => __('Here you can change your theme\'s Font Settings', 'chronicle'),
		'capability' => 'edit_theme_options',
		'priority' => 43,
		));
	$wp_customize->add_setting(
		'chronicle_theme_options[title_font]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['title_font'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text',
		));
		$wp_customize->add_control(new chronicle_Font_Control($wp_customize, 'title_font', array(
		'label'        => __('Title Font', 'chronicle'),
		'type'=>'option',
		'section'    => 'font_sec',
		'settings'   => 'chronicle_theme_options[title_font]',
	    )));
		
	$wp_customize->add_setting(
		'chronicle_theme_options[desc_font]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['desc_font'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text',
		));
	$wp_customize->add_control(new chronicle_Font_Control($wp_customize, 'desc_font', array(
		'label'        => __('Description Font', 'chronicle'),
		'type'=>'option',
		'section'    => 'font_sec',
		'settings'   => 'chronicle_theme_options[desc_font]',
	    )));
	$wp_customize->add_setting(
		'chronicle_theme_options[btn_font]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['btn_font'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text',
		));
	$wp_customize->add_control(new chronicle_Font_Control($wp_customize, 'btn_font', array(
		'label'        => __('Button Font', 'chronicle'),
		'type'=>'option',
		'section'    => 'font_sec',
		'settings'   => 'chronicle_theme_options[btn_font]',
	    )));
	$wp_customize->add_setting(
		'chronicle_theme_options[heading_title_font]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['heading_title_font'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text',
		));
	$wp_customize->add_control(new chronicle_Font_Control($wp_customize, 'heading_title_font', array(
		'label'        => __('Area Heading Title Font', 'chronicle'),
		'type'=>'option',
		'section'    => 'font_sec',
		'settings'   => 'chronicle_theme_options[heading_title_font]',
	    )));
	$wp_customize->add_setting(
		'chronicle_theme_options[sidebar_title_font]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['sidebar_title_font'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text',
		));
	$wp_customize->add_control(new chronicle_Font_Control($wp_customize, 'sidebar_title_font', array(
		'label'        => __('Sidebar Title Font', 'chronicle'),
		'type'=>'option',
		'section'    => 'font_sec',
		'settings'   => 'chronicle_theme_options[sidebar_title_font]',
	    )));
	$wp_customize->add_setting(
		'chronicle_theme_options[sidebar_desc_font]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['sidebar_desc_font'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text',
		));
	$wp_customize->add_control(new chronicle_Font_Control($wp_customize, 'sidebar_desc_font', array(
		'label'        => __('Sidebar Description Font', 'chronicle'),
		'type'=>'option',
		'section'    => 'font_sec',
		'settings'   => 'chronicle_theme_options[sidebar_desc_font]',
	    )));

	/* Slider Section */
	$wp_customize->add_section(
        'slider_sec',
        array(
            'title' => __('Theme Slider Options','chronicle'),
			'panel'=>'chronicle_theme_option',
            'description' => __('Here you can add slider images','chronicle'),
			'capabilit'=>'edit_theme_options',
            'priority' => 36,
			'active_callback' => 'is_front_page',
        )
    );

		$wp_customize->add_setting( 'chronicle_slider', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'themeslug_sanitize_select',
		'default' => '1',
		) );

		$wp_customize->add_control( 'chronicle_slider', array(
		  'type' => 'select',
		  'section' => 'slider_sec', // Add a default or your own section
		  'label' => __( 'Select Slider ','chronicle' ),
		  'description' => __( 'select Slider for homepage','chronicle'),
		  'choices' => array(
		    '1' => __( 'Slider 1','chronicle' ),
		    '2' => __( 'Slider 2','chronicle' ),
		  ),
		) );

	
	$wp_customize->add_setting(
		'chronicle_theme_options[slider_speed]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slider_speed'],
			'sanitize_callback'=>'chronicle_sanitize_text',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( 'enigma_slider_speed', array(
		'label'        => __( 'Slider Speed Option', 'chronicle' ),
		'description' => 'Value will be in milliseconds',
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slider_speed]',
	) );
	
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_image_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_image_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_image_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_image_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_image_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_image_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[slide_image_3]', array(
	'selector' => '.chronicle_slider_image_3',
	'render_callback' => 'chronicle_theme_options[slide_image_3]',
	) );
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_title_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[slide_title_1]', array(
	'selector' => '.head_1',
	'render_callback' => 'chronicle_theme_options[slide_title_1]',
	) );

	/*for ($i=1; $i < 4; $i++) { 
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[slide_title_'.$i.']', array(
	'selector' => 'h1.animated.animation.animated-item-2.head_'.$i,
	) );

	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[slide_desc_'.$i.']', array(
	'selector' => 'li.animated.animation.animated-item-3.desc_'.$i,
	) );

	}*/
	

	$wp_customize->add_setting(
		'chronicle_theme_options[slide_title_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[slide_title_2]', array(
	'selector' => '.head_2',
	'render_callback' => 'chronicle_theme_options[slide_title_2]',
	) );
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_title_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_title_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[slide_title_3]', array(
	'selector' => '.head_3',
	'render_callback' => 'chronicle_theme_options[slide_title_3]',
	) );
	$wp_customize->add_setting(
	'slide_desc_1',
		array(
		'default'=>esc_attr($wl_theme_options['slide_desc_1']),
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capability'=>'edit_theme_options'
	));	
	$wp_customize->selective_refresh->add_partial( 'slide_desc_1', array(
	'selector' => '.desc_1',
	'render_callback' => 'slide_desc_1',
	) );
	$wp_customize->add_setting(
	'slide_desc_2',
		array(
		'default'=>esc_attr($wl_theme_options['slide_desc_2']),
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capability'=>'edit_theme_options'
	));	
	$wp_customize->selective_refresh->add_partial( 'slide_desc_2', array(
	'selector' => '.desc_2',
	'render_callback' => 'slide_desc_2',
	) );
	$wp_customize->add_setting(
	'slide_desc_3',
		array(
		'default'=>esc_attr($wl_theme_options['slide_desc_3']),
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capability'=>'edit_theme_options'
	));	
	$wp_customize->selective_refresh->add_partial( 'slide_desc_3', array(
	'selector' => '.desc_3',
	'render_callback' => 'slide_desc_3',
	) );
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_link_1]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_link_1'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_link_2]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_link_2'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[slide_link_3]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['slide_link_3'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'chronicle_slider_image_1', array(
		'label'        => __( 'Slider Image One', 'chronicle' ),
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_image_1]'
	) ) );
	$wp_customize->add_control( 'chronicle_slide_title_1', array(
		'label'        => __( 'Slider title one', 'chronicle' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_title_1]'
	) );
	
	$wp_customize->add_control( 'chronicle_slide_desc_1', array(
		'label'        => __( 'Slider description one', 'chronicle' ),
		'type'=>'textarea',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_desc_1]'
	) );
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'slide_desc_1', array(
		'label'        => __( 'Slider description one', 'chronicle' ),
		'section'    => 'slider_sec',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'slide_desc_1'
	)));	
	$wp_customize->add_control( 'chronicle_slide_btnlink_1', array(
		'label'        => __( 'Slider Button Link', 'chronicle' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_link_1]'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'chronicle_slider_image_2', array(
		'label'        => __( 'Slider Image Two ', 'chronicle' ),
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_image_2]'
	) ) );
	
	$wp_customize->add_control( 'chronicle_slide_title_2', array(
		'label'        => __( 'Slider Title Two', 'chronicle' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_title_2]'
	) );
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'slide_desc_2', array(
		'label'        => __( 'Slider description Two', 'chronicle' ),
		'section'    => 'slider_sec',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'slide_desc_2'
	)));
	$wp_customize->add_control( 'chronicle_slide_btnlink_2', array(
		'label'        => __( 'Slider Link Two', 'chronicle' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_link_2]'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'chronicle_slider_image_3', array(
		'label'        => __( 'Slider Image Three', 'chronicle' ),
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_image_3]'
	) ) );
	$wp_customize->add_control( 'chronicle_slide_title_3', array(
		'label'        => __( 'Slider Title Three', 'chronicle' ),
		'type'=>'text',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_title_3]'
	) );
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'slide_desc_3', array(
		'label'        => __( 'Slider description Two', 'chronicle' ),
		'section'    => 'slider_sec',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'slide_desc_3'
	)));
	$wp_customize->add_control( 'chronicle_slide_btnlink_3', array(
		'label'        => __( 'Slider Button Link Three', 'chronicle' ),
		'type'=>'url',
		'section'    => 'slider_sec',
		'settings'   => 'chronicle_theme_options[slide_link_3]'
	) );
	/* Portfolio Section */
	$wp_customize->add_section(
        'portfolio_section',
        array(
            'title' => __('Portfolio Options','chronicle'),
            'description' => __('Here you can add Portfolio title,description and even portfolios','chronicle'),
			'panel'=>'chronicle_theme_option',
			'capabilit'=>'edit_theme_options',
            'priority' => 39,
        )
    );
	
	$wp_customize->add_setting(
		'chronicle_theme_options[portfolio_home]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['portfolio_home'],
			'sanitize_callback'=>'chronicle_sanitize_checkbox',
			'capability' => 'edit_theme_options'
		)
	);
	$wp_customize->add_setting(
		'chronicle_theme_options[port_heading]',
		array(
			'type'    => 'option',
			'default'=>$wl_theme_options['port_heading'],
			'capability' => 'edit_theme_options',
			'sanitize_callback'=>'chronicle_sanitize_text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[port_heading]', array(
	'selector' => '.chronicle_port_heading',
	'render_callback' => 'chronicle_theme_options[port_heading]',
	) );

	for($i=1;$i<=3;$i++){ 
		$wp_customize->add_setting(
			'chronicle_theme_options[port_'.$i.'_img]',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_'.$i.'_img'],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'esc_url_raw',
			)
		);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[port_'.$i.'_img]', array(
	'selector' => '.chronicle_port_'.$i,
	'render_callback' => 'chronicle_theme_options[port_'.$i.'_img]',
	) );

		$wp_customize->add_setting(
			'chronicle_theme_options[port_'.$i.'_title]',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_'.$i.'_title'],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'chronicle_sanitize_text',
			)
		);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[port_'.$i.'_title]', array(
	'selector' => '.chronicle_port_title_'.$i,
	'render_callback' => 'chronicle_theme_options[port_'.$i.'_title]',
	) );

		$wp_customize->add_setting(
			'chronicle_theme_options[port_'.$i.'_link]',
			array(
				'type'    => 'option',
				'default'=>$wl_theme_options['port_'.$i.'_link'],
				'capability' => 'edit_theme_options',
				'sanitize_callback'=>'esc_url_raw',
			)
		);
	}
	$wp_customize->add_control( 'chronicle_show_portfolio', array(
		'label'        => __( 'Enable Portfolio on Home', 'chronicle' ),
		'type'=>'checkbox',
		'section'    => 'portfolio_section',
		'settings'   => 'chronicle_theme_options[portfolio_home]'
	) );
	$wp_customize->add_control( 'chronicle_portfolio_title', array(
		'label'        => __( 'Portfolio Heading', 'chronicle' ),
		'type'=>'text',
		'section'    => 'portfolio_section',
		'settings'   => 'chronicle_theme_options[port_heading]'
	) );

	for($i=1;$i<=3;$i++){
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'chronicle_portfolio_img_'.$i, array(
		'label'        => __( 'Portfolio Image', 'chronicle' ),
		'section'    => 'portfolio_section',
		'settings'   => 'chronicle_theme_options[port_'.$i.'_img]'
	) ) );
	$wp_customize->add_control( 'chronicle_portfolio_title_'.$i, array(
		'label'        => __( 'Portfolio Title', 'chronicle' ),
		'type'=>'text',
		'section'    => 'portfolio_section',
		'settings'   => 'chronicle_theme_options[port_'.$i.'_title]'
	) );
	
	$wp_customize->add_control( 'chronicle_portfolio_link_'.$i, array(
		'label'        => __( 'Portfolio Link', 'chronicle' ),
		'type'=>'url',
		'section'    => 'portfolio_section',
		'settings'   => 'chronicle_theme_options[port_'.$i.'_link]'
	) );
	}
	/* Blog Option */
	$wp_customize->add_section('blog_section',array(
	'title'=>__("Home Blog Options","chronicle"),
	'panel'=>'chronicle_theme_option',
	'capabilit'=>'edit_theme_options',
    'priority' => 40
	));
	$wp_customize->add_setting(
	'chronicle_theme_options[blog_home]',
	array(
		'type'    => 'option',
		'default'=>$wl_theme_options['blog_home'],
		'sanitize_callback'=>'chronicle_sanitize_checkbox',
		'capability' => 'edit_theme_options'
	)
	);
	$wp_customize->add_control( 'chronicle_show_blog', array(
		'label'        => __( 'Enable Blog on Home', 'chronicle' ),
		'type'=>'checkbox',
		'section'    => 'blog_section',
		'settings'   => 'chronicle_theme_options[blog_home]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[blog_heading]',
		array(
		'default'=>esc_attr($wl_theme_options['blog_heading']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[blog_heading]', array(
	'selector' => '.chronicle_blog_heading',
	'render_callback' => 'chronicle_theme_options[blog_heading]',
	) );
	$wp_customize->add_control( 'chronicle_blog_title', array(
		'label'        => __( 'Home Blog Title', 'chronicle' ),
		'type'=>'text',
		'section'    => 'blog_section',
		'settings'   => 'chronicle_theme_options[blog_heading]'
	) );
	
	$wp_customize->add_setting('chronicle_theme_options[blog_category]',
		array(
			'type'    => 'option',
			'sanitize_callback'=>'chronicle_sanitize_text',
			'capability' => 'edit_theme_options',
		)
	);
	
	$wp_customize->add_control(new chronicle_category_Control( $wp_customize, 'blog_category', array(
		'label'        => __( 'Blog Category', 'chronicle' ),
		'type'=>'select',
		'section'    => 'blog_section',
		'settings'   => 'chronicle_theme_options[blog_category]',
	) ) );
	
	$wp_customize->add_setting(	'chronicle_theme_options[blog_datas]',
	array(
		'type'    => 'option',
		'default'=>$wl_theme_options['blog_datas'],
		'sanitize_callback'=>'chronicle_sanitize_checkbox',
		'capability' => 'edit_theme_options'
	)
	);
	$wp_customize->add_control( 'chronicle_show_blog_data', array(
		'label'        => __( 'Enable Blog Date And Time', 'chronicle' ),
		'type'=>'checkbox',
		'section'    => 'blog_section',
		'settings'   => 'chronicle_theme_options[blog_datas]'
	) );
	
	/* Service Section */
	$wp_customize->add_section('service_section',array(
	'title'=>__("Service Options","chronicle"),
	'panel'=>'chronicle_theme_option',
	'capabilit'=>'edit_theme_options',
    'priority' => 38,
	
	));
	$wp_customize->add_setting(
	'chronicle_theme_options[service_home]',
	array(
		'type'    => 'option',
		'default'=>$wl_theme_options['service_home'],
		'sanitize_callback'=>'chronicle_sanitize_checkbox',
		'capability' => 'edit_theme_options'
	)
	);
	$wp_customize->add_control( 'chronicle_show_service', array(
		'label'        => __( 'Enable Service on Home', 'chronicle' ),
		'type'=>'checkbox',
		'section'    => 'service_section',
		'settings'   => 'chronicle_theme_options[service_home]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[home_service_title]',
		array(
		'default'=>esc_attr($wl_theme_options['home_service_title']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[home_service_title]', array(
	'selector' => '.chronicle_service_heading',
	'render_callback' => 'chronicle_theme_options[home_service_title]',
	) );
	$wp_customize->add_setting(
	'home_service_description',
		array(
		'default'=>esc_attr($wl_theme_options['home_service_description']),
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capability'=>'edit_theme_options'
	));	
	$wp_customize->selective_refresh->add_partial( 'home_service_description', array(
	'selector' => '.chronicle_service_desc',
	'render_callback' => 'home_service_description',
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[service_1_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_icons']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_text',
			)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[service_1_icons]', array(
	'selector' => '.chronicle_service_icon_1',
	'render_callback' => 'chronicle_theme_options[service_1_icons]',
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[service_2_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_icons']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[service_2_icons]', array(
	'selector' => '.chronicle_service_icon_2',
	'render_callback' => 'chronicle_theme_options[service_2_icons]',
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[service_3_icons]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_icons']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[service_3_icons]', array(
	'selector' => '.chronicle_service_icon_3',
	'render_callback' => 'chronicle_theme_options[service_3_icons]',
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[service_1_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_title']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_text',
			)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[service_1_title]', array(
	'selector' => '.chronicle_service_title_1',
	'render_callback' => 'chronicle_theme_options[service_1_title]',
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[service_2_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_title']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_text'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[service_2_title]', array(
	'selector' => '.chronicle_service_title_2',
	'render_callback' => 'chronicle_theme_options[service_2_title]',
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[service_3_title]',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_title']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[service_3_title]', array(
	'selector' => '.chronicle_service_title_3',
	'render_callback' => 'chronicle_theme_options[service_3_title]',
	) );
	$wp_customize->add_setting(
	'service_1_text',
		array(
		'default'=>esc_attr($wl_theme_options['service_1_text']),
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capability'=>'edit_theme_options'
	));	
	$wp_customize->selective_refresh->add_partial( 'service_1_text', array(
	'selector' => '.chronicle_service_text_1',
	'render_callback' => 'service_1_text',
	) );
	$wp_customize->add_setting(
	'service_2_text',
		array(
		'default'=>esc_attr($wl_theme_options['service_2_text']),
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capability'=>'edit_theme_options'
	));	
	$wp_customize->selective_refresh->add_partial( 'service_2_text', array(
	'selector' => '.chronicle_service_text_2',
	'render_callback' => 'service_2_text',
	) );
	$wp_customize->add_setting(
	'service_3_text',
		array(
		'default'=>esc_attr($wl_theme_options['service_3_text']),
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capability'=>'edit_theme_options'
	));	
	$wp_customize->selective_refresh->add_partial( 'service_3_text', array(
	'selector' => '.chronicle_service_text_3',
	'render_callback' => 'service_3_text',
	) );
	$wp_customize->add_control( 'chronicle_theme_options_home_title', array(
		'label'        => __( 'Home Service Title', 'chronicle' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'chronicle_theme_options[home_service_title]'
	) );
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'home_service_description', array(
		'label'        => __( 'Home Service Description', 'chronicle' ),
		'section'    => 'service_section',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'home_service_description'
	)));
	
	$wp_customize->add_control(
    new chronicle_Customize_Misc_Control(
        $wp_customize,
        'chronicle_theme_options1-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));

	
	$wp_customize->add_control( 'chronicle_service_one_title', array(
		'label'        => __( 'Service One Title', 'chronicle' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'chronicle_theme_options[service_1_title]'
	) );

	$wp_customize->add_control(new chronicle_Customizer_Icon_Picker_Control($wp_customize,'chronicle_theme_options[service_1_icons]',
        array(
			'label'        => __( 'Service Icon One', 'chronicle' ),
			'type'=>'text',
            'section'  => 'service_section',
			'settings'   => 'chronicle_theme_options[service_1_icons]'
        )
    ));
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'service_1_text', array(
		'label'        => __( 'Service One Text', 'chronicle' ),
		'section'    => 'service_section',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'service_1_text'
	)));
	
/* 	$wp_customize->add_control( 'chronicle_service_one_text', array(
		'label'        => __( 'Service One Text', 'chronicle' ),
		'type'=>'textarea',
		'section'    => 'service_section',
		'settings'   => 'chronicle_theme_options[service_1_text]'
	) ); */
		$wp_customize->add_control(
    new chronicle_Customize_Misc_Control(
        $wp_customize,
        'chronicle_theme_options2-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'chronicle_service_two_title', array(
		'label'        => __( 'Service Two Title', 'chronicle' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'chronicle_theme_options[service_2_title]'
	) );
		$wp_customize->add_control(new chronicle_Customizer_Icon_Picker_Control($wp_customize,'chronicle_theme_options[service_2_icons]',
        array(
			'label'        => __( 'Service Icon Two', 'chronicle' ),
			'type'=>'text',
            'section'  => 'service_section',
			
			'settings'   => 'chronicle_theme_options[service_2_icons]'
		)
    ));
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'service_2_text', array(
		'label'        => __( 'Service Two Text', 'chronicle' ),
		'section'    => 'service_section',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'service_2_text'
	)));
		$wp_customize->add_control(
    new chronicle_Customize_Misc_Control(
        $wp_customize,
        'chronicle_theme_options3-line',
        array(
            'section'  => 'service_section',
            'type'     => 'line'
        )
    ));
	$wp_customize->add_control( 'chronicle_service_three_title', array(
		'label'        => __( 'Service Three Title', 'chronicle' ),
		'type'=>'text',
		'section'    => 'service_section',
		'settings'   => 'chronicle_theme_options[service_3_title]'
	) );
	$wp_customize->add_control(new chronicle_Customizer_Icon_Picker_Control($wp_customize,'chronicle_theme_options[service_3_icons]',
        array(
			'label'        => __( 'Service Icon Three', 'chronicle' ),
			'type'=>'text',
            'section'  => 'service_section',
			'settings'   => 'chronicle_theme_options[service_3_icons]'
		)
    ));
	$wp_customize->add_control(new One_Page_Editor($wp_customize, 'service_3_text', array(
		'label'        => __( 'Service Three Text', 'chronicle' ),
		'section'    => 'service_section',
		'active_callback' => 'show_on_front',
		'include_admin_print_footer' => true,
		'settings'   => 'service_3_text'
	)));
	/* Social options */
	$wp_customize->add_section('social_section',array(
	'title'=>__("Social Options","chronicle"),
	'panel'=>'chronicle_theme_option',
	'capabilit'=>'edit_theme_options',
    'priority' => 42
	));
	$wp_customize->add_setting(
	'chronicle_theme_options[header_social_media_in_enabled]',
		array(
		'default'=>esc_attr($wl_theme_options['header_social_media_in_enabled']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_checkbox',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[header_social_media_in_enabled]', array(
	'selector' => '.chronicle_social_header',
	'render_callback' => 'chronicle_theme_options[header_social_media_in_enabled]',
	) );
	$wp_customize->add_control( 'header_social_media_in_enabled', array(
		'label'        => __( 'Enable Social Media Icons in Header', 'chronicle' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[header_social_media_in_enabled]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[footer_section_social_media_enbled]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_section_social_media_enbled']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_checkbox',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[footer_section_social_media_enbled]', array(
	'selector' => '.chronicle_social_footer',
	'render_callback' => 'chronicle_theme_options[footer_section_social_media_enbled]',
	) );
	$wp_customize->add_control( 'footer_section_social_media_enbled', array(
		'label'        => __( 'Enable Social Media Icons in Footer', 'chronicle' ),
		'type'=>'checkbox',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[footer_section_social_media_enbled]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[twitter_link]',
		array(
		'default'=>esc_attr($wl_theme_options['twitter_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'twitter_link', array(
		'label'        =>  __('Twitter', 'chronicle' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[twitter_link]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[facebook_link]',
		array(
		'default'=>esc_attr($wl_theme_options['facebook_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'facebook_link', array(
		'label'        => __( 'Facebook', 'chronicle' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[facebook_link]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[linkedin_link]',
		array(
		'default'=>esc_attr($wl_theme_options['linkedin_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'linkedin_link', array(
		'label'        => __( 'LinkedIn', 'chronicle' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[linkedin_link]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[youtube_link]',
		array(
		'default'=>esc_attr($wl_theme_options['youtube_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'youtube_link', array(
		'label'        => __( 'Youtube_link', 'chronicle' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[youtube_link]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[google_plus]',
		array(
		'default'=>esc_attr($wl_theme_options['google_plus']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'google_plus', array(
		'label'        => __( 'Goole+', 'chronicle' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[google_plus]'
	) );
		$wp_customize->add_setting(
	'chronicle_theme_options[rss_link]',
		array(
		'default'=>esc_attr($wl_theme_options['rss_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'rss_link', array(
		'label'        => __( 'rss_link', 'chronicle' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[rss_link]'
	) );
		$wp_customize->add_setting(
	'chronicle_theme_options[flicker_link]',
		array(
		'default'=>esc_attr($wl_theme_options['flicker_link']),
		'type'=>'option',
		'sanitize_callback'=>'esc_url_raw',
		'capabilit'=>'edit_theme_options'
		)
	);
		$wp_customize->add_control( 'flicker_link', array(
		'label'        => __( 'flicker_link', 'chronicle' ),
		'type'=>'url',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[flicker_link]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[contact_email]',
		array(
		'default'=>esc_attr($wl_theme_options['contact_email']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'is_email',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[contact_email]', array(
	'selector' => '.chronicle_social_email',
	'render_callback' => 'chronicle_theme_options[contact_email]',
	) );
		$wp_customize->add_control( 'contact_email', array(
		'label'        => __( 'Email-ID', 'chronicle' ),
		'type'=>'email',
		'section'    => 'social_section',
		'settings'   => 'chronicle_theme_options[contact_email]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[phone_no]',
		array(
		'default'=>esc_attr($wl_theme_options['phone_no']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_integer',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[phone_no]', array(
	'selector' => '.chronicle_social_phone',
	'render_callback' => 'chronicle_theme_options[phone_no]',
	) );
		$wp_customize->add_control( 'phone_no', array(
		'label'        => __( 'Phone Number', 'chronicle' ),
		'type'=>'text',
		'section'    => 'social_section',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'settings'   => 'chronicle_theme_options[phone_no]'
	) );
	/* Footer Callout */
	$wp_customize->add_section('callout_section',array(
	'title'=>__("Footer Call-Out Options","chronicle"),
	'panel'=>'chronicle_theme_option',
	'capabilit'=>'edit_theme_options',
    'priority' => 37
	));
	$wp_customize->add_setting(
	'chronicle_theme_options[callout_text]',
		array(
		'default'=>esc_attr($wl_theme_options['callout_text']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'chronicle_sanitize_text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[callout_text]', array(
	'selector' => '.chronicle_callout_text',
	'render_callback' => 'chronicle_theme_options[callout_text]',
	) );
	$wp_customize->add_control( 'callout_title', array(
		'label'        => __( 'Callout Text', 'chronicle' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'chronicle_theme_options[callout_text]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[button_1_text]',
		array(
		'default'=>esc_attr($wl_theme_options['button_1_text']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[button_1_text]', array(
	'selector' => '.chronicle_callout_button_1',
	'render_callback' => 'chronicle_theme_options[button_1_text]',
	) );
	$wp_customize->add_control( 'chronicle_btn_1', array(
		'label'        => __( 'Button One Text', 'chronicle' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'chronicle_theme_options[button_1_text]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[button_1_link]',
		array(
		'default'=>esc_attr($wl_theme_options['button_1_link']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options',
		)
	);
$wp_customize->add_control( 'chronicle_btn_link_1', array(
		'label'        => __( 'Button One Link', 'chronicle' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'chronicle_theme_options[button_1_link]'
	) );
		$wp_customize->add_setting(
	'chronicle_theme_options[button_2_text]',
		array(
		'default'=>esc_attr($wl_theme_options['button_2_text']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[button_2_text]', array(
	'selector' => '.chronicle_callout_button_2',
	'render_callback' => 'chronicle_theme_options[button_2_text]',
	) );
$wp_customize->add_control( 'chronicle_btn_2', array(
		'label'        => __( 'Button Two Text', 'chronicle' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'chronicle_theme_options[button_2_text]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[button_2_link]',
		array(
		'default'=>esc_attr($wl_theme_options['button_2_link']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options',
		)
	);
$wp_customize->add_control( 'chronicle_btn_link_2', array(
		'label'        => __( 'Button Two Link', 'chronicle' ),
		'type'=>'text',
		'section'    => 'callout_section',
		'settings'   => 'chronicle_theme_options[button_2_link]'
	) );

	/* Footer Options */
	$wp_customize->add_section('footer_section',array(
	'title'=>__("Footer Options","chronicle"),
	'panel'=>'chronicle_theme_option',
	'capabilit'=>'edit_theme_options',
    'priority' => 41
	));
	$wp_customize->add_setting(
	'chronicle_theme_options[footer_customizations]',
		array(
		'default'=>esc_attr($wl_theme_options['footer_customizations']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'chronicle_theme_options[footer_customizations]', array(
	'selector' => '.chronicle_footer_customizations',
	'render_callback' => 'chronicle_theme_options[footer_customizations]',
	) );
	$wp_customize->add_control( 'chronicle_footer_customizations', array(
		'label'        => __( 'Footer Customization Text', 'chronicle' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'chronicle_theme_options[footer_customizations]'
	) );
	
	$wp_customize->add_setting(
	'chronicle_theme_options[developed_by_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_text']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'chronicle_developed_by_text', array(
		'label'        => __( 'Footer Customization Text', 'chronicle' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'chronicle_theme_options[developed_by_text]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[developed_by_chronicle_text]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_chronicle_text']),
		'type'=>'option',
		'sanitize_callback'=>'chronicle_sanitize_text',
		'capabilit'=>'edit_theme_options'
		)
	);
	$wp_customize->add_control( 'chronicle_developed_by_weblizar_text', array(
		'label'        => __( 'Footer Customization Text', 'chronicle' ),
		'type'=>'text',
		'section'    => 'footer_section',
		'settings'   => 'chronicle_theme_options[developed_by_chronicle_text]'
	) );
	$wp_customize->add_setting(
	'chronicle_theme_options[developed_by_link]',
		array(
		'default'=>esc_attr($wl_theme_options['developed_by_link']),
		'type'=>'option',
		'capabilit'=>'edit_theme_options',
		'sanitize_callback'=>'esc_url_raw'
		)
	);
	$wp_customize->add_control( 'chronicle_developed_by_link', array(
		'label'        => __( 'Footer Customization Text', 'chronicle' ),
		'type'=>'url',
		'section'    => 'footer_section',
		'settings'   => 'chronicle_theme_options[developed_by_link]'
	) );
	
	// excerpt option 
    $wp_customize->add_section('excerpt_option',array(
    'title'=>__("Excerpt Option",'chronicle'),
    'panel'=>'chronicle_theme_option',
    'capability'=>'edit_theme_options',
    'priority' => 37,
    ));
    
    $wp_customize->add_setting( 'chronicle_theme_options[excerpt_blog]', array(
        'default'=>esc_attr($wl_theme_options['excerpt_blog']),
        'type'=>'option',
        'sanitize_callback'=>'chronicle_sanitize_integer',
        'capability'=>'edit_theme_options'
    ) );
        $wp_customize->add_control( 'excerpt_blog', array(
        'label'        => __( 'Excerpt length blog section', 'chronicle' ),
        'type'=>'number',
        'section'    => 'excerpt_option',
		'description' => esc_html__('Excerpt length only for home blog section.', 'chronicle'),
		'settings'   => 'chronicle_theme_options[excerpt_blog]'
    ) );
	
	// home layout //
	$wp_customize->add_section('Home_Page_Layout',array(
    'title'=>__("Home Page Layout Option",'chronicle'),
    'panel'=>'chronicle_theme_option',
    'capability'=>'edit_theme_options',
    'priority' => 50,
    ));
	$wp_customize->add_setting('home_reorder',
            array(
				'type'=>'theme_mod',
                'sanitize_callback' => 'sanitize_json_string',
				'capability'        => 'edit_theme_options',
            )
        );
    $wp_customize->add_control(new chronicle_Custom_sortable_Control($wp_customize,'home_reorder', array(
		'label'=>__( 'Front Page Layout Option', 'chronicle' ),
        'section' => 'Home_Page_Layout',
        'type'    => 'home-sortable',
        'choices' => array(
            'service'      => __('Home Services', 'chronicle'),
            'portfolio'     => __('Home Portfolio', 'chronicle'),
            'blog'        => __('Home Blog', 'chronicle'),
        ),
		'settings'=>'home_reorder',
    )));
	// home layout close //

function themeslug_sanitize_select( $input, $setting ) {

  // Ensure input is a slug.
  $input = sanitize_key( $input );

  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;

  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


}
add_action( 'customize_register', 'chronicle_customizer' );
function chronicle_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function chronicle_sanitize_checkbox( $input ) {
    if ( $input == 'on' ) {
        return 'on';
    } else {
        return '';
    }
}
function scoreline_sanitize_integer( $input ) {
    return (int)($input);
}
function sanitize_json_string($json){
    $sanitized_value = array();
    foreach (json_decode($json,true) as $value) {
        $sanitized_value[] = esc_attr($value);
    }
    return json_encode($sanitized_value);
}
function chronicle_sanitize_integer( $input ) {
    return (int) $input;
}
/* Custom Control Class */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'chronicle_Customize_Misc_Control' ) ) :
class chronicle_Customize_Misc_Control extends WP_Customize_Control {
    public $settings = 'blogname';
    public $description = '';
    public function render_content() {
        switch ( $this->type ) {
            default:
           
            case 'heading':
                echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
                break;
 
            case 'line' :
                echo '<hr />';
                break;
			
        }
    }
}
endif;

/* For Font Control */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'chronicle_Font_Control' ) ) :
class chronicle_Font_Control extends WP_Customize_Control 
{  
 public function render_content() 
 {?>
   <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
   <select <?php $this->link(); ?> >
    <option  value="Abril Fatface"<?php if($this->value()== 'Abril Fatface') echo 'selected="selected"';?>><?php esc_html_e('Abril Fatface','chronicle'); ?></option>
	<option  value="Advent Pro"<?php if($this->value()== 'Advent Pro')  echo 'selected="selected"';?>><?php esc_html_e('Advent Pro','chronicle'); ?></option>
	<option  value="Aldrich"<?php if($this->value()== 'Aldrich') echo 'selected="selected"';?>><?php esc_html_e('Aldrich','chronicle'); ?></option>
	<option  value="Alex Brush"<?php if($this->value()== 'Alex Brush') echo 'selected="selected"';?>><?php esc_html_e('Alex Brush','chronicle'); ?></option>
	<option  value="Allura"<?php if($this->value()== 'Allura') echo 'selected="selected"';?>><?php esc_html_e('Allura','chronicle'); ?></option>
	<option  value="Amatic SC"<?php if($this->value()== 'Amatic SC') echo 'selected="selected"';?>><?php esc_html_e('Amatic SC','chronicle'); ?></option>
	<option  value="arial"<?php if($this->value()== 'arial') echo 'selected="selected"';?>><?php esc_html_e('Arial','chronicle'); ?></option>
	<option  value="Astloch"<?php if($this->value()== 'Astloch') echo 'selected="selected"';?>><?php esc_html_e('Astloch','chronicle'); ?></option>
	<option  value="arno pro bold italic"<?php if($this->value()== 'arno pro bold italic') echo 'selected="selected"';?>><?php esc_html_e('Arno pro bold italic','chronicle'); ?></option>
	<option  value="Bad Script"<?php if($this->value()== 'Bad Script') echo 'selected="selected"';?>><?php esc_html_e('Bad Script','chronicle'); ?></option>
	<option  value="Bilbo"<?php if($this->value()== 'Bilbo') echo 'selected="selected"';?>><?php esc_html_e('Bilbo','chronicle'); ?></option>
	<option  value="Calligraffitti"<?php if($this->value()== 'Calligraffitti') echo 'selected="selected"';?>><?php esc_html_e('Calligraffitti','chronicle'); ?></option>
	<option  value="Candal"<?php if($this->value()== 'Candal') echo 'selected="selected"';?>><?php esc_html_e('Candal','chronicle'); ?></option>
	<option  value="Cedarville Cursive"<?php if($this->value()== 'Cedarville Cursive') echo 'selected="selected"';?>><?php esc_html_e('Cedarville Cursive','chronicle'); ?></option>
	<option  value="Clicker Script"<?php if($this->value()== 'Clicker Script') echo 'selected="selected"';?>><?php esc_html_e('Clicker Script','chronicle'); ?></option>
	<option  value="Dancing Script"<?php if($this->value()== 'Dancing Script') echo 'selected="selected"';?>><?php esc_html_e('Dancing Script','chronicle'); ?></option>
	<option  value="Dawning of a New Day"<?php if($this->value()== 'Dawning of a New Day') echo 'selected="selected"';?>><?php esc_html_e('Dawning of a New Day','chronicle'); ?></option>
	<option  value="Fredericka the Great"<?php if($this->value()== 'Fredericka the Great') echo 'selected="selected"';?>><?php esc_html_e('Fredericka the Great','chronicle'); ?></option>
	<option  value="Felipa"<?php if($this->value()== 'Felipa') echo 'selected="selected"';?>><?php esc_html_e('Felipa','chronicle'); ?></option>
	<option  value="Give You Glory"<?php if($this->value()== 'Give You Glory') echo 'selected="selected"';?>><?php esc_html_e('Give You Glory','chronicle'); ?></option>
	<option  value="Great vibes"<?php if($this->value()== 'Great vibes') echo 'selected="selected"';?>><?php esc_html_e('Great vibes','chronicle'); ?></option>
	<option  value="Homemade Apple"<?php if($this->value()== 'Homemade Apple') echo 'selected="selected"';?>><?php esc_html_e('Homemade Apple','chronicle'); ?></option>
	<option  value="Indie Flower"<?php if($this->value()== 'Indie Flower') echo 'selected="selected"';?>><?php esc_html_e('Indie Flower','chronicle'); ?></option>
	<option  value="Italianno"<?php if($this->value()== 'Italianno') echo 'selected="selected"';?>><?php esc_html_e('Italianno','chronicle'); ?></option>
	<option  value="Jim Nightshade"<?php if($this->value()== 'Jim Nightshade') echo 'selected="selected"';?>><?php esc_html_e('Jim Nightshade','chronicle'); ?></option>
	<option  value="Kaushan Script"<?php if($this->value()== 'Kaushan Script') echo 'selected="selected"';?>><?php esc_html_e('Kaushan Script','chronicle'); ?></option>
	<option  value="Kristi"<?php if($this->value()== 'Kristi') echo 'selected="selected"';?>><?php esc_html_e('Kristi','chronicle'); ?></option>
	<option  value="La Belle Aurore"<?php if($this->value()== 'La Belle Aurore') echo 'selected="selected"';?>><?php esc_html_e('La Belle Aurore','chronicle'); ?></option>
	<option  value="Meddon"<?php if($this->value()== 'Meddon') echo 'selected="selected"';?>><?php esc_html_e('Meddon','chronicle'); ?></option>
	<option  value="Montez"<?php if($this->value()== 'Montez') echo 'selected="selected"';?>><?php esc_html_e('Montez','chronicle'); ?></option>
	<option  value="Megrim"<?php if($this->value()== 'Megrim') echo 'selected="selected"';?>><?php esc_html_e('Megrim','chronicle'); ?></option>
	<option  value="Mr Bedfort"<?php if($this->value()== 'Mr Bedfort') echo 'selected="selected"';?>><?php esc_html_e('Mr Bedfort','chronicle'); ?></option>
	<option  value="Neucha"<?php if($this->value()== 'Neucha') echo 'selected="selected"';?>><?php esc_html_e('Neucha','chronicle'); ?></option>
	<option  value="Nothing You Could Do"<?php if($this->value()== 'Nothing You Could Do') echo 'selected="selected"';?>><?php esc_html_e('Nothing You Could Do','chronicle'); ?></option>
	<option  value="Open Sans"<?php if($this->value()== 'Open Sans') echo 'selected="selected"';?>><?php esc_html_e('Open Sans','chronicle'); ?></option>
	<option  value="Over the Rainbow"<?php if($this->value()== 'Over the Rainbow') echo 'selected="selected"';?>><?php esc_html_e('Over the Rainbow','chronicle'); ?></option>
	<option  value="Pinyon Script"<?php if($this->value()== 'Pinyon Script') echo 'selected="selected"';?>><?php esc_html_e('Pinyon Script','chronicle'); ?></option>
	<option  value="Princess Sofia"<?php if($this->value()== 'Princess Sofia') echo 'selected="selected"';?>><?php esc_html_e('Princess Sofia','chronicle'); ?></option>
	<option  value="Reenie Beanie"<?php if($this->value()== 'Reenie Beanie') echo 'selected="selected"';?>><?php esc_html_e('Reenie Beanie','chronicle'); ?></option>
	<option  value="Rochester"<?php if($this->value()== 'Rochester') echo 'selected="selected"';?>><?php esc_html_e('Rochester','chronicle'); ?></option>
	<option  value="Rock Salt"<?php if($this->value()== 'Rock Salt') echo 'selected="selected"';?>><?php esc_html_e('Rock Salt','chronicle'); ?></option>
	<option  value="Ruthie"<?php if($this->value()== 'Ruthie') echo 'selected="selected"';?>><?php esc_html_e('Ruthie','chronicle'); ?></option>
	<option  value="Sacramento"<?php if($this->value()== 'Sacramento') echo 'selected="selected"';?>><?php esc_html_e('Sacramento','chronicle'); ?></option>
	<option  value="Sans Serif"<?php if($this->value()== 'Sans Serif') echo 'selected="selected"';?>><?php esc_html_e('Sans Serif','chronicle'); ?></option>
	<option  value="Seaweed Script"<?php if($this->value()== 'Seaweed Script') echo 'selected="selected"';?>><?php esc_html_e('Seaweed Script','chronicle'); ?></option>
	<option  value="Shadows Into Light"<?php if($this->value()== 'Shadows Into Light') echo 'selected="selected"';?>><?php esc_html_e('Shadows Into Light','chronicle'); ?></option>
	<option  value="Smythe"<?php if($this->value()== 'Smythe') echo 'selected="selected"';?>><?php esc_html_e('Smythe','chronicle'); ?></option>
	<option  value="Stalemate"<?php if($this->value()== 'Stalemate') echo 'selected="selected"';?>><?php esc_html_e('Stalemate','chronicle'); ?></option>
	<option  value="Tahoma"<?php if($this->value()== 'Tahoma') echo 'selected="selected"';?>><?php esc_html_e('Tahoma','chronicle'); ?></option>
	<option  value="Tangerine"<?php if($this->value()== 'Tangerine') echo 'selected="selected"';?>><?php esc_html_e('Tangerine','chronicle'); ?></option>
	<option  value="Trade Winds"<?php if($this->value()== 'Trade Winds') echo 'selected="selected"';?>><?php esc_html_e('Trade Winds','chronicle'); ?></option>
	<option  value="UnifrakturMaguntia"<?php if($this->value()== 'UnifrakturMaguntia') echo 'selected="selected"';?>><?php esc_html_e('UnifrakturMaguntia','chronicle'); ?></option>
	<option  value="Waiting for the Sunrise"<?php if($this->value()== 'Waiting for the Sunrise') echo 'selected="selected"';?>><?php esc_html_e('Waiting for the Sunrise','chronicle'); ?></option>
	<option  value="Warnes"<?php if($this->value()== 'Warnes') echo 'selected="selected"';?>><?php esc_html_e('Warnes','chronicle'); ?></option>
	<option  value="Yesteryear"<?php if($this->value()== 'Yesteryear') echo 'selected="selected"';?>><?php esc_html_e('Yesteryear','chronicle'); ?></option>
	<option  value="Zeyada"<?php if($this->value()== 'Zeyada') echo 'selected="selected"';?>><?php esc_html_e('Zeyada','chronicle'); ?></option>
    </select>		
		
  <?php
 }
}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'chronicle_Customizer_Icon_Picker_Control' ) ) :
	class chronicle_Customizer_Icon_Picker_Control extends WP_Customize_Control {
		public function enqueue() {
			wp_enqueue_script( 'fontawesome-iconpicker', get_stylesheet_directory_uri() . '/iconpicker-control/assets/js/fontawesome-iconpicker.min.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'iconpicker-control', get_stylesheet_directory_uri() . '/iconpicker-control/assets/js/iconpicker-control.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_style( 'fontawesome-iconpicker', get_stylesheet_directory_uri() . '/iconpicker-control/assets/css/fontawesome-iconpicker.min.css' );
		}
		
		
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>
				<div class="input-group icp-container">
					<input data-placement="bottomRight" class="icp icp-auto" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" type="text">
					<span class="input-group-addon"></span>
				</div>
			</label>
			<?php
		}
	}
endif;


if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'chronicle_Custom_sortable_Control' ) ) :
class chronicle_Custom_sortable_Control extends WP_Customize_Control
{
    public $type = 'home-sortable';
    /*Enqueue resources for the control*/
    public function enqueue()
    {

        wp_enqueue_style('customizer-repeater-admin-stylesheet', get_template_directory_uri() . '/assets/customizer_js_css/css/chronicle-admin-style.css', time());

        wp_enqueue_script('customizer-repeater-script', get_template_directory_uri() . '/assets/customizer_js_css/js/chronicle-customizer_repeater.js', array('jquery', 'jquery-ui-draggable'), time(), true);

    }
    public function render_content()
    {
        if (empty($this->choices)) {
            return;
        }
        $values = json_decode($this->value());
        $name         = $this->id;
        ?>

		<span class="customize-control-title">
			<?php echo esc_attr($this->label); ?>
		</span>

		<?php if (!empty($this->description)): ?>
			<span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
		<?php endif;?>

		<div class="customizer-repeater-general-control-repeater customizer-repeater-general-control-droppable">
			<?php 
			if(!empty($values)){ 
				foreach ($values as $value) {?>
					<div class="customizer-repeater-general-control-repeater-container customizer-repeater-draggable ui-sortable-handle">
					<div class="customizer-repeater-customize-control-title">
						<?php echo esc_attr($this->choices[$value]); ?>
					</div>
					<input type="hidden" class="section-id" value="<?php echo esc_attr($value); ?>">
					</div>	
				<?php }?>
				
			<?php }else{
			foreach ($this->choices as $value => $label): ?>
					<div class="customizer-repeater-general-control-repeater-container customizer-repeater-draggable ui-sortable-handle">
					<div class="customizer-repeater-customize-control-title">
						<?php echo esc_attr($label); ?>
					</div>
					<input type="hidden" class="section-id" value="<?php echo esc_attr($value); ?>">
					</div>

				<?php endforeach;
			}
        		if (!empty($value)) {?>
					<input type="hidden"
					       id="customizer-repeater-<?php echo esc_attr($this->id); ?>-colector" <?php esc_url($this->link());?>
					       class="customizer-repeater-colector"
					       value="<?php echo esc_textarea(json_encode($value)); ?>"/>
					<?php
				} else {?>
					<input type="hidden"
					       id="customizer-repeater-<?php echo esc_attr($this->id); ?>-colector" <?php esc_url($this->link());?>
					       class="customizer-repeater-colector"/>
					<?php
				}?>
		</div>
		<?php
}
}
endif;

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'One_Page_Editor' ) ) :
/* Class to create a custom tags control */
class One_Page_Editor extends WP_Customize_Control {	
	private $include_admin_print_footer = false;
	private $teeny = false;
	public $type = 'text-editor';
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		if ( ! empty( $args['include_admin_print_footer'] ) ) {
			$this->include_admin_print_footer = $args['include_admin_print_footer'];
		}
		if ( ! empty( $args['teeny'] ) ) {
			$this->teeny = $args['teeny'];
		}
	}
	/* Enqueue scripts */
	public function enqueue() {
		wp_enqueue_script( 'one_lite_text_editor', get_template_directory_uri() . '/inc/customizer-page-editor/js/one-lite-text-editor.js', array( 'jquery' ), false, true );
	}
	/* Render the content on the theme customizer page */
	public function render_content() {
		?>

		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
		<?php
		$settings = array(
			'textarea_name' => $this->id,
			'teeny' => $this->teeny,
		);
		$control_content = $this->value();
		wp_editor( $control_content, $this->id, $settings );

		if ( $this->include_admin_print_footer === true ) {
			do_action( 'admin_print_footer_scripts' );
		}
	}
}
endif;

function show_on_front() {
	if(is_front_page())
	{
		return is_front_page() && 'posts' !== get_option( 'show_on_front' );
	}
	elseif(is_home()) 
	{
		return is_home();
	}
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'chronicle_changelog_Control' ) ) :
class chronicle_changelog_Control extends WP_Customize_Control {

	/**
	* Render the content on the theme customizer page
	*/
	public function render_content() { ?>
		<label style="overflow: hidden; zoom: 1;">
						
			<div class="col-md-3 col-sm-6">
				<h2 style="margin-top:10px;color:#fff;background-color: #ef36af;padding: 10px;font-size: 18px;"><?php echo esc_html_e( 'Chronicle Theme Changelog','chronicle'); ?></h2>
					<ul style="padding-top:20px">
						<li class="upsell-enigma"> <div class="versionhd"> Version 2.6.8 - <span> Current Version </span></div>
							<ol> <li> Readme file changed as per new rule.  </li><li>Minor changes in theme info notice.  </li><li>Change log updated for customizer. </li></ol></li>
							<li class="upsell-enigma"> <div class="versionhd"> Version 2.6.7 - </div>
							<ol> <li> Option added for home-blog.  </li><li>Minor CSS issue fixed for blog.  </li></ol></li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 2.6.6 - <span> Current Version </span></div>
							<ol> <li> Screenshot updated </li></ol></li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 2.6.5 - </div>
							<ol> <li>  Minor CSS issue resolved. </li></ol></li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 2.6.4 - </div>
							<ol> <li> Go Chronicle Premium and rating option added on admin panel. </li><li>  Minor CSS issue resolved. </li><li>  Minor issue fixed in slider. </li></ol></li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 2.6.3 - </div>
						<ol> <li> Sticky header option added. </li><li> Pro Themes & Plugin page updated. </li></ol></li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 2.6.2 - <div>
						<ol> <li> Minor issue fixed. </li><li>Category option for blog options. </li></ol></li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 2.6.1 - </div>
						<ol> <li> Touch slider added. </li></ol></li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 2.6 - </div>
						<ol> <li> Snow effect option added. </li><li> Rating banner dismiss option added.</li></ol></li>
										<li class="upsell-enigma"> <div class="versionhd"> Version 2.5 - </div>
						<ol> <li> Text Editor added in Slider, Service Options. </li><li> Icon Picker added in Service Options.</li><li> Quick Edit Option added.</li><li> Home Page Layout Options added.</li><li> Rating banner added.</li></ol></li>				
						<li class="upsell-enigma"> <div class="versionhd"> Version 2.4.4 - </div>
							<ol> <li> New feature added in Slider Option.</li><li> Excerpt Option added. </li><li>Minor changes in header.</li></ol> </li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 2.4.3 - </div>
							<ol> <li> Minor changes in custom header. </li></ol></li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 2.4.2 - </div>
							<ol> <li> Pro Themes & Plugin Page updated with Upcoming Premium Themes. </li><li> Font Awesome new version added. </li><li> Snow Effect removedfor customizer.</li><li> Custom header added.</li></ol> </li>
						<li class="upsell-enigma">  <div class="versionhd"> Version 2.4.1 - </div>
							<ol> <li> Pro Themes & Plugin Page updated with Upcoming Premium Themes. </li><li> Font Awesome new version added.</li><li>Snow Effect removedfor customizer. </li><li> Custom header added.</li></ol> </li>
						<li class="upsell-enigma">  <div class="versionhd"> Version 2.4 - </div>
							<ol> <li>Pro Themes & Plugin Page updated with Upcoming Premium Themes.</li><li>Minor menu issue Fixed. </li><li> Font Awesome new version added. </li><li> Plugin Recomendation added.</li></ol></li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 2.3 - </div>
							<ol> <li> Pro Themes & Plugin Page updated with premium Themes and Plugins Feature set. </li><li> Woocommerce issue Fixed.</li></ol></li>				
						<li class="upsell-enigma"> <div class="versionhd"> Version 2.2.2 - </div>
							<ol> <li> Theme Info Page Updated with premium Themes and Plugins Feature set. </li><li> Some Minor issue fixed.</li></ol> </li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 2.2.1 - </div>
							<ol> <li> Minor background issue fixed. </li></ol></li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 2.2 - </div>
							<ol> <li> Menu issue fixed. </li> <li> Slider title background issue fixed. </li></ol> </li>
						<li class="upsell-enigma">  <div class="versionhd"> Version 2.1 - </div>
							<ol> <li> Minor Issues Fixed. </li></ol> </li>
						<li class="upsell-enigma">  <div class="versionhd"> Version 2.0 - </div>
							<ol> <li>Added Google Font.</li><li> Update Theme Info Page with Premium Features.</li></ol></li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 1.9 - </div>
							<ol> <li> Remove Snow Effect. </li><li> Update Theme Info Page with Premium Features.</li></ol></li>				
						<li class="upsell-enigma"> <div class="versionhd"> Version 1.8 - </div>
							<ol> <li> New FA icons set added.</li><li>New FA icons set added. </li><li>x-mas banner.. </li></ol> </li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 1.7 - </div>
							<ol> <li> snow effects added. </li></ol></li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 1.6 - </div>
							<ol> <li>Minor Issue Fixed. </li></ol> </li>
						<li class="upsell-enigma">  <div class="versionhd">Version 1.5 - </div>
							<ol> <li> Mobile Menu Fix. </li></ol> </li>
						<li class="upsell-enigma">  <div class="versionhd"> Version 1.3 - </div>
							<ol> <li>Theme option panel remove.</li><li> Front page issue fixed.</li><li>WPML Competible.</li><li> Some Minor Issue Fixed.</li><li> Theme-Info Page Added.</li></ol></li>
						<li class="upsell-enigma">  <div class="versionhd"> Version 1.2 - </div>
							<ol> <li> Breadcrumb minor issue fixed. </li><li> Portfolio option minor issue fixed</li></ol> </li>
						<li class="upsell-enigma">  <div class="versionhd"> Version 1.0 - </div>
							<ol> <li>Customize Settings API updated.</li></ol></li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 0.9.8.3 - </div>
							<ol> <li> Reading-Settings Fixed. </li><li> Service Three Settings FIXED.</li></ol></li>				
						<li class="upsell-enigma"> <div class="versionhd"> Version 0.9.8.2 - </div>
							<ol> <li>NOUNCE ISSUE FIXED </li> </ol></li>


						<li class="upsell-enigma"> <div class="versionhd"> Version 0.9.8 - </div>
							<ol> <li> Fixed minor issues. </li></ol></li>				
						<li class="upsell-enigma"> <div class="versionhd"> Version 0.9.7 - </div>
							<ol> <li> Theme option settings save in one single row. </li><li> Fixed all issue. </li></ol> </li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 0.9.6 - </div>
							<ol> <li> minors changes. </li></ol></li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 0.9.5 - </div>
							<ol> <li> Changes the weblizar slug in chronicle. </li></ol> </li>
						<li class="upsell-enigma">  <div class="versionhd"> Version 0.9.4 - </div>
							<ol> <li> Removed Flickr Widget. </li><li> Fixed some minors.</li></ol> </li>
						<li class="upsell-enigma">  <div class="versionhd"> Version 0.9.3 - </div>
							<ol> <li> Translation String. </li><li>JS/CSS prefixed. </li><li> POT file UPDATED.</li></ol></li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 0.9.2 - </div>
							<ol> <li> Reviewers issues fixed. </li></ol></li>				
						<li class="upsell-enigma"> <div class="versionhd"> Version 0.9.1 - </div>
							<ol> <li> Reviewer all issues fixed. </li></ol> </li>
						<li class="upsell-enigma"> <div class="versionhd"> Version 0.9 - </div>
							<ol> <li> Released!! </li></ol></li>
					</ul>
			</div>
			<div class="col-md-2 col-sm-6 upsell-btn">					
					<a style="margin-bottom:20px;margin-left:20px;" href="<?php echo esc_url(get_template_directory_uri()) ?>/changelog.txt" target="blank" class="btn btn-success btn"><?php esc_html_e('Changelog','chronicle'); ?> </a>
			</div>
		</label>
		<?php
	}
}
endif;

/* class for categories */
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'chronicle_category_Control' ) ) :
class chronicle_category_Control extends WP_Customize_Control 
{   public function render_content(){ ?>
		<span class="customize-control-title"><?php echo esc_attr($this->label); ?></span>
		<?php  $enigma_category = get_categories(); ?>
		<select <?php $this->link(); ?> >
			<?php foreach($enigma_category as $category){ ?>
				<option value= "<?php echo esc_attr($category->term_id); ?>" <?php if($this->value()=='') echo 'selected="selected"';?> ><?php echo esc_attr($category->cat_name); ?></option>
			<?php } ?>
		</select> <?php
	}  /* public function ends */
}/*   class ends */
endif; 
?>