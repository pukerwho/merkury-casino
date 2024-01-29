<?php 
$current_cat_id = get_queried_object_id();
?>

<?php get_header(); ?>

<div class="card mb-6">
  <div class="card-title">
    <h1 class="text-2xl lg:text-3xl font-semibold"><?php single_term_title(); ?></h1>
  </div>
  <div class="flex items-center flex-wrap px-4 py-4">
    <?php $thumb = carbon_get_term_meta($current_cat_id, 'crb_provider_thumb'); ?>
    <?php if ($thumb): ?>
    <div class="mb-4 lg:mb-0 lg:mr-8">
      <img class="h-[100px] object-cover rounded-lg" alt="<?php the_title(); ?>" src="<?php echo $thumb; ?>" loading="lazy">
    </div>
    <?php endif; ?>
    <div>
      <div class="mb-2"><span class="font-bold"><?php _e("Країна", "treba-wp"); ?></span>: <?php echo carbon_get_term_meta($current_cat_id, "crb_provider_country"); ?></div>
      <div class="mb-2"><span class="font-bold"><?php _e("Кількість ігр", "treba-wp"); ?></span>: <?php $current_term = get_term( $current_cat_id, 'providers' ); echo $current_term->count; ?></div>
    </div>
  </div>
</div>

<div class="card mb-6">
  <div class="card-title">
    <?php _e("Ігри", "treba-wp"); ?>
  </div>
  <div class="flex flex-wrap p-4 -mx-2">
    <?php 
      $current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
      $posts = new WP_Query( array( 
        'post_type' => 'slots', 
        'posts_per_page' => 20,
        'tax_query' => array(
          array(
            'taxonomy' => 'providers',
            'terms' => $current_cat_id,
            'field' => 'term_id',
            'include_children' => true,
            'operator' => 'IN'
          )
        ),
      ) );
      if ($posts->have_posts()) : while ($posts->have_posts()) : $posts->the_post(); 
    ?>
      <div class="w-1/2 lg:w-1/3 px-2 mb-4">
        <div class="relative">
          <a href="<?php the_permalink(); ?>" class="w-full h-full absolute left-0 top-0 z-1"></a>
          <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"  alt="<?php echo carbon_get_the_post_meta("crb_slots_name"); ?>" loading="lazy" class="w-full h-full mb-2">
          <div class="text-center font-bold"><?php echo carbon_get_the_post_meta("crb_slots_name"); ?></div>
        </div>
      </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>

<?php get_footer(); ?>