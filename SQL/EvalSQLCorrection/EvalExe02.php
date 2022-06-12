<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=evalsql_felix;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    //echo 'La base de données est connecté';
} catch (Exception $e) {
    die('Erreur : ' .$e -> getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>EvalExe02</title>
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
<p>Lister des étudiants qui ont inscrit en classe 6ème </p>
<?php
// round(valeur,option) : option est un nombre de chiffre après la virgule par defaut est 0
$req = $bdd->query('SELECT `etudiant_nom`, `etudiant_prenom`,etudiant_classe FROM `etudiant` WHERE `etudiant_classe` = \'6EME\'');
echo  'SELECT `etudiant_nom`, `etudiant_prenom`,etudiant_classe FROM `etudiant` WHERE `etudiant_classe` = \'6EME\'';
echo '<br><br><br>';
echo '<table>';
echo '<tr>';
echo '<td>etudiant_nom</td><td>etudiant_prenom</td><td>etudiant_classe</td>';
echo '</tr>';
while ($reponse = $req->fetch()){
    echo '<tr>';
    echo '<td>'.$reponse['etudiant_nom'].'</td><td>'.$reponse['etudiant_prenom'].'</td><td>'.$reponse['etudiant_classe'].'</td>';
    echo '</tr>';
}
echo '<table>';
$req->closeCursor();


?>
</body>
</html>