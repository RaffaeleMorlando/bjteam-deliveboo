require('../../bootstrap');


import Vue from 'vue';

const backend = new Vue({
  el: '#backend',
  data: {
    activeAside: true,
  },
  methods: {
    toggleShow(){
      this.activeAside = !this.activeAside;
      console.log(this.activeAside);
    }
    
  }
});