<?php $chronicle_theme_options = chronicle_get_options();?>
<?php if($chronicle_theme_options['service_home']=='on') { ?>
<div class="feature_section15">
<div class="container">	
	<h1><?php if($chronicle_theme_options['home_service_title']!='') { ?>
		<span class="chronicle_service_heading" > <?php echo esc_attr($chronicle_theme_options['home_service_title']); ?> </span>
		<?php } if($chronicle_theme_options['home_service_description']!='') {
		echo "<b class='chronicle_service_desc'>". wp_kses(get_theme_mod('home_service_description' , $chronicle_theme_options['home_service_description']),' ') ."</b>";
	} ?>
    </h1>	
    <div class="clearfix margin_top4"></div>    
    <div class="one_third"> 
	<?php if($chronicle_theme_options['service_1_icons']) { ?>	
			<span class="chronicle_service_icon_1"><i class="<?php echo 'fa '.esc_attr($chronicle_theme_options['service_1_icons']); ?> animate" data-anim-type="zoomIn"></i></span>
	<?php } if($chronicle_theme_options['service_1_title']) { ?>
	<strong class="animate chronicle_service_title_1" data-anim-type="fadeInRight" data-anim-delay="400"><?php echo esc_attr($chronicle_theme_options['service_1_title']);?></strong>
        <?php }  if($chronicle_theme_options['service_1_text']!='') { ?>
		<p class="chronicle_service_text_1"><?php echo wp_kses(get_theme_mod('service_1_text' , $chronicle_theme_options['service_1_text']),' '); ?></p>
    <?php } ?>
	</div>
	
	<div class="one_third">  
		<?php if($chronicle_theme_options['service_2_icons']) {  ?>
		<span class="chronicle_service_icon_2"><i class="<?php echo 'fa '.esc_attr($chronicle_theme_options['service_2_icons']);?> animate" data-anim-type="zoomIn"></i></span>
		<?php } if($chronicle_theme_options['service_2_title']) { ?><strong class="animate chronicle_service_title_2" data-anim-type="fadeInRight" data-anim-delay="400"><?php  echo esc_attr($chronicle_theme_options['service_2_title']);  ?></strong> 
		<?php } if($chronicle_theme_options['service_2_text']!='') { ?>
		<p class="chronicle_service_text_2"><?php echo wp_kses(get_theme_mod('service_2_text' , $chronicle_theme_options['service_2_text']),' '); ?></p>
    <?php } ?>
	</div>
    
    <div class="one_third last"> 
		<?php if($chronicle_theme_options['service_3_icons']) {  ?>
		<span class="chronicle_service_icon_3"><i class="<?php echo 'fa '.esc_attr($chronicle_theme_options['service_3_icons']); ?> animate" data-anim-type="zoomIn"></i></span>
		<?php } if($chronicle_theme_options['service_3_title']) {  ?>
		<strong class="animate chronicle_service_title_3" data-anim-type="fadeInRight" data-anim-delay="400"><?php echo esc_attr($chronicle_theme_options['service_3_title']);?></strong>
        <?php } if($chronicle_theme_options['service_3_text']!='') { ?>
		<p class="chronicle_service_text_3"><?php echo wp_kses(get_theme_mod('service_3_text' , $chronicle_theme_options['service_3_text']),' '); ?></p>
    <?php } ?>
	</div>
    
	
</div>
</div>
<?php } ?>
<!-- end features section15 -->