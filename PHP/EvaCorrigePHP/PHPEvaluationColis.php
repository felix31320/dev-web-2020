<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        input[type="text"]{
            margin: 0px 7px;
            width: 50px;
            text-align: center;
        }
    </style>
</head>
<body>

<?php
?>
<h1>Dimensions du colis</h1>
<p>Vérifiez que la somme de la longueur (L), largeur (l) et hauteur (H) <br>ne dépasse pas 150 cm, ou que le côté le plus long ne dépasse pas 100 cm.</p>
<?php
 //var_dump($_GET);

 if(isset($_GET['send'])){
     include "ControleDimColis.php";
     if(!empty($_GET['largeur']) && !empty($_GET['longueur']) && !empty($_GET['hauteur'])){
        /*if(intval($_GET['largeur'])>0 && intval($_GET['longueur'])>0 && intval($_GET['hauteur'])>0) {
            if(intval($_GET['largeur'])<101 && intval($_GET['longueur'])<101 && intval($_GET['hauteur'])<101) {
                $somme =  intval($_GET['largeur']) + intval($_GET['longueur']) + intval($_GET['hauteur']);
                if($somme<150){
                    echo '<span style="color: green">Les dimension de ce colis sont acceptées.</span><br><br>';
                } else {
                    echo '<span style="color: red">Les dimension de ce colis ne sont pas acceptées, la somme des côtés dépassent 150</span><br><br>';
                }
            } else {
                echo '<span style="color: red">Un ou plusieurs côtés dépasse 100</span><br><br>';
            }
        } else {
            echo '<span style="color: red">Un ou plusieurs champs ne sont pas un nomnbre valide</span><br><br>';
        }*/

        echo 'Suivant les dimension données : <br><br>La largeur : '. $_GET['largeur'].'<br>La longueur : '.$_GET['longueur'].'<br>La hauteur : '.$_GET['hauteur'].'<br><br>';
        echo ControleDimColis($_GET['largeur'],$_GET['longueur'],$_GET['hauteur']);

     } else {
         echo '<span style="color: red">Un ou plusieurs champs sont vide</span><br><br>';
     }
 } else {
     // echo 'Le bouton n\'est pas envoyé<br><br>';
 }
 ?>
<span style="color: red"></span>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    Entrée la largeur : <input  maxlength="4" type="text" name="largeur">
    Entrée la logueur : <input  maxlength="4" type="text" name="longueur">
    Entrée la hauteur : <input  maxlength="4" type="text" name="hauteur">
    <input type="submit" name="send" value="Envoyer">
</form>



</body>
</html>
