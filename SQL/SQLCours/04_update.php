<?php
    try {
        // $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $bdd->exec('UPDATE `utilisateurs` SET `utilisateurs_email` = \'felix31320@free.com\' WHERE `utilisateurs`.`utilisateurs_id` = 6;');

    // UPDATE `utilisateurs` SET `utilisateurs_email` = \'felix31320@free.com\' WHERE `utilisateurs`.`utilisateurs_id` = 6;
    // modifier une ligne dans le tableau

?>