	<?php

require_once "connection.php";

if(isset($_POST['btn_register'])) // on vérifie que le bouton a été validé
{
	$username	= strip_tags($_POST['txt_username']);	//champ "txt_username"
	$email		= strip_tags($_POST['txt_email']);		//champ "txt_email"
	$password	= strip_tags($_POST['txt_password']);	//champ "txt_password"
		
	if(empty($username)){
		$errorMsg[]="Please enter username";	//on vérifie qu'il y a bien un username 
	}
	else if(empty($email)){
		$errorMsg[]="Please enter email";	//on vérifie qu'il y a bien un email
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errorMsg[]="Please enter a valid email address";	//on vérifie le format du mail
	}
	else if(empty($password)){
		$errorMsg[]="Please enter password";	//on vérifie qu'il y a bien un mot de passe
	}
	else if(strlen($password) < 6){
		$errorMsg[] = "Password must be atleast 6 characters";	//on vérifie qu'il y a bien au moins 6 caractères pour le mot de passe
	}
	else
	{	
		try
		{	
			$select_stmt=$db->prepare("SELECT username, email FROM tbl_user 
										WHERE username=:uname OR email=:uemail"); // on prépare la requête
			
			$select_stmt->execute(array(':uname'=>$username, ':uemail'=>$email)); //on exécute la requête 
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);	
			
			if($row["username"]==$username){
				$errorMsg[]="Sorry username already exists";	//on vérifie que le username existe
			}
			else if($row["email"]==$email){
				$errorMsg[]="Sorry email already exists";	//on vérifie que mail existe
			}
			else if(!isset($errorMsg)) // si pas d'erreurs on continu
			{
				$new_password = password_hash($password, PASSWORD_DEFAULT); //on crypte le mot de passe avec password_hash()
				
				$insert_stmt=$db->prepare("INSERT INTO tbl_user	(username,email,password) VALUES
																(:uname,:uemail,:upassword)"); 		//requète sql d'insertion				
				
				if($insert_stmt->execute(array(	':uname'	=>$username, 
												':uemail'	=>$email, 
												':upassword'=>$new_password))){
													
					$registerMsg="Register Successfully..... Please Click On Login Account Link"; //Si la requête est bien exécutée on affiche un message
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Création d'utilisateurs avec PHP</title>
		
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
          <a class="navbar-brand" href="index.php/">Accueil</a>
        </div>
        <!--<div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#"></a></li>
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
			foreach($errorMsg as $error)
			{
			?>
				<div class="alert alert-danger">
					<strong>ERREUR ! <?php echo $error; ?></strong>
				</div>
            <?php
			}
		}
		if(isset($registerMsg))
		{
		?>
			<div class="alert alert-success">
				<strong><?php echo $registerMsg; ?></strong>
			</div>
        <?php
		}
		?>   
			<center><h2>Créez un compte</h2></center>
			<form method="post" class="form-horizontal">
					
				
				<div class="form-group">
				<label class="col-sm-3 control-label">Nom d'utilisateur</label>
				<div class="col-sm-6">
				<input type="text" name="txt_username" class="form-control" placeholder="entrez un nom d'utilisateur" />
				</div>
				</div>
				
				<div class="form-group">
				<label class="col-sm-3 control-label">Email</label>
				<div class="col-sm-6">
				<input type="text" name="txt_email" class="form-control" placeholder="entrez un email" />
				</div>
				</div>
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Mot de passe</label>
				<div class="col-sm-6">
				<input type="password" name="txt_password" class="form-control" placeholder="entrez un mot de passe" />
				</div>
				</div>
					
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit"  name="btn_register" class="btn btn-primary " value="Enregistrer">
				</div>
				</div>
				
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				Déjà inscrit ? <a href="index.php"><p class="text-info">Connectez-vous</p></a>		
				</div>
				</div>
					
			</form>
			
		</div>
		
	</div>
			
	</div>
										
	</body>
</html>