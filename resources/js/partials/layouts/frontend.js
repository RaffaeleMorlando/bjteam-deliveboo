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

    var string = "Cerca per nome";
    var placeholderArray = string.split("");
    var i = 0;


      const prova = setInterval(
      function() {

        self.searchBarPlaceholder += placeholderArray[i];
        i++;

        if(i > placeholderArray.length - 1) {
          clearInterval(prova);

          setTimeout(
            function() {
              i = 0;
              self.searchBarPlaceholder = "";
            }, 1000)
        }
      }, 150);
  },


});
