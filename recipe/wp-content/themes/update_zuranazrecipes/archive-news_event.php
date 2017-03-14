<?php
/*
	Template Name: News Event Archives
*/
	get_header();
	global $zuranaz_recipe;
?>

<style type="text/css">
	#sidebar #categories-2 ul{
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
				<h1 class="listing-title"><?php single_month_title(' '); ?></h1>

                <span class="w-pet-border"></span><br /> 
                <?php
					/* $paged		= (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
					$bargs		= array(
						'post_type'		=> 'news_event',
						'posts_per_page'=> 7,
						'paged'			=> $paged,
					); */
					
					//$bdata		= new WP_Query($bargs);
					//$bdata		= query_posts($bargs);
					if(have_posts()):
					while(have_posts()): the_post();
					//if($bdata->have_posts()):
					
					//while($bdata->have_posts()): $bdata->the_post();
					
					get_template_part('inc/content', 'blog');
				?>
				
				
				<?php 
					endwhile;
				?>
                <!-- end of post div -->
                <div id="pagination">
					<?php 
						the_posts_pagination(array(
							'mid_size'          => 2,
							'prev_text' 		=> 'Prev',
							'next_text'			=> 'Next',
							'screen_reader_text'=> ' ',
						));
						
					?>
                </div>
				<?php
					endif;
					wp_reset_query();
				?>
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
				<div id="categories-2" class="widget nostylewt widget_categories clearfix">
                    <h2 class="w-bot-border"> <span>Categories</span></h2>
					<ul>
						<?php
							wp_list_categories_for_post_type('news_event', 'title_li=');
						?>
					</ul>
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
				?>
                
                <div id="recent-comments-2" class="widget nostylewt widget_recent_comments clearfix">
                    <h2 class="w-bot-border"><span>Recent</span> Comments</h2>
                    <ul id="recentcomments">
					<?php
						bpost_recent_comments();
					?>
                    </ul>
                </div>
				<?php
					dynamic_sidebar('custom_single_widget');
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
