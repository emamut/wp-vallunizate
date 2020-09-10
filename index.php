<?php get_header(); ?>

  <div class="container mx-auto">
    <order-component :order-array="orderArray"></order-component>
    <div class="flex flex-wrap">
      <card-component v-for="(item, key) in menuArray" :item="item" :key="item.ID" :array-key="key" class="my-5"></card-component>
    </div>
  </div>

<?php get_footer() ?>