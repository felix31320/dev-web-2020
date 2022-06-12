<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    // SELECT `achat_client`,`achat_tarif` FROM `achat` ORDER BY `achat_tarif` DESC 
    // il affiche le resultat dans l'ordre décroissant

    $req = $bdd->query('SELECT `achat_client`,`achat_tarif` FROM `achat` ORDER BY `achat_tarif` DESC ');

    while ($reponse = $req->fetch()) {
        echo '<br>';
        echo $reponse['achat_client'].' '.$reponse['achat_tarif'];
    }

    echo '<br>';
    $req->closeCursor();
    
    // SELECT `achat_client`,`achat_tarif` FROM `achat` ORDER BY `achat_tarif` ASC
    // il affiche le resultat dans l'ordre croissant

    $req1 = $bdd->query('SELECT `achat_client`,`achat_tarif` FROM `achat` ORDER BY `achat_tarif` ASC ');

    while ($reponse1 = $req1->fetch()) {
        echo '<br>';
        echo $reponse['achat_client'].' '.$reponse['achat_tarif'];
    }

    $req->closeCursor();
?>