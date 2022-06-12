const nav = document.querySelector('nav'); // regarder 11 et 14 ligne
const heightHeader = document.querySelector('header');
const fleche = document.querySelector('.flechehaut');

window.addEventListener('scroll', stickNav);

function stickNav(){
	console.log(window.scrollY, heightHeader.offsetHeight);

		if (window.scrollY>heightHeader.offsetHeight) {
		console.log('je depasse');
		nav.classList.add('fixe');
		fleche.style.display = 'block';
	} else {
		console.log('je reste fixe');
		nav.classList.remove('fixe');
		fleche.style.display = 'none';

	}
}

function ToTop(){
	window.scroll({top:0,behavior:"smooth"})
}

