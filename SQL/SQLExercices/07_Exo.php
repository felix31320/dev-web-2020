<?php
    try {
        // $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd->query('SELECT COUNT(`ville_nom`) as nb_saint FROM `villes_france_free` WHERE `ville_nom` LIKE \'Saint%\'');

    echo '<table>';
    while ($reponse = $req->fetch()) {
        echo '<tr><td>';
        echo 'le nombre de ville par commencer Saint : </td><td>'.$reponse['nb_saint'];
        echo '</td></tr>';
    }
    echo '</table>';

    echo '<br>';
    $req->closeCursor();
?>