<?php
    try {
        // $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

   $req = $bdd->query('SELECT SUM(`achat_tarif`) as total FROM `achat`');
    echo '<br>';

    while ($reponse = $req->fetch()) {
        echo 'la somme des tarif est : '.$reponse['total'];
    }

    $req->closeCursor();

    // SELECT SUM(`achat_tarif`) as total FROM `achat`
    // la somme des achats de tarif
?>