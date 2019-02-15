<div class="clearfix"></div>
<div class="footer1">
	<div class="container">	
		<?php
		if ( is_active_sidebar( 'footer-widget-area' ) )
		{ 
			dynamic_sidebar( 'footer-widget-area' );
		} else 
		{  ?>
		<div class="one_fourth animate" data-anim-type="fadeInUp">
			<div class="siteinfo">			
				<h4 class="lmb"><?php esc_html_e('About Chronicle','chronicle'); ?></h4>				
				<p><?php esc_html_e('All the Lorem Ipsum generators on the Internet tend to repeat predefined an chunks as necessary, making this the first true generator on the Internet.
					All the Lorem Ipsum generators on the Internet tend to repeat predefined Lorem Ipsum as their default model text, and a search for web sites.','chronicle'); ?></p>
				<br />							
			</div>
		</div><!-- end site info -->	
		<div class="one_fourth animate" data-anim-type="fadeInUp">
			<div class="qlinks">		
				<h4 class="lmb"><?php esc_html_e('Custom Menu','chronicle'); ?></h4>			
				<ul>
					<li><a href="#"><?php esc_html_e('Home','chronicle'); ?></a></li>
					<li><a href="#"><?php esc_html_e('Blog','chronicle'); ?></a></li>
					<li><a href="#"><?php esc_html_e('Service','chronicle'); ?></a></li>
					<li><a href="#"><?php esc_html_e('Portfolio','chronicle'); ?></a></li>
					<li><a href="#"><?php esc_html_e('About-us','chronicle'); ?></a></li>
					<li><a href="#"><?php esc_html_e('Team','chronicle'); ?></a></li>
					<li><a href="#"><?php esc_html_e('Contact -Us','chronicle'); ?></a></li>
				</ul>			
			</div>
		</div><!-- end links -->
		
		<div class="one_fourth animate" data-anim-type="fadeInUp">
			<div class="qlinks">		
				<h4 class="lmb"><?php esc_html_e('Recent Posts','chronicle'); ?></h4>			
				<ul>
					<li><a href="#"><?php esc_html_e('Awsome Slidershows','chronicle'); ?></a></li>
					<li><a href="#"><?php esc_html_e('Features and Typography','chronicle'); ?></a></li>
					<li><a href="#"><?php esc_html_e('Different &amp; Unique Pages','chronicle'); ?></a></li>
					<li><a href="#"><?php esc_html_e('Single and Portfolios','chronicle'); ?></a></li>
					<li><a href="#"><?php esc_html_e('Recent Blogs or News','chronicle'); ?></a></li>
					<li><a href="#"><?php esc_html_e('Post with Image','chronicle'); ?></a></li>
					<li><a href="#"><?php esc_html_e('Layered PSD Files','chronicle'); ?></a></li>
				</ul>			
			</div>
		</div><!-- end links -->		
		<?php } ?>		
	</div>
</div><!-- end footer -->
<div class="clearfix"></div>
<div class="copyright_info four">
	<div class="container">
		<?php $chronicle_theme_options = chronicle_get_options(); ?>
		<div class="one_half chronicle_footer_customizations">
		<?php esc_html_e('Proudly powered by ', 'chronicle' ); ?><a href="http://wordpress.org/"><?php esc_html_e('WordPress', 'chronicle'); ?></a><?php 
			if($chronicle_theme_options['footer_customizations']!= '') { echo " "."|"."  ".esc_attr( $chronicle_theme_options['footer_customizations']); } 
			if($chronicle_theme_options['developed_by_text']!='') { echo  "  ". esc_attr($chronicle_theme_options['developed_by_text']); }
			if($chronicle_theme_options['developed_by_chronicle_text']!='') { ?> <a rel="nofollow" href="<?php if($chronicle_theme_options['developed_by_link']!='') { echo  esc_url($chronicle_theme_options['developed_by_link']); } ?>"><?php echo esc_attr($chronicle_theme_options['developed_by_chronicle_text']); ?></a><?php } ?>					
		</div>
		
		<?php
			if($chronicle_theme_options['footer_section_social_media_enbled'] == "on") { ?>
		<div class="one_half last"> 			
			<ul class="footer_social_links three chronicle_social_footer">
			<?php if($chronicle_theme_options['facebook_link']!= '') { ?>
			<li class="animate" data-anim-type="zoomIn"><a href="<?php echo esc_url($chronicle_theme_options['facebook_link']); ?>"><i class="fa fa-facebook"></i></a></li>
			<?php  }  if($chronicle_theme_options['twitter_link']!= '') { ?>
				<li class="animate" data-anim-type="zoomIn"><a href="<?php echo esc_url($chronicle_theme_options['twitter_link']); ?>"><i class="fa fa-twitter"></i></a></li>
			<?php  }  if($chronicle_theme_options['google_plus']!= '') { ?>
				<li class="animate" data-anim-type="zoomIn"><a href="<?php echo esc_url($chronicle_theme_options['google_plus']); ?>"><i class="fa fa-google-plus"></i></a></li>
			<?php  }  if($chronicle_theme_options['linkedin_link']!= '') { ?>
				<li class="animate" data-anim-type="zoomIn"><a href="<?php echo esc_url($chronicle_theme_options['linkedin_link']); ?>"><i class="fa fa-linkedin"></i></a></li>
			<?php  }  if($chronicle_theme_options['flicker_link']!= '') { ?>					
				<li class="animate" data-anim-type="zoomIn"><a href="<?php echo esc_url($chronicle_theme_options['flicker_link']); ?>"><i class="fa fa-flickr"></i></a></li>
			<?php  }  if($chronicle_theme_options['youtube_link']!= '') { ?>				
				<li class="animate" data-anim-type="zoomIn"><a href="<?php echo esc_url($chronicle_theme_options['youtube_link']); ?>"><i class="fa fa-youtube"></i></a></li>
			<?php  }  if($chronicle_theme_options['rss_link']!= '') { ?>
				<li class="animate" data-anim-type="zoomIn"><a href="<?php echo esc_url($chronicle_theme_options['rss_link']); ?>"><i class="fa fa-rss"></i></a></li>
			<?php  }  ?>
			</ul>	
		</div>	
		<?php } ?>
	</div>
</div><!-- end copyright info -->
<a href="#" class="scrollup"><?php esc_html_e('Scroll', 'chronicle'); ?></a><!-- end scroll to top of the page-->	
</div> <!-- end of header wrapper div -->
<?php get_template_part('font'); ?>
<?php wp_footer(); ?>
</body>
</html>