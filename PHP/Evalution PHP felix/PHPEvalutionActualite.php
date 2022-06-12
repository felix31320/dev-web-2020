<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        tr,td{
            border: black solid 2px;
            border-radius: 5px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php
        echo '<h1>Actualité en PHP</h1>';

        $titre  = array('<span style="color:red;">1</span> <span style="color:blue;">google</span>','<span style="color:red;">2</span> <span style="color:blue;">facebook</span>','<span style="color:red;">3</span> <span style="color:blue;">twitter</span>','<span style="color:red;">4</span> <span style="color:blue;">twitch</span>','<span style="color:red;">5</span> <span style="color:blue;">youtube</span>');

        $text = array('voleur voleur voleur voleur voleur voleur voleur voleur ','fou fou fou fou fou fou fou fou fou ','haha haha haha haha haha haha haha haha ','non non non non non non non non ','oui oui oui oui oui oui ');

        echo '<table>';
        
        for ($i=1; $i < 6 ; $i++) { 
            echo '<tr><td>' . $titre[$i-1] . '<br>' . $text[$i-1] .'<br></td></tr>';
        }
        
        echo '</table>';

    ?>

    Entée nombre maximum actualité : 
    <form action="<?php $_SERVER['PHP_SELF'] ?>">
        <select name="nombre" id="nombre">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <input type="submit" name="send">
    </form>

    <?php

        if (isset($_GET['send'])) {
            echo 'envoyé <br>';

            
        } else {
            echo 'pas envoyé <br>';
        }

    ?>
</body>
</html>