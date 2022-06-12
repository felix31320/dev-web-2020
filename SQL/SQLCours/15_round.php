<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

   $req = $bdd->query('SELECT ROUND(SUM(`achat_tarif`),2) as sommetarif FROM `achat` ');
    echo '<br>';

    while ($reponse = $req->fetch()) {

        echo 'la somme tarif est : '.$reponse['sommetarif'];

    }

    $req->closeCursor();

    // ('SELECT ROUND(SUM(`achat_tarif`),2) as sommetarif FROM `achat` ');
    // round veut dire arrondir en 2

?>