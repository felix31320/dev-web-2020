$(document).ready(function () {
		alert('jQuery est pret');
		$('input').focus(function () { 
			$(this).css('background-color','orange');
		});

		$('input').focusout(function () { 
			$(this).css('background-color','green');
		});

});