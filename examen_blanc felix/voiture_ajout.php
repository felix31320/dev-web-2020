<?php
    include 'connexion.php'; // on prend le fichier connexion.php pour se connecter le SQL
    include 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>voiture_ajout.php</title>
    <style>
        .form {
        width:500px; height:230px;
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

    <p class="p">Ajout Nouveau Voiture</p>


<?php

    if(isset($_POST['immatriculation']) && isset($_POST['couleur']) && isset($_POST['kilometrage']) && isset($_POST['id_modele'])){ // ici on oblige d'ecrire sinon ca ne peut pas ajouter
        if (isset($_POST['send'])) { // isset ca veut dire que c'est la quand on clique le button "ajouter"

            $immatriculation = $_POST['immatriculation'];
            $couleur = $_POST['couleur'];
            $kilometrage = $_POST['kilometrage'];
            $id_modele = $_POST['id_modele'];

            $req = $bdd->prepare('INSERT INTO voiture (immatriculation,couleur,kilometrage,id_modele) VALUES (:immatriculation,:couleur,:kilometrage,:id_modele)');
            $req->execute(array('immatriculation'=>$immatriculation,'couleur'=>$couleur,'kilometrage'=>$kilometrage,'id_modele'=>$id_modele)); // ici on demande d'ajouter une base des donnees

        }else{
            echo 'error';
        }
    }else{
        // echo 'completez la formulaire';
    }

?>
<div class="form">
    <h2>
        <span>Nouveau Voiture</span>
    </h2>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"> <!-- voici on demande la formulaire pour creer un base des données -->
    <div style="margin-left: 100px;">
        <table>
            <tr>
            <td><label>Immatriculation : </label></td><td><input type="text" name="immatriculation"></td>
            </tr>
            <tr>
            <td><label>Couleur : </label></td><td><input type="text" name="couleur"></td>
            </tr>
            <tr>
            <td><label>Kilometrage : </label></td><td><input type="text" name="kilometrage"></td>
            </tr>
            <tr>
            <td><label>Id_Modele : </label></td><td><input type="text" name="modele"></td>
            </tr>
        </table>
    </div>

        <input style="margin:10px;" type="submit" name="send" value="Ajouter"><input style="margin:10px;" type="submit" value="Annuler">
    </form>

    <?php
    
    ?>
</div>
</body>
</html>