<?php 
    include_once 'function.php';
    include_once 'jeuxinsert.php';
    $bdd = bdd();  

    if(isset($_POST['name']) AND isset($_POST['action']) AND isset($_POST['marque']) AND isset($_POST['image']) AND isset($_POST['prix']) AND isset($_POST['contenu']) AND isset($_POST['date']) AND isset($_POST['entreprise']) AND isset($_POST['age']) AND isset($_POST['video'])){
    
        $jeux = new jeux($_POST['name'],$_POST['action'],$_POST['marque'],$_POST['image'],$_POST['prix'],$_POST['contenu'],$_POST['date'],$_POST['entreprise'],$_POST['age'],$_POST['video']);
        $verif = $jeux->verif();
        if($verif == "ok"){/*Tout est bon*/
            if($jeux->insert()){
            header('refresh:1; jeux.php');
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert</title>
    <link rel="stylesheet" href="../css/jeux.css">
</head>
<body>
    <div  id="divphp">
        <!-- <h3>Isset Errour</h3> -->
    <?php 
		if(isset($erreur)){
			echo $erreur;
        }
    ?>
    </div>
<div class="backgroundimagedisque"> 
	<div id="fixedposition">
		<form action="jeux.php" method="post" enctype="multipart/form-data">
			<div class="container">
			<label for="titre"><b>TITRE</b></label>
			<input type="text" placeholder="titre" name="name" required class="input">
			<label for="action"><b>ACTION</b></label>
			<input type="text" placeholder="action" name="action" required class="input">
            <label for="marque"><b>MARQUE</b></label>
            <input type="text" placeholder="marque" name="marque" required class="input">
            <label for="age"><b>AGE</b></label>
            <div class="input">
                <input type="radio" name="age" value="3" class="radio"><b class="chiffre">3</b>
                <input type="radio" name="age" value="7" class="radio"><b class="chiffre">7</b>
                <input type="radio" name="age" value="12" class="radio"><b class="chiffre">12</b>
                <input type="radio" name="age" value="16" class="radio"><b class="chiffre">16</b>
                <input type="radio" name="age" value="18" class="radio"><b class="chiffre">18</b>
            </div>
            <label for="date"><b>Date de Sortie</b></label>
            <input type="text" placeholder="date de sortie" name="date" required class="input">
            <label for="prix"><b>PRIX</b></label>
            <input type="text" placeholder="prix" name="prix" required class="input">
            </div>
            <div class="container2">
            <label for="contenu"><b>CONTENU</b></label>
            <textarea placeholder="Contenu" name="contenu" required class="input"></textarea>
            <label for="entreprise"><b>entreprise</b></label>
            <input type="text" placeholder="entreprise" name="entreprise" class="input">
            <label for="photo"><b>PHOTO</b></label>
            <input type="file" placeholder="photo" name="image" class="input">
            <label for="video"><b>VIDEO LINK</b></label>
			<input type="text" placeholder="video" name="video" required class="input">
            </div>
            <div class="container3">

            <?php
              if(isset($_POST['insert']))
              {
                header('refresh:5; ../accueil/platforme.php');
              }
            ?>

            <button type="submit" name="insert" class="btn" value="Enregistrer">Insert</button>
			<a href="../"><button type="button" class="btn okbtn">Retour</button></a>
			</div>
		</form>
        </div>
</div>
	</div>
</body>
</html>