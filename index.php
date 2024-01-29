<?php get_header(); ?>

<!-- Welcome -->
<div class="welcome bg-black/95 relative text-center mx-auto pt-20 pb-24 lg:pb-40 ">
  <div class="container">
    <div class="relative z-1">
      <h1 class="h1 text-gray-200 mb-6"><?php _e("Крути слоты!", "treba-wp"); ?></h1>
      <div class="flex justify-center mb-8">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/brush-line.svg" class="w-4/5 md:w-1/2">
      </div>
      <div class="text-xl text-gray-300 dark:text-gray-400"><?php _e("Обзоры, рейтинги, отзывы - вся информация про игровые автоматы", "treba-wp"); ?>.</div>
    </div>
    <div class="w-full h-full absolute top-0 left-0 z-0">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cells2.svg" alt="" class="w-full h-full object-cover opacity-5">
    </div>
  </div>
  <div class="text-main-gray">
    <svg viewBox="0 0 1440 120" class="text-main-gray absolute bottom-0"><path d="M1440,21.2101911 L1440,120 L0,120 L0,21.2101911 C120,35.0700637 240,42 360,42 C480,42 600,35.0700637 720,21.2101911 C808.32779,12.416393 874.573633,6.87702029 918.737528,4.59207306 C972.491685,1.8109458 1026.24584,0.420382166 1080,0.420382166 C1200,0.420382166 1320,7.35031847 1440,21.2101911 Z" fill="currentColor"></path></svg>
  </div>
</div>
<!-- END Welcome -->

<!-- Slots -->
<div class="container mb-16">
  <div class="flex flex-wrap -mx-2">
    <?php 
    $slots = new WP_Query( array( 
      'post_type' => 'slots', 
      'posts_per_page' => 15,
    ) );
    if ($slots->have_posts()) : while ($slots->have_posts()) : $slots->the_post(); 
    ?>
      <div class="w-1/2 md:w-1/3 lg:w-1/5 px-2 mb-4">
        <?php get_template_part("template-parts/slots/item"); ?>
      </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
</div>
<!-- END Slots -->

	
<?php get_footer(); ?>