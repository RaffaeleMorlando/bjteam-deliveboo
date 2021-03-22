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
    activeBanner: false,
    cartTotalPrice: 0,
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

    let link = document.getElementById("home_link");
    link.addEventListener("click",
      function(event) {
        //Siamo nel Menu del ristorante, se clicchiamo sul logo e il carrello ha almeno un elemento, aggiungo il prevent default
        if(JSON.parse(window.localStorage.getItem('cart')) && self.cartProducts.length > 0) {
          event.preventDefault();
          self.activeBanner = true;
        }
      });

    axios
      .get(`/api/restaurant/${slug}`)
      .then(response => {

        self.restaurant = response.data[0];

        self.menu = self.restaurant.products;

        self.categories = self.restaurant.categories;

        if(JSON.parse(window.localStorage.getItem('cart')) == null){
          self.cartProducts = [];
        } else {
          self.cartProducts = (JSON.parse(window.localStorage.getItem('cart')));

          if (self.cartProducts[0].restaurant_id !== self.restaurant.id) {

            self.cartProducts = [];
            window.localStorage.clear();
            window.localStorage.setItem('cart', JSON.stringify(this.cartProducts));

          }
        }

        this.getTotalPrice();
      });


  },
  methods: {
    addToCart: function(index){
      const self = this;

      self.menu[index].counter = 1;

      if (self.cartProducts.length > 0) {
        
        let found = false;

        self.cartProducts.forEach(
          (element) => {

            if(element.name == self.menu[index].name) {
              found = true;
            }

          }
        );

        if(!found) {
          self.cartProducts.push(self.menu[index]);
          self.getTotalPrice();
        }
      } else {
        self.cartProducts.push(self.menu[index]);
        self.getTotalPrice();
      }

      window.localStorage.setItem('cart', JSON.stringify(self.cartProducts));

      self.cartProducts = JSON.parse(window.localStorage.getItem('cart'));

      window.localStorage.setItem('cart', JSON.stringify(self.cartProducts));
    },

    clearCart: function(){
      window.localStorage.removeItem('cart');
      this.cartProducts = [];
    },

    incrementCounter: function(index){
      // console.log(this.cartProducts[index].counter);
      this.cartProducts[index].counter++;
      this.cartProducts = window.localStorage.setItem('cart', JSON.stringify(this.cartProducts));
      this.cartProducts = JSON.parse(window.localStorage.getItem('cart'));
      this.getTotalPrice();
      this.$forceUpdate();
    },

    decrementCounter: function(index){
      if(this.cartProducts[index].counter > 1){
        this.cartProducts[index].counter--;
        this.cartProducts = window.localStorage.setItem('cart', JSON.stringify(this.cartProducts));
        this.cartProducts = JSON.parse(window.localStorage.getItem('cart'));
        this.getTotalPrice();
        this.$forceUpdate();
      } else{
        this.cartProducts.splice(index, 1);
        window.localStorage.clear();
        window.localStorage.setItem('cart', JSON.stringify(this.cartProducts));
      }


    },

    getTotalPrice: function() {
      let self = this;
      self.cartTotalPrice = 0;

      this.cartProducts.forEach(element => {
        let count = element.counter;
        let price = element.price;
        self.cartTotalPrice += count * price;
      });

      this.$forceUpdate();
    }
  }

});
