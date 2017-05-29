<?php

namespace Roots\Sage\PageNavi;
// Numeric Page Navi pieced together from using the JointsWP Code (https://github.com/JeremyEnglert/JointsWP) I also added screen reader functionality..

function sage_page_navi( $before = '', $after = '' ) {
  global $wpdb, $wp_query;

	$request = $wp_query->request;
	$posts_per_page = intval( get_query_var( 'posts_per_page' ) );
	$paged = intval( get_query_var( 'paged' ) );
	$numposts = $wp_query->found_posts;
  $max_page = $wp_query->max_num_pages;

  if ( $numposts <= $posts_per_page ) { 
          return; 
  }
  
  if( empty( $paged ) || $paged == 0 ) {
		$paged = 1;
  }

	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show - 1;
	$half_page_start = floor( $pages_to_show_minus_1/2 );
	$half_page_end = ceil( $pages_to_show_minus_1/2 );
  $start_page = $paged - $half_page_start;

	if( $start_page <= 0 ) {
		$start_page = 1;
  }
  $end_page = $paged + $half_page_end;

	if( ( $end_page - $start_page ) != $pages_to_show_minus_1 ) {
		$end_page = $start_page + $pages_to_show_minus_1;
  }

	if( $end_page > $max_page ) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
  }

	if( $start_page <= 0 ) {
		$start_page = 1;
  }

  <?php echo $before; ?>
  <nav class="page-navigation">
    <ul class="pagination text-center" role="navigation" aria-label="Pagination">
      <?php if( $start_page >= 2 && $pages_to_show < $max_page ) : ?> 
        <li><a href="<?php echo get_pagenum_link( 1, true ); ?>" title="<?php echo esc_attr( $first_page_text ); ?>" aria-label="<?php echo esc_attr( __( 'First page', 'sage' ) ); ?>"><?php _e( 'First', 'sage' ); ?></a></li>
	    <?php endif; ?>
    <li class="pagination-previous"><?php previous_posts_link( __( 'Previous', 'sage' ) ); ?></li>
    <?php for( $i = $start_page; $i  <= $end_page; $i++ ) : ?>
      <?php if( $i == $paged ) : ?> 
			  <li class="current"><span class="show-for-sr"><?php _e( 'You\'re on page', 'sage' ); ?></span><?php echo $i; ?></li>
		  <?php else : ?>
        <li><a href="<?php echo get_pagenum_link( $i, true ); ?>" aria-label="<?php echo sprintf( esc_attr__( 'Page %1$s', 'sage' ), $i ); ?>"><?php echo $i; ?></a></li>
		  <?php endif; ?>
    <?php endfor; ?>
    <li class="pagination-next"><?php next_posts_link( __( 'Next', 'sage' ), 0 ); ?></li>
    <?php if( $end_page < $max_page ) : ?>
    <li><a href="<?php echo get_pagenum_link( $max_page, true ); ?>" title="<?php echo esc_attr( $last_page_text ); ?>" aria-label="<?php echo esc_attr( __( 'Last page' , 'sage' ), $i ); ); ?>"><?php echo $i; ?></a></li>
	  <?php endif; ?>
  </ul></nav>
  <?php echo $after;
}
