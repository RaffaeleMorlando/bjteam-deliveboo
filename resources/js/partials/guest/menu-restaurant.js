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
    actualCart: [],
    provaCart: [JSON.parse(window.localStorage.getItem('cart'))]
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

      if(this.provaCart == null){
        this.provaCart = [];
      } else {
        this.provaCart.push(JSON.parse(window.localStorage.getItem('cart'))); 
      }

      this.provaCart = this.actualCart;
      console.log(JSON.parse(window.localStorage.getItem('cart')), 'GET');
      // this.actualCart = JSON.parse(window.localStorage.getItem('cart'));
  },
  methods: {
    addToCart: function(index){
      const self = this;       
     
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

      self.provaCart = self.actualCart;
    },

    clearCart: function(index){
      window.localStorage.removeItem('cart')
    },

    incrementCounter: function(index){
      console.log(this.actualCart[index].counter);
      this.actualCart[index].counter++;
      this.$forceUpdate();
    },

    decrementCounter: function(index){
      if(this.actualCart[index].counter > 1){
        this.actualCart[index].counter--;
        this.$forceUpdate();
      } else{
        this.actualCart.splice(index, 1);
        window.localStorage.clear();
        window.localStorage.setItem('cart', JSON.stringify(this.actualCart));
        // this.deleteSingleElement(index);
      }

     
    },

    // deleteSingleElement(index){
    //   this.actualCart.splice()
    // }
  }

});
