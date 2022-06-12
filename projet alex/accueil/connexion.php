<?php session_start();
include_once '../php/function.php';
include_once '../php/connexion.class.php';
$bdd = bdd();
if(isset($_POST['username']) AND ($_POST['username']) AND isset($_POST['password'])){
    
    $connexion = new connexion($_POST['username'],$_POST['password']);
    $verif = $connexion->verif();
    if($verif =="ok"){
      if($connexion->session()){
		  header('refresh:1; index.php');
      }
    }
    else {
        $erreur = $verif; 
    } 
}


			?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<meta charset="UTF-8">
<title>Création d'utilisateurs avec PHP</title>
	<link rel="stylesheet" href="../css/nav1.css">
	<link rel="stylesheet" href="../css/connexion.css">
	<link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/demowelcome.css">
</head>
	
	<body>
	<nav id="nav">
		<a class="imgnav" href=""><img src="../img/gameover1.png" alt="" class="img100"></a>
		<div class="dropdown">
		<button class="dropbtn"><a class="dropbtn none" href="connexion.php">Accueil</a></button>
		</div>
		<div class="dropdown">
		<button class="dropbtn">Jeux video</button>
			<div class="dropdown-content">
				<a class="dropdown-item font1" onclick="alert('Inscrivez-vous ou connectez-vous ton compte')" href="platforme.php">tous les platformes</a>
				<a class="dropdown-item font1" onclick="alert('Inscrivez-vous ou connectez-vous ton compte')" href="ps4.php">ps4</a>
				<a class="dropdown-item font1" onclick="alert('Inscrivez-vous ou connectez-vous ton compte')" href="xboxone.php">xboxone</a>
				<a class="dropdown-item font1" onclick="alert('Inscrivez-vous ou connectez-vous ton compte')" href="pc.php">pc</a>
			</div>
		</div>
		<div class="dropdown">
		<button class="dropbtn"><a class="dropbtn none" onclick="alert('Inscrivez-vous ou connectez-vous ton compte')">Forum</a></button>
		</div>
		<div class="dropdown">
		<button class="dropbtn"><a class="dropbtn none" onclick="alert('Inscrivez-vous ou connectez-vous ton compte')" href="Achete.php">Achete</a></button>
		</div>
					<!-- <div id="divphp">
						<strong><?php //if(isset($erreur)){ echo $erreur;}?></strong>
					</div>   -->
		<button onclick="document.getElementById('id01').style.display='block'" class="button" id="clickbutton">Se connecter</button>
			<div id="id01" class="modal">
			<form class="modal-content animate" action="connexion.php" method="post">
				<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
				<img src="../user_image/gameover.png" alt="Avatar" class="avatar">
				</div>
				<div class="container">
				<label for="txt_username"><b>Pseudo</b></label>
				<input type="text" placeholder="Enter ton pseudo" name="username" required class="input">
				<label for="txt_password"><b>Mot de passe</b></label>
				<input type="password" placeholder="Enter ton mot de passe" name="password" required class="input">	
				<button type="submit" class="" value="Se connecter">Se connecter</button>
				</div>
				<div class="container">
				<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annuler</button>
				<a href="register.php"><button type="button" onclick="document.getElementById('id02').style.display='block'" class="oklbtn">Inscrivez vous</button></a>
				</div>
			</form>
			</div>
	</nav>
	<?php 
		include 'demowelcome.php';
	?>					
	<script>
		var modal = document.getElementById('id01');
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>
	<footer>
        <div class="footer">
            <div style="width:20%;color:white;">
                <p style="margin-top:13%;">Voici 505 GAMES est un site vente des jeux videos des platformes, les jeux ne sont pas chers et la securite, c'est pourquoi il est tres connu dans le monde. Apres il y a le forum qui est les esprits ouverts</p>
            </div>
            <div class="footercolumn">
                <h3 style="margin-top: 20px;margin-bottom:10px;">Site</h3>
                <ul>
                    <li class="espacebottom"><a href="connexion.php" class="motfooter">Accueil</a></li>
                    <li class="espacebottom"><a onclick="alert('Inscrivez-vous ou connectez-vous ton compte')" href="connexion.php" class="motfooter">Forum</a></li>
                    <li class="espacebottom"><a onclick="alert('Inscrivez-vous ou connectez-vous ton compte')" href="connexion.php" class="motfooter">les jeux video</a></li>
                    <li class="espacebottom"><a onclick="alert('Inscrivez-vous ou connectez-vous ton compte')" href="connexion.php" class="motfooter">achat</a></li>
                </ul>
            </div>
            <div class="footercolumn">
                <h3 style="margin-top: 20px;margin-bottom:10px;">Admin</h3>
                <ul>
                    <li class="espacebottom"><a onclick="alert('Inscrivez-vous ou connectez-vous ton compte')" href="" class="motfooter">Contact</a></li>
                    <li class="espacebottom"><a href="" class="motfooter">FaQ</a></li>
                    <li class="espacebottom"><a href="" class="motfooter">Mentions Légales</a></li>
                    <li class="espacebottom"><a href="" class="motfooter">Politique de confidentialité</a></li>
                </ul>
            </div>
            <div>
                <a href="connexion.php"><img src="../img/gameover1.png" width="200" height="70" class="footerlogo" alt="marquesite"></a>
            </div>
        </div>
    </footer>									
	</body>
</html>