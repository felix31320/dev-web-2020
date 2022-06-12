<?php
    try { // ici pour se connecter au SQL
        $bdd = new PDO('mysql:host=localhost;dbname=examen_blanc;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // echo 'on est connecté dans le BDD de examen blanc';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }
?>