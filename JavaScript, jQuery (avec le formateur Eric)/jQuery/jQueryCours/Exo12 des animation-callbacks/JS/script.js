$(document).ready(function () {
		alert('jQuery est pret');
		$('#bt').click(function () { 
			$('#div1').hide(2000,function(){
				$('#bt').hide(2000,function(){
					$('#bt').show(1000,function(){
						$('#div1').show(2000);
					});
				});
			});
			
		});

});