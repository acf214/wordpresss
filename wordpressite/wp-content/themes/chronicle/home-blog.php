<?php $chronicle_theme_options = chronicle_get_options();?>
<?php if($chronicle_theme_options['blog_home']=='on') { ?>
<div class="section5" id="blog">
<div class="container animate"  data-anim-type="fadeInUp" data-anim-delay="400">
	<?php
		if($chronicle_theme_options['blog_heading'] !='') { echo "<h2 class='text chronicle_blog_heading'>".esc_attr($chronicle_theme_options['blog_heading']). "</h2>"; } ?>
	<?php if ( have_posts()) {
		$i=1;
		if($chronicle_theme_options['blog_category']) {
			$category = $chronicle_theme_options['blog_category'];
			$args = array( 'post_type' => 'post','posts_per_page' =>3, 'post__not_in' => get_option( 'sticky_posts' ), 'cat' => $category);		
		} else {
		$args = array( 'post_type' => 'post','posts_per_page'=>3, 'post__not_in' => get_option( 'sticky_posts' )); }
		$post_type_data = new WP_Query( $args );
		while($post_type_data->have_posts()):
		$post_type_data->the_post(); ?>		
	<div class="one_third <?php if($i==3) { echo "last"; } ?>"> 
		<?php if(has_post_thumbnail()): 						
				$class=array('class'=>'wres chronicle_img_responsive '); 
				the_post_thumbnail('chronicle_home_post_thumb', $class); 
			endif; ?>
        <div class="cont">
			<h4 id="blog_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>		
			<p><?php echo esc_attr(substr(get_the_excerpt(),0,$chronicle_theme_options['excerpt_blog'] )); ?></p><br />
			<?php if($chronicle_theme_options['blog_datas'] =='on') {?>
			<a href="<?php echo esc_url(get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d'))); ?>"><i class="fa fa-file-text"></i> <?php echo get_the_date('m, D Y'); ?></a> &nbsp; 
			<a href="<?php comments_link(); ?> "><i class="fa fa-comment"></i><?php comments_number( 'No Comments', 'one comments', '% comments' ); ?></a>
			<?php } ?>
        </div>	
    </div><!-- end section -->
	<?php  $i++; endwhile; } ?>
</div>
</div><!-- end bolg section -->
<?php } ?>