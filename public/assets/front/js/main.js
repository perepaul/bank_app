// main.JS
//--------------------------------------------------------------------------------------------------------------------------------
//This is JS file that contains principal fuctions of theme */
// -------------------------------------------------------------------------------------------------------------------------------
// Template Name: CoopBank - Banking, Cooperatives and Employee funds Theme
// Author: Iwthemes.
// Name File: main.js
// Version 1.0 - Created on 16 Nov 2015
// Website: http://www.iwthemes.com
// Email: support@iwthemes.com
// Copyright: (C) 2015

$(document).ready(function($) {

	'use strict';

  //=================================== Simple slide  ==================================//
  $('#simple-slide').owlCarousel({
      loop:true,
      margin:50,
      animateOut: 'bounceOutRight',
      animateIn: 'bounceInLeft',
      autoplay: true,
      autoplayTimeout:3500,
      nav:true,
      items:1,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
  })

  //=================================== Carousel Boxes  ==================================//
   $('#boxes-carousel').owlCarousel({
      loop:true,
      margin:0,
      autoplay: true,
      autoplayTimeout:3500,
      nav:false,
      items:4,
      responsive:{
          0:{
              items:1
          },
          520:{
              items:2
          },
          769:{
              items:3
          },
          999:{
              items:4
          }
      }
  })

  //=================================== Carousel Sponsors =====================================//
  $('#carousel-sponsors').owlCarousel({
      loop:true,
      margin:50,
      autoplay: true,
      autoplayTimeout:3500,
      nav:true,
      items:5,
      responsive:{
          0:{
              items:2
          },
          480:{
              items:3
          },
          600:{
              items:4
          },
          1000:{
              items:5
          }
      }
  })

  //=================================== Carousel Testimonials  ============================//
  $('#testimonials').owlCarousel({
      loop:true,
      margin:20,
      animateOut: 'bounceOutRight',
      animateIn: 'bounceInLeft',
      autoplay: true,
      autoplayTimeout:3500,
      nav:false,
      items:3,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          1000:{
              items:3
          }
      }
  })

  //=================================== Carousel Gallery  ==================================//
  $('#carousel-gallery').owlCarousel({
      loop:true,
      margin:20,
      animateOut: 'bounceOutRight',
      animateIn: 'bounceInLeft',
      autoplay: true,
      autoplayTimeout:3500,
      nav:false,
      items:5,
      responsive:{
          0:{
              items:2
          },
          600:{
              items:3
          },
          1000:{
              items:5
          }
      }
  })

  //=================================== Loader =====================================//
  $(".status").fadeOut(3000);
  $(".preloader").delay(1000).fadeOut("slow");


	//=================================== Subtmit Form  ===================================//
	$('#form-contact').submit(function(event) {
	     event.preventDefault();
	     var url = $(this).attr('action');
	     var datos = $(this).serialize();
	     	$.get(url, datos, function(resultado) {
	     	$('#result').html(resultado);
		});
 	});

  //=================================== Form Newslleter  =================================//
  $('#newsletterForm').submit(function(event) {
       event.preventDefault();
       var url = $(this).attr('action');
       var datos = $(this).serialize();
        $.get(url, datos, function(resultado) {
        $('#result-newsletter').html(resultado);
    });
  });

  //=================================== Ligbox  ===========================================//
  $(".fancybox").fancybox({
      openEffect  : 'elastic',
      closeEffect : 'elastic',

      helpers : {
        title : {
          type : 'inside'
        }
      }
  });

  $("a[rel=gallery_group]").fancybox({
    'transitionIn'    : 'none',
    openEffect  : 'elastic',
    closeEffect : 'elastic',
    'transitionOut'   : 'none',
    'titlePosition'   : 'over',
    'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
        return '<span id="fancybox-title-over">Image ' +  (currentIndex + 1) + ' / ' + currentArray.length + ' ' + title + '</span>';
    }
  });

	//=============================  tooltip demo ===========================================//
  $('.tooltip-hover').tooltip({
      selector: "[data-toggle=tooltip]",
      container: "body"
   });

	//=================================== Totop  ============================================//
  $().UItoTop({
		scrollSpeed:500,
		easingType:'linear'
	});

  //=================================== Portfolio Filters  ==============================//

  var $container = $('.portfolioContainer');
  $container.isotope({
      filter: '*',
          animationOptions: {
          duration: 750,
          easing: 'linear',
          queue: false
  	}
  });
  $('.portfolioFilter a').click(function(){
      $('.portfolioFilter .current').removeClass('current');
      $(this).addClass('current');
       var selector = $(this).attr('data-filter');
       $container.isotope({
        filter: selector,
              animationOptions: {
              duration: 750,
              easing: 'linear',
              queue: false
            }
        });
       return false;
  });

});

//Stripe Code

// Set your publishable key: remember to change this to your live publishable key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');
var elements = stripe.elements()

// Set up Stripe.js and Elements to use in checkout form
var style = {
    base: {
      color: "#32325d",
    }
  };
  
  var card = elements.create("card", { style: style });
  card.mount("#card-element");

  card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
      displayError.textContent = event.error.message;
    } else {
      displayError.textContent = '';
    }
  });

  var form = document.getElementById('payment-form');

form.addEventListener('submit', function(ev) {
  ev.preventDefault();
  stripe.confirmCardPayment(clientSecret, {
    payment_method: {
      card: card,
      billing_details: {
        name: 'Jenny Rosen'
      }
    }
  }).then(function(result) {
    if (result.error) {
      // Show error to your customer (e.g., insufficient funds)
      console.log(result.error.message);
    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
        // Show a success message to your customer
        // There's a risk of the customer closing the window before callback
        // execution. Set up a webhook or plugin to listen for the
        // payment_intent.succeeded event that handles any business critical
        // post-payment actions.
      }
    }
  });
});