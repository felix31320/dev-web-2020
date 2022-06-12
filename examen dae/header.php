<?php
    include 'config.php'; // se connecter au bdd
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen_dae</title>
    <link rel="stylesheet" href="css/style.css"> <!-- lien avec le fichier CSS -->
    <link rel="icon" href="image/DAE.png">
</head>
<body>
    <div class="placeinput"> <!-- le navigateur -->
        <button class="input"><a class="input" href="index.php">Accueil</a></button>
        <button class="input"><a class="input" href="materiels.php">Materiels</a></button>
        <button class="input"><a class="input" href="batiments.php">Batiments</a></button>
     </div>
     <div class="recherche">
         <form name="recherche" method="post" action="header.php" >
            <input class="rechercheinput" placeholder="Recherche PAR BATIMENT ou PAR MODELE" type="text" name="recherche">
        </form>
     </div>
