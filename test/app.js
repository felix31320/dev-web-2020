function Myfunction() {
document.getElementById("demo").innerHTML = "cava";

document.getElementById("demo").style.color = "#000000";
document.getElementById("demo").style.backgroundColor = "green";

document.getElementById("tresbien").innerHTML = "oui tres bien";

}



function darklight(){ 
    document.body.classList.toggle("dark-mode");
    
}

function switchname(){
    
    if (document.getElementById("test").innerHTML == "dark") {
        document.getElementById("test").innerHTML = "light";
        document.getElementById("body").style.backgroundColor = "black";
        console.log('dark');
    } else{
        document.getElementById("test").innerHTML = "dark";
        document.getElementById("body").style.backgroundColor = "white";
        console.log('light');
    }
    
}