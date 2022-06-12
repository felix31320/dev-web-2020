<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $nom_fichier = fopen( 'fichier.txt','r+');

        /*
        r : ouvre le fichier en lecture seule : ca veut dire on ne peut pas ecrire dans ce fichier
        r+ : ouvre en lecture et ecriture / le plus utilisé
        a : ouvre en ecriture seul. creer le fichier s'il n'existe pas
        a+ : ouvre en lecture et en ecriture. creer le fichier s'il n'existe pas

        on fait nos petit instruction php

        r ouvre en lecture seule. pointeur est placé au debut
        r+ ouvre en lecture et ecriture. pointeur est placé au debut
        a ouvre en ecriture seule. pointeur est placé a la fin
        a+ ouvre en lecture et ecriture. pointeur est placé a la fin

        on ferme le fichier

        */
    ?>
</body>
</html>