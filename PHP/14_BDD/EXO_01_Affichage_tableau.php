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
        echo 'la base de données est connecté';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd -> query('SELECT * FROM articles WHERE auteur = \'FRISCOURT\' ORDER BY id DESC'); // SELECT * FROM articles est un SQL = une requête de sélection

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
