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
        
        $nombre1 = 10;

        if ($nombre1 < 0) {
            echo 'le nombre est inferieur';
        } else {
            echo 'le nombre est superieur';
        }

        echo '<br>';

        $nombre2 = 0;

        if ($nombre2 < 0) {
            echo 'le nombre est inferieur';
        } elseif ($nombre2 > 0) { // avec elseif veut dire "encore si"
            echo 'le nombre est superieur';
        } else {
            echo 'le nombre est nul';
        }

        echo '<br><br>';

        $pays = 'france';
        $pays1 = 'belgique';

        if ($pays == 'france' or $pays1 == 'belgique') { // or = ou = ||
            echo 'bienvenue1';
        } else {
            echo 'desole1';
        }

        echo '<br><br>';

        if ($pays == 'france' and $pays1 == 'BELGIQUE') { // and = et = &&
            echo 'bienvenue2';
        } else {
            echo 'desole2';
        }

        echo '<br><br>';

        $nombre3 = 50;
        $intnombre = 100;

        if ($nombre3 < $intnombre) {
            $resultat = 'le nombre ' . $nombre3 . ' est inferieur a ' . $intnombre;
        } else {
            $resultat = 'le nombre ' . $nombre3 . ' est superieur ou egal a ' . $intnombre;
        }

        echo $resultat;

        echo '<br>';

        $resultat2 = ($nombre3 < $intnombre) ? 'inferieur' : 'superieur ou egale';
        echo 'le resultat est ' . $resultat2 . ' à ' . $intnombre;

        echo '<br><br>';

        // SWTICH

        $pay2 = 'france';

        switch ($pay2){
           case ('france');
                echo 'la france est selectionnée';
            break;

            case ('suisse');
                echo 'le suisse est selectionnée';
            break;
            default:
            echo 'desole';
        }

    ?>
</body>
</html>