<?php
global $zuranaz_recipe;
?>

<div class="widget nostylewt Weekly_Special_Widget wk-special clearfix">
<?php 
	$ws_args		= array(
		'post_type'		=> 'post',
		'cat'			=> $zuranaz_recipe['category-six'],
		'posts_per_page'=> 1,
	);
	
	$ws_data	= new WP_Query($ws_args);
	if($ws_data->have_posts()):
	while($ws_data->have_posts()): $ws_data->the_post();
	
	$cat_name	 = get_the_category_by_id($zuranaz_recipe['category-six']);
	$separator   = explode(" ", $cat_name);
	
	
?>
	<h2 class="w-bot-border"><span><?php echo $separator[0]; ?></span> <?php echo $separator[1]; ?> </h2>
	<?php
		if(has_post_thumbnail()){
			$ws_img_id		= get_post_thumbnail_ID();
			$ws_img_url		= wp_get_attachment_image_src($ws_img_id, 'w-special', true);
	?>
	<div class="img-box for-all">
		<a href="<?php the_permalink(); ?>">
			<img src="<?php echo $ws_img_url[0]; ?>" class="attachment-weekly-special-thumb wp-post-image" alt=""/>
		</a>
	</div>
	<div class="for-res">
		<a href="recipe-single-1.html">
			<img src="<?php echo $ws_img_url[0]; ?>" class="attachment-weekly-for-res wp-post-image" alt=""/>
		</a>
	</div>
	<?php
		}
	?>
	<h4> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

	<p><?php echo wp_trim_words(get_the_excerpt(), 20, '...' ); ?>
		<a href="<?php the_permalink(); ?>"> more</a>
	</p>
	<a href="<?php the_permalink(); ?>" class="readmore">Read More</a>
	
<?php
	endwhile;
	endif;
	wp_reset_postdata();
?>
</div>