<?php

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="tag-chocolate-2 tag-cointreau recipe-listing-item clearfix" id="">
	<?php
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
	<?php the_title( sprintf( '<h2 class="s-entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<!--<h2 class="s-entry-title">
			<a href="<?php //the_permalink(); ?>"><?php //the_title(); ?></a>
		</h2>-->
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