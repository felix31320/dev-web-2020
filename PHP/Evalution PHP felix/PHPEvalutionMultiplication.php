<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evaluation exe 1</title>
    <style>
        #boxshadow{
            box-shadow: -2px 3px 11px -7px rgba(255,0,0,0.51);
        }
    </style>
</head>
<body>
    <h1>Table multiplication</h1>

    <?php

        $_GET['nombre'] = (int) $_GET['nombre'];
        

        if (isset($_GET['send'])) {
            

            if (!empty($_GET['nombre'])) {
               

                if (is_int($_GET['nombre'])) {
                    

                    for ($i=0; $i < 11 ; $i++) { 
                        echo $i.' x '.$_GET['nombre'].' = '.$i*$_GET['nombre'].'<br>';
                    }

                } else {
                    echo 'pas bon <br>';
                }

            } elseif (is_string($_GET['nombre']) == $_GET['nombre']) {
                echo  'Ce n\'est pas un nombre valide <br>';

            } elseif ($_GET['nombre'] == '') {
                echo '<p>le champ est vide</p>';
            }

        } else {
            echo 'le bouton n\'est pas envoye <br>';
        }
    ?>

    <br>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        Entrée un nombre : <input type="text" name="nombre" id="boxshadow"> <input type="submit" name="send">
    </form>
</body>
</html>