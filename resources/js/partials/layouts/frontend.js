require('../../bootstrap');


import axios from 'axios';
import Vue from 'vue';

const frontEndHeader = new Vue({
  el: '#header',
  data: {
    headerStatus: false,
    searchBarPlaceholder: "",
    searched: "",
    searchedResults: []
  },

  mounted() {
    const self = this;

    window.addEventListener('scroll', () => {
      if (window.scrollY > 1) {
        this.headerStatus = true;
      } else {
        this.headerStatus = false;
      };
    });

  },

  methods: {
    getRestaurantByName(){
      this.searched = this.searched.toLowerCase();
      axios
        .get(`/api/restaurant/search/${this.searched}`)
        .then(response => {
          this.searchedResults = (response.data);
          console.log(response);
        })
    }
  }
});
