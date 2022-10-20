<?php
    try {
        // $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

   $req = $bdd->query('SELECT count(`achat_tarif`) as comptetarif FROM `achat`');
    echo '<br>';

    while ($reponse = $req->fetch()) {

        echo 'le nombre enregristement de cette table est : '.$reponse['comptetarif'];

    }

    $req->closeCursor();

    // ('SELECT count(`achat_tarif`) as comptetarif FROM `achat`');
    // compter les listes

?>