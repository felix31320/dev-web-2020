<?php

try {
    //$bdd = new PDO('mysql:host=localhost;dbname=evalsql_felix;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
    $bdd = new PDO('mysql:host=localhost;dbname=evalsql_felix;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
    //echo 'La base de données est connecté';
} catch (Exception $e) {
    die('Erreur : ' .$e -> getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>EvalExe01</title>
    <style>
        *{
            font-family: Sans-Serif;
        }
        table {
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            padding: 5px 10px;
        }
        tr:first-child{
           background-color: #cafaff;
        }
    </style>
</head>
<body>
<p>Afficher la liste des étudiants et triés par nom en ordre alphabétique </p>
<?php
// round(valeur,option) : option est un nombre de chiffre après la virgule par defaut est 0
$req = $bdd->query('SELECT `etudiant_nom`, `etudiant_prenom` FROM `etudiant` ORDER BY `etudiant_nom` ASC');
echo 'SELECT `etudiant_nom`, `etudiant_prenom` FROM `etudiant` ORDER BY `etudiant_nom` ASC';
echo '<br><br><br>';
echo '<table>';
echo '<tr>';
echo '<td>etudiant_nom</td><td>etudiant_prenom</td>';
echo '</tr>';
while ($reponse = $req->fetch()){
    echo '<tr>';
    echo '<td>'.$reponse['etudiant_nom'].'</td><td>'.$reponse['etudiant_prenom'].'</td>';
    echo '</tr>';
}
echo '<table>';
$req->closeCursor();


?>
</body>
</html>