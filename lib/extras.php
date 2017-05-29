<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if ( is_single() || is_page() && !is_front_page() ) {
    if ( !in_array(basename( get_permalink() ), $classes ) ) {
      $classes[] = basename( get_permalink() );
    }
  }

  // Add class if sidebar is active
  if ( Setup\display_sidebar() ) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter( 'body_class', __NAMESPACE__ . '\\body_class' );

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __( 'Continued', 'sage' ) . '</a>';
}
add_filter( 'excerpt_more', __NAMESPACE__ . '\\excerpt_more' );

class Foundation_Nav_Menu extends \Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu\">\n";
    }
}

/*
 * Add aria labels to the pagination
 */

function prev_posts_link_attributes() { 
  return 'aria-label="' __( 'Previous page', 'sage' ) . '"';
}
add_filter('previous_posts_link_attributes', __NAMESPACE__ . '\\prev_posts_link_attributes');

function next_posts_link_attributes() {
  return 'aria-label="' __( 'Next page', 'sage' ) . '"';
}  
add_filter('next_posts_link_attributes', __NAMESPACE__ . '\\next_posts_link_attributes');

