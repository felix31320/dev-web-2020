<?php

require_once "connection.php";

if(isset($_POST['btn_insert']))
{
	try
	{
		$name	= $_POST['txt_name'];	//champ de formulaire "txt_name"
			
		$image_file	= $_FILES["txt_file"]["name"];
		$type		= $_FILES["txt_file"]["type"];	//nom du fichier "txt_file"	
		$size		= $_FILES["txt_file"]["size"];
		$temp		= $_FILES["txt_file"]["tmp_name"];
		
		$path="upload/".$image_file; //je défini le nom du fichier et son répertoire
		
		if(empty($name)){
			$errorMsg="Please Enter Name";
		}
		else if(empty($image_file)){
			$errorMsg="Please Select Image";
		}
		else if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif' || $type=='video/mp4') //vérification du format de fichier
		
		{	
			if(!file_exists($path)) //est-ce que le fichier existe déjà ?
			{
				if($size < 20000000) //vérifie le poids du fichier
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
			$insert_stmt=$db->prepare('INSERT INTO tbl_file(name,image) VALUES(:fname,:fimage)'); //requête SQL SELECT					
			$insert_stmt->bindParam(':fname',$name);	
			$insert_stmt->bindParam(':fimage',$image_file);	  //je bind les paramètres 
		
			if($insert_stmt->execute())
			{
				$insertMsg="File Upload Successfully........"; //succès de la requête
				header("refresh:3;index.php"); //je rafraîchis la page et dirige vers la page index.php, très pratique!!
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
<title>Transfert de fichier dans une BDD</title>
		
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
		
</head>

	<body>
	
	
	<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Soggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Accueil</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="">Un onglet</a></li>
          </ul>
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
				<label class="col-sm-3 control-label">Nom</label>
				<div class="col-sm-6">
				<input type="text" name="txt_name" class="form-control" placeholder="Entrez un nom" />
				</div>
				</div>
					
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Fichier</label>
				<div class="col-sm-6">
				<input type="file" name="txt_file" class="form-control" />
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