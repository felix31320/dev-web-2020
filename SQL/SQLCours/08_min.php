<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

   $req = $bdd->query('SELECT MIN(`achat_tarif`) as tarif_mini FROM `achat`');
    echo '<br>';

    while ($reponse = $req->fetch()) {
        echo 'la plus petite tarif est : '.$reponse['tarif_mini'];
    }

    $req->closeCursor();

    // SELECT MIN(`achat_tarif`) as tarif_mini FROM `achat`
    // la minimum des tarif
?>