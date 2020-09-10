<template>
  <div
    class="w-full border-dashed border-2 border-gray-600 p-5 mt-5"
    :class="displayOrder()"
  >
    <p class="text-xl font-bold">Su pedido:</p>
    <ul class="list-none">
      <li v-for="orderItem in orderArray" :key="orderItem.id">
        {{ orderItem.name }} X {{ orderItem.quantity }} =
        {{ (orderItem.prize * orderItem.quantity) | currency }}
      </li>
    </ul>

    <p class="text-xl font-bold">
      Valor total: {{ this.$parent.sumOrder | currency }}
    </p>

    <button
      class="bg-green-500 hover:bg-green-700 text-white font-bold mt-5 px-4 rounded"
      @click="sendOrder()"
    >
      Enviar via Whatsapp
    </button>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  props: ['orderArray'],
  methods: {
    displayOrder: function() {
      return this.$parent.hideOrder ? 'hidden' : 'block';
    },
    sendOrder: function() {
      let temp = '!Hola! Mi pedido es el siguiente: \n';

      this.orderArray.forEach(function(orderItem) {
        temp += orderItem.name + ' X ' + orderItem.quantity + '\n';
      });

      window.location =
        'https://wa.me/593999660044?text=' +
        encodeURIComponent(
          `${temp} \n *TOTAL: $ ${this.$parent.sumOrder}* \n A continuación mi dirección para la entrega:\n `
        );
    },
  },
};
</script>
