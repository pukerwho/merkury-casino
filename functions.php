<?php

if ( ! defined( 'TARAKAN_VERSION' ) ) {
	define( 'TARAKAN_VERSION', '1.0.0' );
}

if ( ! function_exists( 'tarakan_setup' ) ) :
	function tarakan_setup() {
		load_theme_textdomain( 'tarakan', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		// add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'tarakan' ),
        'footer' => esc_html__( 'Footer', 'tarakan' ),
        'main_cat' => esc_html__( 'Main Categories', 'tarakan' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		add_theme_support(
			'custom-background',
			apply_filters(
				'ginfo_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'tarakan_setup' );

function tarakan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tarakan_content_width', 640 );
}
add_action( 'after_setup_theme', 'tarakan_content_width', 0 );

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once __DIR__ . '/vendor/autoload.php';
    \Carbon_Fields\Carbon_Fields::boot();
    require_once get_template_directory() . '/inc/carbon-fields/carbon-fields-plugin.php';
    require_once get_template_directory() . '/inc/custom-fields/settings-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/post-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/page-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/term-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/comment-meta.php';
    require_once get_template_directory() . '/inc/custom-fields/gutenberg-blocks.php';
}

require_once get_template_directory() . '/inc/share-buttons.php';
require_once get_template_directory() . '/inc/filters.php';
require_once get_template_directory() . '/inc/footer-links.php';
require_once get_template_directory() . '/inc/post-vote.php';

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

function itsme_disable_feed() {
 wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );

include('inc/enqueues.php');

function tarakan_scripts() {
	wp_enqueue_style( 'tailwind', get_stylesheet_directory_uri() . '/build/tailwind.css', false, time() );
	wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/build/style.css', false, time() );
	
	wp_enqueue_script( 'all-scripts', get_template_directory_uri() . '/build/scripts.js', '','',true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
  $get_photo_lightbox = carbon_get_the_post_meta('crb_place_photos');
  if ($get_photo_lightbox) {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_style( 'lightbox-css', get_stylesheet_directory_uri() . '/build/lightbox.css', false, time() );
    wp_enqueue_script( 'lightbox-js', get_template_directory_uri() . '/build/lightbox.min.js', '','',true);
  }
}
add_action( 'wp_enqueue_scripts', 'tarakan_scripts' );

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/comments-functions.php';
require get_template_directory() . '/inc/customizer.php';

function create_post_type() {
  register_post_type( 'slots',
    array(
      'labels' => array(
        'name' => __( 'Ігрові автомати' ),
        'singular_name' => __( 'Слот' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-megaphone',
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions',  ),
    )
  );
  register_post_type( 'casino',
    array(
      'labels' => array(
        'name' => __( 'Казино' ),
        'singular_name' => __( 'Казино' )
      ),
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-megaphone',
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields', 'revisions',  ),

    )
  );
}
add_action( 'init', 'create_post_type' );

function category_register_taxonomy() {
  $args = array (
    'label' => 'Провайдери',
    'labels' => array(
      'menu_name' => 'Провайдери',
      'name' => 'Провайдери',
      'singular_name' => 'Провайдер',
    ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'query_var' => true,
    'has_archive' => true,
    'sort' => true,
    'rewrite' => array(
      'slug' => 'providers',
      'with_front'    => true,
      'hierarchical' => true,
    ),
  );

  register_taxonomy( 'providers', array( 'slots' ), $args );

  $type_args = array (
    'label' => 'Тип',
    'labels' => array(
      'menu_name' => 'Тип',
      'name' => 'Тип',
      'singular_name' => 'Тип',
    ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true,
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
    'show_in_rest' => true,
    'hierarchical' => true,
    'query_var' => true,
    'has_archive' => true,
    'sort' => true,
    'rewrite' => array(
      'slug' => 'type',
      'with_front'    => true,
      'hierarchical' => true,
    ),
  );

  register_taxonomy( 'slots-type', array( 'slots' ), $type_args );
}
add_action( 'init', 'category_register_taxonomy');


// add_action( 'init', 'add_meta_query_mainhide');
function add_meta_query_mainhide() {
  $posts_args = array('numberposts' => -1, 'post_type' => 'places');
  $all_posts = get_posts($posts_args);
  foreach ($all_posts as $post) {
    $post_id = $post->ID;
    $my_post = array(
      'ID' => $post_id,
      'comment_status' => 'open',
    );
    wp_update_post( $my_post );
    // update_post_meta($post_id, '_crb_post_mainhide', 'no');
  }
}

function open_place_comment($post_id) {
  $my_post = array(
    'ID' => $post_id,
    'post_type' => 'places',
    'comment_status' => 'open',
  );
  wp_update_post( $my_post );
}

// Создаем счетчик для записей
function tutCount($id) {
  
  if ( metadata_exists( 'post', $id, 'place_count' ) ) {
    $count_value = get_post_meta( $id, 'place_count', true );
    $count_value = $count_value + 1;
    update_post_meta( $id, 'place_count', $count_value );
  } else {
    add_post_meta( $id, 'place_count', '200', true);
  }
  $place_count = get_post_meta( $id, 'place_count', true );
  return $place_count;
  
}

function get_page_url($template_name) {
  $pages = get_posts([
    'post_type' => 'page',
    'post_status' => 'publish',
    'meta_query' => [
      [
        'key' => '_wp_page_template',
        'value' => $template_name.'.php',
        'compare' => '='
      ]
    ]
  ]);
  if(!empty($pages))
  {
    foreach($pages as $pages__value)
    {
      return get_permalink($pages__value->ID);
    }
  }
  return get_bloginfo('url');
}


function getMeta($post_id) {
  $tr_array_id = array();
  $tr_ids = pll_get_post_translations($post_id);
  foreach ($tr_ids as $tr_id) {
    array_push($tr_array_id, $tr_id);
  }
  foreach ($tr_array_id as $id) {
    // Еда
    // $meta_rating_food = 'rating_food_'.$id;
    $meta_rating_food = 'meta_rating_food';
    $random_rating_food = mt_rand(0, 99);
    $value_rating_food = '4.'.$random_rating_food;
    if ( ! metadata_exists( 'post', $id, $meta_rating_food ) ) {
      add_post_meta( $id, $meta_rating_food, $value_rating_food, true);
    }

    // Обслуживание
    // $meta_rating_service = 'rating_service_'.$id;
    $meta_rating_service = 'meta_rating_service';
    $random_rating_service = mt_rand(0, 99);
    $value_rating_service = '4.'.$random_rating_service;
    if ( ! metadata_exists( 'post', $id, $meta_rating_service ) ) {
      add_post_meta( $id, $meta_rating_service, $value_rating_service, true);
    }

    // Цена/качество
    // $meta_rating_price = 'rating_price_'.$id;
    $meta_rating_price = 'meta_rating_price';
    $random_rating_price = mt_rand(0, 99);
    $value_rating_price = '4.'.$random_rating_price;
    if ( ! metadata_exists( 'post', $id, $meta_rating_price ) ) {
      add_post_meta( $id, $meta_rating_price, $value_rating_price, true);
    }

    // Атмосфера
    // $meta_rating_atmosfera = 'rating_atmosfera_'.$id;
    $meta_rating_atmosfera = 'meta_rating_atmosfera';
    $random_rating_atmosfera = mt_rand(0, 99);
    $value_rating_atmosfera = '4.'.$random_rating_atmosfera;
    if ( ! metadata_exists( 'post', $id, $meta_rating_atmosfera ) ) {
      add_post_meta( $id, $meta_rating_atmosfera, $value_rating_atmosfera, true);
    }
  }
}

add_filter('get_the_archive_title', function ($title) {
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_author()) {
    $title = '<span class="vcard">' . get_the_author() . '</span>';
  } elseif (is_tax()) { //for custom post types
    $title = sprintf(__('%1$s'), single_term_title('', false));
  } elseif (is_post_type_archive()) {
    $title = post_type_archive_title('', false);
  }
  return $title;
});

//Carbonfields + Polylang
function crb_get_i18n_suffix() {
    $suffix = '';
    if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
        return $suffix;
    }
    $suffix = '_' . ICL_LANGUAGE_CODE;
    return $suffix;
}

function crb_get_i18n_theme_option( $option_name ) {
  $suffix = crb_get_i18n_suffix();
  return carbon_get_theme_option( $option_name . $suffix );
}

//Add Ajax
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl() {
  echo '<script type="text/javascript">
    var ajaxurl = "' . admin_url('admin-ajax.php') . '";
  </script>';
}

function my_custom_upload_mimes($mimes = array()) {
  $mimes['svg'] = "image/svg+xml";
  return $mimes;
}
add_action('upload_mimes', 'my_custom_upload_mimes');

function searchfilter($query) {
  if ($query->is_search && !is_admin() ) {
    if (isset($_GET['post_type'])) {
      $type = $_GET['post_type'];
      if ($type == 'places') {
        $query->set('post_type',array('places'));
      }
    }       
  }
  return $query;
}
add_filter('pre_get_posts','searchfilter');

function time_ago() {
  return sprintf( esc_html__( '%s тому', 'treba-wp' ), human_time_diff(get_comment_time ( 'U' ), current_time( 'timestamp' ) ) );
}
add_filter( 'get_comment_date', 'time_ago' );