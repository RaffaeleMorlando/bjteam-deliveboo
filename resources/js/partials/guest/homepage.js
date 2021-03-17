require('../../bootstrap');

import axios from 'axios';
// import axios from 'axios';
import Vue from 'vue';

const prova = new Vue({
  el: '#main_home_page_guest',
  data: {
    categories : [],
    searchedRestaurants: [],
  },
  
  created() {
    axios.get('api/categories')
      .then(response => {
        this.categories = response.data;
        console.log(this.categories);
      });
  },
  
  methods: {
    getRestaurantsByCategory: function(index){

      const self = this;

      axios
        .get('api/restaurants')
        .then(response => {
          const restaurants = response.data;
          const clickedCategory = self.categories[index].name;
          console.log(clickedCategory);
          restaurants.forEach((restaurant) => {
            restaurant.categories.forEach((category) => {
              if(category.name == clickedCategory){
                self.searchedRestaurants.push(restaurant);
              }  
            })
                      
          });
          // console.log(response.data);
          console.log(self.searchedRestaurants);
        });
    }

  }

});
