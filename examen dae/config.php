<?php // on va voir sur mon site : http://friscourt.sourdoues.com/examen_dae/index.php
    // try { // ici pour se connecter au SQL
    //     $bdd = new PDO('mysql:host=nqyb.myd.infomaniak.com;dbname=nqyb_friscourtbdd;charset=utf8','nqyb_friscourt','$friscourt_2020$',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    //     echo 'on est connecté dans le BDD de examen_dae ';
    // } catch (Exception $e) {
    //     die('erreur : ' . $e -> getMessage());
    // }
?>

<?php // on va voir sur mon site : localhost
    try { // ici pour se connecter au SQL
        $bdd = new PDO('mysql:host=localhost;dbname=1examen_dae','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // echo 'on est connecté dans le BDD de examen_dae ';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }
?>