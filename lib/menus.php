<?php

namespace Roots\Sage\Menus;
// I pieced this together from using the JointsWP Menu Code (https://github.com/JeremyEnglert/JointsWP)

// The Top Menu
function sage_top_nav() {
	wp_nav_menu([
		'container'       => false,                           // Remove nav container
		'menu_class'      => 'dropdown menu',                 // Adding custom nav class
		'items_wrap'      => '<div class="hide-for-small-only"><ul id="%1$s" class="%2$s" data-dropdown-menu role="navigation">%3$s</ul></div>',
		'theme_location'  => 'primary_navigation',        		// Where it's located in the theme
		'depth'           => 5,                               // Limit the depth of the nav
		'fallback_cb'     => false,                           // Fallback function (see below)
		'walker'          => new Topbar_Menu_Walker()
	]);
}

// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Topbar_Menu_Walker extends \Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"menu\">\n";
	}
}
// The Off Canvas Menu
function sage_off_canvas_nav() {
	wp_nav_menu([
		'container'       => false,                           // Remove nav container
		'menu_class'      => 'vertical menu',                 // Adding custom nav class
		'items_wrap'      => '<ul id="%1$s" class="%2$s" data-accordion-menu>%3$s</ul>',
		'theme_location'  => 'primary_navigation',        		// Where it's located in the theme
		'depth'           => 5,                               // Limit the depth of the nav
		'fallback_cb'     => false,                           // Fallback function (see below)
		'walker'          => new Off_Canvas_Menu_Walker()
	]);
}

class Off_Canvas_Menu_Walker extends \Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = Array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"vertical menu\">\n";
	}
}

// Add Foundation active class to menu
function required_active_nav_class( $classes, $item ) {
	if ( $item->current == 1 || $item->current_item_ancestor == true ) {
		$classes[] = 'active';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', __NAMESPACE__ . '\\required_active_nav_class', 10, 2 );
