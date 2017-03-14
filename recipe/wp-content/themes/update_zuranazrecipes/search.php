<?php
/*
	Template Name: Custom Search
*/
get_header();
?>
<style type="text/css">
	#left-area .news_event{
        background:url(<?php echo esc_url(get_template_directory_uri()); ?>/images/pet-border.png) bottom repeat-x;
		padding: 0 0 20px;
		overflow: hidden;
		margin: 0 0 35px;
	}
</style>

        <!-- ============= CONTENT AREA STARTS HERE ============== -->
        <div id="content" class="clearfix ">
            <div id="left-area" class="clearfix">
			<?php
				//$paged		= (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
				/* $args		= array(
					'post_type'			=> 'post',
					'cat'				=> '-1',
					'posts_per_page'	=> 5,
					'paged'				=> $paged,
				); */
				
				//$p_data		= new WP_Query($args);
				
				//if($p_data->have_posts()):
				if(have_posts()):
			
			?>
                <h1 class="listing-title"><?php printf( __( 'Search Results for: %s', 'Zurecipe' ), get_search_query() ); ?></h1>

                <!--<form class="sorting-form" method="get" action="#">
                    <label for="recipe-sorting">Sort:- </label>
                    <select id="recipe-sorting" name="recipe-sort">
                        <option  value="date">Mose Recent</option>
                        <option  value="rand">Rand</option>
                        <option  value="comment_count">Comment Count</option>
                        <option  value="title">Title</option>
                        <option  value="rating_average">High Rated</option>
                        <option  value="rating_counter">Most Rated</option>
                        <option  value="views">Most Views</option>
                    </select>
                </form>-->

                <span class="w-pet-border"></span><br />  
            <?php 
				//while($p_data->have_posts()): $p_data->the_post();
				while(have_posts()): the_post();
				
					get_template_part('inc/content', 'search');
				
				endwhile;
			?>
			<!-- end of post div -->
			
			<!-- Pagination div -->
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
                    <?php
						wp_list_categories_for_post_type('post', 'title_li=');
					?>
                </div><!-- end of fav-recipes widget --></div>
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