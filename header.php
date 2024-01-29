<?php
$current_title = wp_get_document_title();

// FOR Main Page
if ( is_home() ) {
  $home_title = crb_get_i18n_theme_option('crb_seo_mainpage_title'); 
  $home_description = crb_get_i18n_theme_option('crb_seo_mainpage_description'); 
  if ($home_title) {
    $current_title = $home_title;
  }
  if ($home_description) {
    $current_description = $home_description;
  }
}

// FOR POSTs
if ( is_singular( 'post' ) ) {
  $post_title = carbon_get_the_post_meta('crb_post_title');
  $post_description = carbon_get_the_post_meta('crb_post_description');
  if ($post_title) {
    $current_title = $post_title;
  }
  if ($post_description) {
    $current_description = $post_description;
  }
}

// FOR CASINO
if ( is_singular( 'casino' ) ) {
  $post_title = carbon_get_the_post_meta('crb_casino_title');
  $post_description = carbon_get_the_post_meta('crb_casino_description');
  if ($post_title) {
    $current_title = $post_title;
  }
  if ($post_description) {
    $current_description = $post_description;
  }
}

// FOR SLOTS
if ( is_singular( 'slots' ) ) {
  $post_title = carbon_get_the_post_meta('crb_slot_title');
  $post_description = carbon_get_the_post_meta('crb_slot_description');
  if ($post_title) {
    $current_title = $post_title;
  }
  if ($post_description) {
    $current_description = $post_description;
  }
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php echo $current_title; ?></title>
  <?php if ($current_description): ?>
    <meta name="description" content="<?php echo $current_description; ?>"/>
  <?php endif; ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

  <?php if (is_singular()): ?>
    <meta property="og:title" content="<?php echo $current_title; ?>" />
    <?php if ($current_description): ?>
      <meta property="og:description" content="<?php echo $current_description; ?>" />
    <?php else: ?>
      <?php 
        $content_text_for_description = wp_strip_all_tags( get_the_content() );
      ?>
      <meta property="og:description" content="<?php echo mb_strimwidth($content_text_for_description, 0, 150, '...'); ?>" />
    <?php endif; ?>
    <?php if (get_the_post_thumbnail_url()): ?>
      <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>">
    <?php else: ?>
      <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/images/check-tarakan.png">  
    <?php endif; ?>
    <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
    <meta property="og:url" content="<?php echo $actual_link; ?>" />
    <meta property="og:article:published_time" content="<?php echo get_post_time('Y/n/j'); ?>" />
    <meta property="og:article:article:modified_time" content="<?php echo get_the_modified_time('Y/n/j'); ?>" />
    
    <?php if (carbon_get_the_post_meta('crb_post_author')): ?>
      <meta property="og:article:author" content="<?php echo carbon_get_the_post_meta('crb_post_author'); ?>" />
    <?php else: ?>
      <meta property="og:article:author" content="<?php echo get_the_author(); ?>" />
    <?php endif; ?>
  
  <?php endif; ?>
	
	<?php wp_head(); ?>
	<?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<header>
    <!-- TOP HEADER -->
    <div class="hidden md:block bg-black/90 py-3">
      <div class="container">
        <ul class="flex items-center -mx-4">
          <li class="px-4"><a href="/about" class="text-gray-200">👋 <?php _e("Про нас", "treba-wp"); ?></a></li>
          <li class="px-4"><a href="<?php echo get_page_url("page-blog"); ?>" class="text-gray-200">📝 <?php _e("Блог", "treba-wp"); ?></a></li>
          <li class="px-4"><a href="/contacts" class="text-gray-200">📬 <?php _e("Контакты", "treba-wp"); ?></a></li>
        </ul>
      </div>
    </div>
    <!-- END TOP HEADER -->

    <!-- BOTTOM HEADER -->
    <div class="py-4">
      <div class="container">
        <div class="flex flex-wrap items-center justify-between">
          <div>
            <a href="<?php echo get_home_url(); ?>" class="bg-blue-500 rounded px-4 py-2 text-xl text-white font-extrabold">Merkury</a>
          </div>
          <div class="ml-10">
            <nav class="hidden md:block menu">
              <ul class="flex items-center -mx-4">
                <li class="px-4">🎰 <a href="<?php echo get_post_type_archive_link("e"); ?>" class="text-gray-800"><?php _e("Слоты", "treba-wp"); ?></a></li>
                <li class="px-4">🎲 <a href="<?php echo get_page_url("page-reviews"); ?>" class="text-gray-800"><?php _e("Казино", "treba-wp"); ?></a></li>
                <li class="px-4">👨‍💻 <a href="<?php echo get_page_url("page-categories"); ?>" class="text-gray-800"><?php _e("Розработчики", "treba-wp"); ?></a></li>
                <li class="px-4">📣 <a href="<?php echo get_page_url("page-cities"); ?>" class="text-gray-800"><?php _e("Отзывы", "treba-wp"); ?></a></li>
              </ul>
            </nav>
            <!-- Mobile toggle -->
            <div class="block md:hidden">
              <div class="menu-open-js">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
              </div>
              <div class="menu-close-js hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </div>
            </div>
            <!-- END Mobile toggle -->
          </div>
        </div>
      </div>
    </div>
    <!-- END BOTTOM HEADER -->

    <!-- Mobile menu --> 
    <div class="mobile-menu hidden">
      <div class="w-full min-h-full bg-gray-100 fixed left-0 z-2">
        <div class="container py-4">
          <div>
            <ul class="flex flex-col text-lg">
              <li class="mb-4">👋 <a href="#" class="hover:text-blue-500"><?php _e("About us", "treba-wp"); ?></a></li>
              <li class="mb-4">🛎️ <a href="<?php echo get_post_type_archive_link("e"); ?>" class="hover:text-blue-500"><?php _e("All places", "treba-wp"); ?></a></li>
              <li class="mb-4">💬 <a href="<?php echo get_page_url("page-reviews"); ?>" class="hover:text-blue-500"><?php _e("Reviews", "treba-wp"); ?></a></li>
              <li class="mb-4">📑 <a href="<?php echo get_page_url("page-categories"); ?>" class="hover:text-blue-500"><?php _e("Categories", "treba-wp"); ?></a></li>
              <li class="mb-4">🏢 <a href="<?php echo get_page_url("page-cities"); ?>" class="hover:text-blue-500"><?php _e("Cities", "treba-wp"); ?></a></li>
              <li class="mb-4">📝 <a href="#" class="hover:text-blue-500"><?php _e("Blog", "treba-wp"); ?></a></li>
              <li class="mb-4">📬 <a href="#" class="hover:text-blue-500"><?php _e("Contacts", "treba-wp"); ?></a></li>
            </ul>
          </div>
        </div>
      </div>
      
    </div>
    <!-- END Mobile menu --> 
    
  </header>

  <div class="mobile-menu -translate-x-full">
    <div>
      <?php wp_nav_menu([
        'theme_location' => 'header',
        'container' => 'div',
        'menu_class' => 'block'
      ]); ?> 
    </div>
  </div>

  