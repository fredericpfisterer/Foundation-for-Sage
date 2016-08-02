<header>
  <div class="top-bar">
    <div class="top-bar-title">
      <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
        <button class="menu-icon dark" type="button" data-toggle></button>
      </span>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
    </div><!-- .top-bar-title -->

    <div id="responsive-menu">
      <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu>
            <?php if (has_nav_menu('primary_navigation')) :?>
              <?php wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container' => '', 'items_wrap' => '%3$s', 'walker' => new Roots\Sage\Extras\Foundation_Nav_Menu()]);?>
            <?php endif;?>
          </ul>
      </div><!-- .top-bar-left -->

        <div class="top-bar-right">
          <ul class="menu">
            <li><?php get_search_form(); ?></li>
          </ul>
        </div><!-- .top-bar-right -->
    </div><!-- .responsive-menu -->
  </div><!-- .top-bar -->
</header>
