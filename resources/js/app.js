require('./bootstrap');
require('select2');
import 'slick-carousel/slick/slick';

//import Vue from 'vue';

$(document).ready(
  function() {

    // Select 2
    $("#categories").select2(
      {
        maximumSelectionLength: 5,
        placeholder: "inserisci categoria",
        width: 'resolve',
        height: 'resolve',
      });

  }
);

// Slick Slider
$('#slider').slick({
  centerMode: true,
  centerPadding: '60px',
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});
