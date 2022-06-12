<?php
	include ('header.php');
?>
<br> <br> <br> <hr> <center>
<h3>Ajout Nouveau Propriétaire</h3> <hr> </center> 
<center> 
<fieldset >
<legend> Nouveau propriétaire </legend>
<form name="" method="post" action="" >
<table>
<tr>
<td>Nom :</td><td><input name="nom" type="text"/></td>
</tr>
<tr>
<td>Prénom :</td><td><input name="prenom" type="text"/></td>
</tr>
<tr>
<td>Adrese :</td><td><input name="adresse" type="text"/></td>
</tr>
<tr>
<td>Code Postal :</td><td><input name="cdp" type="number"/></td>
</tr>
<tr>
<td>Ville :</td><td><input name="ville" type="text"/></td>
</tr>
<tr>
<td>Téléphone :</td><td><input name="tel" type="number"/></td>
</tr>
<tr>
<td>Immatriculation :</td>
<td>
<select name="matricule">
<?php
//traitement de resultat
$immatriculation = $_POST['matricule'];

while($plaque = $sql2->fetch(PDO::FETCH_ASSOC))
{
echo '<option value="'.$plaque['id'].'">'.$plaque['immatriculation'].'</option>';
} ?> 
</select> </td> 
</tr>
<tr> <td></td> <td><input type="submit" value="Ajouter" name="ok"/><input type="submit" value="Annuler" name="annuler" /></td> </tr> </table>
</form>
</fieldset>
</center>
<?php
//requete d'insertion
$nom = '';
$prenom = '';
$adresse = '';
$cdp = '';
$ville = '';
$tel = '';
$matricule = '';

if(isset($_POST['ok'])){
    if(!empty($_POST['nom'])){

			if(!empty($_POST['prenom'])){
					
					if(!empty($_POST['adresse'])){

						if(!empty($_POST['cdp'])){

							if(!empty($_POST['ville'])){
								
									if(!empty($_POST['tel'])){
										
											if(!empty($_POST['matricule'])){


												$nom = htmlspecialchars($_POST['nom']);
												$prenom = htmlspecialchars($_POST['prenom']);
												$adresse = htmlspecialchars($_POST['adresse']);
												$cdp = htmlspecialchars($_POST['cdp']);
												$ville = htmlspecialchars($_POST['ville']);
												$tel = htmlspecialchars($_POST['tel']);
												$matricule = htmlspecialchars($_POST['matricule']);

												$insert_modele = $db->prepare('INSERT INTO proprietaire(NOM,PRENOM,ADRESSE,CODE_POSTAL,VILLE,TEL,ID_VOITURE) VALUES (:fnom,:fprenom,:fadresse,:fcdp,:fville,:ftel,:fmatricule)');
												if($insert_modele->execute(array(':fnom'=>$nom,':fprenom'=>$prenom,':fadresse'=>$adresse,':fcdp'=>$cdp,':fville'=>$ville,'ftel'=>$tel,'fmatricule'=>$matricule))){
													$message = "Voiture ajoutée.";
										}
									}
								}
							}
						}
					}
			}
    }
}
if (isset($_POST['annuler'])){
	header ('Location:index.php');
	}
?>
</body>
</html>
