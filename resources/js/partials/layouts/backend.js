require('../../bootstrap');
import Vue from 'vue';

const backend = new Vue({
  el: '#background',
  data: {
    activeAside: true,
    activeSettings: false,
    editForm: false,
    url: null,
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
  },

  mounted() {

    Vue.prototype.$userId = document.querySelector("meta[name='user-id']").getAttribute('content');
    let restaurantSlug = JSON.parse(Vue.prototype.$userId).restaurant.slug;

    axios
      .get(`/api/restaurant/${restaurantSlug}/orders`)
      .then(
        (response) => {

          console.log(response.data);
          // const self = this;
          // let myId = [];
          // response.data.forEach(
          //   (element) => {
          //     myId.push(element.id);
          //   }
          // );
          //
          // var ctx = document.getElementById('myChart').getContext('2d');
          // var chart = new Chart(ctx, {
          // // The type of chart we want to create
          // type: 'line',
          //
          // // The data for our dataset
          // data: {
          //     labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
          //     datasets: [{
          //     label: 'My First dataset',
          //     backgroundColor: 'rgb(255, 99, 132)',
          //     borderColor: 'rgb(255, 99, 132)',
          //     data: myId
          //   }]
          // },
          //
          //   // Configuration options go here
          //   options: {}
          // });

        }
      );

  }
});
