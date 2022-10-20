<?php
    try {
        // $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

   $req = $bdd->query('SELECT ROUND(SUM(`achat_tarif`),2) as sommetarif, `achat_client` FROM `achat` GROUP BY `achat_client` HAVING sommetarif > 40 ORDER BY sommetarif DESC');
    echo '<br>';

    echo '<table>';
    while ($reponse = $req->fetch()) {
        echo '<tr>';
        echo '<td>'.$reponse['achat_client'].'</td><td>'.$reponse['sommetarif'].'</td>';
        echo '</tr>';
    }
    echo '</table>';

    $req->closeCursor();

    // ('SELECT ROUND(SUM(`achat_tarif`),2) as sommetarif FROM `achat` ');
    // round veut dire arrondir en 2

?>