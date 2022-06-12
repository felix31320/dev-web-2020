// jQuery
$(document).ready(function(){
    
    $('.flechehaut').click(function(){
        $('html').animate({scrollTop:0},1000);
    });
    
    $(window).scroll(function(){
        console.log($(window).scrollTop())
        console.log('la hauteur de l\'image est ; '+ $('header').height());
        
        if ($(window).scrollTop() > $('header').height()) {
            console.log('plus grand');
            $('nav').addClass('fixe');
            $('.flechehaut').css('display','block');
        } else {
            console.log('plus petit');
            $('nav').removeClass('fixe');
            $('.flechehaut').css('display','none');
        }
    });
});
// Javascript

// const nav = document.querySelector('nav'); // regarder 11 et 14 ligne
// const heightHeader = document.querySelector('header');
// const fleche = document.querySelector('.flechehaut');

// window.addEventListener('scroll', stickNav);

// function stickNav(){
// 	console.log(window.scrollY, heightHeader.offsetHeight);

// 		if (window.scrollY>heightHeader.offsetHeight) {
// 		console.log('je depasse');
// 		nav.classList.add('fixe');
// 		fleche.style.display = 'block';
// 	} else {
// 		console.log('je reste fixe');
// 		nav.classList.remove('fixe');
// 		fleche.style.display = 'none';

// 	}
// }

// function ToTop(){
// 	window.scroll({top:0,behavior:"smooth"})
// }
