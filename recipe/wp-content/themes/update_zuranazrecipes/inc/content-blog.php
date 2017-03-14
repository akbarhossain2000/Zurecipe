<?php

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post b-border">
		<h1 class="post-title entry-title">
			<a  href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h1>
		<?php 
			$total_comment 	= wp_count_comments($post->ID);
			$show_cmnt		= $total_comment->approved ;
			
			$category 		= get_the_category($post->ID);
			
			
		?>
		<p class="meta vcard"> By: <a class="author fn" href="#"> <?php the_author(); ?> </a>
			<span>|</span>
			<span class="comments"> <a href="<?php the_permalink(); ?>" title="Comment on <?php the_title(); ?>"><?php echo $show_cmnt; ?> Comment</a> </span>
			<span>|</span>
			<time class="entry-date update" datetime="2012-12-06T11:08:16+00:00">On: <?php the_time('F j Y'); ?></time>
			<span>|</span> Category:
			<span class="cats">
				<?php
					foreach($category as $c){
						if(($c->name == "Top Slider") || $c->name == "top slider"){
				?>		
						<a href="#" rel="category tag"></a>
					<?php
						}else{
					?>
						<a href="#" rel="category tag"><?php echo $c->name ; ?>, </a>
				<?php
						}
					}
				?>
			</span>
		</p>
		<?php 
			if(has_post_thumbnail()){
			
			$bimg_id		= get_post_thumbnail_id();
			$bimg_url		= wp_get_attachment_image_src($bimg_id, 'recipe-blog-single', true);
		?>
			<div class="post-thumb single-img-box">
				<a rel="prettyPhoto" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<img src="<?php echo $bimg_url[0]; ?>" class="attachment-thumbnail-blog wp-post-image" alt=""/>
				</a>
			</div>
		<?php
			}
		?>
		<p>
			<?php echo wp_trim_words(get_the_excerpt(), 50, ' ...'); ?>
			<a href="<?php the_permalink(); ?>" class=" res-more">more</a>
		</p>
		<a href="<?php the_permalink(); ?>" class="readmore rightbtn">Read more</a>
	</div>

</article>