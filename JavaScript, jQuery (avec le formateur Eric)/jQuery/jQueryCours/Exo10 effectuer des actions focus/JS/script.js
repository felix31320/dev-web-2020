$(document).ready(function () {
		alert('jQuery est pret');
		$('#nom').focus(function () { // focus = montrer
			$('#spanNom').html(' Entre votre nom');
		});
		$('#nom').focusout(function () { // focusout = sortir
			$('#spanNom').html('');
		});

		$('#prenom').focus(function () { 
			$('#spanPrenom').html(' Entre votre prenom');
		});
		$('#prenom').focusout(function () { 
			$('#spanPrenom').html('');
		});

});