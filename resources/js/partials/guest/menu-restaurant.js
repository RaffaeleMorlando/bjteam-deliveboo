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
    // actualCart: [],
    // provaCart: [JSON.parse(window.localStorage.getItem('cart'))],
    prova: [],
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
        // console.log(self.menu, 'MENU');

        self.categories = self.restaurant.categories;

      });

     if(JSON.parse(window.localStorage.getItem('cart')) == null){
        this.prova = [];
     } else {
        this.prova = (JSON.parse(window.localStorage.getItem('cart')));
     }
      
      
      // this.prova = JSON.parse(window.localStorage.getItem('cart'));
      console.log(this.prova, 'PROVA');
      console.log(JSON.parse(window.localStorage.getItem('cart')), 'GET');
      // this.actualCart = JSON.parse(window.localStorage.getItem('cart'));
  },
  methods: {
    addToCart: function(index){
      const self = this;       
     
      //Verifica prodotto già presente
      if(!self.products.includes(self.menu[index])){
        self.products.push(self.menu[index]);
      } 

      //Popoliamo local storage in cart
      window.localStorage.setItem('cart', JSON.stringify(self.products[index]));

      //Salvataggio in una variabile
      self.prova.push(JSON.parse(window.localStorage.getItem('cart'))); 
      console.log(self.prova, 'prova');
      self.prova[index].counter = 1;

      console.log(self.products, 'CARRELLO'); 
      
      window.localStorage.setItem('cart', JSON.stringify(self.products));

      // self.provaCart = self.prova;
    },

    clearCart: function(){
      window.localStorage.removeItem('cart');
      this.prova = [];
    },

    incrementCounter: function(index){
      console.log(this.prova[index].counter);
      this.prova[index].counter++;
      this.prova = window.localStorage.setItem('cart', JSON.stringify(this.prova));
      this.prova = JSON.parse(window.localStorage.getItem('cart'));
      this.$forceUpdate();
    },

    decrementCounter: function(index){
      if(this.prova[index].counter > 1){
        this.prova[index].counter--;
        this.$forceUpdate();
      } else{
        this.prova.splice(index, 1);
        window.localStorage.clear();
        window.localStorage.setItem('cart', JSON.stringify(this.prova));
        // this.deleteSingleElement(index);
      }

     
    },

    // deleteSingleElement(index){
    //   this.prova.splice()
    // }
  }

});
