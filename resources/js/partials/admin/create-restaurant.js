require('../../bootstrap');
import Vue from 'vue';

const restaurantCreate = new Vue(
{
  el: '#product_create',
  data: {
    url: null
  },
  mounted() {
    console.log('Hello to...');
  },
  methods: {
    prova() {
      // const file = e.target.files[0];
      // console.log(file);
      // this.url = URL.createObjectURL(file);
      // console.log(this.url);

      console.log('clicked');
    }
  }
}
);
