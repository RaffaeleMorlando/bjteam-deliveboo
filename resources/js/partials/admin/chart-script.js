require("../../bootstrap")
import Vue from 'vue';

const chartContainer = new Vue({
  el: '#chart_container',
  data: {
    categories: []
  },
  mounted() {
    axios
      .get("/api/categories")
      .then(
        (response) => {
          let prova = response.data;
          prova.forEach(
            (element) => {
              this.categories.push(Math.floor(Math.random() * 100))
            }
          );
          console.log(this.categories);
        }
      );

      // grafico --------------------------------------
      var ctx = document.getElementById('myChart').getContext('2d');
      const self = this;
      var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'line',

          // The data for our dataset
          data: {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'UNo', 'due', 'tre', 'quattro'],
              datasets: [{
                  label: 'My First dataset',
                  backgroundColor: 'rgb(255, 99, 132)',
                  borderColor: 'rgb(255, 99, 132)',
                  data: [1, 100, 15],
              }]
          },

          // Configuration options go here
          options: {
          }
      });
  },

  methods: {
  }
})
