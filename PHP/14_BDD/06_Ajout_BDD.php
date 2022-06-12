<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    // INSERT INTO `articles` (`id`, `titre`, `contenu`, `auteur`, `date`) VALUES (NULL, 'monsieur', 'mon commentaire Z', 'FRISCOURT', CURRENT_TIMESTAMP);
    // INSERT INTO articles (titre, contenu, auteur) VALUES (\'monsieur\', \'mon commentaire Z\', \'FRISCOURT\');


    $bdd-> exec('INSERT INTO articles (titre, contenu, auteur) VALUES (\'monsieur\', \'mon commentaire Ajoute BDD par PHP\', \'FRISCOURT\')');
    // il a ajoute une ligne dans PhpMyAdmin par la regle de PHP ( voir au dessus)
?>