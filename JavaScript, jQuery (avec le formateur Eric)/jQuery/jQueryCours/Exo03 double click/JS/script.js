$(document).ready(function () {
		alert('jQuery est pret');
		$('#titre3').dblclick(function () {
			$('#p1, #p2').hide();
		});
});