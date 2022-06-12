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

        $prenom = array('felix','maxime','alexis');
        echo $prenom[0].'<br>';

        $prenom[] = 'anais'; // mettre la fin du tableau 

        echo $prenom[3];

    ?>
</body>
</html>