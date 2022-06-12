$(document).ready(function () {
	$('#bt2').click(function(){
		$('#div1').animate({left: '500px'},3000);
		$('#div1').animate({height: '+=200px'},3000);
		$('#div1').animate({opacity: '0.4'},3000);
		$('#div1').animate({width: '-=100px'},3000);
	});
	
	$('#bt').click(function(){
		$('#div1').stop();
	});
});