$(document).ready(function () {
		alert('jQuery est pret');
		$('p').hide();

		$('#titre3').mouseenter(function () {
			$('#p1, #p2').show(); // show = montrer
		});
		$('#titre3').mouseleave(function () {
			$('#p1, #p2').hide(); // hide = cacher
		});
});