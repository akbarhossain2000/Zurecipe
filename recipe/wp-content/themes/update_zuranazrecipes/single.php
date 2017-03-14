<?php
	get_header();
?>
<style type="text/css">
	
.sidebar #text-2{
	margin-bottom: 30px;
}
.sidebar #recipe_types-2 .archives ul{
	padding-left: 15px;
	list-style: disc;
	margin-bottom: 20px;
}

.textwidget label.screen-reader-text{
	display: none;
}

#left-area .sidebar h2{
	color: #0053a6;
}
	
</style>

        <!-- ============= CONTENT AREA STARTS HERE ============== -->
        <div id="content" class="clearfix ">
            <div id="left-area" class="clearfix full-wide" itemscope itemtype="">
                <!-- Starting Default Loop -->
				<?php
					if(have_posts()):
					
					while(have_posts()): the_post();
					
					topViewPost(get_the_ID());
					
					get_template_part('inc/content', 'single');
					
					endwhile;
					
					endif;
					$aimg = get_avatar($post->post_autor, 82);
				?>

                <div class="info-right">

                    <!-- Cook Info -->
                    <div class="cookname" itemprop="author" itemscope itemtype="">
                        <div class="img-box">
                            <a itemprop="url" class="imgc" href="#">
								<?php echo $aimg; ?>
                                <!--<img class="auth-photo" src="<?php //echo $aimg; ?>" />-->
                            </a>
                            <div class="share">
                            </div>
                        </div>
                        <div class="cook-info author vcard">
                            <h5 itemprop="name" class="fn given-name url"><a href="#" title="Posts by admin" rel="author"><?php echo get_the_author($post->ID); ?></a></h5>
                            <p itemprop="description" ></p>
                            <a itemprop="url" class="url" href="#"></a>
                        </div>

                    </div><!-- end of cookname div -->
                    
                    <!-- Including More Recipres part -->

                    <div class="more-recipe">
                        <h5>Related Recipes:</h5>
                        <div class="recipe-imgs">
						<?php 
							$p_id		= get_the_ID();
							$cats		= get_the_category($p_id);
							
							$prl_args	= array(
								'cat'			=> $cats[0]->cat_ID,
								'posts_per_page'=> 10,
								'order'			=> 'DESC',
							);
							
							$prl_data		= new WP_Query($prl_args);
							
							if($prl_data->have_posts()):
						?>
                            <div class="more-recipes">
                                <ul class="cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-timeout="0" data-cycle-slides="li" data-cycle-prev=".p-17" data-cycle-next=".n-17" style="overflow: hidden;">
								<?php 
									while($prl_data->have_posts()): $prl_data->the_post();
								?>
                                    <li class="cycle-slide cycle-sentinel">
                                    <?php
										if(has_post_thumbnail()){
										$prl_img_id		= get_post_thumbnail_id();
										$prl_img_url	= wp_get_attachment_image_src($prl_img_id, '', true);
									?>
										<a href="<?php the_permalink(); ?>">
                                            <img width="222" height="144" src="<?php echo $prl_img_url[0]; ?>" alt="">
                                        </a>
									<?php
										}
									?>
                                        <p class="info-box"><?php the_title(); ?></p>
                                    </li>
								<?php
									endwhile;
									wp_reset_postdata();
								?>
                                </ul>
                            </div>
                            <span class="prev p-17"></span>
                            <span class="next n-17"></span>
                        </div><!-- end of recipe-imgs div -->
						<?php
							endif;
						?>
                    </div>
					
					<!-- Sidebar area -->
                    <div class="sidebar">
						<div id="recipe_types-2" class="widget nostylewt Recipe_Types_Widget clearfix"><h2 class="w-bot-border bmarginless"><span>Recipe</span> Types</h2><div class="archives clearfix">
							<ul>
								<?php
									wp_list_categories_for_post_type('post', 'title_li=');
								?>
							</ul>
						</div><!-- end of fav-recipes widget --></div>
						<?php
							dynamic_sidebar('single_widget');
						?>
					</div><!-- end of sidebar -->

                    <span class="w-pet-border"></span><br />
					<div class="ads-253x209">
						<a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sidebar-ad.png" alt="Recipe Ads" /></a>	
					</div>
                </div><!-- end of info-right div -->


                <span class="w-pet-border"></span>

            </div><!-- end of left-area -->
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