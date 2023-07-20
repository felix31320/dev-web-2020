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
        echo '<h1>bienvenue le programme PHP</h1>'; // Echo veut dire comme <P> chez HTML ou alors document.write chez JavaScript

        $ma_variable = 25; // pour declarer une variable donc commence par $....

        echo '<p>le client a ';
        echo $ma_variable; // plusieurs donc ca fait du lourd
        echo ' ans</p>';

        echo 'le client a ' . $ma_variable . ' ans<br><br>'; // conseille,  la seule ligne, comme un peu pres javascript : 'string' + ... + 'string'
        echo "le client a $ma_variable ans"; // mais deconseiller la difference entre "..." et '...'
        
        
    ?>

</body>
</html>