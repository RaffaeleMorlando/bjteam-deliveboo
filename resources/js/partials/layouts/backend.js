require('../../bootstrap');


import Vue from 'vue';

const backend = new Vue({
  el: '#background',
  data: {
    activeAside: true,
    activeSettings: false,
    editForm: false,
    url: null
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
    },
    onFileChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    }
  },
});
