<?php while (have_posts()) : the_post(); ?>
  <div class="row"><?php get_template_part('templates/page', 'header'); ?></div>
  <div class="row"><?php get_template_part('templates/content', 'page'); ?></div>
<?php endwhile; ?>
