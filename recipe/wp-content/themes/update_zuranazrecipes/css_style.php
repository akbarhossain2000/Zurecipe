<style type="text/css">
		@font-face {
			font-family: 'MuseoSlab500';
			src: url('<?php echo esc_url(get_template_directory_uri()); ?>/fonts/museo_slab_500-webfont.eot');
			src: url('<?php echo esc_url(get_template_directory_uri()); ?>/fonts/museo_slab_500-webfontd41d.eot?#iefix') format('embedded-opentype'),
			url('<?php echo esc_url(get_template_directory_uri()); ?>/fonts/museo_slab_500-webfont.woff') format('woff'),
			url('<?php echo esc_url(get_template_directory_uri()); ?>/fonts/museo_slab_500-webfont.ttf') format('truetype'),
			url('<?php echo esc_url(get_template_directory_uri()); ?>/fonts/museo_slab_500-webfont.svg#MuseoSlab500') format('svg');
			font-weight: normal;
			font-style: normal;

		}
		
		.w-pet-border {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/pet-border.png) center center repeat-x;
		}
		#nav-wrap {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/nav-bg.png) repeat-x;
		}
		
		#nav-wrap .nav li:hover a, #nav-wrap .nav li:focus a, #nav-wrap .nav li.active a {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/nav-hover.png) repeat-x;
		}
		.main-wrap {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/top-bg1.png) left top repeat-x;
		}
		
		.top-search {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/pet-border.png) bottom repeat-x;
		}
		
		.head-pet {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/pet-border.png) center center repeat-x;
		}
		
		.top-search #searchform {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/right-seperator.png) right center no-repeat;
		}
		
		.top-search .field {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/search-field.png) top no-repeat;
		}
		
		.top-search #s-submit {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/search-btn.png) left top no-repeat;
		}
		
		#slider {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/pettern-gray.png) bottom repeat-x #f7f7f7;
		}
		
		#slider.slider2 .most-rated {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/most-rated.png) left top no-repeat #fff;
		}
		#slider.slider2 .most-rated .img-box {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/image-frame-71x64.png) no-repeat;
		}
		#slider.slider2 .slides .slide-info .rating .off {
			background-position: right top !important;
		}
		#slider.slider2 .slides .slide-info .rating .on, #slider.slider2 .slides .slide-info .rating .off {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/ratings-big.png) left top no-repeat;
		}
		
		a.readmore, .readmore {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/button-bg-h29.png) repeat-x;
		}
		
		#slider .slides .sliderNav .cycle-pager {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/pettern-gray-tile.png);
		}
		
		#slider .slides .sliderNav .cycle-pager span {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/bulit.png) no-repeat;
		}
		
		h2.w-bot-border {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/pet-border.png) bottom repeat-x;
		}
		
		#whats-hot .cat-list li h4 {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/pet-border.png) center 33px repeat-x;
		}
		.tabed {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/tabed-bg.png) repeat-x;
		}
		
		.tabed .block li {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/pet-border.png) 0 79px repeat-x;
		}
		
		#bottom li ul li, #bottom .widget_displaytweetswidget p {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/bottom-recent-botder.png) bottom repeat-x;
		}
		
		#contact-form input[type="submit"], #adduser input[type="submit"] {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/button-bg-pink.png) repeat-x;
		}
		
		#left-area .post, #left-area .recipe, #left-area .b-border, #left-area .page {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/pet-border.png) bottom repeat-x;
		}
		
		#pagination a {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/button-bg-h29.png) repeat-x;
		}
		.newsEvent .list li {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/li-bot-border.jpg) bottom repeat-x;
		}
		#content #sidebar .widget li, #sidebar .widget_displaytweetswidget p {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/li-bot-border.jpg) bottom repeat-x;
		}
		
		#left-area .comments .commentlist .reply {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/li-bot-border.jpg) bottom repeat-x;
		}
		
		#left-area .recipe-listing-item .recipe-info .rating .off {
			background-position: right top !important;
		}
		#left-area .recipe-listing-item .recipe-info .rating .on, #left-area .recipe-listing-item .recipe-info .rating .off {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/ratings-big.png) left top no-repeat;
		}
		
		#left-area .page .faq-list li.active .number {
			background-position: left bottom;
			color: #fff;
		}
		#left-area .page .faq-list li .number {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/faq-num-bg.png) left top no-repeat;
		}
		
		#left-area .page .faq-list li {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/pet-border.png) bottom repeat-x;
		}
		#left-area .comments h3#comments {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/pet-border.png) bottom repeat-x;
		}
		
		#left-area #respond .form-submit input {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/button-bg-h29.png) repeat-x;
		}
		
		#content #sidebar .recipes-slider-widget ul li .info-box {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/black-trans.png);
		}
		
		#content #sidebar .recipes-slider-widget .prev {
			right: auto;
			left: 22px;
			background-position: left top !important;
		}
		
		#content #sidebar .recipes-slider-widget .prev, #content #sidebar .recipes-slider-widget .next {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/arrows.png) right top no-repeat;
		}
		
		#left-area .info-right .more-recipe .recipe-imgs .more-recipes {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/more-img-slider-bg.png) no-repeat;
		}
		#left-area .info-right .more-recipe .recipe-imgs .prev {
			right: auto;
			left: 22px;
			background-position: left top !important;
		}
		#left-area .info-right .more-recipe .recipe-imgs .prev, #left-area .info-right .more-recipe .recipe-imgs .next {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/arrows.png) right top no-repeat;
		}
		
		#left-area .info-right .more-recipe .recipe-imgs .more-recipes ul .info-box {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/black-trans.png);
		}
		
		#left-area .single-imgs .small-imgs li {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/frame-142x119.png) no-repeat;
		}
		
		#left-area .single-imgs .small-img-cont .carnav {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/car-nav.png) no-repeat;
		}
		
		#left-area .single-imgs .small-img-cont .carnav .left {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/carnav-arrows.png) 7px 3px no-repeat;
		}
		
		#left-area .single-imgs .small-img-cont .carnav .right {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/carnav-arrows.png) -28px 3px no-repeat;
		}
		
		#left-area .info-right .rate-box {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/rate-box-bg.png) no-repeat;
			height: 150px;
		}
		#left-area .info-right .rate-box .ex-rates span.off {
			background-position: -13px top;
		}
		#left-area .info-right .rate-box .ex-rates span {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/spons.png) left top no-repeat;
		}
		
		#left-area .info-right .rate-box .rates span {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/ratings-big.png) left top no-repeat;
		}
		#left-area .info-right .rate-box .rates span.off {
			background-position: -20px top;
		}
		
		#left-area .info-right .rate-box .views {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/eyecon.png) left center no-repeat;
		}
		
		#left-area h4.red {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/pet-border.png) 0 30px repeat-x;
		}
		
		#left-area h4.me-steps .stepcheck {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/checkbox.png) left bottom no-repeat;
		}
		#left-area .info-left ul li.ingredient {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/li-bot-border.jpg) 0 bottom repeat-x;
		}
		
		.tabed .block li .img-box {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/image-frame-71x64.png) no-repeat;
		}
		
		#pagination span {
			background: url(<?php echo esc_url(get_template_directory_uri()); ?>/images/button-bg-h29.png) repeat-x;
		}
		
	</style>