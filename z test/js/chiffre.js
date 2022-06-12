// ANIMER CHIFFRES

var a = 0;
$(window).scroll(function() {

  var oTop = $('.bold').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    

    $('.bold').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    a = 1;
  }

});