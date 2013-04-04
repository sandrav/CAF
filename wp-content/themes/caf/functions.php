<?php

automatic_feed_links();

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		//'before_widget' => '<li id="%1$s" class="widget %2$s">',
		//'before_widget' => '<li>',
		//'after_widget' => '</li>',
		//'before_title' => '<h1>',
		//'after_title' => '</h1>',
	));
	register_sidebar(array('name'=>'sidebarLang',
		//'before_widget' => '<ul>',
		//'after_widget' => '</ul>',
		//'before_title' => '<h4>',
		//'after_title' => '</h4>',
	));

if ( function_exists( 'add_theme_support' ) ){
	add_theme_support( 'post-thumbnails' );
}
function use_Jquery() {
	if (!is_admin()) {
		wp_enqueue_script('jquery');
	}
}

function load_translations(){
	load_theme_textdomain('CAF', get_template_directory() . '/languages');
}
add_action('init', 'use_Jquery');
add_action('after_setup_theme', 'load_translations');

?>
