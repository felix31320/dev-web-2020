<?php
    try {
        //$bdd = new PDO('mysql:host=localhost;dbname=evalsql_felix;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=evalsql_felix;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd->query('SELECT `etudiant_nom`,AVG(`controle_note`) as MoyenneControle FROM `controle` INNER JOIN `etudiant` ON etudiant.etudiant_id=controle.etudiant_id GROUP BY `etudiant_nom`');

    echo '<table>';
    echo '<br>';
    echo '<tr><td>les etudiant (nom)</td><td>Moyenne des notes</td></tr>';
    
    while ($reponse = $req->fetch()) {
        echo '<tr>';
        echo '<td>'.$reponse['etudiant_nom'].'</td><td>'.$reponse['MoyenneControle'].'</td>';
        echo '</tr>';
    }
    echo '</table>';

    $req->closeCursor();
?>