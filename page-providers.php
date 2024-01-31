<?php
/*
Template Name: Разработчики
*/
?>
<?php get_header(); ?>

<div class="container my-6">
  <h1 class="text-3xl lg:text-4xl text-center text-white font-extrabold -rotate-1 mb-6"><span class="bg-blue-500 rounded px-4 py-2"><?php _e("Разработчики", "treba-wp"); ?></span></h1>
  <?php 
    $providers = get_terms( array(
      'taxonomy'   => 'providers',
      'hide_empty' => false,
      'orderby' => 'count',
      'order' => 'DESC',
    ) );
    foreach ($providers as $provider):
  ?>
  <div class="mb-6">
    <div class="flex flex-col lg:flex-row justify-between items-center relative bg-black/90 rounded-t text-white px-4 py-2">
      <a href="<?php echo get_term_link($provider->term_id, 'providers') ?>" class="w-full h-full absolute top-0 left-0 z-1"></a>
      <div class="text-2xl font-black mb-2 lg:mb-0"><?php echo $provider->name; ?></div>
      <div class="text-lg"><?php _e("Все игры от", "treba-wp"); ?> <?php echo $provider->name; ?></div>
    </div>
    <div class="bg-white p-4 pb-0">
      <div class="flex flex-wrap -mx-2">
        <?php 
        $slots = new WP_Query( array( 
          'post_type' => 'slots', 
          'posts_per_page' => 10,
          'tax_query' => array(
            array(
              'taxonomy' => 'providers',
              'terms' => $provider->term_id,
              'field' => 'term_id',
              'include_children' => true,
              'operator' => 'IN'
            )
          ),
        ) );
        if ($slots->have_posts()) : while ($slots->have_posts()) : $slots->the_post(); 
        ?>
          <div class="w-1/2 lg:w-1/5 px-2 mb-4">
            <?php get_template_part("template-parts/slots/item"); ?>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
    
  </div>
  <?php endforeach; ?>
</div>

<?php get_footer(); ?>