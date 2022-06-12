<?php
	include ('header.php');
?>
<br>
<br>
<br>
<hr>
<center><h3>Liste des Voitures</h3>
<hr>
</center>
<center><table class="table">
<tr><th>Immatriculation</th><th>Couleur</th><th>Kilométrage</th><th>Modèle</th></th>
<?php
//traitement de resultat
while($enreg = $sql4->fetch(PDO::FETCH_ASSOC))
if($enreg['id_modele']==$enreg['id'])
{
echo '<tr><td>'.$enreg['immatriculation'].'</td><td>'.$enreg['couleur'].'</td><td>'.$enreg['kilometrage'].'</td><td>'.$enreg['modele'].'</td></tr>';
}
?> </table></center> </body> </html>