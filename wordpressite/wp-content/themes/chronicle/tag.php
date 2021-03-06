<?php get_header(); ?>
<div class="page_title2">
<div class="container">
    <div class="two_third">    
    	<div class="title">
		<h1><?php /* translators: %s: tag name */
		printf( esc_html__( 'Tag Archives: %s', 'chronicle'),single_tag_title("", false)); ?></h1>
		</div>       
    </div>   
</div>
</div><!-- end page title -->
<div class="clearfix"></div>		
<div class="container">	
	<div class="col-md-9 content_left">	
	<?php 
	if ( have_posts()): 
	while ( have_posts() ): the_post();
	get_template_part('loop'); ?>		
	<?php endwhile; 
	endif; 
	chronicle_navigation(); ?>	
	<div class="clearfix divider_dashed9"></div>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>	