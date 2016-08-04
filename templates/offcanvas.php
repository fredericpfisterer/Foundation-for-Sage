<div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas>
	<?php get_search_form(); ?>
	<?php if (has_nav_menu('primary_navigation')) :?>
		<?php sage_off_canvas_nav();?>
	<?php endif;?>
</div>

<!-- You can also add an offcanvas right by copying the above code and changing left to right. -->