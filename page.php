<?php get_header(); ?>

<div class="mb-6">
  <h1 class="text-2xl lg:text-3xl font-semibold mb-4"><?php the_title(); ?></h1>
  <div class="content">
    <?php the_content(); ?>
  </div>
</div>

<?php get_footer(); ?>