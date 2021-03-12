import axios from 'axios';
import { template } from 'lodash';
import Vue from 'vue';

const questions = new Vue({
  el: '#questions',
  data: {
    userInput: "",
    customerQuestions: [
      {
        text: "Inserisci il tuo indirizzo",
        active: true,
        classes: "",
        name: "address",
        model: ""
      },
      {
        text: "Inserisci il numero della carta di credito",
        active: false,
        classes: "",
        name: "credit_card",
        model: ""
      },
    ],
  },
  methods: {

    nextQuestion: function(index) {
      const self = this;

      this.customerQuestions[index].classes = "animate__slideOutLeft";

      setTimeout(
        function() {
          self.customerQuestions[index].active = false;
          self.customerQuestions[index + 1].active = true;
          self.customerQuestions[index + 1].classes = "animate__slideInRight";
      }, 400);
    }

  },
  mounted() {

  }
});
