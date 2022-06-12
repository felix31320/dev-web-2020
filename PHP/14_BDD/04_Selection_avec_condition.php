<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd -> query('SELECT * FROM articles WHERE auteur = \'FRISCOURT\''); // SELECT * FROM articles est un SQL = une requête de sélection

    while ($reponse = $req->fetch()) {
        echo '<br><br>';
        echo $reponse['titre'];
        echo '<br>';
        echo $reponse['contenu'];
        echo '<br>';
        echo $reponse['auteur'];
        echo '<br><br>';
    }

    $req->closeCursor();
?>