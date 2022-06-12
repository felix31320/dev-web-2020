$(document).ready(function () {

    
    let date = new Date().getFullYear();
    let copyright = `${date}`;
    
    $('.copyright-date').prepend(copyright);
    
    });