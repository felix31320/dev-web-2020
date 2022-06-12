$(document).ready(function () {

      let amountScrolled = 120;

    // avec bootstrap
    
    $('.first-button').on('click', function () {

      $('.animated-icon1').toggleClass('open');
      
    });

   

    $('.a').on('click',function() {
      if (screen.width < 992) {
      $('.navbar-collapse').collapse('hide');
      $('.animated-icon1').toggleClass('open');
      }
    });
  
    $(window).scroll(function () {
    if($(window).scrollTop() > amountScrolled){
      $('.float-button').fadeIn('slow'); 
    } else {
      $('.float-button').fadeOut('slow'); 

    }
    });

  });