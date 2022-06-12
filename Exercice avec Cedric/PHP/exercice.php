<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php

        
        $salaire = 2000;
        $metier = 'informatique';
        $etude = true;
        $note = 11.5;

        echo 'le salaire auquel j\'aspire pour bien vivre : <strong>'.$salaire.'€</strong><br>';
        echo 'la branche dans laquelle je travaille ou souhaiterais travailler : <strong>'.$metier.'</strong><br>';
        echo 'pour préciser : <strong>'.$metier;

        if ($etude == true) {
            echo ' est la branche dans laquelle je travaille</strong><br>';
        } else {
            echo ' est la branche dans laquelle je souhaiterais travailler </strong><br>';
        }

        echo 'la note moyenne que j\'ai obtenue au bac : <strong>'.$note.'</strong><br>';
    ?>
</body>
</html>