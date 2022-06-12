
//Team Slider
$('#customers-teams').owlCarousel({
  			loop: true,
  			center: true,
  			items: 5,
  			margin: 0,
  			autoplay: true,
  			dots:true,
  			autoplayTimeout: 3000,
  			checkVisibility: true,
  			responsive: {
    		0: {
          items: 1
        },
        768: {
          items: 2
        },
        1170: {
          items: 3
    		},
   		}
	});