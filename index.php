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
<div class="container mb-12">
  <h2 class="h2 text-center text-white font-extrabold -rotate-1 mb-6"><span class="bg-black/90 rounded px-4 py-2"><?php _e("Новые обзоры", "treba-wp"); ?></span></h2>
  <div class="flex flex-wrap -mx-2 mb-6">
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
  <div class="flex flex-wrap lg:-mx-4 mb-12">
    <div class="w-full lg:w-1/3 lg:px-4 mb-4">
      <h3 class="text-2xl bg-black/90 text-white text-center font-bold rounded-t px-4 py-2"><?php _e("Лучшие слоты", "treba-wp"); ?></h3>
      <div class="bg-white rounded-b">
        <?php 
        $slots = new WP_Query( array( 
          'post_type' => 'slots', 
          'posts_per_page' => 10,
          'orderby'        => 'meta_value_num',
          'meta_key'       => '_crb_slot_rating',
        ) );
        if ($slots->have_posts()) : while ($slots->have_posts()) : $slots->the_post(); 
        ?>
          <div class="relative border-b border-main-gray p-2">
            <a href="<?php the_permalink(); ?>" class="w-full h-full absolute top-0 left-0 z-1"></a>
            <div class="flex items-center">
              <div class="mr-4">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>" width="50" height="50" class="object-cover rounded-full">
              </div>
              <div>
                <div class="text-lg"><?php the_title(); ?></div>
                <div class="text-gray-600 text-sm">⭐ <?php _e("Рейтинг", "treba-wp"); ?>: <?php echo carbon_get_the_post_meta("crb_slot_rating"); ?></div>
              </div>
            </div>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>

    <div class="w-full lg:w-1/3 lg:px-4 mb-4">
      <h3 class="text-2xl bg-black/90 text-white text-center font-bold rounded-t px-4 py-2"><?php _e("Наивысший RTP", "treba-wp"); ?></h3>
      <div class="bg-white rounded-b">
        <?php 
        $slots = new WP_Query( array( 
          'post_type' => 'slots', 
          'posts_per_page' => 10,
          'orderby'        => 'meta_value_num',
          'meta_key'       => '_crb_slot_rtp',
        ) );
        if ($slots->have_posts()) : while ($slots->have_posts()) : $slots->the_post(); 
        ?>
          <div class="relative border-b border-main-gray p-2">
            <a href="<?php the_permalink(); ?>" class="w-full h-full absolute top-0 left-0 z-1"></a>
            <div class="flex items-center">
              <div class="mr-4">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>" width="50" height="50" class="object-cover rounded-full">
              </div>
              <div>
                <div class="text-lg"><?php the_title(); ?></div>
                <div class="text-gray-600 text-sm">🎲 <?php _e("RTP", "treba-wp"); ?>: <?php echo carbon_get_the_post_meta("crb_slot_rtp"); ?>%</div>
              </div>
            </div>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>

    <div class="w-full lg:w-1/3 lg:px-4 mb-4">
      <h3 class="text-2xl bg-black/90 text-white text-center font-bold rounded-t px-4 py-2"><?php _e("Большие выигрыши", "treba-wp"); ?></h3>
      <div class="bg-white rounded-b">
        <?php 
        $slots = new WP_Query( array( 
          'post_type' => 'slots', 
          'posts_per_page' => 10,
          'orderby'        => 'meta_value_num',
          'meta_key'       => '_crb_slot_maxwin',
        ) );
        if ($slots->have_posts()) : while ($slots->have_posts()) : $slots->the_post(); 
        ?>
          <div class="relative border-b border-main-gray p-2">
            <a href="<?php the_permalink(); ?>" class="w-full h-full absolute top-0 left-0 z-1"></a>
            <div class="flex items-center">
              <div class="mr-4">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>" width="50" height="50" class="object-cover rounded-full">
              </div>
              <div>
                <div class="text-lg"><?php the_title(); ?></div>
                <div class="text-gray-600 text-sm">⚡ <?php _e("Множитель", "treba-wp"); ?>: <?php echo carbon_get_the_post_meta("crb_slot_maxwin"); ?></div>
              </div>
            </div>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
  <div>
    <h2 class="h2 text-center text-white font-extrabold -rotate-1 mb-6"><span class="bg-black/90 rounded px-4 py-2"><?php _e("Полезные статьи", "treba-wp"); ?></span></h2>
    <div class="flex flex-wrap lg:-mx-4">
      <?php 
        $slots = new WP_Query( array( 
          'post_type' => 'post', 
          'posts_per_page' => 3,
        ) );
        if ($slots->have_posts()) : while ($slots->have_posts()) : $slots->the_post(); 
      ?>
        <div class="w-full first-of-type:lg:w-1/2 lg:w-1/4 group is-post px-4 mb-4">
          <div class="relative">
            <a href="<?php the_permalink(); ?>" class="w-full h-full absolute left-0 top-0 z-2"></a>
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>" class="w-full h-[450px] object-cover rounded">
            <div class="w-full h-full absolute left-0 top-0 z-1 bg-gradient-to-b from-transparent to-black/80 rounded"></div>
            <div class="w-full absolute bottom-0 left-0 z-1 p-6">
              <div class="group-[:first-of-type]:text-2xl text-xl text-white"><?php the_title(); ?></div>
            </div>
          </div>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
  </div>
</div>
<!-- END Slots -->

	
<?php get_footer(); ?>