<?php
/*
	Template Name: Recipe Listing
*/
get_header();
?>


        <!-- ============= CONTENT AREA STARTS HERE ============== -->
        <div id="content" class="clearfix ">
            <div id="left-area" class="clearfix">
			<?php
				$paged		= (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
				$args		= array(
					'post_type'			=> 'post',
					'cat'				=> '-1',
					'posts_per_page'	=> 7,
					'paged'				=> $paged,
				);
				
				$p_data		= new WP_Query($args);
				
				if($p_data->have_posts()):
			
			?>
                <h1 class="listing-title">Recipe Listing</h1>

                <span class="w-pet-border"></span><br />  
            <?php 
				while($p_data->have_posts()): $p_data->the_post();
				
					get_template_part('inc/content', 'recipe_listing');
				
				endwhile;
			?>
			<!-- end of post div -->
			
			<!-- Pagination div -->
			<?php
					require_once('paginate.php');
					if (function_exists(custom_pagination)) {
						custom_pagination($p_data->max_num_pages,"",$paged);
					}
				
				
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