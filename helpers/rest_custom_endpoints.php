<?php
add_action( 'rest_api_init', function () {
  register_rest_route( 'menu/v1/', 'get', array(
    'methods' => 'GET',
    'callback' => 'get_menu'
  ));
});

function get_menu($request)
{
  $args = array(
    'post_type' => 'menu',
    'posts_per_page' => -1
  );

  $post_array = new WP_Query($args);
  $post_array = $post_array->posts;

  foreach ($post_array as $post)
  {
    $post->prize = get_field('precio', $post->ID);
    $post->post_image = get_the_post_thumbnail_url($post->ID);
    $post->categories = array();

    $post_categories = wp_get_post_categories( $post->ID );

    foreach($post_categories as $category_id) {
      $cat = get_category( $category_id );
      $post->categories[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
    }
  }

  return $post_array;
}