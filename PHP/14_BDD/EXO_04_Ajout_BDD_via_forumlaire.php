<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF'] ?>">
        Titre : <input type="text" name="TITRE"><br><br>
        Contenu : <input type="text" name="CONTENU"><br><br>
        Auteur : <input type="text" name="AUTEUR"><br><br>

        <input type="submit" value="Ajouter" name="send">

        <?php

            try {
                $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                echo 'la base de données est connecté';
            } catch (Exception $e) {
                die('erreur : ' . $e -> getMessage());
            }

            if (!empty($_GET['TITRE']) && !empty($_GET['CONTENU']) && !empty($_GET['AUTEUR'])) {
                echo '<br>votre compte est complet<br>';
                if (isset($_GET['send'])) {
                    $titre = strip_tags($_GET['TITRE']);
                    $contenu = strip_tags($_GET['CONTENU']);
                    $auteur = strip_tags($_GET['AUTEUR']);

                    echo 'votre compte est envoyer';
                    $bdd-> exec('INSERT INTO articles (titre, contenu, auteur) VALUES (\''.$titre.'\', \''.$contenu. '\', \''.$auteur.'\')');
                } else {
                    echo 'votre compte \'est pas envoyer';
                }
            } else {
                echo '<br>votre compte n\'est pas complet<br>';
            }
        ?>
    </form>
</body>
</html>