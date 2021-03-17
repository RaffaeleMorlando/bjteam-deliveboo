require('../../bootstrap');

import axios from 'axios';
import Vue from 'vue';

const guest = new Vue({
  el: '#main_home_page_guest',
  data: {
    categories:[],
  },
  
  created() {
    var self= this;
    axios.get('api/categories')
      .then(response => {
        self.categories = response.data;
        console.log(self.categories);
      });
  },
  
  methods: {
    getRestaurantsByCategory: function (index) {
      axios.get('api/categories')
            .then(response => {
              console.log(response);
            });
    } 

  },

});
