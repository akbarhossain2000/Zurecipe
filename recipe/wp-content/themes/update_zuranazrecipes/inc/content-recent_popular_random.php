<?php

?>
<div class="widget fav-recipes nostylewt">
	<h2 class="w-bot-border"><span>MISC</span> Recipes</h2>

	<div class="tabed">
		<ul class="tabs clearfix">
			<li class="current">Recent<span></span></li>
			<li>Popular<span></span></li>
			<li>Random<span></span></li>
		</ul>
		<div class="block current">
			<ul class="highest">
			<?php
				$r_args		= array(
					'post_type'		=> 'post',
					'cat'			=> '-1',
					'posts_per_page'=> 4,
				);
				
				$r_data = query_posts($r_args);
				//print_r($r_data);
				if(have_posts()):
				
				while(have_posts()): the_post();
			?>
				<li>
				<?php
					if(has_post_thumbnail()){
					
					$r_img_id		= get_post_thumbnail_ID();
					$r_img_url		= wp_get_attachment_image_src($r_img_id, 'rprm-image', true);
				?>
					<a href="<?php the_permalink(); ?>" class="img-box">
						<img src="<?php echo $r_img_url[0]; ?>" class="attachment-sidebar-tabs wp-post-image" alt=""/>
					</a>
				<?php
					}
				?>
					<h5> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

					<?php //if(function_exists('the_ratings')) { the_ratings(); } ?>
				</li>
			<?php
				endwhile;
				wp_reset_query();
				endif;
				
			?>
			</ul>
		</div>
		<!-- end of block div -->
		<div class="block">
			<ul class="highest">
			<?php 
				$popargs	= array(
					'meta_key'	=> 'wpb_post_views_count',
					'orderby'	=> 'meta_value_num',
					'order'		=> 'DESC',
					'posts_per_page'=> 4
				);
				
				query_posts($popargs);
				if(have_posts()):
				while(have_posts()): the_post();
				
				$popimg_id		= get_post_thumbnail_id();
				$popimg_url		= wp_get_attachment_image_src($popimg_id, 'rprm-image', true);
				
			?>
				<li>
					<a href="<?php the_permalink(); ?>" class="img-box">
						<img src="<?php echo $popimg_url[0]; ?>" class="attachment-sidebar-tabs wp-post-image" alt="Goat-Cheese-Chorizo-Rolls2"/>
					</a>
					<h5> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

					<?php //if(function_exists('the_ratings')) { the_ratings(); } ?>
				</li>
			<?php
				endwhile;
				endif;
				wp_reset_query();
			?>
			</ul>
		</div>
		<!-- end of block div -->
		<div class="block">
			<ul class="highest">
			<?php
				$random_args	= array(
					'post_type'		=> 'post',
					'cat'			=> '-1',
					'posts_per_page'=> 4,
					'orderby'		=> 'rand',
				);
				
				$random_data	= query_posts($random_args);
				
				if(have_posts()):
				while(have_posts()): the_post();
			?>
				<li>
					<?php
						if(has_post_thumbnail){
						$random_img_id	= get_post_thumbnail_ID();
						$random_img_url	= wp_get_attachment_image_src($random_img_id, 'rprm-image', true);
					?>
						<a href="<?php the_permalink(); ?>"  class="img-box"><img src="<?php echo $random_img_url[0]; ?>" class="attachment-sidebar-tabs wp-post-image" alt="<?php the_title(); ?>"/></a>
					<?php
						}
					?>
					<h5> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

					<?php //if(function_exists('the_ratings')) { the_ratings(); } ?>
				</li>
			<?php
				endwhile;
				endif;
				wp_reset_query();
			?>
			</ul>
		</div>
		<!-- end of block div -->
		<div class="bot-border"></div>
	</div>
	<!-- end of tabed div -->
</div>
<!-- end of fav-recipes widget -->