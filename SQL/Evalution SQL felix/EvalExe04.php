<?php
    try {
        //$bdd = new PDO('mysql:host=localhost;dbname=evalsql_felix;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=evalsql_felix;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd->query('SELECT `controle_matiere`,AVG(`controle_note`) as Moyenne FROM `controle` GROUP BY `controle_matiere`');

    echo '<table>';
    echo '<br>';
    echo '<tr><td>les matieres</td><td>Moyenne</td></tr>';
    
    while ($reponse = $req->fetch()) {
        echo '<tr>';
        echo '<td>'.$reponse['controle_matiere'].'</td><td>'.$reponse['Moyenne'].'</td>';
        echo '</tr>';
    }
    echo '</table>';

    $req->closeCursor();
?>