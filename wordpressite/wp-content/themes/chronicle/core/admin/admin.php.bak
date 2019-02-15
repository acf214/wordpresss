<?php if (!function_exists('healthcare_info_page')) {
	function healthcare_info_page() {
	$page1=add_theme_page(__('Welcome to Healthcare', 'healthcare'), __('About Healthcare', 'healthcare'), 'edit_theme_options', 'healthcare', 'healthcare_display_theme_info_page');
	add_action('admin_print_styles-'.$page1, 'healthcare_admin_info');
	}	
}
add_action('admin_menu', 'healthcare_info_page');

function healthcare_admin_info(){
	wp_enqueue_style('bootstrap',  get_template_directory_uri() .'/admin/bootstrap/css/bootstrap.css');
	wp_enqueue_style('admin',  get_template_directory_uri() .'/admin/admin-themes.css');
	wp_enqueue_style('font-awesome',  get_template_directory_uri() .'/css/font-awesome/css/font-awesome.css');
	//JS
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-js',get_template_directory_uri() .'/admin/bootstrap/js/bootstrap.js');
} 
if (!function_exists('healthcare_display_theme_info_page')) {
	function healthcare_display_theme_info_page() {
		$theme_data = wp_get_theme(); ?>
	<div class="wrap elw-page-welcome about-wrap seting-page">

    <div class="col-md-12 settings">
         <div class=" col-md-9">
            <div class="col-md-12" style="padding:0">
				<?php $wl_th_info = wp_get_theme(); ?>
				<h2><span class="elw_shortcode_heading">Welcome to Healthcare - Version <?php echo esc_html( $wl_th_info->get('Version') ); ?> </span></h2>
				<p style="font-size:19px;color: #555d66;"> Healthcare is a perfect solution for any medical and healthcare-related businesses. Healthcare is a fully dynamic, well structured and beautiful wordpress theme which is specifically designed for hospitals, health clinics, dentists and everyone else involved in health services. It is a good fit for both small businesses and corporate businesses, as it is highly customizable via the Live Customizer. You can use Healthcare for restaurants, startups, freelancers, creative agencies, portfolios, WooCommerce, or niches like sports, medical, blogging, fashion, lawyer sites etc. It has a one-page design, Sendinblue newsletter integration, widgetized footer, and a clean appearance. It is mobile friendly and optimized for SEO.  </p>
            </div>
		</div>
       
        <div class=" col-md-3">
			<div class="update_pro">
				<h3> Upgrade Pro </h3>
				<a class="demo" href="https://weblizar.com/themes/healthcare/">Get Pro In $39</a>
			</div>
		</div>
	</div>

            <!-- Themes & Plugin -->
            <div class="col-md-12  product-main-cont">
                <ul class="nav nav-tabs product-tbs">
				    <li class="active"><a data-toggle="tab" href="#start"> Getting Started </a></li>
                    <li><a data-toggle="tab" href="#themesd"> Healthcare premium </a></li>
					<li><a data-toggle="tab" href="#freepro">Free Vs Pro</a></li>
                </ul>

                <div class="tab-content">
				
				
				<div id="start" class="tab-pane fade in active">
                        <div class="space  theme active">

                            <div class=" p_head theme">
                                <!--<h1 class="section-title">WordPress Themes</h1>-->
                            </div>							

                            <div class="row p_plugin blog_gallery">
                                <div class="col-xs-12 col-sm-7 col-md-7 p_plugin_pic">
                                    <h4>Step 1: Create a Homepage</h4>
									<ol>
									<li> Create a new page -> home and publish. </li>
									<li> Go to Appearance -> Customize > Homepage Settings -> select A static page option. </li>
									<li> In "Homepage", select the page that you created as a home page. </li>
									<li> Now Go to Customize -> Theme Options -> Theme General Options. </li>
									<li> select Show Front Page option </li>
									<li> Save changes </li>
									</ol>
									<a class="add_page" target="_blank" href="<?php echo admin_url('/post-new.php?post_type=page') ?>">Add New Page</a>
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
                                    <div class="row p-box">
                                         <div class="img-thumbnail">
										<img src="<?php echo get_template_directory_uri(); ?>/screenshot.jpg" class="img-responsive" alt="img"/>
                                    </div>
                                    </div>
                                </div>
                            </div>
							
							
							<div class="row p_plugin blog_gallery">
                                <div class="col-xs-12 col-sm-4 col-md-12 p_plugin_pic">
                                    <h4>Step 2: Customizer Options Panel </h4>
									<ol>
									<li> Go to Appearance -> Customize > Theme Options </li>
									<li> General Options - General Options use for change theme color. </li>
									<li> Header Options - Header Options use for logo width and height, and add custom css. </li>
									<li> Header Info - Header Info use for customize top header like: Email, Mob No, Working Hours. </li>
									<li> Slider Image Options - It is use to add slider image, slider speed and slider animation. </li>
									<li> Callout Options - It is use for add callout Text, Callout Link and Callout Button Text.  </li>
									<li> Theme Blog Options - Use to add blog title, blog area descrption, enable/disable blog section on homepage, post to display, blog read more button text and select category for blog. </li>
									
									<li> Theme Footer Options - Use to customize footer copyright text, developed by text and developed by link and adding social icons for footer. </li>
									<li> Excerpt Option - use for choose Excerpt length for home blog section </li>
									</ol>
									<a class="add_page" target="_blank" href="<?php echo esc_url(admin_url('customize.php')); ?>">Go to Customizer</a>
                                </div>
                            </div>
							
							
							<div class="row p_plugin blog_gallery visit_pro">
                                <p>Visit Our Latest Pro Themes & See Demos</p>
								<p style="font-size: 17px !important;">We have put in a lot of effort in all our themes, free and premium both. Each of our Premium themes has a corresponding free version so that you can try out the theme before you decide to purchase it.</p>
								<a href="https://weblizar.com/themes/">Visit Themes</a>
                            </div>	
                        </div>
                    </div>
				
				<!-- end 1st tab -->
				
				
                    <div id="themesd" class="tab-pane fade">
                        <div class="space theme">

                            <div class=" p_head theme">
                                <!--<h1 class="section-title">WordPress Themes</h1>-->
                            </div>							

                            <div class="row p_plugin blog_gallery">
                                <div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
                                    <div class="img-thumbnail">
										<img src="<?php echo get_template_directory_uri(); ?>/images/healthcare1.png" class="img-responsive" alt="img"/>
                                    </div>
									
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
                                    <div class="row p-box">
                                        <div>
                                            <p><strong>Description: </strong>Healthcare is a perfect solution for any medical and healthcare-related businesses.This theme is a fully dynamic, well structured and beautiful WordPress theme which is specifically designed for hospitals, health clinics, dentists and everyone else involved in health services. You can use it for your business, portfolio, blogging or any other type of business vertical to make your website.</p>
                                        </div>
										<p><strong>Tags: </strong>clean, responsive, portfolio, blog, e-commerce, Hospital, Business, WordPress, Corporate, dark, shop, restaurant.</p>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
                                    <div class="price1">
                                        <span class="currency">USD</span>
                                        <span class="price-number">$<span>39</span></span>
                                    </div>
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-primary btn-lg" href="https://weblizar.com/themes/healthcare/">Detail</a>
                                    </div>
                                </div>
                            </div>
							
							
							<div class="row p_plugin blog_gallery">
                                <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                                    <div class="img-thumbnail pro_theme">
										<img src="<?php echo get_template_directory_uri(); ?>/images/construction-pro.png" class="img-responsive" alt="img"/>
										<div class="btn-vertical">
										<h4 class="pro_thm">
                                        <a href="https://weblizar.com/themes/construction-premium-wordpress-theme/">Construction Premium</a></h4>
										</div>
                                    </div>
									
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                                    <div class="img-thumbnail pro_theme">
										<img src="<?php echo get_template_directory_uri(); ?>/images/Responsive-Beauty.png" class="img-responsive" alt="img"/>
										<div class="btn-vertical">
										<h4 class="pro_thm">
                                        <a href="https://weblizar.com/themes/beautyspa-premium/">Beautyspa Premium</a></h4>
										</div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                                    <div class="img-thumbnail pro_theme">
										<img src="<?php echo get_template_directory_uri(); ?>/images/personal.png" class="img-responsive" alt="img"/>
										<div class="btn-vertical">
										<h4 class="pro_thm">
                                        <a href="https://weblizar.com/themes/personal-premium-theme/">Presonal Premium</a></h4>
										</div>
                                    </div>
                                </div>
                            </div>
							
							
							<div class="row p_plugin blog_gallery visit_pro">
                                <p>Visit Our Latest Pro Themes & See Demos</p>
								<p style="font-size: 17px !important;">We have put in a lot of effort in all our themes, free and premium both. Each of our Premium themes has a corresponding free version so that you can try out the theme before you decide to purchase it.</p>
								<a href="https://weblizar.com/themes/">Visit Themes</a>
                            </div>	
                        </div>
                    </div>
					
					<div id="freepro" class="tab-pane fade">
							<div class=" p_head theme">
                                <!--<h1 class="section-title">Weblizar Offers</h1>-->
                            </div>
						<div class="row p_plugin blog_gallery">		
						<div class="columns">
						  <ul class="price">
							<li class="header" style="background:#31A3DD">Healthcare</li>
							<li class="grey">Features</li>
							<li>Front Page</li>
							<li>Theme Option Panel</li>
							<li>Unlimited Color Skins</li>
							<li>Multilingual</li>
							<li>3 Service Page Template</li>
							<li>Custom Shortcodes</li>
							<li>2 About Us Page Template</li>
							<li>WooCommerce Compitable</li>
						  </ul>
						</div>
						
						 <div class="columns">
						  <ul class="price">
							<li class="header">Free</li>
							<li class="grey">$ 00</li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-check"></i></li>
						  </ul>
						</div>

						<div class="columns">
						  <ul class="price">
							<li class="header" style="background-color:#31A3DD">Healthcare Pro</li>
							<li class="grey">$ 39</li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li class="grey"><a href="http://demo.weblizar.com/healthcare-premium/" class="pro_btn">Visit Demo</a></li>
						  </ul>
						</div>
						</div>
					</div>
                </div>
            </div>            
<?php
	}
}
?>