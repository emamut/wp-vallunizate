<?php
function custom_wp_menu() {
  return wp_get_nav_menu_items(2);
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'wp/v2', 'menu', array(
    'methods' => 'GET',
    'callback' => 'custom_wp_menu',
  ) );
} );