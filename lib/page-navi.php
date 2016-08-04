<?php
// Numeric Page Navi pieced together from using the JointsWP Code (https://github.com/JeremyEnglert/JointsWP) I also added screen reader functionality..
// I'm not sure if I should be using a Namespace here, still trying to wrap my head around that!
function sage_page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
	echo $before.'<nav class="page-navigation"><ul class="pagination text-center" role="navigation" aria-label="Pagination">'."";
	if ($start_page >= 2 && $pages_to_show < $max_page) {
		$first_page_text = __( 'First', 'sage' );
		echo '<li><a href="'.get_pagenum_link().'" title="'.$first_page_text.'" aria-label="First page">'.$first_page_text.'</a></li>';
	}
	echo '<li class="pagination-previous">';
	previous_posts_link( __('Previous', 'sage') );
	echo '</li>';
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="current"><span class="show-for-sr">You\'re on page</span> '.$i.' </li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'" aria-label="Page '.$i.'">'.$i.'</a></li>';
		}
	}
	echo '<li class="pagination-next">';
	next_posts_link( __('Next', 'sage'), 0 );
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = __( 'Last', 'sage' );
		echo '<li><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'" aria-label="Last page">'.$last_page_text.'</a></li>';
	}
	echo '</ul></nav>'.$after."";
} /* End page navi */
