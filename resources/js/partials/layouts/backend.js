require('../../bootstrap');
import Vue from 'vue';

const backend = new Vue({
  el: '#background',
  data: {
    activeAside: true,
    activeSettings: false,
    editForm: false,
    url: null,
    year: "2021"
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
    },
    filterByYear(){
      Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
    let restaurantSlug = JSON.parse(Vue.prototype.$userId).restaurant.slug;

    let arrayTotal = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

    console.log(this.year);

    axios
      .get(`/api/restaurant/${restaurantSlug}/orders`)
      .then(
        (response) => {

          // console.log(response.data);
          const self = this;
          let myId = [];
          response.data.forEach(
            (element) => {
              if(element.created_at.substr(0, 4) == self.year){
                for(var i = 1; i <= 12; i++){
                  if(element.created_at.substr(5, 2) == '0' + i){
                    arrayTotal[i - 1] = arrayTotal[i - 1] + element.total_price;
                  }
                }
              }
            }
          );
          console.log(arrayTotal);

          var ctx = document.getElementById('myChart').getContext('2d');
          var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'line',

          // The data for our dataset
          data: {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
              datasets: [{
              label: '€',
              backgroundColor: 'rgb(255, 99, 132)',
              borderColor: 'rgb(255, 99, 132)',
              data: arrayTotal
            }]
          },

            // Configuration options go here
            options: {}
          });

        }
      );
    }
  },

  mounted() {
    let currentUrl = window.location.href;

    if(currentUrl == "http://127.0.0.1:8000/admin/restaurants/orders/charts") {
      this.filterByYear();
    }

  }
});
