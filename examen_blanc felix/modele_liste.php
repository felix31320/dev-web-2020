<?php
    include 'connexion.php'; // on prend le fichier connexion.php pour se connecter le SQL
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modele_liste.php</title>
    <style> 
    /* ici on utilise le style comme le decoration et l'emplacement */
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
    
    <p class="p">Liste des modèles</p>
   
<?php

$req = $bdd->query('SELECT * FROM modele ORDER BY marque'); // je prends tous les bases des données dans modele
echo '<div style=\'margin-left:38%;\'>';
echo '<br><br>';
echo '<table>';
echo '<tr>';
echo '<td>Modele</td><td>Marque</td><td>Puissance</td><td>Carburant</td>';
echo '</tr>';
while ($reponse = $req->fetch()){ // on affiche la base des données juste modele, marque, puissance et carburant
    echo '<tr>';
    echo '<td>'.$reponse['modele'].'</td><td>'.$reponse['marque'].'</td><td>'.$reponse['puissance'].'</td><td>'.$reponse['carburant'].'</td>';
    echo '</tr>';
}
echo '<table>';
echo '</div>';
?> 

</body>
</html>