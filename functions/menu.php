<?php
// Register menus
register_nav_menus(
	array(
		'main-nav'		=> __( 'The Main Menu', 'jointswp' ),		// Main nav in header
	)
);

// The Top Menu
function joints_top_nav() {
	wp_nav_menu(array(
		'container'			=> false,						// Remove nav container
		'menu_id'			=> 'main-nav',					// Adding custom nav id
		'menu_class'		=> 'medium-horizontal menu',	// Adding custom nav class
		'items_wrap'		=> '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',
		'theme_location'	=> 'main-nav',					// Where it's located in the theme
		'depth'				=> 5,							// Limit the depth of the nav
		'fallback_cb'		=> false,						// Fallback function (see below)
		'walker'			=> new Topbar_Menu_Walker()
	));
}

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Topbar_Menu_Walker extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"menu\">\n";
	}
}

// Add Foundation active class to menu
function required_active_nav_class( $classes, $item ) {
	global $post;

	if ( $item->current == 1 || $item->current_item_ancestor == true || $item->url === get_post_type_archive_link($post->post_type)) {
		$classes[] = 'active';
	}
 
	return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );