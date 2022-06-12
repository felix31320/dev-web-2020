<?php

require_once 'connection.php';

session_start();

if(isset($_SESSION["user_login"]))	//on vérifie condition user login not direct back to index.php page
{
	header("location: welcome.php");
}

if(isset($_POST['btn_login']))	//button name is "btn_login" 
{
	$username	=strip_tags($_POST["txt_username_email"]);	//nom du champ "txt_username_email"
	$email		=strip_tags($_POST["txt_username_email"]);	//nom du champ "txt_username_email"
	$password	=strip_tags($_POST["txt_password"]);			//nom du champ "txt_password"
		
	if(empty($username)){						
		$errorMsg[]="please enter username or email";	//on vérifie "username/email" n'est pas vide
	}
	else if(empty($email)){
		$errorMsg[]="please enter username or email";	//on vérifie "username/email" n'est pas vide
	}
	else if(empty($password)){
		$errorMsg[]="please enter password";	//on vérifie "passowrd" n'est pas vide
	}
	else
	{
		try
		{
			$select_stmt=$db->prepare("SELECT * FROM tbl_user WHERE username=:uname OR email=:uemail"); //sql requète de sélection
			$select_stmt->execute(array(':uname'=>$username, ':uemail'=>$email));	//execute la requête on sécurisant les données
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
			
			if($select_stmt->rowCount() > 0)	//on vérifie condition qu'il y a des résultats dans la base
			{
				if($username==$row["username"] OR $email==$row["email"]) //on vérifie condition que le user ou le mail est bien dans la base
				{
					if(password_verify($password, $row["password"])) //on vérifie condition que le mot de passe est bon en utilisant using password_verify() 
					{
						$_SESSION["user_login"] = $row["user_id"];	//On crée une variable de session 
						$loginMsg = "Successfully Login...";		//On affiche un message de succès
						header("refresh:2; welcome.php");			//on rafraichit et on va à l'accueil du site
					}
					else
					{
						$errorMsg[]="wrong password";
					}
				}
				else
				{
					$errorMsg[]="wrong username or email";
				}
			}
			else
			{
				$errorMsg[]="wrong username or email";
			}
		}
		catch(PDOException $e)
		{
			$e->getMessage();
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
          <a class="navbar-brand" href="index.php">Accueil</a>
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
					<strong><?php echo $error; ?></strong>
				</div>
            <?php
			}
		}
		if(isset($loginMsg))
		{
		?>
			<div class="alert alert-success">
				<strong><?php echo $loginMsg; ?></strong>
			</div>
        <?php
		}
		?>   
			<center><h2>Se connecter</h2></center>
			<form method="post" class="form-horizontal">
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Nom d'utilisateur ou mot de passe</label>
				<div class="col-sm-6">
				<input type="text" name="txt_username_email" class="form-control" placeholder="indiquez votre nom d'utilisateur ou mot de passe" />
				</div>
				</div>
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Mot de passe</label>
				<div class="col-sm-6">
				<input type="password" name="txt_password" class="form-control" placeholder="Indiquez votr emot de passe" />
				</div>
				</div>
				
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit" name="btn_login" class="btn btn-success" value="Se connecter">
				</div>
				</div>
				
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				Vous n'avez pas de compte ? <a href="register.php"><p class="text-info">Créer un compte</p></a>		
				</div>
				</div>
					
			</form>
			
		</div>
		
	</div>
			
	</div>
										
	</body>
</html>