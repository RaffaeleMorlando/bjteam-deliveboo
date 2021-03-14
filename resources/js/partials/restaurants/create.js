import axios from 'axios';
import { template } from 'lodash';
import Vue from 'vue';

const restaurantForm = new Vue({
  el: '#restaurant_form',
  data: {
    select2: false,
    questions: [
      {
        icon: "fas fa-utensils",
        placeholder: "Inserisci il nome del ristorante",
        active: true,
        name: "name",
        userInput: "",
        checked: false
      },
      {
        icon: "fas fa-map-marker-alt",
        placeholder: "Indirizzo",
        active: false,
        name: "address",
        userInput: "",
        checked: false
      },
      {
        icon: "fas fa-money-check-alt",
        placeholder: "Partita Iva",
        active: false,
        name: "p_iva",
        userInput: "",
        checked: false
      },
      {
        icon: "fas fa-phone-alt",
        placeholder: "Telefono XXX-XXX-XXXX",
        active: false,
        name: "phone",
        userInput: "",
        checked: false
      },
    ]
  },
  methods: {
    activeNextQuestion: function(index) {
      const self = this;

      if(self.questions[index].userInput != "") {
        self.questions[index].checked = true;

        if(self.questions[index] != self.questions[self.questions.length -1]) {
          self.questions[index + 1].active = true;
        }

        if(self.questions[index] == self.questions[self.questions.length -1]) {
          self.select2 = true;
        }
      }
    }
  }
});
