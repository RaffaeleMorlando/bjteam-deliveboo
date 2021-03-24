require('../../bootstrap');

import Vue from 'vue'

var success = new Vue({
   el: '#loading_container',
   data: {
      checking: true
   },

   mounted(){
      console.log('Vue è OK');
      const self = this;
      setTimeout(function(){
         self.checking = false;
      }, 4000);
   }
})