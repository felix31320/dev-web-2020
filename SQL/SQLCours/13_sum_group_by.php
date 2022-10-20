<?php
    try {
        // $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

   $req = $bdd->query('SELECT sum(`achat_tarif`) as tarif,`achat_client` FROM `achat` GROUP BY `achat_client` ORDER BY tarif DESC');
    echo '<br>';

    while ($reponse = $req->fetch()) {
        echo '<br>';
        echo 'le client : '.$reponse['achat_client'].' '.$reponse['tarif'];
    }

    echo '<br>';

    $req->closeCursor();

?>