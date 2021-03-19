require('../../bootstrap');

import axios from 'axios';
// import axios from 'axios';
import Vue from 'vue';

const prova = new Vue({
  el: '#main_home_page_guest',
  data: {
    categories : [],
    homeRestaurants: [],
    filteredRestaurants: [],
    isChecked: false,
    headerStatus: false
  },

  mounted() {

    //chiamata che mi restituisce tutte le categorie presenti nel database
    axios.get('/api/categories')
      .then(response => {
        this.categories = response.data;
      });

    //chiamata che mi restituisce i ristoranti di default da mostrare nella homepage
    axios.get('/api/restaurants')
      .then(response => {
        this.homeRestaurants = response.data;
        console.log(this.homeRestaurants);
      });

},

  methods: {
    getRestaurantsByCategory: function(index){

      const self = this;
      const categoryParam = self.categories[index].name;
      self.filteredRestaurants = [];

      axios
        .get(`/api/restaurants/${categoryParam}`)
        .then(response => {

          const restaurants = response.data;
          self.filteredRestaurants = restaurants;

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
