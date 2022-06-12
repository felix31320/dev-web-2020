<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
		<form action="users_dataWK40K.php" method="post">
			<p>Entrez le nom de la table dont vous voulez les données :<input type="text" name="tb_data" id="tb_data"></p>
			<p>Entrez le nom de l'utilisateur dont vous voulez les données :<input type="text" name="user_data" id="user_data"></p>

			<input type="submit" name="get_donnees" value="envoyer"/>
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