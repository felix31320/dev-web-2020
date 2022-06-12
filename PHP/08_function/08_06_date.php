<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        $annee = date('Y');
        echo $annee;

        /*
        Y = annee 2019
        y = annee 19
        m = mois
        d = jour

        H = heure
        h = heure 2 PM
        i = minutes
        s = secondes
        */

        echo '<br><br>';

        echo 'nou sommes le : ' . date( 'd/m/Y') . '<br>';
        echo 'il est : ' . date('H') . 'H' . date('i') . '<br>';
        echo 'il est : ' . date('H\Hi') . '<br>';
        echo 'nou sommes le '.date( 'd/m/Y \e\t \i\l \e\s\t H\Hi'); // on peut ecrire dans la valeur alors on va utiliser chaque lettre avce \..

    ?>
</body>
</html>