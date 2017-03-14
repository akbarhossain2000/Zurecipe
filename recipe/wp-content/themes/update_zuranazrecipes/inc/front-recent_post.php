<?php

?>

<!-- Home Page Recent Recipe Area -->
	<div id="whats-hot">
		<h2 class="w-bot-border">Recent <span>Recipe</span></h2>
		<?php
			$paged		= (get_query_var('page')) ? absint(get_query_var('page')) : 1;
			$fh_args	= array(
				'post_type'		=> 'post',
				'posts_per_page'=> 8,
				'paged'			=> $paged,
			);
			$fh_data	= new WP_Query($fh_args);
			if($fh_data->have_posts()):
		?>
		<ul class="cat-list clearfix">
		<?php
			while($fh_data->have_posts()): $fh_data->the_post();
			
			//$id		= get_the_ID();
			//$category	= get_the_category($id);
			//$cat_id		= $category[0]->cat_ID;
		?>
			<li>
				<!-- <h3><a href="<?php //echo get_category_link($cat_id); ?>"><?php //echo get_the_category_by_id($cat_id); ?></a></h3> -->
				<?php
					if(has_post_thumbnail()){
					$fh_img_id	= get_post_thumbnail_ID();
					$fh_img_url = wp_get_attachment_image_src($fh_img_id, 'home-recent-recipe', true);
				?>
					<a href="<?php the_permalink(); ?>" class="img-box">
						<img src="<?php echo $fh_img_url[0]; ?>" class="attachment-recipe-4column-thumb wp-post-image" alt=""/>
					</a>
				<?php
					}
				?>
				<h4>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h4>
				<p> <?php echo wp_trim_words(get_the_excerpt(), 15, true); ?> <a  href="<?php the_permalink(); ?>">...more </a> </p>
			</li>
		<?php
			endwhile;
		?>
			
		</ul>
		<!-- Pagination div -->
		<?php
			require_once(__DIR__.'/../paginate.php');
			if (function_exists(custom_pagination)) {
				custom_pagination($fh_data->max_num_pages,"",$paged);
			}
			
			endif;
			wp_reset_postdata();
		?><!-- End Pagination -->
	
	</div>
<!-- end of whats-hot div -->