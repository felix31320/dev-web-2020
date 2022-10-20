<?php
    try {
        // $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); mac
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // PC window
        echo 'la base de données est connecté <br>';
    } catch (Exception $e) {
        die('erreur : ' . $e -> getMessage());
    }

   $req = $bdd->query('SELECT `achat_client`,`achat_tarif` FROM `achat` WHERE `achat_client` like \'%ie%\'');
    echo '<br>';

    echo '%ie%';

    while ($reponse = $req->fetch()) {
        echo '<br>';
        echo 'les mots trouvée sont : '.$reponse['achat_client'].' '.$reponse['achat_tarif'];
    }

    echo '<br>';


    $req->closeCursor();

    $req1 = $bdd->query('SELECT `achat_client`,`achat_tarif` FROM `achat` WHERE `achat_client` like \'%Ma%\'');
    echo '<br>';

    echo '%Ma%';

    while ($reponse1 = $req1->fetch()) {
        echo '<br>';
        echo 'les mots trouvée sont : '.$reponse1['achat_client'].' '.$reponse1['achat_tarif'];
    }

    echo '<br>';

    $req->closeCursor();

    $req2 = $bdd->query('SELECT `achat_client`,`achat_tarif` FROM `achat` WHERE `achat_client` like \'%i%\'');
    echo '<br>';

    echo '%i%';

    while ($reponse2 = $req2->fetch()) {
        echo '<br>';
        echo 'les mots trouvée sont : '.$reponse2['achat_client'].' '.$reponse2['achat_tarif'];
    }

    $req->closeCursor();

?>