<?php
    try {
        // $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

   $req = $bdd->query('SELECT MAX(`achat_tarif`) as tarif_max FROM `achat`');
    echo '<br>';

    while ($reponse = $req->fetch()) {
        echo 'la plus grand tarif est : '.$reponse['tarif_max'];
    }

    $req->closeCursor();

    // SELECT MAX(`achat_tarif`) as tarif_max FROM `achat`
    // la maximum des tarif
?>