<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd->query('SELECT `departement_nom`,ROUND(SUM(`ville_surface`),0) as M2 FROM `departement` INNER JOIN villes_france_free ON departement.departement_code=villes_france_free.ville_departement GROUP BY `departement_nom` ORDER BY M2 DESC LIMIT 10');

    echo '<table>';
    echo '<tr><td>departement</td><td>Surface M²</td></tr>';
    while ($reponse = $req->fetch()) {
        echo '<tr><td>';
        echo $reponse['departement_nom'].'</td><td>'.$reponse['M2'].'</td><td>';
        echo '</td></tr>';
    }
    echo '</table>';

    echo '<br>';
    $req->closeCursor();
?>