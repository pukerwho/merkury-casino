<?php 
get_header();
$countNumber = tutCount(get_the_ID()); 
$currentId = get_the_ID();
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="bg-white py-8">
  <div class="container">
    <div class="flex flex-col lg:flex-row">
      <div class="mb-4 lg:mb-0 lg:mr-4">
        <?php $logo = get_the_post_thumbnail_url(get_the_ID(), 'large'); if ($logo): ?>
          <img class="lg:h-[180px] object-cover rounded-lg lg:mx-auto" alt="<?php the_title(); ?>" src="<?php echo $logo; ?>" loading="lazy">
        <?php endif; ?>
      </div>
      <div>
        <h1 class="h1 mb-6"><?php the_title(); ?></h1>
        <div class="flex items-center mb-4">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/stars.svg" alt="<?php _e("Рейтинг", "treba-wp"); ?>" class="mr-2">
          <span class="font-black"><?php echo carbon_get_the_post_meta("crb_slot_rating"); ?>  </span>
        </div>
        <div class="mb-2">
          <?php _e("Разработчик", "treba-wp"); ?>: 
          <?php 
          $providers = wp_get_post_terms(  get_the_ID() , 'providers', array( 'parent' => 0 ) );
          foreach (array_slice($providers, 0,1) as $provider):
          ?>
            <?php if ($provider): ?>
              <a href="<?php echo get_term_link($provider->term_id, 'providers') ?>" ><?php echo $provider->name; ?></a> 
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <div><?php _e("Дата создания", "treba-wp"); ?>: <?php echo carbon_get_the_post_meta("crb_slot_date"); ?></div>
      </div>
    </div>
  </div>
</div>

<div class="py-8">
  <div class="container">
    <div class="flex flex-wrap lg:-mx-6">
      <div class="w-full lg:w-8/12 lg:px-6 mb-6 lg:mb-0">
        <div class="mb-6">
          <h2 class="h2 inline-block bg-black/90 text-white rounded -rotate-1 px-4 py-2 mb-4"><?php _e("Общая информация", "treba-wp"); ?></h2>
          <div class="mb-4"><?php _e("Что известно про слот", "treba-wp"); ?> <span class="font-bold"><?php the_title(); ?></span>:</div>
          <div>
            <table class="w-full table-fixed border border-gray-400">
              <tbody>
                <tr class="border-b border-gray-400">
                  <td class="border-r border-gray-400 p-2">🔢 <?php _e("Кол-во барабанов", "treba-wp"); ?></td>
                  <td class="p-2"><?php echo carbon_get_the_post_meta("crb_slot_reels"); ?></td>
                </tr>
                <tr class="border-b border-gray-400">
                  <td class="border-r border-gray-400 p-2">📊 <?php _e("Кол-во рядов", "treba-wp"); ?></td>
                  <td class="p-2"><?php echo carbon_get_the_post_meta("crb_slot_rows"); ?></td>
                </tr>
                <tr class="border-b border-gray-400">
                  <td class="border-r border-gray-400 p-2">🕹️ <?php _e("Игровое поле", "treba-wp"); ?></td>
                  <td class="p-2"><?php echo carbon_get_the_post_meta("crb_slot_reels"); ?>-<?php echo carbon_get_the_post_meta("crb_slot_rows"); ?></td>
                </tr>
                <tr class="border-b border-gray-400">
                  <td class="border-r border-gray-400 p-2">🎰 <?php _e("Выигрышных линий", "treba-wp"); ?></td>
                  <td class="p-2"><?php echo carbon_get_the_post_meta("crb_slot_qtyline"); ?></td>
                </tr>
                <tr class="border-b border-gray-400">
                  <td class="border-r border-gray-400 p-2">🎢 <?php _e("Волатильность", "treba-wp"); ?></td>
                  <td class="p-2"><?php echo carbon_get_the_post_meta("crb_slot_volatilyti"); ?></td>
                </tr>
                <tr class="border-b border-gray-400">
                  <td class="border-r border-gray-400 p-2">📈 <?php _e("RTP", "treba-wp"); ?></td>
                  <td class="p-2"><?php echo carbon_get_the_post_meta("crb_slot_rtp"); ?></td>
                </tr>
                <tr class="border-b border-gray-400">
                  <td class="border-r border-gray-400 p-2">🎲 <?php _e("Частота выигрышей", "treba-wp"); ?></td>
                  <td class="p-2"><?php echo carbon_get_the_post_meta("crb_slot_frequency"); ?></td>
                </tr>
                <tr class="border-b border-gray-400">
                  <td class="border-r border-gray-400 p-2">🏆 <?php _e("Максимальный выигрыш", "treba-wp"); ?></td>
                  <td class="p-2"><?php echo carbon_get_the_post_meta("crb_slot_maxwin"); ?></td>
                </tr>
                <tr class="border-b border-gray-400">
                  <td class="border-r border-gray-400 p-2">🎉 <?php _e("Максимальная вероятность выигрыша", "treba-wp"); ?></td>
                  <td class="p-2"><?php echo carbon_get_the_post_meta("crb_slot_max_win_prob"); ?></td>
                </tr>
                <tr class="border-b border-gray-400">
                  <td class="border-r border-gray-400 p-2">🎁 <?php _e("Бонусный раунд", "treba-wp"); ?></td>
                  <td class="p-2"><?php echo carbon_get_the_post_meta("crb_slot_bonusraund"); ?></td>
                </tr>
                <tr class="border-b border-gray-400">
                  <td class="border-r border-gray-400 p-2">💵 <?php _e("Минимальная ставка", "treba-wp"); ?></td>
                  <td class="p-2"><?php echo carbon_get_the_post_meta("crb_slot_minbet"); ?></td>
                </tr>
                <tr class="border-b border-gray-400">
                  <td class="border-r border-gray-400 p-2">💰 <?php _e("Максимальная ставка", "treba-wp"); ?></td>
                  <td class="p-2"><?php echo carbon_get_the_post_meta("crb_slot_maxbet"); ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="mb-2">
          <h2 class="h2 inline-block bg-black/90 text-white rounded -rotate-1 px-4 py-2 mb-4"><?php _e("Наши оценки", "treba-wp"); ?></h2>
          <div>
            <div class="flex items-center mb-4">
              <div class="w-1/2 lg:w-2/5 text-gray-600 whitespace-nowrap mr-6"><?php _e("Общая тема", "treba-wp"); ?>: </div>
              <div class="w-1/2 lg:w-3/5 rating-row relative font-semibold">
                <div class="flex items-center text-sm text-center border bg-gray-200 rounded-xl py-1">
                  <div class="relative z-1" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_theme"); ?>%">
                    <span><?php echo carbon_get_the_post_meta("crb_slot_rating_theme"); ?> / 100</span>
                  </div>
                  <div class="h-full absolute left-0 top-0 bg-green-400 border border-gray-400 rounded-xl text-center" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_theme"); ?>%"></div>
                </div>
              </div>
            </div>
            <div class="flex items-center mb-4">
              <div class="w-1/2 lg:w-2/5 text-gray-600 whitespace-nowrap mr-6"><?php _e("Геймплей", "treba-wp"); ?>: </div>
              <div class="w-1/2 lg:w-3/5 rating-row relative font-semibold">
                <div class="flex items-center text-sm text-center border bg-gray-200 rounded-xl py-1">
                  <div class="relative z-1" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_gameplay"); ?>%">
                    <span><?php echo carbon_get_the_post_meta("crb_slot_rating_gameplay"); ?> / 100</span>
                  </div>
                  <div class="h-full absolute left-0 top-0 bg-green-400 border border-gray-400 rounded-xl text-center" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_gameplay"); ?>%"></div>
                </div>
              </div>
            </div>
            <div class="flex items-center mb-4">
              <div class="w-1/2 lg:w-2/5 text-gray-600 whitespace-nowrap mr-6"><?php _e("Дизайн и графика", "treba-wp"); ?>: </div>
              <div class="w-1/2 lg:w-3/5 rating-row relative font-semibold">
                <div class="flex items-center text-sm text-center border bg-gray-200 rounded-xl py-1">
                  <div class="relative z-1" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_design"); ?>%">
                    <span><?php echo carbon_get_the_post_meta("crb_slot_rating_design"); ?> / 100</span>
                  </div>
                  <div class="h-full absolute left-0 top-0 bg-green-400 border border-gray-400 rounded-xl text-center" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_design"); ?>%"></div>
                </div>
              </div>
            </div>
            <div class="flex items-center mb-4">
              <div class="w-1/2 lg:w-2/5 text-gray-600 whitespace-nowrap mr-6"><?php _e("Звуковые эффекты", "treba-wp"); ?>: </div>
              <div class="w-1/2 lg:w-3/5 rating-row relative font-semibold">
                <div class="flex items-center text-sm text-center border bg-gray-200 rounded-xl py-1">
                  <div class="relative z-1" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_audio"); ?>%">
                    <span><?php echo carbon_get_the_post_meta("crb_slot_rating_audio"); ?> / 100</span>
                  </div>
                  <div class="h-full absolute left-0 top-0 bg-green-400 border border-gray-400 rounded-xl text-center" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_audio"); ?>%"></div>
                </div>
              </div>
            </div>
            <div class="flex items-center mb-4">
              <div class="w-1/2 lg:w-2/5 text-gray-600 whitespace-nowrap mr-6"><?php _e("Музыка в игре", "treba-wp"); ?>: </div>
              <div class="w-1/2 lg:w-3/5 rating-row relative font-semibold">
                <div class="flex items-center text-sm text-center border bg-gray-200 rounded-xl py-1">
                  <div class="relative z-1" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_music"); ?>%">
                    <span><?php echo carbon_get_the_post_meta("crb_slot_rating_music"); ?> / 100</span>
                  </div>
                  <div class="h-full absolute left-0 top-0 bg-green-400 border border-gray-400 rounded-xl text-center" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_music"); ?>%"></div>
                </div>
              </div>
            </div>
            <div class="flex items-center mb-4">
              <div class="w-1/2 lg:w-2/5 text-gray-600 whitespace-nowrap mr-6"><?php _e("Бонусы и фишки", "treba-wp"); ?>: </div>
              <div class="w-1/2 lg:w-3/5 rating-row relative font-semibold">
                <div class="flex items-center text-sm text-center border bg-gray-200 rounded-xl py-1">
                  <div class="relative z-1" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_bonus"); ?>%">
                    <span><?php echo carbon_get_the_post_meta("crb_slot_rating_bonus"); ?> / 100</span>
                  </div>
                  <div class="h-full absolute left-0 top-0 bg-green-400 border border-gray-400 rounded-xl text-center" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_bonus"); ?>%"></div>
                </div>
              </div>
            </div>
            <div class="flex items-center mb-4">
              <div class="w-1/2 lg:w-2/5 text-gray-600 whitespace-nowrap mr-6"><?php _e("Уровень сложности", "treba-wp"); ?>: </div>
              <div class="w-1/2 lg:w-3/5 rating-row relative font-semibold">
                <div class="flex items-center text-sm text-center border bg-gray-200 rounded-xl py-1">
                  <div class="relative z-1" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_difficult"); ?>%">
                    <span><?php echo carbon_get_the_post_meta("crb_slot_rating_difficult"); ?> / 100</span>
                  </div>
                  <div class="h-full absolute left-0 top-0 bg-green-400 border border-gray-400 rounded-xl text-center" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_difficult"); ?>%"></div>
                </div>
              </div>
            </div>
            <div class="flex items-center mb-4">
              <div class="w-1/2 lg:w-2/5 text-gray-600 whitespace-nowrap mr-6"><?php _e("Оригинальность", "treba-wp"); ?>: </div>
              <div class="w-1/2 lg:w-3/5 rating-row relative font-semibold">
                <div class="flex items-center text-sm text-center border bg-gray-200 rounded-xl py-1">
                  <div class="relative z-1" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_original"); ?>%">
                    <span><?php echo carbon_get_the_post_meta("crb_slot_rating_original"); ?> / 100</span>
                  </div>
                  <div class="h-full absolute left-0 top-0 bg-green-400 border border-gray-400 rounded-xl text-center" style="width:<?php echo carbon_get_the_post_meta("crb_slot_rating_original"); ?>%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
          $args = array( 
            'post_type' => 'attachment', 
            'post_mime_type' => 'image',
            'numberposts' => -1, 
            'post_status' => null, 
            'post_parent' => $post->ID 
          ); 
          $attached_images = get_posts( $args );
          var_dump($attached_images);
          ?>
        <?php $cover = $attached_images[0]->guid; if ($cover): ?>
          <img class="w-full object-cover rounded-lg mb-6" alt="<?php the_title(); ?>" src="<?php echo $cover; ?>" loading="lazy">
        <?php endif; ?>
        <div>
          <div class="flex items-center mb-2">
            <div class="mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
              </svg>
            </div>
            <?php _e("Информация обновленна", "treba-wp"); ?>: <?php echo get_the_date('d.m.Y'); ?>
          </div>
          <div class="flex items-center">
            <div class="mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              </svg>
            </div>
            <?php _e("Просмотров", "treba-wp"); ?>: <?php echo $countNumber; ?>
          </div>
        </div>
      </div>
      <div class="w-full lg:w-4/12 lg:px-6">
        <div class="bg-black/90 text-white rounded sticky top-4">
          <div class="bg-red-500 text-xl text-white font-extrabold text-center rounded-t px-4 py-2">🏆 <?php _e("Лучшие казино", "treba-wp"); ?></div>
          <div class="text-center border-b border-gray-600 py-2"><?php _e("Рекомендуем проверенные казино", "treba-wp"); ?></div>
          <div class="border-b border-gray-600 py-4">
            <div class="flex flex-wrap items-center mb-4">
              <div class="w-1/3 px-4">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/pinup-logo.svg" alt="Pin-up" loading="lazy" >
              </div>
              <div class="w-2/3 px-4">
                <div class="text-2xl font-extrabold">Pin-up</div>
                <div class="text-custom-yellow">Бонус за первый депозит +400% и 250 FS</div>
              </div>
            </div>
            <div class="px-4"><a href="" class="inline-block w-full bg-custom-yellow text-center text-black rounded px-4 py-2">Играть</a></div>
          </div>
          <div class="border-b border-gray-600 py-4">
            <div class="flex flex-wrap items-center mb-4">
              <div class="w-1/3 px-4">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slots-city-logo.svg" alt="Slots City" loading="lazy" >
              </div>
              <div class="w-2/3 px-4">
                <div class="text-2xl font-extrabold">Slots City</div>
                <div class="text-custom-yellow">Новым игрокам +200 000 ₴ и 500 FS</div>
              </div>
            </div>
            <div class="px-4"><a href="" class="inline-block w-full bg-custom-yellow text-center text-black rounded px-4 py-2">Играть</a></div>
          </div>
          <div class="py-4">
            <div class="flex flex-wrap items-center mb-4">
              <div class="w-1/3 px-4">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/favbet-logo.svg" alt="Slots City" loading="lazy" >
              </div>
              <div class="w-2/3 px-4">
                <div class="text-2xl font-extrabold">Favbet</div>
                <div class="text-custom-yellow">Приветственный бонус до 10 000 ₴</div>
              </div>
            </div>
            <div class="px-4"><a href="" class="inline-block w-full bg-custom-yellow text-center text-black rounded px-4 py-2">Играть</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="bg-white py-8">
  <div class="container">
    <div class="text-center">
      <h2 class="h2 inline-block bg-black/90 text-white rounded -rotate-1 px-4 py-2 mb-6"><?php _e("Похожие слоты", "treba-wp"); ?></h2>
    </div>
    
    <div class="flex flex-wrap -mx-2">
      <?php 
      $slots = new WP_Query( array( 
        'post_type' => 'slots', 
        'posts_per_page' => 15,
        'orderby' => 'rand'
      ) );
      if ($slots->have_posts()) : while ($slots->have_posts()) : $slots->the_post(); 
      ?>
        <div class="w-1/2 md:w-1/3 lg:w-1/5 px-2 mb-4">
          <?php get_template_part("template-parts/slots/item"); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
  </div>
</div>


<?php endwhile; endif; ?>

<?php get_footer();