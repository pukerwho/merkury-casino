<?php get_header(); ?>

<?php $countNumber = tutCount(get_the_ID()); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div>
  <div class="breadcrumbs text-sm mb-4" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
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
  <div class="card mb-6">
    <div class="border-b border-main-border p-4">
      <h1 class="text-2xl lg:text-3xl font-semibold mb-4"><?php the_title(); ?></h1>
      <div class="flex flex-wrap text-gray-600 text-sm">
        <div class="w-full lg:w-1/2">
          <div><span class="font-semibold"><?php _e("Дата", "treba-wp"); ?></span>: <?php echo get_the_date('d.m.Y'); ?></div>
          <div>
            <span class="font-semibold"><?php _e("Автор", "treba-wp"); ?></span>: 
            <?php if (carbon_get_the_post_meta('crb_post_author')): ?>
              <span><?php echo carbon_get_the_post_meta('crb_post_author'); ?></span>
            <?php else: ?>
              <span><?php echo get_the_author(); ?></span>
            <?php endif; ?>
          </div>
        </div>
        <div class="w-full lg:w-1/2">
          <div><span class="font-semibold"><?php _e("Переглядів", "treba-wp"); ?></span>: <?php echo $countNumber; ?></div>
          <div>
            <span class="font-semibold"><?php _e("Коментарів", "treba-wp"); ?></span> 
            <?php 
              $post__in = get_the_ID();
              $args = array(
                'type' => 'comment',
                'post__in' => $post__in,
                'status' => 'approve'
              );
              $comments = get_comments( $args );
              echo count($comments);
            ?>
          </div>
        </div>
      </div>
    </div>
    <?php $large_thumb = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
    <?php if ($large_thumb): ?>
      <div>
        <img class="w-full object-cover" alt="<?php the_title(); ?>" src="<?php echo $large_thumb; ?>" loading="lazy">
      </div>
    <?php endif; ?>
    <div class="content">
      <div class="p-4"><?php the_content(); ?></div>
    </div>
  </div>

  <div class="card mb-6">
    <div class="card-title">
      📣 <?php _e("Коментарі", "treba-wp"); ?>
      <div class="text-base font-light"><?php _e("Ви можете поділитися своєю думкою або поставити запитання", "treba-wp"); ?></div>
    </div>
    <div>
      <?php comments_template(); ?>
    </div>
  </div>

  <div class="card mb-6">
    <div class="card-title">
      📝 <?php _e("Схожі статті", "treba-wp"); ?>
    </div>
    <div>
      <?php 
        $current_id = get_the_ID();
        $other_query = new WP_Query( array( 
          'post_type' => 'post', 
          'posts_per_page' => 5,
          'post__not_in' => array($current_id),
          'orderby' => 'rand',
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'terms' => $post_category,
              'field' => 'term_id',
              'include_children' => true,
              'operator' => 'IN'
            )
          ),
        ) );
      if ($other_query->have_posts()) : while ($other_query->have_posts()) : $other_query->the_post(); ?>
        <div class="border-b border-main-border px-4 py-4">
          <?php get_template_part("template-parts/posts/post-item"); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
  </div>
  
</div>

<?php endwhile; endif; ?>

<?php get_footer();