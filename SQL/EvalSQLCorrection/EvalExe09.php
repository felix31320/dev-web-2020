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
    <title>EvalExe09</title>
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
<p>Lister la meilleure note par matière de tous les contrôles </p>
<?php
// round(valeur,option) : option est un nombre de chiffre après la virgule par defaut est 0
$req = $bdd->query('SELECT round(min(controle_note)) as basssenote, controle_matiere FROM `controle` GROUP BY controle_matiere');

echo 'SELECT round(min(controle_note)) as basssenote, controle_matiere FROM `controle` GROUP BY controle_matiere';

echo '<br><br><br>';
echo '<table>';
echo '<tr>';
echo '<td>basssenote</td><td>controle_matiere</td>';
echo '</tr>';
while ($reponse = $req->fetch()){
    echo '<tr>';
    echo '<td>'.$reponse['basssenote'].'</td><td>'.$reponse['controle_matiere'].'</td>';
    echo '</tr>';
}
echo '<table>';
$req->closeCursor();


?>
</body>
</html>