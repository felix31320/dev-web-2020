<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=testExercice;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd->query('SELECT COUNT(`ville_commune`) as compteMemeVille,`ville_nom` FROM `villes_france_free` GROUP BY `ville_nom` ORDER BY compteMemeVille DESC ');

    echo '<table>';
    echo '<tr><td>CompteMemeVille</td><td>Ville</td></tr>';
    while ($reponse = $req->fetch()) {
        echo '<tr><td>';
        echo $reponse['compteMemeVille'].'</td><td>'.$reponse['ville_nom'].'</td><td>';
        echo '</td></tr>';
    }
    echo '</table>';

    echo '<br>';
    $req->closeCursor();
?>