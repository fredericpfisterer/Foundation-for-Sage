<header>
  <div class="top-bar">
    <div class="top-bar-title">
      <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
   <!-- <button class="menu-icon dark" type="button" data-toggle></button> --> 
        <button class="menu-icon dark" type="button" data-open="offCanvasLeft"></button>
      </span>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
    </div><!-- .top-bar-title -->

    <div id="responsive-menu">
      <div class="top-bar-left">
        <?php if (has_nav_menu('primary_navigation')) :?>
          <?php sage_top_nav();?>
        <?php endif;?>
      </div><!-- .top-bar-left -->

        <div class="top-bar-right"> 
            <?php get_search_form(); ?>    
        </div><!-- .top-bar-right -->
    </div><!-- .responsive-menu -->
  </div><!-- .top-bar -->
</header>
