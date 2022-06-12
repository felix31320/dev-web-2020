<?php

require_once "connection.php";

if(isset($_POST['btn_insert']))
{
	try
	{
		$espece	= $_POST['txt_espece'];	//champ de formulaire "txt_type"
		$genre	= $_POST['txt_genre'];	//champ de formulaire "txt_genre"
		$anNaissance	= $_POST['txt_anNaissance'];	//champ de formulaire "txt_anNaissance"
		$nom	= $_POST['txt_name'];	//champ de formulaire "txt_name"
		//$date_arrive	= DateTime::createFromFormat('d/m/Y', $_POST['txt_arrive']);	//champ de formulaire "txt_arrive"
		$commentaires	= $_POST['txt_commentaire'];	//champ de formulaire "txt_commentaire"
		$proprietaire	= $_POST['txt_proprio'];	//champ de formulaire "txt_proprio"
			
		$image_file	= $_FILES["txt_file"]["name"];
		$type		= $_FILES["txt_file"]["type"];	//nom du fichier "txt_file"	
		$size		= $_FILES["txt_file"]["size"];
		$temp		= $_FILES["txt_file"]["tmp_name"];
		
		$path="upload/".$image_file; //je défini le nom du fichier et son répertoire
		
		if(empty($nom)){
			$errorMsg="Merci d'entrer un nom pour cet animal";
		}
		else if(empty($image_file)){
			$errorMsg="Insérez une photo de l'animal";
		}
		else if(empty($espece)){
			$errorMsg="Merci d'indiquer de quel type d'animal il s'agit";
		}
		/*else if(empty($date_arrive)){
			$errorMsg="Merci d'indiquer la date d'arrivée";
		}*/
		else if(empty($proprietaire)){
			$errorMsg="Merci de renseigner le nom du propriétaire";
		}

		else if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') //vérification du format de fichier
		
		{	
			if(!file_exists($path)) //est-ce que le fichier existe déjà ?
			{
				if($size < 5000000) //vérifie le poids du fichier
				{
					move_uploaded_file($temp, "upload/" .$image_file); //je stocke le fichier temporairement
				}
				else
				{
					$errorMsg="Your File To large Please Upload 5MB Size"; //poids de fichier incorrect
				}
			}
			else
			{	
				$errorMsg="File Already Exists...Check Upload Folder"; //fichier déjà préent
			}
		}
		else
		{
			$errorMsg="Upload JPG , JPEG , PNG & GIF File Formate.....CHECK FILE EXTENSION"; //mauvais format
		}
		
		if(!isset($errorMsg))
		{
			$insert_stmt=$db->prepare('INSERT INTO animaux(espece,genre,anNaissance,nom,photo,commentaires,proprietaire)
			VALUES(:fespece,:fgenre,:fanNaissance,:fnom,:fphoto,:fcommentaires,:fproprietaire)'); //requête SQL SELECT					
			$insert_stmt->bindParam(':fespece',$espece);	
			$insert_stmt->bindParam(':fgenre',$genre);	  //je bind les paramètres 
			$insert_stmt->bindParam(':fanNaissance',$anNaissance);	
			$insert_stmt->bindParam(':fnom',$nom);	  //je bind les paramètres 
			//$insert_stmt->bindParam(':fdate_arrive',$date_arrive->format('Y-m-d'));	
			$insert_stmt->bindParam(':fphoto',$image_file);	  //je bind les paramètres 
			$insert_stmt->bindParam(':fcommentaires',$commentaires);	
			$insert_stmt->bindParam(':fproprietaire',$proprietaire);	  //je bind les paramètres 
		
			if($insert_stmt->execute())
			{
				$insertMsg="Un nouvel animal a rejoint la bande !"; //succès de la requête
				header("refresh:3;login/index.php"); //je rafraîchis la page et dirige vers la page index.php, très pratique!!
			}
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Bienvenue à la Clinique des animaux</title>
		
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>		
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>

	<body>
	
	
	<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
		  <a class="navbar-brand" href="login/index.php">Accueil</a>
          <a href="">Les chats</a>
          <a href="">Les chiens</a></li>
          <a href="">Les lapins</a></li>
          <a href="">Les serpents</a></li>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		
		<?php
		if(isset($errorMsg))
		{
			?>
            <div class="alert alert-danger">
            	<strong>ERREUR ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
		}
		if(isset($insertMsg)){
		?>
			<div class="alert alert-success">
				<strong>RÉUSSI ! <?php echo $insertMsg; ?></strong>
			</div>
        <?php
		}
		?>   
		
			<form method="post" class="form-horizontal" enctype="multipart/form-data">
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Espèce</label>
				<div class="col-sm-6">
				<input type="text" name="txt_espece" class="form-control" placeholder="Espèce" />
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">Genre</label>
				<div class="col-sm-6">
					<input type="radio" name="txt_genre" value="M"> Mâle<br>
					  <input type="radio" name="txt_genre" value="F"> Femelle<br>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">Année de naissance</label>
				<div class="col-sm-6">
				<input type="text" name="txt_anNaissance" class="form-control" placeholder="Date de naissance" />
				</div>
								<div class="form-group">
				<label class="col-sm-3 control-label">Nom</label>
				<div class="col-sm-6">
				<input type="text" name="txt_name" class="form-control" placeholder="Entrez un nom" />
				</div>
				</div>
				<!--<div class="form-group">
				<label class="col-sm-3 control-label">Date d'arrivée</label>
				<div class="col-sm-6">
				<input type="date" name="txt_arrive" class="form-control" placeholder="Date d'arrivée" />
				</div>
				</div>-->
		
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Photo</label>
				<div class="col-sm-6">
				<input type="file" name="txt_file" class="form-control" />
				</div>
				</div>
				
				
				<div class="form-group">
				<label class="col-sm-3 control-label">Commentaires</label>
				<div class="col-sm-6">
				<input type="text" name="txt_commentaire" class="form-control" placeholder="Entrez commentaire" />
				</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">Propriétaire</label>
				<div class="col-sm-6">
				<input type="text" name="txt_proprio" class="form-control" placeholder="Nom du propriétaire" />
				</div>
				</div>
				</div>
					
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_insert" class="btn btn-success " value="Ajouter">
				<a href="index.php" class="btn btn-danger">Annuler</a>
				</div>
				</div>
					
			</form>
			
		</div>
		
	</div>
			
	</div>
										
	</body>
</html>