<?php
include_once '../php/function.php';
include_once '../php/register.class.php';
$bdd = bdd();

if(isset($_POST['username']) AND isset($_POST['email']) AND isset($_POST['password']) AND isset($_POST['password2']) AND isset($_POST['profilephoto'])){
  
	$inscription = new inscription($_POST['username'],$_POST['email'],$_POST['password'],$_POST['password2'],$_POST['profilephoto']);
    $verif = $inscription->verif();
    if($verif == "ok"){/*Tout est bon*/
     if($inscription->enregistrement()){
            if($inscription->session()){ /*Tout est mis en session*/
                header('refresh:1; connexion.php');
            }
        }
        else{ /*Erreur lors de l'enregistrement*/
            echo 'Une erreur est survenue';
        }   
    } else {
       $erreur = $verif;
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
	<link rel="stylesheet" href="../css/register.css">
</head>
	<body>	
	<div  id="divphp">
	<?php 
		if(isset($erreur)){
			echo $erreur;
		}
    ?>
	</div>  
	<div id="fixedposition">
		<form class="modal-content2 animate" action="register.php" method="post">
			<div class="container">
				<label for="username"><b>Pseudo</b></label>
				<input type="text" placeholder="entrez un pseudo" name="username" required class="input">
				<label for="email"><b>Email</b></label>
				<input type="text" placeholder="entrez un email" name="email" required class="input">
				<label for="password"><b>Mot de passe</b></label>
				<input type="password" placeholder="entrez un mot de passe" name="password" required class="input">
				<label for="password2"><b>Confirmation du mot de passe</b></label>
				<input type="password" placeholder="confirmer ton mot de passe" name="password2" required class="input">
				<label for="profilephoto"><b>Photo de profile</b></label>
				<input type="file" name="profilephoto" class="input">
				<button type="submit" class="btn" value="Enregistrer">Créer un compte</button>
				<button type="button" class="connecter"><a href="index.php" class="connecter2">Connectez-vous</a></button>
			</div>
		</form>
		</div>
	</div>
	</body>
</html>