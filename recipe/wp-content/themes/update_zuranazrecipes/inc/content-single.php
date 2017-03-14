<?php

global $zuranaz_recipe;
?>

<article id="post-<?php the_ID(); ?>">
		<!-- Starting Default Loop -->

		<h1 class="title fn" itemprop="name" ><?php the_title(); ?></h1>
		<!-- for Schema.org microdata -->
		<!--<span class="published">2013-02-06</span>-->

		<!-- Recipe Categorization Information -->
		<ul class="recipe-cat-info clearfix">
			<li>
				<span itemscope="recipeCuisine">By: 
				<?php
				$total_comment 	= wp_count_comments($post->ID);
				$show_cmnt		= $total_comment->approved ;
				
					echo '<a href="#" rel="tag">';
					the_author();
					echo '</a>';
				?>	
				</span>
			</li>
			<li>
				<span>|</span>
				<?php
					echo '<a href="#" rel="tag">'.$show_cmnt.' Comment</a>';
				?>
			</li>
			<li itemscope="typicalAgeRange"> 
				<span>| </span> On:
				<?php
					the_time('F j Y');
				?>
			</li>
		</ul>

		<div class="single-imgs">

			<div class="single-img-box">
				<div class="recipe-single-img">
					<?php
						if(has_post_thumbnail()){
						
						$ps_img_id		= get_post_thumbnail_id();
						$ps_img_url		= wp_get_attachment_image_src($ps_img_id, 'recipe-blog-single', true);
					?>
						<a data-rel="none" title="<?php the_title(); ?>">
							<img width="575" height="262" src="<?php echo $ps_img_url[0]; ?>" class="photo" alt="" itemprop="image" />
						</a>
					<?php
						}
						
					?>
				</div>
			</div>
			
			<div id="horiz_container_outer" class="small-img-cont">
				<div class="ads-253x209">
					<a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sidebar-ad.png" alt="Recipe Ads" /></a>	
				</div>
			</div>
		</div>


		<!-- Recipe Information -->
		<span class="w-pet-border"></span>

		<div class="info-left instructions" itemprop="about">

			<div itemprop="description">
				<div class="recipe-content">
					<h3 class="blue">Description</h3>
					<p><?php the_content(); ?></p>
				</div>
			</div>

			<div class="recipe-tags clearfix">
				<span class="type" itemprop="recipeCategory"> Recipe Type: 
				<?php 
					$category	= get_the_category($post->ID);
					foreach($category as $cate){
						if(($cate->cat_ID == $zuranaz_recipe['category-one']) || ($cate->cat_ID == 1)){
				?>
							<a href="#" rel="tag"></a>
					<?php
						}else{
					?>
							<a href="<?php echo get_category_link($cate->cat_ID); ?>" rel="tag"><?php echo $cate->name; ?>, </a>
				<?php
						}
					}
				?>
					
				</span>
				<span class="tags">Tags:
				<?php
					$post_tag	= get_the_tags($post->ID);
					//print_r($post_tag);
					if($post_tag){
						foreach($post_tag as $ptag){
						
				?>
						<a href="#" rel="tag"><?php echo $ptag->name; ?>,</a> 
				<?php
						}
					}else{
						echo '<a href="#" rel="tag">None of tags for recipe!</a>';
					}
				?>
				</span>
				<!-- Share Icons -->
				<div class="single-post-share">
					<h5>Share This Post!</h5>
					<?php 
						echo do_shortcode('[addtoany]');
					?>
				</div>
			</div>

			<span class="w-pet-border"></span>

			<div class="comments">

				<!-- You can start editing here. -->
				<!-- If comments are open, but there are no comments. -->
				<?php
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				?>
				
			</div><!-- end of comments div -->

		</div><!-- end of info-left div -->
</article>