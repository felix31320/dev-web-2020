$(document).ready(function(){
		alert('jQuery est pret');
		$('p').hide();
		$('#titre1').hover(function(){
				$('p').show();			
			},
			function(){
				$('p').hide();
			}

		);			
});