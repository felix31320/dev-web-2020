<?php
    try {
        // $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    // SELECT `achat_client`,`achat_tarif` FROM `achat` ORDER BY `achat_tarif` DESC LIMIT 3
    // il affiche le resultat dans l'ordre décroissant en limite 

    $req = $bdd->query('SELECT `achat_client`,`achat_tarif` FROM `achat` ORDER BY `achat_tarif` DESC LIMIT 3');

    while ($reponse = $req->fetch()) {
        echo '<br>';
        echo $reponse['achat_client'].' '.$reponse['achat_tarif'];
    }

    echo '<br>';
    $req->closeCursor();
    
    // SELECT `achat_client`,`achat_tarif` FROM `achat` ORDER BY `achat_tarif` ASC LIMIT 3
    // il affiche le resultat dans l'ordre croissant en limite

    $req1 = $bdd->query('SELECT `achat_client`,`achat_tarif` FROM `achat` ORDER BY `achat_tarif` ASC LIMIT 3');

    while ($reponse1 = $req1->fetch()) {
        echo '<br>';
        echo $reponse1['achat_client'].' '.$reponse1['achat_tarif'];
    }

    $req1->closeCursor();
?>