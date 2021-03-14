import axios from 'axios';
import { template } from 'lodash';
import Vue from 'vue';

const restaurantForm = new Vue({
  el: '#restaurant_form',
  data: {
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
      }
    ]
  },
  methods: {
    activeNextQuestion: function(index) {

      if(this.questions[index].userInput != "") {
        this.questions[index].checked = true;
        this.questions[index + 1].active = true;
      }
    }
  }
});
