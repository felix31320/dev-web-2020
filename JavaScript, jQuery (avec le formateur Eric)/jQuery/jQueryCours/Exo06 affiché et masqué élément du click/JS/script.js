$(document).ready(function () {
		alert('jQuery est pret');
		$('p').hide();
		$('#titre3').mousedown(function () { // mousedown et mouseup est comme focus
			$('p').show();
		});
		$('#titre3').mouseup(function () {
			$('p').hide();
		});
	

});