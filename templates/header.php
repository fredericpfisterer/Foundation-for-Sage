<header>
  <div class="top-bar">
    <div class="top-bar-title">
      <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
   <!-- <button class="menu-icon dark" type="button" data-toggle></button> -->
        <button class="menu-icon dark" type="button" data-open="offCanvasLeft"></button>
      </span>
      <strong>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
      </strong>
    </div><!-- .top-bar-title -->

    <div id="responsive-menu">
      <div class="top-bar-left">
        <?php if ( has_nav_menu( 'primary_navigation' ) ) :?>
          <?php Roots\Sage\Menus\sage_top_nav(); ?>
        <?php endif;?>
      </div><!-- .top-bar-left -->
      <div class="top-bar-right">
        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
          <ul class="menu">
            <li><input type="text" value="" name="s" id="s" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"></li>
            <li><input type="submit" class="button" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>"></input></li>
          </ul>
        </form>
      </div><!-- .top-bar-right -->
    </div><!-- .responsive-menu -->
  </div><!-- .top-bar -->
</header>
