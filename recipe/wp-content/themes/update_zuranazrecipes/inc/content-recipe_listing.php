<?php

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="post-315 tag-chocolate-2 tag-cointreau recipe-listing-item clearfix" id="post-315">
	<?php
		if(is_archive() && !is_category()){
			
		$total_comment 	= wp_count_comments($post->ID);
		$show_cmnt		= $total_comment->approved ;
		
		//$category 		= get_the_category($post->ID);
	?>
		<style type="text/css">
			.recipe-listing-item h2 a{
				color: #0053a6;
			}
			.recipe-listing-item h2 a:hover{
				color: #003F7E;
			}
		</style>
		<h2>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2> 
			
		<p class="meta vcard"> By: <a class="author fn" href="#"> <?php the_author(); ?> </a>
			<span>|</span>
			<span class="comments"> <a href="<?php the_permalink(); ?>" title="Comment on <?php the_title(); ?>"><?php echo $show_cmnt; ?> Comment</a> </span>
			<span>|</span>
			<time class="entry-date update" datetime="2012-12-06T11:08:16+00:00">On: <?php the_time('F j Y'); ?></time>
		</p>
	<?php
		}
		if(has_post_thumbnail()){
			
		$img_id 		= get_post_thumbnail_ID();
		$img_url		= wp_get_attachment_image_src($img_id, 'recipe-listing', true);
	?>
		<div class="post-thumb single-img-box">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<img src="<?php echo $img_url[0]; ?>" class="attachment-recipe-listing wp-post-image" alt="" />
			</a>
		</div>
	<?php
		}
	?>
	<div class="recipe-info">
		<?php
			if(is_page() || is_category()){
		?>
			<h2>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
		<?php
			}
		?>
		<div class="recipe-tags">
			<span class="type"> Recipe Type: 
			<?php
				$category = get_the_category($post->ID);
				foreach($category as $c){
					if(($c->name == "Top Slider") || ($c->name == "top slider")){
			?>
						<a href="#" rel="tag"></a>
				<?php
					}else{
				?>
						<a href="#" rel="tag"><?php echo $c->name; ?>,</a>
			<?php
					}
				}
			?>
			</span>
		</div>

		<p><?php echo wp_trim_words(get_the_excerpt(), 15, ' ...'); ?></p>

		<a href="<?php the_permalink(); ?>" class="readmore">Read more</a>
	</div>
</div>
<!-- end of post div -->

</article>