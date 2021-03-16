require('../../bootstrap');

import Vue from 'vue';

const guest = new Vue({
  el: '#guest_layout',
  data: {
    activeFooter: false
  },
  methods: {
    footerToggleShow() {
      this.activeFooter = !this.activeFooter;
    }
  },
  mounted() {

  }
});
