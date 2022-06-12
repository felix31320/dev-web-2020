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
        $chaine = 'je compte le nombre de chaine';
        $chaineremplace = str_replace( ' ', '', $chaine); // str_replace ( origine, remplacer, quelle variable)

        echo 'voici la chaine remplacé <br>';
        echo $chaineremplace;

    ?>
</body>
</html>