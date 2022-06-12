var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) { // supprimer l'ancien image quand on a le nouveau image
       slides[i].style.display = "none";   
    }
    slideIndex++;

    for (i = 0; i < dots.length; i++) { // supprimer l'ancien dot quand on a le nouveau dot ( petit rond)
        dots[i].className = dots[i].className.replace("active", "");
    }

    if (slideIndex > slides.length) {slideIndex = 1} //  recommencer depuis le premier photo
     
    slides[slideIndex-1].style.display = "block";  // changer chaque image
    dots[slideIndex-1].className += " active"; // changer chaque dot ( rond)

    setTimeout(showSlides, 2600); // Change chaque image vers 2.6 seconds
}