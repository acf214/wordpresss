<div class="site-search-area">        
    	<form method="post" id="site-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div>
        <input class="input-text" name="s" id="s" value="<?php esc_html_e( 'Enter Search Blog...','chronicle');?>" onFocus=" if (this.value == <?php esc_html_e('Enter Search Blog...','chronicle');?>)  {this.value = '';}" onBlur="if (this.value == '') {this.value = <?php esc_html_e('Enter Search Blog...','chronicle') ;?>}" type="text" />
        <input id="searchsubmit" value="<?php esc_html_e( 'Search','chronicle');?>" type="submit" />
        </div>        
        </form>
</div><!-- end site search -->