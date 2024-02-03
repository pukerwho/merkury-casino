<?php get_header(); ?>

<div class="container my-6">
  <h1 class="text-3xl lg:text-4xl text-center text-white font-extrabold -rotate-1 mb-6"><span class="bg-black/90 rounded px-4 py-2"><?php _e("Все слоты", "treba-wp"); ?></span></h1>
  <div class="flex flex-wrap -mx-2 mb-6">
    <?php 
    $current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
    $slots = new WP_Query( array( 
      'post_type' => 'slots', 
      'posts_per_page' => 30,
      'paged' => $current_page,
    ) );
    if ($slots->have_posts()) : while ($slots->have_posts()) : $slots->the_post(); 
    ?>
      <div class="w-1/2 md:w-1/3 lg:w-1/5 px-2 mb-4">
        <?php get_template_part("template-parts/slots/item"); ?>
      </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
  <div class="b_pagination text-center">
    <?php 
      $big = 9999999991; // уникальное число
      echo paginate_links( array(
        'format' => '?page=%#%',
        'total' => $slots->max_num_pages,
        'current' => $current_page,
        'prev_next' => true,
        'next_text' => (''),
        'prev_text' => (''),
      )); 
    ?>
  </div>
</div>

<?php get_footer(); ?>