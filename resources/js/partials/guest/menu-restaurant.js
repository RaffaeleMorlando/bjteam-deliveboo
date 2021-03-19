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
    products: [], //Array per local storage
    actualCart: []
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

  },
  methods: {
    addToCart: function(index){
      const self = this;
      
      if(JSON.parse(window.localStorage.getItem('cart')) == null){
        self.actualCart = [];
      } else{
        self.actualCart.push(JSON.parse(window.localStorage.getItem('cart')));
      }
     
      //Verifica prodotto già presente
      if(!self.products.includes(self.menu[index])){
        self.products.push(self.menu[index]);
        self.menu[index].counter = 1;
      } 

      //Popoliamo local storage in cart
      window.localStorage.setItem('cart', JSON.stringify(self.products[index]));

      //Salvataggio in una variabile
      self.actualCart.push(JSON.parse(window.localStorage.getItem('cart'))); 
      console.log(self.actualCart, 'ACTUALCART');

      console.log(self.products, 'CARRELLO'); 
      
      window.localStorage.setItem('cart', JSON.stringify(self.products));
    },

    clearCart: function(){
      window.localStorage.clear();
    },

    incrementCounter: function(index){
      console.log(this.products[index].counter);
      this.products[index].counter++;
      this.$forceUpdate();
    },

    decrementCounter: function(index){
      if(this.products[index].counter > 1){
        this.products[index].counter--;
        this.$forceUpdate();
      } else{
        this.products.splice(index, 1);
      }

     
    }
  }

});
