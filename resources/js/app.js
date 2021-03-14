require('./bootstrap');
require('select2');

import Vue from 'vue';

$(document).ready(
  function() {

    $("#categories").select2(
      {
        maximumSelectionLength: 5
      });


  }
);
