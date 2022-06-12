$(document).ready(function(){

    $('#border1').click(function(){
        $('html').animate({scrollTop:$(".image1").offset().top},1000);
    })

    $('#border2').click(function(){
        $('html').animate({scrollTop: $(".image2").offset().top},1000);
    })
    $('#border3').click(function(){
        $('html').animate({scrollTop:$(".image3").offset().top},1000);
    })
    
    $(window).scroll(function(){
        console.log($(window).scrollTop());

        var H1 = $('.image1').height();
        var H2 = H1 + $('.image2').height();
        var H3 = H2 + $('.image3').height();

        var TopX = $(window).scrollTop();

        if (TopX < H1) {

            $('#border1').addClass('border');
            $('#border2').removeClass('border');
            $('#border3').removeClass('border');

            console.log('ICI C WELCOME');
        }
        else if(TopX >= H1 && TopX < H2){
            $('#border1').removeClass('border');
            $('#border2').addClass('border');
            $('#border3').removeClass('border');

            console.log('ICI C SERVICES');
        }
        else{
            $('#border1').removeClass('border');
            $('#border2').removeClass('border');
            $('#border3').addClass('border');

            console.log('ICI C SERVICES');
        } 
    });

    
});