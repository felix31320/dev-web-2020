<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd -> query('SELECT auteur FROM articles GROUP BY auteur');

    while ($reponse = $req->fetch()) {
        echo '<br><br>';
        echo $reponse['auteur'];
        echo '<br>';
    }

    $req->closeCursor();
?>