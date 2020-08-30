import Vue from 'vue'
import axios from 'axios'

const app = new Vue({
  el: '#app',
  data: {
    menuArray: []
  },
  mounted() {
    let self = this

    axios.get(siteURL + '/wp-json/wp/v2/menu')
      .then(function (response) {
        self.menuArray = response.data
      })
  }
});