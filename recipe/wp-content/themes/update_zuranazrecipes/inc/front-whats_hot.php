<!-- Home Page Whats Hot Recipe Area -->
	<div id="whats-hot">
		<h2 class="w-bot-border">What's <span>Hot</span></h2>
		<ul class="cat-list clearfix">
		<?php 
			$fh_args	= array(
				'post_type'		=> 'post',
				'cat'			=> $zuranaz_recipe['category-two'],
				'posts_per_page'=> 1,
			);
			$fh_data	= new WP_Query($fh_args);
			if($fh_data->have_posts()):
			while($fh_data->have_posts()): $fh_data->the_post();
		?>
			<li>
				<h3><a href="<?php echo get_category_link($zuranaz_recipe['category-two']); ?>"><?php echo get_the_category_by_id($zuranaz_recipe['category-two']); ?></a></h3>
				<?php
					if(has_post_thumbnail()){
					$fh_img_id	= get_post_thumbnail_ID();
					$fh_img_url = wp_get_attachment_image_src($fh_img_id, 'w-hot-rrecipe', true);
				?>
					<a href="<?php the_permalink(); ?>" class="img-box">
						<img src="<?php echo $fh_img_url[0]; ?>" class="attachment-recipe-4column-thumb wp-post-image" alt=""/>
					</a>
				<?php
					}
				?>
				<h4>
					<a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 3, '...'); ?></a>
				</h4>
				<p> <?php echo wp_trim_words(get_the_excerpt(), 15, true); ?> <a  href="<?php the_permalink(); ?>">...more </a> </p>
			</li>
		<?php
			endwhile;
			endif;
			wp_reset_postdata();
		?>
		
		<?php 
			$sh_args	= array(
				'post_type'		=> 'post',
				'cat'			=> $zuranaz_recipe['category-three'],
				'posts_per_page'=> 1,
			);
			$sh_data	= new WP_Query($sh_args);
			if($sh_data->have_posts()):
			while($sh_data->have_posts()): $sh_data->the_post();
		?>
			<li>
				<h3><a href="<?php echo get_category_link($zuranaz_recipe['category-three']); ?>"><?php echo get_the_category_by_id($zuranaz_recipe['category-three']); ?></a></h3>
				<?php
					if(has_post_thumbnail()){
					$sh_img_id	= get_post_thumbnail_ID();
					$sh_img_url = wp_get_attachment_image_src($sh_img_id, 'w-hot-rrecipe', true);
				?>
					<a href="<?php the_permalink(); ?>" class="img-box">
						<img src="<?php echo $sh_img_url[0]; ?>" class="attachment-recipe-4column-thumb wp-post-image" alt=""/>
					</a>
				<?php
					}
				?>
				<h4>
					<a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 3, '...'); ?></a>
				</h4>
				<p> <?php echo wp_trim_words(get_the_excerpt(), 15, true); ?> <a  href="<?php the_permalink(); ?>">...more </a> </p>
			</li>
		<?php
			endwhile;
			endif;
			wp_reset_postdata();
		?>
		
		<?php 
			$th_args	= array(
				'post_type'		=> 'post',
				'cat'			=> $zuranaz_recipe['category-four'],
				'posts_per_page'=> 1,
			);
			$th_data	= new WP_Query($th_args);
			if($th_data->have_posts()):
			while($th_data->have_posts()): $th_data->the_post();
		?>
			<li>
				<h3><a href="<?php echo get_category_link($zuranaz_recipe['category-four']); ?>"><?php echo get_the_category_by_id($zuranaz_recipe['category-four']); ?></a></h3>
				<?php
					if(has_post_thumbnail()){
					$th_img_id	= get_post_thumbnail_ID();
					$th_img_url = wp_get_attachment_image_src($th_img_id, 'w-hot-rrecipe', true);
				?>
					<a href="<?php the_permalink(); ?>" class="img-box">
						<img src="<?php echo $th_img_url[0]; ?>" class="attachment-recipe-4column-thumb wp-post-image" alt=""/>
					</a>
				<?php
					}
				?>
				<h4>
					<a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 3, '...'); ?></a>
				</h4>
				<p> <?php echo wp_trim_words(get_the_excerpt(), 15, true); ?> <a  href="<?php the_permalink(); ?>">...more </a> </p>
			</li>
		<?php
			endwhile;
			endif;
			wp_reset_postdata();
		?>
		
		<?php 
			$frh_args	= array(
				'post_type'		=> 'post',
				'cat'			=> $zuranaz_recipe['category-five'],
				'posts_per_page'=> 1,
			);
			$frh_data	= new WP_Query($frh_args);
			if($frh_data->have_posts()):
			while($frh_data->have_posts()): $frh_data->the_post();
		?>
			<li>
				<h3><a href="<?php echo get_category_link($zuranaz_recipe['category-five']); ?>"><?php echo get_the_category_by_id($zuranaz_recipe['category-five']); ?></a></h3>
				<?php
					if(has_post_thumbnail()){
					$frh_img_id	= get_post_thumbnail_ID();
					$frh_img_url = wp_get_attachment_image_src($frh_img_id, 'w-hot-rrecipe', true);
				?>
					<a href="<?php the_permalink(); ?>" class="img-box">
						<img src="<?php echo $frh_img_url[0]; ?>" class="attachment-recipe-4column-thumb wp-post-image" alt=""/>
					</a>
				<?php
					}
				?>
				<h4>
					<a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 3, '...'); ?></a>
				</h4>
				<p> <?php echo wp_trim_words(get_the_excerpt(), 15, true); ?> <a  href="<?php the_permalink(); ?>">...more </a> </p>
			</li>
		<?php
			endwhile;
			endif;
			wp_reset_postdata();
		?>
			
		</ul>
	</div>
<!-- end of whats-hot div -->