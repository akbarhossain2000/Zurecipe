<?php

?>
<div class="widget newsEvent nostylewt">
	<?php
		$ne_args	= array(
			'post_type'			=> 'news_event',
			'posts_per_page'	=> 2,
		);
		
		$ne_data		= query_posts($ne_args);
		//$news_data		= new WP_Query($ne_args);
		if(have_posts()):
		
		$cu_name			= get_post_type_object('news_event');
		$cu_label 			= $cu_name->label;
		$cu_separator 		= explode(" ", $cu_label);
		//print_r($cu_separator);
		
	?>
		<h2 class="w-bot-border">
			<span><?php echo $cu_separator[0]; ?></span> <?php echo $cu_separator[1]." ".$cu_separator[2]; ?></h2>
		<ul class="list">
		<?php
			while(have_posts()): the_post();
		?>
			<li>
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<p><?php echo wp_trim_words(get_the_excerpt(), 15, ' ...'); ?><a href="<?php the_permalink(); ?>">more</a></p>
			</li>
		<?php
			endwhile;
			wp_reset_query();
		?>
		</ul>
	<?php 
		endif;
		
	?>
</div>