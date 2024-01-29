<?php get_header(); ?>

<?php 
  $countNumber = tutCount(get_the_ID()); 
  $current_cat_id = get_the_ID();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div>  
  <div class="card mb-6">
    <div class="card-title">
      <h1 class="text-2xl lg:text-3xl font-semibold"><?php the_title(); ?></h1>
    </div>
    <div class="px-4 py-4">
      <div class="flex items-center flex-wrap lg:-mx-4">
        <div class="w-full lg:w-1/3 lg:px-4 mb-4 lg:mb-0">
          <?php $logo = carbon_get_the_post_meta('crb_casino_logo'); if ($logo): ?>
            <img class="w-full object-cover rounded-lg mb-4" alt="<?php the_title(); ?>" src="<?php echo $logo; ?>" loading="lazy">
          <?php endif; ?>
          <div class="flex flex-wrap justify-between lg:-mx-2">
            <div class="w-full lg:w-1/2 mb-2 lg:mb-0 lg:px-2"><a href="<?php echo carbon_get_the_post_meta("crb_casino_link"); ?>" class="w-full inline-block bg-blue-500 text-white text-center rounded py-2"><?php _e("Вхід", "treba-wp"); ?></a></div>
            <div class="w-full lg:w-1/2 lg:px-2"><a href="<?php echo carbon_get_the_post_meta("crb_casino_link"); ?>" class="w-full inline-block border border-blue-500 text-center rounded py-2"><?php _e("Грати", "treba-wp"); ?></a></div>
          </div>
        </div>
        <div class="w-full lg:w-2/3 lg:px-4">
          <div class="mb-2"><span class="font-bold"><?php _e("Країна", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta("crb_casino_country"); ?></div>
          <?php if (carbon_get_the_post_meta("crb_casino_licence")): ?>
            <div class="mb-2"><span class="font-bold"><?php _e("Ліцензія", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta("crb_casino_licence_text"); ?></div>
          <?php endif; ?>
          <?php if (carbon_get_the_post_meta("crb_casino_urname")): ?>
            <div class="mb-2"><span class="font-bold"><?php _e("Юридична особа", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta("crb_casino_urname"); ?></div>
          <?php endif; ?>
          <?php if (carbon_get_the_post_meta("crb_casino_address")): ?>
            <div class="mb-2"><span class="font-bold"><?php _e("Місцезнаходження", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta("crb_casino_address"); ?></div>
          <?php endif; ?>
          <div class="mb-2"><span class="font-bold"><?php _e("Офіційний сайт", "treba-wp"); ?></span>: <a href="<?php echo carbon_get_the_post_meta("crb_casino_link"); ?>"><?php echo carbon_get_the_post_meta("crb_casino_site"); ?></a></div>
        </div>
      </div>
    </div>
    <?php if (carbon_get_the_post_meta("crb_casino_check")): ?>
      <div class="border-t border-main-border py-4 px-4">✅ <span class="italic"><?php _e("Казино перевірено, можна безтурботно грати!", "treba-wp"); ?></span></div>
    <?php endif; ?>
  </div>
  <div class="flex justify-center flex-wrap mb-4">
    <div class="nav-links mb-2"><a href="#content" class="underline px-2"><?php _e("Огляд", "treba-wp"); ?></a></div>
    <div class="nav-links mb-2"><a href="#bonus" class="underline px-2"><?php _e("Бонуси", "treba-wp"); ?></a></div>
    <div class="nav-links mb-2"><a href="#slots" class="underline px-2"><?php _e("Популярні слоти", "treba-wp"); ?></a></div>
    <div class="nav-links mb-2"><a href="#faq" class="underline px-2"><?php _e("FAQ", "treba-wp"); ?></a></div>
    <div class="nav-links mb-2"><a href="#reviews" class="underline px-2"><?php _e("Відгуки", "treba-wp"); ?></a></div>
  </div>
  <section id="content" class="mb-6">
    <div class="card">
      <div class="card-title">
        <?php _e("Огляд казино", "treba-wp"); ?> <?php the_title(); ?>
        <div class="text-base font-light"><?php _e("Все, що потрібно знати про казино", "treba-wp"); ?> <?php the_title(); ?></div>
      </div>
      <div>
        <div class="mb-4">
          <?php $large_thumb = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?> 
          <img src="<?php echo $large_thumb; ?>" alt="<?php the_title(); ?>" loading="lazy">
        </div>
        <div class="">
          <table class="w-full border-collapse">
            <tbody>
              <tr class="border-b border-main-border">
                <td class="font-medium p-4">🔐 <?php _e("Реєстрація", "treba-wp"); ?></td>
                <td class="p-4"><?php $registration_array = carbon_get_the_post_meta("crb_casino_registration"); foreach ($registration_array as $registration): ?> <?php echo $registration; ?>;  <?php endforeach; ?></td>
              </tr>
              <tr class="border-b border-main-border">
                <td class="font-medium p-4">🔒 <?php _e("Верифікація", "treba-wp"); ?></td>
                <td class="p-4"><?php $verification_array = carbon_get_the_post_meta("crb_casino_verification"); foreach ($verification_array as $verification): ?> <?php echo $verification; ?>;  <?php endforeach; ?></td>
              </tr>
              <tr class="border-b border-main-border">
                <td class="font-medium p-4">🔞 <?php _e("Мінімальний вік", "treba-wp"); ?></td>
                <td class="p-4"><?php echo carbon_get_the_post_meta("crb_casino_minage"); ?></td>
              </tr>
              <tr class="border-b border-main-border">
                <td class="font-medium p-4">💰 <?php _e("Мінімальний депозит", "treba-wp"); ?></td>
                <td class="p-4"><?php echo carbon_get_the_post_meta("crb_casino_mindep"); ?></td>
              </tr>
              <tr class="border-b border-main-border">
                <td class="font-medium p-4">🖥️ <?php _e("Платформи", "treba-wp"); ?></td>
                <td class="p-4"><?php $platforms_array = carbon_get_the_post_meta("crb_casino_platforms"); foreach ($platforms_array as $platforms): ?> <?php echo $platforms; ?>;  <?php endforeach; ?></td>
              </tr>
              <tr class="border-b border-main-border">
                <td class="font-medium p-4">💵 <?php _e("Валюта", "treba-wp"); ?></td>
                <td class="p-4"><?php $currency_array = carbon_get_the_post_meta("crb_casino_curruncy"); foreach ($currency_array as $currency): ?> <?php echo $currency; ?>;  <?php endforeach; ?></td>
              </tr>
              <tr class="border-b border-main-border">
                <td class="font-medium p-4">💸<?php _e("Мінімальна виплата", "treba-wp"); ?></td>
                <td class="p-4"><?php echo carbon_get_the_post_meta("crb_casino_minout"); ?></td>
              </tr>
              <tr class="border-b border-main-border">
                <td class="font-medium p-4">➡️ <?php _e("Способи поповнення", "treba-wp"); ?></td>
                <td class="p-4"><?php $typein_array = carbon_get_the_post_meta("crb_casino_typein"); foreach ($typein_array as $typein): ?> <?php echo $typein; ?>;  <?php endforeach; ?></td>
              </tr>
              <tr class="border-b border-main-border">
                <td class="font-medium p-4">⬅️ <?php _e("Способи виведення", "treba-wp"); ?></td>
                <td class="p-4"><?php $typeout_array = carbon_get_the_post_meta("crb_casino_typeout"); foreach ($typeout_array as $typeout): ?> <?php echo $typeout; ?>;  <?php endforeach; ?></td>
              </tr>
              <tr class="border-b border-main-border">
                <td class="font-medium p-4">🚀 <?php _e("Швидкість виводу", "treba-wp"); ?></td>
                <td class="p-4"><?php echo carbon_get_the_post_meta("crb_casino_speedout"); ?></td>
              </tr>
              <tr class="border-b border-main-border">
                <td class="font-medium p-4">🎮 <?php _e("Чи є", "treba-wp"); ?> <a href="https://danabol.com.ua/demo-rezhym-v-onlajn-kazyno-shho-cze-take/"> <?php _e("демо-режим", "treba-wp"); ?></a></td>
                <?php if (carbon_get_the_post_meta("crb_casino_demomode")): ?>
                  <td class="p-4">Так</td>
                <?php else: ?>
                  <td class="p-4">Немає</td>
                <?php endif; ?>
              </tr>
              <tr class="border-b border-main-border">
                <td class="font-medium p-4">🌐 <?php _e("Мова", "treba-wp"); ?></td>
                <td class="p-4"><?php $lang_array = carbon_get_the_post_meta("crb_casino_lang"); foreach ($lang_array as $lang): ?> <?php echo $lang; ?>;  <?php endforeach; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="border-b border-main-border p-4 mt-4">
          <div class="mb-4">
            <h3 class="text-xl font-medium mb-2"><?php _e("Переваги", "treb-wp"); ?></h3>
            <div>
              <ul>
                <?php 
                  $pros = carbon_get_the_post_meta("crb_casino_pros"); 
                  foreach ($pros as $pros_item):
                ?>
                  <li class="mb-1 last-of-type:mb-0"><span class="w-[10px] h-[10px] inline-block rounded-full bg-emerald-400 mr-3"></span><?php echo $pros_item["crb_casino_pros_item"]; ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <div class="mb-4">
            <h3 class="text-xl font-medium mb-2"><?php _e("Недоліки", "treba-wp"); ?></h3>
            <div>
              <ul>
                <?php 
                  $pros = carbon_get_the_post_meta("crb_casino_cons"); 
                  foreach ($pros as $pros_item):
                ?>
                  <li class="mb-1 last-of-type:mb-0"><span class="w-[10px] h-[10px] inline-block rounded-full bg-red-400 mr-3"></span><?php echo $pros_item["crb_casino_cons_item"]; ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="p-4">
          <h3 class="text-xl font-medium mb-2">⭐ <?php _e("Оцінки", "treb-wp"); ?></h3>
          <div class="flex flex-wrap lg:-mx-4">
            <div class="w-full lg:w-1/2 lg:px-4 mb-4">
              <?php $rating_bonus = carbon_get_the_post_meta("crb_casino_rating_bonus"); ?>
              <div class="flex items-cente justify-between mb-2">
                <div><?php _e("Бонуси та акції", "treba-wp"); ?></div>
                <div class="min-w-[32px] text-center font-medium border border-main-border px-2"><?php echo $rating_bonus; ?></div>
              </div>
              <div class="relative bg-main-border w-full h-[4px] rounded"><div class="absolute left-0 top-0 bg-blue-500 h-[4px] rounded" style="width: <?php echo $rating_bonus; ?>%"></div></div>
            </div>
            <div class="w-full lg:w-1/2 lg:px-4 mb-4">
              <?php $rating_ux = carbon_get_the_post_meta("crb_casino_rating_ux"); ?>
              <div class="flex items-cente justify-between mb-2">
                <div><?php _e("Зручність в користуванні", "treba-wp"); ?></div>
                <div class="min-w-[32px] text-center font-medium border border-main-border px-2"><?php echo $rating_ux; ?></div>
              </div>
              <div class="relative bg-main-border w-full h-[4px] rounded"><div class="absolute left-0 top-0 bg-blue-500 h-[4px] rounded" style="width: <?php echo $rating_ux; ?>%"></div></div>
            </div>
            <div class="w-full lg:w-1/2 lg:px-4 mb-4">
              <?php $rating_dovira = carbon_get_the_post_meta("crb_casino_dovira"); ?>
              <div class="flex items-cente justify-between mb-2">
                <div><?php _e("Надійність та довіра", "treba-wp"); ?></div>
                <div class="min-w-[32px] text-center font-medium border border-main-border px-2"><?php echo $rating_dovira; ?></div>
              </div>
              <div class="relative bg-main-border w-full h-[4px] rounded"><div class="absolute left-0 top-0 bg-blue-500 h-[4px] rounded" style="width: <?php echo $rating_dovira; ?>%"></div></div>
            </div>
            <div class="w-full lg:w-1/2 lg:px-4 mb-4">
              <?php $rating_pidtrimka = carbon_get_the_post_meta("crb_casino_pidtrimka"); ?>
              <div class="flex items-cente justify-between mb-2">
                <div><?php _e("Служба підтримки", "treba-wp"); ?></div>
                <div class="min-w-[32px] text-center font-medium border border-main-border px-2"><?php echo $rating_pidtrimka; ?></div>
              </div>
              <div class="relative bg-main-border w-full h-[4px] rounded"><div class="absolute left-0 top-0 bg-blue-500 h-[4px] rounded" style="width: <?php echo $rating_pidtrimka; ?>%"></div></div>
            </div>
          </div>
          <div class="w-full">
            <?php $rating = round(($rating_bonus + $rating_ux + $rating_dovira + $rating_pidtrimka)/4); ?>
            <div class="flex items-cente justify-between mb-2">
              <div><?php _e("Загальна оцінка", "treba-wp"); ?></div>
              <div class="min-w-[32px] text-center font-medium border border-main-border px-2"><?php echo $rating; ?></div>
            </div>
            <div class="relative bg-main-border w-full h-[4px] rounded"><div class="absolute left-0 top-0 bg-blue-500 h-[4px] rounded" style="width: <?php echo $rating; ?>%"></div></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="bonus" class="mb-6">
    <div class="card">
      <div class="card-title">
        <?php _e("Бонуси", "treba-wp"); ?>
        <div class="text-base font-light"><?php _e("Подарунки від казино", "treba-wp"); ?></div>
      </div>
      <div class="">
        <?php 
          $bonuses = carbon_get_the_post_meta("crb_casino_bonuses"); 
          foreach ($bonuses as $bonus):
        ?>
        <div class="flex justify-between items-center border-b border-main-border py-3 px-4">
          <div class="flex items-center">
            <div class="text-green-500 mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
              </svg>
            </div>
            <div><a href="<?php echo carbon_get_the_post_meta("crb_casino_link"); ?>"><?php echo $bonus["crb_casino_bonus"]; ?></a></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <section id="slots" class="mb-6">
    <div class="card">
      <div class="card-title">
        🎰 <?php _e("Популярні слоти", "treba-wp"); ?>
      </div>
      <div class="flex flex-wrap p-4 -mx-2">
        <?php 
          $top_post = new WP_Query( array( 
            'post_type' => 'slots', 
            'posts_per_page' => 5,
          ) );
          if ($top_post->have_posts()) : while ($top_post->have_posts()) : $top_post->the_post(); 
        ?>
          <div class="w-1/2 lg:w-1/3 px-2 mb-4">
            <?php get_template_part("template-parts/slots/item"); ?>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>
  <section id="faq" class="mb-6">
    <div class="card">
      <div class="card-title">
        <?php _e("FAQ", "treba-wp"); ?>
        <div class="text-base font-light"><?php _e("Питання та відповіді", "treba-wp"); ?></div>
      </div>
      <div itemscope itemtype="https://schema.org/FAQPage" class="p-4">
        <?php 
        $faqs = carbon_get_the_post_meta('crb_casino_faq');
        foreach( $faqs as $faq ): ?>
          <details itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="mb-3 last-of-type:mb-0">
            <summary class="zag" itemprop="name">
              <?php echo $faq['crb_casino_faq_question'] ?>	
            </summary> 
            <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="bg-gray-100 rounded-lg mt-2 p-4">
              <div itemprop="text">
                <p><?php echo $faq['crb_casino_faq_answer'] ?></p>
              </div>
            </div>
          </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <section id="reviews" class="mb-6">
    <div class="card">
      <div class="card-title">
        📣 <?php _e("Коментарі", "treba-wp"); ?>
      <div class="text-base font-light"><?php _e("Ви можете поділитися своєю думкою або поставити запитання", "treba-wp"); ?></div>
      </div>
      <div>
        <?php comments_template(); ?>
      </div>
    </div>
  </section>
  <div class="breadcrumbs text-sm mb-6" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <ul class="flex items-center flex-wrap">
      <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item mr-4 pl-8">
        <a itemprop="item" href="<?php echo home_url(); ?>">
          <span itemprop="name"><?php _e( 'Головна', 'treba-wp' ); ?></span>
        </a>                        
        <meta itemprop="position" content="1">
      </li>
      <?php 
      $post_categories = wp_get_post_categories( get_the_ID(), array('fields' => 'all') );
      foreach (array_slice($post_categories, 0,1) as $post_category): ?>
        <?php if ($post_category): ?>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item mr-4" >
          <a itemprop="item" href="<?php echo get_category_link($post_category->term_id) ?>">
            <span itemprop="name"><?php echo $post_category->name; ?></span>
          </a>
          <meta itemprop="position" content="2" />
        </li>
        <?php endif; ?>
      <?php endforeach; ?>
      <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item">
        <span itemprop="name"><?php the_title(); ?></span>
        <meta itemprop="position" content="3" />
      </li>
    </ul>
  </div>
</div>

<?php endwhile; endif; ?>

<?php get_footer();