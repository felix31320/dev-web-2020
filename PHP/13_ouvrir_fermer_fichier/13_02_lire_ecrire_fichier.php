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
        // on ouvre un fichier ou creer un fichier s'il n'existe pas OPTION a
        $mon_fichier = fopen( 'fichier.txt','a');
        // petit instruction php
        $line = 'vous avez visiter la page 1' . "\n";
        // on note la ligne dans le fichier
        fwrite($mon_fichier,$line);
        // on ferme le fichier
        fclose($mon_fichier);

        // on a lire le fichier
        if (file_exists('fichier.txt')) {
            echo 'le fichier existe';
            $read = file('fichier.txt');

            var_dump($read);
            echo '<br>';

            foreach($read as $cle => $ligne){
                echo $cle . '=>' . $ligne . '<span style="color:red;">length=' . strlen($ligne) . '</span><br>';
            }
        } else {
            echo 'le fichier n\'existe pas';
        }
        
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