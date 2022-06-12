<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=evalsql_felix;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd->query('SELECT `etudiant_nom`,`etudiant_prenom`,`etudiant_classe` FROM `etudiant` WHERE `etudiant_classe` LIKE \'6EME\'');

    echo '<table>';
    echo '<br><br>';
    echo 'les etudiants qui ont inscrit en classe 6eme';
    echo '<br><br>';
    
    while ($reponse = $req->fetch()) {
        echo '<tr>';
        echo '<td>'.$reponse['etudiant_nom'].'</td><td>'.$reponse['etudiant_prenom'].'</td><td>'.$reponse['etudiant_classe'].'</td>';
        echo '</tr>';
    }
    echo '</table>';

    $req->closeCursor();
?>