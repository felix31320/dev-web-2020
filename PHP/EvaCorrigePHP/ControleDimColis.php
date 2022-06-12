<?php
function ControleDimColis($largeur,$longueur,$hauteur){
    if(intval($largeur)>0 && intval($longueur)>0 && intval($hauteur)>0) {
        if(intval($largeur)<101 && intval($longueur)<101 && intval($hauteur)<101) {
            $somme =  intval($largeur) + intval($longueur) + intval($hauteur);
            if($somme<150){
                return '<span style="color: green">Les dimensions de ce colis sont acceptées.</span><br><br>';
            } else {
                return '<span style="color: red">Les dimensions de ce colis ne sont pas acceptées, la somme des côtés dépassent 150</span><br><br>';
            }
        } else {
            return '<span style="color: red">Un ou plusieurs côtés dépasse 100</span><br><br>';
        }
    } else {
        return '<span style="color: red">Un ou plusieurs champs ne sont pas un nombre valide</span><br><br>';
    }
}