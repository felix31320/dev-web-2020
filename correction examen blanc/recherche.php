<?php
	include ('header.php');
?>
<br> <br> <br> <hr> <center>
<h3>Recherche des Propriétaires</h3> <hr> </center> 
<legend> Recherche avancée </legend>
<table>
<form name="recherche" method="post" action="recherche.php" >
<table>
<tr>
<td>Nom :</td><td><input name="nom" type="text"/></td>
</tr> 
<tr> 
<td>Prénom :</td><td><input name="prenom" type="text"/></td> 
</tr> 
<tr> 
<td></td> 
<td><input type="submit" value="Rechercher" name="recherche"/></td> 
</tr> 
</table> 
</form>
<table class="table">
	<tr>
		<th>Couleur</th>
		<th>Kilométrage</th>
		<th>Modèle</th>
		<th>Marque</th>
		<th>Puissance</th>
		<th>Carburant</th>
		<th>N°Immatriculation</th>
    </tr>

<?php
// requete de selection pour affichage proprietaire par nom
$nom_requete = ($_POST['nom']);
$prenom_requete = ($_POST['prenom']);
$sql5=$db->prepare("select * from proprietaire,voiture,modele where proprietaire.id_voiture = voiture.id AND voiture.id_modele = modele.id AND proprietaire.nom='$nom_requete' AND proprietaire.prenom='$prenom_requete'");
$sql5->execute();


//traitement de resultat
while($enreg = $sql5->fetch(PDO::FETCH_ASSOC))
{
echo '<div>Voitures possédées par <bold>'.$nom_requete.' '.$prenom_requete.'</bold></div>';
echo '<tr><td>'.$enreg['couleur'].'</td><td>'.$enreg['kilometrage'].'</td><td>'.$enreg['modele'].'</td><td>'.$enreg['marque'].'</td><td>'.$enreg['puissance'].'</td><td>'.$enreg['carburant'].'</td><td>'.$enreg['immatriculation'].'</tr>';
}
?>
</table>

</body>
</html>