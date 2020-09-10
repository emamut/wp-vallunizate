<?php get_header(); ?>

  <div class="container mx-auto">
    <div class="w-full border-dashed border-2 border-gray-600 p-5 mt-5" :class="displayOrder()">
      <p class="text-xl">Su pedido:</p>
      <ul class="list-none">
        <li v-for="orderItem in orderArray">{{ orderItem.item.post_title }} X {{ orderItem.quantity }} = {{ orderItem.item.prize * orderItem.quantity | currency }} </li>
      </ul>

      <button
          class="bg-green-500 hover:bg-green-700 text-white font-bold mt-5 px-4 rounded"
          @click="sendOrder()"
        >
          Enviar via Whatsapp
        </button>
    </div>
    <div class="flex flex-wrap">
      <card-component v-for="(item, key) in menuArray" :item="item" :key="item.ID" :array-key="key" class="my-5"></card-component>
    </div>
  </div>

<?php get_footer() ?>