require('../../bootstrap');


import axios from 'axios';
import Vue from 'vue';

const frontEndHeader = new Vue({
  el: '#header',
  data: {
    headerStatus: false,
    searchBarPlaceholder: "",
    searched: "",
    searchedResults: [],
    activeLogOut: false,
    activeHamburger: false
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
    getRestaurantByName(){
      this.searched = this.searched.toLowerCase();
      axios
        .get(`/api/restaurant/search/${this.searched}`)
        .then(response => {
          this.searchedResults = (response.data);
          console.log(response);
        })
    },

    toggleActive(ref) {
      this[ref] = !this.[ref];
    }
  }
});


//hamburger menu
var $menuBtn = document.getElementById('btn-hamburger');
// to attach an event to do more than one task in the same time
$menuBtn.onclick = function(e)
{
  // do something tasks
  // your code here
  // animation for button with cross line on click
  animatedMenu(this);

  // avoid default behavior
  e.preventDefault();
};
function animatedMenu(x)
{
    x.classList.toggle("animeOpenClose");
}
