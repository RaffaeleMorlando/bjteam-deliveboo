require('../../bootstrap');
import Vue from 'vue';

const menuRestaurant = new Vue({
  el: '#menu-restaurant',
  data: {
    heroStatus: false
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

  },
  methods: {
  }
});
