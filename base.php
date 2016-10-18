<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
  <?php get_template_part( 'templates/head' ); ?>
    <div class="off-canvas-wrapper">
      <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
        <?php get_template_part( 'templates/offcanvas' ); ?>
          <div class="off-canvas-content" data-off-canvas-content>
            <!--[if IE]>
              <div class="alert alert-warning">
                <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
              </div>
            <![endif]-->
            <body <?php body_class(); ?>>
              <?php
                do_action( 'get_header' );
                get_template_part( 'templates/header' );
              ?>
              <div class="wrap container" role="document">
                <div class="content">
                  <main class="main">
                    <?php include Wrapper\template_path(); ?>
                  </main><!-- /.main -->
                  <?php if ( Setup\display_sidebar() ) : ?>
                    <aside class="sidebar">
                      <?php include Wrapper\sidebar_path(); ?>
                    </aside><!-- /.sidebar -->
                  <?php endif; ?>
                </div><!-- /.content -->
              </div><!-- /.wrap -->
                <?php
                  do_action( 'get_footer' );
                  get_template_part( 'templates/footer' );
                  wp_footer();
                ?>
            </body>
          </div><!-- /.off-canvas-content -->
      </div><!-- /.off-canvas-wrapper-inner -->
    </div><!-- /.off-canvas-wrapper -->
</html>
