<?php
    try {
        // $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd->query('SELECT `ville_nom`,`ville_population_2012`,`departement_nom` FROM `villes_france_free` INNER JOIN departement ON villes_france_free.ville_departement=departement.departement_code ORDER BY `ville_population_2012` DESC LIMIT 10 ');

    echo '<table>';
    while ($reponse = $req->fetch()) {
        echo '<tr><td>';
        echo $reponse['ville_nom'].'</td><td>'.$reponse['ville_population_2012'].'</td><td>'.$reponse['departement_nom'];
        echo '</td></tr>';
    }
    echo '</table>';

    echo '<br>';
    $req->closeCursor();
?>