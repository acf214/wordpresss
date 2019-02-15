<!-- Swiper -->
<?php $chronicle_theme_options = chronicle_get_options();?>
<div class="swiper-container swiper-container-slider2">
  <div class="swiper-wrapper">
  	<?php for($i=1; $i<=3; $i++){ ?>
	<?php if($chronicle_theme_options['slide_image_'.$i]!='') { ?>
    <div class="swiper-slide">
    <img src="<?php echo esc_url($chronicle_theme_options['slide_image_'.$i]); ?>"/>
    <div class="container">
        <div class="carousel-caption">
          <?php if($chronicle_theme_options['slide_title_'.$i]!='') {  ?>
          <div class="carousel-text">
		  <a href="<?php if($chronicle_theme_options['slide_link_'.$i]!='') { echo esc_url($chronicle_theme_options['slide_link_'.$i]); } ?>">
            <h1 class="animated animation animated-item-2 head_<?php echo esc_attr($i) ?>"><?php echo esc_attr($chronicle_theme_options['slide_title_'.$i]); ?></h1>     
			</a>
            <?php if($chronicle_theme_options['slide_desc_'.$i]!='') {  ?>
            <ul class="list-unstyled carousel-list">
              <li class="animated animation animated-item-3 desc_<?php echo esc_attr($i) ?>"><?php echo wp_kses(get_theme_mod('slide_desc_'.$i , $chronicle_theme_options['slide_desc_'.$i]),' '); ?></li>
            </ul>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php } } ?>
  </div>
  <!-- Add Pagination -->
 	<div class="swiper-pagination swiper"></div>
    <div class="swiper-button-next swiper swiper-button-next-cont swiper-button-white"></div>
    <div class="swiper-button-prev swiper swiper-button-prev-cont swiper-button-white"></div>
</div>
<!-- Swiper -->

<script type="text/javascript">
var mySwiper = new Swiper ('.swiper-container', {
  pagination: '.swiper-pagination',
  paginationClickable: true,

  nextButton: '.swiper-button-next',
  prevButton: '.swiper-button-prev',

  // AutoPlay
  <?php if($chronicle_theme_options['slider_speed']!='') { ?>
  autoplay: <?php echo esc_attr($chronicle_theme_options['slider_speed']); ?>,
  <?php } else { ?>
  autoplay: 2500,
  <?php } ?>
  // Loop
  loop: true, 
  loopAdditionalSlides: 2,
  loopedSlides: 2,

  // Position
  slidesPerView: 'auto', //If "auto" or slidesPerView > 1, enable watchSlidesVisibility for lazy load

  // Keyboard and Mousewheel
  keyboardControl: true,
  mousewheelControl: true,
  mousewheelForceToAxis: true, // just use the horizontal axis to 

  // Lazy Loading 
  watchSlidesVisibility: true,
  preloadImages: false,
  lazyLoading: true,
})
</script>
