<?php
	get_header();
?>
<style type="text/css">

#sidebar #recipe_types-2 .archives ul{
	padding-left: 15px;
	list-style: disc;
}

.textwidget label.screen-reader-text{
	display: none;
}

#sidebar .widget h2{
	color: #0053a6;
}

#sidebar .custom-archive{
	margin-bottom: 20px;
}

#sidebar .custom-archive h2{
	color: #0053a6;
}
	
</style>

        <!-- ============= CONTENT AREA STARTS HERE ============== -->
        <div id="content" class="clearfix ">
            <div id="left-area" class="clearfix">

            <?php
				if(have_posts()):
				
				while(have_posts()): the_post();
				topViewPost(get_the_ID());
				get_template_part('inc/content', 'single_news_event');
			?>

                <div class="comments">

                    <!-- You can start editing here. -->
				<?php
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				?>

                </div>
                <!-- end of comments div -->
			<?php
				endwhile;
				endif;
			?>
            </div><!-- end of left-area -->
            <!-- LEFT AREA ENDS HERE -->
			
            <!-- ========== START OF SIDEBAR AREA ========== -->
            <div id="sidebar">
                <?php
					get_template_part('inc/content', 'recent_popular_random');
				?>
                <div id="recipes-from-recipe-type-2" class="widget nostylewt Recipes_from_Recipe_Type clearfix">
                    <div class="recipes-slider-widget rt">
                        <h2 class="w-bot-border"><span>Related</span> Posts</h2>
						<?php
							$p_id 	= get_the_ID();
							$cats	= get_the_category($p_id);
							
							$rl_args	= array(
								'cat'				=> $cats[0]->cat_ID,
								'posts_per_page'	=> 10,
								'order'				=> 'DESC',
							);
							
							$rl_data	= query_posts($rl_args);
							if(have_posts()):
						?>
                        <ul class="cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-timeout="0" data-cycle-slides="li" data-cycle-next=".nrecipes-from-recipe-type-2" data-cycle-prev=".precipes-from-recipe-type-2">
						<?php 
							while(have_posts()): the_post();
						?>
                            <li class="cycle-slide cycle-sentinel">
                                <?php
									if(has_post_thumbnail()){
										$rl_img_id		= get_post_thumbnail_id();
										$rl_img_url		= wp_get_attachment_image_src($rl_img_id, '', true);
								?>
										<a href="<?php the_permalink(); ?>">
											<img src="<?php echo $rl_img_url[0]; ?>" class="attachment-recipe-slider-widget wp-post-image" alt="">                       
										</a>
								<?php
									}
								?>
                                <p class="info-box"><?php the_title(); ?></p>
                            </li>
							<?php
								endwhile;
								wp_reset_query();
							?>
                        </ul>
                        <span class="prev precipes-from-recipe-type-2 cycle-prev"></span>
                        <span class="next nrecipes-from-recipe-type-2 cycle-next"></span>
						<?php
							endif;
						?>
                    </div>
                </div>
                <?php
					get_template_part('inc/content', 'weekly_special');
					
					get_template_part('inc/content', 'custom_post');
				?>
                
                <div id="recipe_types-2" class="widget nostylewt Recipe_Types_Widget clearfix">
                    <h2 class="w-bot-border bmarginless"><span>Categories</h2>

                    <div class="archives clearfix">
						<ul>
							<?php
								wp_list_categories_for_post_type('news_event', 'title_li=');
							?>
						</ul>
                    </div>
                    <!-- end of fav-recipes widget -->
                </div>
				
				<div class="custom-archive">
					<h2 class="w-bot-border"><span>Archives</span> News</h2>
					<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
						<option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
						<?php
							wp_get_archives_cpt(); 
						?>
					</select>
					
				</div>
                <?php
					get_template_part('inc/content', 'recent_post');
					
					dynamic_sidebar('custom_single_widget');
				?>
				
            </div><!-- end of sidebar -->

        </div><!-- end of content div -->
        <div class="bot-ads-area">
            <div class="ads-642x79">
                <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/ad-652x95.png" alt="Recipe Ads" /></a>
            </div>
        </div>
        <!-- CONTENT ENDS HERE -->
<?php
	get_footer();
?>