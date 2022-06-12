<?php
    include 'connexion.php'; // on prend le fichier connexion.php pour se connecter le SQL
    include 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modele_ajout.php</title>
    <style>
        .form {
        width:500px; height:250px;
        border: solid blue 5px;
        border-radius: 10px;
        text-align: center;
        margin: auto;
        background-color:grey;
        margin-top: 50px;
        
        }
        .form h2 {
            margin:0;
            text-align:center;
            font-size:25px;
            position:relative;
            top:-20px;
        }
        .form h2 span {
            background:#fff;
            padding:0 5px;
        }
        .p{
            text-align: center;
            font-weight:bold;
            font-size:25px;
            margin-top: 50px;
            text-decoration: underline;
        }
        input{
            padding:5px;
            border-radius: 10px;
            
        }

    </style>
</head>
<body>

    <p class="p">Ajout Nouveau Modèle</p>


<?php

    if(isset($_POST['modele']) && isset($_POST['marque']) && isset($_POST['puissance']) && isset($_POST['carburant'])){ // ici on oblige d'ecrire sinon ca ne peut pas ajouter
        if (isset($_POST['send'])) { // isset ca veut dire que c'est la quand on clique le button "ajouter"

            $modele = $_POST['modele'];
            $marque = $_POST['marque'];
            $puissance = $_POST['puissance'];
            $carburant = $_POST['carburant'];

            $req = $bdd->prepare('INSERT INTO modele (modele,marque,puissance,carburant) VALUES (:modele,:marque,:puissance,:carburant)');
            $req->execute(array('modele'=>$modele,'marque'=>$marque,'puissance'=>$puissance,'carburant'=>$carburant)); // ici on demande d'ajouter une base des donnees

        }else{
            echo 'error';
        }
    }else{
        // echo 'completez la formulaire';
    }

?>
<div class="form">
    <h2>
        <span>Nouveau Modèle</span>
    </h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"> <!-- voici on demande la formulaire pour creer un base des données -->
    <div style="margin-left: 100px;">
        <table>
            <tr>
            <td><label>Modèle : </label></td><td><input type="text" name="modele"></td>
            </tr>
            <tr>
            <td><label>Marque : </label></td><td><input type="text" name="marque"></td>
            </tr>
            <tr>
            <td><label>Puissance : </label></td><td><input type="text" name="puissance"></td>
            </tr>
            <tr>
            <td><label>Carburant : </label></td><td><input type="text" name="carburant"></td>
            </tr>
        </table>
    </div>
    
        <input style="margin:10px;" type="submit" name="send" value="Ajouter"><input style="margin:10px;" type="submit" value="Annuler">
   <?php
    
   ?>
</form>
</div>
</body>
</html>