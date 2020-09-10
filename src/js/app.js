import Vue from 'vue';
import axios from 'axios';

Vue.component(
  'card-component',
  require('./components/CardComponent.vue').default
);

Vue.component(
  'order-component',
  require('./components/OrderComponent.vue').default
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
      sumOrder: 0,
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
  },
});
