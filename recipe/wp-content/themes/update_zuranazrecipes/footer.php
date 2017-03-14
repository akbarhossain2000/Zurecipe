<?php
global $zuranaz_recipe;
?>
</div>
    <!-- end of container div -->
</div>
<div class="w-pet-border"></div>
<!-- ============= CONTAINER AREA ENDS HERE ============== -->

<!-- ============= BOTTOM AREA STARTS HERE ============== -->
<div id="bottom-wrap">
    <ul id="bottom" class="clearfix">

        <li class="about">
            <a href="<?php bloginfo('home'); ?>"><img  src="<?php echo $zuranaz_recipe['footer_logo']['url']; ?>" alt="Food Recipes" class="footer-logo"/></a>
			<?php
				$ab_args 	= array(
					'post_type' => 'page',
					'page_id'	=> $zuranaz_recipe['ab_content'],
				);
				
				$ab_data	= query_posts($ab_args);
				
				if(have_posts()):
				while(have_posts()): the_post();
			?>
            <p><?php echo wp_trim_words(get_the_content(), 20, '. ...'); ?></p>
            <a href="<?php the_permalink(); ?>" class="readmore"><?php echo $zuranaz_recipe['read_more']; ?></a>
			<?php
				endwhile;
				endif;
			?>
        </li>

        <li id="recent_recipe_footer_widget-3" class="Recent_Recipe_Footer_Widget">
            <h2 class="w-bot-border"> <span>Recent</span> Recipes</h2>
            <ul class="recent-posts nostylewt">
			<?php 
				$rr_args	= array(
					'post_type'		=> 'post',
					'cat'			=> '-1',
					'posts_per_page'=> 2,
				);
					
				$rr_data	= query_posts($rr_args);
				if(have_posts()):
				while(have_posts()): the_post();
			?>
                <li class="clearfix">
				<?php 
					if(has_post_thumbnail()){
					
					$rr_img_id	= get_post_thumbnail_id();
					$rr_img_url = wp_get_attachment_image_src($rr_img_id, 'rprm-image', true);
				?>
                    <a href="<?php the_permalink(); ?>" class="img-box">
                        <img src="<?php echo $rr_img_url[0]; ?>" class="attachment-most-rated-thumb wp-post-image" alt=""/>
                    </a>
				<?php
					}
				?>
                    <h5> <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 5, '...'); ?></a></h5>
                    <p><?php echo wp_trim_words(get_the_content(), 10, '...'); ?></p>
                </li>
			<?php
				endwhile;
				wp_reset_query();
				endif;
			?>
            </ul>
        </li>
        <li id="displaytweetswidget-3" class="widget_displaytweetswidget">
            <h2>Important Link</h2>
			<?php
				if(function_exists('wp_nav_menu')){
					wp_nav_menu(array(
						'theme_location'	=> 'theme_footer_menu',
						
					));
				}
			?>
        </li>

    </ul>
    <!-- end of bottom div -->
</div>
<!-- end of bottom-wrap div -->
<!-- ============= BOTTOM AREA ENDS HERE ============== -->


<!-- ============= FOOTER STARTS HERE ============== -->

<div id="footer-wrap">
    <div id="footer">
        <p class="copyright"><?php echo $zuranaz_recipe['copy_right']; ?></p>
        <p class="dnd">Developed by <a href="http://deelko.com" target="_blank">Deelko</a></p>
    </div>
    <!-- end of footer div -->
</div>
<!-- end of footer-wrapper div -->

<!-- ============= FOOTER STARTS HERE ============== -->
<script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri()); ?>/js/jquery90f9.js?ver=1.11.1'></script>
<script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri()); ?>/js/jquery-migrate.min1576.js?ver=1.2.1'></script>
<script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri()); ?>/js/jquery.validate.min90f9.js?ver=1.11.1'></script>
<script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri()); ?>/js/jquery.form.min2ee2.js?ver=3.48.0'></script>
<script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri()); ?>/js/jquery.easing.1.34e44.js?ver=1.3'></script>
<script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri()); ?>/js/prettyPhoto/js/jquery.prettyPhoto583f.js?ver=3.1.3'></script>
<script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri()); ?>/js/jquery.cycle220ce.js?ver=2.0130909'></script>
<script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri()); ?>/js/nivo-slider/jquery.nivo.slider653d.js?ver=2.7.1'></script>
<script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri()); ?>/js/accordion-slider5152.js?ver=1.0'></script>
<script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri()); ?>/js/jquery-ui.min3e5a.js?ver=1.10.2'></script>
<script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri()); ?>/js/select2.full.minf9b8.js?ver=4.0'></script>
<script type='text/javascript' src='<?php echo esc_url( get_template_directory_uri()); ?>/js/script5152.js?ver=1.0'></script>
	<?php
		wp_footer();
	?>
</body>

<!-- Mirrored from inspirythemes.biz/html-templates/foodrecipes-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Dec 2016 05:52:24 GMT -->
</html>