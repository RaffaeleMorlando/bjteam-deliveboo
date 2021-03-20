require('../../bootstrap');
import Vue from 'vue';

const backend = new Vue({
  el: '#background',
  data: {
    activeAside: true,
    activeSettings: false,
    editForm: false,
  },
  methods: {
    toggleShow(){
      this.activeAside = !this.activeAside;
    },

    toggleSettings() {
      this.activeSettings = !this.activeSettings;
    },

    activeEditForm() {
      this.editForm = !this.editForm;
    }

  },
});
