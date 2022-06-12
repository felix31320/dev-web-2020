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
        echo 'J ' . $_GET['nom'] . '<br>'; // $_GET veut dire lire dans le site https... essaie toi de copier au dessous
        // hello.php?nom=felixfriscourt // ? veut dire lien à la base de donnée

        echo 'Y ' . $_GET['prenom'] . '<br>';
        // hello.php?nom=friscourt&prenom=felix // & veut dire "et"

        // isset() : verifier si la variable existe

        if (isset ($_GET['nom'])) { // isset = "est assigner" assigner veut dire "forcer la"
            echo 'il est la variable <br>';
        } else {
            echo 'il n\' est pas la variable <br>';
        }


        if (isset ($_GET['prenom']) && isset ($_GET['nom'])) {
            echo 'il est la variable <br>';
        } else {
            echo 'il n\' est pas la variable <br>';
        }

                                                                                // isset = !empty comme la = pas vide
                                                                                // !isset = empty comme pas la = vide
        echo '<br><br><br><br>';

        // empty() : verifier si la variable est vide

        if (!empty ($_GET['nom'])) { // empty = "vide" 
            echo 'il est la variable <br>';
        } else {
            echo 'il est vide <br>';
        }

        if (!empty ($_GET['prenom']) && !empty ($_GET['nom'])) {
            echo 'il est la variable <br>';
        } else {
            echo 'il est vide <br>';
        }

        echo '<br>';

        if (isset ($_GET['prenom']) && isset ($_GET['nom'])) {
            echo 'le nom et le prenom sont bon';

        } elseif (empty ($_GET['prenom']) && empty ($_GET['nom'])) {
            echo 'le nom et le prenom sont manquants';
            
        } elseif (empty ($_GET['prenom']) || empty ($_GET['nom'])) {
            echo 'le nom ou le prenom sont manquants';
        }

    ?>
</body>
</html>