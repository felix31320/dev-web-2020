<?php
    try {
        // $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

   $req = $bdd->query('SELECT `achat_client`,`achat_produits_id`,`produits_id`,`produits_categorie` FROM `achat` INNER JOIN `produits` ON achat.achat_produits_id=produits.produits_id ');
    echo '<br>';

    echo '<table>';
    while ($reponse = $req->fetch()) {
        echo '<tr>';
        echo '<td>le client : '.$reponse['achat_client'].'</td><td>'.$reponse['achat_produits_id'].'</td><td>'.$reponse['produits_id'].'</td><td>'.$reponse['produits_categorie'].'</td>';
        echo '</tr>';
    }
    echo '</table>';

    echo '<br>';

    $req->closeCursor();

?>