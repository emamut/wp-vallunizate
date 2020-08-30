<!DOCTYPE html>
  <html lang="<?php language_attributes(); ?>" class="no-js">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); wp_title(); ?></title>

    <?php wp_head(); ?>
  </head>
  <body>
    <div id="app" v-cloak>
      <?php get_template_part( 'partials/menu', 'template' ); ?>
