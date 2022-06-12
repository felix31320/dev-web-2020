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
        
    $nb_ligne = 1;

    while ($nb_ligne <= 20) {
        $pl = ($nb_ligne > 1 ) ? 's':'';
        echo $nb_ligne . ' ligne' . $pl . '<br>';
        $nb_ligne++; // surtout a ne pas oublier $valeur++
    }

    ?>
</body>
</html>