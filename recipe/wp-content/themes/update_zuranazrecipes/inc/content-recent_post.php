<?php

?>

<div id="recent-posts-2" class="widget nostylewt widget_recent_entries clearfix">
	<h2 class="w-bot-border"><span>Recent</span> Posts</h2>
	<ul>
	<?php 
		$rp_args 		= array(
			'post_type'		=> 'news_event',
			'posts_per_page'=> 5,
		);
		
		//$rp_data	= new WP_Query($rp_args);
		$rp_data	= query_posts($rp_args);
		
		if(have_posts()):
		
		while(have_posts()): the_post();
	?>
		<li>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</li>
		
	<?php 
		endwhile;
		wp_reset_query();
		endif;
	?>
	</ul>
</div>