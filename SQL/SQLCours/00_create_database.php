<?php
    try{
        $bdd = new PDO("mysql:host=localhost",'root','root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $bdd->exec('CREATE DATABASE test');
        echo 'la Database est bien cree';
        
    } catch (PDOException $e) {
        echo "error : ". $e->getMessage();
    }
?>