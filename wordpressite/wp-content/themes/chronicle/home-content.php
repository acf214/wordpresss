<!-- Slider ======================================= -->
<?php $chronicle_theme_options = chronicle_get_options();?>
<div class="clearfix"></div> 
<?php if(get_theme_mod('chronicle_slider','1')=='1') { ?>
<!-- Slider -->
<div id="example3" class="slider-pro">
	<div class="sp-slides">
		<?php if($chronicle_theme_options['slide_image_1']!='') { ?>
		<div class="sp-slide">
			<img class="chronicle_img_responsive" src="<?php echo esc_url($chronicle_theme_options['slide_image_1']); ?>" />
			<?php if($chronicle_theme_options['slide_title_1']!='') { ?>
			<a href="<?php echo esc_attr($chronicle_theme_options['slide_link_1']); ?>"><h3 class="sp-layer sp-white sp-padding" data-show-delay="500" data-position="centerCenter" data-show-transition="right" data-vertical="0" data-horizontal="40"  >
				<span class="chronicle_slider_title_1"><?php echo esc_attr($chronicle_theme_options['slide_title_1']); ?></span>
			</h3></a>
			<?php } if($chronicle_theme_options['slide_desc_1']!='') { ?>
			<h3 class="sp-layer sp-black sp-padding" data-show-delay="700" data-position="centerCenter" data-show-transition="right" data-vertical="150" data-horizontal="40"  >
				<span class="chronicle_slider_desc_1"><?php echo wp_kses(get_theme_mod('slide_desc_1' , $chronicle_theme_options['slide_desc_1']),' '); ?></span> 
			</h3>
			<?php } ?>
		</div>
		<?php } ?>
		<?php if($chronicle_theme_options['slide_image_2']!='') { ?>
		
		<div class="sp-slide">
			<img class="chronicle_img_responsive" src="<?php echo esc_url($chronicle_theme_options['slide_image_2']); ?>" />
			<?php if($chronicle_theme_options['slide_title_2']!='') { ?>
			<a href="<?php echo esc_attr($chronicle_theme_options['slide_link_2']); ?>"><h3 class="sp-layer sp-white sp-padding" data-show-delay="500" data-position="centerCenter" data-show-transition="right" data-vertical="0" data-horizontal="40"  >
				<span class="chronicle_slider_title_2"><?php echo esc_attr($chronicle_theme_options['slide_title_2']); ?></span>
			</h3></a>
			<?php } if($chronicle_theme_options['slide_desc_2']!='') { ?>
			<h3 class="sp-layer sp-black sp-padding" data-show-delay="700" data-position="centerCenter" data-show-transition="right" data-vertical="150" data-horizontal="40"  >
				<span class="chronicle_slider_desc_2"><?php echo wp_kses(get_theme_mod('slide_desc_2' , $chronicle_theme_options['slide_desc_2']),' '); ?></span> 
			</h3>
			<?php } ?>
		</div>
		<?php } ?><?php if($chronicle_theme_options['slide_image_3']!='') { ?>
		
		<div class="sp-slide">
			<img class="chronicle_img_responsive" src="<?php echo esc_url($chronicle_theme_options['slide_image_3']); ?>" />
			<?php if($chronicle_theme_options['slide_title_3']!='') { ?>
			<a href="<?php echo esc_attr($chronicle_theme_options['slide_link_3']); ?>"><h3 class="sp-layer sp-white sp-padding" data-show-delay="500" data-position="centerCenter" data-show-transition="right" data-vertical="0" data-horizontal="40"  >
				<span class="chronicle_slider_title_3"><?php echo esc_attr($chronicle_theme_options['slide_title_3']); ?></span>
			</h3></a>
			<?php } if($chronicle_theme_options['slide_desc_3']!='') { ?>
			<h3 class="sp-layer sp-black sp-padding" data-show-delay="700" data-position="centerCenter" data-show-transition="right" data-vertical="150" data-horizontal="40"  >
				<span class="chronicle_slider_desc_3"><?php echo wp_kses(get_theme_mod('slide_desc_3' , $chronicle_theme_options['slide_desc_3']),' '); ?></span> 
			</h3>
			<?php } ?>
		</div>
		</a>
		<?php } ?>
	</div>
</div><!-- Slider --> 
<?php } else { get_template_part('home','slider'); } ?>
<div class="clearfix"></div>
<div class="feature_section12">
	<div class="container animate" data-anim-type="fadeIn">	
		<?php  
			if($chronicle_theme_options['callout_text']!='') { ?>	
		<h1 class="animate chronicle_callout_text" data-anim-type="fadeInDown" data-anim-delay="200"><?php echo esc_attr($chronicle_theme_options['callout_text']); ?></h1>
		<?php } ?>
		<br /><br />
		<?php if($chronicle_theme_options['button_1_text']!='') { ?>	
		<span class="chronicle_callout_button_1"><a href="<?php if($chronicle_theme_options['button_1_link']) { echo esc_url($chronicle_theme_options['button_1_link']); } ?>" class="readmore_but9 animate" data-anim-type="zoomIn" data-anim-delay="750"><?php echo esc_attr($chronicle_theme_options['button_1_text']); ?></a></span>
		<?php } if($chronicle_theme_options['button_2_text']!='') { ?>	
		<span class="chronicle_callout_button_2"><a href="<?php if($chronicle_theme_options['button_2_link']) { echo esc_url($chronicle_theme_options['button_2_link']); } ?>" class="readmore_but9 animate call_btn" data-anim-type="zoomIn" data-anim-delay="800"><?php echo esc_attr($chronicle_theme_options['button_2_text']); ?></a></span>
		<?php } ?>
	</div>
</div><!-- end features section12 -->

<div class="clearfix"></div>

<?php 
if($sections = json_decode(get_theme_mod('home_reorder'),true)) {
	  foreach ($sections as $section) {
		$data = $section."_home";
		if($chronicle_theme_options[$data]=="on") {
		get_template_part('home', $section);
		}
	}
} else{
if ($chronicle_theme_options['service_home']=="on"){
get_template_part('home', 'service');
}
if ($chronicle_theme_options['portfolio_home']=="on"){
get_template_part('home', 'portfolio');
}
if ($chronicle_theme_options['blog_home']=="on"){
get_template_part('home', 'blog');
}
}
?>

<script>
jQuery(document ).ready(function( $ ) {
		jQuery('#example3' ).sliderPro({
			width:1250,
			height:500,
			fade: true,
			arrows: true,
			buttons: false,
			fullScreen: true,
			shuffle: true,
			thumbnailArrows: true,
			autoplay: true,
			autoplayDelay:<?php echo esc_attr($chronicle_theme_options['slider_speed']) ?>,
		});
	});
</script>