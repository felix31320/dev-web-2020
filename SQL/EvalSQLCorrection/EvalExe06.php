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
    <title>EvalExe06</title>
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
<p>Compter les contrôles passés par un nom d'étudiant (nom) </p>
<?php
// round(valeur,option) : option est un nombre de chiffre après la virgule par defaut est 0
$req = $bdd->query('SELECT count(`controle_exam`) as comptecontrole, controle.etudiant_id, etudiant_nom 
FROM controle 
INNER JOIN etudiant ON controle.etudiant_id = etudiant.etudiant_id 
GROUP BY controle.etudiant_id');

echo  'SELECT count(`controle_exam`) as comptecontrole, controle.etudiant_id, etudiant_nom 
FROM controle 
INNER JOIN etudiant ON controle.etudiant_id = etudiant.etudiant_id 
GROUP BY controle.etudiant_id';
echo '<br><br><br>';
echo '<table>';
echo '<tr>';
echo '<td>comptecontrole</td><td>etudiant_id</td><td>etudiant_nom</td>';
echo '</tr>';
while ($reponse = $req->fetch()){
    echo '<tr>';
    echo '<td>'.$reponse['comptecontrole'].'</td><td>'.$reponse['etudiant_id'].'</td><td>'.$reponse['etudiant_nom'].'</td>';
    echo '</tr>';
}
echo '<table>';
$req->closeCursor();


?>
</body>
</html>