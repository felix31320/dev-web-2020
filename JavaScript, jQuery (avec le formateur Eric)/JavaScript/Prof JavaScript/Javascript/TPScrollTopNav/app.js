const nav = document.querySelector('nav');
const heightHeader = document.querySelector('header');
const btnToTop = document.querySelector('.btnToTop');


function toTop(){
    window.scroll({top:0,behavior:'smooth'});
};



function stickNav(){
    console.log(window.scrollY, 'Hauteur image : ' + heightHeader.offsetHeight);

    console.log(heightHeader.offsetHeight);
    /*var heightPct =  heightHeader.offsetHeight;*/
    /*console.log(window.scrollY, +'<'+ heightPct);*/
    if (window.scrollY > heightHeader.offsetHeight){
        console.log('plus grand');
        nav.classList.add('clsFixed');
        btnToTop.style.display = 'block';
    } else {
        console.log('plus petit');
        nav.classList.remove('clsFixed');
        btnToTop.style.display = 'none';
    }
}

window.addEventListener('scroll', stickNav);

// window.addEventListener('resize', stickNav);