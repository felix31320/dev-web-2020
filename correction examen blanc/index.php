<?php
	include ('header.php');
?>
<br>
<br>
<br>
<hr>
<center><h3>Liste des propriétaires de voitures à réviser</h3>
<hr>
</center>
<center><table class="table">
<tr>
	<th>NOM</th>
	<th>Prénom</th>
	<th>Adresse</th>
	<th>Code Postal</th>
	<th>Ville</th>
	<th>Téléphone</th>
	<th>Immatriculation</th>
</tr>
<?php
//traitement de resultat
while($proprio = $sql3->fetch(PDO::FETCH_ASSOC)) // $sql3=$db->prepare("select * from proprietaire,voiture where kilometrage>100000"); $sql3->execute();
if($proprio['ID_VOITURE'] == $proprio['id'])
{
echo '<tr><td>'.$proprio['NOM'].'</td><td>'.$proprio['PRENOM'].'</td><td>'.$proprio['ADRESSE'].'</td><td>'.$proprio['CODE_POSTAL'].'</td><td>'.$proprio['VILLE'].'</td><td>'.$proprio['TEL'].'</td><td>'.$proprio['immatriculation'].'</td></tr>';
}
?> </table></center> </body> </html>