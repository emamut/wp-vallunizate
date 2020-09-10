import Vue from 'vue';
import axios from 'axios';

Vue.component(
  'card-component',
  require('./components/CardComponent.vue').default
);

Vue.filter('currency', function(value) {
  let val = (value / 1).toFixed(0).replace('.', ',');
  return '$ ' + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
});

const app = new Vue({
  el: '#app',
  data() {
    return {
      menuArray: [],
      orderArray: [],
      hideOrder: true,
    };
  },
  mounted: function() {
    let self = this;
    axios.get(siteURL + '/wp-json/menu/v1/get').then(function(response) {
      self.menuArray = response.data;
    });
  },
  methods: {
    enableOrder: function() {
      if (this.orderArray.length == 0) return 'opacity-50 cursor-not-allowed';
    },
    displayOrder: function() {
      return this.hideOrder ? 'hidden' : 'block';
    },
    sendOrder: function() {
      let temp = '!Hola! Mi pedido es el siguiente: \n';

      this.orderArray.forEach(function(orderItem) {
        temp += orderItem.item.post_title + ' X ' + orderItem.quantity + '\n';
      });

      window.location =
        'https://wa.me/593999660044?text=' +
        encodeURIComponent(
          temp + '\n A continuación mi dirección para la entrega:\n '
        );
    },
  },
});
