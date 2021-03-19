require('../../bootstrap');

import axios from 'axios';

import Vue from 'vue';

const menuRestaurant = new Vue({
  el: '#menu-restaurant',
  data: {
    heroStatus: false,
    currentUrl: window.location.href,
    restaurant: [],
    menu: [],
    categories: []
  },

  mounted() {

    const self = this;

    window.addEventListener('scroll', () => {
      if (window.scrollY > 1) {
        this.heroStatus = true;
      } else {
        this.heroStatus = false;
      };
    });


    //Fetch api per recupero ristorante
    let stringSplitterd = this.currentUrl.split('/');
    let slug = stringSplitterd[stringSplitterd.length - 1];

    axios
      .get(`/api/restaurant/${slug}`)
      .then(response => {
          
          let data = response.data;
          // console.log(data[0].products);

          self.restaurant = data;
          console.log(restaurant);

          // self.restaurant = ristorante[0]; // tutto il ristorante
          // console.log(restaurant, 'restaurant');

          // self.menu = ristorante.products; // solo il menu
          // console.log(menu,'menu');

          // self.categories = ristorante.categories; // solo categorie
          // console.log(categories,'categories');

      });

  },
  methods: {

  }

});
