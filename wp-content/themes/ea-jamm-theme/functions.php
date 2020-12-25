<?php

function eajammtheme_theme_support(){
	// Adds dynamic title tag support
	add_theme_support('title_tag');
	add_theme_support('custom-logo');
	add_image_size('custom-logo', 636, 438, true);
}

add_action('after_setup_theme','eajammtheme_theme_support');


function eajammtheme_menus(){

	$locations = array(
		'principal' => "Menu principal navbar",
		'footer' => "Menu du footer"
	);

	register_nav_menus($locations);

}

add_action('init','eajammtheme_menus');

function eajammtheme_register_styles(){

	$version = wp_get_theme()->get( 'Version' );


	wp_enqueue_style('eajammtheme-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
	wp_enqueue_style('eajammtheme-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
	wp_enqueue_style('eajammtheme-style', get_template_directory_uri() . "/style.css", array('eajammtheme-bootstrap'), $version, 'all');
}

add_action('wp_enqueue_scripts', 'eajammtheme_register_styles');


function eajammtheme_register_scripts(){

	wp_enqueue_script('eajammtheme-jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), '3.4.1', true);
	wp_enqueue_script('eajammtheme-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);
	wp_enqueue_script('eajammtheme-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
	wp_enqueue_script('eajammtheme-main', get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', true);

}

add_action('wp_enqueue_scripts', 'eajammtheme_register_scripts');

class mono_walker extends Walker_Nav_Menu{
	function start_el(&$output, $item, $depth, $args){
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';


		$parsedURL = parse_url( esc_attr( $item->url ));
  $cleanURL = substr_replace($parsedURL['path'],'',-1);//remove last '/';
  
  $pathTab = explode('/',$cleanURL);
  $pathTab[sizeof($pathTab)-1] = '#'.$pathTab[sizeof($pathTab)-1];
  $path = implode('/',$pathTab );
  
  $attributes .= ! empty( $item->url )        ? ' class="nav-link"' : '';
  $attributes .= ! empty( $item->url )        ? ' href="'   . $path .'"' : '';
  $attributes .= ! empty( $item->url )        ? ' data-title="'   .   sanitize_title($item->title) .'"' : '';
  $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';
  
  if($depth != 0) $description = "";
  
  $item_output = $args->before;
  $item_output .= '<a'. $attributes .'>';
  $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
  $item_output .= $description.$args->link_after;
  $item_output .= '</a>';
  $item_output .= $args->after;
  
  $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
}

?>