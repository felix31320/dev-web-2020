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

        $prenom = array('felix','maxime','alexis','anais');

        for ($indice=0; $indice <= 3; $indice++) { // 1er methode
            echo $prenom[$indice] . '<br>';
        }

        echo '<br>';

        foreach ($prenom as $prenom ) { // 2eme methode , each = chaque
            echo $prenom . '<br>';
        }

        echo '<br>';

        $tableau = array(
            'prenom' => 'romain', // string , 'clé' => 'element' 
            'nom' => 'boussy',
            'age' => 25, //integer
            'ville' => 'aix-les bains',
        );

        foreach ($tableau as $element) {
            echo '→ ' . $element . '<br>';
        }

        echo '<br>';

        foreach ($tableau as $cle => $element) {
            echo '=> ' . $cle . ' vaut ' . $element . '<br>';
        }

        echo '<br> avec print_r <br>';

        echo '<pre>';
        print_r ($tableau);
        echo '</pre>';

        echo 'avec var_dump <br>'; // var_dump

        echo '<pre>';
        var_dump ($tableau);
        echo '</pre>';

    ?>
</body>
</html>