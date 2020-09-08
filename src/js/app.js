import Vue from 'vue';
import axios from 'axios';

Vue.component(
  'card-component',
  require('./components/CardComponent.vue').default
);

const app = new Vue({
  el: '#app',
  data() {
    return {
      menuArray: [],
      orderArray: [],
    };
  },
  mounted: function() {
    let self = this;
    axios.get(siteURL + '/wp-json/menu/v1/get').then(function(response) {
      self.menuArray = response.data;
    });
  },
});
