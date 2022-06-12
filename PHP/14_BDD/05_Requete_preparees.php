<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd -> prepare('SELECT * FROM articles WHERE auteur = ?'); // SELECT * FROM articles est un SQL = une requête de sélection

    // copier l'adresse sur URL : http://localhost/ici/PHP/14_BDD/05_Requete_preparees.php?rechAuteur=FRISCOURT
    echo '<br>';
    echo $_GET['rechAuteur'];

    $req->execute(array($_GET['rechAuteur']));

    while ($reponse = $req->fetch()) {
        echo '<br><br>';
        echo $reponse['titre'];
        echo '<br>';
        echo $reponse['contenu'];
        echo '<br>';
        echo $reponse['auteur'];
        echo '<br><br>';
    }

    $req->closeCursor();
?>