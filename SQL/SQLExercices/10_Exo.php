<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd->query('SELECT `departement_nom`,SUM(`ville_population_2012`) as nbpop FROM `villes_france_free` INNER JOIN departement ON departement.departement_code=villes_france_free.ville_departement GROUP BY `departement_nom` HAVING nbpop > 2000000 ORDER BY nbpop DESC');

    echo '<table>';
    echo '<tr><td>Departement</td><td>plus de 2 Millions d\'hab<td></tr>';
    while ($reponse = $req->fetch()) {
        echo '<tr><td>';
        echo $reponse['departement_nom'].'</td><td>'.$reponse['nbpop'].'</td><td>';
        echo '</td></tr>';
    }
    echo '</table>';

    echo '<br>';
    $req->closeCursor();
?>