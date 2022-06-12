<?php
    include 'header.php'; // prendre le fichier header.php
?>
<br><br>
<div class="placeliste1">
    <table> <!-- on est sur tableau -->
        <tr>
            <th>Marque</th>
            <th>Modele</th>
            <th>Fournisseur</th>
            <th>Adresse</th>
            <th>Mail</th>
        </tr>
        
        <tr>
            <form name="" method="post" action="">
                <th><input class="white" name="marque" type="text"/></th>
                <th><input class="white" name="modele" type="text"/></th>
                <th><input class="white" name="fournisseur" type="text"/></th>
                <th><input class="white" name="adresse" type="text"/></th>
                <th><input class="white" name="mail" type="text"/></th>
                <th><input class="ajouter" type="submit" value="Ajouter" name="send"/></th>
            </form>
        </tr>

<?php
// on prepare de creer un ajouter dans BDD

$marque = '';
$modele = '';
$fournisseur = '';
$adresse = '';
$mail = '';

if(isset($_POST['send'])){
    if(!empty($_POST['marque'])){

        if(!empty($_POST['modele'])){

            if(!empty($_POST['fournisseur'])){

                if(!empty($_POST['adresse'])){
                    
                    if (!empty($_POST['mail'])) {
                    
                        $marque = htmlspecialchars($_POST['marque']); // les variables prennent dans les inputs
                        $modele = htmlspecialchars($_POST['modele']);
                        $fournisseur = htmlspecialchars($_POST['fournisseur']);
                        $adresse = htmlspecialchars($_POST['adresse']);
                        $mail = htmlspecialchars($_POST['mail']);

                        $insert_modele = $bdd->prepare('INSERT INTO materiels(marque,modele,fournisseur,adresse,mail) VALUES (:fmarque,:fmodele,:ffournisseur,:fadresse,:fmail)');
                        if($insert_modele->execute(array(':fmarque'=>$marque,':fmodele'=>$modele,':ffournisseur'=>$fournisseur,':fadresse'=>$adresse,':fmail'=>$mail))){
                            // on a reussi d'ajouter un bdd dans SQL
                        }

                   }             
                }
            }
        }
    }
}
  
?>

<?php
    $sql5=$bdd->prepare("SELECT * from materiels");  // on prends toute la base des donnees dans materiels
    $sql5->execute();
    while($rep = $sql5->fetch(PDO::FETCH_ASSOC)) 
    {
    echo '<tr><td>'.$rep['marque'].'</td><td>'.$rep['modele'].'</td><td>'.$rep['fournisseur'].'</td><td>'.$rep['adresse'].'</td><td>'.$rep['mail'].'</td>';
    }
?>
</table>
</div>
<?php
    include 'footer.php';
?>

