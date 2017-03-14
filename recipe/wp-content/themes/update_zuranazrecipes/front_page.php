<?php
/*
	Template Name: Front Page
*/
	get_header();
?>

        <!-- ============= CONTENT AREA STARTS HERE ============== -->
        <div id="content" class="clearfix homepage"><!-- SLIDER STARTS HERE -->
            <div id="slider" class="slider2">
			
                <!-- Start Most Rated -->

                <div class="top-advertise">
                    <span class="advertise-title">Advertise</span>
                    <div class="item">
						
                    </div>
                </div>
                <!-- End Most Rated -->
                <h2 class="slider-head"> <span><?php echo $zuranaz_recipe['top_title']['1']; ?></span><?php echo $zuranaz_recipe['top_title']['2']; ?></h2>

                <!-- Top recipes statement -->
                <p class="slogan"><?php echo $zuranaz_recipe['slider_slogan']; ?></p>

                <!-- Start of Slides -->
                <div class="slides right-slider">
                    <ul class="cycle-slideshow" data-cycle-fx=scrollHorz data-cycle-timeout=4000 data-cycle-slides="li" data-cycle-pager=".cycle-pager">
					<?php 
						$slider_args	= array(
							'post_type'		=> 'post',
							'cat'			=> $zuranaz_recipe['category-one'],
							'posts_per_page'=> 5,
						);
						
						$slider_data		= new WP_Query($slider_args);
						if($slider_data->have_posts()):
							while($slider_data->have_posts()): $slider_data->the_post();
					?>
                        <li>
							
                        <?php
							if(has_post_thumbnail()){ 
							
								$s_img_id	= get_post_thumbnail_ID();
								$s_img_url	= wp_get_attachment_image_src($s_img_id, 'slider-image', true);
						?>
								<a href="<?php the_permalink(); ?>" class="img-box"><img width="515" height="262" src="<?php echo $s_img_url[0]; ?>" class="attachment-li-slider-thumb wp-post-image" alt=""/></a>
						<?php
							}
						?>
                            <div class="slide-info">
                                <h2>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <p>
                                    <?php
										echo wp_trim_words(get_the_excerpt(), 25, ' ...');
									?>
                                </p>
                                <a href="<?php the_permalink(); ?>"
                                   class="readmore">Read more</a>
                            </div>
                        </li>
					<?php
							endwhile;
						endif;
						wp_reset_postdata();
					?>
                    </ul>
                    <div class="sliderNav">
                        <div class="cycle-pager"></div>
                    </div>
                </div>
                <!-- end of slides -->

            </div>
            <!-- end of Slider div -->
			
			<!-- Home Page Recent Recipe Area -->
            <?php
				get_template_part('inc/front', 'recent_post');
			?>
            <!-- end of whats-hot div -->
			
            <!-- Home Page Whats Hot Recipe Area -->
            
            <!-- end of whats-hot div -->

            <span class="w-pet-border"></span>

            <div id="home-infos" class="clearfix">
                <?php
					get_template_part('inc/content', 'weekly_special');
				?>
                <!-- end of weekly spcial widget -->
                <?php
					get_template_part('inc/content', 'recent_popular_random');
				?>
                <!-- end of fav-recipes widget -->
                <?php
					get_template_part('inc/content', 'custom_post');
				?>
                <!-- end of fav-recipes widget -->
                <div class="ads-642x79">
                    <a href="#"><img src="<?php echo esc_url( get_template_directory_uri()); ?>/images/ad-652x95.png" alt="Recipe Ads"/></a>
                </div>
            </div>
            <!-- end of home-infos div -->

        </div>
        <!-- end of content div -->
        <div class="bot-ads-area">

        </div>
        <!-- CONTENT ENDS HERE -->
    
<?php
	get_footer();
?>
