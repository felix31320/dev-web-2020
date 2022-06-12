<?php
	include ('header.php');
?>
<center><h3>Ajout Nouvelle voiture</h3>
<hr>
</center>
<center>
<fieldset>
<legend> Nouvelle voiture </legend>
<form name="" method="post" action="">
<table>
<tr><td>Immatriculation :</td><td> <input name="immatriculation" type="text"/></td></tr></br> 
<tr><td>Couleur :</td><td> <input name="couleur" type="text"/></td></tr></br> 
<tr><td>Kilométrage : </td><td><input name="kilometrage" type="text"/></td></tr></br> 
<tr><td>Modéle : 
    
</td><td><select name="modele">
<?php
//traitement de resultat
while($modele = $sql->fetch(PDO::FETCH_ASSOC))
{
echo '<option value="'.$modele['id'].'">'.$modele['modele'].' '. $modele['marque'].' '. $modele['puissance'].' '. $modele['carburant'].'</option>';
} ?> 
</select> </td> </tr></br> 
<tr><td><input type="submit" value="Ajouter" name="ok"/> <input type="submit" value="Annuler" name="annuler" /></td>
</tr>
</table>
</form> 
</fieldset> 
</center>
<?php
//requete d'insertion
$immatriculation = '';
$couleur = '';
$kilometrage = '';
$modele = '';

if(isset($_POST['ok'])){
    if(!empty($_POST['immatriculation'])){

        if(!empty($_POST['couleur'])){

            if(!empty($_POST['kilometrage'])){

                if(!empty($_POST['modele'])){

                    $immatriculation = htmlspecialchars($_POST['immatriculation']);
                    $couleur = htmlspecialchars($_POST['couleur']);
                    $kilometrage = htmlspecialchars($_POST['kilometrage']);
                    $modele = htmlspecialchars($_POST['modele']);

                    $insert_modele = $db->prepare('INSERT INTO voiture(immatriculation,couleur,kilometrage,id_modele) VALUES (:fimmatriculation,:fcouleur,:fkilometrage,:fmodele)');
                    if($insert_modele->execute(array(':fimmatriculation'=>$immatriculation,':fcouleur'=>$couleur,':fkilometrage'=>$kilometrage,':fmodele'=>$modele))){
                        $message = "Voiture ajoutée.";
                    }
                }
            }
        }
    }
}
if (isset($_POST['annuler'])){
	header ('Location:liste_voiture.php');
	}
?>
</body>
</html>