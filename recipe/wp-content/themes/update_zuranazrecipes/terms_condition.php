<?php 
/*
	Template Name: Terms Conditions
*/
get_header();
?>


	<!-- ============= CONTENT AREA STARTS HERE ============== -->
	<div id="content" class="clearfix ">
		<div id="left-area" class="clearfix">
		<?php
			if(have_posts()): 
			while(have_posts()): the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div>
				<h1 class="post-title"><?php the_title(); ?></h1>
				<p class="meta"><span class="comments"><span>Comments Off</span></span> <span>|</span>  <span> March 6, 2012</span></p>
				<p><?php the_content(); ?></p>
			</div><!-- end of post div -->
		</article>
		<?php
			endwhile;
			endif;
		?>
		</div><!-- end of left-area -->
		<!-- LEFT AREA ENDS HERE -->

		<!-- ========== START OF SIDEBAR AREA ========== -->
		<div id="sidebar">
		<?php
			get_template_part('inc/content', 'recent_popular_random');
		?>
		
		<?php
			get_template_part('inc/content', 'weekly_special');
		?>
		</div><!-- end of content div -->
		<div class="bot-ads-area">
			<div class="ads-642x79">
				<a href="#"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/ad-652x95.png" alt="Recipe Ads" /></a>
			</div>
		</div>
		<!-- CONTENT ENDS HERE -->
<?php
get_footer();
?>