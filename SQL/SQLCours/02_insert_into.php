<?php
    try {
        // $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $bdd->exec('INSERT INTO `utilisateurs` (`utilisateurs_id`, `utilisateurs_nom`, `utilisateurs_prenom`, `utilisateurs_email`, `utilisateurs_date_naissance`, `utilisateurs_pays`, `utilisateurs_ville`, `utilisateurs_code_postale`, `utilisateurs_nombre_achat`) VALUES (NULL, \'FRISCOURT\', \'Felix\', \'felix31320@gmail.com\', \'1999-05-26\', \'France\', \'Toulouse\', \'31320\', \'3\');');

    // INSERT INTO `utilisateurs` (`utilisateurs_id`, `utilisateurs_nom`, `utilisateurs_prenom`, `utilisateurs_email`, `utilisateurs_date_naissance`, `utilisateurs_pays`, `utilisateurs_ville`, `utilisateurs_code_postale`, `utilisateurs_nombre_achat`) VALUES (NULL, 'FRISCOURT', 'Felix', 'felix31320@gmail.com', '1999-05-26', 'France', 'Toulouse', '31320', '3');
    // ajouter une ligne dans le tableau
?>