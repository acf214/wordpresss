<?php get_header(); ?>
<div class="clearfix"></div>
<?php get_template_part('chronicle','breadcrumbs'); ?>
<div class="container">
	<div class="content_fullwidth">
	<div class="error_pagenotfound">    	
        <strong><?php esc_html_e('404','chronicle');?></strong>
        <br />
    	<b><?php esc_html_e('Oops... Page Not Found!', 'chronicle');?></b>
        
        <em><?php esc_html_e('Sorry the Page Could not be Found here.','chronicle');?></em>

        <p><?php esc_html_e('Try using the button below to go to main page of the site','chronicle');?></p>
        
        <div class="clearfix margin_top3"></div>
    	
        <a href="<?php echo esc_url(home_url( '/' )); ?>" class="but_goback"><i class="fa fa-arrow-circle-left fa-lg"></i>&nbsp; <?php esc_html_e('Go to Back','chronicle');?></a>
        
    </div><!-- end error page notfound -->        
	</div>
</div><!-- end content area -->
<?php get_footer();?>