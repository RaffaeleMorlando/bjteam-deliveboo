require('../../bootstrap');

import axios from 'axios';
// import axios from 'axios';
import Vue from 'vue';

const prova = new Vue({
  el: '#main_home_page_guest',
  data: {
    categories : [],
    searchedRestaurants: [],
    isChecked: false,
    headerStatus: false
  },

  mounted() {
    axios.get('api/categories')
      .then(response => {
        this.categories = response.data;
        console.log(this.categories);
      });
},

  methods: {
    getRestaurantsByCategory: function(index){

      const self = this;
      self.searchedRestaurants = [];

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
          setTimeout(() => {
            self.scrollToElement({behavior: 'smooth'});
          }, 300);

        });


    },

    scrollToElement: function(options){
      const el = this.$el.getElementsByClassName('searched_restaurants_container')[0];

      if (el) {
        el.scrollIntoView(options);
      }
    },

    checked: function(){
      this.isChecked = !this.isChecked;
      console.log(this.isChecked);
    }

  },


});
