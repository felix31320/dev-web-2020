$(document).ready(function () {
		
	$('#div1').animate({left : '200px'},2500,function(){
		$(this).fadeOut(500,function(){
			$(this).fadeIn(200,function(){
				$(this).animate({left: '700px'}),500;
			});
		});
	});

});