require('../../bootstrap');


import Vue from 'vue';

const frontEndHeader = new Vue({
  el: '#header',
  data: {
    headerStatus: false,
    searchBarPlaceholder: ""
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
  }
});
