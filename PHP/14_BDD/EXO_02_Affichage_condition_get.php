<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        tr:first-child{
            background-color: grey;
        }
        td{
            border: solid black 1px;
            padding: 5px;
        }
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté <br><br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    // ici on controle la presence GET
    if (isset($_GET)) {
        echo 'GET existe <br>';
        if (!empty($_GET['auteur'])) {
            echo 'GET auteur \'est pas vide <br>';
            $auteur = $_GET['auteur'];
            echo $auteur;

        } else {
            echo 'GET auteur est vide <br>';
        }
    } else {
        echo 'GET n\'existe pas <br>';
    }

    // methode pour couper une chaine ' . $auteur . '

    if (empty($auteur)) {
        echo 'auteur est vide <br>';
        $req = $bdd -> query('SELECT * FROM articles ORDER BY id DESC'); // SELECT * FROM articles est un SQL = une requête de sélection   
    } else {
        echo 'auteur n\'est pas vide';
        $req = $bdd -> query('SELECT * FROM articles WHERE auteur = \'' . $auteur . '\' ORDER BY id DESC'); // SELECT * FROM articles est un SQL = une requête de sélection   

    }

    echo '<br><br><br>';

    echo '<table>
            <tr style="text-align:center; font-weight:bold;">
                <td>id</td>
                <td>titre</td>
                <td>contenu</td>
                <td>auteur</td>
                <td>date</td>
            </tr>';
    while ($reponse = $req->fetch()) {
       
        
        echo '<tr><td>' . $reponse['id'] . '</td> <td>' . $reponse['titre'] . '</td> <td>' . $reponse['contenu'] . '</td> <td>' . $reponse['auteur'] . '</td> <td>' . $reponse['date'] . '</td></tr>';
        
    }
    
    echo '</table>';

    $req->closeCursor();

    ?>
</body>
</html>
