<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset='utf-8'>
    </head>
    <body>
		<?php
			include 'header.php';
		?>  
		<form action="updateWK40K.php" method="post" style="text-align: center;">

			<h2 style="margin-top: 20px;">Modifier les personnages</h2>

			<p style="margin-top: 10px;">Entrez le nom d'utilisateur à modifier : <input type="text" name="update" id="update"></p>
			<p style="margin-top: 10px;">Entrez le nouveau nom d'utilisateur : <input type="text" name="update_new" id="update"></p>

			<input type="submit" name="updating" value="Modifier !" style="margin-top: 10px;">
		</form>

<?php

	if (isset($_POST['updating'])){
    
	$update = $_POST['update'];
	$updateNew = $_POST['update_new'];
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=localhost;dbname=univers1",'root','root');
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
			$sql = "UPDATE necron SET NOM='$updateNew' WHERE NOM='$update'";

				// Prepare statement
				$stmt = $dbco->prepare($sql);

				// execute the query
				$stmt->execute();

				// echo a message to say the UPDATE succeeded
				echo $stmt->rowCount() . " mise à jour réussie";
				}
			catch(PDOException $e)
				{
				echo $sql . "<br>" . $e->getMessage();
				}
	}
?>

















		<form action="updateWK40K.php" method="post" style="text-align: center;">

			<h2 style="margin-top: 20px;">Supprimer les personnages</h2>

			<p style="margin-top: 10px;">Entrez le id d'utilisateur à supprimer : <input type="text" name="delete" id="delete"></p>

			<input type="submit" name="deleting" value="Supprimer !" style="margin-top: 10px;">
		</form>

<?php
	if (isset($_POST['deleting'])){
    
	$delete = $_POST['delete'];
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=localhost;dbname=univers1",'root','root');
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			// sql to delete a record
			$sql = "DELETE FROM necron WHERE id='$delete'";

			if ($dbco->query($sql) == TRUE) {
				echo $delete. ' a été supprimé';
			} else {
				echo $delete. ' non supprimé à cause d\'une erreur:';	
			}			
	}
		catch(PDOException $e) 
				{
				echo $sql . "<br>" . $e->getMessage();
				}
}
?>
























		<form action="updateWK40K.php" method="post" style="text-align: center;">

			<h2 style="margin-top: 20px;">Informer les personnage</h2>
			<p style="margin-top: 10px;">Entrez le nom de la table dont vous voulez les données : <input type="text" name="tb_data" id="tb_data"></p>
			<p style="margin-top: 10px;">Entrez le nom de l'utilisateur dont vous voulez les données : <input type="text" name="user_data" id="user_data"></p>

			<input type="submit" name="get_donnees" value="Informer !" style="margin-top: 10px;">
		</form>

<?php
	if (isset($_POST['get_donnees'])){
    
	$tbData = $_POST['tb_data'];
	$userData = $_POST['user_data'];
    
    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=localhost;dbname=univers1",'root','root');
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	// on recherche les entrées prenom et pays de la table form
				$sth = $dbco->prepare("SELECT NOM,CC,CT,F,E,PV,A,Cd,Svg FROM $tbData WHERE NOM='$userData' ");
                $sth->execute();	
				// on récupère le résultat
				$resultat=$sth->fetchAll(PDO::FETCH_ASSOC);
	// on présente les résultats sous forme de tableau
	/*print_r permet un affichage lisible des résultats,
                 *<pre> rend le tout un peu plus lisible*/
                echo '<pre>';
                print_r($resultat);
                echo '</pre>';	
					}
		catch(PDOException $e) 
				{
				echo $sql . "<br>" . $e->getMessage();
				}
}
?>
    </body>
</html>
