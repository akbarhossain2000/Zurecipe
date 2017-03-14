<?php

function zuranazrecipe_setup(){
	
	load_theme_textdomain('ZuRecipe', get_template_directory_uri().'/languages');
	
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-background');
	
	add_image_size('slider-image', 515, 262, true);
	add_image_size('w-hot-rrecipe', 222, 144, true);
	add_image_size('home-recent-recipe', 222, 270, true);
	add_image_size('w-special', 122, 132, true);
	add_image_size('rprm-image', 63, 53, true);
	add_image_size('recipe-listing', 250, 212, true);
	add_image_size('related-blog-post', 302, 196, true);
	add_image_size('recipe-blog-single', 575, 262, true);
	add_image_size('recipe-gallery', 132, 104, true);
	
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );
	
	if( function_exists('register_nav_menu')){
		register_nav_menus(array(
			'theme_main_menu'		=> __('Main Menu', 'ZuRecipe'),
			'theme_footer_menu'		=> __('Footer Menu', 'ZuRecipe'),
		));
	}
	
	register_post_type('faq_post', array(
		'labels'		=> array(
				'name'		=> 'FAQ',
				'add_new'	=> 'Add FAQ Item',
		),
		'public'		=> true,
		'capability_type'=> 'post',
		'supports'		=> array('title', 'editor'),
	));
	
	register_post_type('news_event', array(
		'labels'		=> array(
				'name'		=> 'News and Events',
				'add_new'	=> 'Add New Item',
		),
		'public'		=> true,
		'has_archive'	=> true,
		'rewrite'		=> array(
			'slug'		=> 'news_event',
		),
		'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
		'capability_type'=> 'post',
		'supports'		=> array('title', 'thumbnail', 'editor', 'custom-fields', 'author', 'comments', 'post-formats'),
		'taxonomies'  	=> array('category', 'post_tag'),
	));
	
	
	//require_once('nav_walker.php');
	
}
add_action('after_setup_theme', 'zuranazrecipe_setup');


function add_categories(){
	register_taxonomy_for_object_type('category', 'news_event');
	register_taxonomy_for_object_type('post_tag', 'news_event');	
}
add_action('init', 'add_categories');


require_once('lib/ReduxCore/framework.php');
require_once('lib/sample/red-config.php');

require_once('inc/include-functions.php');


function topViewPost($postID){
	$countKey		= 'wpb_post_views_count';
	$count			= get_post_meta($postID, $countKey, true);
	if($count==''){
		$count = 1;
		delete_post_meta($postID, $countKey);
		add_post_meta($postID, $countKey, '1');
	}else{
		$count++;
		update_post_meta($postID, $countKey, $count);
	}
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function wpb_get_post_views($postID){
	    $count_key = 'wpb_post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0 View";
	    }
	    return $count.' Views';
}


add_filter( 'pre_get_posts', 'zuranaz_cpt_search' );
function zuranaz_cpt_search( $query ) {
	
    if ( $query->is_search ) {
	$query->set( 'post_type', array( 'post', 'news_event' ) );
	$query->set('cat', '-1');
	$query->query_vars['posts_per_page'] = 7;
    }
    
    return $query;
    
}


function some_function( $query ) {
  if(!is_admin()) {

  // For categories, lets add 'nav_menu_item' to the array so we don't break our navigation.//
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array( 'post', 'nav_menu_item', 'news_event' ));
    return $query;
  }
  if( is_archive() && !is_post_type_archive() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array( 'post', 'news_event' ));
    return $query;
  }
  if( is_home() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array( 'post', 'news_event' ));
    return $query;
  }
 }
}
add_filter( 'pre_get_posts', 'some_function' );


require_once('custom_post_type_archive.php');

add_action('widgets_init', 'contact_sidebar_widget');
function contact_sidebar_widget(){
	register_sidebar(array(
		'name'			=> __('Contact Sidebar', 'ZuRecipe'),
		'description'	=> __('Sidebar Add Here!', 'ZuRecipe'),
		'id'			=> 'contact_widget',
		'before_widget'	=> '<div id="text-2" class="widget widget_text clearfix"><div class="textwidget"><ul>',
		'after_widget'	=> '</ul></div><div class="widget-bot-round"></div></div>',
		'before_title'	=> '<h4 class="blue"><span>',
		'after_title'	=> '</span></h4>',
	));
	
	register_sidebar(array(
		'name'			=> __('Single Sidebar', 'ZuRecipe'),
		'description'	=> __('Sidebar Add Here!', 'ZuRecipe'),
		'id'			=> 'single_widget',
		'before_widget'	=> '<div id="text-2" class="widget widget_text clearfix"><div class="textwidget"><ul>',
		'after_widget'	=> '</ul></div><div class="widget-bot-round"></div></div>',
		'before_title'	=> '<h2 class="blue w-bot-border bmarginless">',
		'after_title'	=> '</h2>',
	));
	
	register_sidebar(array(
		'name'			=> __('Custom Single Sidebar', 'ZuRecipe'),
		'description'	=> __('Sidebar Add Here!', 'ZuRecipe'),
		'id'			=> 'custom_single_widget',
		'before_widget'	=> '<div id="text-2" class="widget widget_text clearfix"><div class="textwidget"><ul>',
		'after_widget'	=> '</ul></div><div class="widget-bot-round"></div></div>',
		'before_title'	=> '<h2 class="blue w-bot-border bmarginless">',
		'after_title'	=> '</h2>',
	));
}
