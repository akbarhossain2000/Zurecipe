<!doctype html>
<html lang="<?php language_attributes(); ?>">

<!-- Mirrored from inspirythemes.biz/html-templates/foodrecipes-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Dec 2016 05:51:33 GMT -->
<head>

    <meta http-equiv="Content-Type" content="<?php bloginfo('description'); ?>; charset=<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri()); ?>/images/favicon.png"/>

    <!-- Font Files -->
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>

    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri()); ?>/css/base/jquery-ui.css"  type="text/css"/>
    <link rel='stylesheet' id='nivoslider-css' href='<?php echo esc_url( get_template_directory_uri()); ?>/js/nivo-slider/nivo-slider0235.css?ver=4.1.1'  type='text/css' media='all'/>
    <link rel='stylesheet' id='prettyPhoto-css' href='<?php echo esc_url( get_template_directory_uri()); ?>/js/prettyPhoto/css/prettyPhoto0235.css?ver=4.1.1' type='text/css' media='all'/>
    <link rel='stylesheet' id='plupload_css-css' href='<?php echo esc_url( get_template_directory_uri()); ?>/js/jquery.ui.plupload/css/jquery.ui.plupload0235.css?ver=4.1.1'  type='text/css' media='all'/>
    <link rel='stylesheet' id='select2-css'  href='<?php echo esc_url( get_template_directory_uri()); ?>/css/select20235.css?ver=4.1.1' type='text/css' media='all'/>
    <link rel='stylesheet' id='font-awesome-css' href='<?php echo esc_url( get_template_directory_uri()); ?>/css/font-awesome.min0235.css?ver=4.1.1' type='text/css' media='all'/>
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri()); ?>/css/style.css" type="text/css" media="all"/>
	<?php
		get_template_part('css_style');
	?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all"/>
	
    <link rel='stylesheet' id='responsive-css' href='<?php echo esc_url( get_template_directory_uri()); ?>/responsive.css?ver=4.1.1' type='text/css' media='all'/>
	
	<?php
		wp_head();
	?>
	
	
</head>

<body <?php body_class(); ?>>

<?php global $zuranaz_recipe; ?>

<!-- ============= HEADER STARTS HERE ============== -->
<div id="header-wrapper" class="clearfix">
    <div id="header" class="clearfix">
        <!-- WEBSITE LOGO -->
        <a class="responsive_logo" href="<?php bloginfo('home'); ?>"><img src="<?php echo $zuranaz_recipe['logo']['url']; ?>" alt="" class="logo"/></a>
        <a href="#"><h1 class="sitenametext">Food Recipes</h1></a>
        <a href="<?php bloginfo('home'); ?>"><img class="header-img" src="<?php echo $zuranaz_recipe['header_img']['url']; ?>" alt="Food Recipes"/></a>
    </div>
    <!-- end of header div -->

    <span class="w-pet-border"></span>

    <!-- NAVIGATION BAR STARTS HERE -->
    <div id="nav-wrap">
        <div class="inn-nav clearfix">
			<!-- MAIN NAVIGATION STARTS HERE -->
			<?php
				if(function_exists('wp_nav_menu')){
					wp_nav_menu(array(
						'theme_location'		=> 'theme_main_menu',
						'menu_id'				=> 'menu-main-navigation',
						'menu_class'			=> 'nav',
						'container'				=> 'ul',
						//'walker'				=> new SplitMenuWalker(),
					));
				}
			?>
            <!-- MAIN NAVIGATION ENDS HERE -->

			
            <!-- SOCIAL NAVIGATION -->
            <ul id="menu-social-menu" class="social-nav">
                <li class="facebook"><a href="<?php echo $zuranaz_recipe['social_icon']['1']; ?>" target="_blank"></a></li>
                <li class="twitter"><a href="<?php echo $zuranaz_recipe['social_icon']['2']; ?>" target="_blank"></a></li>
                <li class="plus"><a href="<?php echo $zuranaz_recipe['social_icon']['3']; ?>" target="_blank"></a></li>
                <li class="youtube" target="_blank"><a href="<?php echo $zuranaz_recipe['social_icon']['4']; ?>"></a></li>
            </ul>
        </div>
    </div>
    <!-- end of nav-wrap -->
    <!-- NAVIGATION BAR ENDS HERE -->

</div>
<!-- end of header-wrapper div -->

<!-- ============= HEADER ENDS HERE ============== -->


<!-- ============= CONTAINER STARTS HERE ============== -->
<div class="main-wrap">
    <div id="container">

        <!-- WEBSITE SEARCH STARTS HERE -->

        <div class="top-search  clearfix">
            <h3 class="head-pet"><span>Recipe Search</span></h3>
			<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
            <form action="<?php echo esc_url( home_url('/') ); ?>" id="searchform" method="get" role="search">
                <p>
                    <input type="text" name="s" id="<?php echo $unique_id; ?>" class="field" value="<?php echo get_search_query(); ?>" placeholder="Search for"/>
                    <input type="submit" id="s-submit" value=""/>
                    <!--<input type="submit" name="s_submit"  value=""/>-->
                </p>
            </form>
            <!--<p class="statement"><span class="fireRed">Recipe Types:</span>
                <a href="#">Beef</a> , <a href="#">Cheese</a> , <a href="#">Chicken</a> , <a href="#">Chocolate</a> , <a href="#">Fish</a> , <a href="#">Pizzas</a>, <a href="#">Potatos</a>, <a href="#">Rolls</a>
            </p>-->

        </div>
        <!-- end of top-search div-->