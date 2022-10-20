<?php
    try {
        // $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

   $req = $bdd->query('SELECT AVG(`achat_tarif`) as tarif_moyen FROM `achat`');
    echo '<br>';

    while ($reponse = $req->fetch()) {
        echo 'la moyenne de tarif est : '.$reponse['tarif_moyen'];
    }

    $req->closeCursor();

    // SELECT AVG(`achat_tarif`) as tarif_moyen FROM `achat`
    // la moyenne des tarif
?>