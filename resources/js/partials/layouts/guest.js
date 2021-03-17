require('../../bootstrap');

import Vue from 'vue';

const guest = new Vue({
  el: '#guest_layout',
  data: {
    activeFooter: false,
    // prova: 'dioporco'
  },
  methods: {
    footerToggleShow() {
      this.activeFooter = !this.activeFooter;
    },
    // funzione: function() {
    //   console.log(this.prova);
    // }
  },
  mounted() {

  }
});
