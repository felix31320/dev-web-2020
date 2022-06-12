<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php // unique PHP
        
        for ($nb_ligne=1; $nb_ligne <= 20 ; $nb_ligne++) { 

            // 1er methode
            $pl = ($nb_ligne > 1) ? 's':'';
            echo $nb_ligne.' ligne' . $pl . ' <br>';

            // 2eme methode

            // if ($nb_ligne > 1) {
            //     echo $nb_ligne.' lignes <br>';
            // } else {
            //     echo $nb_ligne.' ligne <br>';
            // }
            
        }
    ?>


    <?php // PHP avec HTML
        for ($nb_ligne=1; $nb_ligne <= 20 ; $nb_ligne++) { ?>
            <p>ma ligne <?php echo $nb_ligne ?> </p>
        <?php    
        }
        ?>
    
</body>
</html>