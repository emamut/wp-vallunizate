<template>
  <div class="max-w-sm w-full lg:max-w-full lg:flex shadow-md cursor-pointer">
    <div
      class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
      :style="{ backgroundImage: 'url(' + item.post_image + ')' }"
      title="Woman holding a mug"
    ></div>
    <div
      class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal"
    >
      <div class="mb-8">
        <p class="text-sm text-gray-600 flex items-center">
          <span v-for="(category, key) in item.categories" :key="key">{{
            category.name + ' '
          }}</span>
        </p>
        <div class="text-gray-900 font-bold text-xl mb-2">
          {{ item.post_title }}
        </div>
        <p class="text-gray-700 text-base">{{ item.post_excerpt }}</p>
      </div>
      <div class="flex items-center">
        <p class="text-orange-700 font-bold leading-none text-xl">
          Valor: {{ item.prize | currency }} <small>por unidad</small>
        </p>
        <input
          type="number"
          class="border-2 bg-gray-200 rounded ml-4 px-2 w-16"
          min="0"
          max="100"
          v-model="numOrders[arrayKey]"
          placeholder="0"
        />
        <button
          class="bg-green-500 hover:bg-green-700 text-white font-bold ml-3 px-4 rounded"
          @click="addToOrder(item, arrayKey)"
        >
          Añadir al carrito
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      numOrders: [],
    };
  },
  props: ['item', 'arrayKey'],
  mounted() {
    for (let cont = 0; cont < this.$parent.menuArray.length; cont++)
      this.numOrders[cont] = 0;
  },
  methods: {
    addToOrder: function(item, key) {
      let search = this.$parent.orderArray.findIndex((e) => e.id == item.ID);

      if (search == -1) {
        if (this.numOrders[key] > 0)
          this.$parent.orderArray.push({
            id: item.ID,
            name: item.post_title,
            prize: item.prize,
            quantity: this.numOrders[key],
          });
      } else this.$parent.orderArray[search].quantity = this.numOrders[key];

      this.$parent.sumOrder = this.$parent.orderArray.reduce(
        (accum, item) => accum + item.prize * item.quantity,
        0
      );
    },
  },
};
</script>
