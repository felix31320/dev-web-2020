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
        $nombre2 = 5;
        $nombre3 = 3;

        $resultat1 = $nombre1 + $nombre2;
        $resultat2 = $nombre1 * $nombre2;
        $resultat3 = $nombre1 - $nombre2;
        $resultat4 = $nombre1 / $nombre2;
        $resultat5 = $nombre1 % $nombre3; // 10 modulo 3
        
        
        echo 'resultat1 est ' . $resultat1 . ' par ' . $nombre1 . ' + ' . $nombre2  .' = ' . $resultat1 . '<br><br>';
        echo 'resultat2 est ' . $resultat2 . ' par ' . $nombre1 . ' * ' . $nombre2  .' = ' . $resultat2 . '<br><br>';
        echo 'resultat3 est ' . $resultat3 . ' par ' . $nombre1 . ' - ' . $nombre2  .' = ' . $resultat3 . '<br><br>';
        echo 'resultat4 est ' . $resultat4 . ' par ' . $nombre1 . ' / ' . $nombre2  .' = ' . $resultat4 . '<br><br>';
        echo 'resultat5 est ' . $resultat5 . ' par ' . $nombre1 . ' % ' . $nombre3  .' = ' . $resultat5 . ' le reste de la divison <br><br>';


    ?>
</body>
</html>