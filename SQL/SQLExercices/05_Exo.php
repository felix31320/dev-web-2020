<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd->query('SELECT `departement_nom`,COUNT(`ville_nom`) as nb_ville,`departement_code` FROM `departement` INNER JOIN villes_france_free ON departement.departement_code=villes_france_free.ville_departement GROUP BY `departement_nom`,`departement_code` ORDER BY nb_ville DESC');

    echo '<table>';
    echo '<tr><td>departement</td><td>nombre de ville</td><td>departement de code</td></tr>';
    while ($reponse = $req->fetch()) {
        echo '<tr><td>';
        echo $reponse['departement_nom'].'</td><td>'.$reponse['nb_ville'].'</td><td>'.$reponse['departement_code'];
        echo '</td></tr>';
    }
    echo '</table>';

    echo '<br>';
    $req->closeCursor();
?>