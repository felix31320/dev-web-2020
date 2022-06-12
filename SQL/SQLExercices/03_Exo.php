<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd->query('SELECT `ville_nom`,`ville_departement` FROM `villes_france_free` WHERE `ville_departement` LIKE \'97%\' ');

    echo '<table>';
    while ($reponse = $req->fetch()) {
        echo '<tr><td>';
        echo $reponse['ville_nom'].'</td><td>'.$reponse['ville_departement'];
        echo '</td></tr>';
    }
    echo '</table>';

    echo '<br>';
    $req->closeCursor();
?>