$(document).ready(function () {
		alert('jQuery est pret');
		$('p').hide();
		$('#nom').keydown(function () {  // clique puis afficher les choses
			$(this).css('background-color','orange');
		});

		$('#nom').keyup(function () { // sortir
			$(this).css('background-color','blue');
		});
	

});