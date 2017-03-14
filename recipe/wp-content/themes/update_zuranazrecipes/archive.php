<?php
/*
Template Name: Archives
*/

get_header();

?>
<style type="text/css">
#sidebar #recipe_types-2 .archives ul{
	padding-left: 15px;
	list-style: disc;
	margin-bottom: 20px;
}
#left-area .news_event{
	padding: 0 0 20px;
	overflow: hidden;
	margin: 0 0 35px;
	background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/pet-border.png) bottom repeat-x;
}
</style>

        <!-- ============= CONTENT AREA STARTS HERE ============== -->
        <div id="content" class="clearfix ">
            <div id="left-area" class="clearfix">
			<?php
				 
				/* $paged		= (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
				$args		= array(
					'post_type'			=> 'post',
					'cat'				=> '-1',
					'posts_per_page'	=> 7,
					'paged'				=> $paged,
				); */
				
				/*$p_data		= new WP_Query($args); */
				
				//$p_data = query_posts($args);
				
				if(have_posts()):
			
			?>
                <h1 class="listing-title"><?php single_month_title(' '); ?></h1>

                <span class="w-pet-border"></span><br /> 
				
            <?php 
				while(have_posts()): the_post();
			?>	
				
			<?php
					get_template_part('inc/content', 'recipe_listing');
				
				endwhile;
			?>
			<!-- end of post div -->
			
			<!-- Pagination div -->
			
			<div id='pagination'>
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
					/* require_once('paginate.php');
					if (function_exists(custom_pagination)) {
						custom_pagination($p_data->max_num_pages,"",$paged);
					} */
				
				
				endif;
				wp_reset_postdata();
			?><!-- End Pagination -->
            </div>
            <!-- end of left-area -->
            <!-- LEFT AREA ENDS HERE -->

            <div id="sidebar">
                <?php
					get_template_part('inc/content', 'recent_popular_random');
				?>
                
                <?php
					get_template_part('inc/content', 'custom_post');
				?>
                <div id="recipe_types-2" class="widget nostylewt Recipe_Types_Widget clearfix"><h2 class="w-bot-border bmarginless"><span>Recipe</span> Types</h2><div class="archives clearfix">
                    <ul>
						<?php
							wp_list_categories_for_post_type('post', 'title_li=');
						?>
					</ul>
                </div><!-- end of fav-recipes widget --></div>
				
				<div class="widget">
					<h2 class="w-bot-border"><span>Archives</span> Recipe</h2>
					<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
						<option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
						<?php
							$args = array(
								'post_type'		=> 'post',
								'formate'		=> 'option',
							);
							wp_get_archives_cpt($args); 
						?>
					</select>
					
				</div>
				<?php
					dynamic_sidebar('custom_single_widget');
				?>
            </div>

        </div><!-- end of content div -->
        <div class="bot-ads-area">
            <div class="ads-642x79">
                <a href="#">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/ad-652x95.png" alt="Recipe Ads" />
                </a>
            </div>
        </div>
        <!-- CONTENT ENDS HERE -->

<?php
	get_footer();
?>