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
        $chaine = 'le texte est en petit caractere';
        $cahinemax = strtoupper($chaine); // strtoupper est force en majuscule 

        echo 'voici la chaine text en majuscule <br>';
        echo $cahinemax;
    ?>
</body>
</html>