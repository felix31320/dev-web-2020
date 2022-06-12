<?php
// connexion au serveur et à la base scoop
    $db_host="localhost";
    $db_user="root";
    $db_password="root";
    $db_name="correction_examen_blanc";

    try{
        $db = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        }
    catch(PDOEXCEPTION $e){
        $e->getMessage();
    }
//requete de selection modele
$sql=$db->prepare("select * from modele order by marque");
$sql->execute();

//requete de selection voiture
$sql2=$db->prepare("select * from voiture");
$sql2->execute();

// requete de selection pour afficher proprietaire
$sql3=$db->prepare("select * from proprietaire,voiture where kilometrage>100000");
$sql3->execute();

// requete de selection proprietaire
$sql4=$db->prepare("select * from voiture,modele where kilometrage>0");
$sql4->execute();

?>
