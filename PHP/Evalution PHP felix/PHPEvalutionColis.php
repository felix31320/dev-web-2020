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
        include('ControleColis.php');
    ?>
    
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
    <br> Entrée la largeur : <input type="text" name="lar"><br>
    <br> Entrée la longueur : <input type="text" name="lon"><br>
    <br> Entrée la hauteur : <input type="text" name="hau"><br>
    
    <br> <input type="submit" name="send">
    </form>
</body>
</html>