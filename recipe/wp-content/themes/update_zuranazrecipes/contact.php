<?php
/*
	Template Name: Contact Us
*/
get_header();
?>


        <!-- ============= CONTENT AREA STARTS HERE ============== -->
        <div id="content" class="clearfix ">
            <div id="left-area" class="clearfix">
                <h1 class="title">Contact Us</h1>
                <br />
                <div class="single-img-box contact-map">
                    <div id="map_canvas"> 
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14608.036944846886!2d90.3671072213422!3d23.74705004446152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b33cffc3fb%3A0x4a826f475fd312af!2z4Kan4Ka-4Kao4Kau4Kao4KeN4Kah4Ka_LCDgpqLgpr7gppXgpr4!5e0!3m2!1sbn!2sbd!4v1482283673431" width="100%" height="262" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
                </div>

                <h3>Contact Form</h3>

                <span class="w-pet-border"></span>
                <?php
					if(have_posts()):
					while(have_posts()): the_post();
				?>
				
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div id="contact-form">
						<?php
							the_content();	
						?>
						</div>
					</article>
				<?php
					endwhile;
					endif;
				?>
				<!--<span class="w-pet-border"></span>-->

            </div><!-- end of left-area -->

            <div id="sidebar">
                <?php
					dynamic_sidebar('contact_widget');
				?>
            </div><!-- end of sidebar -->

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