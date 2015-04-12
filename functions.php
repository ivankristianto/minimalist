<?php

define( 'CHILD_THEME_NAME', 'minimalist' );
define( 'CHILD_THEME_URL', 'http://www.ivankristianto.com' );
define( 'CHILD_THEME_VERSION', '1.1.0' );
define( 'CHILD_THEME_DB_VERSION', '1' );
define( 'CHILD_APP_DIR', 'app' );

add_theme_support( "calibrefx-template-styles" );

add_action( "wp_head", "add_comfortaa_font" );
function add_comfortaa_font(){ ?>
	<link href='http://fonts.googleapis.com/css?family=Comfortaa:400,700' rel='stylesheet' type='text/css'>
<?php
}

add_theme_support( 'infinite-scroll', array(
	'type'           => 'scroll',
	'footer_widgets' => false,
	'container'      => 'content',
	'footer'         => 'wrapper',
	'wrapper'        => true,
	'render'         => false,
	'posts_per_page' => false,
) );

function add_search_box_to_menu( $items, $args ) {
	if( $args->theme_location == 'primary' ){
		return $items.get_search_form( FALSE );
	}

	return $items;
}
add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);

function min_enqueue_scripts(){
	wp_enqueue_script( 'min.functions', CHILD_JS_URL . '/functions.js', array( 'jquery' ) );
}
add_action( 'calibrefx_meta', 'min_enqueue_scripts' );

function min_init_themes(){
	remove_action( 'calibrefx_meta', 'calibrefx_do_meta', 10 );
}
add_action( 'init', 'min_init_themes' );

function min_readmore_text(){
	return __( 'Read more...', 'minimalist' );
}
add_filter( 'calibrefx_readmore_text', 'min_readmore_text' );