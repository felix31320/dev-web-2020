<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $bdd->exec('CREATE TABLE `utilisateurab` (
         `utilisateursab_id` INT NOT NULL AUTO_INCREMENT ,
          `utilisateursab_nom` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
           `utilisateursab_prenom` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
            `utilisateursab_adresse` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
             `utilisateurab_pays` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
              `utilisateursab_ville` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
               `utilisateursab_code_postal` VARCHAR(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL ,
                `utilisateursab_nombre_achat` INT NOT NULL ,
                 `utilisateursab_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
                  `utilisateursab_mail` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                   PRIMARY KEY (`utilisateursab_id`))');
    echo 'la table est bien creer <br>';

    // CREATE TABLE `utilisateurab` ( `utilisateursab_id` INT NOT NULL AUTO_INCREMENT , `utilisateursab_nom` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `utilisateursab_prenom` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `utilisateursab_adresse` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `utilisateurab_pays` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `utilisateursab_ville` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , `utilisateursab_code_postal` VARCHAR(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL , `utilisateursab_nombre_achat` INT NOT NULL , `utilisateursab_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `utilisateursab_mail` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , PRIMARY KEY (`utilisateursab_id`))
    // creer un tableau (table en anglais) dans un base de données

?>