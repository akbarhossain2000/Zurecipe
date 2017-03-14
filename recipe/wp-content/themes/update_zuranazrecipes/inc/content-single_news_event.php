<?php

global $zuranaz_recipe;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post">
		<?php
		
			$total_comment 	= wp_count_comments($post->ID);
			$show_cmnt		= $total_comment->approved ;
			
		?>
		<h1 class="single-post-title"><?php the_title(); ?></h1>
		<p class="meta">By : <a href="#" title="Posts by <?php the_author(); ?>" rel="author"><?php the_author(); ?></a> <span>|</span> <span class="comments">
		<a href="<?php the_permalink(); ?>" title="Comment on <?php the_title(); ?>"><?php echo $show_cmnt; ?> Comment</a></span> <span>|</span> On : <?php the_time('F j, Y'); ?> <span>|</span> Category : <span class="cats">
		<?php
			$category = get_the_category($post->ID);
			foreach($category as $cat){
				if(($cat->cat_ID == $zuranaz_recipe['category-one']) || ($cat->cat_ID == 1)){
		?>
				<a href="#" rel="category tag"></a>
			<?php
				}else{
			?>
				<a href="<?php echo get_category_link($cat->cat_ID); ?>" rel="category tag"><?php echo $cat->name ; ?>,</a>
			
		<?php
				}
			}
		?>
		</span> </p>
		<div class="post-thumb single-img-box">
			<?php 
				if(has_post_thumbnail()){
					$simg_id	= get_post_thumbnail_id();
					$simg_url	= wp_get_attachment_image_src($simg_id, 'recipe-blog-single', true);
			?>
					<a  title="<?php the_title(); ?>">
						<img src="<?php echo $simg_url[0]; ?>" alt="" />
					</a>
			<?php
				}
			?>
		</div>
		<p><?php the_content(); ?></p>
		<div class="blog-post-social">
			<h5>Share This Post!</h5>
			<?php 
				echo do_shortcode('[addtoany]');
			?>
		</div>
	</div><!-- end of post div -->
</article>