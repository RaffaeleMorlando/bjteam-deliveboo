require('../../bootstrap');

// import axios from 'axios';
import Vue from 'vue';

const prova = new Vue({
  el: '#main_home_page_guest',
  data: {
    categories : [],
    prova: 'dioporco'
  },
  
  // created() {
  //   axios.get('api/categories')
  //     .then(response => {
  //       this.categories = response.data;
  //       console.log(this.categories);
  //     });
  // },
  
  methods: {
    funzione: function(){
      console.log(this.prova);
    }

  }

});
