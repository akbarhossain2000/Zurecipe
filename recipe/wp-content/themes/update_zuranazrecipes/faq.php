<?php
/*
	Template Name: FAQ
*/
get_header();
?>


        <!-- ============= CONTENT AREA STARTS HERE ============== -->
        <div id="content" class="clearfix ">
            <div id="left-area" class="clearfix">

                <div class="post-84 page type-page status-publish hentry" id="page-84">
                    <h1 class="post-title">FAQ</h1>

                    <p class="meta"><span class="comments">
                        <a href="#" title="Comment on FAQ">0 Comments</a></span>
                        <span>|</span> <span> March 6, 2012</span></p>
                    <ul class="faq-list">
					<?php 
						$f_args		= array(
							'post_type'		=> 'faq_post',
							'posts_per_page'=> -1,
						);
						
						$f_data		= new WP_Query($f_args);
						
						if($f_data->have_posts()):
						while($f_data->have_posts()): $f_data->the_post();
					?>
                        <li><span class="number"></span>

                            <h3><?php the_title(); ?></h3>

                            <p><?php the_content(); ?></p>
                        </li>
					<?php 
						endwhile;
						endif;
						wp_reset_postdata();
					?>
                    </ul>
                </div>
                <!-- end of post div -->
            </div>
            <!-- end of left-area -->
            <!-- LEFT AREA ENDS HERE -->

            <!-- ========== START OF SIDEBAR AREA ========== -->
            <div id="sidebar">
                <?php
					get_template_part('inc/content', 'recent_popular_random');
				?>
				
                <?php
					get_template_part('inc/content', 'weekly_special');
				?>
				
				<?php
					get_template_part('inc/content', 'custom_post');
				?>
            </div>
            <!-- end of sidebar -->
        </div>
        <!-- end of content div -->
        <div class="bot-ads-area">
            <div class="ads-642x79">
                <a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/ad-652x95.png" alt="Recipe Ads"/></a>
            </div>
        </div>
        <!-- CONTENT ENDS HERE -->

<?php
get_footer();
?>