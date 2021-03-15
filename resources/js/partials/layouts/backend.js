require('../../bootstrap');


import Vue from 'vue';

const backend = new Vue({
  el: '#backend',
  data: {
    activeAside: true,
    activeSettings: false,
  },
  methods: {
    toggleShow(){
      this.activeAside = !this.activeAside;
    },

    toggleSettings() {
      this.activeSettings = !this.activeSettings;
    }

  }
});
