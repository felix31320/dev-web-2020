<?php
    include 'header.php'; // prendre le fichier header.php
?>
<br><br>
<div class="placeliste2">
    <table> <!-- on est sur tableau -->
        <tr>
            <th>Batiment</th>
            <th>Adresse</th>
        </tr>
        
        <tr>
        <form name="" method="post" action="">
            <th><input class="white" name="batiment" type="text"/></th>
            <th><input class="white" name="adresse" type="text"/></th>
            <th><input class="ajouter" type="submit" value="Ajouter" name="send"/></th>      
        </form>
        </tr>

<?php

// on prepare de creer un ajouter dans BDD

$batiment = ''; // au depart on prends les variables qui sont vide
$adresse = '';

if(isset($_POST['send'])){
    if(!empty($_POST['batiment'])){

        if(!empty($_POST['adresse'])){

                $batiment = htmlspecialchars($_POST['batiment']); // les varibles prennent dans les inputs
                $adresse = htmlspecialchars($_POST['adresse']);
            
                $insert_modele = $bdd->prepare('INSERT INTO batiment(batiment,adresse) VALUES (:fbatiment,:fadresse)'); // on a ajouté
                if($insert_modele->execute(array(':fbatiment'=>$batiment,':fadresse'=>$adresse))){
                    // on a reussi d'ajouter un bdd dans SQL
                }
     
        }
    }
}

    
    $sql5=$bdd->prepare("SELECT * from batiment");  // on prends toute la base des donnees dans materiels
    $sql5->execute();                               // on l'affiche 
    while($rep = $sql5->fetch(PDO::FETCH_ASSOC)) 
    {
    echo '<tr><td>'.$rep['batiment'].'</td><td>'.$rep['adresse'].'</td>';
    }
?>
    </table>
</div>

<?php
    include 'footer.php';
?>