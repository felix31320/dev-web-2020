<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php // la 1er methode
        function calculcarre($nombre)
        {
            echo 'le carre de nombre : ' . $nombre . ' est : ' . $nombre*$nombre;
        }

        calculcarre(5);

        echo '<br><br>'; // OU la 2eme methode

        function calculcarre2($nombre)
        {
            $carre = $nombre*$nombre;
            return $carre;
        }

        echo 'le carre de 8 est  : ' . calculcarre2(8);
    ?>
</body>
</html>