<?php
	include ('header.php');
?>
<br>
<br>
<br>
<hr>
<center><h3>Liste des modèles</h3>
<hr>
</center>
<center><table class="table">
<tr><th>Modèle</th><th>Marque</th><th>Puissance</th><th>Carburant</th></th>
<?php
//traitement de resultat
while($enreg = $sql->fetch(PDO::FETCH_ASSOC))
{
echo '<tr><td>'.$enreg['modele'].'</td><td>'.$enreg['marque'].'</td><td>'.$enreg['puissance'].'</td><td>'.$enreg['carburant'].'</td></tr>';
}
?> </table></center> </body> </html>