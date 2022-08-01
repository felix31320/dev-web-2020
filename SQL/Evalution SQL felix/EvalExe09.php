<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=evalsql_felix;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

    $req = $bdd->query('SELECT `controle_matiere`,MIN(`controle_note`) as BasseNote FROM `controle` GROUP BY `controle_matiere`');

    echo '<table>';
    echo '<br>';
    echo '<tr><td>la matiere</td><td>Basse note</td></tr>';
    
    while ($reponse = $req->fetch()) {
        echo '<tr>';
        echo '<td>'.$reponse['controle_matiere'].'</td><td>'.$reponse['BasseNote'].'</td>';
        echo '</tr>';
    }
    echo '</table>';

    $req->closeCursor();
?>