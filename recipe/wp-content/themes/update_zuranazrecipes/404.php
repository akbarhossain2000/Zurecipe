<?php  get_header(); ?>
<style type="text/css">
	#not-found{margin:0 auto; height:400px;}
	.not-found-text{
		margin:100px 0px;
		text-align:center;
	}
</style>	

<div id="not-found">
	<div class="row">
		<div class="col-sm-12">
			<div class="not-found-text">
				<h1>404 Not Found</h1>
				<h2>May be you are looking for something else</h2>

				<p>You may visit the <a href="<?php esc_url(bloginfo('home')); ?>">Homepage</a></p>
			</div>
		</div>
	</div>
</div>

<?php  get_footer(); ?>