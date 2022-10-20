<?php
    try {
        //$bdd = new PDO('mysql:host=localhost;dbname=evalsql_felix;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=evalsql_felix;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd->query('SELECT `etudiant_id`,`controle_exam` FROM `controle`  WHERE `controle_exam` LIKE \'4\' GROUP BY `controle_exam`,`etudiant_id` ');

    echo '<table>';
    echo '<br>';
    echo '<tr><td>les etudiants (code)</td><td>Controle N°</td></tr>';
    
    while ($reponse = $req->fetch()) {
        echo '<tr>';
        echo '<td>'.$reponse['etudiant_id'].'</td><td>'.$reponse['controle_exam'].'</td>';
        echo '</tr>';
    }
    echo '</table>';

    $req->closeCursor();
?>