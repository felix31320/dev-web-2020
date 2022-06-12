<?php

require_once "connection.php";

if(isset($_POST['update_id']))
{
	try
	{
		$id = $_POST['update_id']; //je récupère l'id du fichier à éditer et je la stocke dans une variable $if
		$select_stmt = $db->prepare('SELECT * FROM tbl_file WHERE id =:id'); //requête SQL SELECT
		$select_stmt->bindParam(':id',$id);
		$select_stmt->execute(); 
		$row = $select_stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}
	
}

if(isset($_POST['btn_update']))
{
	try
	{
		$name	=$_POST['txt_name'];	//champ de formulaire "txt_name"
		
		$image_file	= $_FILES["txt_file"]["name"];
		$type		= $_FILES["txt_file"]["type"];	//nom du fichier "txt_file"
		$size		= $_FILES["txt_file"]["size"];
		$temp		= $_FILES["txt_file"]["tmp_name"];
			
		$path="upload/".$image_file; //je défini la variable du fichier à éditer
		
		$directory="upload/"; //je défini le répertoire dans lequel se trouve le fichier qui va être éditer
		
		if($image_file)
		{
			if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') //je vérifie l'extension du fichier
			{	
				if(!file_exists($path)) //je vérifie que le répertoire existe
				{
					if($size < 5000000) //cje vérifie le poids du fichier < 5MB
					{
						unlink($directory.$row['image']); //je délie le fichier
						move_uploaded_file($temp, "upload/" .$image_file);	//je déplace le fichier dans un répertoire temporaire	
					}
					else
					{
						$errorMsg="Your File To large Please Upload 5MB Size"; //message d'erreur si le poids est incorrect
					}
				}
				else
				{	
					$errorMsg="File Already Exists...Check Upload Folder"; //message d'erreur si le fichier existe déjà
				}
			}
			else
			{
				$errorMsg="Upload JPG, JPEG, PNG & GIF File Formate.....CHECK FILE EXTENSION"; //message d'erreur si le format est incorrect
			}
		}
		else
		{
			$image_file=$row['image']; //si tout est ok, ke stocke le fichier dans une variable
		}
	
		if(!isset($errorMsg))
		{
			$update_stmt=$db->prepare('UPDATE tbl_file SET name=:name_up, image=:file_up WHERE id=:id'); //reqiête SQL UPDATE
			$update_stmt->bindParam(':name_up',$name);
			$update_stmt->bindParam(':file_up',$image_file);	//je bind les paramètres
			$update_stmt->bindParam(':id',$id);
			 
			if($update_stmt->execute())
			{
				$updateMsg="Fichier mis à jour .......";	//Message de succès
				header("refresh:3;index.php");	//je rafraîchis la page et dirige vers la page index.php, très pratique!!
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
		if(isset($updateMsg)){
		?>
			<div class="alert alert-success">
				<strong>MIS A JOUR ! <?php echo $updateMsg; ?></strong>
			</div>
        <?php
		}
		?>   
		
			<form method="post" class="form-horizontal" enctype="multipart/form-data">
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Nom</label>
				<div class="col-sm-6">
				<input type="text" name="txt_name" class="form-control" value="<?php echo $name; ?>" required/>
				</div>
				</div>
					
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Fichier</label>
				<div class="col-sm-6">
				<input type="file" name="txt_file" class="form-control" value="<?php echo $image; ?>"/>
				<p><img src="upload/<?php echo $image; ?>" height="100" width="100" /></p>
				</div>
				</div>
					
					
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_update" class="btn btn-primary" value="Mettre à jour">
				<a href="index.php" class="btn btn-danger">Annuler</a>
				</div>
				</div>
					
			</form>
			
		</div>
		
	</div>
			
	</div>
										
	</body>
</html>