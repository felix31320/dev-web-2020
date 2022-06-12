<?php
    include 'connexion.php'; // on prend le fichier connexion.php pour se connecter le SQL
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voiture_liste.php</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            padding: 5px 10px;
        }
        tr:first-child{
           background-color: #cafaff;
           text-align: center;
           font-weight: bold;
        }
        .p{
            text-align: center;
            font-weight:bold;
            font-size:25px;
            margin-top:50px;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
    <p class="p">Liste des voitures</p>
    
<?php

$req = $bdd->query('SELECT * FROM voiture ORDER BY id_modele'); // je prends tous les bases des données dans voiture

echo '<div style=\'margin-left:38%;\'>';
echo '<br><br>';
echo '<table>';
echo '<tr>';
echo '<td>immatriculation</td><td>Couleur</td><td>Kilometrage</td><td>Id_modele</td>';
echo '</tr>';
while ($reponse = $req->fetch()){ // on affiche la base des données juste immatriculation, couleur kilometrage et id_modele
    echo '<tr>';
    echo '<td>'.$reponse['immatriculation'].'</td><td>'.$reponse['couleur'].'</td><td>'.$reponse['kilometrage'].'</td><td>'.$reponse['id_modele'].'</td>';
    echo '</tr>';
}
echo '<table>';
echo '</div>';


?>    
</body>
</html>