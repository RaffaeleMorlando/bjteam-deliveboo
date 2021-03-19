require('../../bootstrap');

import axios from 'axios';

import Vue from 'vue';

const menuRestaurant = new Vue({
  el: '#menu-restaurant',
  data: {
    heroStatus: false,
    currentUrl: window.location.href,
    restaurant: {},
    menu: [],
    categories: [],
    cartProducts: [],
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

        self.restaurant = response.data[0];

        self.menu = self.restaurant.products;

        self.categories = self.restaurant.categories;

      });

     if(JSON.parse(window.localStorage.getItem('cart')) == null){
        this.cartProducts = [];
     } else {
        this.cartProducts = (JSON.parse(window.localStorage.getItem('cart')));
     }

  },
  methods: {
    addToCart: function(index){
      const self = this;

      self.menu[index].counter = 1;

      //Verifica prodotto già presente
      if(!self.cartProducts.includes(self.menu[index])){
        self.cartProducts.push(self.menu[index]);
      }

      window.localStorage.setItem('cart', JSON.stringify(self.cartProducts));

      console.log(JSON.parse(window.localStorage.getItem('cart')));

      self.cartProducts = JSON.parse(window.localStorage.getItem('cart'));

      window.localStorage.setItem('cart', JSON.stringify(self.cartProducts));
    },

    clearCart: function(){
      window.localStorage.removeItem('cart');
      this.cartProducts = [];
    },

    incrementCounter: function(index){
      console.log(this.cartProducts[index].counter);
      this.cartProducts[index].counter++;
      this.cartProducts = window.localStorage.setItem('cart', JSON.stringify(this.cartProducts));
      this.cartProducts = JSON.parse(window.localStorage.getItem('cart'));
      this.$forceUpdate();
    },

    decrementCounter: function(index){
      if(this.cartProducts[index].counter > 1){
        this.cartProducts[index].counter--;
        this.$forceUpdate();
      } else{
        this.cartProducts.splice(index, 1);
        window.localStorage.clear();
        window.localStorage.setItem('cart', JSON.stringify(this.cartProducts));
      }


    },
  }

});
