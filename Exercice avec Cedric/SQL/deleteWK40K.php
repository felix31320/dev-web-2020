<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
		<form action="deleteWK40K.php" method="post">
			<p>Entrez le id d'utilisateur à supprimer<input type="text" name="delete" id="delete"></p>

			<input type="submit" name="deleting" value="envoyer"/>
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
    </body>
</html>