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
        $tableau = array(
            'prenom'=> 'romain',
            'nom'=> 'BOUSSY',
            'age'=> '25',
            'ville'=> 'Aix-les-bains'
        );

        if (array_key_exists('ville',$tableau)) { // key_exists veut dire " il y a ou pas ? "
            echo 'la cle ville est dans le tableau';
        } else {
            echo 'la cle ville n\'est pas dans le tableau';
        }

        echo '<br>';

        $legumes = array('haricot','choux-fleur','carottes');

        if (in_array('carottes', $legumes)) { // in_array(X,Y) = il y a un inconnue X dans le tableau (Y) ?
            echo 'carottes se trouve dans le tableau';
        } else {
            echo 'carottes ne se trouve pas dans le tableau';
        }

        echo '<br><br><br><br>';

        $rech_legumes = "carottes";

        if (in_array($rech_legumes, $legumes)) {
            echo $rech_legumes . ' se trouve dans le tableau';
        } else {
            echo $rech_legumes . ' ne se trouve pas dans le tableau';
        }

        echo '<br><br>';

        $position = array_search($rech_legumes, $legumes); // array_search(X,Y) = où est un inconnue X dans le tableau ? search = "chaque"
        echo $position;
    ?>
</body>
</html>