<?php $chronicle_theme_options = chronicle_get_options();?>
<?php if($chronicle_theme_options['portfolio_home']=='on') { ?>
<div class="fresh_works1">
	<div class="container_full">
		<?php 
		if($chronicle_theme_options['port_heading']!='') { ?>
		<h2 class="text chronicle_port_heading"><?php echo esc_attr($chronicle_theme_options['port_heading']); ?></h2>
		<?php } ?>
		<div id="chronicle_portfolio_section">
			<?php for($i=1;$i<=3;$i++){ 
			if($chronicle_theme_options['port_'.$i.'_img']!=''){?>
			<div class="col-lg-4 col-md-4 col-sm-6 pull-left"> 
				<div class="chronicle-img-wrapper">
					<div class="chronicle_home_portfolio_showcase <?php echo 'chronicle_port_'.esc_attr($i); ?>">
						<img class="chronicle_img_responsive" alt="Chronicle" src="<?php echo esc_url($chronicle_theme_options['port_'.$i.'_img']); ?>">
						<div class="chronicle_home_portfolio_showcase_overlay">
							<div class="chronicle_home_portfolio_showcase_overlay_inner ">
								<div class="chronicle_home_portfolio_showcase_icons">
								<?php if($chronicle_theme_options['port_'.$i.'_link']!=''){ ?>
									<a title="Link" href="<?php echo esc_url($chronicle_theme_options['port_'.$i.'_link']); ?>"><i class="fa fa-link"></i></a>
								<?php } ?>
									<a href="<?php echo esc_url($chronicle_theme_options['port_'.$i.'_img']); ?>"  data-lightbox="image" title="<?php echo esc_attr($chronicle_theme_options['port_'.$i.'_title']); ?>" class="hover_thumb"><i class="fa fa-search-plus"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="chronicle_home_portfolio_caption">
						<h3 class="<?php echo 'chronicle_port_title_'.esc_attr($i); ?>"><?php if($chronicle_theme_options['port_'.$i.'_link']!=''){ ?>
						<a href="<?php echo esc_url($chronicle_theme_options['port_'.$i.'_link']); ?>">
						<?php } echo esc_attr($chronicle_theme_options['port_'.$i.'_title']); 
						if($chronicle_theme_options['port_'.$i.'_link']!=''){ ?></a>
						<?php } ?></h3>
					</div>
				</div>
				<div class="chronicle_portfolio_shadow"></div>
			</div>
			<?php } } ?>
		</div>	
	</div>
</div><!-- end features section 20 -->
<?php } ?>